<?php
include '../system/function.php';
include '../system/header.php';
include_once __DIR__ . '/sett.php';
include_once __DIR__ . '/WapkassaClass.php';
if(!isset($user)){header('location: /');exit;}
$title = 'Покупка ViP';
if($user['id']){
header('Location: /');
exit();
}





if (!empty($_GET['gold']) && !empty($wk_cena_gold[$_GET['gold']])) {
    try {
		
		
if($_GET['gold']==1 and $user['pay_1'] == 1){
header('Location: /newpresent/');
exit();
}
if($_GET['gold']==2 and $user['pay_2'] == 1){
header('Location: /newpresent/');
exit();
}
if($_GET['gold']==3 and $user['pay_3'] == 1){
header('Location: /newpresent/');
exit();
}
if($_GET['gold']==4 and $user['pay_4'] == 1){
header('Location: /newpresent/');
exit();
}
if($_GET['gold']==5 and $user['pay_5'] == 1){
header('Location: /newpresent/');
exit();
}
if($_GET['gold']==6 and $user['pay_6'] == 1){
header('Location: /newpresent/');
exit();
}

		
		
        // Инициализация класса с id сайта и секретным ключом
        $wapkassa = new WapkassaClass(WK_ID, WK_SECRET);

        // основные параметры - сумма и комментарий платежа
        $wapkassa->setParams($wk_cena_gold[$_GET['gold']], 'Новогодние предложения ID '.$user['id']);

        // допольнительные параметры в виде массива, необязательно
        $wapkassa->setParamsAdd(array(
            'user_id' => $user['id'],
            'type' => 'gold',
            'count' => $_GET['gold'],
        ));

        // получаем данные для генерации формы
        $formValue = $wapkassa->getValue();

        // генерируем форму
        echo '<form method="post" action="https://wapkassa.ru/merchant/payment2">';
        foreach ($formValue as $key => $value) {
            echo '<input type="hidden" name="' . $key . '" value="' . $value . '">';
        }
        echo '<br><center><button>Перейти к оплате</button></center>';
        echo '</form>';
		echo '<a class="btnl mt4" href="'.$HOME.'newpresent/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
include '../system/footer.php';
        exit;

    } catch (Exception $e) {
        // вывод ошибки
        echo $e->getMessage();
include '../system/footer.php';
        exit;
    }
}











foreach ($wk_cena_gold as $key => $value) {


$an_g1 = 10000000000000000000000000000000000000000000000000000000000000000;
$an_g2 = 500000000000000000000000000000000000000000000000000000000000000000;

$mu_s1 = 10000000000000;
$mu_s2 = 500000000000000;

$rb1 = 15000000;
$rb2 = 100000000;






if($key==1){
echo '<center>От 200 руб (один на выбор)</center>';



echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>';

if($user['pay_1'] == 0){
echo '<td style="vertical-align:top;width:33%;"><a href="/paywk/"><div class="menu-left">
<img src="/images/angel48.png" alt="$" width="15%">  <font color=grey size=1%>Ангелы </font>
<img src="/Pay/1.png" width="60%"><font size=2%>'.n_f($an_g1).'</font><br>Купить';
echo '</div></a></td>';
}else{
echo '<td style="vertical-align:top;width:33%;"><a href="?gold_1"><div class="menu-left">
<img src="/images/angel48.png" alt="$" width="15%">  <font color=grey size=1%>Ангелы </font>
<img src="/Pay/1.png" width="60%"><font size=2%>'.n_f($an_g1).'</font><br><img src="/images/accept48.png" width="13%"> Открыть';
echo '</div></a></td>';
}

if($user['pay_2'] == 0){
echo '<td style="vertical-align:top;width:33%;"><a href="/paywk/"><div class="menu-center">
<img src="/images/header/money_36.png" alt="$" width="15%"> <font color=grey size=1%>Коллекции </font>
<img src="/Pay/2.png" width="60%"><font size=2%>'.n_f($mu_s1).'</font><br>Купить</div>
</a></td>';
}else{
echo '<td style="vertical-align:top;width:33%;"><a href="?gold_2"><div class="menu-right">
<img src="/images/header/money_36.png" alt="$" width="15%"> <font color=grey size=1%>Коллекции </font>
<img src="/Pay/2.png" width="60%"><font size=2%>'.n_f($mu_s1).'</font><br><img src="/images/accept48.png" width="13%"> Открыть</div>
</a></td>';
}

if($user['pay_3'] == 0){
echo '<td style="vertical-align:top;width:33%;"><a href="/paywk/"><div class="menu-right">
<img src="/images/ruby.png" alt="$" width="15%">  <font color=grey size=1%>Рубины </font>
<img src="/Pay/3.png" width="60%"><font size=2%>'.n_f($rb1).'</font><br>Купить</div>
</a></td>';
}else{
echo '<td style="vertical-align:top;width:33%;"><a href="?gold_3"><div class="menu-right">
<img src="/images/ruby.png" alt="$" width="15%">  <font color=grey size=1%>Рубины </font>
<img src="/Pay/3.png" width="60%"><font size=2%>'.n_f($rb1).'</font><br><img src="/images/accept48.png" width="13%"> Открыть</div>
</a></td>';
}
echo '</tr></tbody></table>';







echo '<center>От 500 руб (один на выбор)</center>';
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>';

if($user['pay_4'] == 0){
echo '<td style="vertical-align:top;width:33%;"><a href="/paywk/"><div class="menu-left">
<img src="/images/angel48.png" alt="$" width="15%">  <font color=grey size=1%>Ангелы </font>
<img src="/Pay/4.png" width="60%"><font size=2%>'.n_f($an_g2).'</font><br>Купить';
echo '</div></a></td>';
}else{
echo '<td style="vertical-align:top;width:33%;"><a href="?gold_4"><div class="menu-right">
<img src="/images/angel48.png" alt="$" width="15%">  <font color=grey size=1%>Ангелы </font>
<img src="/Pay/4.png" width="60%"><font size=2%>'.n_f($an_g2).'</font><br><img src="/images/accept48.png" width="13%"> Открыть';
echo '</div></a></td>';
}

if($user['pay_5'] == 0){
echo '<td style="vertical-align:top;width:33%;"><a href="/paywk/"><div class="menu-center">
<img src="/images/header/money_36.png" alt="$" width="15%"> <font color=grey size=1%>Коллекции </font>
<img src="/Pay/5.png" width="60%"><font size=2%>'.n_f($mu_s2).'</font><br>Купить</div>
</a></td>';
}else{
echo '<td style="vertical-align:top;width:33%;"><a href="?gold_5"><div class="menu-right">
<img src="/images/header/money_36.png" alt="$" width="15%"> <font color=grey size=1%>Коллекции </font>
<img src="/Pay/5.png" width="60%"><font size=2%>'.n_f($mu_s2).'</font><br><img src="/images/accept48.png" width="13%"> Открыть</div>
</a></td>';
}

if($user['pay_6'] == 0){
echo '<td style="vertical-align:top;width:33%;"><a href="/paywk/"><div class="menu-right">
<img src="/images/ruby.png" alt="$" width="15%">  <font color=grey size=1%>Рубины </font>
<img src="/Pay/6.png" width="60%"><font size=2%>'.n_f($rb2).'</font><br>Купить</div>
</a></td>';
}else{
echo '<td style="vertical-align:top;width:33%;"><a href="?gold_6"><div class="menu-right">
<img src="/images/ruby.png" alt="$" width="15%">  <font color=grey size=1%>Рубины </font>
<img src="/Pay/6.png" width="60%"><font size=2%>'.n_f($rb2).'</font><br><img src="/images/accept48.png" width="13%"> Открыть</div>
</a></td>';
}
echo '</tr></tbody></table>';





###############################################################################################################
if(isset($_GET['gold_1'])){
if($user['pay_1'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Подарок можно плучить при покупке рубинов от 200 рублей</font>';
exit();
}
$an_g = 10000000000000000000000000000000000000000000000000000000000000000;
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$an_g).'", `pay_1` = "'.($user['pay_1']-1).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$an_g)."' WHERE `id` = '".$corp['id']."' LIMIT 1");

$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($an_g).'</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = '<font color=green><b>Новогодние предложение</b> 
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($an_g).'</font></font>';
exit();
}
###############################################################################################################
if(isset($_GET['gold_2'])){
if($user['pay_2'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Подарок можно плучить при покупке рубинов от 200 рублей</font>';
exit();
}
$mu_s = 10000000000000;
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$mu_s).'", `pay_2` = "'.($user['pay_2']-1).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$mu_s)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");

$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($mu_s).'%</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = '<font color=green><b>Новогодние предложение</b> 
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($mu_s).'%</font></font>';
exit();
}
###############################################################################################################
if(isset($_GET['gold_3'])){
if($user['pay_3'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Подарок можно плучить при покупке рубинов от 200 рублей</font>';
exit();
}
$rb = 15000000;
mysql_query('UPDATE `users` SET `rubin` = "'.($user['rubin']+$rb).'", `pay_3` = "'.($user['pay_3']-1).'"  WHERE `id` = '.$user['id'].' LIMIT 1');

$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/ruby.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($rb).'</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = '<font color=green><b>Новогодние предложение</b> 
<img src="/images/ruby.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($rb).'</font></font>';
exit();
}
###############################################################################################################
if(isset($_GET['gold_4'])){
if($user['pay_4'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Подарок можно плучить при покупке рубинов от 1000 рублей</font>';
exit();
}
$an_g = 500000000000000000000000000000000000000000000000000000000000000000;
mysql_query('UPDATE `users` SET `angel` = "'.($user['angel']+$an_g).'", `pay_4` = "'.($user['pay_4']-1).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `corp` SET `angel` = '".($corp['angel']+$an_g)."' WHERE `id` = '".$corp['id']."' LIMIT 1");

$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($an_g).'</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = '<font color=green><b>Новогодние предложение</b> 
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($an_g).'</font></font>';
exit();
}
###############################################################################################################
if(isset($_GET['gold_5'])){
if($user['pay_5'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Подарок можно плучить при покупке рубинов от 1000 рублей</font>';
exit();
}
$mu_s = 500000000000000;
mysql_query('UPDATE `users` SET `musor_proc` = "'.($user['musor_proc']+$mu_s).'", `pay_5` = "'.($user['pay_5']-1).'" WHERE `id` = '.$user['id'].' LIMIT 1');
mysql_query("UPDATE `soyz` SET `musor_proc` = '".($soyz['musor_proc']+$mu_s)."' WHERE `id` = '".$soyz['id']."' LIMIT 1");

$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($mu_s).'%</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = '<font color=green><b>Новогодние предложение</b> 
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($mu_s).'%</font></font>';
exit();
}
###############################################################################################################
if(isset($_GET['gold_6'])){
if($user['pay_6'] == 0){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Подарок можно плучить при покупке рубинов от 1000 рублей</font>';
exit();
}
$rb = 100000000;
mysql_query('UPDATE `users` SET `rubin` = "'.($user['rubin']+$rb).'", `pay_6` = "'.($user['pay_6']-1).'" WHERE `id` = '.$user['id'].' LIMIT 1');

$pay_text = '<b>Новогодние предложение</b> 
<img src="/images/ruby.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($rb).'</font>';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$pay_text."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
header('Location: ?');
$_SESSION['err'] = '<font color=green><b>Новогодние предложение</b> 
<img src="/images/ruby.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($rb).'</font></font>';
exit();
}
###############################################################################################################


}






}







echo '<div class="content small minor">Инструкцию, или помощь можно получить у Администратора.</div>';
echo '<a class="btnl mt4" href="'.$HOME.'Pay/">Назад</a>';

include '../system/footer.php';