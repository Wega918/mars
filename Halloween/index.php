<?php
$title = 'Хэллоуин';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


if($promotions['promotion_12'] != 1){
header('Location: /');
exit();
}















if($promotions['act_12'] == 1){


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font size=3 color=#cc670e><b>Хэллоуин</b></font><br><font size=1>конец через:</font> <font size=1 color=black><span id="time_'.($promotions['time_12']-time()).'000">'._time($promotions['time_12']-time()).'</span></font></center></span></li></ul></div>';
echo '<center><img src="/Halloween/images/halloween.png" alt="" style="width:98%; border-radius: 8px;"></center>';

echo '<hr><br><center>
<span class="count_room">'.$halloween1['koll'].'</span><a href="?b7H3djf4Ggd3G'.$halloween1['koll'].'4GgH"><img src="/Halloween/images/1.png" alt="" width="50" height="50" "=""></a>
<span class="count_room">'.$halloween2['koll'].'</span><a href="?djfb3d4G7HgdH'.$halloween2['koll'].'4HGg"><img src="/Halloween/images/2.png" alt="" width="50" height="50" "=""></a>
<span class="count_room">'.$halloween3['koll'].'</span><a href="?jf4Gd3G3gb73G'.$halloween3['koll'].'gH4G"><img src="/Halloween/images/3.png" alt="" width="50" height="50" "=""></a>
<span class="count_room">'.$halloween4['koll'].'</span><a href="?4Gb7H3dd3Gjfg'.$halloween4['koll'].'g4GH"><img src="/Halloween/images/4.png" alt="" width="50" height="50" "=""></a>
<span class="count_room">'.$halloween5['koll'].'</span><a href="?djgd3f4Gb7H3G'.$halloween5['koll'].'H4Gg"><img src="/Halloween/images/5.png" alt="" width="50" height="50" "=""></a>
<span class="count_room">'.$halloween6['koll'].'</span><a href="?b7jf4GH3dgd3G'.$halloween6['koll'].'GHg4"><img src="/Halloween/images/6.png" alt="" width="50" height="50" "=""></a>
</center><br>';


if (isset($_SESSION['halloween'])){
?><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><?=$_SESSION['halloween']?></span></li></ul></div><hr><?php
unset($_SESSION['halloween']);}else{

}
$kol_his = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` > 0 "),0);
if($kol_his > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<center>Последние 10 наград:</center><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$chests_history = mysql_query("SELECT * FROM `chests_history` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($c_h = mysql_fetch_assoc($chests_history)){
if($c_h['user'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
if($c_h['text'] == 'Деревянный сундук (хэллоуин)' or $c_h['text'] == 'Деревянный сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Серебряный сундук (хэллоуин)' or $c_h['text'] == 'Серебряный сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Золотой сундук (хэллоуин)' or $c_h['text'] == 'Золотой сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Королевский сундук (хэллоуин)' or $c_h['text'] == 'Королевский сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Магический сундук (хэллоуин)' or $c_h['text'] == 'Магический сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Легендарный сундук (хэллоуин)' or $c_h['text'] == 'Легендарный сундук 10шт. (хэллоуин)'){
$tests = '<img src="/Halloween/images/'.$c_h['tip'].'.png" alt="" width="20" height="20" "=""> ';
}else{
$tests = '';
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($c_h['user']).'</span></span></span>
<span class="fr nobr">'.$tests.'<img width="24" height="24" alt="" src="/chests/chests/'.$c_h['tip'].'.png"> <font color=black size=1>'.time_last($c_h['time']).'</font></span>
<div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Halloween/?',$k_page,$page); // Вывод страниц
}

}else{
echo '<hr>';
}
echo '<font size="2"><font color="black"> <font size="3">•</font> Хєллоуин</font> - <b>собирай тыквы и обменивай их на сундуки.</b></font>';
echo '<br><font size="2"><font color="black"> <font size="3">•</font> Награда по итогам Турнира</font> - <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(1*100000000000).'%</font> <font size=2><b>за каждую найденную Тыкву.</b></font>';

#############################################################################################################################################################


if(isset($_GET['b7H3djf4Ggd3G'.$halloween1['koll'].'4GgH'])){ // 1
$_SESSION['halloween'] = '
Обмен тыкв: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?1_x10"><span class="count_room">10</span><img src="/Halloween/images/1.png" alt="" width="40" height="40" "=""> => <span class="count_room">1</span><img src="/chests/chests/1.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?1_x100"><span class="count_room">100</span><img src="/Halloween/images/1.png" alt="" width="40" height="40" "=""> => <span class="count_room">10</span><img src="/chests/chests/1.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['djfb3d4G7HgdH'.$halloween2['koll'].'4HGg'])){ // 2
$_SESSION['halloween'] = '
Обмен тыкв: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?2_x10"><span class="count_room">10</span><img src="/Halloween/images/2.png" alt="" width="40" height="40" "=""> => <span class="count_room">1</span><img src="/chests/chests/2.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?2_x100"><span class="count_room">100</span><img src="/Halloween/images/2.png" alt="" width="40" height="40" "=""> => <span class="count_room">10</span><img src="/chests/chests/2.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['jf4Gd3G3gb73G'.$halloween3['koll'].'gH4G'])){ // 3
$_SESSION['halloween'] = '
Обмен тыкв: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?3_x10"><span class="count_room">10</span><img src="/Halloween/images/3.png" alt="" width="40" height="40" "=""> => <span class="count_room">1</span><img src="/chests/chests/3.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?3_x100"><span class="count_room">100</span><img src="/Halloween/images/3.png" alt="" width="40" height="40" "=""> => <span class="count_room">10</span><img src="/chests/chests/3.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['4Gb7H3dd3Gjfg'.$halloween4['koll'].'g4GH'])){ // 4
$_SESSION['halloween'] = '
Обмен тыкв: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?4_x10"><span class="count_room">10</span><img src="/Halloween/images/4.png" alt="" width="40" height="40" "=""> => <span class="count_room">1</span><img src="/chests/chests/4.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?4_x100"><span class="count_room">100</span><img src="/Halloween/images/4.png" alt="" width="40" height="40" "=""> => <span class="count_room">10</span><img src="/chests/chests/4.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['djgd3f4Gb7H3G'.$halloween5['koll'].'H4Gg'])){ // 5
$_SESSION['halloween'] = '
Обмен тыкв: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?5_x10"><span class="count_room">10</span><img src="/Halloween/images/5.png" alt="" width="40" height="40" "=""> => <span class="count_room">1</span><img src="/chests/chests/5.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?5_x100"><span class="count_room">100</span><img src="/Halloween/images/5.png" alt="" width="40" height="40" "=""> => <span class="count_room">10</span><img src="/chests/chests/5.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['b7jf4GH3dgd3G'.$halloween6['koll'].'GHg4'])){ // 6
$_SESSION['halloween'] = '
Обмен тыкв: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?6_x10"><span class="count_room">10</span><img src="/Halloween/images/6.png" alt="" width="40" height="40" "=""> => <span class="count_room">1</span><img src="/chests/chests/6.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?6_x100"><span class="count_room">100</span><img src="/Halloween/images/6.png" alt="" width="40" height="40" "=""> => <span class="count_room">10</span><img src="/chests/chests/6.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}







#################################################################################################################################










if(isset($_GET['1_x10'])){ // 1
if($halloween1['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/1.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 1;
$chests_name = 'Деревянный сундук (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween1['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '1' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['1_x100'])){ // 1
if($halloween1['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/1.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 1;
$chests_name = 'Деревянный сундук 10шт. (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween1['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '1' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['2_x10'])){ // 2
if($halloween2['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/2.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 2;
$chests_name = 'Серебряный сундук (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween2['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '2' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['2_x100'])){ // 2
if($halloween2['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/2.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 2;
$chests_name = 'Серебряный сундук 10шт. (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween2['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '2' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['3_x10'])){ // 3
if($halloween3['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/3.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 3;
$chests_name = 'Золотой сундук (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween3['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '3' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['3_x100'])){ // 3
if($halloween3['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/3.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 3;
$chests_name = 'Золотой сундук 10шт. (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween3['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '3' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['4_x10'])){ // 4
if($halloween4['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/4.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 4;
$chests_name = 'Королевский сундук (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween4['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '4' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['4_x100'])){ // 4
if($halloween4['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/4.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 4;
$chests_name = 'Королевский сундук 10шт. (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween4['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '4' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['5_x10'])){ // 5
if($halloween5['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/5.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 5;
$chests_name = 'Магический сундук (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween5['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '5' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['5_x100'])){ // 5
if($halloween5['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/5.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 5;
$chests_name = 'Магический сундук 10шт. (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween5['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '5' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['6_x10'])){ // 6
if($halloween6['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/6.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 6;
$chests_name = 'Легендарный сундук (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween6['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '6' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['6_x100'])){ // 6
if($halloween6['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/6.png" width="20" height="20"> тыкв!</font> ';header('Location: ?');exit();}
$rand_chests = 6;
$chests_name = 'Легендарный сундук 10шт. (хэллоуин)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween6['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '6' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}


























if($kol_his > 0){if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить историю</a>';
}}

if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю ?
<div class="mt4"><a class="btni accept" href="?Reset/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset/'])){
if($user['level'] != 3){header('Location: ?');exit();}
mysql_query('DELETE FROM `chests_history` WHERE `id` ');
header('Location: ?');
exit();
}








/*
Собирай тыквы по игре и обменивай их на сундуки.
Не забудьте обменять все тыквы до конца акции, иначе они сгорят
Не пытайтесь накрутить тыквы обновляя страницу, они выпадают по оссобому алгоритму активности.



добавить таблицу halloween
добавить в таблицу promotions поля для акции хэллоуин
добавить в таблицу users полe koll


*/

}
















































































































///////////////////////////////////////////////////////////////////////////////////// НОВЫЙ ГОД


if($promotions['act_12'] == 2){

//$timer = 1609448386;
$timer = 1640995199;

?>
<script type="text/javascript">var currentyear=new Date().getFullYear();
    var thischristmasyear=(new Date().getMonth()==0&&new Date().getDate()==1)?currentyear: currentyear+1;
    var christmas=new cdtime("countdowncontainer2", "january 1,  "+thischristmasyear+" 0: 0:00");
    christmas.displaycountdown("days", formatresults2);
    </script>
	
		<style>
@font-face {
	font-family: MyUniqueFont;
    src: url('/17450.otf');
}
   .user_font {
    font-family: MyUniqueFont;
    font-size:23px;
   }
</style>
<?


if(time() < $timer) {
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<div class="user_font"><center><font color="#43a5ff">С Наступающим Новым 2024 Годом!!!<br>До нового года осталось:<br>  
<span id="time_'.($timer-time()).'000">'._time($timer-time()).'</span> </font>
<hr><font color=grey size=4>До завершения акции осталось:</font> <font size=1 color=black><span id="time_'.($promotions['time_12']-time()).'000">'._time($promotions['time_12']-time()).'</span></font></center>
</center></div>
</span></li></ul></div>';
}else{
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<div class="user_font"><center><font color="#43a5ff">С Новым 2024 Годом!!!</font>
<br><font size=1>До завершения акции осталось:</font> <font size=1 color=black><span id="time_'.($promotions['time_12']-time()).'000">'._time($promotions['time_12']-time()).'</span></font></center>
</center></div>
</span></li></ul></div>';
}

echo '<center><img src="/Halloween/images/ng.png" alt="" style="width:98%; border-radius: 8px;"></center>';

echo '<hr><br><center>
<span class="count_room">'.$halloween1['koll'].'</span><a href="?b7H3djf4Ggd3G'.$halloween1['koll'].'4GgH"><img src="/Halloween/images/_1.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween2['koll'].'</span><a href="?djfb3d4G7HgdH'.$halloween2['koll'].'4HGg"><img src="/Halloween/images/_2.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween3['koll'].'</span><a href="?jf4Gd3G3gb73G'.$halloween3['koll'].'gH4G"><img src="/Halloween/images/_3.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween4['koll'].'</span><a href="?4Gb7H3dd3Gjfg'.$halloween4['koll'].'g4GH"><img src="/Halloween/images/_4.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween5['koll'].'</span><a href="?djgd3f4Gb7H3G'.$halloween5['koll'].'H4Gg"><img src="/Halloween/images/_5.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween6['koll'].'</span><a href="?b7jf4GH3dgd3G'.$halloween6['koll'].'GHg4"><img src="/Halloween/images/_6.png" alt="" width="43" height="50" "=""></a>
</center><br>';


if (isset($_SESSION['halloween'])){
?><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><?=$_SESSION['halloween']?></span></li></ul></div><hr><?php
unset($_SESSION['halloween']);}else{

}
$kol_his = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` > 0 "),0);
if($kol_his > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<center>Последние 10 наград:</center><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$chests_history = mysql_query("SELECT * FROM `chests_history` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($c_h = mysql_fetch_assoc($chests_history)){
if($c_h['user'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
if($c_h['text'] == 'Деревянный сундук (хэллоуин)' or $c_h['text'] == 'Деревянный сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Серебряный сундук (хэллоуин)' or $c_h['text'] == 'Серебряный сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Золотой сундук (хэллоуин)' or $c_h['text'] == 'Золотой сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Королевский сундук (хэллоуин)' or $c_h['text'] == 'Королевский сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Магический сундук (хэллоуин)' or $c_h['text'] == 'Магический сундук 10шт. (хэллоуин)' or$c_h['text'] == 'Легендарный сундук (хэллоуин)' or $c_h['text'] == 'Легендарный сундук 10шт. (хэллоуин)'){
$tests = '<img src="/Halloween/images/'.$c_h['tip'].'.png" alt="" width="20" height="20" "=""> ';
}else{
$tests = '';
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($c_h['user']).'</span></span></span>
<span class="fr nobr">'.$tests.'<img width="24" height="24" alt="" src="/chests/chests/'.$c_h['tip'].'.png"> <font color=black size=1>'.time_last($c_h['time']).'</font></span>
<div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Halloween/?',$k_page,$page); // Вывод страниц
}

}else{
echo '<hr>';
}
echo '<font size="2"><font color="black"> <font size="3">•</font> Новый Год</font> - <b>собирай игрушки и обменивай их на сундуки.</b></font>';
echo '<font size="2"><font color="black"> <font size="3">•</font> Награда по итогам</font> - <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.n_f(1*50).' </font> <font size=2><b>за каждую найденную Игрушку.</b></font>';



#############################################################################################################################################################


if(isset($_GET['b7H3djf4Ggd3G'.$halloween1['koll'].'4GgH'])){ // 1
$_SESSION['halloween'] = '
Обмен игрушек: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?1_x10"><span class="count_room">10</span><img src="/Halloween/images/_1.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/1.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?1_x100"><span class="count_room">100</span><img src="/Halloween/images/_1.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/1.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['djfb3d4G7HgdH'.$halloween2['koll'].'4HGg'])){ // 2
$_SESSION['halloween'] = '
Обмен игрушек: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?2_x10"><span class="count_room">10</span><img src="/Halloween/images/_2.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/2.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?2_x100"><span class="count_room">100</span><img src="/Halloween/images/_2.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/2.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['jf4Gd3G3gb73G'.$halloween3['koll'].'gH4G'])){ // 3
$_SESSION['halloween'] = '
Обмен игрушек: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?3_x10"><span class="count_room">10</span><img src="/Halloween/images/_3.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/3.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?3_x100"><span class="count_room">100</span><img src="/Halloween/images/_3.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/3.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['4Gb7H3dd3Gjfg'.$halloween4['koll'].'g4GH'])){ // 4
$_SESSION['halloween'] = '
Обмен игрушек: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?4_x10"><span class="count_room">10</span><img src="/Halloween/images/_4.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/4.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?4_x100"><span class="count_room">100</span><img src="/Halloween/images/_4.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/4.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['djgd3f4Gb7H3G'.$halloween5['koll'].'H4Gg'])){ // 5
$_SESSION['halloween'] = '
Обмен игрушек: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?5_x10"><span class="count_room">10</span><img src="/Halloween/images/_5.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/5.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?5_x100"><span class="count_room">100</span><img src="/Halloween/images/_5.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/5.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['b7jf4GH3dgd3G'.$halloween6['koll'].'GHg4'])){ // 6
$_SESSION['halloween'] = '
Обмен игрушек: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?6_x10"><span class="count_room">10</span><img src="/Halloween/images/_6.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/6.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?6_x100"><span class="count_room">100</span><img src="/Halloween/images/_6.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/6.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}







#################################################################################################################################










if(isset($_GET['1_x10'])){ // 1
if($halloween1['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_1.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 1;
$chests_name = 'Деревянный сундук (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween1['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '1' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['1_x100'])){ // 1
if($halloween1['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_1.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 1;
$chests_name = 'Деревянный сундук 10шт. (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween1['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '1' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['2_x10'])){ // 2
if($halloween2['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_2.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 2;
$chests_name = 'Серебряный сундук (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween2['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '2' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['2_x100'])){ // 2
if($halloween2['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_2.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 2;
$chests_name = 'Серебряный сундук 10шт. (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween2['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '2' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['3_x10'])){ // 3
if($halloween3['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_3.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 3;
$chests_name = 'Золотой сундук (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween3['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '3' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['3_x100'])){ // 3
if($halloween3['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_3.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 3;
$chests_name = 'Золотой сундук 10шт. (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween3['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '3' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['4_x10'])){ // 4
if($halloween4['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_4.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 4;
$chests_name = 'Королевский сундук (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween4['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '4' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['4_x100'])){ // 4
if($halloween4['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_4.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 4;
$chests_name = 'Королевский сундук 10шт. (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween4['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '4' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['5_x10'])){ // 5
if($halloween5['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_5.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 5;
$chests_name = 'Магический сундук (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween5['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '5' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['5_x100'])){ // 5
if($halloween5['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_5.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 5;
$chests_name = 'Магический сундук 10шт. (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween5['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '5' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['6_x10'])){ // 6
if($halloween6['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_6.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 6;
$chests_name = 'Легендарный сундук (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween6['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '6' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['6_x100'])){ // 6
if($halloween6['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/_6.png" width="23" height="25"> игрушек!</font> ';header('Location: ?');exit();}
$rand_chests = 6;
$chests_name = 'Легендарный сундук 10шт. (Новый Год)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween6['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '6' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}


























if($kol_his > 0){if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить историю</a>';
}}

if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю ?
<div class="mt4"><a class="btni accept" href="?Reset/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset/'])){
if($user['level'] != 3){header('Location: ?');exit();}
mysql_query('DELETE FROM `chests_history` WHERE `id` ');
header('Location: ?');
exit();
}






}





















///////////////////////////////////////////////////////////////////////////////////// медали


if($promotions['act_12'] == 3){


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font size=3 color=#1f9600><b>Турнир сувениров</b></font><br><font size=1>конец через:</font> <font size=1 color=black><span id="time_'.($promotions['time_12']-time()).'000">'._time($promotions['time_12']-time()).'</span></font></center></span></li></ul></div>';
echo '<br><center>
<span class="count_room">'.$halloween1['koll'].'</span><a href="?b7H3djf4Ggd3G'.$halloween1['koll'].'4GgH"><img src="/Halloween/images/__1.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween2['koll'].'</span><a href="?djfb3d4G7HgdH'.$halloween2['koll'].'4HGg"><img src="/Halloween/images/__2.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween3['koll'].'</span><a href="?jf4Gd3G3gb73G'.$halloween3['koll'].'gH4G"><img src="/Halloween/images/__3.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween4['koll'].'</span><a href="?4Gb7H3dd3Gjfg'.$halloween4['koll'].'g4GH"><img src="/Halloween/images/__4.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween5['koll'].'</span><a href="?djgd3f4Gb7H3G'.$halloween5['koll'].'H4Gg"><img src="/Halloween/images/__5.png" alt="" width="43" height="50" "=""></a>
<span class="count_room">'.$halloween6['koll'].'</span><a href="?b7jf4GH3dgd3G'.$halloween6['koll'].'GHg4"><img src="/Halloween/images/__6.png" alt="" width="43" height="50" "=""></a>
</center><br>';


if (isset($_SESSION['halloween'])){
?><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><?=$_SESSION['halloween']?></span></li></ul></div><hr><?php
unset($_SESSION['halloween']);}else{

}
$kol_his = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` > 0 "),0);
if($kol_his > 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<center>Последние 10 наград:</center><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests_history` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$chests_history = mysql_query("SELECT * FROM `chests_history` WHERE `id` ORDER BY `id` DESC LIMIT $start,$max");
while($c_h = mysql_fetch_assoc($chests_history)){
if($c_h['user'] == $user['id']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
if($c_h['text'] == 'Деревянный сундук (Турнир)' or $c_h['text'] == 'Деревянный сундук 10шт. (Турнир)' or$c_h['text'] == 'Серебряный сундук (Турнир)' or $c_h['text'] == 'Серебряный сундук 10шт. (Турнир)' or$c_h['text'] == 'Золотой сундук (Турнир)' or $c_h['text'] == 'Золотой сундук 10шт. (Турнир)' or$c_h['text'] == 'Королевский сундук (Турнир)' or $c_h['text'] == 'Королевский сундук 10шт. (Турнир)' or$c_h['text'] == 'Магический сундук (Турнир)' or $c_h['text'] == 'Магический сундук 10шт. (Турнир)' or$c_h['text'] == 'Легендарный сундук (Турнир)' or $c_h['text'] == 'Легендарный сундук 10шт. (Турнир)'){
$tests = '<img src="/Halloween/images/__'.$c_h['tip'].'.png" alt="" width="20" height="20" "=""> ';
}else{
$tests = '';
}
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($c_h['user']).'</span></span></span>
<span class="fr nobr">'.$tests.'<img width="24" height="24" alt="" src="/chests/chests/'.$c_h['tip'].'.png"> <font color=black size=1>'.time_last($c_h['time']).'</font></span>
<div class="cb"></div></div></div>';
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Halloween/?',$k_page,$page); // Вывод страниц
}

}else{
echo '<hr>';
}
$nagrada_musor = ($user['musor_proc']*0.01/100);

echo '<font size="2"><font color="black"> <font size="3">•</font> Турнир сувениров</font> - <b>собирай сувениры и обменивай их на сундуки.</b></font><br>';
echo '<font size="2"><font color="black"> <font size="3">•</font> Награда по итогам Турнира</font> - <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f($nagrada_musor).'%</font> <font size=2><b>за каждый найденный Сувенир.</b></font>';


#############################################################################################################################################################


if(isset($_GET['b7H3djf4Ggd3G'.$halloween1['koll'].'4GgH'])){ // 1
$_SESSION['halloween'] = '
Обмен сувениров: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?1_x10"><span class="count_room">10</span><img src="/Halloween/images/__1.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/1.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?1_x100"><span class="count_room">100</span><img src="/Halloween/images/__1.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/1.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['djfb3d4G7HgdH'.$halloween2['koll'].'4HGg'])){ // 2
$_SESSION['halloween'] = '
Обмен сувениров: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?2_x10"><span class="count_room">10</span><img src="/Halloween/images/__2.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/2.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?2_x100"><span class="count_room">100</span><img src="/Halloween/images/__2.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/2.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['jf4Gd3G3gb73G'.$halloween3['koll'].'gH4G'])){ // 3
$_SESSION['halloween'] = '
Обмен сувениров: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?3_x10"><span class="count_room">10</span><img src="/Halloween/images/__3.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/3.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?3_x100"><span class="count_room">100</span><img src="/Halloween/images/__3.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/3.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['4Gb7H3dd3Gjfg'.$halloween4['koll'].'g4GH'])){ // 4
$_SESSION['halloween'] = '
Обмен сувениров: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?4_x10"><span class="count_room">10</span><img src="/Halloween/images/__4.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/4.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?4_x100"><span class="count_room">100</span><img src="/Halloween/images/__4.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/4.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['djgd3f4Gb7H3G'.$halloween5['koll'].'H4Gg'])){ // 5
$_SESSION['halloween'] = '
Обмен сувениров: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?5_x10"><span class="count_room">10</span><img src="/Halloween/images/__5.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/5.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?5_x100"><span class="count_room">100</span><img src="/Halloween/images/__5.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/5.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}

if(isset($_GET['b7jf4GH3dgd3G'.$halloween6['koll'].'GHg4'])){ // 6
$_SESSION['halloween'] = '
Обмен сувениров: <hr>
<center><table style="width:90%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:25%;"><center>
<a href="?6_x10"><span class="count_room">10</span><img src="/Halloween/images/__6.png" alt="" width="43" height="50" "=""> => <span class="count_room">1</span><img src="/chests/chests/6.png" alt="" width="40" height="40" "=""> </a>
</center></td>

<td style="vertical-align:top;width:25%;"><center>
<a href="?6_x100"><span class="count_room">100</span><img src="/Halloween/images/__6.png" alt="" width="43" height="50" "=""> => <span class="count_room">10</span><img src="/chests/chests/6.png" alt="" width="40" height="40" "=""> </a> 
</center></td>
</tr></tbody></table></center>';
header('Location: ?');
exit();
}







#################################################################################################################################










if(isset($_GET['1_x10'])){ // 1
if($halloween1['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__1.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 1;
$chests_name = 'Деревянный сундук (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween1['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '1' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['1_x100'])){ // 1
if($halloween1['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__1.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 1;
$chests_name = 'Деревянный сундук 10шт. (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween1['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '1' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['2_x10'])){ // 2
if($halloween2['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__2.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 2;
$chests_name = 'Серебряный сундук (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween2['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '2' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['2_x100'])){ // 2
if($halloween2['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__2.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 2;
$chests_name = 'Серебряный сундук 10шт. (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween2['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '2' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['3_x10'])){ // 3
if($halloween3['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__3.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 3;
$chests_name = 'Золотой сундук (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween3['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '3' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['3_x100'])){ // 3
if($halloween3['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__3.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 3;
$chests_name = 'Золотой сундук 10шт. (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween3['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '3' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['4_x10'])){ // 4
if($halloween4['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__4.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 4;
$chests_name = 'Королевский сундук (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween4['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '4' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['4_x100'])){ // 4
if($halloween4['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__4.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 4;
$chests_name = 'Королевский сундук 10шт. (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween4['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '4' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['5_x10'])){ // 5
if($halloween5['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__5.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 5;
$chests_name = 'Магический сундук (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween5['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '5' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['5_x100'])){ // 5
if($halloween5['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__5.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 5;
$chests_name = 'Магический сундук 10шт. (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween5['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '5' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}






if(isset($_GET['6_x10'])){ // 6
if($halloween6['koll'] < 10){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__6.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 6;
$chests_name = 'Легендарный сундук (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween6['koll'] - 10)."' WHERE `user` = '".$user['id']."' and `vid` = '6' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">1</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}

if(isset($_GET['6_x100'])){ // 6
if($halloween6['koll'] < 100){$_SESSION['err'] = '<font color=red>Не хватает <img src="/Halloween/images/__6.png" width="23" height="25"> сувениров!</font> ';header('Location: ?');exit();}
$rand_chests = 6;
$chests_name = 'Легендарный сундук 10шт. (Турнир)';
mysql_query("INSERT INTO `chests_history` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."', `text` = '".$chests_name."', `time` = '".time()."' ");
$hell_sunduk = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT 10");
$hell_ = mysql_fetch_array ($hell_sunduk);
do {
mysql_query("INSERT INTO `chests` SET `user` = '".$user['id']."', `tip` = '".$rand_chests."' ");
} while ($hell_ = mysql_fetch_array ($hell_sunduk));
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween6['koll'] - 100)."' WHERE `user` = '".$user['id']."' and `vid` = '6' LIMIT 1");
$_SESSION['ok'] = '<font color=#ddd>Обмен прошел успешно!<br>Вы получили <b>'.$chests_name.'</b><br><span class="count_room">10</span><img src="/chests/chests/'.$rand_chests.'.png" width="50" height="50"></font>';
header('Location: ?');
exit();
}


























if($kol_his > 0){if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить историю</a>';
}}


if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить историю ?
<div class="mt4"><a class="btni accept" href="?Reset/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset/'])){
if($user['level'] != 3){header('Location: ?');exit();}
mysql_query('DELETE FROM `chests_history` WHERE `id` ');
header('Location: ?');
exit();
}






}


if($promotions['act_12'] == 1){$trtr = 'тыкв';$dsds = '';}
if($promotions['act_12'] == 2){$trtr = 'игрушек';$dsds = '_';}
if($promotions['act_12'] == 3){$trtr = 'сувениров';$dsds = '__';}
echo '<a class="btnl mt4" href="'.$HOME.'rating/7/"><img src="/Halloween/images/'.$dsds.'4.png" width="25" height="30"> Рейтинг '.$trtr.'</a>';







require_once ('../system/footer.php');
?>