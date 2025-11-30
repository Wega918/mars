<?php
$title = 'Рейтинг союзов';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['soyz'] > 0) {
header('Location: '.$HOME.'soyz/'.$user['soyz'].'');
exit();
}



echo '<body><div class="center"></div><div></div><div class="content"><div>
Рейтинг <span> Союзов</span></div><div>';

if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `soyz` WHERE `id`  ORDER BY `musor` + '1' DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$iii=n_f($r['musor']);
$a++;

if($r['open'] == 1){
$name = '<font color=black>'.$r['name'].'</font>';
}else{
$name = ''.$r['name'].'';
}

echo '<div style="margin-top: 4px;"><span class="fl nobr"><span>'.$a.'</span>.<span>
<a class="guild" href="'.$HOME.'soyz/'.$r['id'].'/"><img alt="" src="/images/footer/soyz.png" width="24" height="24"><span> '.$name.'</span></a>
</span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/header/money_36.png"> <span>'.$iii.'</span>%</span><div class="cb"></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'soyz/soyz_rating/?',$k_page,$page); // Вывод страниц
}



echo '<font size=2><font color=black> <font size=3>•</font> Союзы</font> - <b>которые отмечены чёрным шрифтом, можно вступить без приглашения.</b></font>';



if($user['soyz'] == 0){
echo '<a href="?new_soyz/" class="btnl mt4"><img width="24" alt="" height="24" src="/images/soyz2.png"> Создать Союз</a>';
}


if(isset($_GET['new_soyz/'])){
header('Location: '.$HOME.'soyz/new_soyz/');
exit();
}







if($user['soyz'] == 0){
echo '<a href="?application_soyz/" class="btnl mt4"><img width="24" alt="" height="24" src="/images/soyz2.png"> Подать заявку</a>';
}


echo '</div></div></body>';










if(isset($_GET['application_soyz/'])){
if($user['soyz']>0){
header('Location: '.$HOME.'application_soyz/');
$_SESSION['err'] = '<font color=red> Ошибка! </font>';
exit();
}

if(!$application_soyz){
mysql_query("INSERT INTO `application_soyz` SET `user` = '".$user['id']."', `time` = '".time()."' , `musor` = '".$user['musor_proc']."'   ");
}else{
mysql_query("UPDATE `application_soyz` SET `time` = '".time()."', `musor` = '".$user['musor_proc']."' WHERE `user` = '".$user['id']."' LIMIT 1");
}
header('Location: '.$HOME.'application_soyz/');
$_SESSION['err'] = 'Успешно!';
exit();
}











require_once ('../system/footer.php');
?>