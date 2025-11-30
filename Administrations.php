<?php
$title = 'Администрация';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']){
header('Location: /');
exit();
}
$adm =mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `level` >= '1' "),0);


if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `level` >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` WHERE `level` >= '1'  ORDER BY `level` + '1' DESC LIMIT $start,$max");
echo '<div class="center"><div class="feedback">Администрация: '.$adm.'</div></div><div class="center"><div class="feedback">';
while($a = mysql_fetch_assoc($users)){
if($a['level'] == 1){
$Rang = '<font color=black>Модератор</font>';
}
if($a['level'] == 2){
$Rang = '<font color=#ad0000>Администратор</font>';
}
if($a['level'] == 3){
$Rang = '<font color=red>Разработчик</font>';
}

echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$k_post++.'</span>.<span><span class="nobr">'.nick($a['id']).'</span></span></span>
<span class="fr nobr"><span>'.$Rang.'</span></span>
<div class="cb"></div></div></div>';
}
echo '</div></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Administrations/?',$k_page,$page); // Вывод страниц
}



/*
echo '<center><div class="minor mt4">Рейтинг обновится через: <span>
<span id="time_'.($time_rating['time']-time()).'000">'._time($time_rating['time']-time()).'</span>
</span> </div></div></div></center>';
*/



require_once ('system/footer.php');
?> 