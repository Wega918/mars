<?php
require_once ('system/function.php');

?>
<script src="<?=$HOME?>js/jquery.js"></script>
<script src="<?=$HOME?>js/bootstrap-collapse.js"></script>
<script src="<?=$HOME?>js/bootstrap.min.js"></script>
<script src="<?=$HOME?>js/bootstrap-alert.js"></script>
<link rel="stylesheet" href="<?=$HOME?>diz.css">
<?php
$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1'"));
echo '<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
<meta name="Keywords" content="'.$sql['key'].'" />
<meta name="Description" content="'.$sql['des'].'" />
<meta name="copyright" content="'.$sql['cop'].'" />
<link rel="/images/game.png" href="/images/game.png">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="/diz.css">
<title>'.$title.'</title>
</head>';


$t = microtime(1);
//require_once ('system/taimers.php');


echo '<table style="width:100%;" cellspacing="0" cellpadding="0"><tbody><tr><td style="padding:0 1px 0 0;">';

echo '<a class="btnl" style="background-color:#2b577f;" href="/"><img class="fl" width="36" height="36" alt="обн" src="/images/header/arrow_left_white2.png">';


echo '<img src="/images/header/money_36.png" class="fr" width="36" height="36" alt="$">
<div class="fr" style="margin-right: 4px; text-align:right;">
<div style="padding-top: 4px; line-height: 1em;color:#FFFFFF;" id="id2">
'.n_f($user['money']).'</div><div class="small" style="line-height: 0.8em; color: #FFCF54;">';


if($user['money'] == 1){
echo '<span>1</span>';
}else{
echo '<span>'.n_f($dohod).'</span>';
}
echo ' в сек</div></div><div class="cb"></div></a>';






$mes = mysql_result(mysql_query("SELECT COUNT(id) FROM `message` WHERE `komy` = '".$user['id']."' and `readlen` = '0'"),0);

if($mes != 0) {
echo '</td><td style="width: 52px;"><a class="btnl" style="background-color:#2b577f;" id="id3" href="'.$HOME.'mes/"><img src="/images/header/mail_new.png" alt="почта" width="36" height="36" class="fr"><div class="cb"></div></a></td></tr></tbody></table>';
}else{
echo '</td><td style="width: 52px;"><a class="btnl" style="background-color:#2b577f;" id="id3" href="'.$HOME.'mes/"><img src="/images/header/mail_white.png" alt="почта" width="36" height="36" class="fr"><div class="cb"></div></a></td></tr></tbody></table>';
}






if (isset($_SESSION['err'])){
?>
<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><?=$_SESSION['err']?></span></li>
</ul></div>
<?php
unset($_SESSION['err']);
}






















// 127.0.0.1
// 95.213.218.31  -  чих-пых
// 31.173.101.75  -  mmars pro
if($user['ip'] == '95.213.218.31' && $user['ip'] == '31.173.101.75') {
$title = 'Доступ Ограничен';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font size=3 color=red>Из-за многократных нарушений, Вам закрыли доступ в игру!</font>
</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';







echo 'Причина: неоднократные нарушения<br>
Кто: '.nick(1).' <br>
Закончится: Пожизнено <br>';

echo '</center></div>';
echo '<a class="btnl mt4" href="?"><img src="/images/refresh_white2.png" width="24" height="24" alt="" title=""> Обновить</a>';
















}else{








$title = 'Аккаунт Заблокирован';


$ban = mysql_fetch_array(mysql_query('SELECT * FROM `ban` WHERE `user` = "'.$user['id'].'"'));
if($ban['time_end'] < time()){
mysql_query("UPDATE `users` SET `colors`='' WHERE `id` = '".$user['id']."' limit 1");
mysql_query('DELETE FROM `ban` WHERE `user` = '.$user['id'].' ');
header ('Location: '.$HOME.'');
exit();
}








echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font size=3 color=red>Ваш аккаунт заблокирован!</font>
</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';







echo 'Причина: '.$ban['prich'].'<br>
Кто: '.nick($ban['kto']).' '.$viber.'<br>
Закончится: '.vremja($ban['time_end']).' <br>';

echo '</center></div>';
echo '<a class="btnl mt4" href="?"><img src="/images/refresh_white2.png" width="24" height="24" alt="" title=""> Обновить</a>';






$day = (($ban['time_end']-time())/86400);
$cost = ceil($day*500000);
echo '<a class="btnl mt4" href="?razblock_"> Разблокировать за <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.$cost.'</a>';



if(isset($_GET['razblock_'])){
if($user['rubin']<$cost){
$_SESSION['err'] = 'Вам не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.ceil($cost-$user['rubin']).' рубинов!
<hr>
<a class="btni" style="min-width:160px;margin:4px;" href="'.$HOME.'worldkassa/buy.php"><span><span>Перейти к покупке</span></span></a><hr>
По вопросам других способов оплаты писать в телеграмм администратора: <img width="24" height="24" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Telegram_2019_Logo.svg/1200px-Telegram_2019_Logo.svg.png" > <a href="tg://resolve?domain=vipmars" target="_blank">@vipMars</a>';
header("Location: ?");exit();
}
$_SESSION['err'] = 'Вы уверены?<hr><a class="btni" style="min-width:160px;margin:4px;" href="?razblock"><span><span>да</span></span></a>';
header("Location: ?");
exit();
}

if(isset($_GET['razblock'])){
if($user['rubin']<$cost){
$_SESSION['err'] = 'Вам не хватает <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.ceil($cost-$user['rubin']).' рубинов!
<hr>
<a class="btni" style="min-width:160px;margin:4px;" href="'.$HOME.'worldkassa/buy.php"><span><span>Перейти к покупке</span></span></a><hr>
По вопросам других способов оплаты писать в телеграмм администратора: <img width="24" height="24" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Telegram_2019_Logo.svg/1200px-Telegram_2019_Logo.svg.png" > <a href="tg://resolve?domain=vipmars" target="_blank">@vipMars</a>';
header("Location: ?");exit();
}

mysql_query('DELETE FROM `ban` WHERE `user` = '.$user['id'].' ');
mysql_query("UPDATE `users` SET `colors`='', `rubin` = '".($user['rubin']-$cost)."' WHERE `id` = '".$user['id']."' limit 1");
$text = 'Игрок разблокировался автоматически за <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.ceil($cost).' рубинов!';
mysql_query("INSERT INTO `narushenija` SET `user` = '".$user['id']."', `text` = '".$text."', `time` = '".time()."', `time_end` = '".(time()+0)."', `kto` = '".$user['id']."' ");

header("Location: ?");
exit();
}





}


require_once ('system/footer.php');
?> 