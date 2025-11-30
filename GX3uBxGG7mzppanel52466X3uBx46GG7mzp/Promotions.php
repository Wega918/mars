<?php
$title = 'Акции';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';


if($user['id'] != 1){
$spa = 'Здравствуйте! Игрок '.nick($user['id']).' попытался зайти в акции ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$spa."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_1'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_1 = mysql_real_escape_string(strong($_POST['act_1']));
if($promotions['promotion_1'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_1` = '0', `act_1` = '0', `time_1` = '0', `time_restart_1` = '".(time()+(86400*$prom_1))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_1` = '1', `act_1` = '".$prom_1 ."', `time_1` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_1'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_1" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_1'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_1" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Покупка рубинов ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_1" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_1'] > time()){echo '<br><span id="time_'.($promotions['time_restart_1']-time()).'000">'._time($promotions['time_restart_1']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////













//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_2'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_2 = mysql_real_escape_string(strong($_POST['act_2']));
if($promotions['promotion_2'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_2` = '0', `act_2` = '0', `time_2` = '0', `time_restart_2` = '".(time()+(86400*$prom_2))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_2` = '1', `act_2` = '".$prom_2 ."', `time_2` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_2'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_2" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_2'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_2" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Карта в подарок ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_2" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_2'] > time()){echo '<br><span id="time_'.($promotions['time_restart_2']-time()).'000">'._time($promotions['time_restart_2']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////














//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_3'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_3 = mysql_real_escape_string(strong($_POST['act_3']));
if($promotions['promotion_3'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_3` = '0', `act_3` = '0', `time_3` = '0', `time_restart_3` = '".(time()+(86400*$prom_3))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_3` = '1', `act_3` = '".$prom_3 ."', `time_3` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_3'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_3" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_3'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_3" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Бонус Кп ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_3" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_3'] > time()){echo '<br><span id="time_'.($promotions['time_restart_3']-time()).'000">'._time($promotions['time_restart_3']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////













//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_4'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_4 = mysql_real_escape_string(strong($_POST['act_4']));
if($promotions['promotion_4'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_4` = '0', `act_4` = '0', `time_4` = '0', `time_restart_4` = '".(time()+(86400*$prom_4))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_4` = '1', `act_4` = '".$prom_4 ."', `time_4` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_4'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_4" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_4'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_4" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Бонус Союзу ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_4" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_4'] > time()){echo '<br><span id="time_'.($promotions['time_restart_4']-time()).'000">'._time($promotions['time_restart_4']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////













//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_5'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_5 = mysql_real_escape_string(strong($_POST['act_5']));
if($promotions['promotion_5'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_5` = '0', `act_5` = '0', `time_5` = '0', `time_restart_5` = '".(time()+(86400*$prom_5))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_5` = '1', `act_5` = '".$prom_5 ."', `time_5` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_5'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_5" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_5'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_5" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Викторина ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_5" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_5'] > time()){echo '<br><span id="time_'.($promotions['time_restart_5']-time()).'000">'._time($promotions['time_restart_5']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_6'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_6 = mysql_real_escape_string(strong($_POST['act_6']));
if($promotions['promotion_6'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_6` = '0', `act_6` = '0', `time_6` = '0', `time_restart_6` = '".(time()+(86400*$prom_6))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_6` = '1', `act_6` = '".$prom_6 ."', `time_6` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_6'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_6" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_6'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_6" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ День Скидок ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_6" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_6'] > time()){echo '<br><span id="time_'.($promotions['time_restart_6']-time()).'000">'._time($promotions['time_restart_6']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////














//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_7'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_7 = mysql_real_escape_string(strong($_POST['act_7']));
if($promotions['promotion_7'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_7` = '0', `act_7` = '0', `time_7` = '0', `time_restart_7` = '".(time()+(86400*$prom_7))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_7` = '1', `act_7` = '".$prom_7 ."', `time_7` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_7'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_7" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_7'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_7" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Рубиновая Шахта ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_7" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_7'] > time()){echo '<br><span id="time_'.($promotions['time_restart_7']-time()).'000">'._time($promotions['time_restart_7']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////












//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_8'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_8 = mysql_real_escape_string(strong($_POST['act_8']));
if($promotions['promotion_8'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_8` = '0', `act_8` = '0', `time_8` = '0', `time_restart_8` = '".(time()+(86400*$prom_8))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_8` = '1', `act_8` = '".$prom_8 ."', `time_8` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_8'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_8" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_8'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_8" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Постройки ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_8" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_8'] > time()){echo '<br><span id="time_'.($promotions['time_restart_8']-time()).'000">'._time($promotions['time_restart_8']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////










//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_9'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_9 = mysql_real_escape_string(strong($_POST['act_9']));
if($promotions['promotion_9'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_9` = '0', `act_9` = '0', `time_9` = '0', `time_restart_9` = '".(time()+(86400*$prom_9))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_9` = '1', `act_9` = '".$prom_9 ."', `time_restart_9` = '0', `time_9` = '".(time()+(86400*7))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_9'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_9" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_9'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_9" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Новогодние Игрушки ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_9" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_9'] > time()){echo '<br><span id="time_'.($promotions['time_restart_9']-time()).'000">'._time($promotions['time_restart_9']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







//data:text/html,<form action=http://bigmars.ru/GX3uBxGG7mzppanel52466X3uBx46GG7mzp/Promotions.php?act_9 method=post><input name=act_9></form>

//site.ru/?value=test&value1=test


//data:text/html,<form action=http://site.com/ method=post><input name=a></form>

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_10'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_10 = mysql_real_escape_string(strong($_POST['act_10']));
if($promotions['promotion_10'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_10` = '0', `act_10` = '0', `time_10` = '0', `time_restart_10` = '".(time()+(86400*$prom_10))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_10` = '1', `act_10` = '".$prom_10 ."', `time_10` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_10'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_10" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_10'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_10" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Прирост ангелов ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_10" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_10'] > time()){echo '<br><span id="time_'.($promotions['time_restart_10']-time()).'000">'._time($promotions['time_restart_10']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
















//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_11'])){
	if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_11 = mysql_real_escape_string(strong($_POST['act_11']));
if($promotions['promotion_11'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_11` = '0', `act_11` = '0', `time_11` = '0', `time_restart_11` = '".(time()+(86400*$prom_11))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_11` = '1', `act_11` = '".$prom_11 ."', `time_11` = '".(time()+(89000*2))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_11'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_11" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_11'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_11" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Скидка на прем ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_11" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_11'] > time()){echo '<br><span id="time_'.($promotions['time_restart_11']-time()).'000">'._time($promotions['time_restart_11']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









$turnir = mysql_fetch_assoc(mysql_query("SELECT * FROM `turnir` WHERE `id` = '1'"));
$timer = ($turnir['time']);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_12'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_12 = mysql_real_escape_string(strong($_POST['act_12']));
if($promotions['promotion_12'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_12` = '0', `act_12` = '0', `time_12` = '0', `time_restart_12` = '".(time()+(86400*$prom_12))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_12` = '1', `act_12` = '".$prom_12 ."', `time_12` = '".$timer."' WHERE `id` = '1' LIMIT 1");
}

/* if($prom_12 == 3) {
$textqqq = 'Стартует Турнир Сувениров.
Во время турнира всем игрокам будут рандомно сыпаться Сувениры.
По итогам турнира все участники получают коллекции за собранные Сувениры.
ЗА КАЖДЫЙ СУВЕНИР '.n_f(100000000000).' КОЛЛЕКЦИЙ ПО ИТОГАМ!

Итоги '.vremja($timer).'';

$name = 'Турнир Сувениров';
mysql_query("INSERT INTO `forum_topic` SET 
`name` = '".$name."',
`text` = '".$textqqq."',
`user` = '2', 
`time` = '".time()."', 
`open` = '1',
`razdel` = '1' ");
$uid = mysql_insert_id();
mysql_query("UPDATE `users` SET `news` = '".$uid."', `koll` = '0' WHERE `id` ");
}
 */

$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_12'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_12" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_12'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_12" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Хэллоуин/Новый Год/Турнир сувениров ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_12" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_12'] > time()){echo '<br><span id="time_'.($promotions['time_restart_12']-time()).'000">'._time($promotions['time_restart_12']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_13'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_13 = mysql_real_escape_string(strong($_POST['act_13']));
if($promotions['promotion_13'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_13` = '0', `act_13` = '0', `time_13` = '0', `time_restart_13` = '".(time()+(86400*$prom_13))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_13` = '1', `act_13` = '".$prom_13 ."', `time_13` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_13'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_13" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_13'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_13" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Скидка персонажа ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_13" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_13'] > time()){echo '<br><span id="time_'.($promotions['time_restart_13']-time()).'000">'._time($promotions['time_restart_13']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_14'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_14 = mysql_real_escape_string(strong($_POST['act_14']));
if($promotions['promotion_14'] == 1){
mysql_query("UPDATE `promotions` SET `promotion_14` = '0', `act_14` = '0', `time_14` = '0', `time_restart_14` = '".(time()+(86400*$prom_14))."' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_14` = '1', `act_14` = '".$prom_14 ."', `time_14` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_14'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_14" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_14'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_14" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Скидка улучшение карт ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_14" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_14'] > time()){echo '<br><span id="time_'.($promotions['time_restart_14']-time()).'000">'._time($promotions['time_restart_14']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////










//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_15'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_15 = mysql_real_escape_string(strong($_POST['act_15']));
if($promotions['promotion_15'] == 1){
mysql_query("UPDATE `promotions` SET `time_restart_15` = '".(time()+(86400*$prom_15))."', `promotion_15` = '0', `act_15` = '0', `time_15` = '0' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_15` = '1', `act_15` = '".$prom_15."', `time_15` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_15'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_15" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_15'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_15" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Ключи х2 ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_15" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_15'] > time()){echo '<br><span id="time_'.($promotions['time_restart_15']-time()).'000">'._time($promotions['time_restart_15']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







if(isset($_REQUEST['act_16'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_16 = mysql_real_escape_string(strong($_POST['act_16']));
if($promotions['promotion_16'] == 1){
$time_restart = (86400*2);
mysql_query("UPDATE `promotions` SET `time_restart_16` = '".(time()+(86400*$prom_16))."', `promotion_16` = '0', `act_16` = '0', `time_16` = '0' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_16` = '1', `act_16` = '".$prom_16."', `time_16` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_16'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_16" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_16'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_16" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Ключи по наростающей ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_16" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_16'] > time()){echo '<br><span id="time_'.($promotions['time_restart_16']-time()).'000">'._time($promotions['time_restart_16']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









if(isset($_REQUEST['act_17'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_17 = mysql_real_escape_string(strong($_POST['act_17']));
if($promotions['promotion_17'] == 1){
mysql_query("UPDATE `promotions` SET `time_restart_17` = '".(time()+(86400*$prom_17))."', `promotion_17` = '0', `act_17` = '0', `time_17` = '0' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_17` = '1', `act_17` = '".$prom_17."', `time_17` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_17'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_17" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_17'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_17" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Слава в заданиях ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_17" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_17'] > time()){echo '<br><span id="time_'.($promotions['time_restart_17']-time()).'000">'._time($promotions['time_restart_17']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





if(isset($_REQUEST['act_18'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_18 = mysql_real_escape_string(strong($_POST['act_18']));
if($promotions['promotion_18'] == 1){
mysql_query("UPDATE `promotions` SET `time_restart_18` = '".(time()+(86400*$prom_18))."', `promotion_18` = '0', `act_18` = '0', `time_18` = '0' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_18` = '1', `act_18` = '".$prom_18."', `time_18` = '".(time()+(86400*3))."' WHERE `id` = '1' LIMIT 1");
mysql_query('DELETE FROM `safe` WHERE `id` ');
}

$jjhj = 'Стартует Акция Таинственный сейф.
• Выполняйте задания, заполняйте сейф ангелами и получайте 1% бизнес-ангелов от всех собранных по итогам акции.
• Или получите возможность приобрести ВСЕ собранные ангелы со скидкой!
• Действие кнопок возможно после завершения акции в течении суток.
Акция завершится '.vremja(time()+(86400*3)).'';

$name = 'Акция <img src="/images/safe.png" alt="" width="6%"> Таинственный сейф';
mysql_query("INSERT INTO `forum_topic` SET 
`name` = '".$name."',
`text` = '".$jjhj."',
`user` = '2', 
`time` = '".time()."', 
`open` = '1',
`razdel` = '1' ");
$uid = mysql_insert_id();
mysql_query("UPDATE `users` SET `news` = '".$uid."', `koll` = '0' WHERE `id` ");


$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_18'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_18" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_18'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_18" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Таинственный сейф ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_18" method="POST">'.$knopka.'</form>';
if($promotions['time_restart_18'] > time()){echo '<br><span id="time_'.($promotions['time_restart_18']-time()).'000">'._time($promotions['time_restart_18']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







if(isset($_REQUEST['act_19'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$prom_19 = mysql_real_escape_string(strong($_POST['act_19']));
if($promotions['promotion_19'] == 1){
mysql_query("UPDATE `promotions` SET `time_restart_17` = '".(time()+(86400*$prom_19))."', `promotion_19` = '0', `act_19` = '0', `time_19` = '0' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `promotion_19` = '1', `act_19` = '".$prom_19."', `time_19` = '".(time()+(86400*1))."' WHERE `id` = '1' LIMIT 1");
}


$jjhj = 'Стартует Акция Кубки x'.$prom_19.'.
Во время акции за каждое выполненое задание вы будите получать по <img width="20" height="20" alt="" src="/images/cup.png" title=""> '.$prom_19.' кубка.
Акция завершится '.vremja(time()+86400).'';

$name = 'Акция <img width="20" height="20" alt="" src="/images/cup.png" title=""> Кубки x'.$prom_19.'';
mysql_query("INSERT INTO `forum_topic` SET 
`name` = '".$name."',
`text` = '".$jjhj."',
`user` = '2', 
`time` = '".time()."', 
`open` = '1',
`razdel` = '1' ");
$uid = mysql_insert_id();
mysql_query("UPDATE `users` SET `news` = '".$uid."', `koll` = '0' WHERE `id` ");



$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_19'] == 1){
$knopka = '<input type="number" style="width: 25%;" name="act_19" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_19'] - time()).'';
}else{
$knopka = '<input type="number" style="width: 25%;" name="act_19" maxlength="5" value="0" class="text"/><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<div class="show350 tdbrown"><span><center>☆ Кубки ☆ <font color=grey>('.$vkl.')</font></center></span></div>';
echo '<center><form action="?act_19" method="POST">'.$knopka.'</form></center></div>';
if($promotions['time_restart_19'] > time()){echo '<br><span id="time_'.($promotions['time_restart_19']-time()).'000">'._time($promotions['time_restart_19']-time()).'</span>';}
echo '</center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////














//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_20'])){
$act_20 = strong($_POST['act_20']);
$promotion_20 = strong($_POST['promotion_20']);
$time_20 = strong($_POST['time_20']);
if($promotions['promotion_20'] >= 1){
mysql_query("UPDATE `promotions` SET `promotion_20` = '0', `act_20` = '0', `time_20` = '0' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `settings` SET `angel` = '0', `musor` = '0', `time_act_20` = '0' WHERE `id` = '1' LIMIT 1");
mysql_query("UPDATE `promotions` SET `promotion_20` = '".$promotion_20 ."', `act_20` = '".$act_20 ."', `time_20` = '".(time()+(86400*$time_20))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = 'Успешно!';
header ('Location: ?');
exit();
}
if($promotions['promotion_20'] >= 1){
$knopka = '<input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_20'] - time()).'';
}else{
$knopka = '
Вид: <input type="number" style="width: 53%;" name="promotion_20" maxlength="5" value="0" class="text"/><br>
Процент: <input type="number" style="width: 45%;" name="act_20" maxlength="5" value="0" class="text"/><br>
Время: <input type="number" style="width: 48%;" name="time_20" maxlength="5" value="1" class="text"/>
<br><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img src="/images/actoins.png" alt="" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ Ангелы и коллекции за покупку ☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 110px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$vkl.'</span></div>';
echo '<span><font size=2 color=black>Время действия:</font><font size=2 > На выбор</font></span><br>';
echo '<span><font size=2 color=black>Вид:</font><font size=2 > 1-ангелы | 2-коллекции | 3-ангелы и коллекции</font></span>';
echo '<hr><center><form action="?act_20" method="POST">'.$knopka.'</form></center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////











//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['act_21'])){

$act_21 = strong($_POST['act_21']);
$time_21 = strong($_POST['time_21']);
if($promotions['time_21'] >= time()){
mysql_query("UPDATE `promotions` SET `act_21` = '0', `time_21` = '0' WHERE `id` = '1' LIMIT 1");
}else{
mysql_query("UPDATE `promotions` SET `act_21` = '".$act_21 ."', `time_21` = '".(time()+(3600*$time_21))."' WHERE `id` = '1' LIMIT 1");
}
$_SESSION['err'] = "Успешно";
header ('Location: ?');
exit();
}
if($promotions['time_21'] >= time()){
$knopka = '<input class="mt4" type="submit" name="submit" value="Выключить">';
$vkl = ''._time($promotions['time_21'] - time()).'';
}else{
$knopka = '
Множ.: <input type="number" style="width: 20%;" name="act_21" maxlength="5" value="1" class="text"/> 
Время (ч): <input type="number" style="width: 20%;" name="time_21" maxlength="5" value="1" class="text"/>
<br><input class="mt4" type="submit" name="submit" value="Включить">';
$vkl = 'Отключена';
}
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img src="/images/actoins.png" alt="" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ Ракета ☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 110px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$vkl.'</span></div>';
echo '<span><font size=2 color=black>Время действия:</font><font size=2 > На выбор</font></span><br>';
echo '<span><font size=2 color=black>Множ:</font><font size=2 > указывает на сколько умножать награду</font></span><br>';
echo '<hr><center><form action="?act_21" method="POST">'.$knopka.'</form></center></div>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////










echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
require_once ('../system/footer.php');
?>