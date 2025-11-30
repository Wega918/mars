<?php
$title = 'Настройки приглашений';
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
echo '<a class="btnl mt4" href="'.$HOME.'corp/setting_name/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Название Корпорации</a>';
}
if($user['corp_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/corp_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Настройки приглашений</a>';
}









echo '<div class="bordered">
<center><form action="" method="POST">
В корпорацию приглашать могут:<br/>
<select name="invitation" style="width: 95%;">
<option value="0">Только Владелец и Заместитель</option>
<option value="1">Владелец, Заместитель и Акционеры</option>
<option value="2">Владелец, Заместитель, Акционеры и Директор</option>
<option value="3">Владелец, Заместитель, Акционеры, Директор и Менеджер</option>
<option value="4">Все</option>
</select><br/>

<input class="mt4" type="submit" name="submit" value="Сохранить">
</form></center>
</div>';




if(isset($_REQUEST['submit'])){
$invitation = strong($_POST['invitation']);

mysql_query("UPDATE `corp` SET `invitation` = '".$invitation."' WHERE `id` = '".$user['corp']."' limit 1");

header('Location: ?');
$_SESSION['err'] = 'Сохранено!!';
exit();
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