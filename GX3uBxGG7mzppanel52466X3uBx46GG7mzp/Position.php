<?php
$title = 'Должность';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';





$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));

if($id == 1){
$_SESSION['err']='Ошибка! Сообщение Администратору уже отправлено!';

$tex = 'Здравствуйте! '.nick($user['id']).' хотел Вас понизить в звании, но мы этого не позволили :) ';
$text = strong($tex);

$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$id."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$id."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$id."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$id."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$id."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$id."', `time` = '".time()."', `readlen` = '0'");

header ('Location: /');
exit();
}

if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}

if($id == $user['id']){
$_SESSION['err']='Повышение самого себя запрещается!';
header ('Location: /');
exit();
}





echo ' '.nick($id).' / Должность ';



if(isset($_POST['submit'])){
$level = strong($_POST['level']);

if($user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}

if($level != 3 and $ank['level'] == 3){
mysql_query("UPDATE `users` SET `level`='".mysql_real_escape_string($level)."', `colors`='' WHERE `id` = '".mysql_real_escape_string($id)."' limit 1");
}else{
if($level != 3){
mysql_query("UPDATE `users` SET `level`='".mysql_real_escape_string($level)."' WHERE `id` = '".mysql_real_escape_string($id)."' limit 1");
}else{
mysql_query("UPDATE `users` SET `level`='".mysql_real_escape_string($level)."', `colors`='red' WHERE `id` = '".mysql_real_escape_string($id)."' limit 1");
}

}

header ('Location: '.$HOME.'igrok_'.$id.'/');
exit();
}



echo '<hr><form action="" method="POST">';

if($user['level'] == 2){
echo '<select name="level" style="width: 95%;">
<option value="0">Игрок</option>
<option value="1">Модератор</option>
</select>';
}

if($user['level'] == 3){
echo '<select name="level" style="width: 95%;">
<option value="0">Игрок</option>
<option value="1">Модератор</option>
<option value="2">Администратор</option>
<option value="3">Разработчик</option>
</select>';
}

echo '<input class="mt4" type="submit" name="submit" value="Назначить"></form>';




echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'igrok_'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');
?>