<?php
if($corp['musor_lvl'] >= 1){



echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$corp['musor_lvl'].'</span></div><div style="display: inline;" class="fl">';
echo '<a class="left" style="display: inline-block;"><img src="/images/biznes/room_11.jpg" alt="Войти" width="64" height="64"></a>';
echo '<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;"><div class="tdbrown">Космический Шлюз</div><div>';

if($musor_time['time'] > time()){
echo '<span class="btni" style="margin-top: 4px; padding: 3px 5px;"> <span><span id="time_'.($musor_time['time']-time()).'000">'._time($musor_time['time']-time()).'</span></span></span>';
}else{
echo '<a class="btni" href="?boy/" style="margin-top: 4px; padding: 3px 5px;"> Получить мусор</a>';
}

echo '</div></div></div><div class="cb"></div></div>';




// Функция для расчета значения $procc с bcmath и toBC
function calculate_procc($musor, $musor_lvl) {
    // Конвертируем входные значения через toBC
    $musor = toBC($musor);
    $musor_lvl = toBC($musor_lvl);
    
    $base_increase = '0.000001'; // 0.0001% = 0.000001 в десятичном формате
    
    $increase_factor = bcmul($base_increase, $musor_lvl, 10);
    return bcmul($musor, $increase_factor, 10);
}

// Получаем значения
$current_level = toBC($corp['musor_lvl']);
$musor_value = toBC($soyz['musor']);

$shluz_musor = calculate_procc($musor_value, $current_level);

if($VIP_3){
    $half = bcdiv($shluz_musor, '2', 10);
    $shluz_musor = bcadd($shluz_musor, $half, 10);
}

// Округлим до 4 знаков (если надо)
$shluz_musor = bcadd($shluz_musor, '0', 4);


if(isset($_GET['boy/'])) {
    if($user['soyz'] <= 0){
        header('Location: ?');
        $_SESSION['err'] = 'Необходимо вступить в союз.';
        exit();
    }
    if($musor_time['time'] > time()){
        header('Location: ?');
        $_SESSION['err'] = '<font color=red>Ошибка!</font>';
        exit();
    }

    $user_musor_proc = toBC($user['musor_proc']);
    $soyz_turnir_musor_1 = toBC($soyz['turnir_musor_1']);

    $new_musor_proc = bcadd($user_musor_proc, $shluz_musor, 4);
    $new_turnir_musor_1 = bcadd($soyz_turnir_musor_1, $shluz_musor, 4);

    if(!$musor_time){
        mysql_query("INSERT INTO `musor_time` SET `user` = '".$user['id']."', `time` = '".(time()+7200)."' ");
    } else {
        mysql_query("UPDATE `musor_time` SET `time` = '".(time()+7200)."' WHERE `user` = '".$user['id']."' LIMIT 1");
    }
    mysql_query("UPDATE `users` SET `musor_proc` = '".$new_musor_proc."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".$new_turnir_musor_1."' WHERE `id` = '".$soyz['id']."' LIMIT 1");

    header('Location: ?');
    $_SESSION['ok'] = '<img src="/images/12.png" width="48" height="48"><br>+'.n_f($shluz_musor).'%<br>Вы получили весь доступный космический мусор.';
    exit();
}





}

?>