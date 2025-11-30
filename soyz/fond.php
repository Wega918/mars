<?php
$title = 'Фонд Союза';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$id = abs(intval($_GET['id']));
$soyz_id = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id` = '".mysql_real_escape_string($id)."'"));
if($soyz_id == 0){
header('Location: '.$HOME.'');
exit();
}
if($id != $user['soyz']){
header('Location: '.$HOME.'');
exit();
}



echo '<body><div class="center"></div><div></div>';
echo '<div class="content">Фонд: <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span> '.n_f($soyz['rubin']).'</span></span></div>';



if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '".$soyz['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$soyzorate_card = mysql_query("SELECT * FROM `users` where `soyz` = '".$soyz['id']."' ORDER BY `soyz_rubin` + '1'  DESC LIMIT $start, $max");
echo '<div class="content" style="padding-top: 0;"><div><div class="bordered mt4" style="padding: 0 4px 4px 0;">';
if($soyz['Rate_of_contribution'] > 0){
echo '<div class="content small minor">Недельная норма взноса: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$soyz['Rate_of_contribution'].' </div>';
}
while($c = mysql_fetch_assoc($soyzorate_card)){
$number++;
echo '<span class="fl"><span>'.$number.'</span>.<span class="nobr">'.nick($c['id']).'</span></span>
<span class="fr"><img width="24" height="24" src="/images/ruby.png"><span>'.n_f($c['soyz_rubin']).'</span></span>
<div class="cb"></div>';
}
echo '<div class="cb"></div></div></div></div>';










if (isset($_POST['submit'])){
$add_fund = strong($_POST['add_fund']);

if($user['rubin'] < $add_fund){
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов.</font>';
header('Location: ?');
exit();
}
if($add_fund == 0){
$_SESSION['err'] = '<font color=red>Введите сумму.</font>';
header('Location: ?');
exit();
}
if($add_fund < 0){
$_SESSION['err'] = '<font color=red>Нельзя переводить сумму меньше нуля.</font>';
header('Location: ?');
exit();
}
if($user['game_time'] < 18000 && $user['limitation'] < 500){
$_SESSION['err'] = '<font color=red>Пополнять фонд можно после покупки не менее 500 рубинов, или после проведения 5 часов в игре.</font>';
header('Location: ?');
exit();
}

mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-mysql_real_escape_string($add_fund))."', `soyz_rubin` = '".($user['soyz_rubin']+mysql_real_escape_string($add_fund))."' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query("UPDATE `soyz` SET `rubin` = '".($soyz['rubin']+mysql_real_escape_string($add_fund))."' WHERE `id` = '$soyz[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Союза <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund.'</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text', `time` = '".time()."'");
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}




echo '<div class="bordered mt4">
<form action="" method="POST">
<label>Пополнить на <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины">
<input type="number" style="max-width: 75px;" value="0" name="add_fund"></label>
<input class="mt4" type="submit" name="submit" value="Вложить">
</form>
</div>';







echo '<div></div>';
echo '<div class="content small minor">Пополнять фонд можно после покупки не менее 500 рубинов, или после проведения 5 часов в игре.</div>';

if($user['soyz_rang'] <= 2){
echo '<a class="btnl mt4" href="'.$HOME.'soyz/Rate_of_contribution/"><img src="/images/settings2.png" width="24" height="24"> Настройки нормы взноса</a>';
}


///##########################################################################################################################################
if($user['soyz_rang'] <= 2){
echo '<a class="btnl mt4" href="?Reset_statistics/"><img src="/images/refresh_white2.png" width="24" height="24"> Обнулить статистику</a>';
}

if(isset($_GET['Reset_statistics/'])){
$_SESSION['err'] = 'Вы уверены, что хотите обнулить статистику взносов?
<div class="mt4"><a class="btni accept" href="?Reset_statistics_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset_statistics_/'])){
if($user['soyz_rang'] > 2){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `soyz_rubin` = '0' WHERE `soyz` = '".$soyz['id']."' ");
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}
///##########################################################################################################################################










echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
echo '</body>';





require_once ('../system/footer.php');
?>