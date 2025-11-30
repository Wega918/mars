<?php
$title = 'Форум';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}



$forum = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_comments` "),0);
if($user['forum'] < $forum){
mysql_query("UPDATE `users` SET `forum` = '".$forum."' WHERE `id` = '$user[id]' LIMIT 1");
}






echo '<div class="content">Форум</div>';




if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_razdel` WHERE `level` = '0'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$forum_razdel = mysql_query("SELECT * FROM `forum_razdel` WHERE `level` = '0'  ORDER BY `id` ASC LIMIT $start,$max");
echo '<ul>';
while($f = mysql_fetch_assoc($forum_razdel)){

$top_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_topic` WHERE `razdel` = '".$f['id']."' "),0); // Сколько есть топов в данном разделе
$fols_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_fols` WHERE `user` = '".$user['id']."' and  `razdel` = '".$f['id']."'   "),0); // Сколько есть записей в forum_fols с таким же разделом
if($top_where_id_razdel > $fols_where_id_razdel){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'forum/razdel/'.$f['id'].'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';

}



if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_razdel` WHERE `level` = '1'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$forum_razdel1 = mysql_query("SELECT * FROM `forum_razdel` WHERE `level` = '1'  ORDER BY `id` ASC LIMIT $start,$max");
while($f1 = mysql_fetch_assoc($forum_razdel1)){

if($user['level'] > 0){
$top_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_topic` WHERE `razdel` = '".$f1['id']."' "),0); // Сколько есть топов в данном разделе
$fols_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_fols` WHERE `user` = '".$user['id']."' and  `razdel` = '".$f1['id']."'   "),0); // Сколько есть записей в forum_fols с таким же разделом
if($top_where_id_razdel > $fols_where_id_razdel){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'forum/razdel/'.$f1['id'].'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f1['name'].'</span></a></li>';
}

}
echo '</ul>';







if ($k_page > 1) {
echo str(''.$HOME.'forum/?',$k_page,$page); // Вывод страниц
}else{
echo '<br>';
}




if(isset($_GET['hollgo'])){
mysql_query('DELETE FROM `forum_fols` WHERE `user` = '.$user['id'].' ');

$test = mysql_query("SELECT * FROM `forum_topic` WHERE `id` ");
$tes = mysql_fetch_array ($test);
do {
mysql_query("INSERT INTO `forum_fols` SET `user` = '".$user['id']."', `razdel` = '".$tes['razdel']."', `topic` = '".$tes['id']."' ");
} while ($tes = mysql_fetch_array ($test));

header('Location: ?');
exit();
}
echo '<a class="btnl" style="margin-top:2px;" href="?hollgo"><img src="/images/cross.png" width="24" height="24"> Отметить все как прочитанное</a>';





if($user['level'] >= 2) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/new_razdel/"><img width="24" height="24" src="/images/settings2.png"> <span>Добавить раздел</span></a>';
}

If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}

require_once ('../system/footer.php');
?>