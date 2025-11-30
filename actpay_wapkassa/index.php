<?php
include '../system/function.php';
include '../system/header.php';
include_once __DIR__ . '/sett.php';
include_once __DIR__ . '/WapkassaClass.php';
if(!isset($user)){header('location: /');exit;}
$title = 'Покупка ViP';
if(!$user['id']){
header('Location: /');
exit();
}
if($user['vip_pay'] == 1){
header('Location: /');
exit();
}
if($premium['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}
if($premium_musor['time'] > time() ){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Не доступно во время Премиума.</font>';
exit();
}





if (!empty($_GET['gold']) && !empty($wk_cena_gold[$_GET['gold']])) {
    try {
        // Инициализация класса с id сайта и секретным ключом
        $wapkassa = new WapkassaClass(WK_ID, WK_SECRET);

        // основные параметры - сумма и комментарий платежа
        $wapkassa->setParams($wk_cena_gold[$_GET['gold']], 'Покупка ViP ID '.$user['id']);

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
        echo '<center><button>Перейти к оплате</button></center>';
        echo '</form>';
		echo '<a class="btnl mt4" href="'.$HOME.'cup/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
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






$card_1 = ceil(15*$sql['col_mis_turnir']);
$card_2 = ceil(15*$sql['col_mis_turnir']);
$chest = ceil(15*$sql['col_mis_turnir']);
$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){$angel_ = (($ang__['angel']*0.5/100)*($sql['col_mis_turnir']));}
$mus___ = mysql_query("SELECT * FROM `users` WHERE `premium_musor` = '0' ORDER BY `musor_proc` + `id` DESC LIMIT 1");
while($mus__ = mysql_fetch_assoc($mus___)){$musor_ = (($mus__['musor_proc']*0.5/100)*($sql['col_mis_turnir']));}


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font size=4 color=red>ViP награда!</font> 
<br><font color=black size=2><tt>Открой награды недели! </tt></font> <hr>
<div class="center">
<span class="count_room">х'.$card_1.'</span><img width="11%" src="/images/card/3.png">
<span class="count_room">х'.$card_2.'</span><img width="11%" src="/images/card/3.png">
</div>
<hr>
<img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=black>'.n_f($angel_).'</font>
<font color="black" size="3"> | </font>
<img src="/images/header/money_36.png" alt="o" width="22" height="22"> <font size=2 color=black>'.n_f($musor_).'%</font>
<hr>

<span class="count_room">х'.$chest.'</span><img width="35" height="35" src="/chests/chests/6.png"> <font size="2">Легендарный сундук</font>';

echo '<hr>
<font color=black size=1>Купив ViP награду вы получите особую награду недели!
<br> И сможете забирать вип награду за каждый пройденный уровень.<hr>
</font>
<a class="btni" style="min-width:160px;margin:4px;" href="index.php?gold=1"><span><span>Купить за <font color=black>300</font> руб wapkassa</span></span></a>';
echo '<a class="btni" style="min-width:160px;margin:4px;" href="/actpay_wapkassa/?gold='.$key.'"><span><span>Купить за <font color=black>300</font> руб wapkassa</span></span></a>';

echo '</span></li></ul></div>';



}







echo '<div class="content small minor">Инструкцию, или помощь можно получить у Администратора.</div>';
echo '<a class="btnl mt4" href="'.$HOME.'cup/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';










include '../system/footer.php';