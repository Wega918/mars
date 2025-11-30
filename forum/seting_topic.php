<?php
$title = 'Топик | Редактирование';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$id = abs(intval($_GET['id']));
$forum_t = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_topic` WHERE `id` = '".$id."'"));


If($user['level'] < 1){
if($user['id'] != $forum_t['user']){
header('Location: /');
exit();
}
}
echo '<div class="content">'.$forum_t['name'].' / Редактирование</div>';






echo '<div class="feedback">
<center><form action="" method="POST">
Название:<br> <input type="text" style="width: 95%;" name="name" value="'.$forum_t['name'].'"> <br>
Текст топика:<br /><textarea style="width: 95%;" name="text" id="message">'.$forum_t['text'].'</textarea><br>

Топик:<br/>
<select name="open" style="width: 95%;">
<option value="0">Открыт</option>
<option value="1">Закрыт</option>
</select><br/></center>';

if($user['level'] >= 2){
echo '<p><input name="new" type="radio" value="1" checked> - оповещать в новостную ленту</p>
<p><input name="new" type="radio" value="2"> - не оповещать в новостную ленту</p>';
}



?>
<a class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="/bb/"><img style="vertical-align: sub;" src="/images/tegs.png" width="20"></a>

<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="submit" value="Редактировать топик">


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
message = document.getElementById("message");
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
$new = strong($_POST['new']);

If($user['level'] < 1){
if($user['id'] != $forum_t['user']){
header('Location: /');
exit();
}
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

mysql_query("UPDATE `forum_topic` SET `name` = '". $name."',
`text` = '". $text."',
`user_red` = '". $user['id']."',  
`time_red` = '".time()."',  
`open` = '". $open."'
WHERE `id` = '".$forum_t['id']."' LIMIT 1");
if($new == 1){
mysql_query("UPDATE `users` SET  `news` = '".$forum_t['id']."' WHERE `id` ");
}
header('Location: '.$HOME.'forum/topic/'.$id.'/');
$_SESSION['err'] = 'Топик  - '.$forum_t['name'].' -  отредактирован!';
exit();
}







if(isset($_GET['delete_'.$id.'/'])){
if($user['level'] < 1) {
$_SESSION['err'] = 'У Вас не достаточно прав для выполнения етого действия!';
header('Location: ?');
exit();
}
mysql_query('DELETE FROM `forum_topic` WHERE `id` = '.$id.' ');
header('Location: '.$HOME.'forum/');
$_SESSION['err'] = 'Топик успешно удален!';
exit();
}







if($user['level'] >= 1) {
echo '<a class="btnl mt4" href="?delete_'.$id.'/"><img src="/images/cross.png" width="12" height="12"> Удалить топик</a>';
}
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/topic/'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>