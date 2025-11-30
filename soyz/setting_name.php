<?php
$title = 'Название Союза';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['soyz'] == 0) {
header('Location: /');
exit();
}
if($user['soyz_rang'] > 1) {
header('Location: /');
exit();
}






if($user['soyz_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/soyz_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Название Союза</a>';
}















if (isset($_POST['submit'],$_POST['name'])){
$name = strong($_POST['name']);
$sql = mysql_query("SELECT COUNT(`id`) FROM `soyz` WHERE `name` = '".$name."'"); 

if($soyz['rubin'] < 500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}

if(mysql_result($sql, 0)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Такое название уже существует!</font>';
exit();
}

if(mysql_result(mysql_query("SELECT COUNT(*)  FROM `soyz` WHERE `name` = ".$name.""),0) == true){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Такое название уже существует!</font>';
exit();
}

if(mb_strlen($name) > 30 or mb_strlen($name) < 3){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Введите название от 3 до 30 символов!</font>';
exit();
}

if( !preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $name)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Запрещённые символы!</font>';
exit();
}

mysql_query("UPDATE `soyz` SET `name` = '". $name ."', `rubin` = '".($soyz['rubin']-500)."' WHERE `id` = '". $soyz['id'] ."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Название Союза изменено!';
exit();
}







echo '<div class="bordered">
<div class="mt4 center">
Внимание! Смена названия Союза стоит <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">500</span>
</span></div>

<center><form action="" method="POST">
Название:<br> <input type="text" style="width: 95%;" name="name" value="'.$soyz['name'].'" maxlength="30" > 
<input class="mt4" type="submit" name="submit" value="Сменить название">
</form></center>

</div>';



echo '<center><div class="minor">Рубины взимаются с фонда Союза! Фонд Союза: '.$soyz['rubin'].'</div></center>';










if($user['soyz_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/invitation_settings/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Настройки приглашений</a>';
}
if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/space_gateway/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Космический шлюз</a>';
}
if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/building/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Постройки Союза</a>';
}
if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/buying_seats/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}
echo '<a class="btnl mt4" href="'.$HOME.'soyz/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> Вернуться</a>';


require_once ('../system/footer.php');
?>