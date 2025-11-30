<?php
$title = 'Антиспам';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';








if(isset($_REQUEST['ok'])){
If($user['level'] < 3){
header('Location: /');
exit();
}
$koment_topik = strong($_POST['koment_topik']);
$new_topic = strong($_POST['new_topic']);
$mes = strong($_POST['mes']);
$chat = strong($_POST['chat']);
$tikets = strong($_POST['tikets']);



mysql_query("UPDATE `antispam` SET 
`koment_topik` = '".$koment_topik."',
`new_topic` = '".$new_topic."', 
`mes` = '".$mes."', 
`chat` = '".$chat."',
`tikets` = '".$tikets."' 

WHERE `id` = '1'");
$_SESSION['err'] = 'Настройки успешно изменены!';
header ('Location: ?');
exit();
}


$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `antispam` WHERE `id` = '1' "));

echo '<form action="" method="POST">

Комент в топиках. Раз в..(сек.):<br />
<input type="text" style="width: 95%;" name="koment_topik" value="'.$sql['koment_topik'].'"/> <br />

Создавать топик. Раз в..(сек.):<br />
<input type="text" style="width: 95%;" name="new_topic" value="'.$sql['new_topic'].'"/> <br />

Сообщения в почте. Раз в..(сек.):<br />
<input type="text" style="width: 95%;" name="mes" value="'.$sql['mes'].'"/> <br />

Сообщения в чатах. Раз в..(сек.):<br />
<input type="text" style="width: 95%;"name="chat" value="'.$sql['chat'].'"/> <br />

Создание тикетов Раз в..(сек.):<br />
<input type="text" style="width: 95%;"name="tikets" value="'.$sql['tikets'].'"/> <br />

<input class="mt4" type="submit" name="ok" value="Установить">

</form>';








echo '</center></div>';

echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');
?>