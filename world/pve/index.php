<?php
$title = 'Сражения';
//-----Подключаем функции-----//
require_once ('../../system/function.php');
//-----Подключаем вверх-----//
require_once ('../../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
/*
if($user['id'] != 1){
$_SESSION['err'] = '<font color=red>Техработы...</font>';
header('Location: '.$HOME.'');
exit();
}
*/
$world_pve_bots = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve_bots` WHERE `user` = '".$user['id']."' ")); // заяки
$world_pve = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve` WHERE `user` = '".$user['id']."' ")); // комната
$world_pve_bots_col = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `user` = '".$user['id']."' and `kill` = '0' "),0);
$world_pve_bots_col_ = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `user` = '".$user['id']."' "),0);
$world_pve_vip = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve_vip` WHERE `user` = '".$user['id']."' ")); // вип
$world_pve_mission = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve_mission` WHERE `user` = '".$user['id']."' ")); // миссия


if(!$world_pve_mission){
mysql_query("INSERT INTO `world_pve_mission` SET `user` = '".$user['id']."' ");
}

if($world_pve['time_start'] < time() && $world_pve['time_start'] > 0) {
mysql_query("UPDATE `world_pve` SET `time_start` = '0', `time` = '".(time()+600)."' WHERE `id` = '".$world_pve['id']."' ");
################################
$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."' "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."'  Limit $m, 1"; 
$rand_id = mysql_fetch_assoc(mysql_query($query));

if($rand_id['id'] <= 0) {
$count1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."' "),0);
$m1  = rand(0,$count1); 
$query1 = "SELECT * FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."'  Limit $m1, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query1));
$rand_id = $rand_id1;
}
if($world_pve['act'] <= 0) {
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."' WHERE `id` = '".$world_pve['id']."' ");
}
################################
header('Location: '.$HOME.'world/pve/buy/');
exit();
}
if($world_pve['time'] > time() && $world_pve['h_'] > 0 && $world_pve_bots_col > 0) {
header('Location: '.$HOME.'world/pve/buy/');
exit();
}

if($world_pve['time'] < time() && $world_pve['time'] > 0) {
mysql_query('DELETE FROM `world_pve` WHERE `user` = '.$user['id'].' ');// удаляем битву
mysql_query('DELETE FROM `world_pve_bots` WHERE `user` = '.$user['id'].' ');// удаляем ботов
mysql_query('DELETE FROM `world_pve_log` WHERE `user` = '.$user['id'].' ');// удаляем логи

header('Location: ?');
exit();
}
##############################################################################################################################################################################################









if($world_pve['pobeda'] != 0){

if($world_pve['pobeda'] == 1){
//$musor_proc = floor($world_pve['my_kill']*10000 + ($user['col_pve_game']*10000));
//$nagrada = ($user['musor_proc']*0.05/100);
//$user['musor_proc'] = toBC($user['musor_proc']);
$nagrada = bcmul(toBC($user['musor_proc']), '0.0005', 10);

echo '<hr><center><font size=4 color=green>Победа!</font><hr>';
echo '<img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($user['id']).':  убито противников: <font color=black>'.$world_pve['my_kill'].'</font> <br>';
echo '<img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($user['id']).':  нанесено урона: <font color=black>'.$world_pve['my_uron'].'</font> <br>';
echo '<hr>';
echo 'награда: <img src="/images/header/money_36.png" alt="o" width="24" height="24"> '.n_f($nagrada).'% ';
if($user['col_pve_game'] == 5 or $user['col_pve_game'] == 10 or $user['col_pve_game'] == 15 or $user['col_pve_game'] == 20 or $user['col_pve_game'] == 25 or $user['col_pve_game'] == 30 or $user['col_pve_game'] == 35 or $user['col_pve_game'] == 40 or $user['col_pve_game'] == 45 or $user['col_pve_game'] == 50 or $user['col_pve_game'] == 55 or $user['col_pve_game'] == 60 or $user['col_pve_game'] == 65 or $user['col_pve_game'] == 70 or $user['col_pve_game'] == 75 or $user['col_pve_game'] == 80 or $user['col_pve_game'] == 85 or $user['col_pve_game'] == 90 or $user['col_pve_game'] == 95 or $user['col_pve_game'] == 100){
echo '<br> <img width="30" height="30" src="/chests/chests/6.png"> <font size="2">Легендарный сундук</font>';
}
echo '<hr></center><a class="btnl mt4" href="?take">Забрать награду</a>';
if(isset($_GET['take'])){
if($world_pve['pobeda'] != 1){header('Location: ?');exit();}
if($pve_vip){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip['id']."' ");
}
$new_musor_proc = bcadd(toBC($user['musor_proc']), toBC($nagrada), 10);
mysql_query("UPDATE `users` SET `musor_proc` = '".$new_musor_proc."' WHERE `id` = '".$user['id']."' ");

$new_turnir_musor_1 = bcadd(toBC($soyz['turnir_musor_1']), toBC($nagrada), 10);
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".$new_turnir_musor_1."' WHERE `id` = '".$soyz['id']."' ");

$h = ($world_pve['h']*2)-$world_pve['h_'];
$h_ = ($world_pve_vip['h_']-$h);
if($h_ > 0){
$h_1 = $h_;
}else{
mysql_query('DELETE FROM `world_pve_vip` WHERE `user` = '.$user['id'].' ');// удаляем вип
}
if($h_ > 0){
mysql_query("UPDATE `world_pve_vip` SET `h_` = '".$h_1."' WHERE `id` = '".$world_pve_vip['id']."' ");
}

mysql_query('DELETE FROM `world_pve` WHERE `user` = '.$user['id'].' ');// удаляем битву
mysql_query('DELETE FROM `world_pve_bots` WHERE `user` = '.$user['id'].' ');// удаляем ботов
mysql_query('DELETE FROM `world_pve_log` WHERE `user` = '.$user['id'].' ');// удаляем логи

if($user['col_pve_game'] == 5 or $user['col_pve_game'] == 10 or $user['col_pve_game'] == 15 or $user['col_pve_game'] == 20 or $user['col_pve_game'] == 25 or $user['col_pve_game'] == 30 or $user['col_pve_game'] == 35 or $user['col_pve_game'] == 40 or $user['col_pve_game'] == 45 or $user['col_pve_game'] == 50 or $user['col_pve_game'] == 55 or $user['col_pve_game'] == 60 or $user['col_pve_game'] == 65 or $user['col_pve_game'] == 70 or $user['col_pve_game'] == 75 or $user['col_pve_game'] == 80 or $user['col_pve_game'] == 85 or $user['col_pve_game'] == 90 or $user['col_pve_game'] == 95 or $user['col_pve_game'] == 100){
$chests_name = 'Легендарный сундук';
$tip = 6;
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$tip."' ");
}

header('Location: ?');
exit();
}
}


if($world_pve['pobeda'] == 2){
echo '<hr><center><font color=red>Поражение, вышло время!</font><hr><a class="btnl mt4" href="?del_2">Удалить бой</a></center>'.$h_.'';
if(isset($_GET['del_2'])){
if($world_pve['pobeda'] != 2){header('Location: ?');exit();}
if($pve_vip){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip['id']."' ");
}

$h = ($world_pve['h']*2)-$world_pve['h_'];
$h_ = ($world_pve_vip['h_']-$h);
if($h_ > 0){
$h_1 = $h_;
}else{
mysql_query('DELETE FROM `world_pve_vip` WHERE `user` = '.$user['id'].' ');// удаляем вип
}
if($h_ > 0){
mysql_query("UPDATE `world_pve_vip` SET `h_` = '".$h_1."' WHERE `id` = '".$world_pve_vip['id']."' ");
}

mysql_query('DELETE FROM `world_pve` WHERE `user` = '.$user['id'].' ');// удаляем битву
mysql_query('DELETE FROM `world_pve_bots` WHERE `user` = '.$user['id'].' ');// удаляем ботов
mysql_query('DELETE FROM `world_pve_log` WHERE `user` = '.$user['id'].' ');// удаляем логи
header('Location: ?');
exit();
}
}


if($world_pve['pobeda'] == 3){
echo '<hr><center><font color=red>Поражение, Вы были убиты!</font><hr><a class="btnl mt4" href="?del_3">Удалить бой</a></center>';
if(isset($_GET['del_3'])){
if($world_pve['pobeda'] != 3){header('Location: ?');exit();}
if($pve_vip){
mysql_query("UPDATE `pve_vip` SET `act` = '0' WHERE `id` = '".$pve_vip['id']."' ");
}
mysql_query('DELETE FROM `world_pve` WHERE `user` = '.$user['id'].' ');// удаляем битву
mysql_query('DELETE FROM `world_pve_bots` WHERE `user` = '.$user['id'].' ');// удаляем ботов
mysql_query('DELETE FROM `world_pve_log` WHERE `user` = '.$user['id'].' ');// удаляем логи
mysql_query('DELETE FROM `world_pve_vip` WHERE `user` = '.$user['id'].' ');// удаляем вип
header('Location: ?');
exit();
}
}

}else{

$cost_boy = 5;
##############################################################################################################################################################################################
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'pve/"><font color=#e6e3e3 size=4><tt>Сражения</tt></font></a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pvp/"><font color=#e6e3e3 size=4><tt>PVP</tt></font></a></td>
</tr></tbody></table>';

echo '<div class="bordered" style="margin-top: 4px; position: relative;"><center><b>PVE - СРАЖЕНИЯ</b><hr>
<font size=4><tt>Сражение с ботами начинается сразу после нажатия кнопки "В бой"</tt></font>
<br></center></div>';

if(!$world_pve){
echo ' <a class="btnl mt4" href="?go">В бой <img src="/chests/key.png" width="20" height="20"> <font color=#e6e3e3 size=5><tt>'.$cost_boy.'</tt></font></a>';
}else{
echo '<center><a class="btnl mt4" href="?">Обновить</a>';
echo '<hr><font size=4><tt>до начала боя осталось: <font color=black><span id="time_'.($world_pve['time_start']-time()).'000">'._time($world_pve['time_start']-time()).'</span></font></b></tt></font></center><hr>';
}

##############################################################################################################################################################################################
if(!$world_pve){
echo '<hr><center><tt>Сыграно боёв сегодня: <b>'.$user['col_pve_game'].'/100</b></tt></center><hr>';
}















##############################################################################################################################################################################################

if($world_pve_mission){
$progress_ = round((($world_pve_mission['prog']*100)/$world_pve_mission['prog_max']));
if($progress_ > 100) {$progress_ = 100;}

if($world_pve_mission['prog'] >= $world_pve_mission['prog_max']){$texx = '<font size=3 color=336600>';$texx1 = '</font>';}else{$texx = '';$texx1 = '';}
if($world_pve_mission['prog_max'] <= 4){
$text_mis = 'противника';
}else{
$text_mis = 'противников';
}
$udvoitel = (3*$world_pve_mission['prog_max']);

echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img src="/mission/mission.png" width="30" height="30"> <font color=black><span> Задание: убить <font color=336600>'.n_f($world_pve_mission['prog_max']).'</font> '.$text_mis.'.</font></span>';
echo '<hr>';
echo '<center>';
echo '<img src="/mission/mission.png" width="20" height="20"> <span><font size=4 color=006600>Выполнено: </font> <font size=2 color=grey><font color=B22222>[</font>'.$texx.''.($world_pve_mission['prog']).''.$texx1.'<font color=B22222>/</font><font color=336600>'.n_f($world_pve_mission['prog_max']).'</font><font color=B22222>]</font></font></span><br>';
echo '<hr> <img width="30" height="30" src="/chests/chests/6.png"> <font size="2">Легендарный сундук</font><br>
<span><font size=2 > <img width="24" height="24" alt="" src="/mission/mission_.png"> 1</font> <font size=2 ><img src="/images/VIP/udvoitel.png" width="26" height="26" alt=""> <font color=black>х</font>'.n_f($udvoitel).'</font>  </span><hr>';
echo '</center>';
if($world_pve_mission['prog'] >= $world_pve_mission['prog_max']){
echo '<center><a class="btnii" style="min-width:160px;margin:3px;" href="?srl_'.$world_pve_mission['coll_mis'].'"><span>
Забрать награду</span></span></a></center>';
}
if($world_pve_mission['prog'] < $world_pve_mission['prog_max']){
echo '<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$progress_.'%;"></div></div>';
}
echo '</div>';






if(isset($_GET['srl_'.$world_pve_mission['coll_mis'].''])){
if($world_pve_mission['prog'] < $world_pve_mission['prog_max']){
header('Location: ?');
exit();
}
if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `mnogit_boy` = '".($user['mnogit_boy'] + $udvoitel)."' WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `time_boy` = '".(time()+600)."', `boy` = '".($user['boy'] = 6 )."', `mnogit_boy` = '".($user['mnogit_boy'] = $udvoitel)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `mission_koll_tur` = '".($user['mission_koll_tur']+1)."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `world_pve_mission` SET `prog` = '".($world_pve_mission['prog']-$world_pve_mission['prog_max'])."', `prog_max` = '".(($world_pve_mission['coll_mis']+1)*1)."', `coll_mis` = '".($world_pve_mission['coll_mis']+1)."' WHERE `id` = '".$world_pve_mission['id']."' ");

$chests_name = 'Легендарный сундук';
$tip = 6;
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$tip."' ");

header('Location: ?');
exit();
}

}
##############################################################################################################################################################################################













##############################################################################################################################################################################################
if($world_pve_vip){$activ = '<font size=2 color="green"> <img width="15" height="15" alt="" src="/world/images/h.png"> <b>+'.$world_pve_vip['h_'].'</b> </font>';}else{$activ = '<font size=2 color="red">не активна</font>';}
$h_world_pve_vip = 10000;
$cost_h_world_pve_vip = 250;


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo 'Боевая сила: '.$activ.'<hr>';


if(!$world_pve) {
echo '<div class="" style="margin-top: 8px; position: relative;"><center>
<a class="btni" style="min-width:160px;margin:4px;" href="?act_1"><span><span><img width="15" height="15" alt="" src="/world/images/h.png"> <b>+'.$h_world_pve_vip.'</b> за <img width="20" height="20" alt="" src="/mines/glory.png"> '.$cost_h_world_pve_vip.'</span></span></a>';
echo '</center></div>';
}
echo '<font size=1 color=grey><hr><b>Боевая сила</b> <font color=black>здоровья</font> активна до тех пор, пока не исчерпается до конца.</font>';

echo '</span></li></ul></div><br>';

if(isset($_GET['act_1'])){
if($user['glory'] < $cost_h_world_pve_vip) {header('Location: ?');$_SESSION['err'] = '<font color=red>Не хватает Славы!</font>';exit();}
if(!$world_pve_vip){
mysql_query("INSERT INTO `world_pve_vip` SET `h` = '".$h_world_pve_vip."', `h_` = '".$h_world_pve_vip."', `user` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `world_pve_vip` SET `h` = '".($world_pve_vip['h']+$h_world_pve_vip )."', `h_` = '".($world_pve_vip['h_']+$h_world_pve_vip )."' WHERE `id` = '".$world_pve_vip['id']."' ");
}
mysql_query("UPDATE `users` SET `glory` = '".($user['glory']-$cost_h_world_pve_vip )."' WHERE `id` = '".$user['id']."' ");

header('Location: ?');
exit();
}
##############################################################################################################################################################################################

if($user['pve_vip_u']){$activ = '<font size=2 color="green"> <img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$user['pve_vip_u'].'</b> </font>';}else{$activ = '<font size=2 color="red">не активна</font>';}
$pve_vip_u = 2500;
$cost_pve_vip_u = 500;


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo 'Боевая сила: '.$activ.'<hr>';


if(!$world_pve) {
echo '<div class="" style="margin-top: 8px; position: relative;"><center>
<a class="btni" style="min-width:160px;margin:4px;" href="?act_2"><span><span><img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$pve_vip_u.'</b> за <img width="20" height="20" alt="" src="/mines/glory.png"> '.$cost_pve_vip_u.'</span></span></a>';
echo '</center></div>';
}
echo '<font size=1 color=grey><hr><b>Боевая сила</b> <font color=black>урона</font> обнуляется каждый день в 12 ч по игре. </font>';

echo '</span></li></ul></div><br>';

if(isset($_GET['act_2'])){
if($user['glory'] < $cost_pve_vip_u) {header('Location: ?');$_SESSION['err'] = '<font color=red>Не хватает Славы!</font>';exit();}
mysql_query("UPDATE `users` SET `glory` = '".($user['glory']-$cost_pve_vip_u )."', `pve_vip_u` = '".($user['pve_vip_u']+$pve_vip_u )."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}


##############################################################################################################################################################################################









##############################################################################################################################################################################################
if(isset($_GET['go'])){
if($user['col_pve_game'] >= 100){
$_SESSION['err'] = '<font color=red>Максимум 100 боев.</font>';
header('Location: ?');
exit();
}
if($user['key'] < $cost_boy){
$_SESSION['err'] = '<font color=red>Не хватает ключей.</font>';
header('Location: ?');
exit();
}
if($world_pve){
header('Location: ?');
exit();
}
if($user['col_pve_game'] >= 0 && $user['col_pve_game'] <= 5){
$rand = rand(1,2);
}
if($user['col_pve_game'] > 5 && $user['col_pve_game'] <= 10){
$rand = rand(1,3);
}
if($user['col_pve_game'] > 10 && $user['col_pve_game'] <= 15){
$rand = rand(2,4);
}
if($user['col_pve_game'] > 15 && $user['col_pve_game'] <= 20){
$rand = rand(2,5);
}
if($user['col_pve_game'] > 20 && $user['col_pve_game'] <= 25){
$rand = rand(3,6);
}
if($user['col_pve_game'] > 25 && $user['col_pve_game'] <= 30){
$rand = rand(3,7);
}
if($user['col_pve_game'] > 30 && $user['col_pve_game'] <= 35){
$rand = rand(4,8);
}
if($user['col_pve_game'] > 35 && $user['col_pve_game'] <= 40){
$rand = rand(4,9);
}
if($user['col_pve_game'] > 45 && $user['col_pve_game'] <= 50){
$rand = rand(5,10);
}
if($user['col_pve_game'] > 50 && $user['col_pve_game'] <= 55){
$rand = rand(5,11);
}
if($user['col_pve_game'] > 55 && $user['col_pve_game'] <= 60){
$rand = rand(6,12);
}
if($user['col_pve_game'] > 60 && $user['col_pve_game'] <= 65){
$rand = rand(6,13);
}
if($user['col_pve_game'] > 65 && $user['col_pve_game'] <= 70){
$rand = rand(7,14);
}
if($user['col_pve_game'] > 70 && $user['col_pve_game'] <= 75){
$rand = rand(7,15);
}
if($user['col_pve_game'] > 75 && $user['col_pve_game'] <= 80){
$rand = rand(8,16);
}
if($user['col_pve_game'] > 80 && $user['col_pve_game'] <= 85){
$rand = rand(8,17);
}
if($user['col_pve_game'] > 85 && $user['col_pve_game'] <= 90){
$rand = rand(9,18);
}
if($user['col_pve_game'] > 90 && $user['col_pve_game'] <= 95){
$rand = rand(9,19);
}
if($user['col_pve_game'] > 95 && $user['col_pve_game'] <= 100){
$rand = rand(10,20);
}


$pve_botsss = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $rand");
$pve_b = mysql_fetch_array ($pve_botsss);
do {
$us_u = ($user['u']);

if($user['col_pve_game'] <= 0){
$proc = 1;
}else{
$proc = $user['col_pve_game'];
}
if($proc >= 75){
$proc = 75;
}else{
$proc = $user['col_pve_game'];
}

if($pve_vip){
if($pve_vip['u'] == 500){
$us_u = ($user['u']-500);
$param = rand(($us_u-($us_u*$proc/100)),($us_u));
}
if($pve_vip['u'] == 1000){
$us_u = ($user['u']-1000);
$param = rand(($us_u-($us_u*$proc/100)),($us_u));
}
if($pve_vip['u'] == 2500){
$us_u = ($user['u']-2500);
$param = rand(($us_u-($us_u*$proc/100)),($us_u));
}
if($pve_vip['u'] == 4000){
$us_u = ($user['u']-4000);
$param = rand(($us_u-($us_u*$proc/100)),($us_u));
}
if($pve_vip['u'] == 8000){
$us_u = ($user['u']-8000);
$param = rand(($us_u-($us_u*$proc/100)),($us_u));
}
}else{
$us_u = ($user['u']);
$param = rand(($us_u-($us_u*$proc/100)),($us_u));
}





if($user['rank']<8){
if($user['rank']>1){
$rank = rand(($user['rank']-1), ($user['rank']+1) );
}else{
$rank = rand($user['rank'], ($user['rank']+1) );
}
}else{
if($user['rank']>1){
$rank = rand(($user['rank']-1), ($user['rank']) );
}else{
$rank = rand($user['rank'], ($user['rank']+1) );
}
}
$time_attack = rand(5,10);
mysql_query("INSERT INTO `world_pve_bots` SET `time_attack` = '".($time_attack+time())."', `rank` = '".$rank."', `user` = '".$user['id']."', `u` = '".$param."', `z` = '".$param."', `h` = '".$param."', `h_` = '".($param*2)."' ");
} while ($pve_b = mysql_fetch_array ($pve_botsss));

if($world_pve_vip){
$h = $user['h']+$world_pve_vip['h_'];
$h_ = (($user['h']+$world_pve_vip['h_'])*2);
}else{
$h = $user['h'];
$h_ = ($user['h']*2);
}

$param_u = $user['u'];
if($user['pve_vip_u'] != 0){
$param1 = $param_u+$user['pve_vip_u'];
$param_u = $param1;
}else{
$param1 = $param_u;
}

mysql_query("INSERT INTO `world_pve` SET `act` = '".$rand_id['id']."', `time_start` = '".(time()+5)."', `user` = '".$user['id']."', `u` = '".$param1."', `z` = '".$user['z']."', `h` = '".$h."', `h_` = '".$h_."' ");

mysql_query("UPDATE `users` SET `key` = '".($user['key']-$cost_boy)."', `col_pve_game` = '".($user['col_pve_game']+1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
##############################################################################################################################################################################################

}





















































##############################################################################################################################################################################################
//echo '<a class="btnl mt4" href="'.$HOME.'pve/">Назад</a>';
//echo '<font size="2"><font color="black"> <font size="3">•</font> PVE</font> - <b>сражение игрока с ботами на выживание. </b></font><br>';



if($world_pve['pobeda'] == 0){
?>
<div class="fr"><a href="#vrag" onClick="document.getElementById('pokazat1').style.display='none';document.getElementById('skryt1').style.display='';return false;"><center><span style="color:black;"><u>Подробнее</u></span></a></div><br>
<?
///###############################################################################################################################################


///###############################################################################################################################################
?>
<div id="pokazat1"></div>
<div id="skryt1" style="display:none">

<font size=2><font color=black> <font size=3>•</font></font> <b>PVE сражение доступно до 100 побед в сутки</b></font><br>
<font size=2><font color=black> <font size=3>•</font></font> <b>бои обнуляються раз в сутки в 12ч по игре.</b></font><br><br>

<font size=2><font color=black> <font size=3>•</font></font> <b>Награда выдается только в случае победы</b></font><br>
<font size=2><font color=black> <font size=3>•</font></font> <b>зависит от кол-ва убитых противников за бой и общего кол-ва проведенных боёв</b></font><br>
<font size=2><font color=black> <font size=3>•</font></font> <b>в награду выдаються коллекции.</b></font><br><br>

<font size=2><font color=black> <font size=3>•</font></font> <b>Кол-во врагов зависит от кол-ва побед в сутки</b></font><br>
<font size=2><font color=black> <font size=3>•</font></font> <b>кол-во врагов увеличивается каждых 5 боев.</b></font><br>

<br><a class="blck p5 forum"></a><a href="#vrag" onClick="document.getElementById('skryt1').style.display='none';document.getElementById('pokazat1').style.display='';return false;"><center><span style="color:black;">Закрыть</span></center></center></a><br>

</div><?
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}else{
if (empty($user['max'])) $user['max']=10;
$max = 15;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_log` WHERE `user` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$world_pve_log = mysql_query("SELECT * FROM `world_pve_log` WHERE `user` = '".$user['id']."' ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
Противников в бою: <b>'.$world_pve_bots_col.'/'.$world_pve_bots_col_.'</b><hr>';
while($pve_l = mysql_fetch_assoc($world_pve_log)){
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span><span class="nobr"><font size=1>'.$pve_l['text'].'</font></span></span></span>
<span class="fr nobr"><font size=1>'.time_last($pve_l['time']).'</font></span><div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';

}





//echo '<font size="2"><font color="black"> <font size="3">•</font> Награда</font> - <b>считается за каждого убитого противника.</b></font><br>';
//echo '<font size="2"><font color="black"> <font size="3">•</font> Сундук</font> - <b>выдается в случае победы.</b></font>';
require_once ('../../system/footer.php');
?>