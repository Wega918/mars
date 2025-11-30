<?php
$title = 'Просмотр чата Корпорации';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}

$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id` = '".mysql_real_escape_string($id)."'"));


if($ank == 0){
$_SESSION['err']='Такой Корпорации не существует!';
header ('Location: /');
exit();
}
echo '<a class="btnl mt4" href="?"><img src="/images/refresh_white2.png" width="24" height="24" alt="" title=""> Обновить</a>';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.' <b>"'.$ank['name'].'</b>"</span></li></ul></div>';












if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass_br` WHERE `clan_id` = '".$ank['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `ass_br` WHERE `clan_id` = '".$ank['id']."' ORDER BY `time` DESC LIMIT $start, $max");
while($post = mysql_fetch_assoc($query)){
$avtor = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['avtor']."'"));
$enot_komu = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['id_komu']."'"));

if($user['level'] <= 1){
$del = '<a href="?delmsg_'.$post['id'].'/"><b><font color=indianred>x</font></b></a>';
}else{
$del = '';
}


echo'<div class=player> '.$del.'<span style="float: right;">  <font size=1 color=grey> '.times($post['time']).'</font></span> '.$iggg.' '.nick($post['avtor']).'';
echo '<br>';
if($post['id_komu'] == $user['id']){
echo'<font color=red>'.filter(bb1(smile($post['msg']))).'</font>';
}else{
echo''.filter(bb1(smile($post['msg']))).'';
}
echo '<hr>';



if(isset($_GET['delmsg_'.$post['id'].'/'])){

if(!$post['id']){
header('Location: ?');
$_SESSION['err'] = "<font color=red>Такого сообщения не существует!</font>";
exit();
}
if($user['level'] < 1){
header('Location: ?');
$_SESSION['err'] = "<font color=red>Вам отказано в доступе!</font>";
exit();
}
mysql_query("DELETE FROM `ass_br` WHERE `id` = '".$post['id']."'");
header('Location: ?');
$_SESSION['err'] = "Сообщение успешно удалено!";
exit();
}




}


if($k_post < 1){
echo '<center><b>Сообщений не найдено...</b></center>';
}

if ($k_page > 1) {
echo str(''.$HOME.'view_chat_corp/'.$id.'/?',$k_page,$page); // Вывод страниц
}



echo '<a class="btnl mt4" href="'.$HOME.'corp/'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
require_once ('../system/footer.php');
?>