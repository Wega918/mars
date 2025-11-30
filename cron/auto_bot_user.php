<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
$start = microtime(true);

// Настройки PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../system/config.php'); // Подключаем конфигурацию базы данных

// Подключение к базе данных
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Функция toBC, если ещё не определена

function toBC($value, $scale = 10) {
    // Если значение - целое число, возвращаем как есть
    if (is_int($value)) {
        return (string)$value;
    }

    // Если строка слишком длинная, возвращаем без изменений
    if (strlen((string)$value) > 300) {
        return (string)$value;
    }

    // Если число в научной нотации, преобразуем в десятичную запись
    if (stripos((string)$value, 'e') !== false) {
        $value = number_format((float)$value, $scale, '.', '');
    }

    // Обрезаем лишние нули и точку, только если это float
    if (strpos((string)$value, '.') !== false) {
        $value = rtrim(rtrim((string)$value, '0'), '.');
    }

    return $value !== '' ? $value : '0';
}


// Получаем все союзы
$result_soyz = $mysqli->query("SELECT * FROM soyz");
while ($soyz = $result_soyz->fetch_assoc()) {
    $soyz_id = intval($soyz['id']);

    // Получаем сумму musor_proc для текущего союза
    $stmt = $mysqli->prepare("SELECT musor_proc FROM users WHERE soyz = ?");
    $stmt->bind_param("i", $soyz_id);
    $stmt->execute();
    $res = $stmt->get_result();

    $sum_musor_soyz = "0";
    while ($row = $res->fetch_assoc()) {
		$row['musor_proc'] = toBC($row['musor_proc']);
        $sum_musor_soyz = bcadd($sum_musor_soyz, $row['musor_proc'], 8);
    }
    $stmt->close();

    // Приведение к строкам для BCMath
    $sum_musor_soyz_bc = toBC($sum_musor_soyz);
    $turnir_musor_bc   = toBC($soyz['turnir_musor']);
    $musor_soyz_bc     = toBC($soyz['musor']);

    // Складываем сумму и turnir_musor
    $sum_plus_turnir = bcadd($sum_musor_soyz_bc, $turnir_musor_bc, 8);

    // Обновляем, если значения не совпадают
    if (bccomp($sum_plus_turnir, $musor_soyz_bc, 8) !== 0) {
        $stmt_update = $mysqli->prepare("UPDATE soyz SET musor = ? WHERE id = ? LIMIT 1");
        $stmt_update->bind_param("si", $sum_plus_turnir, $soyz_id);
        $stmt_update->execute();
        $stmt_update->close();
    }
}








// Функция для получения пользователей
function getUsersFromDatabase($mysqli) {
    $stmt = $mysqli->prepare("SELECT u.id, u.login, u.passw, u.mine_time, u.mine_time_1, u.corp, u.soyz, u.bilet, u.rubin, u.en, u.time_expedition 
                              FROM auto_bot_user abu 
                              JOIN users u ON abu.user = u.id");
    $stmt->execute();
    $result = $stmt->get_result();
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'login' => $row['login'],
            'pass' => $row['passw'],
            'cookieFile' => 'cookie_' . strtolower($row['login']) . '.txt',
            'mine_time' => $row['mine_time'],
            'mine_time_1' => $row['mine_time_1'],
            'corp' => $row['corp'],
            'soyz' => $row['soyz'],
            'bilet' => $row['bilet'],
            'rubin' => $row['rubin'],
            'en' => $row['en'],
            'time_expedition' => $row['time_expedition']
        ];
    }
    $stmt->close();
    return $users;
}

// Проверка доступности сервера
function checkServerAvailability($checkUrl) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $checkUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Уменьшен таймаут
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Сервер недоступен: " . curl_error($ch) . "\n";
        curl_close($ch);
        return false;
    }
    curl_close($ch);
    echo "Сервер доступен. Продолжаем выполнение...\n";
    return true;
}

// Массив URL-адресов
$actionUrls = [
    "https://mars-games.ru/mine/?go/",
    "https://mars-games.ru/mine/work/?works",
    "https://mars-games.ru/Lottery/?buy",
    "https://mars-games.ru/garbage/?buy_all",
    "https://mars-games.ru/expedition/?Apid5",
    "https://mars-games.ru/pve/?vboy",
    "https://mars-games.ru/pve_boy/?attack/",
    "https://mars-games.ru/pve_boy/?manevr/",
    "https://mars-games.ru/garden/?buy_",
];




















function checkConditionsAndAddUrl($user, $url, $mysqli) {
    global $uniqueActionUrls;

    // Проверяем, чтобы ссылка не была дублирующейся
    if (in_array($url, $uniqueActionUrls)) {
        return;
    }

    // Получаем данные пользователя из базы данных
    $result = $mysqli->query("SELECT * FROM users WHERE login = '{$user['login']}'");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Ошибка при получении данных пользователя: {$mysqli->error}\n";
        return;
    }

    // Проверяем условия для каждой ссылки
    switch ($url) {
        case "https://mars-games.ru/Lottery/?buy":
            if ($row['bilet'] < 10 && $row['rubin'] > 500) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/garbage/?buy_all":
            $result = $mysqli->query("SELECT * FROM garbage_time WHERE user = '{$row['id']}' AND time < '" . time() . "'");
            if ($result && $result->num_rows > 0) {
                $garbage_time = $result->fetch_assoc();
                if ($garbage_time['time'] < time()) {
                    $uniqueActionUrls[] = $url;
                }
            }
            break;

        case "https://mars-games.ru/expedition/?Apid5":
            $result = $mysqli->query("SELECT * FROM expedition_user WHERE user = '{$row['id']}' OR pom_1 = '{$row['id']}' OR pom_2 = '{$row['id']}' OR pom_3 = '{$row['id']}' OR pom_4 = '{$row['id']}' OR pom_5 = '{$row['id']}'");
            if ($result && $result->num_rows > 0) {
                $expedition_user = $result->fetch_assoc();
                if ($row['time_expedition'] < time() && (isset($expedition_user['time']) ? $expedition_user['time'] : 0) < time()) {
                    $uniqueActionUrls[] = $url;
                }
            }
            break;

        case "https://mars-games.ru/pve/?vboy":
            $result = $mysqli->query("SELECT * FROM pve_zayavki WHERE user = '{$row['id']}'");
            if ($result && $result->num_rows == 0) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/pve_boy/?attack/":
            $result = $mysqli->query("SELECT * FROM pve_zayavki WHERE user = '{$row['id']}'");
            if ($result && $result->num_rows > 0) {
                $pve_user = $result->fetch_assoc();
                if ($pve_user['kill'] != 1) {
                    $uniqueActionUrls[] = $url;
                }
            }
            break;

        case "https://mars-games.ru/pve_boy/?manevr/":
            $result = $mysqli->query("SELECT * FROM pve_zayavki WHERE user = '{$row['id']}'");
            if ($result && $result->num_rows > 0) {
                $pve_user = $result->fetch_assoc();
                if ($pve_user['time_manevr'] < time()) {
                    $uniqueActionUrls[] = $url;
                }
            }
            break;

        case "https://mars-games.ru/garden/?buy_":
            $result = $mysqli->query("SELECT COUNT(*) FROM garden_plant_user WHERE user = '{$row['id']}' AND time < '" . time() . "' AND time > '0'");
            if ($result && $result->num_rows > 0) {
                $kolll = $result->fetch_row()[0];
                $cost_sbor = 7 * $kolll;
                if ($row['rubin'] > $cost_sbor && $row['en'] > $kolll) {
                    $uniqueActionUrls[] = $url;
                }
            }
            break;

        case "https://mars-games.ru/corp/{$user['corp']}/?boy/":
            $result = $mysqli->query("SELECT * FROM musor_time WHERE user = '{$row['id']}'");
            if ($result && $result->num_rows > 0) {
                $musor_time = $result->fetch_assoc();
                if ($musor_time['time'] > time()) {
                    $uniqueActionUrls[] = $url;
                }
            }
            break;

        case "https://mars-games.ru/corp/{$user['corp']}/?nagrada1/":
            $result = $mysqli->query("SELECT * FROM time_day WHERE user = '{$row['id']}'");
            if ($result && $result->num_rows > 0) {
                $time_day = $result->fetch_assoc();
                $result = $mysqli->query("SELECT * FROM fidelity WHERE user = '{$row['id']}'");
                if ($result && $result->num_rows > 0) {
                    $fidelity = $result->fetch_assoc();
                    if ($time_day['day'] >= 1 && $fidelity['time_1'] < time()) {
                        $uniqueActionUrls[] = $url;
                    }
                }
            }
            break;

        case "https://mars-games.ru/corp/{$user['corp']}/?nagrada7/":
            $time_day = $mysqli->query("SELECT * FROM time_day WHERE user = '{$row['id']}'")->fetch_assoc();
            $fidelity = $mysqli->query("SELECT * FROM fidelity WHERE user = '{$row['id']}'")->fetch_assoc();
            if ($time_day['day'] >= 7 && $fidelity['time_7'] < time()) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/corp/{$user['corp']}/?nagrada30/":
            $time_day = $mysqli->query("SELECT * FROM time_day WHERE user = '{$row['id']}'")->fetch_assoc();
            $fidelity = $mysqli->query("SELECT * FROM fidelity WHERE user = '{$row['id']}'")->fetch_assoc();
            if ($time_day['day'] >= 14 && $fidelity['time_14'] < time()) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/soyz/{$user['soyz']}/?boy/":
            $musor_time_soyz = $mysqli->query("SELECT * FROM musor_time_soyz WHERE user = '{$row['id']}'")->fetch_assoc();
            if ($musor_time_soyz && $musor_time_soyz['time'] > time()) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/soyz/{$user['soyz']}/?nagrada1/":
            $time_day_soyz = $mysqli->query("SELECT * FROM time_day_soyz WHERE user = '{$row['id']}'")->fetch_assoc();
            $fidelity_soyz = $mysqli->query("SELECT * FROM fidelity_soyz WHERE user = '{$row['id']}'")->fetch_assoc();
            if ($time_day_soyz['day'] >= 1 && $fidelity_soyz['time_1'] < time()) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/soyz/{$user['soyz']}/?nagrada7/":
            $time_day_soyz = $mysqli->query("SELECT * FROM time_day_soyz WHERE user = '{$row['id']}'")->fetch_assoc();
            $fidelity_soyz = $mysqli->query("SELECT * FROM fidelity_soyz WHERE user = '{$row['id']}'")->fetch_assoc();
            if ($time_day_soyz['day'] >= 7 && $fidelity_soyz['time_7'] < time()) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/soyz/{$user['soyz']}/?nagrada30/":
            $time_day_soyz = $mysqli->query("SELECT * FROM time_day_soyz WHERE user = '{$row['id']}'")->fetch_assoc();
            $fidelity_soyz = $mysqli->query("SELECT * FROM fidelity_soyz WHERE user = '{$row['id']}'")->fetch_assoc();
            if ($time_day_soyz['day'] >= 14 && $fidelity_soyz['time_14'] < time()) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/mine/?go/":
            if ($row['mine_time'] < time() && $row['mine_time_1'] < time()) {
                $uniqueActionUrls[] = $url;
            }
            break;

        case "https://mars-games.ru/mine/work/?works":
            if ($row['mine_time'] > time()) {
                $uniqueActionUrls[] = $url;
            }
            break;
    }
}













    $startLoop = microtime(true);
    echo "Начинаем новый цикл...\n";

    // Создание подключения к базе данных
    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_error) {
        die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
    }
    mysqli_set_charset($mysqli, "utf8");

    // Получаем список пользователей из базы данных
    $users = getUsersFromDatabase($mysqli);

    // Очищаем массив уникальных ссылок перед новым циклом
    $uniqueActionUrls = [];

    foreach ($users as $user) {
        echo "Обработка пользователя: {$user['login']}\n";

        // Проверяем каждую ссылку на соответствие условиям
        foreach ($actionUrls as $url) {
            checkConditionsAndAddUrl($user, $url, $mysqli);
        }
    }

    // Удаляем дубликаты из массива ссылок
    $uniqueActionUrls = array_unique($uniqueActionUrls);

    // Закрываем соединение с базой данных
    $mysqli->close();

    // Проверка доступности сервера
    if (!checkServerAvailability("https://mars-games.ru/")) {
        exit;
    }

    // Параллельные запросы с curl_multi_exec
    $mh = curl_multi_init();
    $multiCurl = [];
    $maxConcurrentRequests = 25; // Ограничение на количество параллельных запросов
    $currentRequests = 0;

    foreach ($uniqueActionUrls as $url) {
        if ($currentRequests >= $maxConcurrentRequests) {
            curl_multi_select($mh);
        }
        $ch = curl_init();
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_DNS_CACHE_TIMEOUT => 3600,
        ];
        curl_setopt_array($ch, $options);
        curl_multi_add_handle($mh, $ch);
        $multiCurl[] = $ch;
        $currentRequests++;
    }

    // Выполняем параллельные запросы
    $running = null;
    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);

    // Собираем результаты
    foreach ($multiCurl as $ch) {
        $response = curl_multi_getcontent($ch);
        $info = curl_getinfo($ch);
        echo "Ответ сервера для URL: {$info['url']}:\n";
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }

    curl_multi_close($mh);

    echo "Цикл завершен.\n";
    $endLoop = microtime(true);
    echo "<hr>Время выполнения цикла: " . ($endLoop - $startLoop) . " секунд\n<hr>";

?>
</body>
</html>
