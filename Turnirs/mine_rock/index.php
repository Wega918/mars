<?php
$title = 'Турнир по камням шахты';
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

Цель каждого игрока - в шахте добывать <img width="24" height="24" alt="" src="/images/colections/22.png"> Камни.
<br><br></b>

<font color=red>каждый найденый камень в шахте - это 0.0005% от ваших ангелов на момент итогов турнира
каждых три дня ангелы  будут суммироваться и начисляться в корпорацию как постоянный бонус.

</font></font>
<br></div>';
header("Location: ?");exit();}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>'.$title.'</b><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `turnir_rock` >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$corprat = mysql_query("SELECT * FROM `users` WHERE `turnir_rock` >= '1' ORDER BY `turnir_rock` DESC LIMIT $start,$max");
while($cr = mysql_fetch_assoc($corprat)){
if($cr['id'] == $user['id']){
$reyt1 = '<b>'.$k_post++.'</b>';
}else{
$reyt1 = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt1.'</span>.<span><span class="nobr">'.nick($cr['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/colections/22.png"><span> '.n_f($cr['turnir_rock']).'</span></span>
<div class="cb"></div></div></div>';
}
$q = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `turnir_rock` DESC ");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['id'] == $user['id']){
if($post['turnir_rock'] >= 1){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div>";
}
}
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Turnirs/mine_rock/?',$k_page,$page); // Вывод страниц
}






echo '<center><div class="minor mt4">'.$title.' обновляется в режиме реального времени.</div></center>';
echo '<a class="btnl mt4" href="?Information/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Информация</a>';
require_once ('../../system/footer.php');
?>