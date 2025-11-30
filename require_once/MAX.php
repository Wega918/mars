<?php
/* ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

 */
require_once ('../system/function.php');
//require_once ('../system/header.php');
//require_once ('../system/taimers.php');
if(!$user['id']) {
header('Location: /');
exit();
}



$fid = abs(intval($_GET['fid']));
$id = abs(intval($_GET['id']));
$x1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `user_biznes_1` WHERE `id` = '".$id."' and `user` = '".$user['id']."' "));
$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1' "));

if($x1 == 0){
header('Location: '.$HOME.'');
$_SESSION['err'] = 'Такого бизнеса нету!';
exit();
}

if($x1['raz_kach'] >= $sql['max_lvl_biz']){
header('Location: '.$HOME.'?page='.$fid.'');
$_SESSION['err'] = 'Бизнес на максимальном уровне!';
exit();
}




function toBC($value, $scale = 10) {
    // Если значение - целое число, возвращаем как есть
    if (is_int($value)) {
        return (string)$value;
    }

    // Если строка слишком длинная, возвращаем без изменений
    if (strlen((string)$value) > 300) {
        return (string)$value;
    }

    // Если число в научной нотации, преобразуем в десятичную запись
    if (stripos((string)$value, 'e') !== false) {
        $value = number_format((float)$value, $scale, '.', '');
    }

    // Обрезаем лишние нули и точку, только если это float
    if (strpos((string)$value, '.') !== false) {
        $value = rtrim(rtrim((string)$value, '0'), '.');
    }

    return $value !== '' ? $value : '0';
}



function calculateTotalCostAndLevels($balance, $currentLevel, $startPrice) {
    $balance = toBC($balance);
    $currentLevel = toBC($currentLevel);
    $startPrice = toBC($startPrice);

    $spentBalance = '0';
    $upgradedLevels = 0;
    $priceOnStartLevel = $startPrice;
    $maxLevel = '9999';

    while (
        bccomp($balance, bcmul($startPrice, $currentLevel)) >= 0 &&
        bccomp($currentLevel, $maxLevel) <= 0
    ) {
        $price = bcmul($startPrice, $currentLevel);
        $balance = bcsub($balance, $price);
        $spentBalance = bcadd($spentBalance, $price);
        $upgradedLevels++;
        $currentLevel = bcadd($currentLevel, '1');
    }

    $priceOnLastLevel = bcmul($startPrice, bcsub($currentLevel, '1'));

    return [
        'spentBalance' => $spentBalance,
        'upgradedLevels' => $upgradedLevels,
        'priceOnStartLevel' => $priceOnStartLevel,
        'priceOnLastLevel' => $priceOnLastLevel,
        'maxLevel' => $maxLevel,
    ];
}

$balance1 = toBC($user['money']);
$currentLevel1 = toBC($x1['raz_kach']);
$startPrice1 = toBC($x1['cena']);
$result1 = calculateTotalCostAndLevels($balance1, $currentLevel1, $startPrice1);

// Обновления
$levelsUpgraded = $result1['upgradedLevels'];
$addDohod = bcmul(toBC($x1['dohod']), $levelsUpgraded);

mysql_query("UPDATE `user_biznes_1` SET 
    `biznes_dohod` = '" . bcadd(toBC($x1['biznes_dohod']), $addDohod) . "', 
    `raz_kach` = '" . bcadd(toBC($x1['raz_kach']), $levelsUpgraded) . "'
    WHERE `id` = '$x1[id]' LIMIT 1");

mysql_query("UPDATE `users` SET 
    `dohod` = '" . bcadd(toBC($user['dohod']), $addDohod) . "',
    `money` = '" . bcsub(toBC($user['money']), $result1['spentBalance']) . "'
    WHERE `id` = '$user[id]' LIMIT 1");

header('Location: ' . $HOME . '?page=' . $fid);

function getLevelWord($count) {
    if ($count % 10 == 1 && $count % 100 != 11) return 'уровень';
    elseif ($count % 10 >= 2 && $count % 10 <= 4 && ($count % 100 < 10 || $count % 100 >= 20)) return 'уровня';
    else return 'уровней';
}

$congratulations = [
    'Поздравляем! Вы улучшили бизнес на %d %s!',
    'Успех! Ваш бизнес теперь улучшен на %d %s!',
    'Отличная работа! Бизнес поднят на %d %s!',
    'Поздравляем с обновлением! Ваш бизнес улучшен на %d %s!',
    'Вы сделали это! Бизнес увеличен на %d %s!',
    'Фантастическая работа! Ваш бизнес теперь улучшен на %d %s!',
    'Вы на правильном пути! Бизнес улучшен на %d %s!',
    'Поздравляем с успешным улучшением бизнеса на %d %s!',
    'Вы сделали отличный шаг! Бизнес теперь улучшен на %d %s!',
    'Ура! Ваш бизнес поднят на %d %s!',
];

$rand_text = sprintf(
    $congratulations[array_rand($congratulations)],
    $levelsUpgraded,
    getLevelWord($levelsUpgraded)
);



echo  '<div class="business-card">
    <h2 class="business-name">'.($x1['name']).'</h2>
    <div class="business-image">
        <img src="/images/biznes/room_'.($x1['images']) .'.jpg" alt="'.($x1['name']) .' "  width="15%">
    </div>
    <p class="upgrade-level"><font color=green>Улучшено на <strong>'.($result1['upgradedLevels']).' ур!</font></strong></p>
</div>';
exit();



/* $_SESSION['ses'] = '<div class="business-card">
    <h2><font size=3% color=#ffce00>' . htmlspecialchars($x1['name']) . '</font></h2><div class="mt4"></div>
    <div class="business-image">
        <img src="/images/biznes/room_' . htmlspecialchars($x1['images']) . '.jpg" alt="' . htmlspecialchars($x1['name']) . '">
    </div>
    <p class="upgrade-level"><strong>' . $rand_text . '</strong></p>
</div>';

exit(); */

?> 