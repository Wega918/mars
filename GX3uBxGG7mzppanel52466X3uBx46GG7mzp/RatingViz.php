<?php
$title = 'Рейтинг Визитов';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['level'] < 3) {
header('Location: /');
exit();
}


if ($user['adm_pass'] != 'passadmpanelgmars') {
header('Location: '.$HOME.'panel/');
$_SESSION['err'] = 'Ошибка';
exit();
}




//echo '<body><div class="center"></div><div></div><div class="content"><div>Рейтинг <span>Визитов</span></div><div>';



if(!$_SESSION['rating']){
$ress = 'Выбрано: По дате регистрации';
}
if($_SESSION['rating'] == '`id` ORDER BY `datareg` DESC'){
$ress = 'Выбрано: По дате регистрации';
}
if($_SESSION['rating'] == '`id` ORDER BY `viz` DESC'){
$ress = 'Выбрано: По последней активности';
}
if($_SESSION['rating'] == '`id` ORDER BY CAST(`rubin` AS DECIMAL(10,1)) DESC'){
$ress = 'Выбрано: По рубинам';
}
if($_SESSION['rating'] == '`id` ORDER BY `emerald` DESC'){
$ress = 'Выбрано: По изумрудам';
}
if($_SESSION['rating'] == '`id` ORDER BY `rock` DESC'){
$ress = 'Выбрано: По камням';
}
if($_SESSION['rating'] == '`id` ORDER BY `Diamonds` DESC'){
$ress = 'Выбрано: По кристаллам';
}


echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
$knopka = 'Сортировка: <br><select name="rating" style="width: 50%;">
<option value="0">'.$ress.'</option>
<option value="1">По дате регистрации</option>
<option value="2">По последней активности</option>
<option value="3">По рубинам</option>
<option value="4">По изумрудам</option>
<option value="5">По камням</option>
<option value="6">По кристаллам</option>
</select>
<input class="mt4" type="submit" name="submit" value="Применить">';
echo '<center><form action="?rating" method="POST">'.$knopka.'</form></center></div>';

echo '</div>';




if(isset($_GET['rating'])){
$rating = strong($_POST['rating']);

if($rating<1){$rating = '`id` ORDER BY `datareg` DESC';}
if($rating>6){$rating = '`id` ORDER BY `datareg` DESC';}
if($rating==1){$rating = '`id` ORDER BY `datareg` DESC';}
if($rating==2){$rating = '`id` ORDER BY `viz` DESC';}
if($rating==3){$rating = '`id` ORDER BY CAST(`rubin` AS DECIMAL(10,1)) DESC';}
if($rating==4){$rating = '`id` ORDER BY `emerald` DESC';}
if($rating==5){$rating = '`id` ORDER BY `rock` DESC';}
if($rating==6){$rating = '`id` ORDER BY `Diamonds` DESC';}
$_SESSION['rating'] = $rating;
header('Location: ?');
exit();
}





if(!$_SESSION['rating']){
$_SESSION['rating'] = '`id` ORDER BY `datareg` DESC';
}else{
$_SESSION['rating'] = $_SESSION['rating'];
}


if (empty($user['max'])) $user['max']=10;
$max = 10;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$users = mysql_query("SELECT * FROM `users` WHERE ".$_SESSION['rating']." LIMIT $start,$max");//, `sql_q` DESC
while($r = mysql_fetch_assoc($users)){

if($_SESSION['rating'] == '`id` ORDER BY `datareg` DESC'){$res = '<img src="/images/clock.png" alt="$" width="24" height="24"> '.vremja($r['datareg']).'';}
if($_SESSION['rating'] == '`id` ORDER BY `viz` DESC'){$res = '<img src="/images/clock.png" alt="$" width="24" height="24"> '.vremja($r['viz']).'';}
if($_SESSION['rating'] == '`id` ORDER BY CAST(`rubin` AS DECIMAL(10,1)) DESC'){$res = '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.n_f($r['rubin']).'';}
if($_SESSION['rating'] == '`id` ORDER BY `emerald` DESC'){$res = '<img width="24" height="24" alt="изумруд" src="/images/emerald.png" title="изумруд"> '.($r['emerald']).'';}
if($_SESSION['rating'] == '`id` ORDER BY `rock` DESC'){$res = '<img width="24" height="24" alt="Камни" src="/images/colections/22.png" title="Камни"> '.($r['rock']).'';}
if($_SESSION['rating'] == '`id` ORDER BY `Diamonds` DESC'){$res = '<img width="24" height="24" alt="Алмазы" src="/images/Diamonds.png" title="Алмазы"> '.($r['Diamonds']).'';}

if($r['id'] == $user['id']){$reyt = '<b>'.$k_post++.'</b>';}else{$reyt = $k_post++;}
echo '<div><div style="margin-top: 4px;"><span class="fl nobr"><span>'.$reyt.'</span>.<span><span class="nobr">'.nick($r['id']).'</span></span></span>
<span class="fr nobr"><span> '.$res.' </span></span><div class="cb"></div></div></div>';//|  <font color=red>'.($r['sql_q']).'</font>
}

if ($k_page > 1) {
echo str(''.$HOME.'RatingViz/?',$k_page,$page); // Вывод страниц
}





/* if (empty($user['max'])) $user['max']=10;
$max = 1000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `users` WHERE `id` ORDER BY `rubin` + `sex` DESC LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){
$v1++;
if($post['id'] == $user['id']){
if($v <= 1000){
echo '<div class="minor mt4">Вы находитесь на <span>'.$v1.'</span> месте в рейтинге!</div></div></div>';
}else{
echo "<div class='minor'>Вы не участвуете в рейтинге...</div><div></div>";
}
}
} */




echo '<a class="btnl mt4" href="'.$HOME.'panel/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';


echo '</body>';
//echo '<center><div class="minor mt4">Рейтинг Визитов обновляется в режиме реального времени.</div></div></div></center>';

require_once ('../system/footer.php');
?>