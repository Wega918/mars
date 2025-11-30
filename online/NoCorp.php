<?php
$title = 'Игроки Без Корпорации';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']){
header('Location: /');
exit();
}
echo '<a class="btnl mt4" href="'.$HOME.'WhereCorp/">Список всех игроков без Корпорации</a>';

$online_since = time() - $sql['s_online'];
$ONL = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '0' AND `viz` > '$online_since'"), 0);

if ($ONL > 0) {
    if (empty($user['max'])) $user['max'] = 10;
    $max = 10;

    $k_page = k_page($ONL, $max);
    $page = page($k_page);
    $start = $max * $page - $max;

    // Получаем всех онлайн-игроков без корпорации
    $res = mysql_query("SELECT * FROM `users` WHERE `corp` = '0' AND `viz` > '$online_since'") or die(mysql_error());

    $players = [];
    while ($row = mysql_fetch_assoc($res)) {
        $players[] = $row;
    }

    // Сортируем по angel по убыванию
    usort($players, function ($a, $b) {
return -bccomp(toBC($a['angel']), toBC($b['angel']), 10);
    });

    // Нарезаем на страницу
    $players_page = array_slice($players, $start, $max);

    echo '<div class="center"><div class="feedback">Игроки Без Корпорации: '.$ONL.'</div></div><div class="center"><div class="feedback">';
    $rank = $start + 1;
    foreach ($players_page as $a) {
        echo '<div><div style="margin-top: 4px;">
        <span class="fl nobr"><span>'.$rank++.'</span>.<span><span class="nobr">'.nick($a['id']).'</span></span></span>
        <span class="fr nobr"><img width="24" height="24" alt="" src="/images/angel48.png"><span>'.n_f($a['angel']).'</span></span>
        <div class="cb"></div></div></div>';
    }
    echo '</div></div>';

    if ($k_page > 1) {
        echo str(''.$HOME.'NoCorp/?', $k_page, $page);
    }
} else {
    echo '<div class="center"><div class="feedback">Список онлайн игроков без Корпорации пуст...</div></div>';
}




echo '<span class="btnl mt4">Игроки без <span>Корпорации</span></span>';
echo '<a class="btnl mt4" href="'.$HOME.'NoSoyz/">Игроки без <span>Союза</span></a>';









require_once ('../system/footer.php');
?> 