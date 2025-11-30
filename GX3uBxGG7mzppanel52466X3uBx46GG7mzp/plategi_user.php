<?php
$title = 'Платежи';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
/* if($user['id'] > 3){
header('Location: /');
exit();
} */
$grn = mysql_result(mysql_query("SELECT SUM(suma) FROM plategi WHERE `valuta` = '0' and `status` = '1' ;"), 0);
$rub = mysql_result(mysql_query("SELECT SUM(suma) FROM plategi WHERE `valuta` = '1' and `status` = '1' ;"), 0);
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">Всего оплачено: Грн <font color=black>'.ceil($grn).'</font> | Руб <font color=black>'.ceil($rub).'</font></span></li></ul></div>';


//mysql_query('DELETE FROM `plategi` WHERE `status` = "2" ');



if (empty($user['max'])) $user['max']=10;
$max = 50;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `plategi` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `plategi` WHERE `id` ORDER BY `id`  DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
echo '<div class="bordered mt4" style="padding: 5 4px 4px 5;">';
echo '<span class="fr nobr">
<a href="?ok_'.$r['id'].'/"><img src="/images/accept48.png" width="30" height="30" alt="Провести платеж" title="Провести платеж"></a>
<a href="?no_'.$r['id'].'/"><img src="/images/cross.png" width="24" height="24" alt="Отменить платеж" title="Отменить платеж"></a>
<a href="?del_'.$r['id'].'/"><img src="/images/1.png" width="24" height="24" alt="Удалить платеж" title="Удалить платеж"></a>
</span>';
if($r['ank'] != 0){
$ank = ' <font color=black size=4>|</font> '.nick($r['ank']).' ';
}else{
$ank = '';
}
echo ''.nick($r['user']).' '.$ank.' <br>';
echo '<b>Время:</b> <font color=black>'.vremja($r['time']).'</font> <br>';
if($r['valuta'] == 0){
$valuta = 'Грн';
$valuta1 = 0;
}else{
$valuta = 'Руб';
$valuta1 = 1;
}


if($r['status'] == 0){
$status = '<font color=red>Не обработан!</font>';
}
if($r['status'] == 1){
$status = '<font color=green>Обработан!</font>';
}
if($r['status'] == 2){
$status = '<font color=inianred>Отменен!</font>';
}


echo '<b>Статус:</b> '.$status.' <br>';
echo '<b>Сумма:</b> '.$r['suma'].' '.$valuta.' <br>';
echo '<b>Время оплаты:</b> <font color=black>'.$r['time_oplata'].'</font> <br>';
echo '<b>Способ оплаты:</b> <font color=black>'.$r['sposob'].'</font> <br>';
echo '<b>Рубины:</b> <font color=red><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.n_f($r['rubin']).'</font><br>';
echo '</div>';




$usr = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$r['user']."'"));


if(isset($_GET['ok_'.$r['id'].'/'])){

$_SESSION['err'] = 'Вы уверены, что хотите <b>Провести Платеж</b>?
<div class="mt4"><a class="btni accept" href="?ok'.$r['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['no_'.$r['id'].'/'])){
$_SESSION['err'] = 'Вы уверены, что хотите <b>Отменить Платеж</b>?
<div class="mt4"><a class="btni accept" href="?no'.$r['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['del_'.$r['id'].'/'])){
$_SESSION['err'] = 'Вы уверены, что хотите <b>Удалить Платеж</b>?
<div class="mt4"><a class="btni accept" href="?del'.$r['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}











if(isset($_GET['ok'.$r['id'].'/'])){ // Провести Платеж
if($user['id'] > 3){
header('Location: /');
exit();
}
mysql_query("UPDATE `plategi` SET `status` = '1' WHERE `id` = '$r[id]' LIMIT 1");

$cor = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$usr['corp']."'"));
$soy = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$usr['soyz']."'"));
$Collectible_items1 = mysql_fetch_array(mysql_query('SELECT * FROM `Collectible_items` WHERE `user` = "'.$usr['id'].'" and `collection` = "1" '));
$Collectible_items2 = mysql_fetch_array(mysql_query('SELECT * FROM `Collectible_items` WHERE `user` = "'.$usr['id'].'" and `collection` = "2" '));
$Collectible_items3 = mysql_fetch_array(mysql_query('SELECT * FROM `Collectible_items` WHERE `user` = "'.$usr['id'].'" and `collection` = "3" '));
$Collectible_items4 = mysql_fetch_array(mysql_query('SELECT * FROM `Collectible_items` WHERE `user` = "'.$usr['id'].'" and `collection` = "4" '));
/*if($usr['premium'] != 0){
header('Location: /');
$_SESSION['err'] = 'Покупка рубинов станет доступна после отключения Премиума.';
exit();
}*/

if($valuta1 == 0){
if($r['suma'] >= 5 && $r['suma'] < 25){$keys = 5;}
if($r['suma'] >= 25 && $r['suma'] < 50){$keys = 25;}
if($r['suma'] >= 50 && $r['suma'] < 100){$keys = 50;}
if($r['suma'] >= 100 && $r['suma'] < 250){$keys = 100;}
if($r['suma'] >= 250 && $r['suma'] < 500){$keys = 250;}
if($r['suma'] >= 500 && $r['suma'] < 1000){$keys = 500;}
if($r['suma'] >= 1000 && $r['suma'] < 2500){$keys = 1000;}
if($r['suma'] >= 2500){$keys = 2500;}
$gold = $r['suma'] / 0.005;
}else{
if($r['suma'] >= 10 && $r['suma'] < 50){$keys = 5;}
if($r['suma'] >= 50 && $r['suma'] < 100){$keys = 25;}
if($r['suma'] >= 100 && $r['suma'] < 200){$keys = 50;}
if($r['suma'] >= 200 && $r['suma'] < 500){$keys = 100;}
if($r['suma'] >= 500 && $r['suma'] < 1000){$keys = 250;}
if($r['suma'] >= 1000 && $r['suma'] < 2000){$keys = 500;}
if($r['suma'] >= 2000 && $r['suma'] < 5000){$keys = 1000;}
if($r['suma'] >= 5000){$keys = 2500;}
$gold = $r['suma'] / 0.01;
}

$where_rubin = ($gold + (($gold*$promotions['act_1'])/100) + (($gold*$r['suma'])/100)); // Итого Рб
$add_fund = (($where_rubin * $promotions['act_3']) / 100); // Бонус Кп
$add_fund_soyz = (($where_rubin * $promotions['act_4']) / 100); // Бонус Союзу

























##################################################################################################################################################################################

if($usr['spec_pred'] == 1 and $r['suma'] >= 100
or
$usr['spec_pred'] == 2 and $r['suma'] >= 200
or
$usr['spec_pred'] == 3 and $r['suma'] >= 500
or
$usr['spec_pred'] == 4 and $r['suma'] >= 1000
or
$usr['spec_pred'] == 5 and $r['suma'] >= 2000
or
$usr['spec_pred'] == 6 and $r['suma'] >= 5000){ // спец





if($usr['spec_pred'] == 1){
$musorr = 1000000000; // 100k (100 rub)
$time_mnogit = 10800; // 3ч
$rockandalmaz = 5000; // 5k
$mnog = 50;
$chests_name = 'Легендарный сундук'; // x2
$chests_k = 5;
$tip = 6;
$key = 100;
}
if($usr['spec_pred'] == 2){
$musorr = 2000000000; // 300k (200 rub)
$time_mnogit = 21600; // 6ч
$rockandalmaz = 10000; // 10k.
$mnog = 100;
$chests_name = 'Легендарный сундук'; // x5
$chests_k = 10;
$tip = 6;
$key = 200;
}
if($usr['spec_pred'] == 3){
$musorr = 5000000000; // 800k (500 rub)
$time_mnogit = 43200; // 0,5д
$rockandalmaz = 25000; // 25k
$mnog = 250;
$chests_name = 'Легендарный сундук'; // x4
$chests_k = 25;
$tip = 6;
$key = 500;
}
if($usr['spec_pred'] == 4){
$musorr = 10000000000; // 2m (1000 rub)
$time_mnogit = 86400; // 1д
$rockandalmaz = 50000; // 50k
$mnog = 500;
$chests_name = 'Легендарный сундук'; // x5
$chests_k = 50;
$tip = 6;
$key = 1000;
}
if($usr['spec_pred'] == 5){
$musorr = 20000000000; // 5m (2000 rub)
$time_mnogit = 172800; // 2д
$rockandalmaz = 100000; // 100k
$mnog = 1000;
$chests_name = 'Легендарный сундук'; // x10
$chests_k = 100;
$tip = 6;
$key = 2000;
}
if($usr['spec_pred'] == 6){
$musorr = 50000000000; // 15m (5000 rub)
$time_mnogit = 432000; // 5д
$rockandalmaz = 250000; // 250k
$mnog = 2500;
$chests_name = 'Легендарный сундук'; // x20
$chests_k = 250;
$tip = 6;
$key = 5000;
}





// Приводим к строкам для BCMath
$usr['musor_proc'] = toBC($usr['musor_proc']);
$usr['angel']      = toBC($usr['angel']);

// musorr = (musor_proc * (key / 5)) / 100
// Используем bcmath для всех операций
$musorr = bcdiv(
    bcmul($usr['musor_proc'], bcdiv((string)$key, '5', 10), 10),
    '100',
    10
);

// Для angels в каждом условии используем bcmul
if ($usr['spec_pred'] == 1 and $r['suma'] >= 100) {
    $predmet = 5;
    $kard = $promotions['act_2'];
    $xxx = 10;
    $angels = bcmul($usr['angel'], '2', 10);
    $mon = $musorr;
    $key = 50;
}
if ($usr['spec_pred'] == 2 and $r['suma'] >= 200) {
    $predmet = 7;
    $kard = $promotions['act_2'];
    $xxx = 15;
    $angels = bcmul($usr['angel'], '4', 10);
    $mon = $musorr;
    $key = 100;
}
if ($usr['spec_pred'] == 3 and $r['suma'] >= 500) {
    $predmet = 9;
    $kard = $promotions['act_2'];
    $xxx = 20;
    $angels = bcmul($usr['angel'], '10', 10);
    $mon = $musorr;
    $key = 250;
}
if ($usr['spec_pred'] == 4 and $r['suma'] >= 1000) {
    $predmet = 12;
    $kard = $promotions['act_2'];
    $xxx = 25;
    $angels = bcmul($usr['angel'], '20', 10);
    $mon = $musorr;
    $key = 500;
}
if ($usr['spec_pred'] == 5 and $r['suma'] >= 2000) {
    $predmet = 15;
    $kard = $promotions['act_2'];
    $xxx = 35;
    $angels = bcmul($usr['angel'], '40', 10);
    $mon = $musorr;
    $key = 1000;
}
if ($usr['spec_pred'] == 6 and $r['suma'] >= 5000) {
    $predmet = 20;
    $kard = $promotions['act_2'];
    $xxx = 50;
    $angels = bcmul($usr['angel'], '100', 10);
    $mon = $musorr;
    $key = 2500;
}

$pay_textt_ = '<font color=red>Специальное предложение!</font>
Получено '.$predmet.' случайных предметов с последней восьмерки
<font color=black size=3> | </font>
 '.$kard.' карт с множителем х'.$xxx.' 
<font color=black size=3> | </font> 
<img width="20" height="20" src="/images/ruby.png"> <font color=red size=2>'.n_f($r['rubin']).'</font>
<font color=black size=3> | </font>
<img width="20" height="20" src="/images/header/money_36.png"> <font size=2>'.n_f($mon).'%</font>
<font color=black size=3> | </font>
<img width="20" height="20" src="/images/VIP/udvoitel.png"> <font size=2>х'.$mnog.' на </font> <font size=1 color=black>(+'.($time_mnogit/3600).'ч.) [<span id="time_'.(($usr['time_boy']-time())+$time_mnogit).'000">'._time(($usr['time_boy']-time())+$time_mnogit).'</span>]</font>
<font color=black size=3> | </font>
<img width="20" height="20" src="/chests/key.png"> <font size=2>'.$key.'шт.</font>';



/*
<font color=black size=3> | </font>
<img width="20" height="20" src="/images/angel48.png"> <font size=2>'.n_f($angels).'</font>
<font color=black size=3> | </font>
<img width="20" height="20" src="/images/Diamonds.png"> <font size=2>'.n_f($rockandalmaz).'</font>
<font color=black size=3> | </font>
<img width="20" height="20" src="/images/colections/22.png"> <font size=2>'.n_f($rockandalmaz).'</font>';
*/




$chest = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $chests_k");
$che = mysql_fetch_array ($chest);
do {
mysql_query("INSERT INTO `chests_history` SET `user` = '".$usr['id']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$usr['id']."', `tip` = '".$tip."' ");
} while ($che = mysql_fetch_array ($chest));
$txt = 'Вы получили '.$chests_k.'шт. <b>'.$chests_name.'</b>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$usr['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$usr['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$usr['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$usr['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$usr['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$usr['id']."', `time` = '".time()."', `readlen` = '0'");




$kardd = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $kard");
$kad = mysql_fetch_array ($kardd);
do {
$rand = rand(1,20);
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".mysql_real_escape_string($usr['id'])."', `images` = '".$rand."', `xxx` = '".$xxx."' ");
} while ($kad = mysql_fetch_array ($kardd));




$predmett = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $predmet");
$pred = mysql_fetch_array ($predmett);
do {
$rand_item = rand(31,38);
if(!$Collectible_items4){
mysql_query("INSERT INTO `Collectible_items` SET `item_".($rand_item-30)."` = '1', `time` = '".(time()+1800)."', `user` = '".$usr['id']."', `collection` = '4' ");
}else{
mysql_query("UPDATE `Collectible_items` SET `item_".($rand_item-30)."` = '".($Collectible_items4['item_'.($rand_item-30).''] + 1)."', `time` = '".(time()+1800)."' WHERE `user` = '".$usr['id']."' and `collection` = '4' LIMIT 1");
}
} while ($pred = mysql_fetch_array ($predmett));

$usr_Achievements_user_27 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$user['id'].'" and `number` = "27" '));
if($usr_Achievements_user_27['prog'] < $usr_Achievements_user_27['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($usr_Achievements_user_27['prog']+$predmet)."' WHERE `id` = '".$usr_Achievements_user_27['id']."' ");
}

//`Diamonds` = '".($usr['Diamonds']+ $rockandalmaz )."', 
//`rock` = '".($usr['rock']+ $rockandalmaz )."',
if($usr['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($usr['boy'] = 6 )."', `time_boy` = '".($usr['time_boy'] + $time_mnogit)."', `mnogit_boy` = '".($usr['mnogit_boy'] + $mnog)."'  WHERE `id` = '".$usr['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($usr['boy'] = 6 )."', `time_boy` = '".($usr['time_boy'] = (time()+$time_mnogit) )."', `mnogit_boy` = '".($usr['mnogit_boy'] = $mnog)."' WHERE `id` = '".$usr['id']."' ");
}
//mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soy['Diamonds']+$rockandalmaz)."' WHERE `id` = '".$soy['id']."' LIMIT 1 ");
mysql_query(
    "UPDATE `users` 
     SET 
        `spec_pred` = '0', 
        `pred_time` = '0', 
        `musor_proc` = '" . bcadd($usr['musor_proc'], $musorr, 10) . "' 
     WHERE `id` = '" . intval($usr['id']) . "' "
);
// `angel` = '".($usr['angel']+ $angels )."',

// Обновляем союз
mysql_query(
    "UPDATE `soyz` 
     SET 
        `turnir_musor_1` = '" . bcadd($soy['turnir_musor_1'], $musorr, 10) . "' 
     WHERE `id` = '" . intval($soy['id']) . "' 
     LIMIT 1"
);
if($r['suma'] < 100 ){
$qwert = $r['rubin'];
}else{
$qwert = ($r['rubin']*2);
}
mysql_query("UPDATE `users` SET `spec_pred` = '0', `pred_time` = '0', `key` = '".($usr['key']+($key*2))."', `rubin` = '".($usr['rubin']+$qwert)."', `musor_proc` = '".($usr['musor_proc']+ $mon )."' WHERE `id` = '".$usr['id']."' ");
// `angel` = '".($usr['angel']+ $angels )."',


$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$usr['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$usr['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$usr['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$usr['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$usr['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_textt_."', `kto` = '2', `komy` = '".$usr['id']."', `time` = '".time()."', `readlen` = '0'");
}
##################################################################################################################################################################################








// Приводим к строкам с высокой точностью
$usr['angel'] = toBC($usr['angel']);
$usr['musor_proc'] = toBC($usr['musor_proc']);
$act_20 = toBC($promotions['act_20']);

// Вычисляем проценты через bc
$angels = bcdiv(bcmul($usr['angel'], $act_20, 10), '100', 10);
$musors = bcdiv(bcmul($usr['musor_proc'], $act_20, 10), '100', 10);

$ang = '0';
$mus = '0';

// Условные блоки тоже через bc
if($r['suma'] >= 10 && $r['suma'] < 50){
    $ang = bcmul(bcdiv($angels, '5000', 10), '10', 10);
    $mus = bcmul(bcdiv($musors, '5000', 10), '10', 10);
}elseif($r['suma'] >= 50 && $r['suma'] < 100){
    $ang = bcmul(bcdiv($angels, '2000', 10), '50', 10);
    $mus = bcmul(bcdiv($musors, '2000', 10), '50', 10);
}elseif($r['suma'] >= 100 && $r['suma'] < 200){
    $ang = bcmul(bcdiv($angels, '1000', 10), '100', 10);
    $mus = bcmul(bcdiv($musors, '1000', 10), '100', 10);
}elseif($r['suma'] >= 200 && $r['suma'] < 500){
    $ang = bcmul(bcdiv($angels, '500', 10), '200', 10);
    $mus = bcmul(bcdiv($musors, '500', 10), '200', 10);
}elseif($r['suma'] >= 500 && $r['suma'] < 1000){
    $ang = bcmul(bcdiv($angels, '200', 10), '500', 10);
    $mus = bcmul(bcdiv($musors, '200', 10), '500', 10);
}elseif($r['suma'] >= 1000 && $r['suma'] < 2000){
    $ang = bcmul(bcdiv($angels, '100', 10), '1000', 10);
    $mus = bcmul(bcdiv($musors, '100', 10), '1000', 10);
}elseif($r['suma'] >= 2000 && $r['suma'] < 5000){
    $ang = bcmul(bcdiv($angels, '50', 10), '2000', 10);
    $mus = bcmul(bcdiv($musors, '50', 10), '2000', 10);
}elseif($r['suma'] >= 5000){
    $ang = bcmul(bcdiv($angels, '10', 10), '5000', 10);
    $mus = bcmul(bcdiv($musors, '10', 10), '5000', 10);
}

// Обновление значений через mysql_query с bcadd
if($promotions['promotion_20'] == 1){
    $newAngel = bcadd($usr['angel'], $ang, 10);
    mysql_query("UPDATE `users` SET `angel` = '".$newAngel."' WHERE `id` = '".intval($usr['id'])."' ");
    $txt_act_20 = '| <img src="/images/angel48.png" alt="$" width="24" height="24">'.n_f($ang);
}elseif($promotions['promotion_20'] == 2){
    $newMusor = bcadd($usr['musor_proc'], $mus, 10);
    mysql_query("UPDATE `users` SET `musor_proc` = '".$newMusor."' WHERE `id` = '".intval($usr['id'])."' ");
    $txt_act_20 = '| <img src="/images/header/money_36.png" alt="o" width="24" height="24">'.n_f($mus).'%';
}elseif($promotions['promotion_20'] == 3){
    $newAngel = bcadd($usr['angel'], $ang, 10);
    $newMusor = bcadd($usr['musor_proc'], $mus, 10);
    mysql_query("UPDATE `users` SET `musor_proc` = '".$newMusor."', `angel` = '".$newAngel."' WHERE `id` = '".intval($usr['id'])."' ");
    $txt_act_20 = '| <img src="/images/angel48.png" alt="$" width="24" height="24">'.n_f($ang).' <img src="/images/header/money_36.png" alt="o" width="24" height="24">'.n_f($mus).'%';
}








##################################################################################################################################################################################
$rand_item = rand(31,38);
if(!$Collectible_items4){
mysql_query("INSERT INTO `Collectible_items` SET `item_".($rand_item-30)."` = '1', `time` = '".(time()+1800)."', `user` = '".$usr['id']."', `collection` = '4' ");
}else{
mysql_query("UPDATE `Collectible_items` SET `item_".($rand_item-30)."` = '".($Collectible_items4['item_'.($rand_item-30).''] + 1)."', `time` = '".(time()+1800)."' WHERE `user` = '".$usr['id']."' and `collection` = '4' LIMIT 1");
}

if($r['suma'] < 100 ){
$qwert = $r['rubin'];
}else{
$qwert = ($r['rubin']*2);
}
mysql_query("UPDATE `users` SET `key` = '".($usr['key'] + ($keys*2))."', `rubin` = '".($usr['rubin'] + $qwert)."', `limitation` = '".($usr['limitation'] + $r['rubin'])."' WHERE `id` = '".$usr['id']."' ");
$usr_mission_user_27 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$usr['id'].'" and `number` = "27" '));
if($usr_mission_user_27['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($usr_mission_user_27['prog_']+$r['rubin'])."' WHERE `id` = '".$usr_mission_user_27['id']."' ");
}

$usr_Achievements_user_26 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$usr['id'].'" and `number` = "26" '));
if($usr_Achievements_user_26['prog'] < $usr_Achievements_user_26['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($usr_Achievements_user_26['prog']+$where_rubin)."' WHERE `id` = '".$usr_Achievements_user_26['id']."' ");
}


if($usr['corp'] >= 1){
if($promotions['promotion_3'] == 1){
mysql_query("UPDATE `users` SET `corp_rubin` = '".($usr['corp_rubin'] + $add_fund )."' WHERE `id` = '$usr[id]' LIMIT 1");
mysql_query("UPDATE `corp` SET `rubin` = '".($cor['rubin'] + $add_fund)."' WHERE `id` = '$cor[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($usr['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Корпорации <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund.' (Покупка)</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$usr['corp']."', `text` = '$text', `time` = '".time()."'");
}
}

if($usr['soyz'] >= 1){
if($promotions['promotion_4'] == 1){
mysql_query("UPDATE `users` SET `soyz_rubin` = '".($usr['soyz_rubin'] + $add_fund_soyz )."' WHERE `id` = '$usr[id]' LIMIT 1");
mysql_query("UPDATE `soyz` SET `rubin` = '".($soy['rubin'] + $add_fund_soyz)."' WHERE `id` = '".$usr['soyz']."' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($usr['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Союза <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund_soyz.' (Покупка)</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$usr['soyz']."', `text` = '$text', `time` = '".time()."'");
}
}

if($usr['referals'] > 0){
$coins = round($where_rubin / 5);
mysql_query('UPDATE `users` SET `rubin` =`rubin`+ '.$coins.' WHERE `id` = '.$usr['referals'].'');
$texz = 'Здравствуйте! Я один из ваших рефералов! Я купил  '.$where_rubin.'  рубинов! Ваша реферальная доля + '.$coins.' рубинов!';
$textz = strong($texz);
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$usr['referals']."' and `kto` = '".$usr['id']."' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '".$usr['id']."', `kogo` = '".$usr['referals']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$usr['referals']."', `kogo` = '".$usr['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '".$usr['id']."' and `kto`='".$usr['referals']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '".$usr['id']."' and `kogo`='".$usr['referals']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$textz."', `kto` = '".$usr['id']."', `komy` = '".$usr['referals']."', `time` = '".time()."', `readlen` = '0'");
}


$pay_text = '<b>Платеж Проведен!</b> Ваш баланс пополнен на <img width="20" height="20" alt="Рубины" src="/images/ruby.png" title="Рубины"> '.n_f($r['rubin']).' '.$txt_act_20.' <br>
Бонус: <img width="20" height="20" src="/chests/key.png"> <font size="2">'.$keys.'шт.</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$usr['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$usr['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$usr['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$usr['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$usr['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$usr['id']."', `time` = '".time()."', `readlen` = '0'");
$_SESSION['err'] = '<b>Платеж Проведен!</b>';
header('Location: ?');
exit();
##################################################################################################################################################################################
}





























if(isset($_GET['no'.$r['id'].'/'])){ // Отменить Платеж
if($user['id'] > 3){
header('Location: /');
exit();
}
mysql_query("UPDATE `plategi` SET `status` = '2' WHERE `id` = '$r[id]' LIMIT 1");
$text = '<b>Платеж Отменен!</b>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r['user']."', `time` = '".time()."', `readlen` = '0'");
///mysql_query('DELETE FROM `plategi` WHERE `id` = "'.$r['id'].'" ');
$_SESSION['err'] = ' <b>Платеж Отменен!</b>';
header('Location: ?');
exit();
}





if(isset($_GET['del'.$r['id'].'/'])){
if($user['id'] > 3){
header('Location: /');
exit();
}
mysql_query('DELETE FROM `plategi` WHERE `id` = "'.$r['id'].'" ');
$_SESSION['err'] = '<b>Платеж Удален!</b>';
header('Location: ?');
exit();
}



}









require_once ('../system/footer.php');
?>