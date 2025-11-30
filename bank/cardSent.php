<?php
$title = 'Банк';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}



echo '<a class="btnl mt4" href="'.$HOME.'bank/">Назад</a>';
echo '<div class="mt4 content">Выберите карту для обмена</div>';



$RandImageCard = rand(1,20);
$card_x1 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '1' "),0);
$card_x2 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '2' "),0);
$card_x3 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '3' "),0);
$card_x4 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '4' "),0);
$card_x5 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '5' "),0);
$card_x6 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '6' "),0);
$card_x7 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '7' "),0);
$card_x8 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '8' "),0);
$card_x9 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '9' "),0);
$card_x10 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '10' "),0);
$card_x11 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '11' "),0);
$card_x12 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '12' "),0);
$card_x13 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '13' "),0);
$card_x14 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '14' "),0);
$card_x15 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '15' "),0);
$card_x16 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '16' "),0);
$card_x17 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '17' "),0);
$card_x18 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '18' "),0);
$card_x19 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '19' "),0);
$card_x20 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '20' "),0);
$card_x21 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '21' "),0);
$card_x22 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '22' "),0);
$card_x23 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '23' "),0);
$card_x24 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '24' "),0);
$card_x25 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '25' "),0);
$card_x26 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '26' "),0);
$card_x27 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '27' "),0);
$card_x28 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '28' "),0);
$card_x29 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '29' "),0);
$card_x30 =mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' and `xxx` = '30' "),0);





$Xcard2=2;$Xcard222=1;$colcard2=2;
$Xcard3=3;$Xcard333=2;$colcard3=2;
$Xcard4=4;$Xcard444=3;$colcard4=2;
$Xcard5=5;$Xcard555=4;$colcard5=2;
$Xcard6=6;$Xcard666=5;$colcard6=2;
$Xcard7=7;$Xcard777=6;$colcard7=2;
$Xcard8=8;$Xcard888=7;$colcard8=2;
$Xcard9=9;$Xcard999=8;$colcard9=2;
$Xcard10=10;$Xcard101010=9;$colcard10=2;
$Xcard11=11;$Xcard111111=10;$colcard11=2;
$Xcard12=12;$Xcard121212=11;$colcard12=2;
$Xcard13=13;$Xcard131313=12;$colcard13=2;
$Xcard14=14;$Xcard141414=13;$colcard14=2;
$Xcard15=15;$Xcard151515=14;$colcard15=2;
$Xcard16=16;$Xcard161616=15;$colcard16=2;
$Xcard17=17;$Xcard171717=16;$colcard17=2;
$Xcard18=18;$Xcard181818=17;$colcard18=2;
$Xcard19=19;$Xcard191919=18;$colcard19=2;
$Xcard20=20;$Xcard202020=19;$colcard20=2;
$Xcard21=21;$Xcard212121=20;$colcard21=2;
$Xcard22=22;$Xcard222222=21;$colcard22=2;
$Xcard23=23;$Xcard232323=22;$colcard23=2;
$Xcard24=24;$Xcard242424=23;$colcard24=2;
$Xcard25=25;$Xcard252525=24;$colcard25=2;
$Xcard26=26;$Xcard262626=25;$colcard26=2;
$Xcard27=27;$Xcard272727=26;$colcard27=2;
$Xcard28=28;$Xcard282828=27;$colcard28=2;
$Xcard29=29;$Xcard292929=28;$colcard29=2;
$Xcard30=30;$Xcard303030=29;$colcard30=2;











if(isset($_GET['buy_x1'])){
if($card_x1 < $colcard2){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard2");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard222.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard2."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x10'])){
if($card_x1 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard222.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard2."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}


if(isset($_GET['buy_x2'])){
if($card_x2 < $colcard3){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o2 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard3");
$kad_o2 = mysql_fetch_array ($kardd_o2);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard333.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o2 = mysql_fetch_array ($kardd_o2));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard3."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x20'])){
if($card_x2 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard333.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard3."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x3'])){
if($card_x3 < $colcard4){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o3 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard4");
$kad_o3 = mysql_fetch_array ($kardd_o3);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard444.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o3 = mysql_fetch_array ($kardd_o3));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard4."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x30'])){
if($card_x3 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard444.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard4."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x4'])){
if($card_x4 < $colcard5){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o4 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard5");
$kad_o4 = mysql_fetch_array ($kardd_o4);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard555.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o4 = mysql_fetch_array ($kardd_o4));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard5."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x40'])){
if($card_x4 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard555.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard5."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x5'])){
if($card_x5 < $colcard6){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o5 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard6");
$kad_o5 = mysql_fetch_array ($kardd_o5);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard666.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o5 = mysql_fetch_array ($kardd_o5));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard6."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x50'])){
if($card_x5 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard666.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard6."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x6'])){
if($card_x6 < $colcard7){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o6 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard7");
$kad_o6 = mysql_fetch_array ($kardd_o6);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard777.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o6 = mysql_fetch_array ($kardd_o6));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard7."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x60'])){
if($card_x6 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard777.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard7."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x7'])){
if($card_x7 < $colcard8){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o7 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard8");
$kad_o7 = mysql_fetch_array ($kardd_o7);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard888.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o7 = mysql_fetch_array ($kardd_o7));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard8."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x70'])){
if($card_x7 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard888.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard8."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}


if(isset($_GET['buy_x8'])){
if($card_x8 < $colcard9){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o8 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard9");
$kad_o8 = mysql_fetch_array ($kardd_o8);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard999.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o8 = mysql_fetch_array ($kardd_o8));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard9."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x80'])){
if($card_x8 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard999.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard9."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}


if(isset($_GET['buy_x9'])){
if($card_x9 < $colcard10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o9 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard10");
$kad_o9 = mysql_fetch_array ($kardd_o9);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard101010.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o9 = mysql_fetch_array ($kardd_o9));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard10."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x90'])){
if($card_x9 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard101010.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard10."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x10'])){
if($card_x10 < $colcard11){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard11");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard111111.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard11."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x100'])){
if($card_x10 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard111111.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard11."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x11'])){
if($card_x11 < $colcard12){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o11 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard12");
$kad_o11 = mysql_fetch_array ($kardd_o11);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard121212.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o11 = mysql_fetch_array ($kardd_o11));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard12."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x110'])){
if($card_x11 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard121212.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard12."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x12'])){
if($card_x12 < $colcard13){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o12 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard13");
$kad_o12 = mysql_fetch_array ($kardd_o12);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard131313.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o12 = mysql_fetch_array ($kardd_o12));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard13."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x120'])){
if($card_x12 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard131313.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard13."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x13'])){
if($card_x13 < $colcard14){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o13 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard14");
$kad_o13 = mysql_fetch_array ($kardd_o13);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard141414.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o13 = mysql_fetch_array ($kardd_o13));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard14."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x130'])){
if($card_x13 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard141414.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard14."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x14'])){
if($card_x14 < $colcard15){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o14 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard15");
$kad_o14 = mysql_fetch_array ($kardd_o14);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard151515.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o14 = mysql_fetch_array ($kardd_o14));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard15."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x140'])){
if($card_x14 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard151515.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard15."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x15'])){
if($card_x15 < $colcard16){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o15 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard16");
$kad_o15 = mysql_fetch_array ($kardd_o15);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard161616.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o15 = mysql_fetch_array ($kardd_o15));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard16."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x150'])){
if($card_x15 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard161616.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard16."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x16'])){
if($card_x16 < $colcard17){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o16 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard17");
$kad_o16 = mysql_fetch_array ($kardd_o16);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard171717.' and `user` = '.$user['id'].' limit 1 ');
} while ($kad_o16 = mysql_fetch_array ($kardd_o16));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard17."' ");
$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x160'])){
if($card_x16 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard171717.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard17."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x17'])){
if($card_x17 < $colcard18){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o17 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard18");
$kad_o17 = mysql_fetch_array ($kardd_o17);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard181818.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o17 = mysql_fetch_array ($kardd_o17));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard18."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x170'])){
if($card_x17 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard181818.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard18."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x18'])){
if($card_x18 < $colcard19){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o18 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard19");
$kad_o18 = mysql_fetch_array ($kardd_o18);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard191919.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o18 = mysql_fetch_array ($kardd_o18));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard19."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x180'])){
if($card_x18 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard191919.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard19."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x19'])){
if($card_x19 < $colcard20){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o19 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard20");
$kad_o19 = mysql_fetch_array ($kardd_o19);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard202020.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o19 = mysql_fetch_array ($kardd_o19));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard20."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x190'])){
if($card_x19 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard202020.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard20."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x20'])){
if($card_x20 < $colcard21){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o20 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard21");
$kad_o20 = mysql_fetch_array ($kardd_o20);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard212121.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o20 = mysql_fetch_array ($kardd_o20));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard21."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x200'])){
if($card_x20 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard212121.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard21."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x21'])){
if($card_x21 < $colcard22){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o21 = mysql_query("SELECT * FROM `biznes` WHERE `id` ");
$kad_o21 = mysql_fetch_array ($kardd_o21);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard222222.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o21 = mysql_fetch_array ($kardd_o21));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard22."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x210'])){
if($card_x21 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard222222.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard22."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x22'])){
if($card_x22 < $colcard23){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o22 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard23");
$kad_o22 = mysql_fetch_array ($kardd_o22);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard232323.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o22 = mysql_fetch_array ($kardd_o22));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard23."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x220'])){
if($card_x22 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard232323.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard23."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x23'])){
if($card_x23 < $colcard24){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o23 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard24");
$kad_o23 = mysql_fetch_array ($kardd_o23);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard242424.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o23 = mysql_fetch_array ($kardd_o23));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard24."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x230'])){
if($card_x23 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard242424.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard24."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x24'])){
if($card_x24 < $colcard25){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o24 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard25");
$kad_o24 = mysql_fetch_array ($kardd_o24);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard252525.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o24 = mysql_fetch_array ($kardd_o24));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard25."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x240'])){
if($card_x24 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard252525.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard25."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x25'])){
if($card_x25 < $colcard26){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o25 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard26");
$kad_o25 = mysql_fetch_array ($kardd_o25);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard262626.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o25 = mysql_fetch_array ($kardd_o25));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard26."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x250'])){
if($card_x25 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard262626.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard26."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x26'])){
if($card_x26 < $colcard27){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o26 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard27");
$kad_o26 = mysql_fetch_array ($kardd_o26);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard272727.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o26 = mysql_fetch_array ($kardd_o26));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard27."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x260'])){
if($card_x26 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard272727.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard27."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x27'])){
if($card_x27 < $colcard28){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o27 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard28");
$kad_o27 = mysql_fetch_array ($kardd_o27);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard282828.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o27 = mysql_fetch_array ($kardd_o27));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard28."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x270'])){
if($card_x27 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard282828.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard28."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}


if(isset($_GET['buy_x28'])){
if($card_x28 < $colcard29){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o28 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard29");
$kad_o28 = mysql_fetch_array ($kardd_o28);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard292929.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o28 = mysql_fetch_array ($kardd_o28));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard29."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x280'])){
if($card_x28 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard292929.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard29."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}

if(isset($_GET['buy_x29'])){
if($card_x29 < $colcard30){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o29 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $colcard30");
$kad_o29 = mysql_fetch_array ($kardd_o29);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard303030.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o29 = mysql_fetch_array ($kardd_o29));
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard30."' ");

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
if(isset($_GET['buy_x290'])){
if($card_x29 < 10){
$_SESSION['err'] = 'Не хватает карт для обмена.';
header('Location: ?');
exit();
}
$kardd_o1 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$kad_o1 = mysql_fetch_array ($kardd_o1);
do {
mysql_query('DELETE FROM `corporate_card` WHERE `xxx` = '.$Xcard303030.' and `user` = '.$user['id'].' limit 1');
} while ($kad_o1 = mysql_fetch_array ($kardd_o1));
///////////////////////////////////////////////////
$kardd_o10 = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 5");
$kad_o10 = mysql_fetch_array ($kardd_o10);
do {
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$RandImageCard."', `xxx` = '".$Xcard30."' ");
} while ($kad_o10 = mysql_fetch_array ($kardd_o10));

$_SESSION['ok'] = 'Обмен прошел успешно.';
header('Location: ?');
exit();
}
























echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard2.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard2.' <font color=grey>['.$card_x2.']</font></div><div>';
if($card_x1 < $colcard2){$font1 = '<font color=red>';}
if($card_x1 < 10){$font10 = '<font color=red>';}
echo '<a class="btni" href="?buy_x1" style="margin-top: 4px; min-width: 130px;">'.$font1.'Отдать <span class="count_room">х'.$Xcard222.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard2.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x10">'.$font10.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard3.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard3.' <font color=grey>['.$card_x3.']</font></div><div>';
if($card_x2 < $colcard3){$font2 = '<font color=red>';}
if($card_x2 < 10){$font20 = '<font color=red>';}
echo '<a class="btni" href="?buy_x2" style="margin-top: 4px; min-width: 130px;">'.$font2.'Отдать <span class="count_room">х'.$Xcard333.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard3.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x20">'.$font20.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard4.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard4.' <font color=grey>['.$card_x4.']</font></div><div>';
if($card_x3 < $colcard4){$font3 = '<font color=red>';}
if($card_x3 < 10){$font30 = '<font color=red>';}
echo '<a class="btni" href="?buy_x3" style="margin-top: 4px; min-width: 130px;">'.$font3.'Отдать <span class="count_room">х'.$Xcard444.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard4.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x30">'.$font30.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard5.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard5.' <font color=grey>['.$card_x5.']</font></div><div>';
if($card_x4 < $colcard5){$font4 = '<font color=red>';}
if($card_x4 < 10){$font40 = '<font color=red>';}
echo '<a class="btni" href="?buy_x4" style="margin-top: 4px; min-width: 130px;">'.$font4.'Отдать <span class="count_room">х'.$Xcard555.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard5.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x40">'.$font40.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard6.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard6.' <font color=grey>['.$card_x6.']</font></div><div>';
if($card_x5 < $colcard6){$font5 = '<font color=red>';}
if($card_x5 < 10){$font50 = '<font color=red>';}
echo '<a class="btni" href="?buy_x5" style="margin-top: 4px; min-width: 130px;">'.$font5.'Отдать <span class="count_room">х'.$Xcard666.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard6.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x50">'.$font50.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard7.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard7.' <font color=grey>['.$card_x7.']</font></div><div>';
if($card_x6 < $colcard7){$font6 = '<font color=red>';}
if($card_x6 < 10){$font60 = '<font color=red>';}
echo '<a class="btni" href="?buy_x6" style="margin-top: 4px; min-width: 130px;">'.$font6.'Отдать <span class="count_room">х'.$Xcard777.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard7.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x60">'.$font60.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard8.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard8.' <font color=grey>['.$card_x8.']</font></div><div>';
if($card_x7 < $colcard8){$font7 = '<font color=red>';}
if($card_x7 < 10){$font70 = '<font color=red>';}
echo '<a class="btni" href="?buy_x7" style="margin-top: 4px; min-width: 130px;">'.$font7.'Отдать <span class="count_room">х'.$Xcard888.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard8.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x70">'.$font70.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard9.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard9.' <font color=grey>['.$card_x9.']</font></div><div>';
if($card_x8 < $colcard9){$font8 = '<font color=red>';}
if($card_x8 < 10){$font80 = '<font color=red>';}
echo '<a class="btni" href="?buy_x8" style="margin-top: 4px; min-width: 130px;">'.$font8.'Отдать <span class="count_room">х'.$Xcard999.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard9.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x80">'.$font80.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';


echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard10.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard10.' <font color=grey>['.$card_x10.']</font></div><div>';
if($card_x9 < $colcard10){$font9 = '<font color=red>';}
if($card_x9 < 10){$font90 = '<font color=red>';}
echo '<a class="btni" href="?buy_x9" style="margin-top: 4px; min-width: 130px;">'.$font9.'Отдать <span class="count_room">х'.$Xcard101010.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard10.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x90">'.$font90.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard11.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard11.' <font color=grey>['.$card_x11.']</font></div><div>';
if($card_x10 < $colcard11){$font10 = '<font color=red>';}
if($card_x10 < 10){$font100 = '<font color=red>';}
echo '<a class="btni" href="?buy_x10" style="margin-top: 4px; min-width: 130px;">'.$font10.'Отдать <span class="count_room">х'.$Xcard111111.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard11.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x100">'.$font100.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard12.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard12.' <font color=grey>['.$card_x12.']</font></div><div>';
if($card_x11 < $colcard12){$font11 = '<font color=red>';}
if($card_x11 < 10){$font110 = '<font color=red>';}
echo '<a class="btni" href="?buy_x11" style="margin-top: 4px; min-width: 130px;">'.$font11.'Отдать <span class="count_room">х'.$Xcard121212.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard12.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x110">'.$font110.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard13.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard13.' <font color=grey>['.$card_x13.']</font></div><div>';
if($card_x12 < $colcard13){$font12 = '<font color=red>';}
if($card_x12 < 10){$font120 = '<font color=red>';}
echo '<a class="btni" href="?buy_x12" style="margin-top: 4px; min-width: 130px;">'.$font12.'Отдать <span class="count_room">х'.$Xcard131313.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard13.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x120">'.$font120.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard14.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard14.' <font color=grey>['.$card_x14.']</font></div><div>';
if($card_x13 < $colcard14){$font13 = '<font color=red>';}
if($card_x13 < 10){$font130 = '<font color=red>';}
echo '<a class="btni" href="?buy_x13" style="margin-top: 4px; min-width: 130px;">'.$font13.'Отдать <span class="count_room">х'.$Xcard141414.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard14.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x130">'.$font130.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard15.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard15.' <font color=grey>['.$card_x15.']</font></div><div>';
if($card_x14 < $colcard15){$font14 = '<font color=red>';}
if($card_x14 < 10){$font140 = '<font color=red>';}
echo '<a class="btni" href="?buy_x14" style="margin-top: 4px; min-width: 130px;">'.$font14.'Отдать <span class="count_room">х'.$Xcard151515.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard15.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x140">'.$font140.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard16.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard16.' <font color=grey>['.$card_x16.']</font></div><div>';
if($card_x15 < $colcard16){$font15 = '<font color=red>';}
if($card_x15 < 10){$font150 = '<font color=red>';}
echo '<a class="btni" href="?buy_x15" style="margin-top: 4px; min-width: 130px;">'.$font15.'Отдать <span class="count_room">х'.$Xcard161616.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard16.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x150">'.$font150.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard17.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard17.' <font color=grey>['.$card_x17.']</font></div><div>';
if($card_x16 < $colcard17){$font16 = '<font color=red>';}
if($card_x16 < 10){$font160 = '<font color=red>';}
echo '<a class="btni" href="?buy_x16" style="margin-top: 4px; min-width: 130px;">'.$font16.'Отдать <span class="count_room">х'.$Xcard171717.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard17.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x160">'.$font160.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard18.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard18.' <font color=grey>['.$card_x18.']</font></div><div>';
if($card_x17 < $colcard18){$font17 = '<font color=red>';}
if($card_x17 < 10){$font170 = '<font color=red>';}
echo '<a class="btni" href="?buy_x17" style="margin-top: 4px; min-width: 130px;">'.$font17.'Отдать <span class="count_room">х'.$Xcard181818.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard18.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x170">'.$font170.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard19.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard19.' <font color=grey>['.$card_x19.']</font></div><div>';
if($card_x18 < $colcard19){$font18 = '<font color=red>';}
if($card_x18 < 10){$font180 = '<font color=red>';}
echo '<a class="btni" href="?buy_x18" style="margin-top: 4px; min-width: 130px;">'.$font18.'Отдать <span class="count_room">х'.$Xcard191919.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard19.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x180">'.$font180.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard20.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard20.' <font color=grey>['.$card_x20.']</font></div><div>';
if($card_x19 < $colcard20){$font19 = '<font color=red>';}
if($card_x19 < 10){$font190 = '<font color=red>';}
echo '<a class="btni" href="?buy_x19" style="margin-top: 4px; min-width: 130px;">'.$font19.'Отдать <span class="count_room">х'.$Xcard202020.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard20.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x190">'.$font190.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard21.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard21.' <font color=grey>['.$card_x21.']</font></div><div>';
if($card_x20 < $colcard21){$font20 = '<font color=red>';}
if($card_x20 < 10){$font200 = '<font color=red>';}
echo '<a class="btni" href="?buy_x20" style="margin-top: 4px; min-width: 130px;">'.$font20.'Отдать <span class="count_room">х'.$Xcard212121.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard21.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x200">'.$font200.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard22.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard22.' <font color=grey>['.$card_x22.']</font></div><div>';
if($card_x21 < $colcard22){$font21 = '<font color=red>';}
if($card_x21 < 10){$font210 = '<font color=red>';}
echo '<a class="btni" href="?buy_x21" style="margin-top: 4px; min-width: 130px;">'.$font21.'Отдать <span class="count_room">х'.$Xcard222222.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard22.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x210">'.$font210.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard23.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard23.' <font color=grey>['.$card_x23.']</font></div><div>';
if($card_x22 < $colcard23){$font22 = '<font color=red>';}
if($card_x22 < 10){$font220 = '<font color=red>';}
echo '<a class="btni" href="?buy_x22" style="margin-top: 4px; min-width: 130px;">'.$font22.'Отдать <span class="count_room">х'.$Xcard232323.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard23.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x220">'.$font220.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard24.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard24.' <font color=grey>['.$card_x24.']</font></div><div>';
if($card_x23 < $colcard24){$font23 = '<font color=red>';}
if($card_x23 < 10){$font230 = '<font color=red>';}
echo '<a class="btni" href="?buy_x23" style="margin-top: 4px; min-width: 130px;">'.$font23.'Отдать <span class="count_room">х'.$Xcard242424.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard24.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x230">'.$font230.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard25.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard25.' <font color=grey>['.$card_x25.']</font></div><div>';
if($card_x24 < $colcard25){$font24 = '<font color=red>';}
if($card_x24 < 10){$font240 = '<font color=red>';}
echo '<a class="btni" href="?buy_x24" style="margin-top: 4px; min-width: 130px;">'.$font24.'Отдать <span class="count_room">х'.$Xcard252525.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard25.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x240">'.$font240.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard26.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard26.' <font color=grey>['.$card_x26.']</font></div><div>';
if($card_x25 < $colcard26){$font25 = '<font color=red>';}
if($card_x25 < 10){$font250 = '<font color=red>';}
echo '<a class="btni" href="?buy_x25" style="margin-top: 4px; min-width: 130px;">'.$font25.'Отдать <span class="count_room">х'.$Xcard262626.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard26.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x250">'.$font250.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard27.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard27.' <font color=grey>['.$card_x27.']</font></div><div>';
if($card_x26 < $colcard27){$font26 = '<font color=red>';}
if($card_x26 < 10){$font260 = '<font color=red>';}
echo '<a class="btni" href="?buy_x26" style="margin-top: 4px; min-width: 130px;">'.$font26.'Отдать <span class="count_room">х'.$Xcard272727.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard27.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x260">'.$font260.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard28.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard28.' <font color=grey>['.$card_x28.']</font></div><div>';
if($card_x27 < $colcard28){$font27 = '<font color=red>';}
if($card_x27 < 10){$font270 = '<font color=red>';}
echo '<a class="btni" href="?buy_x27" style="margin-top: 4px; min-width: 130px;">'.$font27.'Отдать <span class="count_room">х'.$Xcard282828.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard28.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x270">'.$font270.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard29.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard29.' <font color=grey>['.$card_x29.']</font></div><div>';
if($card_x28 < $colcard29){$font28 = '<font color=red>';}
if($card_x28 < 10){$font280 = '<font color=red>';}
echo '<a class="btni" href="?buy_x28" style="margin-top: 4px; min-width: 130px;">'.$font28.'Отдать <span class="count_room">х'.$Xcard292929.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard29.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x280">'.$font280.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$Xcard30.'</span><img src="/images/card/'.$RandImageCard.'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"> Карта X'.$Xcard30.' <font color=grey>['.$card_x30.']</font></div><div>';
if($card_x29 < $colcard30){$font29 = '<font color=red>';}
if($card_x29 < 10){$font290 = '<font color=red>';}
echo '<a class="btni" href="?buy_x29" style="margin-top: 4px; min-width: 130px;">'.$font29.'Отдать <span class="count_room">х'.$Xcard303030.'</span><img src="/images/card/1.png" alt="$" width="25%"> <span>'.$colcard30.' шт.</span></font></a> ';
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="?buy_x290">'.$font290.'x10</font></a>';
echo '</div></div></div><div class="cb"></div></div></div>';











echo '<a class="btnl mt4" href="'.$HOME.'bank/">Назад</a>';

echo ' <font size="1"><font color="black"> <font size="3">•</font></font> <b>Обмен карт доступен только до карт х30</b></font><br>';
echo ' <font size="1"><font color="black"> <font size="3">•</font></font> <b>Для обмена неоходимо 2 карты с предедущим множителем.</b></font>';
require_once ('../system/footer.php');
?>