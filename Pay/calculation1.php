<?php
$title = 'Калькулятор';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';










if($_GET['pay'] == ok_rub) {
$summa = abs(intval($_POST['summa']));
if($summa == 0){
header('Location: ?');
exit();
}
echo '<div class="content small minor">Цена 1 рубина =  0,01 Руб.</div>';
echo '<hr>';
echo 'На '.$_POST['summa'].' руб Вы получите <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">';


$bon_rub = $summa;
$gold = $summa / 0.01;
$bon2 = (($gold * $bon_rub) / 100);

if($promotions['promotion_1'] == 1){
$rubin = $gold + (($gold * $promotions['act_1']) / 100)+$bon2;
}else{
$rubin = ($gold+$bon2);
}

echo ' '.$rubin.' ';


echo '</span>';
echo '</center></div>';
echo '<div class="content small minor">Сумма указана с учетом акций и бонусов.</div>';
echo '<a class="btnl mt4" href="'.$HOME.'Manual/calculation/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
require_once ('../system/footer.php');
exit();
}











if($_GET['pay'] == ok_grn) {
$summa = abs(intval($_POST['summa']));
if($summa == 0){
header('Location: ?');
exit();
}
echo '<div class="content small minor">Цена 1 рубина =  0,005 Грн.</div>';
echo '<hr>';
echo 'На '.$_POST['summa'].' грн Вы получите <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">';

$bon_grn = $summa*2;
$gold = $summa / 0.005;
$bon1 = (($gold * $bon_grn) / 100);
if($promotions['promotion_1'] == 1){
$rubin = $gold + (($gold * $promotions['act_1']) / 100)+$bon1;
}else{
$rubin = ($gold+$bon1);
}
echo ' '.$rubin.' ';
echo '</span>';
echo '</center></div>';
echo '<div class="content small minor">Сумма указана с учетом акций и бонусов.</div>';
echo '<a class="btnl mt4" href="'.$HOME.'Manual/calculation/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
require_once ('../system/footer.php');
exit();
}













echo '<div class="content small minor">Цена 1 рубина =  0,005 Грн.</div>';
echo '<hr>';
?>
<div class="block"> <form class="" action="?pay=ok_grn" method="POST">
Сумма (Грн):</br>
<input type="number" name="summa" maxlength="50" value="1" class="text"/><br />
<input class="mt4" type="submit" value="Подсчитать">
</form>
</div>
<?
echo '</center></div><br>';




echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';
echo '<div class="content small minor">Цена 1 рубина =  0,01 руб.</div>';
echo '<hr>';


?>
<div class="block"> <form class="" action="?pay=ok_rub" method="POST">
Сумма (Руб):</br>
<input type="number" name="summa" maxlength="50" value="1" class="text"/><br />
<input class="mt4" type="submit" value="Подсчитать">
</form>
</div>
<?




echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'Manual/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';


require_once ('../system/footer.php');
?>