<?php
$title = 'Улучшение карт';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>';
if($promotions['promotion_14'] == 1){
echo '<div class="bgcontent"><div class="content tred">
<div class="pt"><ul><li class="center">Скидка на улучшение карт '.$promotions['act_14'].'%</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_14'] - time()).'</span></div>
</div></div><br>';
}

///###############################################################################################################################################
if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `user` = '".$user['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$card = mysql_query("SELECT * FROM `corporate_card` where `user` = '".$user['id']."' ORDER BY `id` desc  LIMIT $start, $max");
while($cardd = mysql_fetch_assoc($card)){

if($cardd['xxx'] > 10){
if($promotions['promotion_14'] == 1){
$cost = ($cardd['xxx']*$cardd['xxx']*250)-(($cardd['xxx']*$cardd['xxx']*250)*$promotions['act_14']/100);
}else{
$cost = ($cardd['xxx']*$cardd['xxx']*250);
}
}else{
if($promotions['promotion_14'] == 1){
$cost = ($cardd['xxx']*$cardd['xxx']*125)-(($cardd['xxx']*$cardd['xxx']*125)*$promotions['act_14']/100);
}else{
$cost = ($cardd['xxx']*$cardd['xxx']*125);
}
}

echo '<div class="mt4"><div class="mt4 bordered" style="position: relative;"><div style="display: inline;" class="fl">
<div class="left" style="display: inline-block;"><span class="count_room">х'.$cardd['xxx'].'</span><img src="/images/card/'.$cardd['images'].'.png" width="64" height="64"></div>
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;"><div class="show350 tdbrown">Карта #<span>'.$cardd['id'].'</span></div><div>
<a class="btni" href="?buy_'.$cardd['id'].'" style="margin-top: 4px; min-width: 130px;">Улучшить за <img src="/images/ruby.png" alt="$" width="24" height="24"> <span>'.n_f($cost).'</span></a>
</div></div></div><div class="cb"></div></div></div>';


if(isset($_GET['buy_'.$cardd['id'].''])){
if($cardd['xxx'] >= 50){
$_SESSION['err'] = 'Максимальная прокачка.';
header('Location: ?');
exit();
}
if($user['rubin'] < $cost){
$_SESSION['err'] = 'не хватает <img src="/images/ruby.png" alt="$" width="24" height="24"> '.($cost-$user['rubin']).'';
header('Location: ?');
exit();
}
mysql_query("UPDATE `corporate_card` SET `xxx` = '".($cardd['xxx']+1)."' WHERE `id` = '".$cardd['id']."' limit 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$cost)."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['ok'] = '<img src="/images/accept48.png" alt="$" width="24" height="24"> Уровень повышен. <br> <img src="/images/ruby.png" alt="$" width="24" height="24"> -<font color=red>'.n_f($cost).'</font>';
header('Location: ?');
exit();
}

}
///###############################################################################################################################################















echo '<a class="btnl mt4" href="'.$HOME.'bank/">Назад</a>';

echo ' <font color="black"><font size="3">•</font></font> <font size="1"><b>Улучшать карты можно до 50 уровня.</b></font><br>';
require_once ('../system/footer.php');
?>