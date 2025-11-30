<?php
$title = 'Турнир по Корпоративным ангелам';
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

Цель каждого игрока - как можно чаще делать сброс ангелов картой.
<br><br></b>

Награда: собранные ангелы корпорацией за 3 дня прибавляется кп навсегда.<br>
<br>
корпорация топ 1 получит 6 дополнительных мест в кп на 2 дня<br>
корпорация топ 2 получит 4 дополнительных места в кп на 2 дня<br>
корпорация топ 3 получит 2 дополнительных места в кп на 2 дня
</font></div>';
header("Location: ?");exit();}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>'.$title.'</b><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp` WHERE `turnir_angel_1` >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$turnir_users_mission = mysql_query("SELECT * FROM `corp` WHERE `turnir_angel_1` >= '1' ORDER BY `turnir_angel_1` + '1' DESC LIMIT $start,$max");
while($t_u_m = mysql_fetch_assoc($turnir_users_mission)){
if($t_u_m['id'] == $user['corp']){
$reyt5 = '<b>'.$k_post++.'</b>';
}else{
$reyt5 = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt5.'</span>.<span><span class="nobr">
<a class="guild" href="'.$HOME.'corp/'.$t_u_m['id'].'/"><img alt="" src="/images/footer/corp.png" width="24" height="24"><span> '.$t_u_m['name'].'</a>
</span></span></span>
<span class="fr nobr"><img src="/images/angel48.png" alt="$" width="20" height="20"> <span> '.n_f($t_u_m['turnir_angel_1']).'</span> </span>
<div class="cb"></div></div></div>';
}
$q = mysql_query("SELECT * FROM `corp` WHERE `id` ORDER BY `turnir_angel_1` + '1' DESC ");
while($post = mysql_fetch_assoc($q)){
$v5++;
if($post['id'] == $user['corp']){
if($post['turnir_angel_1'] >= 1){
echo '<div class="minor mt4">Ваша Корпорация находится на <span>'.$v5.'</span> месте в рейтинге!</div>';
}
if($post['turnir_angel_1'] == 0){
echo "<div class='minor'>Ваша Корпорация не участвует в рейтинге...</div>";
}
if($user['corp'] == 0){
echo "<div class='minor'>Вы не состоите в Корпорации...</div>";
}
}
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Turnirs/corp/?',$k_page,$page); // Вывод страниц
}






echo '<center><div class="minor mt4">'.$title.' обновляется в режиме реального времени.</div></center>';
echo '<a class="btnl mt4" href="?Information/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Информация</a>';
require_once ('../../system/footer.php');
?>