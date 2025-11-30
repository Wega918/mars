<?php
$title = 'Рейтинг Союзов';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}



echo '<body><div class="center"></div><div></div><div class="content"><div>
Рейтинг <span> Союзов</span></div><div>';





if (empty($user['max'])) $user['max'] = 10;
$max = $user['max'];

// Получаем все корпорации (лимит для безопасности)
$limit_for_fetch = 5000;
$result = mysql_query("SELECT id, musor, name, open FROM soyz WHERE id > 0 LIMIT $limit_for_fetch") or die(mysql_error());

$corps = [];
while ($row = mysql_fetch_assoc($result)) {
    $corps[] = $row;
}

// Сортируем корпорации по убыванию musor, используя bccomp
usort($corps, function($a, $b) {
    $aAngel = toBC($a['musor']);
    $bAngel = toBC($b['musor']);
    return -bccomp($aAngel, $bAngel);
});

// Находим позицию текущей корпорации пользователя
$user_corp_id = (int)$user['soyz'];
$user_position = null;
foreach ($corps as $idx => $soyz) {
    if ($soyz['id'] == $user_corp_id) {
        $user_position = $idx + 1;
        break;
    }
}

// Пагинация
$k_post = count($corps);
$k_page = k_page($k_post, $max);
$page = page($k_page);
$start = $max * $page - $max;

// Берём только нужный срез для страницы
$corps_page = array_slice($corps, $start, $max);
$pos = $start;

foreach ($corps_page as $soyz) {
    $pos++;
    $reyt = ($soyz['id'] == $user_corp_id) ? '<b>' . $pos . '</b>' : $pos;

    $name_display = ($soyz['open'] == 1) 
        ? '<font color=black>' . htmlspecialchars($soyz['name']) . '</font>' 
        : htmlspecialchars($soyz['name']);

    echo '<div style="margin-top: 4px;">
        <span class="fl nobr"><span>' . $reyt . '</span>. 
            <span><a class="guild" href="' . $HOME . 'soyz/' . $soyz['id'] . '/">
                <img alt="" src="/images/footer/soyz.png" width="24" height="24"> <span>' . $name_display . '</span>
            </a></span>
        </span>
        <span class="fr nobr">
            <img width="24" height="24" alt="" src="/images/header/money_36.png">
            <span>' . n_f($soyz['musor']) . '%</span>
        </span>
        <div class="cb"></div>
    </div>';
}

// Пагинация
if ($k_page > 1) {
    echo str('' . $HOME . 'rating/5/?', $k_page, $page);
}

// Вывод позиции корпорации пользователя
if ($user_position === null) {
    echo "<div class='minor'>Ваша корпорация не участвует в рейтинге...</div>";
} else {
    if ($user_position <= 1000) {
        echo '<div class="minor mt4">Ваша корпорация занимает <span>' . $user_position . '</span>-е место.</div>';
    } else {
        echo "<div class='minor'>Ваша корпорация не участвует в рейтинге...</div>";
    }
}

echo '</div></div>';



echo '<a class="btnl mt4" href="'.$HOME.'rating/">Назад</a>';



echo '</body>';
echo '<center><div class="minor mt4">Рейтинг Союзов обновляется в режиме реального времени.</div></center>';
require_once ('../system/footer.php');
?>