const axios = require('axios');
const mysql = require('mysql2/promise');
const fs = require('fs');
const path = require('path');

// Конфигурация базы данных
const dbConfig = {
    host: 'localhost', // Замените на ваш хост
    user: 'oksiv92_marsga',      // Замените на вашего пользователя
    password: 'jeJeQLj8QkkF1',      // Замените на ваш пароль
    database: 'oksiv92_marsga' // Замените на вашу базу данных
};

// URL для авторизации
const loginUrl = "https://mars-games.ru/?submit";

// Массив URL для выполнения действий
const actionUrls = [
    "https://mars-games.ru/mine/?go/",
    "https://mars-games.ru/mine/work/?works",
    // Добавьте другие URL по мере необходимости
];

// Проверка доступности сервера
async function checkServerAvailability() {
    try {
        const response = await axios.get("https://mars-games.ru/", { timeout: 10000 });
        console.log("Сервер доступен. Продолжаем выполнение...");
        return true;
    } catch (error) {
        console.error("Сервер недоступен:", error.message);
        return false;
    }
}

// Функция для получения пользователей из базы данных
async function getUsersFromDatabase() {
    const connection = await mysql.createConnection(dbConfig);
    try {
        const [rows] = await connection.execute(`
            SELECT u.id, u.login, u.passw, u.mine_time, u.mine_time_1 
            FROM auto_bot_user abu
            JOIN users u ON abu.user = u.id
        `);
        return rows.map(row => ({
            login: row.login,
            pass: row.passw,
            cookieFile: `cookie_${row.login.toLowerCase()}.txt`,
            mine_time: row.mine_time,
            mine_time_1: row.mine_time_1
        }));
    } finally {
        await connection.end();
    }
}

// Функция для фильтрации URL
function filterActionUrls(user) {
    return actionUrls.filter(url => {
        if (url.startsWith("https://mars-games.ru/mine/?go/")) {
            return !(user.mine_time > Date.now() || user.mine_time_1 > Date.now());
        }
        if (url.startsWith("https://mars-games.ru/mine/work/?works")) {
            return !(user.mine_time_1 > Date.now());
        }
        return true;
    });
}

// Функция для выполнения запросов
async function performRequests(users) {
    const requests = [];

    for (const user of users) {
        console.log(`Обработка пользователя: ${user.login}`);

        // Фильтруем URL
        const filteredActionUrls = filterActionUrls(user);

        // Проверяем существование файла cookie
        let cookies = {};
        const cookieFilePath = path.join(__dirname, user.cookieFile);
        if (fs.existsSync(cookieFilePath)) {
            const cookieData = fs.readFileSync(cookieFilePath, 'utf8');
            cookies = JSON.parse(cookieData);
        }

        // Создаем запросы
        for (const url of filteredActionUrls) {
            requests.push(
                axios.get(url, {
                    headers: {
                        'User-Agent': `Mozilla/5.0 Bot-User:${user.login}`,
                        'Referer': 'https://mars-games.ru/'
                    },
                    timeout: 10000,
                    withCredentials: true,
                    jar: cookies
                }).then(response => {
                    console.log(`Ответ сервера для URL: ${url}:`);
                    console.log(response.data);
                }).catch(error => {
                    console.error(`Ошибка при запросе к URL: ${url}:`, error.message);
                })
            );
        }
    }

    // Выполняем все запросы параллельно
    await Promise.allSettled(requests);
}

// Основная функция
async function main() {
    // Проверяем доступность сервера
    const isServerAvailable = await checkServerAvailability();
    if (!isServerAvailable) {
        return;
    }

    // Получаем пользователей из базы данных
    const users = await getUsersFromDatabase();

    // Выполняем запросы
    await performRequests(users);

    console.log("Скрипт завершен.");
}

// Запуск скрипта
main().catch(error => {
    console.error("Произошла ошибка:", error.message);
});