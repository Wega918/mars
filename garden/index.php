<?php
$title = 'Мои грядки';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
require_once ('../garden/taimers1.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

echo '<div class="content">
<a class="fl" href="'.$HOME.'pve/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Сражения" title="Сражения"></a>
<a class="fr" href="'.$HOME.'bank/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Банк" title="Банк"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="?"><span>Грядки</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';


//#############################################################################################################################
$coll_garden_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_user` WHERE `user` = '".$user['id']."'"),0);
$garden_plant_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."'"),0);

$en_progress = round((($user['en']*100)/$user['en_max']));
if($en_progress > 100) {$en_progress = 100;}

$cost_garden = ($garden_plant_user*100+($garden_plant_user*10));



if(isset($_GET['shop'])){
if($user['rubin'] < $cost_garden){
$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <span>'.n_f($cost_garden-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="16" height="16" alt=""> Купить</a></div>';
header('Location: ?');
exit();
}
if($garden_plant_user >= 70){
$_SESSION['err'] = 'максимум 70 грядок.';
header('Location: ?');
exit();
}
mysql_query("INSERT INTO `garden_plant_user` SET `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_garden)."'  WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = 'Грядка №'.($garden_plant_user+1).' успешно куплена.';
header('Location: '.$HOME.'garden/');
exit();
}


if(isset($_GET['en_max'])){
if($user['rubin'] < (5*$user['en_max'])){
$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f((5*$user['en_max'])-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="16" height="16" alt=""> Купить</a></div>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `en` = '".$max_coll_en."', `rubin` = '".($user['rubin']-(5*$user['en_max']))."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<img src="/images/garden/energy.png" alt="$" width="24" height="24"> Энергия <span>+'.$user['en_max'].'</span> <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> Рубины <span>-'.n_f(5*$user['en_max']).'</span>
<br><a href="?en_max">Получить '.$user['en_max'].' энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.(5*$user['en_max']).'';
header('Location: ?');
exit();
}









$harvest_sum_ = mysql_result(mysql_query("SELECT SUM(harvest) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' ;"), 0);
$harvest_sum__ = mysql_result(mysql_query("SELECT SUM(level) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' ;"), 0);
$harvest_sum = $harvest_sum_+$harvest_sum__;
/*
if($user['id'] == 1 or $user['id'] == 3776){
echo 'сумма листьев со всех грядок без прокачки грядок '.$harvest_sum_.'<hr>
сумма листьев с прокачки грядок '.$harvest_sum__.'<hr>
общая листьев '.$harvest_sum.'<hr>';
}
*/

$kolll = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' "),0);
$cost_sbor = (7*$kolll);

if (empty($user['max'])) $user['max']=10;
$max = 70;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$knoppkas = mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' ORDER BY `id` desc LIMIT $start,$max");
while($dsdc = mysql_fetch_assoc($knoppkas)){
$nomer = $k_post++;
$garden_user__ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user` = '".$user['id']."' and `images`  = '".$dsdc['images']."'")); // грядка игрока

if($nomer==1){
if($garden_user__){
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?buy_"><span> Собрать <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> '.n_f($harvest_sum).' за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f($cost_sbor).'</span></a></center>';
}
}else{
}

if(isset($_GET['buy_'])){
if(!$garden_user__){
header('Location: ?');
exit();
}
if($user['rubin'] < $cost_sbor){
$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f($cost_sbor-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="16" height="16" alt=""> Купить</a></div>';
header('Location: ?');
exit();
}
if($user['en'] < $kolll){
$_SESSION['err'] = 'Вам не хватает <img src="/images/garden/energy.png" alt="$" width="24" height="24"> '.($kolll-$user['en']).' энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(5*$user['en_max']).'';
header('Location: ?');
exit();
}

mysql_query("UPDATE `garden_plant_user` SET `name` = '".$dsdc['name']."', `time` = '".(time()+$garden_user__['time'])."', `harvest` = '".$dsdc['harvest']."', `images` = '".$dsdc['images']."'  WHERE `id` = '".$dsdc['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_sbor)."', `en` = '".($user['en']-$kolll)."', `leaf` = '".($user['leaf']+$harvest_sum)."' WHERE `id` = '".$user['id']."' ");
if($mission_user_23['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_23['prog_']+1)."' WHERE `id` = '".$mission_user_23['id']."' ");
}
if($mission_user_25['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_25['prog_']+$kolll)."' WHERE `id` = '".$mission_user_25['id']."' ");
}

if($Achievements_user_22['prog'] < $Achievements_user_22['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_22['prog']+1)."' WHERE `id` = '".$Achievements_user_22['id']."' ");
}
if($Achievements_user_24['prog'] < $Achievements_user_24['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_24['prog']+$kolll)."' WHERE `id` = '".$Achievements_user_24['id']."' ");
}


$_SESSION['ok'] = '<img src="'.$HOME.'images/garden/leaf.png" alt="$" width="24" height="24"> +'.n_f($harvest_sum).' <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>-'.n_f($cost_sbor).'</span>';
header('Location: ?');
}

}





if (empty($user['max'])) $user['max']=10;
$max = 70;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$knoppka = mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user['id']."' ORDER BY `images` DESC LIMIT $start,$max");
while($dsd = mysql_fetch_assoc($knoppka)){
$nomer = $k_post++;
if($nomer==1){
$garden_user__ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user` = '".$user['id']."' and `images`  = '".$dsd['images']."' ")); // грядка игрока
if($garden_user__){
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?buy"><span>засадить <img width="24" height="24" src="/images/garden/a'.$garden_user__['images'].'.jpg" alt="'.$garden_user__['name'].'" title="'.$garden_user__['name'].'" style="border-radius: 15px;"> <font color=red>'.$garden_user__['name'].'</font> на все грядки</span></a></center>';
}
}else{
}
$garden_user___ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user`  = '".$user['id']."' and `images`  = '".$dsd['images']."'")); // грядка игрока



if(isset($_GET['buy'])){
//if($dsd['time'] < time() and $dsd['time'] > 0){
//$_SESSION['err'] = 'Соберите листочки со всех грядок.';
//header('Location: ?');
//exit();
//}
if(!$garden_user__){
header('Location: ?');
exit();
}

if($nomer==1){
mysql_query("UPDATE `garden_plant_user` SET `name` = '".$garden_user__['name']."', `time` = '".(time()+$garden_user__['time'])."', `harvest` = '".$garden_user__['harvest']."', `images` = '".$garden_user__['images']."'  WHERE `id` = '".$dsd['id']."' ");
}else{
mysql_query("UPDATE `garden_plant_user` SET `name` = '".$garden_user__['name']."', `time` = '".(time()+$garden_user__['time'])."', `harvest` = '".$garden_user__['harvest']."', `images` = '".$garden_user__['images']."'  WHERE `id` = '".$dsd['id']."' ");
}
header('Location: ?');
}




}









if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user['id']."' ORDER BY `id` desc LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$reyt = $k_post++;

if($r['time'] == 0){$img = 'dirt';$name = 'Пустая грядка';}else{$img = 'a'.$r['images'].'';$name = $r['name'];}

echo '<div class="mt4"><div class="bordered" style="margin-top: 4px; position: relative;">
<div class="small tbrown" style="position:absolute; top: 0; right: 0"><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$r['level'].'</span></div>
<div style="display: inline;" class="fl">
<a href="'.$HOME.'plantSelect/'.$r['id'].'/'.$page.'/"><img src="/images/garden/'.$img.'.jpg" alt="'.$name.'" title="'.$name.'" width="18%" style="float:left;margin-right:3px;margin-top:3px;"></a>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>'.$reyt.'</span>. <span class="unread">'.$name.'</span></b></span></div>';
$sbor = $r['harvest']+($r['level']-1);
if($r['time'] == 0){
echo '<div><span class="btni15px" style="margin-top:12px; min-width: 100px;">Сбор <img src="/images/garden/leaf.png" alt="$" width="20" height="20"> <span>0</span></span>';
}
if($r['time'] >= time()){
echo '<div><span class="btni15px" style="margin-top: 12px; min-width: 100px;"><img src="/images/clock.png" alt="$" width="20" height="20"> <span><span id="time_'.($r['time']-time()).'000">'._time($r['time']-time()).'</span></span></span>';
}
if($r['time'] < time() && $r['time'] > 0){
echo '<div><a class="btni15px" href="'.$HOME.'sbor/'.$r['id'].'/'.$page.'/" style="margin-top: 12px; min-width: 100px;">Сбор <img src="/images/garden/leaf.png" alt="$" width="20" height="20"> <span>'.n_f($sbor).'</span></a>';
}


$cost_level_ = (9+$r['level']*$r['level']- (($r['level']*$r['level'])/2) );
$cost_level = ceil($cost_level_);
if($r['level'] < 10000){
if($user['leaf'] >= $cost_level){
echo ' <a class="btni15px" href="'.$HOME.'level/'.$r['id'].'/'.$page.'/">x1<img src="/images/garden/leaf.png" alt="$" width="20" height="20"> <span>'.n_f($cost_level).'</span></a> ';
}else{
echo ' <span class="btni15px">x1<img src="/images/garden/leaf.png" alt="$" width="20" height="20"> <span>'.n_f($cost_level).'</span></a></span> ';
}
}


$cost_level_0 = (9+($r['level'])*($r['level'])- ((($r['level'])*($r['level']))/2) );
$cost_level_1 = (9+($r['level']+1)*($r['level']+1)- ((($r['level']+1)*($r['level']+1))/2) );
$cost_level_2 = (9+($r['level']+2)*($r['level']+2)- ((($r['level']+2)*($r['level']+2))/2) );
$cost_level_3 = (9+($r['level']+3)*($r['level']+3)- ((($r['level']+3)*($r['level']+3))/2) );
$cost_level_4 = (9+($r['level']+4)*($r['level']+4)- ((($r['level']+4)*($r['level']+4))/2) );
$cost_level_5 = (9+($r['level']+5)*($r['level']+5)- ((($r['level']+5)*($r['level']+5))/2) );
$cost_level_6 = (9+($r['level']+6)*($r['level']+6)- ((($r['level']+6)*($r['level']+6))/2) );
$cost_level_7 = (9+($r['level']+7)*($r['level']+7)- ((($r['level']+7)*($r['level']+7))/2) );
$cost_level_8 = (9+($r['level']+8)*($r['level']+8)- ((($r['level']+8)*($r['level']+8))/2) );
$cost_level_9 = (9+($r['level']+9)*($r['level']+9)- ((($r['level']+9)*($r['level']+9))/2) );
$cost_level_10 = (9+($r['level']+10)*($r['level']+10)- ((($r['level']+10)*($r['level']+10))/2) );
$cost_level_11 = (9+($r['level']+11)*($r['level']+11)- ((($r['level']+11)*($r['level']+11))/2) );
$cost_level_12 = (9+($r['level']+12)*($r['level']+12)- ((($r['level']+12)*($r['level']+12))/2) );
$cost_level_13 = (9+($r['level']+13)*($r['level']+13)- ((($r['level']+13)*($r['level']+13))/2) );
$cost_level_14 = (9+($r['level']+14)*($r['level']+14)- ((($r['level']+14)*($r['level']+14))/2) );
$cost_level_15 = (9+($r['level']+15)*($r['level']+15)- ((($r['level']+15)*($r['level']+15))/2) );
$cost_level_16 = (9+($r['level']+16)*($r['level']+16)- ((($r['level']+16)*($r['level']+16))/2) );
$cost_level_17 = (9+($r['level']+17)*($r['level']+17)- ((($r['level']+17)*($r['level']+17))/2) );
$cost_level_18 = (9+($r['level']+18)*($r['level']+18)- ((($r['level']+18)*($r['level']+18))/2) );
$cost_level_19 = (9+($r['level']+19)*($r['level']+19)- ((($r['level']+19)*($r['level']+19))/2) );
$cost_level_20 = (9+($r['level']+20)*($r['level']+20)- ((($r['level']+20)*($r['level']+20))/2) );
$cost_level_21 = (9+($r['level']+21)*($r['level']+21)- ((($r['level']+21)*($r['level']+21))/2) );
$cost_level_22 = (9+($r['level']+22)*($r['level']+22)- ((($r['level']+22)*($r['level']+22))/2) );
$cost_level_23 = (9+($r['level']+23)*($r['level']+23)- ((($r['level']+23)*($r['level']+23))/2) );
$cost_level_24 = (9+($r['level']+24)*($r['level']+24)- ((($r['level']+24)*($r['level']+24))/2) );
$cost_level_25 = (9+($r['level']+25)*($r['level']+25)- ((($r['level']+25)*($r['level']+25))/2) );
$cost_level_26 = (9+($r['level']+26)*($r['level']+26)- ((($r['level']+26)*($r['level']+26))/2) );
$cost_level_27 = (9+($r['level']+27)*($r['level']+27)- ((($r['level']+27)*($r['level']+27))/2) );
$cost_level_28 = (9+($r['level']+28)*($r['level']+28)- ((($r['level']+28)*($r['level']+28))/2) );
$cost_level_29 = (9+($r['level']+29)*($r['level']+29)- ((($r['level']+29)*($r['level']+29))/2) );
$cost_level_30 = (9+($r['level']+30)*($r['level']+30)- ((($r['level']+30)*($r['level']+30))/2) );
$cost_level_31 = (9+($r['level']+31)*($r['level']+31)- ((($r['level']+31)*($r['level']+31))/2) );
$cost_level_32 = (9+($r['level']+32)*($r['level']+32)- ((($r['level']+32)*($r['level']+32))/2) );
$cost_level_33 = (9+($r['level']+33)*($r['level']+33)- ((($r['level']+33)*($r['level']+33))/2) );
$cost_level_34 = (9+($r['level']+34)*($r['level']+34)- ((($r['level']+34)*($r['level']+34))/2) );
$cost_level_35 = (9+($r['level']+35)*($r['level']+35)- ((($r['level']+35)*($r['level']+35))/2) );
$cost_level_36 = (9+($r['level']+36)*($r['level']+36)- ((($r['level']+36)*($r['level']+36))/2) );
$cost_level_37 = (9+($r['level']+37)*($r['level']+37)- ((($r['level']+37)*($r['level']+37))/2) );
$cost_level_38 = (9+($r['level']+38)*($r['level']+38)- ((($r['level']+38)*($r['level']+38))/2) );
$cost_level_39 = (9+($r['level']+39)*($r['level']+39)- ((($r['level']+39)*($r['level']+39))/2) );
$cost_level_40 = (9+($r['level']+40)*($r['level']+40)- ((($r['level']+40)*($r['level']+40))/2) );
$cost_level_41 = (9+($r['level']+41)*($r['level']+41)- ((($r['level']+41)*($r['level']+41))/2) );
$cost_level_42 = (9+($r['level']+42)*($r['level']+42)- ((($r['level']+42)*($r['level']+42))/2) );
$cost_level_43 = (9+($r['level']+43)*($r['level']+43)- ((($r['level']+43)*($r['level']+43))/2) );
$cost_level_44 = (9+($r['level']+44)*($r['level']+44)- ((($r['level']+44)*($r['level']+44))/2) );
$cost_level_45 = (9+($r['level']+45)*($r['level']+45)- ((($r['level']+45)*($r['level']+45))/2) );
$cost_level_46 = (9+($r['level']+46)*($r['level']+46)- ((($r['level']+46)*($r['level']+46))/2) );
$cost_level_47 = (9+($r['level']+47)*($r['level']+47)- ((($r['level']+47)*($r['level']+47))/2) );
$cost_level_48 = (9+($r['level']+48)*($r['level']+48)- ((($r['level']+48)*($r['level']+48))/2) );
$cost_level_49 = (9+($r['level']+49)*($r['level']+49)- ((($r['level']+49)*($r['level']+49))/2) );
$cost_level_50 = (9+($r['level']+50)*($r['level']+50)- ((($r['level']+50)*($r['level']+50))/2) );
$cost_level_51 = (9+($r['level']+51)*($r['level']+51)- ((($r['level']+51)*($r['level']+51))/2) );
$cost_level_52 = (9+($r['level']+52)*($r['level']+52)- ((($r['level']+52)*($r['level']+52))/2) );
$cost_level_53 = (9+($r['level']+53)*($r['level']+53)- ((($r['level']+53)*($r['level']+53))/2) );
$cost_level_54 = (9+($r['level']+54)*($r['level']+54)- ((($r['level']+54)*($r['level']+54))/2) );
$cost_level_55 = (9+($r['level']+55)*($r['level']+55)- ((($r['level']+55)*($r['level']+55))/2) );
$cost_level_56 = (9+($r['level']+56)*($r['level']+56)- ((($r['level']+56)*($r['level']+56))/2) );
$cost_level_57 = (9+($r['level']+57)*($r['level']+57)- ((($r['level']+57)*($r['level']+57))/2) );
$cost_level_58 = (9+($r['level']+58)*($r['level']+58)- ((($r['level']+58)*($r['level']+58))/2) );
$cost_level_59 = (9+($r['level']+59)*($r['level']+59)- ((($r['level']+59)*($r['level']+59))/2) );
$cost_level_60 = (9+($r['level']+60)*($r['level']+60)- ((($r['level']+60)*($r['level']+60))/2) );
$cost_level_61 = (9+($r['level']+61)*($r['level']+61)- ((($r['level']+61)*($r['level']+61))/2) );
$cost_level_62 = (9+($r['level']+62)*($r['level']+62)- ((($r['level']+62)*($r['level']+62))/2) );
$cost_level_63 = (9+($r['level']+63)*($r['level']+63)- ((($r['level']+63)*($r['level']+63))/2) );
$cost_level_64 = (9+($r['level']+64)*($r['level']+64)- ((($r['level']+64)*($r['level']+64))/2) );
$cost_level_65 = (9+($r['level']+65)*($r['level']+65)- ((($r['level']+65)*($r['level']+65))/2) );
$cost_level_66 = (9+($r['level']+66)*($r['level']+66)- ((($r['level']+66)*($r['level']+66))/2) );
$cost_level_67 = (9+($r['level']+67)*($r['level']+67)- ((($r['level']+67)*($r['level']+67))/2) );
$cost_level_68 = (9+($r['level']+68)*($r['level']+68)- ((($r['level']+68)*($r['level']+68))/2) );
$cost_level_69 = (9+($r['level']+69)*($r['level']+69)- ((($r['level']+69)*($r['level']+69))/2) );
$cost_level_70 = (9+($r['level']+70)*($r['level']+70)- ((($r['level']+70)*($r['level']+70))/2) );
$cost_level_71 = (9+($r['level']+71)*($r['level']+71)- ((($r['level']+71)*($r['level']+71))/2) );
$cost_level_72 = (9+($r['level']+72)*($r['level']+72)- ((($r['level']+72)*($r['level']+72))/2) );
$cost_level_73 = (9+($r['level']+73)*($r['level']+73)- ((($r['level']+73)*($r['level']+73))/2) );
$cost_level_74 = (9+($r['level']+74)*($r['level']+74)- ((($r['level']+74)*($r['level']+74))/2) );
$cost_level_75 = (9+($r['level']+75)*($r['level']+75)- ((($r['level']+75)*($r['level']+75))/2) );
$cost_level_76 = (9+($r['level']+76)*($r['level']+76)- ((($r['level']+76)*($r['level']+76))/2) );
$cost_level_77 = (9+($r['level']+77)*($r['level']+77)- ((($r['level']+77)*($r['level']+77))/2) );
$cost_level_78 = (9+($r['level']+78)*($r['level']+78)- ((($r['level']+78)*($r['level']+78))/2) );
$cost_level_79 = (9+($r['level']+79)*($r['level']+79)- ((($r['level']+79)*($r['level']+79))/2) );
$cost_level_80 = (9+($r['level']+80)*($r['level']+80)- ((($r['level']+80)*($r['level']+80))/2) );
$cost_level_81 = (9+($r['level']+81)*($r['level']+81)- ((($r['level']+81)*($r['level']+81))/2) );
$cost_level_82 = (9+($r['level']+82)*($r['level']+82)- ((($r['level']+82)*($r['level']+82))/2) );
$cost_level_83 = (9+($r['level']+83)*($r['level']+83)- ((($r['level']+83)*($r['level']+83))/2) );
$cost_level_84 = (9+($r['level']+84)*($r['level']+84)- ((($r['level']+84)*($r['level']+84))/2) );
$cost_level_85 = (9+($r['level']+85)*($r['level']+85)- ((($r['level']+85)*($r['level']+85))/2) );
$cost_level_86 = (9+($r['level']+86)*($r['level']+87)- ((($r['level']+87)*($r['level']+87))/2) );
$cost_level_87 = (9+($r['level']+87)*($r['level']+87)- ((($r['level']+87)*($r['level']+87))/2) );
$cost_level_88 = (9+($r['level']+88)*($r['level']+88)- ((($r['level']+88)*($r['level']+88))/2) );
$cost_level_89 = (9+($r['level']+89)*($r['level']+89)- ((($r['level']+89)*($r['level']+89))/2) );
$cost_level_90 = (9+($r['level']+90)*($r['level']+90)- ((($r['level']+90)*($r['level']+90))/2) );
$cost_level_91 = (9+($r['level']+91)*($r['level']+91)- ((($r['level']+91)*($r['level']+91))/2) );
$cost_level_92 = (9+($r['level']+92)*($r['level']+92)- ((($r['level']+92)*($r['level']+92))/2) );
$cost_level_93 = (9+($r['level']+93)*($r['level']+93)- ((($r['level']+93)*($r['level']+93))/2) );
$cost_level_94 = (9+($r['level']+94)*($r['level']+94)- ((($r['level']+94)*($r['level']+94))/2) );
$cost_level_95 = (9+($r['level']+95)*($r['level']+95)- ((($r['level']+95)*($r['level']+95))/2) );
$cost_level_96 = (9+($r['level']+96)*($r['level']+96)- ((($r['level']+96)*($r['level']+96))/2) );
$cost_level_97 = (9+($r['level']+97)*($r['level']+97)- ((($r['level']+97)*($r['level']+97))/2) );
$cost_level_98 = (9+($r['level']+98)*($r['level']+98)- ((($r['level']+98)*($r['level']+98))/2) );
$cost_level_99 = (9+($r['level']+99)*($r['level']+99)- ((($r['level']+99)*($r['level']+99))/2) );
$cost_level_100 = (9+($r['level']+100)*($r['level']+100)- ((($r['level']+100)*($r['level']+100))/2) );
$cost_level_ = $cost_level_0+$cost_level_1+$cost_level_2+$cost_level_3+$cost_level_4+$cost_level_5+$cost_level_6+$cost_level_7+$cost_level_8+$cost_level_9+$cost_level_10+$cost_level_11+$cost_level_12+$cost_level_13+$cost_level_14+$cost_level_15+$cost_level_16+$cost_level_17+$cost_level_18+$cost_level_19+$cost_level_20+$cost_level_21+$cost_level_22+$cost_level_23+$cost_level_24+$cost_level_25+$cost_level_26+$cost_level_27+$cost_level_28+$cost_level_29+$cost_level_30+$cost_level_31+$cost_level_32+$cost_level_33+$cost_level_34+$cost_level_35+$cost_level_36+$cost_level_37+$cost_level_38+$cost_level_39+$cost_level_40+$cost_level_41+$cost_level_42+$cost_level_43+$cost_level_44+$cost_level_45+$cost_level_46+$cost_level_47+$cost_level_48+$cost_level_49+$cost_level_50+$cost_level_51+$cost_level_52+$cost_level_53+$cost_level_54+$cost_level_55+$cost_level_56+$cost_level_57+$cost_level_58+$cost_level_59+$cost_level_60+$cost_level_61+$cost_level_62+$cost_level_63+$cost_level_64+$cost_level_65+$cost_level_66+$cost_level_67+$cost_level_68+$cost_level_69+$cost_level_70+$cost_level_71+$cost_level_72+$cost_level_73+$cost_level_74+$cost_level_75+$cost_level_76+$cost_level_77+$cost_level_78+$cost_level_79+$cost_level_80+$cost_level_81+$cost_level_82+$cost_level_83+$cost_level_84+$cost_level_85+$cost_level_86+$cost_level_87+$cost_level_88+$cost_level_89+$cost_level_90+$cost_level_91+$cost_level_92+$cost_level_93+$cost_level_94+$cost_level_95+$cost_level_96+$cost_level_97+$cost_level_98+$cost_level_99+$cost_level_100;
$cost_level = ceil($cost_level_);

if($r['level'] < 10000){
if($user['leaf'] >= $cost_level){
echo ' <a class="btni15px" href="'.$HOME.'garden_x100/'.$r['id'].'/'.$page.'/">x100<img src="/images/garden/leaf.png" alt="$" width="20" height="20"> <span>'.n_f($cost_level).'</span></a> ';
}else{
echo ' <span class="btni15px">x100<img src="/images/garden/leaf.png" alt="$" width="20" height="20"> <span>'.n_f($cost_level).'</span></a> </span>';
}
}





echo '</div></div></div><div class="cb"></div></div>';
}
if ($k_page > 1) {
echo str(''.$HOME.'garden/?',$k_page,$page); // Вывод страниц
}









echo '<div class="center mt4 small"><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr>
<td style="width:17%;text-align:right;"><img src="/images/garden/energy.png" alt="$" width="16" height="16"><span>'.$user['en'].'</span>/<span>'.$user['en_max'].'</span></td>
<td style="width:70%;text-align:left;"><div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$en_progress.'%;"></div></div></td>
</tr></tbody></table></div>

<center>
<img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.n_f($user['leaf']).'</span>
<img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($user['rubin']).'</span>
</center>
';








$coll_garden_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_user` WHERE `user` = '".$user['id']."'"),0);
$coll_garden = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden` WHERE `id`  = '".($coll_garden_user+1)."' ")); // растения игрока
if($summ_proccc['images'] < 70){
if($user['leaf'] >= $coll_garden['cost']){
$folss = '<font color=red>(+)</font>';
}
}

if($user['management'] == 0){
$management = '<span style="color:#f90000;">(выкл)</span>';
}
if($user['management'] == 1){
$management = '<span style="color:#00f336;">('.$user['management_cost'].')</span>';
}


if($garden_plant_user < 70){
echo '<a class="btnl mt4" href="?shop">Купить грядку за <img src="/images/ruby.png" width="24" height="24"> <span class="tred">'.n_f($cost_garden).'</span></a>';
}
echo '<a class="btnl mt4" href="'.$HOME.'plantsManagement/">Помощь на грядках <span class="small">'.$management.'</span></a>';
echo '<a class="btnl mt4" href="'.$HOME.'gardenOffers/">Помощь садовникам</a>';
echo '<a class="btnl mt4" href="'.$HOME.'plantBuy/">Изучить растение <span>'.$folss.'</span></a>';








echo '<div class="content minor" style="margin-top: 4px;">
Сбор урожая приносит <img src="/images/garden/leaf.png" alt="$" width="24" height="24"> листочки.
Изучение новых растений забирает листочки.
Улучшение грядки увеличивает количество листочков при сборе.
</div></div>';

require_once ('../system/footer.php');
?>