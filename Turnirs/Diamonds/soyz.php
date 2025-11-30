<?php
$title = 'Турнирный Рейтинг Cоюзов';
//-----Подключаем функции-----//
require_once ('../../system/function.php');
//-----Подключаем вверх-----//
require_once ('../../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}





echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b>'.$title.'</b><hr>';
if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz` WHERE `Diamonds`  >= '1' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `soyz` WHERE `Diamonds` >= '1'  ORDER BY `Diamonds` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$iii=n_f($r['Diamonds']);
if($r['id'] == $user['soyz']){
$reyt = '<b>'.$k_post++.'</b>';
}else{
$reyt = $k_post++;
}
echo '<div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.<span>
<a class="guild" href="'.$HOME.'soyz/'.$r['id'].'/"><img alt="" src="/images/footer/soyz.png" width="24" height="24"><span> '.$r['name'].'</span></a>
</span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/Diamonds.png"><span>'.$iii.'</span></span><div class="cb"></div></div>';
}
$q = mysql_query("SELECT * FROM `soyz` WHERE `id` ORDER BY `Diamonds` DESC ");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['id'] == $user['soyz']){
if($post['Diamonds'] >= 1){
echo '<div class="minor mt4">Ваш Союз находится на <span>'.$v1.'</span> месте в рейтинге!</div>';
}
if($post['Diamonds'] == 0){
echo "<div class='minor'>Ваш Союз не участвуете в рейтинге...</div>";
}
if($user['soyz'] == 0){
echo "<div class='minor'>Вы не состоите в Союзе...</div>";
}
}
}
echo '</span></li></ul></div>';

if ($k_page > 1) {
echo str(''.$HOME.'Turnirs/Diamonds/soyz/?',$k_page,$page); // Вывод страниц
}






echo '<center><div class="minor mt4">'.$title.' обновляется в режиме реального времени.</div></center>';
require_once ('../../system/footer.php');
?>