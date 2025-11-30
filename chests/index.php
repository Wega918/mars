<?php
$title = 'Сундуки';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');

if(!$user['id']) {header('Location: /');exit();}
/*if($user['id'] != 1) {
$_SESSION['err'] = 'Техработы...';
header('Location: /');
exit();
}*/


// key - ключи - по умалчанию 5
// mine_time - время работы в шахте


/*
Деревянный
Серебряный
Золотой
Королевский
Магический
Легендарный
*/
/*
chests_game: 
id
user
chest_1
chest_2
chest_3
*/
/*
if($user['id'] == 1){

$gde = '/chests';
echo '<center><font color=black size=2>('.mysql_result(mysql_query('select count(`id`) from `users` where `gde` LIKE "%'.$gde.'%" '),0).')</font></center>';
$who = mysql_query('SELECT * FROM `users` WHERE `gde` LIKE "%'.$gde.'%" ORDER BY `viz` DESC');
while($w = mysql_fetch_assoc($who)){
echo ''.nick($w['id']).' '.$w['key'].'<font color=grey>,</font> <br>';
}

}
*/

$chests_game = mysql_fetch_assoc(mysql_query("SELECT * FROM `chests_game` WHERE `user` = '".$user['id']."' "));

$rand1 = rand(2,3); 
if($rand1 == 3){
$rand2 = rand(2,3);
}else{
$rand2 = 3;
}
if($rand1 == 2 or $rand2 == 2){
$rand3 = 3;
}elseif($rand1 == 3 and $rand2 == 3){
$rand3 = 2;
}else{
$rand3 = rand(2,3);
}



$rand_chest = rand(1,4);
if($rand_chest == 1){
$rand_chests = 1;
}elseif($rand_chest == 2){
$rand_chests = rand(1,2);
}elseif($rand_chest == 3){
$rand_chests = rand(1,3);
}elseif($rand_chest == 4){
$rand_chests = rand(1,4);
}


if($rand_chests == 1){
$chests_name = 'Деревянный сундук';
}
if($rand_chests == 2){
$chests_name = 'Серебряный сундук';
}
if($rand_chests == 3){
$chests_name = 'Золотой сундук';
}
if($rand_chests == 4){
$chests_name = 'Королевский сундук';
}
if($rand_chests == 5){
$chests_name = 'Магический сундук';
}
if($rand_chests == 6){
$chests_name = 'Легендарный сундук';
}











if(!$chests_game){
mysql_query("INSERT INTO `chests_game` SET `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'  ");
}



if($chests_game['kol_sunduk'] == 9 and $chests_game['kol_err'] > 0){
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query('DELETE FROM `chests_game` WHERE `user` = '.$user['id'].' ');
if(!$chests_game){
mysql_query("INSERT INTO `chests_game` SET `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."' ");
}
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");

if($mission_user_19['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_19['prog_']+1)."' WHERE `id` = '".$mission_user_19['id']."' ");
}
if($Achievements_user_18['prog'] < $Achievements_user_18['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_18['prog']+1)."' WHERE `id` = '".$Achievements_user_18['id']."' ");
}

$_SESSION['err'] = '<font color=green>Победа! Получено <br><b>'.$chests_name.'</b></font> <br><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50">';
header('Location: ?');
exit();
}











echo '<div class="content">
<a class="fl" href="'.$HOME.'prestig/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Престиж" title="Престиж"></a>
<a class="fr"><img width="25" height="45" src="/images/index/right_grey.png"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';









echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font size=4>'.$title.'</font><hr>
Откройте 9 сундуков<br>
<font size=3 color=red>Заберите свой приз!</font>
</span></li></ul></div>';


















if(isset($_GET['chestsI'])){
if($chests_game['time'] > time()){
$_SESSION['err'] = '<font color=red>Сундуки можно открывать не чаще чем 1 раз в секунду!</font> ';
header('Location: ?');
exit();
}
if($user['key'] < 1 ){
$_SESSION['err'] = '<font color=red>Не хватает <img src="/chests/key.png" width="20" height="20"> ключей!</font> ';
header('Location: ?');
exit();
}
if($chests_game['kol_err'] <= 0 and $chests_game['kol_sunduk'] < 9 ){
mysql_query('DELETE FROM `chests_game` WHERE `user` = '.$user['id'].' ');
mysql_query("INSERT INTO `chests_game` SET `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."'");
$_SESSION['err'] = '<font color=red>Вы проиграли! <br><a href="?"><b>Начните сначала!</b></a> </font> ';
header('Location: ?');
exit();
}
if($chests_game['chest_1'] == 3){
mysql_query("UPDATE `chests_game` SET `kol_sunduk` = '".($chests_game['kol_sunduk']+1)."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `key` = '".($user['key']-1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if(!$chests_game){
mysql_query("INSERT INTO `chests_game` SET `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."'   ");
}
$img1 = $chests_game['chest_1']; 
$img2 = $chests_game['chest_2']; 
$img3 = $chests_game['chest_3']; 
header('Location: ?');
$_SESSION['chests'] = '<br><center>
<a href="?chestsI"><img src="/chests/'.$img1.'.png" width="60" height="60"></a>
<a href="?chestsII"><img src="/chests/'.$img2.'.png" width="45" height="45"></a>
<a href="?chestsIII"><img src="/chests/'.$img3.'.png" width="45" height="45"></a>
<br><font color=green size=2>Успешно! <font size=2 color=black>'.($chests_game['kol_sunduk']+1).'-й</font> Сундук не пустой!</font><br>
</center><br>';
exit();
}else{
mysql_query("UPDATE `chests_game` SET `kol_err` = '".($chests_game['kol_err']-1)."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `key` = '".($user['key']-1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
$img1 = $chests_game['chest_1']; 
$img2 = $chests_game['chest_2']; 
$img3 = $chests_game['chest_3']; 
header('Location: ?');
$_SESSION['chests'] = '<center>
<a href="?chestsI"><img src="/chests/'.$img1.'.png" width="60" height="60"></a>
<a href="?chestsII"><img src="/chests/'.$img2.'.png" width="45" height="45"></a>
<a href="?chestsIII"><img src="/chests/'.$img3.'.png" width="45" height="45"></a>
<br><font color=red size=2>Удача отвернулась от вас, <font size=2 color=black>'.($chests_game['kol_sunduk']+1).'-й</font> сундук оказался пустым! <br>Права на ошибку больше нет!</font><br>
</center><br>';
exit();
}
}




















if(isset($_GET['chestsII'])){
if($chests_game['time'] > time()){
$_SESSION['err'] = '<font color=red>Сундуки можно открывать не чаще чем 1 раз в секунду!</font> ';
header('Location: ?');
exit();
}
if($user['key'] < 1 ){
$_SESSION['err'] = '<font color=red>Не хватает <img src="/chests/key.png" width="20" height="20"> ключей!</font> ';
header('Location: ?');
exit();
}
if($chests_game['kol_err'] <= 0 and $chests_game['kol_sunduk'] < 9 ){
mysql_query('DELETE FROM `chests_game` WHERE `user` = '.$user['id'].' ');
mysql_query("INSERT INTO `chests_game` SET `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   ");
$_SESSION['err'] = '<font color=red>Вы проиграли! <br><a href="?"><b>Начните сначала!</b></a> </font> ';
header('Location: ?');
exit();
}
if($chests_game['chest_2'] == 3){
mysql_query("UPDATE `chests_game` SET `kol_sunduk` = '".($chests_game['kol_sunduk']+1)."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `key` = '".($user['key']-1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if(!$chests_game){
mysql_query("INSERT INTO `chests_game` SET `chests_col_games` = '".($user['chests_col_games']+1)."', `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   ");
}

$img1 = $chests_game['chest_1']; 
$img2 = $chests_game['chest_2']; 
$img3 = $chests_game['chest_3']; 
header('Location: ?');
$_SESSION['chests'] = '<br><center>
<a href="?chestsI"><img src="/chests/'.$img1.'.png" width="45" height="45"></a>
<a href="?chestsII"><img src="/chests/'.$img2.'.png" width="60" height="60"></a>
<a href="?chestsIII"><img src="/chests/'.$img3.'.png" width="45" height="45"></a>
<br><font color=green size=2>Успешно! <font size=2 color=black>'.($chests_game['kol_sunduk']+1).'-й</font> Сундук не пустой!</font><br>
</center><br>';
exit();
}else{
mysql_query("UPDATE `chests_game` SET `kol_err` = '".($chests_game['kol_err']-1)."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `key` = '".($user['key']-1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
$img1 = $chests_game['chest_1']; 
$img2 = $chests_game['chest_2']; 
$img3 = $chests_game['chest_3']; 
header('Location: ?');
$_SESSION['chests'] = '<center>
<a href="?chestsI"><img src="/chests/'.$img1.'.png" width="45" height="45"></a>
<a href="?chestsII"><img src="/chests/'.$img2.'.png" width="60" height="60"></a>
<a href="?chestsIII"><img src="/chests/'.$img3.'.png" width="45" height="45"></a>
<br><font color=red size=2>Удача отвернулась от вас, <font size=2 color=black>'.($chests_game['kol_sunduk']+1).'-й</font> сундук оказался пустым! <br>Права на ошибку больше нет!</font><br>
</center><br>';
exit();
}
}





if(isset($_GET['chestsIII'])){
if($chests_game['time'] > time()){
$_SESSION['err'] = '<font color=red>Сундуки можно открывать не чаще чем 1 раз в секунду!</font> ';
header('Location: ?');
exit();
}
if($user['key'] < 1 ){
$_SESSION['err'] = '<font color=red>Не хватает <img src="/chests/key.png" width="20" height="20"> ключей!</font> ';
header('Location: ?');
exit();
}
if($chests_game['kol_err'] <= 0 and $chests_game['kol_sunduk'] < 9 ){
mysql_query('DELETE FROM `chests_game` WHERE `user` = '.$user['id'].' ');
mysql_query("INSERT INTO `chests_game` SET `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   ");
$_SESSION['err'] = '<font color=red>Вы проиграли! <br><a href="?"><b>Начните сначала!</b></a> </font> ';
header('Location: ?');
exit();
}
if($chests_game['chest_3'] == 3){
mysql_query("UPDATE `chests_game` SET `kol_sunduk` = '".($chests_game['kol_sunduk']+1)."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `key` = '".($user['key']-1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if(!$chests_game){
mysql_query("INSERT INTO `chests_game` SET `user` = '".$user['id']."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   ");
}
$img1 = $chests_game['chest_1']; 
$img2 = $chests_game['chest_2']; 
$img3 = $chests_game['chest_3']; 
header('Location: ?');
$_SESSION['chests'] = '<br><center>
<a href="?chestsI"><img src="/chests/'.$img1.'.png" width="45" height="45"></a>
<a href="?chestsII"><img src="/chests/'.$img2.'.png" width="45" height="45"></a>
<a href="?chestsIII"><img src="/chests/'.$img3.'.png" width="60" height="60"></a>
<br><font color=green size=2>Успешно! <font size=2 color=black>'.($chests_game['kol_sunduk']+1).'-й</font> Сундук не пустой!</font><br>
</center><br>';
exit();
}else{
mysql_query("UPDATE `chests_game` SET `kol_err` = '".($chests_game['kol_err']-1)."', `chest_1` = '".$rand1."', `chest_2` = '".$rand2."', `chest_3` = '".$rand3."', `time` = '".(time()+1)."'   WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `key` = '".($user['key']-1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
$img1 = $chests_game['chest_1']; 
$img2 = $chests_game['chest_2']; 
$img3 = $chests_game['chest_3']; 
header('Location: ?');
$_SESSION['chests'] = '<center>
<a href="?chestsI"><img src="/chests/'.$img1.'.png" width="45" height="45"></a>
<a href="?chestsII"><img src="/chests/'.$img2.'.png" width="45" height="45"></a>
<a href="?chestsIII"><img src="/chests/'.$img3.'.png" width="60" height="60"></a>
<br><font color=red size=2>Удача отвернулась от вас, <font size=2 color=black>'.($chests_game['kol_sunduk']+1).'-й</font> сундук оказался пустым! <br>Права на ошибку больше нет!</font><br>
</center><br>';
exit();
}
}




if (isset($_SESSION['chests'])){
?><?=$_SESSION['chests']?><?php
unset($_SESSION['chests']);
}else{
echo '<br><center>
<a href="?chestsI"><img src="/chests/1.png" width="50" height="50"></a>
<a href="?chestsII"><img src="/chests/1.png" width="60" height="60"></a>
<a href="?chestsIII"><img src="/chests/1.png" width="50" height="50"></a>
</center>';
}













echo '<center><table style="width:80%" cellspacing="0" cellpadding="0"><tbody><tr>

<td style="vertical-align:top;width:25%;"><center>
<font size=2><img src="/chests/key.png" width="20" height="20"> Ключи:</font> <font size=2 color=black>'.$user['key'].'</font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<font size=2><img src="/chests/1.png" width="20" height="20"> Открыто:</font> <font size=2 color=black>'.$chests_game['kol_sunduk'].'/9</font>
</center></td>

</tr></tbody></table></center>
<hr>';




//if($user['id'] == 1){ chests_col_games

$cost_rb = (2+($user['chests_col_games']));
$cost_key = 9;
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?sel"><span><span>Авто игра за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red" size="2">'.$cost_rb.'</font> <img src="/chests/key.png" width="20" height="20"> <font size="2">'.$cost_key.'</font> </span></span></a>
<hr><tt>Сыграно игр сегодня: <b>'.$user['chests_col_games'].'</b></tt><hr>
</center>';



if(isset($_GET['sel'])){
if($user['rubin'] < $cost_rb ){$_SESSION['err'] = '<font color=red>Ошибка! Не Хватает рубинов.</font>';header('Location: ?');exit();}
if($user['key'] < $cost_key ){$_SESSION['err'] = '<font color=red>Ошибка! Не Хватает ключей.</font>';header('Location: ?');exit();}

mysql_query('DELETE FROM `chests_autoboy` WHERE `user` = '.$user['id'].' ');
mysql_query("UPDATE `users` SET `chests_col_games` = '".($user['chests_col_games']+1)."', `key` = '".($user['key']-$cost_key)."', `rubin` = '".($user['rubin']-$cost_rb)."' WHERE `id` = '".$user['id']."' ");
$r1=rand(1,3);$r2=rand(1,3);$r3=rand(1,3);$r4=rand(1,3);$r5=rand(1,3);$r6=rand(1,3);$r7=rand(1,3);$r8=rand(1,3);$r9=rand(1,3);
if($r1!=2){$r11=0;}else{$r11=2;}if($r2!=2){$r22=0;}else{$r22=2;}if($r3!=2){$r33=0;}else{$r33=2;}if($r4!=2){$r44=0;}else{$r44=2;}if($r5!=2){$r55=0;}else{$r55=2;}if($r6!=2){$r66=0;}else{$r66=2;}if($r7!=2){$r77=0;}else{$r77=2;}if($r8!=2){$r88=0;}else{$r88=2;}if($r9!=2){$r99=0;}else{$r99=2;}
mysql_query("INSERT INTO `chests_autoboy` SET `1`='".$r11."',`2`='".$r22."',`3`='".$r33."',`4`='".$r44."',`5`='".$r55."',`6`='".$r66."',`7`='".$r77."',`8`='".$r88."',`9`='".$r99."', `user` = '".$user['id']."' ");
$chests_autoboy = mysql_fetch_array(mysql_query('SELECT * FROM `chests_autoboy` WHERE `user` = "'.$user['id'].'" '));
$test = $chests_autoboy['1']+$chests_autoboy['2']+$chests_autoboy['3']+$chests_autoboy['4']+$chests_autoboy['5']+$chests_autoboy['6']+$chests_autoboy['7']+$chests_autoboy['8']+$chests_autoboy['9'];
if($test<=4){$re=rand(1,5);}else{$re=5;}
if($re<=4){
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");

if($mission_user_19['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_19['prog_']+1)."' WHERE `id` = '".$mission_user_19['id']."' ");
}
if($Achievements_user_18['prog'] < $Achievements_user_18['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_18['prog']+1)."' WHERE `id` = '".$Achievements_user_18['id']."' ");
}

$_SESSION['ok'] = '<font color=#ddd>Успешно! Сундук найден!</font> ';
header('Location: ?');
exit();
}else{
$_SESSION['err'] = '<font color=red>Ошибка! Сундук не найден!</font> ';
header('Location: ?');
exit();
}
}




//}

















echo '<center>';
if($kol_us_chests > 0){



$wherechest = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' "),0);
$costwherechest = ceil($wherechest*10);
echo '<center><a href="?wherechest">Открыть все <font color=black>('.$wherechest.')</font> сундуков за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$costwherechest.'</a></center>';

if(isset($_GET['wherechest'])){
if($user['rubin'] < $costwherechest){
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font> ';
header('Location: ?');
exit();
}
$wherechest_tip1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' and `tip` = '1' "),0);
$wherechest_tip2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' and `tip` = '2' "),0);
$wherechest_tip3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' and `tip` = '3' "),0);
$wherechest_tip4 = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' and `tip` = '4' "),0);
$wherechest_tip5 = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' and `tip` = '5' "),0);
$wherechest_tip6 = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' and `tip` = '6' "),0);

$rubin1 = (50*$wherechest_tip1);
$time_mnogit1 = (600*$wherechest_tip1); // 10 мин
$mnog1 = (1*$wherechest_tip1);
$key1 = (5*$wherechest_tip1);

$rubin2 = (100*$wherechest_tip2);
$time_mnogit2 = (1200*$wherechest_tip2); // 20 мин
$mnog2 = (2*$wherechest_tip2);
$key2 = (7*$wherechest_tip2);

$rubin3 = (150*$wherechest_tip3);
$time_mnogit3 = (1800*$wherechest_tip3); // 30 мин
$mnog3 = (3*$wherechest_tip3);
$key3 = (10*$wherechest_tip3);

$rubin4 = (200*$wherechest_tip4);
$time_mnogit4 = (2400*$wherechest_tip4); // 40 мин
$mnog4 = (4*$wherechest_tip4);
$key4 = (15*$wherechest_tip4);

$rubin5 = (250*$wherechest_tip5);
$time_mnogit5 = (3000*$wherechest_tip5); // 50 мин
$mnog5 = (5*$wherechest_tip5);
$key5 = (20*$wherechest_tip5);

$rubin6 = (300*$wherechest_tip6);
$time_mnogit6 = (3600*$wherechest_tip6); // 1ч
$mnog6 = (6*$wherechest_tip6);
$key6 = (25*$wherechest_tip6);




if($wherechest_tip1>0){$musor_proc1 = (($user['musor_proc']*(1/100) /100))/6;}else{$musor_proc1 = 0;}
if($wherechest_tip2>0){$musor_proc2 = (($user['musor_proc']*(2/100) /100))/6;}else{$musor_proc2 = 0;}
if($wherechest_tip3>0){$musor_proc3 = (($user['musor_proc']*(3/100) /100))/6;}else{$musor_proc3 = 0;}
if($wherechest_tip4>0){$musor_proc4 = (($user['musor_proc']*(4/100) /100))/6;}else{$musor_proc4 = 0;}
if($wherechest_tip5>0){$musor_proc5 = (($user['musor_proc']*(5/100) /100))/6;}else{$musor_proc5 = 0;}
if($wherechest_tip6>0){$musor_proc6 = (($user['musor_proc']*(6/100) /100))/6;}else{$musor_proc6 = 0;}



$whererubin = ($rubin1+$rubin2+$rubin3+$rubin4+$rubin5+$rubin6)-$costwherechest; // +
$wheremusor_proc = ($musor_proc1+$musor_proc2+$musor_proc3+$musor_proc4+$musor_proc5+$musor_proc6); // +
$wheretime_mnogit = ($time_mnogit1+$time_mnogit2+$time_mnogit3+$time_mnogit4+$time_mnogit5+$time_mnogit6); // +
$wheremnog = ($mnog1+$mnog2+$mnog3+$mnog4+$mnog5+$mnog6); // +
$wherekey = ($key1+$key2+$key3+$key4+$key5+$key6); // +



if($wheretime_mnogit < 3600){
$tim = '<font size=1 color=black>(+'.floor($wheretime_mnogit/60).'мин.)</font>';
}else{
$tim = '<font size=1 color=black>(+'.floor($wheretime_mnogit/3600).'ч.)</font>';
}


if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $wheretime_mnogit)."',  `mnogit_boy` = '".($user['mnogit_boy'] + $wheremnog)."'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$wheretime_mnogit) )."',  `mnogit_boy` = '".($user['mnogit_boy'] = $wheremnog)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `key` = '".($user['key']+$wherekey)."', `rubin` = '".($user['rubin']+$whererubin)."', `musor_proc` = '".($user['musor_proc']+($wheremusor_proc))."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($wheremusor_proc))."' WHERE `id` = '".$soyz['id']."' ");

mysql_query('DELETE FROM `chests` WHERE `user` = '.$user['id'].' ');
$text = 'получено 
<img width="20" height="20" alt="Ключ" src="/chests/key.png" title="Ключ"> '.$wherekey.' шт. |
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$whererubin.' | 
<img src="/images/header/money_36.png" width="20" height="20"> <font color=black>(+'.n_f($wheremusor_proc).'%)</font> |
<img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$wheremnog.' на '.$tim.' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">

<font size=2 color=green><b>Получено:</b></font><br><br>

<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<img src="/images/ruby.png" width="35" height="35"> <br><font size=1><b>Рубины</b> <font color=black>(</font><font size=1 color=red>+'.n_f($whererubin).'</font><font color=black>)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/chests/key.png" width="35" height="35"> <br><font size=1>Кол-во: <font color=black>('.$wherekey.'шт.)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/images/header/money_36.png" width="35" height="35"> <br><font size=1><b>Коллекция</b> <font size=1 color=black>(+'.n_f($wheremusor_proc).'%)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<span class="count_room">x'.$wheremnog.'</span><img src="/images/VIP/udvoitel.png" width="35" height="35"> <br><font size=1><b>Множитель</b> '.$tim.'</font></center>
</td>

</tr></tbody></table>
<br><a class="btni" style="min-width:160px;margin:4px;" href="/chests/"><span><span>Закрыть</span></span></a>
</center> </span></li></ul></div>';

require_once ('system/footer.php');
exit();
}











if (empty($user['max'])) $user['max']=10;
$max = 25;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$chestss = mysql_query("SELECT * FROM `chests` WHERE `user` = '".$user['id']."' ORDER BY `id` DESC LIMIT $start,$max");
while($ches = mysql_fetch_assoc($chestss)){
if($ches['tip'] == 1){$chests_name = 'Деревянный сундук';}
if($ches['tip'] == 2){$chests_name = 'Серебряный сундук';}
if($ches['tip'] == 3){$chests_name = 'Золотой сундук';}
if($ches['tip'] == 4){$chests_name = 'Королевский сундук';}
if($ches['tip'] == 5){$chests_name = 'Магический сундук';}
if($ches['tip'] == 6){$chests_name = 'Легендарный сундук';}

if(!isset($_GET[''.$ches['id'].''])){
echo ' <a href="?'.$ches['id'].'"><div class="btni" style="background:001;background:000; height: 45px; width: 45px; top: 5px; padding: 5px 10px; box-shadow: inset 2px 3px 2px #; border: 2px solid #7dab2e; color:#FFFFFF; text-align: inherit; border-radius: 10px; border-radius: 10px;"><img style="vertical-align: top;" src="/chests/chests/'.$ches['tip'].'.png" alt="'.$chests_name.'" title="'.$chests_name.'"></div></a> ';
}else{
$ches_game = mysql_fetch_assoc(mysql_query("SELECT * FROM `chests` WHERE `id` = '".$ches['id']."' "));
if($ches_game['user'] != $user['id'] ){
$_SESSION['err'] = '<font color=red>Ошибка! Сундук не найден!</font> ';
header('Location: ?');
exit();
}














$musor_proc = (($user['musor_proc']*($ches['tip']/100) /100))/6;




if($ches['tip'] == 1){ // Деревянный
$rubin = 50;
$time_mnogit = 600; // 10 мин
$mnog = 1;
$key = 5;


if($time_mnogit < 3600){
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/60).'мин.)</font>';
}else{
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/3600).'ч.)</font>';
}


if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $time_mnogit)."',  `mnogit_boy` = '".($user['mnogit_boy'] + $mnog)."'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_mnogit) )."',  `mnogit_boy` = '".($user['mnogit_boy'] = $mnog)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `key` = '".($user['key']+$key)."', `rubin` = '".($user['rubin']+$rubin)."', `musor_proc` = '".($user['musor_proc']+($musor_proc))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($musor_proc))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
mysql_query('DELETE FROM `chests` WHERE `id` = '.$ches['id'].' ');
$text = '<b>'.$chests_name.'</b> получено 
<img width="20" height="20" alt="Ключ" src="/chests/key.png" title="Ключ"> '.$key.' шт. |
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$rubin.' | 
<img src="/images/header/money_36.png" width="20" height="20"> <font color=black>(+'.n_f($musor_proc).'%)</font> |
<img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$mnog.' на '.$tim.' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>'.$chests_name.'</b><br><img src="/chests/chests/'.$ches['tip'].'_.png" width="50" height="50"><br><hr>
<font size=2 color=green><b>Получено:</b></font><br><br>

<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<img src="/images/ruby.png" width="35" height="35"> <br><font size=1><b>Рубины</b> <font color=black>(</font><font size=1 color=red>+'.n_f($rubin).'</font><font color=black>)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/chests/key.png" width="35" height="35"> <br><font size=1>Кол-во: <font color=black>('.$key.'шт.)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/images/header/money_36.png" width="35" height="35"> <br><font size=1><b>Коллекция</b> <font size=1 color=black>(+'.n_f($musor_proc).'%)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<span class="count_room">x'.$mnog.'</span><img src="/images/VIP/udvoitel.png" width="35" height="35"> <br><font size=1><b>Множитель</b> '.$tim.'</font></center>
</td>

</tr></tbody></table>
<br><a class="btni" style="min-width:160px;margin:4px;" href="/chests/"><span><span>Закрыть</span></span></a>
</center> </span></li></ul></div>';

require_once ('system/footer.php');
exit();
}



if($ches['tip'] == 2){ // Серебрянный
$rubin = 100;
$time_mnogit = 1200; // 20 мин
$mnog = 2;
$key = 7;



if($time_mnogit < 3600){
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/60).'мин.)</font>';
}else{
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/3600).'ч.)</font>';
}



if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $time_mnogit)."',  `mnogit_boy` = '".($user['mnogit_boy'] + $mnog)."'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_mnogit) )."',  `mnogit_boy` = '".($user['mnogit_boy'] = $mnog)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `key` = '".($user['key']+$key)."', `rubin` = '".($user['rubin']+$rubin)."', `musor_proc` = '".($user['musor_proc']+($musor_proc))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($musor_proc))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
mysql_query('DELETE FROM `chests` WHERE `id` = '.$ches['id'].' ');
$text = '<b>'.$chests_name.'</b> получено 
<img width="20" height="20" alt="Ключ" src="/chests/key.png" title="Ключ"> '.$key.' шт. |
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$rubin.' | 
<img src="/images/header/money_36.png" width="20" height="20"> <font color=black>(+'.n_f($musor_proc).'%)</font> |
<img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$mnog.' на '.$tim.' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>'.$chests_name.'</b><br><img src="/chests/chests/'.$ches['tip'].'_.png" width="50" height="50"><br><hr>
<font size=2 color=green><b>Получено:</b></font><br><br>

<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<img src="/images/ruby.png" width="35" height="35"> <br><font size=1><b>Рубины</b> <font color=black>(</font><font size=1 color=red>+'.n_f($rubin).'</font><font color=black>)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/chests/key.png" width="35" height="35"> <br><font size=1>Кол-во: <font color=black>('.$key.'шт.)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/images/header/money_36.png" width="35" height="35"> <br><font size=1><b>Коллекция</b> <font size=1 color=black>(+'.n_f($musor_proc).'%)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<span class="count_room">x'.$mnog.'</span><img src="/images/VIP/udvoitel.png" width="35" height="35"> <br><font size=1><b>Множитель</b> '.$tim.'</font></center>
</td>

</tr></tbody></table>
<br><a class="btni" style="min-width:160px;margin:4px;" href="/chests/"><span><span>Закрыть</span></span></a>
</center> </span></li></ul></div>';

require_once ('system/footer.php');
exit();
}




if($ches['tip'] == 3){ // Золотой
$rubin = 150;
$time_mnogit = 1800; // 30 мин
$mnog = 3;
$key = 10;



if($time_mnogit < 3600){
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/60).'мин.)</font>';
}else{
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/3600).'ч.)</font>';
}



if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $time_mnogit)."',  `mnogit_boy` = '".($user['mnogit_boy'] + $mnog)."'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_mnogit) )."',  `mnogit_boy` = '".($user['mnogit_boy'] = $mnog)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `key` = '".($user['key']+$key)."', `rubin` = '".($user['rubin']+$rubin)."', `musor_proc` = '".($user['musor_proc']+($musor_proc))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($musor_proc))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
mysql_query('DELETE FROM `chests` WHERE `id` = '.$ches['id'].' ');
$text = '<b>'.$chests_name.'</b> получено 
<img width="20" height="20" alt="Ключ" src="/chests/key.png" title="Ключ"> '.$key.' шт. |
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$rubin.' | 
<img src="/images/header/money_36.png" width="20" height="20"> <font color=black>(+'.n_f($musor_proc).'%)</font> |
<img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$mnog.' на '.$tim.' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>'.$chests_name.'</b><br><img src="/chests/chests/'.$ches['tip'].'_.png" width="50" height="50"><br><hr>
<font size=2 color=green><b>Получено:</b></font><br><br>

<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<img src="/images/ruby.png" width="35" height="35"> <br><font size=1><b>Рубины</b> <font color=black>(</font><font size=1 color=red>+'.n_f($rubin).'</font><font color=black>)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/chests/key.png" width="35" height="35"> <br><font size=1>Кол-во: <font color=black>('.$key.'шт.)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/images/header/money_36.png" width="35" height="35"> <br><font size=1><b>Коллекция</b> <font size=1 color=black>(+'.n_f($musor_proc).'%)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<span class="count_room">x'.$mnog.'</span><img src="/images/VIP/udvoitel.png" width="35" height="35"> <br><font size=1><b>Множитель</b> '.$tim.'</font></center>
</td>

</tr></tbody></table>
<br><a class="btni" style="min-width:160px;margin:4px;" href="/chests/"><span><span>Закрыть</span></span></a>
</center> </span></li></ul></div>';

require_once ('system/footer.php');
exit();
}




if($ches['tip'] == 4){ // Королевский
$rubin = 200;
$time_mnogit = 2400; // 40 мин
$mnog = 4;
$key = 15;


if($time_mnogit < 3600){
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/60).'мин.)</font>';
}else{
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/3600).'ч.)</font>';
}



if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $time_mnogit)."',  `mnogit_boy` = '".($user['mnogit_boy'] + $mnog)."'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_mnogit) )."',  `mnogit_boy` = '".($user['mnogit_boy'] = $mnog)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `key` = '".($user['key']+$key)."', `rubin` = '".($user['rubin']+$rubin)."', `musor_proc` = '".($user['musor_proc']+($musor_proc))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($musor_proc))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
mysql_query('DELETE FROM `chests` WHERE `id` = '.$ches['id'].' ');
$text = '<b>'.$chests_name.'</b> получено 
<img width="20" height="20" alt="Ключ" src="/chests/key.png" title="Ключ"> '.$key.' шт. |
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$rubin.' | 
<img src="/images/header/money_36.png" width="20" height="20"> <font color=black>(+'.n_f($musor_proc).'%)</font> |
<img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$mnog.' на '.$tim.' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>'.$chests_name.'</b><br><img src="/chests/chests/'.$ches['tip'].'_.png" width="50" height="50"><br><hr>
<font size=2 color=green><b>Получено:</b></font><br><br>

<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<img src="/images/ruby.png" width="35" height="35"> <br><font size=1><b>Рубины</b> <font color=black>(</font><font size=1 color=red>+'.n_f($rubin).'</font><font color=black>)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/chests/key.png" width="35" height="35"> <br><font size=1>Кол-во: <font color=black>('.$key.'шт.)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/images/header/money_36.png" width="35" height="35"> <br><font size=1><b>Коллекция</b> <font size=1 color=black>(+'.n_f($musor_proc).'%)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<span class="count_room">x'.$mnog.'</span><img src="/images/VIP/udvoitel.png" width="35" height="35"> <br><font size=1><b>Множитель</b> '.$tim.'</font></center>
</td>

</tr></tbody></table>
<br><a class="btni" style="min-width:160px;margin:4px;" href="/chests/"><span><span>Закрыть</span></span></a>
</center> </span></li></ul></div>';

require_once ('system/footer.php');
exit();
}




if($ches['tip'] == 5){ // Магический
$rubin = 250;
$time_mnogit = 3000; // 50 мин
$mnog = 5;
$key = 20;


if($time_mnogit < 3600){
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/60).'мин.)</font>';
}else{
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/3600).'ч.)</font>';
}




if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $time_mnogit)."',  `mnogit_boy` = '".($user['mnogit_boy'] + $mnog)."'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_mnogit) )."',  `mnogit_boy` = '".($user['mnogit_boy'] = $mnog)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `key` = '".($user['key']+$key)."', `rubin` = '".($user['rubin']+$rubin)."', `musor_proc` = '".($user['musor_proc']+($musor_proc))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($musor_proc))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
mysql_query('DELETE FROM `chests` WHERE `id` = '.$ches['id'].' ');
$text = '<b>'.$chests_name.'</b> получено 
<img width="20" height="20" alt="Ключ" src="/chests/key.png" title="Ключ"> '.$key.' шт. |
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$rubin.' | 
<img src="/images/header/money_36.png" width="20" height="20"> <font color=black>(+'.n_f($musor_proc).'%)</font> |
<img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$mnog.' на '.$tim.' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>'.$chests_name.'</b><br><img src="/chests/chests/'.$ches['tip'].'_.png" width="50" height="50"><br><hr>
<font size=2 color=green><b>Получено:</b></font><br><br>

<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<img src="/images/ruby.png" width="35" height="35"> <br><font size=1><b>Рубины</b> <font color=black>(</font><font size=1 color=red>+'.n_f($rubin).'</font><font color=black>)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/chests/key.png" width="35" height="35"> <br><font size=1>Кол-во: <font color=black>('.$key.'шт.)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/images/header/money_36.png" width="35" height="35"> <br><font size=1><b>Коллекция</b> <font size=1 color=black>(+'.n_f($musor_proc).'%)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<span class="count_room">x'.$mnog.'</span><img src="/images/VIP/udvoitel.png" width="35" height="35"> <br><font size=1><b>Множитель</b> '.$tim.'</font></center>
</td>

</tr></tbody></table>
<br><a class="btni" style="min-width:160px;margin:4px;" href="/chests/"><span><span>Закрыть</span></span></a>
</center> </span></li></ul></div>';

require_once ('system/footer.php');
exit();
}




if($ches['tip'] == 6){ // Легендарный
$rubin = 300;
$time_mnogit = 3600; // 1ч
$mnog = 6;
$key = 25;


if($time_mnogit < 3600){
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/60).'мин.)</font>';
}else{
$tim = '<font size=1 color=black>(+'.floor($time_mnogit/3600).'ч.)</font>';
}



if($user['time_boy'] > time()) {
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] + $time_mnogit)."',  `mnogit_boy` = '".($user['mnogit_boy'] + $mnog)."'  WHERE `id` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_mnogit) )."',  `mnogit_boy` = '".($user['mnogit_boy'] = $mnog)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `users` SET `key` = '".($user['key']+$key)."', `rubin` = '".($user['rubin']+$rubin)."', `musor_proc` = '".($user['musor_proc']+($musor_proc))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($musor_proc))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
mysql_query('DELETE FROM `chests` WHERE `id` = '.$ches['id'].' ');
$text = '<b>'.$chests_name.'</b> получено 
<img width="20" height="20" alt="Ключ" src="/chests/key.png" title="Ключ"> '.$key.' шт. |
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$rubin.' | 
<img src="/images/header/money_36.png" width="20" height="20"> <font color=black>(+'.n_f($musor_proc).'%)</font> |
<img width="20" height="20" alt="множитель" src="/images/VIP/udvoitel.png" title="множитель"> х'.$mnog.' на '.$tim.' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>'.$chests_name.'</b><br><img src="/chests/chests/'.$ches['tip'].'_.png" width="50" height="50"><br><hr>
<font size=2 color=green><b>Получено:</b></font><br><br>

<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<img src="/images/ruby.png" width="35" height="35"> <br><font size=1><b>Рубины</b> <font color=black>(</font><font size=1 color=red>+'.n_f($rubin).'</font><font color=black>)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/chests/key.png" width="35" height="35"> <br><font size=1>Кол-во: <font color=black>('.$key.'шт.)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<img src="/images/header/money_36.png" width="35" height="35"> <br><font size=1><b>Коллекция</b> <font size=1 color=black>(+'.n_f($musor_proc).'%)</font></font>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<span class="count_room">x'.$mnog.'</span><img src="/images/VIP/udvoitel.png" width="35" height="35"> <br><font size=1><b>Множитель</b> '.$tim.'</font></center>
</center></td>

</tr></tbody></table>
<br><a class="btni" style="min-width:160px;margin:4px;" href="/chests/"><span><span>Закрыть</span></span></a>
</center> </span></li></ul></div>';

require_once ('system/footer.php');
exit();
}


}



}
echo '</center><br><hr>';
}





















$kol_his = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` > 0 "),0);
if($kol_his > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<center>Последние 10 наград:</center><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$chests_history = mysql_query("SELECT * FROM `chests_history` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($c_h = mysql_fetch_assoc($chests_history)){
if($c_h['user'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
if($c_h['text'] == 'Деревянный сундук (хэллоуин)' or $c_h['text'] == 'Деревянный сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Серебряный сундук (хэллоуин)' or $c_h['text'] == 'Серебряный сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Золотой сундук (хэллоуин)' or $c_h['text'] == 'Золотой сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Королевский сундук (хэллоуин)' or $c_h['text'] == 'Королевский сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Магический сундук (хэллоуин)' or $c_h['text'] == 'Магический сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Легендарный сундук (хэллоуин)' or $c_h['text'] == 'Легендарный сундук 10шт. (хэллоуин)'){
$tests = '<img src="/Halloween/images/'.$c_h['tip'].'.png" alt="" width="20" height="20" "=""> ';
}elseif($c_h['text'] == 'Деревянный сундук (Новый Год)' or $c_h['text'] == 'Деревянный сундук 10шт. (Новый Год)' or$c_h['text'] == 'Серебряный сундук (Новый Год)' or $c_h['text'] == 'Серебряный сундук 10шт. (Новый Год)' or$c_h['text'] == 'Золотой сундук (Новый Год)' or $c_h['text'] == 'Золотой сундук 10шт. (Новый Год)' or$c_h['text'] == 'Королевский сундук (Новый Год)' or $c_h['text'] == 'Королевский сундук 10шт. (Новый Год)' or$c_h['text'] == 'Магический сундук (Новый Год)' or $c_h['text'] == 'Магический сундук 10шт. (Новый Год)' or$c_h['text'] == 'Легендарный сундук (Новый Год)' or $c_h['text'] == 'Легендарный сундук 10шт. (Новый Год)'){
$tests = '<img src="/Halloween/images/_'.$c_h['tip'].'.png" alt="" width="20" height="20" "=""> ';
}elseif($c_h['text'] == 'Деревянный сундук (Турнир)' or $c_h['text'] == 'Деревянный сундук 10шт. (Турнир)' or$c_h['text'] == 'Серебряный сундук (Турнир)' or $c_h['text'] == 'Серебряный сундук 10шт. (Турнир)' or$c_h['text'] == 'Золотой сундук (Турнир)' or $c_h['text'] == 'Золотой сундук 10шт. (Турнир)' or$c_h['text'] == 'Королевский сундук (Турнир)' or $c_h['text'] == 'Королевский сундук 10шт. (Турнир)' or$c_h['text'] == 'Магический сундук (Турнир)' or $c_h['text'] == 'Магический сундук 10шт. (Турнир)' or$c_h['text'] == 'Легендарный сундук (Турнир)' or $c_h['text'] == 'Легендарный сундук 10шт. (Турнир)'){
$tests = '<img src="/Halloween/images/__'.$c_h['tip'].'.png" alt="" width="20" height="20" "=""> ';
}else{
$tests = '';
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($c_h['user']).'</span></span></span>
<span class="fr nobr">'.$tests.'<img width="24" height="24" alt="" src="/chests/chests/'.$c_h['tip'].'.png"> <font color=black size=1>'.time_last($c_h['time']).'</font></span>
<div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'chests/?',$k_page,$page); // Вывод страниц
}

}

















echo '</center><font size=1><b> <font color=black> <font size=3>•</font></font> Требуется 9 раз подряд открыть сундук не попав на пустой.</b></font><br>';
echo '<font size=1><b> <font color=black> <font size=3>•</font></font> Есть только одно право на ошибку.</b></font><br>';
//echo '<font size=1><b> <font color=black> <font size=3>•</font></font> Каждых 2 дня проходит <a href="'.$HOME.'Turnirs/">Турнир</a> на количество собранных призов. </b></font><br>';
echo '<font size=1><b> <font color=black> <font size=3>•</font></font> <img src="/chests/key.png" width="15" height="15"> Ключи можно заработать в <a href="'.$HOME.'mission/">заданиях</a>. </b></font><br>';
echo '<a class="btnl mt4" href="'.$HOME.'menu/"> Вернуться</a>';
if($kol_his > 0){if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить историю</a>';
}}

if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю ?
<div class="mt4"><a class="btni accept" href="?Reset/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset/'])){
if($user['level'] != 3){header('Location: ?');exit();}
mysql_query('DELETE FROM `chests_history` WHERE `id` ');
header('Location: ?');
exit();
}
require_once ('../system/footer.php');
?>