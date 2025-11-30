<?php
$title = 'Турнирный Рейтинг Рефералов';
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

Цель каждого игрока - привлечь как можно больше людей в игру за время Турнира (3 дня).
<br><br></b>

<font color=black><img width="15" height="15" alt="" src="/images/ref.png"> "Рефералы" начисляются игроку только в случае проведения рефералом более 2 часов в игре.
Ниже указана ссылка по которой должны регистрироваться Ваши рефералы.
</font>
<br><br>

<font color=red>Награда выдается всем участникам Турнира.<br>
Награда за одного реферала <img width="15" height="15" alt="" src="/images/ruby.png"> 1000<br><br>
Так же действует бонус помимо Турнира (<img width="15" height="15" alt="" src="/images/ruby.png"> 1000 за реферала).
</font>

<br><br><center>
<input type="text" style="width: 50%;" value="'.$HOME.'registr.php?inv='.$user['id'].'"/>
</center>

</font></div>';
header("Location: ?");exit();}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>'.$title.'</b><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `ref_turnir` >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$corprat = mysql_query("SELECT * FROM `users` WHERE `ref_turnir` >= '1' ORDER BY `ref_turnir` DESC LIMIT $start,$max");
while($cr = mysql_fetch_assoc($corprat)){
if($cr['id'] == $user['id']){
$reyt1 = '<b>'.$k_post++.'</b>';
}else{
$reyt1 = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt1.'</span>.<span><span class="nobr">'.nick($cr['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/ref.png"><span> '.n_f($cr['ref_turnir']).'</span></span>
<div class="cb"></div></div></div>';
}
$q = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `ref_turnir` DESC ");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['id'] == $user['id']){
if($post['ref_turnir'] >= 1){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div>";
}
}
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Turnirs/Ref/?',$k_page,$page); // Вывод страниц
}






echo '<center><div class="minor mt4">'.$title.' обновляется в режиме реального времени.</div></center>';
echo '<a class="btnl mt4" href="?Information/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Информация</a>';
require_once ('../../system/footer.php');
?>