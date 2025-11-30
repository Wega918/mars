<?php
$title = 'Тренировка';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


if($Improvements['trine_u'] >= 10 and $Improvements['trine_z'] >= 10 and $Improvements['trine_h'] >= 10 and $user['rank'] < 2 ) {
mysql_query("UPDATE `users` SET `rank` = '2' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Поздравляем! Звание повышено.</font>';
header('Location: ?');
exit();
}
if($Improvements['trine_u'] >= 20 and $Improvements['trine_z'] >= 20 and $Improvements['trine_h'] >= 20 and $user['rank'] < 3 ) {
mysql_query("UPDATE `users` SET `rank` = '3' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Поздравляем! Звание повышено.</font>';
header('Location: ?');
exit();
}
if($Improvements['trine_u'] >= 30 and $Improvements['trine_z'] >= 30 and $Improvements['trine_h'] >= 30 and $user['rank'] < 4 ) {
mysql_query("UPDATE `users` SET `rank` = '4' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Поздравляем! Звание повышено.</font>';
header('Location: ?');
exit();
}
if($Improvements['trine_u'] >= 40 and $Improvements['trine_z'] >= 40 and $Improvements['trine_h'] >= 40 and $user['rank'] < 5 ) {
mysql_query("UPDATE `users` SET `rank` = '5' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Поздравляем! Звание повышено.</font>';
header('Location: ?');
exit();
}
if($Improvements['trine_u'] >= 50 and $Improvements['trine_z'] >= 50 and $Improvements['trine_h'] >= 50 and $user['rank'] < 6 ) {
mysql_query("UPDATE `users` SET `rank` = '6' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Поздравляем! Звание повышено.</font>';
header('Location: ?');
exit();
}
if($Improvements['trine_u'] >= 60 and $Improvements['trine_z'] >= 60 and $Improvements['trine_h'] >= 60 and $user['rank'] < 7 ) {
mysql_query("UPDATE `users` SET `rank` = '7' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Поздравляем! Звание повышено.</font>';
header('Location: ?');
exit();
}
if($Improvements['trine_u'] >= 70 and $Improvements['trine_z'] >= 70 and $Improvements['trine_h'] >= 70 and $user['rank'] < 8 ) {
mysql_query("UPDATE `users` SET `rank` = '8' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Поздравляем! Звание повышено.</font>';
header('Location: ?');
exit();
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';

echo '<center>
<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="" style="margin-top: 5px; position: relative;"><img src="/world/images/u.png" alt="*"> <font size=2 color=black>'.$user['u'].'</font> | <img src="/world/images/z.png" alt="*"> <font size=2 color=black>'.$user['z'].'</font> | <img src="/world/images/h.png" alt="*"> <font size=2 color=black>'.$user['h'].'</font><div>
<div class="" style="margin-top: 9px; position: relative;"><img src="/images/maneken/'.$user['rank'].'.png" alt="" style="width:100%; border-radius: 4px;"></div>';
echo '<br>';
if($user['rank'] >= 1 ){
echo '<img width="18" height="18" src="/world/images/1.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/1_off.png"> ';
}
if($user['rank'] >= 2 ){
echo '<img width="18" height="18" src="/world/images/2.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/2_off.png"> ';
}
if($user['rank'] >= 3 ){
echo '<img width="18" height="18" src="/world/images/3.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/3_off.png"> ';
}
if($user['rank'] >= 4 ){
echo '<img width="18" height="18" src="/world/images/4.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/4_off.png"> ';
}
if($user['rank'] >= 5 ){
echo '<img width="18" height="18" src="/world/images/5.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/5_off.png"> ';
}
if($user['rank'] >= 6 ){
echo '<img width="18" height="18" src="/world/images/6.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/6_off.png"> ';
}
if($user['rank'] >= 7 ){
echo '<img width="18" height="18" src="/world/images/7.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/7_off.png"> ';
}
if($user['rank'] >= 8 ){
echo '<img width="18" height="18" src="/world/images/8.png"> ';
}else{
echo '<img width="18" height="18" src="/world/images/8_off.png"> ';
}



echo '</center></div>';





$max = 100;
$u_imp_lvl_max1 = ($user['rank']*10);
if($u_imp_lvl_max1 < 80){$u_imp_lvl_max = ($user['rank']*10);}else{$u_imp_lvl_max = 100;}
if($Improvements['trine_u'] == 0){$u_param = 1;}else{$u_param = (3*$Improvements['trine_u']);}
if($Improvements['trine_u'] == 0){$u_cost = 40;}elseif($Improvements['trine_u'] == 1){$u_cost = 80;}
elseif($Improvements['trine_u'] > 1 && $Improvements['trine_u'] < 80){
$u_cost = ((25) * ($Improvements['trine_u']*$Improvements['trine_u']) );
}elseif($Improvements['trine_u'] >= 80 ){
$u_cost = ((100) * ($Improvements['trine_u']*$Improvements['trine_u']) );
}
if($Improvements['trine_u'] < $max){$texttt = '<font color="green">(+'.$u_param.')</font>';}
if($promotions['promotion_13'] == 1){
$u_cost_action = ($u_cost)-($u_cost*$promotions['act_13']/100);
}else{
$u_cost_action = ($u_cost);
}
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<span class="count_room">'.$Improvements['trine_u'].'</span><img src="/world/images/u_.png" alt="Урон" title="Урон" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span><b><span class="unread">Урон</span></b></span></div>
<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$Improvements['trine_u'].'/'.$u_imp_lvl_max.'</span></div>
<span><font size="2"><img src="/world/images/u.png" alt="*"> Урон <b>'.$Improvements['trine_param_u'].'</b> '.$texttt.'</font></span>
<br><span><font size="2"><img src="/world/images/u.png" alt="*"> <font color=black>Увеличивает урон костюма</font></font></span><br>

<td style="width:70%;text-align:left;">
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;">
<div class="expline" style="width:'.$Improvements['trine_u'].'%;"></div>
</div>
</td>

<hr>';
if($Improvements['trine_u'] < $u_imp_lvl_max){
echo '<center><a class="btni" style="min-width:200px;margin:3px;" href="?trine_u"><span><span>Улучшить за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$u_cost_action.'</font></span></span></a></center>';
}else{echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';}echo '</div>';











if($Improvements['trine_z'] == 0){$z_param = 1;}else{$z_param = (3*$Improvements['trine_z']);}
if($Improvements['trine_z'] == 0){$z_cost = 40;}elseif($Improvements['trine_z'] == 1){$z_cost = 80;}
elseif($Improvements['trine_z'] > 1 && $Improvements['trine_z'] < 80){
$z_cost = ((25) * ($Improvements['trine_z']*$Improvements['trine_z']) );
}elseif($Improvements['trine_z'] >= 80 ){
$z_cost = ((100) * ($Improvements['trine_z']*$Improvements['trine_z']) );
}

if($Improvements['trine_z'] < $max){$texttt = '<font color="green">(+'.$z_param.')</font>';}
if($promotions['promotion_13'] == 1){
$z_cost_action = ($z_cost)-($z_cost*$promotions['act_13']/100);
}else{
$z_cost_action = ($z_cost);
}
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<span class="count_room">'.$Improvements['trine_z'].'</span><img src="/world/images/z_.png" alt="Защита" title="Защита" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span><b><span class="unread">Защита</span></b></span></div>
<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$Improvements['trine_z'].'/'.$u_imp_lvl_max.'</span></div>
<span><font size="2"><img src="/world/images/z.png" alt="*"> Защита <b>'.$Improvements['trine_param_z'].'</b> '.$texttt.'</font></span>
<br><span><font size="2"><img src="/world/images/z.png" alt="*"> <font color=black>Увеличивает защиту костюма</font></font></span><br>

<td style="width:70%;text-align:left;">
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;">
<div class="expline" style="width:'.$Improvements['trine_z'].'%;"></div>
</div>
</td>

<hr>';
if($Improvements['trine_z'] < $u_imp_lvl_max){
echo '<center><a class="btni" style="min-width:200px;margin:3px;" href="?trine_z"><span><span>Улучшить за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$z_cost_action.'</font></span></span></a></center>';
}else{echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';}echo '</div>';











if($Improvements['trine_h'] == 0){$h_param = 1;}else{$h_param = (3*$Improvements['trine_h']);}
if($Improvements['trine_h'] == 0){$h_cost = 40;}elseif($Improvements['trine_h'] == 1){$h_cost = 80;}
elseif($Improvements['trine_h'] > 1 && $Improvements['trine_h'] < 80){
$h_cost = ((25) * ($Improvements['trine_h']*$Improvements['trine_h']) );
}elseif($Improvements['trine_h'] >= 80 ){
$h_cost = ((100) * ($Improvements['trine_h']*$Improvements['trine_h']) );
}

if($Improvements['trine_h'] < $max){$texttt = '<font color="green">(+'.$h_param.')</font>';}
if($promotions['promotion_13'] == 1){
$h_cost_action = ($h_cost)-($h_cost*$promotions['act_13']/100);
}else{
$h_cost_action = ($h_cost);
}
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<span class="count_room">'.$Improvements['trine_h'].'</span><img src="/world/images/h_.png" alt="Здоровье" title="Здоровье" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span><b><span class="unread">Здоровье</span></b></span></div>
<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$Improvements['trine_h'].'/'.$u_imp_lvl_max.'</span></div>
<span><font size="2"><img src="/world/images/h.png" alt="*"> Здоровье <b>'.$Improvements['trine_param_h'].'</b> '.$texttt.'</font></span>
<br><span><font size="2"><img src="/world/images/h.png" alt="*"> <font color=black>Увеличивает здоровье костюма</font></font></span><br>

<td style="width:70%;text-align:left;">
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;">
<div class="expline" style="width:'.$Improvements['trine_h'].'%;"></div>
</div>
</td>

<hr>';
if($Improvements['trine_h'] < $u_imp_lvl_max){
echo '<center><a class="btni" style="min-width:200px;margin:3px;" href="?trine_h"><span><span>Улучшить за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$h_cost_action.'</font></span></span></a></center>';
}else{echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';}echo '</div>';




################################################################################################################################################################################################################



if(isset($_GET['trine_u'])){
if($user['rubin'] < $u_cost_action){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($u_cost_action-$user['rubin']).'';header('Location: ?');exit();}
if($Improvements['trine_u'] >= $u_imp_lvl_max){$_SESSION['err'] = '<font color=red>Необходимо повысить звание в <a href="'.$HOME.'trine/">Тренировке.</a></font>';header('Location: ?');exit();}
if($Improvements['trine_u'] >= $max){$_SESSION['err'] = '<font color=red>Максимальная прокачка.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$u_cost_action)."', `u` = '".($user['u']+$u_param)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `Improvements` SET `trine_u` = '".($Improvements['trine_u']+1)."', `trine_param_u` = '".($Improvements['trine_param_u']+$u_param)."' WHERE `id` = '".$Improvements['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Урон костюма улучшен! <img src="/world/images/u.png" alt="*"> <font color=black>+'.$u_param.'</font></font>';
header('Location: ?');
exit();
}

if(isset($_GET['trine_z'])){
if($user['rubin'] < $z_cost_action){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($z_cost_action-$user['rubin']).'';header('Location: ?');exit();}
if($Improvements['trine_z'] >= $u_imp_lvl_max){$_SESSION['err'] = '<font color=red>Необходимо повысить звание в <a href="'.$HOME.'trine/">Тренировке.</a></font>';header('Location: ?');exit();}
if($Improvements['trine_z'] >= $max){$_SESSION['err'] = '<font color=red>Максимальная прокачка.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$z_cost_action)."', `z` = '".($user['z']+$z_param)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `Improvements` SET `trine_z` = '".($Improvements['trine_z']+1)."', `trine_param_z` = '".($Improvements['trine_param_z']+$z_param)."' WHERE `id` = '".$Improvements['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Защита костюма улучшена! <img src="/world/images/z.png" alt="*"> <font color=black>+'.$z_param.'</font></font>';
header('Location: ?');
exit();
}

if(isset($_GET['trine_h'])){
if($user['rubin'] < $h_cost_action){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($h_cost_action-$user['rubin']).'';header('Location: ?');exit();}
if($Improvements['trine_h'] >= $u_imp_lvl_max){$_SESSION['err'] = '<font color=red>Необходимо повысить звание в <a href="'.$HOME.'trine/">Тренировке.</a></font>';header('Location: ?');exit();}
if($Improvements['trine_h'] >= $max){$_SESSION['err'] = '<font color=red>Максимальная прокачка.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$h_cost_action)."', `h` = '".($user['h']+$h_param)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `Improvements` SET `trine_h` = '".($Improvements['trine_h']+1)."', `trine_param_h` = '".($Improvements['trine_param_h']+$h_param)."' WHERE `id` = '".$Improvements['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Здоровье костюма улучшено! <img src="/world/images/h.png" alt="*"> <font color=black>+'.$h_param.'</font></font>';
header('Location: ?');
exit();
}






echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'user/'.$user['id'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';


require_once ('../system/footer.php');
?>