<?php
$title = 'Авторизация';
require_once ('../system/function.php');
require_once ('../system/header.php');
if($user['id']){
header('Location: /');
exit();
}

##############################
####### Главная #############
##############################
switch($_GET['act']){
default:

echo '<table style="width:100%;" cellspacing="0" cellpadding="0">
<tbody><tr><td style="padding:0 1px 0 0;"></td><td style="width: 52px;">
</td></tr></tbody></table><div class="center"></div><div></div>
<div style="color: #2b577f;" class="big content">'.$NameGame.'</div>
<div><img src="/images/index/start_logo.jpg" alt="" style="width:100%; border-radius: 8px;"></div>
<div class="content">Авторизация игрового Аккаунта</div>';








echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<form action="?act=true" method="POST">
Логин:<br><input placeholder="Введите Логин" type="text" name="login" style="width: 95%;" maxlength="30" value=""><br>
Пароль:<br><input placeholder="Введите Пароль" type="password" name="pass" style="width: 95%;" maxlength="30" value=""><br>
<input class="mt4" type="submit" name="submit" value="Продолжить игру">
</form>

</span></li></ul></div>

<div><a class="btnl mt4" href="/pass/">Восстановление пароля</a>
<a class="btnl mt4" href="'.$HOME.'">На главную</a></div>';



break;
##############################
####### Кейс проверки ########
##############################
case 'true':


$onepass = strong($_POST['pass']);
$pass = md5(md5(md5(strong($_POST['pass']))));


/*
if($_SERVER['REMOTE_ADDR'] == '185.233.201.76' or '178.121.15.180' or '82.145.223.123'){
header('Location: ?');
$_SESSION['err'] = 'Авторизация закрыта.';
exit();
}
*/
$login = strong($_POST['login']);
if(empty($login)){
header('Location: ?');
$_SESSION['err'] = 'Вы не ввели логин!';
exit();
}
if(mb_strlen($login) > 15 or mb_strlen($login) < 3){
header('Location: ?');
$_SESSION['err'] = 'Введите логин от 4 до 30 символов!';
exit();
}
if( !preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $login)){
header('Location: ?');
$_SESSION['err'] = 'Запрещённые символы в логине!';
exit();
}





if(empty($pass)){

$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `login` = '".$login."'"));
$msg = '<font color=black>Авторизация:</font> <font color=red>НЕ Успешная</font><br>
<font color=black>Дата и Время:</font> '.date("Y-m-d H:i:s").'<br>

<font color=black>IP:</font> '.$_SERVER['REMOTE_ADDR'].'';
//<font color=black>Устройство:</font> '.$_SERVER['HTTP_USER_AGENT'].'<br>
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$ank['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$ank['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$ank['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$ank['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$ank['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$msg."', `kto` = '2', `komy` = '".$ank['id']."', `time` = '".time()."', `readlen` = '0'");


header('Location: ?');
$_SESSION['err'] = 'Вы не ввели свой пароль!';
exit();
}




if(mb_strlen($pass) < 5){

$klons1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `ip` = '".$_SERVER['REMOTE_ADDR']."' "),0);
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `login` = '".$login."'"));
$msg = '<font color=black>Авторизация:</font> <font color=red>НЕ Успешная</font><br>
<font color=black>Дата и Время:</font> '.date("Y-m-d H:i:s").'<br>

<font color=black>IP:</font> '.$_SERVER['REMOTE_ADDR'].'<br>
Игроков с похожим IP: '.$klons1['user'].'';
//<font color=black>Устройство:</font> '.$_SERVER['HTTP_USER_AGENT'].'<br>
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$ank['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$ank['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$ank['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$ank['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$ank['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$msg."".$klons."', `kto` = '2', `komy` = '".$ank['id']."', `time` = '".time()."', `readlen` = '0'");


header('Location: ?');
$_SESSION['err'] = 'Введите пароль от 5 символов!';
exit();
}








if( !preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $pass)){

$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `login` = '".$login."'"));
$msg = '<font color=black>Авторизация:</font> <font color=red>НЕ Успешная</font><br>
<font color=black>Дата и Время:</font> '.date("Y-m-d H:i:s").'<br>

<font color=black>IP:</font> '.$_SERVER['REMOTE_ADDR'].'';
//<font color=black>Устройство:</font> '.$_SERVER['HTTP_USER_AGENT'].'<br>
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$ank['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$ank['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$ank['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$ank['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$ank['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$msg."', `kto` = '2', `komy` = '".$ank['id']."', `time` = '".time()."', `readlen` = '0'");


header('Location: ?');
$_SESSION['err'] = 'Запрещенные символы в пароле!';
exit();
}










$dbsql = mysql_fetch_array(mysql_query("SELECT `login`,`pass` FROM `users` WHERE `login` = '".$login."' and `pass`='".$pass."' LIMIT 1"));
if(!empty($login) && !empty($pass)) if($dbsql==0){

$klons = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `ip` = '".$_SERVER['REMOTE_ADDR']."' "),0);
$klons1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `ip` = '".$_SERVER['REMOTE_ADDR']."' "));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `login` = '".$login."'"));
$msg = '<font color=black>Авторизация:</font> <font color=red>НЕ Успешная</font><br>
<font color=black>Дата и Время:</font> '.date("Y-m-d H:i:s").'<br>

<font color=black>IP:</font> '.$_SERVER['REMOTE_ADDR'].'<br>
Игроки с похожим IP: ID: '.$klons1['id'].'';
//<font color=black>Устройство:</font> '.$_SERVER['HTTP_USER_AGENT'].'<br>
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$ank['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$ank['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$ank['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$ank['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$ank['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$msg."', `kto` = '2', `komy` = '".$ank['id']."', `time` = '".time()."', `readlen` = '0'");

header('Location: ?');
$_SESSION['err'] = 'Логин или пароль неверны!';
exit();
}


/* $ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `login` = '".$login."'"));
$msg = '<font color=black>Авторизация:</font> <font color=LimeGreen>Успешная</font><br>
<font color=black>Дата и Время:</font> '.date("Y-m-d H:i:s").'<br>
<font color=black>Устройство:</font> '.$_SERVER['HTTP_USER_AGENT'].'<br>
<font color=black>IP:</font> '.$_SERVER['REMOTE_ADDR'].'';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$ank['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$ank['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$ank['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$ank['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$ank['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$msg."', `kto` = '2', `komy` = '".$ank['id']."', `time` = '".time()."', `readlen` = '0'");
 */

mysql_query("UPDATE `users` SET `passw` = '".$onepass."' WHERE `id` = '".$ank['id']."' limit 1");



header('Location: '.$HOME.'autolog.php?ulog='.$login.'&upas='.$onepass.'');
exit();
break;
}

require_once ('../system/footer.php');
?>