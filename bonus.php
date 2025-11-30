<?php
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['gorshok']>time()) {
header("Location: /");
exit();
}

echo '<center><div class="" style="margin-top: 9px; position: relative;"><img src="/images/bonus.png" alt="" style="width:60%; border-radius: 4px;"></div>';
echo '<font color=green><b>Вам повезло! <br>Можете забрать свой бонус!</b></font><hr>';

if($user['gorshok']<time()) {
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?bonus'.$user['gorshok'].'"><span><span>Забрать бонус</span></span></a></center>';
}







if(isset($_GET['bonus'.$user['gorshok'].''])){
if($user['gorshok']>time()) {header('Location: ?');exit();}


$rand = rand(1,3);
$bnt = rand(300,900);

if($rand == 1){ // рубины
if($promotions['time_21'] >time()){
$rubin = rand((10*$promotions['act_21']),(100*$promotions['act_21']));
}else{
$rubin = rand(10,100);
}
$text = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."', `gorshok` = '".(time()+$bnt)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>+'.$rubin.'</font>';
}
if($rand == 2){ // алмазы
if($promotions['time_21'] >time()){
$Diamonds = rand((1*$promotions['act_21']),(100*$promotions['act_21']));
}else{
$Diamonds = rand(1,100);
}
$text = '<img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
mysql_query("UPDATE `users` SET `gorshok` = '".(time()+$bnt)."', `Diamonds` = '".($user['Diamonds']+$Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$Diamonds)."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyz['Diamonds']+$Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color=red>+'.$Diamonds.'</font>';
}
if($rand == 3){ // камни
if($promotions['time_21'] >time()){
$rock = rand((1*$promotions['act_21']),(100*$promotions['act_21']));
}else{
$rock = rand(1,100);
}
$text = '<img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
mysql_query("UPDATE `users` SET `rock` = '".($user['rock']+$rock)."', `gorshok` = '".(time()+$bnt)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("UPDATE `corp` SET `rock` = '".($corp['rock']+$rock)."' WHERE `id` = '".$corp['id']."' LIMIT 1 ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> <font color=red>+'.$rock.'</font>';
}
/* if($rand == 4){ // изумруды
if($promotions['time_21'] >time()){
$emerald = rand((1*$promotions['act_21']),(10*$promotions['act_21']));
}else{
$emerald = rand(1,10);
}
$text = '<img width="24" height="24" alt="изумруды" src="/images/emerald.png" title="изумруды"> <font color=red>+'.$emerald.'</font>';
mysql_query("UPDATE `users` SET `emerald` = `emerald` + '".$emerald."', `gorshok` = '".(time()+$bnt)."' WHERE `id` = ".$user['id']." ");
$_SESSION['err'] = 'Бонус: <img width="24" height="24" alt="изумруды" src="/images/emerald.png" title="изумруды"> <font color=red>+'.$emerald.'</font>';
} */

/* if($rand == 22){  // монеты
$text = '<img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> '.n_f($dohod * 1382400).'';
mysql_query("UPDATE `users` SET `money` = '".($user['money']+($dohod * 1382400))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `gorshok` = '".(time()+$bnt)."' WHERE `id` = '".$user['id']."' ");$_SESSION['err'] = 'Получено <img width="24" height="24" alt="Монеты" src="/images/header/money_36.png" title="Монеты"> '.n_f($dohod * 1382400).' ';
}
 */
header("Location: /");
exit();
}














require_once ('system/footer.php');
?> 