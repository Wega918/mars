<?php
$title = 'Админ ЧАТ | Ответ';
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
if($user['id'] == $ank['id']) {
header('Location: '.$HOME.'ass_adm/'); 
exit;
}


$id = abs(intval($_GET['id']));
$enot = mysql_fetch_assoc(mysql_query("SELECT * FROM `ass_adm` WHERE `id` = '".$id."'"));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$enot['avtor']."'"));


if(isset($_REQUEST['ok'])) {
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
header('Location: '.$HOME.'ass_adm/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = '<font color=red>Пишите не чаще чем раз в '.$news_antispam['chat'].' секунд!</font>';
exit();
}

}


if($user['biznes'] < 10) {
header('Location: '.$HOME.'ass_adm/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = "<font color=red>Общение в Чате доступно только после покупки 10 бизнесов!</font>";
exit();
}

if(empty($msg)) {
header('Location: '.$HOME.'ass_adm/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = '<font color=red>Вы не ввели сообщение!</font>';
exit();
}

$tspam = mysql_fetch_array(mysql_query('select * from `ass_adm` where `avtor` = "'.$user['id'].'" and `msg` = "'.mysql_real_escape_string($msg1).'" and `time` > "'.(time()-90).'"'));
if($tspam != 0) {
header('Location: '.$HOME.'ass_adm/otvet.php?id='.$enot['id'].'');
$_SESSION['err'] = "<font color=red>Ваше сообщение повторяется!</font>";
exit();
}
mysql_query("UPDATE `users` SET `ass_adm` = '".($user['ass_adm'] + 1)."' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query("INSERT INTO `ass_adm` SET `msg` = '[b]".$ank['login'].",[/b] ".mysql_real_escape_string($msg1)."', `avtor` = '".$user['id']."', `time` = '".time()."', `id_komu` = '".$ank['id']."'");
header('Location: '.$HOME.'ass_adm/');
$_SESSION['err'] = "Сообщение  для <b>".nick($ank['id'])."</b> успешно добавлено!";
exit;
}




echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'ass_adm/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Чат</a>';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo'<div class=player > Ответ на сообщение: <span><b>'.nick($ank['id']).'</b></span> </br><b><span> '.filter(bb1(smile($enot['msg']))).'</span></b></div>';
echo '</span></li></ul></div>';
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';

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

require_once ('../system/footer.php');
?>