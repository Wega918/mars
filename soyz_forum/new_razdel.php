<?php
$title = 'Форум | Новый раздел';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['soyz_rang'] > 2) {
header('Location: /');
exit();
}

$soyz = abs(intval($_GET['soyz']));

if($soyz != $user['soyz']){
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

mysql_query("INSERT INTO `soyz_forum_razdel` SET `name` = '".$name."', `dostupen` = '".$dostupen."',  `soyz` = '".$user['soyz']."' ");
header('Location: '.$HOME.'soyz_forum/soyz_'.$soyz.'');
$_SESSION['err'] = 'Раздел создан!';
exit();
}








echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz_forum/soyz_'.$soyz.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>