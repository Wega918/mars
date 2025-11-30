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

require_once('../system/config.php');

// Подключение к базе данных
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}


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



// Получаем пользователей для обработки
$result = $mysqli->query("SELECT id FROM users WHERE id IN (1)");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " | ";
        $user_id = (int)$row['id'];
        $time_now = time();

        // Получаем данные пользователя
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        ###################################################################################################
        // Получаем миссии и достижения
        $stmt = $mysqli->prepare("SELECT * FROM mission_user WHERE user = ? AND number = ?");
        
        // Миссия 23
        $number = 23;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $mission_user_23 = $stmt->get_result()->fetch_assoc();
        
        // Миссия 25
        $number = 25;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $mission_user_25 = $stmt->get_result()->fetch_assoc();
        
        // Достижение 22
        $stmt = $mysqli->prepare("SELECT * FROM Achievements_user WHERE user = ? AND number = ?");
        $number = 22;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $achievements_user_22 = $stmt->get_result()->fetch_assoc();
        
        // Достижение 24
        $number = 24;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $achievements_user_24 = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // Подсчёты
        $stmt = $mysqli->prepare("SELECT SUM(harvest + level) FROM garden_plant_user WHERE user = ? AND time < ? AND time > 0");
        $stmt->bind_param("ii", $user_id, $time_now);
        $stmt->execute();
        $harvest_sum = (int)$stmt->get_result()->fetch_row()[0];
        $stmt->close();
        
        $stmt = $mysqli->prepare("SELECT COUNT(*) FROM garden_plant_user WHERE user = ? AND time < ? AND time > 0");
        $stmt->bind_param("ii", $user_id, $time_now);
        $stmt->execute();
        $kolll = (int)$stmt->get_result()->fetch_row()[0];
        $stmt->close();
        
        $cost_sbor = 7 * $kolll;

        if ($harvest_sum > 0 && $user['rubin'] >= $cost_sbor) {
            // Получаем растения для обновления
            $stmt = $mysqli->prepare("SELECT * FROM garden_plant_user WHERE user = ? AND time < ? AND time > 0");
            $stmt->bind_param("ii", $user_id, $time_now);
            $stmt->execute();
            $plants_result = $stmt->get_result();
            
            while ($plant = $plants_result->fetch_assoc()) {
                $stmt = $mysqli->prepare("SELECT * FROM garden_user WHERE user = ? AND images = ?");
                $stmt->bind_param("is", $user_id, $plant['images']);
                $stmt->execute();
                $garden_user = $stmt->get_result()->fetch_assoc();
                $stmt->close();
                
                $plant_time = $time_now + (int)$garden_user['time'];
                
                $stmt = $mysqli->prepare("UPDATE garden_plant_user SET name = ?, time = ?, harvest = ?, images = ? WHERE id = ?");
                $stmt->bind_param("siisi", $plant['name'], $plant_time, $plant['harvest'], $plant['images'], $plant['id']);
                $stmt->execute();
                $stmt->close();
            }

            // Обновляем данные пользователя
            $stmt = $mysqli->prepare("UPDATE users SET rubin = rubin - ?, en = en - ?, leaf = leaf + ? WHERE id = ?");
            $stmt->bind_param("iiii", $cost_sbor, $kolll, $harvest_sum, $user_id);
            $stmt->execute();
            $stmt->close();

            // Обновляем миссии и достижения
            if ($mission_user_23 && $mission_user_23['time_restart'] == 0) {
                $stmt = $mysqli->prepare("UPDATE mission_user SET prog_ = prog_ + 1 WHERE id = ?");
                $stmt->bind_param("i", $mission_user_23['id']);
                $stmt->execute();
                $stmt->close();
            }
            
            if ($mission_user_25 && $mission_user_25['time_restart'] == 0) {
                $stmt = $mysqli->prepare("UPDATE mission_user SET prog_ = prog_ + ? WHERE id = ?");
                $stmt->bind_param("ii", $kolll, $mission_user_25['id']);
                $stmt->execute();
                $stmt->close();
            }

            if ($achievements_user_22 && $achievements_user_22['prog'] < $achievements_user_22['prog_max']) {
                $stmt = $mysqli->prepare("UPDATE Achievements_user SET prog = prog + 1 WHERE id = ?");
                $stmt->bind_param("i", $achievements_user_22['id']);
                $stmt->execute();
                $stmt->close();
            }
            
            if ($achievements_user_24 && $achievements_user_24['prog'] < $achievements_user_24['prog_max']) {
                $stmt = $mysqli->prepare("UPDATE Achievements_user SET prog = prog + ? WHERE id = ?");
                $stmt->bind_param("ii", $kolll, $achievements_user_24['id']);
                $stmt->execute();
                $stmt->close();
            }
        }
        ###################################################################################################

        // Лотерея
        $bilet_coll = $mysqli->query("SELECT COUNT(*) FROM `bilet`")->fetch_row()[0];
        $Lottery = $mysqli->query('SELECT * FROM `Lottery` WHERE `id` = 1')->fetch_assoc();
        
        // Получаем миссии и достижения для лотереи
        $stmt = $mysqli->prepare("SELECT * FROM mission_user WHERE user = ? AND number = ?");
        
        // Миссия 6
        $number = 6;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $mission_user_6 = $stmt->get_result()->fetch_assoc();
        
        // Миссия 7
        $number = 7;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $mission_user_7 = $stmt->get_result()->fetch_assoc();
        
        // Достижение 5
        $stmt = $mysqli->prepare("SELECT * FROM Achievements_user WHERE user = ? AND number = ?");
        $number = 5;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $Achievements_user_5 = $stmt->get_result()->fetch_assoc();
        
        // Достижение 6
        $number = 6;
        $stmt->bind_param("ii", $user_id, $number);
        $stmt->execute();
        $Achievements_user_6 = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // Цены билетов
        $prices = array(10, 17, 24, 31, 38, 45, 52, 59, 66, 73);
        $cena = isset($prices[$user['bilet']]) ? $prices[$user['bilet']] : 0;

        if ($user['bilet'] < 10 && $user['rubin'] >= $cena) {
            // Определяем выигрыш
            $winning_numbers = array($Lottery['N1'], $Lottery['N2'], $Lottery['N3'], $Lottery['N4'], $Lottery['N5'], $Lottery['jackpot']);
            $rubin = in_array($bilet_coll, $winning_numbers) ? 
                ($bilet_coll == $Lottery['jackpot'] ? $Lottery['jackpot_rubin'] : $nagrada_za_odin_bilet) : 0;

            // Добавляем билет
            $stmt = $mysqli->prepare("INSERT INTO `bilet` SET `user` = ?, `rubin` = ?");
            $stmt->bind_param("ii", $user_id, $rubin);
            $stmt->execute();
            $stmt->close();
            
            // Обновляем пользователя
            $new_bilet_count = $user['bilet'] + 1;
            $new_rubin_count = $user['rubin'] - $cena;
            $stmt = $mysqli->prepare("UPDATE `users` SET `bilet` = ?, `rubin` = ? WHERE `id` = ?");
            $stmt->bind_param("iii", $new_bilet_count, $new_rubin_count, $user_id);
            $stmt->execute();
            $stmt->close();
            
            // Обновляем лотерею
            $new_bilets_total = $Lottery['bilets'] + 1;
            $stmt = $mysqli->prepare("UPDATE `Lottery` SET `bilets` = ? WHERE `id` = 1");
            $stmt->bind_param("i", $new_bilets_total);
            $stmt->execute();
            $stmt->close();

            // Обновляем миссии и достижения
            if ($mission_user_6 && $mission_user_6['time_restart'] == 0) {
                $stmt = $mysqli->prepare("UPDATE `mission_user` SET `prog_` = `prog_` + 1 WHERE `id` = ?");
                $stmt->bind_param("i", $mission_user_6['id']);
                $stmt->execute();
                $stmt->close();
            }
            
            if ($Achievements_user_5 && $Achievements_user_5['prog'] < $Achievements_user_5['prog_max']) {
                $stmt = $mysqli->prepare("UPDATE `Achievements_user` SET `prog` = `prog` + 1 WHERE `id` = ?");
                $stmt->bind_param("i", $Achievements_user_5['id']);
                $stmt->execute();
                $stmt->close();
            }
            
                if ($mission_user_7 && $mission_user_7['time_restart'] == 0) {
                    $stmt = $mysqli->prepare("UPDATE `mission_user` SET `prog_` = `prog_` + 1 WHERE `id` = ?");
                    $stmt->bind_param("i", $mission_user_7['id']);
                    $stmt->execute();
                    $stmt->close();
                }
                
                if ($Achievements_user_6 && $Achievements_user_6['prog'] < $Achievements_user_6['prog_max']) {
                    $stmt = $mysqli->prepare("UPDATE `Achievements_user` SET `prog` = `prog` + 1 WHERE `id` = ?");
                    $stmt->bind_param("i", $Achievements_user_6['id']);
                    $stmt->execute();
                    $stmt->close();
                }
        }
        ###################################################################################################
    }
} else {
    echo "Нет данных";
}

// Закрытие соединения
$mysqli->close();

$endLoop = microtime(true);
echo "<hr>Время выполнения цикла: " . ($endLoop - $start) . " секунд\n<hr>";
?>
</body>
</html>