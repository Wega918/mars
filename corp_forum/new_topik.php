<?php
$title = 'Форум | Новый топик';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['corp_rang'] > 3) {
header('Location: /');
exit();
}
$corp = abs(intval($_GET['corp']));
$corpored = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id` = '".$corp."' "));

$razdel = abs(intval($_GET['razdel']));
$razdel1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp_forum_razdel` WHERE `id` = '".$razdel."' "));

if($corp != $user['corp']){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'У Вас нет прав для просмотра данной страницы!';
exit();
}
if($razdel == 0){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'Такого раздела не существует!';
exit();
}

echo '<div class="content">'.$razdel1['name'].' / Новый топик</div>';






echo '<div class="feedback"><center><form action="" method="POST">
Название:<br> <input type="text" style="width: 95%;" name="name" value=""> <br>

Топик:<br/>
<select name="open" style="width: 95%;">
<option value="0">Открыт</option>
<option value="1">Закрыт</option>
</select><br/>

Текст:<br><textarea style="width: 95%;" name="text" id="text"></textarea><br>';






?>
<a class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="/bb/"><img style="vertical-align: sub;" src="/images/tegs.png" width="20"></a>

<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="submit" value="Создать топик">


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
<br></div></span></form></center></div>
<?






?>
<script>
function showSmiles(){
document.getElementById("smiles").style.display = "block";
}
function  pasteSmile(smile){
message = document.getElementById("text");
message.value = message.value + smile;
message.focus();
message.selectionStart = message.value.length;
}
</script> 
<?















if(isset($_REQUEST['submit'])){
$text = strong($_POST['text']);
$name = strong($_POST['name']);
$open = strong($_POST['open']);



$tim = mysql_query("SELECT * FROM `corp_forum_topic` WHERE `user` = '".$user['id']."' ORDER BY `time` DESC");
while($ncm2 = mysql_fetch_assoc($tim)){
$news_antispam = mysql_fetch_assoc(mysql_query("SELECT * FROM `antispam` WHERE `new_topic` "));
$ncm_timeout = $ncm2['time'];

if((time()-$ncm_timeout) < $news_antispam['new_topic']) {
header('Location: ?');
$_SESSION['err'] = '<font color=red>Пишите не чаще чем раз в '.$news_antispam['new_topic'].' секунд!</font>';
exit();
}

}

if($user['game_time'] < 3600) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Общение на сайте доступно после проведения 1 Часа в игре.</font>";
exit();
}

if(mb_strlen($name) < 3 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите название топика от 3 символов!</font>';
exit();
}
if(mb_strlen($name) > 25 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите название топика не более 25 символов!</font>';
exit();
}


if(mb_strlen($text) < 3 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите текст топика от 3 символов!</font>';
exit();
}
if(mb_strlen($text) > 2000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите текст топика не более 2000 символов!</font>';
exit();
}

mysql_query("INSERT INTO `corp_forum_topic` SET `name` = '".$name."', 
`text` = '".$text."', 
`user` = '".$user['id']."', 
`time` = '".time()."', 
`open` = '".$open."', 
`corp` = '".$corp."', 
`razdel` = '".$razdel."'");
header('Location: '.$HOME.'corp_forum/razdel_'.$razdel.'/corp_'.$corp.'/');
$_SESSION['err'] = 'Топик  - '.$name.' -  создан!';
exit();
}








echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp_forum/razdel_'.$razdel.'/corp_'.$corp.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>