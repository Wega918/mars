<?php
$title = 'Рейтинг корпораций';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['corp'] > 0) {
header('Location: '.$HOME.'corp/'.$user['corp'].'');
exit();
}



echo '<body><div class="center"></div><div></div><div class="content"><div>
<img width="24" height="24" alt="" src="/images/angel48.png">Рейтинг по<span> корпоративным бизнес-ангелам</span></div><div>';

if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `corp` WHERE `id`  ORDER BY `angel` + '1' DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$iii=n_f($r['angel']);
$a++;

if($r['open'] == 1){
$name = '<font color=black>'.$r['name'].'</font>';
}else{
$name = ''.$r['name'].'';
}

echo '<div style="margin-top: 4px;"><span class="fl nobr"><span>'.$a.'</span>.<span>
<a class="guild" href="'.$HOME.'corp/'.$r['id'].'/"><img alt="" src="/images/footer/corp.png" width="24" height="24"><span> '.$name.'</span></a>
</span></span>
<span class="fr nobr"><img width="24" height="24" alt="" src="/images/angel48.png"><span>'.$iii.'</span></span><div class="cb"></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'corp/corp_rating/?',$k_page,$page); // Вывод страниц
}


echo '<font size=2><font color=black> <font size=3>•</font> Корпорации</font> - <b>которые отмечены чёрным шрифтом, можно вступить без приглашения.</b></font>';




if($user['corp'] == 0){
echo '<a href="?new_corp/" class="btnl mt4"><img width="24" alt="" height="24" src="/images/corp2.png"> Создать корпорацию</a>';
}


if(isset($_GET['new_corp/'])){
header('Location: '.$HOME.'corp/new_corp/');
exit();
}







if($user['corp'] == 0){
echo '<a href="?application/" class="btnl mt4"><img width="24" alt="" height="24" src="/images/corp2.png"> Подать заявку</a>';
}


echo '</div></div></body>';










if(isset($_GET['application/'])){
if($user['corp']>0){
header('Location: '.$HOME.'application/');
$_SESSION['err'] = '<font color=red> Ошибка! </font>';
exit();
}

if(!$application){
mysql_query("INSERT INTO `application` SET `user` = '".$user['id']."', `time` = '".time()."' , `angel` = '".$user['angel']."'   ");
}else{
mysql_query("UPDATE `application` SET `time` = '".time()."', `angel` = '".$user['angel']."' WHERE `user` = '".$user['id']."' LIMIT 1");
}
header('Location: '.$HOME.'application/');
$_SESSION['err'] = 'Успешно!';
exit();
}











require_once ('../system/footer.php');
?>