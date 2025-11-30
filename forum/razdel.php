<?php
$title = 'Форум | Раздел';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$id = abs(intval($_GET['id']));
$forum_r = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_razdel` WHERE `id` = '".$id."'"));
if($forum_r == 0){
header('Location: '.$HOME.'forum/');
$_SESSION['err'] = 'Такого раздела не существует!';
exit();
}

if($user['level']  == 0 and $forum_r['level'] == 1){
header('Location: '.$HOME.'forum/');
$_SESSION['err'] = 'Такого раздела не существует!';
exit();
}



echo '<div class="content"><a href="'.$HOME.'forum/">Форум</a> / '.$forum_r['name'].'</div>';








if($id == 2){
echo '<li><a class="btnl mt4" href="'.$HOME.'smile/"><img width="24" height="24" alt="" title="" src="/images/folder.png"> <span>Смайлы</span></a></li>';
echo '<li><a class="btnl mt4" href="'.$HOME.'bb/"><img width="24" height="24" alt="" title="" src="/images/folder.png"> <span>BB Коды</span></a></li>';
}


if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_topic` WHERE `razdel` = '".$id."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$forum_razdel = mysql_query("SELECT * FROM `forum_topic` WHERE `razdel` = '".$id."' ORDER BY `attached` DESC, `time` DESC LIMIT $start,$max");
echo '<ul>';
while($f = mysql_fetch_assoc($forum_razdel)){


if($f['attached'] == 0) {
$forum_fols = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_fols` WHERE `user`  = '".$user['id']."' and `topic`  = '".$f['id']."' "));
if(!$forum_fols){
$img = 'folder_new';
}else{
$img = 'folder';
}
}else{
$forum_fols = mysql_fetch_assoc(mysql_query("SELECT * FROM `forum_fols` WHERE `user`  = '".$user['id']."' and `topic`  = '".$f['id']."' "));
if(!$forum_fols){
$img = 'topic_attached_new';
}else{
$img = 'topic_attached';
}
}
echo '<li><a class="btnl mt4" href="'.$HOME.'forum/topic/'.$f['id'].'/?page=top"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';

}
echo '</ul>';


if ($k_page > 1) {
echo str(''.$HOME.'forum/razdel/'.$id.'/?',$k_page,$page); // Вывод страниц
}else{
echo '<br>';
}



If($Ignore){
}else{
if($id == 1 and $user['level'] >= 2) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/new_topik/'.$forum_r['id'].'/"><img width="24" height="24" src="/images/settings2.png"> <span>Добавить топик</span></a>';
}
if($forum_r['id'] != 1 ) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/new_topik/'.$forum_r['id'].'/"><img width="24" height="24" src="/images/settings2.png"> <span>Добавить топик</span></a>';
}
if($user['level'] >= 2) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/seting_'.$id.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Редактировать раздел</span></a>';
}
}

echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';





If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}

require_once ('../system/footer.php');
?>