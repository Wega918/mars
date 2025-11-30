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

$razdel = abs(intval($_GET['razdel']));
$topic = abs(intval($_GET['topic']));
$soyz = abs(intval($_GET['soyz']));
$razdel1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_forum_razdel` WHERE `id` = '".$razdel."' "));
$topic1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_forum_topic` WHERE `id` = '".$topic."'"));

if($topic == 0) {
header('Location: '.$HOME.'soyz_forum/soyz_'.$soyz.'/');
$_SESSION['err'] = 'Такого топика не существует!';
exit();
}
if($soyz != $user['soyz'] and $razdel1['dostupen'] == 1) {
header('Location: '.$HOME.'');
$_SESSION['err'] = 'У Вас нет прав для просмотра данной страницы!';
exit();
}



$soyz_forum_fols = mysql_fetch_array(mysql_query('SELECT * FROM `soyz_forum_fols` WHERE `user` = "'.$user['id'].'" and `razdel`  = "'.$razdel.'" and `topic` = "'.$topic.'" and `soyz` = "'.$soyz.'" '));
if(!$soyz_forum_fols){
mysql_query("INSERT INTO `soyz_forum_fols` SET `user` = '".$user['id']."', `razdel` = '".$razdel."', `topic` = '".$topic."', `soyz` = '".$soyz."' ");
}





echo '<div class="content"><a href="'.$HOME.'soyz_forum/razdel_'.$razdel.'/soyz_'.$soyz.'/">'.$razdel1['name'].'</a> / '.$topic1['name'].'</div>';





echo '<div class="bordered">'.nick($topic1['user']).'
<span style="float: right;">   <font size=2 color=black>('.times($topic1['time']).')</font></span>
<br>'.nl2br(filter(smile(bb($topic1["text"])))).'</div>';


if($topic1['open'] == 0){
$open = '<font size=2>Открыт</font>';
}else{
$open = '<font size=2 color=red>Закрыт</font>';
}

echo '<div class="bordered">
<font size=2>Топик:</font> '.$open.' ';
if($topic1['user_red'] > 0){
echo '<span style="float: right;">   <font size=2 color=black>Ред: '.nick($topic1['user_red']).'  ('.times($topic1['time_red']).')</font></span>';
}
echo '</div>';








echo '<br><center>Коментарии: </center><br><div class="bordered">';




if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_comments` WHERE `topic` = '".$topic."'"),0);
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_comments` WHERE `soyz` = '".$soyz."' and `topic` = '".$topic."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `soyz_forum_comments` WHERE `soyz` = '".$soyz."' and `topic` = '".$topic."' ORDER BY `id` DESC LIMIT $start, $max");
while($forum_c = mysql_fetch_assoc($query)){

if($user['soyz'] == $soyz or $user['level'] >= 1){
if($user['soyz_rang'] <= 2 or $user['level'] >= 1){
$delete = '<a href="/soyz_forum/post_del'.$forum_c['id'].'/'.$page.'/'.$soyz.'/'.$razdel.'/"><font color=red>[x]</font></a> ';
}else{
echo '';
}
}



echo ''.nick($forum_c['avtor']).'
<span style="float: right;">   <font size=2 color=black>('.times($forum_c['time']).')</font>'.$delete.'</span>
<br>'.nl2br(filter(smile(bb($forum_c["koment"])))).'';
echo '<hr>';



if(isset($_GET['delete_coments_'.$forum_c['id'].'/'])){
if($user['soyz_rang'] > 2){
$_SESSION['err'] = 'У Вас не достаточно прав для выполнения етого действия!';
header('Location: ?');
exit();
}
mysql_query('DELETE FROM `soyz_forum_comments` WHERE `id` = '.$forum_c['id'].' ');
$_SESSION['err'] = 'Коментарий успешно удален!';
header('Location: ?');
exit();
}


}


if($ONL < 1){
echo '<center>Коментариев не найдено!</center>';
}

if ($k_page > 1) {
echo str(''.$HOME.'soyz_forum/razdel_'.$razdel.'/topic_'.$topic.'/soyz_'.$soyz.'/?',$k_page,$page); // Вывод страниц
}







if($topic1['open'] == 0){

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
border-radius: 4px;" href="#">
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








if(isset($_REQUEST['koment'])) {

$koment = strong($_POST['koment']);
$koment1 = '<font color=#800000>'.$koment.'</font>';

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
$tim = mysql_query("SELECT * FROM `soyz_forum_comments` WHERE `avtor` = '".$user['id']."' ORDER BY `time` DESC");
while($ncm2 = mysql_fetch_assoc($tim)){
$news_antispam = mysql_fetch_assoc(mysql_query("SELECT * FROM `antispam` WHERE `koment_topik` "));
$ncm_timeout = $ncm2['time'];

if((time()-$ncm_timeout) < $news_antispam['koment_topik']) {
header('Location: ?');
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

$tspam = mysql_fetch_array(mysql_query('select * from `soyz_forum_comments` where `avtor` = "'.$user['id'].'" and `koment` = "'.$koment1.'" and `time` > "'.(time()-90).'"'));
if($tspam != 0) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Ваш коментарий повторяется!</font>";
exit();
}
if($user['game_time'] < 3600) {
header('Location: ?');
$_SESSION['err'] = "<font color=red>Общение на сайте доступно после проведения 1 Часа в игре.</font>";
exit();
}
mysql_query('DELETE FROM `soyz_forum_fols` WHERE `topic` = "'.$topic.'" and `soyz` = "'.$soyz.'" ');
mysql_query("INSERT INTO `soyz_forum_comments` SET `koment` = '".$koment1."', `avtor` = '".$user['id']."', `time` = '".time()."' , `topic` = '".$topic."', `soyz` = '".$soyz."' ");
header('location: ?');
$_SESSION['err'] = "Коментарий успешно добавлен!";
exit();
}












}







echo '</div></div>';

If(!$Ignore){



if($user['soyz'] == $soyz or $user['level'] >= 1){
if($user['soyz_rang'] <= 2 or $user['level'] >= 1){
if($topic1['user'] == $user['id'] or $user['level'] >= 1){
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz_forum/seting_topic_'.$topic.'/razdel_'.$razdel.'/soyz_'.$soyz.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Редактировать топик</span></a>';
}
}
}

}

echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz_forum/razdel_'.$razdel.'/soyz_'.$soyz.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';


If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}






break;
case 'post_del':

$id1 = abs(intval($_GET['id1']));
$soyz1 = abs(intval($_GET['soyz']));
$razdel1 = abs(intval($_GET['razdel']));
$pagess = abs(intval($_GET['pagess']));
$forum_cc = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_forum_comments` WHERE `id`='".$id1."' "));
$forum_tt = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_forum_topic` WHERE `id` = '".$forum_cc['topic']."'"));

if($user['soyz_rang'] > 2){
$_SESSION['err'] = 'У Вас не достаточно прав для выполнения етого действия!';
header('Location: ?');
exit();
}

mysql_query('DELETE FROM `soyz_forum_comments` WHERE `id` = '.$forum_cc['id'].' ');
$_SESSION['err'] = 'Коментарий успешно удален!';
header('Location: '.$HOME.'forum/topic/'.$forum_tt['id'].'/?page='.$pagess.'');
header('Location: '.$HOME.'soyz_forum/razdel_'.$razdel1.'/topic_'.$forum_tt['id'].'/soyz_'.$soyz1.'/?page='.$pagess.'');
exit();

break;
}






require_once ('../system/footer.php');
?>