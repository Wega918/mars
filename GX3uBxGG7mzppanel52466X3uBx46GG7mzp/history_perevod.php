<?php
$title = 'История переводов рубинов';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['level'] != 3){
header('Location: /');
exit();
}


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';




if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `history_perevod` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `history_perevod` WHERE `id` ORDER BY `id`  DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
echo '<div class="bordered mt4" style="padding: 5 4px 4px 5;">';

echo '<span class="fr nobr">
<a href="?cancel_'.$r['id'].'/"><img src="/images/cross.png" width="17" height="17" alt="Отменить" title="Отменить"></a>
<a href="?delete_'.$r['id'].'/"><img src="/images/1.png" width="17" height="17" alt="Удалить" title="Удалить"></a>
</span>';
echo ''.nick($r['kto']).' <font color=green> >> </font> '.nick($r['komu']).' <br>';
echo '<b>Время:</b> <font color=black>'.vremja($r['time']).'</font> <br>';
echo '<b>Сумма:</b> <font color=red><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.n_f($r['suma']).'</font> <br>';
echo '<b>Комментарий:</b> <font color=black>'.$r['koment'].'</font> <br>';

echo '</div>';




if(isset($_GET['cancel_'.$r['id'].'/'])){
$_SESSION['err'] = 'Вы уверены, что хотите отменить перевод?
<div class="mt4"><a class="btni accept" href="?cancel'.$r['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['cancel'.$r['id'].'/'])){
if($user['level'] != 3){
header('Location: /');
exit();
}
$uss = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$r['komu']."'"));
mysql_query("UPDATE `users` SET `rubin` = '".($uss['rubin']-$r['suma'])."' WHERE `id` = ".$uss['id']." LIMIT 1");
mysql_query('DELETE FROM `history_perevod` WHERE `id` = "'.$r['id'].'" ');

$text = 'Здравствуйте! '.nick($user['id']).' отменил перевод <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.n_f($r['suma']).' от '.nick($r['kto']).' ';

mysql_query("UPDATE `users` SET `rubin` = `rubin` + ".$summ."  WHERE `id` = '".$id."'");
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$id."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$id."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$id."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$id."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$id."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$id."', `time` = '".time()."', `readlen` = '0'");

$_SESSION['err'] = ' '.nick($uss['id']).' <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> -<font color=red>'.n_f($r['suma']).'</font>';
header('Location: ?');
exit();
}





if(isset($_GET['delete_'.$r['id'].'/'])){
$_SESSION['err'] = 'Вы уверены, что хотите удалить перевод из списка?
<div class="mt4"><a class="btni accept" href="?delete'.$r['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}

if(isset($_GET['delete'.$r['id'].'/'])){
if($user['level'] != 3){
header('Location: /');
exit();
}
mysql_query('DELETE FROM `history_perevod` WHERE `id` = "'.$r['id'].'" ');
$_SESSION['err'] = 'Успешно!';
header('Location: ?');
exit();
}



}









require_once ('../system/footer.php');
?>