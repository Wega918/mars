<?php
$title = 'Норма взноса';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['soyz'] == 0) {
header('Location: /');
exit();
}
if($user['soyz_rang'] > 2) {
header('Location: /');
exit();
}






if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/fond/'.$user['soyz'].'/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Настройки нормы взноса</a>';
}















if (isset($_POST['submit'],$_POST['Rate_of_contribution'])){
$Rate_of_contribution = strong($_POST['Rate_of_contribution']);


if(mb_strlen($Rate_of_contribution) > 30 or mb_strlen($Rate_of_contribution) < 3){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Введите название от 3 до 30 символов!</font>';
exit();
}

mysql_query("UPDATE `soyz` SET `Rate_of_contribution` = '". $Rate_of_contribution ."'  WHERE `id` = '". $soyz['id'] ."' LIMIT 1");
header('Location: '.$HOME.'soyz/fond/'.$user['soyz'].'/');
$_SESSION['err'] = 'Успешно!';
exit();
}







echo '<div class="bordered">
<center><form action="" method="POST">
Введите сумму:<br> <input type="text" style="width: 95%;" name="Rate_of_contribution" value="'.$soyz['Rate_of_contribution'].'" maxlength="30" > 
<input class="mt4" type="submit" name="submit" value="Сохранить">
</form></center>

</div>';



echo '<center><div class="minor">Установите недельную норму взноса рубинов в фонд Союза!</div></center>';







echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'/"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> В Союз</a>';


require_once ('../system/footer.php');
?>