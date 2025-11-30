<?php
$title = 'Достижения';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
echo '<div class="content">
<a class="fl" href="'.$HOME.'mission/"><img width="25" height="45" src="/images/index/left_orange.png" alt="Задания" title="Задания"></a>
<a class="fr" href="'.$HOME.'expeditions/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Экспедиция" title="Экспедиция"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';

//mysql_query('DELETE FROM `Achievements_user` WHERE `user` = '.$user['id'].' ');

if($Achievements_user_coll_done_1 >= 1){
if (empty($user['max'])) $user['max']=10;
$max = 34;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `done` = '1'  "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$Acc_user1 = mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `done` = '1' ORDER BY `id` ASC LIMIT $start,$max");
echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="center"><font size="2">Мои достижения:</font><br><hr>';
while($c_user1 = mysql_fetch_assoc($Acc_user1)){
echo '<img src="/images/Achievements/2/'.$c_user1['number'].'.png" alt="" width="45" height="45">';
}

echo '<hr><font color=black size="2">Бонус к доходу от достижений: ['.$bon_achivements.'/28900]%</font><br>

</div></div>';
}









if (empty($user['max'])) $user['max']=10;
$max = 34;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `done` = '0'  "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$Acc_user = mysql_query("SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `done` = '0' ORDER BY `id` ASC LIMIT $start,$max");
while($c_user = mysql_fetch_assoc($Acc_user)){
$rubin_nagrada = 10000;

$progress_ = round((($c_user['prog']*100)/$c_user['prog_max']));
if($progress_ > 100) {$progress_ = 100;}

if($c_user['prog'] >= $c_user['prog_max']){$texx = '<font size=3 color=336600>';$texx1 = '</font>';}else{$texx = '';$texx1 = '';}


echo '<div class="bordered" style="margin-top: 4px; position: relative;"><img src="/images/Achievements/2/'.$c_user['number'].'.png" alt="" width="50" height="50" style="float:left;margin-right:3px;margin-top:3px;">
<div class="show350 tdbrown"><span>☆ Достижение #'.$c_user['number'].' ☆</span></div>

<br><br><hr><center>
<span><font size=4 color=006600>'.$c_user['text'].'</font> <font size=2 color=grey><font color=B22222>[</font>'.$texx.''.($c_user['prog']).''.$texx1.'<font color=B22222>/</font><font color=336600>'.n_f($c_user['prog_max']).'</font><font color=B22222>]</font></font></span><br>
<span><font size=2 color=black></font><font size=2 > <img src="/images/ruby.png" width="18" height="18" alt=""> '.n_f($rubin_nagrada).'</font> </span><hr>
</center>';



if($c_user['prog'] >= $c_user['prog_max'] ){
echo '<center><a class="btnii" style="min-width:160px;margin:3px;" href="?'.$c_user['id'].'"><span><span>Забрать <span><font size=2 color=black></font><font size=2 > <img src="/images/ruby.png" width="18" height="18" alt=""> '.n_f($rubin_nagrada).'</font> </span></span></span></a></center>';
}
if($c_user['prog'] < $c_user['prog_max'] ){
echo '<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$progress_.'%;"></div></div>';
}

echo '</div>';



if(isset($_GET[''.$c_user['id'].''])){
if($c_user['prog'] < $c_user['prog_max']){$_SESSION['err'] = 'Ошибка.';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin_nagrada)."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `Achievements_user` SET `done` = '1' WHERE `id` = '".$c_user['id']."' ");
$_SESSION['err'] = '<img src="/images/ruby.png" alt="$" width="24" height="24"> +'.n_f($rubin_nagrada).'  ';
header('Location: ?');
exit();
}





}


echo '<a class="btnl mt4" href="'.$HOME.'menu/">Назад</a>';


echo '<br><tt>
<font size="2"><font color="black" size="3">•</font><b> выполняя достижения вы будете поднимать свой доход в секунду и повышать прибыль <img width="24" height="24" alt="камни" src="/images/colections/22.png" title="камни"> камней и <img width="24" height="24" alt="Алмазы" src="/images/Diamonds.png" title="Алмазы"> алмазов с <a href="'.$HOME.'mine/">>>Шахты<<</a> </b>
<br>также за каждое выполненное достижение вам будет начислено <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> 10k рубинов.<br>
</font></tt>';


require_once ('../system/footer.php');
?>