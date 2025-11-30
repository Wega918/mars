<?php
$title = 'Союз';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if(isset($_GET['id']) && mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz` WHERE `id` = '".intval($_GET['id'])."'"),0) == true){
$soyz = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".intval($_GET['id'])."'"));
}else{
header('Location: /');
exit();
}

$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '$soyz[id]'"),0);
if($sostav <= 0){
mysql_query('DELETE FROM `soyz` WHERE `id` = '.$soyz['id'].' ');
}




if($user['soyz_rang'] == 1 and $user['set_4'] == 1 ) {
$chlen = mysql_query("SELECT * FROM `users` WHERE `soyz` = '".$soyz['id']."' and `soyz_rang` = '6' or `soyz_rang` = '5' ");
$cc = mysql_fetch_array ($chlen);
do {
if($cc['viz'] < (time()-(86400*3)) ){
if($cc['soyz_rang'] == 6 or $cc['soyz_rang'] == 5){
$musor_new = bcsub(toBC($soyz['musor']), toBC($cc['musor_proc']), 8);
$id = intval($soyz['id']);
mysql_query("UPDATE `soyz` SET `musor` = '$musor_new' WHERE `id` = '$id' LIMIT 1");
mysql_query("UPDATE `users` SET `soyz` = '0',  `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$cc[id]'");
$text = ' <font color=lightgreen>'.nick($cc['id']).'</font> - <font color=IndianRed>Уволен из союза за отсутствие в игре более 3-х дней.</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$soyz['id']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$cc['id'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$cc['id'].' ');

$txt = 'Вы были автоматически исключены из союза за отсутствие в игре более 3-х дней.';
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



if($user['soyz_rang'] == 1 and $user['set_5'] == 1 ) {
$chlen2 = mysql_query("SELECT * FROM `users` WHERE `soyz` = '".$soyz['id']."' and `soyz_rang` = '4' ");
$cc2 = mysql_fetch_array ($chlen2);
do {
if($cc2['viz'] < (time()-(86400*3)) ){
if($cc2['soyz_rang'] == 4){
$musor_new = bcsub(toBC($soyz['musor']), toBC($cc2['musor_proc']), 8);
$id = intval($soyz['id']);
mysql_query("UPDATE `soyz` SET `musor` = '$musor_new' WHERE `id` = '$id' LIMIT 1");
mysql_query("UPDATE `users` SET `soyz` = '0',  `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$cc2[id]'");
$text = ' <font color=lightgreen>'.nick($cc2['id']).'</font> - <font color=IndianRed>Уволен из союза за отсутствие в игре более 3-х дней.</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$soyz['id']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$cc2['id'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$cc2['id'].' ');

$txt = 'Вы были автоматически исключены из союза за отсутствие в игре более 3-х дней.';
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





if($user['soyz_rang'] == 1 and $user['set_6'] == 1 ) {
$chlen2 = mysql_query("SELECT * FROM `users` WHERE `soyz` = '".$soyz['id']."' and `soyz_rang` = '3' ");
$cc3 = mysql_fetch_array ($chlen2);
do {
if($cc3['viz'] < (time()-(86400*3)) ){
if($cc3['soyz_rang'] == 3){
$musor_new = bcsub(toBC($soyz['musor']), toBC($cc3['musor_proc']), 8);
$id = intval($soyz['id']);
mysql_query("UPDATE `soyz` SET `musor` = '$musor_new' WHERE `id` = '$id' LIMIT 1");
mysql_query("UPDATE `users` SET `soyz` = '0',  `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$cc3[id]'");
$text = ' <font color=lightgreen>'.nick($cc3['id']).'</font> - <font color=IndianRed>Уволен из союза за отсутствие в игре более 3-х дней.</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$soyz['id']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$cc3['id'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$cc3['id'].' ');

$txt = 'Вы были автоматически исключены из союза за отсутствие в игре более 3-х дней.';
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
} while ($cc3 = mysql_fetch_array ($chlen2));
}




















$users_ = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '".$soyz['id']."' "),0);
if($users_ > $soyz['mesta']){


if (empty($user['max'])) $user['max']=100;
$max = $soyz['mesta'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '".$soyz['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$tetcst = mysql_query("SELECT * FROM `users` WHERE `soyz` = '".$soyz['id']."'  ORDER BY `musor_proc` + '1' ASC LIMIT $start,$max");
while($sdds = mysql_fetch_assoc($tetcst)){
$reyt11 = $k_post++;
$kach_soyz = mysql_fetch_array(mysql_query('SELECT * FROM `kach_soyz` WHERE `ank` = "'.$sdds['id'].'" and  `time_kach` < "'.time().'"  '));


if ($reyt11 == 1) {
    if ($sdds['soyz_rang'] != 1) {
        $musor_new = bcsub(toBC($soyz['musor']), toBC($sdds['musor_proc']), 8);
        $diamonds_new = bcsub(toBC($soyz['Diamonds']), toBC($sdds['Diamonds']), 8);

        $soyz_id = intval($soyz['id']);
        $user_id = intval($sdds['id']);

        mysql_query("UPDATE `soyz` SET `musor` = '$musor_new', `Diamonds` = '$diamonds_new' WHERE `id` = '$soyz_id' LIMIT 1");
        mysql_query("UPDATE `users` SET `soyz` = '0', `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$user_id'");

        $text = ' <font color=lightgreen>' . nick($user_id) . '</font> - <font color=IndianRed>Уволен(а) из союза</font><i>';
        mysql_query("INSERT INTO `history_soyz` SET `soyz` = '" . $sdds['soyz'] . "', `text` = '$text', `time` = '" . time() . "'");

        mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = ' . $user_id);
        mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = ' . $user_id);

        if ($kach_soyz) {
            mysql_query('DELETE FROM `kach_soyz` WHERE `ank` = ' . $user_id);
        }
    } else {
        if ($reyt11 == 2) {
            $musor_new = bcsub(toBC($soyz['musor']), toBC($sdds['musor_proc']), 8);
            $diamonds_new = bcsub(toBC($soyz['Diamonds']), toBC($sdds['Diamonds']), 8);

            $soyz_id = intval($soyz['id']);
            $user_id = intval($sdds['id']);

            mysql_query("UPDATE `soyz` SET `musor` = '$musor_new', `Diamonds` = '$diamonds_new' WHERE `id` = '$soyz_id' LIMIT 1");
            mysql_query("UPDATE `users` SET `soyz` = '0', `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$user_id'");

            $text = ' <font color=lightgreen>' . nick($user_id) . '</font> - <font color=IndianRed>Уволен(а) из союза</font><i>';
            mysql_query("INSERT INTO `history_soyz` SET `soyz` = '" . $sdds['soyz'] . "', `text` = '$text', `time` = '" . time() . "'");

            mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = ' . $user_id);
            mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = ' . $user_id);

            if ($kach_soyz) {
                mysql_query('DELETE FROM `kach_soyz` WHERE `ank` = ' . $user_id);
            }
        }
    }
}



}


}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Получаем сумму musor_proc для союза через BCMath
$soyz_id = intval($soyz['id']);
$q = mysql_query("SELECT musor_proc FROM users WHERE soyz = '$soyz_id'");

$sum_musor_soyz1 = "0";
while ($row = mysql_fetch_assoc($q)) {
    $sum_musor_soyz1 = bcadd($sum_musor_soyz1, $row['musor_proc'], 8);
}

// Приводим к строкам для bcmath
$sum_musor_soyz1_bc = toBC($sum_musor_soyz1);
$turnir_musor_bc    = toBC($soyz['turnir_musor']);
$musor_soyz_bc      = toBC($soyz['musor']);

// Складываем сумму и turnir_musor
$sum_plus_turnir = bcadd($sum_musor_soyz1_bc, $turnir_musor_bc, 8);

// Сравниваем с текущим значением musor в союзе
if (bccomp($sum_plus_turnir, $musor_soyz_bc, 8) !== 0) {
    mysql_query("UPDATE `soyz` 
                 SET `musor` = '" . $sum_plus_turnir . "' 
                 WHERE `id` = '" . $soyz_id . "' 
                 LIMIT 1");
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











if($user['soyz'] == $soyz['id']){
///##########################################################################################################################################
if($user['soyz'] > 0){
if($user['ad_soyz'] >= 1){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=red>☆  Обьявление Союза ☆ </font>      <a href="?Hide/"><span style="float: right;">   <font size=2 color=black>[x]</font></span></a>';
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo ''.$soyz['ad'].'';
echo '</div>';

echo'<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="small tbrown" style="position:absolute; top: 5; right: 0">('.vremja($soyz['ad_time']).')</div>
<div style="display: inline;" class="fl">
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>Объявил: '.nick($soyz['ad_user']).'</span></div>
<div>';
echo'</div></div></div><div class="cb"></div></div>';

echo '</span></li></ul></div>';


if(isset($_GET['Hide/'])){
mysql_query("UPDATE `users` SET  `ad_soyz` = '0' WHERE `id` = '$user[id]'");
header('Location: ?');
exit();
}
}
}
///##########################################################################################################################################





echo '<body><div class="center"></div><div></div>

<div class="content">
<div><span class="big">Союз Коллекционеров "<span>'.$soyz['name'].'</span>"</span></div>
<div>Коллекции <img src="/images/header/money_36.png" alt="$" width="24" height="24"> <span>'.n_f($soyz['musor']).'%</span> <font color=red size=2>+'.n_f($soyz['turnir_musor']).'%</font>  </div>
';





echo '<center><div class="minor">Бонус к верности от Построек Союза: '.$soyz['building'].'% </div></center>';
if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `soyz` WHERE `id`  ORDER BY `musor` + '1' DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$a1++;
if($post['id'] == $soyz['id']){
if($a <= 1000)echo '<center><div class="minor">'.$a1.' место в рейтинге среди Союзов</div></center></div>';
else echo "<center><div class='minor'>Союз не участвует в рейтинге...</div><div></div></center></div>";
}
}


if($soyz['open'] == 1){
$status = 'Открытый';
}else{
$status = 'Закрытый';
}
echo '<center><div><font size=2>Статус Союза:</font> <font size=2 color=black>'.$status.'</font></span></div></center><br>';






if($user['soyz_rang'] == 1 or $user['level'] == 3) {
$href = '<a href="'.$HOME.'soyz/Image_upload_soyz/">';
}else{
$href = '';
}


if($soyz['images'] == 1){
echo ''.$href.'<img width="480" height="160" alt="'.$soyz['name'].'" src="/images/soyz/1.jpg" title="'.$soyz['name'].'"></a>';
}else{
echo ''.$href.'<img width="480" height="160" alt="'.$soyz['name'].'" src="/images/soyz/'.$soyz['images'].'" title="'.$soyz['name'].'"></a>';
}


if($soyz['status_text'] != ''){
echo '<hr><center>

<i><p><font color=black>'.$soyz['status_text'].'</font></p></i>

</center><hr>';
}


require_once ('../soyz/fidelity.php'); ///Верность
require_once ('../soyz/Gateway.php'); ///Шлюз









$soyz_ass = mysql_result(mysql_query("SELECT COUNT(id) FROM `soyz_ass` WHERE `clan_id` = ".$user['soyz'].""),0);
if($soyz_ass > $user['soyz_ass']){
$ass_soyz_ass = '(+)';
}else{
$ass_soyz_ass = '';
}

$soyz_top = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_topic` WHERE `soyz` = '".$soyz['id']."' "),0);
$soyz_forum_fols = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_fols` WHERE `soyz` = '".$soyz['id']."' and `user` = '".$user['id']."' "),0);
if($soyz_top > $soyz_forum_fols){
$plus_soyz = '(+)';
}else{
$plus_soyz = '';
}
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'soyz/soyz_ass/"><img src="/images/folder.png" width="24" height="24" alt="" title=""> Чат '.$ass_soyz_ass.'</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'soyz_forum/soyz_'.$soyz['id'].'/"><img src="/images/forum2.png" width="24" height="24" alt="" title=""> Форум '.$plus_soyz.'</a></td>
</tr></tbody></table>';
























///##########################################################################################################################################
$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '$soyz[id]'"),0);
$online_ = mysql_result(mysql_query('SELECT COUNT(*) FROM `users` WHERE `soyz` = "'.$soyz['id'].'" and `viz` > "'.(time()-$sql['s_online']).'" '),0);

?>
<div id="pokazat"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;"><img width="24" height="24" src="/images/arrow_up2.png"> Состав Союза    <span><?=$sostav?></span> / <span><?=$soyz['mesta']?></span>   (<?=$online_?>)</a>

<p><form name='form' method='post' action='?text'><div class='fight center'>
<div class="content">
<?



if (empty($user['max'])) $user['max']=100;
$max = $soyz['mesta'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '".$soyz['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$usersss = mysql_query("SELECT * FROM `users` WHERE `soyz` = '".$soyz['id']."'  ORDER BY `soyz_rang` ASC, `musor_proc` + '1' DESC LIMIT $start,$max");
echo '<div class="content">';
while($c = mysql_fetch_assoc($usersss)){
$nick = nick($c['id']);
if($c['soyz_rang'] == 1) {$soyz_rang = 'Владелец' ;}if($c['soyz_rang'] == 2) {$soyz_rang = 'заместитель' ;}if($c['soyz_rang'] == 3) {$soyz_rang = 'акционер' ;}if($c['soyz_rang'] == 4) {$soyz_rang = 'директор' ;}if($c['soyz_rang'] == 5) {$soyz_rang = 'менеджер' ;}if($c['soyz_rang'] == 6) {$soyz_rang = 'стажер' ;}if($c['soyz_rang'] > 6) {$soyz_rang = 'Никто' ;}
if($c['soyz_rang'] == 2) {$soyz_rang1 = 'Владельца' ;}if($c['soyz_rang'] == 3) {$soyz_rang1 = 'заместителя' ;}if($c['soyz_rang'] == 4) {$soyz_rang1 = 'акционера' ;}if($c['soyz_rang'] == 5) {$soyz_rang1 = 'директора' ;}if($c['soyz_rang'] == 6) {$soyz_rang1 = 'менеджера' ;}if($c['soyz_rang'] == 7) {$soyz_rang1 = 'стажера' ;}
if($c['soyz_rang'] == 0) {$soyz_rang2 = 'Владельца' ;}if($c['soyz_rang'] == 1) {$soyz_rang2 = 'заместителя' ;}if($c['soyz_rang'] == 2) {$soyz_rang2 = 'акционера' ;}if($c['soyz_rang'] == 3) {$soyz_rang2 = 'директора' ;}if($c['soyz_rang'] == 4) {$soyz_rang2 = 'менеджера' ;}if($c['soyz_rang'] == 2) {$soyz_rang2 = 'стажера' ;}
if($user['soyz_rang'] == 1){$w = 2;$w1 = 1;}if($user['soyz_rang'] == 2){$w = 3;$w1 = 2;}if($user['soyz_rang'] == 3){$w = 4;$w1 = 3;}
$nomer = $k_post++;

echo '<div style="text-align: left;margin-top:4px;">
<span><span class="nobr">'.nick($c['id']).'</span>
</span> - <span>'.$soyz_rang.'</span>, <img src="/images/header/money_36.png" width="24" height="24" alt="*"> <span>'.n_f($c['musor_proc']).'%</span>
<span class="fr">';



$kach_soyz = mysql_fetch_array(mysql_query('SELECT * FROM `kach_soyz` WHERE `ank` = "'.$c['id'].'"'));
if(!$kach_soyz){

if($user['soyz_rang'] <= $w && $c['soyz_rang'] > $w && $user['soyz_rang'] < $c['soyz_rang']){
echo '<a href="?up_'.$c['soyz_rang'].'_'.$c['id'].'/"><img src="/images/arrow_up_green.png" width="24" height="24" alt="" title="Повысить"></a>';
}
if(($user['soyz_rang'] <= $w1 and $c['soyz_rang'] > $w1 && $user['soyz_rang'] < $c['soyz_rang']) and $c['soyz_rang'] <= 5  ){
echo '<a href="?down_'.$c['soyz_rang'].'_'.$c['id'].'/"><img src="/images/arrow_down_green.png" width="24" height="24" alt="" title="Понизить"></a>';
}
if($user['soyz_rang'] < $c['soyz_rang'] && $c['id'] != $user['id'] ){
echo '<span style="padding-left: 8px;"><a href="?iskl_'.$c['soyz_rang'].'_'.$c['id'].'/"><img src="/images/cross.png" width="24" height="24" alt="" title="Уволить"></a></span>';
}

if($c['soyz_rang'] == 2){
if($user['soyz_rang'] == 1 && $c['id'] != $user['id'] ){
echo '<a href="?transfer_'.$c['soyz_rang'].'_'.$c['id'].'/"><img src="/images/transfer.png" width="24" height="24" alt="" title="Передать Союз"></a>';
}
}



}else{
echo '<span id="time_'.($kach_soyz['time_kach']-time()).'000">'._time($kach_soyz['time_kach']-time()).'</span>';
if($user['soyz_rang'] <= 2 && $c['id'] != $user['id'] ){
echo '<span style="padding-left: 8px;"><a href="?iskl_'.$c['soyz_rang'].'_'.$c['id'].'/"><img src="/images/cross.png" width="24" height="24" alt="" title="Уволить"></a></span>';
}
}



echo '</span><div class="cb"></div></div>';




if(isset($_GET['transfer_'.$c['soyz_rang'].'_'.$c['id'].'/']) && $user['soyz_rang'] == 1 and $c['id'] != $user['id']){
$_SESSION['err'] = 'Вы уверны, что хотите передать Союз '.nick($c['id']).' ?
<div class="mt4"><a class="btni accept" href="?transfer_'.$c['soyz_rang'].'_'.$c['id'].'_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}

if(isset($_GET['transfer_'.$c['soyz_rang'].'_'.$c['id'].'_/']) && $user['soyz_rang'] == 1 and $c['id'] != $user['id']){
mysql_query("UPDATE `users` SET `soyz_rang` = '2'  WHERE `id` = '$user[id]'");
mysql_query("UPDATE `users` SET `soyz_rang` = '1'  WHERE `id` = '$c[id]'");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Передал(а) Союз '.nick($c['id']).'</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text', `time` = '".time()."'");
header("Location: ?");
exit();
}




if(isset($_GET['down_'.$c['soyz_rang'].'_'.$c['id'].'/']) && ($user['soyz_rang'] <= $w1 and $c['soyz_rang'] > $w1 && $user['soyz_rang'] < $c['soyz_rang']) and $c['soyz_rang'] <= 5  ){
mysql_query("UPDATE `users` SET `soyz_rang` = '".($c['soyz_rang']+1)."' WHERE `id` = '$c[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Понизил(а) '.$nick.' до '.$soyz_rang2.'</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text', `time` = '".time()."'");
header("Location: ?");
exit();
}

if(isset($_GET['up_'.$c['soyz_rang'].'_'.$c['id'].'/']) && $user['soyz_rang'] <= $w && $c['soyz_rang'] > $w && $user['soyz_rang'] < $c['soyz_rang']){
mysql_query("UPDATE `users` SET `soyz_rang` = '".($c['soyz_rang']-1)."' WHERE `id` = '$c[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Повысил(а) '.$nick.' до '.$soyz_rang1.'</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text', `time` = '".time()."'");
header("Location: ?");
exit();
}

if(isset($_GET['iskl_'.$c['soyz_rang'].'_'.$c['id'].'/']) && $user['soyz_rang'] <=3 and $c['id'] != $user['id']){
$_SESSION['err'] = 'Вы уверны, что хотите исключить '.nick($c['id']).' из Союза?
<div class="mt4"><a class="btni accept" href="?iskl_'.$c['soyz_rang'].'_'.$c['id'].'_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}

if(isset($_GET['iskl_'.$c['soyz_rang'].'_'.$c['id'].'_/']) && $user['soyz_rang'] <=3 and $c['id'] != $user['id']){
// Преобразуем значения в формат для bcmath
$musor_soyz_bc = toBC($soyz['musor']);
$musor_proc_bc = toBC($c['musor_proc']);

// Вычитаем с помощью bcsub
$new_musor = bcsub($musor_soyz_bc, $musor_proc_bc, 8);

// Выполняем запрос, подставляя результат
mysql_query("UPDATE `soyz` SET `musor` = '".$new_musor."' WHERE `id` = '".intval($soyz['id'])."' LIMIT 1");
mysql_query("UPDATE `users` SET `soyz` = '0',  `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$c[id]'");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Уволил(а) из Союза '.$nick.'</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$c['id'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$c['id'].' ');

if($kach_soyz){
//mysql_query("UPDATE `users` SET `rubin` = '".($c['rubin'] - $kach_soyz['rubin'])."' WHERE `id` = '".$c['id']."' LIMIT 1");
mysql_query('DELETE FROM `kach_soyz` WHERE `ank` = '.$c['id'].' ');
}

header("Location: ?");
exit();
}

}
echo '</div>';

?>
</div></p></div></div>


<div id="skryt" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><img width="24" height="24" src="/images/arrow_down2.png"> Состав Союза    <span><?=$sostav?></span> / <span><?=$soyz['mesta']?></span>   (<?=$online_?>)</a>
</div>
<?
///##########################################################################################################################################








echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'SoyzRating/"><img src="/images/rating2.png" width="24" height="24" alt="" title=""> Рейтинг</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'soyz/fond/'.$soyz['id'].'/"><img src="/images/bank2.png" width="24" height="24" alt="" title=""> Фонд (<span>'.n_f($soyz['rubin']).'</span>)</a></td>
</tr></tbody></table>';

echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'application_soyz/"><img src="/images/soyz2.png" alt="" width="24" height="24"> Заявки</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'soyz/history_soyz/"><img src="/images/history2.png" width="24" height="24" alt="" title=""> История</a></td>
</tr></tbody></table>';

if($user['soyz_rang'] < 4){
echo '<a class="btnl mt4" href="'.$HOME.'soyz/soyz_settings/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Управление</a>';
}




///##########################################################################################################################################
if($user['soyz_rang'] > 1){
echo '<a class="btnl mt4" href="?exit_/"><img src="/images/cross.png" width="24" height="24" alt="" title=""> Покинуть Союз</a>';
}else{
if($sostav <= 1){
echo '<a class="btnl mt4" href="?exit_/"><img src="/images/cross.png" width="24" height="24" alt="" title=""> Покинуть Союз</a>';
}
}
if(isset($_GET['exit_/'])){
$_SESSION['err'] = 'Вы уверны, что хотите покинуть Союз?
<div class="mt4"><a class="btni accept" href="?exit/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

if(isset($_GET['exit/'])){

$kach_soyz = mysql_fetch_array(mysql_query('SELECT * FROM `kach_soyz` WHERE `ank` = "'.$user['id'].'"'));
if($kach_soyz){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! У Вас Контракт!</font>';
exit();
}
if ($user['soyz_rang'] == 1){
if($sostav > 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Для начала увольте всех сотрудников!</font>';
exit();
}
}

if($user['soyz_rang'] > 1){
mysql_query("UPDATE `users` SET `soyz` = '0', `soyz_rang` = '0' , `soyz_rubin` = '0' WHERE `id` = '$user[id]' LIMIT 1");
$musor_soyz_bc = toBC($soyz['musor']);
$musor_proc_user_bc = toBC($user['musor_proc']);
$new_musor = bcsub($musor_soyz_bc, $musor_proc_user_bc, 8);
mysql_query("UPDATE `soyz` SET `musor` = '".$new_musor."' WHERE `id` = '".intval($soyz['id'])."' LIMIT 1");
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$user['id'].' ');
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Уволил(ся,ась) из Союза</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text', `time` = '".time()."'");
}else{
	
if($sostav <= 1){
mysql_query("UPDATE `users` SET `soyz` = '0', `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$user[id]' LIMIT 1");
mysql_query('DELETE FROM `soyz` WHERE `id` = '.$user['soyz'].' ');
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `history_soyz` WHERE `soyz` = '.$soyz['id'].' ');
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
<div><span class="big">Союз Коллекционеров "<span>'.$soyz['name'].'</span>"</span></div>
<div>Коллекции <img src="/images/header/money_36.png" alt="$" width="24" height="24"> <span>'.n_f($soyz['musor']).'%</span> <font color=red size=2>+'.n_f($soyz['turnir_musor']).'%</font> </div>';




echo '<center><div class="minor">Бонус к верности от Построек Союза: '.$soyz['building'].'% </div></center>';
if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `soyz` WHERE `id`  ORDER BY `musor` + '1' DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$a1++;
if($post['id'] == $soyz['id']){
if($a <= 1000)echo '<center><div class="minor">'.$a1.' место в рейтинге среди Союзов</div></center></div>';
else echo "<center><div class='minor'>Союз не участвует в рейтинге...</div><div></div></center></div>";
}
}

if($soyz['open'] == 1){
$status = 'Открытый';
}else{
$status = 'Закрытый';
}
echo '<center><div><font size=2>Статус Союза:</font> <font size=2 color=black>'.$status.'</font></span></div></center><br>';



if($soyz['images'] == 1){
echo '<img width="480" height="160" alt="'.$soyz['name'].'" src="/images/soyz/1.jpg" title="'.$soyz['name'].'">';
}else{
echo '<img width="480" height="160" alt="'.$soyz['name'].'" src="/images/soyz/'.$soyz['images'].'" title="'.$soyz['name'].'">';
}




if($soyz['status_text'] != ''){
echo '<hr><center>

<i><p><font color=black>'.$soyz['status_text'].'</font></p></i>

</center><hr>';
}




if($soyz['musor_lvl'] >= 1){
echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$soyz['musor_lvl'].'</span></div><div style="display: inline;" class="fl">
<a class="left" style="display: inline-block;"><img src="/images/biznes/room_11.jpg" alt="Войти" width="64" height="64"></a>
<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;"><div class="tdbrown">Космический Шлюз </div><div>
</div></div></div><div class="cb"></div></div>';
}







$soyz_top = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_topic` WHERE `soyz` = '".$soyz['id']."'  and `open` = '0' "),0);
$soyz_forum_fols = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_fols` WHERE `soyz` = '".$soyz['id']."' and `user` = '".$user['id']."' "),0);
if($soyz_top > $soyz_forum_fols){
$plus_soyz = '(+)';
}else{
$plus_soyz = '';
}
echo '<a class="btnl mt4" href="'.$HOME.'soyz_forum/soyz_'.$soyz['id'].'/"><img src="/images/forum2.png" width="24" height="24" alt="" title=""> Форум Союза '.$plus_soyz.'</a>';
if($user['level'] >= 1){
echo '<a class="btnl mt4" href="'.$HOME.'view_chat_soyz/'.$soyz['id'].'/"><img src="/images/folder.png" width="24" height="24" alt="" title=""> Чат Союза</a>';
}








///##########################################################################################################################################
$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '$soyz[id]'"),0);
$online_ = mysql_result(mysql_query('SELECT COUNT(*) FROM `users` WHERE `soyz` = "'.$soyz['id'].'" and `viz` > "'.(time()-$sql['s_online']).'" '),0);

?>
<div id="pokazat"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;"><img width="24" height="24" src="/images/arrow_up2.png"> Состав Союза    <span><?=$sostav?></span> / <span><?=$soyz['mesta']?></span>   (<?=$online_?>)</a>

<p><form name='form' method='post' action='?text'><div class='fight center'>
<div class="content">
<?



if (empty($user['max'])) $user['max']=100;
$max = $soyz['mesta'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '".$soyz['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$usersss = mysql_query("SELECT * FROM `users` WHERE `soyz` = '".$soyz['id']."'  ORDER BY `soyz_rang` ASC, `musor_proc` + '1' DESC LIMIT $start,$max");
while($c = mysql_fetch_assoc($usersss)){
$nick = nick($c['id']);


if($c['soyz_rang'] == 1) {
$c_soyz_rang = 'Владелец' ;
}
if($c['soyz_rang'] == 2) {
$c_soyz_rang = 'заместитель' ;
}
if($c['soyz_rang'] == 3) {
$c_soyz_rang = 'акционер' ;
}
if($c['soyz_rang'] == 4) {
$c_soyz_rang = 'директор' ;
}
if($c['soyz_rang'] == 5) {
$c_soyz_rang = 'менеджер' ;
}
if($c['soyz_rang'] == 6) {
$c_soyz_rang = 'стажер' ;
}



echo '<div style="text-align: left;margin-top:4px;">
<span><span class="nobr">'.nick($c['id']).'</span>
</span> - <span>'.$c_soyz_rang.'</span>, <img src="/images/header/money_36.png" width="24" height="24" alt="*"> <span>'.n_f($c['musor_proc']).'%</span>
<span class="fr">';
$kach_soyz = mysql_fetch_array(mysql_query('SELECT * FROM `kach_soyz` WHERE `ank` = "'.$c['id'].'"'));
if(!$kach_soyz){
}else{
echo '<span id="time_'.($kach_soyz['time_kach']-time()).'000">'._time($kach_soyz['time_kach']-time()).'</span>';
}
echo '</span><div class="cb"></div></div>';

}
echo '</div>';

?>
</div></p></div></div>


<div id="skryt" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><img width="24" height="24" src="/images/arrow_down2.png"> Состав Союза    <span><?=$sostav?></span> / <span><?=$corp['mesta']?></span>   (<?=$online_?>)</a>
</div>
<?
///##########################################################################################################################################









echo '<a class="btnl mt4" href="'.$HOME.'rating/5/"><img src="/images/rating2.png" width="24" height="24" alt="" title=""> Рейтинги</a>';

if($sostav < $soyz['mesta']){
if($soyz['open'] == 1 and $user['soyz'] == 0){
echo '<a class="btnl mt4" href="?tocomein"><img src="/images/accept48.png" width="24" height="24" alt="" title=""> Вступить в Союз</a>';
}
}

if(isset($_GET['tocomein'])){

if($sostav >= $soyz['mesta']){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В Союзе нет мест!</font>';
exit();
}
if($soyz['open'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Союз закрыт!</font>';
exit();
}
if($user['soyz'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Вы находитесь в  Союзе!</font>';
exit();
}

$musor_soyz_bc = toBC($soyz['musor']);
$musor_proc_user_bc = toBC($user['musor_proc']);
$new_musor = bcadd($musor_soyz_bc, $musor_proc_user_bc, 8);
mysql_query("UPDATE `soyz` SET `musor` = '".$new_musor."' WHERE `id` = '".intval($soyz['id'])."' LIMIT 1");
mysql_query("UPDATE `users` SET `soyz` = '".$soyz['id']."', `soyz_rang` = '6' WHERE `id` = '$user[id]' LIMIT 1");
if(!$time_day_soyz){
mysql_query("INSERT INTO `time_day_soyz` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}else{
mysql_query("UPDATE `time_day_soyz` SET `time` = '".time()."', `day` = '0' WHERE `user` = '$user[id]' LIMIT 1");
}
if(!$musor_time_soyz){
mysql_query("INSERT INTO `musor_time_soyz` SET `user` = '".$user['id']."', `time` = '".(time()+86400)."' ");
}else{
mysql_query("UPDATE `musor_time_soyz` SET `time` = '".(time()+86400)."' WHERE `user` = '$user[id]' LIMIT 1");
}



if($application_soyz){
mysql_query('DELETE FROM `application_soyz` WHERE `user` = '.$user['id'].' '); /// заявки на всупление в союз
}
if($Invitations_soyz){
mysql_query('DELETE FROM `Invitations_soyz` WHERE `ank_user` = '.$user['id'].' '); /// приглашения в союз
}

$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Вступил(а) в Союз</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$soyz['id']."', `text` = '$text', `time` = '".time()."'");
header('Location: ?');
exit();
}




echo '</body>';

























}
require_once ('../system/footer.php');
?>