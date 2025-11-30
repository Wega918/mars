<?php
$title = 'Обработчик';
//-----Подключаем функции-----//
require_once ('system/function.php');
//-----Подключаем вверх-----//
require_once ('system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['level'] < 1){
header('Location: /');
exit();
}





$obr_ = mysql_result(mysql_query("SELECT COUNT(*) FROM `obr` WHERE `id` "),0);

if($obr_ > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.($title).'</span></li></ul></div>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `obr` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$obr = mysql_query("SELECT * FROM `obr` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($obr)){
$r_user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$r['user']."' "));

echo '<div class="bordered mt4" style="padding: 5 4px 4px 5;">';
echo '<span class="fr nobr">
<a href="?ok_'.$r['id'].'/"><img src="/images/accept48.png" width="30" height="30" alt="Добавить" title="Добавить"></a>
<a href="?no_'.$r['id'].'/"><img src="/images/cross.png" width="24" height="24" alt="Отменить" title="Отменить"></a>
</span>';
echo ''.nick($r['user']).' <br>';
echo '<b>Время:</b> <font color=black>'.vremja($r['time']).'</font> <br>';
echo '<b>Вопрос:</b> <font color=black>'.$r['vopros'].'</font> <br>';
echo '<b>Ответ:</b> <font color=red>'.$r['otvet'].'</font> <br>';
echo '</div>';


if(isset($_GET['ok'.$r['id'].'/'])){
$_SESSION['err'] = 'Вы уверены, что хотите <b>Добавить вопрос</b>?
<div class="mt4"><a class="btni accept" href="?ok'.$r['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['no'.$r['id'].'/'])){
$_SESSION['err'] = 'Вы уверены, что хотите <b>Отменить вопрос</b>?
<div class="mt4"><a class="btni accept" href="?no'.$r['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}











if(isset($_GET['ok_'.$r['id'].'/'])){
if($user['level'] < 0){
header('Location: /');
exit();
}
mysql_query("INSERT INTO `viktorina` SET `vopros` = '".$r['vopros']."', `otvet` = '".$r['otvet']."', `user` = '".$r['user']."', `obr` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($r_user['rubin']+75)."' WHERE `id` = '".$r_user['id']."' ");
$r_text = '<b>Вопрос "'.$r['vopros'].'" добавлен</b> <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <font color=red>+75</font> <font size=2 color=black>обработал '.nick($user['id']).'</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r_user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r_user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r_user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r_user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r_user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$r_text."', `kto` = '2', `komy` = '".$r_user['id']."', `time` = '".time()."', `readlen` = '0'");
mysql_query('DELETE FROM `obr` WHERE `id` = "'.$r['id'].'" ');
$_SESSION['err'] = '<b>Вопрос добавлен</b>';
header('Location: ?');
exit();
}





if(isset($_GET['no_'.$r['id'].'/'])){
if($user['level'] < 0){
header('Location: /');
exit();
}
$text = '<b>Вопрос "'.$r['vopros'].'" не добавлен. <font size=2 color=black>обработал '.nick($user['id']).'</font></b>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$r_user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$r_user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$r_user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$r_user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$r_user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$r_user['id']."', `time` = '".time()."', `readlen` = '0'");
mysql_query('DELETE FROM `obr` WHERE `id` = "'.$r['id'].'" ');
$_SESSION['err'] = ' <b>Вопрос отменен!</b>';
header('Location: ?');
exit();
}






}



if ($k_page > 1) {
echo str(''.$HOME.'obr/?',$k_page,$page); // Вывод страниц
}

}else{
echo '<div class="center"><div class="feedback">Список вопросов на обработку пуст...</div></div>';
}

echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'viktorina_new/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';

require_once ('system/footer.php');
?>