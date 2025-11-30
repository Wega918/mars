<?php
$title = 'Бонус от Админа :)';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';





if(isset($_POST['submit'])){
$suma = strong($_POST['suma']);
$res = strong($_POST['res']);

if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
if(empty($suma)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните поле "Количество".</font>';
exit();
}


if($res == 0){
$viz0 = time()-172800;
$res0 = mysql_query("SELECT * FROM `users` WHERE `datareg` < '".$viz0."' ");
$r0 = mysql_fetch_array ($res0);
do {
$text = 'Здравствуйте! Вам Бонус: <img width="20" height="20" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> '.n_f($suma).'';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r0['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r0['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r0['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r0['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r0['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r0['id']."', `time` = '".time()."', `readlen` = '0'");
mysql_query("UPDATE `users` SET `money` = '".($r0['money'] + $suma)."' WHERE `id` = '".$r0['id']."' ");
} while ($r0 = mysql_fetch_array ($res0));
}


if($res == 1){
$viz1 = time()-(86400*365000);
$res1 = mysql_query("SELECT * FROM `users` WHERE `id` ");
$r1 = mysql_fetch_array ($res1);
do {
$text = 'Здравствуйте! Вам Бонус: <img width="20" height="20" alt="Рубины" src="/images/ruby.png" title="Рубины"> '.n_f($suma).'';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r1['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r1['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r1['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r1['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r1['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r1['id']."', `time` = '".time()."', `readlen` = '0'");
mysql_query("UPDATE `users` SET `rubin` = '".($r1['rubin'] + $suma)."' WHERE `id` = '".$r1['id']."' ");
} while ($r1 = mysql_fetch_array ($res1));
}


if($res == 2){
$viz2 = time()-(86400*3);
$res2 = mysql_query("SELECT * FROM `users` WHERE `viz` > '".$viz2."' ");
$r2 = mysql_fetch_array ($res2);
do {
$text = 'Здравствуйте! Вам Бонус: <img width="20" height="20" alt="Коллекции" src="/images/header/money_36.png" title="Коллекции"> '.n_f($suma).'%';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r2['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r2['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r2['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r2['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r2['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r2['id']."', `time` = '".time()."', `readlen` = '0'");
mysql_query("UPDATE `users` SET `musor_proc` = '".($r2['musor_proc'] + $suma)."' WHERE `id` = '".$r2['id']."' ");
} while ($r2 = mysql_fetch_array ($res2));
}


if($res == 3){
$viz3 = time()-604800;
$res3 = mysql_query("SELECT * FROM `users` WHERE `viz` > '".$viz3."' ");
$r3 = mysql_fetch_array ($res3);
do {
$text = 'Здравствуйте! Вам Бонус: <img width="20" height="20" alt="Камни" src="/images/colections/22.png" title="Камни"> '.n_f($suma).'';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r3['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r3['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r3['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r3['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r3['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r3['id']."', `time` = '".time()."', `readlen` = '0'");
mysql_query("UPDATE `users` SET `rock` = '".($r3['rock'] + $suma)."' WHERE `id` = '".$r3['id']."' ");
} while ($r3 = mysql_fetch_array ($res3));
}


if($res == 4){
$viz4 = time()-604800;
$res4 = mysql_query("SELECT * FROM `users` WHERE `viz` > '".$viz4."' ");
$r4 = mysql_fetch_array ($res4);
do {
$text = 'Здравствуйте! Вам Бонус: <img width="20" height="20" alt="Бизнес-Ангелы" src="/images/angel48.png" title="Бизнес-Ангелы"> '.n_f($suma).'';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r4['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r4['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r4['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r4['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r4['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r4['id']."', `time` = '".time()."', `readlen` = '0'");
mysql_query("UPDATE `users` SET `angel` = '".($r4['angel'] + $suma)."' WHERE `id` = '".$r4['id']."' ");
} while ($r4 = mysql_fetch_array ($res4));
}


if($res == 5){
$viz5 = time()-604800;
$res5 = mysql_query("SELECT * FROM `users` WHERE `viz` > '".$viz5."' ");
$r5 = mysql_fetch_array ($res5);
do {
$rand = rand(1,20);
$text = 'Здравствуйте! Вам Бонус: <img width="20" height="20" alt="Корпоративная карта" src="/images/card/'.$rand.'.png" title="Корпоративная карта"> '.n_f($suma).' карт/а,ы';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r5['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r5['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r5['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r5['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r5['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r5['id']."', `time` = '".time()."', `readlen` = '0'");



$kartt = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $suma");
$kar = mysql_fetch_array ($kartt);
do {
$rand = rand(1,20);
$rand_xxx = 50;
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$r5['id']."', `images` = '".$rand."', `xxx` = '".$rand_xxx."' ");
} while ($kar = mysql_fetch_array ($kartt));


} while ($r5 = mysql_fetch_array ($res5));
}






$usrs = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > '".(time()-(86400*365000))."'"),0);
$_SESSION['err'] = 'Начисление прошло успешно ('.$usrs.' чел.)! Все были уведомлены в почту.';
header ('Location: ?');
exit();
}



echo '<br><form action="" method="POST">
<input placeholder="Количество" type="text" name="suma" style="width: 95%;" maxlength="30" value=""><br><br>

<select name="res" style="width: 95%;">
<option value="0">Монеты</option>
<option value="1">Рубины</option>
<option value="2">Коллекции</option>
<option value="3">Камни</option>
<option value="4">Бизнес-Ангелы</option>
<option value="5">Карты</option>
</select>

<input class="mt4" type="submit" name="submit" value="Начислить">
</form>';






echo '</center></div>';
echo '<center><div class="minor mt4">Никогда не забывайте - с каждым бонусом база почты забивается.</div></div></div></center>';
echo '<center><div class="minor mt4">Ресурсы начисляются всем игрокам которые были в игре хоть раз за последнею неделю.</div></div></div></center>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>