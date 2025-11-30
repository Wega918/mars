<?php
$title = 'Постройки Союза';
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
echo '<a class="btnl mt4" href="'.$HOME.'soyz/soyz_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Постройки Союза</a>';
}










if($promotions['promotion_8'] == 1){
echo '<div class="content"><div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: Постройки</li>
<li class="center">Цены на улучшение Построек ниже на '.$promotions['act_8'].'%.</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_8'] - time()).'</span></div>
</div></div></div>';
}






if($soyz['building'] == 0) {
$cena = 10;
}
if($promotions['promotion_8'] == 1){
if($soyz['building'] == 1) {
$cena1 = 30;
$cena = $cena1 - ($cena1 * $promotions['act_8'] / 100);
}
if($soyz['building'] >= 2) {
$cena1 = $soyz['building'] * 30 * $soyz['building'];
$cena = ($cena1) - ($cena1 * $promotions['act_8'] / 100);
}
}else{
if($soyz['building'] == 1) {
$cena = 30;
}
if($soyz['building'] >= 2) {
$cena = $soyz['building'] * 30 * $soyz['building'];
}
}




echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<span class="count_room">'.$soyz['building'].'</span><img src="/images/biznes/room_1.jpg" alt="" width="64" height="64" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span> '.$title.' </span></div>';
echo '<span><font size=2 color=black>Бонус:</font> <font size=2 > '.$soyz['building'].'% к верности.</font></span><br>';
echo '<font size=2 color=black>Действие:</font> <font size=2 > Повышает награду верности всех членов Союза.</font><br>';
echo '<font size=2 color=black>Стоимость:</font> <img src="/images/ruby.png" width="20" height="20"><font color=red size=2>'.n_f($cena).'</font>';
echo '<br></div>';

echo '<center><a class="btni" style="min-width:180px;margin:4px;" href="?ok/"><span><span>Повысить на 1% за <img src="/images/ruby.png" width="24" height="24"><font color=red>'.n_f($cena).'</font></span></span></a></center>';


if(isset($_GET['ok/'])){
$_SESSION['err'] = 'Вы уверены?
<div class="mt4"><a class="btni accept" href="?app/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['app/'])){
if($user['soyz_rang'] > 2){
header('Location: ?');
exit();
}
if($soyz['rubin'] < $cena){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
mysql_query("UPDATE `soyz` SET `rubin` = '".($soyz['rubin']-$cena)."', `building` = '".($soyz['building']+1)."' WHERE `id` = '$soyz[id]' LIMIT 1");
header('Location: ?');
exit();
}







if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/buying_seats/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}
echo '<a class="btnl mt4" href="'.$HOME.'soyz/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'/"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>