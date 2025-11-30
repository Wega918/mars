<?php
$title = 'Форум';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$corp = abs(intval($_GET['corp']));
$corpored = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$corp."'"));

if($corp == 0){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'Такой корпорации не существует!';
exit();
}


echo '<div class="content">'.$corpored['name'].' / Форум</div>';



if($corp == $user['corp'] ) {



if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_razdel` WHERE `corp` = '".$corp."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$corp_forum_razdel = mysql_query("SELECT * FROM `corp_forum_razdel` WHERE `corp` = '".$corp."'  ORDER BY `id` DESC LIMIT $start, $max");
echo '<ul>';
while($f = mysql_fetch_assoc($corp_forum_razdel)){
$top_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_topic` WHERE `razdel` = '".$f['id']."' and `corp` = '".$corp."' "),0); // Сколько есть топов в данном разделе
$fols_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_fols` WHERE `user` = '".$user['id']."' and `razdel` = '".$f['id']."' and `corp` = '".$corp."' "),0); // Сколько есть записей в corp_forum_fols с таким же разделом
if($top_where_id_razdel > $fols_where_id_razdel){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'corp_forum/razdel_'.$f['id'].'/corp_'.$corp.'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';
}
echo '</ul>';






}else{




if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_razdel` WHERE `corp` = '".$corp."'  and `dostupen` = '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$corp_forum_razdel = mysql_query("SELECT * FROM `corp_forum_razdel` WHERE `corp` = '".$corp."' and `dostupen` = '0' ORDER BY `id` DESC LIMIT $start, $max");
echo '<ul>';
while($f = mysql_fetch_assoc($corp_forum_razdel)){
$top_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_topic` WHERE `razdel` = '".$f['id']."' and `corp` = '".$corp."' "),0); // Сколько есть топов в данном разделе
$fols_where_id_razdel = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_fols` WHERE `user` = '".$user['id']."' and `razdel` = '".$f['id']."' and `corp` = '".$corp."' "),0); // Сколько есть записей в corp_forum_fols с таким же разделом
if($top_where_id_razdel > $fols_where_id_razdel){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'corp_forum/razdel_'.$f['id'].'/corp_'.$corp.'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';
}
echo '</ul>';






}



if ($k_page > 1) {
echo str(''.$HOME.'corp_forum/corp_'.$corp.'/?',$k_page,$page); // Вывод страниц
}else{
echo '<br>';
}







if(isset($_GET['hollgo'])){
mysql_query('DELETE FROM `corp_forum_fols` WHERE `user` = '.$user['id'].' and `corp` = '.$corp.' ');

$test = mysql_query("SELECT * FROM `corp_forum_topic` WHERE `corp` = '".$corp."' ");
$tes = mysql_fetch_array ($test);
do {
mysql_query("INSERT INTO `corp_forum_fols` SET `user` = '".$user['id']."', `razdel` = '".$tes['razdel']."', `topic` = '".$tes['id']."', `corp` = '".$tes['corp']."' ");
} while ($tes = mysql_fetch_array ($test));

header('Location: ?');
exit();
}
echo '<a class="btnl" style="margin-top:2px;" href="?hollgo"><img src="/images/cross.png" width="24" height="24"> Отметить все как прочитанное</a>';








if($corp == $user['corp'] ) {
if($user['corp_rang'] == 2 or $user['corp_rang'] == 1 ) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp_forum/new_razdel/corp_'.$corp.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Добавить раздел</span></a>';
}
}
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp/'.$corp.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';


If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}


require_once ('../system/footer.php');
?>