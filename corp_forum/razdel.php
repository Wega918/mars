<?php
$title = 'Форум | Раздел';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}

$corp = abs(intval($_GET['corp']));
$corp_id = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp_forum_razdel` WHERE `corp` = '".$corp."'"));
$razdel = abs(intval($_GET['razdel']));
$corp_forum_razdel = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp_forum_razdel` WHERE `id` = '".$razdel."'"));
if($corp_forum_razdel == 0){
header('Location: '.$HOME.'corp_forum/corp_'.$corp.'/');
$_SESSION['err'] = 'Такого раздела не существует!';
exit();
}

if($corp != $user['corp'] and $corp_forum_razdel['dostupen'] == 1){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'У Вас нет прав для просмотра данной страницы!';
exit();
}


echo '<div class="content"><a href="'.$HOME.'corp_forum/corp_'.$corp.'/">Форум</a> / '.$corp_forum_razdel['name'].'</div>';








if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_topic` WHERE `corp` = '".$corp."' and `razdel` = '".$razdel."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `corp_forum_topic` WHERE `corp` = '".$corp."' and `razdel` = '".$razdel."' ORDER BY `id` DESC LIMIT $start, $max");
echo '<ul>';
while($f = mysql_fetch_assoc($query)){
$corp_forum_fols = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp_forum_fols` WHERE `user`  = '".$user['id']."' and `topic`  = '".$f['id']."' and `corp`  = '".$corp."' "));
if(!$corp_forum_fols){$img = 'folder_new';}else{$img = 'folder';}
echo '<li><a class="btnl mt4" href="'.$HOME.'corp_forum/razdel_'.$razdel.'/topic_'.$f['id'].'/corp_'.$corp.'/"><img width="24" height="24" alt="" title="" src="/images/'.$img.'.png"> <span>'.$f['name'].'</span></a></li>';
}
echo '</ul>';


if ($k_page > 1) {
echo str(''.$HOME.'corp_forum/razdel_'.$id.'/corp_'.$corp.'/?',$k_page,$page); // Вывод страниц
}else{
echo '<br>';
}







If(!$Ignore){

if($corp == $user['corp'] ) {
if($user['corp_rang'] == 2 or $user['corp_rang'] == 1 ) {
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp_forum/new_topik/corp_'.$corp.'/razdel_'.$razdel.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Добавить топик</span></a>';
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp_forum/setingRazdel_'.$razdel.'/corp_'.$corp.'/"><img width="24" height="24" src="/images/settings2.png"> <span>Редактировать раздел</span></a>';
}
}

}




echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'corp_forum/corp_'.$corp.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';


If($Ignore){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
echo '</span></li></ul></div>';
}


require_once ('../system/footer.php');
?>