<?php
$title = 'Новогодние Игрушки';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}
if($promotions['promotion_9'] == 0){
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';



$toys = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' "));
$toy1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '1' "));
$toy2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '2' "));
$toy3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '3' "));
$toy4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '4' "));
$toy5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '5' "));
$toy6 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '6' "));
$toy7 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '7' "));
$toy8 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '8' "));
$toy9 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '9' "));
$toy10 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '10' "));
$toy11 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '11' "));
$toy12 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '12' "));
$toy13 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '13' "));
$toy14 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '14' "));
$toy15 = mysql_fetch_assoc(mysql_query("SELECT * FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '15' "));


$toykol1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '1' "),0);
$toykol2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '2' "),0);
$toykol3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '3' "),0);
$toykol4 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '4' "),0);
$toykol5 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '5' "),0);
$toykol6 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '6' "),0);
$toykol7 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '7' "),0);
$toykol8 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '8' "),0);
$toykol9 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '9' "),0);
$toykol10 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '10' "),0);
$toykol11 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '11' "),0);
$toykol12 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '12' "),0);
$toykol13 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '13' "),0);
$toykol14 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '14' "),0);
$toykol15 = mysql_result(mysql_query("SELECT COUNT(*) FROM `toys` WHERE `user` = '".$user['id']."' and `toy` = '15' "),0);

$cost1 = (($toykol1+$toykol2+$toykol3+$toykol4+$toykol5)*25);
$cost2 = (($toykol6+$toykol7+$toykol8+$toykol9+$toykol10)*50);
$cost3 = (($toykol11+$toykol12+$toykol13+$toykol14+$toykol15)*75);














if(isset($_GET['obmen1/'])){
if($toykol1 > 0 and $toykol2 > 0 and $toykol3 > 0 and $toykol4 > 0 and $toykol5 > 0 ){

$rand = rand(1,4);
if($rand == 1){
$rubin = rand(1,$cost1);
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "1" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "2" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "3" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "4" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "5" LIMIT 1 ');
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 2){
$rubin = rand(1,$cost1);
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "1" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "2" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "3" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "4" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "5" LIMIT 1 ');
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 3){
$rubin = rand(1,$cost1);
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "1" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "2" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "3" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "4" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "5" LIMIT 1 ');
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}

if($rand == 4){
$NewYearGifts = 1;
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']+$NewYearGifts)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "1" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "2" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "3" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "4" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "5" LIMIT 1 ');
$_SESSION['err'] = 'Подарок: <img width="24" height="24" alt="Подарок" src="/images/gift.png" title="Подарок"> <font color=black>+'.$NewYearGifts.'</font>';
header('Location: ?');
exit();
}

}else{
$_SESSION['err'] = '<font color=red>Необходимо собрать все виды Игрушки!</font>';
header('Location: ?');
exit();
}
}


if(isset($_GET['obmen2/'])){
if($toykol6 > 0 and $toykol7 > 0 and $toykol8 > 0 and $toykol9 > 0 and $toykol10 > 0 ){

$rand = rand(1,3);
if($rand == 1){
$rubin = rand(1,$cost2);
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "6" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "7" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "8" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "9" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "10" LIMIT 1 ');
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 2){
$rubin = rand(1,$cost2);
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "6" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "7" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "8" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "9" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "10" LIMIT 1 ');
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 3){
$NewYearGifts = 1;
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']+$NewYearGifts)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "6" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "7" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "8" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "9" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "10" LIMIT 1 ');
$_SESSION['err'] = 'Подарок: <img width="24" height="24" alt="Подарок" src="/images/gift.png" title="Подарок"> <font color=black>+'.$NewYearGifts.'</font>';
header('Location: ?');
exit();
}

}else{
$_SESSION['err'] = '<font color=red>Необходимо собрать все виды Игрушки!</font>';
header('Location: ?');
exit();
}
}


if(isset($_GET['obmen3/'])){
if($toykol11 > 0 and $toykol12 > 0 and $toykol13 > 0 and $toykol14 > 0 and $toykol15 > 0 ){

$rand = rand(1,2);
if($rand == 1){
$rubin = rand(1,$cost3);
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "11" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "12" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "13" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "14" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "15" LIMIT 1 ');
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}

if($rand == 2){
$NewYearGifts = 1;
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']+$NewYearGifts)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "11" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "12" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "13" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "14" LIMIT 1 ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "15" LIMIT 1 ');
$_SESSION['err'] = 'Подарок: <img width="24" height="24" alt="Подарок" src="/images/gift.png" title="Подарок"> <font color=black>+'.$NewYearGifts.'</font>';
header('Location: ?');
exit();
}

}else{
$_SESSION['err'] = '<font color=red>Необходимо собрать все виды Игрушки!</font>';
header('Location: ?');
exit();
}
}













if(isset($_GET['sell1/'])){
if($toykol1 <= 0 && $toykol2 <= 0 && $toykol3 <= 0 && $toykol4 <= 0 && $toykol5 <= 0 ){
$_SESSION['err'] = '<font color=red>Нету игрушек для продажи.</font>';
header('Location: ?');
exit();
}
$_SESSION['err'] = 'Вы уверены?
<div class="mt4"><a class="btni accept" href="?sell_1/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

if(isset($_GET['sell2/'])){
if($toykol6 <= 0 && $toykol7 <= 0 && $toykol8 <= 0 && $toykol9 <= 0 && $toykol10 <= 0 ){
$_SESSION['err'] = '<font color=red>Нету игрушек для продажи.</font>';
header('Location: ?');
exit();
}
$_SESSION['err'] = 'Вы уверены?
<div class="mt4"><a class="btni accept" href="?sell_2/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

if(isset($_GET['sell3/'])){
if($toykol11 <= 0 && $toykol12 <= 0 && $toykol13 <= 0 && $toykol14 <= 0 && $toykol15 <= 0 ){
$_SESSION['err'] = '<font color=red>Нету игрушек для продажи.</font>';
header('Location: ?');
exit();
}
$_SESSION['err'] = 'Вы уверены?
<div class="mt4"><a class="btni accept" href="?sell_3/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}



if(isset($_GET['sell_1/'])){
if($toykol1 <= 0 && $toykol2 <= 0 && $toykol3 <= 0 && $toykol4 <= 0 && $toykol5 <= 0 ){
$_SESSION['err'] = '<font color=red>Нету игрушек для продажи.</font>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$cost1)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "1" ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "2"  ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "3"  ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "4" ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "5"  ');
$_SESSION['err'] = 'Успешно: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$cost1.'</font>';
header('Location: ?');
exit();
}

if(isset($_GET['sell_2/'])){
if($toykol6 <= 0 && $toykol7 <= 0 && $toykol8 <= 0 && $toykol9 <= 0 && $toykol10 <= 0 ){
$_SESSION['err'] = '<font color=red>Нету игрушек для продажи.</font>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$cost2)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "6" ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "7"  ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "8"  ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "9" ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "10"  ');
$_SESSION['err'] = 'Успешно: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$cost2.'</font>';
header('Location: ?');
exit();
}

if(isset($_GET['sell_3/'])){
if($toykol11 <= 0 && $toykol12 <= 0 && $toykol13 <= 0 && $toykol14 <= 0 && $toykol15 <= 0 ){
$_SESSION['err'] = '<font color=red>Нету игрушек для продажи.</font>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$cost3)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "11" ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "12"  ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "13"  ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "14" ');
mysql_query('DELETE FROM `toys` WHERE `user` = "'.$user['id'].'" and `toy` = "15"  ');
$_SESSION['err'] = 'Успешно: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$cost3.'</font>';
header('Location: ?');
exit();
}













echo '<center><span class="count_room">'.$toykol1.'</span><img src="/images/toys/1.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol2.'</span><img src="/images/toys/2.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol3.'</span><img src="/images/toys/3.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol4.'</span><img src="/images/toys/4.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol5.'</span><img src="/images/toys/5.png" alt="" width="50" height="50""><br>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?obmen1/"><span><span>Обменять</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?sell1/"><span><span>Продать <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$cost1.'</span></span></a>';
echo '</center><font color=black size=2>Шанс выпадения Подарка при обмене:</font> <font size=2><b>1 из 4</b></font><br>
<font color=black size=2>Шанс выпадения Рубинов при обмене:</font> <font size=2><b>3 из 4</b> ( Кол-во: от <b>1</b> до <b>'.$cost1.'</b> ).</font><br>
<font color=black size=2>Продажа игрушек:</font> <font size=2><b><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> 25 рубинов за каждую игрушку.</b></font><br>';



echo '<hr><center>
<span class="count_room">'.$toykol6.'</span><img src="/images/toys/6.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol7.'</span><img src="/images/toys/7.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol8.'</span><img src="/images/toys/8.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol9.'</span><img src="/images/toys/9.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol10.'</span><img src="/images/toys/10.png" alt="" width="50" height="50""><br>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?obmen2/"><span><span>Обменять</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?sell2/"><span><span>Продать <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$cost2.'</span></span></a>';
echo '</center><font color=black size=2>Шанс выпадения Подарка при обмене:</font> <font size=2><b>1 из 3</b></font><br>
<font color=black size=2>Шанс выпадения Рубинов при обмене:</font> <font size=2><b>2 из 3</b> ( Кол-во: от <b>1</b> до <b>'.$cost2.'</b> ).</font><br>
<font color=black size=2>Продажа игрушек:</font> <font size=2><b><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> 50 рубинов за каждую игрушку.</b></font><br>';


echo '<hr><center>
<span class="count_room">'.$toykol11.'</span><img src="/images/toys/11.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol12.'</span><img src="/images/toys/12.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol13.'</span><img src="/images/toys/13.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol14.'</span><img src="/images/toys/14.png" alt="" width="50" height="50"">
<span class="count_room">'.$toykol15.'</span><img src="/images/toys/15.png" alt="" width="50" height="50""><br>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?obmen3/"><span><span>Обменять</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?sell3/"><span><span>Продать <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$cost3.'</span></span></a>';
echo '</center><font color=black size=2>Шанс выпадения Подарка при обмене:</font> <font size=2><b>1 из 2</b></font><br>
<font color=black size=2>Шанс выпадения Рубинов при обмене:</font> <font size=2><b>1 из 2</b> ( Кол-во: от <b>1</b> до <b>'.$cost3.'</b> ).</font><br>
<font color=black size=2>Продажа игрушек:</font> <font size=2><b><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> 75 рубинов за каждую игрушку.</b></font><br>';




echo '<a class="btnl mt4" href="'.$HOME.'NewYearGifts/"><img width="25" height="25" alt="" src="/images/gift.png"> Новогодние Подарки</a>';

echo '<br><tt>
<font size="2"><font color="black" size="3">•</font><b> во время действия акции всем игрокам выпадают игрушки случайным образом по всей игре и за каждое выполненное задание.</b>
<br>собирайте игрушки, продавайте их за рубины, или обменивайте и получите шанс найти подарок в котором могут быть не плохие призы!<br>
</font></tt>';


require_once ('system/footer.php');
?> 