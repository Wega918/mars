<?php
$title = 'Рейтинг по доходу';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


$time_rating = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_rating` WHERE `id` = "1"'));

if ($time_rating && $time_rating['time'] < time()) {

    $result = mysql_query("SELECT * FROM `users` WHERE `viz` > '" . (time() - 3600) . "'");
    
    while ($row = mysql_fetch_assoc($result)) {

        $corp = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id` = '{$row['corp']}'"));
        $soyz = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id` = '{$row['soyz']}'"));
        $vip = mysql_fetch_assoc(mysql_query("SELECT * FROM `VIP` WHERE `user` = '{$row['id']}' AND `VIP` = '2'"));
        
        $ach_count = mysql_result(mysql_query(
            "SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '{$row['id']}' AND `done` = '1'"
        ), 0);

        $bon = bcmul(toBC($ach_count), bcmul('100', bcdiv(toBC($ach_count), '4', 10), 10), 10);

        if ($row['angel'] > 0) {
            if ($row['corp'] > 0 && $row['soyz'] > 0) {
                $base = bcdiv(toBC($soyz['musor']), '100', 10);
                $dohod = bcmul($base, toBC($row['dohod']));
                $dohod = bcmul($dohod, toBC($row['dohod_mnogit']));
                $dohod_user = bcmul($dohod, toBC($corp['angel']));
            } else {
                $base = bcdiv(toBC($row['musor_proc']), '100', 10);
                $dohod = bcmul($base, toBC($row['dohod']));
                $dohod = bcmul($dohod, toBC($row['dohod_mnogit']));
                $dohod_user = bcmul($dohod, toBC($row['angel']));
            }
        } else {
            if ($row['corp'] > 0 && $row['soyz'] > 0) {
                $total_musor = $soyz['musor'] + $row['musor_proc'];
                $base = bcdiv(toBC($total_musor), '100', 10);
                $dohod = bcmul($base, toBC($row['dohod']));
                $dohod = bcmul($dohod, toBC($row['dohod_mnogit']));
                $dohod_user = bcmul($dohod, toBC($corp['angel']));
            } else {
                $base = bcdiv(toBC($row['musor_proc']), '100', 10);
                $dohod = bcmul($base, toBC($row['dohod']));
                $dohod_user = bcmul($dohod, toBC($row['dohod_mnogit']));
            }
        }

        $dohod_user = bcmul($dohod_user, toBC($row['pumping']));

        $bonus = '0';
        if (bccomp(toBC($corp['building']), '0') == 0) {
            $bonus = $vip['on'] >= 1 ? bcadd('25', $bon, 10) : bcadd('1', $bon, 10);
        } else {
            $bonus = $vip['on'] >= 1
                ? bcadd(bcadd('25', $bon, 10), toBC($corp['building']), 10)
                : bcadd(toBC($corp['building']), $bon, 10);
        }


        $dohod_total = bcadd($dohod_user, bcdiv(bcmul($dohod_user, $bonus, 10), '100', 10), 10);








        if ($row['dohod1'] !== $dohod_total) {
            mysql_query("UPDATE `users` SET `dohod1` = '{$dohod_total}' WHERE `id` = '{$row['id']}'");
        }
    }

    mysql_query("UPDATE `time_rating` SET `time` = '" . (time() + 60) . "' WHERE `id` = '1' LIMIT 1");
}













echo '<body><div class="center"></div><div class="content"><div>
<img width="24" height="24" alt="" src="/images/header/money_36.png">Рейтинг по <span>доходу</span>';



$max = 10;
$all_users = [];

// Загружаем всех пользователей с валидным dohod1
$q = mysql_query("SELECT `id`, `dohod1` FROM `users` WHERE `dohod1` REGEXP '^[0-9]+(\\.[0-9]+)?([eE][+-]?[0-9]+)?$'
") or die(mysql_error());

// Собираем всех пользователей
while ($r = mysql_fetch_assoc($q)) {
    $all_users[] = $r;
}

// Сортируем всех по dohod1 через bccomp (от большего к меньшему)
usort($all_users, function($a, $b) {
	$b['dohod1'] = toBC($b['dohod1']);
	$a['dohod1'] = toBC($a['dohod1']);
    return bccomp($b['dohod1'], $a['dohod1'], 50); // до 1000 знаков после точки
});

// Находим позицию текущего пользователя и выводим нужную страницу
$my_id = (int)$user['id'];
$my_rank = 0;
foreach ($all_users as $i => $u) {
    if ($u['id'] == $my_id) {
        $my_rank = $i + 1;
        break;
    }
}

// Постраничная разбивка
$k_post = count($all_users);
$k_page = k_page($k_post, $max);
$page = page($k_page);
$start = $max * $page - $max;
$users_page = array_slice($all_users, $start, $max);

// Вывод рейтинга
$v1 = $start;
foreach ($users_page as $r) {
    $v1++;
    if ($r['id'] == $user['id']) {
        $reyt = '<b>' . $v1 . '</b>';
    } else {
        $reyt = $v1;
    }

    echo '<div style="margin-top: 4px;">
        <span class="fl nobr"><span>' . $reyt . '</span>. <span class="nobr">' . nick($r['id']) . '</span></span>
        <span class="fr nobr"><img width="24" height="24" alt="" src="/images/header/money_36.png"><span> ' . n_f($r['dohod1']) . '</span></span>
        <div class="cb"></div></div>';
}

// Страницы
if ($k_page > 1) {
    echo str('' . $HOME . 'rating/10/?', $k_page, $page);
}

// Вывод позиции пользователя
if ($my_rank > 0) {
    echo '<div class="minor mt4">Вы находитесь на <span>' . $my_rank . '</span> месте в рейтинге!</div>';
} else {
    echo '<div class="minor mt4">Вы не участвуете в рейтинге...</div>';
}






echo '<a class="btnl mt4" href="'.$HOME.'rating/">Назад</a>';



echo '<center><div class="minor mt4">Рейтинг обновится через: <span>
<span id="time_'.($time_rating['time']-time()).'000">'._time($time_rating['time']-time()).'</span>
</span> </div></center>';


echo '</body>';
echo '</div>';echo '</div>';
require_once ('../system/footer.php');
?>