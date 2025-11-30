<?php
$title = 'Турнирный Рейтинг Союза';
//-----Подключаем функции-----//
require_once ('../../system/function.php');
//-----Подключаем вверх-----//
require_once ('../../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}



echo '<body><div class="center"></div><div></div><div class="content"><div>
<img width="24" height="24" alt="" src="/images/Diamonds.png"> <span>'.$title.'</span></div><div>';






if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = ".$user['soyz']." "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` WHERE `soyz` = ".$user['soyz']." ORDER BY `Diamonds` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
if($r['id'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($r['id']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/Diamonds.png"><span> '.n_f($r['Diamonds']).'</span></span>
<div class="cb"></div></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'SoyzRating/?',$k_page,$page); // Вывод страниц
}





if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz = ".$user['soyz']." "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `users`  WHERE `soyz` = ".$user['soyz']." ORDER BY `Diamonds` + `sex` DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['id'] == $user['id']){
if($v <= 1000){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div>";
}
}
}





echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
echo '</body>';


echo '<center><div class="minor mt4">'.$title.' обновляется в режиме реального времени.</div></center>';
require_once ('../../system/footer.php');
?>