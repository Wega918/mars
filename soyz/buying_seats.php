<?php
$title = 'Покупка мест';
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
if($user['soyz_rang'] > 2) {
header('Location: /');
exit();
}






if($user['soyz_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/setting_name/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Название Союза</a>';
}
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
echo '<a class="btnl mt4" href="'.$HOME.'soyz/soyz_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}



if($soyz['mesta'] == 10){
$cost = 2500;
}
if($soyz['mesta'] == 11){
$cost = 5000;
}
if($soyz['mesta'] == 12){
$cost = 7500;
}
if($soyz['mesta'] == 13){
$cost = 10000;
}
if($soyz['mesta'] == 14){
$cost = 12500;
}
if($soyz['mesta'] == 15){
$cost = 15000;
}
if($soyz['mesta'] == 16){
$cost = 20000;
}
if($soyz['mesta'] == 17){
$cost = 25000;
}
if($soyz['mesta'] == 18){
$cost = 30000;
}
if($soyz['mesta'] == 19){
$cost = 35000;
}
if($soyz['mesta'] == 20){
$cost = 40000;
}





if($soyz['mesta'] < 20){
echo '<br><a class="btnl mt4" href="?buying/"> Купить место за <img src="/images/ruby.png" width="24" height="24" alt="" title=""> '.$cost.' </a>';
}else{
echo '<br><a class="btnl mt4" href="?buying/"> В Союзе максимальное кол-во мест.</a>';
}
echo '<center><div class="minor">Рубины взимаются с фонда Союза! Фонд Союза: '.$soyz['rubin'].'</div></center><br>';


if(isset($_GET['buying/'])){
if($soyz['mesta'] >= 20){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В Союзе максимально кол-во мест.</font>';
exit();
}
if($soyz['rubin'] < $cost){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите преобрести одно место в Союзе за <img src="/images/ruby.png" width="24" height="24" alt="" title=""> '.$cost.' ?
<div class="mt4"><a class="btni accept" href="?buying_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}




if(isset($_GET['buying_/'])){
if($soyz['mesta'] >= 20){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В Союза максимально кол-во мест.</font>';
exit();
}
if($soyz['rubin'] < $cost){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}
mysql_query("UPDATE `soyz` SET `mesta` = '".($soyz['mesta']+1)."', `rubin` = '".($soyz['rubin']-$cost)."' WHERE `id` = '$soyz[id]' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}









echo '<a class="btnl mt4" href="'.$HOME.'soyz/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> Вернуться</a>';



require_once ('../system/footer.php');
?>