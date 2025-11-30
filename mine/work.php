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
if($user['mine_time_1'] > time()) {header('Location: '.$HOME.'mine/');exit();}
if($user['mine_time'] == 0) {header('Location: '.$HOME.'mine/');exit();}

if($user['mine_time'] <= time()) {
if($user['mine'] <= 1 ){$rand_time = 14400;}else{$rand_time = 14400- ($user['mine']*100);}
mysql_query("UPDATE `users` SET `mine_boy` = '".($user['mine_boy']+1)."', `mine_time_1` = '".($user['mine_time_1']+ (time()+$rand_time) )."', `mine_time` = '".($user['mine_time']=0)."', `mine_vip` = '0'  WHERE `id` = '".$user['id']."' ");
if($mission_user_1['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_1['prog_']+1)."' WHERE `id` = '".$mission_user_1['id']."' ");
}
if($Achievements_user_1['prog'] < $Achievements_user_1['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_1['prog']+1)."' WHERE `id` = '".$Achievements_user_1['id']."' ");
}
header('Location: '.$HOME.'mine/');exit();
}









if($user['mine_bot_time']>time()){
?>
<script>
    // Задержка перед переходом (в миллисекундах)
    var delay = 1500; // Например, 5000 миллисекунд (5 секунд)

// URL для перехода
var url = '?works';

    // Функция для перехода по указанному URL через определенное время
    function redirectToUrl() {
        window.location.href = url;
    }

    // Устанавливаем задержку перед переходом
    setTimeout(redirectToUrl, delay);

/*     // Выводим сообщение о переходе
    document.write('Через ' + (delay / 1000) + ' секунд(ы) будет выполнен удар.<br> Пожалуйста, подождите...');
 */
</script>
<?

}








/* 

if($user['id']==1){
echo 'works'.$user['mine_rubin'].'';
}
 */




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


if(isset($_GET['works'])){

if (mt_rand(1, 100) >= 50){
if($promotions['promotion_7'] == 1){
$rand_rub = rand(1,($rbin));
$rand_rubin = ($rand_rub*$promotions['act_7']);
}else{
$rand_rubin = rand(1,($rbin));
}
}



if (mt_rand(1, 100) >= 70){
$rand_Diamonds = rand(0,($rock_Diamonds_Achievements));
}
if (mt_rand(1, 100) >= 70){
$rand_rock = rand(0,ceil($rock_Diamonds_Achievements));
}

if($user['mine_limit_clik'] >= time()){
$_SESSION['work'] = '<b>Не бейте так быстро!</b>';
header('Location: '.$HOME.'mine/work/');
exit();
}









if($rand_rubin <= 0 and $rand_Diamonds <= 0 and $rand_rock > 0 and $user['mine_limit_clik'] < time()){ // камни
mysql_query("UPDATE `users` SET `turnir_rock` = '".($user['turnir_rock']+$rand_rock)."', `rock` = '".($user['rock']+$rand_rock)."', `mine_rock` = '".($user['mine_rock']+$rand_rock)."', `rock_where` = '".($user['rock_where']+$rand_rock)."', `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
if($mission_user_3['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_3['prog_']+$rand_rock)."' WHERE `id` = '".$mission_user_3['id']."' ");
}
if($Achievements_user_3['prog'] < $Achievements_user_3['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_3['prog']+$rand_rock)."' WHERE `id` = '".$Achievements_user_3['id']."' ");
}
$_SESSION['work'] = 'Найдено: <img width="24" height="24" alt="" src="/images/colections/22.png">+'.$rand_rock.'';
header('Location: '.$HOME.'mine/work/');
exit();
}

if($rand_rubin > 0 and $rand_Diamonds <= 0 and $rand_rock > 0 and $user['mine_limit_clik'] < time()){ // камни рубины
mysql_query("UPDATE `users` SET `turnir_rock` = '".($user['turnir_rock']+$rand_rock)."', `rock` = '".($user['rock']+$rand_rock)."', `mine_rock` = '".($user['mine_rock']+$rand_rock)."', `rock_where` = '".($user['rock_where']+$rand_rock)."', `rubin_where` = '".($user['rubin_where']+$rand_rubin)."', `rubin` = '".($user['rubin']+$rand_rubin)."', `mine_rubin` = '".($user['mine_rubin']+$rand_rubin)."', `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
if($mission_user_3['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_3['prog_']+$rand_rock)."' WHERE `id` = '".$mission_user_3['id']."' ");
}
if($Achievements_user_3['prog'] < $Achievements_user_3['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_3['prog']+$rand_rock)."' WHERE `id` = '".$Achievements_user_3['id']."' ");
}
if($mission_user_2['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_2['prog_']+$rand_rubin)."' WHERE `id` = '".$mission_user_2['id']."' ");
}
if($Achievements_user_2['prog'] < $Achievements_user_2['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_2['prog']+$rand_rubin)."' WHERE `id` = '".$Achievements_user_2['id']."' ");
}
$_SESSION['work'] = 'Найдено: <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>+'.$rand_rubin.'</font> <img width="24" height="24" alt="" src="/images/colections/22.png">+'.$rand_rock.'';
header('Location: '.$HOME.'mine/work/');
exit();
}

if($rand_rubin > 0 and $rand_Diamonds > 0 and $rand_rock > 0 and $user['mine_limit_clik'] < time()){ // камни рубины и алмазы
mysql_query("UPDATE `users` SET `turnir_rock` = '".($user['turnir_rock']+$rand_rock)."', `turnir_Diamonds` = '".($user['turnir_Diamonds']+$rand_Diamonds)."', `Diamonds` = '".($user['Diamonds']+$rand_Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$rand_Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$rand_Diamonds)."', `rubin_where` = '".($user['rubin_where']+$rand_rubin)."', `rubin` = '".($user['rubin']+$rand_rubin)."', `mine_rubin` = '".($user['mine_rubin']+$rand_rubin)."', `rock` = '".($user['rock']+$rand_rock)."', `mine_rock` = '".($user['mine_rock']+$rand_rock)."', `rock_where` = '".($user['rock_where']+$rand_rock)."', `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
if($mission_user_4['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_4['prog_']+$rand_Diamonds)."' WHERE `id` = '".$mission_user_4['id']."' ");
}
if($Achievements_user_4['prog'] < $Achievements_user_4['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_4['prog']+$rand_Diamonds)."' WHERE `id` = '".$Achievements_user_4['id']."' ");
}
if($mission_user_3['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_3['prog_']+$rand_rock)."' WHERE `id` = '".$mission_user_3['id']."' ");
}
if($Achievements_user_3['prog'] < $Achievements_user_3['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_3['prog']+$rand_rock)."' WHERE `id` = '".$Achievements_user_3['id']."' ");
}
if($mission_user_2['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_2['prog_']+$rand_rubin)."' WHERE `id` = '".$mission_user_2['id']."' ");
}
if($Achievements_user_2['prog'] < $Achievements_user_2['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_2['prog']+$rand_rubin)."' WHERE `id` = '".$Achievements_user_2['id']."' ");
}
mysql_query("UPDATE `soyz` SET `turnir_Diamonds` = '".($user['turnir_Diamonds']+$rand_Diamonds)."', `Diamonds` = '".($soyz['Diamonds']+$rand_Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['work'] = 'Найдено: <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>+'.$rand_rubin.'</font> <img width="24" height="24" alt="" src="/images/Diamonds.png">+'.$rand_Diamonds.' <img width="24" height="24" alt="" src="/images/colections/22.png">+'.$rand_rock.'';
header('Location: '.$HOME.'mine/work/');
exit();
}


if($rand_rubin > 0 && $rand_Diamonds <= 0 and $user['mine_limit_clik'] < time()){ // рубины
mysql_query("UPDATE `users` SET `rubin_where` = '".($user['rubin_where']+$rand_rubin)."', `rubin` = '".($user['rubin']+$rand_rubin)."', `mine_rubin` = '".($user['mine_rubin']+$rand_rubin)."', `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
if($mission_user_2['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_2['prog_']+$rand_rubin)."' WHERE `id` = '".$mission_user_2['id']."' ");
}
if($Achievements_user_2['prog'] < $Achievements_user_2['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_2['prog']+$rand_rubin)."' WHERE `id` = '".$Achievements_user_2['id']."' ");
}
$_SESSION['work'] = 'Найдено: <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>+'.$rand_rubin.'</font>';
header('Location: '.$HOME.'mine/work/');
exit();
}

if($rand_rubin <= 0 && $rand_Diamonds > 0 and $user['mine_limit_clik'] < time()){ // алмазы
mysql_query("UPDATE `users` SET `turnir_Diamonds` = '".($user['turnir_Diamonds']+$rand_Diamonds)."', `Diamonds` = '".($user['Diamonds']+$rand_Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$rand_Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$rand_Diamonds)."', `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
if($mission_user_4['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_4['prog_']+$rand_Diamonds)."' WHERE `id` = '".$mission_user_4['id']."' ");
}
if($Achievements_user_4['prog'] < $Achievements_user_4['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_4['prog']+$rand_Diamonds)."' WHERE `id` = '".$Achievements_user_4['id']."' ");
}
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyz['Diamonds']+$rand_Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['work'] = 'Найдено: <img width="24" height="24" alt="" src="/images/Diamonds.png">+'.$rand_Diamonds.'';
header('Location: '.$HOME.'mine/work/');
exit();
}

if($rand_rubin > 0 && $rand_Diamonds > 0 and $user['mine_limit_clik'] < time()){ // рубины и алмазы
mysql_query("UPDATE `users` SET `turnir_Diamonds` = '".($user['turnir_Diamonds']+$rand_Diamonds)."', `Diamonds` = '".($user['Diamonds']+$rand_Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$rand_Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$rand_Diamonds)."', `rubin` = '".($user['rubin']+$rand_rubin)."', `rubin_where` = '".($user['rubin_where']+$rand_rubin)."', `mine_rubin` = '".($user['mine_rubin']+$rand_rubin)."', `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
if($mission_user_4['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_4['prog_']+$rand_Diamonds)."' WHERE `id` = '".$mission_user_4['id']."' ");
}
if($Achievements_user_4['prog'] < $Achievements_user_4['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_4['prog']+$rand_Diamonds)."' WHERE `id` = '".$Achievements_user_4['id']."' ");
}
if($mission_user_2['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_2['prog_']+$rand_rubin)."' WHERE `id` = '".$mission_user_2['id']."' ");
}
if($Achievements_user_2['prog'] < $Achievements_user_2['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_2['prog']+$rand_rubin)."' WHERE `id` = '".$Achievements_user_2['id']."' ");
}
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyz['Diamonds']+$rand_Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['work'] = 'Найдено: <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red>+'.$rand_rubin.'</font> <img width="24" height="24" alt="" src="/images/Diamonds.png">+'.$rand_Diamonds.'';
header('Location: '.$HOME.'mine/work/');
exit();
}

if($rand_rubin <= 0 and $rand_Diamonds > 0 and $rand_rock > 0 and $user['mine_limit_clik'] < time()){ // камни алмазы
mysql_query("UPDATE `users` SET `turnir_rock` = '".($user['turnir_rock']+$rand_rock)."', `turnir_Diamonds` = '".($user['turnir_Diamonds']+$rand_Diamonds)."', `Diamonds` = '".($user['Diamonds']+$rand_Diamonds)."', `diamonds_where` = '".($user['diamonds_where']+$rand_Diamonds)."', `mine_diamonds` = '".($user['mine_diamonds']+$rand_Diamonds)."', `rock` = '".($user['rock']+$rand_rock)."', `mine_rock` = '".($user['mine_rock']+$rand_rock)."', `rock_where` = '".($user['rock_where']+$rand_rock)."', `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
if($mission_user_4['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_4['prog_']+$rand_Diamonds)."' WHERE `id` = '".$mission_user_4['id']."' ");
}
if($Achievements_user_4['prog'] < $Achievements_user_4['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_4['prog']+$rand_Diamonds)."' WHERE `id` = '".$Achievements_user_4['id']."' ");
}
if($mission_user_3['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_3['prog_']+$rand_rock)."' WHERE `id` = '".$mission_user_3['id']."' ");
}
if($Achievements_user_3['prog'] < $Achievements_user_3['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_3['prog']+$rand_rock)."' WHERE `id` = '".$Achievements_user_3['id']."' ");
}
mysql_query("UPDATE `soyz` SET `Diamonds` = '".($soyz['Diamonds']+$rand_Diamonds)."' WHERE `id` = '".$soyz['id']."' LIMIT 1 ");
$_SESSION['work'] = 'Найдено: <img width="24" height="24" alt="" src="/images/Diamonds.png">+'.$rand_Diamonds.' <img width="24" height="24" alt="" src="/images/colections/22.png">+'.$rand_rock.'';
header('Location: '.$HOME.'mine/work/');
exit();
}







if($rand_rubin <= 0 && $rand_Diamonds <= 0 and $user['mine_limit_clik'] < time()){ // ничего
mysql_query("UPDATE `users` SET `mine_limit_clik` = '".($user['mine_limit_clik']=(time()+1))."'  WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['work'] = '<b>Ничего не найдено!</b>';
header('Location: '.$HOME.'mine/work/');
exit();
}

}





if($user['mine'] > 20) {
$lvl = 20;
}else{
$lvl = $user['mine'];
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'';


if($user['mine_bot_time']>time()){
echo '<hr><font color=red>Автокирка включена еще <span id="time_'.($user['mine_bot_time']-time()).'000">'._time($user['mine_bot_time']-time()).'</span></font>';
}
echo '</span></li></ul></div>';


echo '<div class="bordered"><center><a href="?works"><img src="'.$HOME.'mine/images/'.$lvl.'.png" width="200"></a></center>';

if (isset($_SESSION['work'])){
?><center><?=$_SESSION['work']?></center><?php
unset($_SESSION['work']);}




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
$rb = (($rbin)*$promotions['act_7']);
}else{
$rb = ($rbin);
}
}





echo '<hr><center>Найдено: <img width="24" height="24" alt="" src="/images/ruby.png"><font color=red> '.$user['mine_rubin'].'</font> <img width="24" height="24" alt="" src="/images/Diamonds.png"> '.$user['mine_diamonds'].'</font> <img width="24" height="24" alt="" src="/images/colections/22.png"> '.$user['mine_rock'].' <font color=black>|</font>  <span id="time_'.($user['mine_time']-time()).'000">'._time($user['mine_time']-time()).'</span></center>';
echo '<hr><center><a class="btni" style="min-width:160px;margin:4px;" href="?works"><span><span>Бить Киркой</span></span></a>';
echo '<a class="btnii" style="min-width:160px;margin:4px;" href="?exit/"><span><span>Покинуть Шахту</span></span></a></center>';
echo '</center></div>';




echo '<center><div class="minor mt4">Шанс выпадения (от/до):
<img width="24" height="24" alt="" src="/images/ruby.png"><font color=red> 1/'.ceil($rb).'</font>
<img width="24" height="24" alt="" src="/images/Diamonds.png"><font color=red> 1/'.ceil($rock_Diamonds_Achievements).'</font>
<img width="24" height="24" alt="" src="/images/colections/22.png"><font color=red> 1/'.ceil($rock_Diamonds_Achievements).'</font>
</div></center>';






require_once ('../system/footer.php');
?>