<?php
$title = 'Комментарий | Редактирование';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$comments = abs(intval($_GET['comments']));
$page = abs(intval($_GET['page']));
$forum_comments = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_comments` WHERE `id` = '".$comments."'"));

if($user['level'] <= 0){
if($forum_comments['avtor'] != $user['id']){
header('Location: /');
exit();
}
}
echo '<div class="content">Комментарий / Редактирование</div>';






echo '<div class="feedback">
<center><form action="" method="POST">
Содержание:<br /><textarea style="width: 95%;" name="text" value="0" id="message">'.nl2br(filter((bb($forum_comments["koment"])))).'</textarea><br>
</center>';




?>
<a class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="/bb/"><img style="vertical-align: sub;" src="/images/tegs.png" width="20"></a>


<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="submit" value="Редактировать">


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
<br></div></span></form></center></div>
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









if(isset($_REQUEST['submit'])){
$text = nl2br(filter((bb($_POST['text']))));
if(mb_strlen($text) <= 0 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Заполните все поля.</font>';
exit();
}
mysql_query("UPDATE `forum_comments` SET `koment` = '". $text."' WHERE `id` = '".$forum_comments['id']."' LIMIT 1");
header('Location: '.$HOME.'forum/topic/'.$forum_comments['topic'].'/?page=top');
exit();
}

/*
if(isset($_GET['search'])){
$text = nl2br(filter(smile(bb($_POST['text']))));
$_SESSION['err'] = ''.$text.'';
header('Location: ?');
exit();
}

<a class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="?search"><img style="vertical-align: sub;" src="/images/search.png" width="20"></a>



*/

//echo '<font size="1"><font color="black"> <font size="3">•</font></font> <b>Кнопка <img width="24" height="24" src="/images/search.png"> позволяет просматривать сообщение перед отправкой</b></font>';






echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/topic/'.$forum_comments['topic'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Назад</a>';
require_once ('../system/footer.php');
?>