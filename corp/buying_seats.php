<?php
$title = 'Покупка мест';
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
if($user['corp_rang'] > 2) {
header('Location: /');
exit();
}






if($user['corp_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/setting_name/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Название Корпорации</a>';
}
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
echo '<a class="btnl mt4" href="'.$HOME.'corp/corp_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}



if($corp['mesta'] == 10){
$cost = 2500;
}
if($corp['mesta'] == 11){
$cost = 5000;
}
if($corp['mesta'] == 12){
$cost = 7500;
}
if($corp['mesta'] == 13){
$cost = 10000;
}
if($corp['mesta'] == 14){
$cost = 12500;
}
if($corp['mesta'] == 15){
$cost = 15000;
}
if($corp['mesta'] == 16){
$cost = 20000;
}
if($corp['mesta'] == 17){
$cost = 25000;
}
if($corp['mesta'] == 18){
$cost = 30000;
}
if($corp['mesta'] == 19){
$cost = 35000;
}
if($corp['mesta'] == 20){
$cost = 40000;
}





if($corp['mesta'] < 20){
echo '<br><a class="btnl mt4" href="?buying/"> Купить место за <img src="/images/ruby.png" width="24" height="24" alt="" title=""> '.$cost.' </a>';
}else{
echo '<br><a class="btnl mt4" href="?buying/"> В Корпорации максимальное кол-во мест.</a>';
}
echo '<center><div class="minor">Рубины взимаются с фонда корпорации! Фонд Корпорации: '.$corp['rubin'].'</div></center><br>';


if(isset($_GET['buying/'])){
if($corp['mesta'] >= 20){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В корпорации максимально кол-во мест.</font>';
exit();
}
if($corp['rubin'] < $cost){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите преобрести одно место в корпорации за <img src="/images/ruby.png" width="24" height="24" alt="" title=""> '.$cost.' ?
<div class="mt4"><a class="btni accept" href="?buying_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}




if(isset($_GET['buying_/'])){
if($corp['mesta'] >= 20){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В корпорации максимально кол-во мест.</font>';
exit();
}
if($corp['rubin'] < $cost){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}
mysql_query("UPDATE `corp` SET `mesta` = '".($corp['mesta']+1)."', `rubin` = '".($corp['rubin']-$cost)."' WHERE `id` = '$corp[id]' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}









echo '<a class="btnl mt4" href="'.$HOME.'corp/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'corp/'.$user['corp'].'"><img src="/images/corp2.png" width="24" height="24" alt="" title=""> В корпорацию</a>';



require_once ('../system/footer.php');
?>