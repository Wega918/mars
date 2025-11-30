<?php
$title = 'Чат';
require_once ('../system/function.php');
require_once ('../system/header.php');
$clan = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$user['soyz']."'"));
# закрываем от гостей и юзеров
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}
if($user['soyz'] == 0) {
header("Location: /");
exit();
}



$soyz_ass = mysql_result(mysql_query("SELECT COUNT(id) FROM `soyz_ass` WHERE `clan_id` = ".$user['soyz'].""),0);
//if($user['soyz_ass'] < $soyz_ass){
mysql_query("UPDATE `users` SET `soyz_ass` = '".$soyz_ass."' WHERE `id` = '$user[id]' LIMIT 1");
//}


if($user['soyz'] == $soyz['id']) {
$act = isset($_GET['act']) ? $_GET['act'] : null;
switch($act){
default: 





if(isset($_REQUEST['add'])) {
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
header('Location: ?');
$_SESSION['err'] = '<font color=red>Пишите не чаще чем раз в '.$news_antispam['chat'].' секунд!</font>';
exit();
}

}

if(preg_match("#(<a href=|\[url=|\[link=)?(ftp://|https?://|www)?([\s]?)([^-a-z0-9_@]+)([-a-z0-9/.\s]+\.[a-z]{2,6}[-a-z0-9_/.]*[html|php|cgi]*[\]>]?)+#is", $_POST['msg'])) {

$spa = 'Здравствуйте! Игрок '.$user['login'].' попытался отправить ссылку в чате союза.';
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

header('Location: ?');
$_SESSION['err'] = '<font color=red>В тексте была ссылка. Сообщение Администратору уже отправленно!</font>';
exit();
} 
if($user['game_time'] < 3600) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Общение на сайте доступно после проведения 1 Часа в игре.</font>";
exit();
}
if(empty($msg)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Вы не ввели сообщение!</font>';
exit();
}
if(mb_strlen($msg) > 500 ){
$_SESSION['err'] = '<font color=red>Не более 500 символов!</font>';
header('Location: ?');
exit();
}
if(mb_strlen($msg) < 3) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Сообщение содержит меньше 3-х символов!</font>';
exit();
}

mysql_query("UPDATE `users` SET `soyz_ass` = '".($user['soyz_ass'] + 1)."' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query("INSERT INTO `soyz_ass` SET `msg` = '".$msg1."', `avtor` = '".$user['id']."', `clan_id` = '".$soyz['id']."', `time` = '".time()."'");

header('location: ?');
$_SESSION['not'] = "Сообщение успешно добавлено!";
exit();
}



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
<a class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="?"><img style="vertical-align: sub;" src="/images/refresh_white2.png" width="20"></a>

<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="add" value="Отправить">


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
<a onclick="pasteSmile(' <?=$s['name']?> ')"><img style="vertical-align: top;" src="<?=$HOME?>files/smile/<?=$s['icon']?>" alt="<?=$s['name']?>" title="<?=$s['name']?>"></a>
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







if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_ass` WHERE `clan_id` = '".$user['soyz']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `soyz_ass` WHERE `clan_id` = '".$user['soyz']."' ORDER BY `time` DESC LIMIT $start, $max");
while($post = mysql_fetch_assoc($query)){

$avtor = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['avtor']."'"));
$enot_komu = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['id_komu']."'"));
if($user['level'] >= 1 or $user['soyz_rang'] <= 2){
$del = '<a href="'.$HOME.'soyz/soyz_ass/delmsg'.$post['id'].'"><b><font color=indianred>x</font></b></a>';
}else{
$del = '';
}


echo' '.$del.' <span style="float: right;">  <font size=1 color=grey> '.times($post['time']).'</font></span> '.$iggg.' '.nick($post['avtor']).'';
if($user['id'] != $post['avtor']) {
echo' <a href="'.$HOME.'soyz/otvet.php?id='.$post['id'].'"><img src="/images/reply.png" width="18" height="18"></a> ';
}
echo '<br>';
if($post['id_komu'] == $user['id']){
echo'<font color=red>'.filter(bb1(smile($post['msg']))).'</font>';
}else{
echo''.filter(bb1(smile($post['msg']))).'';
}
echo '<hr>';

}


if($k_post < 1){
echo '<div class="player"><center><b>Пока пусто,будешь первым!</b></center></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'soyz/soyz_ass/?',$k_page,$page); // Вывод страниц
}




break;













case 'delmsg':
$id = abs(intval($_GET['id']));
$gg = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_ass` WHERE `id` = '".$id."'"));
if(isset($gg['id'])){
if($user['soyz'] == $soyz['id'] && $user['soyz_rang'] <= 2 or $user['level'] >= 1){
mysql_query("DELETE FROM `soyz_ass` WHERE `id` = '".$id."'");
header('Location: '.$HOME.'soyz/soyz_ass/?');
$_SESSION['err'] = "Сообщение успешно удалено!";
exit();
}else{
header('Location: '.$HOME.'soyz/soyz_ass/?');
}
}else{
header('Location: ?');
$_SESSION['err'] = "<font color=red>Такого сообщения не существует!</font>";
exit();
}

break;
}
}













if($user['soyz_rang'] <= 2){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить чат</a>';


if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить ЧАТ ?
<div class="mt4"><a class="btni accept" href="?Reset_chat_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset_chat_/'])){
if($user['soyz_rang'] > 2){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `soyz_ass` = '0' WHERE `soyz` = '".$soyz['id']."' ");
mysql_query('DELETE FROM `soyz_ass` WHERE `clan_id` = "'.$soyz['id'].'" ');
$_SESSION['err'] = 'Чат очищен!';
header('Location: ?');
exit();
}

}











require_once ('../system/footer.php');
?>