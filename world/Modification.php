<?php
$title = 'Модификация костюма';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';

echo '<center>
<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="" style="margin-top: 5px; position: relative;"><img src="/world/images/u.png" alt="*"> <font size=2 color=black>'.$user['u'].'</font> | <img src="/world/images/z.png" alt="*"> <font size=2 color=black>'.$user['z'].'</font> | <img src="/world/images/h.png" alt="*"> <font size=2 color=black>'.$user['h'].'</font></div>
<div class="" style="margin-top: 9px; position: relative;"><img src="/images/maneken/'.$user['rank'].'.png" alt="" style="width:100%; border-radius: 4px;"></div>
</center></div>';



$max = 100;
$u_imp_lvl_max1 = ($user['rank']*10);
if($u_imp_lvl_max1 < 80){$u_imp_lvl_max = ($user['rank']*10);}else{$u_imp_lvl_max = 100;}
if($Improvements['mod'] == 0){$u_param = 1;}else{$u_param = (3*$Improvements['mod']);}
if($Improvements['mod'] == 0){$u_cost = 30;}elseif($Improvements['mod'] == 1){$u_cost = 45;}
elseif($Improvements['mod'] > 1 && $Improvements['mod'] < 80){
$u_cost = ((15) * ($Improvements['mod']*$Improvements['mod']) );
}elseif($Improvements['mod'] >= 80){
$u_cost = ((150) * ($Improvements['mod']*$Improvements['mod']) );
}
if($Improvements['mod'] < $u_imp_lvl_max){$texttt = '<font color="green">(+'.$u_param.')</font>';}
if($promotions['promotion_13'] == 1){
$u_cost_action = ($u_cost)-($u_cost*$promotions['act_13']/100);
}else{
$u_cost_action = ($u_cost);
}
echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<span class="count_room">'.$Improvements['mod'].'</span><img src="/world/images/u_.png" alt="Урон" title="Урон" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span><b><span class="unread">Модификации костюма</span></b></span></div>
<span><font size="2"><img src="/world/images/u.png" alt="*">  <b>'.$Improvements['mod_param'].'</b> '.$texttt.'</font></span> 
<span><font size="2"><img src="/world/images/z.png" alt="*">  <b>'.$Improvements['mod_param'].'</b> '.$texttt.'</font></span> 
<span><font size="2"><img src="/world/images/h.png" alt="*">  <b>'.$Improvements['mod_param'].'</b> '.$texttt.'</font></span> 
<br><span><font size="2"><img src="/images/mission/star_.png" alt="*"> <font color=black>Увеличивает параметры костюма</font></font></span><br>

<td style="width:70%;text-align:left;">
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;">
<div class="expline" style="width:'.$Improvements['mod'].'%;"></div>
</div>
</td>

<hr>';
if($Improvements['mod'] < $max){
echo '<center><a class="btni" style="min-width:200px;margin:3px;" href="?mod"><span><span>Модифицировать за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$u_cost_action.'</font></span></span></a></center>';
}else{echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';}echo '</div>';


if(isset($_GET['mod'])){
if($user['rubin'] < $u_cost_action){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($u_cost_action-$user['rubin']).'';header('Location: ?');exit();}
if($Improvements['mod'] >= $u_imp_lvl_max){$_SESSION['err'] = '<font color=red>Необходимо повысить звание в <a href="'.$HOME.'trine/">Тренировке.</a></font>';header('Location: ?');exit();}
if($Improvements['mod'] >= $max){$_SESSION['err'] = '<font color=red>Максимальная прокачка.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$u_cost_action)."', `u` = '".($user['u']+$u_param)."', `z` = '".($user['z']+$u_param)."', `h` = '".($user['h']+$u_param)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `Improvements` SET `mod` = '".($Improvements['mod']+1)."', `mod_param` = '".($Improvements['mod_param']+$u_param)."' WHERE `id` = '".$Improvements['id']."' LIMIT 1 ");
$_SESSION['err'] = '<font color=green>Модификация костюма <font color=black>+1</font></font> <br>Параметры костюма <img src="/images/mission/star_.png" alt="*"> <font color=black>+'.$u_param.'</font> ';
header('Location: ?');
exit();
}









echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'user/'.$user['id'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';

require_once ('../system/footer.php');
?>