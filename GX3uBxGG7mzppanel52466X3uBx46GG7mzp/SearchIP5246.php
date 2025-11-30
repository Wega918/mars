<?php
$title = 'Поиск по IP';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';


echo '<form action="" method="POST">
Введите IP: <br />
<input type="text" name="text" value="" maxlength="30" /><br />
<input class="mt4" type="submit" name="submit" value="Искать">
</form>';










if(isset($_REQUEST['submit'])) {
if($user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}
$text = strong($_POST['text']);

if(strlen($text) <1) {
$_SESSION['err']='Минимальная длина запроса 1 символ!';
header ('Location: ?');
exit();
}




$s = mysql_query("SELECT * FROM `users` where `ip` LIKE '%".$text."%' ORDER BY `id` DESC ");
$sql = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` where `ip` LIKE '%".$text."%' "),0);

/* Выводим */
while($ip_fs = mysql_fetch_assoc($s)){
echo '<hr><a href="/user_'.$ip_fs['id'].'">'.nick($ip_fs['id']).'
<b>IP:</b> '.$ip_fs['ip'].' <br />
<b>UA:</b> '.$ip_fs['browser'].'</a>';
}

}


if($sql == 0) echo '<div class="player"><center><b>По вашему запросу ничего не найдено!</b></center></div>';



echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';



require_once ('../system/footer.php');
?>