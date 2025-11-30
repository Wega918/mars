<?php
$title = 'Форум | Редактирование';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['level'] < 2) {
header('Location: /');
exit();
}


$id = abs(intval($_GET['razdel']));
$razdel = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_razdel` WHERE `id` = '".$id."' "));

echo '<div class="content"><a href="'.$HOME.'forum/razdel/'.$id.'/">'.$razdel['name'].'</a> / Редактирование</div>';



if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_razdel` WHERE `id` = '".$id."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$forum_razdel = mysql_query("SELECT * FROM `forum_razdel` where `id` = '".$id."' LIMIT $start, $max");
while($f = mysql_fetch_assoc($forum_razdel)){
echo '<div class="bordered">

<center><form action="" method="POST">
Название:
<span style="float: right;">   <a href="?delete_'.$f['id'].'"><font size=2 color=red>[x]</font></a></span>
<br> <input type="text" style="width: 95%;" name="name" value="'.$f['name'].'"> <br>

Доступен для:<br/>
<select name="level" style="width: 95%;">
<option value="0">Всех</option>
<option value="1">Администрации</option>
</select><br/>';



if(isset($_REQUEST['submit'])){
	if($user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}
$level = strong($_POST['level']);
$name = strong($_POST['name']);

mysql_query("UPDATE `forum_razdel` SET `name` = '". ($name) ."', `level` = '". $level ."' WHERE `id` = '". $f['id'] ."' LIMIT 1");
header('Location: '.$HOME.'forum/razdel/'.$id.'/');
$_SESSION['err'] = 'Настройки сохранены!';
exit();
}

echo '<input class="mt4" type="submit" name="submit" value="Сохранить"></form></center></div>';





if(isset($_GET['delete_'.$f['id'].''])){
	if($user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}
$_SESSION['err'] = '<font color=red>Вы уверены, что хотите удалить раздел - '.$f['name'].' - ?</font>
<div class="mt4"><a class="btni accept" href="?delete_'.$f['id'].'_ok"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['delete_'.$f['id'].'_ok'])){
	if($user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}
mysql_query('DELETE FROM `forum_razdel` WHERE `id` = '.$f['id'].' ');
$_SESSION['err'] = 'Раздел '.$f['name'].' успешно удален!';
header('Location: '.$HOME.'forum/');
exit();
}


}









if ($k_page > 1) {
echo str(''.$HOME.'forum/?',$k_page,$page); // Вывод страниц
}










echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/razdel/'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>