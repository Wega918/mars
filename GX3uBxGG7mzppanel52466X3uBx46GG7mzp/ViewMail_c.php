<?php
$title = 'Просмотр почты';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['id'] > 3) {
header('Location: '.$HOME.'');
exit();
}


$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($id)."'"));

if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}

if($id == $user['id']){
header ('Location: /mes/');
exit();
}



echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">Почта '.nick($ank['id']).'</span></li></ul></div>';










if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kto` = '".$ank['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$dialog = mysql_query("SELECT * FROM `message_c` WHERE `kto` = '".$ank['id']."' ORDER BY `posl_time` DESC LIMIT $start, $max");
while($d = mysql_fetch_assoc($dialog)){

$list1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `message` WHERE `kto` = '".$ank['id']."' and `komy` = '".$d['kogo']."' or `kto` = '".$d['kogo']."' and `komy` = '".$ank['id']."' ORDER BY `time` DESC LIMIT 1"));
if($list1['kto'] == 1){
}else{

$list = mysql_fetch_assoc(mysql_query("SELECT * FROM `message` WHERE `kto` = '".$ank['id']."' and `komy` = '".$d['kogo']."' or `kto` = '".$d['kogo']."' and `komy` = '".$ank['id']."' ORDER BY `time` DESC LIMIT 1"));
$count = mysql_result(mysql_query("SELECT COUNT(id) FROM `message` WHERE `kto` = '".$ank['id']."' and `komy` = '".$d['kogo']."' or `kto` = '".$d['kogo']."' and `komy` = '".$ank['id']."'"),0);



if($list['kto'] == $ank['id']){
$kto_ = '<font color=red>Он</font>:';
$images_ = '<img width="24" height="24" alt="" src="/images/header/mail_incoming.png">';
}else{

$kto_ = '<font color=#800000>Собеседник</font>:   ';
if($list['readlen'] == 0) {
$images_ = '<img width="24" height="24" alt="" src="/images/header/mail_yellow.png">';
}else{
$images_ = '<img width="24" height="24" alt="" src="/images/header/mail_outgoing.png">';
}
}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';



echo'<span class="fl">'.$images_.'
'.nick($d['kogo']).', <span class="thint"><span>'.vremja($d['time']).'</span></span></span>';
echo '<br><hr>';
if($count) {
echo ' <span class="fl">'.$kto_.' <a href="'.$HOME.'ViewMail/'.$d['kogo'].'/'.$id.'/"><i>'.filter(bb1(smile($list['text']))).'</i></a></span><br>';
}else{
echo '<b>Переписка отсутствует!</b>';
}
echo '<hr>';
//echo '<b><a href="?delete_'.$d['id'].'">Удалить диалог</a></font></b>';
echo '</span></li></ul></div>';





}
}

if($k_post < 1){
echo '<br><center><b>Диалогов не найдено!</b></center><br>';
}

echo '<div class="content small minor">
Внимание!</span> Сообщения хранятся в почте <span>10 дней</span>, по истечении срока жизни сообщения <span>удаляются</span> автоматически.
</div>';








echo '<a class="btnl mt4" href="'.$HOME.'igrok_'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';

require_once ('../system/footer.php');
?>