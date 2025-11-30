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
$sql_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1' "));
$promotions = mysql_fetch_assoc(mysql_query("SELECT * FROM `promotions` WHERE `id`  = '1' "));

$premium = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium` WHERE `user` = '".$user['id']."' "));
$premium_musor = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium_musor` WHERE `user` = '".$user['id']."' "));
/*
if($user['id'] != 38){
header('Location: /');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно.</font>';
exit();
}
*/
if($premium['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($premium_musor['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($user['vip_pay'] == 1){
header('Location: /');
exit();
}




/*
if ($user['id'] != 12){
header('Location: /');
$_SESSION['err'] = '<font color=red>Временная ошибка!</font>';
exit();
}
*/

$card_1 = ceil(15*$sql_['col_mis_turnir']);
$card_2 = ceil(15*$sql_['col_mis_turnir']);
$chest_col = ceil(15*$sql_['col_mis_turnir']);
$rand = rand(1,20);

mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$card_1."' ");
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$card_2."' ");

$chest = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $chest_col");
$che = mysql_fetch_array ($chest);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '6' ");
} while ($che = mysql_fetch_array ($chest));

mysql_query('UPDATE `users` SET `gradient` = "1", `vip_nagrada` = "1", `vip_pay` = "1" WHERE `id` = '.$user['id'].'');






$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angel_ = (($ang__['angel']*0.5/100)*($sql_['col_mis_turnir']));
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$angel_).'" WHERE `id` = '.$user['id'].'');
mysql_query("UPDATE `soyz` SET `angel` = '".($corp['angel']+$angel_)."', `turnir_angel_1` = '".($corp['turnir_angel_1']+$angel_)."' WHERE `id` = '".$corp['id']."' LIMIT 1");
}
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){
$musor_ = (($mus__['musor_proc']*0.5/100)*($sql_['col_mis_turnir']));
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$musor_).'" WHERE `id` = '.$user['id'].'');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$musorr)."', `turnir_musor_1` = '".($soyz['turnir_musor_1']+$musorr)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
}


$pay_text = '<b>ViP награда недели</b> 
получена карта х'.$card_1.' <font color="black" size="3"> | </font> 
получена карта х'.$card_2.' <font color="black" size="3"> | </font>
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($angel_).'</font><font color="black" size="3"> | </font>
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($musor_).'%</font></font><font color="black" size="3"> | </font>
<img width="24" height="24" src="/chests/chests/6.png"> '.$chest_col.'шт.
 ';
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