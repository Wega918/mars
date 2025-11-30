<?php
$title = 'Покупка шахт';
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

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font size="4">'.$title.'<hr>
<font size=2>Здесь Вы можете приобрести шахты разного вида. Каждый вид шахты приносит и добывает разное количество и вид кристаллов, которые можно потом продать, получая славу.<br>
Слава используется при активации Боевой силы в Сражениях.
</font>
</font></span></li></ul></div>';



if (empty($user['max'])) $user['max']=10;
$max = 6;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$mines = mysql_query("SELECT * FROM `mines` ORDER BY `id` ASC LIMIT $start,$max");
while($min = mysql_fetch_assoc($mines)){
$coll = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' and `level` = '".$min['id']."' "),0);

echo '<font size=2>';
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<table border="0" class="tabss" cellspacing="0" cellpadding="0" align="center">
	<tbody><tr>
	<center><img src="/mines/images/'.$min['id'].'.png" style="width:85px;"><center>
	<center>Шахта '.$min['id'].'-го уровня<center>

	<li><font style="color:#73b8bc;">Вид добычи:</font> <font style="color:#128201;">'.$min['name'].'</font></li>
	<li><font style="color:#73b8bc;">Добыча шахты:</font> '.$min['production'].'  <font style="color:#128201;">в час</font></li>
	<li><font style="color:#73b8bc;">Стоимость:</font> <font style="color:red"> <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$min['cost'].'</font></li>
	<li><font style="color:#73b8bc;">Куплено:</font> '.$coll.' <font style="color:#128201;">штук</font></li>

	</tr>
</tbody></table>';




if (isset($_POST['submit'.$min['id'].''])){

if($min['id'] == 1){$erer = 100;}
if($min['id'] == 2){$erer = 100;}
if($min['id'] == 3){$erer = 100;}
if($min['id'] == 4){$erer = 100;}
if($min['id'] == 5){$erer = 100;}
if($min['id'] == 6){$erer = 100;}


$number = strong($_POST['number']);
if(($coll+$number) > $erer){$_SESSION['err'] = '<font color=red>Ограничение, максимум '.$erer.' шахт</font>';header('Location: ?');exit();}
if($user['rubin'] < ($min['cost']*$number) ){$_SESSION['err'] = '<font color=red>Ошибка! Не Хватает рубинов.</font>';header('Location: ?');exit();}
if($number <= 0){$_SESSION['err'] = '<font color=red>Введите колличество.</font>';header('Location: ?');exit();}
if($number > 100){$_SESSION['err'] = '<font color=red>Введите колличество меньше чем 100.</font>';header('Location: ?');exit();}
$minnn = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $number");
$minn = mysql_fetch_array ($minnn);
do {
mysql_query("INSERT INTO `mines_user` SET `user` = '".$user['id']."', `production` = '".$min['production']."', `level` = '".$min['id']."' ");
} while ($minn = mysql_fetch_array ($minnn));
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] - ($number*$min['cost']) )."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> <font color=green>Шахты успешно куплены!</font>';
header('Location: ?');
exit();
}
echo '<div class="bordered mt4">
<form action="" method="POST"><label>Количество:<input type="number" style="max-width: 75px;" value="1" name="number"></label>
<input class="mt4" type="submit" name="submit'.$min['id'].'" value="Купить"></form></div>';

echo '</span></li></ul></div>';
echo '</font>';
}












echo '<a class="btnl mt4" href="'.$HOME.'mines/">назад</a>';



require_once ('../system/footer.php');
?>