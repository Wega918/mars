<?php
$title = 'Бой';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

if($pve1['time'] > time() && $pve1['time_pve'] == 0) {
header('Location: '.$HOME.'pve/');
exit();
}

$pve_zayavki = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_zayavki` WHERE `user` = '".$user['id']."'"));
$pve_zayavki_koll = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' "),0);
$pve_bot_zayavki_koll = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' "),0);

if($pve_user and $pve_zayavki['kill'] != 1 and $pve_bot_koll > 0 ) {
header('Location: '.$HOME.'pve_boy/');
exit();
}

$pve_zayavki_us = mysql_query('SELECT * FROM `pve_zayavki` WHERE `user` = "'.$user['id'].'" limit 1 ');
$pve_zayavki_us = mysql_fetch_array($pve_zayavki_us);

$pve_bot_us = mysql_query('SELECT * FROM `pve_bot` WHERE `act` = "'.$user['id'].'" limit 1  ');
$pve_bot_us = mysql_fetch_array($pve_bot_us);









$sds = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' "),0);
$qwq  = rand(0,$sds); 
$sdsadsds = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' Limit $qwq, 1"; 
$dsdas = mysql_fetch_assoc(mysql_query($sdsadsds));

$sdcs = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '1' "),0);
$qwcq  = rand(0,$sdcs); 
$sdsadcsds = "SELECT * FROM `pve_zayavki` WHERE `kill` = '1' Limit $qwcq, 1"; 
$dsdass = mysql_fetch_assoc(mysql_query($sdsadcsds));




//echo ''.$dsdas['user'].'';
if($pve1['boy_vid'] == 1){

if($pve_bot_koll <= 0 ){
$test = $dsdas['user'];
if(!$test){
$test = $dsdass['user'];
}
}

if($pve_user_koll <= 0 ){
$test1 = $dsdas['user'];
if(!$test1){
$test1 = $dsdass['user'];
}
}

}else{
if($pve_user_koll == 1 ){
$test12 = $dsdas['user'];
if(!$test12){
$test12 = $dsdass['user'];
}
}
}



/*

if($pve_bot_koll <= 0 ){
if(!$test){
$test = $user['id'];
}
}

if($pve_user_koll <= 0 ){
if(!$test1){
$test1 = $user['id'];
}
}

if($pve_user_koll == 0 ){
if(!$test12){
$test12 = $user['id'];
}
}


*/








if($user['level'] == 3){
echo '<center><a href="?zappp">Обновить все таймеры на +2ч</a></center><hr>';
if(isset($_GET['zappp'])){
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*1)))."', `act` = '1' , `time_pve` = '0' WHERE `id` = '1' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*2)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '2' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*3)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '3' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*4)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '4' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*5)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '5' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*6)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '6' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*7)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '7' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*8)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '8' ");

mysql_query('DELETE FROM `pve_bot` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_zayavki` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_log` WHERE `id` > 0 ');

header('Location: ?');
exit();
}
}






















if($test == $user['id']){
mysql_query("UPDATE `pve` SET `time`= '".(time()+(3600*8))."', `time_pve`= '0' WHERE `id` = '".$pve1['id']."' ");

if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `uron` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close3 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `uron` > '0' ORDER BY `uron` + '1' DESC LIMIT $start,$max");
while($pve_c3 = mysql_fetch_assoc($pve_close3)){

$reyt1234 = $k_post++;
$testtt1 = 0;
if($reyt1234  > 0){
if($reyt1234  <= 5){
if($reyt1234  == 1){$tip = 6;$chests_name = 'Легендарный сундук';}
if($reyt1234  == 2){$tip = 5;$chests_name = 'Магический сундук';}
if($reyt1234  == 3){$tip = 4;$chests_name = 'Королевский сундук';}
if($reyt1234  == 4){$tip = 3;$chests_name = 'Золотой сундук';}
if($reyt1234  == 5){$tip = 2;$chests_name = 'Серебряный сундук';}

mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."' ");

$usss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_c3['user']."'"));
mysql_query("INSERT INTO `pve_nagrada_history` SET `id_battle` = '".$pve1['id']."', `pobeda` = '1', `time` = '".time()."', `user` = '".$pve_c3['user']."', `uron` = '".$pve_c3['uron']."', `kill_bots` = '".$pve_c3['kill_bots']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($usss['rubin'] + (100*$pve_c3['kill_bots']) )."', `rock` = '".($usss['rock'] + ceil(($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5)) )."',`Diamonds` = '".($usss['Diamonds'] + ceil(($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5)) )."' WHERE `id` = '".$pve_c3['user']."' ");

$soyzic = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$usss['soyz']."'"));
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyzic['Diamonds']+ ceil(($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5)) )."' WHERE `id` = '".$soyzic['id']."' ");

$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt1+$reyt1234).' место по урону. <br>
<font size="2">Награда за сражение: </font><img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))).'</font> <img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))).'</font> <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.ceil(100*$pve_c3['kill_bots']).'</font>'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c3['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c3['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c3['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c3['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c3['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c3['user']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `pve` SET `top_".($testtt1+$reyt1234)."_uron` = '".$pve_c3['user']."', `uron_".($testtt1+$reyt1234)."` = '".$pve_c3['uron']."' WHERE `id` = '".($pve1['id'])."' ");

$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c3['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}


$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c3['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

}




if($reyt1234  > 5){
if($reyt1234  > 5){$tip = 1;$chests_name = 'Деревянный сундук'; }

mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."' ");

$usss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_c3['user']."'"));
mysql_query("INSERT INTO `pve_nagrada_history` SET `id_battle` = '".$pve1['id']."', `pobeda` = '1', `time` = '".time()."', `user` = '".$pve_c3['user']."', `uron` = '".$pve_c3['uron']."', `kill_bots` = '".$pve_c3['kill_bots']."' ");
mysql_query("UPDATE `users` SET `rock` = '".($usss['rock'] + ceil(($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5)) )."', `Diamonds` = '".($usss['Diamonds'] + ceil(($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5)) )."' WHERE `id` = '".$pve_c3['user']."' ");

$soyzic = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$usss['soyz']."'"));
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyzic['Diamonds']+ ceil(($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5)) )."' WHERE `id` = '".$soyzic['id']."' ");

$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt1+$reyt1234).' место по урону. <br>
<font size="2">Награда за сражение: </font><img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))).'</font> <img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))).'</font> <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.ceil(100*$pve_c3['kill_bots']).'</font>'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c3['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c3['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c3['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c3['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c3['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c3['user']."', `time` = '".time()."', `readlen` = '0'");

$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c3['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c3['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

}

$pve_vip_ = mysql_fetch_array(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$pve_c3['user'].'"'));
if($pve_vip_){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip_['id']."' ");
}

}

} while ($pve_c3 = mysql_fetch_array ($pve_close3));



















if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill_bots` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close4 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `kill_bots` > '0' ORDER BY `kill_bots` + '1' DESC LIMIT $start,$max");
while($pve_c4 = mysql_fetch_assoc($pve_close4)){
$reyt125534 = $k_post++;
$testtt2 = 0;
if($reyt125534  > 0){
if($reyt125534  <= 5){
if($reyt125534  == 1){$tip = 6;$chests_name = 'Легендарный сундук';}
if($reyt125534  == 2){$tip = 5;$chests_name = 'Магический сундук';}
if($reyt125534  == 3){$tip = 4;$chests_name = 'Королевский сундук';}
if($reyt125534  == 4){$tip = 3;$chests_name = 'Золотой сундук';}
if($reyt125534  == 5){$tip = 2;$chests_name = 'Серебряный сундук';}
mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."' ");
$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt2+$reyt125534).' место по убийствам  ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c4['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c4['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c4['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c4['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c4['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c4['user']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `pve` SET `top_".($testtt2+$reyt125534)."_kill` = '".$pve_c4['user']."', `kill_".($testtt2+$reyt125534)."` = '".$pve_c4['kill_bots']."' WHERE `id` = '".($pve1['id'])."' ");

$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c4['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c4['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}


}

if($reyt125534  > 5){
if($reyt125534  > 5){$tip = 1;$chests_name = 'Деревянный сундук'; }
mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."' ");
$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt2+$reyt125534).' место по убийствам  ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c4['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c4['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c4['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c4['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c4['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c4['user']."', `time` = '".time()."', `readlen` = '0'");


$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c4['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c4['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

}

$pve_vip_ = mysql_fetch_array(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$pve_c4['user'].'"'));
if($pve_vip_){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip_['id']."' ");
}

}

} while ($pve_c4 = mysql_fetch_array ($pve_close4));
mysql_query('DELETE FROM `pve_bot` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_zayavki` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_log` WHERE `id` > 0 ');
$tetee = 1;

mysql_query("UPDATE `pve` SET `time_pve_boy` = '".(time()+60)."', `time_over` = '".(time())."', `where_user` = '".$where_user."', `where_bot` = '".$where_bot."', `user_vigilo` = '".($user_vigilo)."', `bot_vigilo` = '".($bot_vigilo)."', `pobeda` = '1' WHERE `id` = '".($pve1['id'])."' "); // победа

if(($pve1['id']+1) > 8){
$id = 1;
}else{
$id = ($pve1['id']+1);
}

mysql_query("UPDATE `pve` SET `act` = '0' WHERE `id` = '".($id-1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*1))."', `act` = '1' WHERE `id` = '".$id."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*2))."', `act` = '0' WHERE `id` = '".($id+1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*3)))."', `act` = '0' WHERE `id` = '".($id+2)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*4)))."', `act` = '0' WHERE `id` = '".($id+3)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*5)))."', `act` = '0' WHERE `id` = '".($id+4)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*6)))."', `act` = '0' WHERE `id` = '".($id+5)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*7)))."', `act` = '0' WHERE `id` = '".($id+6)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*8)))."', `act` = '0' WHERE `id` = '".($id+7)."' ");


//$test = 1;
header('Location: '.$HOME.'pve/');
exit();
}



































if($test1 == $user['id']){
mysql_query("UPDATE `pve` SET `time`= '".(time()+(3600*16))."', `time_pve`= '0' WHERE `id` = '".$pve1['id']."' ");

if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `uron` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close3 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `uron` > '0' ORDER BY `uron` + '1' DESC LIMIT $start,$max");
while($pve_c3 = mysql_fetch_assoc($pve_close3)){
$reyt1234 = $k_post++;
$testtt1 = 0;
if($reyt1234  > 0){
mysql_query("UPDATE `pve` SET `top_".($testtt1+$reyt1234)."_uron` = '".$pve_c3['user']."', `uron_".($testtt1+$reyt1234)."` = '".$pve_c3['uron']."' WHERE `id` = '".($pve1['id'])."' ");

$usss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_c3['user']."'"));
mysql_query("INSERT INTO `pve_nagrada_history` SET `id_battle` = '".$pve1['id']."', `pobeda` = '2', `time` = '".time()."', `user` = '".$pve_c3['user']."', `uron` = '".$pve_c3['uron']."', `kill_bots` = '".$pve_c3['kill_bots']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($usss['rubin'] + (((100*$pve_c3['kill_bots']))/4) )."', `rock` = '".($usss['rock'] + ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4) )."',`Diamonds` = '".($usss['Diamonds'] + ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4) )."' WHERE `id` = '".$pve_c3['user']."' ");

$soyzic = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$usss['soyz']."'"));
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyzic['Diamonds']+ ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4) )."' WHERE `id` = '".$soyzic['id']."' ");

$txt = '<font size="2">Награда за сражение: </font><img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4).'</font> <img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4).'</font> <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.ceil(((100*$pve_c3['kill_bots']))/4).'</font>'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c3['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c3['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c3['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c3['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c3['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c3['user']."', `time` = '".time()."', `readlen` = '0'");


$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c3['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c3['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

$pve_vip_ = mysql_fetch_array(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$pve_c3['user'].'"'));
if($pve_vip_){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip_['id']."' ");
}

}
} while ($pve_c3 = mysql_fetch_array ($pve_close3));



if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill_bots` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close4 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `kill_bots` > '0' ORDER BY `kill_bots` + '1' DESC LIMIT $start,$max");
while($pve_c4 = mysql_fetch_assoc($pve_close4)){
$reyt125534 = $k_post++;
$testtt2 = 0;
if($reyt125534  > 0){
if($reyt125534  <= 5){
mysql_query("UPDATE `pve` SET `top_".($testtt2+$reyt125534)."_kill` = '".$pve_c4['user']."', `kill_".($testtt2+$reyt125534)."` = '".$pve_c4['kill_bots']."' WHERE `id` = '".($pve1['id'])."' ");
}
}
} while ($pve_c4 = mysql_fetch_array ($pve_close4));


mysql_query('DELETE FROM `pve_bot` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_zayavki` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_log` WHERE `id` > 0 ');
$tetee = 1;
mysql_query("UPDATE `pve` SET `time_pve_boy` = '".(time()+60)."', `time_over` = '".(time())."', `where_user` = '".$where_user."', `where_bot` = '".$where_bot."', `user_vigilo` = '".($user_vigilo)."', `bot_vigilo` = '".($bot_vigilo)."', `pobeda` = '2' WHERE `id` = '".($pve1['id'])."' "); // поражение

if(($pve1['id']+1) > 8){
$id = 1;
}else{
$id = ($pve1['id']+1);
}

mysql_query("UPDATE `pve` SET `act` = '0' WHERE `id` = '".($id-1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*1))."', `act` = '1' WHERE `id` = '".$id."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*2))."', `act` = '0' WHERE `id` = '".($id+1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*3)))."', `act` = '0' WHERE `id` = '".($id+2)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*4)))."', `act` = '0' WHERE `id` = '".($id+3)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*5)))."', `act` = '0' WHERE `id` = '".($id+4)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*6)))."', `act` = '0' WHERE `id` = '".($id+5)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*7)))."', `act` = '0' WHERE `id` = '".($id+6)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*8)))."', `act` = '0' WHERE `id` = '".($id+7)."' ");



//$test = 1;
header('Location: '.$HOME.'pve/');
exit();
}











































if($test12 == $user['id']){
mysql_query("UPDATE `pve` SET `time`= '".(time()+(3600*16))."', `time_pve`= '0', `user`= '".$pve1['user']."' WHERE `id` = '".$pve1['id']."' ");

$usss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve1['user']."'"));
mysql_query("UPDATE `users` SET `rubin` = '".($usss['rubin'] + 500)."' WHERE `id` = '".$usss['id']."' ");
$txt = '<font size="2">Награда за сражение: </font><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">500</font>'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$usss['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$usss['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$usss['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$usss['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$usss['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$usss['id']."', `time` = '".time()."', `readlen` = '0'");







if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `uron` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close3 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `uron` > '0' ORDER BY `uron` + '1' DESC LIMIT $start,$max");
while($pve_c3 = mysql_fetch_assoc($pve_close3)){

$reyt1234 = $k_post++;
$testtt1 = 0;
if($reyt1234  > 0){
if($reyt1234  <= 5){
if($reyt1234  == 1){$tip = 6;$chests_name = 'Легендарный сундук';}
if($reyt1234  == 2){$tip = 5;$chests_name = 'Магический сундук';}
if($reyt1234  == 3){$tip = 4;$chests_name = 'Королевский сундук';}
if($reyt1234  == 4){$tip = 3;$chests_name = 'Золотой сундук';}
if($reyt1234  == 5){$tip = 2;$chests_name = 'Серебряный сундук';}

mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."' ");

$usss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_c3['user']."'"));
mysql_query("INSERT INTO `pve_nagrada_history` SET `where_rubin` = '".$pve_c3['where_rubin']."',  `id_battle` = '".$pve1['id']."', `pobeda` = '1', `time` = '".time()."', `user` = '".$pve_c3['user']."', `uron` = '".$pve_c3['uron']."', `kill_bots` = '".$pve_c3['kill_bots']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($usss['rubin'] +(50*$pve_c3['kill_bots']) )."', `rock` = '".($usss['rock'] + ceil(($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24)) )."',`Diamonds` = '".($usss['Diamonds'] + ceil(($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24)) )."' WHERE `id` = '".$pve_c3['user']."' ");

$soyzic = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$usss['soyz']."'"));
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyzic['Diamonds']+ ceil(($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24)) )."' WHERE `id` = '".$soyzic['id']."' ");

$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt1+$reyt1234).' место по урону. <br>
<font size="2">Награда за сражение: </font><img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.ceil((($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24))).'</font> <img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.ceil((($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24))).'</font> <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.ceil((50*$pve_c3['kill_bots'])).'</font> <font color="red">+'.ceil((($pve_c3['where_rubin']))).'</font>'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c3['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c3['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c3['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c3['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c3['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c3['user']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `pve` SET `top_".($testtt1+$reyt1234)."_uron` = '".$pve_c3['user']."', `uron_".($testtt1+$reyt1234)."` = '".$pve_c3['uron']."' WHERE `id` = '".($pve1['id'])."' ");


$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c3['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c3['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

}




if($reyt1234  > 5){
if($reyt1234  > 5){$tip = 1;$chests_name = 'Деревянный сундук'; }

mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c3['user']."', `tip` = '".$tip."' ");

$usss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_c3['user']."'"));
mysql_query("INSERT INTO `pve_nagrada_history` SET `where_rubin` = '".$pve_c3['where_rubin']."',  `id_battle` = '".$pve1['id']."', `pobeda` = '1', `time` = '".time()."', `user` = '".$pve_c3['user']."', `uron` = '".$pve_c3['uron']."', `kill_bots` = '".$pve_c3['kill_bots']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($usss['rubin'] +(50*$pve_c3['kill_bots']) )."', `rock` = '".($usss['rock'] + ceil(($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24)) )."', `Diamonds` = '".($usss['Diamonds'] + ceil(($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24)) )."' WHERE `id` = '".$pve_c3['user']."' ");

$soyzic = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$usss['soyz']."'"));
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyzic['Diamonds']+ ceil(($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24)) )."' WHERE `id` = '".$soyzic['id']."' ");


$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt1+$reyt1234).' место по урону. <br>
<font size="2">Награда за сражение: </font><img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.ceil((($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24))).'</font> <img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.ceil((($pve_c3['kill_bots']*5)+(($pve_c3['uron']/1000)*24))).'</font> <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.ceil(50*$pve_c3['kill_bots']).'</font> <font color="red">+'.ceil((($pve_c3['where_rubin']))).'</font>'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c3['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c3['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c3['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c3['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c3['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c3['user']."', `time` = '".time()."', `readlen` = '0'");

$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c3['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c3['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

$pve_vip_ = mysql_fetch_array(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$pve_c3['user'].'"'));
if($pve_vip_){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip_['id']."' ");
}

}

}

} while ($pve_c3 = mysql_fetch_array ($pve_close3));






if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill_bots` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close4 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `kill_bots` > '0' ORDER BY `kill_bots` + '1' DESC LIMIT $start,$max");
while($pve_c4 = mysql_fetch_assoc($pve_close4)){
$reyt125534 = $k_post++;
$testtt2 = 0;
if($reyt125534  > 0){
if($reyt125534  <= 5){
if($reyt125534  == 1){$tip = 6;$chests_name = 'Легендарный сундук';}
if($reyt125534  == 2){$tip = 5;$chests_name = 'Магический сундук';}
if($reyt125534  == 3){$tip = 4;$chests_name = 'Королевский сундук';}
if($reyt125534  == 4){$tip = 3;$chests_name = 'Золотой сундук';}
if($reyt125534  == 5){$tip = 2;$chests_name = 'Серебряный сундук';}
mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."' ");
$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt2+$reyt125534).' место по убийствам  ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c4['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c4['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c4['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c4['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c4['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c4['user']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `pve` SET `top_".($testtt2+$reyt125534)."_kill` = '".$pve_c4['user']."', `kill_".($testtt2+$reyt125534)."` = '".$pve_c4['kill_bots']."' WHERE `id` = '".($pve1['id'])."' ");

$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c4['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c4['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

}

if($reyt125534  > 5){
if($reyt125534  > 5){$tip = 1;$chests_name = 'Деревянный сундук'; }
mysql_query("INSERT INTO `chests_history` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$pve_c4['user']."', `tip` = '".$tip."' ");
$txt = '<b>'.$pve1['name'].'</b> Вы получили <b>'.$chests_name.'</b> за '.($testtt2+$reyt125534).' место по убийствам  ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c4['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c4['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c4['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c4['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c4['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c4['user']."', `time` = '".time()."', `readlen` = '0'");

$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c4['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c4['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c4['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c4['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}

}
$pve_vip_ = mysql_fetch_array(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$pve_c4['user'].'"'));
if($pve_vip_){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip_['id']."' ");
}

}

} while ($pve_c4 = mysql_fetch_array ($pve_close4));
mysql_query('DELETE FROM `pve_bot` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_zayavki` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_log` WHERE `id` > 0 ');
$tetee = 1;

mysql_query("UPDATE `pve` SET `time_pve_boy` = '".(time()+60)."', `time_over` = '".(time())."', `where_user` = '".$where_user."', `where_bot` = '".$where_bot."', `user_vigilo` = '".($user_vigilo)."', `bot_vigilo` = '".($bot_vigilo)."', `pobeda` = '1' WHERE `id` = '".($pve1['id'])."' "); // победа

if(($pve1['id']+1) > 8){
$id = 1;
}else{
$id = ($pve1['id']+1);
}



mysql_query("UPDATE `pve` SET `act` = '0' WHERE `id` = '".($id-1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*1))."', `act` = '1' WHERE `id` = '".$id."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*2))."', `act` = '0' WHERE `id` = '".($id+1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*3)))."', `act` = '0' WHERE `id` = '".($id+2)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*4)))."', `act` = '0' WHERE `id` = '".($id+3)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*5)))."', `act` = '0' WHERE `id` = '".($id+4)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*6)))."', `act` = '0' WHERE `id` = '".($id+5)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*7)))."', `act` = '0' WHERE `id` = '".($id+6)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*8)))."', `act` = '0' WHERE `id` = '".($id+7)."' ");

header('Location: '.$HOME.'pve/');
exit();
}





























if($pve1['time'] > time() and ($pve1['time_pve'] < time() && $pve1['time_pve'] >= 0) ) {
mysql_query("UPDATE `pve` SET `time`= '".(time()+(3600*16))."', `time_pve`= '0' WHERE `id` = '".$pve1['id']."' ");


if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `uron` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close3 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `uron` > '0' ORDER BY `uron` + '1' DESC LIMIT $start,$max");
while($pve_c3 = mysql_fetch_assoc($pve_close3)){
$reyt1234 = $k_post++;
$testtt1 = 0;
if($reyt1234  > 0){
mysql_query("UPDATE `pve` SET `top_".($testtt1+$reyt1234)."_uron` = '".$pve_c3['user']."', `uron_".($testtt1+$reyt1234)."` = '".$pve_c3['uron']."' WHERE `id` = '".($pve1['id'])."' ");

$usss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_c3['user']."'"));
mysql_query("INSERT INTO `pve_nagrada_history` SET `where_rubin` = '".$pve_c3['where_rubin']."',  `id_battle` = '".$pve1['id']."', `pobeda` = '2', `time` = '".time()."', `user` = '".$pve_c3['user']."', `uron` = '".$pve_c3['uron']."', `kill_bots` = '".$pve_c3['kill_bots']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($usss['rubin'] + (((50*$pve_c3['kill_bots']))/4) )."', `rock` = '".($usss['rock'] + ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4) )."',`Diamonds` = '".($usss['Diamonds'] + ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4) )."' WHERE `id` = '".$pve_c3['user']."' ");

$soyzic = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$usss['soyz']."'"));
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyzic['Diamonds']+ ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4) )."' WHERE `id` = '".$soyzic['id']."' ");

$txt = '<font size="2">Награда за сражение: </font><img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4).'</font> <img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.ceil((($pve_c3['kill_bots']*2)+(($pve_c3['uron']/1000)*5))/4).'</font> <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.ceil(((50*$pve_c3['kill_bots']))/4).'</font> <font color="red">+'.ceil((($pve_c3['where_rubin']))).'</font>'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$pve_c3['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$pve_c3['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$pve_c3['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$pve_c3['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$pve_c3['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$pve_c3['user']."', `time` = '".time()."', `readlen` = '0'");


$ank_mission_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_mission_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));
$ank_mission_user_22 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "22" '));
if($ank_mission_user_20['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_20['prog_']+1)."' WHERE `id` = '".$ank_mission_user_20['id']."' ");
}
if($ank_mission_user_21['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_21['prog_']+$pve_c3['uron'])."' WHERE `id` = '".$ank_mission_user_21['id']."' ");
}
if($ank_mission_user_22['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($ank_mission_user_22['prog_']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_mission_user_22['id']."' ");
}

$ank_Achievements_user_19 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "19" '));
$ank_Achievements_user_20 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "20" '));
$ank_Achievements_user_21 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$pve_c3['user'].'" and `number` = "21" '));

if($ank_Achievements_user_19['prog'] < $ank_Achievements_user_19['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_19['prog']+1)."' WHERE `id` = '".$ank_Achievements_user_19['id']."' ");
}
if($ank_Achievements_user_20['prog'] < $ank_Achievements_user_20['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_20['prog']+$pve_c3['uron'])."' WHERE `id` = '".$ank_Achievements_user_20['id']."' ");
}
if($ank_Achievements_user_21['prog'] < $ank_Achievements_user_21['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($ank_Achievements_user_21['prog']+$pve_c3['kill_bots'])."' WHERE `id` = '".$ank_Achievements_user_21['id']."' ");
}


$pve_vip_ = mysql_fetch_array(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$pve_c3['user'].'"'));
if($pve_vip_){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip_['id']."' ");
}


}
} while ($pve_c3 = mysql_fetch_array ($pve_close3));



if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill_bots` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_close4 = mysql_query("SELECT * FROM `pve_zayavki`  WHERE `kill_bots` > '0' ORDER BY `kill_bots` + '1' DESC LIMIT $start,$max");
while($pve_c4 = mysql_fetch_assoc($pve_close4)){
$reyt125534 = $k_post++;
$testtt2 = 0;
if($reyt125534  > 0){
if($reyt125534  <= 5){
mysql_query("UPDATE `pve` SET `top_".($testtt2+$reyt125534)."_kill` = '".$pve_c4['user']."', `kill_".($testtt2+$reyt125534)."` = '".$pve_c4['kill_bots']."' WHERE `id` = '".($pve1['id'])."' ");
}
}

} while ($pve_c4 = mysql_fetch_array ($pve_close4));



mysql_query('DELETE FROM `pve_bot` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_zayavki` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_log` WHERE `id` > 0 ');

$tetee = 1;
mysql_query("UPDATE `pve` SET `time_pve_boy` = '".(time()+60)."', `time_over` = '".(time())."', `where_user` = '".$where_user."', `where_bot` = '".$where_bot."', `user_vigilo` = '".($user_vigilo)."', `bot_vigilo` = '".($bot_vigilo)."', `pobeda` = '3' WHERE `id` = '".($pve1['id'])."' "); // вышло время

if(($pve1['id']+1) > 8){
$id = 1;
}else{
$id = ($pve1['id']+1);
}

mysql_query("UPDATE `pve` SET `act` = '0' WHERE `id` = '".($id-1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*1))."', `act` = '1' WHERE `id` = '".$id."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+(3600*2))."', `act` = '0' WHERE `id` = '".($id+1)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*3)))."', `act` = '0' WHERE `id` = '".($id+2)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*4)))."', `act` = '0' WHERE `id` = '".($id+3)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*5)))."', `act` = '0' WHERE `id` = '".($id+4)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*6)))."', `act` = '0' WHERE `id` = '".($id+5)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*7)))."', `act` = '0' WHERE `id` = '".($id+6)."' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*8)))."', `act` = '0' WHERE `id` = '".($id+7)."' ");


//$test = 1;
header('Location: '.$HOME.'pve/');
exit();
}
































if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve` WHERE `act` = '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_ = mysql_query("SELECT * FROM `pve` WHERE `act` = '1' ORDER BY `time` + `id` ASC LIMIT $start,$max");
while($pve = mysql_fetch_assoc($pve_)){


$cost = 500;
if(isset($_GET['points/'])){
if($pve_zayavki['points'] >= 1){
$_SESSION['err'] = '<font color=red>Восстанавливаться в Битве можно 1 раз.</font>';
header('Location: ?');
exit();
}
if($pve_zayavki_koll <= 1){
$_SESSION['err'] = '<font color=red>ошибка</font>';
header('Location: ?');
exit();
}
if($user['rubin'] < $cost){
$_SESSION['err'] = '<font color=red>Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($cost-$user['rubin']).'</font>';
header('Location: ?');
exit();
}
$text = '<img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($user['id']).' <b>Восстановился</b>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$user['user']."', `act` = '".$user['act']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_zayavki` SET `points` = '1', `kill` = '0' , `h_` = '".($user['h']*2)."' WHERE `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost)."' WHERE `id` = '".$user['id']."' ");
header('Location: '.$HOME.'pve_boy/');
exit();
}



if($pve['boy_vid'] == 1){
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pve/"><font color=#e6e3e3 size=4><tt>PVE</tt></font></a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pvp/"><font color=#e6e3e3 size=4><tt>PVP</tt></font></a></td>
</tr></tbody></table>';





if($pve_bot_zayavki_koll > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>В бою:</b> <img width="24" height="24" src="/images/avatars/1/on/1.png"> '.$pve_zayavki_koll.' / <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.$pve_bot_zayavki_koll.'</font>
</span></li></ul></div>';
echo '<a class="btnl mt4" href="'.$HOME.'pve_log/">Обновить</a>';
if($pve_zayavki and $pve_zayavki['points'] == 0){
if($pve_zayavki_koll > 1){
echo '<a class="btnl mt4" href="?points/">Восстанновится за <font color=red><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$cost.'</font></a>';
}
}
if (empty($user['max'])) $user['max']=10;
$max = 20;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_log` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_log = mysql_query("SELECT * FROM `pve_log` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
while($pve_l = mysql_fetch_assoc($pve_log)){
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span><span class="nobr"><font size=1>'.$pve_l['text'].'</font></span></span></span>
<span class="fr nobr"><font size=1>'.time_last($pve_l['time']).'</font></span><div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';
}else{
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=black>Ожидайте завершения битвы...</font>
</span></li></ul></div>';
echo '<a class="btnl mt4" href="'.$HOME.'pve_log/">Обновить</a>';
if($pve_zayavki_koll <=0 and $pve_bot_zayavki_koll<=0){
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*1)))."', `act` = '1' , `time_pve` = '0' WHERE `id` = '1' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*2)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '2' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*3)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '3' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*4)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '4' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*5)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '5' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*6)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '6' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*7)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '7' ");
mysql_query("UPDATE `pve` SET `time` = '".(time()+((3600*8)))."', `act` = '0', `time_pve` = '0'  WHERE `id` = '8' ");

mysql_query('DELETE FROM `pve_bot` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_zayavki` WHERE `id` > 0 ');
mysql_query('DELETE FROM `pve_log` WHERE `id` > 0 ');
}
}









}else{
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pve/"><font color=#e6e3e3 size=4><tt>PVE</tt></font></a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pvp/"><font color=#e6e3e3 size=4><tt>PVP</tt></font></a></td>
</tr></tbody></table>';


$pve_zayavki_koll = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' "),0);
if($pve1['boy_vid'] == 1){
if($pve_bot_zayavki_koll > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>В бою:</b> <img width="24" height="24" src="/images/avatars/1/on/1.png"> '.$pve_zayavki_koll.' / <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.$pve_bot_zayavki_koll.'</font>
</span></li></ul></div>';
echo '<a class="btnl mt4" href="'.$HOME.'pve_log/">Обновить</a>';
if($pve_zayavki and $pve_zayavki['points'] == 0){
if($pve_zayavki_koll > 1){
echo '<a class="btnl mt4" href="?points/">Восстанновится за <font color=red><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$cost.'</font></a>';
}
}
if (empty($user['max'])) $user['max']=10;
$max = 20;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_log` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_log = mysql_query("SELECT * FROM `pve_log` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
while($pve_l = mysql_fetch_assoc($pve_log)){
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span><span class="nobr"><font size=1>'.$pve_l['text'].'</font></span></span></span>
<span class="fr nobr"><font size=1>'.time_last($pve_l['time']).'</font></span><div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';
}else{
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=black>Ожидайте завершения битвы...</font>
</span></li></ul></div>';
echo '<a class="btnl mt4" href="'.$HOME.'pve_log/">Обновить</a>';
}
}else{
if($pve_zayavki_koll > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>В бою:</b> <img width="24" height="24" src="/images/avatars/1/on/1.png"> '.$pve_zayavki_koll.' 
</span></li></ul></div>';
echo '<a class="btnl mt4" href="'.$HOME.'pve_log/">Обновить</a>';
if($pve_zayavki and $pve_zayavki['points'] == 0){
if($pve_zayavki_koll > 1){
echo '<a class="btnl mt4" href="?points/">Восстанновится за <font color=red><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$cost.'</font></a>';
}
}
if (empty($user['max'])) $user['max']=10;
$max = 20;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_log` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_log = mysql_query("SELECT * FROM `pve_log` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
while($pve_l = mysql_fetch_assoc($pve_log)){
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span><span class="nobr"><font size=1>'.$pve_l['text'].'</font></span></span></span>
<span class="fr nobr"><font size=1>'.time_last($pve_l['time']).'</font></span><div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';
}else{
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=black>Ожидайте завершения битвы...</font>
</span></li></ul></div>';
echo '<a class="btnl mt4" href="'.$HOME.'pve_log/">Обновить</a>';
}
}








}














}






















require_once ('../system/footer.php');
?>