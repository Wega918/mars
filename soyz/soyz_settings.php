<?php
$title = 'Управление';
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
if($user['soyz_rang'] > 3) {
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
echo '<a class="btnl mt4" href="'.$HOME.'soyz/buying_seats/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}
echo '<a class="btnl mt4" href="'.$HOME.'soyz/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> Вернуться</a>';
///echo '<a class="btnl mt4" href="../soyzBlackList/506"><img src="/images/ignored.png" width="24" height="24" alt="" title=""> Черный список</a>';











///##########################################################################################################################################
if($user['soyz_rang'] <= 2) {
?>
<div id="pokazat"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;"><img width="24" height="24" src="/images/arrow_up2.png"> Статус союза <img width="24" height="24" src="/images/arrow_up2.png"></a>

<p>
<div class="content">
<?

echo '<center><div class="bordered mt4"><form action="" method="POST">
<input style="width: 95%;" type="text" name="status_text" value="'.$soyz['status_text'].'"/> <br>
<input type="submit" name="submit" value="Сохранить" class="mt4"/>
</form></div></center>';





if(isset($_REQUEST['submit'])) {
$status_text = strong($_POST['status_text']);
if(mb_strlen($status_text) > 500 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>500 символов максимум </font>';
exit();
}
if(mb_strlen($status_text) < 1 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните все поля</font>';
exit();
}
if($user['soyz_rang'] > 2) {
header('Location: ?');
exit();
}

if(preg_match("#(<a href=|\[url=|\[link=)?(ftp://|https?://|www)?([\s]?)([^-a-z0-9_@]+)([-a-z0-9/.\s]+\.[a-z]{2,6}[-a-z0-9_/.]*[html|php|cgi]*[\]>]?)+#is", $_POST['msg'])) {
$gdfgdfg = 'Здравствуйте! Игрок '.nick($user['id']).' попытался отправить ('.$status_text.') в статус кп.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$gdfgdfg."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = '<font color=red>В тексте была ссылка. Сообщение Администратору уже отправленно!</font>';
exit();
}
mysql_query("UPDATE `soyz` SET `status_text` = '".$status_text."' WHERE `id` = '".$soyz['id']."'");
header('Location: ?');
$_SESSION['err'] ='Успешно!';
exit();
}





?>
</div></p></div>


<div id="skryt" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><img width="24" height="24" src="/images/arrow_down2.png"> Статус союза <img width="24" height="24" src="/images/arrow_down2.png"></a>
</div>
<?
}















if($user['soyz_rang'] <= 2) {
if(isset($_GET['open/'])){
if ($soyz['open'] == 0){
mysql_query("UPDATE `soyz` SET `open` = '".($soyz['open'] = 1)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `soyz` SET `open` = '".($soyz['open'] = 0)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
}
header('Location: ?');}

if ($soyz['open'] == 1){$knopk1 = 'открытый';}else{$knopk1 = '<u><a href="?open/"> открытый</a></u>';}
if ($soyz['open'] == 0){$knopk2 = 'закрытый';}else{$knopk2 = '<u><a href="?open/"> закрытый</a></u>';}
echo '<div class="bordered" style="margin-top: 4px; position: relative;"><font color=black size=2>Союз:</font> '.$knopk1.' / '.$knopk2.' </div>';

}
require_once ('../system/footer.php');
?>