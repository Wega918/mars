<?php
$title = 'Фонд Корпорации';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$id = abs(intval($_GET['id']));
$corp_id = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id` = '".mysql_real_escape_string($id)."'"));
if($corp_id == 0){
header('Location: '.$HOME.'');
exit();
}
if($id != $user['corp']){
header('Location: '.$HOME.'');
exit();
}



echo '<body><div class="center"></div><div></div>';
echo '<div class="content">Фонд: <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span> '.n_f($corp['rubin']).'</span></span></div>';



if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '".$corp['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$corporate_card = mysql_query("SELECT * FROM `users` where `corp` = '".$corp['id']."' ORDER BY `corp_rubin` + '1' DESC LIMIT $start, $max");
echo '<div class="content" style="padding-top: 0;"><div><div class="bordered mt4" style="padding: 0 4px 4px 0;">';
if($corp['Rate_of_contribution'] > 0){
echo '<div class="content small minor">Недельная норма взноса: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$corp['Rate_of_contribution'].' </div>';
}
while($c = mysql_fetch_assoc($corporate_card)){
$number++;
echo '<span class="fl"><span>'.$number.'</span>.<span class="nobr">'.nick($c['id']).'</span></span>
<span class="fr"><img width="24" height="24" src="/images/ruby.png"><span>'.n_f($c['corp_rubin']).'</span></span>
<div class="cb"></div>';
}
echo '</div></div></div>';










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

mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-mysql_real_escape_string($add_fund))."', `corp_rubin` = '".($user['corp_rubin']+mysql_real_escape_string($add_fund))."' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']+mysql_real_escape_string($add_fund))."' WHERE `id` = '$corp[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Корпорации <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund.'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
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



///##########################################################################################################################################
if($user['corp_rang'] <= 2){
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
if($user['corp_rang'] > 2){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `corp_rubin` = '0' WHERE `corp` = '".$corp['id']."' ");
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}
///##########################################################################################################################################
if($user['corp_rang'] <= 2){
echo '<a class="btnl mt4" href="'.$HOME.'corp/Rate_of_contribution/"><img src="/images/settings2.png" width="24" height="24"> Настройки нормы взноса</a>';
}









echo '<a class="btnl mt4" href="'.$HOME.'corp/'.$user['corp'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> В Корпорацию</a>';
echo '</body>';





require_once ('../system/footer.php');
?>