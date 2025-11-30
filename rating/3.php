<?php
$title = 'Рейтинг по бизнес-ангелам';
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
<img width="24" height="24" alt="" src="/images/angel48.png">Рейтинг по <span>бизнес-ангелам</span></div><div>';


$max = 10;
$all_users = [];

// Загружаем всех пользователей с валидным angel
$q = mysql_query("SELECT `id`, `angel` FROM `users` WHERE `angel` REGEXP '^[0-9]+(\\.[0-9]+)?$'") or die(mysql_error());

// Собираем всех пользователей
while ($r = mysql_fetch_assoc($q)) {
    $all_users[] = $r;
}

// Сортируем всех по angel через bccomp (от большего к меньшему)
usort($all_users, function($a, $b) {
    return bccomp($b['angel'], $a['angel'], 1000); // до 1000 знаков после точки
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
        <span class="fr nobr"><img width="24" height="24" alt="" src="/images/angel48.png"><span> ' . n_f($r['angel']) . '%</span></span>
        <div class="cb"></div></div>';
}

// Страницы
if ($k_page > 1) {
    echo str('' . $HOME . 'rating/3/?', $k_page, $page);
}

// Вывод позиции пользователя
if ($my_rank > 0) {
    echo '<div class="minor mt4">Вы находитесь на <span>' . $my_rank . '</span> месте в рейтинге!</div>';
} else {
    echo '<div class="minor mt4">Вы не участвуете в рейтинге...</div>';
}









echo '</div></div>';









echo '<a class="btnl mt4" href="'.$HOME.'rating/">Назад</a>';




echo '</body>';
echo '<center><div class="minor mt4">Рейтинг по бизнес-ангелам обновляется в режиме реального времени.</div></center>';
require_once ('../system/footer.php');
?>