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


if($user['vip_pay'] == 1 ){
$max_costs = 100;
}else{
$max_costs = 50;
}


if($user['management'] == 0){
$management = 'запретили';
$knopka_ = '<a class="btni" style="padding-left:16px;padding-right:16px;" href="?buy"><span>Разрешить</span></a>';
}
if($user['management'] == 1){
$management = 'разрешили';
$knopka_ = '<a class="btni" style="padding-left:16px;padding-right:16px;" href="?buy"><span>Запретить</span></a>';
}


if(isset($_GET['buy'])){
if($user['management'] == 0){
mysql_query("UPDATE `users` SET `management` = '1'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `management` = '0'  WHERE `id` = '".$user['id']."' ");
}
header('Location: ?');
exit();
}




if(isset($_GET['1'])){
if(($user['management_cost']+1) > $max_costs){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `management_cost` = '".($user['management_cost']+1)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['10'])){
if(($user['management_cost']+10) > $max_costs){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `management_cost` = '".($user['management_cost']+10)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}



if(isset($_GET['_1'])){
if($user['management_cost'] == 1){
header('Location: ?');
exit();
}
if(($user['management_cost']-1) < 0){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `management_cost` = '".($user['management_cost']-1)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['_10'])){
if(($user['management_cost']-10) < 0){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `management_cost` = '".($user['management_cost']-10)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}





echo '<div class="content">
<div class="bordered mt4">
Вы <span style="color:#bf2500;">'.$management.'</span> игрокам собирать урожай с Ваших грядок.
При сборе <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> листочки будут зачислены Вам,
а Ваши <img src="/images/ruby.png" alt="$" width="24" height="24"> рубины выплачены помощнику-игроку.
<br><br>
'.$knopka_.'
<br><br>
Ваша цена за помощь на одной грядке:
<br><br>
<a class="btni" href="?10">[+10]</a>
<a class="btni" href="?1">[+1]</a>
<img src="/images/ruby.png" width="24" height="24"> <span>'.$user['management_cost'].'</span>
<a class="btni" href="?_1">[-1]</a>
<a class="btni" href="?_10">[-10]</a>
<div class="minor mt4">
Грядки с более высокой ценой обрабатываются в первую очередь.
</div>
</div>
</div>';





















echo '<div class="content minor" style="margin-top: 4px;"><center>
<img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.$user['leaf'].'</span>
<img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($user['rubin']).'</span>
</center></div>';

echo '<a class="btnl" href="'.$HOME.'garden/">Назад</a>';

require_once ('../system/footer.php');
?>