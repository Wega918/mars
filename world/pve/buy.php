<?php
$title = 'Сражения';
//-----Подключаем функции-----//
require_once ('../../system/function.php');
//-----Подключаем вверх-----//
require_once ('../../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

$world_pve_bots = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve_bots` WHERE `user` = '".$user['id']."' ")); // заяки
$world_pve_bots_col = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `user` = '".$user['id']."' and `kill` = '0' "),0);
$world_pve_bots_col_ = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `user` = '".$user['id']."' "),0);
$world_pve = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve` WHERE `user` = '".$user['id']."' ")); // комната
$oponent = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve_bots` WHERE `id` = '".$world_pve['act']."'")); // мой противник
$world_pve_mission = mysql_fetch_assoc(mysql_query("SELECT * FROM `world_pve_mission` WHERE `user` = '".$user['id']."' ")); // миссия


if($world_pve_bots_col <= 0) {
mysql_query("UPDATE `world_pve` SET `pobeda` = '1' WHERE `id` = '".$world_pve['id']."' ");// победа боты убиты
header('Location: '.$HOME.'world/pve/');
exit();
}
if($world_pve['time'] < time() && $world_pve['time'] > 0) {
mysql_query("UPDATE `world_pve` SET `pobeda` = '2' WHERE `id` = '".$world_pve['id']."' ");// поражение вышло время
header('Location: '.$HOME.'world/pve/');
exit();
}
if($world_pve['h_'] <= 0) {
mysql_query("UPDATE `world_pve` SET `pobeda` = '3' WHERE `id` = '".$world_pve['id']."' ");// поражение игрока убили
header('Location: '.$HOME.'world/pve/');
exit();
}
if($world_pve['pobeda'] != 0 ) {
header('Location: '.$HOME.'world/pve/');
exit();
}







$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."' "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."'  Limit $m, 1"; 
$rand_id = mysql_fetch_assoc(mysql_query($query));

if($rand_id['id'] <= 0) {
$count1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."' "),0);
$m1  = rand(0,$count1); 
$query1 = "SELECT * FROM `world_pve_bots` WHERE `kill` = '0' and `user` = '".$user['id']."'  Limit $m1, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query1));
$rand_id = $rand_id1;
}
if($world_pve['act'] <= 0) {
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."' WHERE `id` = '".$world_pve['id']."' ");
}
if($oponent['id'] <= 0){
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."' WHERE `id` = '".$world_pve['id']."' ");
}
if($oponent['kill'] == 1) {
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."' WHERE `id` = '".$world_pve['id']."' ");
}
##############################################################################################################################################################################################











##############################################################################################################################################################################################


if($world_pve['time_manevr'] > time() ){
$time_manevr = '<font color=black><span id="time_'.($world_pve['time_manevr']-time()).'000">'._time($world_pve['time_manevr']-time()).'</span></font>';
}
if($world_pve['time_attack'] > time() ){
$time_attack = '<font color=black><span id="time_'.($world_pve['time_attack']-time()).'000">'._time($world_pve['time_attack']-time()).'</span></font>';
}


$us_progg = round(100/( ($world_pve['h']*2) / $world_pve['h_'] ));
if($us_progg > 100){$us_progg = 100;}
$ank_progg = round(100/( ($oponent['h']*2) / $oponent['h_'] ));
if($ank_progg > 100){$ank_progg = 100;}





echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b><span id="time_'.($world_pve['time']-time()).'000">'._time($world_pve['time']-time()).'</span></b></span></li></ul></div>';
echo '<center><table style="width:95%" cellspacing="0" cellpadding="0"><tbody><tr>

<td style="vertical-align:top;width:50%;">
<center><img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($user['id']).' <a href="?manevr"><img src="/images/maneken/_'.$user['rank'].''.$user['rank'].''.$user['rank'].'.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$us_progg.'%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>'.n_f($world_pve['h_']).'/'.n_f($world_pve['h']*2).'</font></center></div>

<center><a class="btni" style="min-width:160px;margin:4px;" href="?manevr"><span><span>Маневр</span></span> '.$time_manevr.'</a></center>
</td>';





echo '<td style="vertical-align:top;width:50%;">
<center><img width="20" height="20" src="/world/images/'.$oponent['rank'].'.png"> <img width="24" height="24" alt="" title="" src="/images/avatars/1/on/1.png"> БОТ-'.$oponent['id'].' <a href="?attack"><img src="/images/maneken/'.$oponent['rank'].''.$oponent['rank'].''.$oponent['rank'].'.png" alt="" style="width:90%; border-radius: 8px;"></a></center>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$ank_progg.'%;"></div></div>
<div class="bordered" style="margin-top: 4px; position: relative;"><center><font size=2 color=black>'.n_f($oponent['h_']).'/'.n_f($oponent['h']*2).'</font></center></div>';



echo '<center><a class="btnii" style="min-width:160px;margin:4px;" href="?attack"><span><span>Атаковать</span></span> '.$time_attack.'</a></center>';

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
var id=setInterval(grow, 24)

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
<body onload="progress()"><div class="" style="margin-top: 0px; position: relative;"><div class="progress_width"><div id="progressBar"></div></div></div></body>
</html>
<?



echo '</td></tr></tbody></table></center>';
##############################################################################################################################################################################################






if(isset($_GET['manevr'])){
if($world_pve['act'] <= 0) {
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."' WHERE `id` = '".$world_pve['id']."' ");
}
if($world_pve['time_manevr'] < time()) {
$text = '<img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($user['id']).' <b>Маневрирует</b>';
mysql_query("INSERT INTO `world_pve_log` SET `text` = '".$text."', `user` = '".$user['id']."', `time` = '".time()."' ");
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."', `time_manevr` = '".(time()+10)."' WHERE `id` = '".$world_pve['id']."' ");
header('Location: ?');
exit();
}else{
header('Location: ?');
exit();
}
header('Location: ?');
exit();
}







####################################################################################################################################################################################
if(isset($_GET['attack'])){
if($world_pve['act'] <= 0) {
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."' WHERE `id` = '".$world_pve['id']."' ");
}
##########################################################################################
if($world_pve['u'] > $oponent['z']){
$raznica_userU_botZ = $world_pve['u']-$oponent['z']; // если мой удар больше брони противника
}else{
$raznica_userU_botZ = $oponent['z']-$world_pve['u']; // если мой удар меньше брони противника
}

if($world_pve['u'] < $oponent['z']){
$procent1 = ($raznica_userU_botZ/6)/10;
if($procent1 > 80){$procent = 80;}else{$procent = $procent1;}
$vrag_a1 = ceil($world_pve['u']/6)-((($world_pve['u']/6)*$procent)/100);
}else{
$vrag_a1 = ceil($world_pve['u']/6);
}

if($uron1 < 0){$uron1 = 0;}else{$uron1 = $vrag_a1;}// 0
if($world_pve['time_attack'] == (time()+5)){
$uron = 0;
}elseif($world_pve['time_attack'] == (time()+4)){
$uron = 0;
}elseif($world_pve['time_attack'] == (time()+3)){
$uron = round($vrag_a1*25/100);
}elseif($world_pve['time_attack'] == (time()+2)){
$uron = round($vrag_a1*50/100);
}elseif($world_pve['time_attack'] == (time()+1)){
$uron = round($vrag_a1*75/100);
}elseif($world_pve['time_attack'] == time()){
$uron = round($vrag_a1);
}elseif($world_pve['time_attack'] < time()){
$uron = round($vrag_a1);
}
if($uron < 0){$uron = 0;}else{$uron = $uron;}// 0
if($uron >= $oponent['h_']){$uron = $oponent['h_'];}else{$uron = $uron;}// 0
##########################################################################################


if($world_pve['act']>0){
if($uron >= $oponent['h_']){
$text = '<img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($world_pve['user']).' <b>нанес</b> <font color=black>'.$uron.'</font> урона <img width="20" height="20" src="/world/images/'.$oponent['rank'].'.png"> <B>БОТ-'.$world_pve['act'].'</B> <font size=2 color=black>| УБИТ</font>';
}else{
$text = '<img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($world_pve['user']).' <b>нанес</b> <font color=black>'.$uron.'</font> урона <img width="20" height="20" src="/world/images/'.$oponent['rank'].'.png"> <B>БОТ-'.$world_pve['act'].'</B>';
}
mysql_query("INSERT INTO `world_pve_log` SET `text` = '".$text."', `user` = '".$world_pve['user']."', `time` = '".time()."' ");
}

if($uron >= $oponent['h_']){

if($oponent['id'] > 0){
mysql_query("UPDATE `world_pve_bots` SET `h_` = '".($oponent['h_']-$uron)."', `kill` = '1' WHERE `id` = '".$oponent['id']."' ");
mysql_query("UPDATE `world_pve` SET `act` = '".$rand_id['id']."', `my_kill` = '".($world_pve['my_kill']+1)."', `my_uron` = '".($world_pve['my_uron']+$uron)."', `time_attack` = '".(time()+5)."' WHERE `id` = '".$world_pve['id']."' ");

if(!$world_pve_mission) {
mysql_query("INSERT INTO `world_pve_mission` SET `prog` = '1', `user` = '".$user['id']."' ");
}else{
mysql_query("UPDATE `world_pve_mission` SET `prog` = '".($world_pve_mission['prog']+1)."' WHERE `id` = '".$world_pve_mission['id']."' ");
}
}

}else{
mysql_query("UPDATE `world_pve_bots` SET `h_` = '".($oponent['h_']-$uron)."' WHERE `id` = '".$oponent['id']."' ");
mysql_query("UPDATE `world_pve` SET `my_uron` = '".($world_pve['my_uron']+$uron)."', `time_attack` = '".(time()+5)."' WHERE `id` = '".$world_pve['id']."' ");
}

header('Location: ?');
exit();
}
####################################################################################################################################################################################



if($rand_id['id'] != 0){
if($rand_id['time_attack'] <= time()){
##########################################################################################
if($world_pve['u'] > $rand_id['z']){
$raznica_userU_botZ = $rand_id['u']-$world_pve['z']; // если мой удар больше брони противника
}else{
$raznica_userU_botZ = $world_pve['z']-$rand_id['u']; // если мой удар меньше брони противника
}
if($rand_id['u'] < $world_pve['z']){
$procent1 = ($raznica_userU_botZ/6)/10;
if($procent1 > 80){$procent = 80;}else{$procent = $procent1;}
$vrag_a1 = ceil($rand_id['u']/6)-((($rand_id['u']/6)*$procent)/100);
}else{
$vrag_a1 = ceil($rand_id['u']/6);
}
$uron = round($vrag_a1/2);
if($uron >= $world_pve['h_']){$uron = $world_pve['h_'];}else{$uron = $uron;}// 0
##########################################################################################


if($uron >= $world_pve['h_']){
$text = '<img width="20" height="20" src="/world/images/'.$rand_id['rank'].'.png"> БОТ-'.$rand_id['id'].' <b>нанес</b> <font color=black>'.$uron.'</font> урона <img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($world_pve['user']).' <font size=2 color=black>| УБИТ</font>';
}else{
$text = '<img width="20" height="20" src="/world/images/'.$rand_id['rank'].'.png"> БОТ-'.$rand_id['id'].' <b>нанес</b> <font color=black>'.$uron.'</font> урона <img width="20" height="20" src="/world/images/'.$user['rank'].'.png"> '.nick($world_pve['user']).'';
}

if($uron >= $world_pve['h_']){
mysql_query("UPDATE `world_pve` SET `h_` = '0'  WHERE `id` = '".$world_pve['id']."' ");
mysql_query("INSERT INTO `world_pve_log` SET `text` = '".$text."', `user` = '".$world_pve['user']."', `time` = '".time()."' ");
mysql_query("UPDATE `world_pve` SET `pobeda` = '3' WHERE `id` = '".$world_pve['id']."' ");// поражение игрока убили
}else{
mysql_query("UPDATE `world_pve` SET `h_` = '".($world_pve['h_']-$uron)."' WHERE `id` = '".$world_pve['id']."' ");
mysql_query("UPDATE `world_pve_bots` SET `time_attack` = '".(time()+10)."' WHERE `id` = '".$rand_id['id']."' ");
mysql_query("INSERT INTO `world_pve_log` SET `text` = '".$text."', `user` = '".$world_pve['user']."', `time` = '".time()."' ");
}


}
}





####################################################################################################################################################################################
















if (empty($user['max'])) $user['max']=10;
$max = 15;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `world_pve_log` WHERE `user` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$world_pve_log = mysql_query("SELECT * FROM `world_pve_log` WHERE `user` = '".$user['id']."' ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
Противников в бою: <b>'.$world_pve_bots_col.'/'.$world_pve_bots_col_.'</b><hr>';
while($pve_l = mysql_fetch_assoc($world_pve_log)){
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span><span class="nobr"><font size=1>'.$pve_l['text'].'</font></span></span></span>
<span class="fr nobr"><font size=1>'.time_last($pve_l['time']).'</font></span><div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';











require_once ('../../system/footer.php');
?>