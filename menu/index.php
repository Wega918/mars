<?php
$title = 'Меню Пользователя';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}



if(!$Achievements_user){
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Миссии
$Ac_user = mysql_query("SELECT * FROM `Achievements` WHERE `id` ");
$a_uu = mysql_fetch_array ($Ac_user);
do {
$col_ah__ = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = ".$a_uu['id']." "),0);
if(!$col_ah__){
mysql_query("INSERT INTO `Achievements_user` SET `number`  = '".$a_uu['id']."', `user`  = '".$user['id']."', `prog_max` = '".$a_uu['prog']."', `text` = '".$a_uu['text']."' ");
}
} while ($a_uu = mysql_fetch_array ($Ac_user));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}


//if($user['id']==1){
//mysql_query('DELETE FROM `Achievements_user` WHERE `prog` = "0" ');
//}


$col_ah1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 1 "),0);
$col_ah2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 2 "),0);
$col_ah3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 3 "),0);
$col_ah4 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 4 "),0);
$col_ah5 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 5 "),0);
$col_ah6 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 6 "),0);
$col_ah7 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 7 "),0);
$col_ah8 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 8 "),0);
$col_ah9 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 9 "),0);
$col_ah10 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 10 "),0);
$col_ah11 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 11 "),0);
$col_ah12 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 12 "),0);
$col_ah13 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 13 "),0);
$col_ah14 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 14 "),0);
$col_ah15 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 15 "),0);
$col_ah16 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 16 "),0);
$col_ah17 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 17 "),0);
$col_ah18 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 18 "),0);
$col_ah19 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 19 "),0);
$col_ah20 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 20 "),0);
$col_ah21 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 21 "),0);
$col_ah22 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 22 "),0);
$col_ah23 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 23 "),0);
$col_ah24 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 24 "),0);
$col_ah25 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 25 "),0);
$col_ah26 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 26 "),0);
$col_ah27 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 27 "),0);
$col_ah28 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 28 "),0);
$col_ah29 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 29 "),0);
$col_ah30 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 30 "),0);
$col_ah31 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 31 "),0);
$col_ah32 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 32 "),0);
$col_ah33 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 33 "),0);
$col_ah34 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user`  = '".$user['id']."' and `number` = 34 "),0);


if($col_ah1>1){
$c_ah1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '1' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah1['id'].'" ');
}
if($col_ah2>1){
$c_ah2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '2' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah2['id'].'" ');
}
if($col_ah3>1){
$c_ah3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '3' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah3['id'].'" ');
}
if($col_ah4>1){
$c_ah4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '4' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah4['id'].'" ');
}
if($col_ah5>1){
$c_ah5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '5' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah5['id'].'" ');
}
if($col_ah6>1){
$c_ah6 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '6' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah6['id'].'" ');
}
if($col_ah7>1){
$c_ah7 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '7' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah7['id'].'" ');
}
if($col_ah8>1){
$c_ah8 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '8' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah8['id'].'" ');
}
if($col_ah9>1){
$c_ah9 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '9' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah9['id'].'" ');
}
if($col_ah10>1){
$c_ah10 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '10' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah10['id'].'" ');
}
if($col_ah11>1){
$c_ah11 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '11' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah11['id'].'" ');
}
if($col_ah12>1){
$c_ah12 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '12' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah12['id'].'" ');
}
if($col_ah13>1){
$c_ah13 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '13' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah13['id'].'" ');
}
if($col_ah14>1){
$c_ah14 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '14' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah14['id'].'" ');
}
if($col_ah15>1){
$c_ah15 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '15' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah15['id'].'" ');
}
if($col_ah16>1){
$c_ah16 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '16' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah16['id'].'" ');
}
if($col_ah17>1){
$c_ah17 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '17' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah17['id'].'" ');
}
if($col_ah18>1){
$c_ah18 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '18' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah18['id'].'" ');
}
if($col_ah19>1){
$c_ah19 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '19' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah19['id'].'" ');
}
if($col_ah20>1){
$c_ah20 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '20' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah20['id'].'" ');
}
if($col_ah21>1){
$c_ah21 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '21' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah21['id'].'" ');
}
if($col_ah22>1){
$c_ah22 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '22' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah22['id'].'" ');
}
if($col_ah23>1){
$c_ah23 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '23' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah23['id'].'" ');
}
if($col_ah24>1){
$c_ah24 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '24' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah24['id'].'" ');
}
if($col_ah25>1){
$c_ah25 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '25' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah25['id'].'" ');
}
if($col_ah26>1){
$c_ah26 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '26' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah26['id'].'" ');
}
if($col_ah27>1){
$c_ah27 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '27' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah27['id'].'" ');
}
if($col_ah28>1){
$c_ah28 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '28' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah28['id'].'" ');
}
if($col_ah29>1){
$c_ah29 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '29' and `prog` = '0'  ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah29['id'].'" ');
}
if($col_ah30>1){
$c_ah30 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '30' and `prog` = '0' ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah30['id'].'" ');
}
if($col_ah31>1){
$c_ah31 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '30' and `prog` = '0' ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah31['id'].'" ');
}
if($col_ah32>1){
$c_ah32 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '30' and `prog` = '0' ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah32['id'].'" ');
}
if($col_ah33>1){
$c_ah33 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '30' and `prog` = '0' ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah33['id'].'" ');
}
if($col_ah34>1){
$c_ah34 = mysql_fetch_assoc(mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `number` = '30' and `prog` = '0' ORDER BY RAND() LIMIT 1"));
mysql_query('DELETE FROM `Achievements_user` WHERE `id` = "'.$c_ah34['id'].'" ');
}






















































///###############################################################################################################################################
?>
<div id="pokazat"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;"><img width="24" height="24" src="/images/arrow_down2.png"> Покупка Монет <img width="24" height="24" src="/images/arrow_down2.png"></a>
</div> 


<div id="skryt" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;"><img width="24" height="24" src="/images/arrow_up2.png"> Покупка Монет <img width="24" height="24" src="/images/arrow_up2.png"></a>
<p><div class='fight center'>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><?

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($user['angel'] > 0){
if($user['corp'] > 0 and $user['soyz'] > 0){
$dohod_user = ($user['dohod'] * ($soyz['musor']/100) * $user['dohod_mnogit'] * $corp['angel'] );
}else{
$dohod_user = ($user['dohod'] * ($user['musor_proc']/100) * $user['dohod_mnogit']*($user['angel']));
}
}else{
if($user['corp'] > 0 and $user['soyz'] > 0){
$dohod_user = ($user['dohod'] * (($soyz['musor'] + $user['musor_proc'])/100) * $user['dohod_mnogit']*$corp['angel']);
}else{
$dohod_user = ($user['dohod'] * ($user['musor_proc']/100) * $user['dohod_mnogit']);
}
}



if($corp['building'] == 0){
if($VIP_2['on'] == 1){
$dohod = ($dohod_user + (($dohod_user * 25) / 100));
}else{
$dohod = $dohod_user;
}
}else{
if($VIP_2['on'] >= 1){
$dohod = ($dohod_user + (($dohod_user * (25+$corp['building'])) / 100));
}else{
$dohod = ($dohod_user + (($dohod_user * $corp['building']) / 100));
}
}









if($VIP_4['on'] == 0){$cc1 = (10);}else{$cc1 = (10/2);}
if($VIP_4['on'] == 0){$cc2 = (30);}else{$cc2 = (30/2);}
if($VIP_4['on'] == 0){$cc3 = (90);}else{$cc3 = (90/2);}
if($VIP_4['on'] == 0){$cc4 = (270);}else{$cc4 = (270/2);}
if($VIP_4['on'] == 0){$cc5 = (810);}else{$cc5 = (810/2);}
if($VIP_4['on'] == 0){$cc6 = (2430);}else{$cc6 = (2430/2);}
if($VIP_4['on'] == 0){$cc7 = (7290);}else{$cc7 = (7290/2);}
if($VIP_4['on'] == 0){$cc8 = (21870);}else{$cc8 = (21870/2);}
if($VIP_4['on'] == 0){$cc9 = (65610);}else{$cc9 = (65610/2);}


if($promotions['promotion_6'] == 1){$cc11 = $cc1-($cc1*$promotions['act_6']/100);}else{$cc11 = $cc1;}
if($promotions['promotion_6'] == 1){$cc22 = $cc2-($cc2*$promotions['act_6']/100);}else{$cc22 = $cc2;}
if($promotions['promotion_6'] == 1){$cc33 = $cc3-($cc3*$promotions['act_6']/100);}else{$cc33 = $cc3;}
if($promotions['promotion_6'] == 1){$cc44 = $cc4-($cc4*$promotions['act_6']/100);}else{$cc44 = $cc4;}
if($promotions['promotion_6'] == 1){$cc55 = $cc5-($cc5*$promotions['act_6']/100);}else{$cc55 = $cc5;}
if($promotions['promotion_6'] == 1){$cc66 = $cc6-($cc6*$promotions['act_6']/100);}else{$cc66 = $cc6;}
if($promotions['promotion_6'] == 1){$cc77 = $cc7-($cc7*$promotions['act_6']/100);}else{$cc77 = $cc7;}
if($promotions['promotion_6'] == 1){$cc88 = $cc8-($cc8*$promotions['act_6']/100);}else{$cc88 = $cc8;}
if($promotions['promotion_6'] == 1){$cc99 = $cc9-($cc9*$promotions['act_6']/100);}else{$cc99 = $cc9;}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///###############################################################################################################################################
echo '
<a class="btni" style="min-width:140px;margin:4px;" href="?money_1"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 86400).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc11.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_2"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 345600).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc22.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_3"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 1382400).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc33.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_4"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 5529600).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc44.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_5"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 22118400).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc55.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_6"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 88473600).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc66.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_7"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 353894400).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc77.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_8"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 1415577600).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc88.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?money_9"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($dohod * 5662310400).'</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$cc99.'</span>
</span></span></a>';






if(isset($_GET['money_1'])){
$_SESSION['err'] = '
<center><form action="" method="POST">
'.n_f($dohod * 86400).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_1" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';
header("Location: ?");
exit();
}
if(isset($_POST['kol_1'])){
$kol_1 = strong($_POST['kol_1']);
if($kol_1 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc11*$kol_1)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc11*$kol_1))."', `money` = '".($user['money']+(($dohod*86400)*$kol_1) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*86400)*$kol_1).' <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc11*$kol_1).'';
exit();
}



if(isset($_GET['money_2'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 345600).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_2" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_2'])){
$kol_2 = strong($_POST['kol_2']);
if($kol_2 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc22*$kol_2)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc22*$kol_2))."', `money` = '".($user['money']+(($dohod*345600)*$kol_2) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*345600)*$kol_2).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc22*$kol_2).'';
exit();
}



if(isset($_GET['money_3'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 1382400).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_3" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_3'])){
$kol_3 = strong($_POST['kol_3']);
if($kol_3 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc33*$kol_3)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc33*$kol_3))."', `money` = '".($user['money']+(($dohod*1382400)*$kol_3) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*1382400)*$kol_3).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc33*$kol_3).'';
exit();
}



if(isset($_GET['money_4'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 5529600).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_4" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_4'])){
$kol_4 = strong($_POST['kol_4']);
if($kol_4 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc44*$kol_4)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc44*$kol_4))."', `money` = '".($user['money']+(($dohod*5529600)*$kol_4) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*5529600)*$kol_4).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc44*$kol_4).'';
exit();
}


if(isset($_GET['money_5'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 22118400).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_5" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_5'])){
$kol_5 = strong($_POST['kol_5']);
if($kol_5 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc55*$kol_5)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc55*$kol_5))."', `money` = '".($user['money']+(($dohod*22118400)*$kol_5) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*22118400)*$kol_5).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc55*$kol_5).'';
exit();
}


if(isset($_GET['money_6'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 88473600).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_6" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_6'])){
$kol_6 = strong($_POST['kol_6']);
if($kol_6 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc66*$kol_6)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc66*$kol_6))."', `money` = '".($user['money']+(($dohod*88473600)*$kol_6) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*88473600)*$kol_6).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc66*$kol_6).'';
exit();
}


if(isset($_GET['money_7'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 353894400).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_7" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_7'])){
$kol_7 = strong($_POST['kol_7']);
if($kol_7 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc77*$kol_7)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc77*$kol_7))."', `money` = '".($user['money']+(($dohod*353894400)*$kol_7) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*353894400)*$kol_7).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc77*$kol_7).'';
exit();
}


if(isset($_GET['money_8'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 1415577600).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_8" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_8'])){
$kol_8 = strong($_POST['kol_8']);
if($kol_8 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc88*$kol_8)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc88*$kol_8))."', `money` = '".($user['money']+(($dohod*1415577600)*$kol_8) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*1415577600)*$kol_8).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc88*$kol_8).'';
exit();
}



if(isset($_GET['money_9'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($dohod * 5662310400).' <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_9" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_9'])){
$kol_9 = strong($_POST['kol_9']);
if($kol_9 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($cc99*$kol_9)){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cc99*$kol_9))."', `money` = '".($user['money']+(($dohod*5662310400)*$kol_9) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> +'.n_f(($dohod*5662310400)*$kol_9).' 
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($cc99*$kol_9).'';
exit();
}

///###############################################################################################################################################




?></div><?

?>

</div>
</p> 
</div>
<?
///###############################################################################################################################################









///###############################################################################################################################################
?>
<div id="pokazat1"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('pokazat1').style.display='none';document.getElementById('skryt1').style.display='';return false;"><img width="24" height="24" src="/images/arrow_down2.png"> Покупка Коллекций <img width="24" height="24" src="/images/arrow_down2.png"></a>
</div> 


<div id="skryt1" style="display:none"> 
<a class="btnl mt4" href="#" onClick="document.getElementById('skryt1').style.display='none';document.getElementById('pokazat1').style.display='';return false;"><img width="24" height="24" src="/images/arrow_up2.png"> Покупка Коллекций <img width="24" height="24" src="/images/arrow_up2.png"></a>
<p><div class='fight center'>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><?
///###############################################################################################################################################
if($VIP_3){
$musorrr = (10)+(10/2);
}else{
$musorrr = 10;
}

if($VIP_4['on'] == 0){$c1 = (10);}else{$c1 = (10/2);}
if($VIP_4['on'] == 0){$c2 = (30);}else{$c2 = (30/2);}
if($VIP_4['on'] == 0){$c3 = (90);}else{$c3 = (90/2);}
if($VIP_4['on'] == 0){$c4 = (270);}else{$c4 = (270/2);}
if($VIP_4['on'] == 0){$c5 = (810);}else{$c5 = (810/2);}
if($VIP_4['on'] == 0){$c6 = (2430);}else{$c6 = (2430/2);}
if($VIP_4['on'] == 0){$c7 = (7290);}else{$c7 = (7290/2);}
if($VIP_4['on'] == 0){$c8 = (21870);}else{$c8 = (21870/2);}
if($VIP_4['on'] == 0){$c9 = (65610);}else{$c9 = (65610/2);}


if($promotions['promotion_6'] == 1){$c11 = $c1-($c1*$promotions['act_6']/100);}else{$c11 = $c1;}
if($promotions['promotion_6'] == 1){$c22 = $c2-($c2*$promotions['act_6']/100);}else{$c22 = $c2;}
if($promotions['promotion_6'] == 1){$c33 = $c3-($c3*$promotions['act_6']/100);}else{$c33 = $c3;}
if($promotions['promotion_6'] == 1){$c44 = $c4-($c4*$promotions['act_6']/100);}else{$c44 = $c4;}
if($promotions['promotion_6'] == 1){$c55 = $c5-($c5*$promotions['act_6']/100);}else{$c55 = $c5;}
if($promotions['promotion_6'] == 1){$c66 = $c6-($c6*$promotions['act_6']/100);}else{$c66 = $c6;}
if($promotions['promotion_6'] == 1){$c77 = $c7-($c7*$promotions['act_6']/100);}else{$c77 = $c7;}
if($promotions['promotion_6'] == 1){$c88 = $c8-($c8*$promotions['act_6']/100);}else{$c88 = $c8;}
if($promotions['promotion_6'] == 1){$c99 = $c9-($c9*$promotions['act_6']/100);}else{$c99 = $c9;}





///###############################################################################################################################################
echo '
<a class="btni" style="min-width:140px;margin:4px;" href="?musor_1"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c11.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?musor_2"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr * 4).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c22.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?musor_3"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr * 16).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c33.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?musor_4"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr * 64).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c44.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?musor_5"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr * 256).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c55.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?musor_6"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr * 1024).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c66.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?musor_7"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr * 4096).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c77.'</span>
</span></span></a><a class="btni" style="min-width:140px;margin:4px;" href="?musor_8"><span><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($musorrr * 16384).'%</span></span> <span>за <span>
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">'.$c88.'</span>
</span></span></a>';



if(isset($_GET['musor_1'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_11" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_11'])){
$kol_11 = strong($_POST['kol_11']);
if($kol_11 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c11*$kol_11)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c11*$kol_11))."', `musor_proc` = '".($user['musor_proc']+($musorrr*$kol_11))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+($musorrr*$kol_11))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f($musorrr*$kol_11).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c11*$kol_11).'';
exit();
}

if(isset($_GET['musor_2'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr * 4).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_22" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_22'])){
$kol_22 = strong($_POST['kol_22']);
if($kol_22 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c22*$kol_22)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c22*$kol_22))."', `musor_proc` = '".($user['musor_proc']+(($musorrr * 4)*$kol_22))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+(($musorrr * 4)*$kol_22))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f(($musorrr * 4)*$kol_22).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c22*$kol_22).'';
exit();
}

if(isset($_GET['musor_3'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr * 16).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_33" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_33'])){
$kol_33 = strong($_POST['kol_33']);
if($kol_33 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c33*$kol_33)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c33*$kol_33))."', `musor_proc` = '".($user['musor_proc']+(($musorrr * 16)*$kol_33))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+(($musorrr * 16)*$kol_33))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f(($musorrr * 16)*$kol_33).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c33*$kol_33).'';
exit();
}

if(isset($_GET['musor_4'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr * 64).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_44" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_44'])){
$kol_44 = strong($_POST['kol_44']);
if($kol_44 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c44*$kol_44)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c44*$kol_44))."', `musor_proc` = '".($user['musor_proc']+(($musorrr * 64)*$kol_44))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+(($musorrr * 64)*$kol_44))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f(($musorrr * 64)*$kol_44).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c44*$kol_44).'';
exit();
}

if(isset($_GET['musor_5'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr * 256).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_55" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_55'])){
$kol_55 = strong($_POST['kol_55']);
if($kol_55 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c55*$kol_55)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c55*$kol_55))."', `musor_proc` = '".($user['musor_proc']+(($musorrr * 256)*$kol_55))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+(($musorrr * 256)*$kol_55))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f(($musorrr * 256)*$kol_55).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c55*$kol_55).'';
exit();
}

if(isset($_GET['musor_6'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr * 1024).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_66" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_66'])){
$kol_66 = strong($_POST['kol_66']);
if($kol_66 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c66*$kol_66)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c66*$kol_66))."', `musor_proc` = '".($user['musor_proc']+(($musorrr * 1024)*$kol_66))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+(($musorrr * 1024)*$kol_66))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f(($musorrr * 1024)*$kol_66).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c66*$kol_66).'';
exit();
}

if(isset($_GET['musor_7'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr * 4096).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_77" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_77'])){
$kol_77 = strong($_POST['kol_77']);
if($kol_77 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c77*$kol_77)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c77*$kol_77))."', `musor_proc` = '".($user['musor_proc']+(($musorrr * 4096)*$kol_77))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+(($musorrr * 4096)*$kol_77))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f(($musorrr * 4096)*$kol_77).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c77*$kol_77).'';
exit();
}

if(isset($_GET['musor_8'])){$_SESSION['err'] = '<center><form action="" method="POST">
'.n_f($musorrr * 16384).'% <font color=red>∗</font> <input type="number" style="width: 10%;" name="kol_88" maxlength="8" value="1" class="text"/>
= <input class="mt4" type="submit" name="submit" value="Скупить ">
</form></center>';header("Location: ?");exit();}
if(isset($_POST['kol_88'])){
$kol_88 = strong($_POST['kol_88']);
if($kol_88 < 0){header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка!</font>';exit();}
if($user['rubin'] < ($c88*$kol_88)){header('Location: ?');$_SESSION['err'] = 'Ошибка! Не хватает рубинов!';exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($c88*$kol_88))."', `musor_proc` = '".($user['musor_proc']+(($musorrr * 16384)*$kol_88))."' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".($soyz['turnir_musor_1']+(($musorrr * 16384)*$kol_88))."' WHERE `id` = '".$soyz['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = '
<img width="24" height="24" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f(($musorrr * 16384)*$kol_88).'%
<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> -'.($c88*$kol_88).'';
exit();
}





?></div><?

?>

</div>
</p> 
</div>
<?
///###############################################################################################################################################





if($user['bilet'] < 10){
$notifikations1 = '<font color=red size=3>(+)</font>';
}
if($user['mine_time'] > 0 && $user['mine_time'] <= time() or $user['mine_time'] > time() or $user['mine_time_1'] <= time()){
$notifikations2 = '<font color=red size=3>(+)</font>';
}
if($garbage_time_['time'] < time() ){
$notifikations3 = '<font color=red size=3>(+)</font>';
}
if(!$VIP_1 or !$VIP_2 or !$VIP_3 or !$VIP_4){
$notifikations4 = '<font color=red size=3>(+)</font>';
}
if($mission_user_1['prog_'] >= $mission_user_1['prog'] and $mission_user_1['time_restart'] == 0
or $mission_user_2['prog_'] >= $mission_user_2['prog']  and $mission_user_2['time_restart'] == 0
or $mission_user_3['prog_'] >= $mission_user_3['prog']  and $mission_user_3['time_restart'] == 0
or $mission_user_4['prog_'] >= $mission_user_4['prog']  and $mission_user_4['time_restart'] == 0
or $mission_user_6['prog_'] >= $mission_user_6['prog']  and $mission_user_6['time_restart'] == 0
or $mission_user_7['prog_'] >= $mission_user_7['prog']  and $mission_user_7['time_restart'] == 0
or $mission_user_8['prog_'] >= $mission_user_8['prog']  and $mission_user_8['time_restart'] == 0
or $mission_user_9['prog_'] >= $mission_user_9['prog']  and $mission_user_9['time_restart'] == 0
or $mission_user_10['prog_'] >= $mission_user_10['prog']  and $mission_user_10['time_restart'] == 0
or $mission_user_11['prog_'] >= $mission_user_11['prog']  and $mission_user_11['time_restart'] == 0
or $mission_user_12['prog_'] >= $mission_user_12['prog']  and $mission_user_12['time_restart'] == 0
or $mission_user_13['prog_'] >= $mission_user_13['prog']  and $mission_user_13['time_restart'] == 0
or $mission_user_14['prog_'] >= $mission_user_14['prog']  and $mission_user_14['time_restart'] == 0
or $mission_user_15['prog_'] >= $mission_user_15['prog']  and $mission_user_15['time_restart'] == 0
or $mission_user_16['prog_'] >= $mission_user_16['prog']  and $mission_user_16['time_restart'] == 0
or $mission_user_17['prog_'] >= $mission_user_17['prog']  and $mission_user_17['time_restart'] == 0
or $mission_user_18['prog_'] >= $mission_user_18['prog']  and $mission_user_18['time_restart'] == 0
or $mission_user_19['prog_'] >= $mission_user_19['prog']  and $mission_user_19['time_restart'] == 0
or $mission_user_20['prog_'] >= $mission_user_20['prog']  and $mission_user_20['time_restart'] == 0
or $mission_user_21['prog_'] >= $mission_user_21['prog']  and $mission_user_21['time_restart'] == 0
or $mission_user_22['prog_'] >= $mission_user_22['prog']  and $mission_user_22['time_restart'] == 0
or $mission_user_23['prog_'] >= $mission_user_23['prog']  and $mission_user_23['time_restart'] == 0
or $mission_user_24['prog_'] >= $mission_user_24['prog']  and $mission_user_24['time_restart'] == 0
or $mission_user_25['prog_'] >= $mission_user_25['prog']  and $mission_user_25['time_restart'] == 0
or $mission_user_26['prog_'] >= $mission_user_26['prog']  and $mission_user_26['time_restart'] == 0
or $mission_user_27['prog_'] >= $mission_user_27['prog']  and $mission_user_27['time_restart'] == 0
or $mission_user_28['prog_'] >= $mission_user_28['prog']  and $mission_user_28['time_restart'] == 0
or $mission_user_29['prog_'] >= $mission_user_29['prog']  and $mission_user_29['time_restart'] == 0
or $mission_user_30['prog_'] >= $mission_user_30['prog']  and $mission_user_30['time_restart'] == 0
or $mission_user_31['prog_'] >= $mission_user_31['prog']  and $mission_user_31['time_restart'] == 0
or $mission_user_32['prog_'] >= $mission_user_32['prog']  and $mission_user_32['time_restart'] == 0
or $mission_user_33['prog_'] >= $mission_user_33['prog']  and $mission_user_33['time_restart'] == 0
or $mission_user_34['prog_'] >= $mission_user_34['prog']  and $mission_user_34['time_restart'] == 0
or $mission_user_35['prog_'] >= $mission_user_35['prog']  and $mission_user_35['time_restart'] == 0) {
$notifikations5 = '<font color=red size=3>(+)</font>';
}
if($expedition_user['time'] < time() and $user['time_expedition'] < time()
or $expedition_user['level_'] == 1 and $expedition_user['time'] < time()
or $expedition_user['level_'] == 2 and $expedition_user['time'] < time()
or $expedition_user['level_'] == 3 and $expedition_user['time'] < time()){
$notifikations7 = '<font color=red size=3>(+)</font>';
}
if($user['prestig_time'] < time()){
$notifikations77 = '<font color=red size=3>(+)</font>';
}
$kol_us_chests = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."'"),0);
if($kol_us_chests > 0){
$notifikations8 = '<font color=red size=3>(+)</font>';
}
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'mine/"><div class="menu-left"><img src="/mine/images/20.png" width="50" height="50"><br>Шахта '.$notifikations2.'</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Lottery/"><div class="menu-center"><img src="/images/lotery.png" width="50" height="50"><br>Лотерея '.$notifikations1.'</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'garbage/"><div class="menu-right"><img width="50" height="50" src="/images/biznes/room_11.jpg" style="border-radius: 45px;"><br>Шлюз '.$notifikations3.'</div>
</a></td>
</tr></tbody></table>';







echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'VIP/"><div class="menu-left"><img src="/images/VIP/VIP.png" width="50" height="50"><br>ViP '.$notifikations4.'</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'user/calculation/"><div class="menu-center"><img src="/images/angel48.png" width="50" height="50"><br>Расчет</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Information/'.$user['id'].'/"><div class="menu-right"><img width="50" height="50" src="/images/history2.png" style="border-radius: 45px;"><br>Инфо</div>
</a></td>
</tr></tbody></table>';







echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'gifts/'.$user['id'].'/"><div class="menu-left"><img src="/images/gift.png" width="50" height="50"><br>Подарки</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'mission/"><div class="menu-center"><img src="/images/mission/10.png" width="50" height="50"><br>Задания '.$notifikations5.'</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'Achievements/"><div class="menu-right"><img width="50" height="50" src="/images/Achievements/1/7.png" style="border-radius: 45px;"><br>Достижения</div>
</a></td>
</tr></tbody></table>';








echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'expedition/"><div class="menu-right"><img width="50" height="50" src="/images/biznes/room_4.jpg" style="border-radius: 45px;"><br>Экспедиция '.$notifikations7.'</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'prestig/"><div class="menu-left"><img src="/images/prestig.png" width="50" height="50"><br>Престиж '.$notifikations77.'</div>
</a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'chests/"><div class="menu-center"><img src="/chests/chests/6.png" width="50" height="50"><br>Сундуки '.$notifikations8.'</div>
</a></td>
</tr></tbody></table>';




echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'pve/"><div class="menu-left"><img width="50" height="50" src="/world/images/pve.png" style="border-radius: 10px;"><br>Сражения</div></a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'garden/"><div class="menu-left"><img width="50" height="50" src="/images/garden/a1.jpg" style="border-radius: 10px;"><br>Грядки</div></a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'bank/"><div class="menu-left"><img width="50" height="50" src="/images/bank.png" style="border-radius: 10px;"><br>Банк</div></a></td>

</tr></tbody></table>';




echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a href="'.$HOME.'bot/"><div class="menu-left"><img width="50" height="50" src="/images/bots/image2.png" style="border-radius: 10px;"><br>Робот-помощник</div></a></td>
<td style="vertical-align:top;width:50%;"><a href="'.$HOME.'game/"><div class="menu-left"><img width="50" height="50" src="/images/ruby.png" style="border-radius: 10px;"><br>Rubin of Fortune1</div></a></td>
</tr></tbody></table>';

/*
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'mines/"><div class="menu-left"><img width="50" height="50" src="/mines/mines.png" style="border-radius: 10px;"><br>Шахты <font color=red>(beta)</font></div></a></td>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'game/"><div class="menu-left"><img width="50" height="50" src="/images/ruby.png" style="border-radius: 10px;"><br>Rubin of Fortune</div></a></td>
</tr></tbody></table>';
*/


if($user['level'] > 0){
$ass_adm = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass_adm` "),0);
if($ass_adm > $user['ass_adm']){
$admchat = '<font color=red>(+)</font>';
}
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><div class="menu-left"><img src="/images/settings2.png" width="50" height="50"><br>Админ панель</div>
</a></td>

<td style="vertical-align:top;width:30%;"><a href="'.$HOME.'ass_adm/"><div class="menu-right"><img width="50" height="50" src="/images/folder.png" style="border-radius: 45px;"><br>Админ чат '.$admchat.'</div>
</a></td>
</tr></tbody></table>';
}





require_once ('../system/footer.php');
?>