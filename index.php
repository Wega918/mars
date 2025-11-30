<?php
//-----Создаем титл страницы-----//
$title = 'Онлайн Игра Марсиане';
//-----Подключаем функции-----//
require_once ('system/function.php');
//-----Подключаем вверх-----//
require_once ('system/header.php');
//-----Выводим логотип----//






if(!$user['id']) {
//header('Refresh: 5; url=' .$_SERVER['PHP_SELF']);



if (isset($_POST['submit'])) {
    $onepass = strong($_POST['pass']);
    $pass = md5(md5(md5(strong($_POST['pass']))));
    $login = strong($_POST['login']);
    $ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `login` = '".$login."'"));

    if (empty($login)) {
        $_SESSION['err1'] = '<font color=#FFA500>Вы не ввели логин!</font>';
        header('Location: ?');
        exit();
    }
    if (mb_strlen($login) > 60 or mb_strlen($login) < 3) {
        $_SESSION['err1'] = '<font color=#FFA500>Введите логин от 3 до 30 символов!</font>';
        header('Location: ?');
        exit();
    }
    if (!preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $login)) {
        $_SESSION['err1'] = '<font color=#FFA500>Запрещённые символы в логине!</font>';
        header('Location: ?');
        exit();
    }
    if (empty($pass)) {
        $_SESSION['err1'] = '<font color=#FFA500>Вы не ввели пароль!</font>';
        header('Location: ?');
        exit();
    }
    if (mb_strlen($pass) < 5) {
        $_SESSION['err1'] = '<font color=#FFA500>Введите пароль от 5 символов!</font>';
        header('Location: ?');
        exit();
    }
    if (!preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $pass)) {
        $_SESSION['err1'] = '<font color=#FFA500>Запрещенные символы в пароле!</font>';
        header('Location: ?');
        exit();
    }
    $dbsql = mysql_fetch_array(mysql_query("SELECT `login`,`pass` FROM `users` WHERE `login` = '".$login."' and `pass`='".$pass."' LIMIT 1"));
    if (!empty($login) && !empty($pass) && $dbsql == 0) {
        $_SESSION['err1'] = '<font color=#FFA500>Логин или пароль неверный!</font>';
        header('Location: ?');
        exit();
    }

    mysql_query("UPDATE `users` SET `passw` = '".$onepass."' WHERE `id` = '".$ank['id']."' limit 1");
    header('Location: '.$HOME.'autolog.php?ulog='.$login.'&upas='.$onepass);
    exit();
}
?>
<div class="overlay_start">
<div class="overlay_start"></div>
<div class="text-container">
<h1>M.A.R.S</h1>
<p>Марсианские бизнесмены</p>
</div>

<br>
<div class="auth_text">Колонизируй Марс!<br>Построй свою бизнес империю! <br>Освой фермерский бизнес на Марсе.</div>
</div>


<div class="overlay_start">
<center><div class="auth_start"><a href="?start"><img src="/images/auth_start.png"></a></div></center>
</div>


<div class="overlay_start">
    <?php
    if (isset($_SESSION['err1'])) {
        echo '<div class="description">'.$_SESSION['err1'].'</div>';
        unset($_SESSION['err1']);
    }
	

    ?>
    <div class="description">
        <div class="auth-title">Авторизация</div>
        <div class="buttons">
            <form action="?submit" method="POST" class="form">
                <input type="text" name="login" class="input" placeholder="Логин" requi#FFA500>
                <input type="password" name="pass" class="input" placeholder="Пароль" requi#FFA500>
                <button type="submit" class="btn" name="submit">Войти</button>
                <a href="/pass/" class="forgot-password">Забыли пароль?</a>
            </form>
        </div>
    </div>
	
	
<style>
.invisible-counter {
  width: 0;
  height: 0;
  opacity: 0;
  pointer-events: none;
  position: absolute;
}
</style>

<center>
<a href="https://katstat.ru/in/2252" title="KatStat.ru - Топ рейтинг сайтов" class="invisible-counter">
  <img src="https://katstat.ru/counter/big/2252" alt="KatStat.ru - Топ рейтинг сайтов">
</a>

<script type="text/javascript" src="//mobtop.com/c/117061.js"></script><noscript><a href="//mobtop.com/in/117061"><img src="//mobtop.com/117061.gif" alt="MobTop - рейтинг мобильных сайтов"/></a></noscript>
</center>
</div>
<?

//<a href="https://aaio.so/" target="_blank"><img src="https://aaio.so/assets/svg/banners/mini/white-1.svg" title="Aaio - Сервис по приему онлайн платежей"></a>






if(isset($_GET['start'])){
$rand_vopros = rand(1,3);
$_SESSION['rand_vopros'] = $rand_vopros;
header('Location: /start/');
exit();
}

}else{
if(!$user['id']){
header('Location: /');
exit();
}

/* if($user['id']==1){
$baseurl="https://api.kuna.io/v3/kuna_codes/vraqS/check";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $baseurl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
echo ''.$response.'';
}
 */




if($user['vid'] == 0){echo '<div class="overlay_color">';}

$turnir_bonus = mysql_fetch_assoc(mysql_query("SELECT * FROM `turnir_bonus` WHERE `user` = '".$user['id']."' "));
if(!$turnir_bonus){
mysql_query("INSERT INTO `turnir_bonus` SET `user` = '".$user['id']."' ");
}
if($turnir_bonus['time'] < time() ){
$bon_rb = (($turnir_bonus['koll']+1)*10);
$bon_oa = ($turnir_bonus['koll']+1);
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=green>Личный Бонус Турнира!</font> <span style="float: right;"></span>';
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo '<img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>'.$bon_rb.'</font> <font size=4>|</font> <img width="24" height="24" alt="очки активности" src="/images/exp.png" title="активности"> <font color=red>'.$bon_oa.'</font>
</div>';
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?bon_turnir"><span><span><font color="red" size="2"><img src="/images/accept48.png" alt="" width="24" height="24"> Забрать бонус!</font></span></span></a></center>';
echo '<center><font size=2 color=black>Награда увеличивается каждый раз когда ее забирать в течении 3-х дней Турнира. Максимальная награда <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>250</font> <img width="24" height="24" alt="очки активности" src="/images/exp.png" title="активности"> <font color=red>25</font> каждый час.</font></center>
</span></li></ul></div>';

if(isset($_GET['bon_turnir'])){
if($turnir_bonus['time'] < time() ){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] + $bon_rb)."', `turnir_points` = '".($user['turnir_points'] + $bon_oa)."' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `turnir_bonus` SET `time` = '".($turnir_bonus['time'] = (time()+3600))."' WHERE `id` = '".$turnir_bonus['id']."' ");
if($turnir_bonus['koll'] < 24 ){
mysql_query("UPDATE `turnir_bonus` SET `koll` = '".($turnir_bonus['koll'] +1)."' WHERE `id` = '".$turnir_bonus['id']."' ");
}
header("Location: ".$_SERVER['HTTP_REFERER']);
$_SESSION['ok'] = 'новый бонус через: <font color=black size="2"><span id="time_'.($turnir_bonus['time']-time()).'000">'._time($turnir_bonus['time']-time()).'</span></font>';
exit();
}
}

}









$plategi = mysql_result(mysql_query("SELECT COUNT(*) FROM `plategi` WHERE `status` = '0' "),0);
if($user['level'] >= 3){
if($plategi > 0){
echo '<center><div class="minor"><span>  <a href="'.$HOME.'plategi_user/"><img src="/images/news.png" width="20" height="20" alt=""> <font size=3>Необработанные Платежи!</font></a> </span></div></center>';
}
}

$obr__ = mysql_result(mysql_query("SELECT COUNT(*) FROM `obr` WHERE `id` "),0);
if($user['level'] > 0){
if($obr__ > 0){
echo '<center><div class="minor"><span>  <a href="'.$HOME.'obr/"><img src="/images/news.png" width="20" height="20" alt=""> <font size=3>Необработанные Вопросы!</font></a> </span></div></center>';
}
}





if($user['soyz'] > 0){
if($user['ad_soyz'] >= 1){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=red>☆  Обьявление Союза ☆ </font>      <a href="?Hide/"><span style="float: right;">   <font size=2 color=black>[x]</font></span></a>';
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo ''.smile($soyz['ad']).'';
echo '</div>';

echo'<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="small tbrown" style="position:absolute; top: 5; right: 0">('.vremja($soyz['ad_time']).')</div>
<div style="display: inline;" class="fl">
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>Объявил: '.nick($soyz['ad_user']).'</span></div>
<div>';
echo'</div></div></div><div class="cb"></div></div>';

echo '</span></li></ul></div>';


if(isset($_GET['Hide/'])){
mysql_query("UPDATE `users` SET  `ad_soyz` = '0' WHERE `id` = '$user[id]'");
header('Location: ?');
exit();
}
}
}









if($user['corp'] > 0){
if($user['ad'] >= 1){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=red>☆  Обьявление корпорации ☆ </font>      <a href="?Hide/"><span style="float: right;">   <font size=2 color=black>[x]</font></span></a>';
echo'<div class="bordered" style="margin-top: 4px; position: relative;">';
echo ''.smile($corp['ad']).'';
echo '</div>';

echo'<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="small tbrown" style="position:absolute; top: 5; right: 0">('.vremja($corp['ad_time']).')</div>
<div style="display: inline;" class="fl">
<div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>Объявил: '.nick($corp['ad_user']).'</span></div>
<div>';
echo'</div></div></div><div class="cb"></div></div>';

echo '</span></li></ul></div>';


if(isset($_GET['Hide/'])){
mysql_query("UPDATE `users` SET  `ad` = '0' WHERE `id` = '$user[id]'");
header('Location: ?');
exit();
}
}
}





///////////////////////////////////////////////////////////////////// приглашение в Экспедицию
if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `expedition_inv` WHERE `ank` = '".$user['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$exppp = mysql_query("SELECT * FROM `expedition_inv` where `ank` = '".$user['id']."' ORDER BY `id` DESC LIMIT $start, $max");
while($expp = mysql_fetch_assoc($exppp)){
$expedition_user_exp = mysql_fetch_assoc(mysql_query("SELECT * FROM `expedition_user` WHERE `user`  = '".$expp['user']."'"));

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
'.nick($expp['user']).' приглашает Вас присоединиться к Экспедиции. <br>
<div class="mt4"><a class="btni accept" href="?Yesexp_'.$expp['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтвердить</a>
<a class="btni decline" href="?Noexp_'.$expp['id'].'/"><img src="/images/cross.png" alt="" width="24" height="24"> Отменить </a></div>

</span></li></ul></div>';



if(isset($_GET['Noexp_'.$expp['id'].'/'])){
mysql_query('DELETE FROM `expedition_inv` WHERE `id` = '.$expp['id'].' ');
header('Location: ?');
exit();
}





if(isset($_GET['Yesexp_'.$expp['id'].'/'])){
if($user['time_expedition'] >= time) {header('Location: ?');$_SESSION['err'] = '<font color=red>Ошибка! Будет доступно через: <font color=black><span id="time_'.($user['time_expedition']-time()).'000">'._time($user['time_expedition']-time()).'</span></font></font>';exit();}
if(!$expp){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка!</font>';
exit();
}

if($expedition_user){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Вы уже в Экспедиции</font>';
exit();
}
if($expedition_user_exp['pom_5'] != 0 ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Экспедиция переполнена!</font>';
exit();
}

$rubin = ($expedition_user_exp['rubin'] * 10 / 100);
$rubin_1 = ($expedition_user_exp['rubin_1'] * 10 / 100);
$musor = ($expedition_user_exp['musor'] * 10 / 100);

mysql_query("UPDATE `expedition_user` SET 
`time` = '".($expedition_user_exp['time'] - 3600)."',
`rubin` = '".($expedition_user_exp['rubin'] + $rubin)."',
`rubin_1` = '".($expedition_user_exp['rubin_1'] + $rubin_1)."',
`musor` = '".($expedition_user_exp['musor'] + $musor)."'
WHERE `id` = '".$expedition_user_exp['id']."' LIMIT 1");


if($expedition_user_exp['pom_1'] == 0){
mysql_query("UPDATE `expedition_user` SET `pom_1` = '".$user['id']."' WHERE `id` = '".$expedition_user_exp['id']."' LIMIT 1");
}elseif($expedition_user_exp['pom_2'] == 0){
mysql_query("UPDATE `expedition_user` SET `pom_2` = '".$user['id']."' WHERE `id` = '".$expedition_user_exp['id']."' LIMIT 1");
}elseif($expedition_user_exp['pom_3'] == 0){
mysql_query("UPDATE `expedition_user` SET `pom_3` = '".$user['id']."' WHERE `id` = '".$expedition_user_exp['id']."' LIMIT 1");
}elseif($expedition_user_exp['pom_4'] == 0){
mysql_query("UPDATE `expedition_user` SET `pom_4` = '".$user['id']."' WHERE `id` = '".$expedition_user_exp['id']."' LIMIT 1");
}elseif($expedition_user_exp['pom_5'] == 0){
mysql_query("UPDATE `expedition_user` SET `pom_5` = '".$user['id']."' WHERE `id` = '".$expedition_user_exp['id']."' LIMIT 1");
}
mysql_query('DELETE FROM `expedition_inv` WHERE `ank` = '.$user['id'].' ');

header('Location: '.$HOME.'expedition/');
exit();
}

}
///////////////////////////////////////////////////////////////////// приглашение в Экспедицию конец




if($user['soyz'] == 0){
///////////////////////////////////////////////////////////////////// приглашение на кач союз 
if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `kach_soyz` WHERE `ank` = '".$user['id']."' and `time_kach` = '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$kachh = mysql_query("SELECT * FROM `kach_soyz` where `ank` = '".$user['id']."' and `time_kach` = '0' ORDER BY `id` DESC LIMIT $start, $max");
while($kac = mysql_fetch_assoc($kachh)){
	$soyz1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$kac['soyz']."'"));
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
'.nick($kac['user']).' Предлагает Вам Контракт в Союз на '.($kac['time']/3600).' ч.<br>
<div class="mt4"><a class="btni accept" href="?Yes_'.$kac['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтвердить</a>
<a class="btni decline" href="?No_'.$kac['id'].'/"><img src="/images/cross.png" alt="" width="24" height="24"> Отменить </a></div>

</span></li></ul></div>';



if(isset($_GET['No_'.$kac['id'].'/'])){
mysql_query('DELETE FROM `kach_soyz` WHERE `id` = '.$kac['id'].' ');
header('Location: ?');
exit();
}


if(isset($_GET['Yes_'.$kac['id'].'/'])){
$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '$soyz1[id]'"),0);
if($sostav >= $soyz1['mesta']){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В Союзе нет мест!</font>';
exit();
}


mysql_query("UPDATE `users` SET `soyz` = '".$kac['soyz']."', `soyz_rang` = '6' WHERE `id` = '$user[id]' LIMIT 1");
if(!$time_day){
mysql_query("INSERT INTO `time_day_soyz` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}else{
mysql_query("UPDATE `time_day_soyz` SET `time` = '".time()."', `day` = '0' WHERE `user` = '$user[id]' LIMIT 1");
}
if(!$musor_time){
mysql_query("INSERT INTO `musor_time_soyz` SET `user` = '".$user['id']."', `time` = '".(time()+86400)."' ");
}else{
mysql_query("UPDATE `musor_time_soyz` SET `time` = '".(time()+86400)."' WHERE `user` = '$user[id]' LIMIT 1");
}
mysql_query("UPDATE `kach_soyz` SET `time_kach` = '".(time()+$kac['time'])."' WHERE `id` = '$kac[id]' LIMIT 1");

if($application){
mysql_query('DELETE FROM `application_soyz` WHERE `user` = '.$user['id'].' '); /// заявки на всупление в союз
}
if($Invitations){
mysql_query('DELETE FROM `Invitations_soyz` WHERE `ank_user` = '.$user['id'].' '); /// приглашения в союз
}



$text = ' <font color=lightgreen>'.nick($kac['user']).'</font> - <font color=IndianRed>Принял(а) по Контракту игрока '.nick($user['id']).'</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$soyz1['id']."', `text` = '$text', `time` = '".time()."'");


header('Location: ?');
exit();
}

}
///////////////////////////////////////////////////////////////////// приглашение на кач союз конец
}
















if($user['corp'] == 0){
///////////////////////////////////////////////////////////////////// приглашение на кач кп
if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `kach` WHERE `ank` = '".$user['id']."' and `time_kach` = '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$ka = mysql_query("SELECT * FROM `kach` where `ank` = '".$user['id']."' and `time_kach` = '0' ORDER BY `id` DESC LIMIT $start, $max");
while($k = mysql_fetch_assoc($ka)){
	$corp1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$k['corp']."'"));
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
'.nick($k['user']).' Предлагает Вам Контракт в Кп на '.($k['time']/3600).' ч.<br>
<div class="mt4"><a class="btni accept" href="?Yes_'.$k['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтвердить</a>
<a class="btni decline" href="?No_'.$k['id'].'/"><img src="/images/cross.png" alt="" width="24" height="24"> Отменить </a></div>

</span></li></ul></div>';



if(isset($_GET['No_'.$k['id'].'/'])){
mysql_query('DELETE FROM `kach` WHERE `id` = '.$k['id'].' ');
header('Location: ?');
exit();
}


if(isset($_GET['Yes_'.$k['id'].'/'])){
$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '$corp1[id]'"),0);
if($sostav >= $corp1['mesta']){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В корпорации нет мест!</font>';
exit();
}
if($user['premium'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Действие премиума еще не закончилось.</font>';
exit();
}

$corp1['angel'] = toBC($corp1['angel']);
$user['angel']  = toBC($user['angel']);
$corp1['rock']  = toBC($corp1['rock']);
$user['rock']   = toBC($user['rock']);

$newAngel = bcadd($corp1['angel'], $user['angel'], 0);
$newRock  = bcadd($corp1['rock'],  $user['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($k['corp'])."' 
    LIMIT 1");
	
mysql_query("UPDATE `users` SET `corp` = '".$k['corp']."', `corp_rang` = '6' WHERE `id` = '$user[id]' LIMIT 1");
if(!$time_day){
mysql_query("INSERT INTO `time_day` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}else{
mysql_query("UPDATE `time_day` SET `time` = '".time()."', `day` = '0' WHERE `user` = '$user[id]' LIMIT 1");
}
if(!$musor_time){
mysql_query("INSERT INTO `musor_time` SET `user` = '".$user['id']."', `time` = '".(time()+86400)."' ");
}else{
mysql_query("UPDATE `musor_time` SET `time` = '".(time()+86400)."' WHERE `user` = '$user[id]' LIMIT 1");
}
mysql_query("UPDATE `kach` SET `time_kach` = '".(time()+$k['time'])."' WHERE `id` = '$k[id]' LIMIT 1");

if($application){
mysql_query('DELETE FROM `application` WHERE `user` = '.$user['id'].' '); /// заявки на всупление в кп
}
if($Invitations){
mysql_query('DELETE FROM `Invitations` WHERE `ank_user` = '.$user['id'].' '); /// приглашения в кп
}



$text = ' <font color=lightgreen>'.nick($k['user']).'</font> - <font color=IndianRed>Принял(а) по Контракту игрока '.nick($user['id']).'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$corp1['id']."', `text` = '$text', `time` = '".time()."'");


header('Location: ?');
exit();
}

}
///////////////////////////////////////////////////////////////////// приглашение на кач кп конец
}











if($user['corp'] == 0){
///////////////////////////////////////////////////////////////////// приглашение в кп
if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `Invitations` WHERE `ank_user` = '".$user['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$Invitations = mysql_query("SELECT * FROM `Invitations` where `ank_user` = '".$user['id']."' ORDER BY `id` DESC LIMIT $start, $max");
while($q = mysql_fetch_assoc($Invitations)){
$corp1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$q['corp']."'"));
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">

Игрок '.nick($q['user']).' приглашает Вас в корпорацию   " '.$corp1['name'].' " <img src="/images/angel48.png" width="24" height="24" alt=""> '.n_f($corp1['angel']).'
<div class="mt4"><a class="btni accept" href="?I_confirm_'.$q['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?I_not_'.$q['id'].'/"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>

</span></li></ul></div>';



if(isset($_GET['I_not_'.$q['id'].'/'])){
mysql_query('DELETE FROM `Invitations` WHERE `id` = '.$q['id'].' ');
header('Location: ?');
exit();
}


if(isset($_GET['I_confirm_'.$q['id'].'/'])){
$sostav = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '$corp1[id]'"),0);
if($sostav >= $corp1['mesta']){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В корпорации нет мест!</font>';
exit();
}
if($user['premium'] != 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Действие премиума еще не закончилось.</font>';
exit();
}

$corp1['angel'] = toBC($corp1['angel']);
$user['angel']  = toBC($user['angel']);
$corp1['rock']  = toBC($corp1['rock']);
$user['rock']   = toBC($user['rock']);

$newAngel = bcadd($corp1['angel'], $user['angel'], 0);
$newRock  = bcadd($corp1['rock'],  $user['rock'],  0);

mysql_query("UPDATE `corp` SET 
    `angel` = '".$newAngel."', 
    `rock` = '".$newRock."' 
    WHERE `id` = '".intval($k['corp'])."' 
    LIMIT 1");
	
mysql_query("UPDATE `users` SET `corp` = '".$q['corp']."', `corp_rang` = '6' WHERE `id` = '$user[id]' LIMIT 1");
if(!$time_day){
mysql_query("INSERT INTO `time_day` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}else{
mysql_query("UPDATE `time_day` SET `time` = '".time()."', `day` = '0' WHERE `user` = '$user[id]' LIMIT 1");
}
if(!$musor_time){
mysql_query("INSERT INTO `musor_time` SET `user` = '".$user['id']."', `time` = '".(time()+86400)."' ");
}else{
mysql_query("UPDATE `musor_time` SET `time` = '".(time()+86400)."' WHERE `user` = '$user[id]' LIMIT 1");
}


if($application){
mysql_query('DELETE FROM `application` WHERE `user` = '.$user['id'].' '); /// заявки на всупление в кп
}
if($Invitations){
mysql_query('DELETE FROM `Invitations` WHERE `ank_user` = '.$user['id'].' '); /// приглашения в кп
}
if($kach){
mysql_query('DELETE FROM `kach` WHERE `ank` = '.$user['id'].' '); /// приглашения по контракту
}



$text = ' <font color=lightgreen>'.nick($q['user']).'</font> - <font color=IndianRed>Принял(а) в корпорацию игрока '.nick($user['id']).'</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$corp1['id']."', `text` = '$text', `time` = '".time()."'");
header('Location: ?');
exit();
}



}

}
































if($user['soyz'] == 0){
///////////////////////////////////////////////////////////////////// приглашение в союз
if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `Invitations_soyz` WHERE `ank_user` = '".$user['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$Invitations_soyz = mysql_query("SELECT * FROM `Invitations_soyz` where `ank_user` = '".$user['id']."' ORDER BY `id` DESC LIMIT $start, $max");
while($q1 = mysql_fetch_assoc($Invitations_soyz)){
$soyz1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$q1['soyz']."'"));
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">

Игрок '.nick($q1['user']).' приглашает Вас в Союз   " '.$soyz1['name'].' " <img src="/images/header/money_36.png" width="24" height="24" alt=""> '.n_f($soyz1['musor']).'%
<div class="mt4"><a class="btni accept" href="?Iconfirm_'.$q1['id'].'/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?Inot_'.$q1['id'].'/"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>

</span></li></ul></div>';



if(isset($_GET['Inot_'.$q1['id'].'/'])){
mysql_query('DELETE FROM `Invitations_soyz` WHERE `id` = '.$q1['id'].' ');
header('Location: ?');
exit();
}


if(isset($_GET['Iconfirm_'.$q1['id'].'/'])){
$sostav1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '$soyz1[id]'"),0);
if($sostav1 >= $soyz1['mesta']){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! В Союзе нет мест!</font>';
exit();
}

$soyz1['musor'] = toBC($soyz1['musor']);
$user['musor_proc']  = toBC($user['musor_proc']);

$newmusor = bcadd($soyz1['musor'], $user['musor_proc'], 0);
mysql_query("UPDATE `soyz` SET 
    `musor` = '".$newmusor."'
    WHERE `id` = '".intval($q1['soyz'])."' 
    LIMIT 1");
	
mysql_query("UPDATE `users` SET `soyz` = '".$q1['soyz']."', `soyz_rang` = '6' WHERE `id` = '$user[id]' LIMIT 1");
if(!$time_day_soyz){
mysql_query("INSERT INTO `time_day_soyz` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}else{
mysql_query("UPDATE `time_day_soyz` SET `time` = '".time()."', `day` = '0' WHERE `user` = '$user[id]' LIMIT 1");
}
if(!$musor_time_soyz){
mysql_query("INSERT INTO `musor_time_soyz` SET `user` = '".$user['id']."', `time` = '".(time()+86400)."' ");
}else{
mysql_query("UPDATE `musor_time_soyz` SET `time` = '".(time()+86400)."' WHERE `user` = '$user[id]' LIMIT 1");
}



if($application_soyz){
mysql_query('DELETE FROM `application_soyz` WHERE `user` = '.$user['id'].' '); /// заявки на всупление в союз
}
if($Invitations_soyz){
mysql_query('DELETE FROM `Invitations_soyz` WHERE `ank_user` = '.$user['id'].' '); /// приглашения в союз
}

$text = ' <font color=lightgreen>'.nick($q1['user']).'</font> - <font color=IndianRed>Принял(а) в Союз игрока '.nick($user['id']).'</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$soyz1['id']."', `text` = '$text', `time` = '".time()."'");
header('Location: ?');
exit();
}



}
}


if($user['vid'] == 0){echo '</div><div class="mt10"></div>';}






/*
if($user['level'] >= 1){

if($user['level'] == 1){$bonus_adm = 3000;}
if($user['level'] == 2){$bonus_adm = 5000;}
if($user['level'] == 3){$bonus_adm = 10000;}

if($user['bonus_adm'] < time() && $user['bonus_adm'] != 1){
mysql_query("UPDATE `users` SET `bonus_adm` = '".($user['bonus_adm'] = 1 )."' WHERE `id` = '".$user['id']."' LIMIT 1");
}

if($user['bonus_adm'] == 1){
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin'] + $bonus_adm)."', `bonus_adm` = '".($user['bonus_adm'] = (time()+(86400*7)) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
$pay_text = 'Ваш баланс пополнен на <img width="20" height="20" alt="Рубины" src="/images/ruby.png" title="Рубины"> '.$bonus_adm.'. (Бонус Администрации)';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = ' <div class="mt4 center">Еженедельный бонус Администрации<span> <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <span class=" tred">'.$bonus_adm.'</span></span></div>';
exit();
}

}
*/









if (isset($_GET['AutoBuy'])) {
    $auto_boy = 'ASC';

    function calculateTotalCostAndLevels($balance, $currentLevel, $startPrice) {
        $balance = toBC($balance);
        $currentLevel = toBC($currentLevel);
        $startPrice = toBC($startPrice);
        $spentBalance = '0';
        $upgradedLevels = 0;
        $maxLevel = '9999';

        while (
            bccomp($balance, bcmul($startPrice, $currentLevel)) >= 0 &&
            bccomp($currentLevel, $maxLevel) <= 0
        ) {
            $price = bcmul($startPrice, $currentLevel);
            $balance = bcsub($balance, $price);
            $spentBalance = bcadd($spentBalance, $price);
            $upgradedLevels++;
            $currentLevel = bcadd($currentLevel, '1');
        }

        $priceOnLastLevel = bcmul($startPrice, bcsub($currentLevel, '1'));

        return [
            'spentBalance' => $spentBalance,
            'upgradedLevels' => $upgradedLevels,
            'priceOnLastLevel' => $priceOnLastLevel,
            'maxLevel' => $maxLevel,
        ];
    }

    $q = mysql_query("SELECT * FROM `user_biznes_1` WHERE `user` = '".$user['id']."' AND `raz_kach` != '10000' ORDER BY `cena` $auto_boy LIMIT 320");
    while ($x1 = mysql_fetch_assoc($q)) {
		$user['dohod'] = toBC($user['dohod']);
		$user['money'] = toBC($user['money']);
		$x1['dohod'] = toBC($x1['dohod']);
		$x1['biznes_dohod'] = toBC($x1['biznes_dohod']);
		
        $balance1 = toBC($user['money']);
        $currentLevel1 = toBC($x1['raz_kach']);
        $startPrice1 = toBC($x1['cena']);

        $result1 = calculateTotalCostAndLevels($balance1, $currentLevel1, $startPrice1);

        if ($result1['upgradedLevels'] > 0) {
            $upgradedLevelsBC = toBC($result1['upgradedLevels']);
            $biznesDohodAdd = bcmul($x1['dohod'], $upgradedLevelsBC);
            $userDohodAdd = bcmul($x1['dohod'], $upgradedLevelsBC);
            $newBiznesDohod = bcadd($x1['biznes_dohod'], toBC($biznesDohodAdd));
            $newRazKach = bcadd($x1['raz_kach'], $upgradedLevelsBC);
            $newUserDohod = bcadd($user['dohod'], toBC($userDohodAdd));
            $newUserMoney = bcsub($user['money'], toBC($result1['spentBalance']));

            mysql_query("UPDATE `user_biznes_1` SET 
                `biznes_dohod` = '".$newBiznesDohod."', 
                `raz_kach` = '".$newRazKach."'
                WHERE `id` = '".$x1['id']."' LIMIT 1");

            mysql_query("UPDATE `users` SET 
                `dohod` = '".$newUserDohod."',
                `money` = '".$newUserMoney."'
                WHERE `id` = '".$user['id']."' LIMIT 1");

            // Обновляем данные пользователя в цикле
            $user['money'] = toBC($newUserMoney);
            $user['dohod'] = toBC($newUserDohod);
        }
    }

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}








if($user['vid'] == 0){
require_once ('require_once/mobile.php');
}elseif($user['vid'] == 1){
require_once ('require_once/polniy.php');
}if($user['vid'] == 2){
require_once ('require_once/kompakt.php');
}




if($user['vid'] == 0){$txt_v = '<u>';}
if($user['vid'] == 1){$txt_v1 = '<u>';}
if($user['vid'] == 2){$txt_v2 = '<u>';}

if($user['vid'] == 0){echo '<div class="mt4"></div><div class="overlay_color">';}
echo '<div class="mt4 minor center"><a href="?vid">'.$txt_v.'Mobile</u></a> | <a href="?vid1">'.$txt_v1.'Web</u></a> | <a href="?vid2">'.$txt_v2.'Wap</u></a></div>';
if($user['vid'] == 0){echo '</div>';}


if(isset($_GET['vid'])){
mysql_query("UPDATE `users` SET `vid` = '0' WHERE `id` = '".$user['id']."' LIMIT 1");
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
}

if(isset($_GET['vid1'])){
mysql_query("UPDATE `users` SET `vid` = '1' WHERE `id` = '".$user['id']."' LIMIT 1");
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
}


if(isset($_GET['vid2'])){
mysql_query("UPDATE `users` SET `vid` = '2' WHERE `id` = '".$user['id']."' LIMIT 1");
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
}







}




/* if($time_delete1){
Echo '<br><center><font size=2 color=black> Сохранитесь, или аккаунт удалится автоматически через <span id="time_'.($time_delete1['time']-time()).'000">'._time($time_delete1['time']-time()).'</span></center></font>';
echo '<a class="btnl mt4" href="'.$HOME.'save/"><img src="/images/accept48.png" width="24" height="24" alt=""> <font size=2>Сохранится и получить бонус</font> <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 1 000</a><br>';
} */
require_once ('system/footer.php');
?>