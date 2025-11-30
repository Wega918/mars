<?php
///////////////////////////////////////////////////////     ферма     ///////////////////////////////////////////////////////
if($user['vip_pay'] == 1 ){
$rubin_man = 100;
}else{
$rubin_man = 50;
}
$garden_plant_user_active = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user_active` WHERE `user` = '".$user['id']."' "));
if(!$garden_plant_user_active){
mysql_query("INSERT INTO `garden_plant_user_active` SET `user` = '".$user['id']."' ");
}






$reises_user1 = mysql_fetch_array(mysql_query("SELECT * FROM `garden_plant_user` LEFT JOIN `users` USING (user) WHERE `reises_user`.`user` != '".$user['id']."' and `reises_user`.`vremya` > '".time()."' and `reises_user`.`time_obsl` < '".time()."' and `offers`.`offers` > 0 and `offers`.`cost` > 0  and reises_user.id not in (select reises from reises_island) LIMIT 1"));


//garden_plant_user









$garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_1['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_1['id']."' and `id` = '".$garden_time_0_1['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_1['management'] == 0 or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] == 0) or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] > 0 and $user_garden_time_0_1['rubin'] < $rubin_man) ){
$garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_1['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_1['id']."' and `id` = '".$garden_time_0_1['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_1['management'] == 0 or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] == 0) or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] > 0 and $user_garden_time_0_1['rubin'] < $rubin_man) ){
$garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_1['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_1['id']."' and `id` = '".$garden_time_0_1['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_1['management'] == 0 or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] == 0) or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] > 0 and $user_garden_time_0_1['rubin'] < $rubin_man) ){
$garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_1['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_1['id']."' and `id` = '".$garden_time_0_1['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_1['management'] == 0 or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] == 0) or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] > 0 and $user_garden_time_0_1['rubin'] < $rubin_man) ){
$garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_1['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_1['id']."' and `id` = '".$garden_time_0_1['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_1['management'] == 0 or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] == 0) or ($user_garden_time_0_1['management'] != 0 and $user_garden_time_0_1['management_cost'] > 0 and $user_garden_time_0_1['rubin'] < $rubin_man) ){

}else{
if($garden_plant_user_active['1'] == 0 or ($garden_plant_user_active['2'] == $garden_plant_user_active['1'] or $garden_plant_user_active['3'] == $garden_plant_user_active['1'] or $garden_plant_user_active['4'] == $garden_plant_user_active['1'] or $garden_plant_user_active['5'] == $garden_plant_user_active['1'])     ){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '".$garden_1['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['1'] == 0 or ($garden_plant_user_active['2'] == $garden_plant_user_active['1'] or $garden_plant_user_active['3'] == $garden_plant_user_active['1'] or $garden_plant_user_active['4'] == $garden_plant_user_active['1'] or $garden_plant_user_active['5'] == $garden_plant_user_active['1'])     ){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '".$garden_1['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['1'] == 0 or ($garden_plant_user_active['2'] == $garden_plant_user_active['1'] or $garden_plant_user_active['3'] == $garden_plant_user_active['1'] or $garden_plant_user_active['4'] == $garden_plant_user_active['1'] or $garden_plant_user_active['5'] == $garden_plant_user_active['1'])     ){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '".$garden_1['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['1'] == 0 or ($garden_plant_user_active['2'] == $garden_plant_user_active['1'] or $garden_plant_user_active['3'] == $garden_plant_user_active['1'] or $garden_plant_user_active['4'] == $garden_plant_user_active['1'] or $garden_plant_user_active['5'] == $garden_plant_user_active['1'])     ){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '".$garden_1['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['1'] == 0 or ($garden_plant_user_active['2'] == $garden_plant_user_active['1'] or $garden_plant_user_active['3'] == $garden_plant_user_active['1'] or $garden_plant_user_active['4'] == $garden_plant_user_active['1'] or $garden_plant_user_active['5'] == $garden_plant_user_active['1'])     ){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '".$garden_1['id']."' WHERE `user` = '".$user['id']."' ");
}
}





$garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_2['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_2['id']."' and `id` = '".$garden_time_0_2['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_2['management'] == 0 or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] == 0) or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] > 0 and $user_garden_time_0_2['rubin'] < $rubin_man) ){
$garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_2['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_2['id']."' and `id` = '".$garden_time_0_2['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_2['management'] == 0 or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] == 0) or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] > 0 and $user_garden_time_0_2['rubin'] < $rubin_man) ){
$garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_2['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_2['id']."' and `id` = '".$garden_time_0_2['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_2['management'] == 0 or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] == 0) or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] > 0 and $user_garden_time_0_2['rubin'] < $rubin_man) ){
$garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_2['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_2['id']."' and `id` = '".$garden_time_0_2['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_2['management'] == 0 or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] == 0) or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] > 0 and $user_garden_time_0_2['rubin'] < $rubin_man) ){
$garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_2['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_2['id']."' and `id` = '".$garden_time_0_2['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_2['management'] == 0 or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] == 0) or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] > 0 and $user_garden_time_0_2['rubin'] < $rubin_man) ){
$garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_2['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_2['id']."' and `id` = '".$garden_time_0_2['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_2['management'] == 0 or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] == 0) or ($user_garden_time_0_2['management'] != 0 and $user_garden_time_0_2['management_cost'] > 0 and $user_garden_time_0_2['rubin'] < $rubin_man) ){

}else{
if($garden_plant_user_active['2'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$garden_2['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['2'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$garden_2['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['2'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$garden_2['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['2'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$garden_2['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['2'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$garden_2['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['2'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$garden_2['id']."' WHERE `user` = '".$user['id']."' ");
}
}




$garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_3['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_3['id']."' and `id` = '".$garden_time_0_3['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_3['management'] == 0 or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] == 0) or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] > 0 and $user_garden_time_0_3['rubin'] < $rubin_man) ){
$garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_3['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_3['id']."' and `id` = '".$garden_time_0_3['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_3['management'] == 0 or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] == 0) or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] > 0 and $user_garden_time_0_3['rubin'] < $rubin_man) ){
$garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_3['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_3['id']."' and `id` = '".$garden_time_0_3['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_3['management'] == 0 or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] == 0) or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] > 0 and $user_garden_time_0_3['rubin'] < $rubin_man) ){
$garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_3['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_3['id']."' and `id` = '".$garden_time_0_3['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_3['management'] == 0 or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] == 0) or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] > 0 and $user_garden_time_0_3['rubin'] < $rubin_man) ){
$garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_3['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_3['id']."' and `id` = '".$garden_time_0_3['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_3['management'] == 0 or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] == 0) or ($user_garden_time_0_3['management'] != 0 and $user_garden_time_0_3['management_cost'] > 0 and $user_garden_time_0_3['rubin'] < $rubin_man) ){

}else{
if($garden_plant_user_active['3'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['3'] or $garden_plant_user_active['2'] == $garden_plant_user_active['3'] or $garden_plant_user_active['4'] == $garden_plant_user_active['3'] or $garden_plant_user_active['5'] == $garden_plant_user_active['3'])){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '".$garden_3['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['3'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['3'] or $garden_plant_user_active['2'] == $garden_plant_user_active['3'] or $garden_plant_user_active['4'] == $garden_plant_user_active['3'] or $garden_plant_user_active['5'] == $garden_plant_user_active['3'])){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '".$garden_3['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['3'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['3'] or $garden_plant_user_active['2'] == $garden_plant_user_active['3'] or $garden_plant_user_active['4'] == $garden_plant_user_active['3'] or $garden_plant_user_active['5'] == $garden_plant_user_active['3'])){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '".$garden_3['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['3'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['3'] or $garden_plant_user_active['2'] == $garden_plant_user_active['3'] or $garden_plant_user_active['4'] == $garden_plant_user_active['3'] or $garden_plant_user_active['5'] == $garden_plant_user_active['3'])){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '".$garden_3['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['3'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['3'] or $garden_plant_user_active['2'] == $garden_plant_user_active['3'] or $garden_plant_user_active['4'] == $garden_plant_user_active['3'] or $garden_plant_user_active['5'] == $garden_plant_user_active['3'])){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '".$garden_3['id']."' WHERE `user` = '".$user['id']."' ");
}
}






$garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_4['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_4['id']."' and `id` = '".$garden_time_0_4['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_4['management'] == 0 or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] == 0) or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] > 0 and $user_garden_time_0_4['rubin'] < $rubin_man) ){
$garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_4['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_4['id']."' and `id` = '".$garden_time_0_4['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_4['management'] == 0 or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] == 0) or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] > 0 and $user_garden_time_0_4['rubin'] < $rubin_man) ){
$garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_4['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_4['id']."' and `id` = '".$garden_time_0_4['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_4['management'] == 0 or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] == 0) or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] > 0 and $user_garden_time_0_4['rubin'] < $rubin_man) ){
$garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_4['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_4['id']."' and `id` = '".$garden_time_0_4['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_4['management'] == 0 or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] == 0) or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] > 0 and $user_garden_time_0_4['rubin'] < $rubin_man) ){
$garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_4['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_4['id']."' and `id` = '".$garden_time_0_4['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_4['management'] == 0 or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] == 0) or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] > 0 and $user_garden_time_0_4['rubin'] < $rubin_man) ){
$garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_4['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_4['id']."' and `id` = '".$garden_time_0_4['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_4['management'] == 0 or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] == 0) or ($user_garden_time_0_4['management'] != 0 and $user_garden_time_0_4['management_cost'] > 0 and $user_garden_time_0_4['rubin'] < $rubin_man) ){

}else{
if($garden_plant_user_active['4'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$garden_4['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['4'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$garden_4['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['4'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$garden_4['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['4'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$garden_4['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['4'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$garden_4['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['4'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$garden_4['id']."' WHERE `user` = '".$user['id']."' ");
}
}







$garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_5['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_5['id']."' and `id` = '".$garden_time_0_5['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_5['management'] == 0 or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] == 0) or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] > 0 and $user_garden_time_0_5['rubin'] < $rubin_man) ){
$garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_5['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_5['id']."' and `id` = '".$garden_time_0_5['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_5['management'] == 0 or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] == 0) or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] > 0 and $user_garden_time_0_5['rubin'] < $rubin_man) ){
$garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_5['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_5['id']."' and `id` = '".$garden_time_0_5['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_5['management'] == 0 or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] == 0) or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] > 0 and $user_garden_time_0_5['rubin'] < $rubin_man) ){
$garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_5['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_5['id']."' and `id` = '".$garden_time_0_5['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_5['management'] == 0 or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] == 0) or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] > 0 and $user_garden_time_0_5['rubin'] < $rubin_man) ){
$garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_5['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_5['id']."' and `id` = '".$garden_time_0_5['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_5['management'] == 0 or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] == 0) or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] > 0 and $user_garden_time_0_5['rubin'] < $rubin_man) ){
$garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` != '".$user['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1")); // одна рандомная грядка которую можно собрать
$user_garden_time_0_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$garden_time_0_5['user']."' ")); // игрок которому пренадлежит эта рандомная грядка
$garden_5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user_garden_time_0_5['id']."' and `id` = '".$garden_time_0_5['id']."' ")); // игрок которому пренадлежит эта рандомная грядка

if($user_garden_time_0_5['management'] == 0 or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] == 0) or ($user_garden_time_0_5['management'] != 0 and $user_garden_time_0_5['management_cost'] > 0 and $user_garden_time_0_5['rubin'] < $rubin_man) ){

}else{
if($garden_plant_user_active['5'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$garden_5['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['5'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$garden_5['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['5'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$garden_5['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['5'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$garden_5['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['5'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$garden_5['id']."' WHERE `user` = '".$user['id']."' ");
}
}
}else{
if($garden_plant_user_active['5'] == 0 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$garden_5['id']."' WHERE `user` = '".$user['id']."' ");
}
}










/*

$rubin_man = 50;
$r1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` != '".$user['id']."' and `management` = '1' and `management_cost` > '0' and `rubin` >= '".$rubin_man."' "),0);
for($i = 0, $r1--; $i < 5; $i++) {
$r2 = rand(1, $r1);
$query_2 = "SELECT * FROM `users` WHERE `id` != '".$user['id']."' and `management` = '1' and `management_cost` > '0' and `rubin` >= '".$rubin_man."' Limit $r2, 1"; 
$q_2 = mysql_fetch_assoc(mysql_query($query_2));

$q_21 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$q_2['id']."' and `time` < '".time()."' and `images` > '0' ORDER BY RAND() LIMIT 1 "));
$q_212 = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$q_2['id']."' and `time` < '".time()."' and `images` > '0'  ORDER BY RAND() LIMIT 1 "));
$garden_plant_user_active = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user_active` WHERE `user` = '".$user['id']."' "));
if($q_21['id'] == 0){
$q_21['id'] = $q_212['id'];
}
if(!$garden_plant_user_active){
mysql_query("INSERT INTO `garden_plant_user_active` SET `user` = '".$user['id']."' ");
}





if($garden_plant_user_active['1'] == 0 and $i == 0 or ($garden_plant_user_active['2'] == $garden_plant_user_active['1'] or $garden_plant_user_active['3'] == $garden_plant_user_active['1'] or $garden_plant_user_active['4'] == $garden_plant_user_active['1'] or $garden_plant_user_active['5'] == $garden_plant_user_active['1'])     ){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['2'] == 0 and $i == 1 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['3'] == 0 and $i == 2 or ($garden_plant_user_active['1'] == $garden_plant_user_active['3'] or $garden_plant_user_active['2'] == $garden_plant_user_active['3'] or $garden_plant_user_active['4'] == $garden_plant_user_active['3'] or $garden_plant_user_active['5'] == $garden_plant_user_active['3'])){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['4'] == 0 and $i == 3 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['5'] == 0 and $i == 4 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['1'] == 0 and $i == 0 or ($garden_plant_user_active['2'] == $garden_plant_user_active['1'] or $garden_plant_user_active['3'] == $garden_plant_user_active['1'] or $garden_plant_user_active['4'] == $garden_plant_user_active['1'] or $garden_plant_user_active['5'] == $garden_plant_user_active['1'])     ){
mysql_query("UPDATE `garden_plant_user_active` SET `1` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['2'] == 0 and $i == 1 or ($garden_plant_user_active['1'] == $garden_plant_user_active['2'] or $garden_plant_user_active['3'] == $garden_plant_user_active['2'] or $garden_plant_user_active['4'] == $garden_plant_user_active['2'] or $garden_plant_user_active['5'] == $garden_plant_user_active['2'])){
mysql_query("UPDATE `garden_plant_user_active` SET `2` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['3'] == 0 and $i == 2 or ($garden_plant_user_active['1'] == $garden_plant_user_active['3'] or $garden_plant_user_active['2'] == $garden_plant_user_active['3'] or $garden_plant_user_active['4'] == $garden_plant_user_active['3'] or $garden_plant_user_active['5'] == $garden_plant_user_active['3'])){
mysql_query("UPDATE `garden_plant_user_active` SET `3` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['4'] == 0 and $i == 3 or ($garden_plant_user_active['1'] == $garden_plant_user_active['4'] or $garden_plant_user_active['2'] == $garden_plant_user_active['4'] or $garden_plant_user_active['3'] == $garden_plant_user_active['4'] or $garden_plant_user_active['5'] == $garden_plant_user_active['4'])){
mysql_query("UPDATE `garden_plant_user_active` SET `4` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}elseif($garden_plant_user_active['5'] == 0 and $i == 4 or ($garden_plant_user_active['1'] == $garden_plant_user_active['5'] or $garden_plant_user_active['2'] == $garden_plant_user_active['5'] or $garden_plant_user_active['3'] == $garden_plant_user_active['5'] or $garden_plant_user_active['4'] == $garden_plant_user_active['5'])){
mysql_query("UPDATE `garden_plant_user_active` SET `5` = '".$q_21['id']."' WHERE `user` = '".$user['id']."' ");
}




}
*/



///////////////////////////////////////////////////////     ферма     ///////////////////////////////////////////////////////
?>