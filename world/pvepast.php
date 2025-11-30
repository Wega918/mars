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
$dsdsds = mysql_query("SELECT * FROM `pve` WHERE `id` ORDER BY `time_over` desc LIMIT $start,$max");
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


if($testee['boy_vid'] == 2 ){
if($testee['pobeda'] == 1){
$pobeda = '<font color=green size=2><b>Победа!</b></font>';
}elseif($testee['pobeda'] == 2){
$pobeda = '<font color=red size=3><b>Поражение!</b></font>';
}elseif($testee['pobeda'] == 3){
$pobeda = '<font color=red size=3><b>Поражение!</b></font><br><font color=grey size=2>Вышло время</font>';
}}else{
if($testee['pobeda'] == 1){
$pobeda = '<font color=green size=2><b>Победу одержали союзники!</b></font><br><font color=grey size=2>Все враги убиты</font>';
}elseif($testee['pobeda'] == 2){
$pobeda = '<font color=red size=3><b>Победу одержали враги!</b></font><br><font color=grey size=2>Все союзники убиты</font>';
}elseif($testee['pobeda'] == 3){
$pobeda = '<font color=red size=3><b>Победу одержали враги!</b></font><br><font color=grey size=2>Вышло время</font>';
}
}


echo '<div class="bordered" style="margin-top: 4px; position: relative;">
<img src="/world/images/pve/'.$testee['id'].''.$testee['id'].'.png" alt="" width="50" height="50" style="border-radius: 12px;float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><div class="minor"><span><font size="3">'.$testee['name'].'</font></span></div></div>
<span><font size="2" color="black">закончилась '.time_last($testee['time_over']).'</font></span><br>
<span><font size="2" color="grey">'.$operation.'</font></span>
<br><br>
<center>'.$pobeda.'</center>';

$iuyy = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$testee['user']."'"));
if($testee['boy_vid'] == 2 and $testee['user'] != 0 and $testee['pobeda'] == 1){
echo '<center><font size=2>
<br><b>Лучший за битву:</b><br>';
echo '<img width="20" height="20" src="/world/images/'.$iuyy['rank'].'.png"> '.nick($iuyy['id']).':  <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">500</font><br>';
}





echo '<center><font size=2>
<br><b>Лучшие по убийствам</b><br>';


if($testee['pobeda'] <= 1){
if($ank_1_){
echo '<img width="20" height="20" src="/world/images/'.$ank_1_['rank'].'.png"> '.nick($testee['top_1_kill']).': <font color=black>убито '.$testee['kill_1'].'</font> <img src="/chests/chests/6.png" width="20" height="20" alt=""><br>';
}
if($ank_2_){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_['rank'].'.png"> '.nick($testee['top_2_kill']).': <font color=black>убито '.$testee['kill_2'].'</font> <img src="/chests/chests/5.png" width="20" height="20" alt=""><br>';
}
if($ank_3_){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_['rank'].'.png"> '.nick($testee['top_3_kill']).': <font color=black>убито '.$testee['kill_3'].'</font> <img src="/chests/chests/4.png" width="20" height="20" alt=""><br>';
}
if($ank_4_){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_['rank'].'.png"> '.nick($testee['top_4_kill']).': <font color=black>убито '.$testee['kill_4'].'</font> <img src="/chests/chests/3.png" width="20" height="20" alt=""><br>';
}
if($ank_5_){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_['rank'].'.png"> '.nick($testee['top_5_kill']).': <font color=black>убито '.$testee['kill_5'].'</font> <img src="/chests/chests/2.png" width="20" height="20" alt=""><br>';
}
echo '<br>
<b>Лучшие по урону</b><br>';
if($ank_1_1){
echo '<img width="20" height="20" src="/world/images/'.$ank_1_1['rank'].'.png"> '.nick($testee['top_1_uron']).': <font color=black>'.$testee['uron_1'].' урона </font> <img src="/chests/chests/6.png" width="20" height="20" alt=""><br>';
}
if($ank_2_2){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_2['rank'].'.png"> '.nick($testee['top_2_uron']).': <font color=black>'.$testee['uron_2'].' урона </font> <img src="/chests/chests/5.png" width="20" height="20" alt=""><br>';
}
if($ank_3_3){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_3['rank'].'.png"> '.nick($testee['top_3_uron']).': <font color=black>'.$testee['uron_3'].' урона </font> <img src="/chests/chests/4.png" width="20" height="20" alt=""><br>';
}
if($ank_4_4){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_4['rank'].'.png"> '.nick($testee['top_4_uron']).': <font color=black>'.$testee['uron_4'].' урона </font> <img src="/chests/chests/3.png" width="20" height="20" alt=""><br>';
}
if($ank_5_5){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_5['rank'].'.png"> '.nick($testee['top_5_uron']).': <font color=black>'.$testee['uron_5'].' урона </font> <img src="/chests/chests/2.png" width="20" height="20" alt=""><br>';
}
}else{
echo '<img width="20" height="20" src="/world/images/'.$ank_1_['rank'].'.png"> '.nick($testee['top_1_kill']).': <font color=black>убито '.$testee['kill_1'].'</font> <br>';
if($ank_2_){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_['rank'].'.png"> '.nick($testee['top_2_kill']).': <font color=black>убито '.$testee['kill_2'].'</font> <br>';
}
if($ank_3_){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_['rank'].'.png"> '.nick($testee['top_3_kill']).': <font color=black>убито '.$testee['kill_3'].'</font> <br>';
}
if($ank_4_){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_['rank'].'.png"> '.nick($testee['top_4_kill']).': <font color=black>убито '.$testee['kill_4'].'</font> <br>';
}
if($ank_5_){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_['rank'].'.png"> '.nick($testee['top_5_kill']).': <font color=black>убито '.$testee['kill_5'].'</font> <br>';
}
echo '<br>
<b>Лучшие по урону</b><br>';
if($ank_1_1){
echo '<img width="20" height="20" src="/world/images/'.$ank_1_1['rank'].'.png"> '.nick($testee['top_1_uron']).': <font color=black>'.$testee['uron_1'].' урона </font> <br>';
}
if($ank_2_2){
echo '<img width="20" height="20" src="/world/images/'.$ank_2_2['rank'].'.png"> '.nick($testee['top_2_uron']).': <font color=black>'.$testee['uron_2'].' урона </font> <br>';
}
if($ank_3_3){
echo '<img width="20" height="20" src="/world/images/'.$ank_3_3['rank'].'.png"> '.nick($testee['top_3_uron']).': <font color=black>'.$testee['uron_3'].' урона </font> <br>';
}
if($ank_4_4){
echo '<img width="20" height="20" src="/world/images/'.$ank_4_4['rank'].'.png"> '.nick($testee['top_4_uron']).': <font color=black>'.$testee['uron_4'].' урона </font> <br>';
}
if($ank_5_5){
echo '<img width="20" height="20" src="/world/images/'.$ank_5_5['rank'].'.png"> '.nick($testee['top_5_uron']).': <font color=black>'.$testee['uron_5'].' урона </font> <br>';
}
}

$pve_nagrada_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_nagrada_history` WHERE `time` = '".$testee['time_over']."' and `user` = '".$user['id']."' ORDER BY `time` + '1' DESC LIMIT 1 "));
if($pve_nagrada_history){
echo '<br><br>';
echo '<font size="2">Нанесено урона: </font><font color="black">'.$pve_nagrada_history['uron'].'</font> <br>
<font size="2">Убито врагов: </font><font color="black">'.$pve_nagrada_history['kill_bots'].'</font><br>';

if ($testee['boy_vid'] == 1) {
    if ($pve_nagrada_history['pobeda'] == 1) {
        $stones   = ceil(($pve_nagrada_history['kill_bots'] * 2) + (($pve_nagrada_history['uron'] / 1000) * 6));
        $diamonds = $stones;
        $rubies   = ceil(100 * $pve_nagrada_history['kill_bots']);
    } else {
        $stones   = ceil(($pve_nagrada_history['kill_bots'] * 2) + ((($pve_nagrada_history['uron'] / 1000) * 6) / 4));
        $diamonds = $stones;
        $rubies   = ceil((100 * $pve_nagrada_history['kill_bots']) / 4);
    }
} else {
    if ($pve_nagrada_history['pobeda'] == 1) {
        $stones       = ceil(($pve_nagrada_history['kill_bots'] * 5) + (($pve_nagrada_history['uron'] / 1000) * 24));
        $diamonds     = $stones;
        $rubies       = ceil(50 * $pve_nagrada_history['kill_bots']);
        $rubies_extra = ceil($pve_nagrada_history['where_rubin']);
    } else {
        $stones       = ceil(($pve_nagrada_history['kill_bots'] * 5) + ((($pve_nagrada_history['uron'] / 1000) * 24) / 4));
        $diamonds     = $stones;
        $rubies       = ceil((50 * $pve_nagrada_history['kill_bots']) / 4);
        $rubies_extra = ceil($pve_nagrada_history['where_rubin']);
    }
}

// Вывод
echo '<font size="2">Награда: </font>
<img width="20" height="20" alt="камни" src="/images/colections/22.png" title="камни"> <font color="black">'.$stones.'</font>
<img width="20" height="20" alt="алмазы" src="/images/Diamonds.png" title="алмазы"> <font color="black">'.$diamonds.'</font>
<img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> <font color="red">'.$rubies.'</font>'.
(isset($rubies_extra) ? '<font color="red">+'.$rubies_extra.'</font>' : '')
.'<br>';


}




if($testee['boy_vid'] == 2){
echo '<br><span><font size="2">Сражалось <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$testee['where_user'].'</font> <font size="4">|</font>
<font size="2">Выжило <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$testee['user_vigilo'].'</font>
</font></span></div></font></center>';
}else{
echo '<br>
<span><font size="2">В битве сражались: <br>
игроки <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$testee['where_user'].'</font>   <font size="4">|</font> враги <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.$testee['where_bot'].'</font> </font></span>
<br>
Выжили: <br>
игроки <img width="22" height="22" src="/images/avatars/1/on/1.png"> <font color=black>'.$testee['user_vigilo'].'</font>   <font size="4">|</font> враги <img width="20" height="20" src="/world/images/pv.png"> <font color=black>'.($testee['bot_vigilo']).'</font> </font></span>

</div></font></center>';
}

}











echo '<a class="btnl mt4" href="'.$HOME.'pve/">Вернуться</a>';
require_once ('../system/footer.php');
?>