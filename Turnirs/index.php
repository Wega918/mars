<?php
$title = 'Турниры';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
$turnir = mysql_fetch_assoc(mysql_query("SELECT * FROM `turnir` WHERE `id` = '1' "));
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
Итоги турниров через: <font  color=black size=2><span id="time_'.($turnir['time']-time()).'000">'._time($turnir['time']-time()).'</span></font>
</span></li></ul></div>';














echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/Rock/">
<div class="menu-left"><font width=50% color=666633>Турнир Камней</font></a>
<hr>';
$q = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `rock` + '1' DESC ");
while($post = mysql_fetch_assoc($q)){
$v11++;
if($v11 < 4){
echo '<div><span class="fl nobr"><span>'.$v11.'</span>.<span><span class="nobr">'.nick($post['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/colections/22.png"> <span> '.n_f($post['rock']).'</span> </span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/Activ/">
<div class="menu-left"><font width=50% color=666633>Турнир Активности</font></a>
<hr>';
$q1 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `game_time_turnir` + '1' DESC ");
while($post1 = mysql_fetch_assoc($q1)){
$v1++;
if($v1 < 4){
echo '<div><span class="fl nobr"><span>'.$v1.'</span>.<span><span class="nobr">'.nick($post1['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/clock.png"><span> '.tl($post1['game_time_turnir']).'</span></span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/Ref/">
<div class="menu-left"><font width=50% color=666633>Турнир Рефералов</font></a>
<hr>';
$q2 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `ref_turnir` + '1' DESC ");
while($post2 = mysql_fetch_assoc($q2)){
$v2++;
if($v2 < 4){
echo '<div><span class="fl nobr"><span>'.$v2.'</span>.<span><span class="nobr">'.nick($post2['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/ref.png"><span> '.n_f($cr['ref_turnir']).'</span></span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/Diamonds/">
<div class="menu-left"><font width=50% color=666633>Турнир Алмазов</font></a>
<hr>';
$q3 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `Diamonds` + '1' DESC ");
while($post3 = mysql_fetch_assoc($q3)){
$v3++;
if($v3 < 4){
echo '<div><span class="fl nobr"><span>'.$v3.'</span>.<span><span class="nobr">'.nick($post3['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/Diamonds.png"><span>'.n_f($post3['Diamonds']).'</span></span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/Missions/">
<div class="menu-left"><font width=50% color=666633>Турнир Заданий</font></a>
<hr>';
$q4 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `mission_koll_tur` + '1' DESC ");
while($post4 = mysql_fetch_assoc($q4)){
$v4++;
if($v4 < 4){
echo '<div><span class="fl nobr"><span>'.$v4.'</span>.<span><span class="nobr">'.nick($post4['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/mission/star_.png"><span> '.$post4['missions_turnir'].'</span>  <img width="24" height="24" alt="" src="/mission/mission_.png"> <span> '.$post4['mission_koll_tur'].'</span></span>
<div class="cb"></div></div>';
}

}
echo '<hr>
<img width="20" height="20" alt="" src="/images/mission/star_.png"><span> <font size=2> - полученные звезды с заданий</font> </span>  <img width="20" height="20" alt="" src="/mission/mission_.png"> <span> - <font size=2>выполненые задания</font></span>
';
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/mnogit/">
<div class="menu-left"><font width=50% color=666633>Турнир Множителя</font></a>
<hr>';
$q5 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `turnir_mission_mnogit` + '1' DESC ");
while($post5 = mysql_fetch_assoc($q5)){
$v5++;
if($v5 < 4){
echo '<div><span class="fl nobr"><span>'.$v5.'</span>.<span><span class="nobr">'.nick($post5['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/mission/mnogit.png"><span> '.$post5['turnir_mission_mnogit'].'</span></span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/points/">
<div class="menu-left"><font width=50% color=666633>Турнир по очкам активности</font></a>
<hr>';
$q6 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `turnir_points` + '1' DESC ");
while($post6 = mysql_fetch_assoc($q6)){
$v6++;
if($v6 < 4){
echo '<div><span class="fl nobr"><span>'.$v6.'</span>.<span><span class="nobr">'.nick($post6['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/exp.png"><span> '.$post6['turnir_points'].'</span></span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/soyz/">
<div class="menu-left"><font width=50% color=666633>Турнир Союзов</font></a>
<hr>';
$q6 = mysql_query("SELECT * FROM `soyz` WHERE `id` ORDER BY `turnir_musor_1` + '1' DESC ");
while($post7 = mysql_fetch_assoc($q6)){
$v7++;
if($v7 < 4){
echo '<div><span class="fl nobr"><span>'.$v7.'</span>.<span><span class="nobr"><a class="guild" href="'.$HOME.'soyz/'.$post7['id'].'/"><img alt="" src="/images/footer/soyz.png" width="24" height="24"> <span>'.$post7['name'].'</span></a></span></span></span>
<span class="fr nobr"><img src="/images/header/money_36.png" alt="o" width="20" height="20"> <span> '.n_f($post7['turnir_musor_1']).'</span>% </span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/corp/">
<div class="menu-left"><font width=50% color=666633>Турнир по Корпоративным ангелам</font></a>
<hr>';
$q8 = mysql_query("SELECT * FROM `corp` WHERE `id` ORDER BY `turnir_angel_1` + '1' DESC ");
while($post8 = mysql_fetch_assoc($q8)){
$v8++;
if($v8 < 4){
echo '<div><span class="fl nobr"><span>'.$v8.'</span>.<span><span class="nobr"><a class="guild" href="'.$HOME.'corp/'.$post8['id'].'/"><img alt="" src="/images/footer/corp.png" width="24" height="24"><span> '.$post8['name'].'</a></span></span></span>
<span class="fr nobr"><img src="/images/angel48.png" alt="$" width="20" height="20"> <span> '.n_f($post8['turnir_angel_1']).'</span> </span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/mine_rock/">
<div class="menu-left"><font width=50% color=666633>Турнир шахты [Камней]</font></a>
<hr>';
$q9 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `turnir_rock` + '1' DESC ");
while($post9 = mysql_fetch_assoc($q9)){
$v9++;
if($v9 < 4){
if($user['level'] >= 0){
$proc_angel = (0.0005);
$text = ' <img src="/images/angel48.png" alt="$" width="20" height="20"><span> '.n_f($post9['turnir_rock']*($post9['angel']*$proc_angel/100)).'</span>';
}
echo '<div><span class="fl nobr"><span>'.$v9.'</span>.<span><span class="nobr">'.nick($post9['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/colections/22.png"> <span> '.n_f($post9['turnir_rock']).'</span> '.$text.'</span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################


echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Turnirs/mine_Diamonds/">
<div class="menu-left"><font width=50% color=666633>Турнир шахты [Алмазов]</font></a>
<hr>';
$q10 = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `turnir_Diamonds` + '1' DESC ");
while($post10 = mysql_fetch_assoc($q10)){
$v10++;
if($v10 < 4){
if($user['level'] >= 0){
$text1 = ' <img src="/images/header/money_36.png" alt="o" width="20" height="20"> <span>'.n_f($post10['turnir_Diamonds']*100).'</span>%';
}
echo '<div><span class="fl nobr"><span>'.$v10.'</span>.<span><span class="nobr">'.nick($post10['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/Diamonds.png"><span>'.n_f($post10['turnir_Diamonds']).'</span> '.$text1.'</span>
<div class="cb"></div></div>';
}

}
echo '</div></td>';
echo '</tr></tbody></table>';

#######################################################################################################################################








echo '<center><div class="minor mt4">Рейтинги Турнира обновляются в режиме реального времени.</div></center>';
require_once ('../system/footer.php');
?>