<?php
$title = 'Мои грядки';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
require_once ('../garden/taimers1.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}



echo '<a class="btnl mt4" href="'.$HOME.'garden/">Назад</a>';
echo '<center><div class="mt4">У Вас <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$user['leaf'].'</span></div></center>';


if (empty($user['max'])) $user['max']=10;
$max = 70;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `garden` WHERE `id` ORDER BY `id` ASC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user`  = '".$user['id']."' and `name`  = '".$r['name']."' ")); // растения игрока

echo '<div class="mt4"><div class="bordered" style="margin-top: 4px; position: relative;">
<div style="display: inline;" class="fl">
<img class="left" src="/images/garden/a'.($r['images']).'.jpg" alt="plant" width="64" height="64">
<div class="left" style="display: inline-block; vertical-align: bottom; padding-top: 4px;">

<div class="show350 tdbrown small" style="padding:0 0 2px 0;">
Урожай <img src="/images/garden/leaf.png" alt="$" width="16" height="16"> <span>'.n_f($r['harvest']).'</span>
<img src="/images/clock.png" alt="$" width="16" height="16"> <span>'.($r['time']/60).'м</span>,
<img src="/images/angel48.png" alt="$" width="16" height="16">+<span>'.($r['angel_proc']).'</span>%
</div>';
if($garden_user_){
echo '<div><span class="btni" style="min-width:64px;">Изучено за <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.n_f($r['cost']).'</span></span></div>';
}elseif($user['leaf']<$r['cost']){
echo '<div><span class="btni" style="min-width:64px;">Изучить за <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.n_f($r['cost']).'</span></span></div>';
}elseif(!$garden_user_ and $user['leaf']>=$r['cost']){
echo '<div><a class="btni" style="min-width:64px;" href="?buy_'.$r['id'].'">Изучить за <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.n_f($r['cost']).'</span></a></div>';
}
echo '</div></div><div class="cb"></div></div></div>';



if(isset($_GET['buy_'.$r['id'].''])){
if($garden_user_){header('Location: ?');exit();}
if($user['leaf'] < $r['cost']){
$_SESSION['err'] = 'Не хватает <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> '.n_f($r['cost']-$user['cost']).'';
header('Location: ?');
exit();
}
mysql_query("INSERT INTO `garden_user` SET  `user` = '".$user['id']."',  `name` = '".$r['name']."',  `harvest` = '".$r['harvest']."',  `time` = '".$r['time']."',  `angel_proc` = '".$r['angel_proc']."',  `cost` = '".$r['cost']."',  `images` = '".$r['images']."' ");
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `leaf` = '".($user['leaf']-$r['cost'])."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}


}




echo '<a class="btnl" href="'.$HOME.'garden/">Назад</a>';

require_once ('../system/footer.php');
?>