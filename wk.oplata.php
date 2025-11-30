<?php
include './system/config.php';
include './system/function.php';
        
if ($user['level'] < 3 && $user['doljnost'] < 3){
header('location: /');
exit;
}

$title = 'Платежи WorldKassa.ru';
include './system/header.php';



function who($id = 0){
$us = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1"));
return (empty($us)?'БОТ': ' '.$ico.' <a href="/igrok_'.$us['id'].'"> '.$us['login'].' </a>');
}


$logs = mysql_query("SELECT * FROM `worldkassa` ORDER BY `id` DESC");

echo '<center><div class="head1">Статистика платежей WorldKassa.ru</div></center>
<div class="line"></div>';


if(mysql_num_rows($logs) == '0') 
echo 'Записей не найдено';

while ($TJlogs = mysql_fetch_array($logs)){

if($TJlogs['time_oplata'] == '0') $p = '<font color="yellow"> Не оплачено </font>';
 
if($TJlogs['time_oplata'] > '0') $p = '<font color="red"> Оплачено </font>';

echo '<div class = "trnt-block"><div class = "wrap1"><div class = "wrap2"><div class = "wrap3"><div class = "wrap4"><div class = "wrap5"><div class = "wrap6"><div class = "wrap7"><div class = "wrap8"><div class = "wrap-content">';

echo '
ID: '.$TJlogs['id'].' <br/>Время: '.date('d.m|H:i',$TJlogs['time']).' <br/> '.who($TJlogs['id_user']).' Состояние: '.$p.'  <br/> </div>               ';
echo '</div></div></div></div></div></div></div></div>';
}



include './system/footer.php';

?>