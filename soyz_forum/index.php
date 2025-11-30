<?php
$title = 'Форум';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$soyz = abs(intval($_GET['soyz']));
$soyzored = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$soyz."'"));

if($soyz == 0){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'Такой корпорации не существует!';
exit();
}

echo '<div class="content">'.$soyzored['name'].' / Форум</div>';



if($soyz == $user['soyz'] ) {






if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_razdel` WHERE `soyz` = '".$soyz."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$soyz_forum_razdel = mysql_query("SELECT * FROM `soyz_forum_razdel` WHERE `soyz` = '".$soyz."'  ORDER BY `id` DESC LIMIT $start, $max");
echo '<ul>';
while($f = mysql_fetch_assoc($soyz_forum_razdel)){
$top_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_topic` WHERE `razdel` = '".$f['id']."' and `soyz` = '".$soyz."' "),0); // Сколько есть топов в данном разделе
$fols_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_fols` WHERE `user` = '".$user['id']."' and `razdel` = '".$f['id']."' and `soyz` = '".$soyz."' "),0); // Сколько есть записей в corp_forum_fols с таким же разделом
if($top_where_id_razdel > $fols_where_id_razdel){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'soyz_forum/razdel_'.$f['id'].'/soyz_'.$soyz.'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';
}
echo '</ul>';






}else{




if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_razdel` WHERE `soyz` = '".$soyz."'  and `dostupen` = '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$soyz_forum_razdel = mysql_query("SELECT * FROM `soyz_forum_razdel` WHERE `soyz` = '".$soyz."' and `dostupen` = '0' ORDER BY `id` DESC LIMIT $start, $max");
echo '<ul>';
while($f = mysql_fetch_assoc($soyz_forum_razdel)){
$top_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_topic` WHERE `razdel` = '".$f['id']."' and `soyz` = '".$soyz."' "),0); // Сколько есть топов в данном разделе
$fols_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_fols` WHERE `user` = '".$user['id']."' and `razdel` = '".$f['id']."' and `soyz` = '".$soyz."' "),0); // Сколько есть записей в corp_forum_fols с таким же разделом
if($top_where_id_razdel > $fols_where_id_razdel){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'soyz_forum/razdel_'.$f['id'].'/soyz_'.$soyz.'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';
}
echo '</ul>';






}



if ($k_page > 1) {
echo str(''.$HOME.'soyz_forum/soyz_'.$soyz.'/?',$k_page,$page); // Вывод страниц
}else{
echo '<br>';
}




if(isset($_GET['hollgo'])){
mysql_query('DELETE FROM `soyz_forum_fols` WHERE `user` = '.$user['id'].' and `soyz` = '.$soyz.' ');

$test = mysql_query("SELECT * FROM `soyz_forum_topic` WHERE `soyz` = '".$soyz."' ");
$tes = mysql_fetch_array ($test);
do {
mysql_query("INSERT INTO `soyz_forum_fols` SET `user` = '".$user['id']."', `razdel` = '".$tes['razdel']."', `topic` = '".$tes['id']."', `soyz` = '".$tes['soyz']."' ");
} while ($tes = mysql_fetch_array ($test));

header('Location: ?');
exit();
}
echo '<a class="btnl" style="margin-top:2px;" href="?hollgo"><img src="/images/cross.png" width="24" height="24"> Отметить все как прочитанное</a>';



if($soyz == $user['soyz'] ) {
if($user['soyz_rang'] == 2 or $user['soyz_rang'] == 1 ) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz_forum/new_razdel/soyz_'.$soyz.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Добавить раздел</span></a>';
}
}
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz/'.$soyz.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';


If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}


require_once ('../system/footer.php');
?>