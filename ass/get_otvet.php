<?php
$title = 'Чат';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}
$ass = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass` "),0);
mysql_query("UPDATE `users` SET `ass` = '".$ass."' WHERE `id` = '$user[id]' LIMIT 1");




$act = isset($_GET['act']) ? $_GET['act'] : null;
switch($act){
default: 

/*
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<font color=red size=1>Время викторин в чате: 12:00, 16:00, 20:00 время подзаработать рубинов!</font>';
echo '</span></li></ul></div>';
*/


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
$tim = mysql_query("SELECT * FROM `ass` WHERE `avtor` = '".$user['id']."' ORDER BY `time` DESC");
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

$spa = 'Здравствуйте! Игрок '.$user['login'].' попытался отправить ('.$msg.') в чате.';
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

$tspam = mysql_fetch_array(mysql_query('select * from `ass` where `avtor` = "'.$user['id'].'" and `msg` = "'.$msg1.'" and `time` > "'.(time()-90).'"'));
if($tspam != 0) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Ваше сообщение повторяется!</font>";
exit();
}
if($user['game_time'] < 3600) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Общение на сайте доступно после проведения 1 Часа в игре.</font>";
exit();
}
mysql_query("UPDATE `users` SET `ass` = '".($user['ass'] + 1)."', `ass_turnir` = '".($user['ass_turnir'] + 1)."' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query("INSERT INTO `ass` SET `msg` = '".$msg1."', `avtor` = '".$user['id']."', `time` = '".time()."'");

if($mission_user_29['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_29['prog_']+1)."' WHERE `id` = '".$mission_user_29['id']."' ");
}
if($Achievements_user_28['prog'] < $Achievements_user_28['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_28['prog']+1)."' WHERE `id` = '".$Achievements_user_28['id']."' ");
}

header('location: ?');
$_SESSION['err'] = "Сообщение успешно добавлено!";
exit();
}



echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'viktorina/"><img src="/images/forum2.png" width="24" height="24"> Викторина</a>';

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
<a onclick="pasteSmile(' <?=$s['name']?> ')"><img src="<?=$HOME?>files/smile/<?=$s['icon']?>" alt="<?=$s['name']?>" title="<?=$s['name']?>"></a>
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


echo '<center><div class="minor mb4"><font color=black>Чат для поиска Корпорации и Союза находится внизу страницы.</font></div></center>';








?>
<a href="#vrag" onClick="document.getElementById('pokazat1').style.display='none';document.getElementById('skryt1').style.display='';return false;"><center><span style="color:black;"><u>Правила общения</u></span></a></center><hr>
<?
///###############################################################################################################################################









///###############################################################################################################################################
?>
<div id="pokazat1"></div>
<div id="skryt1" style="display:none">



<br>
<b class="tred">Запрещается:</b><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Размещать любую коммерческую рекламу, коммерческие предложения, агитационные материалы, распространять спам, сообщения-цепочки (сообщения, требующие их передачи одному или нескольким пользователям), схемы финансовых пирамид или призывы в них участвовать, любую другую навязчивую информацию;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Нецензурно выражаться или оскорблять других Пользователей Сайта или Администрацию Сайта, публично или приватно;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Совершать действия противоречащие общепринятым моральным нормам;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Злоупотреблять ЗАГЛАВНЫМИ буквами (также именуемое капсом), создавать сообщения, состоящие целиком из заглавных букв, создавать темы с названиями содержащими заглавные буквы не в начале слов;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Размещать одинаковые или однотипные сообщения в одном или нескольких разделах Сайта (топиках), размещать многократно повторяющиеся символы, фразы или смайлики;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Высказывание в чате и на форуме недовольства действиями участников форума и публичное обсуждение действий модераторов и администрации;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Использовать для общения языки, отличные от русского (государственного языка РФ), если другие пользователи могут не понять значения отдельных слов или всего сообщения;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Обсуждение тех, или иных локаций (а также ошибок) в чатах игры.</font><br>
<div class="fr"><a href="/rules/"><span style="color:black;"><u>соглашение</u></span></a></div><br>



<br><a class="blck p5 forum"></a><a href="#vrag" onClick="document.getElementById('skryt1').style.display='none';document.getElementById('pokazat1').style.display='';return false;"><center><span style="color:black;">Закрыть</span></center></center></a><hr>

</div><?
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////






















if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*)  FROM `ass` ") ,0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `ass` ORDER BY `time` DESC LIMIT $start, $max");
while($post = mysql_fetch_assoc($query)){

$avtor = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['avtor']."'"));
$komu = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['id_komu']."'"));

if($user['level'] >= 1 && ($user['id'] != $post['avtor'] or $user['level'] == 3)){
$del = '<a href="'.$HOME.'ass/delmsg'.$post['id'].'"><b><font color=indianred>x</font></b></a>';
}else{
$del = '';
}


$usr = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['avtor']."'"));

if($usr['level'] >= 1){
$mmm = filter(bb(smile($post['msg'])));
}else{
$mmm = filter(bb1(smile($post['msg'])));
}





if($post['avtor'] == $user['id'] and $post['id_komu'] != 0){
$name = '<b>'.$komu['login'].', '.$mmm.'</b>';
}

if($post['avtor'] == $user['id'] and $post['id_komu'] == 0){
$name = ''.$mmm.'';
}

if($post['avtor'] != $user['id'] and $post['id_komu'] != $user['id']){
$name = ''.$komu['login'].', '.$mmm.'';
}

if($post['avtor'] != $user['id'] and $post['id_komu'] == $user['id']){
$name = '<font color=red>'.$komu['login'].', '.$mmm.'';
}

echo''.$del.' <span style="float: right;">  <font size=1 color=grey> '.time_last($post['time']).'</font></span> '.nick($post['avtor']).'';

if($user['id'] != $post['avtor']) {
echo' <a href="'.$HOME.'ass/otvet.php?id='.$post['id'].'"><img src="/images/reply.png" width="18" height="18"></a> ';
}

echo '<br>';

if($post['id_komu'] == $komu['id']){
echo ' '.$name.'</font>';
}else{
echo''.$mmm.'';
}

echo '<hr>';

}



$chat = mysql_result(mysql_query("SELECT COUNT(*) FROM `chat` "),0);
if($chat > $user['chat']){
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'chat/"><img src="/images/corp2.png" width="24" height="24"> Поиск Кп / Союза <font color=red>(+)</font></a>';
}else{
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'chat/"><img src="/images/corp2.png" width="24" height="24"> Поиск Кп / Союза</a>';
}


if($k_post < 1){
echo '<center>Пока пусто, будешь первым!</center>';
}
if ($k_page > 1) {
echo str(''.$HOME.'ass/?',$k_page,$page); // Вывод страниц
}
break;








case 'delmsg':
$id = abs(intval($_GET['id']));
$gg = mysql_fetch_assoc(mysql_query("SELECT * FROM `ass` WHERE `id` = '".$id."'"));
if(isset($gg['id'])){
if($user['level'] >= 1 && ($user['id'] != $post['avtor'] or $user['level'] == 3)){
$msg_del = 'Сообщение удалено '.nick($user['id']).' ';
mysql_query("UPDATE `ass` SET `msg` = '".$msg_del."' WHERE `id` = '".$id."' LIMIT 1");
header('Location: '.$HOME.'ass/');
$_SESSION['err'] = "Сообщение успешно удалено!";
exit();
}else{
header('Location: '.$HOME.'ass/');
}
}else{
header('Location: '.$HOME.'ass/');
$_SESSION['err'] = "Такого сообщения не существует!";
exit();
}
break;
}




echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'Administrations/"><img src="/images/corp2.png" width="24" height="24"> Помощь модератора</a>';







if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить чат</a>';


if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить ЧАТ ?
<div class="mt4"><a class="btni accept" href="?Reset_chat_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset_chat_/'])){
if($user['level'] != 3){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `ass` = '0' WHERE `id` ");
mysql_query('DELETE FROM `ass` WHERE `id` ');
$_SESSION['err'] = 'Чат очищен!';
header('Location: ?');
exit();
}

}







require_once ('../system/footer.php');
?>