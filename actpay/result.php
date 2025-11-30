<?
include_once 'config.php';
include '../system/config.php';
include '../system/function.php';
include '../system/header.php';

    
if (isset($_POST['id_shop']) && is_numeric($_POST['id_shop']) && isset($_POST['id_bill']) && is_numeric($_POST['id_bill']) && isset($_POST['summa']) && is_numeric($_POST['summa']) && isset($_POST['hash'])){
$sql=mysql_query("SELECT * FROM `worldkassa` WHERE `id_bill` = '".$_POST['id_bill']."'");
if (mysql_num_rows($sql)>0){
$data=mysql_fetch_assoc($sql);
if ($_POST['summa']<$data['summa']){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Сумма не совпадает!</font>';
exit();
}elseif($_POST['hash']!=md5($hash.$id_shop.$_POST['id_bill'].$_POST['summa'])){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Хеш не совпал!</font>';
exit();
}else{

foreach($cena_gold as $gold=>$summa){
if ($summa==$data['summa']){

$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$data['id_user']."'"));
$sql_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1' "));
$premium = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium` WHERE `user` = '".$user['id']."' "));
$premium_musor = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium_musor` WHERE `user` = '".$user['id']."' "));
$promotions = mysql_fetch_assoc(mysql_query("SELECT * FROM `promotions` WHERE `id` = '1' "));
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



/*
if ($user['id'] != 12){
header('Location: /');
$_SESSION['err'] = '<font color=red>Временная ошибка!</font>';
exit();
}
*/








$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angell_ = ($ang__['angel']/4);
}
$pay_text = '<font color="green"><b>Таинственный сейф</b> получено <img src="/images/angel48.png" alt="$" width="24" height="24"> бизнес-ангелов <font color="black">'.n_f($angell_*2).'</font></font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `safe` SET `pay` = '1' WHERE `user` = '".$user['id']."' limit 1");
mysql_query("UPDATE `users` SET `angel` = '".($user['angel']+$angell_*2)."' WHERE `id` = '".$user['id']."' limit 1");









}
}













var_dump( mail( 'lovekent5246@gmail.com', 'MARS-GAMES.RU', 'Покупка пакета ангелов.
Логин: '.$user['login'].'
ID: '.$user['id'].'
Сумма: '.$data['summa'].' руб
Время: '.vremja(time()).' '));
 
mysql_query("UPDATE `worldkassa` SET `time_oplata` = '".time()."' WHERE `id` = '".$data['id']."'");
}
}
}
?>