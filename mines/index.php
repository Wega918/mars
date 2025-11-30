<?php
$title = 'Шахты';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['id'] != 1) {
$_SESSION['err'] = 'Техработы...';
header('Location: /');
exit();
}


$coll_1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' and `level` = '1' "),0);
$coll_2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' and `level` = '2' "),0);
$coll_3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' and `level` = '3' "),0);
$coll_4 = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' and `level` = '4' "),0);
$coll_5 = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' and `level` = '5' "),0);
$coll_6 = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' and `level` = '6' "),0);

$sum_kris_1 = mysql_result(mysql_query("SELECT SUM(production_new) FROM mines_user WHERE `user` = '".$user['id']."' and `level` = '1' ;"), 0);
$sum_kris_2 = mysql_result(mysql_query("SELECT SUM(production_new) FROM mines_user WHERE `user` = '".$user['id']."' and `level` = '2' ;"), 0);
$sum_kris_3 = mysql_result(mysql_query("SELECT SUM(production_new) FROM mines_user WHERE `user` = '".$user['id']."' and `level` = '3' ;"), 0);
$sum_kris_4 = mysql_result(mysql_query("SELECT SUM(production_new) FROM mines_user WHERE `user` = '".$user['id']."' and `level` = '4' ;"), 0);
$sum_kris_5 = mysql_result(mysql_query("SELECT SUM(production_new) FROM mines_user WHERE `user` = '".$user['id']."' and `level` = '5' ;"), 0);
$sum_kris_6 = mysql_result(mysql_query("SELECT SUM(production_new) FROM mines_user WHERE `user` = '".$user['id']."' and `level` = '6' ;"), 0);
if($sum_kris_1<=0){$sum_kris_1=0;}if($sum_kris_2<=0){$sum_kris_2=0;}if($sum_kris_3<=0){$sum_kris_3=0;}if($sum_kris_4<=0){$sum_kris_4=0;}if($sum_kris_5<=0){$sum_kris_5=0;}if($sum_kris_6<=0){$sum_kris_6=0;}



echo '<div class="content">
<a class="fl" href="'.$HOME.'bank/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Банк" title="Банк"></a>
<a class="fr"><img width="25" height="45" src="/images/index/right_grey.png"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="?"><span>Шахты</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';



echo '<a class="btnl mt4" href="'.$HOME.'mines/shop/">Покупка шахт</a>';







echo '
<div class="bordered" style="margin-top: 4px; position: relative;"><table width="100%" align="center"><tbody><tr>
<td width="90px"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/1.png"></td>
<td width="120px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.$coll_1.'</b><br>Шахт</center> </td>
<td width="40px" style="color:#5A3507;"> <span style="font-size: 52px;">=</span></td>
<td width="50px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/11.png"></td>
<td width="250px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.n_f($sum_kris_1).'</b><br>Кристаллов</center> </td>
</tr></tbody></table></div>

<div class="bordered" style="margin-top: 4px; position: relative;"><table width="100%" align="center"><tbody><tr>
<td width="90px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/2.png"></td>
<td width="120px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.$coll_2.'</b><br>Шахт</center> </td>
<td width="40px" style="color:#5A3507;"> <span style="font-size: 52px;">=</span></td>
<td width="50px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/22.png"></td>
<td width="250px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.n_f($sum_kris_2).'</b><br>Кристаллов</center> </td>
</tr></tbody></table></div>

<div class="bordered" style="margin-top: 4px; position: relative;"><table width="100%" align="center"><tbody><tr>
<td width="90px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/3.png"></td>
<td width="120px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.$coll_3.'</b><br>Шахт</center> </td>
<td width="40px" style="color:#5A3507;"> <span style="font-size: 52px;">=</span></td>
<td width="50px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/33.png"></td>
<td width="250px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.n_f($sum_kris_3).'</b><br>Кристаллов</center> </td> 
</tr></tbody></table></div>

<div class="bordered" style="margin-top: 4px; position: relative;"><table width="100%" align="center"><tbody><tr>
<td width="90px"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/4.png"></td>
<td width="120px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.$coll_4.'</b><br>Шахт</center> </td>
<td width="40px" style="color:#5A3507;"> <span style="font-size: 52px;">=</span></td>
<td width="50px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/44.png"></td>
<td width="250px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.n_f($sum_kris_4).'</b><br>Кристаллов</center> </td>
</tr></tbody></table></div>

<div class="bordered" style="margin-top: 4px; position: relative;"><table width="100%" align="center"><tbody><tr>
<td width="90px" v=""><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/5.png"></td>
<td width="120px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.$coll_5.'</b><br>Шахт</center> </td>
<td width="40px" style="color:#5A3507;"> <span style="font-size: 52px;">=</span></td>
<td width="50px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/55.png"></td>
<td width="250px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.n_f($sum_kris_5).'</b><br>Кристаллов</center> </td>
</tr></tbody></table></div>

<div class="bordered" style="margin-top: 4px; position: relative;"><table width="100%" align="center"><tbody><tr>
<td width="90px" v=""><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/6.png"></td>
<td width="120px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.$coll_6.'</b><br>Шахт</center> </td>
<td width="40px" style="color:#5A3507;"> <span style="font-size: 52px;">=</span></td>
<td width="50px" style="color:#5A3507;"><img style="width: 50px; height: 50px;padding: 5px;" src="/mines/images/66.png"></td>
<td width="250px" style="color:#5A3507;"> <center><b style="font-size: 24px;">'.n_f($sum_kris_6).'</b><br>Кристаллов</center> </td>
</tr></tbody></table></div>';


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=green>Cобрано для продажи:</font> '.n_f($user['sobrano_kris']).' <font size=2 color=green>Кристаллов</font>
</span></li></ul></div>';


echo '<div class="content small minor">Цена за 200 кристаллов =  <img width="20" height="20" alt="слава" src="/mines/glory.png" title="слава"> 1 славы
<hr>
на счету <img width="20" height="20" alt="слава" src="/mines/glory.png" title="слава"> <b>'.$user['glory'].'</b> славы
</div>';



$glory = floor($user['sobrano_kris']*1/100);
$glory1 = floor($glory/2);
$rb = floor($glory/6);
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="?sbor">Собрать все</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="?sell">Продать за <img width="20" height="20" alt="слава" src="/mines/glory.png" title="слава"> '.($glory1).' </a></td>
</tr></tbody></table>';

echo '<li><a class="btnl mt4" href="?sell_rb">Продать за <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> '.($rb).' </a></li>';




######################################################################################################################################################
$coll_production_new = mysql_result(mysql_query("SELECT SUM(production_new) FROM mines_user WHERE `user` = '".$user['id']."' ;"), 0);
//$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> <font color=green>Шахты успешно куплены!</font>';
//$_SESSION['err'] = '<img src="/images/cross.png" width="24" height="24" alt=""> <font color=red>Шахты успешно куплены!</font>';

if(isset($_GET['sbor'])){
if($coll_mines <= 0){
header('Location: ?');
exit();
}
if($coll_production_new < 1) {
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `sobrano_kris` = '".($user['sobrano_kris']+$coll_production_new)."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `mines_user` SET `production_new` = '0' WHERE `user` = '".$user['id']."' ");
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> <font color=green>Собрано '.n_f($coll_production_new).' Кристаллов!</font>';
header('Location: ?');
exit();
}
######################################################################################################################################################




######################################################################################################################################################
if(isset($_GET['sell'])){
if($coll_mines <= 0){
header('Location: ?');
exit();
}
if($glory1 <= 0) {
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `sobrano_kris` = '0', `glory` = '".($user['glory']+$glory1)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> <font color=green>Получено</font> <img width="20" height="20" alt="слава" src="/mines/glory.png" title="слава"> '.$glory1.'';
header('Location: ?');
exit();
}
######################################################################################################################################################

######################################################################################################################################################
if(isset($_GET['sell_rb'])){
if($coll_mines <= 0){
header('Location: ?');
exit();
}
if($rb <= 0) {
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `sobrano_kris` = '0', `rubin` = '".($user['rubin']+$rb)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> <font color=green>Получено</font> <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.$rb.'';
header('Location: ?');
exit();
}
######################################################################################################################################################








require_once ('../system/footer.php');
?>