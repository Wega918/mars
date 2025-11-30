<?php
$title = 'Бой';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}





$pve_bot = mysql_query('SELECT * FROM `pve_bot` WHERE `kill` = "0" and (`act` = "'.$user['id'].'" or `act1` = "'.$user['id'].'" or `act2` = "'.$user['id'].'" or `act3` = "'.$user['id'].'" or `act4` = "'.$user['id'].'" or `act5` = "'.$user['id'].'") ');
$pve_bot = mysql_fetch_array($pve_bot); // бот который выбран у меня как цель

$pve_user = mysql_query('SELECT * FROM `pve_zayavki` WHERE `user` = "'.$user['id'].'" ');
$pve_user = mysql_fetch_array($pve_user); // я в заявках


if($pve1['time'] > time() && $pve1['time_pve'] == 0) {
header('Location: '.$HOME.'pve/');
exit();
}
if($pve1['time'] > time() && $pve1['time_pve'] == 0) {
header('Location: '.$HOME.'pve/');
exit();
}
if($pve_user['kill'] == 1 or !$pve_user) {
header('Location: '.$HOME.'pve_log/');
exit();
}
























if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve` WHERE `act` = '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_ = mysql_query("SELECT * FROM `pve` WHERE `act` = '1' ORDER BY `time` ASC LIMIT $start,$max");
while($pve = mysql_fetch_assoc($pve_)){











if($pve['boy_vid'] == 2){
$OPONENT = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_zayavki` WHERE `user` = '".$pve_user['act']."' "));

$us_progg = round(100/( ($pve_user['h']*2) / $pve_user['h_'] ));
if($us_progg > 100){$us_progg = 100;}
$ank_progg = round(100/( ($OPONENT['h']*2) / $OPONENT['h_'] ));
if($ank_progg > 100){$ank_progg = 100;}

$sds = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `act` = '0' "),0);
$qwq  = rand(0,$sds); 
$sdsadsds = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `act` = '0' Limit $qwq, 1"; 
$dsdas = mysql_fetch_assoc(mysql_query($sdsadsds));
if($pve_user_koll == 1 ){
header('Location: '.$HOME.'pve_log/');
exit();
}




$count1212 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' "),0);
$m1212  = rand(0,$count1212); 
$query1212 = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' Limit $m1212, 1"; 
$rand_id1212 = mysql_fetch_assoc(mysql_query($query1212));

$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' Limit $m, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query));


if($rand_id1212 == 0 or $count1212 == 1){
$rand_id = $rand_id1;
}else{
$rand_id = $rand_id1212;
}
//echo ''.$rand_id['user'].'';

if($pve_user['act'] <= 0){
mysql_query("UPDATE `pve_zayavki` SET `act` = '".$rand_id['user']."' WHERE `id` = '".$pve_user['id']."' ");
}








if($pve_user['time_manevr'] > time() ){
$timer = time_last1($pve_user['time_manevr']);
$timers = '<font color=black>'.($timer).'</font>';
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>'.$pve['name'].'</b></span></li></ul></div>';
echo '<center><table style="width:95%" cellspacing="0" cellpadding="0"><tbody><tr>

<td style="vertical-align:top;width:50%;">
<center><img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <a href="?manevr/"><img src="/images/maneken/_'.$pve_user['rank'].''.$pve_user['rank'].''.$pve_user['rank'].'.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$us_progg.'%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>'.n_f($pve_user['h_']).'/'.n_f($pve_user['h']*2).'</font></center></div>


<center><a class="btni" style="min-width:160px;margin:4px;" href="?manevr/"><span><span>Маневр</span></span> '.$timers.'</a></center>
</td>';




if($OPONENT['id'] != 0){
echo '<td style="vertical-align:top;width:50%;">
<center><img width="20" height="20" src="/world/images/'.$OPONENT['rank'].'.png"> '.nick($OPONENT['user']).' <a href="?attack/"><img src="/images/maneken/'.$OPONENT['rank'].''.$OPONENT['rank'].''.$OPONENT['rank'].'.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$ank_progg.'%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>'.n_f($OPONENT['h_']).'/'.n_f($OPONENT['h']*2).'</font></center></div>
';



echo '<center><a class="btnii" style="min-width:160px;margin:4px;" href="?attack/"><span><span>Атаковать</span></span></a></center>';

?>

<html>
 
<head>
<style type="text/css">
    .progress_width{
        width: 160px;
        height: 10px;
        margin: 0 auto;
        border: 1px solid #000;
        color: #fff;
}
    #progressBar{
        width: 0;
        height: 10px;
        background-color: #f00;
}
</style>

	

<script type="text/javascript">
function progress(){
var i=0;
var width= document.getElementById('progressBar').parentNode.clientWidth;
var id=setInterval(grow, 20)

function grow(){
if(i<width){
i+=1;
if(!document.getElementById('progressBar').setAttribute("style","width: "+i+"px;"))
document.getElementById('progressBar').style.width = i;
}else{
}
}
}
</script>


</head>
<body onload="progress()">
<div class="" style="margin-top: 0px; position: relative;">
<div class="progress_width"><div id="progressBar"></div></div>
</div>
</body>

</html>
<?






echo '
</td></tr></tbody></table></center>';
}else{
echo '<td style="vertical-align:top;width:50%;">
<center> [СМЕНА ВРАГА] <a href="?"><img src="/images/maneken/000.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:100%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>0/0</font></center></div>

<center><a class="btni" style="min-width:160px;margin:4px;" href="?"><span><span>Обновить</span></span></a></center>
</td></tr></tbody></table></center>';
}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>В бою:</b> <img width="24" height="24" src="/images/avatars/1/on/1.png"> '.$pve_user_koll.'
</span></li></ul></div>';






if (empty($user['max'])) $user['max']=10;
$max = 15;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_log` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_log = mysql_query("SELECT * FROM `pve_log` WHERE `id`  ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
while($pve_l = mysql_fetch_assoc($pve_log)){
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span><span class="nobr"><font size=1>'.$pve_l['text'].'</font></span></span></span>
<span class="fr nobr"><font size=1>'.time_last($pve_l['time']).'</font></span><div class="cb"></div></div></div>';
} 








if(isset($_GET['manevr/'])){
if($pve_user['time_manevr'] < time()) {
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>Маневрирует</b>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_user['act']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_zayavki` SET `act` = '0' WHERE `user` = '".$pve_user['act']."' ");
mysql_query("UPDATE `pve_zayavki` SET `act` = '".$rand_id['user']."', `time_manevr`= '".($pve_user['time_manevr'] = (time()+8) )."' WHERE `id` = '".$pve_user['id']."' ");
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
header('Location: '.$HOME.'pve_boy/');
exit();
}
header('Location: '.$HOME.'pve_boy/');
exit();
}












if(isset($_GET['attack/'])){
if($pve_user['kill'] == 1) {
header('Location: '.$HOME.'pve_log/');
exit();
}

$count1212 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' "),0);
$m1212  = rand(0,$count1212); 
$query1212 = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' Limit $m1212, 1"; 
$rand_id1212 = mysql_fetch_assoc(mysql_query($query1212));

$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' Limit $m, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query));


if($rand_id1212 == 0 or $count1212 == 1){
$rand_id = $rand_id1;
}else{
$rand_id = $rand_id1212;
}
//echo ''.$rand_id['user'].'';

if($pve_user['act'] <= 0){
mysql_query("UPDATE `pve_zayavki` SET `act` = '".$rand_id['user']."' WHERE `id` = '".$pve_user['id']."' ");
}






if($pve_user['act'] != 0 and $pve_user_koll >= 1 ){
// что бы узнать наш урон, на необходимо узнать на сколько процентов броня противника сдержит наш удар
// что бы узнать на сколько процентов броня противника сдержит наш удар на необходимо узнать процент на сколько наш урон меньше брони противника
if($pve_user['u'] > $OPONENT['z']){
$raznica_userU_botZ = $pve_user['u']-$OPONENT['z']; // если мой удар больше брони противника
}else{
$raznica_userU_botZ = $OPONENT['z']-$pve_user['u']; // если мой удар меньше брони противника
}

if($pve_user['u'] < $OPONENT['z']){
$procent1 = ($raznica_userU_botZ/6)/10;
if($procent1 > 80){$procent = 80;}else{$procent = $procent1;}
$vrag_a1 = ceil($pve_user['u']/6)-((($pve_user['u']/6)*$procent)/100);
}else{
$vrag_a1 = ceil($pve_user['u']/6);
}


if($uron1 < 0){$uron1 = 0;}else{$uron1 = $vrag_a1;}// 0
if($pve_user['time_attack'] == (time()+5)){
$uron = 0;
}elseif($pve_user['time_attack'] == (time()+4)){
$uron = 0;
}elseif($pve_user['time_attack'] == (time()+3)){
$uron = 0;
}elseif($pve_user['time_attack'] == (time()+2)){
$uron = round($vrag_a1*40/100);
}elseif($pve_user['time_attack'] == (time()+1)){
$uron = round($vrag_a1*70/100);
}elseif($pve_user['time_attack'] == time()){
$uron = round($vrag_a1);
}elseif($pve_user['time_attack'] < time()){
$uron = round($vrag_a1);
}
if($uron < 0){$uron = 0;}else{$uron = $uron;}// 0


$where_rubin = $uron/25;




if($uron > 0){
if($uron >= $OPONENT['h_']){
$uron1 = $OPONENT['h_'];
$where_rubin1 = ceil($uron1/25);

if($OPONENT['points'] >= 1){

if($OPONENT['kill'] == 0 and $OPONENT['id'] != 0 and $pve_user['id'] != 0){
$text = '<img width="20" height="20" src="/world/images/'.$OPONENT['rank'].'.png"> '.nick($pve_user['act']).' <b>умер</b> <font color=red>+('.$where_rubin1.')</font>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_user['act']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_zayavki` SET `act`= '0', `where_rubin`= '".($pve_user['where_rubin']+$where_rubin1)."', `time_attack`= '".($pve_user['time_attack'] = (time()+5) )."', `uron`= '".($pve_user['uron'] + $uron1 )."' WHERE `id` = '".$pve_user['id']."' ");
//
$us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_user['user']."' "));
if($ank_us['rubin'] <= 1000000){
mysql_query("UPDATE `users` SET `rubin`= '".($us['rubin']+$where_rubin1)."' WHERE `id` = '".$us['id']."' ");
}
$ank_us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_user['act']."' "));
if($ank_us['rubin'] >= 1000000){
mysql_query("UPDATE `users` SET `rubin`= '".($ank_us['rubin']-$where_rubin1)."' WHERE `id` = '".$ank_us['id']."' ");
}
//
mysql_query("UPDATE `pve_zayavki` SET `kill`= '1', `act`= '0', `time_attack`= '0' WHERE `user` = '".$pve_user['act']."' ");
}else{
mysql_query("UPDATE `pve_zayavki` SET `act` = '0' WHERE `user` = '".$pve_user['act']."' ");
mysql_query("UPDATE `pve_zayavki` SET `act` = '".$rand_id['user']."', `time_manevr`= '".($pve_user['time_manevr'] = (time()+8) )."' WHERE `id` = '".$pve_user['id']."' ");
}

}else{

if($OPONENT['kill'] == 0 and $OPONENT['id'] != 0 and $pve_user['id'] != 0){
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>убил</b> <img width="20" height="20" src="/world/images/'.$OPONENT['rank'].'.png"> '.nick($pve_user['act']).' <font color=red>+('.$where_rubin1.')</font>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_user['act']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_zayavki` SET `where_rubin`= '".($pve_user['where_rubin']+$where_rubin1)."', `kill_bots`= '".($pve_user['kill_bots']+1)."', `act`= '0', `time_attack`= '".($pve_user['time_attack'] = (time()+5) )."', `uron`= '".($pve_user['uron'] + $uron1 )."' WHERE `id` = '".$pve_user['id']."' ");
//
$us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_user['user']."' "));
if($ank_us['rubin'] <= 1000000){
mysql_query("UPDATE `users` SET `rubin`= '".($us['rubin']+$where_rubin1)."' WHERE `id` = '".$us['id']."' ");
}
$ank_us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_user['act']."' "));
if($ank_us['rubin'] >= 1000000){
mysql_query("UPDATE `users` SET `rubin`= '".($ank_us['rubin']-$where_rubin1)."' WHERE `id` = '".$ank_us['id']."' ");
}
//
mysql_query("UPDATE `pve_zayavki` SET `kill`= '1', `act`= '0', `time_attack`= '0' WHERE `user` = '".$pve_user['act']."' ");
}else{
mysql_query("UPDATE `pve_zayavki` SET `act` = '0' WHERE `user` = '".$pve_user['act']."' ");
mysql_query("UPDATE `pve_zayavki` SET `act` = '".$rand_id['user']."', `time_manevr`= '".($pve_user['time_manevr'] = (time()+8) )."' WHERE `id` = '".$pve_user['id']."' ");
}

}

if($pve_user_koll == 2){
mysql_query("UPDATE `pve` SET `user`= '".$user['id']."' WHERE `act` = '1' ");
}
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>нанес</b> <font color=black>'.$uron.'</font> урона <img width="20" height="20" src="/world/images/'.$OPONENT['rank'].'.png"> '.nick($pve_user['act']).' <font color=red>+('.$where_rubin.')</font>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_user['act']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_zayavki` SET `where_rubin`= '".($pve_user['where_rubin']+$where_rubin)."', `h_` = '".($OPONENT['h_'] - $uron)."' WHERE `user` = '".$pve_user['act']."' ");
//
$us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_user['user']."' "));
if($ank_us['rubin'] <= 1000000){
mysql_query("UPDATE `users` SET `rubin`= '".($us['rubin']+$where_rubin1)."' WHERE `id` = '".$us['id']."' ");
}
$ank_us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_user['act']."' "));
if($ank_us['rubin'] >= 1000000){
mysql_query("UPDATE `users` SET `rubin`= '".($ank_us['rubin']-$where_rubin)."' WHERE `id` = '".$ank_us['id']."' ");
}
//
mysql_query("UPDATE `pve_zayavki` SET `time_attack`= '".($pve_user['time_attack'] = (time()+5) )."', `uron`= '".($pve_user['uron'] + $uron )."' WHERE `id` = '".$pve_user['id']."' ");
header('Location: '.$HOME.'pve_boy/');
exit();
}
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>Промахнулся</b>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_user['act']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_zayavki` SET `time_attack` = '".($pve_user['time_attack'] + 1 )."' WHERE `id` = '".$pve_user['id']."' ");
header("Location: ?");
exit();
}
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
header('Location: '.$HOME.'pve_boy/');
exit();
}
header('Location: '.$HOME.'pve_boy/');
exit();
}


















































































}else{


$us_progg = round(100/( ($pve_user['h']*2) / $pve_user['h_'] ));
if($us_progg > 100){$us_progg = 100;}
$ank_progg = round(100/( ($pve_bot['h']*2) / $pve_bot['h_'] ));
if($ank_progg > 100){$ank_progg = 100;}


$pve_bot_attack = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_bot` WHERE `id` = '".$pve_user['act']."'")); // мой противник
$pve_bot_attack1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_bot` WHERE `id` = '".$pve_bot_attack['id']."'")); // мой противник

$count1212 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') "),0);
$m1212  = rand(0,$count1212); 
$query1212 = "SELECT * FROM `pve_bot` WHERE `kill` = '0' and  (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') Limit $m1212, 1"; 
$rand_id1212 = mysql_fetch_assoc(mysql_query($query1212));

$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') Limit $m, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query));


if($rand_id1212 == 0 or $count1212 == 1){
$rand_id = $rand_id1;
}else{
$rand_id = $rand_id1212;
}





$jgjghjg = mysql_query("SELECT * FROM `pve_bot` WHERE `kill` = '0' and `act` != '0' and `act1` != '0' and `act2` != '0' and `act3` != '0' and `act4` != '0' and `act5` != '0' ");
$dfds = mysql_fetch_array ($jgjghjg);
do {
if($dfds['act'] != 0 and $dfds['act1'] != 0 and $dfds['act2'] != 0 and $dfds['act3'] != 0 and $dfds['act4'] != 0 and $dfds['act5'] != 0 ){
mysql_query("UPDATE `pve_bot` SET `act` = '0', `act1` = '0', `act2` = '0', `act3` = '0', `act4` = '0', `act5` = '0' WHERE `id` = '".$dfds['id']."' ");
}
} while ($dfds = mysql_fetch_array ($jgjghjg));

if($pve_user['act'] != 0 and $pve_bot['act'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act1'] != 0 and $pve_bot['act1'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act2'] != 0 and $pve_bot['act2'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act3'] != 0 and $pve_bot['act3'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act4'] != 0 and $pve_bot['act4'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act5'] != 0 and $pve_bot['act5'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}

$ewqewewqe = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '".$user['id']."' or `act1` = '".$user['id']."' or `act2` = '".$user['id']."' or `act3` = '".$user['id']."' or `act4` = '".$user['id']."' or `act5` = '".$user['id']."') "),0);
if($ewqewewqe <= 0){
if(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}
}

if($pve_user['act'] == 0 or $pve_bot_attack['kill'] == 1 ){ // если у меня нету противника (до пустим при старте сражения)
// присваеваем боту в поле act свой айди, что бы знать кто атакует бота, так же пишем через учловия, так как максимум могут бить 5 чел одного бота


if($pve_bot['act'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act1'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act2'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act3'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act4'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act5'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}
mysql_query("UPDATE `pve_zayavki` SET `act`= '".$rand_id['id']."' WHERE `id` = '".$pve_user['id']."' ");
}





$sds = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `act` = '0' "),0);
$qwq  = rand(0,$sds); 
$sdsadsds = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `act` = '0' Limit $qwq, 1"; 
$dsdas = mysql_fetch_assoc(mysql_query($sdsadsds));
//echo ''.$dsdas['user'].'';
if($pve_bot_koll <= 0 ){
header('Location: '.$HOME.'pve_log/');
exit();
}
if($pve_user_koll <= 0 ){
header('Location: '.$HOME.'pve_log/');
exit();
}











if($pve_user['time_manevr'] > time() ){
$timer = time_last1($pve_user['time_manevr']);
$timers = '<font color=black>'.($timer).'</font>';
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>'.$pve['name'].'</b></span></li></ul></div>';
echo '<center><table style="width:95%" cellspacing="0" cellpadding="0"><tbody><tr>

<td style="vertical-align:top;width:50%;">
<center><img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <a href="?manevr/"><img src="/images/maneken/_'.$pve_user['rank'].''.$pve_user['rank'].''.$pve_user['rank'].'.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$us_progg.'%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>'.n_f($pve_user['h_']).'/'.n_f($pve_user['h']*2).'</font></center></div>


<center><a class="btni" style="min-width:160px;margin:4px;" href="?manevr/"><span><span>Маневр</span></span> '.$timers.'</a></center>
</td>';




if($pve_bot['id'] != 0){
echo '<td style="vertical-align:top;width:50%;">
<center><img width="20" height="20" src="/world/images/'.$pve_bot['rank'].'.png"> <img width="24" height="24" alt="" title="" src="/world/images/pv.png"> <font color=black>Враг_</font>'.$pve_bot['id'].' <a href="?attack/"><img src="/images/maneken/'.$pve_bot['rank'].''.$pve_bot['rank'].''.$pve_bot['rank'].'.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$ank_progg.'%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>'.n_f($pve_bot['h_']).'/'.n_f($pve_bot['h']*2).'</font></center></div>
';







echo '<center><a class="btnii" style="min-width:160px;margin:4px;" href="?attack/"><span><span>Атаковать</span></span></a></center>';

?>

<html>
 
<head>
<style type="text/css">
    .progress_width{
        width: 160px;
        height: 10px;
        margin: 0 auto;
        border: 1px solid #000;
        color: #fff;
}
    #progressBar{
        width: 0;
        height: 10px;
        background-color: #f00;
}
</style>

	

<script type="text/javascript">
function progress(){
var i=0;
var width= document.getElementById('progressBar').parentNode.clientWidth;
var id=setInterval(grow, 20)

function grow(){
if(i<width){
i+=1;
if(!document.getElementById('progressBar').setAttribute("style","width: "+i+"px;"))
document.getElementById('progressBar').style.width = i;
}else{
}
}
}
</script>


</head>
<body onload="progress()">
<div class="" style="margin-top: 0px; position: relative;">
<div class="progress_width"><div id="progressBar"></div></div>
</div>
</body>

</html>
<?


echo '</td></tr></tbody></table></center>';
}else{
echo '<td style="vertical-align:top;width:50%;">
<center> [СМЕНА ВРАГА] <a href="?"><img src="/images/maneken/000.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:100%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>0/0</font></center></div>

<center><a class="btni" style="min-width:160px;margin:4px;" href="?"><span><span>Обновить</span></span></a></center>
</td></tr></tbody></table></center>';
}







echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<b>В бою:</b> <img width="24" height="24" src="/images/avatars/1/on/1.png"> '.$pve_user_koll.' / <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.$pve_bot_koll.'</font>
</span></li></ul></div>';






if (empty($user['max'])) $user['max']=10;
$max = 15;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_log` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$pve_log = mysql_query("SELECT * FROM `pve_log` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
while($pve_l = mysql_fetch_assoc($pve_log)){
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span><span class="nobr"><font size=1>'.$pve_l['text'].'</font></span></span></span>
<span class="fr nobr"><font size=1>'.time_last($pve_l['time']).'</font></span><div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';








if(isset($_GET['manevr/'])){
if($pve_user['time_manevr'] < time()) {
mysql_query("UPDATE `pve_bot` SET `act`= '0', `act1`= '0', `act2`= '0', `act3`= '0', `act4`= '0', `act5`= '0' WHERE `id` = '".$pve_user['act']."' ");
mysql_query("UPDATE `pve_zayavki` SET `act`= '0', `time_manevr`= '".($pve_user['time_manevr'] = (time()+8) )."' WHERE `id` = '".$pve_user['id']."' ");
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>Маневрирует</b>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_user['act']."',  `time` = '".time()."' ");
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
header('Location: '.$HOME.'pve_boy/');
exit();
}
header('Location: '.$HOME.'pve_boy/');
exit();
}














if(isset($_GET['attack/'])){
if($pve_user['kill'] == 1) {
header('Location: '.$HOME.'pve_log/');
exit();
}







$count1212 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') "),0);
$m1212  = rand(0,$count1212); 
$query1212 = "SELECT * FROM `pve_bot` WHERE `kill` = '0' and  (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') Limit $m1212, 1"; 
$rand_id1212 = mysql_fetch_assoc(mysql_query($query1212));

$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') Limit $m, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query));


if($rand_id1212 == 0 or $count1212 == 1){
$rand_id = $rand_id1;
}else{
$rand_id = $rand_id1212;
}





$jgjghjg = mysql_query("SELECT * FROM `pve_bot` WHERE `kill` = '0' and `act` != '0' and `act1` != '0' and `act2` != '0' and `act3` != '0' and `act4` != '0' and `act5` != '0' ");
$dfds = mysql_fetch_array ($jgjghjg);
do {
if($dfds['act'] != 0 and $dfds['act1'] != 0 and $dfds['act2'] != 0 and $dfds['act3'] != 0 and $dfds['act4'] != 0 and $dfds['act5'] != 0 ){
mysql_query("UPDATE `pve_bot` SET `act` = '0', `act1` = '0', `act2` = '0', `act3` = '0', `act4` = '0', `act5` = '0' WHERE `id` = '".$dfds['id']."' ");
}
} while ($dfds = mysql_fetch_array ($jgjghjg));

if($pve_user['act'] != 0 and $pve_bot['act'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act1'] != 0 and $pve_bot['act1'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act2'] != 0 and $pve_bot['act2'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act3'] != 0 and $pve_bot['act3'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act4'] != 0 and $pve_bot['act4'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act5'] != 0 and $pve_bot['act5'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}

$ewqewewqe = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '".$user['id']."' or `act1` = '".$user['id']."' or `act2` = '".$user['id']."' or `act3` = '".$user['id']."' or `act4` = '".$user['id']."' or `act5` = '".$user['id']."') "),0);
if($ewqewewqe <= 0){
if(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}
}

if($pve_user['act'] == 0 or $pve_bot_attack['kill'] == 1 ){ // если у меня нету противника (до пустим при старте сражения)
// присваеваем боту в поле act свой айди, что бы знать кто атакует бота, так же пишем через учловия, так как максимум могут бить 5 чел одного бота


if($pve_bot['act'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act1'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act2'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act3'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act4'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act5'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}
mysql_query("UPDATE `pve_zayavki` SET `act`= '".$rand_id['id']."' WHERE `id` = '".$pve_user['id']."' ");
}






if($pve_user != 0 and $pve_bot != 0 and $pve_bot_koll >= 0 ){
// что бы узнать наш урон, на необходимо узнать на сколько процентов броня противника сдержит наш удар
// что бы узнать на сколько процентов броня противника сдержит наш удар на необходимо узнать процент на сколько наш урон меньше брони противника
if($pve_user['u'] > $pve_bot['z']){
$raznica_userU_botZ = $pve_user['u']-$pve_bot['z']; // если мой удар больше брони противника
}else{
$raznica_userU_botZ = $pve_bot['z']-$pve_user['u']; // если мой удар меньше брони противника
}

if($pve_user['u'] < $pve_bot['z']){
$procent1 = ($raznica_userU_botZ/6)/10;
if($procent1 > 80){$procent = 80;}else{$procent = $procent1;}
$vrag_a1 = ceil($pve_user['u']/6)-((($pve_user['u']/6)*$procent)/100);
}else{
$vrag_a1 = ceil($pve_user['u']/6);
}



if($uron1 < 0){$uron1 = 0;}else{$uron1 = $vrag_a1;}// 0
if($pve_user['time_attack'] == (time()+5)){
$uron = 0;
}elseif($pve_user['time_attack'] == (time()+4)){
$uron = 0;
}elseif($pve_user['time_attack'] == (time()+3)){
$uron = 0;
}elseif($pve_user['time_attack'] == (time()+2)){
$uron = round($vrag_a1*40/100);
}elseif($pve_user['time_attack'] == (time()+1)){
$uron = round($vrag_a1*70/100);
}elseif($pve_user['time_attack'] == time()){
$uron = round($vrag_a1);
}elseif($pve_user['time_attack'] < time()){
$uron = round($vrag_a1);
}
if($uron < 0){$uron = 0;}else{$uron = $uron;}// 0



if($uron > 0){
if($uron >= $pve_bot['h_']){
$uron1 = $pve_bot['h_'];
if($pve_user['id'] != 0 and $pve_bot['id'] != 0  and $pve_bot['kill'] == 0 ){
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>убил</b> <img width="20" height="20" src="/world/images/'.$pve_bot['rank'].'.png"> <img width="20" height="20" alt="" title="" src="/world/images/pv.png"> <font color=black>Враг_</font>'.$pve_bot['id'].'';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_bot_attack['id']."', `time` = '".time()."' ");
mysql_query("UPDATE `pve_bot` SET `act` = '0', `act1` = '0', `act2` = '0', `act3` = '0', `act4` = '0', `act5` = '0', `h_` = '0', `user` = '".$user['id']."', `kill` = '1' WHERE `id` = '".$pve_bot_attack['id']."' ");
mysql_query("UPDATE `pve_zayavki` SET `kill_bots`= '".($pve_user['kill_bots']+1)."', `act`= '0', `time_attack`= '".($pve_user['time_attack'] = (time()+5) )."', `uron`= '".($pve_user['uron'] + $uron1 )."' WHERE `id` = '".$pve_user['id']."' ");
}else{
mysql_query("UPDATE `pve_bot` SET `act`= '0', `act1`= '0', `act2`= '0', `act3`= '0', `act4`= '0', `act5`= '0' WHERE `id` = '".$pve_user['act']."' ");
mysql_query("UPDATE `pve_zayavki` SET `act`= '0', `time_manevr`= '".($pve_user['time_manevr'] = (time()+8) )."' WHERE `id` = '".$pve_user['id']."' ");
}
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
if($pve_user['id'] != 0 and $pve_bot['id'] != 0 and $pve_bot['kill'] == 0 ){
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>нанес</b> <font color=black>'.$uron.'</font> урона <img width="20" height="20" src="/world/images/'.$pve_bot['rank'].'.png"> <img width="20" height="20" alt="" title="" src="/world/images/pv.png"> <font color=black>Враг_</font>'.$pve_bot['id'].'';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_bot_attack['id']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_bot` SET `h_` = '".($pve_bot['h_'] - $uron)."' WHERE `id` = '".$pve_bot['id']."' ");
mysql_query("UPDATE `pve_zayavki` SET `time_attack`= '".($pve_user['time_attack'] = (time()+5) )."', `uron`= '".($pve_user['uron'] + $uron )."' WHERE `id` = '".$pve_user['id']."' ");
}else{
mysql_query("UPDATE `pve_bot` SET `act`= '0', `act1`= '0', `act2`= '0', `act3`= '0', `act4`= '0', `act5`= '0' WHERE `id` = '".$pve_user['act']."' ");
mysql_query("UPDATE `pve_zayavki` SET `act`= '0', `time_manevr`= '".($pve_user['time_manevr'] = (time()+8) )."' WHERE `id` = '".$pve_user['id']."' ");
}
header('Location: '.$HOME.'pve_boy/');
exit();
}
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
if($pve_user != 0){
$text = '<img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' <b>Промахнулся</b>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_bot_attack['id']."',  `time` = '".time()."' ");
mysql_query("UPDATE `pve_zayavki` SET `time_attack` = '".($pve_user['time_attack'] + 1 )."' WHERE `id` = '".$pve_user['id']."' ");
}
header("Location: ?");
exit();
}

header('Location: '.$HOME.'pve_boy/');
exit();
}else{
header('Location: '.$HOME.'pve_boy/');
exit();
}
header('Location: '.$HOME.'pve_boy/');
exit();
}













if($pve_bot['id'] != 0 or $pve_user_koll <= 0 ) {

if($pve_bot['time_attack'] < time()){	//   бот наносит урон игроку, уничтожает игрока
if($pve_bot['kill'] == 0){

// что бы узнать наш урон, на необходимо узнать на сколько процентов броня противника сдержит наш удар
// что бы узнать на сколько процентов броня противника сдержит наш удар на необходимо узнать процент на сколько наш урон меньше брони противника
if($pve_bot['u'] > $pve_user['z']){
$raznica_userU_botZ = $pve_bot['u']-$pve_user['z']; // если мой удар больше брони противника
}else{
$raznica_userU_botZ = $pve_user['z']-$pve_bot['u']; // если мой удар меньше брони противника
}

if($pve_bot['u'] < $pve_user['z']){
$procent1 = ($raznica_userU_botZ/6)/10;
if($procent1 > 80){$procent = 80;}else{$procent = $procent1;}
$openent_uro = ceil($pve_bot['u']/6)-((($pve_bot['u']/6)*$procent)/100);
}else{
$openent_uro = ceil($pve_bot['u']/6);
}


$a = ($openent_uro*30/100);
$b = ($openent_uro*15/100);
$openent_uron = rand(ceil($openent_uro-$a), ceil($openent_uro-$b));

if($openent_uron >= $pve_user['h_']){

if($pve_bot_attack['act'] == $user['id']){
mysql_query("UPDATE `pve_bot` SET `time_attack` = '".($pve_bot_attack['time_attack'] = (time()+10))."', `act` = '0' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif($pve_bot_attack['act1'] == $user['id']){
mysql_query("UPDATE `pve_bot` SET `time_attack` = '".($pve_bot_attack['time_attack'] = (time()+10))."', `act1` = '0' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif($pve_bot_attack['act2'] == $user['id']){
mysql_query("UPDATE `pve_bot` SET `time_attack` = '".($pve_bot_attack['time_attack'] = (time()+10))."', `act2` = '0' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif($pve_bot_attack['act3'] == $user['id']){
mysql_query("UPDATE `pve_bot` SET `time_attack` = '".($pve_bot_attack['time_attack'] = (time()+10))."', `act3` = '0' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif($pve_bot_attack['act4'] == $user['id']){
mysql_query("UPDATE `pve_bot` SET `time_attack` = '".($pve_bot_attack['time_attack'] = (time()+10))."', `act4` = '0' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif($pve_bot_attack['act5'] == $user['id']){
mysql_query("UPDATE `pve_bot` SET `time_attack` = '".($pve_bot_attack['time_attack'] = (time()+10))."', `act5` = '0' WHERE `id` = '".$pve_bot_attack['id']."' ");
}

if($pve_user['user'] != 0) {
mysql_query("UPDATE `pve_zayavki` SET `kill` = '".($pve_user['kill'] = 1)."', `act` = '0' WHERE `id` = '".$pve_user['id']."' "); // юзер убит, убираем как цель 
$text = '<img width="20" height="20" src="/world/images/'.$pve_bot['rank'].'.png"> <img width="20" height="20" alt="" title="" src="/world/images/pv.png"> <font color=black>Враг_</font>'.$pve_bot['id'].' <b>убил</b> <img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' ';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_bot_attack['id']."',  `time` = '".time()."' ");
}
header('Location: '.$HOME.'pve_boy/');
exit();
}else{

if($openent_uron != 0){
mysql_query("UPDATE `pve_bot` SET `time_attack` = '".($pve_bot['time_attack'] = (time()+10))."' WHERE `id` = '".$pve_bot['id']."' ");
mysql_query("UPDATE `pve_zayavki` SET `h_` = '".($pve_user['h_'] - $openent_uron)."' WHERE `id` = '".$pve_user['id']."' ");
$text = '<img width="20" height="20" src="/world/images/'.$pve_bot_attack['rank'].'.png"> <img width="20" height="20" alt="" title="" src="/world/images/pv.png"> <font color=black>Враг_</font>'.$pve_bot_attack['id'].' <b>нанес</b> <font color=black>'.$openent_uron.'</font> урона <img width="20" height="20" src="/world/images/'.$pve_user['rank'].'.png"> '.nick($pve_user['user']).' ';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `user` = '".$pve_user['user']."', `act` = '".$pve_bot_attack['id']."',  `time` = '".time()."' ");
}
header('Location: '.$HOME.'pve_boy/');
exit();
}
}
}





if($pve_bot['time_manevr'] < time()){	//   бот маниврирует 
if($pve_bot_attack['id'] == 0){
header('Location: '.$HOME.'pve_boy/');
exit();
}else{
if($pve_bot['id']  != 0){
$rand_time = rand(5,10);
mysql_query("UPDATE `pve_bot` SET `time_manevr` = '".($pve_bot['time_manevr'] = (time()+$rand_time))."', `act` = '0', `act1` = '0', `act2` = '0', `act3` = '0', `act4` = '0', `act5` = '0' WHERE `id` = '".$pve_bot['id']."' limit 1");
mysql_query("UPDATE `pve_zayavki` SET `act` = '".$rand_id['id']."' WHERE `id` = '".$pve_user['id']."' ");
$text = '<img width="20" height="20" src="/world/images/'.$pve_bot['rank'].'.png">  <font color=black>Враг_</font>'.$pve_bot['id'].' <b>Маневрирует</b>';
mysql_query("INSERT INTO `pve_log` SET `text` = '".$text."', `act` = '".$pve_bot_attack['id']."',  `time` = '".time()."' ");
}
}
header('Location: '.$HOME.'pve_boy/');
exit();
}













}


}
}












































require_once ('../system/footer.php');
?>