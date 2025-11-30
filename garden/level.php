<?php
require_once ('../system/function.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$id = abs(intval($_GET['id']));
$fid = abs(intval($_GET['fid']));
if($id == 0){
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}


$r = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user`  = '".$user['id']."' and `id`  = '".$id."' ")); 
//$cost_level_ = (9+$r['level']*$r['level']);
$cost_level_ = (9+$r['level']*$r['level']- (($r['level']*$r['level'])/2) );
$cost_level = ceil($cost_level_);

if($r['level'] >= 10000){
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}
if($user['leaf'] < $cost_level){
$_SESSION['err'] = 'Вам не хватает <span><img src="/images/garden/leaf.png" alt="$" width="24" height="24"> <span>'.n_f($cost_level-$user['leaf']).'</span></span><div></div>';
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}

mysql_query("UPDATE `garden_plant_user` SET `level` = '".($r['level']+1)."' WHERE `id` = '".$r['id']."' ");
mysql_query("UPDATE `users` SET `leaf` = '".($user['leaf']-$cost_level)."'  WHERE `id` = '".$user['id']."' ");

header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
?> 