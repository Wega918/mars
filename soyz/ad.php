<?php
$title = 'Объявления';
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
echo '<a class="btnl mt4" href="'.$HOME.'soyz/soyz_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Объявления</a>';







echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';

echo '<center><form action="" method="POST">
<br><textarea style="width: 95%;" name="text" id="message"></textarea><br>';

?>

<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="submit" value="Отправить">


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
echo '</span></li></ul></div>';









echo '<center><div class="minor">Давать обьявления могут владелец, заместитель и акционеры Союза.</div></center>';
echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> Вернуться</a>';






if(isset($_REQUEST['submit'])){
$text = strong($_POST['text']);



If($Ignore){
header('Location: ?');
$_SESSION['err'] = '<font color=red><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></font>';
exit();
}


if(strlen($text) < 5){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Длина обьявления должна быть не меньше 5 символов!</font>';
exit();
}

if(strlen($text) > 1000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Длина обьявления должна быть не больше 1000 символов!</font>';
exit();
}

mysql_query("UPDATE `soyz` SET `ad` = '".$text."', `ad_user` = '".$user['id']."', `ad_time` = '".time()."'     WHERE `id` = '".$user['soyz']."' limit 1");
mysql_query("UPDATE `users` SET  `ad_soyz` = '1' WHERE `soyz` = '$soyz[id]'");

$text1 = '<font color=red> Обьявление Союза </font>   
<div class="bordered" style="margin-top: 4px; position: relative;">
'.$text.'
</div>

<div class="bordered" style="margin-top: 4px; position: relative;">
<div style="display: inline;" class="fl">
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>Объявил: '.nick($user['id']).'</span></div>
<div>
</div></div></div><div class="cb"></div></div>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text1', `time` = '".time()."'");

header('Location: ?');
$_SESSION['err'] = 'Обьявление опубликовано!';
exit();
}












require_once ('../system/footer.php');
?>