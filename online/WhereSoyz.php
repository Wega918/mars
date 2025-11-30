<?php
$title = 'Игроки без Союза';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']){
header('Location: /');
exit();
}
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `soyz` = '0'"), 0);

if ($ONL > 0) {
    if (empty($user['max'])) $user['max'] = 10;
    $max = 10;

    $k_post = $ONL;
    $k_page = k_page($k_post, $max);
    $page = page($k_page);
    $start = $max * $page - $max;

    // Получаем всех пользователей без союза
    $result = mysql_query("SELECT * FROM `users` WHERE `soyz` = '0'") or die(mysql_error());

    $users = [];
    while ($row = mysql_fetch_assoc($result)) {
        $users[] = $row;
    }

    // Сортируем по musor_proc через bccomp (в порядке убывания)
    usort($users, function ($a, $b) {
        return -bccomp(toBC($a['musor_proc']), toBC($b['musor_proc']), 10);
    });

    // Берем текущую страницу
    $users_page = array_slice($users, $start, $max);

    echo '<div class="center"><div class="feedback">';
    $pos = $start + 1;
    foreach ($users_page as $a) {
        echo '<div><div style="margin-top: 4px;">';
        echo '<span class="fl nobr"><span>' . $pos++ . '</span>.<span><span class="nobr">' . nick($a['id']) . '</span></span></span>';
        echo '<span class="fr nobr"><img width="24" height="24" alt="" src="/images/header/money_36.png"><span>' . n_f($a['musor_proc']) . '%</span></span>';
        echo '<div class="cb"></div></div></div>';
    }
    echo '</div></div>';

    if ($k_page > 1) {
        echo str('' . $HOME . 'WhereSoyz/?', $k_page, $page); // Вывод страниц
    }
} else {
    echo '<div class="center"><div class="feedback">Список игроков без Союза пуст...</div></div>';
}


echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'NoSoyz/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';
require_once ('../system/footer.php');
?> 