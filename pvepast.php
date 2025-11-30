<?php
$title = 'Сражения';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


$pve_zayavki = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_zayavki` WHERE `user` = '".$user['id']."'"));
$pve_zayavki_koll =mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `id` "),0);
//echo ''. (time() + (3600*14) ).'';

if($pve1['time_pve'] > time() ) {
header('Location: '.$HOME.'pve_boy/');
exit();
}
if($pve1['time'] < time() ) {
header('Location: '.$HOME.'pve_boy/');
exit();
}





if (empty($user['max'])) $user['max']=10;
$max = 3;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$dsdsds = mysql_query("SELECT * FROM `pve` WHERE `id` ORDER BY `time_over` + '1' DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>Прошедшие сражение:</b></span></li></ul></div>';
while($sds = mysql_fetch_assoc($dsdsds)){

$testee = mysql_query('SELECT * FROM `pve` WHERE `id` = "'.$sds['id'].'" ');
$testee = mysql_fetch_array($testee);


$ank_1_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_1_kill']."'"));
$ank_2_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_2_kill']."'"));
$ank_3_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_3_kill']."'"));
$ank_4_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_4_kill']."'"));
$ank_5_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_5_kill']."'"));

$ank_1_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_1_uron']."'"));
$ank_2_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_2_uron']."'"));
$ank_3_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_3_uron']."'"));
$ank_4_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_4_uron']."'"));
$ank_5_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['top_5_uron']."'"));


if($testee['pobeda'] == 1){$pobeda = '<font color=green size=2><b>Победу одержали союзники!</b></font><br><font color=grey size=2>Все враги убиты</font>';}else{$pobeda = '<font color=red size=3><b>Победу одержали враги!</b></font><br><font color=grey size=2>Все союзники убиты</font>';
}


echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<img src="/world/images/pve/'.$testee['id'].'.png" alt="" width="50" height="50" style="border-radius: 12px;float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><div class="minor"><span><font size="3">'.$testee['name'].'</font></span></div></div>
<span><font size="2" color="black">закончилась '.time_last($testee['time_over']).'</font></span><br>
<span><font size="2" color="grey">'.$operation.'</font></span>
<br><br>
<center>'.$pobeda.'</center>


<center><font size=2>
<br><b>Лучшие по убийствам</b><br>
<img width="20" height="20" src="/world/images/'.$ank_1_['rank'].'.png"> '.nick($testee['top_1_kill']).': <font color=black>убито '.$testee['kill_1'].'</font><br>
<img width="20" height="20" src="/world/images/'.$ank_2_['rank'].'.png"> '.nick($testee['top_2_kill']).': <font color=black>убито '.$testee['kill_2'].'</font><br>
<img width="20" height="20" src="/world/images/'.$ank_3_['rank'].'.png"> '.nick($testee['top_3_kill']).': <font color=black>убито '.$testee['kill_3'].'</font><br>
<img width="20" height="20" src="/world/images/'.$ank_4_['rank'].'.png"> '.nick($testee['top_4_kill']).': <font color=black>убито '.$testee['kill_4'].'</font><br>
<img width="20" height="20" src="/world/images/'.$ank_5_['rank'].'.png"> '.nick($testee['top_5_kill']).': <font color=black>убито '.$testee['kill_5'].'</font><br>

<br>
<b>Лучшие по урону</b><br>
<img width="20" height="20" src="/world/images/'.$ank_1_1['rank'].'.png"> '.nick($testee['top_1_uron']).': <font color=black>'.$testee['uron_1'].' урона </font><br>
<img width="20" height="20" src="/world/images/'.$ank_2_2['rank'].'.png"> '.nick($testee['top_2_uron']).': <font color=black>'.$testee['uron_2'].' урона </font><br>
<img width="20" height="20" src="/world/images/'.$ank_3_3['rank'].'.png"> '.nick($testee['top_3_uron']).': <font color=black>'.$testee['uron_3'].' урона </font><br>
<img width="20" height="20" src="/world/images/'.$ank_4_4['rank'].'.png"> '.nick($testee['top_4_uron']).': <font color=black>'.$testee['uron_4'].' урона </font><br>
<img width="20" height="20" src="/world/images/'.$ank_5_5['rank'].'.png"> '.nick($testee['top_5_uron']).': <font color=black>'.$testee['uron_5'].' урона </font><br>

<br>
<span><font size="2">В битве сражались: <br>
игроки <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$testee['where_user'].'</font>   <font size="4">|</font> враги <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.$testee['where_bot'].'</font> </font></span>
<br>
Выжили: <br>
игроки <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$testee['user_vigilo'].'</font>   <font size="4">|</font> враги <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.($testee['bot_vigilo']-1).'</font> </font></span>

</div></font></center>';


}











echo '<a class="btnl mt4" href="'.$HOME.'pve/">Вернуться</a>';
require_once ('../system/footer.php');
?>