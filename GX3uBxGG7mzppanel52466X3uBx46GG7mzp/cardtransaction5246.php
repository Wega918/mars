<?php
$title = 'Перевод карт';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
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



echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';










echo ' '.nick($id).' / Перевод карт';


if(isset($_POST['summ'])){

$summ = strong($_POST['summ']);
$mnogitel = strong($_POST['mnogitel']);
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
if(empty($summ)) {
$_SESSION['err'] = 'Вы не ввели сумму!';
header ('Location: ?');
exit();
}



$kartt = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $summ");
$kar = mysql_fetch_array ($kartt);
do {
$rand = rand(1,20);
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$ank['id']."', `images` = '".$rand."', `xxx` = '".$mnogitel."' ");
} while ($kar = mysql_fetch_array ($kartt));



$text = 'Здравствуйте! Вам начислено карт: <font color=black>['.$summ.']</font> ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$id."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$id."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$id."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$id."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$id."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".mysql_real_escape_string($text)."', `kto` = '2', `komy` = '".$id."', `time` = '".time()."', `readlen` = '0'");

$_SESSION['err'] = '<font color=black>['.$summ.']</font> карт успешно переведено.';
header ('Location: ?');
exit();
}



echo '<hr><center><form action="" method="POST">
Количество:<br> <input type="text" style="width: 95%;" name="summ" value="" maxlength="1000" > 
Множитель:<br> <input type="text" style="width: 95%;" name="mnogitel" value="" maxlength="1000" > 
<input class="mt4" type="submit" name="submit" value="Перевести">
</form></center>';

echo '</center></div>';

echo '<a class="btnl mt4" href="'.$HOME.'Moneytransaction5246/'.$id.'/">Назад</a>';
require_once ('../system/footer.php');
?>