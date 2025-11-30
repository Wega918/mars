<?php
$title = 'Экспедиция завершена';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($expedition_user['time'] >= time() ) {
header('Location: '.$HOME.'expeditions/');
$_SESSION['err'] = '<font color=red>Ошибка! Экспедиция не закончена!</font>';
exit();
}



echo '<div class="content">
<a class="fl" href="'.$HOME.'Achievements/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Достижения" title="Достижения"></a>
<a class="fr"><img width="25" height="45" src="/images/index/right_grey.png"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';





echo '<br>';
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<font  size=4>'.$title.'</font>';
echo '</span></li></ul></div>';





if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `expedition_user` WHERE `user` = '".$user['id']."' or `pom_1`  = '".$user['id']."'  or `pom_2`  = '".$user['id']."'  or `pom_3`  = '".$user['id']."'  or `pom_4`  = '".$user['id']."'  or `pom_5`  = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$expedition_user = mysql_query("SELECT * FROM `expedition_user` WHERE `user` = '".$user['id']."' or `pom_1`  = '".$user['id']."'  or `pom_2`  = '".$user['id']."'  or `pom_3`  = '".$user['id']."'  or `pom_4`  = '".$user['id']."'  or `pom_5`  = '".$user['id']."' ORDER BY `id` ASC LIMIT $start,$max");
while($exp_user = mysql_fetch_assoc($expedition_user)){

if($exp_user['level'] == 'Легкий'){
$tim = '2ч';
$timer = 7200;
}if($exp_user['level'] == 'Обычный'){
$tim = '4ч';
$timer = 14400;
}if($exp_user['level'] == 'Средний'){
$tim = '6ч';
$timer = 21600;
}if($exp_user['level'] == 'Сложный'){
$tim = '8ч';
$timer = 28800;
}if($exp_user['level'] == 'Очень сложный'){
$tim = '10ч';
$timer = 36000;
}


echo '<div class="feedback"><div><div style="margin-top: 4px;">
<span class="fl nobr"><span><font size=2>Уровень экспедиции: <font color=black>'.$exp_user['level'].'</font></font></span></span>
<span class="fr nobr"><span><img width="18" height="18" alt="" src="/images/clock.png"> <font size=2 color=black>'.($tim).'</font></span></span>
<br><hr>';




echo '<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>';


if($exp_user['pom_1'] != 0){$pom_1 = ' '.nick($exp_user['pom_1']).' ';}
if($exp_user['pom_2'] != 0){$pom_2 = ' '.nick($exp_user['pom_2']).' <br>';}
if($exp_user['pom_3'] != 0){$pom_3 = ' '.nick($exp_user['pom_3']).' ';}
if($exp_user['pom_4'] != 0){$pom_4 = ' '.nick($exp_user['pom_4']).' ';}
if($exp_user['pom_5'] != 0){$pom_5= ' '.nick($exp_user['pom_5']).'';}

if($exp_user['pom_1'] <= 0){
$pom = 'отсутствуют';
}else{
$pom = ''.$pom_1.''.$pom_2.''.$pom_3.''.$pom_4.''.$pom_5.'';
}

echo '<span class="fl nobr"><font size=2>Руководитель экспедиции '.nick($exp_user['user']).'</font></span><br>
<span class="fl nobr"><font size=2>Помощники экспедиции: </font><font size=2 color=black>'.$pom.'</font></span>';




echo '</tr></tbody></table></center>';

echo '<hr>';
echo '<font size=2>';
echo '<center>Найдено в экспедиции:</center>';

if($exp_user['level_'] == 1){
echo '<center><table style="width:80%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center><img src="/images/ruby.png" width="30" height="30"> <br><font color=red size=2><b>'.$exp_user['rubin'].'</b></font></center></td>
<td style="vertical-align:top;width:25%;"><center><img src="/images/header/money_36.png" width="30" height="30"> <br>'.n_f($exp_user['musor']).'%</center></td>
</tr></tbody></table></center>';
}
if($exp_user['level_'] == 2){
$rand = rand(1,20);
echo '<center><table style="width:80%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center><img src="/images/ruby.png" width="30" height="30"> <br><font color=red size=2><b>'.n_f($exp_user['rubin_1']).'</b></font></center></td>
<td style="vertical-align:top;width:25%;"><center><span class="count_room">х'.$exp_user['mnogit'].'</span><img src="/images/card/'.$rand.'.png" width="30" height="30"> <br><font size=2>Карт x'.$exp_user['card'].'</font></center></td>
</tr></tbody></table></center>';
}
if($exp_user['level_'] == 3){
echo '<td style="vertical-align:top;width:25%;"><center>
<img src="/images/VIP/udvoitel.png" width="30" height="30"> <br><font size=2><b>Множитель </b> <font size=2 color=black>x'.$exp_user['mnogit'].' [<font size=2 color=black>'.($exp_user['mnogit_time']/3600).'ч.</font></span>]</font></font>
</center></td>';
}


echo '</span></li></ul></div></div></div>';



if($exp_user['user'] == $user['id']){
echo '<a class="btnl mt4" href="?exit">Завершить экспедицию</a>';
}else{
echo '<center><font color=black>Ожидание завершения экспедиции руководителем...</font></center>';
}
echo '</font>';




if(isset($_GET['exit'])){
if($exp_user['time'] >= time() ) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Экспедиция не закончена!</font>';exit();}
if($exp_user['user'] != $user['id']) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Завершить экспедицию может только руководитель!</font>';exit();}


$ank1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$exp_user['pom_1']."' "));
$anc1_mission_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank1['id'].'" and `number` = "16" '));
$anc1_mission_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank1['id'].'" and `number` = "17" '));
$anc1_mission_user_18 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank1['id'].'" and `number` = "18" '));


if($exp_user['pom_1'] != 0 and $exp_user['level_'] == 1){
mysql_query("UPDATE `users` SET `rubin` = '".($ank1['rubin']+$exp_user['rubin'])."', `musor_proc` = '".($ank1['musor_proc']+$exp_user['musor'])."' WHERE `id` = '".$ank1['id']."' LIMIT 1");

$text_save = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin'].' | <img width="20" height="20" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($exp_user['musor']).'%';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_1']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_1']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_1']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_1']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_1']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save."', `kto` = '2', `komy` = '".$exp_user['pom_1']."', `time` = '".time()."', `readlen` = '0'");

if($anc1_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc1_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc1_mission_user_16['id']."' ");
}
if($anc1_mission_user_17['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc1_mission_user_17['prog_']+$exp_user['musor'])."' WHERE `id` = '".$anc1_mission_user_17['id']."' ");
}
if($anc1_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc1_mission_user_18['prog_']+$exp_user['rubin'])."' WHERE `id` = '".$anc1_mission_user_18['id']."' ");
}


$anc1_Achievements_user_15 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank1['id'].'" and `number` = "15" '));
$anc1_Achievements_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank1['id'].'" and `number` = "16" '));
$anc1_Achievements_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank1['id'].'" and `number` = "17" '));

if($anc1_Achievements_user_15['prog'] < $anc1_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc1_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc1_Achievements_user_15['id']."' ");
}
if($anc1_Achievements_user_16['prog'] < $anc1_Achievements_user_16['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc1_Achievements_user_16['prog']+$exp_user['musor'])."' WHERE `id` = '".$anc1_Achievements_user_16['id']."' ");
}
if($anc1_Achievements_user_17['prog'] < $anc1_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc1_Achievements_user_17['prog']+$exp_user['rubin'])."' WHERE `id` = '".$anc1_Achievements_user_17['id']."' ");
}



}


$ank2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$exp_user['pom_2']."' "));
$anc2_mission_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank2['id'].'" and `number` = "16" '));
$anc2_mission_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank2['id'].'" and `number` = "17" '));
$anc2_mission_user_18 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank2['id'].'" and `number` = "18" '));

if($exp_user['pom_2'] != 0 and $exp_user['level_'] == 1){
mysql_query("UPDATE `users` SET `rubin` = '".($ank2['rubin']+$exp_user['rubin'])."', `musor_proc` = '".($ank2['musor_proc']+$exp_user['musor'])."' WHERE `id` = '".$ank2['id']."' LIMIT 1");

$text_save = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin'].' | <img width="20" height="20" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($exp_user['musor']).'%';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_2']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_2']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_2']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_2']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_2']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save."', `kto` = '2', `komy` = '".$exp_user['pom_2']."', `time` = '".time()."', `readlen` = '0'");

if($anc2_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc2_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc2_mission_user_16['id']."' ");
}
if($anc2_mission_user_17['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc2_mission_user_17['prog_']+$exp_user['musor'])."' WHERE `id` = '".$anc2_mission_user_17['id']."' ");
}
if($anc2_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc2_mission_user_18['prog_']+$exp_user['rubin'])."' WHERE `id` = '".$anc2_mission_user_18['id']."' ");
}


$anc2_Achievements_user_15 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank2['id'].'" and `number` = "15" '));
$anc2_Achievements_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank2['id'].'" and `number` = "16" '));
$anc2_Achievements_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank2['id'].'" and `number` = "17" '));

if($anc2_Achievements_user_15['prog'] < $anc2_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc2_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc2_Achievements_user_15['id']."' ");
}
if($anc2_Achievements_user_16['prog'] < $anc2_Achievements_user_16['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc2_Achievements_user_16['prog']+$exp_user['musor'])."' WHERE `id` = '".$anc2_Achievements_user_16['id']."' ");
}
if($anc2_Achievements_user_17['prog'] < $anc2_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc2_Achievements_user_17['prog']+$exp_user['rubin'])."' WHERE `id` = '".$anc2_Achievements_user_17['id']."' ");
}


}


$ank3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$exp_user['pom_3']."' "));
$anc3_mission_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank3['id'].'" and `number` = "16" '));
$anc3_mission_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank3['id'].'" and `number` = "17" '));
$anc3_mission_user_18 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank2['id'].'" and `number` = "18" '));

if($exp_user['pom_3'] != 0 and $exp_user['level_'] == 1){
mysql_query("UPDATE `users` SET `rubin` = '".($ank3['rubin']+$exp_user['rubin'])."', `musor_proc` = '".($ank3['musor_proc']+$exp_user['musor'])."' WHERE `id` = '".$ank3['id']."' LIMIT 1");

$text_save = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin'].' | <img width="20" height="20" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($exp_user['musor']).'%';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_3']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_3']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_3']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_3']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_3']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save."', `kto` = '2', `komy` = '".$exp_user['pom_3']."', `time` = '".time()."', `readlen` = '0'");

if($anc3_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc3_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc3_mission_user_16['id']."' ");
}
if($anc3_mission_user_17['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc3_mission_user_17['prog_']+$exp_user['musor'])."' WHERE `id` = '".$anc3_mission_user_17['id']."' ");
}
if($anc3_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc3_mission_user_18['prog_']+$exp_user['rubin'])."' WHERE `id` = '".$anc3_mission_user_18['id']."' ");
}

$anc3_Achievements_user_15 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank3['id'].'" and `number` = "15" '));
$anc3_Achievements_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank3['id'].'" and `number` = "16" '));
$anc3_Achievements_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank3['id'].'" and `number` = "17" '));

if($anc3_Achievements_user_15['prog'] < $anc3_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc3_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc3_Achievements_user_15['id']."' ");
}
if($anc3_Achievements_user_16['prog'] < $anc3_Achievements_user_16['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc3_Achievements_user_16['prog']+$exp_user['musor'])."' WHERE `id` = '".$anc3_Achievements_user_16['id']."' ");
}
if($anc3_Achievements_user_17['prog'] < $anc3_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc3_Achievements_user_17['prog']+$exp_user['rubin'])."' WHERE `id` = '".$anc3_Achievements_user_17['id']."' ");
}

}


$ank4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$exp_user['pom_4']."' "));
$anc4_mission_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank4['id'].'" and `number` = "16" '));
$anc4_mission_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank4['id'].'" and `number` = "17" '));
$anc4_mission_user_18 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank4['id'].'" and `number` = "18" '));

if($exp_user['pom_4'] != 0 and $exp_user['level_'] == 1){
mysql_query("UPDATE `users` SET `rubin` = '".($ank4['rubin']+$exp_user['rubin'])."', `musor_proc` = '".($ank4['musor_proc']+$exp_user['musor'])."' WHERE `id` = '".$ank4['id']."' LIMIT 1");

$text_save = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin'].' | <img width="20" height="20" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($exp_user['musor']).'%';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_4']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_4']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_4']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_4']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_4']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save."', `kto` = '2', `komy` = '".$exp_user['pom_4']."', `time` = '".time()."', `readlen` = '0'");

if($anc4_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc4_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc4_mission_user_16['id']."' ");
}
if($anc4_mission_user_17['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc4_mission_user_17['prog_']+$exp_user['musor'])."' WHERE `id` = '".$anc4_mission_user_17['id']."' ");
}
if($anc4_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc4_mission_user_18['prog_']+$exp_user['rubin'])."' WHERE `id` = '".$anc4_mission_user_18['id']."' ");
}

$anc4_Achievements_user_15 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank4['id'].'" and `number` = "15" '));
$anc4_Achievements_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank4['id'].'" and `number` = "16" '));
$anc4_Achievements_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank4['id'].'" and `number` = "17" '));

if($anc4_Achievements_user_15['prog'] < $anc4_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc4_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc4_Achievements_user_15['id']."' ");
}
if($anc4_Achievements_user_16['prog'] < $anc4_Achievements_user_16['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc4_Achievements_user_16['prog']+$exp_user['musor'])."' WHERE `id` = '".$anc4_Achievements_user_16['id']."' ");
}
if($anc4_Achievements_user_17['prog'] < $anc4_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc4_Achievements_user_17['prog']+$exp_user['rubin'])."' WHERE `id` = '".$anc4_Achievements_user_17['id']."' ");
}


}


$ank5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$exp_user['pom_5']."' "));
$anc5_mission_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank5['id'].'" and `number` = "16" '));
$anc5_mission_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank5['id'].'" and `number` = "17" '));
$anc5_mission_user_18 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$ank5['id'].'" and `number` = "18" '));

if($exp_user['pom_5'] != 0 and $exp_user['level_'] == 1){
mysql_query("UPDATE `users` SET `rubin` = '".($ank5['rubin']+$exp_user['rubin'])."', `musor_proc` = '".($ank5['musor_proc']+$exp_user['musor'])."' WHERE `id` = '".$ank5['id']."' LIMIT 1");

$text_save = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin'].' | <img width="20" height="20" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($exp_user['musor']).'%';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_5']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_5']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_5']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_5']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_5']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save."', `kto` = '2', `komy` = '".$exp_user['pom_5']."', `time` = '".time()."', `readlen` = '0'");

if($anc5_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc5_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc5_mission_user_16['id']."' ");
}
if($anc5_mission_user_17['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc5_mission_user_17['prog_']+$exp_user['musor'])."' WHERE `id` = '".$anc5_mission_user_17['id']."' ");
}
if($anc5_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc5_mission_user_18['prog_']+$exp_user['rubin'])."' WHERE `id` = '".$anc5_mission_user_18['id']."' ");
}

$anc5_Achievements_user_15 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank5['id'].'" and `number` = "15" '));
$anc5_Achievements_user_16 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank5['id'].'" and `number` = "16" '));
$anc5_Achievements_user_17 = mysql_fetch_array(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$ank5['id'].'" and `number` = "17" '));

if($anc5_Achievements_user_15['prog'] < $anc5_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc5_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc5_Achievements_user_15['id']."' ");
}
if($anc5_Achievements_user_16['prog'] < $anc5_Achievements_user_16['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc5_Achievements_user_16['prog']+$exp_user['musor'])."' WHERE `id` = '".$anc5_Achievements_user_16['id']."' ");
}
if($anc5_Achievements_user_17['prog'] < $anc5_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc5_Achievements_user_17['prog']+$exp_user['rubin'])."' WHERE `id` = '".$anc5_Achievements_user_17['id']."' ");
}

}











if($exp_user['pom_1'] != 0 and $exp_user['level_'] == 2){
mysql_query("UPDATE `users` SET `rubin` = '".($ank1['rubin']+$exp_user['rubin_1'])."' WHERE `id` = '".$ank1['id']."' LIMIT 1");
$kardd = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT ".$exp_user['card']." ");$kard = mysql_fetch_array ($kardd);do {$rand = rand(1,20);mysql_query("INSERT INTO `corporate_card` SET `user` = '".$ank1['id']."', `images` = '".$rand."', `xxx` = '".$exp_user['mnogit']."' ");} while ($kard = mysql_fetch_array ($kardd));

$text_save1 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin_1'].' | <span class="count_room">х'.$exp_user['mnogit'].'</span><img width="30" height="30" alt="карты" src="/images/card/'.$rand.'.png" title="карты"> '.$exp_user['card'].' шт.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_1']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_1']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_1']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_1']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_1']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save1."', `kto` = '2', `komy` = '".$exp_user['pom_1']."', `time` = '".time()."', `readlen` = '0'");

if($anc1_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc1_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc1_mission_user_16['id']."' ");
}
if($anc1_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc1_mission_user_18['prog_']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc1_mission_user_18['id']."' ");
}


if($anc1_Achievements_user_15['prog'] < $anc1_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc1_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc1_Achievements_user_15['id']."' ");
}
if($anc1_Achievements_user_17['prog'] < $anc1_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc1_Achievements_user_17['prog']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc1_Achievements_user_17['id']."' ");
}

}


if($exp_user['pom_2'] != 0 and $exp_user['level_'] == 2){
mysql_query("UPDATE `users` SET `rubin` = '".($ank2['rubin']+$exp_user['rubin_1'])."' WHERE `id` = '".$ank2['id']."' LIMIT 1");
$kardd = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT ".$exp_user['card']." ");$kard = mysql_fetch_array ($kardd);do {$rand = rand(1,20);mysql_query("INSERT INTO `corporate_card` SET `user` = '".$ank2['id']."', `images` = '".$rand."', `xxx` = '".$exp_user['mnogit']."' ");} while ($kard = mysql_fetch_array ($kardd));

$text_save1 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin_1'].' | <span class="count_room">х'.$exp_user['mnogit'].'</span><img width="30" height="30" alt="карты" src="/images/card/'.$rand.'.png" title="карты"> '.$exp_user['card'].' шт.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_2']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_2']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_2']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_2']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_2']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save1."', `kto` = '2', `komy` = '".$exp_user['pom_2']."', `time` = '".time()."', `readlen` = '0'");

if($anc2_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc2_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc2_mission_user_16['id']."' ");
}
if($anc2_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc2_mission_user_18['prog_']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc2_mission_user_18['id']."' ");
}

if($anc2_Achievements_user_15['prog'] < $anc2_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc2_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc2_Achievements_user_15['id']."' ");
}
if($anc2_Achievements_user_17['prog'] < $anc2_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc2_Achievements_user_17['prog']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc2_Achievements_user_17['id']."' ");
}

}


if($exp_user['pom_3'] != 0 and $exp_user['level_'] == 2){
mysql_query("UPDATE `users` SET `rubin` = '".($ank3['rubin']+$exp_user['rubin_1'])."' WHERE `id` = '".$ank3['id']."' LIMIT 1");
$kardd = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT ".$exp_user['card']." ");$kard = mysql_fetch_array ($kardd);do {$rand = rand(1,20);mysql_query("INSERT INTO `corporate_card` SET `user` = '".$ank3['id']."', `images` = '".$rand."', `xxx` = '".$exp_user['mnogit']."' ");} while ($kard = mysql_fetch_array ($kardd));

$text_save1 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin_1'].' | <span class="count_room">х'.$exp_user['mnogit'].'</span><img width="30" height="30" alt="карты" src="/images/card/'.$rand.'.png" title="карты"> '.$exp_user['card'].' шт.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_3']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_3']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_3']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_3']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_3']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save1."', `kto` = '2', `komy` = '".$exp_user['pom_3']."', `time` = '".time()."', `readlen` = '0'");

if($anc3_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc3_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc3_mission_user_16['id']."' ");
}
if($anc3_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc3_mission_user_18['prog_']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc3_mission_user_18['id']."' ");
}

if($anc3_Achievements_user_15['prog'] < $anc3_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc3_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc3_Achievements_user_15['id']."' ");
}
if($anc3_Achievements_user_17['prog'] < $anc3_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc3_Achievements_user_17['prog']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc3_Achievements_user_17['id']."' ");
}

}


if($exp_user['pom_4'] != 0 and $exp_user['level_'] == 2){
mysql_query("UPDATE `users` SET `rubin` = '".($ank4['rubin']+$exp_user['rubin_1'])."' WHERE `id` = '".$ank4['id']."' LIMIT 1");
$kardd = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT ".$exp_user['card']." ");$kard = mysql_fetch_array ($kardd);do {$rand = rand(1,20);mysql_query("INSERT INTO `corporate_card` SET `user` = '".$ank4['id']."', `images` = '".$rand."', `xxx` = '".$exp_user['mnogit']."' ");} while ($kard = mysql_fetch_array ($kardd));

$text_save1 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin_1'].' | <span class="count_room">х'.$exp_user['mnogit'].'</span><img width="30" height="30" alt="карты" src="/images/card/'.$rand.'.png" title="карты"> '.$exp_user['card'].' шт.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_4']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_4']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_4']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_4']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_4']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save1."', `kto` = '2', `komy` = '".$exp_user['pom_4']."', `time` = '".time()."', `readlen` = '0'");

if($anc4_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc4_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc4_mission_user_16['id']."' ");
}
if($anc4_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc4_mission_user_18['prog_']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc4_mission_user_18['id']."' ");
}

if($anc4_Achievements_user_15['prog'] < $anc4_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc4_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc4_Achievements_user_15['id']."' ");
}
if($anc4_Achievements_user_17['prog'] < $anc4_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc4_Achievements_user_17['prog']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc4_Achievements_user_17['id']."' ");
}

}


if($exp_user['pom_5'] != 0 and $exp_user['level_'] == 2){
mysql_query("UPDATE `users` SET `rubin` = '".($ank5['rubin']+$exp_user['rubin_1'])."' WHERE `id` = '".$ank5['id']."' LIMIT 1");
$kardd = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT ".$exp_user['card']." ");$kard = mysql_fetch_array ($kardd);do {$rand = rand(1,20);mysql_query("INSERT INTO `corporate_card` SET `user` = '".$ank5['id']."', `images` = '".$rand."', `xxx` = '".$exp_user['mnogit']."' ");} while ($kard = mysql_fetch_array ($kardd));
$text_save1 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin_1'].' | <span class="count_room">х'.$exp_user['mnogit'].'</span><img width="30" height="30" alt="карты" src="/images/card/'.$rand.'.png" title="карты"> '.$exp_user['card'].' шт.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_5']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_5']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_5']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_5']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_5']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save1."', `kto` = '2', `komy` = '".$exp_user['pom_5']."', `time` = '".time()."', `readlen` = '0'");

if($anc5_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc5_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc5_mission_user_16['id']."' ");
}
if($anc5_mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc5_mission_user_18['prog_']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc5_mission_user_18['id']."' ");
}

if($anc5_Achievements_user_15['prog'] < $anc5_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc5_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc5_Achievements_user_15['id']."' ");
}
if($anc5_Achievements_user_17['prog'] < $anc5_Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc5_Achievements_user_17['prog']+$exp_user['rubin_1'])."' WHERE `id` = '".$anc5_Achievements_user_17['id']."' ");
}


}










if($exp_user['pom_1'] != 0 and $exp_user['level_'] == 3){
if($ank1['time_boy'] > time()) {mysql_query("UPDATE `users` SET `boy` = '".($ank1['boy'] = 6 )."', `time_boy` = '".($ank1['time_boy'] + $exp_user['mnogit_time'])."', `mnogit_boy` = '".($ank1['mnogit_boy'] + $exp_user['mnogit'])."'  WHERE `id` = '".$ank1['id']."' ");
}else{mysql_query("UPDATE `users` SET `boy` = '".($ank1['boy'] = 6 )."', `time_boy` = '".($ank1['time_boy'] = (time()+$exp_user['mnogit_time']) )."', `mnogit_boy` = '".($ank1['mnogit_boy'] = $exp_user['mnogit'])."' WHERE `id` = '".$ank1['id']."' ");}

$text_save3 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$exp_user['mnogit'].' на <font color=black>['.($exp_user['mnogit_time']/3600).'ч.]</font> ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_1']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_1']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_1']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_1']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_1']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save3."', `kto` = '2', `komy` = '".$exp_user['pom_1']."', `time` = '".time()."', `readlen` = '0'");

if($anc1_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc1_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc1_mission_user_16['id']."' ");
}

if($anc1_Achievements_user_15['prog'] < $anc1_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc1_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc1_Achievements_user_15['id']."' ");
}


}


if($exp_user['pom_2'] != 0 and $exp_user['level_'] == 3){
if($ank2['time_boy'] > time()) {mysql_query("UPDATE `users` SET `boy` = '".($ank2['boy'] = 6 )."', `time_boy` = '".($ank2['time_boy'] + $exp_user['mnogit_time'])."', `mnogit_boy` = '".($ank2['mnogit_boy'] + $exp_user['mnogit'])."'  WHERE `id` = '".$ank2['id']."' ");
}else{mysql_query("UPDATE `users` SET `boy` = '".($ank2['boy'] = 6 )."', `time_boy` = '".($ank2['time_boy'] = (time()+$exp_user['mnogit_time']) )."', `mnogit_boy` = '".($ank2['mnogit_boy'] = $exp_user['mnogit'])."' WHERE `id` = '".$ank2['id']."' ");}

$text_save3 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$exp_user['mnogit'].' на <font color=black>['.($exp_user['mnogit_time']/3600).'ч.]</font> ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_2']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_2']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_2']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_2']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_2']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save3."', `kto` = '2', `komy` = '".$exp_user['pom_2']."', `time` = '".time()."', `readlen` = '0'");

if($anc2_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc2_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc2_mission_user_16['id']."' ");
}
if($anc2_Achievements_user_15['prog'] < $anc2_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc2_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc2_Achievements_user_15['id']."' ");
}

}


if($exp_user['pom_3'] != 0 and $exp_user['level_'] == 3){
if($ank3['time_boy'] > time()) {mysql_query("UPDATE `users` SET `boy` = '".($ank3['boy'] = 6 )."', `time_boy` = '".($ank3['time_boy'] + $exp_user['mnogit_time'])."', `mnogit_boy` = '".($ank3['mnogit_boy'] + $exp_user['mnogit'])."'  WHERE `id` = '".$ank3['id']."' ");
}else{mysql_query("UPDATE `users` SET `boy` = '".($ank3['boy'] = 6 )."', `time_boy` = '".($ank3['time_boy'] = (time()+$exp_user['mnogit_time']) )."', `mnogit_boy` = '".($ank3['mnogit_boy'] = $exp_user['mnogit'])."' WHERE `id` = '".$ank3['id']."' ");}

$text_save3 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$exp_user['mnogit'].' на <font color=black>['.($exp_user['mnogit_time']/3600).'ч.]</font> ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_3']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_3']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_3']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_3']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_3']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save3."', `kto` = '2', `komy` = '".$exp_user['pom_3']."', `time` = '".time()."', `readlen` = '0'");

if($anc3_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc3_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc3_mission_user_16['id']."' ");
}
if($anc3_Achievements_user_15['prog'] < $anc3_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc3_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc3_Achievements_user_15['id']."' ");
}

}


if($exp_user['pom_4'] != 0 and $exp_user['level_'] == 3){
if($ank4['time_boy'] > time()) {mysql_query("UPDATE `users` SET `boy` = '".($ank4['boy'] = 6 )."', `time_boy` = '".($ank4['time_boy'] + $exp_user['mnogit_time'])."', `mnogit_boy` = '".($ank4['mnogit_boy'] + $exp_user['mnogit'])."'  WHERE `id` = '".$ank4['id']."' ");
}else{mysql_query("UPDATE `users` SET `boy` = '".($ank4['boy'] = 6 )."', `time_boy` = '".($ank4['time_boy'] = (time()+$exp_user['mnogit_time']) )."', `mnogit_boy` = '".($ank4['mnogit_boy'] = $exp_user['mnogit'])."' WHERE `id` = '".$ank4['id']."' ");}

$text_save3 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$exp_user['mnogit'].' на <font color=black>['.($exp_user['mnogit_time']/3600).'ч.]</font> ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_4']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_4']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_4']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_4']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_4']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save3."', `kto` = '2', `komy` = '".$exp_user['pom_4']."', `time` = '".time()."', `readlen` = '0'");

if($anc4_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc4_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc4_mission_user_16['id']."' ");
}
if($anc4_Achievements_user_15['prog'] < $anc4_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc4_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc4_Achievements_user_15['id']."' ");
}

}


if($exp_user['pom_5'] != 0 and $exp_user['level_'] == 3){
if($ank5['time_boy'] > time()) {mysql_query("UPDATE `users` SET `boy` = '".($ank5['boy'] = 6 )."', `time_boy` = '".($ank5['time_boy'] + $exp_user['mnogit_time'])."', `mnogit_boy` = '".($ank5['mnogit_boy'] + $exp_user['mnogit'])."'  WHERE `id` = '".$ank5['id']."' ");
}else{mysql_query("UPDATE `users` SET `boy` = '".($ank5['boy'] = 6 )."', `time_boy` = '".($ank5['time_boy'] = (time()+$exp_user['mnogit_time']) )."', `mnogit_boy` = '".($ank5['mnogit_boy'] = $exp_user['mnogit'])."' WHERE `id` = '".$ank5['id']."' ");}

$text_save3 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$exp_user['mnogit'].' на <font color=black>['.($exp_user['mnogit_time']/3600).'ч.]</font> ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_5']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_5']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_5']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_5']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_5']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save3."', `kto` = '2', `komy` = '".$exp_user['pom_5']."', `time` = '".time()."', `readlen` = '0'");

if($anc5_mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($anc5_mission_user_16['prog_']+1)."' WHERE `id` = '".$anc5_mission_user_16['id']."' ");
}
if($anc5_Achievements_user_15['prog'] < $anc5_Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($anc5_Achievements_user_15['prog']+1)."' WHERE `id` = '".$anc5_Achievements_user_15['id']."' ");
}

}






if($exp_user['level_'] == 1 and $exp_user['user'] == $user['id']){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$exp_user['rubin'])."', `musor_proc` = '".($user['musor_proc']+$exp_user['musor'])."' WHERE `id` = '".$exp_user['user']."' LIMIT 1");
if($mission_user_17['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_17['prog_']+$exp_user['musor'])."' WHERE `id` = '".$mission_user_17['id']."' ");
}
if($mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_18['prog_']+$exp_user['rubin'])."' WHERE `id` = '".$mission_user_18['id']."' ");
}

if($Achievements_user_16['prog'] < $Achievements_user_16['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_16['prog']+$exp_user['musor'])."' WHERE `id` = '".$Achievements_user_16['id']."' ");
}
if($Achievements_user_17['prog'] < $Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_17['prog']+$exp_user['rubin'])."' WHERE `id` = '".$Achievements_user_17['id']."' ");
}



$text_save4 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin'].' | <img width="20" height="20" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($exp_user['musor']).'%';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save4."', `kto` = '2', `komy` = '".$exp_user['user']."', `time` = '".time()."', `readlen` = '0'");
}


if($exp_user['level_'] == 2 and $exp_user['user'] == $user['id']){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$exp_user['rubin_1'])."' WHERE `id` = '".$user['id']."' LIMIT 1");
$kardd = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT ".$exp_user['card']." ");$kard = mysql_fetch_array ($kardd);do {$rand = rand(1,20);mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$exp_user['mnogit']."' ");} while ($kard = mysql_fetch_array ($kardd));
if($mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_18['prog_']+$exp_user['rubin_1'])."' WHERE `id` = '".$mission_user_18['id']."' ");
}
if($Achievements_user_17['prog'] < $Achievements_user_17['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_17['prog']+$exp_user['rubin_1'])."' WHERE `id` = '".$Achievements_user_17['id']."' ");
}

$text_save5 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$exp_user['rubin_1'].' | <span class="count_room">х'.$exp_user['mnogit'].'</span><img width="30" height="30" alt="карты" src="/images/card/'.$rand.'.png" title="карты"> '.$exp_user['card'].' шт.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save5."', `kto` = '2', `komy` = '".$exp_user['user']."', `time` = '".time()."', `readlen` = '0'");
}


if($exp_user['level_'] == 3 and $exp_user['user'] == $user['id']){
if($user['time_boy'] > time()) {mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $exp_user['mnogit_time'])."', `mnogit_boy` = '".($user['mnogit_boy'] + $exp_user['mnogit'])."'  WHERE `id` = '".$exp_user['user']."' ");
}else{mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$exp_user['mnogit_time']) )."', `mnogit_boy` = '".($user['mnogit_boy'] = $exp_user['mnogit'])."' WHERE `id` = '".$exp_user['user']."' ");}

$text_save6 = '<b>Экспедиция</b> получено <img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$exp_user['mnogit'].' на <font color=black>['.($exp_user['mnogit_time']/3600).'ч.]</font> ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_save6."', `kto` = '2', `komy` = '".$exp_user['user']."', `time` = '".time()."', `readlen` = '0'");
}




if($exp_user['level_'] == 3){

if($exp_user['level'] == 'Легкий'){
$time_expedition = 10800; // 3ч
}elseif($exp_user['level'] == 'Обычный'){
$time_expedition = 21600; // 6ч	
}elseif($exp_user['level'] == 'Средний'){
$time_expedition = 32400; // 9ч	
}elseif($exp_user['level'] == 'Сложный'){
$time_expedition = 43200; // 12ч
}elseif($exp_user['level'] == 'Очень сложный'){
$time_expedition = 54000; // 15ч
}

mysql_query("UPDATE `users` SET `time_expedition` = '".($user['time_expedition'] = (time()+$time_expedition))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query('DELETE FROM `expedition_user` WHERE `user` = '.$user['id'].' ');
if($mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_16['prog_']+1)."' WHERE `id` = '".$mission_user_16['id']."' ");
}
if($Achievements_user_15['prog'] < $Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_15['prog']+1)."' WHERE `id` = '".$Achievements_user_15['id']."' ");
}
}else{
mysql_query("UPDATE `expedition_user` SET `pom_1` = '0', `pom_2` = '0', `pom_3` = '0', `pom_4` = '0', `pom_5` = '0', `time` = '".(time()+$timer)."', `level_` = '".($exp_user['level_']+1)."' WHERE `user` = '".$user['id']."' LIMIT 1");
if($mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_16['prog_']+1)."' WHERE `id` = '".$mission_user_16['id']."' ");
}
if($Achievements_user_15['prog'] < $Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_15['prog']+1)."' WHERE `id` = '".$Achievements_user_15['id']."' ");
}
$_SESSION['err'] = 'Пройдите следующую главу.';
header('Location: '.$HOME.'expeditions/');
exit();
}


if($mission_user_16['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_16['prog_']+1)."' WHERE `id` = '".$mission_user_16['id']."' ");
}
if($Achievements_user_15['prog'] < $Achievements_user_15['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_15['prog']+1)."' WHERE `id` = '".$Achievements_user_15['id']."' ");
}

$_SESSION['err'] = 'Награда получена';
header('Location: '.$HOME.'expedition/');
exit();
}






}










//mysql_query("INSERT INTO `expedition` SET `rubin` = '1' ");











require_once ('../system/footer.php');
?>