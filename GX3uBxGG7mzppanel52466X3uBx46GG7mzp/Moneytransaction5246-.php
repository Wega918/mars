<?php
$title = 'Перевод ангелов';
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
$angel = $summ*1000;
}elseif($coll == 2){ // m
$angel = $summ*1000000;
}elseif($coll == 3){ // b
$angel = $summ*1000000000;
}elseif($coll == 4){ // t
$angel = $summ*1000000000000;
}elseif($coll == 5){ // q
$angel = $summ*1000000000000000;
}elseif($coll == 6){ // u
$angel = $summ*1000000000000000000;
}elseif($coll == 7){ // x
$angel = $summ*1000000000000000000000;
}elseif($coll == 8){ // y
$angel = $summ*1000000000000000000000000;
}elseif($coll == 9){ // h
$angel = $summ*1000000000000000000000000000;
}elseif($coll == 10){ // s
$angel = $summ*1000000000000000000000000000000;
}elseif($coll == 11){ // d
$angel = $summ*1000000000000000000000000000000000;
}elseif($coll == 12){ // v
$angel = $summ*1000000000000000000000000000000000000;
}elseif($coll == 13){ // w
$angel = $summ*1000000000000000000000000000000000000000;
}elseif($coll == 14){ // r
$angel = $summ*1000000000000000000000000000000000000000000;
}elseif($coll == 15){ // g
$angel = $summ*1000000000000000000000000000000000000000000000;
}elseif($coll == 16){ // n
$angel = $summ*1000000000000000000000000000000000000000000000000;
}elseif($coll == 17){ // c
$angel = $summ*1000000000000000000000000000000000000000000000000000;
}elseif($coll == 18){ // p
$angel = $summ*1000000000000000000000000000000000000000000000000000000;
}elseif($coll == 19){ // o
$angel = $summ*1000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 20){ // z
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 21){ // vi
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 22){ // un
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 23){ // du
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 24){ // tr
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 25){ // qu
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 26){ // qi
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 27){ // se
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 28){ // sp
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 29){ // oc
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 30){ // nv
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
}elseif($coll == 31){ // tn
$angel = $summ*1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000;
}else{
$angel = 0;
}


$tex1 = 'Вам начислено <img src="/images/angel48.png" alt="o" width="24" height="24"> '.n_f($angel).' ангелов.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$id."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$id."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$id."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$id."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$id."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$tex1."', `kto` = '2', `komy` = '".$id."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `users` SET `angel` = '".($ank['angel']+$angel)."' WHERE `id` = '".$id."' limit 1");

$_SESSION['err'] = 'Вами начислено <img src="/images/angel48.png" alt="o" width="24" height="24"> '.n_f($angel).' ангелов игроку '.nick($id).'';
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
<option value="7">x</option>
<option value="8">y</option>
<option value="9">h</option>
<option value="10">s</option>
<option value="11">d</option>
<option value="12">v</option>
<option value="13">w</option>
<option value="14">r</option>
<option value="15">g</option>
<option value="16">n</option>
<option value="17">c</option>
<option value="18">p</option>
<option value="19">o</option>
<option value="20">z</option>
<option value="21">vi</option>
<option value="22">un</option>
<option value="23">du</option>
<option value="24">tr</option>
<option value="25">qu</option>
<option value="26">qi</option>
<option value="27">se</option>
<option value="28">sp</option>
<option value="29">oc</option>
<option value="30">nv</option>
<option value="31">tn</option>
</select>';


echo '<input class="mt4" type="submit" name="submit" value="Перевести"></form>

<hr>
в первом поле необходимо ввести сумму перевода<br>
во втором поле необходимо выбрать букву числа.<br>
на пример: (1)-(k) --- будет переведено 1000 ангелов. 
<hr>';



















echo '</center></div>';




echo '<a class="btnl mt4" href="'.$HOME.'Moneytransaction5246/'.$id.'/">Назад</a>';
require_once ('../system/footer.php');
?>