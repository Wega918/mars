<?php
$title = 'Космический шлюз';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['soyz'] == 0) {
header('Location: /');
exit();
}
if($user['soyz_rang'] > 2) {
header('Location: /');
exit();
}




if($user['soyz_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/setting_name/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Название Союза</a>';
}
if($user['soyz_rang'] <= 1) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/invitation_settings/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Настройки приглашений</a>';
}
if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/soyz_settings/"><img src="/images/arrow_up2.png" width="24" height="24" alt="" title=""> Космический шлюз</a>';
}



$max_level = 1000;

if($soyz['musor_lvl']>1){

if($soyz['musor_lvl'] >= 1 && $soyz['musor_lvl'] < $max_level){
    // Цена — целое число, можно оставить как int
    $cena = round($soyz['musor_lvl'] * 190);
}

// Функция для расчета значения $procc через BCMath
function calculate_procc($musor, $musor_lvl) {
    $musor = toBC($musor);
    $musor_lvl = toBC($musor_lvl);
    $base_increase = toBC(0.00001); // 0.0001% в абсолютном виде
    $increase = bcmul($base_increase, $musor_lvl, 8); // base_increase * musor_lvl
    $procc = bcmul($musor, $increase, 8); // musor * increase
    return $procc;
}

$current_level = $soyz['musor_lvl'];
$next_level = $current_level + 1;

$current_procc = calculate_procc($soyz['musor'], $current_level);
$next_procc = calculate_procc($soyz['musor'], $next_level);

$change = bcsub($next_procc, $current_procc, 8);
$procc = $change; // Изменение при повышении уровня

if($soyz['musor_lvl'] >= 1){
    echo '<div class="bordered" style="margin-top: 4px; position: relative;">';
    echo '<div class="small tbrown" style="position:absolute; top: 0; right: 0">';
    echo '<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.$soyz['musor_lvl'].'</span>';
    echo '</div><div style="display: inline;" class="fl">';
    echo '<a class="left" style="display: inline-block;"><img src="/images/biznes/room_11.jpg" alt="Войти" width="64" height="64"></a>';
    echo '<div class="left" style="display: inline-block; vertical-align: top; padding: 4px 0 0 4px;">';
    echo '<div class="tdbrown">Космический Шлюз <font color=red>(+ '.n_f($current_procc).'%)</font></div><div>';

    if($soyz['musor_lvl'] < $max_level){
        echo '<a class="btni" href="?space_gateway_app/" style="margin-top: 4px; padding: 3px 5px;"> Повысить за <img src="/images/ruby.png" alt="Войти" width="24" height="24"> '.n_f($cena).'  <font color=red>(+ '.n_f($procc).'%)</font>  </a>';
    } else {
        echo '<a class="btni" style="margin-top: 4px; padding: 3px 5px;"> <font size=4>Максимально</font></a>';
    }

    echo '</div></div></div><div class="cb"></div></div>';
}

if(isset($_GET['space_gateway_app/'])){
    $_SESSION['err'] = 'Вы уверены, что хотите повысить уровень шлюза за <img src="/images/ruby.png" width="24" height="24"> '.n_f($cena).' ?
    <div class="mt4">
      <a class="btni accept" href="?space_gateway_app_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
      <a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a>
    </div>';
    header("Location: ?");
    exit();
}

if(isset($_GET['space_gateway_app_/'])){
    if($user['soyz_rang'] > 2){
        header('Location: ?');
        exit();
    }
    if($soyz['musor_lvl'] >= $max_level){
        $_SESSION['err'] = '<font color=red>Ошибка! Шлюз на максимальном уровне.</font>';
        header('Location: ?');
        exit();
    }
    if($soyz['rubin'] < $cena){
        $_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
        header('Location: ?');
        exit();
    }

    // Обновляем базу — musor_proc в БД должен быть строкой, поэтому переводим к float с округлением
    $new_musor_proc = bcadd(toBC($soyz['musor_proc']), $procc, 8);
    $new_musor_proc_float = round((float)$new_musor_proc, 8);

    // Если используешь mysql_query, то так:
    mysql_query("UPDATE `soyz` SET `rubin` = '".($soyz['rubin'] - $cena)."', `musor_lvl` = '".($soyz['musor_lvl'] + 1)."', `musor_proc` = '".$new_musor_proc_float."' WHERE `id` = '{$soyz['id']}' LIMIT 1");

    header('Location: ?');
    exit();
}













}else{




echo '<div class="bordered" style="margin-top: 4px; position: relative;"><div class="small tbrown" style="position:absolute; top: 0; right: 0">
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center">'.n_f($soyz['musor_lvl']).'</span></div><div style="display: inline;" class="fl">';
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
if($user['soyz_rang'] > 2){
header('Location: ?');
exit();
}
if($soyz['rubin'] < 700){
header('Location: ?');
$_SESSION['err'] = '<font color=red>Ошибка! Нехватает рубинов!</font>';
exit();
}
mysql_query("UPDATE `soyz` SET `rubin` = '".($soyz['rubin']-700)."', `musor_lvl` = '".($soyz['musor_lvl']+1)."', `musor_proc` = '".($soyz['musor_proc']+30)."'    WHERE `id` = '$soyz[id]' LIMIT 1");
$text = ' <font color=lightgreen>'.nick($user['id']).'</font> - <font color=IndianRed>Построил(а) Космический Шлюз</font><i>';
mysql_query("INSERT INTO `history_soyz` SET `soyz` = '".$user['soyz']."', `text` = '$text', `time` = '".time()."'");
header('Location: ?');
exit();
}

}






















if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/building/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Постройки Союза</a>';
}
if($user['soyz_rang'] <= 2) {
echo '<a class="btnl mt4" href="'.$HOME.'soyz/buying_seats/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Покупка мест</a>';
}

echo '<a class="btnl mt4" href="'.$HOME.'soyz/ad/"><img src="/images/arrow_down2.png" width="24" height="24" alt="" title=""> Объявления</a>';
echo '<a class="btnl mt4" href="'.$HOME.'soyz/'.$user['soyz'].'/"><img src="/images/soyz2.png" width="24" height="24" alt="" title=""> Вернуться</a>';




require_once ('../system/footer.php');
?>