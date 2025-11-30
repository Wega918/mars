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


if(isset($_GET['en_max'])){
if($user['rubin'] < (5*$user['en_max'])){
$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f((5*$user['en_max'])-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="16" height="16" alt=""> Купить</a></div>';
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `en` = '".$max_coll_en."', `rubin` = '".($user['rubin']-(5*$user['en_max']))."' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<img src="/images/garden/energy.png" alt="$" width="24" height="24"> Энергия <span>+'.$user['en_max'].'</span> <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> Рубины <span>-'.n_f(5*$user['en_max']).'</span>
<br><a href="?en_max">Получить '.$user['en_max'].' энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.(5*$user['en_max']).'';
header('Location: ?');
exit();
}

$r = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user`  = '".$user['id']."' and `id`  = '".$id."' ")); 
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user`  = '".$user['id']."' and `name`  = '".$r['name']."' "));

if($r['time'] >= time()){
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}
if($user['en'] < 1){
$_SESSION['err'] = 'Нет <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(250*$user['en_max']).'';
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}
$sbor = $r['harvest']+($r['level']-1);
mysql_query("UPDATE `garden_plant_user` SET `name` = '".$r['name']."', `time` = '".(time()+$garden_user_['time'])."', `harvest` = '".$r['harvest']."', `images` = '".$r['images']."'  WHERE `id` = '".$r['id']."' ");
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `leaf` = '".($user['leaf']+$sbor)."'  WHERE `id` = '".$user['id']."' ");


if($mission_user_25['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_25['prog_']+1)."' WHERE `id` = '".$mission_user_25['id']."' ");
}

header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
?> 