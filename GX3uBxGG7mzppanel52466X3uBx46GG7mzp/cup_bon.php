<?php
$title = 'ViP награда';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';





if(isset($_POST['submit'])){
$id = strong($_POST['id']);

if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
if(empty($id)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните поле "id".</font>';
exit();
}

$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));
$corp = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$user['corp']."'"));
$soyz = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$user['soyz']."'"));
$sql_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1' "));
$promotions = mysql_fetch_assoc(mysql_query("SELECT * FROM `promotions` WHERE `id`  = '1' "));

$premium = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium` WHERE `user` = '".$user['id']."' "));
$premium_musor = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium_musor` WHERE `user` = '".$user['id']."' "));

if($premium['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($premium_musor['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($user['vip_pay'] == 1){
$_SESSION['err'] = '<font color=red>Ошибка! Уже включено.</font>';
header('Location: /');
exit();
}


$card_1 = ceil(15*$sql_['col_mis_turnir']);
$card_2 = ceil(15*$sql_['col_mis_turnir']);
$chest_col = ceil(15*$sql_['col_mis_turnir']);
$rand = rand(1,20);

mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$card_1."' ");
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$card_2."' ");

$chest = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $chest_col");
$che = mysql_fetch_array ($chest);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '6' ");
} while ($che = mysql_fetch_array ($chest));

mysql_query('UPDATE `users` SET `gradient` = "1", `vip_nagrada` = "1", `vip_pay` = "1" WHERE `id` = '.$user['id'].'');






// Преобразуем в строки для BCMath
$user['angel'] = toBC($user['angel']);
$sql_col_mis_turnir = toBC($sql['col_mis_turnir']);

// angel_ = (user['angel'] * 50 / 100) * col_mis_turnir
$tmp = bcmul($user['angel'], '50', 30);
$tmp = bcdiv($tmp, '100', 30);
$angel_ = bcmul($tmp, $sql_col_mis_turnir, 30);

// Новое значение для user['angel']
$new_user_angel = bcadd($user['angel'], $angel_, 30);

// Обновляем пользователя
mysql_query('UPDATE `users` SET `angel` = "'.$new_user_angel.'" WHERE `id` = '.$user['id']);

// Аналогично для корпорации
$corp['angel'] = toBC($corp['angel']);
$corp['turnir_angel_1'] = toBC($corp['turnir_angel_1']);

$new_corp_angel = bcadd($corp['angel'], $angel_, 30);
$new_corp_turnir_angel_1 = bcadd($corp['turnir_angel_1'], $angel_, 30);

mysql_query("UPDATE `corp` SET `angel` = '".$new_corp_angel."', `turnir_angel_1` = '".$new_corp_turnir_angel_1."' WHERE `id` = '".$corp['id']."' LIMIT 1");



// Теперь для musor_proc
$user['musor_proc'] = toBC($user['musor_proc']);

$tmp_musor = bcmul($user['musor_proc'], '50', 30);
$tmp_musor = bcdiv($tmp_musor, '100', 30);
$musor_ = bcmul($tmp_musor, $sql_col_mis_turnir, 30);

$new_user_musor_proc = bcadd($user['musor_proc'], $musor_, 30);

mysql_query('UPDATE `users` SET `musor_proc` = "'.$new_user_musor_proc.'" WHERE `id` = '.$user['id']);

$soyz['musor_proc'] = toBC($soyz['musor_proc']);
$soyz['turnir_musor_1'] = toBC($soyz['turnir_musor_1']);

$new_soyz_musor_proc = bcadd($soyz['musor_proc'], $musor_, 30);
$new_soyz_turnir_musor_1 = bcadd($soyz['turnir_musor_1'], $musor_, 30);

mysql_query("UPDATE `soyz` SET `musor_proc` = '".$new_soyz_musor_proc."', `turnir_musor_1` = '".$new_soyz_turnir_musor_1."' WHERE `id` = '".$soyz['id']."' LIMIT 1");


$pay_text = '<b>ViP награда недели</b> 
получена карта х'.$card_1.' <font color="black" size="3"> | </font> 
получена карта х'.$card_2.' <font color="black" size="3"> | </font>
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($angel_).'</font><font color="black" size="3"> | </font>
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($musor_).'%</font></font><font color="black" size="3"> | </font>
<img width="24" height="24" src="/chests/chests/6.png"> '.$chest_col.'шт.
 ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");




$_SESSION['err'] = 'Начисление игроку '.nick($user['id']).' прошло успешно.';
header ('Location: ?');
exit();
}



echo '<br><form action="" method="POST">
<input placeholder="Id игрока" type="number" name="id" style="width: 95%;" maxlength="30" value=""><br>
<input class="mt4" type="submit" name="submit" value="Выдать">
</form>';






echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>