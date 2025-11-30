<?php
$title = 'Платежи aaio';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}

if ($user['adm_pass'] != 'passadmpanelgmars') {
header('Location: '.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/');
$_SESSION['err'] = 'Ошибка';
exit();
}



echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;">';




function who($id = 0) {	
$us = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1"));
return (empty($us)?'БОТ': ' '.nick($us['id']).'');
}



if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `aaio` WHERE `time_oplata` != '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$logs = mysql_query("SELECT * FROM `aaio` WHERE `time_oplata` != '0' ORDER BY `id` DESC LIMIT $start,$max");
if(mysql_num_rows($logs) == '0') 
echo 'Записей не найдено...';

while ($TJlogs = mysql_fetch_array($logs)){
echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;">';
if($TJlogs['time_oplata'] > '0') $p = '<font color="green"> Оплачено </font>';

echo 'ID: '.$TJlogs['id'].' <br/>Время: '.date('d.m|H:i',$TJlogs['time']).' <br/> Ник: '.who($TJlogs['user']).' <br>Состояние: '.$p.'  <br>Сумма: '.$TJlogs['amount'].' '.$TJlogs['currency'].' <br/> </div>               ';
}




if ($k_page > 1) {
echo str(''.$HOME.'Payments/?',$k_page,$page); // Вывод страниц
}




echo '</div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');
?>