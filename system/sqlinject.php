<?php

$time = time();
$bad_words = "UNION SELECT UPDATE INSERT schemata r57shell remview config= OUTFILE%20 passwd wget cmd= union javascript: echr( esystem( INSERT%20INTO '$_REQUEST FROM DROP TRUNCATE <script> </script> javascript group_access document.cookie alert() eval() system() OUTFILE INTO";
$bad_list = explode(' ', $bad_words);
$line = $_POST ? implode(" ", $_POST) : $_SERVER['QUERY_STRING'];
$Gde = $_SERVER['SCRIPT_NAME'];
$Site = $_SERVER['SERVER_NAME'];
$Ip = $_SERVER['REMOTE_ADDR'];
$Cuseragent = $_SERVER['HTTP_USER_AGENT'];
$Querry = $_SERVER['QUERY_STRING'];

// Добавляем логирование данных из формы
$formData = $_POST ? json_encode($_POST, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) : 'Нет данных';

foreach ($bad_list as $re) {
    $msghack = '' . $user['login'] . ' | Подозрительный запрос <font color=8B0000> <br><b>' . $Site . '' . $Gde . '?' . $Querry . '</b></font><br>
<font color=green>IP: ' . $Ip . ' , Софт: ' . $Cuseragent . '</font><br>
Данные формы: <pre>' . htmlspecialchars($formData, ENT_QUOTES, 'UTF-8') . '</pre>';

    $re = preg_quote($re, '/');
    if (preg_match("/$re/i", $line)) {
        $con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"), 0);
        if ($con == 0) {
            mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '" . time() . "', `posl_time` = '" . time() . "'");
            mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '" . time() . "', `posl_time` = '" . time() . "'");
        }
        mysql_query("UPDATE `message_c` SET `posl_time`='" . time() . "' WHERE `kogo` = '2' and `kto`='1' LIMIT 1");
        mysql_query("UPDATE `message_c` SET `posl_time`='" . time() . "' WHERE `kto` = '2' and `kogo`='1' LIMIT 1");
        mysql_query("INSERT INTO `message` SET `text` = '" . $msghack . "', `kto` = '2', `komy` = '1', `time` = '" . time() . "', `readlen` = '0'");

        die("" . header("Location: ?") . "");
    }
}
?>
