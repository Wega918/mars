<?php
$title = 'Форум | Новый раздел';
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

$corp = abs(intval($_GET['corp']));

if($corp != $user['corp']){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'У Вас нет прав для просмотра данной страницы!';
exit();
}

echo '<div class="content">Новый раздел</div>';




echo '<div class="bordered">

<center><form action="" method="POST">
Название:<br> <input type="text" style="width: 95%;" name="name" value=""> <br>
Доступен для:<br/>
<select name="dostupen" style="width: 95%;">
<option value="0">Всех</option>
<option value="1">Членов Корпорации</option>
</select><br/>

<input class="mt4" type="submit" name="submit" value="Создать раздел">
</form></center>

</div>';




if(isset($_REQUEST['submit'])){
$name = strong($_POST['name']);
$dostupen = strong($_POST['dostupen']);

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

mysql_query("INSERT INTO `corp_forum_razdel` SET `name` = '".$name."', `dostupen` = '".$dostupen."',  `corp` = '".$user['corp']."' ");
header('Location: '.$HOME.'corp_forum/corp_'.$corp.'');
$_SESSION['err'] = 'Раздел создан!';
exit();
}








echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp_forum/corp_'.$corp.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>