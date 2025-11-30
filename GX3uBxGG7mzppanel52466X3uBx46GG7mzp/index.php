<?php
$title = 'Админ панель';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}




if($user['level'] == 3){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><b><font color="red" size="4">☆</font> 
Игре '.floor($sql['game_day']/1000).' дн.
<font color="red" size="4">☆</font></b></span></li>
</ul></div>';




if($user['id'] == 1){


echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/bot.php"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Управление ботами</a>';
echo '<a class="btnl mt4" href="'.$HOME.'plategi_user/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Заявки платижей</a>';













	/*
$dsdsdsds = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `spam` > '0' "),0);
$sdfdgf = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `id` "),0);
echo '<a class="btnl mt4" href="?spam"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Спам mail [проспамленно: '.$dsdsdsds.' из '.$sdfdgf.']</a>';
*/




//mysql_query("UPDATE `users` SET `spam` = '0' WHERE `id` ");








$dsdsdsds = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `email` > '0' and `spam` > '0' "),0);
$sdfdgf = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `email` > '0' "),0);
echo '<a class="btnl mt4" href="?spam"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Спам mail ['.$dsdsdsds.' из '.$sdfdgf.']</a>';
echo '<a class="btnl mt4" href="?spam1"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Спам обнул</a>';

if(isset($_GET['spam1'])){

mysql_query("UPDATE `users` SET `spam` = '0' WHERE `id` ");
    header('Location: ?');
    exit;
}




// Список разрешённых email-адресов
$allowed_emails = [
    'lovekent5246@gmail.com' ,
 	'vanotom1995@gmail.com',
    'sasha@gmail.com',
    'wostaniee1005@gmail.com',
    'hochuseksa33@gmail.com',
    'ruslan1981simeiz@gmail.com',
    '79229095660@bk.ru',
    'susrostislav349@gmail.com',
    '19pashok88@mail.ru',
    'Drako-mell@mail.ru',
    'lucsijmander@gmail.com',
    'badabadugospodinov@gmail.com',
    'lekha.karpov.125673@mail.ru',
    'jaklis59@gmail.com',
    'bpotkompot14@mail.ru',
    'ulanchikismailov@gmail.com',
    'o4822948@gmail.com',
    'eduard.edxx@gmail.com',
    't15682734@gmail.com',
    'Sergey12-59@mail.ru',
    'u6393@mail.ru',
    'Cool.svetika@mail.ru',
    'aselya.1979@mail.ru',
    'obnofficialy@gmail.com',
    'Isaev@bk.ru',
    'smikovr@gmail.com',
    'Cah32@mail.ru',
    'nikitosa.var@gmail.com',
    'kotenkotatana74@gmail.com',
    'nikitamybook@inbox.lv',
    'gurulev19072019@gmail.com',
    'olesuknikita01@gmail.com',
    'Snowwite345@mail.ru',
    'AHDPIOXA69RUC@YANDEX.RU',
    'dimab7008@gmail.com',
    'Ka@mail.ru',
    'mipniu24@mail.ru',
    'sgolubeva254@gmail.com',
    'kavaki.kun@bk.ru',
    'bershovkonstantin88@gmail.com',
    'stanislavpolozov163@gmail.com',
    'o_r_2010@bk.ru',
    'vaaloov@mail.ru',
    'tsamsabden@yandex.ru',
    'valov@mail.ru',
    'iaksenov271@gmail.com',
    'vbobrova151@gmail.com',
    'vm002560@gmail.com',
    'vl3077999@gmail.com',
    'marinagorbacevska9@gmail.com',
    'S.123sj22@gmail.com',
    'mkrukova789@gmail.com',
    '72un5full@gmail.com',
    'angeli7575@mail.ru',
    'kostik.kukarin.88@mail.ru',
    'bled-s@yandex.ru',
    'vip.gamzatov@list.ru',
    'anatolijserebrakov153@gmail.com',
    'hrf1972_0@mail.ru',
    'pentragorn@yandex.ru',
    'shmmsoft@mail.ru',
    '86.venera.bakieva.ahatovna86@mail.ru',
    'maksudovsuhrat7@gmail.com',
    'kira20.06@mail.ru',
    'userV1mail@gmail.com',
    'e49046732@gmail.com',
    'Cinar_2020@mail.ru',
    'tarasikiren@gmail.com',
    'petr888petrv@gmail.com',
    'uki.mari.pon@gmail.com',
    'E94418466@gmail.com',
    'ochitkova19@yandex.ru',
    'mishanya.dorohov81@mail.ru',
    'sonaaskerova28@gmail.com',
    'evgeniy.saplenkov@gmail.com',
    'jamama.1976@mail.ru',
    'k.tana2@mail.ru',
    'xundroerg0hm@mail.ru',
    'Cfcvgt@mail.ru',
    'ku4ina.amin@yandex.com',
    'Matvei23@mail.ru',
    'sidorkinanatala79@gmail.com',
    'Zaja@mail.ru'  
];

if (isset($_GET['spam'])) {
    // Выбираем всех пользователей из базы данных
	$where_users = mysql_query("SELECT * FROM `users` WHERE `spam` = '0' and `email` > '0' LIMIT 25");


    if ($where_users) {
        while ($w_us = mysql_fetch_array($where_users)) {
            // Проверяем, что email находится в списке разрешённых
            //if (in_array($w_us['email'], $allowed_emails)) {
                // Обновляем статус spam
                mysql_query("UPDATE `users` SET `spam` = '1' WHERE `id` = '" . $w_us['id'] . "'");

                // Отправляем письмо
                $headers = "From: news@mars-games.ru\r\n" .
                          "Reply-To: news@mars-games.ru\r\n" .
                          "Content-Type: text/plain; charset=UTF-8\r\n";

                $result = mail(
                    $w_us['email'],
                    'Марсианские бизнесмены',
                    "Вы пропустили несколько событий!\n" .
                    $w_us['login'] . ", прямая ссылка для автоматической авторизации в игру: \n" .
                    $HOME . "autolog.php?ulog=" . urlencode($w_us['login']) . "&upas=" . urlencode($w_us['passw']),
                    $headers
                );

                // Выводим результат отправки
                echo "Письмо отправлено на " . htmlspecialchars($w_us['email']) . ": " . ($result ? "Успешно" : "Ошибка") . "<br>";
/*             } else {
                echo "Email " . htmlspecialchars($w_us['email']) . " не находится в списке разрешённых.<br>";
            } */
        }
    } else {
        echo "Ошибка запроса к базе данных: " . mysql_error();
    }

    header('Location: ?');
    exit;
}




}


echo '<a class="btnl mt4" href="'.$HOME.'plategi_user/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Заявки платижей</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Payments/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Платежи aaio</a>';
echo '<a class="btnl mt4" href="'.$HOME.'history_perevod/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> История переводов рубинов</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Adm_Bon5246/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Бонус от Админа :)</a>';
echo '<a class="btnl mt4" href="'.$HOME.'garden_bon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Робот-помощник</a>';
echo '<a class="btnl mt4" href="'.$HOME.'mine_bon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Автокирка</a>';
echo '<a class="btnl mt4" href="'.$HOME.'cup_bon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> ViP награда</a>';
echo '<a class="btnl mt4" href="'.$HOME.'safe_bon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Таинственный сейф</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Clon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Проверка на мультоводство</a>';
echo '<a class="btnl mt4" href="'.$HOME.'SetingBan/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Список забаненых</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Ignorelist/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Список игнорируемых</a>';
echo '<a class="btnl mt4" href="'.$HOME.'AddBusiness/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Добавить бизнес</a>';
///echo '<a class="btnl mt4" href="'.$HOME.'AddTrash/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Добавить мусор</a>';
echo '<a class="btnl mt4" href="'.$HOME.'MailSystem/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Почта system</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Mail/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Почта</a>';
echo '<a class="btnl mt4" href="'.$HOME.'SearchIP5246/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Поиск по IP</a>';
echo '<a class="btnl mt4" href="'.$HOME.'CleaningGame/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Чистка игры</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Antispam/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Антиспам</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Seting/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Настройки сайта</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Promotions/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Акции</a>';
echo '<a class="btnl mt4" href="'.$HOME.'MatReplacement/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Замена мата</a>';
echo '<a class="btnl mt4" href="'.$HOME.'RatingViz/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Рейтинг Визитов</a>';
echo '<a class="btnl mt4" href="'.$HOME.'RatingClon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Рейтинг Мультов</a>';
echo '<a class="btnl mt4" href="'.$HOME.'RatingRubin/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Рейтинг Рубинов</a>';
}


if($user['level'] == 2){
//echo '<a class="btnl mt4" href="'.$HOME.'Clon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Проверка на мультоводство</a>';
echo '<a class="btnl mt4" href="'.$HOME.'SetingBan/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Список забаненых</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Ignorelist/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Список игнорируемых</a>';
//echo '<a class="btnl mt4" href="'.$HOME.'SearchIP/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Поиск по IP</a>';
//echo '<a class="btnl mt4" href="'.$HOME.'Promotions/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Акции</a>';
echo '<a class="btnl mt4" href="'.$HOME.'MatReplacement/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Замена мата</a>';
}


if($user['level'] == 1){
//echo '<a class="btnl mt4" href="'.$HOME.'Clon/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Проверка на мультоводство</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Ignorelist/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Список игнорируемых</a>';
//echo '<a class="btnl mt4" href="'.$HOME.'SearchIP/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Поиск по IP</a>';
echo '<a class="btnl mt4" href="'.$HOME.'MatReplacement/"><img src="/images/settings2.png" width="24" height="24" alt="" title=""> Замена мата</a>';
}

echo '<br><a class="btnl mt4" href="'.$HOME.'igrok_'.$user['id'].'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>