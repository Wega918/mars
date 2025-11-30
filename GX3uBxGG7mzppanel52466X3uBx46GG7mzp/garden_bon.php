<?php
$title = 'Робот-помощник';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';





if(isset($_POST['submit'])){
$time = strong($_POST['time']);
$id = strong($_POST['id']);
$tip = strong($_POST['tip']);



if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
if(empty($id)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните поле "id".</font>';
exit();
}
if(empty($time)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните поле "time".</font>';
exit();
}
if(empty($tip)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните поле "tip".</font>';
exit();
}

$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));
$bot = mysql_fetch_assoc(mysql_query("SELECT * FROM `bot` WHERE `user` = '".$id."'"));


if($bot and $bot['bot']!=$tip) {
$_SESSION['err'] = '<font color=red>У игрока уже активирован другой тип робота-помощника.<br>
Активация разных ботов одновременно запрещена.</font>';
exit();
}


if(!$bot) {
mysql_query("INSERT INTO `bot` SET `bot` = '".$tip."', `time` = '".(time()+($time*3600))."', `user` = '".$user['id']."' ");
}else{
mysql_query('UPDATE `bot` SET `time` = "'.($bot['time']+($time*3600)).'" WHERE `id` = '.$bot['id'].'');
}


$pay_text = '<b>Робот-помощник</b> активирован на '.$time.' ч.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

$_SESSION['err'] = 'Начисление игроку '.nick($user['id']).' прошло успешно.';
header ('Location: ?');
exit();
}



echo '<br><form action="" method="POST">
<select name="tip" style="width: 97%;">
<option value="1">Попрошайка</option>
<option value="2">Веселый</option>
<option value="3">Рембо</option>
</select><br>
<input placeholder="Id игрока" type="number" name="id" style="width: 95%;" maxlength="30" value=""><br>
<input placeholder="Время в (ч)" type="number" name="time" style="width: 95%;" maxlength="30" value=""><br>
<input class="mt4" type="submit" name="submit" value="Выдать">
</form>';






echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>