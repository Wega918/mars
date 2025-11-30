<?php
$title = 'Шахта';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//

// mine_time_1 - время перезарядки
// mine_time - время работы в шахте

if(!$user['id']) {
header('Location: /');
exit();
}
if($user['mine_time_1'] > time()) {
header('Location: '.$HOME.'mine/');
exit();
}
if($user['mine_time'] > time()) {
header('Location: '.$HOME.'mine/work/');
exit();
}

if(isset($_GET['cancel/'])){
if($user['mine'] <= 1 ){$rand_time = 14400;}else{$rand_time = 14400- ($user['mine']*100);}
mysql_query("UPDATE `users` SET `mine_boy` = '".($user['mine_boy']+1)."', `mine_time_1` = '".($user['mine_time_1']+ (time()+$rand_time) )."', `mine_time` = '".($user['mine_time']=0)."', `mine_vip` = '0'  WHERE `id` = '".$user['id']."' ");
if($mission_user_1['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_1['prog_']+1)."' WHERE `id` = '".$mission_user_1['id']."' ");
}
if($Achievements_user_1['prog'] < $Achievements_user_1['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_1['prog']+1)."' WHERE `id` = '".$Achievements_user_1['id']."' ");
}
header('Location: /mine/');
exit();
}
if($user['mine'] > 20) {
$lvl = 20;
}else{
$lvl = $user['mine'];
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';
echo '<div class="bordered"><center><img src="'.$HOME.'mine/images/'.$lvl.'.png" width="200"></center>';

if(isset($_GET['exit/'])){
$_SESSION['err'] = 'Вы уверены, что хотите покинуть Шахту? <br>
Вернуться можно будет только через определенное время.<div class="mt4"><a class="btni accept" href="?Y/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a> <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';header('Location: ?');exit();
}
if(isset($_GET['Y/'])){
if($user['mine'] <= 1 ){$rand_time = 14400;}else{$rand_time = 14400- ($user['mine']*100);}
mysql_query("UPDATE `users` SET `mine_time_1` = '".($user['mine_time_1']+ (time()+$rand_time) )."', `mine_time` = '".($user['mine_time']=0)."', `mine_vip` = '0'  WHERE `id` = '".$user['id']."' ");
header('Location: '.$HOME.'mine/');
exit();
}



if($user['mine'] == 0){
if($promotions['promotion_7'] == 1){
$rb = (1*$promotions['act_7']);
}else{
$rb = 1;
}
}else{
if($promotions['promotion_7'] == 1){
$rb = (($user['mine']/10)*$promotions['act_7']);
}else{
$rb = ($user['mine']/10);
}
}


echo '<hr><center>Найдено: <img width="24" height="24" alt="" src="/images/ruby.png"> '.$user['mine_rubin'].' <img width="24" height="24" alt="" src="/images/Diamonds.png"> '.$user['mine_diamonds'].' <img width="24" height="24" alt="" src="/images/colections/22.png"> '.$user['mine_rock'].'</center>';
echo '<hr><center><a class="btni" style="min-width:160px;margin:4px;" href="?cancel/"><span><span>Завершить Поход</span></span></a></center>';
echo '</center></div>';
echo '<center><div class="minor mt4">Шанс выпадения (от/до):
<img width="24" height="24" alt="" src="/images/ruby.png"><font color=red> 1/'.ceil($rb).'</font>
<img width="24" height="24" alt="" src="/images/Diamonds.png"><font color=red> 1/'.ceil($rock_Diamonds_Achievements).'</font>
<img width="24" height="24" alt="" src="/images/colections/22.png"><font color=red> 1/'.ceil($rock_Diamonds_Achievements).'</font>
</div></center>';

require_once ('../system/footer.php');
?>