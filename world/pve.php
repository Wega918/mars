<?php
$title = 'Сражения';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


$pve_zayavki = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_zayavki` WHERE `user` = '".$user['id']."'"));
$pve_zayavki_koll = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `id` "),0);
$pve_bottt_koll = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `id` "),0);
//echo ''.$_SERVER['PHP_SELF'].'';

if($pve1['time_pve'] > time() ) {
header('Location: '.$HOME.'pve_boy/');
exit();
}
if($pve1['time_pve'] > time() and !$pve_zayavki_koll and !$pve_bottt_koll) {
header('Location: '.$HOME.'pve_log/');
exit();
}
if($pve1['time'] < time() && $pve1['time'] > 0 ) {
header('Location: '.$HOME.'pve_boy/');
exit();
}



if(!$pve_zayavki_koll and !$pve_bottt_koll and $pve1['time_pve'] > time() ) {
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




if($pve1['time_pve'] < time() && $pve1['time_pve'] > 0 ) {
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



























if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_ = mysql_query("SELECT * FROM `pve` WHERE `id` ORDER BY `time` ASC LIMIT $start,$max");
while($pve12 = mysql_fetch_assoc($pve_)){
if($pve12['boy_vid'] == 1){$operation = 'Оборонительная операция';}else{$operation = 'Наступательная операция';}

if($user['level'] == 3){
echo '<br><center><a href="?zapp"><tt>Запустить сражение</tt></a></center><br>';
if(isset($_GET['zapp'])){
mysql_query("UPDATE `pve` SET `time` = '555' WHERE `act` = '1' ");
header('Location: ?');
exit();
}
}

if($user['level'] == 3){
$tete = '/ <font color=green>'.$pve_bottt_koll.'</font>';
}




//if($user['level'] == 3){
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pve/"><font color=#e6e3e3 size=4><tt>PVE</tt></font></a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pvp/"><font color=#e6e3e3 size=4><tt>PVP</tt></font></a></td>
</tr></tbody></table>';
//}



echo '<div class="bordered" style="margin-top: 4px; position: relative;"><center><b>Ближайшее сражение</b></center><hr>
<img src="/world/images/pve/'.$pve12['id'].''.$pve12['id'].'.png" alt="" width="50" height="50" style="border-radius: 12px;float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><div class="minor"><span><font size="3">'.$pve12['name'].'</font></span></div></div>
<span><font size="2">до начала <font color=black>'._time($pve12['time']-time()).'</font> ( Заявок: '.$pve_zayavki_koll.' '.$tete.')</font></span>
<br>
<span><font size="2" color="grey">'.$operation.'</font></span>
<br></div>';

if($pve12['boy_vid'] == 1){
if(!$pve_zayavki and $pve12['time'] <= (time()+600) ){
echo '<a class="btnl mt4" href="?vboy">Буду сражаться!</a>';
}else{
echo '<a class="btnl mt4" href="?">Обновить</a>';
}
}else{
if(!$pve_zayavki){
echo '<a class="btnl mt4" href="?vboy">Буду сражаться!</a>';
}else{
echo '<a class="btnl mt4" href="?">Обновить</a>';
}
}


if(isset($_GET['vboy'])){
if($pve_zayavki){
$_SESSION['err'] = '<font color=red>Вы зарегистрированы на текущую битву.</font>';
header('Location: ?');
exit();
}

if($pve12['boy_vid'] == 1 ) {
if($pve12['time'] > (time()+600) ) {
$_SESSION['err'] = '<font color=red>На битву можно регистрироваться за 5 мин.</font>';
header('Location: ?');
exit();
}
}


if($pve12['boy_vid'] == 1){

$rand = rand(5,12);

$pve_botsss = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $rand");
$pve_b = mysql_fetch_array ($pve_botsss);
do {

if($pve_vip){
if($pve_vip['u'] == 500){
$us_u = ($user['u']-500);
$param = rand(($us_u-($us_u*90/100)),($us_u));
}
if($pve_vip['u'] == 1000){
$us_u = ($user['u']-1000);
$param = rand(($us_u-($us_u*90/100)),($us_u));
}
if($pve_vip['u'] == 2500){
$us_u = ($user['u']-2500);
$param = rand(($us_u-($us_u*90/100)),($us_u));
}
if($pve_vip['u'] == 4000){
$us_u = ($user['u']-4000);
$param = rand(($us_u-($us_u*90/100)),($us_u));
}
if($pve_vip['u'] == 8000){
$us_u = ($user['u']-8000);
$param = rand(($us_u-($us_u*90/100)),($us_u));
}

}else{
$us_u = ($user['u']);
$param = rand(($us_u-($us_u*90/100)),($us_u));
}


mysql_query("INSERT INTO `pve_bot` SET `rank` = '".$user['rank']."', `u` = '".$param."', `z` = '".$param."', `h` = '".$param."', `h_` = '".($param*2)."'  ");
} while ($pve_b = mysql_fetch_array ($pve_botsss));

mysql_query("INSERT INTO `pve_zayavki` SET `rank` = '".$user['rank']."', `user` = '".$user['id']."', `u` = '".$user['u']."', `z` = '".$user['z']."', `h` = '".$user['h']."', `h_` = '".($user['h']*2)."' ");
}else{
mysql_query("INSERT INTO `pve_zayavki` SET `rank` = '".$user['rank']."', `user` = '".$user['id']."', `u` = '".$user['u']."', `z` = '".$user['z']."', `h` = '".$user['h']."', `h_` = '".($user['h']*2)."' ");
}

$_SESSION['ok'] = '<font color=#ddd>Вы зарегистрированы. Готовьтесь к бою.</font>';
header('Location: ?');
exit();
}



if($pve12['boy_vid'] == 1){
echo '<br><center><div class="minor"><span><font size="2">Оборонительная операция - битва с ботами</font></span></div></center><br>';
}else{
echo '<br><center><div class="minor"><span><font size="2">Наступательная операция - битва с реальными игроками</font></span></div></center><br>';
}









if(!$pve_zayavki){


$cost_pve_vip_1 = 200;
$cost_pve_vip_2 = 350;
$cost_pve_vip_3 = 700;
$cost_pve_vip_4 = 1500;
$cost_pve_vip_5 = 2500;

$param_pve_vip_1 = 500;
$param_pve_vip_2 = 1000;
$param_pve_vip_3 = 2500;
$param_pve_vip_4 = 4000;
$param_pve_vip_5 = 8000;

if($pve_vip){$activ = '<font size=2 color="green"> <img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$pve_vip['u'].'</b> </font>';}else{$activ = '<font size=2 color="red">не активна</font>';}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo 'Боевая сила: '.$activ.'<hr>';

if(!$pve_vip){
echo '<div class="" style="margin-top: 8px; position: relative;"><center>
      <a class="btni" style="min-width:160px;margin:4px;" href="?act_1"><span><span><img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$param_pve_vip_1.'</b> за <img width="20" height="20" alt="" src="/mines/glory.png"> '.$cost_pve_vip_1.'</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?act_2"><span><span><img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$param_pve_vip_2.'</b> за <img width="20" height="20" alt="" src="/mines/glory.png"> '.$cost_pve_vip_2.'</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?act_3"><span><span><img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$param_pve_vip_3.'</b> за <img width="20" height="20" alt="" src="/mines/glory.png"> '.$cost_pve_vip_3.'</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?act_4"><span><span><img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$param_pve_vip_4.'</b> за <img width="20" height="20" alt="" src="/mines/glory.png"> '.$cost_pve_vip_4.'</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?act_5"><span><span><img width="15" height="15" alt="" src="/world/images/u.png"> <b>+'.$param_pve_vip_5.'</b> за <img width="20" height="20" alt="" src="/mines/glory.png"> '.$cost_pve_vip_5.'</span></span></a>';
echo '</center></div>';
echo '<font size=1 color=grey><hr><b>Боевая сила</b> активируется на <b>1</b> бой.</font>';
}else{
echo '<font size=1 color=grey><b>Боевая сила</b> действует одно ближайшее Сражение.</font>';
}
echo '</span></li></ul></div><br>';

if(isset($_GET['act_1'])){
if($user['glory'] < $cost_pve_vip_1) {header('Location: ?');$_SESSION['err'] = '<font color=red>Нехватает Славы!</font>';exit();}
if($pve_vip) {header('Location: ?');$_SESSION['err'] = '<font color=red>Боевая сила активна!</font>';exit();}
mysql_query("INSERT INTO `pve_vip` SET `u` = '".$param_pve_vip_1."', `z` = '".$param_pve_vip_1."', `h` = '".$param_pve_vip_1."', `user` = '".$user['id']."', `act` = '1' ");
mysql_query("UPDATE `users` SET `u` = '".($user['u']+$param_pve_vip_1 )."', `z` = '".($user['z']+$param_pve_vip_1 )."', `h` = '".($user['h']+$param_pve_vip_1 )."', `glory` = '".($user['glory']-$cost_pve_vip_1 )."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}

if(isset($_GET['act_2'])){
if($user['glory'] < $cost_pve_vip_2) {header('Location: ?');$_SESSION['err'] = '<font color=red>Нехватает Славы!</font>';exit();}
if($pve_vip) {header('Location: ?');$_SESSION['err'] = '<font color=red>Боевая сила активна!</font>';exit();}
mysql_query("INSERT INTO `pve_vip` SET `u` = '".$param_pve_vip_2."', `z` = '".$param_pve_vip_2."', `h` = '".$param_pve_vip_2."', `user` = '".$user['id']."', `act` = '1' ");
mysql_query("UPDATE `users` SET `u` = '".($user['u']+$param_pve_vip_2 )."', `z` = '".($user['z']+$param_pve_vip_2 )."', `h` = '".($user['h']+$param_pve_vip_2 )."', `glory` = '".($user['glory']-$cost_pve_vip_2 )."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}

if(isset($_GET['act_3'])){
if($user['glory'] < $cost_pve_vip_3) {header('Location: ?');$_SESSION['err'] = '<font color=red>Нехватает Славы!</font>';exit();}
if($pve_vip) {header('Location: ?');$_SESSION['err'] = '<font color=red>Боевая сила активна!</font>';exit();}
mysql_query("INSERT INTO `pve_vip` SET `u` = '".$param_pve_vip_3."', `z` = '".$param_pve_vip_3."', `h` = '".$param_pve_vip_3."', `user` = '".$user['id']."', `act` = '1' ");
mysql_query("UPDATE `users` SET `u` = '".($user['u']+$param_pve_vip_3 )."', `z` = '".($user['z']+$param_pve_vip_3 )."', `h` = '".($user['h']+$param_pve_vip_3 )."', `glory` = '".($user['glory']-$cost_pve_vip_3 )."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}

if(isset($_GET['act_4'])){
if($user['glory'] < $cost_pve_vip_4) {header('Location: ?');$_SESSION['err'] = '<font color=red>Нехватает Славы!</font>';exit();}
if($pve_vip) {header('Location: ?');$_SESSION['err'] = '<font color=red>Боевая сила активна!</font>';exit();}
mysql_query("INSERT INTO `pve_vip` SET `u` = '".$param_pve_vip_4."', `z` = '".$param_pve_vip_4."', `h` = '".$param_pve_vip_4."', `user` = '".$user['id']."', `act` = '1' ");
mysql_query("UPDATE `users` SET `u` = '".($user['u']+$param_pve_vip_4 )."', `z` = '".($user['z']+$param_pve_vip_4 )."', `h` = '".($user['h']+$param_pve_vip_4 )."', `glory` = '".($user['glory']-$cost_pve_vip_4 )."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}

if(isset($_GET['act_5'])){
if($user['glory'] < $cost_pve_vip_5) {header('Location: ?');$_SESSION['err'] = '<font color=red>Нехватает Славы!</font>';exit();}
if($pve_vip) {header('Location: ?');$_SESSION['err'] = '<font color=red>Боевая сила активна!</font>';exit();}
mysql_query("INSERT INTO `pve_vip` SET `u` = '".$param_pve_vip_5."', `z` = '".$param_pve_vip_5."', `h` = '".$param_pve_vip_5."', `user` = '".$user['id']."', `act` = '1' ");
mysql_query("UPDATE `users` SET `u` = '".($user['u']+$param_pve_vip_5 )."', `z` = '".($user['z']+$param_pve_vip_5 )."', `h` = '".($user['h']+$param_pve_vip_5 )."', `glory` = '".($user['glory']-$cost_pve_vip_5 )."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}


}















}

if($user['level'] == 3){
echo '<br><center><a href="?zappp"><tt>Обновить все таймеры</tt></a></center><br>';
if(isset($_GET['zappp'])){
mysql_query("UPDATE `pve` SET `time` = '".(time()+((300)))."', `act` = '1' , `time_pve` = '0' WHERE `id` = '1' ");
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








$dsdsdsadsa = mysql_query('SELECT * FROM `pve` WHERE `id` ORDER BY `time_over` + "1" DESC ');
$dsdsdsadsa = mysql_fetch_array($dsdsdsadsa);


if($dsdsdsadsa['time_pve_boy'] > time()){

$ank_1_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_1_kill']."'"));
$ank_2_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_2_kill']."'"));
$ank_3_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_3_kill']."'"));
$ank_4_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_4_kill']."'"));
$ank_5_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_5_kill']."'"));

$ank_1_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_1_uron']."'"));
$ank_2_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_2_uron']."'"));
$ank_3_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_3_uron']."'"));
$ank_4_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_4_uron']."'"));
$ank_5_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['top_5_uron']."'"));


if($dsdsdsadsa['boy_vid'] == 2 ){
if($dsdsdsadsa['pobeda'] == 1){
$pobeda = '<font color=green size=2><b>Победа!</b></font>';
}elseif($dsdsdsadsa['pobeda'] == 2){
$pobeda = '<font color=red size=3><b>Поражение!</b></font>';
}elseif($dsdsdsadsa['pobeda'] == 3){
$pobeda = '<font color=red size=3><b>Поражение!</b></font><br><font color=grey size=2>Вышло время</font>';
}}else{
if($dsdsdsadsa['pobeda'] == 1){
$pobeda = '<font color=green size=2><b>Победу одержали союзники!</b></font><br><font color=grey size=2>Все враги убиты</font>';
}elseif($dsdsdsadsa['pobeda'] == 2){
$pobeda = '<font color=red size=3><b>Победу одержали враги!</b></font><br><font color=grey size=2>Все союзники убиты</font>';
}elseif($dsdsdsadsa['pobeda'] == 3){
$pobeda = '<font color=red size=3><b>Победу одержали враги!</b></font><br><font color=grey size=2>Вышло время</font>';
}
}



echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<img src="/world/images/pve/'.$dsdsdsadsa['id'].''.$dsdsdsadsa['id'].'.png" alt="" width="50" height="50" style="border-radius: 12px;float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><div class="minor"><span><font size="3">'.$dsdsdsadsa['name'].'</font></span></div></div>
<span><font size="2" color="black">закончилась '.time_last($dsdsdsadsa['time_over']).'</font></span><br>
<span><font size="2" color="grey">'.$operation.'</font></span>
<br><br>
<center>'.$pobeda.'</center>';


$iuyy = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$dsdsdsadsa['user']."'"));
if($dsdsdsadsa['boy_vid'] == 2 and $dsdsdsadsa['user'] != 0 and $dsdsdsadsa['pobeda'] == 1){
echo '<center><font size=2>
<br><b>Лучший за битву:</b><br>';
echo '<img width="20" height="20" src="/world/images/'.$iuyy['rank'].'.png"> '.nick($iuyy['id']).':  <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">500</font><br>';
}





echo '<center><font size=2>
<br><b>Лучшие по убийствам</b><br>';








if($dsdsdsadsa['pobeda'] <= 1){
if($ank_1_){
echo '<img width="20" height="20" src="/world/images/'.$ank_1_['rank'].'.png"> '.nick($dsdsdsadsa['top_1_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_1'].'</font> <img src="/chests/chests/6.png" width="20" height="20" alt=""><br>';
}
if($ank_2_){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_['rank'].'.png"> '.nick($dsdsdsadsa['top_2_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_2'].'</font> <img src="/chests/chests/5.png" width="20" height="20" alt=""><br>';
}
if($ank_3_){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_['rank'].'.png"> '.nick($dsdsdsadsa['top_3_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_3'].'</font> <img src="/chests/chests/4.png" width="20" height="20" alt=""><br>';
}
if($ank_4_){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_['rank'].'.png"> '.nick($dsdsdsadsa['top_4_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_4'].'</font> <img src="/chests/chests/3.png" width="20" height="20" alt=""><br>';
}
if($ank_5_){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_['rank'].'.png"> '.nick($dsdsdsadsa['top_5_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_5'].'</font> <img src="/chests/chests/2.png" width="20" height="20" alt=""><br>';
}
echo '<br>
<b>Лучшие по урону</b><br>';
if($ank_1_1){
echo '<img width="20" height="20" src="/world/images/'.$ank_1_1['rank'].'.png"> '.nick($dsdsdsadsa['top_1_uron']).': <font color=black>'.$dsdsdsadsa['uron_1'].' урона </font> <img src="/chests/chests/6.png" width="20" height="20" alt=""><br>';
}
if($ank_2_2){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_2['rank'].'.png"> '.nick($dsdsdsadsa['top_2_uron']).': <font color=black>'.$dsdsdsadsa['uron_2'].' урона </font> <img src="/chests/chests/5.png" width="20" height="20" alt=""><br>';
}
if($ank_3_3){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_3['rank'].'.png"> '.nick($dsdsdsadsa['top_3_uron']).': <font color=black>'.$dsdsdsadsa['uron_3'].' урона </font> <img src="/chests/chests/4.png" width="20" height="20" alt=""><br>';
}
if($ank_4_4){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_4['rank'].'.png"> '.nick($dsdsdsadsa['top_4_uron']).': <font color=black>'.$dsdsdsadsa['uron_4'].' урона </font> <img src="/chests/chests/3.png" width="20" height="20" alt=""><br>';
}
if($ank_5_5){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_5['rank'].'.png"> '.nick($dsdsdsadsa['top_5_uron']).': <font color=black>'.$dsdsdsadsa['uron_5'].' урона </font> <img src="/chests/chests/2.png" width="20" height="20" alt=""><br>';
}
}else{
if($ank_1_){
echo '<img width="20" height="20" src="/world/images/'.$ank_1_['rank'].'.png"> '.nick($dsdsdsadsa['top_1_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_1'].'</font> <br>';
}
if($ank_2_){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_['rank'].'.png"> '.nick($dsdsdsadsa['top_2_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_2'].'</font> <br>';
}
if($ank_3_){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_['rank'].'.png"> '.nick($dsdsdsadsa['top_3_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_3'].'</font> <br>';
}
if($ank_4_){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_['rank'].'.png"> '.nick($dsdsdsadsa['top_4_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_4'].'</font> <br>';
}
if($ank_5_){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_['rank'].'.png"> '.nick($dsdsdsadsa['top_5_kill']).': <font color=black>убито '.$dsdsdsadsa['kill_5'].'</font> <br>';
}
echo '<br>
<b>Лучшие по урону</b><br>';
if($ank_1_1){
echo '<img width="20" height="20" src="/world/images/'.$ank_1_1['rank'].'.png"> '.nick($dsdsdsadsa['top_1_uron']).': <font color=black>'.$dsdsdsadsa['uron_1'].' урона </font> <br>';
}
if($ank_2_2){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_2['rank'].'.png"> '.nick($dsdsdsadsa['top_2_uron']).': <font color=black>'.$dsdsdsadsa['uron_2'].' урона </font> <br>';
}
if($ank_3_3){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_3['rank'].'.png"> '.nick($dsdsdsadsa['top_3_uron']).': <font color=black>'.$dsdsdsadsa['uron_3'].' урона </font> <br>';
}
if($ank_4_4){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_4['rank'].'.png"> '.nick($dsdsdsadsa['top_4_uron']).': <font color=black>'.$dsdsdsadsa['uron_4'].' урона </font> <br>';
}
if($ank_5_5){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_5['rank'].'.png"> '.nick($dsdsdsadsa['top_5_uron']).': <font color=black>'.$dsdsdsadsa['uron_5'].' урона </font> <br>';
}
}




$pve_nagrada_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_nagrada_history` WHERE `time` = '".$dsdsdsadsa['time_over']."' and `user` = '".$user['id']."' ORDER BY `time` + '1' DESC LIMIT 1 "));
if($pve_nagrada_history){
echo '<br><br>';
echo '<font size="2">Нанесено урона: </font><font color="black">'.$pve_nagrada_history['uron'].'</font> <br>
<font size="2">Убито врагов: </font><font color="black">'.$pve_nagrada_history['kill_bots'].'</font><br>';
if ($dsdsdsadsa['boy_vid'] == 1) {
    if ($pve_nagrada_history['pobeda'] == 1) {
        $stones  = ceil(($pve_nagrada_history['kill_bots'] * 2) + (($pve_nagrada_history['uron'] / 1000) * 6));
        $diamonds = $stones; // формула одинаковая
        $rubies  = ceil(100 * $pve_nagrada_history['kill_bots']);
    } else {
        $stones  = ceil(($pve_nagrada_history['kill_bots'] * 2) + ((($pve_nagrada_history['uron'] / 1000) * 6) / 4));
        $diamonds = $stones;
        $rubies  = ceil((100 * $pve_nagrada_history['kill_bots']) / 4);
    }
} else {
    if ($pve_nagrada_history['pobeda'] == 1) {
        $stones  = ceil(($pve_nagrada_history['kill_bots'] * 5) + (($pve_nagrada_history['uron'] / 1000) * 24));
        $diamonds = $stones;
        $rubies  = ceil(50 * $pve_nagrada_history['kill_bots']);
        $rubies_extra = ceil($pve_nagrada_history['where_rubin']);
    } else {
        $stones  = ceil(($pve_nagrada_history['kill_bots'] * 5) + ((($pve_nagrada_history['uron'] / 1000) * 24) / 4));
        $diamonds = $stones;
        $rubies  = ceil((50 * $pve_nagrada_history['kill_bots']) / 4);
        $rubies_extra = ceil($pve_nagrada_history['where_rubin']);
    }
}

// Вывод
echo '<font size="2">Награда: </font>
<img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.$stones.'</font>
<img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.$diamonds.'</font>
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$rubies.'</font>'.
(isset($rubies_extra) ? ' <font color="red">+'.$rubies_extra.'</font>' : '')
.'<br>';

}




if($dsdsdsadsa['boy_vid'] == 2){
echo '<br><span><font size="2">Сражалось <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$dsdsdsadsa['where_user'].'</font> <font size="4">|</font>
<font size="2">Выжило <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$dsdsdsadsa['user_vigilo'].'</font>
</font></span></div></font></center>';
}else{
echo '<br>
<span><font size="2">В битве сражались: <br>
игроки <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$dsdsdsadsa['where_user'].'</font>   <font size="4">|</font> враги <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.$dsdsdsadsa['where_bot'].'</font> </font></span>
<br>
Выжили: <br>
игроки <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$dsdsdsadsa['user_vigilo'].'</font>   <font size="4">|</font> враги <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.($dsdsdsadsa['bot_vigilo']).'</font> </font></span>

</div></font></center>';
}



}else{












if (empty($user['max'])) $user['max']=10;
$max = 8;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve__ = mysql_query("SELECT * FROM `pve` WHERE `id`  ORDER BY `time` ASC LIMIT $start,$max");
while($pve11 = mysql_fetch_assoc($pve__)){
if($pve11['boy_vid'] == 1){$operation = 'Оборонительная операция';}else{$operation = 'Наступательная операция';}
$v1++;
if($v1 == 1){
}else{
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<img src="/world/images/pve/'.$pve11['id'].''.$pve11['id'].'.png" alt="" width="50" height="50" style="border-radius: 12px;float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><div class="minor"><span><font size="3">'.$pve11['name'].'</font></span></div></div>
<span><font size="2">до начала <font color=black><span id="time_'.($pve11['time']-time()).'000">'._time($pve11['time']-time()).'</span></font></font></span>
<br>
<span><font size="2" color="grey">'.$operation.'</font></span>
<br><br></div>';
}

}


}



















echo '<a class="btnl mt4" href="'.$HOME.'pvepast/">Прошедшие Битвы</a>';

echo '<font size="2"><font color="black"> <font size="3">•</font> Награда</font> - <b>топ 5 участников получают особые сундуки, а все остальные по Деревянному сундуку.</b></font>';
require_once ('../system/footer.php');
?>