<?php
$title = 'Перевод рубинов +';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['id'] > 3) {
header('Location: '.$HOME.'');
exit();
}

$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));


if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}

if($id == $user['id']){
$_SESSION['err']='Перевод самому себе запрещен!';
header ('Location: /');
exit();
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';
echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';










echo ' '.nick($id).' / Перевод рубинов (Покупка)';

if(isset($_POST['summ'])){

$summ = strong($_POST['summ']);
$komm = strong($_POST['komm']);
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
if(mb_strlen($komm) > 300 or mb_strlen($komm) < 5){
$_SESSION['err']='Введите комментарий от 5 до 300 символов!';
header ('Location: ?');
exit();
}

if(empty($summ)) {
$_SESSION['err']='Вы не ввели сумму!';
header ('Location: ?');
exit();
}





if($promotions['promotion_2'] == 1){
if($promotions['act_2'] == 0){
$limit = 1;
}else{
$limit = $promotions['act_2'];
}
$kartt = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $limit");
$kar = mysql_fetch_array ($kartt);
do {
$rand = rand(1,20);
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$ank['id']."', `images` = '$rand' ");
} while ($kar = mysql_fetch_array ($kartt));
}



if($promotions['promotion_2'] == 1){
$text_kard = ' и X'.$limit.' карт/a,ы по акции.';
}else{
$text_kard = '.';
}


$text = 'Ваш баланс пополнен на <img width="20" height="20" alt="Рубины" src="/images/ruby.png" title="Рубины"> '.$summ.' рубинов игроком '.$user['login'].'.
<br>Комментарий к переводу: '.$komm.'.';
mysql_query("UPDATE `users` SET `rubin` = `rubin` + ".mysql_real_escape_string($summ).", `limitation` = `limitation` + ".mysql_real_escape_string($summ)."  WHERE `id` = '".$id."'");



$corp_p = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$ank['corp']."'"));
$soyz_p = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$ank['soyz']."'"));


if($ank['corp'] >= 1){
if($promotions['promotion_3'] == 1){
$add_fund = (($summ * $promotions['act_3']) / 100);
mysql_query("UPDATE `users` SET `corp_rubin` = '".($ank['corp_rubin'] + mysql_real_escape_string($add_fund) )."' WHERE `id` = '$ank[id]' LIMIT 1");
mysql_query("UPDATE `corp` SET `rubin` = '".($corp_p['rubin'] + mysql_real_escape_string($add_fund))."' WHERE `id` = '$corp_p[id]' LIMIT 1");
$text_k = ' <font color=lightgreen>'.nick($ank['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Корпорации <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund.' (Покупка)</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$ank['corp']."', `text` = '$text_k', `time` = '".time()."'");
}
}

if($user['soyz'] >= 1){
if($promotions['promotion_4'] == 1){
$add_fund_soyz = (($summ * $promotions['act_4']) / 100);
mysql_query("UPDATE `users` SET `soyz_rubin` = '".($ank['soyz_rubin'] + mysql_real_escape_string($add_fund_soyz) )."' WHERE `id` = '$ank[id]' LIMIT 1");
mysql_query("UPDATE `soyz` SET `rubin` = '".($soyz_p['rubin'] + mysql_real_escape_string($add_fund_soyz))."' WHERE `id` = '".$ank['soyz']."' LIMIT 1");
$text_s = ' <font color=lightgreen>'.nick($ank['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Союза <img src="/images/ruby.png" width="24" height="24" alt=""> '.$add_fund_soyz.' (Покупка)</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$ank['soyz']."', `text` = '$text_s', `time` = '".time()."'");
}
}










if($ank['referals'] >= 1){
mysql_query("UPDATE `users` SET `rubin` = `rubin` + ".mysql_real_escape_string(($summ/5))."  WHERE `id` = '".$ank['referals']."'");
$texz = 'Здравствуйте! Я один из ваших рефералов! Я купил  '.$summ.'  рубинов! Ваша реферальная доля + '.($summ/5).' рубинов!';
$textz = strong($texz);
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$ank['referals']."' and `kto` = '".$id."' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '".mysql_real_escape_string($id)."', `kogo` = '".$ank['referals']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$ank['referals']."', `kogo` = '".mysql_real_escape_string($id)."', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '".mysql_real_escape_string($id)."' and `kto`='".$ank['referals']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '".mysql_real_escape_string($id)."' and `kogo`='".$ank['referals']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".mysql_real_escape_string($textz)."', `kto` = '".mysql_real_escape_string($id)."', `komy` = '".$ank['referals']."', `time` = '".time()."', `readlen` = '0'");
}



$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".mysql_real_escape_string($id)."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".mysql_real_escape_string($id)."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".mysql_real_escape_string($id)."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".mysql_real_escape_string($id)."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".mysql_real_escape_string($id)."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".mysql_real_escape_string($text)."', `kto` = '2', `komy` = '".mysql_real_escape_string($id)."', `time` = '".time()."', `readlen` = '0'");

$_SESSION['err']='Перевод +'.$summ.' рубинов '.$text_kard.' От Администрации! Успешен!';
header ('Location: ?');
exit();
}



echo '<hr><center><form action="" method="POST">
Сумма превода :<br> <input type="text" style="width: 95%;" name="summ" value="" maxlength="20" > 
Комментарий к переводу :<br> <input type="text" style="width: 95%;" name="komm" value="" maxlength="300" > 
<input class="mt4" type="submit" name="submit" value="Перевести">
</form></center>';

echo '</center></div>';
echo '<div class="content small minor">При переводе игроку зачисляються рубины как купленные (достижения, снятие лимита), также начисляется 20% рефералу.</div>';
echo '<div class="content small minor">Карта в подарок дается только в том случае, если: перевод свыше 1000 рубинов и акция включена.</div>';
echo '<a class="btnl mt4" href="'.$HOME.'igrok_'.$ank['id'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>