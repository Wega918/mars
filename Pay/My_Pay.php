<?php
$title = 'Платежи';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}




$summa = mysql_result(mysql_query("SELECT SUM(summa) FROM worldkassa WHERE `id_user` = '".$user['id']."' and `time_oplata` > '0' ;"), 0);
if($summa > 0) {
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.' Worldkassa: '.$summa.' руб.</span></li></ul></div>';
if (empty($user['max'])) $user['max']=10;
$max = 3;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `worldkassa` WHERE `id_user` = '".$user['id']."' and `time_oplata` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `worldkassa` WHERE `id_user` = '".$user['id']."'  and `time_oplata` > '0'  ORDER BY `id`  DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){

echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;">';
if($r['time_oplata'] > '0') $p = '<font color="green"> Оплачено </font>';

echo 'ID: '.$r['id'].' <br/>Время: '.date('d.m|H:i',$r['time']).' <br/> Ник: '.nick($r['id_user']).' <br>Состояние: '.$p.'  <br>Сумма: '.$r['summa'].' <br/> </div>               ';
}
if ($k_page > 1) {
echo str(''.$HOME.'My_Pay/?',$k_page,$page); // Вывод страниц
}
}














$grn = mysql_result(mysql_query("SELECT SUM(suma) FROM plategi WHERE `user` = '".$user['id']."' and `status` = '1' and `valuta` = '0' ;"), 0);
$rub = mysql_result(mysql_query("SELECT SUM(suma) FROM plategi WHERE `user` = '".$user['id']."' and `status` = '1' and `valuta` = '1' ;"), 0);
if($grn > 0 or $rub) {
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">Ручные платежи: '.$rub.'руб. '.$grn.'грн. </span></li></ul></div>';
if (empty($user['max'])) $user['max']=10;
$max = 3;
$k_post1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `plategi` WHERE `user` = '".$user['id']."' and `status` = '1' "),0);
$k_page1 = k_page($k_post1,$max);
$page = page($k_page1);
$start = $max*$page-$max;
$k_post1 = $start+1;
$users = mysql_query("SELECT * FROM `plategi` WHERE `user` = '".$user['id']."' and `status` = '1' ORDER BY `id`  DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
echo '<div class="bordered mt4" style="padding: 5 4px 4px 5;">';
echo ''.nick($r['user']).' <br>';
echo '<b>Время:</b> <font color=black>'.vremja($r['time']).'</font> <br>';
if($r['valuta'] == 0){
$valuta = 'Грн';
$valuta1 = 0;
}else{
$valuta = 'Руб';
$valuta1 = 1;
}


if($r['status'] == 0){
$status = '<font color=red>Не обработан!</font>';
}
if($r['status'] == 1){
$status = '<font color=green>Обработан!</font>';
}
if($r['status'] == 2){
$status = '<font color=inianred>Отменен!</font>';
}


echo '<b>Статус:</b> '.$status.' <br>';
echo '<b>Сумма:</b> '.$r['suma'].' '.$valuta.' <br>';
echo '<b>Время оплаты:</b> <font color=black>'.$r['time_oplata'].'</font> <br>';
echo '<b>Способ оплаты:</b> <font color=black>'.$r['sposob'].'</font> <br>';
echo '<b>Рубины:</b> <font color=red><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> '.n_f($r['rubin']).'</font><br>';
echo '</div>';
}


if ($k_page1 > 1) {
echo str(''.$HOME.'My_Pay/?',$k_page1,$page); // Вывод страниц
}
}





$rub = mysql_result(mysql_query("SELECT SUM(suma) FROM plategi WHERE`id_user` = '".$ank['id']."' and `payment_amount` > '0' and `currency_name` = 'RUB' ;"), 0);
$grn = mysql_result(mysql_query("SELECT SUM(suma) FROM plategi WHERE`id_user` = '".$ank['id']."' and `payment_amount` > '0' and `currency_name` = 'UAN' ;"), 0);
if($rub != 0 or $grn != 0) {
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">Платежи Xsolla: '.$rub.'руб. '.$grn.'руб. </span></li></ul></div>';
if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `xsolla_payment` WHERE `id_user` = '".$ank['id']."' and `payment_amount` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `xsolla_payment` WHERE `id_user` = '".$ank['id']."'  and `payment_amount` > '0'  ORDER BY `id`  DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){

echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;">';
if($r['payment_amount'] > '0') $p = '<font color="green"> Оплачено </font>';

echo 'Транзакция: '.$r['transaction_id'].' <br/>Время: '.$r['payment_date'].' <br/> Ник: '.nick($r['id_user']).' <br>Состояние: '.$p.'  <br>Сумма: '.$r['payment_amount'].' '.$r['payment_currency'].' <br/> </div>               ';
}
if ($k_page > 1) {
echo str(''.$HOME.'My_Pay/?',$k_page1,$page); // Вывод страниц
}
}







require_once ('../system/footer.php');
?>