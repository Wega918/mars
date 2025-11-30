<?php

if(!$_GET['code']){
exit('error_code');
}

$token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id=6638054&display=page&redirect_uri=http://bigmars.ru/vkauth/&client_secret=73PflkKtSLEYkfIOgA7Q&code='.$_GET['code'].''), true);
if(!$token){
exit('error token');
}

$data = json_decode(file_get_contents('https://api.vk.com/method/users.get?user_id='.$token['user_id'].'&access_token='.$token['access_token'].'&fields=last_name,first_name,sex&version=5.52'), true);
if(!$data){
exit('error data');
}

/*
last_name = Имя
first_name = Фамиллия
sex = пол (0-неизвестно, 1-мужской, 2-женский)
Bdate = Дата рождения
UID = ID
*/

$data = $data['response'][0];

$last_name = $data['last_name'];
$first_name = $data['first_name'];
$sex = $data['sex'];
$UID = $token['user_id'];
$login = 'Гость1';
$pass = md5(md5(md5($UID)));



$us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `pass` = '".$pass."' "));
if(!$us){
mysql_query("INSERT INTO `users` SET `vkauth` = '1', `UID` = '".$UID."', `last_name` = '".$last_name."', `first_name` = '".$first_name."', `login` = '".$login."', `pass` = '".$pass."', `sex` = '".($sex-1)."', `datareg` = '".time()."', `last_update` = '".time()."', `rubin` = '10000', `money` = '1', `biznes` = '1', `level` = '0' ");
$uid = mysql_insert_id();
mysql_query("INSERT INTO `user_biznes_1` SET `name` = 'Космопорт', `images` = '1', `dohod` = '1',`cena` = '1', `biznes_dohod` = '1', `user` = '".$uid."', `id_room` = '1' ");

}else{
if($last_name != $us['last_name']){mysql_query('UPDATE `users` SET `last_name` = '.$last_name.' WHERE `id` = '.$us['id'].'');}
if($first_name != $us['first_name']){mysql_query('UPDATE `users` SET `first_name` = '.$first_name.' WHERE `id` = '.$us['id'].'');}

}









?>