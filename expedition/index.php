<?php
$title = 'Экспедиция';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//

if(!$user['id']) {
header('Location: /');
exit();
}
if($expedition_user['time'] > time() ){
header('Location: '.$HOME.'expeditions/');
exit();
}
if($expedition_pom_1 or $expedition_pom_2 or $expedition_pom_3 or $expedition_pom_4 or $expedition_pom_5 ){
header('Location: '.$HOME.'expeditions/');
exit();
}
if($expedition_user['time'] < time() && $expedition_user['time'] > 0){
header('Location: '.$HOME.'sav/');
exit();
}

echo '<div class="content">
<a class="fl" href="'.$HOME.'mission/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Задания" title="Задания"></a>
<a class="fr" href="'.$HOME.'prestig/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Престиж" title="Престиж"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';



echo '<br>';
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<font  size=4>'.$title.'</font>';
echo '</span></li></ul></div>';




if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `expedition` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$expeditions = mysql_query("SELECT * FROM `expedition` WHERE `id`  ORDER BY `id` ASC LIMIT $start,$max");
while($exp = mysql_fetch_assoc($expeditions)){

echo '<div class="feedback"><div><div style="margin-top: 4px;">
<span class="fl nobr"><span><font size=2>Уровень экспедиции: <font color=black>'.$exp['level'].'</font></font></span></span>
<span class="fr nobr"><span><img width="18" height="18" alt="" src="/images/clock.png"> <font size=2 color=black>'.($exp['time']/3600).' ч.</font></span></span>
<br><hr>';


if(!$expedition_user){
echo '<td style="vertical-align:top;width:5%;"><center>
<img src="/images/ruby.png" width="30" height="30"><br><font color=red size=2><b>'.($exp['rubin']+$exp['rubin_1']).'</b></font></center></td> ';

$rand = rand(1,20);
echo '<td style="vertical-align:top;width:5%;"><center><span class="count_room">х'.$exp['mnogit'].'</span><img src="/images/card/'.$rand.'.png" width="30" height="30"> ';

echo '<span class="count_room">х'.$exp['mnogit'].'</span><img src="/images/VIP/udvoitel.png" width="30" height="30"> 
</center></td>';
}



echo '<hr>';
if($user['time_expedition'] < time() ){
echo '<a class="btnl mt4" href="?Apid'.$exp['id'].'">Выбрать экспедицию</a>';
}else{
echo 'Доступно через: <font color=black><span id="time_'.($user['time_expedition']-time()).'000">'._time($user['time_expedition']-time()).'</span></font>';
}
echo '</span></li></ul></div></div></div>';


if(isset($_GET['Apid'.$exp['id'].''])){
if($user['time_expedition'] >= time()) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Будет доступно через: <font color=black><span id="time_'.($user['time_expedition']-time()).'000">'._time($user['time_expedition']-time()).'</span></font></font>';exit();}
if($expedition_user['time'] >= time()) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Экспедиция не закончена!</font>';exit();}
mysql_query("INSERT INTO `expedition_user` SET `musor` = '".$exp['musor']."',`level` = '".$exp['level']."',`time` = '".(time()+$exp['time'])."',`rubin` = '".$exp['rubin']."',`rubin_1` = '".$exp['rubin_1']."',`card` = '".$exp['card']."',`mnogit_time` = '".$exp['mnogit_time']."',`mnogit` = '".$exp['mnogit']."',`level_` = '1',`user` = '".$user['id']."' ");
header('Location: '.$HOME.'expeditions/');
exit();
}


}





//mysql_query("INSERT INTO `expedition` SET `rubin` = '1' ");





require_once ('../system/footer.php');
?>