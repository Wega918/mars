<?php
$title = 'Новогодние Подарки';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($promotions['promotion_9'] == 0){
header('Location: '.$HOME.'');
exit();
}




if(isset($_GET['NewYearGifts/'])){
if($user['NewYearGifts'] <= 0){
$_SESSION['err'] = '<font color=red>У Вас Нету Подарков.</font>';
header('Location: ?');
exit();
}

$rand = rand(1,27);


if($rand == 1){ // рубины
$rubin = rand(10000,20000);
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 2){ // рубины
$rubin = rand(20000,30000);
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 3){ // рубины
$rubin = rand(30000,40000);
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}
if($rand == 27){ // рубины
$rubin = rand(40000,50000);
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
header('Location: ?');
exit();
}


if($rand == 4){ // алмазы
$Diamonds = rand(1000,2000);
$text = '<img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."', `Diamonds` = '".($user['Diamonds']+$Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$Diamonds)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyz['Diamonds']+$Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
header('Location: ?');
exit();
}
if($rand == 5){ // алмазы
$Diamonds = rand(2000,3000);
$text = '<img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."', `Diamonds` = '".($user['Diamonds']+$Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$Diamonds)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyz['Diamonds']+$Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
header('Location: ?');
exit();
}
if($rand == 6){ // алмазы
$Diamonds = rand(3000,4000);
$text = '<img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."', `Diamonds` = '".($user['Diamonds']+$Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$Diamonds)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyz['Diamonds']+$Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
header('Location: ?');
exit();
}


if($rand == 7){ // камни
$rock = rand(1000,2000);
$text = '<img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rock` = '".($user['rock']+$rock)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
header('Location: ?');
exit();
}
if($rand == 8){ // камни
$rock = rand(2000,3000);
$text = '<img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rock` = '".($user['rock']+$rock)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
header('Location: ?');
exit();
}
if($rand == 9){ // камни
$rock = rand(3000,4000);
$text = '<img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `rock` = '".($user['rock']+$rock)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
header('Location: ?');
exit();
}


if($rand == 10){ // вип доход
if(!$VIP_2){
$text = '<font color=red>1 день VIP Доход</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 86400)."', `VIP` = '2', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '1 день VIP Доход';exit();
}else{
$text = '<font color=red>+1 день VIP Доход</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_2['time'] + 86400)."' WHERE `user` = '".$user['id']."' and `VIP` = '2' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+1 день VIP Доход';exit();
}
}
if($rand == 11){ // вип доход
if(!$VIP_2){
$text = '<font color=red>3 дня VIP Доход</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + (86400*3))."', `VIP` = '2', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '3 дня VIP Доход';exit();
}else{
$text = '<font color=red>+3 дня VIP Доход</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_2['time'] + (86400*3))."' WHERE `user` = '".$user['id']."' and `VIP` = '2' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+3 дня VIP Доход';exit();
}
}
if($rand == 12){ // вип доход
if(!$VIP_2){
$text = '<font color=red>2 дня VIP Доход</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + (86400*2))."', `VIP` = '2', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '7 дней VIP Доход';exit();
}else{
$text = '<font color=red>+7 дней VIP Доход</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_2['time'] + (86400*2))."' WHERE `user` = '".$user['id']."' and `VIP` = '2' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+2 дня VIP Доход';exit();
}
}


if($rand == 13){ // вип ангелы
if(!$VIP_1){
$text = '<font color=red>1 день VIP Ангелы</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 86400)."', `VIP` = '1', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '1 день VIP Ангелы';exit();
}else{
$text = '<font color=red>+1 день VIP Ангелы</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_1['time'] + 86400)."' WHERE `user` = '".$user['id']."' and `VIP` = '1' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+1 день VIP Ангелы';exit();
}
}
if($rand == 14){ // вип ангелы
if(!$VIP_1){
$text = '<font color=red>3 дня VIP Ангелы</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + (86400*3))."', `VIP` = '1', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '3 дня VIP Ангелы';exit();
}else{
$text = '<font color=red>+3 дня VIP Ангелы</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_1['time'] + (86400*3))."' WHERE `user` = '".$user['id']."' and `VIP` = '1' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+3 дня VIP Ангелы';exit();
}
}
if($rand == 15){ // вип ангелы
if(!$VIP_1){
$text = '<font color=red>2 дня VIP Ангелы</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + (86400*2))."', `VIP` = '1', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '2 дня VIP Ангелы';exit();
}else{
$text = '<font color=red>+2 дня VIP Ангелы</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_1['time'] + (86400*2))."' WHERE `user` = '".$user['id']."' and `VIP` = '1' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+2 дня VIP Ангелы';exit();
}
}


if($rand == 16){ // вип мусор
if(!$VIP_3){
$text = '<font color=red>1 день VIP Мусор</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 86400)."', `VIP` = '3', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '1 день VIP Мусор';exit();
}else{
$text = '<font color=red>+1 день VIP Мусор</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_3['time'] + 86400)."' WHERE `user` = '".$user['id']."' and `VIP` = '3' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+1 день VIP Мусор';exit();
}
}
if($rand == 17){ // вип мусор
if(!$VIP_3){
$text = '<font color=red>3 дня VIP Мусор</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + (86400*3))."', `VIP` = '3', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '1 день VIP Мусор';exit();
}else{
$text = '<font color=red>+3 дня VIP Мусор</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_3['time'] + (86400*3))."' WHERE `user` = '".$user['id']."' and `VIP` = '3' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+1 день VIP Мусор';exit();
}
}
if($rand == 18){ // вип мусор
if(!$VIP_3){
$text = '<font color=red>2 дня VIP Мусор</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + (86400*2))."', `VIP` = '3', `on` = '1' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '2 дня VIP Мусор';exit();
}else{
$text = '<font color=red>+2 дня VIP Мусор</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `VIP` SET `time` = '".($VIP_3['time'] + (86400*2))."' WHERE `user` = '".$user['id']."' and `VIP` = '3' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '+2 дня VIP Мусор';exit();
}
}


if($rand == 19){  // карты
$random = 1;
$rand_xxx = rand(1,100);
$text = 'Карта х'.$rand_xxx.': <font color=red>+'.$random.'шт.</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$kartt = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $random");
$kar = mysql_fetch_array ($kartt);
do {
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."', `images` = '20' ");
} while ($kar = mysql_fetch_array ($kartt));
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = 'Корпоративная карта X'.$rand_xxx.': <font color=red>+'.$random.'</font> ';exit();
}
if($rand == 20){  // карты
$random = 2;
$rand_xxx = rand(1,100);
$text = 'Карта х'.$rand_xxx.': <font color=red>+'.$random.'шт.</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$kartt = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $random");
$kar = mysql_fetch_array ($kartt);
do {
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."',  `images` = '20' ");
} while ($kar = mysql_fetch_array ($kartt));
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = 'Корпоративная карта X'.$rand_xxx.': <font color=red>+'.$random.'</font> ';exit();
}
if($rand == 21){  // карты
$random = 3;
$rand_xxx = rand(1,100);
$text = 'Карта х'.$rand_xxx.': <font color=red>+'.$random.'шт.</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
$kartt = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $random");
$kar = mysql_fetch_array ($kartt);
do {
mysql_query("INSERT INTO `corporate_card` SET `user` = '".$user['id']."', `xxx` = '".$rand_xxx."',  `images` = '20' ");
} while ($kar = mysql_fetch_array ($kartt));
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = 'Корпоративная карта X'.$rand_xxx.': <font color=red>+'.$random.'</font> ';exit();
}



if($rand == 22){  // монеты
$bc_dohod = toBC($dohod);
$bc_money = toBC($user['money']);
$bc_coef = '1382400';
$bc_add = bcmul($bc_dohod, $bc_coef, 10);
$bc_new_money = bcadd($bc_money, $bc_add, 10);
$text = '<img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> '.n_f($bc_add).'';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."', `money` = '".$bc_new_money."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');$_SESSION['err'] = 'Получено <img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> '.n_f($bc_add).' ';exit();
}
if($rand == 23){  // монеты
$bc_dohod = toBC($dohod); // строка с точным значением дохода
$bc_money = toBC($user['money']); // текущее значение денег пользователя
$bc_coef = bcmul('1382400', '3', 0); // 1382400 * 3 = '4147200'
$bc_add = bcmul($bc_dohod, $bc_coef, 10);
$bc_new_money = bcadd($bc_money, $bc_add, 10);
$text = '<img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> ' . n_f($bc_add);
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."'");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."', `money` = '".$bc_new_money."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');$_SESSION['err'] = 'Получено <img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> '.n_f($bc_add).' ';exit();
}
if ($rand == 24) {  // монеты
    $bc_dohod = toBC($dohod);
    $bc_money = toBC($user['money']);
    $bc_coef = bcmul('1382400', '7', 0); // 1382400 * 7 = 9676800
    $bc_add = bcmul($bc_dohod, $bc_coef, 10);
    $bc_new_money = bcadd($bc_money, $bc_add, 10);
    $text = '<img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> ' . n_f($bc_add);
    mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."'");
    mysql_query("UPDATE `users` SET `money` = '".$bc_new_money."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts'] - 1)."' WHERE `id` = '".$user['id']."'");
    $_SESSION['err'] = 'Получено <img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> ' . n_f($bc_add);
    header('Location: ?');
    exit();
}



if($rand == 25){  // постройки кп
$text = '<font color=red>+1% к Постройкам Кп</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `corp` SET `building` = '".($corp['building']+1)."' WHERE `id` = '".$corp['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '<font color=red>+1% к Постройкам Кп</font>';exit();
}


if($rand == 26){  // постройки Союза
$text = '<font color=red>+1% к Постройкам Союза</font>';
mysql_query("INSERT INTO `NewYearGifts` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."' ");
mysql_query("UPDATE `soyz` SET `building` = '".($soyz['building']+1)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `NewYearGifts` = '".($user['NewYearGifts']-1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');$_SESSION['err'] = '<font color=red>+1% к Постройкам Союза</font>';exit();
}


}






echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';
echo '<hr><center><img width="24" height="24" alt="" src="/images/gift.png"> Подарков Доступно: <font color=black>'.$user['NewYearGifts'].'</font> </center><hr>';


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><div class="bordered">
<center><table width="100%">
<tbody><tr>
<td style="width:43%;"><a class="bonus" href="?NewYearGifts/"><img src="/images/gift.png" width="30%"></a></td>
<td style="width:43%"><a class="bonus" href="?NewYearGifts/"><img src="/images/gift1.png" width="30%"></a></td>
<td style="width:43%"><a class="bonus" href="?NewYearGifts/"><img src="/images/gift2.png" width="95%"></a></td>
</tr>
</tbody></table></center>
</div></span></li></ul></div>';





echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<center>Последние 10 Подарков:</center><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `NewYearGifts` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$NewYearGifts = mysql_query("SELECT * FROM `NewYearGifts` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($NYG = mysql_fetch_assoc($NewYearGifts)){
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
echo str(''.$HOME.'NewYearGifts/?',$k_page,$page); // Вывод страниц
}








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
mysql_query('DELETE FROM `NewYearGifts` WHERE `id` ');
header('Location: ?');
exit();
}









echo '<a class="btnl mt4" href="'.$HOME.'NewYearToys/"> Вернуться</a>';
require_once ('system/footer.php');
?>