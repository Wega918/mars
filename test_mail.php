<?php
// Подключение к базе данных с использованием mysqli
define('DB_HOST', 'localhost');
define('DB_NAME', 'angreg_vip');
define('DB_USER', 'angreg_vip');
define('DB_PASS', 'jeJeQLj8QkkF1');

// Подключаемся к базе данных
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Проверка на успешное подключение
if ($mysqli->connect_error) {
    die('Ошибка подключения к базе данных: ' . $mysqli->connect_error);
}

// Устанавливаем кодировку
$mysqli->set_charset('utf8mb4');

// Если форма отправлена
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные из формы и предотвращаем XSS
    $to = filter_var($_POST['to_email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // Проверка email
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        die('Ошибка: некорректный email получателя');
    }


// Заголовки письма
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "From: support@mars-games.ru\r\n";
$headers .= "Reply-To: support@mars-games.ru\r\n";
$headers .= "List-Unsubscribe: <mailto:support@mars-games.ru?subject=unsubscribe>\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . "\r\n";
$headers .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2800.1441\r\n";
$headers .= "X-Priority: 3\r\n";  // Низкий приоритет


    // Отправка письма
    if (mail($to, $subject, $message, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка при отправке сообщения.";
    }
}

// Закрываем соединение с БД
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отправка письма</title>
</head>
<body>
    <h2>Форма отправки письма</h2>
    <form method="post">
        <label>Получатель (Email):</label><br>
        <input type="email" name="to_email" required><br><br>

        <label>Тема:</label><br>
        <input type="text" name="subject" value="Восстановление пароля" required><br><br>

        <label>Сообщение:</label><br>
        <textarea name="message" required>
Здравствуйте, USER!
Вами (или нет) была произведена операция по восстановлению пароля на сайте mars-games.ru

Ваши новые данные для авторизации на сайте:
-------------------------
Логин: USER
Пароль: PASSWORD
-------------------------

Пароль сгенерирован автоматически, просим Вас после авторизации сменить его!

С уважением, MARS-GAMES.RU
Служба поддержки: support@mars-games.ru

Время заявки: 19:32
Устройство: PC
IP устройства: 127.0.0.1
</textarea><br><br>

        <input type="submit" value="Отправить">
    </form>
</body>
</html>
