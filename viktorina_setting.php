<?php
$title = 'Редактор вопросов';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']){
header('Location: '.$HOME.'');
exit();
}
if($user['level'] < 3) {
$_SESSION['err'] = '<font color=red>Ошибка! Вам сюда нельзя.</font>';
header('Location: '.$HOME.'');
exit();
}











echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
$viktorina_vopr = mysql_result(mysql_query("SELECT COUNT(*) FROM `viktorina` WHERE `num` "),0);

if($viktorina_vopr > 0){
if (empty($user['max'])) $user['max']=10;
$max = 500;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `viktorina` WHERE `num` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$settings_vik = mysql_query("SELECT * FROM `viktorina` WHERE `num` ORDER BY `num` DESC LIMIT $start,$max");
while($set_vik = mysql_fetch_assoc($settings_vik)){

echo '<a href="?del_'.$set_vik['num'].'"><font size=2 color=red>[Удалить вопрос]</font></a><br>
<br><font size=2>Обработал '.nick($set_vik['obr']).'</font>
<br><font size=2>Добавил '.nick($set_vik['user']).'</font><hr>'; 




if(isset($_GET['del_'.$set_vik['num'].''])){
header("Location: ".$_SERVER['HTTP_REFERER']);
$_SESSION['err'] = '<center>Удалить вопрос?</center>
<div class="mt4"><a class="btni accept" href="?del'.$set_vik['num'].'"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
exit();
}
if(isset($_GET['del'.$set_vik['num'].''])){
mysql_query('DELETE FROM `viktorina` WHERE `num` = "'.$set_vik['num'].'" ');
header("Location: ".$_SERVER['HTTP_REFERER']);
$_SESSION['err'] = 'Успешно!';
exit();
}







if(isset($_REQUEST['ok_'.$set_vik['num'].''])){
if($user['level'] < 1) {
$_SESSION['err'] = '<font color=red>Ошибка! Вам сюда нельзя.</font>';
header('Location: '.$HOME.'');
exit();
}

$vopros = strong($_POST['vopros']);
$otvet = strong($_POST['otvet']);

mysql_query("UPDATE `viktorina` SET
`vopros` = '".$vopros."',
`otvet` = '".$otvet."'
WHERE `num` = '".$set_vik['num']."'");

header("Location: ".$_SERVER['HTTP_REFERER']);
$_SESSION['err'] = 'Успешно!';
exit();
}




echo '<form action="" method="POST">';
echo '
<span class="float-right"><input type="text" style="width: 95%;" name="vopros" maxlength="1000" value="'.$set_vik['vopros'].'"/></span><br>
<span class="float-right"><input type="text" name="otvet" maxlength="25" value="'.$set_vik['otvet'].'"/></span>';
echo '<center><input type="submit" name="ok_'.$set_vik['num'].'" value="Изменить" style="width:50%;"/></form></center><hr>';







}
if ($k_page > 1) {
echo str(''.$HOME.'viktorina_setting/?',$k_page,$page); // Вывод страниц
}

}else{
echo 'Вопросов не найдено...';
}
echo '</span></li></ul></div>';














echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'viktorina_new/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('system/footer.php');
?>