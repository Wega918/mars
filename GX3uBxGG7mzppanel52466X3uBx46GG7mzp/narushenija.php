<?php
$title = 'История нарушений';
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


$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($id)."'"));

if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.''.nick($id).' </span></li></ul></div>';








$narushenija = mysql_query("SELECT * FROM `narushenija` where `user` = '".$ank['id']."' ORDER BY `time` DESC ");
if(mysql_num_rows($narushenija) == 0){
echo '<center>Список нарушений пуст.</center>';
}

while($n = mysql_fetch_assoc($narushenija)){
$b++;

echo'<b>'.$b.'</b>. <span style="float: right;">  <font size=1 color=grey> '.vremja($n['time']).'</font></span> '.nick($n['kto']).'';
echo '<br>';
echo''.$n['text'].'';
echo '<hr>';

}











if($user['level'] == 3){
echo '<a class="btnl mt4" href="'.$HOME.'narushenija/'.$id.'/?reset"><img src="/images/1.png" width="20" height="22"> Очистить историю блокировок</a>';


if(isset($_GET['reset'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю блокировок игрока '.nick($id).'<br>
<font size=2>очистив историю блокировок, Вы автоматически снимаете все блокировки с данного игрока!</font>
<div class="mt4"><a class="btni accept" href="?reset_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['reset_'])){
if($user['level'] != 3){
header('Location: ?');
exit();
}
mysql_query('DELETE FROM `ban` WHERE `user` = '.$id.' ');
mysql_query('DELETE FROM `narushenija` WHERE `user` = '.$id.' ');
header('Location: ?');
exit();
}

}










echo '<a class="btnl mt4" href="'.$HOME.'igrok_'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');
?>