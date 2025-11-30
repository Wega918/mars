<?php
$title = 'Проверка на мультоводство';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';







$id = strong($_POST['id']);
if($id) {
$userss = mysql_query('SELECT * FROM `users` WHERE `id` = "'.mysql_real_escape_string($id).'"');
$use = mysql_fetch_array($userss);

$count = mysql_result(mysql_query('SELECT COUNT(*) FROM `users` WHERE `ip` = "'.$use['ip'].'"  '),0);


if($count > 0) {

$q = mysql_query('SELECT * FROM `users` WHERE `ip` = "'.$use['ip'].'"  ');
while($row = mysql_fetch_array($q)) {
echo " ".nick($row['id'])." <hr>";
}
echo " IP: ".$use['ip']." <br> [".$use['browser']."]<br/>";
}else{
echo '<font color="#999">Персонажей нет!</font>';
}

}else{
echo '<form action="'.$HOME.'Clon/" method="post">ID персонажа:<br/><input name="id"/><br/><input type="submit" value="Поиск"/></form>';
}







echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');
?>