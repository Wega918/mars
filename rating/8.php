<?php
$title = 'Рейтинг по параметрам костюма';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
echo '<body><div class="center"></div><div></div><div class="content"><div>'.$title.'</div><div>';

$us1 = mysql_query("SELECT * FROM `users` ORDER BY `s` + `b` + `n` + `max_z` DESC LIMIT 1");
$us = mysql_query("SELECT * FROM `users` ORDER BY `s` + `b` + `n` + `max_z` DESC LIMIT $start,$max");

if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` ORDER BY `u` + `z` + `h` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$param = ($r['u'] + $r['z'] + $r['h']);
if($r['id'] == $user['id']){$reyt = '<b>'.$k_post++.'</b>';}else{$reyt = $k_post++;}
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($r['id']).'</span></span></span>
<span class="fr nobr"><span><img src="/world/images/u.png" alt="*"> <font size=2 color=black>'.$r['u'].'</font> | <img src="/world/images/z.png" alt="*"> <font size=1 color=black>'.$r['z'].'</font> | <img src="/world/images/h.png" alt="*"> <font size=2 color=black>'.$r['h'].'</font></span></span>
<div class="cb"></div></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'rating/8/?',$k_page,$page); // Вывод страниц
}





if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` ORDER BY `u` + `z` + `h` DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($users)){
$v1++;
if($post['id'] == $user['id']){
if($v1 <= 1000){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div></div></div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div><div></div>";
}
}
}









echo '<a class="btnl mt4" href="'.$HOME.'rating/">Назад</a>';


echo '</body>';
echo '<center><div class="minor mt4">Рейтинг онлайна обновляется в режиме реального времени.</div></center>';
require_once ('../system/footer.php');
?>