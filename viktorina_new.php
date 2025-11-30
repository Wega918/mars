<?php
$title = 'Викторина';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']){
header('Location: '.$HOME.'');
exit();
}
/*if($user['level'] < 1){
header('Location: '.$HOME.'');
exit();
}*/
If($Ignore or $ban){
header('Location: '.$HOME.'');
exit();
}
if($user['level'] < 3) {
$_SESSION['err'] = '<font color=red>Ошибка! Вам сюда нельзя.</font>';
header('Location: '.$HOME.'');
exit();
}

if(isset($_GET['new1'])){
$vopros = strong($_POST['vopros']);
$otvet = strong($_POST['otvet']);
if(empty($vopros) ){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Необходимо заполнить все поля.</font>';exit();}
if(empty($otvet) ){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Необходимо заполнить все поля.</font>';exit();}
mysql_query("INSERT INTO `obr` SET `vopros` = '".$vopros."', `otvet` = '".mb_strtolower($otvet)."', `user` = '".$user['id']."', `time` = '".time()."' ");
header('Location: ?');
$_SESSION['err'] = 'Вопрос отправлен на обработку.';
exit();
}
if(isset($_GET['new/'])){
$_SESSION['err'] = '<center><form action="?new1" method="POST">
Вопрос: <br>
<input type="text" style="width: 80%;" name="vopros" maxlength="500" class="text"/><br>
Ответ (нижний регистр): <br>
<input type="text" style="width: 80%;" name="otvet" maxlength="500" class="text"/><br>

<input class="mt4" type="submit" name="submit" value="Добавить ">
</form></center><hr>
<font size=2><font size=3>•</font><b> Ответ писать только с маленькой буквы.</b></font><br>
<font size=2><font size=3>•</font><b> За каждый добавленный вопрос <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+75</font> </b></font>';
header("Location: ?");
exit();
}else{







if($user['level'] >= 1){
echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';

echo '<form action="" method="POST">
Введите вопрос: <br />
<input type="text" name="text1" value="" maxlength="300" /><br />
<input class="mt4" type="submit" name="submit" value="Искать">
</form>';










if(isset($_REQUEST['submit'])) {

$text1 = strong($_POST['text1']);
if($user['level'] < 1) {
$_SESSION['err'] = '<font color=red>Ошибка! Вам сюда нельзя.</font>';
header('Location: '.$HOME.'');
exit();
}
if(strlen($text1) < 1) {
$_SESSION['err'] = '<font color=red>Введите вопрос! <br>
<font size=2>(вопрос должен быть в точности как выводит система [без кол-ва букв])</font></font>';
header ('Location: ?');
exit();
}




$s = mysql_query("SELECT * FROM `viktorina` where `vopros` LIKE '%".$text1."%' ORDER BY `num` DESC ");
$sql = mysql_result(mysql_query("SELECT COUNT(*) FROM `viktorina` where `vopros` LIKE '%".$text1."%' "),0);

/* Выводим */
while($ip_fs = mysql_fetch_assoc($s)){
echo '<hr><font size=2 color=black>'.$ip_fs['vopros'].'</font> <a href="?del__'.$ip_fs['num'].'"><font size=2 color=red>[x]</font></a> 
<br><font size=2>Обработал '.nick($ip_fs['obr']).'</font>
<br><font size=2>Добавил '.nick($ip_fs['user']).'</font>
<br><font size=2 >'.$ip_fs['otvet'].'</font><hr>'; 

if(isset($_GET['del__'.$ip_fs['num'].''])){
if($user['level'] < 1){
header('Location: ?');
exit();
}
mysql_query('DELETE FROM `viktorina` WHERE `num` = "'.$ip_fs['num'].'" ');
header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

}

}



if($sql == 0) {
$_SESSION['err'] = '<font color=red>По вашему запросу ничего не найдено!</font>';
header('Location: ?');
exit();
}
echo '</center></div>';
}
}
If($Ignore or $ban){
}else{
echo '<a class="btnl mt4" href="?new/"><img src="/images/accept48.png" width="20" height="22"> Добавить вопрос</a>';
}

if($user['level'] >= 1){
echo '<a class="btnl mt4" href="'.$HOME.'viktorina_setting/"><img src="/images/news.png" width="20" height="22"> Редактор вопросов</a>';
}

































echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'viktorina/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('system/footer.php');
?>