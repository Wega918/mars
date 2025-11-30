<?php
$title = 'Банк';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}

echo '<div class="content">
<a class="fl" href="'.$HOME.'garden/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Грядки" title="Грядки"></a>
<a class="fr" href="'.$HOME.'mines/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Шахты" title="Шахты"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="?"><span>Банк</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';

echo '<div class="content"><div class="bordered mt4">
<center><img src="/bank/bank.png" alt="" style="width:50%; border-radius: 8px;"></center>


</div></div>';






$pumping_lvl_max = 250;
$progress = round(100/($pumping_lvl_max/$user['pumping']));
if($progress > 100) {$progress = 100;}
$proc = 1;
if($user['pumping'] > 0 && $user['pumping'] <= 24 ){
$cost_pumping = 100000;
}elseif($user['pumping'] > 24 && $user['pumping'] <= 49 ){
$cost_pumping = 200000;
}elseif($user['pumping'] > 49 && $user['pumping'] <= 74 ){
$cost_pumping = 300000;
}elseif($user['pumping'] > 74 && $user['pumping'] <= 99 ){
$cost_pumping = 400000;
}elseif($user['pumping'] >= 100 ){
$cost_pumping = 500000;
}
echo '
<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><img src="/images/header/money_36.png" width="48" height="48"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown"><span>Прокачка дохода</span></div><div>
<a class="btni" href="?buy_'.$user['pumping'].'" style="margin-top: 4px; min-width: 130px;">Повысить на <b>'.$proc.'</b> за <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($cost_pumping).'</span></a>
</div></div></div><div class="cb"></div>
<hr>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;">
<div class="expline" style="width:'.$progress.'%;"></div>
</div>';
if($user['pumping'] < $pumping_lvl_max){
echo '<center><span><font size="2"><img src="/images/mission/star_.png" alt="*"> <font color=black>Умножает весь ваш доход на <b>'.$user['pumping'].'</b></font></font></span></center>';
}else{
echo '<center><font color="green"><b>Максимальная прокачка!</b></font></center>';
}
echo '</div></div>';

if(isset($_GET['buy_'.$user['pumping'].''])){
if($user['rubin'] < $cost_pumping){$_SESSION['err'] = 'Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($cost_pumping-$user['rubin']).'';header('Location: ?');exit();}
if($user['pumping'] >= $pumping_lvl_max){$_SESSION['err'] = '<font color="green"><b>Максимальная прокачка!</b></font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost_pumping)."', `pumping` = '".($user['pumping']+$proc)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
$_SESSION['ok'] = '<font color=#ddd>Доход успешно повышен!</font> ';
header('Location: ?');
exit();
}




echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a href="'.$HOME.'card/"><div class="menu-left"><img width="25%" src="/images/card/12.png"><br>Улучшение карт</div></a></td>
<td style="vertical-align:top;width:50%;"><a href="'.$HOME.'cardSent/"><div class="menu-left">
<img width="25%" src="/images/card/13.png"> <img width="25%" src="/bank/cardSent.png"> <img width="25%" src="/images/card/14.png">
<br>Обменник карт</div></a></td>
</tr></tbody></table>';



echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:15%;"><a href="'.$HOME.'cardShop/"><div class="menu-left"><img width="10%" src="/images/card/19_.png"><br>Покупка карт</div></a></td>
</tr></tbody></table>';









echo '<a class="btnl mt4" href="'.$HOME.'menu/">Назад</a>';

echo ' <font size="1"><font color="black"> <font size="3">•</font> Банк</font> - <b>в Банке можно обменять, или улучшить карты.</b></font><br>';
echo ' <font size="1"><font color="black"> <font size="3">•</font></font> <b>Купить карты можно в Банке, или же в Корпорации.</b></font>';
require_once ('../system/footer.php');
?>