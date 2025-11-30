<?php
$title = 'Регистрация';
require_once ('system/function.php');
require_once ('system/header.php');
if($user['id']) {
header('Location: /');
exit();
}


$inv = mysql_fetch_assoc(mysql_query("SELECT id,login from `users` where `id` = '".abs(intval($_GET['inv']))."'"));
if(isset($_REQUEST['reg'])){


$mult = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `ip` = '".strong($_SERVER['REMOTE_ADDR'])."' "),0);
if($mult >= 1){
header('Location: '.$HOME.' ');
$_SESSION['err'] = '<FONT COLOR=RED>Нарушениме правил соглашения!<br> Пункт: 2.6 ЗАПРЕЩАЕТСЯ Создавать дополнительные аккаунты.</FONT>';
exit();
}


$login = strong($_POST['login']);
$pass = strong($_POST['pass']);
$sex = strong($_POST['sex']);
$email = strong($_POST['email']);
$ref = strong($_POST['ref']);

if(empty($login)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Поле "Логин" обязательно для ввода.</font>';
exit();
}

if (!preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $login)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Только русские или английские буквы, цифры!</font>';
exit();
}

if(mb_strlen($login) > 16 or mb_strlen($login) < 3){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите "Логин" от 4 до 16 символов!</font>';
exit();
}

if(mysql_result(mysql_query("SELECT COUNT(*)  FROM `users` WHERE `login` = ".$login.""),0) == true){ 
header('Location: ?');
$_SESSION['err'] = '<font color=red>Такой "Логин" уже существует!</font>';
exit();
}

$sql1 = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `login` = '".$login."'"); 
if(mysql_result($sql1, 0) > 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Такой "Логин" уже существует!</font>';
exit();
}

if(empty($pass)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Поле "Пароль" обязательно для ввода.</font>';
exit();
}

if (!preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $pass)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Пароль должен содердать только Русские или Английские буквы, цифры!</font>';
exit();
}

if(mb_strlen($pass) > 25 or mb_strlen($pass) < 5){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите "Пароль" от 5 до 25 символов!</font>';
exit();
}
if (!preg_match('/[0-9a-z_\-]+@[0-9a-z_\-^\.]+\.[a-z]{2,6}/i', $email)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Формат e-mail введён не верно!</font>';
exit();
}

$sqlemail = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `email` = '".$email."'"); 
if (mysql_result($sqlemail, 0) > 0) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>>Такой e-mail уже существует!</font>';
exit();
}





//-----Если всё нормально-----//
mysql_query("INSERT INTO `users` SET 
`login` = '".$login."',
`pass` = '".md5(md5(md5($pass)))."',
`sex` = '".$sex."',
`email` = '".$email."',
`datareg` = '".time()."',
`last_update` = '".time()."',
`rubin` = '100000',
`money` = '1',
`biznes` = '1',
`level` = '0' ");


//-----Вычесляем id-----//
$uid = mysql_insert_id();
mysql_query("INSERT INTO `user_biznes_1` SET `name` = 'Космопорт', `images` = '1', `dohod` = '1',`cena` = '1', `biznes_dohod` = '1', `user` = '".$uid."', `id_room` = '1' ");
mysql_query("UPDATE `users` SET `passw` = '".$pass."' WHERE `id` = '".$uid."' limit 1");



if($ref != 0){
$coins = 5000;
$ref_US = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$ref."'"));
mysql_query("INSERT INTO `ref` set `nak` = '".$ref_US['id']."', `id_us` = '".$uid."', `bon` = '0' ");
mysql_query('UPDATE `users` SET `rubin` = `rubin` + '.$coins.'  WHERE `id` = '.$uid.'');
mysql_query("UPDATE `users` SET `referals` = '".$ref_US['id']."' WHERE `id` = '".$uid."' LIMIT 1");
$text3 = 'Игрок '.$login.' зарегистрировался по вашей реф-ссылке!';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$ref."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$ref."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$ref."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$ref."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$ref."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text3."', `kto` = '2', `komy` = '".$ref."', `time` = '".time()."', `readlen` = '0'");
}


if(!empty($inv['id'])){
$coins = 5000;
mysql_query("INSERT INTO `ref` set `nak` = '".$inv['id']."', `id_us` = '".$uid."', `bon` = '0' ");
mysql_query('UPDATE `users` SET `rubin` = `rubin` + '.$coins.'  WHERE `id` = '.$uid.'');
mysql_query("UPDATE `users` SET `referals` = '".$inv['id']."' WHERE `id` = '".$uid."' LIMIT 1");
$text3 = 'Игрок '.$login.' зарегистрировался по вашей реф-ссылке!';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$inv['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$inv['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$inv['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$inv['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$inv['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text3."', `kto` = '2', `komy` = '".$inv['id']."', `time` = '".time()."', `readlen` = '0'");
}





header('Location: '.$HOME.'autolog.php?ulog='.$login.'&upas='.$pass.'');
$_SESSION['err'] = 'Добро пожаловать на Марс!';
exit();
}


echo '<table style="width:100%;" cellspacing="0" cellpadding="0"><tbody><tr><td style="padding:0 1px 0 0;"></td><td style="width: 52px;"></td></tr></tbody></table>
<div class="center"></div><div></div>
<div style="color: #2b577f;" class="big content">Онлайн игра Марс</div>
<div><img src="/images/index/start_logo.jpg" alt="" style="width:100%; border-radius: 8px;"></div>
<div class="content">Регистрация нового Аккаунта</div>';








if(isset($_GET['inv'])){
$inv = mysql_fetch_assoc(mysql_query("SELECT id,login from `users` where `id` = '".abs(intval($_GET['inv']))."'"));
if(!empty($inv['id'])){
echo '<div class="content">Вы регистрируйтесь по приглашению игрока <b>'.$inv['login'].'</b>
<br>Бонус за регистрацию <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> +5k рубинов!</div>';
}
}

$summ_users = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` > '0'"),0);



echo '<div class="bordered mt4"><center>
<font size=2 color=red>При регистрации вы получите <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 100 000 рубинов.</font><hr>
<form method="POST" action="">
Логин:<br><input placeholder="Введите Логин" type="text" name="login" style="width: 95%;" maxlength="30" value=""><br>
Пароль:<br><input placeholder="Введите Пароль" type="password" name="pass" style="width: 95%;" maxlength="100" value=""><br>
Пол<br><select style="width: 95%;" name="sex">
<option selected="selected" value="1">Мужской</option>
<option value="2">Женский</option>
</select><br>';
if(!isset($_GET['inv'])){
echo 'ID пригласившего: <font size=1 color=black>(От</font> <font size=1 color=red>1</font> <font size=1 color=black>/ до</font> <font size=1 color=red>'.$summ_users.'</font><font size=1 color=black>)</font><br><input placeholder="Поле не обьязательное" type="ref" name="ref" style="width: 95%;" maxlength="20" value=""><br>';
}
echo 'E-Mail:<br><input placeholder="Введите E-Mail" type="text" name="email" style="width: 95%;" maxlength="50" value=""><br>
<div class="minor mt4">E-mail необходим для восстановления пароля. Если Вы не укажете, или укажете неверно, то восстановление пароля будет невозможно.</div>
<input class="mt4" type="submit" name="reg" value="Зарегистрироваться"></form></div></center>
<a class="btnl mt4" href="'.$HOME.'">На главную</a></div>';



?>