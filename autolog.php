<?php
require_once ('system/function.php');
require_once ('system/header.php');
if($user['id']){
header('Location: /');
exit();
}




if (empty($_GET['ulog']) and empty($_GET['upas'])){
$login = strong($_POST['login']);//фильтрируем
$pass = md5(md5(md5(strong($_POST['pass'])))); //фильтрируем
} else {
$login = strong($_GET['ulog']);
$pass = md5(md5(md5(strong($_GET['upas']))));
}

$sql = mysql_query("SELECT `login` FROM `users` WHERE `login` = '".$login."' and `pass` = '".$pass."' LIMIT 1");
$dbsql = mysql_fetch_array(mysql_query("SELECT `login`,`pass` FROM `users` WHERE `login` = '".$login."' and `pass`='".$pass."' LIMIT 1"));

if(mysql_num_rows($sql)){
setcookie('uslog', $dbsql['login'], time()+86400*31, '/');
setcookie('uspass', $pass, time()+86400*31, '/');
header('Location: '.$HOME.'');
$_SESSION['ok'] = 'Добро пожаловать на Марс!';
exit();
}else{




if(empty($login)) {
header('Location: /login/');
$_SESSION['err'] = 'Вы не ввели логин!';
exit();
}
if(mb_strlen($login) > 60 or mb_strlen($login) < 3){
header('Location: /login/');
$_SESSION['err'] = 'Введите логин от 3 до 30 символов!';
exit();
}

if( !preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $login)){
header('Location: /login/');
$_SESSION['err'] = 'Ошибка в логине!';
exit();
}
if(empty($pass)) {
header('Location: /login/');
$_SESSION['err'] = 'Вы не ввели свой пароль!';
exit();
}
if(mb_strlen($pass) < 5) {
header('Location: /login/');
$_SESSION['err'] = 'Введите пароль от 5 символов!';
exit();
}
if (!preg_match('|^[a-zа-я0-9\-]+$|i', $pass)) {
header('Location: /login/');
$_SESSION['err'] = 'Ошибка в логине!';
exit();
}
if(!empty($login) && !empty($pass)) if($dbsql==0) {
header('Location: /login/');
$_SESSION['err'] = 'Такого пользователя не существует!';
exit();
}

}

?>