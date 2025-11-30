<?php
$procent = '24850';
$add = bcdiv(bcmul(toBC($user['musor_proc']), '0.05', 6), '100', 6);
$procent = bcadd($procent, $add, 6);

$base = bcadd(bcadd(toBC($corp['musor_proc']), toBC($soyz['musor_proc']), 6), $procent, 6);

if($time_day_soyz['day'] >= 7){
    if($VIP_3){
        $half = bcdiv($base, '2', 6);
        $nagrada1 = bcadd($base, $half, 6);
    } else {
        $nagrada1 = $base;
    }
}

if($time_day_soyz['day'] >= 14){
    if($VIP_3){
        $base_x4 = bcmul($base, '4', 6);
        $nagrada1 = bcadd($base, bcdiv($base, '2', 6), 6);
        $nagrada7 = bcadd($base_x4, bcdiv($base_x4, '2', 6), 6);
    } else {
        $nagrada1 = $base;
        $nagrada7 = bcmul($base, '4', 6);
    }
}

if($time_day_soyz['day'] >= 30){
    if($VIP_3){
        $base_x9 = bcmul($base, '9', 6);
        $nagrada1 = bcadd($base, bcdiv($base, '2', 6), 6);
        $nagrada7 = bcadd(bcmul($base, '4', 6), bcdiv(bcmul($base, '4', 6), '2', 6), 6);
        $nagrada30 = bcadd($base_x9, bcdiv($base_x9, '2', 6), 6);
    } else {
        $nagrada1 = $base;
        $nagrada7 = bcmul($base, '4', 6);
        $nagrada30 = bcmul($base, '9', 6);
    }
}

$n1 = bcdiv($nagrada1, '7', 6);
$n7 = bcdiv($nagrada7, '7', 6);
$n30 = bcdiv($nagrada30, '7', 6);

$building = toBC($soyz['building']);
$bon1 = bcdiv(bcmul($n1, $building, 6), '100', 6);
$bon7 = bcdiv(bcmul($n7, $building, 6), '100', 6);
$bon30 = bcdiv(bcmul($n30, $building, 6), '100', 6);

$where1 = bcadd($n1, $bon1, 6);
$where7 = bcadd($n7, $bon7, 6);
$where30 = bcadd($n30, $bon30, 6);


if($time_day_soyz['day'] >= 7){
echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$time_day_soyz['day'].'</span></div><div style="display: inline;" class="fl">
<a class="left" style="display: inline-block;" ><img src="/images/biznes/room_1.jpg" alt="Войти" width="64" height="64"></a>
<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;"><div class="tdbrown">Верность Cоюзу <font color=red>(+'.$soyz['building'].'%) </font></div><div>';


if($time_day_soyz['day'] >= 7){
if($time_day_soyz['day'] >= 7 and $fidelity_soyz['time_7'] < time()){
echo ' <a class="btni" href="?nagrada1/" style="margin-top: 4px; padding: 3px 5px;">  <img src="/images/header/money_36.png" alt="Войти" width="24" height="24"> '.n_f($n1).'% <font size=1 color=red>+'.n_f($bon1).'</font></a><font color-red> </font>';
}else{
echo ' <span class="btni" style="margin-top: 4px; padding: 3px 5px;"> <span><span id="time_'.($fidelity_soyz['time_7']-time()).'000">'._time($fidelity_soyz['time_7']-time()).'</span></span></span>';
}
}

if($time_day_soyz['day'] >= 14){
if($time_day_soyz['day'] >= 14 and $fidelity_soyz['time_14'] < time()){
echo ' <a class="btni" href="?nagrada7/" style="margin-top: 4px; padding: 3px 5px;">  <img src="/images/header/money_36.png" alt="Войти" width="24" height="24"> '.n_f($n7).'% <font size=1 color=red>+'.n_f($bon7).'</font></a><font color-red> </font>';
}else{
echo ' <span class="btni" style="margin-top: 4px; padding: 3px 5px;"> <span><span id="time_'.($fidelity_soyz['time_14']-time()).'000">'._time($fidelity_soyz['time_14']-time()).'</span></span></span>';
}
}

if($time_day_soyz['day'] >= 30){
if($time_day_soyz['day'] >= 30 and $fidelity_soyz['time_30'] < time()){
echo ' <a class="btni" href="?nagrada30/" style="margin-top: 4px; padding: 3px 5px;">  <img src="/images/header/money_36.png" alt="Войти" width="24" height="24"> '.n_f($n30).'% <font size=1 color=red>+'.n_f($bon30).'</font></a><font color-red> </font>';
}else{
echo ' <span class="btni" style="margin-top: 4px; padding: 3px 5px;"><span><span id="time_'.($fidelity_soyz['time_30']-time()).'000">'._time($fidelity_soyz['time_30']-time()).'</span></span></span>';
}
}




echo '</div></div></div><div class="cb"></div></div>';
}




if(isset($_GET['nagrada1/'])){
    if($time_day_soyz['day'] < 7 or $fidelity_soyz['time_7'] > time()){
        $_SESSION['err'] = '<font color=red>Ошибка!</font>';
        header('Location: ?');
        exit();
    }

    $newMusor = bcadd(toBC($user['musor_proc']), $where1, 6);
    $newTurnir = bcadd(toBC($soyz['turnir_musor_1']), $where1, 6);
    $timeNow = time() + 86400;

    mysql_query("UPDATE `users` SET `musor_proc` = '".$newMusor."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity_soyz` SET `time_7` = '".$timeNow."' WHERE `user` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".$newTurnir."' WHERE `id` = '".$soyz['id']."' LIMIT 1");

    header('Location: ?');
    exit();
}

if(isset($_GET['nagrada7/'])){
    if($time_day_soyz['day'] < 7 or $fidelity_soyz['time_14'] > time()){
        $_SESSION['err'] = '<font color=red>Ошибка!</font>';
        header('Location: ?');
        exit();
    }

    $newMusor = bcadd(toBC($user['musor_proc']), $where7, 6);
    $newTurnir = bcadd(toBC($soyz['turnir_musor_1']), $where7, 6);
    $timeNow = time() + 86400;

    mysql_query("UPDATE `users` SET `musor_proc` = '".$newMusor."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity_soyz` SET `time_14` = '".$timeNow."' WHERE `user` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity_soyz` SET `time_7` = '".$timeNow."' WHERE `user` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".$newTurnir."' WHERE `id` = '".$soyz['id']."' LIMIT 1");

    header('Location: ?');
    exit();
}

if(isset($_GET['nagrada30/'])){
    if($time_day_soyz['day'] < 7 or $fidelity_soyz['time_30'] > time()){
        $_SESSION['err'] = '<font color=red>Ошибка!</font>';
        header('Location: ?');
        exit();
    }

    $newMusor = bcadd(toBC($user['musor_proc']), $where30, 6);
    $newTurnir = bcadd(toBC($soyz['turnir_musor_1']), $where30, 6);
    $timeNow = time() + 86400;

    mysql_query("UPDATE `users` SET `musor_proc` = '".$newMusor."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity_soyz` SET `time_30` = '".$timeNow."' WHERE `user` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity_soyz` SET `time_7` = '".$timeNow."' WHERE `user` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `soyz` SET `turnir_musor_1` = '".$newTurnir."' WHERE `id` = '".$soyz['id']."' LIMIT 1");

    header('Location: ?');
    exit();
}






?>