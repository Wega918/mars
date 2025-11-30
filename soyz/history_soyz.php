<?php
$title = 'История';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['soyz'] < 1) {
header('Location: /');
exit();
}


//////////////////////////////////////////////////////////////////////////////////////
$his_soyz = mysql_query("SELECT * FROM `history_soyz` WHERE `id` ");
$hs = mysql_fetch_array ($his_soyz);
do {
if(($hs['time']+259200) <= time()){
mysql_query('DELETE FROM `history_soyz` WHERE `id` = '.$hs['id'].' ');
}
} while ($hs = mysql_fetch_array ($his_soyz));
//////////////////////////////////////////////////////////////////////////////////////



if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `history_soyz` WHERE `soyz` = '".$user['soyz']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `history_soyz` WHERE `soyz` = '".$user['soyz']."' ORDER BY `time` DESC LIMIT $start, $max");
while($f = mysql_fetch_assoc($query)){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font size=2>';
echo ' '.smile($f['text']).'            <font size=2 color=black> '.vremja($f['time']).'</font>'; 
echo '</font></span></li></ul></div>';
}


if($k_post < 1){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font size=2>';
echo ' Записей не найдено!'; 
echo '</font></span></li></ul></div>';
}

///##########################################################################################################################################
if($k_post >= 1){
if($user['soyz_rang'] <= 1){
echo '<a class="btnl mt4" href="?Reset_history/"><img src="/images/1.png" width="20" height="22"> Очистить историю</a>';
}

if(isset($_GET['Reset_history/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю Корпорации?
<div class="mt4"><a class="btni accept" href="?Reset_history_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset_history_/'])){
if($user['soyz_rang'] > 1){
header('Location: ?');
exit();
}
mysql_query('DELETE FROM `history_soyz` WHERE `soyz` = '.$soyz['id'].' ');
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Очистил историю.</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$soyz['id']."', `text` = '$text', `time` = '".time()."'");
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}
}
///##########################################################################################################################################





if ($k_page > 1) {
echo str(''.$HOME.'soyz/history_soyz/?',$k_page,$page); // Вывод страниц
}







require_once ('../system/footer.php');
?>