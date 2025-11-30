<?php
$title = 'Форум | Топик';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}


switch($_GET['act']) {
default:





$id = abs(intval($_GET['id']));
$forum_t = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_topic` WHERE `id` = '".$id."'"));
$forum_r = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_razdel` WHERE `id` = '".$forum_t['razdel']."'"));
if($forum_t == 0) {
header('Location: '.$HOME.'forum/');
$_SESSION['err'] = 'Такого топика не существует!';
exit();
}
if($user['level']  == 0 and $forum_r['level'] == 1){
header('Location: '.$HOME.'forum/');
$_SESSION['err'] = 'Такого топика не существует!';
exit();
}



$forum_fols = mysql_fetch_array(mysql_query('SELECT * FROM `forum_fols` WHERE `user` = "'.$user['id'].'" and `razdel`  = "'.$forum_r['id'].'" and `topic` = "'.$forum_t['id'].'" '));
if(!$forum_fols){
mysql_query("INSERT INTO `forum_fols` SET `user` = '".$user['id']."', `razdel` = '".$forum_r['id']."', `topic` = '".$forum_t['id']."' ");
}
  
    
echo '<div class="content"><a href="'.$HOME.'forum/razdel/'.$forum_r['id'].'/">'.$forum_r['name'].'</a> / '.$forum_t['name'].'</div>';





echo '<div class="bordered">'.nick($forum_t['user']).'
<span style="float: right;">   <font size=2 color=black>('.times($forum_t['time']).')</font></span>
<br>'.nl2br(filter(smile(bb($forum_t["text"])))).'</div>';


if($forum_t['open'] == 0){
$open = '<font size=2>Открыт</font>';
}else{
$open = '<font size=2 color=red>Закрыт</font>';
}

echo '<div class="bordered">
<font size=2>Топик:</font> '.$open.' ';
if($forum_t['user_red'] > 0){
echo '<span style="float: right;">   <font size=2 color=black>Ред: '.nick($forum_t['user_red']).'  ('.times($forum_t['time_red']).')</font></span>';
}
echo '</div>';








echo '<br><center>Коментарии: </center><br><div class="bordered">';


if (empty($user['max'])) $user['max']=10;
$max = 10;
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_comments` WHERE `topic` = '".$id."'"),0);
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_comments` WHERE `topic` = '".$id."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$forum_comments = mysql_query("SELECT * FROM `forum_comments` WHERE  `topic`='".$id."' ORDER BY `id` LIMIT $start,$max");
while($forum_c = mysql_fetch_assoc($forum_comments)){

if($user['level'] >= 1){
$delete = ' <a href="/forum/post_del'.$forum_c['id'].'/'.$page.'/"><font color=red>[x]</font></a> ';
}else{
$delete = '';
}
if($forum_c['avtor'] == $user['id'] or $user['level'] >= 1){
$sett = ' <a href="'.$HOME.'sett/'.$forum_c['id'].'/'.$page.'/"><img width="20" height="20" src="/images/settings.png"></a> ';
}else{
$sett = '';
}

if($forum_c['avtor'] != $user['id']){
$otvet = '<a href="'.$HOME.'forum/topic='.$forum_c['topic'].'/otvet='.$forum_c['id'].'/"><img src="/images/reply.png" width="20" height="20"></a>';
}else{
$otvet = '';
}


echo ''.nick($forum_c['avtor']).'
<span style="float: right;">   <font size=2 color=black>('.times($forum_c['time']).')</font>'.$delete.' '.$sett.' '.$otvet.'</span>
<br>';

$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$forum_c['id_komu']."'"));
if($forum_c['id_komu'] == $user['id']){
$otvet1 = '<b><font color=red>'.$ank['login'].'</font></b>,';
}
if($forum_c['id_komu'] != $user['id'] and $forum_c['id_komu'] > 0){
$otvet1 = ''.$ank['login'].',';
}
if($forum_c['id_komu'] != $user['id'] and $forum_c['id_komu'] == 0){
$otvet1 = '';
}

echo ''.$otvet1.' '.nl2br(filter(smile(bb($forum_c["koment"])))).'';
echo '<hr>';
}




if($ONL < 1){
echo '<center>Коментариев не найдено!</center>';
}
if ($k_page > 1) {
echo str(''.$HOME.'forum/topic/'.$id.'/?',$k_page,$page); // Вывод страниц
}









if($forum_t['open'] == 0){

If($Ignore){
}else{



echo '<center><form action="" method="POST">
<br><textarea style="width: 95%;" name="koment" id="message"></textarea><br>';

?>
<a class="btni" style="height: 24px; width: 23px; padding: 0px 0px;
box-shadow: inset 0px 1px 0px #;
border: 1px solid #7dab2e;
color:#FFFFFF;
text-align: inherit;
border-radius: 7px;
border-radius: 4px;" href="?"><img style="vertical-align: sub;" src="/images/refresh_white2.png" width="20"></a>


<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="submit" value="Комментировать">


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









if(isset($_REQUEST['koment'])) {

$koment = strong($_POST['koment']);
$koment1 = '<font color=#800000>'.$koment.'</font>';


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



if(mb_strlen($koment) < 1 ){
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
$_SESSION['err'] = '<font color=red>Вы не ввели коментарий!</font>';
exit();
}
if(mb_strlen($koment) > 500 ){
$_SESSION['err'] = '<font color=red>Не более 500 символов!</font>';
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
exit();
}


$tspam = mysql_fetch_array(mysql_query('select * from `forum_comments` where `avtor` = "'.$user['id'].'" and `koment` = "'.$koment1.'" and `time` > "'.(time()-90).'"'));
if($tspam != 0) {
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
$_SESSION['err'] = "<font color=red>Ваш коментарий повторяется!</font>";
exit();
}

if($user['game_time'] < 3600) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Общение на сайте доступно после проведения 1 Часа в игре.</font>";
exit();
}
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
$id = abs(intval($_GET['id']));
$forum_t = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_topic` WHERE `id` = '".$id."'"));

mysql_query('DELETE FROM `forum_fols` WHERE `topic` = "'.$forum_t['id'].'" ');
mysql_query("INSERT INTO `forum_comments` SET `koment` = '".$koment1."', `avtor` = '".$user['id']."', `time` = '".time()."' , `topic` = '".$id."' ");

if($mission_user_30['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_30['prog_']+1)."' WHERE `id` = '".$mission_user_30['id']."' ");
}
if($Achievements_user_29['prog'] < $Achievements_user_29['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_29['prog']+1)."' WHERE `id` = '".$Achievements_user_29['id']."' ");
}

header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
$_SESSION['err'] = "Коментарий успешно добавлен!";
exit();
}












}







echo '</div>';


if($forum_t['open'] == 1){
$text = 'Открыть';
$open = 0;
$imgg = '';
}else{
$text = 'Закрыть';
$open = 1;
$imgg = '/images/cross.png';
}

if($user['level'] >= 1) {
echo '<br><a class="btnl" href="?cloce_'.$id.'/"><img width="15" height="15" src="'.$imgg.'"> <span>'.$text.' топик</span></a>';
}

if(isset($_GET['cloce_'.$id.'/'])){
$_SESSION['err'] = 'Вы уверены?
<div class="mt4"><a class="btni accept" href="?cloce_'.$id.'_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
exit();
}
if(isset($_GET['cloce_'.$id.'_/'])){
mysql_query("UPDATE `forum_topic` SET 
`user_red` = '". $user['id']."',  
`time_red` = '".time()."',  
`open` = '".$open."'  
WHERE `id` = '".$forum_t['id']."' LIMIT 1");
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
exit();
}


if($user['level'] >= 2){
echo '<a class="btnl" style="margin-top:2px;" href="?DEL"><img width="24" height="24" src="/images/1.png"> <span>Очистить топик</span></a>';
if(isset($_GET['DEL'])){
$_SESSION['err'] = 'Удалить все комментарии данного топика?<div class="mt4"><a class="btni accept" href="?DEL_ok"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a> <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';header('Location: ?');exit();
}
if(isset($_GET['DEL_ok'])){
mysql_query('DELETE FROM `forum_comments` WHERE `topic` = '.$id.' ');
header('Location: ?');
exit();
}
}








if(isset($_GET['attached_'.$id.'/'])){
if($forum_t['attached'] == 0) {
mysql_query("UPDATE `forum_topic` SET `attached` = '1' WHERE `id` = '".$forum_t['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `forum_topic` SET `attached` = '0' WHERE `id` = '".$forum_t['id']."' LIMIT 1");
}
header('Location: '.$HOME.'forum/topic/'.$forum_t['id'].'/?page=top');
exit();
}
if($user['level'] >= 2) {
if($forum_t['attached'] == 0) {
echo '<a class="btnl" style="margin-top:2px;" href="?attached_'.$id.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Закрепить топик</span></a>';
}else{
echo '<a class="btnl" style="margin-top:2px;" href="?attached_'.$id.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Открепить топик</span></a>';
}
}




if($user['level'] >= 1 or $user['id'] == $forum_t['user']) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/seting_topic/'.$id.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Редактировать топик</span></a>';
}
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/razdel/'.$forum_r['id'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';



If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}





break;
case 'post_del':

$id1 = abs(intval($_GET['id1']));
$pagess = abs(intval($_GET['pagess']));
$forum_cc = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_comments` WHERE `id`='".$id1."' "));
$forum_tt = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_topic` WHERE `id` = '".$forum_cc['topic']."'"));

if($user['id'] != 1) {
if($forum_cc['avtor'] == $user['id']) {
header('Location: ?');
exit();
}
}
if($user['level'] < 1) {
$_SESSION['err'] = 'У Вас не достаточно прав для выполнения етого действия!';
header('Location: ?');
exit();
}
mysql_query('DELETE FROM `forum_comments` WHERE `id` = '.$forum_cc['id'].' ');
$_SESSION['err'] = 'Коментарий успешно удален!';
header('Location: '.$HOME.'forum/topic/'.$forum_tt['id'].'/?page='.$pagess.'');
exit();

break;
}


require_once ('../system/footer.php');
?>