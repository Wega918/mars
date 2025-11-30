<?php
$title = 'Персонаж';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));
if($ank == 0){
header('Location: /');
$_SESSION['err'] = 'Такого пользователя не существует!';
exit();
}




echo '<br>';
if($promotions['promotion_13'] == 1){
echo '<div class="bgcontent"><div class="content tred">
<div class="pt"><ul><li class="center">Скидка на прокачку персонажа '.$promotions['act_13'].'%</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_13'] - time()).'</span></div>
</div></div><br>';
}






$Improvements = mysql_fetch_assoc(mysql_query("SELECT * FROM `Improvements` WHERE `user` = '".$ank['id']."'"));

if($ank['id'] == $user['id']){




echo '<center><div class="bordered" style="margin-top: 4px; position: relative;">
<span><img width="16" height="16" src="/world/images/'.$ank['rank'].'.png"> <font color='.$ank['colors'].'>'.nick($ank['id']).'</font></span><hr>
<div class="" style="margin-top: 5px; position: relative;"><img src="/world/images/u.png" alt="*"> <font size=2 color=black>'.$ank['u'].'</font> | <img src="/world/images/z.png" alt="*"> <font size=2 color=black>'.$ank['z'].'</font> | <img src="/world/images/h.png" alt="*"> <font size=2 color=black>'.$ank['h'].'</font></div>
<div class="" style="margin-top: 9px; position: relative;"><img src="/images/maneken/'.$ank['rank'].'.png" alt="" style="width:100%; border-radius: 4px;"></div>
<hr><a class="btni" style="min-width:160px;margin:4px;" href="'.$HOME.'Improvements/"><span><span>Улучшения</span></span></a>
<a class="btni" style="min-width:160px;margin:4px;" href="'.$HOME.'Modification/"><span><span>Модификация</span></span></a>
<a class="btni" style="min-width:160px;margin:4px;" href="'.$HOME.'trine/"><span><span>Тренеровка</span></span></a>
</div></center>';












}else{






echo '<center><div class="bordered" style="margin-top: 4px; position: relative;">
<span><img width="16" height="16" src="/world/images/'.$ank['rank'].'.png"> <font color='.$ank['colors'].'>'.nick($ank['id']).'</font></span><hr>
<div class="" style="margin-top: 5px; position: relative;"><img src="/world/images/u.png" alt="*"> <font size=2 color=black>'.$ank['u'].'</font> | <img src="/world/images/z.png" alt="*"> <font size=2 color=black>'.$ank['z'].'</font> | <img src="/world/images/h.png" alt="*"> <font size=2 color=black>'.$ank['h'].'</font><div>
<div class="" style="margin-top: 9px; position: relative;"><img src="/images/maneken/'.$ank['rank'].'.png" alt="" style="width:100%; border-radius: 4px;"></div>
<hr>
<span class="count_room">'.$Improvements['mod'].'</span><img src="/world/images/u_.png" alt="*">
<span class="count_room">'.$Improvements['mod'].'</span><img src="/world/images/z_.png" alt="*"> 
<span class="count_room">'.$Improvements['mod'].'</span><img src="/world/images/h_.png" alt="*">

<br>Тренировка: <div class="" style="margin-top: 5px; position: relative;"><img src="/world/images/u.png" alt="*"> <font size=2 color=black>'.$Improvements['trine_u'].'/80</font> | <img src="/world/images/z.png" alt="*"> <font size=2 color=black>'.$Improvements['trine_z'].'/80</font> | <img src="/world/images/h.png" alt="*"> <font size=2 color=black>'.$Improvements['trine_h'].'/80</font><div>
<hr>Модификация: <div class="" style="margin-top: 5px; position: relative;"><img src="/world/images/u_.png" width="10%" alt="*"> <font size=2 color=black>'.$Improvements['mod'].'/80</font> <div>

</div></center>';



















}










require_once ('../system/footer.php');
?>