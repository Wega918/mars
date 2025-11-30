<?php
$title = 'Турнир Cоюзов';
//-----Подключаем функции-----//
require_once ('../../system/function.php');
//-----Подключаем вверх-----//
require_once ('../../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


if(isset($_GET['Information/'])){
$_SESSION['err'] = '
<div class="left"><font size=2>Турнир - это всеобщее захватывающее состязание между игроками.
<br><br>

Цель каждого игрока - собрать больше <img width="15" height="15" alt="" src="/images/Diamonds.png"> "Алмазов" за время Турнира (3 дня).
<br><br>

<img width="15" height="15" alt="" src="/images/Diamonds.png"> "Алмазы" добываются в <a href="'.$HOME.'mine/"><i>Шахте</i></a>.
<br><br>

Награда: <img width="20" height="20" alt="" src="/images/header/money_36.png">10% за каждый <img width="20" height="20" alt="" src="/images/Diamonds.png"> Алмаз.<br>

</font></div>';
header("Location: ?");exit();}









echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>Топ 5 Cоюзов</b><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz` WHERE `Diamonds`  >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `soyz` WHERE `Diamonds` >= '1'  ORDER BY `Diamonds` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$iii=n_f($r['Diamonds']);
if($r['id'] == $user['soyz']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
echo '<div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.
<span><a class="guild" href="'.$HOME.'soyz/'.$r['id'].'/"><img alt="" src="/images/footer/soyz.png" width="24" height="24"><span> '.$r['name'].'</a></span>
</span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/Diamonds.png"><span>'.$iii.'</span></span><div class="cb"></div></div>';
}
echo '<hr><a class="btnl mt4" href="'.$HOME.'Turnirs/Diamonds/soyz/">Полный список Cоюзов</a></span></li></ul></div>';









echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>Топ 5 игроков</b><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `Diamonds`  >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` WHERE `Diamonds` >= '1'  ORDER BY `Diamonds` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$iii=n_f($r['Diamonds']);
if($r['id'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
echo '<div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.
<span>'.nick($r['id']).'</span>
</span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/Diamonds.png"><span>'.$iii.'</span></span><div class="cb"></div></div>';
}
echo '<hr><a class="btnl mt4" href="'.$HOME.'Turnirs/Diamonds/users/">Полный список игроков</a></span></li></ul></div>';






echo '<center><div class="minor mt4">'.$title.' обновляется в режиме реального времени.</div></center>';
echo '<a class="btnl mt4" href="?Information/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Информация</a>';
require_once ('../../system/footer.php');
?>