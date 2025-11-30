<?php
$title = 'Перевод коллекций';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['id'] > 3) {
header('Location: '.$HOME.'');
exit();
}

$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($id)."'"));


if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}

if($ank['id'] != 1){
if($id == $user['id']){
$_SESSION['err']='Перевод самому себе запрещен!';
header ('Location: /');
exit();
}
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';
echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';



echo ' '.nick($id).' / '.$title.'';


if(isset($_POST['submit'])){

$summ = strong($_POST['summ']);
$coll = strong($_POST['coll']);

if($coll == 1){ // k
$musor_proc = $summ*1000;
}elseif($coll == 2){ // m
$musor_proc = $summ*1000000;
}elseif($coll == 3){ // b
$musor_proc = $summ*1000000000;
}elseif($coll == 4){ // t
$musor_proc = $summ*1000000000000;
}elseif($coll == 5){ // q
$musor_proc = $summ*1000000000000000;
}elseif($coll == 6){ // u
$musor_proc = $summ*1000000000000000000;
}else{
$musor_proc = 0;
}

$tex1 = 'Вам начислено <img src="/images/header/money_36.png" alt="o" width="24" height="24"> '.n_f($musor_proc).'% коллекций.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$id."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$id."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$id."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$id."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$id."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$tex1."', `kto` = '2', `komy` = '".$id."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `users` SET `musor_proc` = '".($ank['musor_proc']+$musor_proc)."' WHERE `id` = '".$id."' limit 1");

$_SESSION['err'] = 'Вами начислено <img src="/images/header/money_36.png" alt="o" width="24" height="24"> '.n_f($musor_proc).'% коллекций игроку '.nick($id).'';
header ('Location: ?');
exit();
}



echo '<hr><form action="" method="POST">
<input type="text" style="width: 95%;" name="summ" value="" maxlength="20" ><br><br>';

echo '<select name="coll" style="width: 95%;">
<option value="1">k</option>
<option value="2">m</option>
<option value="3">b</option>
<option value="4">t</option>
<option value="5">q</option>
<option value="6">u</option>
</select>';


echo '<input class="mt4" type="submit" name="submit" value="Перевести"></form>

<hr>
в первом поле необходимо ввести сумму перевода<br>
во втором поле необходимо выбрать букву числа.<br>
на пример: (1)-(k) --- будет переведено 1000% коллекций. 
<hr>';



















echo '</center></div>';




echo '<a class="btnl mt4" href="'.$HOME.'Moneytransaction5246/'.$id.'/">Назад</a>';
require_once ('../system/footer.php');
?>