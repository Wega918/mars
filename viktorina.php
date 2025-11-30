<?php
$title = 'Викторина';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']){
header('Location: '.$HOME.'');
exit();
}
/*if($user['level'] <1){
header('Location: '.$HOME.'');
$_SESSION['err'] = '<font color=red>Локация в разработке.</font>';
exit();
}*/









if($promotions['promotion_5'] == 1){
echo '<div class="content"><div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: награда Х-'.$promotions['act_5'].'</li>
<li class="center">При верном ответе, Вам зачисляется в '.$promotions['act_5'].' раз больше рубинов чем обычно.</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_5'] - time()).'</span></div>
</div></div></div><hr>';
}
echo '<center><font color=black>Вопросы принимаются только с маленькой буквы.</font></center>'; 



$sleddd33 = mysql_query('SELECT * FROM `umnick` WHERE `time` > '.(time()).' ');
$sleddd3 = mysql_fetch_array($sleddd33);



$kolll = mysql_result(mysql_query("SELECT COUNT(*) FROM `umnick` WHERE `id` "),0);
if($kolll > 10){
mysql_query('DELETE FROM `umnick` WHERE `date` < '.(time()-100).' ');
}


if(isset($_GET['ok'])){

$usot = $user['login'];
$id_send = $user['id'];
$tex = strong($_POST['text']);
$text = mb_strtolower($tex); 
If($Ignore){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Общение не доступно.</font>';
exit();
}
If($ban){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Общение не доступно.</font>';
exit();
}
if (empty($text)) {
    $_SESSION['err'] = '<font color=white>Вы не ввели сообщение!</font>';
    header('Location: ?');
    exit();
}
if(mb_strlen($msg) > text ){
$_SESSION['err'] = '<font color=white>Не более 25 символов!</font>';
header('Location: ?');
exit();
}


$sleddd = mysql_fetch_array(mysql_query("SELECT * FROM `umnick` WHERE `user` = 'Умник' ORDER BY `id`DESC LIMIT 0 , 1"));
if($sleddd['time'] > time() && $sleddd['otvet'] == $text ){
mysql_query("INSERT INTO `umnick` ( `date`, `user`, `id_send`, `text` )VALUES ( '".time()."', '".$usot."', '".$id_send."', '".mb_strtolower($text)."')");

$rubi = rand(1,25);
if($promotions['promotion_5'] == 1){
$rubin = ($rubi*$promotions['act_5']);
}else{
$rubin = $rubi;
}
$nim = ' <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины">';
$times = time()+10;

mysql_query("INSERT INTO `umnick` ( `date`, `time`, `otvet`, `user`, `id_send`, `text` )VALUES 
( '".time()."', '".$times."', 'амыакц31к5п3ц2452', 'Умник', '1', 
'Правильно ответил(а): ".nick($id_send)." <br>Ответ: <font color=black>".$sleddd['otvet']." </font><br>
Он(а) получает: $nim $rubin <br>
Следующий вопрос через <b>10</b> секунд...')");

if($rubin > 0 && $rubin <= 500000){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();	
}

}else{
mysql_query("INSERT INTO `umnick` ( `date`, `user`, `id_send`, `text` )VALUES ( '".time()."', '".$usot."', '".$id_send."', '".$text."')");
header('Location: ?');
exit();
}

}











//////представление
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
if($time_delete1){
echo 'Участие в Викторине доступно только зарегистрированным пользователям!';
}else{
If($Ignore){
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
}else{
echo '<center><form action="?ok" method="POST">
<textarea style="width: 95%;" name="text" id="text"></textarea><br />
<input class="mt4" type="submit" name="submit" value="Ответить"> - <a href="?"> Обновить</a></form></center>';
}
}
echo '</span></li></ul></div>';








echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
if($sleddd3['time'] > time() && $sleddd3['otvet'] != 'амыакц31к5п3ц2452'){
echo '<font size=3 color=#800000>До принятия ответа: <span id="time_'.($sleddd3['time']-time()).'000">'._time($sleddd3['time']-time()).'</span></font>';
}else{
///if($sleddd3['time'] > time() && $sleddd3['otvet'] == 'амыакц31к5п3ц2452'){
echo '<font size=3 color=indianred>До нового вопроса: <span id="time_'.($sleddd3['time']-time()).'000">'._time($sleddd3['time']-time()).'</span></font>';
}echo '</span></li></ul></div>';













/////////////////////////////////////////////////Задаем вопрос
$viktorina_vopros = mysql_result(mysql_query("SELECT COUNT(*) FROM `viktorina` WHERE `num` "),0);

$generator=rand(1,$viktorina_vopros);
$ymniknick = 'Умник';
$vopros = mysql_fetch_array(mysql_query("SELECT * FROM `viktorina` WHERE `num` ORDER BY rand() "));
$sleddd2 = mysql_fetch_array(mysql_query("SELECT * FROM `umnick` WHERE `user` = '".$ymniknick."' ORDER BY `id` DESC LIMIT 0 , 1 "));

if ($sleddd2['time'] < time() and $sleddd2['otvet'] != 'амыакц31к5п3ц2452'){ ///Задаем вопрос
$times = time() + 10;
mysql_query("INSERT INTO `umnick` ( `date`, `time`, `id_vopros`, `otvet`, `user`, `id_send`, `text` )VALUES 
( '".time()."', '".$times."', '0', 'амыакц31к5п3ц2452', '".$ymniknick."', '1', 'следующий вопрос через <b>25</b> секунд')");
}elseif ($sleddd2['time'] < time()){ ///Задаем вопрос

$times = time() + 60;


/*$otvetss = $vopros['otvet'];
//if($user['level'] == 3){
//$otvetsss = '(Ответ: <font color=black>'.$vopros['otvet'].'</font>)';
//}
echo ''.$user['id'].'';
$textsss= ''.$vopros['vopros'].' '.$otvetsss.'';*/




$otvetss = $vopros['otvet'];
$otvet = mb_strlen($otvetss,'UTF-8'); ;
if ($otvet == '1'){
$otvet=' <b>('.$otvet.' буква)</b>';
}elseif ($otvet == '2' or $otvet == '3' or $otvet == '4'){
$otvet=' <b>('.$otvet.' буквы)</b>';
}elseif ($otvet >= '5'){
$otvet=' <b>('.$otvet.' букв)</b>';
}
$textsss= ''.$vopros['vopros'].' '.$otvet.'';








mysql_query("INSERT INTO `umnick` ( `date`, `time`, `id_vopros`, `otvet`, `user`, `id_send`, `text` )VALUES 
( '".time()."', '".$times."', '".$vopros['num']."', '".$otvetss."', '".$ymniknick."', '1', '".$textsss."')");
}
















if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `umnick`"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q=mysql_query("SELECT * FROM `umnick` ORDER BY `id` DESC LIMIT  10");
$aq2= mysql_num_rows($q);
while($r = mysql_fetch_array($q)){
$date = vremja($r['date']);
if($r['user'] == 'Умник'){
$use = nick(2);
$colorw = 'grey';
}else{
$use = nick($r['id_send']);
$colorw = '#800000';
}
$userid = $r['id_send'];
   
echo ''.$use.'<span style="float: right;">  <font size=1 color=grey> '.$date.'</font></span>';
echo '<br><font color='.$colorw.'> '.$r['text'].' </font><hr>';
}



if($user['level'] >= 3){
echo '<a class="btnl mt4" href="?del/"><img src="/images/1.png" width="20" height="22"> Очистить</a>';



If($Ignore or $ban or $user['game_time'] < 86400){

}else{
echo '<a class="btnl mt4" href="'.$HOME.'viktorina_new/"><img src="/images/accept48.png" width="20" height="22"> Добавить вопрос</a>';
}

}









if(isset($_GET['del/'])){
if($user['level'] < 1){
header('Location: ?');
exit();
}
mysql_query('DELETE FROM `umnick` WHERE `id` ');
header('Location: ?');
exit();
}








require_once ('system/footer.php');
?>
