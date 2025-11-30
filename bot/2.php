<?php
//-----Создаем титл страницы-----//
$title = 'Онлайн Игра Марсиане';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Выводим логотип----//
if(!$user['id']) {
header('Location: /');
exit();
}

?>
<style>
.header-2019 {
    height: 2.1875rem;
    line-height: 2.1875rem;
    font-size: 1.25rem;
    text-transform: uppercase;
    font-weight: bold;
    background: linear-gradient( 
90deg
 , rgb(0 0 0 / 0%), #676767, rgb(0 0 0 / 0%)) 50% 99% / 85% 5% no-repeat, linear-gradient( 
90deg
 , rgb(0 0 0 / 1%), rgb(0 0 0 / 30%), #3131317a, rgb(0 0 0 / 30%), rgb(0 0 0 / 1%));
}


.btni_grey, .no_dei, .subi {
    padding: 3px;
}
.btni_grey, .subi {
    padding: 3px;
}
.btni_grey, .pg {
    background-color: #aaaaaa;
}
.btni_grey, .pg, .subi {
    font-size: 0.8em;
    display: inline-block;
    line-height: 29px;
}
.btnl, .btni_grey, .pg, .subl, .subi {
    text-decoration: none;
    text-align: center;
    position: relative;
}


</style>
<?
if(!$bot) {
mysql_query("INSERT INTO `bot` SET `user` = '".$user['id']."' ");
}










$cost = 125000;





if(isset($_GET['get'])){
if(!$bot){header('Location: ?');exit();}
if($bot['time'] > time()){header('Location: ?');exit();}
$_SESSION['err'] = '<div class="mt4">
<div class="mt4">
<a class="btni" style="min-width:35%;margin:4px;" href="?get1"><img src="/images/accept48.png" alt="" width="24" height="24"> <b>1</b> День за <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f($cost).'</span></a>
<a class="btni" style="min-width:35%;margin:4px;" href="?get5"><img src="/images/accept48.png" alt="" width="24" height="24"> <b>5</b> дней за <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f($cost*5).'</span></a>
</div>

<div class="mt4">
<a class="btni" style="min-width:35%;margin:4px;" href="?get15"><img src="/images/accept48.png" alt="" width="24" height="24"> <b>15</b> дней <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f($cost*15).'</span></a>
<a class="btni" style="min-width:35%;margin:4px;" href="?get30"><img src="/images/accept48.png" alt="" width="24" height="24"> <b>30</b> дней за <img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f($cost*30).'</span></a>
</div>
<a class="btni" style="min-width:40%;margin:4px;" href="?"><img src="/images/cross.png" alt="" width="18" height="18"> <b>Отмена</b></a>
</div>';
header('Location: ?');
}





if(isset($_GET['get1'])){
if(!$bot){header('Location: ?');exit();}
if($bot['time'] > time()){header('Location: ?');exit();}
if($user['rubin'] < $cost){$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f($cost-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="24" height="24" alt=""> Купить</a></div>';header('Location: ?');exit();}
mysql_query("UPDATE `bot` SET `bot` = '2', `time` = '".(time()+86400)."' WHERE `id` = '".$bot['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cost))."' WHERE `id` = '".$user['id']."' ");
$_SESSION['ok'] = 'Робот-помощник успешно активирован!';
header('Location: ?');
}
if(isset($_GET['get5'])){
if(!$bot){header('Location: ?');exit();}
if($bot['time'] > time()){header('Location: ?');exit();}
if($user['rubin'] < ($cost*5)){$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f(($cost*5)-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="24" height="24" alt=""> Купить</a></div>';header('Location: ?');exit();}
mysql_query("UPDATE `bot` SET `bot` = '2', `time` = '".(time()+(86400*5))."' WHERE `id` = '".$bot['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cost*5))."' WHERE `id` = '".$user['id']."' ");
$_SESSION['ok'] = 'Робот-помощник успешно активирован!';
header('Location: ?');
}
if(isset($_GET['get15'])){
if(!$bot){header('Location: ?');exit();}
if($bot['time'] > time()){header('Location: ?');exit();}
if($user['rubin'] < ($cost*15)){$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f(($cost*15)-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="24" height="24" alt=""> Купить</a></div>';header('Location: ?');exit();}
mysql_query("UPDATE `bot` SET `bot` = '2', `time` = '".(time()+(86400*15))."' WHERE `id` = '".$bot['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cost*15))."' WHERE `id` = '".$user['id']."' ");
$_SESSION['ok'] = 'Робот-помощник успешно активирован!';
header('Location: ?');
}
if(isset($_GET['get30'])){
if(!$bot){header('Location: ?');exit();}
if($bot['time'] > time()){header('Location: ?');exit();}
if($user['rubin'] < ($cost*30)){$_SESSION['err'] = 'Вам не хватает <span><img width="24" height="24" alt="Рубины" src="/images/ruby.png" title="Рубины"> <span>'.n_f(($cost*30)-$user['rubin']).'</span></span><div><a class="btni" href="'.$HOME.'Pay/"><img src="/images/ruby.png" width="24" height="24" alt=""> Купить</a></div>';header('Location: ?');exit();}
mysql_query("UPDATE `bot` SET `bot` = '2', `time` = '".(time()+(86400*30))."' WHERE `id` = '".$bot['id']."' ");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']-($cost*30))."' WHERE `id` = '".$user['id']."' ");
$_SESSION['ok'] = 'Робот-помощник успешно активирован!';
header('Location: ?');
}





echo '<center>
<div class="header-2019 cntr"><font color=#e9e9e9>Веселый</font></div>

<img src="/images/bots/image2.png" alt="" style="width:50%; margin:5px;border-radius: 8px;">

<div class="content">
<a class="fl" href="/bot/1/"><img width="100%" src="/images/index/left_orange.png" alt="<" title="<"></a>
<a class="fr" href="/bot/3/"><img width="100%" src="/images/index/right_orange.png" alt=">" title=">"></a>
<div class="center">';
if($bot['time'] < time()){
echo '<a class="btni" style="min-width:100px;margin:5px;border-radius: 10px;" href="?get"><span><span><font color=white>Активировать<font></span></span></a>';
}elseif($bot['time'] > time() and $bot['bot'] == 2){
echo '<a class="btni_grey" style="min-width:100px;margin:5px;border-radius: 10px;"><span><span><font color=white>Активен еще: <img src="/images/clock.png" alt="через" width="30" height="30"> <span id="time_'.($bot['time']-time()).'000">'._time($bot['time']-time()).'</span><font></span></a>';
echo '<div class="bordered" style="margin-top: 4px; position: relative;"><center><table><tbody>
<span class="center"><tr>
<td><font size="2%" color="green">Собрано листиков <img src="/images/garden/leaf.png" alt="через" width="30" height="30"> <b>'.$bot['leaf'].'</b></font></td>
<td>&nbsp; | &nbsp;</td>
<td><font size="2%" color="#0058A9">Потраченно эннергии <img src="/images/garden/energy.png" alt="через" width="30" height="30"> <b>'.$bot['en'].'</b></font></td>
</tr></span>
</tbody></table></center></div>';
}elseif($bot['time'] > time() and $bot['bot'] != 2){
echo '<a class="btni_grey" style="min-width:100px;margin:5px;border-radius: 10px;"><span><span><font color=white>Недоступен<font></span></span></a>';
}
echo '</div></div>






<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font size=2% color=green>Веселый - автоматически собирает урожай с ваших грядок.
Также ускоряет дозревания урожая на 50%</font>
</span></li></ul></div>



</center>';
echo '<a class="btnl" style="margin-top:2px;" href="/bot/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Назад</a>';


//style="width:75%;border-radius: 20px;height: 50%;"

//mysql_query('DELETE FROM `users` WHERE `alliance` != "6" ');









require_once ('../system/footer.php');
?>