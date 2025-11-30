<?php
$title = 'Космический шлюз';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['corp'] == 0) {
header('Location: /');
exit();
}
if($user['corp_rang'] > 2) {
header('Location: /');
exit();
}




if($user['corp_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/setting_name/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Название Корпорации</a>';
}
if($user['corp_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/invitation_settings/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Настройки приглашений</a>';
}
if($user['corp_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/corp_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Космический шлюз</a>';
}



$max_level = 1000;




if($corp['musor_lvl']>1){


function bcround($number, $precision = 0) {
    $precision = (int)$precision;
    $factor = bcpow('10', $precision + 1);
    $temp = bcmul($number, $factor);
    $digit = (int)bcmod($temp, '10');
    $temp = bcdiv($temp, '10', 0);
    if ($digit >= 5) {
        $temp = bcadd($temp, '1');
    }
    return bcdiv($temp, bcpow('10', $precision), $precision);
}



if (bccomp(toBC($corp['musor_lvl']), '1') >= 0 && bccomp(toBC($corp['musor_lvl']), toBC($max_level)) == -1) {
    $cena = bcround(bcmul(toBC($corp['musor_lvl']), '190'), 0);
}

// Уровни
$current_level = toBC($corp['musor_lvl']);
$next_level = bcadd($current_level, '1');

// Функция прироста %
function calculate_procc($musor, $musor_lvl) {
    $base_increase = toBC('0.00001'); // 0.0001%
    return bcmul(toBC($musor), bcmul($base_increase, toBC($musor_lvl), 20), 20);
}

// Расчёт текущего и следующего прироста
$current_procc = calculate_procc($soyz['musor'], $current_level);
$next_procc = calculate_procc($soyz['musor'], $next_level);
$procc = bcsub($next_procc, $current_procc, 20);

// Отображение блока
if (bccomp($current_level, '1') >= 0) {
    echo '<div class="bordered" style="margin-top: 4px; position: relative;">
    <div class="small tbrown" style="position:absolute; top: 0; right: 0">
    <span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">' . $corp['musor_lvl'] . '</span></div>
    <div style="display: inline;" class="fl">
    <a class="left" style="display: inline-block;"><img src="/images/biznes/room_11.jpg" alt="Войти" width="64" height="64"></a>
    <div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;">
    <div class="tdbrown">Космический Шлюз <font color=red>(+ ' . n_f($current_procc) . '%)</font></div><div>';

    if (bccomp($current_level, toBC($max_level)) == -1) {
        echo '<a class="btni" href="?space_gateway_app/" style="margin-top: 4px; padding: 3px 5px;"> Повысить за 
        <img src="/images/ruby.png" alt="Войти" width="24" height="24"> ' . n_f($cena) . '  
        <font color=red>(+ ' . n_f($procc) . '%)</font></a>';
    } else {
        echo '<a class="btni" style="margin-top: 4px; padding: 3px 5px;"><font size=4>Максимально</font></a>';
    }

    echo '</div></div></div><div class="cb"></div></div>';
}

// Подтверждение действия
if (isset($_GET['space_gateway_app/'])) {
    if ($user['soyz'] <= 0) {
        $_SESSION['err'] = 'Необходимо вступить в союз.';
        header('Location: ?');
        exit();
    }

    $_SESSION['err'] = 'Вы уверены, что хотите повысить уровень шлюза за <img src="/images/ruby.png" width="24" height="24"> ' . n_f($cena) . ' ?
    <div class="mt4"><a class="btni accept" href="?space_gateway_app_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
    <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
    header("Location: ?");
    exit();
}

// Выполнение повышения уровня
if (isset($_GET['space_gateway_app_/'])) {
    if ($user['soyz'] <= 0) {
        $_SESSION['err'] = 'Необходимо вступить в союз.';
        header('Location: ?');
        exit();
    }
    if ($user['corp_rang'] > 2) {
        header('Location: ?');
        exit();
    }
    if (bccomp(toBC($corp['musor_lvl']), toBC($max_level)) >= 0) {
        $_SESSION['err'] = '<font color=red>Ошибка! Шлюз на максимальном уровне.</font>';
        header('Location: ?');
        exit();
    }
    if (bccomp(toBC($corp['rubin']), $cena) == -1) {
        $_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
        header('Location: ?');
        exit();
    }

    $new_rubin = bcsub(toBC($corp['rubin']), $cena, 0);
    $new_level = bcadd(toBC($corp['musor_lvl']), '1', 0);
    $new_proc = bcadd(toBC($corp['musor_proc']), $procc, 20);

    mysql_query("UPDATE `corp` SET `rubin` = '$new_rubin', `musor_lvl` = '$new_level', `musor_proc` = '$new_proc' WHERE `id` = '{$corp['id']}' LIMIT 1");
    header('Location: ?');
    exit();
}














}else{




echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.n_f($corp['musor_lvl']).'</span></div><div style="display: inline;" class="fl">';
echo '<a class="left" style="display: inline-block;"><img src="/images/biznes/room_11.jpg" alt="Войти" width="64" height="64"></a>';
echo '<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;"><div class="tdbrown">Космический Шлюз </div><div>';

echo '<a class="btni" href="?gateway_app/" style="margin-top: 4px; padding: 3px 5px;"> Построить за <img src="/images/ruby.png" alt="Войти" width="24" height="24"> 700    </a>';

echo '</div></div></div><div class="cb"></div></div>';




if(isset($_GET['gateway_app/'])){
$_SESSION['err'] = 'Вы уверены, что хотите построить Космический Шлюз <img src="/images/ruby.png" width="24" height="24"> 700 ?
<div class="mt4"><a class="btni accept" href="?gateway_app_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['gateway_app_/'])){
if($user['corp_rang'] > 2){
header('Location: ?');
exit();
}
if($corp['rubin'] < 700){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']-700)."', `musor_lvl` = '".($corp['musor_lvl']+1)."', `musor_proc` = '".($corp['musor_proc']+30)."'    WHERE `id` = '$corp[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Построил(а) Космический Шлюз</font><i>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
header('Location: ?');
exit();
}

}






















if($user['corp_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/building/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Постройки Корпорации</a>';
}
if($user['corp_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'corp/buying_seats/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}

echo '<a class="btnl mt4" href="'.$HOME.'corp/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'corp/'.$user['corp'].'"><img src="/images/corp2.png" width="24" height="24" alt="" title=""> В корпорацию</a>';




require_once ('../system/footer.php');
?>