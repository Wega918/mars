<?php
// Инициализация наград в строковом формате
$nagrada1 = toBC('0');
$nagrada7 = toBC('0');
$nagrada30 = toBC('0');

// Перевод dohoda в BC-строку
$dohod_bc = toBC($dohod);

if (bccomp($time_day['day'], '7') >= 0) {
    $nagrada1 = bcmul($dohod_bc, '86400', 0);
}
if (bccomp($time_day['day'], '14') >= 0) {
    $nagrada1 = bcmul($dohod_bc, '86400', 0);
    $nagrada7 = bcmul($dohod_bc, '604800', 0);
}
if (bccomp($time_day['day'], '30') >= 0) {
    $nagrada1 = bcmul($dohod_bc, '86400', 0);
    $nagrada7 = bcmul($dohod_bc, '604800', 0);
    $nagrada30 = bcmul($dohod_bc, '4233600', 0);
}



if($time_day['day'] >= 7){
echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$time_day['day'].'</span></div><div style="display: inline;" class="fl">
<a class="left" style="display: inline-block;" ><img src="/images/biznes/room_1.jpg" alt="Войти" width="64" height="64"></a>
<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;"><div class="tdbrown">Верность Корпорации</div><div>';


if($time_day['day'] >= 7){
if($time_day['day'] >= 7 and $fidelity['time_7'] < time()){
echo ' <a class="btni" href="?nagrada1/" style="margin-top: 4px; padding: 3px 5px;">  <img src="/images/header/money_36.png" alt="Войти" width="24" height="24"> '.n_f($nagrada1).'</a><font color-red> </font>';
}else{
echo ' <span class="btni" style="margin-top: 4px; padding: 3px 5px;"> <span><span id="time_'.($fidelity['time_7']-time()).'000">'._time($fidelity['time_7']-time()).'</span></span></span>';
}
}

if($time_day['day'] >= 14){
if($time_day['day'] >= 14 and $fidelity['time_14'] < time()){
echo ' <a class="btni" href="?nagrada7/" style="margin-top: 4px; padding: 3px 5px;">  <img src="/images/header/money_36.png" alt="Войти" width="24" height="24"> '.n_f($nagrada7).'</a><font color-red> </font>';
}else{
echo ' <span class="btni" style="margin-top: 4px; padding: 3px 5px;"> <span><span id="time_'.($fidelity['time_14']-time()).'000">'._time($fidelity['time_14']-time()).'</span></span></span>';
}
}

if($time_day['day'] >= 30){
if($time_day['day'] >= 30 and $fidelity['time_30'] < time()){
echo ' <a class="btni" href="?nagrada30/" style="margin-top: 4px; padding: 3px 5px;">  <img src="/images/header/money_36.png" alt="Войти" width="24" height="24"> '.n_f($nagrada30).'</a><font color-red> </font>';
}else{
echo ' <span class="btni" style="margin-top: 4px; padding: 3px 5px;"><span><span id="time_'.($fidelity['time_30']-time()).'000">'._time($fidelity['time_30']-time()).'</span></span></span>';
}
}




echo '</div></div></div><div class="cb"></div></div>';
}




if(isset($_GET['nagrada1/'])){
    if($time_day['day'] < 7 || $fidelity['time_7'] > time()){
        header('Location: ?');
        $_SESSION['err'] = '<font color=red>Ошибка!</font>';
        exit();
    }
    // Складываем деньги с bcmath
    $new_money = bcadd(toBC($user['money']), toBC($nagrada1), 0);
    mysql_query("UPDATE `users` SET `money` = '".$new_money."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity` SET `time_7` = '".(time()+86400)."' WHERE `user` = '".$user['id']."' LIMIT 1");
    header('Location: ?');
    exit();
}

if(isset($_GET['nagrada7/'])){
    if($time_day['day'] < 7 || $fidelity['time_14'] > time()){
        header('Location: ?');
        $_SESSION['err'] = '<font color=red>Ошибка!</font>';
        exit();
    }
    $new_money = bcadd(toBC($user['money']), toBC($nagrada7), 0);
    mysql_query("UPDATE `users` SET `money` = '".$new_money."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity` SET `time_14` = '".(time()+86400)."' WHERE `user` = '".$user['id']."' LIMIT 1");
    header('Location: ?');
    exit();
}

if(isset($_GET['nagrada30/'])){
    if($time_day['day'] < 7 || $fidelity['time_30'] > time()){
        header('Location: ?');
        $_SESSION['err'] = '<font color=red>Ошибка!</font>';
        exit();
    }
    $new_money = bcadd(toBC($user['money']), toBC($nagrada30), 0);
    mysql_query("UPDATE `users` SET `money` = '".$new_money."' WHERE `id` = '".$user['id']."' LIMIT 1");
    mysql_query("UPDATE `fidelity` SET `time_30` = '".(time()+86400)."' WHERE `user` = '".$user['id']."' LIMIT 1");
    header('Location: ?');
    exit();
}










?>