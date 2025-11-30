<?php
$title = 'Изменение изображения';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
$id = abs(intval($_GET['id']));
$tiket = mysql_fetch_assoc(mysql_query("SELECT * FROM `tikets` WHERE `id` = '".$id."'"));
if($tiket == 0){
header('Location: '.$HOME.'tikets/');
$_SESSION['err'] = 'Такого тикета не существует!';
exit();
}





if(isset($_POST['ok'])) {
$maxsize = 1; // Максимальный размер файла,в мегабайтах 
$size = $_FILES['filename']['size']; // Вес файла

/* Если не выбрали файл */
if(!@file_exists($_FILES['filename']['tmp_name'])) {
$_SESSION['err'] = '<font color=red>Файл не выбран!</font>';
header("Location: ?");
exit();
}

/* Максимальный размер 1мб */
if ($size > (1048576 * $maxsize)) {
$_SESSION['err'] = '<font color=red>Максимальный размер файла '.$maxsize.'мб!</font>';
header("Location: ?");
exit();
}

/* Тип файлов которые можно загружать */
$filetype = array ( 'jpg', 'gif', 'png', 'jpeg', 'bmp' ); 
$upfiletype = substr($_FILES['filename']['name'],  strrpos( $_FILES['filename']['name'], ".")+1); 
  
/* Если тип файла не подходит */
if(!in_array($upfiletype,$filetype)) {
$_SESSION['err'] = '<font color=red>К загрузке разрешены файлы форматом JPG,GIF,PNG,JPEG,BMP!</font>';
header("Location: ?");
exit();
}

/* Если все окей,заливаем файл в папу и делаем запрос */
$files = ''.rand(1234,5678).''.rand(1234,5678).''.$_FILES['filename']['name']; 

/* Заливаем */
move_uploaded_file($_FILES['filename']['tmp_name'], "images/corp/".$files.""); 

/* Делаем запрос */
mysql_query("INSERT INTO `tikets_msg` SET `img` = '".$files."', `text` = '0', `user` = '".$user['id']."', `time` = '".time()."', `tiket_id` = '".$id."'   ");
$_SESSION['err'] = 'Успешно!';
header("Location: /tikets/viev_tiket/".$id."/");
exit();
}







echo '<div class="bordered">
<form enctype="multipart/form-data" action="?ok" method="POST">
Выберите файл:<br><input type="file" name="filename"/><br>   
<input class="mt4" type="submit" name="ok" value="Загрузить">
</form></div>';

echo '<center><div class="minor">К загрузке допускаются фотографии форматом JPG,GIF,PNG,JPEG,BMP!</div></center>';
echo '<a class="btnl mt4" href="?Instructions/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Важно!</a>';

if(isset($_GET['Instructions/'])){
$_SESSION['err'] = '
<font size=4 color=red>Внимание!!!</font>
<br>
К загрузке допускаются фотографии форматом JPG,GIF,PNG,JPEG,BMP!
<br>
Фотографии размером больше 1МВ не допускаются к загрузке!
<br>
Название фотографии должно быть на Английском языке, или в цифрах!
';
header("Location: ?");
exit();
}






require_once ('system/footer.php');
?>