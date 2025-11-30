<?php

//-----Подключаем функции-----//
require_once ('system/function.php');
require_once ('system/header.php');
//-----Переадресация для не зарегистрированных-----//
$title = 'Выход';
if(!$user['id']){
header('Location: /');
exit();
}
if(isset($_REQUEST['okda'])){
//-----Стираем кукки-----//
setcookie('uslog', '', time() - 86400*31);
setcookie('uspass', '', time() - 86400*31);
mysql_close($mysql_connect);
//-----Кидаем на главную-----//
header('location: /');
}
echo '<div class="head1">Выход</div>';
echo '<div class="player">Вы действительно хотите покинуть игру?<br /><a href="'.$HOME.'/exit.php?okda">Да</a></div>';
require_once ('system/footer.php');
?>