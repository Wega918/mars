<?php
$title = 'Улучшения костюма';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

//$z_cost = ((12+$z_imp_lvl_max) * ($Improvements['z_imp_lvl']*$Improvements['z_imp_lvl']) );

$u_imp_lvl_max1 = ($user['rank']*10);
if($u_imp_lvl_max1 < 80){$u_imp_lvl_max = ($user['rank']*10);}else{$u_imp_lvl_max = 100;}
if($Improvements['u_imp_lvl'] == 0){$u_param = 1;}else{$u_param = (3*$Improvements['u_imp_lvl']);}
if($Improvements['u_imp_lvl'] == 0){$u_cost = 10;}elseif($Improvements['u_imp_lvl'] == 1){$u_cost = 15;}
elseif($Improvements['u_imp_lvl'] > 1 && $Improvements['u_imp_lvl'] < 80){
$u_cost = ((5) * ($Improvements['u_imp_lvl']*$Improvements['u_imp_lvl']) );
}elseif($Improvements['u_imp_lvl'] >= 80){
$u_cost = ((50) * ($Improvements['u_imp_lvl']*$Improvements['u_imp_lvl']) );
}

$z_imp_lvl_max1 = ($user['rank']*10);
if($z_imp_lvl_max1 < 80){$z_imp_lvl_max = ($user['rank']*10);}else{$z_imp_lvl_max = 100;}
if($Improvements['z_imp_lvl'] == 0){$z_param = 1;}else{$z_param = (3*$Improvements['z_imp_lvl']);}
if($Improvements['z_imp_lvl'] == 0){$z_cost = 10;}elseif($Improvements['z_imp_lvl'] == 1){$z_cost = 15;}
elseif($Improvements['z_imp_lvl'] > 1 && $Improvements['z_imp_lvl'] < 80){
$z_cost = ((5) * ($Improvements['z_imp_lvl']*$Improvements['z_imp_lvl']) );
}elseif($Improvements['z_imp_lvl'] >= 80){
$z_cost = ((50) * ($Improvements['z_imp_lvl']*$Improvements['z_imp_lvl']) );
}

$h_imp_lvl_max1 = ($user['rank']*10);
if($h_imp_lvl_max1 < 80){$h_imp_lvl_max = ($user['rank']*10);}else{$h_imp_lvl_max = 100;}
if($Improvements['h_imp_lvl'] == 0){$h_param = 1;}else{$h_param = (3*$Improvements['h_imp_lvl']);}
if($Improvements['h_imp_lvl'] == 0){$h_cost = 10;}elseif($Improvements['h_imp_lvl'] == 1){$h_cost = 15;}
elseif($Improvements['h_imp_lvl'] > 1 && $Improvements['h_imp_lvl'] < 80){
$h_cost = ((5) * ($Improvements['h_imp_lvl']*$Improvements['h_imp_lvl']) );
}elseif($Improvements['h_imp_lvl'] >= 80){
$h_cost = ((50) * ($Improvements['h_imp_lvl']*$Improvements['h_imp_lvl']) );
}

if($promotions['promotion_13'] == 1){
$u_cost_action = ($u_cost)-($u_cost*$promotions['act_13']/100);
}else{
$u_cost_action = ($u_cost);
}
if($promotions['promotion_13'] == 1){
$z_cost_action = ($z_cost)-($z_cost*$promotions['act_13']/100);
}else{
$z_cost_action = ($z_cost);
}
if($promotions['promotion_13'] == 1){
$h_cost_action = ($h_cost)-($h_cost*$promotions['act_13']/100);
}else{
$h_cost_action = ($h_cost);
}



echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';


echo '<center>
<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="" style="margin-top: 5px; position: relative;"><img src="/world/images/u.png" alt="*"> <font size=2 color=black>'.$user['u'].'</font> | <img src="/world/images/z.png" alt="*"> <font size=2 color=black>'.$user['z'].'</font> | <img src="/world/images/h.png" alt="*"> <font size=2 color=black>'.$user['h'].'</font></div>
<div class="" style="margin-top: 9px; position: relative;"><img src="/images/maneken/'.$user['rank'].'.png" alt="" style="width:100%; border-radius: 4px;"></div>
</center></div>';




if($Improvements['u_imp_lvl'] < $u_imp_lvl_max){$texttt = '<font color="green">(+'.$u_param.')</font>';}
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<span class="count_room">'.$Improvements['u_imp_lvl'].'</span><img src="/world/images/u_.png" alt="Урон" title="Урон" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span><b><span class="unread">Урон</span></b></span></div>
<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$Improvements['u_imp_lvl'].'/'.$u_imp_lvl_max.'</span></div>
<span><font size="3"><img src="/world/images/u.png" alt="*"> Урон <b>'.$Improvements['u_imp'].'</b> '.$texttt.'</font></span>
<br><span><font size="2"><img src="/world/images/u.png" alt="*"> <font color=black>Увеличивает урон костюма по врагам</font></font></span><hr>';
if($Improvements['u_imp_lvl'] < $u_imp_lvl_max){
echo '<center><a class="btni" style="min-width:200px;margin:3px;" href="?improve_u"><span><span>Улучшить за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$u_cost_action.'</font></span></span></a></center>';
}else{echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';}echo '</div>';


if($Improvements['z_imp_lvl'] < $z_imp_lvl_max){$textttt = '<font color="green">(+'.$z_param.')</font>';}
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<span class="count_room">'.$Improvements['z_imp_lvl'].'</span><img src="/world/images/z_.png" alt="Урон" title="Урон" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span><b><span class="unread">Защита</span></b></span></div>
<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$Improvements['z_imp_lvl'].'/'.$z_imp_lvl_max.'</span></div>
<span><font size="3"><img src="/world/images/z.png" alt="*"> Защита <b>'.$Improvements['z_imp'].'</b> '.$textttt.'</font></span>
<br><span><font size="2"><img src="/world/images/z.png" alt="*"> <font color=black>Увеличивает защиту костюма</font></font></span><hr>';
if($Improvements['z_imp_lvl'] < $z_imp_lvl_max){
echo '<center><a class="btni" style="min-width:200px;margin:3px;" href="?improve_z"><span><span>Улучшить за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$z_cost_action.'</font></span></span></a></center>';
}else{echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';}echo '</div>';


if($Improvements['h_imp_lvl'] < $h_imp_lvl_max){$textttt = '<font color="green">(+'.$h_param.')</font>';}
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<span class="count_room">'.$Improvements['h_imp_lvl'].'</span><img src="/world/images/h_.png" alt="Урон" title="Урон" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span><b><span class="unread">Здоровье</span></b></span></div>
<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$Improvements['h_imp_lvl'].'/'.$h_imp_lvl_max.'</span></div>
<span><font size="3"><img src="/world/images/h.png" alt="*"> Здоровье <b>'.$Improvements['h_imp'].'</b> '.$textttt.'</font></span>
<br><span><font size="2"><img src="/world/images/h.png" alt="*"> <font color=black>Увеличивает здоровье костюма</font></font></span><hr>';
if($Improvements['h_imp_lvl'] < $h_imp_lvl_max){
echo '<center><a class="btni" style="min-width:200px;margin:3px;" href="?improve_h"><span><span>Улучшить за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$h_cost_action.'</font></span></span></a></center>';
}else{echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';}echo '</div>';


#############################################################################################################################################################################################################


$max = 100;

if(isset($_GET['improve_u'])){
if($user['rubin'] < $u_cost_action){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($u_cost_action-$user['rubin']).'';header('Location: ?');exit();}
if($Improvements['u_imp_lvl'] >= $u_imp_lvl_max){$_SESSION['err'] = '<font color=red>Необходимо повысить звание в <a href="'.$HOME.'trine/">Тренировке.</a></font>';header('Location: ?');exit();}
if($Improvements['u_imp_lvl'] >= $max ){$_SESSION['err'] = '<font color=red>Максимальная прокачка.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$u_cost_action)."', `u` = '".($user['u']+$u_param)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `Improvements` SET `u_imp_lvl` = '".($Improvements['u_imp_lvl']+1)."', `u_imp` = '".($Improvements['u_imp']+$u_param)."' WHERE `id` = '".$Improvements['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Урон по врагам улучшен <img src="/world/images/u.png" alt="*"></font> <font color=black>+'.$u_param.'</font> ';
header('Location: ?');
exit();
}

if(isset($_GET['improve_z'])){
if($user['rubin'] < $z_cost_action){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($z_cost_action-$user['rubin']).'';header('Location: ?');exit();}
if($Improvements['z_imp_lvl'] >= $z_imp_lvl_max){$_SESSION['err'] = '<font color=red>Необходимо повысить звание в <a href="'.$HOME.'trine/">Тренировке.</a></font>';header('Location: ?');exit();}
if($Improvements['z_imp_lvl'] >= $max ){$_SESSION['err'] = '<font color=red>Максимальная прокачка.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$z_cost_action)."', `z` = '".($user['z']+$z_param)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `Improvements` SET `z_imp_lvl` = '".($Improvements['z_imp_lvl']+1)."', `z_imp` = '".($Improvements['z_imp']+$z_param)."' WHERE `id` = '".$Improvements['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Защита от урона врага улучшена <img src="/world/images/z.png" alt="*"></font> <font color=black>+'.$z_param.'</font> ';
header('Location: ?');
exit();
}

if(isset($_GET['improve_h'])){
if($user['rubin'] < $h_cost_action){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($h_cost_action-$user['rubin']).'';header('Location: ?');exit();}
if($Improvements['h_imp_lvl'] >= $h_imp_lvl_max){$_SESSION['err'] = '<font color=red>Необходимо повысить звание в <a href="'.$HOME.'trine/">Тренировке.</a></font>';header('Location: ?');exit();}
if($Improvements['h_imp_lvl'] >= $max ){$_SESSION['err'] = '<font color=red>Максимальная прокачка.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$h_cost_action)."', `h` = '".($user['h']+$h_param)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `Improvements` SET `h_imp_lvl` = '".($Improvements['h_imp_lvl']+1)."', `h_imp` = '".($Improvements['h_imp']+$h_param)."' WHERE `id` = '".$Improvements['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Здоровье костюма улучшено <img src="/world/images/h.png" alt="*"></font> <font color=black>+'.$h_param.'</font> ';
header('Location: ?');
exit();
}





echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'user/'.$user['id'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>