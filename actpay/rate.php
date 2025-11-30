<?
$title = 'Рейтинг по ангелам';
include '../system/config.php';   
include '../system/function.php';
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}

if($promotions['promotion_18'] == 0){
if($safe['time_restart'] < time()){
header('Location: /');
exit();
}
}else{
if(!$safe){
header('Location: /');
exit();
}
}


echo '<body><div class="center"></div><div></div><div class="content"><div>
Рейтинг по <img src="/images/angel48.png" alt="$" width="25" height="25"> бизнес-ангелам </div><div>';






if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `safe` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `safe` WHERE `id` ORDER BY `angel` + 1 DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id`  = '".$r['user']."'"));
if($us['id'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($r['user']).'</span></span></span>
<span class="fr nobr"><img src="/images/angel48.png" alt="$" width="24" height="24"><span> '.n_f($r['angel']).'</span></span>
<div class="cb"></div></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'rate/?',$k_page,$page); // Вывод страниц
}





if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `safe` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `safe` WHERE `id` ORDER BY `angel` + 1 DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['user'] == $user['id']){
if($v1 <= 1000){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div></div></div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div><div></div>";
}
}
}






echo '<a class="btnl mt4" href="'.$HOME.'bay/">Назад</a>';






echo '</body>';
require_once ('../system/footer.php');
?>