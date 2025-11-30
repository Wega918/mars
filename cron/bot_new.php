<?php
$start = microtime(true);

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('max_execution_time', 0);

$db = new mysqli('localhost', 'oksiv92_marsga', 'jeJeQLj8QkkF1', 'oksiv92_marsga');
if ($db->connect_error) die("Ошибка подключения: " . $db->connect_error);
$db->set_charset("utf8");

// --- Таблица для хранения таймеров ---
$db->query("CREATE TABLE IF NOT EXISTS user_delays (
    user_id INT PRIMARY KEY,
    vip_delay INT NOT NULL,
    other_delay INT NOT NULL,
    last_update INT NOT NULL
)");

if (!file_exists(__DIR__ . "/auto_bot")) {
    mkdir(__DIR__ . "/auto_bot", 0777, true);
}

// Загружаем пользователей с IP
$result = $db->query("SELECT id, login, passw, time_zbros, viz, corp, soyz, browser
                      FROM users 
                      WHERE id IN (9,5,12,17,50,51,47,44,264,285,267,63,68,289,305,242,250,356,348,310,244,269,153,312,87,293,255,
                                   328,188,206,187,261,246,254,241,249,263,275,316,253,278,257,254,261,318,241,290,263,295,275,251,299,314,
                                   340,152,370,80,313,239,519,418)
                      ORDER BY id");
$users = $result->fetch_all(MYSQLI_ASSOC);
$result->free();

$curlOptions = [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_TIMEOUT => 8,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_USERAGENT => "bot",
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_ENCODING => 'gzip',
];

$now = time();

foreach ($users as $row) {
    $userId = $row['id'];
    $cookieFile = __DIR__ . "/auto_bot/cookie_{$userId}.txt";

    // --- Проверяем IP ---
    if ($row['browser'] !== 'bot') {
        echo "<p>User {$userId} пропущен — IP не совпадает ({$row['browser']})</p><hr>";
        continue; // пропускаем всех, у кого другой IP
    }

    echo "<h2>Обработка пользователя ID: {$userId}</h2>";

    // --- Проверяем есть ли таймеры в базе ---
    $delayRes = $db->query("SELECT vip_delay, other_delay, last_update 
                            FROM user_delays WHERE user_id = {$userId}");
    if ($delayRes && $delayRes->num_rows > 0) {
        $delayRow = $delayRes->fetch_assoc();
        $vipDelay   = (int)$delayRow['vip_delay'];
        $otherDelay = (int)$delayRow['other_delay'];
    } else {
        // Если первый раз — создаём задержки
        $vipDelay   = rand(1800, 7200); // 30–120 мин
        $otherDelay = rand(60, 3600);   // 1–60 мин
        $db->query("INSERT INTO user_delays (user_id, vip_delay, other_delay, last_update)
                    VALUES ({$userId}, {$vipDelay}, {$otherDelay}, {$now})
                    ON DUPLICATE KEY UPDATE vip_delay={$vipDelay}, other_delay={$otherDelay}, last_update={$now}");
    }
    if ($delayRes) $delayRes->free();

    // --- Проверяем таймеры ---
    $timeSinceVip   = $now - (int)$row['time_zbros'];
    $timeSinceOther = $now - (int)$row['viz'];

    $needVip   = $timeSinceVip   >= $vipDelay;
    $needOther = $timeSinceOther >= $otherDelay;

    if (!$needVip && !$needOther) {
        $waitVip   = $vipDelay   - $timeSinceVip;
        $waitOther = $otherDelay - $timeSinceOther;

        echo "<p>Пропускаем User {$userId}</p>";
        echo "<p>До buyVip: {$waitVip} сек</p>";
        echo "<p>До других запросов: {$waitOther} сек</p><hr>";
        continue;
    }

    // --- Авторизация ---
    $ch = curl_init("https://mars-games.ru/?submit");
    curl_setopt_array($ch, $curlOptions + [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query([
            "login" => $row['login'],
            "pass" => $row['passw'],
            "submit" => "Войти"
        ]),
        CURLOPT_COOKIEJAR => $cookieFile,
        CURLOPT_COOKIEFILE => $cookieFile,
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false) {
        echo "<p class='error'>Ошибка cURL при авторизации</p><hr>";
        continue;
    }

    $isLoggedIn = (strpos($response, 'Выход') !== false) 
               || (strpos($response, $row['login']) !== false)
               || (strpos($response, 'profile') !== false);

    if (!$isLoggedIn) {
        echo "<p class='error'>User {$userId}: Не удалось войти (HTTP {$httpCode})</p><hr>";
        continue;
    }

    echo "<p class='success'>User {$userId} успешно авторизован</p>";



// --- buyVip + связанные запросы ---
if ($needVip) {
    $vipUrls = [
        "buyVip"    => "https://mars-games.ru/igrok_{$userId}/?buyVipLink_ok",
        "money9"    => "https://mars-games.ru/menu/?money_9",
        "garbage"   => "https://mars-games.ru/garbage/?buy_all",
        "corp1"     => "https://mars-games.ru/corp/{$row['corp']}/?nagrada1/",
        "corp7"     => "https://mars-games.ru/corp/{$row['corp']}/?nagrada7/",
        "corp30"    => "https://mars-games.ru/corp/{$row['corp']}/?nagrada30/",
        "corpBoy"   => "https://mars-games.ru/corp/{$row['corp']}/?boy/",
        "soyz1"     => "https://mars-games.ru/soyz/{$row['soyz']}/?nagrada1/",
        "soyz7"     => "https://mars-games.ru/soyz/{$row['soyz']}/?nagrada7/",
        "soyz30"    => "https://mars-games.ru/soyz/{$row['soyz']}/?nagrada30/",
        "soyzBoy"   => "https://mars-games.ru/soyz/{$row['soyz']}/?boy/",
        "vip30"     => "https://mars-games.ru/VIP/?activation_30_/",
        "vip30_2"   => "https://mars-games.ru/VIP/?activation_30_2_/",
        "vip30_3"   => "https://mars-games.ru/VIP/?activation_30_3_/",
        "vip1_4"    => "https://mars-games.ru/VIP/?activation_1_4_/",
        "Lottery"    => "https://mars-games.ru/Lottery/?Yes/"
    ];


    foreach ($vipUrls as $action => $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, $curlOptions + [
            CURLOPT_COOKIEFILE => $cookieFile,
            CURLOPT_REFERER => "https://mars-games.ru/",
        ]);
        $resp = curl_exec($ch);
        curl_close($ch);
        echo "<p>{$action} выполнен</p>";
    }

    $db->query("UPDATE users SET time_zbros = {$now} WHERE id = {$userId}");

    // --- обновляем задержку ---
    $vipDelay = rand(1800, 7200);
} else {
    $waitVip = $vipDelay - $timeSinceVip;
    echo "<p>До следующего buyVip: {$waitVip} сек</p>";
}

// --- Остальные запросы ---
if ($needOther) {
    $urls = [
        "newRoom" => "https://mars-games.ru/?new_room",
        "autoBuy" => "https://mars-games.ru/?AutoBuy",
        "dohodX2" => "https://mars-games.ru/igrok_{$userId}/?dohod_x2_"
    ];

    foreach ($urls as $action => $url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, $curlOptions + [
            CURLOPT_COOKIEFILE => $cookieFile,
            CURLOPT_REFERER => "https://mars-games.ru/",
        ]);
        $resp = curl_exec($ch);
        curl_close($ch);
        echo "<p>{$action} выполнен</p>";
    }

    $db->query("UPDATE users SET viz = {$now} WHERE id = {$userId}");

    // --- обновляем задержку ---
    $otherDelay = rand(60, 1800);
} else {
    $waitOther = $otherDelay - $timeSinceOther;
    echo "<p>До следующих запросов: {$waitOther} сек</p>";
}
    // --- сохраняем новые таймеры ---
    $db->query("INSERT INTO user_delays (user_id, vip_delay, other_delay, last_update)
                VALUES ({$userId}, {$vipDelay}, {$otherDelay}, {$now})
                ON DUPLICATE KEY UPDATE 
                vip_delay={$vipDelay}, 
                other_delay={$otherDelay}, 
                last_update={$now}");

    // --- Выход ---
    $ch = curl_init("https://mars-games.ru/exit.php?okda");
    curl_setopt_array($ch, $curlOptions + [CURLOPT_COOKIEFILE => $cookieFile]);
    curl_exec($ch);
    curl_close($ch);

    echo "<p>User {$userId} завершил сеанс</p><hr>";
}

$db->close();

$totalTime = microtime(true) - $start;
echo "<hr><p>Общее время выполнения: " . round($totalTime, 3) . " секунд</p>";
?>
