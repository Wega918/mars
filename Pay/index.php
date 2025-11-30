<?php
$title = 'Покупка рубинов';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
/*if($user['id'] != 1) {
$_SESSION['err'] = 'Ошибка платежной системы - обратитесь к администратору';
header('Location: /');
exit();
}*/

/*if($user['premium'] != 0){
header('Location: /');
$_SESSION['err'] = 'Покупка рубинов станет доступна после отключения Премиума.';
exit();
}*/

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font color=red size=1>Чем больше рубинов вы приобритаете единоразово, тем ниже стоимость 1-го рубина.</font>
<hr>
<font color=black size=1>Если в списке нету подходящей для Вас платежной системы, обратитесь за помощью к <a href="'.$HOME.'Administrations/">Администрации</a>.</font>
</span></li></ul></div>';


if (isset($_GET['Xsolla'])){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.xsolla.com/merchant/merchants/30430/token');
    $h = array("Content-Type: application/json");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $h);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, '30430:4m0tk8x7rdw5mARx');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_POST, true);
    $json = array("user" => array("id" => array("value" => $user['id'], "hidden" => true)), "settings" => array("project_id" => 28431));
    $json = json_encode($json);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
    $token = json_decode(curl_exec($curl))->token;
    curl_close($curl);
    if (isset($token)) {
//         header("Location:https://sandbox-secure.xsolla.com/paystation2/?access_token=$token");
        header("Location:https://secure.xsolla.com/paystation2/?access_token=$token");
        exit;
    } else {
        $_SESSION['err'] = 'Ошибка платежной системы - обратитесь к администратору';
        header("Location: ?");
        exit;
    }
}


/*
if($promotions['promotion_1'] == 1){
echo '<div class="content"><div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: +'.$promotions['act_1'].'% рубинов!</li>
<li class="center">При покупке любого количества рубинов, Вам зачисляется +'.$promotions['act_1'].'%.</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_1'] - time()).'</span></div>
</div></div></div><hr>';
}
if($promotions['promotion_2'] == 1){
$rand = rand(1,20);
echo '<div class="content"><div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: Карта в подарок</li>
<li class="center">При покупке любого количества рубинов, х'.$promotions['act_2'].' Карт(а) в подарок.</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_2'] - time()).'</span></div>
</div></div></div>
<center><img src="/images/card/'.$rand.'.png" alt="Войти" width="64" height="64"></center>
<hr>';
}
if($promotions['promotion_3'] == 1){
echo '<div class="content"><div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: Бонус Кп</li>
<li class="center">При покупке любого количества рубинов, в фонд Корпорации зачисляется '.$promotions['act_3'].'%.</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_3'] - time()).'</span></div>
</div></div></div><hr>';
}
if($promotions['promotion_4'] == 1){
echo '<div class="content"><div class="bgcontent"><div class="content tred"><div class="pt"><ul>
<li class="center">Акция: Бонус Союзу</li>
<li class="center">При покупке любого количества рубинов, в фонд Союза зачисляется '.$promotions['act_4'].'%.</li></ul></div>
<div class="minor center">Срок действия акции истекает через: <span>'._time($promotions['time_4'] - time()).'</span></div>
</div></div></div><hr>';
}
*/



//echo '<a class="btnl mt4" href="'.$HOME.'newpresent/"> Новогодние <img src="/Pay/2.png" width="6%"> предложения <div class="cb"></div></a>';
//echo '<a class="btnl mt4" href="'.$HOME.'forum/topic/491/?page=top"><img src="/images/ruby.png" width="24" height="24" alt=""> Бонусы при покупке <img src="/images/ruby.png" width="24" height="24" alt=""><div class="cb"></div></a>';
//echo '<a class="btnl mt4" href="'.$HOME.'forum/topic/217/?page=top"><img src="/images/ruby.png" width="24" height="24" alt=""> Бонусы при покупке <img src="/images/ruby.png" width="24" height="24" alt=""><div class="cb"></div></a>';
//echo '<a class="btnl mt4" href="'.$HOME.'forum/topic/436/?page=top"><img src="/images/ruby.png" width="24" height="24" alt=""> Спец. предложение (до 17.12) <img src="/images/ruby.png" width="24" height="24" alt=""><div class="cb"></div></a>';


/* echo '<a class="btnl mt4" href="'.$HOME.'worldkassa/buy.php">
<div class="fc"><img src="/images/worldkassa.png" width="24" height="24" alt=""> WORLKASSA</div>
<div class="fc"><font color=gray size=1>(Sms, Карты, Наличные, Электронные деньги, Криптовалюты, Обменные пункты)</font></div>
<div class="cb"></div></a>';

echo '<a class="btnl mt4" href="'.$HOME.'paywk/">
<div class="fc">
<img src="/images/paywk.png" width="24" height="24" alt=""> WAPKASSA</div>
<div class="fc"><font color=gray size=1>(Sms, Карты, Наличные, Электронные деньги, Криптовалюты, Обменные пункты)</font></div>
<div class="cb"></div></a>';
 */
 
 echo '<a class="btnl mt4" href="/aaio/">
<div class="fl">
<img src="/images/visamc.png" width="24" height="24" alt=""> Карты РФ/Украина/Perfect Money/Volet
Volet/Оплата скинами Steam</div>
<div class="cb"></div></a>';

echo '<a class="btnl mt4" href="'.$HOME.'Manual/">
<div class="fc"><img src="/images/ruby.png" width="24" height="24" alt=""> Ручная покупка</div>
<div class="fc"><font color=gray size=2>(ручной перевод на карту, эл.кошелёк, номер тел.)</font></div>
<div class="cb"></div></a><hr>';
















if($user['id'] ==2){





echo '<a class="btnl mt4" href="?Xsolla">
<div class="fl">
<img src="/images/Xsolla.png" width="24" height="24" alt=""> Xsolla</div>
<div class="fr title">    %     </div>
<div class="cb"></div></a>';
//https://secure.xsolla.com/paystation3/desktop/pricepoint/?access_token=x3oridf5jkxQVTXZmSBo9nMP789hb3hC&preferences=eyJpdGVtUHJvbW90aW9ucyI6IltdIn0-&sessional=eyJoaXN0b3J5IjpbWyJwcmljZXBvaW50Iix0cnVlXV19
//https://secure.xsolla.com/paystation/?local=ru&project=16254&v1=5079360&out=100

?>
<iframe src="https://megakassa.ru/widget/form/?writer=seller&type=pay&lang=ru&shop=4684&amount=10&currency=RUB&fio=no&email=yes&phone=no&desc=%D0%9F%D0%BE%D0%BA%D1%83%D0%BF%D0%BA%D0%B0%20%D1%80%D1%83%D0%B1%D0%B8%D0%BD%D0%BE%D0%B2" width="100%"  frameborder="0" allowtransparency="true" scrolling="no"></iframe>
<?


}

//echo '<a class="btnl mt4" href="'.$HOME.'My_Pay/"><img src="/images/history2.png" width="24" height="24" alt=""> Мои платежи <img src="/images/history2.png" width="24" height="24" alt=""><div class="cb"></div></a>';






if($user['spec_pred'] > 0){
	
///###############################################################################################################################################
echo '<div class="content"><div>';

if($user['spec_pred'] == 1 ){
$pred = 100;
}
if($user['spec_pred'] == 2 ){
$pred = 200;
}
if($user['spec_pred'] == 3 ){
$pred = 500;
}
if($user['spec_pred'] == 4 ){
$pred = 1000;
}
if($user['spec_pred'] == 5 ){
$pred = 2000;
}
if($user['spec_pred'] == 6 ){
$pred = 5000;
}



echo '<center><a href="?100"><font size=2 color=purple><b>100</b></font></a> | <a href="?200"><font size=2 color=purple><b>200</b></font></a> | <a href="?500"><font size=2 color=purple><b>500</b></font></a> | <a href="?1000"><font size=2 color=purple><b>1000</b></font></a> | <a href="?2000"><font size=2 color=purple><b>2000</b></font></a> | <a href="?5000"><font size=2 color=purple><b>5000</b></font></a> </center>'; 
if(isset($_GET['100'])){
$spec_pred = rand(1,6);
mysql_query("UPDATE `users` SET `spec_pred` = '1', `pred_time` = '".($user['pred_time'] = (time()+86400) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Специальное предложение активировано! (100 руб)';
exit();
}

if(isset($_GET['200'])){
$spec_pred = rand(1,6);
mysql_query("UPDATE `users` SET `spec_pred` = '2', `pred_time` = '".($user['pred_time'] = (time()+86400) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Специальное предложение активировано! (200 руб)';
exit();
}

if(isset($_GET['500'])){
$spec_pred = rand(1,6);
mysql_query("UPDATE `users` SET `spec_pred` = '3', `pred_time` = '".($user['pred_time'] = (time()+86400) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Специальное предложение активировано! (500 руб)';
exit();
}

if(isset($_GET['1000'])){
$spec_pred = rand(1,6);
mysql_query("UPDATE `users` SET `spec_pred` = '4', `pred_time` = '".($user['pred_time'] = (time()+86400) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Специальное предложение активировано! (1000 руб)';
exit();
}

if(isset($_GET['2000'])){
$spec_pred = rand(1,6);
mysql_query("UPDATE `users` SET `spec_pred` = '5', `pred_time` = '".($user['pred_time'] = (time()+86400) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Специальное предложение активировано! (2000 руб)';
exit();
}

if(isset($_GET['5000'])){
$spec_pred = rand(1,6);
mysql_query("UPDATE `users` SET `spec_pred` = '6', `pred_time` = '".($user['pred_time'] = (time()+86400) )."' WHERE `id` = '".$user['id']."' LIMIT 1");
header('Location: ?');
$_SESSION['err'] = 'Специальное предложение активировано! (5000 руб)';
exit();
}



require_once ('../user/spec_pred.php');
}

require_once ('../system/footer.php');
?>