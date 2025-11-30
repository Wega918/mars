<?
$title = 'Таинственный сейф';
include '../system/config.php';   
include '../system/function.php';
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}
if($promotions['promotion_18'] == 0){
if($safe['time_restart'] < time()){
header('Location: /');
exit();
}
}else{
if(!$safe){
header('Location: /');
exit();
}
}


echo '<div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: Новый год</li>
<li class="center">Количество купленных ангелов увеличено ВДВОЕ!</li></ul></div>
</div></div>';






// Получаем всех игроков без премиума
$res = mysql_query("SELECT `id`, `angel` FROM `users` WHERE `premium` = '0'");
$players = [];
while ($row = mysql_fetch_assoc($res)) {
    $row['angel'] = toBC($row['angel']); // переводим в bc
    $players[] = $row;
}

// Сортируем массив по angel (и id для уникальности) через bccomp
usort($players, function($a, $b) {
    $cmp = bccomp($b['angel'], $a['angel'], 10); // сравнение по angel (DESC)
    if ($cmp === 0) {
        return $b['id'] - $a['id']; // если одинаковый angel — сортируем по id (DESC)
    }
    return $cmp;
});

// Берём топ игрока
$top = reset($players);

// Делим его ангелов на 4
$angell_ = bcdiv($top['angel'], '4', 10);

// Вычисляем прогресс = (safe.angel * 100) / angell_
$safe['angel'] = toBC($safe['angel']);
$progress__ = bcdiv(bcmul($safe['angel'], '100', 10), $angell_, 10);

// Ограничиваем 100
if (bccomp($progress__, '100', 10) === 1) {
    $progress__ = '100';
}

// Если safe.angel >= angell_ то берём полный
if (bccomp($safe['angel'], $angell_, 10) >= 0) {
    $angel = $angell_;
    $angel_ = bcdiv(bcmul($angell_, '1', 10), '100', 10); // angell_ * 1 / 100
} else {
    $angel = $safe['angel'];
    $angel_ = bcdiv(bcmul($safe['angel'], '1', 10), '100', 10);
}





if(isset($_GET['actnomany'])){
if(!$safe){
header('Location: /');
exit();
}
if($premium['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}

if($safe['pay'] == 1){
$_SESSION['err'] = '<font color=red>Ошибка! Сейф открыт - награда получена.</font>';
header('Location: ?');
exit();
}
if($safe['time_restart'] <= 0){
$_SESSION['err'] = '<font color=red>Ошибка! Сейф открывается после завершения акции.</font>';
header('Location: ?');
exit();
}
$pay_text = '<font color="green"><b>Таинственный сейф</b> получено <img src="/images/angel48.png" alt="$" width="24" height="24"> бизнес-ангелов <font color="black">'.n_f($angel_).'</font></font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `safe` SET `pay` = '1' WHERE `user` = '".$user['id']."' limit 1");
// Прибавляем angel_ к пользователю и обновляем в БД через bcadd
$newAngel = bcadd(toBC($user['angel']), $angel_, 10);

mysql_query(
    "UPDATE `users` 
     SET `angel` = '".$newAngel."' 
     WHERE `id` = '".intval($user['id'])."' 
     LIMIT 1"
);


$_SESSION['err'] = '<font color="green"><b>Таинственный сейф</b> получено <img src="/images/angel48.png" alt="$" width="24" height="24"> бизнес-ангелов <font color="black">'.n_f($angel_).'</font></font>';
header('Location: ?');
exit();
}
#################################################################################################################
if(isset($_GET['actpay'])){
if(!$safe){
header('Location: /');
exit();
}
if($premium['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($safe['pay'] == 1){
$_SESSION['err'] = '<font color=red>Ошибка! Сейф открыт - награда получена.</font>';
header('Location: ?');
exit();
}
if($safe['time_restart'] <= 0){
$_SESSION['err'] = '<font color=red>Ошибка! Сейф открывается после завершения акции.</font>';
header('Location: ?');
exit();
}
$_SESSION['err'] = 'Чтобы купить Таинственный сейф, напишите <a href="/igrok_1/">Администратору</a>';
header('Location: ?');
exit();
}


if($safe['time_restart'] == 0){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color="#b13131" size="4">'.$title.'</font><br>
<font color="black" size="2"><img src="/images/clock.png" alt="через" width="25" height="25"> <span id="time_'.($promotions['time_18']-time()).'000">'._time($promotions['time_18']-time()).'</span></font>
</span></li></ul></div>';
}else{
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color="#b13131" size="4">'.$title.'</font><br>
<font color="black" size="2"><img src="/images/clock.png" alt="через" width="25" height="25"> <span id="time_'.($safe['time_restart']-time()).'000">'._time($safe['time_restart']-time()).'</span></font>
</span></li></ul></div>';
}





echo '<div class="bordered">
<center><img src="/images/safe.png" alt="" width="35%"></center>

<table style="width:100%"><tbody><tr>
<td style="vertical-align:top;width:1%;"></td>
<td style="vertical-align:top;width:89%;"><div style="border:1px solid #d67600;border-radius:4px;margin:6px 0px;"><div class="expline" style="width:'.$progress__.'%;"></div></div></td>
<td style="vertical-align:top;width:1%;"><font size="2" color="grey">'.$progress__.'%</font></td>
</tr></tbody></table>
<center>';
if($safe['angel'] >= $angell_){
if($safe['pay'] == 0){
echo '<img src="/images/angel48.png" alt="$" width="28" height="28"> <font size="3" color="black">Сейф заполнен - откройте его!</font>';
}else{
echo '<img src="/images/angel48.png" alt="$" width="28" height="28"> <font size="3" color="black">Сейф открыт - награда получена!</font>';
}
}else{
if($safe['pay'] == 0){
echo '<img src="/images/angel48.png" alt="$" width="28" height="28"> <font size="3" color="black">'.n_f($safe['angel']).' / '.n_f($angell_).'</font>';
}else{
echo '<img src="/images/angel48.png" alt="$" width="28" height="28"> <font size="3" color="black">Сейф открыт - награда получена!</font>';
}
}
echo '<div class="" style="margin-top: 8px; position: relative;">';
if($safe['pay'] == 0){
if($promotions['promotion_18'] == 0 and $safe['pay'] == 0 and $safe['time_restart'] > time()){
echo '<table style="width:80%"><tbody><tr>
</center><td style="vertical-align:top;width:33%;"><center><a class="btni" style="min-width:120px;margin:0px;" href="?actpay"><span><span>Купить <img src="/images/angel48.png" alt="$" width="25" height="25"> '.n_f($angel*2).'<br>
<font color="black" size="2">300 РУБ</font></span></span></a></center></td>
<td style="vertical-align:top;width:33%;"><center><br><font color="green" size="3">или</font></center></td>
<td style="vertical-align:top;width:33%;"><center><a class="btni" style="min-width:120px;margin:0px;" href="?actnomany"><span><span>Забрать <img src="/images/angel48.png" alt="$" width="25" height="25"> '.n_f($angel_).'<br>
<font color="black" size="2">БЕСПЛАТНО</font></span></span></a></center></td>
</tr></tbody></table>';
}else{
echo '<table style="width:80%"><tbody><tr>
</center><td style="vertical-align:top;width:33%;"><center><a class="btniii" style="min-width:120px;margin:0px;" href="?actpay"><span><span>Купить <img src="/images/angel48.png" alt="$" width="25" height="25"> '.n_f($angel*2).'<br>
<font color="black" size="2">300 РУБ</font></span></span></a></center></td>
<td style="vertical-align:top;width:33%;"><center><br><font color="green" size="3">или</font></center></td>
<td style="vertical-align:top;width:33%;"><center><a class="btniii" style="min-width:120px;margin:0px;" href="?actnomany"><span><span>Забрать <img src="/images/angel48.png" alt="$" width="25" height="25"> '.n_f($angel_).'<br>
<font color="black" size="2">БЕСПЛАТНО</font></span></span></a></center></td>
</tr></tbody></table>';
}
}
if($safe['time_restart'] >= time() and $safe['pay'] == 0){
echo '<hr><font size="2">Успейте забрать ангелы до истечения времени:</font> <font color="black" size="2"><img src="/images/clock.png" alt="через" width="25" height="25"> <span id="time_'.($safe['time_restart']-time()).'000">'._time($safe['time_restart']-time()).'</span></font>';
}
echo '</div>';
echo '</center></div>';











if(isset($_GET['obmen'])){
if($it_1_1 > 0 and $it_1_2 > 0 and $it_1_3 > 0 and $it_1_4 > 0 and $it_1_5 > 0 and $it_1_6 > 0 ){
mysql_query("UPDATE `users` SET `angel` = '".($user['angel']+$angel)."' WHERE `id` = '".$user['id']."' ");
$_SESSION['err'] = '<font color=green><b>Успешно!</b></font><br>получено <img src="/images/angel48.png" alt="$" width="20" height="20"> '.n_f($angel).'</font>';
header('Location: ?');
exit();
}else{
$_SESSION['err'] = '<font color=red>Для обмена необходимо собрать все камни.</font>';
header('Location: ?');
exit();
}
}






















echo '<a class="btnl mt4" href="'.$HOME.'rate/"> <img src="/images/rating2.png" width="24" height="24" alt="" title=""> Рейтинг</a>';
echo '<a class="btnl mt4" href="'.$HOME.'mission/">Назад</a>';

?>
<div class="fr"><a href="#vrag" onClick="document.getElementById('pokazat1').style.display='none';document.getElementById('skryt1').style.display='';return false;"><center><span style="color:black;"><u>Подробнее</u></span></a></div><br>
<?
///###############################################################################################################################################









///###############################################################################################################################################
?>
<div id="pokazat1"></div>
<div id="skryt1" style="display:none">

<br>
<font size=2><font color=black> <font size=3>•</font></font> <b>Выполняйте задания, заполняйте сейф ангелами и получайте 1% бизнес-ангелов от всех собранных по итогам акции.</b></font><br>
<font size=2><font color=black> <font size=3>•</font></font> <font color=red>Или получите возможность приобрести <b>ВСЕ</b> собранные ангелы со скидкой!</font></font><br>
<font size=2><font color=black> <font size=3>•</font></font> <b>Действие кнопок возможно после завершения акции в течении суток.</b></font><br>


</b>

<br><a class="blck p5 forum"></a><a href="#vrag" onClick="document.getElementById('skryt1').style.display='none';document.getElementById('pokazat1').style.display='';return false;"><center><span style="color:black;">Закрыть</span></center></center></a><br>
</div><?
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


include '../system/footer.php';
?>