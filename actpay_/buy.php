<?
include '../system/config.php';   
include '../system/function.php';
require_once ('../system/header.php');
if(!$user['id']){
header('Location: /');
exit();
}
if($user['vip_pay'] == 1){
header('Location: /');
exit();
}
if($premium['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($premium_musor['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}



/*
if ($user['id'] != 12){
header('Location: /');
$_SESSION['err'] = '<font color=red>Временная ошибка!</font>';
exit();
}
*/


$card_1 = ceil(15*$sql['col_mis_turnir']);
$card_2 = ceil(15*$sql['col_mis_turnir']);
$chest = ceil(15*$sql['col_mis_turnir']);
$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){$angel_ = (($ang__['angel']*0.5/100)*($sql['col_mis_turnir']));}
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){$musor_ = (($mus__['musor_proc']*0.5/100)*($sql['col_mis_turnir']));}


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font size=4 color=red>ViP награда!</font> 
<br><font color=black size=2><tt>Открой награды недели! </tt></font> <hr>
<div class="center">
<span class="count_room">х'.$card_1.'</span><img width="11%" src="/images/card/3.png">
<span class="count_room">х'.$card_2.'</span><img width="11%" src="/images/card/3.png">
</div>
<hr>
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($angel_).'</font>
<font color="black" size="3"> | </font>
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($musor_).'%</font>
<hr>

<span class="count_room">х'.$chest.'</span><img width="35" height="35" src="/chests/chests/6.png"> <font size="2">Легендарный сундук</font>';

echo '<hr>
<a class="btni" style="min-width:160px;margin:4px;" href="?pay"><span><span>Купить за <font color=black>300</font> руб</span></span></a>';



echo '</span></li></ul></div>';


if(isset($_GET['pay'])){


$_SESSION['err'] = 'Чтобы купить ViP награду недели, напишите <a href="/igrok_1/">Администратору</a>';
header('Location: ?');
exit();
}





echo '<a class="btnl mt4" href="'.$HOME.'cup/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
include '../system/footer.php';
?>