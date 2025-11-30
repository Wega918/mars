<?php
$title = 'Рейтинг Мультов';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['level'] < 3) {
header('Location: /');
exit();
}


if(isset($_GET['refresh/'])){
$cicl_klon = mysql_query("SELECT * FROM `users` WHERE `id` ");
$ck = mysql_fetch_array ($cicl_klon);
do {
$klon = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `ip` = '".$ck['ip']."' "),0);
mysql_query("UPDATE `users` SET `klon` = '".$klon."' WHERE `id` = '".$ck['id']."' ");
} while ($ck = mysql_fetch_array ($cicl_klon));
header('Location: ?');
exit();
}
echo '<a class="btnl mt4" href="?refresh/">Обновить</a>';



echo '<body><div class="center"></div><div></div><div class="content"><div>Рейтинг <span>Мультов</span></div><div>';



if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `klon` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){





if(isset($_GET['delete_'.$r['id'].'/'])){
if($user['level'] == 3){

mysql_query('DELETE FROM `user_avatars` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `user_biznes_1` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `user_black_list` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `application` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `application_soyz` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `ban` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `corporate_card` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `soyz_forum_fols` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `fidelity` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `fidelity_soyz` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `forum_fols` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `garbage_time` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `Ignore` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `Invitations` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `Invitations_soyz` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `narushenija` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `nick` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `time_delete` WHERE `user` = '.$r['id'].' ');
mysql_query('DELETE FROM `corp_forum_fols` WHERE `user` = '.$r['id'].' ');

mysql_query('DELETE FROM `ass` WHERE `avtor` = '.$r['id'].' ');
mysql_query('DELETE FROM `ass` WHERE `id_komu` = '.$r['id'].' ');
mysql_query('DELETE FROM `ass_adm` WHERE `avtor` = '.$r['id'].' ');
mysql_query('DELETE FROM `ass_adm` WHERE `id_komu` = '.$r['id'].' ');
mysql_query('DELETE FROM `ass_br` WHERE `avtor` = '.$r['id'].' ');
mysql_query('DELETE FROM `ass_br` WHERE `id_komu` = '.$r['id'].' ');
mysql_query('DELETE FROM `soyz_ass` WHERE `avtor` = '.$r['id'].' ');
mysql_query('DELETE FROM `soyz_ass` WHERE `id_komu` = '.$r['id'].' ');
mysql_query('DELETE FROM `corp_forum_comments` WHERE `avtor` = '.$r['id'].' ');
mysql_query('DELETE FROM `soyz_forum_comments` WHERE `avtor` = '.$r['id'].' ');
mysql_query('DELETE FROM `forum_comments` WHERE `avtor` = '.$r['id'].' ');
mysql_query('DELETE FROM `message` WHERE `kto` = '.$r['id'].' ');
mysql_query('DELETE FROM `message` WHERE `komy` = '.$r['id'].' ');
mysql_query('DELETE FROM `message_c` WHERE `kto` = '.$r['id'].' ');
mysql_query('DELETE FROM `message_c` WHERE `kogo` = '.$r['id'].' ');
mysql_query('DELETE FROM `ref` WHERE `id_us` = '.$r['id'].' ');
mysql_query('DELETE FROM `ref` WHERE `nak` = '.$r['id'].' ');
mysql_query('DELETE FROM `users` WHERE `id` = '.$r['id'].' ');
mysql_query('DELETE FROM `user_black_list` WHERE `ank_user` = '.$r['id'].' ');

}
header('Location: ?');
exit();
}





if($r['id'] == $user['id']){$reyt = '<b>'.$k_post++.'</b>';}else{$reyt = $k_post++;}
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($r['id']).'</span></span></span>
<span class="fr nobr"><span> '.$r['klon'].'</span>  <a href="?delete_'.$r['id'].'/"><img src="/images/cross.png" width="17" height="17" alt="Удалить" title="Удалить"></a>   </span><div class="cb"></div></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'RatingClon/?',$k_page,$page); // Вывод страниц
}





if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `klon` DESC LIMIT $start,$max");
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




echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';


echo '</body>';
echo '<center><div class="minor mt4">Рейтинг Мультов обновляется вручную.</div></center>';

require_once ('../system/footer.php');
?>