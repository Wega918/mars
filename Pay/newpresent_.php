<?php
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

$timer = 1735689600;
$timer1 = 1735689600;



//echo ''.(time()+(86400/2)).'';

?>
<script type="text/javascript">var currentyear=new Date().getFullYear();
    var thischristmasyear=(new Date().getMonth()==0&&new Date().getDate()==1)?currentyear: currentyear+1;
    var christmas=new cdtime("countdowncontainer2", "january 1,  "+thischristmasyear+" 0: 0:00");
    christmas.displaycountdown("days", formatresults2);
    </script>
	
		<style>
@font-face {
	font-family: MyUniqueFont;
    src: url('/17450.otf');
}
   .user_font {
    font-family: MyUniqueFont;
    font-size:23px;
   }
</style>
<?



if(time() < $timer) {
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<div class="user_font"><center><font color="#43a5ff">С Наступающим Новым 2025 Годом!!!<br>До нового года на Марсе осталось:<br>  
<span id="time_'.($timer-time()).'000">'._time($timer-time()).'</span> </font><br></center></div>
<hr>
<img src="/Pay/new-year-tree-300.gif" width="60%"> ';


if($user['newpresent_time'] < time()) {
echo '<hr><a class="btni" style="min-width:160px;margin:4px;" href="?newpresent"><span><span>Забрать <img src="/Pay/2.png" width="6%"> подарок</span></span></a>';
}else{
echo '<hr><font color=green>До нового подарка осталось:</font> <font color=black><span id="time_'.($user['newpresent_time']-time()).'000">'._time($user['newpresent_time']-time()).'</span></font>';
}


echo '</span></li></ul></div>';
}else{
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<div class="user_font"><center><font color="#43a5ff">С Новым 2025 Годом!!! </font><br></center></div>
<hr>';
if(time() < $timer1) {
echo '<font color=grey size=2>До завершения акции осталось:</font> <font color=black><span id="time_'.($timer1-time()).'000">'._time($timer1-time()).'</span></font><hr>';
}
echo '<img src="/Pay/new-year-tree-300.gif" width="60%"> ';





if(time() < $timer1) {
if($user['newpresent_time'] < time()) {
echo '<hr><a class="btni" style="min-width:160px;margin:4px;" href="?newpresent"><span><span>Забрать <img src="/Pay/2.png" width="6%"> подарок</span></span></a>';
}else{
echo '<hr><font color=green>До нового подарка осталось:</font> <font color=black><span id="time_'.($user['newpresent_time']-time()).'000">'._time($user['newpresent_time']-time()).'</span></font>';
}
}

echo '</span></li></ul></div>';
}








if(isset($_GET['newpresent'])){
if($user['newpresent_time'] > time()) {
header('Location: ?');
exit();
}
if(time() > $timer1) {
header('Location: ?');
exit();
}

$rand = rand(1,20);

##############################################################################################################################################################
if($rand == 1){ // рубины
$rubin = 50000;
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 2){ // рубины
$rubin = 100000;
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 3){ // рубины
$rubin = 250000;
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 4){ // рубины
$rubin = 500000;
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 5){ // рубины
$rubin = 1000000;
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
##############################################################################################################################################################

##############################################################################################################################################################
if($rand == 6){  // карты
$random = 1;
$text = 'Карта х25';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$rand_xxx = 25;
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."', `images` = '20' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');$_SESSION['ok'] = 'Корпоративная карта X'.$rand_xxx.'';exit();
}
if($rand == 7){  // карты
$random = 1;
$text = 'Карта х50';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$rand_xxx = 50;
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."', `images` = '20' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');$_SESSION['ok'] = 'Корпоративная карта X'.$rand_xxx.'';exit();
}
if($rand == 8){  // карты
$random = 1;
$text = 'Карта х75';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$rand_xxx = 75;
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."', `images` = '20' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');$_SESSION['ok'] = 'Корпоративная карта X'.$rand_xxx.'';exit();
}
if($rand == 9){  // карты
$random = 1;
$text = 'Карта х100';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$rand_xxx = 100;
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."', `images` = '20' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');$_SESSION['ok'] = 'Корпоративная карта X'.$rand_xxx.'';exit();
}
if($rand == 10){  // карты
$random = 1;
$text = 'Карта х125';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$rand_xxx = 125;
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."', `images` = '20' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');$_SESSION['ok'] = 'Корпоративная карта X'.$rand_xxx.'';exit();
}
##############################################################################################################################################################

##############################################################################################################################################################
if($rand == 11){  // мусор
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){
$musor = ($mus__['musor_proc']*1/100);
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$musor).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$musor)."'  WHERE `id` = '".$soyz['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
exit();
}
if($rand == 12){  // мусор
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){
$musor = ($mus__['musor_proc']*2/100);
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$musor).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$musor)."'  WHERE `id` = '".$soyz['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
exit();
}
if($rand == 13){  // мусор
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){
$musor = ($mus__['musor_proc']*3/100);
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$musor).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$musor)."'  WHERE `id` = '".$soyz['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
exit();
}
if($rand == 14){  // мусор
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){
$musor = ($mus__['musor_proc']*4/100);
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$musor).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$musor)."'  WHERE `id` = '".$soyz['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
exit();
}
if($rand == 15){  // мусор
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){
$musor = ($mus__['musor_proc']*5/100);
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$musor).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$musor)."'  WHERE `id` = '".$soyz['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($musor).'%';
exit();
}
##############################################################################################################################################################

##############################################################################################################################################################
if($rand == 16){  // ангелы
$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angel = ($ang__['angel']*1/100);
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$angel).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$angel)."'  WHERE `id` = '".$corp['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'';
exit();
}
if($rand == 17){  // ангелы
$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angel = ($ang__['angel']*2/100);
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$angel).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$angel)."'  WHERE `id` = '".$corp['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'';
exit();
}
if($rand == 18){  // ангелы
$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angel = ($ang__['angel']*3/100);
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$angel).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$angel)."'  WHERE `id` = '".$corp['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'';
exit();
}
if($rand == 19){  // ангелы
$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angel = ($ang__['angel']*4/100);
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$angel).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$angel)."'  WHERE `id` = '".$corp['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'';
exit();
}
if($rand == 20){  // ангелы
$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angel = ($ang__['angel']*5/100);
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$angel).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$angel)."'  WHERE `id` = '".$corp['id']."' LIMIT 1");
}
$text = '<img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'%';
mysql_query("INSERT INTO `newpresent` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query('UPDATE `users` SET `newpresent_time` = "'.(time()+72000).'" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
$_SESSION['ok'] = 'Бонус: <img width="24" height="24" alt="ангелы" src="/images/angel48.png" title="ангелы"> '.n_f($angel).'';
exit();
}
##############################################################################################################################################################















}













$fdgdfg = mysql_result(mysql_query("SELECT COUNT(*) FROM `newpresent` WHERE `id` "),0);
if($fdgdfg>0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<center>Последние 5 Подарков:</center><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `newpresent` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$newpresent = mysql_query("SELECT * FROM `newpresent` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($NYG = mysql_fetch_assoc($newpresent)){
if($NYG['user'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($NYG['user']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/gift2.png"><span> '.$NYG['text'].'</span></span>
<div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'newpresent_/?',$k_page,$page); // Вывод страниц
}
}


/*
if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_"><img src="/images/1.png" width="20" height="22"> Обновить таймер</a>';
if(isset($_GET['Reset_'])){
if($user['level'] != 3){header('Location: ?');exit();}
mysql_query('UPDATE `users` SET `newpresent_time` = "0" WHERE `id` = '.$user['id'].' LIMIT 1');
header('Location: ?');
exit();
}
}
*/

if($fdgdfg>0){
if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить историю</a>';
}

if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю ?
<div class="mt4"><a class="btni accept" href="?Reset/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset/'])){
if($user['level'] != 3){header('Location: ?');exit();}
mysql_query('DELETE FROM `newpresent` WHERE `id` ');
header('Location: ?');
exit();
}
}

require_once ('../system/footer.php');
?>