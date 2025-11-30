<?php
$title = 'Мои грядки';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
require_once ('../garden/taimers1.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
/*
if($user['id'] != 1) {
$_SESSION['err'] = 'Техработы...';
header('Location: '.$HOME.'garden/');
exit();
}
*/


echo '<div class="content">
<a class="fl"><img width="25" height="45" src="/images/index/left_grey.png"></a>
<a class="fr"><img width="25" height="45" src="/images/index/right_grey.png"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="?"><span>Помощь садовникам</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';



$garden_plant_user_active = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user_active` WHERE `user` = '".$user['id']."' "));
if(!$garden_plant_user_active){
mysql_query("INSERT INTO `garden_plant_user_active` SET `user` = '".$user['id']."' ");
}



if(isset($_GET['en_max'])){
if($user['rubin'] < (5*$user['en_max'])){
$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f((5*$user['en_max'])-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="16" height="16" alt=""> Купить</a></div>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `en` = '".$max_coll_en."', `rubin` = '".($user['rubin']-(5*$user['en_max']))."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<img src="/images/garden/energy.png" alt="$" width="24" height="24"> Энергия <span>+'.$user['en_max'].'</span> <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> Рубины <span>-'.n_f(5*$user['en_max']).'</span>
<br><a href="?en_max">Получить '.$user['en_max'].' энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.(5*$user['en_max']).'';
header('Location: ?');
exit();
}



if($garden_plant_user_active['1'] == 0 and $garden_plant_user_active['2'] == 0 and $garden_plant_user_active['3'] == 0 and $garden_plant_user_active['4'] == 0 and $garden_plant_user_active['5'] == 0 ){
echo '<div class="content mt4 bordered">Активных предложений не найдено.</div>';
}






$_1 = mysql_fetch_array(mysql_query('SELECT * FROM `garden_plant_user` WHERE `id` = "'.$garden_plant_user_active['1'].'"'));
$_2 = mysql_fetch_array(mysql_query('SELECT * FROM `garden_plant_user` WHERE `id` = "'.$garden_plant_user_active['2'].'"'));
$_3 = mysql_fetch_array(mysql_query('SELECT * FROM `garden_plant_user` WHERE `id` = "'.$garden_plant_user_active['3'].'"'));
$_4 = mysql_fetch_array(mysql_query('SELECT * FROM `garden_plant_user` WHERE `id` = "'.$garden_plant_user_active['4'].'"'));
$_5 = mysql_fetch_array(mysql_query('SELECT * FROM `garden_plant_user` WHERE `id` = "'.$garden_plant_user_active['5'].'"'));

















$___1 = mysql_query("SELECT * FROM `garden_plant_user` WHERE `id` = '".$_1['id']."' ORDER BY `id` DESC LIMIT 1");
while($__1 = mysql_fetch_assoc($___1)){
$us = mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$__1['user'].'"'));
$harvest_sum = $__1['harvest']+$__1['level'];


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><img src="/images/garden/a'.$__1['images'].'.jpg" alt="plant" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown">1 Грядка #<span>'.$__1['id'].'</span>, <span>'.$us['login'].'</span></div>
<div>
<a class="btni" href="?buy_'.$__1['id'].'" style="margin-top: 4px; min-width: 130px;">Собрать <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum.'</span></a>
<span class="minor">Оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span></span>
</div></div></div><div class="cb"></div></div></div>';

if(isset($_GET['buy_'.$__1['id'].''])){
if($garden_plant_user_active['1'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0' WHERE `user` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($__1['time'] > time()){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0' WHERE `user` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<font color=red>Растение еще не готово для сбора.</font>';
header('Location: ?');
exit();
}
if($us['management'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0' WHERE `user` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<font color=red>Игрок выключил "Помощь садовникам"</font>';
header('Location: ?');
exit();
}
if($__1['id'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0' WHERE `user` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if(!$__1){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0' WHERE `user` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($us['rubin'] < $us['management_cost']){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0' WHERE `user` = '".$user['id']."' limit 1");
$_SESSION['err'] = 'У игрока '.$us['login'].' не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($us['management_cost']-$us['rubin']).'';
header('Location: ?');
exit();
}
if($user['en'] < 1){
$_SESSION['err'] = 'Нет <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(5*$user['en_max']).'';
header('Location: ?');
exit();
}
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden` WHERE `name`  = '".$__1['name']."'")); // растения игрока
$procent_cost_rubin = round($us['management_cost']*10/100);
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `rubin` = '".($user['rubin']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `leaf` = '".($us['leaf']+$harvest_sum)."', `rubin` = '".($us['rubin']-$us['management_cost'])."'  WHERE `id` = '".$us['id']."' ");
mysql_query("UPDATE `garden_plant_user` SET `time` = '".(time()+$garden_user_['time'])."' WHERE `id` = '".$__1['id']."' ");

/* $tezt = 'Игрок '.$user['login'].' собрал Вам <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum.'</span> оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$tezt."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");
 */
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0', `2` = '0', `3` = '0', `4` = '0', `5` = '0' WHERE `id` = '".$garden_plant_user_active['id']."' ");

if($mission_user_24['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_24['prog_']+1)."' WHERE `id` = '".$mission_user_24['id']."' ");
}
if($mission_user_25['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_25['prog_']+1)."' WHERE `id` = '".$mission_user_25['id']."' ");
}
if($mission_user_26['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_26['prog_']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$mission_user_26['id']."' ");
}


if($Achievements_user_23['prog'] < $Achievements_user_23['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_23['prog']+1)."' WHERE `id` = '".$Achievements_user_23['id']."' ");
}
if($Achievements_user_24['prog'] < $Achievements_user_24['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_24['prog']+1)."' WHERE `id` = '".$Achievements_user_24['id']."' ");
}
if($Achievements_user_25['prog'] < $Achievements_user_25['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_25['prog']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$Achievements_user_25['id']."' ");
}



$_SESSION['ok'] = '<img src="/images/ruby.png" alt="$" width="24" height="24"> +'.($us['management_cost']-$procent_cost_rubin).'';
header('Location: ?');
exit();
}

}

























$___2 = mysql_query("SELECT * FROM `garden_plant_user` WHERE `id` = '".$_2['id']."' ORDER BY `id` DESC LIMIT 1");
while($__2 = mysql_fetch_assoc($___2)){
$us = mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$__2['user'].'"'));
$harvest_sum2 = $__2['harvest']+$__2['level'];
echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><img src="/images/garden/a'.$__2['images'].'.jpg" alt="plant" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown">2 Грядка #<span>'.$__2['id'].'</span>, <span>'.$us['login'].'</span></div>
<div>
<a class="btni" href="?buy_'.$__2['id'].'" style="margin-top: 4px; min-width: 130px;">Собрать <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum2.'</span></a>
<span class="minor">Оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span></span>
</div></div></div><div class="cb"></div></div></div>';

if(isset($_GET['buy_'.$__2['id'].''])){
if($garden_plant_user_active['2'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($__2['time'] > time()){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Растение еще не готово для сбора.</font>';
header('Location: ?');
exit();
}
if($us['management'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Игрок выключил "Помощь садовникам"</font>';
header('Location: ?');
exit();
}
if($__2['id'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if(!$__2){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($us['rubin'] < $us['management_cost']){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = 'У игрока '.$us['login'].' не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($us['management_cost']-$us['rubin']).'';
header('Location: ?');
exit();
}
if($user['en'] < 1){
$_SESSION['err'] = 'Нет <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(5*$user['en_max']).'';
header('Location: ?');
exit();
}
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden` WHERE `name`  = '".$__2['name']."'")); // растения игрока
$procent_cost_rubin = round($us['management_cost']*10/100);
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `rubin` = '".($user['rubin']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `leaf` = '".($us['leaf']+$harvest_sum2)."', `rubin` = '".($us['rubin']-$us['management_cost'])."'  WHERE `id` = '".$us['id']."' ");
mysql_query("UPDATE `garden_plant_user` SET `time` = '".(time()+$garden_user_['time'])."' WHERE `id` = '".$__2['id']."' ");

/* $tezt = 'Игрок '.$user['login'].' собрал Вам <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum2.'</span> оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$tezt."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");
 */
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0', `2` = '0', `3` = '0', `4` = '0', `5` = '0' WHERE `id` = '".$garden_plant_user_active['id']."' ");

if($mission_user_24['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_24['prog_']+1)."' WHERE `id` = '".$mission_user_24['id']."' ");
}
if($mission_user_25['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_25['prog_']+1)."' WHERE `id` = '".$mission_user_25['id']."' ");
}
if($mission_user_26['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_26['prog_']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$mission_user_26['id']."' ");
}

if($Achievements_user_23['prog'] < $Achievements_user_23['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_23['prog']+1)."' WHERE `id` = '".$Achievements_user_23['id']."' ");
}
if($Achievements_user_24['prog'] < $Achievements_user_24['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_24['prog']+1)."' WHERE `id` = '".$Achievements_user_24['id']."' ");
}
if($Achievements_user_25['prog'] < $Achievements_user_25['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_25['prog']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$Achievements_user_25['id']."' ");
}

$_SESSION['err'] = '<img src="/images/ruby.png" alt="$" width="24" height="24"> +'.($us['management_cost']-$procent_cost_rubin).'';
header('Location: ?');
exit();
}

}























$___3 = mysql_query("SELECT * FROM `garden_plant_user` WHERE `id` = '".$_3['id']."' ORDER BY `id` DESC LIMIT 1");
while($__3 = mysql_fetch_assoc($___3)){
$us = mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$__3['user'].'"'));
$harvest_sum3 = $__3['harvest']+$__3['level'];
echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><img src="/images/garden/a'.$__3['images'].'.jpg" alt="plant" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown">3 Грядка #<span>'.$__3['id'].'</span>, <span>'.$us['login'].'</span></div>
<div>
<a class="btni" href="?buy_'.$__3['id'].'" style="margin-top: 4px; min-width: 130px;">Собрать <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum3.'</span></a>
<span class="minor">Оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span></span>
</div></div></div><div class="cb"></div></div></div>';

if(isset($_GET['buy_'.$__3['id'].''])){
if($garden_plant_user_active['3'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($__3['time'] > time()){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Растение еще не готово для сбора.</font>';
header('Location: ?');
exit();
}
if($us['management'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Игрок выключил "Помощь садовникам"</font>';
header('Location: ?');
exit();
}
if($__3['id'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if(!$__3){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($us['rubin'] < $us['management_cost']){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = 'У игрока '.$us['login'].' не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($us['management_cost']-$us['rubin']).'';
header('Location: ?');
exit();
}
if($user['en'] < 1){
$_SESSION['err'] = 'Нет <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(5*$user['en_max']).'';
header('Location: ?');
exit();
}
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden` WHERE `name`  = '".$__3['name']."'")); // растения игрока
$procent_cost_rubin = round($us['management_cost']*10/100);
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `rubin` = '".($user['rubin']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `leaf` = '".($us['leaf']+$harvest_sum3)."', `rubin` = '".($us['rubin']-$us['management_cost'])."'  WHERE `id` = '".$us['id']."' ");
mysql_query("UPDATE `garden_plant_user` SET `time` = '".(time()+$garden_user_['time'])."' WHERE `id` = '".$__3['id']."' ");

/* $tezt = 'Игрок '.$user['login'].' собрал Вам <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum3.'</span> оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$tezt."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");
 */
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0', `2` = '0', `3` = '0', `4` = '0', `5` = '0' WHERE `id` = '".$garden_plant_user_active['id']."' ");

if($mission_user_24['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_24['prog_']+1)."' WHERE `id` = '".$mission_user_24['id']."' ");
}
if($mission_user_25['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_25['prog_']+1)."' WHERE `id` = '".$mission_user_25['id']."' ");
}
if($mission_user_26['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_26['prog_']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$mission_user_26['id']."' ");
}

if($Achievements_user_23['prog'] < $Achievements_user_23['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_23['prog']+1)."' WHERE `id` = '".$Achievements_user_23['id']."' ");
}
if($Achievements_user_24['prog'] < $Achievements_user_24['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_24['prog']+1)."' WHERE `id` = '".$Achievements_user_24['id']."' ");
}
if($Achievements_user_25['prog'] < $Achievements_user_25['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_25['prog']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$Achievements_user_25['id']."' ");
}

$_SESSION['err'] = '<img src="/images/ruby.png" alt="$" width="24" height="24"> +'.($us['management_cost']-$procent_cost_rubin).'';
header('Location: ?');
exit();
}

}
























$___4 = mysql_query("SELECT * FROM `garden_plant_user` WHERE `id` = '".$_4['id']."' ORDER BY `id` DESC LIMIT 1");
while($__4 = mysql_fetch_assoc($___4)){
$us = mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$__4['user'].'"'));
$harvest_sum4 = $__4['harvest']+$__4['level'];
echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><img src="/images/garden/a'.$__4['images'].'.jpg" alt="plant" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown">4 Грядка #<span>'.$__4['id'].'</span>, <span>'.$us['login'].'</span></div>
<div>
<a class="btni" href="?buy_'.$__4['id'].'" style="margin-top: 4px; min-width: 130px;">Собрать <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum4.'</span></a>
<span class="minor">Оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span></span>
</div></div></div><div class="cb"></div></div></div>';

if(isset($_GET['buy_'.$__4['id'].''])){
if($garden_plant_user_active['4'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($__4['time'] > time()){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Растение еще не готово для сбора.</font>';
header('Location: ?');
exit();
}
if($us['management'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Игрок выключил "Помощь садовникам"</font>';
header('Location: ?');
exit();
}
if($__4['id'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if(!$__4){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($us['rubin'] < $us['management_cost']){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = 'У игрока '.$us['login'].' не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($us['management_cost']-$us['rubin']).'';
header('Location: ?');
exit();
}
if($user['en'] < 1){
$_SESSION['err'] = 'Нет <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(5*$user['en_max']).'';
header('Location: ?');
exit();
}
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden` WHERE `name`  = '".$__4['name']."'")); // растения игрока
$procent_cost_rubin = round($us['management_cost']*10/100);
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `rubin` = '".($user['rubin']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `leaf` = '".($us['leaf']+$harvest_sum4)."', `rubin` = '".($us['rubin']-$us['management_cost'])."'  WHERE `id` = '".$us['id']."' ");
mysql_query("UPDATE `garden_plant_user` SET `time` = '".(time()+$garden_user_['time'])."' WHERE `id` = '".$__4['id']."' ");

/* $tezt = 'Игрок '.$user['login'].' собрал Вам <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum4.'</span> оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$tezt."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");
 */
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0', `2` = '0', `3` = '0', `4` = '0', `5` = '0' WHERE `id` = '".$garden_plant_user_active['id']."' ");

if($mission_user_24['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_24['prog_']+1)."' WHERE `id` = '".$mission_user_24['id']."' ");
}
if($mission_user_25['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_25['prog_']+1)."' WHERE `id` = '".$mission_user_25['id']."' ");
}
if($mission_user_26['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_26['prog_']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$mission_user_26['id']."' ");
}

if($Achievements_user_23['prog'] < $Achievements_user_23['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_23['prog']+1)."' WHERE `id` = '".$Achievements_user_23['id']."' ");
}
if($Achievements_user_24['prog'] < $Achievements_user_24['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_24['prog']+1)."' WHERE `id` = '".$Achievements_user_24['id']."' ");
}
if($Achievements_user_25['prog'] < $Achievements_user_25['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_25['prog']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$Achievements_user_25['id']."' ");
}

$_SESSION['err'] = '<img src="/images/ruby.png" alt="$" width="24" height="24"> +'.($us['management_cost']-$procent_cost_rubin).'';
header('Location: ?');
exit();
}

}






















$___5 = mysql_query("SELECT * FROM `garden_plant_user` WHERE `id` = '".$_5['id']."' ORDER BY `id` DESC LIMIT 1");
while($__5 = mysql_fetch_assoc($___5)){
$us = mysql_fetch_array(mysql_query('SELECT * FROM `users` WHERE `id` = "'.$__5['user'].'"'));
$harvest_sum5 = $__5['harvest']+$__5['level'];
echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><img src="/images/garden/a'.$__5['images'].'.jpg" alt="plant" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown">5 Грядка #<span>'.$__5['id'].'</span>, <span>'.$us['login'].'</span></div>
<div>
<a class="btni" href="?buy_'.$__5['id'].'" style="margin-top: 4px; min-width: 130px;">Собрать <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum5.'</span></a>
<span class="minor">Оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span></span>
</div></div></div><div class="cb"></div></div></div>';

if(isset($_GET['buy_'.$__5['id'].''])){
if($garden_plant_user_active['5'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($__5['time'] > time()){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Растение еще не готово для сбора.</font>';
header('Location: ?');
exit();
}
if($us['management'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Игрок выключил "Помощь садовникам"</font>';
header('Location: ?');
exit();
}
if($__5['id'] == 0){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if(!$__5){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=red>Такой грядки не существует.</font>';
header('Location: ?');
exit();
}
if($us['rubin'] < $us['management_cost']){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = 'У игрока '.$us['login'].' не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($us['management_cost']-$us['rubin']).'';
header('Location: ?');
exit();
}
if($user['en'] < 1){
$_SESSION['err'] = 'Нет <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(5*$user['en_max']).'';
header('Location: ?');
exit();
}
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden` WHERE `name`  = '".$__5['name']."'")); // растения игрока
$procent_cost_rubin = round($us['management_cost']*10/100);
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `rubin` = '".($user['rubin']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `leaf` = '".($us['leaf']+$harvest_sum5)."', `rubin` = '".($us['rubin']-$us['management_cost'])."'  WHERE `id` = '".$us['id']."' ");
mysql_query("UPDATE `garden_plant_user` SET `time` = '".(time()+$garden_user_['time'])."' WHERE `id` = '".$__5['id']."' ");

/* $tezt = 'Игрок '.$user['login'].' собрал Вам <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$harvest_sum5.'</span> оплата <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.$us['management_cost'].'</span>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$tezt."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");
 */
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '0', `2` = '0', `3` = '0', `4` = '0', `5` = '0' WHERE `id` = '".$garden_plant_user_active['id']."' ");

if($mission_user_24['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_24['prog_']+1)."' WHERE `id` = '".$mission_user_24['id']."' ");
}
if($mission_user_25['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_25['prog_']+1)."' WHERE `id` = '".$mission_user_25['id']."' ");
}
if($mission_user_26['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_26['prog_']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$mission_user_26['id']."' ");
}

if($Achievements_user_23['prog'] < $Achievements_user_23['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_23['prog']+1)."' WHERE `id` = '".$Achievements_user_23['id']."' ");
}
if($Achievements_user_24['prog'] < $Achievements_user_24['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_24['prog']+1)."' WHERE `id` = '".$Achievements_user_24['id']."' ");
}
if($Achievements_user_25['prog'] < $Achievements_user_25['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_25['prog']+($us['management_cost']-$procent_cost_rubin))."' WHERE `id` = '".$Achievements_user_25['id']."' ");
}


$_SESSION['err'] = '<img src="/images/ruby.png" alt="$" width="24" height="24"> +'.($us['management_cost']-$procent_cost_rubin).'';
header('Location: ?');
exit();
}

}























$en_progress = round((($user['en']*100)/$user['en_max']));
if($en_progress > 100) {$en_progress = 100;}


echo '<div class="center mt4 small"><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr>
<td style="width:17%;text-align:right;"><img src="/images/garden/energy.png" alt="$" width="16" height="16"><span>'.$user['en'].'</span>/<span>'.$user['en_max'].'</span></td>
<td style="width:70%;text-align:left;"><div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$en_progress.'%;"></div></div></td>
</tr></tbody></table></div>

<center>
<img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($user['rubin']).'</span>
</center>
';





echo '<a class="btnl mt4" href="'.$HOME.'garden/">Назад</a>';

echo '<br><center><div class="minor">
Помогайте собирать урожай другим игрокам.
Вам зачислится вознаграждение после оплаты работы владельцем грядки.
За перевод рубинов взимается комиссия 10%. Действия возможны, пока у Вас есть <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергия.
</div></center>';

require_once ('../system/footer.php');
?>