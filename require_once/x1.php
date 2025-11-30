<?php
require_once ('../system/function.php');
//require_once ('../system/header.php');
//require_once ('../system/taimers.php');

if(!$user['id']) {
header('Location: /');
exit();
}
$fid = abs(intval($_GET['fid']));
$id = abs(intval($_GET['id']));
$x1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `user_biznes_1` WHERE `id` = '".$id."' and `user` = '".$user['id']."' "));
$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1' "));

if($x1 == 0){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'Такого бизнеса нету!';
exit();
}

if($x1['raz_kach'] >= $sql['max_lvl_biz']){
header('Location: '.$HOME.'?page='.$fid.'');
$_SESSION['err'] = 'Бизнес на максимальном уровне!';
exit();
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



// Преобразуем все используемые значения
$raz_kach = toBC($x1['raz_kach']);
$cena = toBC($x1['cena']);
$dohod = toBC($x1['dohod']);
$biznes_dohod = toBC($x1['biznes_dohod']);
$user_money = toBC($user['money']);
$user_dohod = toBC($user['dohod']);

if (bccomp($raz_kach, '50') >= 0) {
    $mon = bcdiv(bcmul($raz_kach, $raz_kach), '2', 0); // round()
    $userMoney = bcadd(bcmul($cena, $raz_kach), $mon);
} else {
    $userMoney = bcmul($cena, $raz_kach);
}

// Проверка денег
if (bccomp($user_money, $userMoney) < 0) {
    header('Location: ' . $HOME . '?page=' . $fid);
    $_SESSION['err'] = '<font color=red>Ошибка! Не хватает монет!</font> <br>
    <a href="'.$HOME.'menu/">Купить</a>';
    exit();
}

// Обновление таблиц
$new_biznes_dohod = bcadd($biznes_dohod, $dohod);
$new_raz_kach = bcadd($raz_kach, '1');

mysql_query("UPDATE `user_biznes_1` SET 
    `biznes_dohod` = '$new_biznes_dohod', 
    `raz_kach` = '$new_raz_kach'
    WHERE `id` = '$x1[id]' LIMIT 1");

$new_user_dohod = bcadd($user_dohod, $dohod);
$new_user_money = bcsub($user_money, $userMoney);

mysql_query("UPDATE `users` SET 
    `dohod` = '$new_user_dohod',
    `money` = '$new_user_money'
    WHERE `id` = '$user[id]' LIMIT 1");

header('Location: '.$HOME.'?page='.$fid);
//$_SESSION['ok'] = ''.$x1['name'].' улучшен!';
exit();
?> 