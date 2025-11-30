<?php
$title = 'VIP';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
//if($user['id'] !=1 ) {
//$_SESSION['err'] = 'техработы';
//header('Location: /');
//exit();
//}

echo '<div class="content">
<a class="fl" href="'.$HOME.'garbage/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Шлюз" title="Шлюз"></a>
<a class="fr" href="'.$HOME.'user/calculation/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Расчет" title="Расчет"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';





if($user['vip_act'] == 0) {
echo '<div class="" style="margin-top: 8px; position: relative;"><center>
<a class="btni content" style="min-width:160px;margin:4px;"><span><span> <font color=grey>Множители</font> </span></span></a>
<a class="btni" style="min-width:160px;margin:4px;" href="?version_2"><span><span> Усиления </span></span></a>
</center></div>';
if(isset($_GET['version_2'])){mysql_query("UPDATE `users` SET `vip_act` = '1'  WHERE `id` = '".$user['id']."' ");header('Location: ?');exit();}
}else{
echo '<div class="" style="margin-top: 8px; position: relative;"><center>
<a class="btni" style="min-width:160px;margin:4px;" href="?version_1"><span><span> Множители </span></span></a>
<a class="btni content" style="min-width:160px;margin:4px;"><span><span> <font color=grey>Усиления</font> </span></span></a>
</center></div>';
if(isset($_GET['version_1'])){mysql_query("UPDATE `users` SET `vip_act` = '0'  WHERE `id` = '".$user['id']."' ");header('Location: ?');exit();}
}






if($user['vip_act'] == 0) {
















if($VIP_4['on'] == 0){
$cost_boy1 = 100;
$cost_boy2 = 450;
$cost_boy3 = 800;
$cost_boy4 = 1100;
$cost_boy5 = 5000;
$cost_boy6 = 9000;
}else{
$cost_boy1 = (100/2);
$cost_boy2 = (450/2);
$cost_boy3 = (800/2);
$cost_boy4 = (1100/2);
$cost_boy5 = (5000/2);
$cost_boy6 = (9000/2);
}


$mnogit_boy1 = 2;
$mnogit_boy2 = 5;
$mnogit_boy3 = 10;
$mnogit_boy4 = 2;
$mnogit_boy5 = 5;
$mnogit_boy6 = 10;

$time_boy1 = 3600;
$time_boy2 = 3600;
$time_boy3 = 3600;
$time_boy4 = 43200;
$time_boy5 = 43200;
$time_boy6 = 43200;

if($user['boy'] == 1){
$send1 = '<font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';
}else{
$send1 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.$cost_boy1.'</font>';
}
if($user['boy'] == 2){
$send2 = '<font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';
}else{
$send2 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.$cost_boy2.'</font>';
}
if($user['boy'] == 3){
$send3 = '<font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';
}else{
$send3 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.$cost_boy3.'</font>';
}
if($user['boy'] == 4){
$send4 = '<font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';
}else{
$send4 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.$cost_boy4.'</font>';
}
if($user['boy'] == 5){
$send5 = '<font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';
}else{
$send5 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.$cost_boy5.'</font>';
}
if($user['boy'] == 6){
$send6 = '<font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';
}else{
$send6 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.$cost_boy6.'</font>';
}





echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href=""><div class="menu-left"><a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 1ч</font></a> <a class="fr"><font size=2 color=white> x2 </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><img src="/images/VIP/shop1.png" width="50" height="50"><hr><a href="?boy1"> '.$send1.'</a></div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href=""><div class="menu-center"><a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 1ч</font></a> <a class="fr"><font size=2 color=white> x5 </font><img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><img src="/images/VIP/shop2.png" width="50" height="50"><hr><a href="?boy2"> '.$send2.'</a></div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href=""><div class="menu-right"><a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 1ч</font></a> <a class="fr"><font size=2 color=white> x10 </font><img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><img src="/images/VIP/shop3.png" width="50" height="50"><hr><a href="?boy3"> '.$send3.'</a></div>
</a></td>
</tr></tbody></table>';




echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href=""><div class="menu-left"><a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 12ч</font></a> <a class="fr"><font size=2 color=white> x2 </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><img src="/images/VIP/shop4.png" width="50" height="50"><hr><a href="?boy4"> '.$send4.'</a></div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href=""><div class="menu-center"><a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 12ч</font></a> <a class="fr"><font size=2 color=white> x5 </font><img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><img src="/images/VIP/shop5.png" width="50" height="50"><hr><a href="?boy5"> '.$send5.'</a></div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href=""><div class="menu-right"><a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 12ч</font></a> <a class="fr"><font size=2 color=white> x10 </font><img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><img src="/images/VIP/shop6.png" width="50" height="50"><hr><a href="?boy6"> '.$send6.'</a></div>
</a></td>
</tr></tbody></table>';





































if($user['mnogit_boy'] > 0 ){
	
	if($user['mnogit_boy'] < 50000){
#####################################################################################################################
$mn = 25000;
$mnogit_boy = ($mn-$user['mnogit_boy']);
$cost = ($mnogit_boy*2);
if($vip_mnogit){
$send_mn = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost).'</font>';
}
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 24ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop1.png" width="20%"><img src="/images/VIP/shop3.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn){
echo '<a href="?boy_1"> '.$send_mn.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn.'';
}
}
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn).'</tt></font>
</div></a></td>';
#####################################################################################################################
$mn1 = 50000;
$mnogit_boy1 = ($mn1-$user['mnogit_boy']);
$cost1 = ($mnogit_boy1*2);
if($vip_mnogit){
$send_mn1 = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn1 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost1).'</font>';
}
echo '<td style="vertical-align:top;width:50%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 24ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy1).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop4.png" width="20%"><img src="/images/VIP/shop6.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn1){
echo '<a href="?boy_2"> '.$send_mn1.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn1.'';
}
}
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn1).'</tt></font>
</div></a></td>
</tr></tbody></table>';
#####################################################################################################################
	}







#####################################################################################################################
$pokupka_1 = 100;
$mn3 = 100000;
$mnogit_boy3 = ($mn3-$user['mnogit_boy']);
$cost3 = ($mnogit_boy3*1);
if($vip_mnogit){
$send_mn3 = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn3 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost3).'</font>';
}
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 20ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy3).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop1.png" width="20%"><img src="/images/VIP/shop3.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn3){
echo '<a href="?boy_3"> '.$send_mn3.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn3.'';
}
}
if(!$vip_mnogit){
if($user['pokupka_1'] < $pokupka_1){
echo '<hr><font color=black size=1><tt>доступен для активации после пополнения на сумму <b>'.n_f($user['pokupka_1']).'/'.n_f($pokupka_1).'</b> руб.<br>
действует 1 раз</tt></font>';
}else{
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn3).'</tt></font>';
}
}
echo '</div></a></td>';
#####################################################################################################################
$pokupka_2 = 200;
$mn4 = 200000;
$mnogit_boy4 = ($mn4-$user['mnogit_boy']);
$cost4 = ($mnogit_boy4*1);
if($vip_mnogit){
$send_mn4 = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn4 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost4).'</font>';
}
echo '<td style="vertical-align:top;width:30%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 30ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy4).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop4.png" width="20%"><img src="/images/VIP/shop6.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn4){
echo '<a href="?boy_4"> '.$send_mn4.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn4.'';
}
}
if(!$vip_mnogit){
if($user['pokupka_1'] < $pokupka_2){
echo '<hr><font color=black size=1><tt>доступен для активации после пополнения на сумму <b>'.n_f($user['pokupka_1']).'/'.n_f($pokupka_2).'</b> руб.<br>
действует 1 раз</tt></font>';
}else{
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn4).'</tt></font>';
}
}
echo '</div></a></td>';
#####################################################################################################################
$pokupka_3 = 400;
$mn5 = 400000;
$mnogit_boy5 = ($mn5-$user['mnogit_boy']);
$cost5 = ($mnogit_boy5*1);
if($vip_mnogit){
$send_mn5 = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn5 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost5).'</font>';
}
echo '<td style="vertical-align:top;width:30%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 40ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy5).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop2.png" width="20%"><img src="/images/VIP/shop5.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn5){
echo '<a href="?boy_5"> '.$send_mn5.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn5.'';
}
}
if(!$vip_mnogit){
if($user['pokupka_1'] < $pokupka_2){
echo '<hr><font color=black size=1><tt>доступен для активации после пополнения на сумму <b>'.n_f($user['pokupka_1']).'/'.n_f($pokupka_3).'</b> руб.<br>
действует 1 раз</tt></font>';
}else{
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn5).'</tt></font>';
}
}
echo '</div></a></td>
</tr></tbody></table>';
#####################################################################################################################










#####################################################################################################################
$pokupka_10 = 600;
$mn10 = 600000;
$mnogit_boy10 = ($mn10-$user['mnogit_boy']);
$cost10 = ($mnogit_boy10*1);
if($vip_mnogit){
$send_mn10 = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn10 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost10).'</font>';
}
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 50ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy10).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop1.png" width="20%"><img src="/images/VIP/shop3.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn10){
echo '<a href="?boy_6"> '.$send_mn10.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn10.'';
}
}
if(!$vip_mnogit){
if($user['pokupka_1'] < $pokupka_10){
echo '<hr><font color=black size=1><tt>доступен для активации после пополнения на сумму <b>'.n_f($user['pokupka_1']).'/'.n_f($pokupka_10).'</b> руб.<br>
действует 1 раз</tt></font>';
}else{
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn10).'</tt></font>';
}
}
echo '</div></a></td>';
#####################################################################################################################
$pokupka_11 = 800;
$mn11 = 800000;
$mnogit_boy11 = ($mn11-$user['mnogit_boy']);
$cost11 = ($mnogit_boy11*1);
if($vip_mnogit){
$send_mn11 = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn11 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost11).'</font>';
}
echo '<td style="vertical-align:top;width:30%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 60ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy11).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop4.png" width="20%"><img src="/images/VIP/shop6.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn11){
echo '<a href="?boy_7"> '.$send_mn11.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn11.'';
}
}
if(!$vip_mnogit){
if($user['pokupka_1'] < $pokupka_11){
echo '<hr><font color=black size=1><tt>доступен для активации после пополнения на сумму <b>'.n_f($user['pokupka_1']).'/'.n_f($pokupka_11).'</b> руб.<br>
действует 1 раз</tt></font>';
}else{
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn11).'</tt></font>';
}
}
echo '</div></a></td>';
#####################################################################################################################
$pokupka_12 = 1000;
$mn12 = 1000000;
$mnogit_boy12 = ($mn12-$user['mnogit_boy']);
$cost12 = ($mnogit_boy12*1);
if($vip_mnogit){
$send_mn12 = '<font color=black size=2><span id="time_'.($vip_mnogit['time']-time()).'000">'._time($vip_mnogit['time']-time()).'</span></font>';
}else{
$send_mn12 = '<font size=2>Купить <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost12).'</font>';
}
echo '<td style="vertical-align:top;width:30%;">
<div class="menu-left">
<a class="fl"><img src="/images/clock.png" width="18" height="18"><font size=2 color=white> 70ч</font></a>
<a class="fr"><font size=2 color=white> x'.n_f($mnogit_boy12).' </font> <img src="/images/VIP/udvoitel.png" width="18" height="18"></a><br><br>
<img src="/images/VIP/shop2.png" width="20%"><img src="/images/VIP/shop5.png" width="20%">
<hr>';
if($user['mnogit_boy'] < $mn12){
echo '<a href="?boy_8"> '.$send_mn12.'</a>';
}else{
if($vip_mnogit){
echo ''.$send_mn12.'';
}
}
if(!$vip_mnogit){
if($user['pokupka_1'] < $pokupka_12){
echo '<hr><font color=black size=1><tt>доступен для активации после пополнения на сумму <b>'.n_f($user['pokupka_1']).'/'.n_f($pokupka_12).'</b> руб.<br>
действует 1 раз</tt></font>';
}else{
echo '<hr><font color=black size=1><tt>доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="15" height="15"> x'.n_f($mn12).'</tt></font>';
}
}
echo '</div></a></td>
</tr></tbody></table>';
#####################################################################################################################







#####################################################################################################################
if(isset($_GET['boy_1'])){
if($user['rubin'] < $cost){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy).'</b> на 1 день за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_1_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy_2'])){
if($user['rubin'] < $cost1){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn1){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn1).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy1).'</b> на 1 день за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost1).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_2_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy_3'])){
if($user['pokupka_1'] < $pokupka_1){header('Location: ?');exit();}
if($user['rubin'] < $cost3){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn3){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn3).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy3).'</b> на 20ч за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost3).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_3_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy_4'])){
if($user['pokupka_1'] < $pokupka_2){header('Location: ?');exit();}
if($user['rubin'] < $cost4){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn4){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn4).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy4).'</b> на 30ч за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost4).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_4_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy_5'])){
if($user['pokupka_1'] < $pokupka_3){header('Location: ?');exit();}
if($user['rubin'] < $cost5){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn5){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn5).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy5).'</b> на 40ч за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost5).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_5_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy_6'])){
if($user['pokupka_1'] < $pokupka_10){header('Location: ?');exit();}
if($user['rubin'] < $cost10){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn10){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn10).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy10).'</b> на 50ч за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost10).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_6_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy_7'])){
if($user['pokupka_1'] < $pokupka_11){header('Location: ?');exit();}
if($user['rubin'] < $cost11){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn11){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn11).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy11).'</b> на 60ч за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost11).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_7_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy_8'])){
if($user['pokupka_1'] < $pokupka_12){header('Location: ?');exit();}
if($user['rubin'] < $cost12){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn12){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn12).'!</font>';exit();}
$_SESSION['err'] = 'Вы уверены, что хотите активировать<br> Премиум-множитель <b>x'.n_f($mnogit_boy12).'</b> на 70ч за <img src="/images/ruby.png" width="18" height="18"> <font color=red>'.n_f($cost12).'</font> рубинов?
<div class="mt4"><a class="btni accept" href="?boy_8_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}



if(isset($_GET['boy_1_'])){
if($user['rubin'] < $cost){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `time` = '".(time()+86400)."', `mnogit_boy` = '".$mnogit_boy."' ");
mysql_query("UPDATE `users` SET `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy)."', `rubin` = '".($user['rubin']-$cost)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['boy_2_'])){
if($user['rubin'] < $cost1){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn1){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn1).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `mnogit_boy` = '".$mnogit_boy1."',  `time` = '".(time()+86400)."' ");
mysql_query("UPDATE `users` SET `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy1)."', `rubin` = '".($user['rubin']-$cost1)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['boy_3_'])){
if($user['pokupka_1'] < $pokupka_1){header('Location: ?');exit();}
if($user['rubin'] < $cost3){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn3){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn3).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `time` = '".(time()+(3600*20))."', `mnogit_boy` = '".$mnogit_boy3."' ");
mysql_query("UPDATE `users` SET `pokupka_1` = '".($user['pokupka_1']-$pokupka_1)."', `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy3)."', `rubin` = '".($user['rubin']-$cost3)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['boy_4_'])){
if($user['pokupka_1'] < $pokupka_2){header('Location: ?');exit();}
if($user['rubin'] < $cost4){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn4){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn4).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `mnogit_boy` = '".$mnogit_boy4."',  `time` = '".(time()+(3600*30))."' ");
mysql_query("UPDATE `users` SET `pokupka_1` = '".($user['pokupka_1']-$pokupka_2)."', `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy4)."', `rubin` = '".($user['rubin']-$cost4)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['boy_5_'])){
if($user['pokupka_1'] < $pokupka_3){header('Location: ?');exit();}
if($user['rubin'] < $cost5){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn5){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn5).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `mnogit_boy` = '".$mnogit_boy5."',  `time` = '".(time()+(3600*40))."' ");
mysql_query("UPDATE `users` SET `pokupka_1` = '".($user['pokupka_1']-$pokupka_3)."', `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy5)."', `rubin` = '".($user['rubin']-$cost5)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['boy_6_'])){
if($user['pokupka_1'] < $pokupka_10){header('Location: ?');exit();}
if($user['rubin'] < $cost10){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn10){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn10).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `mnogit_boy` = '".$mnogit_boy10."',  `time` = '".(time()+(3600*50))."' ");
mysql_query("UPDATE `users` SET `pokupka_1` = '".($user['pokupka_1']-$pokupka_10)."', `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy10)."', `rubin` = '".($user['rubin']-$cost10)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['boy_7_'])){
if($user['pokupka_1'] < $pokupka_11){header('Location: ?');exit();}
if($user['rubin'] < $cost11){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn11){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn11).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `mnogit_boy` = '".$mnogit_boy11."',  `time` = '".(time()+(3600*60))."' ");
mysql_query("UPDATE `users` SET `pokupka_1` = '".($user['pokupka_1']-$pokupka_11)."', `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy11)."', `rubin` = '".($user['rubin']-$cost11)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
if(isset($_GET['boy_8_'])){
if($user['pokupka_1'] < $pokupka_12){header('Location: ?');exit();}
if($user['rubin'] < $cost12){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
if($vip_mnogit){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Сначала должен истечь текущий Премиум-множитель!</font>';exit();}
if($user['mnogit_boy'] >= $mn12){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Премиум-множитель доступен для активации при наличии множителя меньше чем <img src="/images/VIP/udvoitel.png" width="18" height="18"> x'.n_f($mn12).'!</font>';exit();}
mysql_query("INSERT INTO `vip_mnogit` SET `user` = '".$user['id']."', `mnogit_boy` = '".$mnogit_boy12."',  `time` = '".(time()+(3600*70))."' ");
mysql_query("UPDATE `users` SET `pokupka_1` = '".($user['pokupka_1']-$pokupka_12)."', `mnogit_boy` = '".($user['mnogit_boy']+$mnogit_boy12)."', `rubin` = '".($user['rubin']-$cost12)."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}
#####################################################################################################################
































}






















echo '<font size=2><font color=black> <font size=3>•</font> Множитель дохода</font> - <b>временно повышает доход в сек.</b></font>';

if(isset($_GET['boy1'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy1) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy1 - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Хотите активировать множитель x'.$mnogit_boy1.' на '.($time_boy1/60/60).'ч ?
<div class="mt4"><a class="btni accept" href="?boy1_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy1_'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy1) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy1 - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 1 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_boy1) )."', `dohod_mnogit` = '".($user['dohod_mnogit'] * $mnogit_boy1)."', `mnogit_boy` = '".($user['mnogit_boy'] = $mnogit_boy1)."', `rubin` = '".($user['rubin']-$cost_boy1)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}



if(isset($_GET['boy2'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy2) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy2 - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Хотите активировать множитель x'.$mnogit_boy2.' на '.($time_boy2/60/60).'ч ?
<div class="mt4"><a class="btni accept" href="?boy2_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy2_'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy2) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy2 - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 2 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_boy2) )."', `dohod_mnogit` = '".($user['dohod_mnogit'] * $mnogit_boy2)."', `mnogit_boy` = '".($user['mnogit_boy'] = $mnogit_boy2)."', `rubin` = '".($user['rubin']-$cost_boy2)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}



if(isset($_GET['boy3'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy3) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy3 - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Хотите активировать множитель x'.$mnogit_boy3.' на '.($time_boy3/60/60).'ч ?
<div class="mt4"><a class="btni accept" href="?boy3_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy3_'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy3) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy3 - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 3 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_boy3) )."', `dohod_mnogit` = '".($user['dohod_mnogit'] * $mnogit_boy3)."', `mnogit_boy` = '".($user['mnogit_boy'] = $mnogit_boy3)."', `rubin` = '".($user['rubin']-$cost_boy3)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}



if(isset($_GET['boy4'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy4) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy4 - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Хотите активировать множитель x'.$mnogit_boy4.' на '.($time_boy4/60/60).'ч ?
<div class="mt4"><a class="btni accept" href="?boy4_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy4_'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy4) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy4 - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 4 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_boy4) )."', `dohod_mnogit` = '".($user['dohod_mnogit'] * $mnogit_boy4)."', `mnogit_boy` = '".($user['mnogit_boy'] = $mnogit_boy4)."', `rubin` = '".($user['rubin']-$cost_boy4)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}




if(isset($_GET['boy5'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy5) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy5 - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Хотите активировать множитель x'.$mnogit_boy5.' на '.($time_boy5/60/60).'ч ?
<div class="mt4"><a class="btni accept" href="?boy5_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy5_'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy5) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy5 - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 5 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_boy5) )."', `dohod_mnogit` = '".($user['dohod_mnogit'] * $mnogit_boy5)."', `mnogit_boy` = '".($user['mnogit_boy'] = $mnogit_boy5)."', `rubin` = '".($user['rubin']-$cost_boy5)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}





if(isset($_GET['boy6'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy6) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy6 - $user['rubin']).')</font>';exit();}
$_SESSION['err'] = 'Хотите активировать множитель x'.$mnogit_boy6.' на '.($time_boy6/60/60).'ч ?
<div class="mt4"><a class="btni accept" href="?boy6_"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
if(isset($_GET['boy6_'])){
if($user['time_boy'] > time()) {$_SESSION['err'] = 'Активация временного множителя будет доступна через: <font color=black size=2><span id="time_'.($user['time_boy']-time()).'000">'._time($user['time_boy']-time()).'</span></font>';header('Location: ?');exit();}
if($user['rubin'] < $cost_boy6) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов ('.($cost_boy6 - $user['rubin']).')</font>';exit();}
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 6 )."', `time_boy` = '".($user['time_boy'] = (time()+$time_boy6) )."', `dohod_mnogit` = '".($user['dohod_mnogit'] * $mnogit_boy6)."', `mnogit_boy` = '".($user['mnogit_boy'] = $mnogit_boy6)."', `rubin` = '".($user['rubin']-$cost_boy6)."'  WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}

































}else{


















































///###############################################################################################################################################
if(isset($_GET['activation_1/'])){
if($user['rubin'] < 1500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 1 день?
<div class="mt4"><a class="btni accept" href="?activation_1_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_7/'])){
if($user['rubin'] < 9900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 7 дней?
<div class="mt4"><a class="btni accept" href="?activation_7_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_14/'])){
if($user['rubin'] < 18900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 14 дней?
<div class="mt4"><a class="btni accept" href="?activation_14_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_30/'])){
if($user['rubin'] < 38200){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 30 дней?
<div class="mt4"><a class="btni accept" href="?activation_30_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

///#########################################

if(isset($_GET['activation_1_/'])){
if($VIP_1['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 1500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_1){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 86400)."', `VIP` = '1', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 1500)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 86400)."', `VIP` = '1', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 1500)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_7_/'])){
if($VIP_1['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 9900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_1){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 604800)."', `VIP` = '1', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 9900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 604800)."', `VIP` = '1', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 9900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_14_/'])){
if($VIP_1['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 18900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_1){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 1209600)."', `VIP` = '1', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 18900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 1209600)."', `VIP` = '1', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 18900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_30_/'])){
if($VIP_1['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 38200){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_1){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 2592000)."', `VIP` = '1', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 38200)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 2592000)."', `VIP` = '1', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 38200)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if($VIP_1['on'] == 1){
$activ = '<span id="time_'.($VIP_1['time']-time()).'000">'._time($VIP_1['time']-time()).'</span>';
$time = 'активно еще '.$activ.'';
}else{
$activ = 'Отключено';
$time = 'на выбор';
}

echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img src="/images/VIP/VIP_1.png" alt="" width="45" height="60" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ VIP Ангелы ☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$activ.'</span>
</div>';
echo '<span><font size=2 color=black>Действие:</font>
<font size=2 > Ускоряет прирост ангелов на 25% </font></span><br>';
echo '<span><font size=2 color=black>Время действия:</font>
<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.$time .' </font></span>';
if($VIP_1['on'] == 0){
echo '<hr><center><a class="btni" style="min-width:140px;margin:4px;" href="?activation_1/"><span> <span>(1 день)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 1,5к </span>
</span></span></a>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_7/"><span> <span>(7 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 9,9к </span>
</span></span></a><br>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_14/"><span> <span>(14 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 18,9к </span>
</span></span></a>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_30/"><span> <span>(30 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 38,2к </span>
</span></span></a></center>';
}
echo '</div>';
///###############################################################################################################################################














///###############################################################################################################################################
if(isset($_GET['activation_1_2/'])){
if($user['rubin'] < 1500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 1 день?
<div class="mt4"><a class="btni accept" href="?activation_1_2_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_7_2/'])){
if($user['rubin'] < 9900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 7 дней?
<div class="mt4"><a class="btni accept" href="?activation_7_2_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_14_2/'])){
if($user['rubin'] < 18900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 14 дней?
<div class="mt4"><a class="btni accept" href="?activation_14_2_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_30_2/'])){
if($user['rubin'] < 38200){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 30 дней?
<div class="mt4"><a class="btni accept" href="?activation_30_2_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

///#########################################

if(isset($_GET['activation_1_2_/'])){
if($VIP_2['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 1500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_2){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 86400)."', `VIP` = '2', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 1500)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 86400)."', `VIP` = '2', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 1500)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_7_2_/'])){
if($VIP_2['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 9900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_2){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 604800)."', `VIP` = '2', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 9900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 604800)."', `VIP` = '2', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 9900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_14_2_/'])){
if($VIP_2['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 18900){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_2){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 1209600)."', `VIP` = '2', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 18900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 1209600)."', `VIP` = '2', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 18900)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_30_2_/'])){
if($VIP_2['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 38200){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_2){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 2592000)."', `VIP` = '2', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 38200)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 2592000)."', `VIP` = '2', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 38200)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if($VIP_2['on'] == 1){
$activ = '<span id="time_'.($VIP_2['time']-time()).'000">'._time($VIP_2['time']-time()).'</span>';
$time = 'активно еще '.$activ.'';
}else{
$activ = 'Отключено';
$time = 'на выбор';
}


echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img src="/images/VIP/VIP_2.png" alt="" width="45" height="60" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ VIP Доход ☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$activ.'</span>
</div>';
echo '<span><font size=2 color=black>Действие:</font>
<font size=2 > Увеличивает весь Ваш доход на 25% </font></span><br>';
echo '<span><font size=2 color=black>Время действия:</font>
<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.$time .' </font></span>';
if($VIP_2['on'] == 0){
echo '<hr><center><a class="btni" style="min-width:140px;margin:4px;" href="?activation_1_2/"><span> <span>(1 день)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 1,5к </span>
</span></span></a>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_7_2/"><span> <span>(7 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 9,9к </span>
</span></span></a><br>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_14_2/"><span> <span>(14 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 18,9к </span>
</span></span></a>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_30_2/"><span> <span>(30 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 38,2к </span>
</span></span></a></center>';
}
echo '</div>';
///###############################################################################################################################################


























///###############################################################################################################################################
if(isset($_GET['activation_1_3/'])){
if($user['rubin'] < 500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 1 день?
<div class="mt4"><a class="btni accept" href="?activation_1_3_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_7_3/'])){
if($user['rubin'] < 3000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 7 дней?
<div class="mt4"><a class="btni accept" href="?activation_7_3_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_14_3/'])){
if($user['rubin'] < 6000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 14 дней?
<div class="mt4"><a class="btni accept" href="?activation_14_3_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}
///#########################################
if(isset($_GET['activation_30_3/'])){
if($user['rubin'] < 10000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 30 дней?
<div class="mt4"><a class="btni accept" href="?activation_30_3_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

///#########################################

if(isset($_GET['activation_1_3_/'])){
if($VIP_3['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_3){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 86400)."', `VIP` = '3', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 500)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 86400)."', `VIP` = '3', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 500)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_7_3_/'])){
if($VIP_3['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 3000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_3){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 604800)."', `VIP` = '3', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 3000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 604800)."', `VIP` = '3', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 3000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_14_3_/'])){
if($VIP_3['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 6000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_3){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 1209600)."', `VIP` = '3', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 6000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 1209600)."', `VIP` = '3', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 6000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if(isset($_GET['activation_30_3_/'])){
if($VIP_3['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 10000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if(!$VIP_3){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 2592000)."', `VIP` = '3', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 10000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 2592000)."', `VIP` = '3', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 10000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################

if($VIP_3['on'] == 1){
$activ = '<span id="time_'.($VIP_3['time']-time()).'000">'._time($VIP_3['time']-time()).'</span>';
$time = 'активно еще '.$activ.'';
}else{
$activ = 'Отключено';
$time = 'на выбор';
}


echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img src="/images/VIP/VIP_3.png" alt="" width="45" height="60" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ VIP Мусор ☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$activ.'</span>
</div>';
echo '<span><font size=2 color=black>Действие:</font>
<font size=2 > Сбор коллекций на 50% больше </font></span><br>';
echo '<span><font size=2 color=black>Время действия:</font>
<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.$time .' </font></span>';
if($VIP_3['on'] == 0){
echo '<hr><center><a class="btni" style="min-width:140px;margin:4px;" href="?activation_1_3/"><span> <span>(1 день)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 500 </span>
</span></span></a>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_7_3/"><span> <span>(7 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 3к </span>
</span></span></a><br>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_14_3/"><span> <span>(14 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 6к </span>
</span></span></a>';

echo '<a class="btni" style="min-width:140px;margin:4px;" href="?activation_30_3/"><span> <span>(30 дней)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 10к </span>
</span></span></a></center>';
}
echo '</div>';
///###############################################################################################################################################

























///###############################################################################################################################################
if(isset($_GET['activation_1_4/'])){
if($user['rubin'] < 500){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
$_SESSION['err'] = 'Вы уверены, что хотите активировать VIP усиление на 1 день?
<div class="mt4"><a class="btni accept" href="?activation_1_4_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header('Location: ?');
exit();
}

///#########################################

if(isset($_GET['activation_1_4_/'])){
if($VIP_4['on'] == 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['rubin'] < 20000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}
if($VIP_4['time_restart'] > time()){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if(!$VIP_4){
mysql_query("INSERT INTO `VIP` SET `user` = '".$user['id']."', `time` = '".(time() + 86400)."', `VIP` = '4', `on` = '1' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 20000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}else{
mysql_query("UPDATE `VIP` SET `time` = '".(time() + 86400)."', `VIP` = '4', `on` = '1' WHERE `user` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - 20000)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

header('Location: ?');
$_SESSION['err'] = 'Успешно!';
exit();
}

///#########################################


if($VIP_4['on'] == 1){
$activ = '<span id="time_'.($VIP_4['time']-time()).'000">'._time($VIP_4['time']-time()).'</span>';
$time = 'активно еще '.$activ.'';
}else{
$activ = 'Отключено';
if($VIP_4['time_restart'] > time()){
$time = 'Будет дуступно через: <span id="time_'.($VIP_4['time_restart']-time()).'000">'._time($VIP_4['time_restart']-time()).'</span>';
}else{
$time = '1 День';
}
}


echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img src="/images/VIP/VIP_4.png" alt="" width="45" height="60" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ VIP Цены ☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$activ.'</span>
</div>';
echo '<span><font size=2 color=black>Действие:</font>
<font size=2 > Цены на покупки за рубины ниже на 50% </font></span><br>';
echo '<span><font size=2 color=black>Время действия:</font>
<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.$time .' </font></span>';
if($VIP_4['time'] < time() and $VIP_4['time_restart'] < time()){
echo '<hr><center><a class="btni" style="min-width:140px;margin:4px;" href="?activation_1_4/"><span> <span>(1 день)</span></span><span><span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class="tred"> 20k </span>
</span></span></a>';
echo '</center>';
}
echo '</div>';
///###############################################################################################################################################
echo '<div class="content small minor">VIP действует на покупку: монет, коллекций, VIP сброс, смена ника и иконки.</div>';

































if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `premium` = '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$corp_prem = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT $start,$max");
while($c_p = mysql_fetch_assoc($corp_prem)){
$angel = ($c_p['angel']/2);
$us_cp_prem = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '".$user['corp']."' and `premium` > '0' "),0);
if($user['angel'] < ($angel/10) and $user['premium'] == 0 and $user['corp'] > 0 and $us_cp_prem == 0 and $premium['time_restart'] < time() ){
$notifikations4 = '<font color=red size=3>+</font>';
}
///###############################################################################################################################################
?>
<div id="pokazat4" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat4').style.display='none';document.getElementById('skryt4').style.display='';return false;"> <?=$notifikations4?> <img width="24" height="24" src="/images/arrow_down2.png"> Премиум ангелы <img width="24" height="24" src="/images/arrow_down2.png"> <?=$notifikations4?></a>
</div> 


<div id="skryt4"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt4').style.display='none';document.getElementById('pokazat4').style.display='';return false;"> <?=$notifikations4?> <img width="24" height="24" src="/images/arrow_up2.png"> Премиум ангелы <img width="24" height="24" src="/images/arrow_up2.png"> <?=$notifikations4?></a>
<p><?

///###############################################################################################################################################

if($user['premium'] != 0){
$activ = '<span id="time_'.($premium['time']-time()).'000">'._time($premium['time']-time()).'</span>';
}else{
if($premium['time_restart'] > time()){
$activ = '<span id="time_'.($premium['time_restart']-time()).'000">'._time($premium['time_restart']-time()).'</span>';
}else{
$activ = 'Отключено';
}
}




echo'<div class="bordered" style="margin-top: 4px; position: relative;">';

echo '<img src="/images/prem.png" alt="" width="45" height="50" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ Премиум ангелы ☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$activ.'</span>
</div>';
echo '<span><font size=2 color=black>Действие:</font>
<font size=2 > Повышает количество Ваших ангелов</font></span><br>';
echo '<span><font size=2 color=black>Время действия:</font>
<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> на выбор. </font></span>';


if(isset($_REQUEST['ok'])){
$prem = strong($_POST['premium']);



if($promotions['promotion_11'] == 1){


if($prem == 1){
$rub = 100000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_angel = ($angel);
$times_prem = 18000;}

if($prem == 2){
$rub = 50000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_angel = ($angel/5);
$times_prem = 14400;}

if($prem == 3){
$rub = 10000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_angel = ($angel/10);
$times_prem = 10800;}

if($prem == 4){
$rub = 5000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_angel = ($angel/20);
$times_prem = 7200;}

if($prem == 5){
$rub = 3000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_angel = ($angel/40);
$times_prem = 3600;}

if($prem == 6){
$rub = 2000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_angel = ($angel/80);
$times_prem = 3600;}

if($prem == 7){
$rub = 1000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_angel = ($angel/160);
$times_prem = 3600;}


}else{

if($prem == 1){
$rubin_ = 100000;
$premium_angel = ($angel);
$times_prem = 18000;}

if($prem == 2){
$rubin_ = 50000;
$premium_angel = ($angel/5);
$times_prem = 14400;}

if($prem == 3){
$rubin_ = 10000;
$premium_angel = ($angel/10);
$times_prem = 10800;}

if($prem == 4){
$rubin_ = 5000;
$premium_angel = ($angel/20);
$times_prem = 7200;}

if($prem == 5){
$rubin_ = 3000;
$premium_angel = ($angel/40);
$times_prem = 3600;}

if($prem == 6){
$rubin_ = 2000;
$premium_angel = ($angel/80);
$times_prem = 3600;}

if($prem == 7){
$rubin_ = 1000;
$premium_angel = ($angel/160);
$times_prem = 3600;}

}


$rubin = $rubin_;


if($prem <= 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['angel'] > ($angel/2)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Премиум можно активировать имея ангелов не больше чем '.n_f($angel/2).' </font>';
exit();
}
if($user['premium'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Премиум уже активирован </font>';
exit();
}
if($user['corp'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Необходимо вступить в корпорацию! </font>';
exit();
}
if($us_cp_prem != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Возможно кто то из Вашей Кп уже активировал премиум, попробуйте позже.</font>';
exit();
}
if($premium['time_restart'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Временно не доступно</font>';
exit();
}
if($user['rubin'] < $rubin ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}


$text = '<b>Премиум</b> активирован, было ангелов '.n_f($user['angel']).', начислено + '.n_f($premium_angel).' ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("INSERT INTO `premium` SET `time` = '".(time()+$times_prem)."', `user` = '".$user['id']."', `premium` = '".$prem."', `angel` = '".$user['angel']."', `premium_angel` = '".$premium_angel."' ");
mysql_query("UPDATE `users` SET `ass_br` = '".($user['ass_br'] + 1)."', `premium` = '".$prem."', `angel` = '".($user['angel'] + $premium_angel)."', `rubin` = '".($user['rubin'] - $rubin)."' WHERE `id` = '".$user['id']."'");
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel'] + $premium_angel)."' WHERE `id` = '".$corp['id']."'");

$msg = '<b>Премиум</b> Активирован на '.($times_prem/3600).'ч.';
mysql_query("INSERT INTO `ass_br` SET `msg` = '".$msg."', `avtor` = '".$user['id']."', `clan_id` = '".$user['corp']."', `time` = '".time()."'");

header('Location: ?');
$_SESSION['err'] = 'Премиум активирован на '.($times_prem/3600).'ч.';
exit();
}










if($promotions['promotion_11'] == 1){



$rub1 = 100000;
$rubi1 = (($rub1*$promotions['act_11'])/100); 
$rubin1_ = ($rub1-$rubi1); 
$rubin1 = $rubin1_;
$premium_angel1 = ($angel);
$times_prem1 = 18000;

$rub2 = 50000;
$rubi2 = (($rub2*$promotions['act_11'])/100); 
$rubin2_ = ($rub2-$rubi2); 
$rubin2 = $rubin2_;
$premium_angel2 = ($angel/5);
$times_prem2 = 14400;

$rub3 = 10000;
$rubi3 = (($rub3*$promotions['act_11'])/100); 
$rubin3_ = ($rub3-$rubi3); 
$rubin3 = $rubin3_;
$premium_angel3 = ($angel/10);
$times_prem3 = 10800;

$rub4 = 5000;
$rubi4 = (($rub4*$promotions['act_11'])/100); 
$rubin4_ = ($rub4-$rubi4); 
$rubin4 = $rubin4_;
$premium_angel4 = ($angel/20);
$times_prem4 = 7200;

$rub5 = 3000;
$rubi5 = (($rub5*$promotions['act_11'])/100); 
$rubin5_ = ($rub5-$rubi5); 
$rubin5 = $rubin5_;
$premium_angel5 = ($angel/40);
$times_prem5 = 3600;

$rub6 = 2000;
$rubi6 = (($rub6*$promotions['act_11'])/100); 
$rubin6_ = ($rub6-$rubi6); 
$rubin6 = $rubin6_;
$premium_angel6 = ($angel/80);
$times_prem6 = 3600;

$rub7 = 1000;
$rubi7 = (($rub7*$promotions['act_11'])/100); 
$rubin7_ = ($rub7-$rubi7); 
$rubin7 = $rubin7_;
$premium_angel7 = ($angel/160);
$times_prem7 = 3600;


}else{


$rubin1_ = 100000;
$rubin1 = $rubin1_;
$premium_angel1 = ($angel);
$times_prem1 = 18000;

$rubin2_ = 50000;
$rubin2 = $rubin2_;
$premium_angel2 = ($angel/5);
$times_prem2 = 14400;

$rubin3_ = 10000;
$rubin3 = $rubin3_;
$premium_angel3 = ($angel/10);
$times_prem3 = 10800;

$rubin4_ = 5000;
$rubin4 = $rubin4_;
$premium_angel4 = ($angel/20);
$times_prem4 = 7200;

$rubin5_ = 3000;
$rubin5 = $rubin5_;
$premium_angel5 = ($angel/40);
$times_prem5 = 3600;

$rubin6_ = 2000;
$rubin6 = $rubin6_;
$premium_angel6 = ($angel/80);
$times_prem6 = 3600;

$rubin7_ = 1000;
$rubin7 = $rubin7_;
$premium_angel7 = ($angel/160);
$times_prem7 = 3600;

}



if($premium['premium'] == 0 and $premium['time_restart'] == 0 and $premium['time'] == 0 ){
echo '<hr><form action="" method="POST">
    <p><input name="premium" type="radio" value="1" checked> <img src="/images/angel48.png" alt="$" width="20" height="20">'.n_f($angel).' за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin1).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem1/3600).'ч. </font></p>
    <p><input name="premium" type="radio" value="2"> <img src="/images/angel48.png" alt="$" width="20" height="20">'.n_f($angel/5).' за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin2).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem2/3600).'ч. </font></p>
    <p><input name="premium" type="radio" value="3"> <img src="/images/angel48.png" alt="$" width="20" height="20">'.n_f($angel/10).' за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin3).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem3/3600).'ч. </font></p>
    <p><input name="premium" type="radio" value="4"> <img src="/images/angel48.png" alt="$" width="20" height="20">'.n_f($angel/20).' за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin4).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem4/3600).'ч. </font></p>
    <p><input name="premium" type="radio" value="5"> <img src="/images/angel48.png" alt="$" width="20" height="20">'.n_f($angel/40).' за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin5).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem5/3600).'ч. </font></p>
	<p><input name="premium" type="radio" value="6"> <img src="/images/angel48.png" alt="$" width="20" height="20">'.n_f($angel/80).' за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin6).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem6/3600).'ч. </font></p>
    <p><input name="premium" type="radio" value="7"> <img src="/images/angel48.png" alt="$" width="20" height="20">'.n_f($angel/160).' за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin7).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem7/3600).'ч. </font></p>
    <center><p><input type="submit" value="Активировать" name="ok" ></p></center>
</form>';
}



if($promotions['promotion_11'] == 1){
echo '<div class="bgcontent"><div class="content tred">
<div class="pt"><ul><li class="center">Акция: Скидка на Премиум '.$promotions['act_11'].'%</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_11'] - time()).'</span></div>
</div></div>';
}



echo '<br><font size=2><font color=black> <font size=3>•</font> Премиум </font> - <b>доступен для активации при наличии ангелов меньше чем <img src="/images/angel48.png" alt="$" width="20" height="20"> '.n_f($angel/2).'</b></font>';
echo '<br><font color=black> <font size=3>•</font></font><font size=2><b> Вступать в Корпорацию во время действия Премиума - </b><font color=black>запрещено.</font></font>';

echo '</div>';
///###############################################################################################################################################
?></p></div><?
///###############################################################################################################################################

}

















































if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `premium_musor` = '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$premium_musor_ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT $start,$max");
while($p_m = mysql_fetch_assoc($premium_musor_)){
$musor_proc = ($p_m['musor_proc']/2);
$us_premium_musor = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '".$user['soyz']."' and `premium_musor` > '0' "),0);
if($user['musor_proc'] < ($musor_proc/2) and $user['premium_musor'] == 0 and $user['soyz'] > 0 and $us_premium_musor == 0 or ($premium_musor['time_restart'] < time() and $premium_musor['time_restart'] >0) ){
$notifikations5 = '<font color=red size=3>+</font>';
}
///###############################################################################################################################################
?>
<div id="pokazat5" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat5').style.display='none';document.getElementById('skryt5').style.display='';return false;"> <?=$notifikations5?> <img width="24" height="24" src="/images/arrow_down2.png"> Премиум коллекции <img width="24" height="24" src="/images/arrow_down2.png"> <?=$notifikations5?></a>
</div> 


<div id="skryt5"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt5').style.display='none';document.getElementById('pokazat5').style.display='';return false;"> <?=$notifikations5?> <img width="24" height="24" src="/images/arrow_up2.png"> Премиум коллекции <img width="24" height="24" src="/images/arrow_up2.png"> <?=$notifikations5?></a>
<p><?

///###############################################################################################################################################

if($user['premium_musor'] > 0){
$activ1_ = '<span id="time_'.($premium_musor['time']-time()).'000">'._time($premium_musor['time']-time()).'</span>';
}else{
if($premium_musor['time_restart'] > time()){
$activ1_ = '<span id="time_'.($premium_musor['time_restart']-time()).'000">'._time($premium_musor['time_restart']-time()).'</span>';
}else{
$activ1_ = 'Отключено';
}
}




echo'<div class="bordered" style="margin-top: 4px; position: relative;">';

echo '<img src="/images/prem_musor.png" alt="" width="45" height="50" style="float:left;margin-right:3px;margin-top:3px;">';
echo '<div class="show350 tdbrown"><span>☆ Премиум коллекции☆</span></div>';
echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 100px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.$activ1_.'</span>
</div>';
echo '<span><font size=2 color=black>Действие:</font>
<font size=2 > Повышает количество Ваших коллекций</font></span><br>';
echo '<span><font size=2 color=black>Время действия:</font>
<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> на выбор. </font></span>';








if(isset($_REQUEST['ok_1'])){
$prem_m = strong($_POST['premium_musor']);

if($promotions['promotion_11'] == 1){

if($prem_m == 1){
$rub = 100000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_musor_proc = ($musor_proc);
$times_prem = 18000;
}
if($prem_m == 2){
$rub = 75000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_musor_proc = ($musor_proc/5);
$times_prem = 14400;
}
if($prem_m == 3){
$rub = 50000;
$rubi = (($rub*$promotions['act_11'])/100); 
$rubin_ = ($rub-$rubi); 
$premium_musor_proc = ($musor_proc/10);
$times_prem = 10800;
}

}else{

if($prem_m == 1){
$rub = 100000;
$rubin_ = $rub; 
$premium_musor_proc = ($musor_proc);
$times_prem = 18000;
}
if($prem_m == 2){
$rub = 75000;
$rubin_ = $rub; 
$premium_musor_proc = ($musor_proc/5);
$times_prem = 14400;
}
if($prem_m == 3){
$rub = 50000;
$rubin_ = $rub; 
$premium_musor_proc = ($musor_proc/10);
$times_prem = 10800;
}

}
$rubin = $rubin_*1;




if($prem_m <= 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}
if($user['musor_proc'] > ($musor_proc/2)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Премиум можно активировать имея коллекций не больше чем '.n_f($musor_proc/2).' </font>';
exit();
}
if($user['premium_musor'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Премиум уже активирован </font>';
exit();
}
if($premium_musor['premium_musor'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Премиум уже активирован </font>';
exit();
}
if($user['soyz'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Необходимо вступить в Союз! </font>';
exit();
}
if($us_premium_musor != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Возможно кто то из Вашего Союза уже активировал премиум, попробуйте позже.</font>';
exit();
}
if($premium_musor['time_restart'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Временно не доступно</font>';
exit();
}
if($user['rubin'] < $rubin ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
exit();
}

if($premium_musor['premium_musor'] == 0){
$text = '<b>Премиум</b> активирован, было коллекций '.n_f($user['musor_proc']).'%, начислено + '.n_f($premium_musor_proc).'% ';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("INSERT INTO `premium_musor` SET `time` = '".(time()+$times_prem)."', `user` = '".$user['id']."', `premium_musor` = '".$prem_m."', `musor_proc` = '".$user['musor_proc']."', `premium_musor_proc` = '".$premium_musor_proc."' ");
mysql_query("UPDATE `users` SET `soyz_ass` = '".($user['soyz_ass'] + 1)."', `premium_musor` = '".$prem_m."', `musor_proc` = '".($user['musor_proc'] + $premium_musor_proc)."', `rubin` = '".($user['rubin'] - $rubin)."' WHERE `id` = '".$user['id']."'");
mysql_query("UPDATE `soyz` SET `musor` = '".($soyz['musor'] + $premium_musor_proc)."' WHERE `id` = '".$soyz['id']."'");

$msg = '<b>Премиум</b> Активирован на '.($times_prem/3600).'ч.';
mysql_query("INSERT INTO `ass_soyz` SET `msg` = '".$msg."', `avtor` = '".$user['id']."', `clan_id` = '".$user['soyz']."', `time` = '".time()."'");
}
header('Location: ?');
$_SESSION['err'] = 'Премиум активирован на '.($times_prem/3600).'ч.';
exit();
}
















if($promotions['promotion_11'] == 1){
$rub1 = 100000;
$rubi1 = (($rub1*$promotions['act_11'])/100); 
$rubin1_1 = ($rub1-$rubi1)*1; 
$premium_musor_proc = ($musor_proc);
$times_prem = 18000;

$rub2 = 75000;
$rubi2 = (($rub2*$promotions['act_11'])/100); 
$rubin2_2 = ($rub2-$rubi2)*1; 
$premium_musor_proc = ($musor_proc/5);
$times_prem = 14400;

$rub3 = 50000;
$rubi3 = (($rub3*$promotions['act_11'])/100); 
$rubin3_3 = ($rub3-$rubi3)*1; 
$premium_musor_proc = ($musor_proc/10);
$times_prem = 10800;
}else{
$rub1_1 = 100000;
$rubin1_1 = ($rub1_1*1); 
$premium_musor_proc = ($musor_proc);
$times_prem = 18000;

$rub2 = 75000;
$rubin2_2 = ($rub2*1); 
$premium_musor_proc = ($musor_proc/5);
$times_prem = 14400;

$rub3 = 50000;
$rubin3_3 = ($rub3*1); 
$premium_musor_proc = ($musor_proc/10);
$times_prem = 10800;
}


if($premium_musor['premium_musor'] == 0 and $premium_musor['time_restart'] == 0 and $premium_musor['time'] == 0 ){
	echo '<hr><form action="" method="POST">
    <p><input name="premium_musor" type="radio" value="1" checked> <img src="/images/header/money_36.png" alt="$" width="20" height="20">'.n_f($musor_proc).'% за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin1_1).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem1/3600).'ч. </font></p>
    <p><input name="premium_musor" type="radio" value="2"> <img src="/images/header/money_36.png" alt="$" width="20" height="20">'.n_f($musor_proc/5).'% за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin2_2).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem2/3600).'ч. </font></p>
    <p><input name="premium_musor" type="radio" value="3"> <img src="/images/header/money_36.png" alt="$" width="20" height="20">'.n_f($musor_proc/10).'% за <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">'.n_f($rubin3_3).'<font size=2 > <img width="18" height="18" alt="Время" src="/images/clock.png" title="Время"> '.($times_prem3/3600).'ч. </font></p>
   <center><p><input type="submit" value="Активировать" name="ok_1" ></p></center>
</form>';
}



if($promotions['promotion_11'] == 1){
echo '<div class="bgcontent"><div class="content tred">
<div class="pt"><ul><li class="center">Акция: Скидка на Премиум '.$promotions['act_11'].'%</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_11'] - time()).'</span></div>
</div></div>';
}



echo '<br><font size=2><font color=black> <font size=3>•</font> Премиум </font> - <b>доступен для активации при наличии коллекций меньше чем <img src="/images/header/money_36.png" alt="$" width="20" height="20"> '.n_f($musor_proc/2).'%</b></font>';
echo '<br><font color=black> <font size=3>•</font></font><font size=2><b> Вступать в Союз во время действия Премиума - </b><font color=black>запрещено.</font></font>';

echo '</div>';
///###############################################################################################################################################
?></p></div><?
///###############################################################################################################################################

}












}







echo '<br><a class="btnl mt4" href="'.$HOME.'menu/">Вернуться</a>';

require_once ('../system/footer.php');
?>