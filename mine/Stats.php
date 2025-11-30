<?php
$title = 'Статистика';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}


$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));
if($ank == 0){
header('Location: /');
$_SESSION['err'] = 'Такого пользователя не существует!';
exit();
}

if($user['level'] == 0){
if($ank['id'] != $user['id']){
header('Location: /');
exit();
}
}



echo'<div class="bordered" style="margin-top: 4px; position: relative;"><div class="center">';
echo '<div><div style="margin-top: 4px;">


<span class="nobr"> <font size=2> Всего добыто Рубинов: <img width="17" height="17" alt="" src="/images/ruby.png"> <font color=red>'.n_f($ank['rubin_where']).'</font> </font></span><br>
<span class="nobr"> <font size=2> Всего добыто Алмазов: <img width="17" height="17" alt="" src="/images/Diamonds.png"> <font color=red>'.n_f($ank['diamonds_where']).'</font> </font></span><br>
<span class="nobr"> <font size=2> Всего добыто Камней: <img width="17" height="17" alt="" src="/images/colections/22.png"> <font color=red>'.n_f($ank['rock_where']).'</font> </font></span><br>';


echo '<div class="cb"></div></div></div>';
echo '</div></div>';


echo '<a class="btnl mt4" href="'.$HOME.'mine/"> Вернуться</a>';
require_once ('../system/footer.php');
?>