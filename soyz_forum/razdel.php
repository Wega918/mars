<?php
$title = 'Форум | Раздел';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
$razdel = abs(intval($_GET['razdel']));
$soyz = abs(intval($_GET['soyz']));
$soyz_forum_razdel = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_forum_razdel` WHERE `id` = '".$razdel."'"));
$soyz_id = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_forum_razdel` WHERE `soyz` = '".$soyz."'"));

if($soyz != $user['soyz'] and $soyz_forum_razdel['dostupen'] == 1){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'У Вас нет прав для просмотра данной страницы!';
exit();
}


if($soyz_forum_razdel == 0){
header('Location: '.$HOME.'soyz_forum/soyz_'.$soyz.'/');
$_SESSION['err'] = 'Такого раздела не существует!';
exit();
}
if($soyz != $user['soyz'] and $soyz_forum_razdel['dostupen'] == 1){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'У Вас нет прав для просмотра данной страницы!';
exit();
}


echo '<div class="content"><a href="'.$HOME.'soyz_forum/soyz_'.$soyz.'/">Форум</a> / '.$soyz_forum_razdel['name'].'</div>';








if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_topic` WHERE `soyz` = '".$soyz."' and `razdel` = '".$razdel."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `soyz_forum_topic` WHERE `soyz` = '".$soyz."' and `razdel` = '".$razdel."' ORDER BY `id` DESC LIMIT $start, $max");
echo '<ul>';
while($f = mysql_fetch_assoc($query)){
$soyz_forum_fols = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz_forum_fols` WHERE `user`  = '".$user['id']."' and `topic`  = '".$f['id']."' and `soyz`  = '".$soyz."' "));
if(!$soyz_forum_fols){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'soyz_forum/razdel_'.$razdel.'/topic_'.$f['id'].'/soyz_'.$soyz.'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';
}
echo '</ul>';


if ($k_page > 1) {
echo str(''.$HOME.'soyz_forum/razdel/'.$id.'/?',$k_page,$page); // Вывод страниц
}else{
echo '<br>';
}







If(!$Ignore){

if($soyz == $user['soyz'] ) {
if($user['soyz_rang'] == 2 or $user['soyz_rang'] == 1 ) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz_forum/new_topik/soyz_'.$soyz.'/razdel_'.$razdel.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Добавить топик</span></a>';
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz_forum/setingRazdel_'.$razdel.'/soyz_'.$soyz.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Редактировать раздел</span></a>';
}
}

}




echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'soyz_forum/soyz_'.$soyz.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';


If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}


require_once ('../system/footer.php');
?>