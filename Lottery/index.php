<?php
$title = 'Лотерея';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}




echo '<div class="content">
<a class="fl" href="'.$HOME.'mine/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Шахта" title="Шахта"></a>
<a class="fr" href="'.$HOME.'garbage/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Шлюз" title="Шлюз"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';







/*
в users:
bilet

Таблицы:
bilet
Lottery
Lottery_history
*/
// <span class="count_room">3</span>
// 100+170+240+310+380+450+520+590+660+730=3560*10=35600 (+5600)


$nagrada_za_odin_bilet = rand(99,999);

$bilets = mysql_result(mysql_query("SELECT COUNT(*) FROM `bilet` WHERE `id` "),0);
$bilet_coll = mysql_result(mysql_query("SELECT COUNT(*) FROM `bilet` WHERE `id` "),0);
$Lottery = mysql_fetch_array(mysql_query('SELECT * FROM `Lottery` WHERE `id` = "1" '));
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > '".(time()-$sql['s_online'])."'"),0);
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > '".(time()-$sql['s_online'])."'"),0);
/*
if($Lottery['jackpot_time'] <= time() ){
mysql_query("UPDATE `Lottery` SET `jackpot_time` = '7777777' WHERE `id` = '1' LIMIT 1");
}
*/


$tim = (time()-$Lottery['jackpot_time']);



if($Lottery['bilets'] >= 100){
$rand1 = rand(1,100);
$rand2 = rand(1,100);
$rand3 = rand(1,100);
$rand4 = rand(1,100);
$rand5 = rand(1,100);
$jackpot = rand(1,100);

$obnul_lottery = mysql_query("SELECT * FROM `users` WHERE `bilet` >= '1' ");
$o_l = mysql_fetch_array ($obnul_lottery);
do {
$bilet_coll_rb = mysql_result(mysql_query("SELECT COUNT(*) FROM `bilet` WHERE `rubin` >= '1' and `user` = '".$o_l['id']."' "),0);
$rubin_summ = mysql_result(mysql_query("SELECT SUM(rubin) FROM bilet WHERE `user` = ".$o_l['id']." ;"), 0);
mysql_query("UPDATE `users` SET `bilet` = '".($o_l['bilet']=0)."', `rubin` = '".($o_l['rubin']+$rubin_summ)."'  WHERE `id` = '".$o_l['id']."' ");

$oboznachenie = mysql_fetch_assoc(mysql_query("SELECT * FROM `bilet` WHERE `rubin` >= '1000' "));

if($bilet_coll_rb > 0){
/*if($oboznachenie and $oboznachenie['user'] == $o_l['id']){
$jackpot_text = '( Jackpot <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><font color=red>'.$Lottery['jackpot_rubin'].'</font> )';
}*/
$pay_text = '<b>Лотерея!</b> Награда: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><font color=red>'.$rubin_summ.'</font> '.$jackpot_text.'';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$o_l['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$o_l['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$o_l['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$o_l['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$o_l['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$o_l['id']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("INSERT INTO `Lottery_history` SET `user` = '".$o_l['id']."', `bilet` = '".$bilet_coll_rb."', `rubin` = '".$rubin_summ."', `time` = '".time()."' ");
}


} while ($o_l = mysql_fetch_array ($obnul_lottery));

mysql_query('DELETE FROM `bilet` WHERE `id` ');

if($Lottery['jackpot_time']<time()){
$jackpot_rubin = rand(999,50000);
$jackpot_time = (time()+1200);
}else{
$jackpot_rubin = 0;
$jackpot_time = $Lottery['jackpot_time'];
}

mysql_query("UPDATE `Lottery` SET `N1` = '".($Lottery['N1']=$rand1)."', `N2` = '".($Lottery['N2']=$rand2)."', `N3` = '".($Lottery['N3']=$rand3)."', `N4` = '".($Lottery['N4']=$rand4)."', `N5` = '".($Lottery['N5']=$rand5)."', 
`jackpot_rubin` = '".($Lottery['jackpot_rubin'] = $jackpot_rubin)."', 
`jackpot_time` = '".($Lottery['jackpot_time']=$jackpot_time)."', 
`jackpot` = '".($Lottery['jackpot']=$jackpot)."', 
 `bilets` = '0' WHERE `id` = '1' ");


}








if($user['bilet'] == 0){$cena = 10;}
if($user['bilet'] == 1){$cena = 17;}
if($user['bilet'] == 2){$cena = 24;}
if($user['bilet'] == 3){$cena = 31;}
if($user['bilet'] == 4){$cena = 38;}
if($user['bilet'] == 5){$cena = 45;}
if($user['bilet'] == 6){$cena = 52;}
if($user['bilet'] == 7){$cena = 59;}
if($user['bilet'] == 8){$cena = 66;}
if($user['bilet'] == 9){$cena = 73;}



if(100-$bilets == 1){$text = 'Билет';}
if(100-$bilets >= 2 && 100-$bilets < 5){$text = 'Билета';}
if(100-$bilets >= 5 && 100-$bilets < 21){$text = 'Билетов';}
if(100-$bilets == 21){$text = 'Билет';}
if(100-$bilets >= 22 && 100-$bilets < 25){$text = 'Билета';}
if(100-$bilets >= 25 && 100-$bilets < 31){$text = 'Билетов';}
if(100-$bilets == 31){$text = 'Билет';}
if(100-$bilets >= 32 && 100-$bilets < 35){$text = 'Билета';}
if(100-$bilets >= 35 && 100-$bilets < 41){$text = 'Билетов';}
if(100-$bilets == 41){$text = 'Билет';}
if(100-$bilets >= 42 && 100-$bilets < 45){$text = 'Билета';}
if(100-$bilets >= 45 && 100-$bilets < 51){$text = 'Билетов';}
if(100-$bilets == 51){$text = 'Билет';}
if(100-$bilets >= 52 && 100-$bilets < 55){$text = 'Билета';}
if(100-$bilets >= 55 && 100-$bilets < 61){$text = 'Билетов';}
if(100-$bilets == 61){$text = 'Билет';}
if(100-$bilets >= 62 && 100-$bilets < 65){$text = 'Билета';}
if(100-$bilets >= 65 && 100-$bilets < 71){$text = 'Билетов';}
if(100-$bilets == 71){$text = 'Билет';}
if(100-$bilets >= 72 && 100-$bilets < 75){$text = 'Билета';}
if(100-$bilets >= 75 && 100-$bilets < 81){$text = 'Билетов';}
if(100-$bilets == 81){$text = 'Билет';}
if(100-$bilets >= 82 && 100-$bilets < 85){$text = 'Билета';}
if(100-$bilets >= 85 && 100-$bilets < 91){$text = 'Билетов';}
if(100-$bilets == 91){$text = 'Билет';}
if(100-$bilets >= 92 && 100-$bilets < 95){$text = 'Билета';}
if(100-$bilets >= 95 && 100-$bilets < 101){$text = 'Билетов';}


if($Lottery['N1'] == $bilet_coll or $Lottery['N2'] == $bilet_coll or $Lottery['N3'] == $bilet_coll or $Lottery['N4'] == $bilet_coll or $Lottery['N5'] == $bilet_coll or $Lottery['jackpot'] == $bilet_coll){
if($Lottery['jackpot'] == $bilet_coll and $tim <= 0 ){
$rubin = $Lottery['jackpot_rubin'];
}else{
$rubin = $nagrada_za_odin_bilet;
}
}else{
$rubin = 0;
}




if(isset($_GET['buy'])){
if($user['bilet'] >= 10) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Максимум 10 Билетов!</font>';exit();}
if($user['rubin'] < $cena) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cena - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Стоимость Билета: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><font color=red>'.$cena.'</font>
<div class="mt4"><a class="btni accept" href="?Yes/"><img src="/images/accept48.png" alt="" width="24" height="24"> Купить</a> <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

if(isset($_GET['Yes/'])){
if($user['bilet'] >= 10) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Максимум 10 Билетов!</font>';exit();}
if($user['rubin'] < $cena) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cena - $user['rubin']).')</font>';exit();}
mysql_query("INSERT INTO `bilet` SET `user` = '".$user['id']."', `rubin` = '".$rubin."' ");
mysql_query("UPDATE `users` SET `bilet` = '".($user['bilet']+1)."', `rubin` = '".($user['rubin']-$cena)."'  WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `Lottery` SET `bilets` = '".($Lottery['bilets']+1)."' WHERE `id` = '1' ");
if($mission_user_6['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_6['prog_']+1)."' WHERE `id` = '".$mission_user_6['id']."' ");
}
if($Achievements_user_5['prog'] < $Achievements_user_5['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_5['prog']+1)."' WHERE `id` = '".$Achievements_user_5['id']."' ");
}
if($rubin > 0){
if($mission_user_7['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_7['prog_']+1)."' WHERE `id` = '".$mission_user_7['id']."' ");
}
if($Achievements_user_6['prog'] < $Achievements_user_6['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_6['prog']+1)."' WHERE `id` = '".$Achievements_user_6['id']."' ");
}
}
$_SESSION['ok'] = ' <b><font color=green>Билет Куплен</font></b>';
header('Location: ?');
exit();
}




















echo '<br><div class="bordered"><center><font size=4>'.$title.'</font><hr>';
if($user['bilet'] < 10){
echo '<a href="?buy"><img src="'.$HOME.'Lottery/images/bilet.png" width="200"></a>';
}else{
echo 'Ожидание Лотереи...';
if($Lottery['jackpot_time']>time()){
echo '<br><font size=1>Следующий Джекпот можно будет выиграть через:</font> <font size=2 color=black><span id="time_'.($Lottery['jackpot_time']-time()).'000">'._time($Lottery['jackpot_time']-time()).'</span></font>';
}

}

if($user['bilet'] >= 1){
echo '<hr>';
}

if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `bilet` WHERE `user` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$bilet = mysql_query("SELECT * FROM `bilet` WHERE `user` = '".$user['id']."' ORDER BY `id` + '1' ASC LIMIT $start,$max");
while($b = mysql_fetch_assoc($bilet)){
$post = $k_post++;



if($post == 5){
echo '<a href="?Bilet№'.$b['id'].'">
<div class="btni" style="background:001;background:000; height: 50px; width: 50px; top: -1px; padding: 6px 8px; box-shadow: inset 2px 3px 2px #; border: 2px solid #7dab2e; color:#FFFFFF; text-align: inherit; border-radius: 7px; border-radius: 10px;"><span class="count_room1"><font color=black>'.$b['id'].'</font></span><img style="vertical-align: top;" src="'.$HOME.'Lottery/images/bilet2.png" alt="Билет №'.$b['id'].'" title="Билет №'.$b['id'].'">
</div></a><br> ';
}else{
echo '<a href="?Bilet№'.$b['id'].'">
<div class="btni" style="background:001;background:000; height: 50px; width: 50px; top: -1px; padding: 6px 8px; box-shadow: inset 2px 3px 2px #; border: 2px solid #7dab2e; color:#FFFFFF; text-align: inherit; border-radius: 7px; border-radius: 10px;"><span class="count_room1"><font color=black>'.$b['id'].'</font></span><img style="vertical-align: top;" src="'.$HOME.'Lottery/images/bilet2.png" alt="Билет №'.$b['id'].'" title="Билет №'.$b['id'].'">
</div></a> ';
}




if(isset($_GET['Bilet№'.$b['id'].''])){
if($b['rubin'] == 0){
$_SESSION['err'] = '<img src="/images/cross.png" alt="" width="24" height="24"> <b><font color=green>Билет №'.$b['id'].' Пустой</font></b>';
}else{
if($b['rubin'] >= 1000){
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> <b><font color=green>Билет №'.$b['id'].' Джекпотный! <br>Содержит <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$b['rubin'].' </font></b>';
}else{
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> <b><font color=green>Билет №'.$b['id'].' Выигрышный! <br>Содержит <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$b['rubin'].' </font></b>';
}
}
header('Location: ?');
exit();
}

}



$b = (100-$bilets);
if($b <= 0){
$b1 = 0;
}else{
$b1 = $b;
}
if($b <= 0){
$txt = 'Ожидайте завершения лотереи...';
}else{
$txt = '<font size=2 color=red>До начала лотереи осталось скупить:</font> <font size=2 color=black>'.$b1.' '.$text.'</font>';
}
echo '<hr>'.$txt.'</center></div>';


echo '<a class="btnl mt4" href="?refresh"><img src="/images/refresh_white2.png" width="24" height="24" alt="" title=""> Обновить</a>';

if(isset($_GET['refresh'])){
header('Location: '.$HOME.'Lottery/');
exit();
}


$Lottery_history = mysql_result(mysql_query("SELECT COUNT(*) FROM `Lottery_history` WHERE `id` "),0);
if($Lottery_history){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<center>Победители: </center><hr>';
if (empty($user['max'])) $user['max']=5;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `Lottery_history` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$Lottery_history = mysql_query("SELECT * FROM `Lottery_history` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($L_h = mysql_fetch_assoc($Lottery_history)){
if($L_h['user'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($L_h['user']).'</span></span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/ruby.png"><span><font color=red>'.n_f($L_h['rubin']).'</font></span> 
 <span><font size=2 color=black>('.times($L_h['time']).')</font></span>
</span>
<div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Lottery/?',$k_page,$page); // Вывод страниц
}



if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_history/"><img src="/images/1.png" width="20" height="22"> Очистить историю</a>';
}
if(isset($_GET['Reset_history/'])){
if($user['level'] != 3){header('Location: ?');exit();}
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю ?
<div class="mt4"><a class="btni accept" href="?Reset/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}
if(isset($_GET['Reset/'])){
if($user['level'] != 3){header('Location: ?');exit();}
mysql_query('DELETE FROM `Lottery_history` WHERE `id` ');
header('Location: ?');
exit();
}


}



echo '<font size="2"><font color="black"> <font size="3">•</font> Джекпотный билет </font> - <b>может содержать</b> <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> от <font color="red">999</font> / до <font color="red">'.n_f(50000).'</font> </font><br>';
echo '<font size="2"><font color="black"> <font size="3">•</font> Выигрышный билет </font> - <b>может содержать</b> <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> от <font color="red">99</font> / до <font color="red">999</font> </font>';

require_once ('../system/footer.php');
?>