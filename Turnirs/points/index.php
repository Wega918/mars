<?php
$title = '
Турнир по очкам активности';
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
<b><div class="left"><font size=2>Турнир - это всеобщее захватывающее состязание между игроками.
<br><br>

Цель каждого игрока - каждый час на главной странице забирать бесплатный бонус в виде рубинов и очков активности.
<br><br></b>

Награда: <img width="20" height="20" alt="" src="/images/ruby.png"> 25 за каждое <img width="20" height="20" alt="" src="/images/exp.png"> очко активности.<br>

</font></div>';
header("Location: ?");exit();}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>'.$title.'</b><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `turnir_points` >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$turnir_users_mission = mysql_query("SELECT * FROM `users` WHERE `turnir_points` >= '1' ORDER BY `turnir_points` DESC LIMIT $start,$max");
while($t_u_m = mysql_fetch_assoc($turnir_users_mission)){
if($t_u_m['id'] == $user['id']){
$reyt5 = '<b>'.$k_post++.'</b>';
}else{
$reyt5 = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt5.'</span>.<span><span class="nobr">'.nick($t_u_m['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/exp.png"> <span> '.$t_u_m['turnir_points'].'</span></span>
<div class="cb"></div></div></div>';
}
$q = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `turnir_points` DESC ");
while($post = mysql_fetch_assoc($q)){
$v5++;
if($post['id'] == $user['id']){
if($post['turnir_points'] >= 1){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v5.'</span> месте в рейтинге!</div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div>";
}
}
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Turnirs/points/?',$k_page,$page); // Вывод страниц
}






echo '<center><div class="minor mt4">'.$title.' обновляется в режиме реального времени.</div></center>';
echo '<a class="btnl mt4" href="?Information/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Информация</a>';
require_once ('../../system/footer.php');
?>