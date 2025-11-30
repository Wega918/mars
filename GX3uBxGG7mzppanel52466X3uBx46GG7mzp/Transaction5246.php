<?php
$title = 'Перевод рубинов';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 2) {
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










echo ' '.nick($id).' / Перевод рубинов';


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

if($summ < 0) {
$_SESSION['err'] = 'Ошибка!';
header ('Location: ?');
exit();
}

if($user['id'] != 1) {
if($summ > 100000) {
$_SESSION['err'] = 'Введите сумму до 100к!';
header ('Location: ?');
exit();
}
}

$tex = 'Здравствуйте! Вам было переведено '.$summ.' рубинов от игрока '.$user['login'].'.
Комментарий к переводу: '.$komm.'. ';
$text = strong($tex);

mysql_query("UPDATE `users` SET `rubin` = `rubin` + ".mysql_real_escape_string($summ)."  WHERE `id` = '".mysql_real_escape_string($id)."'");
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".mysql_real_escape_string($id)."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".mysql_real_escape_string($id)."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".mysql_real_escape_string($id)."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".mysql_real_escape_string($id)."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".mysql_real_escape_string($id)."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".mysql_real_escape_string($text)."', `kto` = '2', `komy` = '".mysql_real_escape_string($id)."', `time` = '".time()."', `readlen` = '0'");

mysql_query("INSERT INTO `history_perevod` SET `kto` = '".$user['id']."', `komu` = '".$ank['id']."', `time` = '".time()."', `suma` = '".mysql_real_escape_string($summ)."', `koment` = '".mysql_real_escape_string($komm)."' ");
$_SESSION['err']='Перевод +'.$summ.'  рубинов От Администрации! Успешен!';
header ('Location: ?');
exit();
}



echo '<hr><center><form action="" method="POST">
Сумма превода +:<br> <input type="text" style="width: 95%;" name="summ" value="" maxlength="20" > 
Комментарий к переводу +:<br> <input type="text" style="width: 95%;" name="komm" value="" maxlength="300" > 
<input class="mt4" type="submit" name="submit" value="Перевести">
</form></center>';

echo '</center></div>';





echo '<a class="btnl mt4" href="'.$HOME.'Moneytransaction5246/'.$id.'/">Назад</a>';
require_once ('../system/footer.php');
?>