<?php
if($soyz['musor_lvl'] >= 1){



echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$soyz['musor_lvl'].'</span></div><div style="display: inline;" class="fl">';
echo '<a class="left" style="display: inline-block;"><img src="/images/biznes/room_11.jpg" alt="Войти" width="64" height="64"></a>';
echo '<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;"><div class="tdbrown">Космический Шлюз</div><div>';

if($musor_time_soyz['time'] > time()){
echo '<span class="btni" style="margin-top: 4px; padding: 3px 5px;"> <span><span id="time_'.($musor_time_soyz['time']-time()).'000">'._time($musor_time_soyz['time']-time()).'</span></span></span>';
}else{
echo '<a class="btni" href="?boy/" style="margin-top: 4px; padding: 3px 5px;"> Получить мусор</a>';
}

echo '</div></div></div><div class="cb"></div></div>';








// Функция для расчета значения $procc с использованием BCMath
function calculate_procc($musor, $musor_lvl) {
    $base_increase = '0.0000001'; // 0.00001% = 0.0000001 в десятичном виде
    $musor_str = toBC($musor, 8);
    $lvl_str = toBC($musor_lvl, 0);

    // $musor * ($base_increase * $musor_lvl)
    $increase = bcmul($base_increase, $lvl_str, 8);
    return bcmul($musor_str, $increase, 8);
}

$current_level = $soyz['musor_lvl'];
$shluz_musor = calculate_procc($soyz['musor'], $current_level);

if ($VIP_3) {
    // +50% к $shluz_musor
    $half = bcdiv($shluz_musor, '2', 8);
    $shluz_musor = bcadd($shluz_musor, $half, 8);
}

// Проверяем наличие записи времени мусора
if (isset($_GET['boy/'])) {
    if ($musor_time_soyz['time'] > time()) {
        $_SESSION['err'] = '<font color=red>Ошибка! Мусор еще не доступен.</font>';
        header('Location: ?');
        exit();
    }

    $new_time = time() + 7200; // 2 часа вперед
    $new_musor_proc = bcadd(toBC($user['musor_proc'], 8), $shluz_musor, 8);
    $new_turnir_musor = bcadd(toBC($soyz['turnir_musor_1'], 8), $shluz_musor, 8);

    if (!$musor_time_soyz) {
        mysql_query("INSERT INTO `musor_time_soyz` SET `user` = '" . $user['id'] . "', `time` = '" . $new_time . "' ");
    } else {
        mysql_query("UPDATE `musor_time_soyz` SET `time` = '" . $new_time . "' WHERE `user` = '" . $user['id'] . "' LIMIT 1");
    }

    mysql_query("UPDATE `users` SET `musor_proc` = '" . $new_musor_proc . "' WHERE `id` = '" . $user['id'] . "' LIMIT 1");
    mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '" . $new_turnir_musor . "' WHERE `id` = '" . $soyz['id'] . "' LIMIT 1");

    $_SESSION['ok'] = '<img src="/images/12.png" width="48" height="48"><br>+' . n_f($shluz_musor) . '%<br>Вы получили весь доступный космический мусор.';
    header('Location: ?');
    exit();
}





}

?>