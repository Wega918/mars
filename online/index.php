<?php
$title = 'Онлайн';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


$online_threshold = time() - $sql['s_online'];
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > $online_threshold"), 0);

if (empty($user['max'])) $user['max'] = 10;
$max = 10;

$k_post = $ONL; // уже посчитали
$k_page = k_page($k_post, $max);
$page = page($k_page);
$start = $max * $page - $max;

echo '<div class="center"><div class="feedback">Игроки в сети: <b>' . $ONL . '</b></div></div>';

// Получаем всех онлайн (или можно ограничить, если слишком много)
$result = mysql_query("SELECT * FROM `users` WHERE `viz` > $online_threshold") or die(mysql_error());

$users = [];
while ($row = mysql_fetch_assoc($result)) {
    $users[] = $row;
}

// Сортируем в PHP по dohod1 с использованием bccomp для точности
usort($users, function($a, $b) {
    // bccomp возвращает 1, 0, -1, для usort нужно наоборот (desc)
    return -bccomp($a['dohod1'], $b['dohod1'], 30);
});

// Выводим нужную страницу
$users_page = array_slice($users, $start, $max);

$pos = $start + 1;

foreach ($users_page as $a) {
    $osebe_text = ' <i>' . htmlspecialchars($a['osebe_text']) . '</i> ';

    echo '<div class="feedback"><div><div style="margin-top: 4px;">';
    echo '<span class="fl nobr"><span><span class="nobr">' . nick($a['id']) . '</span></span></span>';
    echo '<span class="fr nobr"><img width="24" height="24" alt="" src="/images/header/money_36.png"><span> ' . n_f($a['dohod1']);

    if ($user['level'] >= 3) {
        echo ' | ' . (int)$a['klon'];
        echo ' | <font color="black" size="1">' . htmlspecialchars($a['gde']) . '</font>';
		echo ' | <font size=2% color=black>'.time_last($a['viz']).'</font>';
    }

    echo '</span></span>';
    echo '<div class="cb"><font color="green" size="2">' . $osebe_text . '</font></div>';
    echo '</div></div></div>';

    $pos++;
}

echo '<center><div class="minor mt4">Рейтинг обновляется в режиме реального времени.</div></center>';

if ($k_page > 1) {
    echo str('' . $HOME . 'online/?', $k_page, $page);
}


echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'NoCorp/">Игроки без Корпорации</a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'NoSoyz/">Игроки без Союза</a></td>
</tr></tbody></table>';








require_once ('../system/footer.php');
?> 