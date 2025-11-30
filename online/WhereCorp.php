<?php
$title = 'Игроки без Корпорации';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']){
header('Location: /');
exit();
}
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '0'"), 0);

if ($ONL > 0) {
    if (empty($user['max'])) $user['max'] = 10;
    $max = 10;

    $k_post = $ONL; // количество без корпорации
    $k_page = k_page($k_post, $max);
    $page = page($k_page);
    $start = $max * $page - $max;

    // Получаем всех пользователей без корпорации (ограничение можно добавить, если данных много)
    $result = mysql_query("SELECT * FROM `users` WHERE `corp` = '0'") or die(mysql_error());

    $users = [];
    while ($row = mysql_fetch_assoc($result)) {
        $users[] = $row;
    }

    // Сортируем массив по 'angel' в убывающем порядке с помощью bccomp
    usort($users, function ($a, $b) {
        return -bccomp(toBC($a['angel']), toBC($b['angel']), 30);
    });

    // Берем текущую страницу
    $users_page = array_slice($users, $start, $max);

    echo '<div class="center"><div class="feedback">';
    $pos = $start + 1;
    foreach ($users_page as $a) {
        echo '<div><div style="margin-top: 4px;">';
        echo '<span class="fl nobr"><span>' . $pos++ . '</span>.<span><span class="nobr">' . nick($a['id']) . '</span></span></span>';
        echo '<span class="fr nobr"><img width="24" height="24" alt="" src="/images/angel48.png"><span>' . n_f($a['angel']) . '</span></span>';
        echo '<div class="cb"></div></div></div>';
    }
    echo '</div></div>';

    if ($k_page > 1) {
        echo str('' . $HOME . 'WhereCorp/?', $k_page, $page); // Вывод страниц
    }
} else {
    echo '<div class="center"><div class="feedback">Список игроков без Корпорации пуст...</div></div>';
}


echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'NoCorp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?> 