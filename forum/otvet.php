<?php
require_once ('../system/function.php');
$title = 'Чат | Ответ';
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}



$topic = abs(intval($_GET['topic']));
$forum_t = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_topic` WHERE `id` = '".$topic."'"));
$otvet = abs(intval($_GET['otvet']));
$enot = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_comments` WHERE `id` = '".$otvet."'"));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$enot['avtor']."'"));

if($user['id'] == $ank['id']) {
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top'); 
exit;
}
if($forum_t['open'] != 0){
$_SESSION['err'] = '<font color=red>Топик закрыт!</font>';
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
exit();
}



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

$tim = mysql_query("SELECT * FROM `forum_comments` WHERE `avtor` = '".$user['id']."' ORDER BY `time` DESC");
while($ncm2 = mysql_fetch_assoc($tim)){
$news_antispam = mysql_fetch_assoc(mysql_query("SELECT * FROM `antispam` WHERE `koment_topik` "));
$ncm_timeout = $ncm2['time'];

if((time()-$ncm_timeout) < $news_antispam['koment_topik']) {
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
$_SESSION['err'] = '<font color=red>Пишите не чаще чем раз в '.$news_antispam['koment_topik'].' секунд!</font>';
exit();
}
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

$tspam = mysql_fetch_array(mysql_query('select * from `ass` where `avtor` = "'.$user['id'].'" and `msg` = "'.$msg1.'" and `time` > "'.(time()-90).'"'));
if($tspam != 0) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Ваше сообщение повторяется!</font>";
exit();
}
mysql_query('DELETE FROM `forum_fols` WHERE `topic` = "'.$forum_t['id'].'" ');
mysql_query("INSERT INTO `forum_comments` SET `koment` = '".$msg1."', `avtor` = '".$user['id']."', `time` = '".time()."' , `topic` = '".$forum_t['id']."', `id_komu` = '".$ank['id']."' ");

if($mission_user_30['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_30['prog_']+1)."' WHERE `id` = '".$mission_user_30['id']."' ");
}

header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
$_SESSION['err'] = "Сообщение  для <b>".nick($ank['id'])."</b> успешно добавлено!";
exit;
}




echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Назад</a>';

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
<img style="vertical-align: sub;" src="/files/smile/smiles.png" width="20"></a>
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




require_once ('../system/footer.php');
?>