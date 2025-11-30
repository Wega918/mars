<?php
$title = 'Таинственный сейф';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';



















if(isset($_POST['submit'])){
$id = strong($_POST['id']);

if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
if(empty($id)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните поле "id".</font>';
exit();
}

$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));
$sql_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1' "));
$premium = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium` WHERE `user` = '".$user['id']."' "));
$premium_musor = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium_musor` WHERE `user` = '".$user['id']."' "));
$promotions = mysql_fetch_assoc(mysql_query("SELECT * FROM `promotions` WHERE `id`  = '1' "));
$safe = mysql_fetch_assoc(mysql_query("SELECT * FROM `safe` WHERE `user` = '".$user['id']."' "));

if(!$safe){
header('Location: /');
exit();
}
if($premium['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($safe['pay'] == 1){
$_SESSION['err'] = '<font color=red>Ошибка! Сейф открыт - награда получена.</font>';
header('Location: ?');
exit();
}
if($safe['time_restart'] <= 0){
$_SESSION['err'] = '<font color=red>Ошибка! Сейф открывается после завершения акции.</font>';
header('Location: ?');
exit();
}




тут выбери топ игрока по angel у которого `premium` = '0' используя точный рейтинг usort 
раздели его ангелы на 4 и сделай все вычесления через bcmath


$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angell_ = ($ang__['angel']/4);
}

if($safe['angel'] >= $angell_){
$angel = $angell_;
}else{
$angel = $safe['angel'];
}


$pay_text = '<font color="green"><b>Таинственный сейф</b> получено <img src="/images/angel48.png" alt="$" width="24" height="24"> бизнес-ангелов <font color="black">'.n_f($angel*2).'</font></font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `safe` SET `pay` = '1' WHERE `user` = '".$user['id']."' limit 1");
mysql_query("UPDATE `users` SET `angel` = '".($user['angel']+$angel*2)."' WHERE `id` = '".$user['id']."' limit 1");



$_SESSION['err'] = 'Начисление игроку '.nick($user['id']).' прошло успешно.';
header ('Location: ?');
exit();
}



echo '<br><form action="" method="POST">
<input placeholder="Id игрока" type="number" name="id" style="width: 95%;" maxlength="30" value=""><br>
<input class="mt4" type="submit" name="submit" value="Выдать">
</form>';






echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>