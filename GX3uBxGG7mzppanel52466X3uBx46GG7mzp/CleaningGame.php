<?php
$title = 'Чистка игры';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}

$s = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_ass` WHERE `id` "),0);
$c = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass_br` WHERE `id` "),0);
$c1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_chat` WHERE `id` "),0);



if(isset($_GET['cссс/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить ЧАТ Корпораций?
<div class="mt4"><a class="btni accept" href="?cссс_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['cссс_/'])){
If($user['level'] < 3){
header('Location: /');
exit();
}

mysql_query("UPDATE `users` SET `ass_br` = '0' WHERE `id` ");
mysql_query('DELETE FROM `ass_br` WHERE `id` ');
$_SESSION['err'] = 'Чат Корпораций очищен!';
header('Location: ?');
exit();
}





if(isset($_GET['ssss/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить ЧАТ Союзов?
<div class="mt4"><a class="btni accept" href="?ssss_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['ssss_/'])){
	If($user['level'] < 3){
header('Location: /');
exit();
}
mysql_query("UPDATE `users` SET `soyz_ass` = '0' WHERE `id` ");
mysql_query('DELETE FROM `soyz_ass` WHERE `id` ');
$_SESSION['err'] = 'Чат Союзов очищен!';
header('Location: ?');
exit();
}





if(isset($_GET['cссс1/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить скрытый ЧАТ Корпораций?
<div class="mt4"><a class="btni accept" href="?cссс1_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['cссс1_/'])){
	If($user['level'] < 3){
header('Location: /');
exit();
}
mysql_query("UPDATE `users` SET `corp_chat` = '0' WHERE `id` ");
mysql_query('DELETE FROM `corp_chat` WHERE `id` ');
$_SESSION['err'] = 'Скрытый чат Корпораций очищен!';
header('Location: ?');
exit();
}




echo '<hr><center>';

echo '<a class="btni" style="min-width:200px;margin:4px;" href="?cссс/">
<span><span>
ЧАТ Корпораций <font color=red>('.$c.')</font>
</span></span></a>';

echo '<a class="btni" style="min-width:200px;margin:4px;" href="?ssss/">
<span><span>
ЧАТ Союзов <font color=red>('.$s.')</font>
</span></span></a>';

echo '<a class="btni" style="min-width:200px;margin:4px;" href="?cссс1/">
<span><span>
Скрытый ЧАТ Кп <font color=red>('.$c1.')</font>
</span></span></a>';

echo '</center>';






require_once ('../system/footer.php');
?>