<?php
require ('../system/function.php');
require ('../system/header.php');

//mysql_query("UPDATE `bot` SET `leaf` = '0', `en` = '0' WHERE `id` ");





$bot_where = mysql_query("SELECT * FROM `bot` WHERE `time` > '".(time())."' ");
while($m_where = mysql_fetch_assoc($bot_where)){
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$m_where['user']."'"));
$harvest_sum_ = mysql_result(mysql_query("SELECT SUM(harvest) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' ;"), 0);
$harvest_sum__ = mysql_result(mysql_query("SELECT SUM(level) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' ;"), 0);
$harvest_sum = $harvest_sum_+$harvest_sum__;
$kolll = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' "),0);
$cost_sbor = (7*$kolll);


$air_us = mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = ".$m_where['user']." and `time` < ".time()."  and `time` > '0' ");
while($u_a = mysql_fetch_assoc($air_us)){
$garden_user__ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user` = '".$user['id']."' and `images`  = '".$u_a['images']."'")); // грядка игрока
if($harvest_sum>0){
if($user['rubin'] >= $cost_sbor){
if($user['en'] >= $kolll){
if($m_where['bot']==1){$harvest_sum1 = ($harvest_sum);$timeee = $garden_user__['time'];}
if($m_where['bot']==2){$harvest_sum1 = ($harvest_sum);$timeee = $garden_user__['time']/2;}
if($m_where['bot']==3){$harvest_sum1 = ($harvest_sum*2);$timeee = $garden_user__['time']/2;}
mysql_query("UPDATE `garden_plant_user` SET `name` = '".$u_a['name']."', `time` = '".(time()+$timeee)."', `harvest` = '".$u_a['harvest']."', `images` = '".$u_a['images']."'  WHERE `id` = '".$u_a['id']."' ");



$mission_user_8 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$user['id'].'" and `number` > "35" and `number` <= "40" and `prog` < `prog_` ')); // собрано раз листики на Грядках
$mission_user_10 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$user['id'].'" and `number` > "45" and `number` <= "50" and `prog` < `prog_` ')); // потрачено Энергии на Грядках и помощь садовникам 
$mission_user_23 = mysql_fetch_array(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "1" and `number` = "23" ')); // потрачено Энергии на Грядках и помощь садовникам 
if($mission_user_10['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog` = '".($mission_user_10['prog']+$kolll)."' WHERE `id` = '".$mission_user_10['id']."' ");
}
if($mission_user_8['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog` = '".($mission_user_8['prog']+1)."' WHERE `id` = '".$mission_user_8['id']."' ");
}

if($mission_user_23['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog` = '".($mission_user_23['prog']+1)."' WHERE `id` = '".$mission_user_23['id']."' ");
}

echo ''.$mission_user_23['id'].' 1';


$nagrada_us = mysql_fetch_array(mysql_query('SELECT * FROM `nagrada_user` WHERE `user` = "'.$user['id'].'" and `number` = "4" and `prog` > `prog_` ')); // 
if($nagrada_us['prog'] > $nagrada_us['prog_']) {
mysql_query("UPDATE `nagrada_user` SET `prog_` = '".($nagrada_us['prog_']+$kolll)."' WHERE `id` = '".$nagrada_us['id']."' ");
}



}
}
}
}

if($m_where['bot']==3 and $user['en'] < $kolll and $user['en'] >= (5*$user['en_max'])){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-(5*$user['en_max']))."', `en` = '".($user['en_max'])."' WHERE `id` = '".$user['id']."' ");
}



if($harvest_sum>0){
if($user['rubin'] >= $cost_sbor){
if($user['en'] >= $kolll){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_sbor)."', `en` = '".($user['en']-$kolll)."', `leaf` = '".($user['leaf']+$harvest_sum1)."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `bot` SET `leaf` = '".($m_where['leaf']+$harvest_sum1)."', `en` = '".($m_where['en']-$kolll)."' WHERE `id` = '".$m_where['id']."' ");
}
}
}



}
?>