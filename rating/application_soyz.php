<?php
$title = 'Заявки';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$result1 = mysql_query("SELECT * FROM `application_soyz` WHERE `id` ");
$row1 = mysql_fetch_array ($result1);
do {
if(($row1['time']+3600) < time()){
mysql_query('DELETE FROM `application_soyz` WHERE `id` = '.$row1['id'].' ');
}
} while ($row1 = mysql_fetch_array ($result1));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////








echo '<body id="marsgame"><style>body{background-color:;color:;}#chat_icon,#forum_icon,#corp_icon,#union_icon,#mail_icon,#rating_icon,#profile_icon,#help_icon,#head_reload_bar a,.biss_right{background-color:;}#head_reload_bar .marsgame_rewrite_money,.biss_right{color:;}#head_reload_bar .small{color:;}#chat_icon b,#forum_icon b,#corp_icon b,#union_icon b,#mail_icon b{color:;border-color: ;background-color: ;}a.pg,a.btni{background-color:;}a.btnl{background-color:;}span.btnl,span.pg,span.btni{background-color:;color:;}a.user{color:;}.message{color:;}.tbrown{color:;}.minor{color:;}</style><div id="user_disp2"></div><div class="content">
<a class="fl" href="'.$HOME.'application/">
<img width="25" height="45" src="/images/index/left_orange.png" alt=">" title="<">
</a>

<a class="fr" href="'.$HOME.'garbage/">
<img width="25" height="45" src="/images/index/right_orange.png" alt=">" title=">">
</a>
<div class="center">
<a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id25b" href="?">
<span>Заявки <img src="/images/soyz2.png" alt="$" width="24" height="24"></span>
</a></div></div>';





if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `application_soyz` WHERE `id` > '0'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$application_soyz = mysql_query("SELECT * FROM `application_soyz` WHERE `user`  ORDER BY `time` DESC LIMIT $start,$max");
while($a = mysql_fetch_assoc($application_soyz)){
$ankk = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$a['user']."'"));
echo '<div class="bordered"><span><span class="nobr">
'.nick($a['user']).'
</span></span>
(<span class="js_timer" data="1491505968">'.vremja($a['time']).'</span>) 
<img src="/images/header/money_36.png" alt="$" width="24" height="24"> '.n_f($ankk['musor_proc']).'%</div>';
}



if($k_post < 1){
echo '<center>Список пуст!</center>';
}
if ($k_page > 1) {
echo str(''.$HOME.'application_soyz/?',$k_page,$page); // Вывод страниц
}
















$result1 = mysql_query("SELECT * FROM `application_soyz` WHERE `user` = ".$user['id']." ");
$row1 = mysql_fetch_array ($result1);
do {
if($row1){
echo '<center><div class="minor"><div>Ваша заявка удалится автоматически через: 
<span id="time_'.(($row1['time']+3600)-time()).'000">'._time(($row1['time']+3600)-time()).'</span>
</span></div></div><center>';
}
} while ($row1 = mysql_fetch_array ($result1));















if($user['soyz'] == 0){
echo '<a href="'.$HOME.'soyz/soyz_rating.php?application_soyz/" class="btnl mt4"><img width="24" alt="" height="24" src="/images/soyz2.png"> Поднятся в списке</a>';
}

require_once ('../system/footer.php');
?>