<?php
$title = 'Смайлы';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}


switch($_GET['act']){
default:

$smile = mysql_fetch_assoc(mysql_query("SELECT * FROM `smile_p` WHERE `id` = '1'"));

if($user['level'] == 3){
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'smile/newsmile_'.$smile['id'].'/">  Добавить смайлов</a>';
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;">';

$sm = mysql_query("SELECT * FROM `smile` WHERE `papka` = '1' ORDER BY `id` DESC");

$sm = mysql_query("SELECT * FROM `smile` WHERE `papka` = '1' ORDER BY `id` DESC");
while($s = mysql_fetch_assoc($sm)){
if($user['level'] == 3 ){
$delete = '<a href="?delete_'.$s['id'].'/"><font color=red>[X]</font></a>';
}else{
$delete = '';
}

echo '<div class="player">'.$delete.' '.$s['name'].' -> <img src="'.$HOME.'files/smile/'.$s['icon'].'" alt="'.$s['icon'].'" /></div> ';
if(isset($_GET['delete_'.$s['id'].'/'])){

if($user['level'] == 3 ){
mysql_query("DELETE FROM `smile` WHERE `id` = '".$s['id']."' ");
header('Location: ?');
$_SESSION['err'] = "Смайл удален.";
exit();
}

}

}


while($s = mysql_fetch_assoc($sm)){
echo '<div class="player">'.$s['name'].' ->  <img src="'.$HOME.'files/smile/'.$s['icon'].'" alt="'.$s['icon'].'" /></div>';
}

echo '</div>';
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/razdel/2/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернутся</a>';

break;













case 'newsmile':

$id = abs(intval($_GET['id']));
$smile = mysql_fetch_assoc(mysql_query("SELECT * FROM `smile_p` WHERE `id` = '".$id."'"));



if($user['level'] != 3) {
header('Location: '.$HOME.'smile/');
exit();
}




if(isset($_REQUEST['ok'])) {
$name = strong($_POST['name']);

$ttte = mysql_fetch_array(mysql_query('select * from `smile` where `name` = "'.$name.'"'));
if($ttte != 0) {
echo '<div class="player"><center><b>Такая смайл уже существует!</b></center></div>';
require_once ('system/footer.php');
exit();
}

$maxsize = 1; // Максимальный размер файла,в мегабайтах 
$size = $_FILES['filename']['size']; // Вес файла

/* Если не выбрали файл */
if(!@file_exists($_FILES['filename']['tmp_name'])) {
echo '<div class="player"><center><b>Вы не выбрали файл!</b></center></div>';
require_once ('../system/footer.php');
exit();
}

/* Максимальный размер 1мб */
if ($size > (1048576 * $maxsize)) {
echo '<div class="podmenu"><center><b>Максимальный размер файла '.$maxsize.'мб!</b></center></div>';
require_once ('../system/footer.php');
exit();
}

/* Тип файлов которые можно загружать */
$filetype = array ( 'jpg', 'gif', 'png', 'jpeg', 'bmp' ); 
$upfiletype = substr($_FILES['filename']['name'],  strrpos( $_FILES['filename']['name'], ".")+1); 
  
/* Если тип файла не подходит */
if(!in_array($upfiletype,$filetype)) {
echo '<div class="player"><center><b>К загрузке разрешены файлы форматом JPG,GIF,PNG,JPEG,BMP!</b></center></div>';
require_once ('../system/footer.php');
exit();
}

/* Если все окей,заливаем файл в папу и делаем запрос */
$files = 'files_'.rand(1234,5678).'_'.rand(1234,5678).'_'.$_FILES['filename']['name']; 

/* Заливаем */
move_uploaded_file($_FILES['filename']['tmp_name'], "files/smile/".$files.""); 

/* Делаем запрос */

mysql_query("INSERT INTO `smile` SET `name` = '".$name."', `icon` = '".$files."', `papka` = '1'");
echo '<div class="player"><center><b>Новый смайл добавлен!</b></center></div>';
}






echo '<div class="bordered">
<form action="" method="post" enctype="multipart/form-data">
Название:<br /><input type="text" name="name" maxlength="30" /><br /> 
Выберите файл:<br><input type="file" name="filename"/><br>   
<center><input class="mt4" type="submit" name="ok" value="Загрузить"></center>
</form></div>';



echo '<center><div class="minor">К загрузке допускаются фотографии форматом JPG,GIF,PNG,JPEG,BMP!</div></center>';





echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'smile/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернутся</a>';



break;
}





require_once ('system/footer.php');
?>