<?php
$title = 'Название Корпорации';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['corp'] == 0) {
header('Location: /');
exit();
}
if($user['corp_rang'] > 1) {
header('Location: /');
exit();
}






if($user['corp_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/corp_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Название Корпорации</a>';
}















if (isset($_POST['submit'],$_POST['name'])){
$name = strong($_POST['name']);
$sql = mysql_query("SELECT COUNT(`id`) FROM `corp` WHERE `name` = '".$name."'"); 

if($corp['rubin'] < 500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}

if(mysql_result($sql, 0)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Такое название уже существует!</font>';
exit();
}

if(mysql_result(mysql_query("SELECT COUNT(*)  FROM `corp` WHERE `name` = ".$name.""),0) == true){
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

mysql_query("UPDATE `corp` SET `name` = '". $name ."', `rubin` = '".($corp['rubin']-500)."' WHERE `id` = '". $corp['id'] ."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Название Корпорации изменено!';
exit();
}







echo '<div class="bordered">
<div class="mt4 center">
Внимание! Смена названия Корпорации стоит <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">500</span>
</span></div>

<center><form action="" method="POST">
Название:<br> <input type="text" style="width: 95%;" name="name" value="'.$corp['name'].'" maxlength="30" > 
<input class="mt4" type="submit" name="submit" value="Сменить название">
</form></center>

</div>';



echo '<center><div class="minor">Рубины взимаются с фонда корпорации! Фонд Корпорации: '.$corp['rubin'].'</div></center>';










if($user['corp_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/invitation_settings/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Настройки приглашений</a>';
}
if($user['corp_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/space_gateway/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Космический шлюз</a>';
}
if($user['corp_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/building/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Постройки Корпорации</a>';
}
if($user['corp_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/buying_seats/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}
echo '<a class="btnl mt4" href="'.$HOME.'corp/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'corp/'.$user['corp'].'"><img src="/images/corp2.png" width="24" height="24" alt="" title=""> В корпорацию</a>';


require_once ('../system/footer.php');
?>