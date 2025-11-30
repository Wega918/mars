<?php
$title = 'Общий Игнор';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';





$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."' "));
$Ignore = mysql_fetch_array(mysql_query('SELECT * FROM `Ignore` WHERE `user` = "'.$id.'"'));

if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}
if($id == 1){
$_SESSION['err']='Даже не думай';
header ('Location: /');
exit();
}
if($id == $user['id']){
$_SESSION['err']='Блокировка самого себя запрещается!';
header ('Location: /');
exit();
}



If($Ignore){





echo ' '.nick($id).' / Снять Игнор ';


if(isset($_POST['submit'])){
$komm = strong($_POST['komm']);
$time = strong($_POST['time']);
if($user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}
if(empty($komm)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Вы не ввели комментарий!</font>';
exit();
}


$tex = 'Здравствуйте! Ваш аккаунт был разблокирован игроком '.$user['login'].'. Комментарий: '.$komm.'. ';
$text = strong($tex);
mysql_query('DELETE FROM `Ignore` WHERE `user` = '.$id.' ');
mysql_query("UPDATE `users` SET `colors`='' WHERE `id` = '".$id."' limit 1");
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$id."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$id."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$id."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$id."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$id."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$id."', `time` = '".time()."', `readlen` = '0'");
mysql_query("INSERT INTO `narushenija` SET `user` = '".$id."', `text` = '".$komm."', `time` = '".time()."', `time_end` = '".(time() + $time)."', `kto` = '".$user['id']."' ");
$_SESSION['err']='Игрок '.nick($id).' розигнорин.';
header ('Location: '.$HOME.'igrok_'.$id.'/');
exit();
}



echo '<hr><form action="" method="POST">
Комментарий:<br> <input type="text" style="width: 95%;" name="komm" value="" maxlength="300" > 
<input class="mt4" type="submit" name="submit" value="Разблокировать">
</form>';







}else{









echo ' '.nick($id).' / Дать Игнор ';


if(isset($_POST['submit'])){
$prich = strong($_POST['prich']);
$time = strong($_POST['time']);
if($user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}
if(empty($prich)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Вы не ввели причину игнора!</font>';
exit();
}
$time_sett = ''.$time.'ч.';
$txt = '<font color=red>Заигнорин:</font> '.nick($id).'<br>
<font size=2>Причина: <b>'.$prich.'</b><br>
Заигнорин на: '.$time_sett.'<br>
Заигнорин до: '.vremja(time() + ($time*3600)).'</font>';
mysql_query("UPDATE `users` SET `colors`='D3D3D3' WHERE `id` = '".$id."' limit 1");
mysql_query("INSERT INTO `Ignore` SET `user` = '".$id."', `prich` = '".$prich."', `time` = '".time()."', `time_end` = '".(time() + ($time*3600))."', `kto` = '".$user['id']."' ");
mysql_query("INSERT INTO `narushenija` SET `user` = '".$id."', `text` = '".$prich."', `time` = '".time()."', `time_end` = '".(time() + ($time*3600))."', `kto` = '".$user['id']."' ");

$_SESSION['err']='Игрок '.nick($id).' заигнорин до '.vremja(time() + ($time*3600)).'.';
header ('Location: '.$HOME.'igrok_'.$id.'/');
exit();
}



echo '<hr><form action="" method="POST">
<input type="number" style="width: 80%;" value="1" name="time"></label> час.
Причина:<br> <input type="text" style="width: 95%;" name="prich" value="" maxlength="300" > 
<input class="mt4" type="submit" name="submit" value="Забанить">
</form>';








}






echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'igrok_'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';


require_once ('../system/footer.php');
?>