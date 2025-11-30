<?php
require_once ('../system/function.php');
$title = 'Чат | Ответ';
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}
if($user['id'] == $ank['id']) {
header('Location: '.$HOME.'soyz/soyz_ass/'); 
exit;
}

$id = abs(intval($_GET['id']));
$enot = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_ass` WHERE `id` = '".$id."'"));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$enot['avtor']."'"));


if(isset($_REQUEST['ok'])) {  

$msg = strong($_POST['msg']);
$msg1 = '<font color=#800000>'.$msg.'</font>';
If($Ignore){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Общение не доступно.</font>';
exit();
}
If($ban){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Общение не доступно.</font>';
exit();
}
$tim = mysql_query("SELECT * FROM `soyz_ass` WHERE `avtor` = '".$user['id']."' ORDER BY `time` DESC");
while($ncm2 = mysql_fetch_assoc($tim)){
$news_antispam = mysql_fetch_assoc(mysql_query("SELECT * FROM `antispam` WHERE `chat` "));
$ncm_timeout = $ncm2['time'];

if((time()-$ncm_timeout) < $news_antispam['chat']) {
header('Location: '.$HOME.'soyz/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = '<font color=red>Пишите не чаще чем раз в '.$news_antispam['chat'].' секунд!</font>';
exit();
}

}

if(preg_match("#(<a href=|\[url=|\[link=)?(ftp://|https?://|www)?([\s]?)([^-a-z0-9_@]+)([-a-z0-9/.\s]+\.[a-z]{2,6}[-a-z0-9_/.]*[html|php|cgi]*[\]>]?)+#is", $_POST['msg'])) {

$spa = 'Здравствуйте! Игрок '.$user['login'].' попытался отправить ссылку в чате.';
$spam = strong($spa);
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$spam."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");

$con2 = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '3' and `kto` = '2' LIMIT 1"),0);
if($con2 == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '3', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '3', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='3' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='3' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$spam."', `kto` = '2', `komy` = '3', `time` = '".time()."', `readlen` = '0'");

header('Location: '.$HOME.'soyz/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = '<font color=red>В тексте была ссылка. Сообщение Администратору уже отправленно!</font>';
exit();
}


if($user['game_time'] < 3600) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Общение на сайте доступно после проведения 1 Часа в игре.</font>";
exit();
}

if(empty($msg)) {
header('Location: '.$HOME.'soyz/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = '<font color=red>Вы не ввели сообщение!</font>';
exit();
}
if(mb_strlen($msg) > 500 ){
$_SESSION['err'] = '<font color=red>Не более 500 символов!</font>';
header('Location: ?');
exit();
}
$tspam = mysql_fetch_array(mysql_query('select * from `soyz_ass` where `avtor` = "'.$user['id'].'" and `msg` = "'.$msg1.'" and `time` > "'.(time()-90).'"'));
if($tspam != 0) {
header('Location: '.$HOME.'soyz/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = "<font color=red>Ваше сообщение повторяется!</font>";
exit();
}

mysql_query("UPDATE `users` SET `soyz_ass` = '".($user['soyz_ass'] + 1)."' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query("INSERT INTO `soyz_ass` SET `msg` = '[b]".$ank['login'].",[/b] ".$msg1."', `avtor` = '".$user['id']."', `clan_id` = '".$soyz['id']."', `time` = '".time()."', `id_komu` = '".$ank['id']."'");
header('Location: '.$HOME.'soyz/soyz_ass/');
$_SESSION['err'] = "Сообщение  для <b>".nick($ank['id'])."</b> успешно добавлено!";
exit;
}




echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz/soyz_ass/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Чат</a>';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo'<div class=player > Ответ на сообщение: <span><b>'.nick($ank['id']).'</b></span> </br><b><span> '.filter(bb1(smile($enot['msg']))).'</span></b></div>';
echo '</span></li></ul></div>';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
if($time_delete1){
echo 'Общение в Чате доступно только зарегистрированным пользователям!';
}else{

If($Ignore){
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
}else{

echo '<center><form action="" method="POST">
<br><textarea style="width: 95%;" name="msg" id="message"></textarea><br>';

?>

<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="ok" value="Отправить">


<span id="pokazat">
<a onclick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;" class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="#"><img style="vertical-align: sub;" src="/files/smile/smiles.png" width="20"></a>
</span>



<span id="skryt" style="display:none"> 
<a onclick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;" class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="#"><img style="vertical-align: sub;" src="/files/smile/smiles.png" width="20"></a>
<div class="fight center">
<?
$sm = mysql_query("SELECT * FROM `smile` WHERE `papka` = '1' ORDER BY `id` ASC");
while($s = mysql_fetch_assoc($sm)){
?>
<a class="btni" style="background:000;background:000; height: 20px; width: 20px; top: 2px; padding: 0px 0px; box-shadow: inset 0px 1px 0px #; border: 1px solid #7dab2e; color:#FFFFFF; text-align: inherit; border-radius: 7px; border-radius: 4px;" onclick="pasteSmile(' <?=$s['name']?> ')"><img style="vertical-align: top;" src="<?=$HOME?>files/smile/<?=$s['icon']?>" alt="<?=$s['name']?>" title="<?=$s['name']?>"></a>
<?
}
?>
<br></div></span></form></center>
<?






?>
<script>
function showSmiles(){
document.getElementById("smiles").style.display = "block";
}
function  pasteSmile(smile){
message = document.getElementById("message");
message.value = message.value + smile;
message.focus();
message.selectionStart = message.value.length;
}
</script> 
<?


}

}
echo '</span></li></ul></div>';




require_once ('../system/footer.php');
?>