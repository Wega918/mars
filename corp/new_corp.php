<?php
$title = 'Новая Корпорация';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['corp'] > 0) {
header('Location: '.$HOME.'corp/'.$user['corp'].'');
exit();
}






if (isset($_POST['submit'],$_POST['name'])){
$name = strong($_POST['name']);
$sql = mysql_query("SELECT COUNT(`id`) FROM `corp` WHERE `name` = '".$name."'"); 


if($promotions['promotion_6'] == 1){
$cena = 100000-(100000*$promotions['act_6']/100);
}else{
$cena = 100000;
}

if($user['rubin'] < $cena){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Нехватает рубинов!</font>';
exit();
}

if(mysql_result($sql, 0)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Корпорация с таким названием уже существует!</font>';
exit();
}

if(mysql_result(mysql_query("SELECT COUNT(*)  FROM `corp` WHERE `name` = ".$name.""),0) == true){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Корпорация с таким названием уже существует!</font>';
exit();
}

if(mb_strlen($name) > 30 or mb_strlen($name) < 3){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите название корпорации от 3 до 20 символов!</font>';
exit();
}

if( !preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $name)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Запрещённые символы!</font>';
exit();
}


$qqq = toBC($user['angel']);


mysql_query("INSERT INTO `corp` SET `name` = '".$name."', `images` = '1',`rubin` = '0',`time` = '".time()."', `angel` = '".$qqq."'   ");

$id_corp = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `corp` WHERE `name` = '$name'"));

mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cena)."',
`corp` = '".($user['corp']=$id_corp['id'])."',
`corp_rang` = '1'
WHERE `id` = '$user[id]' LIMIT 1");
if(!$time_day){
mysql_query("INSERT INTO `time_day` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}else{
mysql_query("UPDATE `time_day` SET SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' LIMIT 1");
}
if(!$musor_time){
mysql_query("INSERT INTO `musor_time` SET `user` = '".$user['id']."', `time` = '".(time()+7200)."' ");
}else{
mysql_query("UPDATE `musor_time` SET SET `user` = '".$user['id']."', `time` = '".(time()+7200)."' LIMIT 1");
}

if($application){
mysql_query('DELETE FROM `application` WHERE `user` = '.$user['id'].' ');
}

header('Location: '.$HOME.'corp/'.$id_corp['id'].'/');
$_SESSION['err'] = 'Теперь это Ваша Корпорация!';
exit();
}



if($promotions['promotion_6'] == 1){
$cena = 100000-(100000*$promotions['act_6']/100);
}else{
$cena = 100000;
}



echo '<div class="bordered">
<div class="mt4 center">
Внимание! Создание корпорации стоит <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cena.'</span>
</span></div>

<center><form action="" method="POST">
Название:<br> <input type="text" style="width: 95%;" name="name" value="" maxlength="30" > 
<input class="mt4" type="submit" name="submit" value="Создать">
</form></center>
</div>';





require_once ('../system/footer.php');
?>