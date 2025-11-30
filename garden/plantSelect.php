<?php
$title = 'Мои грядки';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
require_once ('../garden/taimers1.php');
//-----Если гость,то...----//
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

$garden_plant_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user`  = '".$user['id']."' and `id`  = '".$id."' ")); // грядки игрока
//if($garden_plant_user_['time'] > time()){
//header('Location: '.$HOME.'garden/?page='.$fid.'');
//exit();
//}



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





echo '<div class="mt4 content">Выберите растение для посадки</div>';



if (empty($user['max'])) $user['max']=10;
$max = 75;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_user` WHERE `user` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `garden_user` WHERE `user` = '".$user['id']."' ORDER BY `harvest` ASC LIMIT $start,$max");
echo '<div class="content"><div class="bordered">';
while($r = mysql_fetch_assoc($users)){
$reyt = $k_post++;



echo '<span style="padding:4px;display:inline-block;"><a href="?buy_'.$r['id'].'"><img src="/images/garden/a'.$r['images'].'.jpg" alt="plant" width="64" height="64"></a></span>';



if(isset($_GET['buy_'.$r['id'].''])){
$garden_user_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user`  = '".$user['id']."' and `name`  = '".$r['name']."'")); // растения игрока
if(!$garden_user_){
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}
if($user['en'] < 1){
$_SESSION['err'] = 'Нет <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии для сбора урожая. Следующая единица энергии восстановится через <img src="/images/clock.png" alt="$" width="24" height="24"> <span><span id="time_'.($user['en_time']-time()).'000">'._time($user['en_time']-time()).'</span></span>
<hr><a href="?en_max">Получить '.$user['en_max'].' <img src="/images/garden/energy.png" alt="$" width="24" height="24"> энергии за <img src="/images/ruby.png" alt="$" width="24" height="24"> '.n_f(250*$user['en_max']).'';
header('Location: ?');
exit();
}
if($garden_plant_user_['time'] < time() && $garden_plant_user_['time'] > 0){
mysql_query("UPDATE `users` SET `en` = '".($user['en']-1)."', `leaf` = '".($user['leaf']+$r['harvest'])."'  WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `garden_plant_user` SET `name` = '".$r['name']."', `time` = '".(time()+$r['time'])."', `harvest` = '".$r['harvest']."', `images` = '".$r['images']."'  WHERE `id` = '".$id."' ");
header('Location: '.$HOME.'garden/?page='.$fid.'');
exit();
}


}
echo '</div></div>';



echo '<a class="btnl" href="'.$HOME.'garden/">Назад</a>';

require_once ('../system/footer.php');
?>