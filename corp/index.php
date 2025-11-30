<?php
$title = 'Корпорация';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if(isset($_GET['id']) && mysql_result(mysql_query("SELECT COUNT(*) FROM `corp` WHERE `id` = '".intval($_GET['id'])."'"),0) == true){
$corp = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".intval($_GET['id'])."'"));
}else{
header('Location: /');
exit();
}









if($user['corp_rang'] == 1 and $user['set_4'] == 1 ) {
$chlen = mysql_query("SELECT * FROM `users` WHERE `corp` = '".$corp['id']."' and `corp_rang` = '6' or `corp_rang` = '5' ");
$cc = mysql_fetch_array ($chlen);
do {
if($cc['viz'] < (time()-(86400*3)) ){
if($cc['corp_rang'] == 6 or $cc['corp_rang'] == 5){
$corp['angel'] = toBC($corp['angel']);
$cc['angel']   = toBC($cc['angel']);
$corp['rock']  = toBC($corp['rock']);
$cc['rock']    = toBC($cc['rock']);

$newAngel = bcsub($corp['angel'], $cc['angel'], 0);
$newRock  = bcsub($corp['rock'], $cc['rock'], 0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");
mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$cc[id]' ");
$text = ' <font color=lightgreen>'.nick($cc['id']).'</font> - <font color=IndianRed>Уволен из корпорации за отсутствие в игре более 3-х дней. </font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$corp['id']."', `text` = '".$text."', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$cc['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$cc['id'].' ');

$txt = 'Вы были автоматически исключены из корпорации за отсутствие в игре более 3-х дней.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$cc['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$cc['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$cc['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$cc['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$cc['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$cc['id']."', `time` = '".time()."', `readlen` = '0'");
}
}
} while ($cc = mysql_fetch_array ($chlen));
}


if($user['corp_rang'] == 1 and $user['set_5'] == 1 ) {
$chlen2 = mysql_query("SELECT * FROM `users` WHERE `corp` = '".$corp['id']."' and `corp_rang` = '4' ");
$cc2 = mysql_fetch_array ($chlen2);
do {
if($cc2['viz'] < (time()-(86400*3)) ){
if($cc2['corp_rang'] == 4 ){
$corp['angel'] = toBC($corp['angel']);
$cc2['angel']   = toBC($cc2['angel']);
$corp['rock']  = toBC($corp['rock']);
$cc2['rock']    = toBC($cc2['rock']);

$newAngel = bcsub($corp['angel'], $cc2['angel'], 0);
$newRock  = bcsub($corp['rock'], $cc2['rock'], 0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");
mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$cc2[id]' ");
$text = ' <font color=lightgreen>'.nick($cc2['id']).'</font> - <font color=IndianRed>Уволен из корпорации за отсутствие в игре более 3-х дней. </font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$corp['id']."', `text` = '".$text."', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$cc2['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$cc2['id'].' ');

$txt = 'Вы были автоматически исключены из корпорации за отсутствие в игре более 3-х дней.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$cc2['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$cc2['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$cc2['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$cc2['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$cc2['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$cc2['id']."', `time` = '".time()."', `readlen` = '0'");
}
}
} while ($cc2 = mysql_fetch_array ($chlen2));
}


if($user['corp_rang'] == 1 and $user['set_6'] == 1 ) {
$chlen3 = mysql_query("SELECT * FROM `users` WHERE `corp` = '".$corp['id']."' and `corp_rang` = '3' ");
$cc3 = mysql_fetch_array ($chlen3);
do {
if($cc3['viz'] < (time()-(86400*3)) ){
if($cc3['corp_rang'] == 3 ){
$corp['angel'] = toBC($corp['angel']);
$cc3['angel']   = toBC($cc3['angel']);
$corp['rock']  = toBC($corp['rock']);
$cc3['rock']    = toBC($cc3['rock']);

$newAngel = bcsub($corp['angel'], $cc3['angel'], 0);
$newRock  = bcsub($corp['rock'], $cc3['rock'], 0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");
mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$cc3[id]' ");
$text = ' <font color=lightgreen>'.nick($cc3['id']).'</font> - <font color=IndianRed>Уволен из корпорации за отсутствие в игре более 3-х дней. </font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$corp['id']."', `text` = '".$text."', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$cc3['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$cc3['id'].' ');

$txt = 'Вы были автоматически исключены из корпорации за отсутствие в игре более 3-х дней.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$cc3['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$cc3['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$cc3['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$cc3['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$cc3['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$cc3['id']."', `time` = '".time()."', `readlen` = '0'");
}
}
} while ($cc3 = mysql_fetch_array ($chlen3));
}






$users_ = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '".$corp['id']."' "),0);
if($users_ > $corp['mesta']){


if (empty($user['max'])) $user['max']=100;
$max = $corp['mesta'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '".$corp['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$tetst = mysql_query("SELECT * FROM `users` WHERE `corp` = '".$corp['id']."'  ORDER BY `angel` + '1' ASC LIMIT $start,$max");
while($sds = mysql_fetch_assoc($tetst)){
$reyt = $k_post++;
$kach = mysql_fetch_array(mysql_query('SELECT * FROM `kach` WHERE `ank` = "'.$sds['id'].'" and  `time_kach` < "'.time().'"  '));


if($reyt == 1 ){
if($sds['corp_rang'] != 1 ){
$corp['angel'] = toBC($corp['angel']);
$sds['angel']  = toBC($sds['angel']);
$corp['rock']  = toBC($corp['rock']);
$sds['rock']   = toBC($sds['rock']);

$newAngel = bcsub($corp['angel'], $sds['angel'], 0);
$newRock  = bcsub($corp['rock'],  $sds['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");
mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$sds[id]'");
$text = ' <font color=lightgreen>'.nick($sds['id']).'</font> - <font color=IndianRed>Уволен(а) из корпорации</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$sds['corp']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$sds['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$sds['id'].' ');
if($kach){mysql_query('DELETE FROM `kach` WHERE `ank` = '.$sds['id'].' ');}
}else{

if($reyt == 2 ){
$corp['angel'] = toBC($corp['angel']);
$sds['angel']  = toBC($sds['angel']);
$corp['rock']  = toBC($corp['rock']);
$sds['rock']   = toBC($sds['rock']);

$newAngel = bcsub($corp['angel'], $sds['angel'], 0);
$newRock  = bcsub($corp['rock'],  $sds['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");
mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$sds[id]'");
$text = ' <font color=lightgreen>'.nick($sds['id']).'</font> - <font color=IndianRed>Уволен(а) из корпорации</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$sds['corp']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$sds['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$sds['id'].' ');
if($kach){mysql_query('DELETE FROM `kach` WHERE `ank` = '.$sds['id'].' ');}
}

}
}



}


}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$corp_id = intval($corp['id']);
$q = mysql_query("SELECT angel FROM users WHERE corp = '$corp_id'");

$sum_angel_kp1 = "0";
while ($row = mysql_fetch_assoc($q)) {
    $sum_angel_kp1 = bcadd($sum_angel_kp1, $row['angel'], 0);
}

$sum_angel_kp1 = toBC($sum_angel_kp1);
$turnir_angel  = toBC($corp['turnir_angel']);
$corp_angel    = toBC($corp['angel']);

$newAngel = bcadd($sum_angel_kp1, $turnir_angel, 0);

if (bccomp($newAngel, $corp_angel, 0) != 0) {
    mysql_query("UPDATE `corp` SET `angel` = '".$newAngel."' WHERE `id` = '".intval($corp['id'])."' LIMIT 1");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sum_rock_kp1 = mysql_result(mysql_query("SELECT SUM(rock) FROM users WHERE `corp` = '".$corp['id']."' ;"), 0);
if($sum_rock_kp1 != $corp['rock']){
mysql_query("UPDATE `corp` SET `rock` = '".$sum_rock_kp1."' WHERE `id` = '$corp[id]' LIMIT 1");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////







////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Кач
$kach = mysql_fetch_array(mysql_query('SELECT * FROM `kach` WHERE `ank` = "'.$user['id'].'" and  `time_kach` < "'.time().'"  '));

$kach__ = mysql_query("SELECT * FROM `kach` WHERE `id` ");
$ka = mysql_fetch_array ($kach__);
do {
if($ka['time_kach'] <= time() && $ka['time_kach'] > 0){
$corp2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$ka['corp']."'"));
$user2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$ka['ank']."'"));

$corp2['angel'] = toBC($corp2['angel']);
$user2['angel'] = toBC($user2['angel']);
$corp2['rock']  = toBC($corp2['rock']);
$user2['rock']  = toBC($user2['rock']);

$newAngel = bcsub($corp2['angel'], $user2['angel'], 0);
$newRock  = bcsub($corp2['rock'],  $user2['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock`  = '".$newRock."' 
    WHERE `id` = '".intval($ka['corp'])."' 
    LIMIT 1");
mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$ka[ank]'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$ka['ank'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$ka['ank'].' ');
mysql_query('DELETE FROM `kach` WHERE `ank` = '.$ka['ank'].' ');
}
} while ($ka = mysql_fetch_array ($kach__));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Кач
$kach_soyz = mysql_fetch_array(mysql_query('SELECT * FROM `kach_soyz` WHERE `ank` = "'.$user['id'].'" and  `time_kach` < "'.time().'" '));

$kach___ = mysql_query("SELECT * FROM `kach_soyz` WHERE `id` ");
$ka_ = mysql_fetch_array ($kach___);
do {

if($ka_['time_kach'] <= time() && $ka_['time_kach'] > 0){
mysql_query("UPDATE `users` SET `soyz` = '0',  `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$ka_[ank]'");
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$ka_['ank'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$ka_['ank'].' ');
mysql_query('DELETE FROM `kach_soyz` WHERE `ank` = '.$ka_['ank'].' ');
}

} while ($ka_ = mysql_fetch_array ($kach___));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////















$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '$corp[id]'"),0);
if($sostav <= 0){
	
mysql_query('DELETE FROM `corp` WHERE `id` = '.$corp['id'].' ');
}








if($user['corp'] == $corp['id']){







///##########################################################################################################################################
if($user['corp'] > 0){
if($user['ad'] >= 1){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=red>☆  Обьявление корпорации ☆ </font>      <a href="?Hide/"><span style="float: right;">   <font size=2 color=black>[x]</font></span></a>';
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo ''.$corp['ad'].'';
echo '</div>';

echo'<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="small tbrown" style="position:absolute; top: 5; right: 0">('.vremja($corp['ad_time']).')</div>
<div style="display: inline;" class="fl">
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>Объявил: '.nick($corp['ad_user']).'</span></div>
<div>';
echo'</div></div></div><div class="cb"></div></div>';

echo '</span></li></ul></div>';


if(isset($_GET['Hide/'])){
mysql_query("UPDATE `users` SET  `ad` = '0' WHERE `id` = '$user[id]'");
header('Location: ?');
exit();
}
}
}
///##########################################################################################################################################




echo '<body><div class="center"></div><div></div>

<div class="content">
<div><span class="big">Корпорация "<span>'.$corp['name'].'</span>"</span></div>
<div>Бизнес-ангелы <img src="/images/angel48.png" alt="$" width="24" height="24"> <span>'.n_f($corp['angel']).'</span> <font color=red size=2>+'.n_f($corp['turnir_angel']).'</font> </div>';





echo '<center><div class="minor">Бонус к доходу от Построек Корпорации: '.$corp['building'].'% </div></center>';


if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `corp` WHERE `id`  ORDER BY `angel` + '1' DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$a1++;
if($post['id'] == $corp['id']){
if($a <= 1000)echo '<center><div class="minor">'.$a1.' место в рейтинге среди Корпораций</div></center></div>';
else echo "<center><div class='minor'>Корпорация не участвуете в рейтинге...</div><div></div></center></div>";
}
}


if($corp['open'] == 1){
$status = 'Открытый';
}else{
$status = 'Закрытый';
}
echo '<center><div><font size=2>Статус Корпорации:</font> <font size=2 color=black>'.$status.'</font></span></div></center><br>';






if($user['corp_rang'] == 1 or $user['level'] == 3) {
$href = '<a href="'.$HOME.'corp/Image_upload/">';
}else{
$href = '';
}


if($corp['images'] == 1){
echo ''.$href.'<img width="480" height="160" alt="'.$corp['name'].'" src="/images/corp/1.jpg" title="'.$corp['name'].'"></a>';
}else{
echo ''.$href.'<img width="480" height="160" alt="'.$corp['name'].'" src="/images/corp/'.$corp['images'].'" title="'.$corp['name'].'"></a>';
}




if($corp['status_text'] != ''){
echo '<hr><center>

<i><p><font color=black>'.$corp['status_text'].'</font></p></i>

</center><hr>';
}


require_once ('../corp/fidelity.php'); ///Верность
require_once ('../corp/Gateway.php'); ///Шлюз










$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '$corp[id]'"),0);
$sostav_online = mysql_result(mysql_query('SELECT COUNT(*) FROM `users` WHERE `corp` = "'.$corp['id'].'" and `viz` > "'.(time()-$sql['s_online']).'" '),0);
///##########################################################################################################################################
if($user['corp_rang'] <= 2 ){
echo '<a class="btnl mt4" href="?ViP/">Провести VIP сброс за <img src="/images/ruby.png" width="24" height="24"><span class="tred">'.( 25000 * $sostav_online).'</span></a>';


if(isset($_GET['ViP/'])){
$_SESSION['err'] = 'Вы уверены?<br>
Все бизнесы и доход всего онлайн состава Корпорации не будет обнулен. Взамен Все получат в 3 раза больше бизнес ангелов. Продолжить?
<div class="mt4"><a class="btni accept" href="?ViP_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['ViP_/'])){
if($corp['rubin'] < ( 25000 * $sostav_online)){
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']-( 25000 * $sostav_online))."' WHERE `id` = '$corp[id]' LIMIT 1");


$result1 = mysql_query("SELECT * FROM `users` WHERE `corp` = '$corp[id]' and `viz` > '".(time()-$sql['s_online'])."' ");
$row1 = mysql_fetch_array ($result1);
do {
$row1['angel']             = toBC($row1['angel']);
$row1['zarabotanie_angel'] = toBC($row1['zarabotanie_angel']);
$corp['angel']             = toBC($corp['angel']);
$premiumm['angel']         = isset($premiumm['angel']) ? toBC($premiumm['angel']) : '0';

$bonusAngels = bcmul($row1['zarabotanie_angel'], '5', 0);
$newUserAngel = bcadd($row1['angel'], $bonusAngels, 0);
$newCorpAngel = bcadd($corp['angel'], $bonusAngels, 0);
$newPremiumAngel = bcadd($premiumm['angel'], $bonusAngels, 0);

// Обновляем пользователя
mysql_query("UPDATE `users` SET 
    `zbrosov` = '".($row1['zbrosov'] + 1)."', 
    `angel` = '".$newUserAngel."', 
    `time_zbros` = '".time()."',  
    `zarabotanie_angel` = '0' 
    WHERE `id` = '".intval($row1['id'])."' 
    LIMIT 1");

// Обновляем корпорацию
mysql_query("UPDATE `corp` SET 
    `angel` = '".$newCorpAngel."' 
    WHERE `id` = '".intval($row1['corp'])."' 
    LIMIT 1");

// Обновляем премиум, если есть
$premiumm = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium` WHERE `user` = '".intval($row1['id'])."'"));
if($premiumm){
    mysql_query("UPDATE `premium` SET 
        `angel` = '".$newPremiumAngel."' 
        WHERE `user` = '".intval($row1['id'])."' 
        LIMIT 1");
}

// Сообщение
$text3 = 'В Корпорации был VIP сброс.
Начислено <img width="20" height="20" alt="Бизнес-ангелы" src="/images/angel48.png" title="Бизнес-ангелы"> ' . n_f($bonusAngels) . ' б/а';

$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$row1['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$row1['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$row1['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$row1['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$row1['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text3."', `kto` = '2', `komy` = '".$row1['id']."', `time` = '".time()."', `readlen` = '0'");


} while ($row1 = mysql_fetch_array ($result1));

$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Провел(а) Vip Сброс за <img src="/images/ruby.png" width="24" height="24" alt=""> '.( 25000 * $sostav_online).'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");

$_SESSION['err'] = 'Вы успешно провели VIP Сброс!';
header('Location: ?');
exit();
}
}
///##########################################################################################################################################









$rand = rand(1,20);
$cc=1000;
///##########################################################################################################################################
if($user['corp_rang'] <= 2 ){
echo '<a class="btnl mt4" href="?HoldAcorporate/">Провести корпоратив за <img src="/images/ruby.png" width="24" height="24"><span class="tred">'.( $cc * $corp['mesta']).'</span></a>';


if(isset($_GET['HoldAcorporate/'])){
$_SESSION['err'] = 'Вы уверены?<br>
После проведения корпоратива всем членам Корпорации выдается 1 карта, которой можно воспользоваться когда угодно.
Каждый, кто воспользуется картой, будет получать своих накопленных бизнес-ангелов, но при этом его бизнесы и доход сбрасываться не будут.
<div class="mt4"><a class="btni accept" href="?HoldAcorporate_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['HoldAcorporate_/'])){
if($corp['rubin'] < ( $cc * $corp['mesta'])){
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']-( $cc * $corp['mesta']))."' WHERE `id` = '$corp[id]' LIMIT 1");

$result = mysql_query("SELECT * FROM `users` WHERE `corp` = '$corp[id]'  ");
$row = mysql_fetch_array ($result);
do {
mysql_query("UPDATE `users` SET `kard` = '".($row['kard'] + 1)."' WHERE `id` = '$row[id]' LIMIT 1");
$rand_xxx = 1;
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$row['id']."', `images` = '".$rand."', `xxx` = '".$rand_xxx."' ");
} while ($row = mysql_fetch_array ($result));

$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Провел(а) Корпоратив за <img src="/images/ruby.png" width="24" height="24" alt=""> '.( $cc * $corp['mesta']).'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");

$_SESSION['ok'] = 'Вы успешно провели корпоратив!<br><br> <img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64">';
header('Location: ?');
exit();
}
}
///##########################################################################################################################################













$ccc=1000;
///##########################################################################################################################################
echo '<a class="btnl mt4" href="?cardBuy/">Купить корпоративную карту за <img src="/images/ruby.png" width="24" height="24"><span class="tred">'.$ccc.'</span></a>';



if(isset($_GET['cardBuy/'])){
$_SESSION['err'] = '
<hr><center><form action="" method="POST">
Количество карт:<br>
<input type="number" style="width: 95%;" name="summ" maxlength="5" value="0" class="text"/>
<input class="mt4" type="submit" name="submit" value="Купить">
</form></center>';
header("Location: ?");
exit();
}



if(isset($_POST['summ'])){
$summ = strong($_POST['summ']);
$test4 = mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."' "),0);
if($test4 >= 1000){
$_SESSION['err'] = '<font color=red>Ошибка! Для покупки необходимо иметь не более 1000 карт в наличии.</font>';
header('Location: ?');
exit();
}
if($summ > 250){
$_SESSION['err'] = '<font color=red>Ошибка! Не более 250 шт. за раз.</font>';
header('Location: ?');
exit();
}
if($summ <= 0){
$_SESSION['err'] = '<font color=red>Ошибка! Поле "Количество" заполнено не верно.</font>';
header('Location: ?');
exit();
}
if($user['rubin'] < ($summ*$ccc)){
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов.</font>';
header('Location: ?');
exit();
}


$kartt = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $summ");
$kar = mysql_fetch_array ($kartt);
do {
$rand = rand(1,20);
$rand_xxx = 1;
mysql_query("INSERT INTO `corporate_card` SET `time` = '".(time()+(86400*5))."', `user` = '".$user['id']."', `images` = '".$rand."', `xxx` = '".$rand_xxx."' ");
} while ($kar = mysql_fetch_array ($kartt));

if($mission_user_14['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_14['prog_']+$summ)."' WHERE `id` = '".$mission_user_14['id']."' ");
}
if($Achievements_user_13['prog'] < $Achievements_user_13['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_13['prog']+$summ)."' WHERE `id` = '".$Achievements_user_13['id']."' ");
}

mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($summ*$ccc))."', `kard` = '".($user['kard']+$summ)."', `corp_rubin` = '".($user['corp_rubin']+($summ*100))."' WHERE `id` = '$user[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Вложил(а) в фонд Корпорации <img src="/images/ruby.png" width="24" height="24" alt=""> '.n_f($summ*100).' (покупка карт)</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']+($summ*100))."' WHERE `id` = '$corp[id]' LIMIT 1");

$_SESSION['err'] = '
<font color=black>Карт:</font> <font color=red> +'.n_f($summ).' </font> <b>|</b>
<font color=black>Рубинов:</font> <font color=red> -'.n_f($summ*$ccc).' </font>
<br><br> <img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64">';
header('Location: ?');
exit();
}
///##########################################################################################################################################





if($user['corp_rang'] <= 2 or $user['level'] > 0){
$corp_chat = mysql_result(mysql_query("SELECT COUNT(id) FROM `corp_chat` WHERE `clan_id` = ".$user['corp'].""),0);
if($corp_chat > $user['corp_chat']){
$corp_chat_plus = '(+)';
}else{
$corp_chat_plus = '';
}
echo '<a class="btnl mt4" href="'.$HOME.'corp_chat/"><img src="/images/cross.png" width="20" height="20" alt="" title=""> Скрытый чат '.$corp_chat_plus.'</a>';
}


$ass_br = mysql_result(mysql_query("SELECT COUNT(id) FROM `ass_br` WHERE `clan_id` = ".$user['corp'].""),0);
if($ass_br > $user['ass_br']){
$ass_br_plus = '(+)';
}else{
$ass_br_plus = '';
}








$corp_top = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_topic` WHERE `corp` = '".$corp['id']."' "),0);
$corp_forum_fols = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_fols` WHERE `corp` = '".$corp['id']."' and `user` = '".$user['id']."' "),0);
if($corp_top > $corp_forum_fols){
$plus_corp = '(+)';
}else{
$plus_corp = '';
}
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'ass_br/"><img src="/images/folder.png" width="24" height="24" alt="" title=""> Чат '.$ass_br_plus.'</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'corp_forum/corp_'.$corp['id'].'/"><img src="/images/forum2.png" width="24" height="24" alt="" title=""> Форум '.$plus_corp.'</a></td>
</tr></tbody></table>';







///##########################################################################################################################################
$online_ = mysql_result(mysql_query('SELECT COUNT(*) FROM `users` WHERE `corp` = "'.$corp['id'].'" and `viz` > "'.(time()-$sql['s_online']).'" '),0);


?>
<div id="pokazat"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;"><img width="24" height="24" src="/images/arrow_up2.png"> Состав корпорации    <span><?=$sostav?></span> / <span><?=$corp['mesta']?></span>   (<?=$online_?>)</a>

<p><form name='form' method='post' action='?text'><div class='fight center'>
<div class="content">
<?

if (empty($user['max'])) $user['max']=100;
$max = $corp['mesta'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '".$corp['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$usersss = mysql_query("SELECT * FROM `users` WHERE `corp` = '".$corp['id']."'  ORDER BY `corp_rang` ASC, `angel` + '1' DESC LIMIT $start,$max");
while($c = mysql_fetch_assoc($usersss)){
$nick = nick($c['id']);
if($c['corp_rang'] == 1) {$corp_rang = 'Владелец' ;}if($c['corp_rang'] == 2) {$corp_rang = 'заместитель' ;}if($c['corp_rang'] == 3) {$corp_rang = 'акционер' ;}if($c['corp_rang'] == 4) {$corp_rang = 'директор' ;}if($c['corp_rang'] == 5) {$corp_rang = 'менеджер' ;}if($c['corp_rang'] == 6) {$corp_rang = 'стажер' ;}if($c['corp_rang'] > 6) {$corp_rang = 'Никто' ;}
if($c['corp_rang'] == 2) {$corp_rang1 = 'Владельца' ;}if($c['corp_rang'] == 3) {$corp_rang1 = 'заместителя' ;}if($c['corp_rang'] == 4) {$corp_rang1 = 'акционера' ;}if($c['corp_rang'] == 5) {$corp_rang1 = 'директора' ;}if($c['corp_rang'] == 6) {$corp_rang1 = 'менеджера' ;}if($c['corp_rang'] == 7) {$corp_rang1 = 'стажера' ;}
if($c['corp_rang'] == 0) {$corp_rang2 = 'Владельца' ;}if($c['corp_rang'] == 1) {$corp_rang2 = 'заместителя' ;}if($c['corp_rang'] == 2) {$corp_rang2 = 'акционера' ;}if($c['corp_rang'] == 3) {$corp_rang2 = 'директора' ;}if($c['corp_rang'] == 4) {$corp_rang2 = 'менеджера' ;}if($c['corp_rang'] == 2) {$corp_rang2 = 'стажера' ;}
if($user['corp_rang'] == 1){$w = 2;$w1 = 1;}if($user['corp_rang'] == 2){$w = 3;$w1 = 2;}if($user['corp_rang'] == 3){$w = 4;$w1 = 3;}
$nomer = $k_post++;
$kach = mysql_fetch_array(mysql_query('SELECT * FROM `kach` WHERE `ank` = "'.$c['id'].'"'));
echo '<div style="text-align: left;margin-top:4px;">';



echo '<span><span class="nobr">'.nick($c['id']).'</span>
</span> - <span>'.$corp_rang.'</span>, <img src="/images/angel48.png" width="24" height="24" alt="*"> <span>'.n_f($c['angel']).'</span>
<span class="fr">';

if(!$kach){


if($user['corp_rang'] <= $w && $c['corp_rang'] > $w && $user['corp_rang'] < $c['corp_rang']){
echo '<a href="?up_'.$c['corp_rang'].'_'.$c['id'].'/"><img src="/images/arrow_up_green.png" width="24" height="24" alt="" title="Повысить"></a>';
}
if(($user['corp_rang'] <= $w1 and $c['corp_rang'] > $w1 && $user['corp_rang'] < $c['corp_rang']) and $c['corp_rang'] <= 5  ){
echo '<a href="?down_'.$c['corp_rang'].'_'.$c['id'].'/"><img src="/images/arrow_down_green.png" width="24" height="24" alt="" title="Понизить"></a>';
}
if($user['corp_rang'] < $c['corp_rang'] && $c['id'] != $user['id'] ){
echo '<span style="padding-left: 8px;"><a href="?iskl_'.$c['corp_rang'].'_'.$c['id'].'/"><img src="/images/cross.png" width="24" height="24" alt="" title="Уволить"></a></span>';
}

if($c['corp_rang'] == 2){
if($user['corp_rang'] == 1 && $c['id'] != $user['id'] ){
echo '<a href="?transfer_'.$c['corp_rang'].'_'.$c['id'].'/"><img src="/images/transfer.png" width="24" height="24" alt="" title="Передать Корпорацию"></a>';
}
}


}else{
echo '<span id="time_'.($kach['time_kach']-time()).'000">'._time($kach['time_kach']-time()).'</span>';
if($user['corp_rang'] <= 2 && $c['id'] != $user['id'] ){
echo '<span style="padding-left: 8px;"><a href="?iskl_'.$c['corp_rang'].'_'.$c['id'].'/"><img src="/images/cross.png" width="24" height="24" alt="" title="Уволить"></a></span>';
}
}

echo '</span><div class="cb"></div></div>';




if(isset($_GET['transfer_'.$c['corp_rang'].'_'.$c['id'].'/']) && $user['corp_rang'] == 1 and $c['id'] != $user['id']){
$_SESSION['err'] = 'Вы уверны, что хотите передать Корпорацию '.nick($c['id']).' ?
<div class="mt4"><a class="btni accept" href="?transfer_'.$c['corp_rang'].'_'.$c['id'].'_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}

if(isset($_GET['transfer_'.$c['corp_rang'].'_'.$c['id'].'_/']) && $user['corp_rang'] == 1 and $c['id'] != $user['id']){
mysql_query("UPDATE `users` SET `corp_rang` = '2'  WHERE `id` = '$user[id]'");
mysql_query("UPDATE `users` SET `corp_rang` = '1'  WHERE `id` = '$c[id]'");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Передал(а) Корпорацию '.nick($c['id']).'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
header("Location: ?");
exit();
}




if(isset($_GET['down_'.$c['corp_rang'].'_'.$c['id'].'/']) && ($user['corp_rang'] <= $w1 and $c['corp_rang'] > $w1 && $user['corp_rang'] < $c['corp_rang']) and $c['corp_rang'] <= 5  ){
mysql_query("UPDATE `users` SET `corp_rang` = '".($c['corp_rang']+1)."' WHERE `id` = '$c[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Понизил(а) '.$nick.' до '.$corp_rang2.'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
header("Location: ?");
exit();
}

if(isset($_GET['up_'.$c['corp_rang'].'_'.$c['id'].'/']) && $user['corp_rang'] <= $w && $c['corp_rang'] > $w && $user['corp_rang'] < $c['corp_rang']){
mysql_query("UPDATE `users` SET `corp_rang` = '".($c['corp_rang']-1)."' WHERE `id` = '$c[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Повысил(а) '.$nick.' до '.$corp_rang1.'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
header("Location: ?");
exit();
}

if(isset($_GET['iskl_'.$c['corp_rang'].'_'.$c['id'].'/']) && $user['corp_rang'] <=3 and $c['id'] != $user['id']){
$_SESSION['err'] = 'Вы уверны, что хотите исключить '.nick($c['id']).' из корпорации?
<div class="mt4"><a class="btni accept" href="?iskl_'.$c['corp_rang'].'_'.$c['id'].'_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}

if(isset($_GET['iskl_'.$c['corp_rang'].'_'.$c['id'].'_/']) && $user['corp_rang'] <=3 and $c['id'] != $user['id']){
$corp['angel'] = toBC($corp['angel']);
$c['angel']    = toBC($c['angel']);
$corp['rock']  = toBC($corp['rock']);
$c['rock']     = toBC($c['rock']);

$newAngel = bcsub($corp['angel'], $c['angel'], 0);
$newRock  = bcsub($corp['rock'],  $c['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");
mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$c[id]'");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Уволил(а) из корпорации '.$nick.'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$c['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$c['id'].' ');

if($kach){
//mysql_query("UPDATE `users` SET `rubin` = '".($c['rubin'] - $kach['rubin'])."' WHERE `id` = '".$c['id']."' LIMIT 1");
mysql_query('DELETE FROM `kach` WHERE `ank` = '.$c['id'].' ');
}

header("Location: ?");
exit();
}

}
echo '</div>';

?>
</div></p></div>


<div id="skryt" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><img width="24" height="24" src="/images/arrow_down2.png"> Состав корпорации    <span><?=$sostav?></span> / <span><?=$corp['mesta']?></span>   (<?=$online_?>)</a>
</div>
<?










$time_now = time();
$battlemine = mysql_fetch_assoc(mysql_query("SELECT * FROM `battlemine` WHERE `corp`  = '".$user['corp']."' "));
if ($battlemine['time_restart'] <= $time_now && $battlemine['time'] <= $time_now && $battlemine['time_start'] <= $time_now) {$fols_bm = '<font size="4" color="red">+</font>';}
echo '<a class="btnl mt4" href="/battlemine/"><img src="/images/ruby.png" width="24" height="24"> Корпоративная Шахта '.$fols_bm.'</a>';


echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'CorpRating/"><img src="/images/rating2.png" width="24" height="24" alt="" title=""> Рейтинг</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'corp/fond/'.$corp['id'].'/"><img src="/images/bank2.png" width="24" height="24" alt="" title=""> Фонд (<span>'.n_f($corp['rubin']).'</span>)</a></td>
</tr></tbody></table>';

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'application/"><img src="/images/corp2.png" alt="" width="24" height="24"> Заявки</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'corp/history/"><img src="/images/history2.png" width="24" height="24" alt="" title=""> История</a></td>
</tr></tbody></table>';

if($user['corp_rang'] < 4){
echo '<a class="btnl mt4" href="'.$HOME.'corp/corp_settings/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Управление</a>';
}





///##########################################################################################################################################
$kach = mysql_fetch_array(mysql_query('SELECT * FROM `kach` WHERE `ank` = "'.$user['id'].'"'));
if(!$kach){

if($user['corp_rang'] > 1){
echo '<a class="btnl mt4" href="?exit_/"><img src="/images/cross.png" width="24" height="24" alt="" title=""> Покинуть корпорацию</a>';
}else{
if($sostav <= 1){
echo '<a class="btnl mt4" href="?exit_/"><img src="/images/cross.png" width="24" height="24" alt="" title=""> Покинуть корпорацию</a>';
}
}

}

if(isset($_GET['exit_/'])){
$_SESSION['err'] = 'Вы уверны, что хотите покинуть корпорацию?
<div class="mt4"><a class="btni accept" href="?exit/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

if(isset($_GET['exit/'])){

if($kach){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! У Вас Контракт!</font>';
exit();
}
if($user['corp_rang'] == 1){
if($sostav > 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Для начала увольте всех сотрудников!</font>';
exit();
}
}

if($user['corp_rang'] > 1){
mysql_query("UPDATE `users` SET `corp` = '0', `corp_rang` = '0' , `corp_rubin` = '0' WHERE `id` = '$user[id]' LIMIT 1");
$corp['angel'] = toBC($corp['angel']);
$user['angel']    = toBC($user['angel']);
$corp['rock']  = toBC($corp['rock']);
$user['rock']     = toBC($user['rock']);

$newAngel = bcsub($corp['angel'], $user['angel'], 0);
$newRock  = bcsub($corp['rock'],  $user['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");

mysql_query('DELETE FROM `time_day` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$user['id'].' ');
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Уволил(ся,ась) из Корпорации</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
}else{
	
if($sostav <= 1){
mysql_query("UPDATE `users` SET `corp` = '0', `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query('DELETE FROM `corp` WHERE `id` = '.$user['corp'].' ');
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `history` WHERE `corp` = '.$corp['id'].' ');
}

}

$_SESSION['err'] = 'Успешно!';
header('Location: /');
exit();
}
///##########################################################################################################################################





echo '</body>';































}else{

























echo '<body><div class="center"></div><div></div>

<div class="content">
<div><span class="big">Корпорация "<span>'.$corp['name'].'</span>"</span></div>
<div>Бизнес-ангелы <img src="/images/angel48.png" alt="$" width="24" height="24"> <span>'.n_f($corp['angel']).'</span> <font color=red size=2>+'.n_f($corp['turnir_angel']).'</font> </div>';




echo '<center><div class="minor">Бонус к доходу от Построек Корпорации: '.$corp['building'].'% </div></center>';

if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `corp` WHERE `id`  ORDER BY `angel` + '1' DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$a1++;
if($post['id'] == $corp['id']){
if($a <= 1000)echo '<center><div class="minor">'.$a1.' место в рейтинге среди Корпораций</div></center></div>';
else echo "<center><div class='minor'>Корпорация не участвуете в рейтинге...</div><div></div></center></div>";
}
}


if($corp['open'] == 1){
$status = 'Открытый';
}else{
$status = 'Закрытый';
}
echo '<center><div><font size=2>Статус Корпорации:</font> <font size=2 color=black>'.$status.'</font></span></div></center><br>';













if($corp['images'] == 1){
echo '<img width="480" height="160" alt="'.$corp['name'].'" src="/images/corp/1.jpg" title="'.$corp['name'].'">';
}else{
echo '<img width="480" height="160" alt="'.$corp['name'].'" src="/images/corp/'.$corp['images'].'" title="'.$corp['name'].'">';
}






if($corp['status_text'] != ''){
echo '<hr><center>

<i><p><font color=black>'.$corp['status_text'].'</font></p></i>

</center><hr>';
}








if($corp['musor_lvl'] >= 1){
echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$corp['musor_lvl'].'</span></div><div style="display: inline;" class="fl">
<a class="left" style="display: inline-block;" ><img src="/images/biznes/room_11.jpg" alt="Войти" width="64" height="64"></a>
<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;"><div class="tdbrown">Космический Шлюз </div><div>
</div></div></div><div class="cb"></div></div>';
}










$ank_corp_top = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_topic` WHERE `corp` = '".$corp['id']."' and `open` = '1' "),0);
$ank_corp_forum_fols = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_fols` WHERE `corp` = '".$corp['id']."' and `user` = '".$user['id']."' "),0);
if($ank_corp_top > $ank_corp_forum_fols){
$ank_plus_corp = '(+)';
}else{
$ank_plus_corp = '';
}
echo '<a class="btnl mt4" href="'.$HOME.'corp_forum/corp_'.$corp['id'].'/"><img src="/images/forum2.png" width="24" height="24" alt="" title=""> Форум Корпорации '.$ank_plus_corp.'</a>';
if($user['level'] >= 1){
echo '<a class="btnl mt4" href="'.$HOME.'view_chat_corp/'.$corp['id'].'/"><img src="/images/folder.png" width="24" height="24" alt="" title=""> Чат Корпорации</a>';
echo '<a class="btnl mt4" href="'.$HOME.'view_sicret_chat_corp/'.$corp['id'].'/"><img src="/images/cross.png" width="20" height="20" alt="" title=""> Скрытый чат Корпорации</a>';
}



















///##########################################################################################################################################
$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '$corp[id]'"),0);
$online_ = mysql_result(mysql_query('SELECT COUNT(*) FROM `users` WHERE `corp` = "'.$corp['id'].'" and `viz` > "'.(time()-$sql['s_online']).'" '),0);


?>
<div id="pokazat"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;"><img width="24" height="24" src="/images/arrow_up2.png"> Состав корпорации    <span><?=$sostav?></span> / <span><?=$corp['mesta']?></span>   (<?=$online_?>)</a>

<p><form name='form' method='post' action='?text'><div class='fight center'>
<div class="content">
<?

if (empty($user['max'])) $user['max']=100;
$max = $corp['mesta'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '".$corp['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$usersss = mysql_query("SELECT * FROM `users` WHERE `corp` = '".$corp['id']."'  ORDER BY `corp_rang` ASC, `angel` + '1' DESC LIMIT $start,$max");
while($c = mysql_fetch_assoc($usersss)){
$nick = nick($c['id']);


if($c['corp_rang'] == 1) {
$c_corp_rang = 'Владелец' ;
}
if($c['corp_rang'] == 2) {
$c_corp_rang = 'заместитель' ;
}
if($c['corp_rang'] == 3) {
$c_corp_rang = 'акционер' ;
}
if($c['corp_rang'] == 4) {
$c_corp_rang = 'директор' ;
}
if($c['corp_rang'] == 5) {
$c_corp_rang = 'менеджер' ;
}
if($c['corp_rang'] == 6) {
$c_corp_rang = 'стажер' ;
}



echo '<div style="text-align: left;margin-top:4px;">';
echo '<span><span class="nobr">'.nick($c['id']).'</span>
</span> - <span>'.$c_corp_rang.'</span>, <img src="/images/angel48.png" width="24" height="24" alt="*"> <span>'.n_f($c['angel']).'</span>
<span class="fr">';
$kach1 = mysql_fetch_array(mysql_query('SELECT * FROM `kach` WHERE `ank` = "'.$c['id'].'"'));
if(!$kach1){
}else{
echo '<span id="time_'.($kach1['time_kach']-time()).'000">'._time($kach1['time_kach']-time()).'</span>';
}


echo '</span><div class="cb"></div></div>';









}

?>
</div></p></div></div>


<div id="skryt" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><img width="24" height="24" src="/images/arrow_down2.png"> Состав корпорации    <span><?=$sostav?></span> / <span><?=$corp['mesta']?></span>   (<?=$online_?>)</a>
</div>
<?
///##########################################################################################################################################









echo '<a class="btnl mt4" href="'.$HOME.'rating/4/"><img src="/images/rating2.png" width="24" height="24" alt="" title=""> Рейтинги</a>';




if($sostav < $corp['mesta']){
if($corp['open'] == 1 and $user['corp'] == 0){
echo '<a class="btnl mt4" href="?tocomein"><img src="/images/accept48.png" width="24" height="24" alt="" title=""> Вступить в Корпорацию</a>';
}
}

if(isset($_GET['tocomein'])){
if($user['premium'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Действие премиума еще не закончилось.</font>';
exit();
}
if($sostav >= $corp['mesta']){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В Корпорации нет мест!</font>';
exit();
}
if($corp['open'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Корпорация закрыта!</font>';
exit();
}
if($user['corp'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Вы находитесь в  Корпорации!</font>';
exit();
}

$corp['angel'] = toBC($corp['angel']);
$user['angel']    = toBC($user['angel']);
$corp['rock']  = toBC($corp['rock']);
$user['rock']     = toBC($user['rock']);

$newAngel = bcadd($corp['angel'], $user['angel'], 0);
$newRock  = bcadd($corp['rock'],  $user['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($corp['id'])."' 
    LIMIT 1");

mysql_query("UPDATE `users` SET `corp` = '".$corp['id']."', `corp_rang` = '6' WHERE `id` = '$user[id]' LIMIT 1");
if(!$time_day){
mysql_query("INSERT INTO `time_day` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}else{
mysql_query("UPDATE `time_day` SET `time` = '".time()."', `day` = '0' WHERE `user` = '$user[id]' LIMIT 1");
}
if(!$musor_time){
mysql_query("INSERT INTO `musor_time` SET `user` = '".$user['id']."', `time` = '".(time()+86400)."' ");
}else{
mysql_query("UPDATE `musor_time` SET `time` = '".(time()+86400)."' WHERE `user` = '$user[id]' LIMIT 1");
}


if($application){
mysql_query('DELETE FROM `application` WHERE `user` = '.$user['id'].' '); /// заявки на всупление в кп
}
if($Invitations){
mysql_query('DELETE FROM `Invitations` WHERE `ank_user` = '.$user['id'].' '); /// приглашения в кп
}
if($kach){
mysql_query('DELETE FROM `kach` WHERE `ank` = '.$user['id'].' '); /// приглашения по контракту
}



$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Вступил(а) в Корпорацию</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$corp['id']."', `text` = '$text', `time` = '".time()."'");
header('Location: ?');
exit();
}




echo '</body>';

























}
require_once ('../system/footer.php');
?>