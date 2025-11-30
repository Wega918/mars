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

$dialog = abs(intval($_GET['dialog']));
$mess = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($dialog)."'"));


if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}

if($dialog == 1){
$_SESSION['err']='Ошибочка :)';
header ('Location: /');
exit();
}

if($id == $user['id']){
header ('Location: /mes/');
exit();
}



echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">Почта '.nick($ank['id']).'
<hr><b><a href="?delete_">Удалить диалог</a></font></b>
</span></li></ul></div>';

if(isset($_GET['delete_'])){
$_SESSION['err'] = 'Вы уверены?<div class="mt4"><a class="btni accept" href="?delete"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a> <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');exit();}

if(isset($_GET['delete'])){
mysql_query('DELETE FROM `message_c` WHERE `kto` = "'.$id.'" and `kogo` = "'.$dialog.'" ');
mysql_query('DELETE FROM `message` WHERE `kto` = "'.$dialog.'" and `komy` = "'.$id.'" ');
header('Location: /ViewMail_c/'.$id.'/');
exit();
}


if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(id) FROM `message` WHERE `kto` = '".$ank['id']."' and `komy` = '".$mess['id']."' or `kto` = '".$mess['id']."' and `komy` = '".$ank['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$msg = mysql_query("SELECT * FROM `message` WHERE `kto` = '".$ank['id']."' and `komy` = '".$mess['id']."' or `kto` = '".$mess['id']."' and `komy` = '".$ank['id']."' ORDER BY `time` DESC LIMIT $start, $max");
while($m = mysql_fetch_assoc($msg)){

if($m['kto'] == 1){
}else{

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div class="mt4"><div style="text-align: left;" class="mt4"><ul>
<li class="message mt4"><div class=""><span><span class="nobr">'.nick($m['kto']).'
</span></span> <span class="thint"><span> - '.vremja($m['time']).' - </span></span>';
if($m['readlen'] == 0) {
echo '<span class="float-right"><font size=2 color=indianred><b>New</b></font></span>';
}else{
}
echo '<div class="cb"></div></div><div class=" tmaroon"><p>'.filter(bb1(smile($m['text']))).' '.$s.'</p></div></li></ul></div></div></div>';

echo '</span></li></ul>';

}
}

echo '<br>';



if ($k_page > 1){
echo str(''.$HOME.'ViewMail/'.$mess['id'].'/'.$id.'/?',$k_page,$page);
}








echo '<a class="btnl mt4" href="'.$HOME.'ViewMail_c/'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';

require_once ('../system/footer.php');
?>