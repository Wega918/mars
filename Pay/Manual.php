<?php
$title = 'Ручная покупка';
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

//Карта Рубли (<font color=grey>RUB</font>): <font color=black>2204120123080810</font><hr>

echo '<div class="content angels"><table style="width:100%;" cellspacing="0" cellpadding="0"><tbody>
<div class="content small minor">Цена 1 рубина =  0,01 руб.</div>
<hr>
Для покупки <img class="price_img" src="/images/ruby.png" alt=""> рубинов<br> переведите <img class="price_img" src="/images/Pay/wmr.png">  средства на один из следующих счетов:<hr>

Карта Гривны (<font color=grey>UAH</font>): <font color=black>5457082253181171</font><hr>
Карта Евро (<font color=grey>EUR</font>): <font color=black>5169360007548930</font><hr>
Карта Рубли (<font color=grey>RUB</font>): <font color=black>2202200516545769</font><hr>
Карта Рубли (<font color=grey>RUB</font>): <font color=black>5599002096565520</font><hr>

PAYEER (<font color=grey>Все страны</font>): <font color=black>P1106641078</font><hr>


</tbody></table>
<br><center><font size=2 color=red>По Тех-причинам обращайтесь в <a href="'.$HOME.'tikets">службу поддержки.</a></center></font></div>';

echo '<hr> <font color=black>
После перевода средств, <a href="'.$HOME.'plategi/"><b>создайте платеж</b>.</a></font>';

echo '</center></div>';

echo '<div class="content small minor">Инструкцию, или помощь можно получить у Администратора.</div>';
echo '<a class="btnl mt4" href="'.$HOME.'plategi/"><img src="/images/settings2.png" width="24" height="24" alt=""> Создать платеж <img src="/images/settings2.png" width="24" height="24" alt=""></a>';
echo '<a class="btnl mt4" href="'.$HOME.'Manual/calculation/"><img src="/images/settings2.png" width="24" height="24" alt=""> Калькулятор <img src="/images/settings2.png" width="24" height="24" alt=""><div class="cb"></div></a>';
echo '<a class="btnl mt4" href="'.$HOME.'Pay/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>