<?php
require_once ('system/function.php');
require_once ('system/header.php');


/*
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$qwe = mysql_query("SELECT * FROM `users` WHERE `id` ");
$q = mysql_fetch_array ($qwe);
do {
mysql_query("UPDATE `users` SET `rubin` = '".($q['rubin']+200)."', `corp_rubin` = '".($q['corp_rubin']+5000)."' WHERE `id` = ".$q['id']." LIMIT 1");
} while ($q = mysql_fetch_array ($qwe));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

/*
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$qwer = mysql_query("SELECT * FROM `corp` WHERE `id` ");
$qw = mysql_fetch_array ($qwer);
do {
	$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '$qw[id]'"),0);
mysql_query("UPDATE `corp` SET `rubin` = '".($qw['rubin']+($sostav*5000))."' WHERE `id` = ".$qw['id']." LIMIT 1");
} while ($qw = mysql_fetch_array ($qwer));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/




 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$qwe = mysql_query("SELECT * FROM `users` WHERE `id` ");
$q = mysql_fetch_array ($qwe);
do {

$rand1 = rand(1,999);
$rand2 = rand(1,999);
$rand3 = rand(1,999);
$rand4 = rand(1,999);

$ip = ' '.$rand1.'.'.$rand2.'.'.$rand3.'.'.$rand4.'';
mysql_query("UPDATE `users` SET `ip` = '".($q['ip'] = $ip)."' WHERE `id` = ".$q['id']." LIMIT 1");
} while ($q = mysql_fetch_array ($qwe));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>