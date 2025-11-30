<?php
include '../system/function.php';
include_once __DIR__ . '/sett.php';
include_once __DIR__ . '/WapkassaClass.php';

try {
    // Инициализация класса с id сайта и секретным ключом
    $wapkassa = new WapkassaClass(WK_ID, WK_SECRET);

    // Проверка обработчика (PING)
    if ($wapkassa->ping($_POST)) {
        // возврат успешной проверки
        echo $wapkassa->successPing();
    } else {
        // Парсинг входящих параметров
        $params = $wapkassa->parseRequest($_POST);

        $params['id']; // id платежа в системе wapkassa
        $params['site_id']; // id площадки
        $params['time']; // время оплаты в unixtime
        $params['comm']; // комментарий платежа
        $params['amount']; // сумма платежа
        $params['add']; // массив с допольнительными параметрами

        // собственный код зачисления платежа на сайте
if ($params['add']['type'] == 'gold' && !empty($wk_cena_gold[$params['add']['count']]) && $wk_cena_gold[$params['add']['count']] <= $params['amount']) {

$gold = $params['add']['count'];
$summa = $params['amount'];

$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$params['add']['user_id']."'"));
$corp = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$user['corp']."'"));
$soyz = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$user['soyz']."'"));

/*
if($user['id'] != 38){
header('Location: /');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно.</font>';
exit();
}
*/

if($gold==1 and $user['pay_1'] == 1){
header('Location: /newpresent/');
exit();
}
if($gold==2 and $user['pay_2'] == 1){
header('Location: /newpresent/');
exit();
}
if($gold==3 and $user['pay_3'] == 1){
header('Location: /newpresent/');
exit();
}
if($gold==4 and $user['pay_4'] == 1){
header('Location: /newpresent/');
exit();
}
if($gold==5 and $user['pay_5'] == 1){
header('Location: /newpresent/');
exit();
}
if($gold==6 and $user['pay_6'] == 1){
header('Location: /newpresent/');
exit();
}


mysql_query("INSERT INTO `worldkassa` SET `id_bill` = '".$params['id']."', 
`id_user` = '".$user['id']."', 
`time` = '".time()."', 
`time_oplata` = '".time()."', 
`summa` = '".$params['amount']."' ");




if($gold==1){
$an_g = 1000000000000000000000000000000000000000000000000000000000000000;
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$an_g).'", `pay_1` = "1" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$an_g)."' WHERE `id` = '".$corp['id']."' LIMIT 1");
$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($an_g).'</font>';
}
if($gold==2){
$mu_s = 10000000000000;
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$mu_s).'", `pay_2` = "1"  WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$mu_s)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($mu_s).'%</font>';
}
if($gold==3){
$rb = 15000000;
mysql_query('UPDATE `users` SET `rubin` = "'.($user['rubin']+$rb).'", `pay_3` = "1"  WHERE `id` = '.$user['id'].' LIMIT 1');
$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/ruby.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($rb).'</font>';
}

if($gold==4){
$an_g = 1000000000000000000000000000000000000000000000000000000000000000000;
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$an_g).'", `pay_4` = "1"  WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$an_g)."' WHERE `id` = '".$corp['id']."' LIMIT 1");
$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($an_g).'</font>';
}
if($gold==5){
$mu_s = 1000000000000000;
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$mu_s).'", `pay_5` = "1"  WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$mu_s)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($mu_s).'%</font>';
}
if($gold==6){
$rb = 150000000;
mysql_query('UPDATE `users` SET `rubin` = "'.($user['rubin']+$rb).'", `pay_6` = "1"  WHERE `id` = '.$user['id'].' LIMIT 1');
$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/ruby.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($rb).'</font>';
}


$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");


















}
        // возврат успешной обработки
        echo $wapkassa->successPayment();
		
    }
} catch (Exception $e) {
    // вывод ошибки
    echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
}