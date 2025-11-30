<?php
$title = 'Шахта';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//

// mine_time_1 - время перезарядки
// mine_time - время работы в шахте

if(!$user['id']) {header('Location: /');exit();}
/*if($user['id'] != 1) {
$_SESSION['err'] = 'Техработы...';
header('Location: /');
exit();
}*/
//if($user['mine_time'] > time()) {header('Location: '.$HOME.'mine/work/');exit();}

if(!$user['id']) {
header('Location: /');
exit();
}
if($user['mine_time'] > 0 && $user['mine_time'] <= time() ) {
header('Location: '.$HOME.'reward/');
exit();
}
if($user['mine_time'] > time()) {
header('Location: '.$HOME.'mine/work/');
exit();
}



if($user['mine_time_1'] >= (time()+86400) ){
if($user['mine'] <= 1 ){$rand_time = 14400;}else{$rand_time = 14400- ($user['mine']*100);}
mysql_query("UPDATE `users` SET `mine_time_1` = '".($user['mine_time_1']= (time()+$rand_time) )."', `mine_time` = '".($user['mine_time']=0)."'  WHERE `id` = '".$user['id']."' LIMIT 1");
}
if($user['mine_time'] <= time() and $user['mine_time_1'] == 0 ) {
if($user['mine'] <= 1 ){$rand_time = 14400;}else{$rand_time = 14400- ($user['mine']*100);}
mysql_query("UPDATE `users` SET `mine_time_1` = '".($user['mine_time_1']+ (time()+$rand_time) )."', `mine_time` = '".($user['mine_time']=0)."'  WHERE `id` = '".$user['id']."' ");
header('Location: '.$HOME.'mine/');exit();
}



echo '<div class="content">
<a class="fl"><img width="25" height="45" src="/images/index/left_grey.png"></a>
<a class="fr" href="'.$HOME.'Lottery/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Лотерея" title="Лотерея"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';






echo '<br>';
if($promotions['promotion_7'] == 1){
echo '<div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: Шахта Х'.$promotions['act_7'].'</li>
<li class="center">Колличество выпадаемых рубинов увеличено Х'.$promotions['act_7'].'.</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_7'] - time()).'</span></div>
</div></div><br>';
}

if(isset($_GET['Ap/'])){
$_SESSION['err'] = 'Построить Шахту за 10 рубинов?<div class="mt4"><a class="btni accept" href="?Yes/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a> <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';header('Location: ?');exit();
}




if($user['mine'] < 100 && $user['mine'] > 0) {
$cost = 10;
}


if(isset($_GET['level'])){
$_SESSION['err'] = '<font color=green>ДОХОД РУБИНОВ С ШАХТЫ ПО УРОВНЯМ:</font><hr>
от 1ур до 11ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>1</font><br>
от 11ур до 21ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>2</font><br>
от 21ур до 31ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>3</font><br>
от 31ур до 41ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>4</font><br>
от 41ур до 51ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>5</font><br>
от 51ур до 61ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>6</font><br>
от 61ур до 71ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>7</font><br>
от 71ур до 81ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>8</font><br>
от 81ур до 99ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>9</font><br>
с 100ур = <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>10</font><br>
';
header('Location: ?');
exit();
}


if(isset($_GET['Yes/'])){
if($user['mine'] >= 1) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Шахта построена!</font>';exit();}
if($user['rubin'] < 10) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.(10 - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `mine` = '".($user['mine']=1)."', `rubin` = '".($user['rubin']-10)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');exit();}

if(isset($_GET['App/'])){
if($user['mine'] >= 100) {header('Location: ?');$_SESSION['err'] = '<font color=red>Максимальный уровень!</font>';exit();}
if($user['rubin'] < ($user['mine']*$cost)) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.(($user['mine']*$cost) - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Вы хотите повысить уровень Шахты за <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($user['mine']*$cost).' <div class="mt4"><a class="btni accept" href="?App_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a> <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';header('Location: ?');exit();
}

if(isset($_GET['App_/'])){
if($user['mine'] >= 100) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Максимальный уровень!</font>';exit();}
if($user['rubin'] < ($user['mine']*$cost)) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.(($user['mine']*$cost) - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `mine` = '".($user['mine']+1)."', `rubin` = '".($user['rubin']-($user['mine']*$cost))."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}

if(isset($_GET['go/'])){
if($user['mine_time'] > time()) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Вы находитесь в Шахте!</font>';exit();}

if($user['mine'] <= 1 ){$rand_time = 300;}else{$rand_time = 300+ ($user['mine']);}
if($user['mine'] == 0){if($promotions['promotion_7'] == 1){$rb = (1*$promotions['act_7']);}else{$rb = 1;}}else{if($promotions['promotion_7'] == 1){$rb = (($user['mine'])*$promotions['act_7']);}else{$rb = ($user['mine']);}}

if($user['mine_time_1'] > time()) {header('Location: ?');$_SESSION['err'] = '<font color=red>Шахта будет доступна через: <span id="time_'.($user['mine_time_1']-time()).'000">'._time($user['mine_time_1']-time()).'</span></font>';
//<hr><a href="?open">Открыть Шахту</a> за <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>'.ceil(($rand_time*$rb)/11).'</font>
exit();}
if($user['mine'] <= 1 ){$rand_time = 300;}else{$rand_time = 300+ ($user['mine']);}
mysql_query("UPDATE `users` SET `mine_time_1` = '0', `mine_rock` = '0', `mine_rubin` = '0', `mine_diamonds` = '0', `mine_time` = '".($user['mine_time'] = (time()+$rand_time) )."' WHERE `id` = '".$user['id']."' ");
header('Location: '.$HOME.'mine/work/');
exit();
}
/*
if(isset($_GET['open'])){
if($user['mine_time'] > time()) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Вы находитесь в Шахте!</font>';exit();}
if($user['mine'] <= 1 ){$rand_time = 300;}else{$rand_time = 300+ ($user['mine']);}
if($user['mine'] == 0){if($promotions['promotion_7'] == 1){$rb = (1*$promotions['act_7']);}else{$rb = 1;}}else{if($promotions['promotion_7'] == 1){$rb = (($user['mine'])*$promotions['act_7']);}else{$rb = ($user['mine']);}}
if($user['rubin'] < ceil(($rand_time*$rb)/11) ) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.(ceil(($rand_time*$rb)/11) - $user['rubin']).')</font>';exit();}
if($user['mine_time_1'] > time()){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']- ceil(($rand_time*$rb)/11) )."', `mine_time_1` = '0', `mine_rock` = '0', `mine_rubin` = '0', `mine_diamonds` = '0', `mine_time` = '".($user['mine_time'] = (time()+$rand_time) )."' WHERE `id` = '".$user['id']."' ");
if($mission_user_5['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_5['prog_']+1)."' WHERE `id` = '".$mission_user_5['id']."' ");
}
}
$_SESSION['work'] = '<b>Шахта открыта! <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>-'.ceil(($rand_time*$rb)/11).'</font></b> ';
header('Location: '.$HOME.'mine/work/');
exit();
}
*/



if($user['mine'] == 0) {
echo '<div class="bordered"><center>';
if($user['mine']>=1){
echo '<a href="?level"><i><u>Уровень Шахты: <font color=black>'.$user['mine'].'</font></i></u></a><hr></center>';
}
echo '<center><img src="'.$HOME.'mine/images/1.png" width="200"></center>';
echo '</center></div>';
echo '<a class="btnl mt4" href="?Ap/">Построить Шахту</a>';

}else{

if($user['mine'] > 20) {
$lvl = 20;
}else{
$lvl = $user['mine'];
}

echo '<div class="bordered"><center>';
if($user['mine']>=1){
echo '<a href="?level"><i><u>Уровень Шахты: <font color=black>'.$user['mine'].'</font></i></u></a><hr></center>';
}

echo '<center><img src="'.$HOME.'mine/images/mine.png" width="200"></center>';

if($user['mine_time_1'] > time()){
echo '<hr><center>Доступно через: <span id="time_'.($user['mine_time_1']-time()).'000">'._time($user['mine_time_1']-time()).'</span></center>';
}
echo '<hr><center><a class="btni" style="min-width:160px;margin:4px;" href="?App/"><span><span>Улучшить</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?go/"><span><span>Спустится</span></span></a></center>';
echo '</center></div>';
}


if($user['mine'] >= 0 && $user['mine'] <= 10){$rbin = 1;}
if($user['mine'] > 10 && $user['mine'] <= 20){$rbin = 2;}
if($user['mine'] > 20 && $user['mine'] <= 30){$rbin = 3;}
if($user['mine'] > 30 && $user['mine'] <= 40){$rbin = 4;}
if($user['mine'] > 40 && $user['mine'] <= 50){$rbin = 5;}
if($user['mine'] > 50 && $user['mine'] <= 60){$rbin = 6;}
if($user['mine'] > 60 && $user['mine'] <= 70){$rbin = 7;}
if($user['mine'] > 70 && $user['mine'] <= 80){$rbin = 8;}
if($user['mine'] > 80 && $user['mine'] <= 90){$rbin = 9;}
if($user['mine'] > 90 && $user['mine'] < 100){$rbin = 9;}
if($user['mine'] >= 100){$rbin = 10;}

if($user['mine'] == 0){
if($promotions['promotion_7'] == 1){
$rb = (1*$promotions['act_7']);
}else{
$rb = 1;
}
}else{
if($promotions['promotion_7'] == 1){
$rb = (($rbin)*$promotions['act_7']);
}else{
$rb = ($rbin);
}
}





//$cost_mine_vip = ($Achievements_user_coll_done_1+1)*200;
$cost_mine_vip = (68-($Achievements_user_coll_done_1*2))*100;
$dohod_rer = (68-($Achievements_user_coll_done_1*2));



if($user['mine_vip'] == 1){
$mine_vip_text = '<font size=2 color="green">активно</font>';
}else{
$mine_vip_text = '<font size=2 color="green">не активно</font>';
}
if($user['mine_vip'] == 0){
$mine_vip_text1 = '<font size=2 >Активировать дополнительный доход <img width="24" height="24" alt="" src="/images/colections/22.png"> Камней и <img width="24" height="24" alt="" src="/images/Diamonds.png"> Алмазов</font>';
}else{
$mine_vip_text1 = '<font size=2 >Действие: 1 поход</font>';
}
if($Achievements_user_coll_done_1 < 34){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font size=3>Усиление:</font> '.$mine_vip_text.'<hr>
'.$mine_vip_text1.' ';
if($user['mine_vip'] == 0){
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?act"><span><span>Активировать <font color=red>(+'.$dohod_rer.')</font> за <img width="24" height="24" alt="" src="/images/ruby.png"> '.$cost_mine_vip.' </span></span></a></center>';
}
echo '</span></li></ul></div>';
}



if(isset($_GET['act'])){
if($user['mine_vip'] == 1 ) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($Achievements_user_coll_done_1 >= 34) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < $cost_mine_vip ) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает <img width="24" height="24" alt="" src="/images/ruby.png"> '.($cost_mine_vip - $user['rubin']).'</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']- $cost_mine_vip )."', `mine_vip` = '1' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}













//echo '<a class="btnl mt4" href="'.$HOME.'Stats/'.$user['id'].'/"><img src="/images/history2.png" width="24" height="24" alt="" title=""> Статистика</a>';

echo '<center><div class="minor mt4">Шанс выпадения (от/до):
<img width="24" height="24" alt="" src="/images/ruby.png"><font color=red> 1/'.ceil($rb).'</font>
<img width="24" height="24" alt="" src="/images/Diamonds.png"><font color=red> 1/'.ceil($rock_Diamonds_Achievements).'</font>
<img width="24" height="24" alt="" src="/images/colections/22.png"><font color=red> 1/'.ceil($rock_Diamonds_Achievements).'</font>
</div></center>';




require_once ('../system/footer.php');
?>