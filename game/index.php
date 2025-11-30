<?php
$title = 'Rubin of Fortune';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}




$game_user = mysql_fetch_array(mysql_query('SELECT * FROM `game` WHERE `user` = "'.$user['id'].'" '));
$game_user_ = mysql_fetch_array(mysql_query('SELECT * FROM `game_` WHERE `user` = "'.$user['id'].'" '));


if($game_user['1'] > 2 or $game_user['2'] > 2 or $game_user['3'] > 2 or $game_user['4'] > 2 or $game_user['5'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['6'] > 2 or $game_user['7'] > 2 or $game_user['8'] > 2 or $game_user['9'] > 2 or $game_user['10'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['11'] > 2 or $game_user['12'] > 2 or $game_user['13'] > 2 or $game_user['14'] > 2 or $game_user['15'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['16'] > 2 or $game_user['17'] > 2 or $game_user['18'] > 2 or $game_user['19'] > 2 or $game_user['20'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['21'] > 2 or $game_user['22'] > 2 or $game_user['23'] > 2 or $game_user['24'] > 2 or $game_user['25'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['26'] > 2 or $game_user['27'] > 2 or $game_user['28'] > 2 or $game_user['29'] > 2 or $game_user['30'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['31'] > 2 or $game_user['32'] > 2 or $game_user['33'] > 2 or $game_user['34'] > 2 or $game_user['35'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['36'] > 2 or $game_user['37'] > 2 or $game_user['38'] > 2 or $game_user['39'] > 2 or $game_user['40'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['41'] > 2 or $game_user['42'] > 2 or $game_user['43'] > 2 or $game_user['44'] > 2 or $game_user['45'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}
if($game_user['46'] > 2 or $game_user['47'] > 2 or $game_user['48'] > 2 or $game_user['49'] > 2 or $game_user['50'] > 2 and $game_user['pobeda'] != 2){
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}










if(!$game_user){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><div style="color: #2b577f;" class="big content">'.$title.'</div></span></li></ul></div>';
echo '<center><img src="/images/roff.png" alt="" style="width:60%; border-radius: 10px;"></center>';


echo '<center><div class="bordered mt4">
<form action="" method="POST">
<label><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины">
<input type="number" style="max-width: 75px;" value="'.$user['game_stavka'].'" name="stavka"></label>
<input class="mt4" type="submit" name="start" value="Сделать ставку">

</form>
</div></center>';
}




if(isset($_REQUEST['start'])){
$stavka = round(strong($_POST['stavka']));
if(empty($stavka)){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Поле "Ставка" обязательно для ввода.</font>';
exit();
}
if($stavka < 1){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Минимальная ставка <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 5 рубинов</font>';
exit();
}
if($stavka > 1000){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Максимальная ставка <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 1000 рубинов</font>';
exit();
}

if($game_user){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ставка уже установлена, завершите игру...</font>';
exit();
}
if($user['rubin'] < $stavka){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.n_f($stavka-$user['rubin']).' рубинов</font>';
exit();
}
if($mission_user_31['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_31['prog_']+1)."' WHERE `id` = '".$mission_user_31['id']."' ");
}
if($mission_user_33['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_33['prog_']+$stavka)."' WHERE `id` = '".$mission_user_33['id']."' ");
}

if($Achievements_user_30['prog'] < $Achievements_user_30['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_30['prog']+1)."' WHERE `id` = '".$Achievements_user_30['id']."' ");
}
if($Achievements_user_32['prog'] < $Achievements_user_32['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_32['prog']+$stavka)."' WHERE `id` = '".$Achievements_user_32['id']."' ");
}

mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-$stavka)."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query("INSERT INTO `game` SET `user` = '".$user['id']."', `stavka` = '".$stavka."' ");

$rand_1 = rand(1,5);
if($rand_1 == 1){
$img_1 = 3;$img_2 = 2;$img_3 = 2;$img_4 = 2;$img_5 = 2;
}
if($rand_1 == 2){
$img_1 = 2;$img_2 = 3;$img_3 = 2;$img_4 = 2;$img_5 = 2;
}
if($rand_1 == 3){
$img_1 = 2;$img_2 = 2;$img_3 = 3;$img_4 = 2;$img_5 = 2;
}
if($rand_1 == 4){
$img_1 = 2;$img_2 = 2;$img_3 = 2;$img_4 = 3;$img_5 = 2;
}
if($rand_1 == 5){
$img_1 = 2;$img_2 = 2;$img_3 = 2;$img_4 = 2;$img_5 = 3;
}

$rand_2 = rand(1,5);
if($rand_2 == 1){
$img_6 = 3;$img_7 = 2;$img_8 = 2;$img_9 = 2;$img_10 = 2;
}
if($rand_2 == 2){
$img_6 = 2;$img_7 = 3;$img_8 = 2;$img_9 = 2;$img_10 = 2;
}
if($rand_2 == 3){
$img_6 = 2;$img_7 = 2;$img_8 = 3;$img_9 = 2;$img_10 = 2;
}
if($rand_2 == 4){
$img_6 = 2;$img_7 = 2;$img_8 = 2;$img_9 = 3;$img_10 = 2;
}
if($rand_2 == 5){
$img_6 = 2;$img_7 = 2;$img_8 = 2;$img_9 = 2;$img_10 = 3;
}

$rand_3 = rand(1,5);
if($rand_3 == 1){
$img_11 = 3;$img_12 = 2;$img_13 = 2;$img_14 = 2;$img_15 = 2;
}
if($rand_3 == 2){
$img_11 = 2;$img_12 = 3;$img_13 = 2;$img_14 = 2;$img_15 = 2;
}
if($rand_3 == 3){
$img_11 = 2;$img_12 = 2;$img_13 = 3;$img_14 = 2;$img_15 = 2;
}
if($rand_3 == 4){
$img_11 = 2;$img_12 = 2;$img_13 = 2;$img_14 = 3;$img_15 = 2;
}
if($rand_3 == 5){
$img_11 = 2;$img_12 = 2;$img_13 = 2;$img_14 = 2;$img_15 = 3;
}


$rand_4 = rand(1,5);
if($rand_4 == 1){
$img_16 = 3;$img_17 = 2;$img_18 = 2;$img_19 = 2;$img_20 = 2;
}
if($rand_4 == 2){
$img_16 = 2;$img_17 = 3;$img_18 = 2;$img_19 = 2;$img_20 = 2;
}
if($rand_4 == 3){
$img_16 = 2;$img_17 = 2;$img_18 = 3;$img_19 = 2;$img_20 = 2;
}
if($rand_4 == 4){
$img_16 = 2;$img_17 = 2;$img_18 = 2;$img_19 = 3;$img_20 = 2;
}
if($rand_4 == 5){
$img_16 = 2;$img_17 = 2;$img_18 = 2;$img_19 = 2;$img_20 = 3;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rand_5 = rand(1,5);
if($rand_5 == 1){
$img_21 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_22 = 3;$img_23 = 2;$img_24 = 2;$img_25 = 2;}if($rand_ == 2){$img_22 = 2;$img_23 = 3;$img_24 = 2;$img_25 = 2;}
if($rand_ == 3){$img_22 = 2;$img_23 = 2;$img_24 = 3;$img_25 = 2;}if($rand_ == 4){$img_22 = 2;$img_23 = 2;$img_24 = 2;$img_25 = 3;}
}
if($rand_5 == 2){
$img_22 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_21 = 3;$img_23 = 2;$img_24 = 2;$img_25 = 2;}if($rand_ == 2){$img_21 = 2;$img_23 = 3;$img_24 = 2;$img_25 = 2;}
if($rand_ == 3){$img_21 = 2;$img_23 = 2;$img_24 = 3;$img_25 = 2;}if($rand_ == 4){$img_21 = 2;$img_23 = 2;$img_24 = 2;$img_25 = 3;}
}
if($rand_5 == 3){
$img_23 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_21 = 3;$img_22 = 2;$img_24 = 2;$img_25 = 2;}if($rand_ == 2){$img_21 = 2;$img_22 = 3;$img_24 = 2;$img_25 = 2;}
if($rand_ == 3){$img_21 = 2;$img_22 = 2;$img_24 = 3;$img_25 = 2;}if($rand_ == 4){$img_21 = 2;$img_22 = 2;$img_24 = 2;$img_25 = 3;}
}
if($rand_5 == 4){
$img_24 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_21 = 3;$img_22 = 2;$img_23 = 2;$img_25 = 2;}if($rand_ == 2){$img_21 = 2;$img_22 = 3;$img_23 = 2;$img_25 = 2;}
if($rand_ == 3){$img_21 = 2;$img_22 = 2;$img_23 = 3;$img_25 = 2;}if($rand_ == 4){$img_21 = 2;$img_22 = 2;$img_23 = 2;$img_25 = 3;}
}
if($rand_5 == 5){
$img_25 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_21 = 3;$img_22 = 2;$img_23 = 2;$img_24 = 2;}if($rand_ == 2){$img_21 = 2;$img_22 = 3;$img_23 = 2;$img_24 = 2;}
if($rand_ == 3){$img_21 = 2;$img_22 = 2;$img_23 = 3;$img_24 = 2;}if($rand_ == 4){$img_21 = 2;$img_22 = 2;$img_23 = 2;$img_24 = 3;}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rand_6 = rand(1,5);
if($rand_6 == 1){
$img_26 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_27 = 3;$img_28 = 2;$img_29 = 2;$img_30 = 2;}if($rand_ == 2){$img_27 = 2;$img_28 = 3;$img_29 = 2;$img_30 = 2;}
if($rand_ == 3){$img_27 = 2;$img_28 = 2;$img_29 = 3;$img_30 = 2;}if($rand_ == 4){$img_27 = 2;$img_28 = 2;$img_29 = 2;$img_30 = 3;}
}
if($rand_6 == 2){
$img_27 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_26 = 3;$img_28 = 2;$img_29 = 2;$img_30 = 2;}if($rand_ == 2){$img_26 = 2;$img_28 = 3;$img_29 = 2;$img_30 = 2;}
if($rand_ == 3){$img_26 = 2;$img_28 = 2;$img_29 = 3;$img_30 = 2;}if($rand_ == 4){$img_26 = 2;$img_28 = 2;$img_29 = 2;$img_30 = 3;}
}
if($rand_6 == 3){
$img_28 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_26 = 3;$img_27 = 2;$img_29 = 2;$img_30 = 2;}if($rand_ == 2){$img_26 = 2;$img_27 = 3;$img_29 = 2;$img_30 = 2;}
if($rand_ == 3){$img_26 = 2;$img_27 = 2;$img_29 = 3;$img_30 = 2;}if($rand_ == 4){$img_26 = 2;$img_27 = 2;$img_29 = 2;$img_30 = 3;}
}
if($rand_6 == 4){
$img_29 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_26 = 3;$img_27 = 2;$img_28 = 2;$img_30 = 2;}if($rand_ == 2){$img_26 = 2;$img_27 = 3;$img_28 = 2;$img_30 = 2;}
if($rand_ == 3){$img_26 = 2;$img_27 = 2;$img_28 = 3;$img_30 = 2;}if($rand_ == 4){$img_26 = 2;$img_27 = 2;$img_28 = 2;$img_30 = 3;}
}
if($rand_6 == 5){
$img_30 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_26 = 3;$img_27 = 2;$img_28 = 2;$img_29 = 2;}if($rand_ == 2){$img_26 = 2;$img_27 = 3;$img_28 = 2;$img_29 = 2;}
if($rand_ == 3){$img_26 = 2;$img_27 = 2;$img_28 = 3;$img_29 = 2;}if($rand_ == 4){$img_26 = 2;$img_27 = 2;$img_28 = 2;$img_29 = 3;}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rand_7 = rand(1,5);
if($rand_7 == 1){
$img_31 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_32 = 3;$img_33 = 2;$img_34 = 2;$img_35 = 2;}if($rand_ == 2){$img_32 = 2;$img_33 = 3;$img_34 = 2;$img_35 = 2;}
if($rand_ == 3){$img_32 = 2;$img_33 = 2;$img_34 = 3;$img_35 = 2;}if($rand_ == 4){$img_32 = 2;$img_33 = 2;$img_34 = 2;$img_35 = 3;}
}
if($rand_7 == 2){
$img_32 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_31 = 3;$img_33 = 2;$img_34 = 2;$img_35 = 2;}if($rand_ == 2){$img_31 = 2;$img_33 = 3;$img_34 = 2;$img_35 = 2;}
if($rand_ == 3){$img_31 = 2;$img_33 = 2;$img_34 = 3;$img_35 = 2;}if($rand_ == 4){$img_31 = 2;$img_33 = 2;$img_34 = 2;$img_35 = 3;}
}
if($rand_7 == 3){
$img_33 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_31 = 3;$img_32 = 2;$img_34 = 2;$img_35 = 2;}if($rand_ == 2){$img_31 = 2;$img_32 = 3;$img_34 = 2;$img_35 = 2;}
if($rand_ == 3){$img_31 = 2;$img_32 = 2;$img_34 = 3;$img_35 = 2;}if($rand_ == 4){$img_31 = 2;$img_32 = 2;$img_34 = 2;$img_35 = 3;}
}
if($rand_7 == 4){
$img_34 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_31 = 3;$img_32 = 2;$img_33 = 2;$img_35 = 2;}if($rand_ == 2){$img_31 = 2;$img_32 = 3;$img_33 = 2;$img_35 = 2;}
if($rand_ == 3){$img_31 = 2;$img_32 = 2;$img_33 = 3;$img_35 = 2;}if($rand_ == 4){$img_31 = 2;$img_32 = 2;$img_33 = 2;$img_35 = 3;}
}
if($rand_7 == 5){
$img_35 = 3;
$rand_ = rand(1,4);
if($rand_ == 1){$img_31 = 3;$img_32 = 2;$img_33 = 2;$img_34 = 2;}if($rand_ == 2){$img_31 = 2;$img_32 = 3;$img_33 = 2;$img_34 = 2;}
if($rand_ == 3){$img_31 = 2;$img_32 = 2;$img_33 = 3;$img_34 = 2;}if($rand_ == 4){$img_31 = 2;$img_32 = 2;$img_33 = 2;$img_34 = 3;}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rand_8 = rand(1,5);
if($rand_8 == 1){
$img_36 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_37 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_38 = 3;$img_39 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_38 = 2;$img_39 = 2;$img_40 = 2;
}
if($rand__ == 3){
$img_38 = 2;$img_39 = 2;$img_40 = 3;
}
}

if($rand_ == 2){
$img_38 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_37 = 3;$img_39 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_37 = 2;$img_39 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_37 = 2;$img_39 = 2;$img_40 = 3;
}
}

if($rand_ == 3){
$img_39 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_37 = 3;$img_38 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_37 = 2;$img_38 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_37 = 2;$img_38 = 2;$img_40 = 3;
}
}

if($rand_ == 4){
$img_40 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_37 = 2;$img_38 = 2;$img_39 = 2;
}
if($rand__ == 2){
$img_37 = 2;$img_38 = 3;$img_39 = 2;
}
if($rand__ == 3){
$img_37 = 2;$img_38 = 2;$img_39 = 3;
}
}

}

if($rand_8 == 2){
$img_37 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_36 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_38 = 3;$img_39 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_38 = 2;$img_39 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_38 = 2;$img_39 = 2;$img_40 = 3;
}
}

if($rand_ == 2){
$img_38 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_39 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_39 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_39 = 2;$img_40 = 3;
}
}

if($rand_ == 3){
$img_39 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_38 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_38 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_38 = 2;$img_40 = 3;
}
}

if($rand_ == 4){
$img_40 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_38 = 2;$img_39 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_38 = 3;$img_39 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_38 = 2;$img_39 = 3;
}
}

}

if($rand_8 == 3){
$img_38 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_36 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_37 = 3;$img_39 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_37 = 2;$img_39 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_37 = 2;$img_39 = 2;$img_40 = 3;
}
}
if($rand_ == 2){
$img_37 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_39 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_39 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_39 = 2;$img_40 = 3;
}
}
if($rand_ == 3){
$img_39 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_37 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_37 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_37 = 2;$img_40 = 3;
}
}
if($rand_ == 4){
$img_40 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_37 = 2;$img_39 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_37 = 3;$img_39 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_37 = 2;$img_39 = 3;
}
}

}

if($rand_8 == 4){
$img_39 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_36 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_37 = 3;$img_38 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_37 = 2;$img_38 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_37 = 2;$img_38 = 2;$img_40 = 3;
}
}
if($rand_ == 2){
$img_37 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_38 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_38 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_38 = 2;$img_40 = 3;
}
}
if($rand_ == 3){
$img_38 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_37 = 2;$img_40 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_37 = 3;$img_40 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_37 = 2;$img_40 = 3;
}
}
if($rand_ == 4){
$img_40 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_37 = 2;$img_38 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_37 = 3;$img_38 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_37 = 2;$img_38 = 3;
}
}

}

if($rand_8 == 5){
$img_40 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_36 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_37 = 3;$img_38 = 2;$img_39 = 2;
}
if($rand__ == 2){
$img_37 = 2;$img_38 = 3;$img_39 = 2;
}
if($rand__ == 3){
$img_37 = 2;$img_38 = 2;$img_39 = 3;
}
}
if($rand_ == 2){
$img_37 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_38 = 2;$img_39 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_38 = 3;$img_39 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_38 = 2;$img_39 = 3;
}
}
if($rand_ == 3){
$img_38 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_37 = 2;$img_39 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_37 = 3;$img_39 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_37 = 2;$img_39 = 3;
}
}
if($rand_ == 4){
$img_39 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_36 = 3;$img_37 = 2;$img_38 = 2;
}
if($rand__ == 2){
$img_36 = 2;$img_37 = 3;$img_38 = 2;
}
if($rand__ == 3){
$img_36 = 2;$img_37 = 2;$img_38 = 3;
}
}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rand_9 = rand(1,5);
if($rand_9 == 1){
$img_41 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_42 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_43 = 3;$img_44 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_43 = 2;$img_44 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_43 = 2;$img_44 = 2;$img_45 = 3;
}
}

if($rand_ == 2){
$img_43 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_42 = 3;$img_44 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_42 = 2;$img_44 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_42 = 2;$img_44 = 2;$img_45 = 3;
}
}

if($rand_ == 3){
$img_44 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_42 = 3;$img_43 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_42 = 2;$img_43 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_42 = 2;$img_43 = 2;$img_45 = 3;
}
}

if($rand_ == 4){
$img_45 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_42 = 3;$img_43 = 2;$img_44 = 2;
}
if($rand__ == 2){
$img_42 = 2;$img_43 = 3;$img_44 = 2;
}
if($rand__ == 3){
$img_42 = 2;$img_43 = 2;$img_44 = 3;
}
}

}

if($rand_9 == 2){
$img_42 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_41 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_43 = 3;$img_44 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_43 = 2;$img_44 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_43 = 2;$img_44 = 2;$img_45 = 3;
}
}

if($rand_ == 2){
$img_43 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_44 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_44 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_44 = 2;$img_45 = 3;
}
}

if($rand_ == 3){
$img_44 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_43 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_43 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_43 = 2;$img_45 = 3;
}
}

if($rand_ == 4){
$img_45 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_43 = 2;$img_44 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_43 = 3;$img_44 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_43 = 2;$img_44 = 3;
}
}

}

if($rand_9 == 3){
$img_43 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_41 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_42 = 3;$img_44 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_42 = 2;$img_44 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_42 = 2;$img_44 = 2;$img_45 = 3;
}
}
if($rand_ == 2){
$img_42 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_44 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_44 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_44 = 2;$img_45 = 3;
}
}
if($rand_ == 3){
$img_44 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_42 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_42 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_42 = 2;$img_45 = 3;
}
}
if($rand_ == 4){
$img_45 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_42 = 2;$img_44 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_42 = 3;$img_44 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_42 = 2;$img_44 = 3;
}
}

}

if($rand_9 == 4){
$img_44 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_41 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_42 = 3;$img_43 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_42 = 2;$img_43 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_42 = 2;$img_43 = 2;$img_45 = 3;
}
}
if($rand_ == 2){
$img_42 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_43 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_43 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_43 = 2;$img_45 = 3;
}
}
if($rand_ == 3){
$img_43 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_42 = 2;$img_45 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_42 = 3;$img_45 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_42 = 2;$img_45 = 3;
}
}
if($rand_ == 4){
$img_45 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_42 = 2;$img_43 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_42 = 3;$img_43 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_42 = 2;$img_43 = 3;
}
}

}

if($rand_9 == 5){
$img_45 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_41 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_42 = 3;$img_43 = 2;$img_44 = 2;
}
if($rand__ == 2){
$img_42 = 2;$img_43 = 3;$img_44 = 2;
}
if($rand__ == 3){
$img_42 = 2;$img_43 = 2;$img_44 = 3;
}
}
if($rand_ == 2){
$img_42 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_43 = 2;$img_44 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_43 = 3;$img_44 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_43 = 2;$img_44 = 3;
}
}
if($rand_ == 3){
$img_43 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_42 = 2;$img_44 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_42 = 3;$img_44 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_42 = 2;$img_44 = 3;
}
}
if($rand_ == 4){
$img_44 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_41 = 3;$img_42 = 2;$img_43 = 2;
}
if($rand__ == 2){
$img_41 = 2;$img_42 = 3;$img_43 = 2;
}
if($rand__ == 3){
$img_41 = 2;$img_42 = 2;$img_43 = 3;
}
}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rand_9 = rand(1,5);
if($rand_9 == 1){
$img_46 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_47 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_48 = 3;
$rand___ = rand(1,2);
if($rand___ == 1){
$img_49 = 3;$img_50 = 2;
}
if($rand___ == 2){
$img_49 = 2;$img_50 = 3;
}
}
if($rand__ == 2){
$img_49 = 3;
$rand___ = rand(1,2);
if($rand___ == 1){
$img_48 = 3;$img_50 = 2;
}
if($rand___ == 2){
$img_48 = 2;$img_50 = 3;
}
}
if($rand__ == 3){
$img_50 = 3;
$rand___ = rand(1,2);
if($rand___ == 1){
$img_48 = 3;$img_49 = 2;
}
if($rand___ == 2){
$img_48 = 2;$img_49 = 3;
}
}
}

if($rand_ == 2){
$img_48 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_47 = 3;
$rand___ = rand(1,2);
if($rand___ == 1){
$img_49 = 3;$img_50 = 2;
}
if($rand___ == 2){
$img_49 = 2;$img_50 = 3;
}
}
if($rand__ == 2){
$img_49 = 3;
$rand___ = rand(1,2);
if($rand___ == 1){
$img_47 = 3;$img_50 = 2;
}
if($rand___ == 2){
$img_47 = 2;$img_50 = 3;
}
}
if($rand__ == 3){
$img_50 = 3;
$rand___ = rand(1,2);
if($rand___ == 1){
$img_47 = 3;$img_49 = 2;
}
if($rand___ == 2){
$img_47 = 2;$img_49 = 3;
}
}
}

if($rand_ == 3){
$img_49 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_47 = 3;$img_48 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_47 = 2;$img_48 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_47 = 2;$img_48 = 2;$img_50 = 3;
}
}

if($rand_ == 4){
$img_50 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_47 = 3;$img_48 = 2;$img_49 = 2;
}
if($rand__ == 2){
$img_47 = 2;$img_48 = 3;$img_49 = 2;
}
if($rand__ == 3){
$img_47 = 2;$img_48 = 2;$img_49 = 3;
}
}

}

if($rand_9 == 2){
$img_47 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_46 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_48 = 3;$img_49 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_48 = 2;$img_49 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_48 = 2;$img_49 = 2;$img_50 = 3;
}
}

if($rand_ == 2){
$img_48 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_49 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_49 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_49 = 2;$img_50 = 3;
}
}

if($rand_ == 3){
$img_49 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_48 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_48 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_48 = 2;$img_50 = 3;
}
}

if($rand_ == 4){
$img_50 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_48 = 2;$img_49 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_48 = 3;$img_49 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_48 = 2;$img_49 = 3;
}
}

}

if($rand_9 == 3){
$img_48 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_46 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_47 = 3;$img_49 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_47 = 2;$img_49 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_47 = 2;$img_49 = 2;$img_50 = 3;
}
}
if($rand_ == 2){
$img_47 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_49 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_49 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_49 = 2;$img_50 = 3;
}
}
if($rand_ == 3){
$img_49 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_47 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_47 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_47 = 2;$img_50 = 3;
}
}
if($rand_ == 4){
$img_50 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_47 = 2;$img_49 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_47 = 3;$img_49 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_47 = 2;$img_49 = 3;
}
}

}

if($rand_9 == 4){
$img_49 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_46 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_47 = 3;$img_48 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_47 = 2;$img_48 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_47 = 2;$img_48 = 2;$img_50 = 3;
}
}
if($rand_ == 2){
$img_47 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_48 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_48 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_48 = 2;$img_50 = 3;
}
}
if($rand_ == 3){
$img_48 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_47 = 2;$img_50 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_47 = 3;$img_50 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_47 = 2;$img_50 = 3;
}
}
if($rand_ == 4){
$img_50 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_47 = 2;$img_48 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_47 = 3;$img_48 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_47 = 2;$img_48 = 3;
}
}

}

if($rand_9 == 5){
$img_50 = 3;
$rand_ = rand(1,4);

if($rand_ == 1){
$img_46 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_47 = 3;$img_48 = 2;$img_49 = 2;
}
if($rand__ == 2){
$img_47 = 2;$img_48 = 3;$img_49 = 2;
}
if($rand__ == 3){
$img_47 = 2;$img_48 = 2;$img_49 = 3;
}
}
if($rand_ == 2){
$img_47 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_48 = 2;$img_49 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_48 = 3;$img_49 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_48 = 2;$img_49 = 3;
}
}
if($rand_ == 3){
$img_48 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_47 = 2;$img_49 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_47 = 3;$img_49 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_47 = 2;$img_49 = 3;
}
}
if($rand_ == 4){
$img_49 = 3;
$rand__ = rand(1,3);
if($rand__ == 1){
$img_46 = 3;$img_47 = 2;$img_48 = 2;
}
if($rand__ == 2){
$img_46 = 2;$img_47 = 3;$img_48 = 2;
}
if($rand__ == 3){
$img_46 = 2;$img_47 = 2;$img_48 = 3;
}
}

}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$rand_9 = rand(1,5);
if($rand_9 == 1){
$img_46 = 2;$img_47 = 3;$img_48 = 3;$img_49 = 3;$img_50 = 3;
}
if($rand_9 == 2){
$img_46 = 3;$img_47 = 2;$img_48 = 3;$img_49 = 3;$img_50 = 3;
}
if($rand_9 == 3){
$img_46 = 3;$img_47 = 3;$img_48 = 2;$img_49 = 3;$img_50 = 3;
}
if($rand_9 == 4){
$img_46 = 3;$img_47 = 3;$img_48 = 3;$img_49 = 2;$img_50 = 3;
}
if($rand_9 == 5){
$img_46 = 3;$img_47 = 3;$img_48 = 3;$img_49 = 3;$img_50 = 2;
}









mysql_query("INSERT INTO `game_` SET `user` = '".$user['id']."'
, `1` = '".$img_1."'
, `2` = '".$img_2."'
, `3` = '".$img_3."'
, `4` = '".$img_4."'
, `5` = '".$img_5."' 
, `6` = '".$img_6."' 
, `7` = '".$img_7."' 
, `8` = '".$img_8."' 
, `9` = '".$img_9."' 
, `10` = '".$img_10."' 
, `11` = '".$img_11."' 
, `12` = '".$img_12."' 
, `13` = '".$img_13."' 
, `14` = '".$img_14."' 
, `15` = '".$img_15."' 
, `16` = '".$img_16."' 
, `17` = '".$img_17."' 
, `18` = '".$img_18."' 
, `19` = '".$img_19."' 
, `20` = '".$img_20."' 
, `21` = '".$img_21."' 
, `22` = '".$img_22."' 
, `23` = '".$img_23."' 
, `24` = '".$img_24."' 
, `25` = '".$img_25."' 
, `26` = '".$img_26."' 
, `27` = '".$img_27."' 
, `28` = '".$img_28."' 
, `29` = '".$img_29."' 
, `30` = '".$img_30."' 
, `31` = '".$img_31."' 
, `32` = '".$img_32."' 
, `33` = '".$img_33."' 
, `34` = '".$img_34."' 
, `35` = '".$img_35."' 
, `36` = '".$img_36."' 
, `37` = '".$img_37."' 
, `38` = '".$img_38."' 
, `39` = '".$img_39."' 
, `40` = '".$img_40."' 
, `41` = '".$img_41."' 
, `42` = '".$img_42."' 
, `43` = '".$img_43."' 
, `44` = '".$img_44."' 
, `45` = '".$img_45."' 
, `46` = '".$img_46."' 
, `47` = '".$img_47."' 
, `48` = '".$img_48."' 
, `49` = '".$img_49."' 
, `50` = '".$img_50."' ");
mysql_query("UPDATE `users` SET `game_stavka` = '".$stavka."' WHERE `id` = '".$user['id']."' ");
header('Location: ?');
exit();
}















//if($game_user){
//echo '<a class="btnl" href="?restart">Удалить игру</a>';
//}

if(isset($_GET['restart'])){
mysql_query('DELETE FROM `game` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `game_` WHERE `user` = '.$user['id'].' ');
header('Location: ?');
exit();
}















if($game_user){
echo '<center><table class="prf-btns esmall bold"><tbody>';


if($game_user['1'] == 0 and $game_user['2'] == 0 and $game_user['3'] == 0 and $game_user['4'] == 0 and $game_user['5'] == 0 ){
if($game_user['6'] != 0 and $game_user['7'] != 0 and $game_user['8'] != 0 and $game_user['9'] != 0 and $game_user['10'] != 0 ){
$img1 = 0;$img2 = 0;$img3 = 0;$img4 = 0;$img5 = 0;}else{$href1 = '<a href="?1">';$href2 = '<a href="?2">';$href3 = '<a href="?3">';$href4 = '<a href="?4">';$href5 = '<a href="?5">';$img1 = 1;$img2 = 1;$img3 = 1;$img4 = 1;$img5 = 1;}
}else{
$img1 = $game_user['1'];$img2 = $game_user['2'];$img3 = $game_user['3'];$img4 = $game_user['4'];$img5 = $game_user['5'];
}

if($game_user['6'] == 0 and $game_user['7'] == 0 and $game_user['8'] == 0 and $game_user['9'] == 0 and $game_user['10'] == 0 ){
if($game_user['1'] == 0 and $game_user['2'] == 0 and $game_user['3'] == 0 and $game_user['4'] == 0 and $game_user['5'] == 0 ){
$img6 = 0;$img7 = 0;$img8 = 0;$img9 = 0;$img10 = 0;}else{$href6 = '<a href="?6">';$href7 = '<a href="?7">';$href8 = '<a href="?8">';$href9 = '<a href="?9">';$href10 = '<a href="?10">';$img6 = 1;$img7 = 1;$img8 = 1;$img9 = 1;$img10 = 1;}
}else{
$img6 = $game_user['6'];$img7 = $game_user['7'];$img8 = $game_user['8'];$img9 = $game_user['9'];$img10 = $game_user['10'];
}

if($game_user['11'] == 0 and $game_user['12'] == 0 and $game_user['13'] == 0 and $game_user['14'] == 0 and $game_user['15'] == 0 ){
if($game_user['6'] == 0 and $game_user['7'] == 0 and $game_user['8'] == 0 and $game_user['9'] == 0 and $game_user['10'] == 0 ){
$img11 = 0;$img12 = 0;$img13 = 0;$img14 = 0;$img15 = 0;}else{$href11 = '<a href="?11">';$href12 = '<a href="?12">';$href13 = '<a href="?13">';$href14 = '<a href="?14">';$href15 = '<a href="?15">';$img11 = 1;$img12 = 1;$img13 = 1;$img14 = 1;$img15 = 1;}
}else{
$img11 = $game_user['11'];$img12 = $game_user['12'];$img13 = $game_user['13'];$img14 = $game_user['14'];$img15 = $game_user['15'];
}

if($game_user['16'] == 0 and $game_user['17'] == 0 and $game_user['18'] == 0 and $game_user['19'] == 0 and $game_user['20'] == 0 ){
if($game_user['11'] == 0 and $game_user['12'] == 0 and $game_user['13'] == 0 and $game_user['14'] == 0 and $game_user['15'] == 0 ){
$img16 = 0;$img17 = 0;$img18 = 0;$img19 = 0;$img20 = 0;}else{$href16 = '<a href="?16">';$href17 = '<a href="?17">';$href18 = '<a href="?18">';$href19 = '<a href="?19">';$href20 = '<a href="?20">';$img16 = 1;$img17 = 1;$img18 = 1;$img19 = 1;$img20 = 1;}
}else{
$img16 = $game_user['16'];$img17 = $game_user['17'];$img18 = $game_user['18'];$img19 = $game_user['19'];$img20 = $game_user['20'];
}

if($game_user['21'] == 0 and $game_user['22'] == 0 and $game_user['23'] == 0 and $game_user['24'] == 0 and $game_user['25'] == 0 ){
if($game_user['16'] == 0 and $game_user['17'] == 0 and $game_user['18'] == 0 and $game_user['19'] == 0 and $game_user['20'] == 0 ){
$img21 = 0;$img22 = 0;$img23 = 0;$img24 = 0;$img25 = 0;}else{$href21 = '<a href="?21">';$href22 = '<a href="?22">';$href23 = '<a href="?23">';$href24 = '<a href="?24">';$href25 = '<a href="?25">';$img21 = 1;$img22 = 1;$img23 = 1;$img24 = 1;$img25 = 1;}
}else{
$img21 = $game_user['21'];$img22 = $game_user['22'];$img23 = $game_user['23'];$img24 = $game_user['24'];$img25 = $game_user['25'];
}

if($game_user['26'] == 0 and $game_user['27'] == 0 and $game_user['28'] == 0 and $game_user['29'] == 0 and $game_user['30'] == 0 ){
if($game_user['21'] == 0 and $game_user['22'] == 0 and $game_user['23'] == 0 and $game_user['24'] == 0 and $game_user['25'] == 0 ){
$img26 = 0;$img27 = 0;$img28 = 0;$img29 = 0;$img30 = 0;}else{$href26 = '<a href="?26">';$href27 = '<a href="?27">';$href28 = '<a href="?28">';$href29 = '<a href="?29">';$href30 = '<a href="?30">';$img26 = 1;$img27 = 1;$img28 = 1;$img29 = 1;$img30 = 1;}
}else{
$img26 = $game_user['26'];$img27 = $game_user['27'];$img28 = $game_user['28'];$img29 = $game_user['29'];$img30 = $game_user['30'];
}

if($game_user['31'] == 0 and $game_user['32'] == 0 and $game_user['33'] == 0 and $game_user['34'] == 0 and $game_user['35'] == 0 ){
if($game_user['26'] == 0 and $game_user['27'] == 0 and $game_user['28'] == 0 and $game_user['29'] == 0 and $game_user['30'] == 0 ){
$img31 = 0;$img32 = 0;$img33 = 0;$img34 = 0;$img35 = 0;}else{$href31 = '<a href="?31">';$href32 = '<a href="?32">';$href33 = '<a href="?33">';$href34 = '<a href="?34">';$href35 = '<a href="?35">';$img31 = 1;$img32 = 1;$img33 = 1;$img34 = 1;$img35 = 1;}
}else{
$img31 = $game_user['31'];$img32 = $game_user['32'];$img33 = $game_user['33'];$img34 = $game_user['34'];$img35 = $game_user['35'];
}

if($game_user['36'] == 0 and $game_user['37'] == 0 and $game_user['38'] == 0 and $game_user['39'] == 0 and $game_user['40'] == 0 ){
if($game_user['31'] == 0 and $game_user['32'] == 0 and $game_user['33'] == 0 and $game_user['34'] == 0 and $game_user['35'] == 0 ){
$img36 = 0;$img37 = 0;$img38 = 0;$img39 = 0;$img40 = 0;}else{$href36 = '<a href="?36">';$href37 = '<a href="?37">';$href38 = '<a href="?38">';$href39 = '<a href="?39">';$href40 = '<a href="?40">';$img36 = 1;$img37 = 1;$img38 = 1;$img39 = 1;$img40 = 1;}
}else{
$img36 = $game_user['36'];$img37 = $game_user['37'];$img38 = $game_user['38'];$img39 = $game_user['39'];$img40 = $game_user['40'];
}

if($game_user['41'] == 0 and $game_user['42'] == 0 and $game_user['43'] == 0 and $game_user['44'] == 0 and $game_user['45'] == 0 ){
if($game_user['36'] == 0 and $game_user['37'] == 0 and $game_user['38'] == 0 and $game_user['39'] == 0 and $game_user['40'] == 0 ){
$img41 = 0;$img42 = 0;$img43 = 0;$img44 = 0;$img45 = 0;}else{$href41 = '<a href="?41">';$href42 = '<a href="?42">';$href43 = '<a href="?43">';$href44 = '<a href="?44">';$href45 = '<a href="?45">';$img41 = 1;$img42 = 1;$img43 = 1;$img44 = 1;$img45 = 1;}
}else{
$img41 = $game_user['41'];$img42 = $game_user['42'];$img43 = $game_user['43'];$img44 = $game_user['44'];$img45 = $game_user['45'];
}

if($game_user['46'] == 0 and $game_user['47'] == 0 and $game_user['48'] == 0 and $game_user['49'] == 0 and $game_user['50'] == 0 ){
if($game_user['41'] == 0 and $game_user['42'] == 0 and $game_user['43'] == 0 and $game_user['44'] == 0 and $game_user['45'] == 0 ){
$img46 = 0;$img47 = 0;$img48 = 0;$img49 = 0;$img50 = 0;}else{$href46 = '<a href="?46">';$href47 = '<a href="?47">';$href48 = '<a href="?48">';$href49 = '<a href="?49">';$href50 = '<a href="?50">';$img46 = 1;$img47 = 1;$img48 = 1;$img49 = 1;$img50 = 1;}
}else{
$img46 = $game_user['46'];$img47 = $game_user['47'];$img48 = $game_user['48'];$img49 = $game_user['49'];$img50 = $game_user['50'];
}









$proc1 = floor($game_user['stavka']*24/100);
$proc2 = floor($game_user['stavka']*54/100);
$proc3 = floor($game_user['stavka']*93/100);
$proc4 = floor($game_user['stavka']*141/100);
$proc5 = floor($game_user['stavka']*302/100);
$proc6 = floor($game_user['stavka']*571/100);
$proc7 = floor($game_user['stavka']*1019/100);
$proc8 = floor($game_user['stavka']*2697/100);
$proc9 = floor($game_user['stavka']*6893/100);
$proc10 = floor($game_user['stavka']*34868/100);
//echo ' '.$proc1.' ';



echo '<tr>
<td>'.$href46.'<img width="100%" src="/game/'.$img46.'.png"></a></td><td>'.$href47.'<img width="100%" src="/game/'.$img47.'.png"></a></td><td>'.$href48.'<img width="100%" src="/game/'.$img48.'.png"></a></td><td>'.$href49.'<img width="100%" src="/game/'.$img49.'.png"></a></td><td>'.$href50.'<img width="100%" src="/game/'.$img50.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc10).'</span></td>
</tr>';

echo '<tr>
<td>'.$href41.'<img width="100%" src="/game/'.$img41.'.png"></a></td><td>'.$href42.'<img width="100%" src="/game/'.$img42.'.png"></a></td><td>'.$href43.'<img width="100%" src="/game/'.$img43.'.png"></a></td><td>'.$href44.'<img width="100%" src="/game/'.$img44.'.png"></a></td><td>'.$href45.'<img width="100%" src="/game/'.$img45.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc9).'</span></td>
</tr>';

echo '<tr>
<td>'.$href36.'<img width="100%" src="/game/'.$img36.'.png"></a></td><td>'.$href37.'<img width="100%" src="/game/'.$img37.'.png"></a></td><td>'.$href38.'<img width="100%" src="/game/'.$img38.'.png"></a></td><td>'.$href39.'<img width="100%" src="/game/'.$img39.'.png"></a></td><td>'.$href40.'<img width="100%" src="/game/'.$img40.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc8).'</span></td>
</tr>';

echo '<tr>
<td>'.$href31.'<img width="100%" src="/game/'.$img31.'.png"></a></td><td>'.$href32.'<img width="100%" src="/game/'.$img32.'.png"></a></td><td>'.$href33.'<img width="100%" src="/game/'.$img33.'.png"></a></td><td>'.$href34.'<img width="100%" src="/game/'.$img34.'.png"></a></td><td>'.$href35.'<img width="100%" src="/game/'.$img35.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc7).'</span></td>
</tr>';

echo '<tr>
<td>'.$href26.'<img width="100%" src="/game/'.$img26.'.png"></a></td><td>'.$href27.'<img width="100%" src="/game/'.$img27.'.png"></a></td><td>'.$href28.'<img width="100%" src="/game/'.$img28.'.png"></a></td><td>'.$href29.'<img width="100%" src="/game/'.$img29.'.png"></a></td><td>'.$href30.'<img width="100%" src="/game/'.$img30.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc6).'</span></td>
</tr>';

echo '<tr>
<td>'.$href21.'<img width="100%" src="/game/'.$img21.'.png"></a></td><td>'.$href22.'<img width="100%" src="/game/'.$img22.'.png"></a></td><td>'.$href23.'<img width="100%" src="/game/'.$img23.'.png"></a></td><td>'.$href24.'<img width="100%" src="/game/'.$img24.'.png"></a></td><td>'.$href25.'<img width="100%" src="/game/'.$img25.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc5).'</span></td>
</tr>';

echo '<tr>
<td>'.$href16.'<img width="100%" src="/game/'.$img16.'.png"></a></td><td>'.$href17.'<img width="100%" src="/game/'.$img17.'.png"></a></td><td>'.$href18.'<img width="100%" src="/game/'.$img18.'.png"></a></td><td>'.$href19.'<img width="100%" src="/game/'.$img19.'.png"></a></td><td>'.$href20.'<img width="100%" src="/game/'.$img20.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc4).'</span></td>
</tr>';

echo '<tr>
<td>'.$href11.'<img width="100%" src="/game/'.$img11.'.png"></a></td><td>'.$href12.'<img width="100%" src="/game/'.$img12.'.png"></a></td><td>'.$href13.'<img width="100%" src="/game/'.$img13.'.png"></a></td><td>'.$href14.'<img width="100%" src="/game/'.$img14.'.png"></a></td><td>'.$href15.'<img width="100%" src="/game/'.$img15.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc3).'</span></td>
</tr>';

echo '<tr>
<td>'.$href6.'<img width="100%" src="/game/'.$img6.'.png"></a></td><td>'.$href7.'<img width="100%" src="/game/'.$img7.'.png"></a></td><td>'.$href8.'<img width="100%" src="/game/'.$img8.'.png"></a></td><td>'.$href9.'<img width="100%" src="/game/'.$img9.'.png"></a></td><td>'.$href10.'<img width="100%" src="/game/'.$img10.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc2).'</span></td>
</tr>';

echo '<tr>
<td>'.$href1.'<img width="100%" src="/game/'.$img1.'.png"></a></td><td>'.$href2.'<img width="100%" src="/game/'.$img2.'.png"></a></td><td>'.$href3.'<img width="100%" src="/game/'.$img3.'.png"></a></td><td>'.$href4.'<img width="100%" src="/game/'.$img4.'.png"></a></td><td>'.$href5.'<img width="100%" src="/game/'.$img5.'.png"></a></td><td><span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.n_f($game_user['stavka']+$proc1).'</span></td>
</tr>';


echo '</tbody></table></center>';

}


















if(isset($_GET['1'])){
if($game_user['1'] != 0 or $game_user['2'] != 0 or $game_user['3'] != 0 or $game_user['4']!= 0 or $game_user['5']!= 0 ){
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc1)."', `1` = '".$game_user_['1']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['1'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['2'])){
if($game_user['1'] != 0 or $game_user['2'] != 0 or $game_user['3'] != 0 or $game_user['4']!= 0 or $game_user['5']!= 0 ){
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc1)."', `2` = '".$game_user_['2']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['2'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['3'])){
if($game_user['1'] != 0 or $game_user['2'] != 0 or $game_user['3'] != 0 or $game_user['4']!= 0 or $game_user['5']!= 0 ){
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc1)."', `3` = '".$game_user_['3']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['3'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['4'])){
if($game_user['1'] != 0 or $game_user['2'] != 0 or $game_user['3'] != 0 or $game_user['4']!= 0 or $game_user['5']!= 0 ){
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc1)."', `4` = '".$game_user_['4']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['4'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['5'])){
if($game_user['1'] != 0 or $game_user['2'] != 0 or $game_user['3'] != 0 or $game_user['4']!= 0 or $game_user['5']!= 0 ){
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc1)."', `5` = '".$game_user_['5']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['5'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}








if(isset($_GET['6'])){
if($game_user['6'] != 0 or $game_user['7'] != 0 or $game_user['8'] != 0 or $game_user['9']!= 0 or $game_user['10']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['1'] == 0 and $game_user['2'] == 0 and $game_user['3'] == 0 and $game_user['4']== 0 and $game_user['5']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc2)."', `6` = '".$game_user_['6']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['6'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['7'])){
if($game_user['6'] != 0 or $game_user['7'] != 0 or $game_user['8'] != 0 or $game_user['9']!= 0 or $game_user['10']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['1'] == 0 and $game_user['2'] == 0 and $game_user['3'] == 0 and $game_user['4']== 0 and $game_user['5']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc2)."', `7` = '".$game_user_['7']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['7'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['8'])){
if($game_user['6'] != 0 or $game_user['7'] != 0 or $game_user['8'] != 0 or $game_user['9']!= 0 or $game_user['10']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['1'] == 0 and $game_user['2'] == 0 and $game_user['3'] == 0 and $game_user['4']== 0 and $game_user['5']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc2)."', `8` = '".$game_user_['8']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['8'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['9'])){
if($game_user['6'] != 0 or $game_user['7'] != 0 or $game_user['8'] != 0 or $game_user['9']!= 0 or $game_user['10']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['1'] == 0 and $game_user['2'] == 0 and $game_user['3'] == 0 and $game_user['4']== 0 and $game_user['5']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc2)."', `9` = '".$game_user_['9']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['9'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['10'])){
if($game_user['6'] != 0 or $game_user['7'] != 0 or $game_user['8'] != 0 or $game_user['9']!= 0 or $game_user['10']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['1'] == 0 and $game_user['2'] == 0 and $game_user['3'] == 0 and $game_user['4']== 0 and $game_user['5']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc2)."', `10` = '".$game_user_['10']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['10'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}






if(isset($_GET['11'])){
if($game_user['11'] != 0 or $game_user['12'] != 0 or $game_user['13'] != 0 or $game_user['14']!= 0 or $game_user['15']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['6'] == 0 and $game_user['7'] == 0 and $game_user['8'] == 0 and $game_user['9']== 0 and $game_user['10']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc3)."', `11` = '".$game_user_['11']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['11'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['12'])){
if($game_user['11'] != 0 or $game_user['12'] != 0 or $game_user['13'] != 0 or $game_user['14']!= 0 or $game_user['15']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['6'] == 0 and $game_user['7'] == 0 and $game_user['8'] == 0 and $game_user['9']== 0 and $game_user['10']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc3)."', `12` = '".$game_user_['12']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['12'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['13'])){
if($game_user['11'] != 0 or $game_user['12'] != 0 or $game_user['13'] != 0 or $game_user['14']!= 0 or $game_user['15']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['6'] == 0 and $game_user['7'] == 0 and $game_user['8'] == 0 and $game_user['9']== 0 and $game_user['10']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc3)."', `13` = '".$game_user_['13']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['13'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['14'])){
if($game_user['11'] != 0 or $game_user['12'] != 0 or $game_user['13'] != 0 or $game_user['14']!= 0 or $game_user['15']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['6'] == 0 and $game_user['7'] == 0 and $game_user['8'] == 0 and $game_user['9']== 0 and $game_user['10']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc3)."', `14` = '".$game_user_['14']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['14'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['15'])){
if($game_user['11'] != 0 or $game_user['12'] != 0 or $game_user['13'] != 0 or $game_user['14']!= 0 or $game_user['15']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['6'] == 0 and $game_user['7'] == 0 and $game_user['8'] == 0 and $game_user['9']== 0 and $game_user['10']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc3)."', `15` = '".$game_user_['15']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['15'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}









if(isset($_GET['16'])){
if($game_user['16'] != 0 or $game_user['17'] != 0 or $game_user['18'] != 0 or $game_user['19']!= 0 or $game_user['20']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['11'] == 0 and $game_user['12'] == 0 and $game_user['13'] == 0 and $game_user['14'] == 0 and $game_user['15'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc4)."', `16` = '".$game_user_['16']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['16'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['17'])){
if($game_user['16'] != 0 or $game_user['17'] != 0 or $game_user['18'] != 0 or $game_user['19']!= 0 or $game_user['20']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['11'] == 0 and $game_user['12'] == 0 and $game_user['13'] == 0 and $game_user['14'] == 0 and $game_user['15'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc4)."', `17` = '".$game_user_['17']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['17'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['18'])){
if($game_user['16'] != 0 or $game_user['17'] != 0 or $game_user['18'] != 0 or $game_user['19']!= 0 or $game_user['20']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['11'] == 0 and $game_user['12'] == 0 and $game_user['13'] == 0 and $game_user['14'] == 0 and $game_user['15'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc4)."', `18` = '".$game_user_['18']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['18'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['19'])){
if($game_user['16'] != 0 or $game_user['17'] != 0 or $game_user['18'] != 0 or $game_user['19']!= 0 or $game_user['20']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['11'] == 0 and $game_user['12'] == 0 and $game_user['13'] == 0 and $game_user['14'] == 0 and $game_user['15'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc4)."', `19` = '".$game_user_['19']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['19'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['20'])){
if($game_user['16'] != 0 or $game_user['17'] != 0 or $game_user['18'] != 0 or $game_user['19']!= 0 or $game_user['20']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['11'] == 0 and $game_user['12'] == 0 and $game_user['13'] == 0 and $game_user['14'] == 0 and $game_user['15'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc4)."', `20` = '".$game_user_['20']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['20'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}








if(isset($_GET['21'])){
if($game_user['21'] != 0 or $game_user['22'] != 0 or $game_user['23'] != 0 or $game_user['24']!= 0 or $game_user['25']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['16'] == 0 and $game_user['17'] == 0 and $game_user['18'] == 0 and $game_user['19']== 0 and $game_user['20']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc5)."', `21` = '".$game_user_['21']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['21'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['22'])){
if($game_user['21'] != 0 or $game_user['22'] != 0 or $game_user['23'] != 0 or $game_user['24']!= 0 or $game_user['25']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['16'] == 0 and $game_user['17'] == 0 and $game_user['18'] == 0 and $game_user['19']== 0 and $game_user['20']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc5)."', `22` = '".$game_user_['22']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['22'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['23'])){
if($game_user['21'] != 0 or $game_user['22'] != 0 or $game_user['23'] != 0 or $game_user['24']!= 0 or $game_user['25']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['16'] == 0 and $game_user['17'] == 0 and $game_user['18'] == 0 and $game_user['19']== 0 and $game_user['20']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc5)."', `23` = '".$game_user_['23']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['23'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['24'])){
if($game_user['21'] != 0 or $game_user['22'] != 0 or $game_user['23'] != 0 or $game_user['24']!= 0 or $game_user['25']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['16'] == 0 and $game_user['17'] == 0 and $game_user['18'] == 0 and $game_user['19']== 0 and $game_user['20']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc5)."', `24` = '".$game_user_['24']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['24'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['25'])){
if($game_user['21'] != 0 or $game_user['22'] != 0 or $game_user['23'] != 0 or $game_user['24']!= 0 or $game_user['25']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['16'] == 0 and $game_user['17'] == 0 and $game_user['18'] == 0 and $game_user['19']== 0 and $game_user['20']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc5)."', `25` = '".$game_user_['25']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['25'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}





if(isset($_GET['26'])){
if($game_user['26'] != 0 or $game_user['27'] != 0 or $game_user['28'] != 0 or $game_user['29']!= 0 or $game_user['30']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['21'] == 0 and $game_user['22'] == 0 and $game_user['23'] == 0 and $game_user['24']== 0 and $game_user['25']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc6)."', `26` = '".$game_user_['26']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['26'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['27'])){
if($game_user['26'] != 0 or $game_user['27'] != 0 or $game_user['28'] != 0 or $game_user['29']!= 0 or $game_user['30']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['21'] == 0 and $game_user['22'] == 0 and $game_user['23'] == 0 and $game_user['24']== 0 and $game_user['25']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc6)."', `27` = '".$game_user_['27']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['27'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['28'])){
if($game_user['26'] != 0 or $game_user['27'] != 0 or $game_user['28'] != 0 or $game_user['29']!= 0 or $game_user['30']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['21'] == 0 and $game_user['22'] == 0 and $game_user['23'] == 0 and $game_user['24']== 0 and $game_user['25']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc6)."', `28` = '".$game_user_['28']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['28'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['29'])){
if($game_user['26'] != 0 or $game_user['27'] != 0 or $game_user['28'] != 0 or $game_user['29']!= 0 or $game_user['30']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['21'] == 0 and $game_user['22'] == 0 and $game_user['23'] == 0 and $game_user['24']== 0 and $game_user['25']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc6)."', `29` = '".$game_user_['29']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['29'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['30'])){
if($game_user['26'] != 0 or $game_user['27'] != 0 or $game_user['28'] != 0 or $game_user['29']!= 0 or $game_user['30']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['21'] == 0 and $game_user['22'] == 0 and $game_user['23'] == 0 and $game_user['24']== 0 and $game_user['25']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc6)."', `30` = '".$game_user_['30']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['30'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}




if(isset($_GET['31'])){
if($game_user['31'] != 0 or $game_user['32'] != 0 or $game_user['33'] != 0 or $game_user['34']!= 0 or $game_user['35']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['26'] == 0 and $game_user['27'] == 0 and $game_user['28'] == 0 and $game_user['29'] == 0 and $game_user['30'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc7)."', `31` = '".$game_user_['31']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['31'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['32'])){
if($game_user['31'] != 0 or $game_user['32'] != 0 or $game_user['33'] != 0 or $game_user['34']!= 0 or $game_user['35']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['26'] == 0 and $game_user['27'] == 0 and $game_user['28'] == 0 and $game_user['29'] == 0 and $game_user['30'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc7)."', `32` = '".$game_user_['32']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['32'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['33'])){
if($game_user['31'] != 0 or $game_user['32'] != 0 or $game_user['33'] != 0 or $game_user['34']!= 0 or $game_user['35']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['26'] == 0 and $game_user['27'] == 0 and $game_user['28'] == 0 and $game_user['29'] == 0 and $game_user['30'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc7)."', `33` = '".$game_user_['33']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['33'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['34'])){
if($game_user['31'] != 0 or $game_user['32'] != 0 or $game_user['33'] != 0 or $game_user['34']!= 0 or $game_user['35']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['26'] == 0 and $game_user['27'] == 0 and $game_user['28'] == 0 and $game_user['29'] == 0 and $game_user['30'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc7)."', `34` = '".$game_user_['34']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['34'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['35'])){
if($game_user['31'] != 0 or $game_user['32'] != 0 or $game_user['33'] != 0 or $game_user['34']!= 0 or $game_user['35']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['26'] == 0 and $game_user['27'] == 0 and $game_user['28'] == 0 and $game_user['29'] == 0 and $game_user['30'] == 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc7)."', `35` = '".$game_user_['35']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['35'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}








if(isset($_GET['36'])){
if($game_user['36'] != 0 or $game_user['37'] != 0 or $game_user['38'] != 0 or $game_user['39']!= 0 or $game_user['40']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['31'] == 0 and $game_user['32'] == 0 and $game_user['33'] == 0 and $game_user['34']== 0 and $game_user['35']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc8)."', `36` = '".$game_user_['36']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['36'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['37'])){
if($game_user['36'] != 0 or $game_user['37'] != 0 or $game_user['38'] != 0 or $game_user['39']!= 0 or $game_user['40']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['31'] == 0 and $game_user['32'] == 0 and $game_user['33'] == 0 and $game_user['34']== 0 and $game_user['35']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc8)."', `37` = '".$game_user_['37']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['37'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['38'])){
if($game_user['36'] != 0 or $game_user['37'] != 0 or $game_user['38'] != 0 or $game_user['39']!= 0 or $game_user['40']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['31'] == 0 and $game_user['32'] == 0 and $game_user['33'] == 0 and $game_user['34']== 0 and $game_user['35']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc8)."', `38` = '".$game_user_['38']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['38'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['7']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['39'])){
if($game_user['36'] != 0 or $game_user['37'] != 0 or $game_user['38'] != 0 or $game_user['39']!= 0 or $game_user['40']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['31'] == 0 and $game_user['32'] == 0 and $game_user['33'] == 0 and $game_user['34']== 0 and $game_user['35']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc8)."', `39` = '".$game_user_['39']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['39'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['40'])){
if($game_user['36'] != 0 or $game_user['37'] != 0 or $game_user['38'] != 0 or $game_user['39']!= 0 or $game_user['40']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['31'] == 0 and $game_user['32'] == 0 and $game_user['33'] == 0 and $game_user['34']== 0 and $game_user['35']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc8)."', `40` = '".$game_user_['40']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['40'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}







if(isset($_GET['41'])){
if($game_user['41'] != 0 or $game_user['42'] != 0 or $game_user['43'] != 0 or $game_user['44']!= 0 or $game_user['45']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['36'] == 0 and $game_user['37'] == 0 and $game_user['38'] == 0 and $game_user['39']== 0 and $game_user['40']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc9)."', `41` = '".$game_user_['41']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['41'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['42'])){
if($game_user['41'] != 0 or $game_user['42'] != 0 or $game_user['43'] != 0 or $game_user['44']!= 0 or $game_user['45']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['36'] == 0 and $game_user['37'] == 0 and $game_user['38'] == 0 and $game_user['39']== 0 and $game_user['40']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc9)."', `42` = '".$game_user_['42']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['42'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['43'])){
if($game_user['41'] != 0 or $game_user['42'] != 0 or $game_user['43'] != 0 or $game_user['44']!= 0 or $game_user['45']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['36'] == 0 and $game_user['37'] == 0 and $game_user['38'] == 0 and $game_user['39']== 0 and $game_user['40']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc9)."', `43` = '".$game_user_['43']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['43'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['44'])){
if($game_user['41'] != 0 or $game_user['42'] != 0 or $game_user['43'] != 0 or $game_user['44']!= 0 or $game_user['45']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['36'] == 0 and $game_user['37'] == 0 and $game_user['38'] == 0 and $game_user['39']== 0 and $game_user['40']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc9)."', `44` = '".$game_user_['44']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['44'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['45'])){
if($game_user['41'] != 0 or $game_user['42'] != 0 or $game_user['43'] != 0 or $game_user['44']!= 0 or $game_user['45']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['36'] == 0 and $game_user['37'] == 0 and $game_user['38'] == 0 and $game_user['39']== 0 and $game_user['40']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc9)."', `45` = '".$game_user_['45']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['45'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}






if(isset($_GET['46'])){
if($game_user['46'] != 0 or $game_user['47'] != 0 or $game_user['48'] != 0 or $game_user['49']!= 0 or $game_user['50']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['41'] == 0 and $game_user['42'] == 0 and $game_user['43'] == 0 and $game_user['44']== 0 and $game_user['45']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc10)."', `46` = '".$game_user_['46']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['46'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}else{
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '1' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['47'])){
if($game_user['46'] != 0 or $game_user['47'] != 0 or $game_user['48'] != 0 or $game_user['49']!= 0 or $game_user['50']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['41'] == 0 and $game_user['42'] == 0 and $game_user['43'] == 0 and $game_user['44']== 0 and $game_user['45']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc10)."', `47` = '".$game_user_['47']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['47'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}else{
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '1' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['48'])){
if($game_user['46'] != 0 or $game_user['47'] != 0 or $game_user['48'] != 0 or $game_user['49']!= 0 or $game_user['50']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['41'] == 0 and $game_user['42'] == 0 and $game_user['43'] == 0 and $game_user['44']== 0 and $game_user['45']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc10)."', `48` = '".$game_user_['48']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['48'] == 3 ){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}else{
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '1' WHERE `id` = '".$game_user['id']."' ");}
header('Location: ?');
exit();
}
if(isset($_GET['49'])){
if($game_user['46'] != 0 or $game_user['47'] != 0 or $game_user['48'] != 0 or $game_user['49']!= 0 or $game_user['50']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['41'] == 0 and $game_user['42'] == 0 and $game_user['43'] == 0 and $game_user['44']== 0 and $game_user['45']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc10)."', `49` = '".$game_user_['49']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['49'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}else{
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '1' WHERE `id` = '".$game_user['id']."' ");
}
header('Location: ?');
exit();
}
if(isset($_GET['50'])){
if($game_user['46'] != 0 or $game_user['47'] != 0 or $game_user['48'] != 0 or $game_user['49']!= 0 or $game_user['50']!= 0 ){
header('Location: ?');
exit();
}
if($game_user['41'] == 0 and $game_user['42'] == 0 and $game_user['43'] == 0 and $game_user['44']== 0 and $game_user['45']== 0 ){
$txtttt = 'Игрок '.nick($user['id']).' попытался открыть ячейку которая не должна открываться.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($mission_user_34['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_34['prog_']+1)."' WHERE `id` = '".$mission_user_34['id']."' ");
}
if($Achievements_user_33['prog'] < $Achievements_user_33['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_33['prog']+1)."' WHERE `id` = '".$Achievements_user_33['id']."' ");
}
mysql_query("UPDATE `game` SET `rubin` = '".($game_user['stavka']+$proc10)."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
if($game_user_['50'] == 3){
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '2', `1` = '".$game_user_['1']."', `2` = '".$game_user_['2']."', `3` = '".$game_user_['3']."', `4` = '".$game_user_['4']."', `5` = '".$game_user_['5']."', `6` = '".$game_user_['6']."', `7` = '".$game_user_['7']."', `8` = '".$game_user_['8']."', `9` = '".$game_user_['9']."', `10` = '".$game_user_['10']."', `11` = '".$game_user_['11']."', `12` = '".$game_user_['12']."', `13` = '".$game_user_['13']."', `14` = '".$game_user_['14']."', `15` = '".$game_user_['15']."', `16` = '".$game_user_['16']."', `17` = '".$game_user_['17']."', `18` = '".$game_user_['18']."', `19` = '".$game_user_['19']."', `20` = '".$game_user_['20']."', `21` = '".$game_user_['21']."', `22` = '".$game_user_['22']."', `23` = '".$game_user_['23']."', `24` = '".$game_user_['24']."', `25` = '".$game_user_['25']."', `26` = '".$game_user_['26']."', `27` = '".$game_user_['27']."', `28` = '".$game_user_['28']."', `29` = '".$game_user_['29']."', `30` = '".$game_user_['30']."', `31` = '".$game_user_['31']."', `32` = '".$game_user_['32']."', `33` = '".$game_user_['33']."', `34` = '".$game_user_['34']."', `35` = '".$game_user_['35']."', `36` = '".$game_user_['36']."', `37` = '".$game_user_['37']."', `38` = '".$game_user_['38']."', `39` = '".$game_user_['39']."', `40` = '".$game_user_['40']."', `41` = '".$game_user_['41']."', `42` = '".$game_user_['42']."', `43` = '".$game_user_['43']."', `44` = '".$game_user_['44']."', `45` = '".$game_user_['45']."', `46` = '".$game_user_['46']."', `47` = '".$game_user_['47']."', `48` = '".$game_user_['48']."', `49` = '".$game_user_['49']."', `50` = '".$game_user_['50']."' WHERE `id` = '".$game_user['id']."' ");
}else{
if($mission_user_35['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_35['prog_']+1)."' WHERE `id` = '".$mission_user_35['id']."' ");
}
if($Achievements_user_34['prog'] < $Achievements_user_34['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_34['prog']+1)."' WHERE `id` = '".$Achievements_user_34['id']."' ");
}
mysql_query("UPDATE `game` SET `pobeda` = '1' WHERE `id` = '".$game_user['id']."' ");
}
header('Location: ?');
exit();
}










if($game_user){
echo '<center>
Ваша ставка: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$game_user['stavka'].'';
if($game_user['rubin'] > 0 and $game_user['pobeda'] != 2){
echo '<a class="btnl" href="?ok">Забрать выигрыш <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>'.$game_user['rubin'].'</font></a>';
}elseif($game_user['pobeda'] == 2){
mysql_query('DELETE FROM `game` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `game_` WHERE `user` = '.$user['id'].' ');
echo '<a class="btnl" href="?">Закрыть игру</a>';
}
echo '</center>';
}

if(isset($_GET['ok'])){
if($game_user['pobeda'] == 2){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка, вы проиграли.</font>';
exit();
}
if($game_user['rubin'] == 0){
header('Location: ?');
exit();
}
if($game_user['rubin'] >= 350000){
$txtttt = 'Игрок '.nick($user['id']).' попытался забрать награду больше 350к.';$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);if($con == 0) {mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");}mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");mysql_query("INSERT INTO `message` SET `text` = '".$txtttt."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
exit();
}
if($game_user['rubin'] > 0 and $game_user['pobeda'] != 2){
if($mission_user_32['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_32['prog_']+$game_user['rubin'])."' WHERE `id` = '".$mission_user_32['id']."' ");
}
if($Achievements_user_31['prog'] < $Achievements_user_31['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_31['prog']+$game_user['rubin'])."' WHERE `id` = '".$Achievements_user_31['id']."' ");
}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$game_user['rubin'])."' WHERE `id` = '".$user['id']."' LIMIT 1 ");
mysql_query('DELETE FROM `game` WHERE `user` = '.$user['id'].' ');
mysql_query('DELETE FROM `game_` WHERE `user` = '.$user['id'].' ');
}
header('Location: ?');
$_SESSION['err'] = 'Ваш выигрыш: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>'.($game_user['rubin']).'</font>';
exit();
}



echo '<hr><font size="1"><font color="black"> <font size="3">•</font></font> Игра начинается снизу, в первой полосе необходимо выбрать ячейку, если в ячейке оказывается рубин, значит игра продолжается и теперь необходимо выбрать ячейку в следующей полосе и так далее, но только если в выбранных ячейках оказывается рубин, если же ячейка оказывается заминированной, Вы это непременно увидите, так как вскроется всё игровое поле (все полосы и все ячейки) и игра закончится, что будет значить - поражение игрока.</font>';

if(!$game_user){
echo '<hr><a class="btnl" href="'.$HOME.'menu/">Назад</a>';
}

require_once ('../system/footer.php');
?>