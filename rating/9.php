<?php
$title = 'по листочкам фермы';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

echo '<body><div class="center"></div><div></div><div class="content"><div>Рейтинг <span>'.$title.'</span></div><div>';


if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `leaf` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` WHERE `leaf` > '0' ORDER BY `leaf` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){

$ank_summ_procccd1 = "SELECT * FROM `garden_user` WHERE `user` = ".$r['id']." ORDER BY `images` DESC "; 
$ank_summ_proccc1 = mysql_fetch_assoc(mysql_query($ank_summ_procccd1));
$ank_p_g_u1 = mysql_result(mysql_query("SELECT SUM(angel_proc) FROM garden_user WHERE `user`  = '".$r['id']."' ;"), 0); // сумма процента к ангелам

$coll_garden_plant_user1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user`  = '".$r['id']."' "),0);

if($r['id'] == $user['id']){$reyt = '<b>'.$k_post++.'</b>';}else{$reyt = $k_post++;}
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($r['id']).'</span></span></span>
<span class="fr nobr">
<span><img width="24" height="24" src="/images/garden/dirt.jpg" alt="Грядка" title="Грядка" style="border-radius: 15px;"> <font size=2><span>'.$coll_garden_plant_user1.'</span></font></span>
<span><img width="24" height="24" src="/images/garden/a'.$ank_summ_proccc1['images'].'.jpg" alt="'.$ank_summ_proccc1['name'].'" title="'.$ank_summ_proccc1['name'].'" style="border-radius: 15px;"> <font size=2><span>'.$ank_p_g_u1.'</span>%</font></span>
<span> <img src="/images/garden/leaf.png" alt="" width="20" height="20" "=""> <font size=2><span>'.n_f($r['leaf']).'</span></font></span>
</span>
<div class="cb"></div></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'rating/9/?',$k_page,$page); // Вывод страниц
}





if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `leaf` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `users` WHERE `leaf` > '0' ORDER BY `leaf` DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['id'] == $user['id']){
if($v1 <= 1000){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div></div></div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div><div></div>";
}
}
}











echo '<a class="btnl mt4" href="'.$HOME.'rating/">Назад</a>';




echo '</body>';
echo '<center><div class="minor mt4">Рейтинг онлайна обновляется в режиме реального времени.</div></center></div></div>';
require_once ('../system/footer.php');
?>