<?php
$title = 'Рейтинг тыкв';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($promotions['act_12'] == 1){$trtr = 'тыкв';$dsds = '';}
if($promotions['act_12'] == 2){$trtr = 'игрушек';$dsds = '_';}
if($promotions['act_12'] == 3){$trtr = 'сувениров';$dsds = '__';}
echo '<body><div class="center"></div><div></div><div class="content"><div>Рейтинг <span>'.$trtr.'</span></div><div>';



if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `koll` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` WHERE `koll` > '0' ORDER BY `koll` DESC LIMIT $start,$max");
while($r = mysql_fetch_assoc($users)){
$reyt = $k_post++;
$nagrada_rb = 0;

if($promotions['act_12'] == 1){
if($reyt > 0 ){$nagrada_musor = 2500000;}
}elseif($promotions['act_12'] == 2){
if($reyt > 0 ){$nagrada_musor = 50;}
}elseif($promotions['act_12'] == 3){
if($reyt > 0 ){$nagrada_musor = ($r['musor_proc']*0.01/100);}
}




if($promotions['act_12'] == 3){$trtr = 'сувениров';$dsds = '__';}
if($promotions['act_12'] == 1){$trtr = 'тыкв';$dsds = '';}
if($promotions['act_12'] == 2){$trtr = 'игрушек';$dsds = '_';}
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($r['id']).'</span></span></span>
<span class="fr nobr"><span> <img src="/Halloween/images/'.$dsds.'4.png" alt="" width="22" height="24" "=""> '.$r['koll'].' ';

if($promotions['act_12'] == 1){
echo '<img src="/images/header/money_36.png" alt="$" width="24" height="24"> '.n_f(ceil($r['koll']*$nagrada_musor)).'%';
}elseif($promotions['act_12'] == 2){
echo '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>'.n_f(ceil($r['koll']*$nagrada_musor)).'</font>';
}elseif($promotions['act_12'] == 3){
echo '<img src="/images/header/money_36.png" alt="$" width="24" height="24"> '.n_f(ceil($r['koll']*$nagrada_musor)).'%';
}


echo '</span></span><div class="cb"></div></div></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'rating/7/?',$k_page,$page); // Вывод страниц
}





if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `koll` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `users` WHERE `koll` > '0' ORDER BY `koll` DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['id'] == $user['id']){
if($v1 <= 1000){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div></div></div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div><div></div>";
}
}
}











echo '<a class="btnl mt4" href="'.$HOME.'rating/">Назад</a>';


echo '</body>';
echo '<center><div class="minor mt4">Рейтинг обновляется в режиме реального времени.</div></center>';
require_once ('../system/footer.php');
?>