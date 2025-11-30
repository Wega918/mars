<?php
require_once ('system/function.php');
require_once ('system/header.php');
/* if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
} */


//mysql_query("UPDATE `users` SET `newgame_rate` = '0' WHERE `id` ");
//mysql_query("UPDATE `users` SET `leaf` = '0' WHERE `id` ");
//mysql_query("UPDATE `users` SET `gragdanstvo` = '1' WHERE `id` ");
//mysql_query("UPDATE `users` SET `mnogit_time` = '0', `mnogit` = '0' WHERE `id` ");
//mysql_query("UPDATE `users` SET `dohod_mnogit` = '1' WHERE `id` ");
//mysql_query("UPDATE `users` SET `mine_time_1` = '60' WHERE `id` ");

//mysql_query("UPDATE `users` SET `gragdanstvo` = '1' WHERE `id` ");
//mysql_query("UPDATE `users` SET `dohod_mnogit` = '1' WHERE `dohod_mnogit` = '0' ");

/* 
echo '<a class="btnl mt4" href="?spam">Спам самолётов</a><hr>';
if(isset($_GET['spam'])){
$viz1 = time()-1296000;
$sdsadas = mysql_query("SELECT * FROM `users` WHERE `viz` > '".$viz1."' ");
$sadas = mysql_fetch_array ($sdsadas);
do {

$text = 'Приветик! Заходи скорее в новую и классную игру о построении личного авиа бизнеса!
Игра создана совсем недавно, много интересных, необычных и новых по своему жанру локаций.
Уникальная игра, в которой решает только твоя активность! airbizz.m o b i';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$sadas['id']."' and `kto` = '1992' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '1992', `kogo` = '".$sadas['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$sadas['id']."', `kogo` = '1992', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '1992' and `kto`='".$sadas['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '1992' and `kogo`='".$sadas['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '1992', `komy` = '".$sadas['id']."', `time` = '".time()."', `readlen` = '0'");

}while ($sadas = mysql_fetch_array ($sdsadas));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}
 */





/*


echo '<a class="btnl mt4" href="?1">Удалить верность кп и союзов --------------</</a>';
if(isset($_GET['1'])){
mysql_query('DELETE FROM `time_day` WHERE `id` ');
mysql_query('DELETE FROM `time_day_soyz` WHERE `id` ');
mysql_query('DELETE FROM `fidelity` WHERE `id ');
mysql_query('DELETE FROM `fidelity_soyz` WHERE `id` ');
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}
*/

echo '<a class="btnl mt4" href="?2">Удалить все бизнесы и карты и чистим начатые шахты</a>';
if(isset($_GET['2'])){
mysql_query('DELETE FROM `user_biznes_1` WHERE `id` ');
mysql_query('DELETE FROM `corporate_card` WHERE `id` ');
mysql_query('DELETE FROM `battlemine` WHERE `id` ');
mysql_query('DELETE FROM `battlemine_log` WHERE `id` ');
mysql_query('DELETE FROM `battlemine_user` WHERE `id` ');
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}





echo '<a class="btnl mt4" href="?3">Начисляем всем по бизнесу</a>';
if(isset($_GET['3'])){
$uzers6 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz6 = mysql_fetch_array ($uzers6);
do {
mysql_query("INSERT INTO `user_biznes_1` SET `name` = 'Космопорт', `images` = '1', `dohod` = '1',`cena` = '1', `biznes_dohod` = '1', `user` = '".$uz6['id']."', `id_room` = '1' ");
}while ($uz6 = mysql_fetch_array ($uzers6));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}





/* echo '<a class="btnl mt4" href="?4">Исправляем юзеров</a>';
if(isset($_GET['4'])){
mysql_query("UPDATE `users` SET `rubin` = '0', `money` = '1', `angel` = '100', `biznes` = '1', `zarabotanie_angel` = '0', `dohod_mnogit` = '1', `dohod_x2` = '22', `dohod1` = '1', `dohod` = '1', `corp_rubin` = '0', `soyz_rubin` = '0', `musor_proc` = '100' WHERE `id` ");
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}
 */

//mysql_query("UPDATE `users` SET `zarabotanie_angel` = '0' WHERE `id` ");
 //`mnogit_time` = '0',

echo '<a class="btnl mt4" href="?4">Исправляем юзеров</a>';
if(isset($_GET['4'])){
$query = "UPDATE `users` SET `viz` = '".time()."', `leaf` = '0',
`corp_rang` = '0', `corp` = '0', `soyz` = '0', `soyz_rang` = '0', `mine` = '0', 
`rock` = '0', `rubin_where` = '0', `diamonds` = '0', `diamonds_where` = '0', `rock_where` = '0', 
`rubin` = '0', `money` = '1', `angel` = '100', `biznes` = '1', `zarabotanie_angel` = '0', 
`dohod_mnogit` = '1',`gragdanstvo` = '1', `dohod_x2` = '22',  `dohod1` = '1', `dohod` = '1', 
`prestig_mnogit` = '0', `mnogit_boy` = '0', `time_boy` = '0', `key` = '0', `corp_rubin` = '0', `soyz_rubin` = '0', `musor_proc` = '100' WHERE `id` "; // Пример с id = 1

$result = mysql_query($query);
if (!$result) {
    die("Ошибка MySQL: " . mysql_error());
}

$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
} //  `gold_where` = '0', `gold` = '0', 


//mysql_query("UPDATE `users` SET `leaf` = '0' WHERE `id` ");
//mysql_query("UPDATE `users` SET `emerald_level` = '1' WHERE `id` ");

//emerald_level




/*

echo '<a class="btnl mt4" href="?5">Исправляем кп --------------</a>';
if(isset($_GET['5'])){
mysql_query("UPDATE `corp` SET `musor_proc` = '0', `musor_lvl` = '0', `rubin` = '0', `building` = '0', `angel` = '0' WHERE `id` ");
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}
echo '<a class="btnl mt4" href="?6">Исправляем союзы --------------</</a>';
if(isset($_GET['6'])){
mysql_query("UPDATE `soyz` SET `musor_proc` = '0', `musor_lvl` = '0', `rubin` = '0', `building` = '0', `musor` = '0' WHERE `id` ");
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}

*/










echo '<a class="btnl mt4" href="?7">Раздаем рб донатам</a>';
if(isset($_GET['7'])){

$uzers1 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `id` asc ");
while($us = mysql_fetch_assoc($uzers1)){
$rubin = mysql_result(mysql_query("SELECT SUM(rubin) FROM plategi WHERE `user`  = '".$us['id']."' ;"), 0); 
if($rubin>0){
//ECHO ''.nick($us['id']).' '.ceil($rubin).'<hr>';
mysql_query("UPDATE `users` SET `rubin` = '".ceil($rubin)."' WHERE `id` = '".$us['id']."' ");

$text3 = '<b>Покупка рубинов.</b> Зачислено '.ceil($rubin).' рубинов';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text3."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");

}
}

/*
if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `limitation`  >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$uzers1 = mysql_query("SELECT * FROM `users` WHERE `limitation`  >= '1'  ORDER BY `limitation` + '1' DESC LIMIT $start,$max");
while($uzs = mysql_fetch_assoc($uzers1)){


$gold = $uzs['limitation'];
mysql_query("UPDATE `users` SET `rubin` = '".($uzs['rubin']+$gold )."' WHERE `id` = '".$uzs['id']."' ");
$pay_text = 'Ваш баланс пополнен на <img width="20" height="20" alt="Рубины" src="/images/ruby.png" title="Рубины"> '.$gold.'.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uzs['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uzs['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uzs['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uzs['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uzs['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$uzs['id']."', `time` = '".time()."', `readlen` = '0'");
}
*/
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}

$uzers1 = mysql_query("SELECT * FROM `aaio` WHERE `time_oplata` > '0' ORDER BY `id` asc ");
while($us = mysql_fetch_assoc($uzers1)){

ECHO ''.nick($us['user']).' '.ceil($us['amount']).'<hr>';


}


/* echo '<a class="btnl mt4" href="?7_">Раздаем рб донатам aaio</a>';
if(isset($_GET['7_'])){


 */
/*
if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `limitation`  >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$uzers1 = mysql_query("SELECT * FROM `users` WHERE `limitation`  >= '1'  ORDER BY `limitation` + '1' DESC LIMIT $start,$max");
while($uzs = mysql_fetch_assoc($uzers1)){


$gold = $uzs['limitation'];
mysql_query("UPDATE `users` SET `rubin` = '".($uzs['rubin']+$gold )."' WHERE `id` = '".$uzs['id']."' ");
$pay_text = 'Ваш баланс пополнен на <img width="20" height="20" alt="Рубины" src="/images/ruby.png" title="Рубины"> '.$gold.'.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uzs['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uzs['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uzs['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uzs['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uzs['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$uzs['id']."', `time` = '".time()."', `readlen` = '0'");
}
*/
/* $_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}
 */




echo '<a class="btnl mt4" href="?8">Раздаем рб кп и союзам</a>';
if(isset($_GET['8'])){

$uzers1 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `id` asc ");
while($us = mysql_fetch_assoc($uzers1)){
$rubin = mysql_result(mysql_query("SELECT SUM(rubin) FROM plategi WHERE `user`  = '".$us['id']."' ;"), 0); 
if($rubin>0){

$add_fund = (($rubin * $promotions['act_3']) / 100); // Бонус Кп
$add_fund_soyz = (($rubin * $promotions['act_4']) / 100); // Бонус Союзу

//ECHO ''.nick($us['id']).' КП: '.n_f($add_fund).' _____  СОЮЗ: '.n_f($add_fund_soyz).'<hr>';

if($us['corp'] >= 1){
mysql_query("UPDATE `users` SET `corp_rubin` = '".($us['corp_rubin'] + $add_fund )."' WHERE `id` = '$us[id]' LIMIT 1");
mysql_query("UPDATE `corp` SET `rubin` = `rubin` + '".$add_fund."' WHERE `id` = '".$us['corp']."' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($us['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Корпорации <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund.' (Покупка)</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$us['corp']."', `text` = '$text', `time` = '".time()."'");
}

if($us['soyz'] >= 1){
mysql_query("UPDATE `users` SET `soyz_rubin` = '".($us['soyz_rubin'] + $add_fund_soyz )."' WHERE `id` = '$us[id]' LIMIT 1");
mysql_query("UPDATE `soyz` SET `rubin` = `rubin` + '".$add_fund_soyz."' WHERE `id` = '".$us['soyz']."' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($us['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Союза <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund_soyz.' (Покупка)</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$us['soyz']."', `text` = '$text', `time` = '".time()."'");
}

}
}

$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}










/* 

echo '<a class="btnl mt4" href="?9">Выдаем множители 1</a>';
if(isset($_GET['9'])){
$uzers1 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz1 = mysql_fetch_array ($uzers1);
do {
if($uz1['dostig_1'] >= 5){
mysql_query("UPDATE `users` SET `dostig_1` = '5', `dohod_mnogit` = '".($uz1['dohod_mnogit']*10)."' WHERE `id` = '".$uz1['id']."' ");
$text1 = 'Множитель Х10';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz1['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz1['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz1['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz1['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz1['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text1."', `kto` = '2', `komy` = '".$uz1['id']."', `time` = '".time()."', `readlen` = '0'");
}
} while ($uz1 = mysql_fetch_array ($uzers1));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}

echo '<a class="btnl mt4" href="?9_1">Выдаем множители 2</a>'; ///////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_GET['9_1'])){
$uzers2 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz2 = mysql_fetch_array ($uzers2);
do {
if($uz2['dostig_2'] == 5 ){
mysql_query("UPDATE `users` SET `dostig_2` = '5', `dohod_mnogit` = '".($uz2['dohod_mnogit']*2)."' WHERE `id` = '".$uz2['id']."' ");
$text2 = 'Множитель Х2';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz2['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz2['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz2['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz2['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz2['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text2."', `kto` = '2', `komy` = '".$uz2['id']."', `time` = '".time()."', `readlen` = '0'");
}
} while ($uz2 = mysql_fetch_array ($uzers2));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}

echo '<a class="btnl mt4" href="?9_2">Выдаем множители 3</a>'; ///////////////////////////////////////////////////////////////////////////////
if(isset($_GET['9_2'])){
$uzers3 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz3 = mysql_fetch_array ($uzers3);
do {
if($uz3['dostig_3'] >= 5){
mysql_query("UPDATE `users` SET `dostig_3` = '5', `dohod_mnogit` = '".($uz3['dohod_mnogit']*5)."' WHERE `id` = '".$uz3['id']."' ");
$text3 = 'Множитель Х5';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz3['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz3['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz3['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz3['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz3['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text3."', `kto` = '2', `komy` = '".$uz3['id']."', `time` = '".time()."', `readlen` = '0'");
}
} while ($uz3 = mysql_fetch_array ($uzers3));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}

echo '<a class="btnl mt4" href="?9_3">Выдаем множители 4</a>';
if(isset($_GET['9_3'])){
$uzers4 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz4 = mysql_fetch_array ($uzers4);
do {
if($uz4['dostig_5'] == 5 ){
mysql_query("UPDATE `users` SET `dostig_5` = '5', `dohod_mnogit` = '".($uz4['dohod_mnogit']*5)."' WHERE `id` = '".$uz4['id']."' ");
$text4 = 'Множитель Х5';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz4['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz4['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz4['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz4['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz4['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text4."', `kto` = '2', `komy` = '".$uz4['id']."', `time` = '".time()."', `readlen` = '0'");
}
}while ($uz4 = mysql_fetch_array ($uzers4));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}

echo '<a class="btnl mt4" href="?9_4">Выдаем множители 5</a>';
if(isset($_GET['9_4'])){
$uzers5 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz5 = mysql_fetch_array ($uzers5);
do {
if($uz5['dostig_7_5'] >= 1){
mysql_query("UPDATE `users` SET `dostig_7` = '5', `dohod_mnogit` = '".($uz5['dohod_mnogit']*5)."' WHERE `id` = '".$uz5['id']."' ");
$text5 = 'Множитель Х5';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz5['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz5['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz5['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz5['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz5['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text5."', `kto` = '2', `komy` = '".$uz5['id']."', `time` = '".time()."', `readlen` = '0'");
}
}while ($uz5 = mysql_fetch_array ($uzers5));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}

 */

















/*

echo '<a class="btnl mt4" href="?10">Прописка</a>';
if(isset($_GET['10'])){
$uzers10 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz10 = mysql_fetch_array ($uzers10);
do {

if($uz10['gragdanstvo'] == 2){ //множитель 2
mysql_query("UPDATE `users` SET `dohod_mnogit` = '".($uz10['dohod_mnogit']*2)."' WHERE `id` = '".$uz10['id']."' ");
$text10 = 'Прописка на Марсе';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz10['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz10['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz10['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz10['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz10['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text10."', `kto` = '2', `komy` = '".$uz10['id']."', `time` = '".time()."', `readlen` = '0'");
}

}while ($uz10 = mysql_fetch_array ($uzers10));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}







echo '<a class="btnl mt4" href="?11">Вид на жительство</a>';
if(isset($_GET['11'])){
$uzers11 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz11 = mysql_fetch_array ($uzers11);
do {

if($uz11['gragdanstvo'] == 3){ //множитель 2+4=6
mysql_query("UPDATE `users` SET `dohod_mnogit` = '".($uz11['dohod_mnogit']*6)."' WHERE `id` = '".$uz11['id']."' ");
$text11 = 'Вид на жительство';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz11['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz11['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz11['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz11['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz11['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text11."', `kto` = '2', `komy` = '".$uz11['id']."', `time` = '".time()."', `readlen` = '0'");
}

}while ($uz11 = mysql_fetch_array ($uzers11));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}






echo '<a class="btnl mt4" href="?12">Гражданство</a>';
if(isset($_GET['12'])){
$uzers12 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$uz12 = mysql_fetch_array ($uzers12);
do {

if($uz12['gragdanstvo'] == 4){ //множитель 2+4+4=10
mysql_query("UPDATE `users` SET `dohod_mnogit` = '".($uz12['dohod_mnogit']*10)."' WHERE `id` = '".$uz12['id']."' ");
$text12 = 'Гражданство';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$uz12['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$uz12['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$uz12['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$uz12['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$uz12['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text12."', `kto` = '2', `komy` = '".$uz12['id']."', `time` = '".time()."', `readlen` = '0'");
}

}while ($uz12 = mysql_fetch_array ($uzers12));	
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}

*/



echo '<a class="btnl mt4" href="?13">Чистим мусор</a>';
if(isset($_GET['13'])){
mysql_query('DELETE FROM `application` WHERE `id` ');
mysql_query('DELETE FROM `application_soyz` WHERE `id` ');
mysql_query('DELETE FROM `ass` WHERE `id` ');
mysql_query('DELETE FROM `ass_adm` WHERE `id` ');
mysql_query('DELETE FROM `ass_br` WHERE `id` ');
mysql_query('DELETE FROM `battlemine` WHERE `id` ');
mysql_query('DELETE FROM `battlemine_log` WHERE `id` ');
mysql_query('DELETE FROM `battlemine_user` WHERE `id` ');
mysql_query('DELETE FROM `chat` WHERE `id` ');
mysql_query('DELETE FROM `chests` WHERE `id` ');
mysql_query('DELETE FROM `Collectible_items` WHERE `id` ');
mysql_query('DELETE FROM `corp` WHERE `id` ');
mysql_query('DELETE FROM `corporate_card` WHERE `id` ');
mysql_query('DELETE FROM `corp_chat` WHERE `id` ');
mysql_query('DELETE FROM `corp_forum_comments` WHERE `id` ');
mysql_query('DELETE FROM `corp_forum_fols` WHERE `id` ');
mysql_query('DELETE FROM `corp_forum_razdel` WHERE `id` ');
mysql_query('DELETE FROM `corp_forum_topic` WHERE `id` ');
mysql_query('DELETE FROM `fidelity` WHERE `id` ');
mysql_query('DELETE FROM `fidelity_soyz` WHERE `id` ');
mysql_query('DELETE FROM `game` WHERE `id` ');
mysql_query('DELETE FROM `game_log` WHERE `id` ');
mysql_query('DELETE FROM `game_nagrada` WHERE `id` ');
mysql_query('DELETE FROM `game_user` WHERE `id` ');
mysql_query('DELETE FROM `garden_plant_user` WHERE `id` ');
mysql_query('DELETE FROM `garden_plant_user_active` WHERE `id` ');
mysql_query('DELETE FROM `garden_user` WHERE `id` ');
mysql_query('DELETE FROM `history` WHERE `id` ');
mysql_query('DELETE FROM `history_soyz` WHERE `id` ');
mysql_query('DELETE FROM `Invitations` WHERE `id` ');
mysql_query('DELETE FROM `Invitations_soyz` WHERE `id` ');
mysql_query('DELETE FROM `kach` WHERE `id` ');
mysql_query('DELETE FROM `kach_soyz` WHERE `id` ');
mysql_query('DELETE FROM `musor_time` WHERE `id` ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `id` ');
mysql_query('DELETE FROM `nagrada_user` WHERE `id` ');
mysql_query('DELETE FROM `newyear_collections_users` WHERE `id` ');
mysql_query('DELETE FROM `premium` WHERE `id` ');
mysql_query('DELETE FROM `premium_musor` WHERE `id` ');
mysql_query('DELETE FROM `pvp` WHERE `id` ');
mysql_query('DELETE FROM `pvp_log` WHERE `id` ');
mysql_query('DELETE FROM `soyz` WHERE `id` ');
mysql_query('DELETE FROM `soyz_ass` WHERE `id` ');
mysql_query('DELETE FROM `soyz_forum_comments` WHERE `id` ');
mysql_query('DELETE FROM `soyz_forum_fols` WHERE `id` ');
mysql_query('DELETE FROM `soyz_forum_razdel` WHERE `id` ');
mysql_query('DELETE FROM `soyz_forum_topic` WHERE `id` ');
mysql_query('DELETE FROM `time_day` WHERE `id` ');
mysql_query('DELETE FROM `time_day_soyz` WHERE `id` ');
mysql_query('DELETE FROM `users_pers` WHERE `id` ');
mysql_query('DELETE FROM `newyear_collections_users_` WHERE `id` ');
mysql_query('DELETE FROM `VIP` WHERE `id` ');
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}




echo '<a class="btnl mt4" href="?14">Обнул пробыл в игре</a>';
if(isset($_GET['14'])){
mysql_query("UPDATE `users` SET `game_time`='3600' WHERE `id` ");
$_SESSION['err'] = 'Успешно!';
header('Location: ?'); 
exit();
}


require_once ('system/footer.php');
?>