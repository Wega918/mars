<?php
$title = 'Форум | Редактирование';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['corp_rang'] > 2) {
header('Location: /');
exit();
}

$razdel = abs(intval($_GET['razdel']));
$razdel1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp_forum_razdel` WHERE `id` = '".$razdel."' "));
$corp = abs(intval($_GET['corp']));

if($corp != $user['corp']){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'У Вас нет прав для просмотра данной страницы!';
exit();
}

echo '<div class="content"><a href="'.$HOME.'corp_forum/razdel_'.$razdel.'/corp_'.$corp.'/">'.$razdel1['name'].'</a> / Редактирование</div>';



if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_razdel` WHERE `id` = '".$razdel."'  "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$corp_forum_razdel = mysql_query("SELECT * FROM `corp_forum_razdel` WHERE `id` = '".$razdel."'  ORDER BY `id` DESC LIMIT $start, $max");
while($f = mysql_fetch_assoc($corp_forum_razdel)){
echo '<div class="bordered">

<center><form action="" method="POST">
Название:
<span style="float: right;">   <a href="?delete_'.$f['id'].'/"><font size=2 color=red>[x]</font></a></span>
<br> <input type="text" style="width: 95%;" name="name" value="'.$f['name'].'"> <br>

Доступен для:<br/>
<select name="dostupen" style="width: 95%;">
<option value="0">Всех</option>
<option value="1">Членов Корпорации</option>
</select><br/>';


echo '<input class="mt4" type="submit" name="submit" value="Сохранить"></form></center></div>';



if(isset($_REQUEST['submit'])){
$dostupen = strong($_POST['dostupen']);
$name = strong($_POST['name']);

if(mb_strlen($name) < 3 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите название раздела от 3 символов!</font>';
exit();
}
if(mb_strlen($name) > 25 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите название раздела не более 25 символов!</font>';
exit();
}

mysql_query("UPDATE `corp_forum_razdel` SET `name` = '".$name."',  `dostupen` = '".$dostupen."'   WHERE `id` = '". $f['id'] ."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Настройки сохранены!';
exit();
}

if(isset($_GET['delete_'.$f['id'].'/'])){
$_SESSION['err'] = '<font color=red>Вы уверены, что хотите удалить раздел - '.$f['name'].' - ?</font>
<div class="mt4"><a class="btni accept" href="?delete_'.$f['id'].'_ok"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['delete_'.$f['id'].'_ok'])){
mysql_query('DELETE FROM `corp_forum_razdel` WHERE `id` = '.$f['id'].' ');
$_SESSION['err'] = 'Раздел -'.$f['name'].'- успешно удален!';
header('Location: '.$HOME.'corp_forum/corp_'.$corp.'/');
exit();
}
}






echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp_forum/razdel_'.$razdel.'/corp_'.$corp.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>