<?php
$title = 'Калькулятор';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';








/* 

if($_GET['pay'] == ok_rub) {
$summa = abs(intval($_POST['summa']));
if($summa == 0){
header('Location: ?');
exit();
}
echo '<div class="content small minor">Цена 1 рубина =  0,01 Руб.</div>';
echo '<hr>';
echo 'На '.$_POST['summa'].' руб Вы получите <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">';


$bon_rub = $summa;
$gold = $summa / 0.01;
$bon2 = (($gold * $bon_rub) / 100);

if($promotions['promotion_1'] == 1){
$rubin = $gold + (($gold * $promotions['act_1']) / 100)+$bon2;
}else{
$rubin = ($gold+$bon2);
}



echo ' '.$rubin.' ';


echo '</span>';
echo '</center></div>';
echo '<div class="content small minor">Сумма указана с учетом акций и бонусов.</div>';
echo '<a class="btnl mt4" href="'.$HOME.'Manual/calculation/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
require_once ('../system/footer.php');
exit();
}

 */







if ($_GET['pay'] == 'ok') {
    $summa = abs(intval($_POST['summa']));
    $valuta = abs(intval($_POST['valuta']));
    
    if ($summa == 0) {
        header('Location: ?');
        exit();
    }
    
    if ($valuta < 0 || $valuta > 1) {
        header('Location: ?');
        exit();
    }

    // URL XML-файла с курсами валют от ЦБ РФ
    $xmlUrl = "https://www.cbr.ru/scripts/XML_daily.asp";
    
    // Загружаем XML-файл
    $xmlContent = file_get_contents($xmlUrl);
    
    // Преобразуем его в объект SimpleXMLElement
    $xml = simplexml_load_string($xmlContent);

    // Ищем элемент с валютой UAH
    $ratePerOneUAH = null;
    foreach ($xml->Valute as $valute) {
        if ($valute->CharCode == 'UAH') {
            $rate = (float)str_replace(',', '.', $valute->Value); // Курс обмена
            $nominal = (int)$valute->Nominal; // Номинал
            $ratePerOneUAH = $rate / $nominal; // Курс за 1 гривну
            break;
        }
    }

    if ($ratePerOneUAH === null) {
        // Обработка ошибки, если курс не найден
        echo 'Ошибка: курс гривны не найден.';
        exit();
    }

    echo '<div class="content small minor">Цена 1 рубина = 0,01 RUB</div>';
    echo '<hr>';
    
    if ($valuta == 0) {
        // Конвертируем введенную сумму из гривен в рубли
        $summaRUB = $summa * $ratePerOneUAH;
        echo 'На '.$_POST['summa'].' грн ('.$summaRUB.' руб.) Вы получите <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">';
    } else {
        // Используем сумму в рублях
        $summaRUB = $summa;
        echo 'На '.$_POST['summa'].' руб Вы получите <span><img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"><span class=" tred">';
    }

    // Рассчитываем золото и рубины
    $bon = $summaRUB;
    $gold = $summaRUB / 0.01; // Количество золота
    $bon1 = (($gold * $bon) / 100); // Бонус
    
    if ($promotions['promotion_1'] == 1) {
        $rubin = $gold + (($gold * $promotions['act_1']) / 100) + $bon1;
    } else {
        $rubin = $gold + $bon1;
    }
    
    echo ' '.ceil($rubin).' ';
    echo '</span>';
    echo '</center></div>';
    echo '<div class="content small minor">Сумма указана с учетом акций и бонусов.</div>';
    echo '<a class="btnl mt4" href="'.$HOME.'Manual/calculation/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';
    
    require_once('../system/footer.php');
    exit();
}















echo '<div class="content small minor"><div class="mt4">Цена 1 рубина =  0,01 RUB</div></div>';
echo '<hr>';
?>
<div class="block"> <form class="" action="?pay=ok" method="POST">
Сумма:</br>
<input type="number" name="summa" maxlength="50" value="1" class="text"/><br />
<div class="minor mt4">
<select name="valuta" style="width: 45%;"><br />
<option value="0">Грн</option>
<option value="1">Руб</option>
</select>
</div>
<input class="mt4" type="submit" value="Подсчитать">
</form>
</div>
<?
echo '</center></div>';



echo '<a class="btnl mt4" href="'.$HOME.'Manual/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';


require_once ('../system/footer.php');
?>