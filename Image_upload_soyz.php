<?php
$title = 'Изменение изображения';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['soyz_rang'] != 1 && $user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}






if(isset($_REQUEST['ok'])) {
$maxsize = 1; // Максимальный размер файла,в мегабайтах 
$size = $_FILES['filename']['size']; // Вес файла


if($soyz['rubin'] < 1000) {
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
header("Location: ?");
exit();
}

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
$files = 'files_'.rand(1234,5678).'_'.rand(1234,5678).'_'.$_FILES['filename']['name']; 

/* Заливаем */
move_uploaded_file($_FILES['filename']['tmp_name'], "images/soyz/".$files.""); 

/* Делаем запрос */
mysql_query("UPDATE `soyz` SET `images` = '".$files."', `rubin` = '".($soyz['rubin']-1000)."'  WHERE `id` = '$soyz[id]' LIMIT 1");
$_SESSION['err'] = 'Успешно!';
header("Location: ?");
exit();
}




if($soyz['images'] == 1){
echo '<a href="'.$HOME.'soyz/Image_upload_soyz/"><img width="480" height="160" alt="'.$soyz['name'].'" src="/images/soyz/1.jpg" title="'.$soyz['name'].'"></a>';
}else{
echo '<a href="'.$HOME.'soyz/Image_upload_soyz/"><img width="480" height="160" alt="'.$soyz['name'].'" src="/images/soyz/'.$soyz['images'].'" title="'.$soyz['name'].'"></a>';
}



echo '<div class="bordered">
<div class="mt4 center">
Внимание! Стоимость смены изображения <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">1000</span>
</span></div>

<form action="" method="post" enctype="multipart/form-data">

Выберите файл:<br><input type="file" name="filename"/><br>   
<input class="mt4" type="submit" name="ok" value="Загрузить">
</form></div>';



echo '<center><div class="minor">К загрузке допускаются фотографии форматом JPG,GIF,PNG,JPEG,BMP!</div></center>';







echo '<a class="btnl mt4" href="?Instructions/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Важно!</a>';
echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> Вернуться</a>';





if(isset($_GET['Instructions/'])){
$_SESSION['err'] = '
<font size=4 color=red>Внимание!!!</font>
<br>
К загрузке допускаются фотографии форматом JPG,GIF,PNG,JPEG,BMP!
<br>
После загрузки фотографии, его расширение изменяется на 480 х 160 Перед загрузкой лучше изменить расширение самому и посмотреть на результат!! 
<br>
Фотографии размером больше 1МВ не допускаются к загрузке!
<br>
Стоимость смены фотографии <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">1000</span> с фонда Союза!
<br>
Название фотографии должно быть на Английском языке, или в цифрах!
';
header("Location: ?");
exit();
}






require_once ('system/footer.php');
?>