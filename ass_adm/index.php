<?php
$title = 'Админ ЧАТ';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}
if($user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}

$ass_adm = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass_adm` "),0);
mysql_query("UPDATE `users` SET `ass_adm` = '".$ass_adm."' WHERE `id` = '$user[id]' LIMIT 1");




$act = isset($_GET['act']) ? $_GET['act'] : null;
switch($act){
default: 




if(isset($_REQUEST['add'])) {
if($user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}
$msg = strong($_POST['msg']);
$msg1 = '<font color=#800000>'.$msg.'</font>';

$tim = mysql_query("SELECT * FROM `ass_adm` WHERE `avtor` = '".$user['id']."' ORDER BY `time` DESC");
while($ncm2 = mysql_fetch_assoc($tim)){
$news_antispam = mysql_fetch_assoc(mysql_query("SELECT * FROM `antispam` WHERE `chat` "));
$ncm_timeout = $ncm2['time'];
if((time()-$ncm_timeout) < $news_antispam['chat']) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Пишите не чаще чем раз в '.$news_antispam['chat'].' секунд!</font>';
exit();
}
}

if(empty($msg)) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Вы не ввели сообщение!</font>';
exit();
}

$tspam = mysql_fetch_array(mysql_query('select * from `ass_adm` where `avtor` = "'.$user['id'].'" and `msg` = "'.$msg1.'" and `time` > "'.(time()-90).'"'));
if($tspam != 0) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Ваше сообщение повторяется!</font>";
exit();
}

if($user['biznes'] < 10) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Общение в Чате доступно только после покупки 10 бизнесов!</font>";
exit();
}
mysql_query("UPDATE `users` SET `ass_adm` = '".($user['ass_adm'] + 1)."' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query("INSERT INTO `ass_adm` SET `msg` = '".$msg1."', `avtor` = '".$user['id']."', `time` = '".time()."'");
header('location: ?');
$_SESSION['err'] = "Сообщение успешно добавлено!";
exit();
}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';

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

echo '</span></li></ul></div>';

















if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*)  FROM `ass_adm` ") ,0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `ass_adm` ORDER BY `time` DESC LIMIT $start, $max");
while($post = mysql_fetch_assoc($query)){

$avtor = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['avtor']."'"));
$enot_komu = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['id_komu']."'"));
if($user['level'] >= 1 && ($user['id'] != $post['avtor'] or $user['level'] == 3)){
$del = '<a href="'.$HOME.'ass_adm/delmsg'.$post['id'].'"><b><font color=indianred>x</font></b></a>';
}else{
$del = '';
}

if($post['id_komu'] == $user['id']){
$Vam='<font color=lightblue>-></font>';
}else{
$Vam='';
}

echo''.$del.' <span style="float: right;">  <font size=1 color=grey> '.vremja($post['time']).'</font></span> '.$iggg.' '.nick($post['avtor']).'';
if($user['id'] != $post['avtor']) {
echo' <a href="'.$HOME.'ass_adm/otvet.php?id='.$post['id'].'"><img src="/images/reply.png" width="18" height="18"></a> ';
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
echo '<center>Пока пусто, будешь первым!</center>';
}
if ($k_page > 1) {
echo str(''.$HOME.'ass_adm/?',$k_page,$page); // Вывод страниц
}
break;








case 'delmsg':
$id = abs(intval($_GET['id']));
$gg = mysql_fetch_assoc(mysql_query("SELECT * FROM `ass_adm` WHERE `id` = '".$id."'"));
if(isset($gg['id'])){
if($user['level'] >= 1 && ($user['id'] != $post['avtor'] or $user['level'] == 3)){
mysql_query("DELETE FROM `ass_adm` WHERE `id` = '".$id."'");
mysql_query("UPDATE `users` SET `ass_adm` = `ass_adm` - '1' WHERE `id` ");
header('Location: '.$HOME.'ass_adm/');
$_SESSION['err'] = "Сообщение успешно удалено!";
exit();
}else{
header('Location: '.$HOME.'ass_adm/');
}
}else{
header('Location: '.$HOME.'ass_adm/');
$_SESSION['err'] = "Такого сообщения не существует!";
exit();
}
break;
}



if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить чат</a>';


if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить админ ЧАТ ?
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
mysql_query("UPDATE `users` SET `ass_adm` = '0' WHERE `id` ");
mysql_query('DELETE FROM `ass_adm` WHERE `id` ');
$_SESSION['err'] = 'Чат очищен!';
header('Location: ?');
exit();
}

}

require_once ('../system/footer.php');
?>