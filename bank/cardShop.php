<?php
$title = 'Покупка карт';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';






$rand = rand(1,20);
$x_1 = 50;
$x_2 = 40;
$x_3 = 30;
$x_4 = 20;
$x_5 = 10;
$cost_1 = 1250000;
$cost_2 = 1000000;
$cost_3 = 750000;
$cost_4 = 500000;
$cost_5 = 250000; 

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$x_1.'</span><img src="/images/card/'.$rand.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown">Карта x<span>'.$x_1.'</span></div><div>
<a class="btni" href="?buy_50" style="margin-top: 4px; min-width: 130px;">Купить за <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($cost_1).'</span></a>
</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$x_2.'</span><img src="/images/card/'.$rand.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown">Карта x<span>'.$x_2.'</span></div><div>
<a class="btni" href="?buy_40" style="margin-top: 4px; min-width: 130px;">Купить за <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($cost_2).'</span></a>
</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$x_3.'</span><img src="/images/card/'.$rand.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown">Карта x<span>'.$x_3.'</span></div><div>
<a class="btni" href="?buy_30" style="margin-top: 4px; min-width: 130px;">Купить за <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($cost_3).'</span></a>
</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$x_4.'</span><img src="/images/card/'.$rand.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown">Карта x<span>'.$x_4.'</span></div><div>
<a class="btni" href="?buy_20" style="margin-top: 4px; min-width: 130px;">Купить за <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($cost_4).'</span></a>
</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$x_5.'</span><img src="/images/card/'.$rand.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown">Карта x<span>'.$x_5.'</span></div><div>
<a class="btni" href="?buy_10" style="margin-top: 4px; min-width: 130px;">Купить за <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($cost_5).'</span></a>
</div></div></div><div class="cb"></div></div></div>';













if(isset($_GET['buy_50'])){
$_SESSION['err'] = 'Вы уверны, что хотите купить карту x'.$x_1.' за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f($cost_1).'
<div class="mt4"><a class="btni accept" href="?buy_50/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['buy_40'])){
$_SESSION['err'] = 'Вы уверны, что хотите купить карту x'.$x_2.' за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f($cost_2).'
<div class="mt4"><a class="btni accept" href="?buy_40/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['buy_30'])){
$_SESSION['err'] = 'Вы уверны, что хотите купить карту x'.$x_3.' за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f($cost_3).'
<div class="mt4"><a class="btni accept" href="?buy_30/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['buy_20'])){
$_SESSION['err'] = 'Вы уверны, что хотите купить карту x'.$x_4.' за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f($cost_4).'
<div class="mt4"><a class="btni accept" href="?buy_20/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['buy_10'])){
$_SESSION['err'] = 'Вы уверны, что хотите купить карту x'.$x_5.' за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f($cost_5).'
<div class="mt4"><a class="btni accept" href="?buy_10/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}





if(isset($_GET['buy_50/'])){
if($user['rubin'] < $cost_1){
$_SESSION['err'] = 'не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($cost_1-$user['rubin']).'';
header('Location: ?');
exit();
}
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$x_1."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_1)."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['ok'] = '<span class="count_room">х'.$x_1.'</span><img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64">
<br>
<font color=#ddd>Получена карта</font>';
header('Location: ?');
exit();
}

if(isset($_GET['buy_40/'])){
if($user['rubin'] < $cost_2){
$_SESSION['err'] = 'не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($cost_2-$user['rubin']).'';
header('Location: ?');
exit();
}
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$x_2."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_2)."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['ok'] = '<span class="count_room">х'.$x_2.'</span><img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64">
<br>
<font color=#ddd>Получена карта</font>';
header('Location: ?');
exit();
}

if(isset($_GET['buy_30/'])){
if($user['rubin'] < $cost_3){
$_SESSION['err'] = 'не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($cost_3-$user['rubin']).'';
header('Location: ?');
exit();
}
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$x_3."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_3)."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['ok'] = '<span class="count_room">х'.$x_3.'</span><img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64">
<br>
<font color=#ddd>Получена карта</font>';
header('Location: ?');
exit();
}

if(isset($_GET['buy_20/'])){
if($user['rubin'] < $cost_4){
$_SESSION['err'] = 'не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($cost_4-$user['rubin']).'';
header('Location: ?');
exit();
}
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$x_4."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_4)."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['ok'] = '<span class="count_room">х'.$x_4.'</span><img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64">
<br>
<font color=#ddd>Получена карта</font>';
header('Location: ?');
exit();
}

if(isset($_GET['buy_10/'])){
if($user['rubin'] < $cost_5){
$_SESSION['err'] = 'не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($cost_5-$user['rubin']).'';
header('Location: ?');
exit();
}
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$x_5."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_5)."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['ok'] = '<span class="count_room">х'.$x_5.'</span><img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64">
<br>
<font color=#ddd>Получена карта</font>';
header('Location: ?');
exit();
}
///###############################################################################################################################################















echo '<a class="btnl mt4" href="'.$HOME.'bank/">Назад</a>';

echo ' <font color="black"><font size="3">•</font></font> <font size="1"><b>Купленная карта будет отображаться в профиле.</b></font><br>';
require_once ('../system/footer.php');
?>