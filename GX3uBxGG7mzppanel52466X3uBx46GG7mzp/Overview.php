<?php
$title = 'Админ-обзор';
require_once('../system/function.php');
require_once('../system/header.php');

if (!$user['id'] || $user['id'] > 1) {
    header('Location: ' . $HOME);
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id < 1) {
    echo 'Неверный ID';
    exit;
}



echo '<hr>Браузер: [ '.$ank['browser'].' ] <br><hr>';
echo 'Где: [ '.$ank['gde'].' ] <br><hr>';
echo '<div class="content small minor"> 5e5c8a9bc479cf813d1928c742295926 (587425555)</div><hr>';


// Обработка сохранения
if (isset($_POST['save'])) {
    $set = array();
    foreach ($_POST as $key => $value) {
        if ($key != 'save') {
            $key = mysql_real_escape_string($key);
            $value = mysql_real_escape_string($value);
            $set[] = "`$key` = '$value'";
        }
    }

    if (count($set)) {
        mysql_query("UPDATE `users` SET " . implode(', ', $set) . " WHERE `id` = '$id'");
        echo '<div style="color:green">Изменения сохранены.</div>';
    }
}

// Получение данных пользователя
$query = mysql_query("SELECT * FROM `users` WHERE `id` = '$id' LIMIT 1");
if (!mysql_num_rows($query)) {
    echo 'Пользователь не найден.';
    exit;
}

$user_data = mysql_fetch_assoc($query);

// Форма редактирования
echo '<form method="post">';
foreach ($user_data as $key => $value) {
    echo '<div style="margin-bottom:5px;">';
    echo '<label><b>' . htmlspecialchars($key) . ':</b><br />';
    echo '<input type="text" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '" style="width:100%;" />';
    echo '</label>';
    echo '</div>';
}
echo '<input type="submit" name="save" value="Сохранить изменения" />';
echo '</form>';








// Рефералы
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo 'Список рефералов:<br><hr>';

$spis = mysql_query("SELECT `id_us` FROM `ref` WHERE `nak` = '" . intval($id) . "' ORDER BY `id` DESC");
$b = 0;

if (mysql_num_rows($spis) == 0) {
    echo '<center>Список рефералов пуст.</center>';
} else {
    while ($s = mysql_fetch_assoc($spis)) {
        $q = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '" . intval($s['id_us']) . "' LIMIT 1"));
        if (!$q) continue;

        $b++;
        echo '<div style="margin-top: 4px;">
            <span class="fl nobr">
                <span>' . $b . '.</span>
                <span class="nobr">' . nick($q['id']) . '</span>
            </span>
            <span>' . vremja($q['datareg']) . '</span>
            <span class="fr nobr">
                <img width="24" height="24" alt="" src="/images/header/money_36.png">
                <span>' . n_f($q['dohod1']) . ' | ' . htmlspecialchars($q['limitation']) . '</span>
            </span>
            <div class="cb"></div>
        </div>';
    }
}

echo '</span></li></ul></div>';


// Игроки с тем же IP
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo 'Список игроков с таким же IP:<br><hr>';

$result1 = mysql_query("SELECT * FROM `users` WHERE `ip` = '" . mysql_real_escape_string($ank['ip']) . "' ORDER BY `id` ASC");
$b1 = 0;

if (mysql_num_rows($result1) == 0) {
    echo '<center>Нет игроков с таким IP.</center>';
} else {
    while ($row1 = mysql_fetch_assoc($result1)) {
        $b1++;
        echo '<div style="margin-top: 4px;">
            <span class="fl nobr">
                <span>' . $b1 . '.</span>
                <span class="nobr">' . nick($row1['id']) . '</span>
            </span>
            <span>' . htmlspecialchars($row1['ip']) . '</span>
            <span class="fr nobr">
                <img width="24" height="24" alt="" src="/images/header/money_36.png">
                <span>' . n_f($row1['dohod1']) . '</span>
            </span>
            <div class="cb"></div>
        </div>';
    }
}

echo '</span></li></ul></div>';







echo '<a class="btnl mt4" href="'.$HOME.'igrok_'.$id.'/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');