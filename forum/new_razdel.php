<?php
$title = 'Форум | Новый раздел';
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
echo '<div class="content">Новый раздел</div>';




echo '<div class="bordered">

<center><form action="" method="POST">
Название:<br> <input type="text" style="width: 95%;" name="name" value=""> <br>


Доступен для:<br/>
<select name="level" style="width: 95%;">
<option value="0">Всех</option>
<option value="1">Администрации</option>
</select><br/>



<input class="mt4" type="submit" name="submit" value="Создать раздел">
</form></center>

</div>';




if(isset($_REQUEST['submit'])){
$level = strong($_POST['level']);
$name = strong($_POST['name']);
if($user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}
if(mb_strlen($name) < 3 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Введите название раздела от 3 символов!</font>';
exit();
}
mysql_query("INSERT INTO `forum_razdel` SET `name` = '".($name)."', `level` = '".$level."'");
header('Location: '.$HOME.'forum/');
$_SESSION['err'] = 'Раздел создан!';
exit();
}








echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?>