<?php
$title = 'Экспедиция';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
//
if($expedition_user['time'] < time() && $expedition_user['time'] > 0){
header('Location: '.$HOME.'sav/');
exit();
}
if(!$expedition_user){
header('Location: '.$HOME.'expedition/');
exit();
}


echo '<div class="content">
<a class="fl" href="'.$HOME.'Achievements/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Достижения" title="Достижения"></a>
<a class="fr" href="'.$HOME.'prestig/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Престиж" title="Престиж"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';




echo '<br>';
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<font  size=4>'.$title.'</font>';
echo '</span></li></ul></div>';





if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `expedition_user` WHERE `user` = '".$user['id']."' or `pom_1`  = '".$user['id']."'  or `pom_2`  = '".$user['id']."'  or `pom_3`  = '".$user['id']."'  or `pom_4`  = '".$user['id']."'  or `pom_5`  = '".$user['id']."'  "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$expedition_user = mysql_query("SELECT * FROM `expedition_user` WHERE `user` = '".$user['id']."' or `pom_1`  = '".$user['id']."'  or `pom_2`  = '".$user['id']."'  or `pom_3`  = '".$user['id']."'  or `pom_4`  = '".$user['id']."'  or `pom_5`  = '".$user['id']."'  ORDER BY `id` ASC LIMIT $start,$max");
while($exp_user = mysql_fetch_assoc($expedition_user)){


echo '<div class="feedback"><div><div style="margin-top: 4px;">';

echo '<center>';
if($exp_user['level_'] == 1){
echo '<img src="/images/mission/star.png" width="20" height="20" alt=""> ';
echo '<img src="/images/mission/star.png" width="20" height="20" alt=""> ';
echo '<img src="/images/mission/star.png" width="20" height="20" alt=""> ';
}
if($exp_user['level_'] == 2){
echo '<img src="/images/mission/star_.png" width="20" height="20" alt=""> ';
echo '<img src="/images/mission/star.png" width="20" height="20" alt=""> ';
echo '<img src="/images/mission/star.png" width="20" height="20" alt=""> ';
}
if($exp_user['level_'] == 3){
echo '<img src="/images/mission/star_.png" width="20" height="20" alt=""> ';
echo '<img src="/images/mission/star_.png" width="20" height="20" alt=""> ';
echo '<img src="/images/mission/star.png" width="20" height="20" alt=""> ';
}

echo '</center><hr>';

echo '<span class="fl nobr"><span><font size=2>Уровень экспедиции: <font color=black>'.$exp_user['level'].'</font></font></span></span>
<span class="fr nobr"><span><img width="18" height="18" alt="" src="/images/clock.png"> <font size=2 color=black><span id="time_'.($exp_user['time']-time()).'000">'._time($exp_user['time']-time()).'</span></font></span></span>
<br><hr>';




echo '<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>';


if($exp_user['pom_1'] != 0){$pom_1 = ' '.nick($exp_user['pom_1']).' ';}
if($exp_user['pom_2'] != 0){$pom_2 = ' '.nick($exp_user['pom_2']).' <br>';}
if($exp_user['pom_3'] != 0){$pom_3 = ' '.nick($exp_user['pom_3']).' ';}
if($exp_user['pom_4'] != 0){$pom_4 = ' '.nick($exp_user['pom_4']).' ';}
if($exp_user['pom_5'] != 0){$pom_5= ' '.nick($exp_user['pom_5']).'';}

if($exp_user['pom_1'] <= 0){
$pom = 'отсутствуют';
}else{
$pom = ''.$pom_1.''.$pom_2.''.$pom_3.''.$pom_4.''.$pom_5.'';
}

echo '<span class="fl nobr"><font size=2>Руководитель экспедиции '.nick($exp_user['user']).'</font></span><br>
<span class="fl nobr"><font size=2>До конца экспедиции осталось: </font><font size=2 color=black><span id="time_'.($exp_user['time']-time()).'000">'._time($exp_user['time']-time()).'</font></span></span>
<span class="fl nobr"><font size=2>Помощники экспедиции: </font><font size=2 color=black>'.$pom.'</font></span>';



echo '</tr></tbody></table></center>';

echo '<hr>';
echo '</span></li></ul></div></div></div>';

if($exp_user['user'] == $user['id']){
echo '<font size=2>';
///###############################################################################################################################################
?>
<div id="pokazat"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;">
Пригласить друга
</a>
</div> 


<div id="skryt" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;">
Пригласить друга
</a><?


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';

echo '<span class="fl nobr"> Каждый присоеденившийся друг это <font color=black>(-1ч.)</font> от времени експедиции</span><br>
<span class="fl nobr"> и <font color=black>(+10%)</font> к рубинам и мусору.</span><br><hr>
<span class="fl nobr"> Присоеденяться к експедиции можно только игрокам </span><br>
<span class="fl nobr">которые регистрировались по Ваше реф-ссылке и провели в игре </span><br>
<span class="fl nobr">более 2-х часов.</span><br><hr>
<span class="fl nobr"> Присоедениться к експедиции может не более 5 человек.</span><br><hr>
<a class="btnl mt4" href="'.$HOME.'user/ref/">Список рефералов</a>';
echo '</span></li></ul></div>';


?></div><?

?>
<?
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if($exp_user['level_'] == 1){
echo '<a class="btnl" style="margin-top:2px;" href="?del"><img src="/images/cross.png" width="20" height="20"> Отменить экспедицию</a>';
}
if(isset($_GET['del'])){
$_SESSION['err'] = 'Вы уверны?
<div class="mt4"><a class="btni accept" href="?dell"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['dell'])){
if($exp_user['user'] != $user['id']){
header('Location: '.$HOME.'expeditions/');
exit();
}
if($exp_user['level_'] > 1){
$_SESSION['err'] = 'Ошибка!';
header('Location: '.$HOME.'expeditions/');
exit();
}

if($exp_user['pom_1'] != 0){
$text_dell = 'Руководитель '.nick($user['id']).' отменил экспедицию.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_1']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_1']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_1']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_1']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_1']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_dell."', `kto` = '2', `komy` = '".$exp_user['pom_1']."', `time` = '".time()."', `readlen` = '0'");
}
if($exp_user['pom_2'] != 0){
$text_dell = 'Руководитель '.nick($user['id']).' отменил экспедицию.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_2']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_2']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_2']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_2']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_2']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_dell."', `kto` = '2', `komy` = '".$exp_user['pom_2']."', `time` = '".time()."', `readlen` = '0'");
}
if($exp_user['pom_3'] != 0){
$text_dell = 'Руководитель '.nick($user['id']).' отменил экспедицию.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_3']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_3']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_3']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_3']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_3']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_dell."', `kto` = '2', `komy` = '".$exp_user['pom_3']."', `time` = '".time()."', `readlen` = '0'");
}
if($exp_user['pom_4'] != 0){
$text_dell = 'Руководитель '.nick($user['id']).' отменил экспедицию.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_4']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_4']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_4']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_4']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_4']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_dell."', `kto` = '2', `komy` = '".$exp_user['pom_4']."', `time` = '".time()."', `readlen` = '0'");
}
if($exp_user['pom_5'] != 0){
$text_dell = 'Руководитель '.nick($user['id']).' отменил экспедицию.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['pom_5']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['pom_5']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['pom_5']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['pom_5']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['pom_5']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_dell."', `kto` = '2', `komy` = '".$exp_user['pom_5']."', `time` = '".time()."', `readlen` = '0'");
}

$text_dell = 'Вы отменили экспедицию.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$exp_user['user']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$exp_user['user']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$exp_user['user']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$exp_user['user']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$exp_user['user']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text_dell."', `kto` = '2', `komy` = '".$exp_user['user']."', `time` = '".time()."', `readlen` = '0'");

mysql_query('DELETE FROM `expedition_user` WHERE `user` = "'.$user['id'].'" ');
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}








echo '</font>';
}



}







require_once ('../system/footer.php');
?>