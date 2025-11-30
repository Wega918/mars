<?php
$start_time = microtime(true); // Засекаем время


if($user['id'] == 1){
//mysql_query('DELETE FROM `corporate_card` WHERE `xxx` <= "1" ');
//mysql_query('DELETE FROM `ref` WHERE `ank` >= "83176" ');
//mysql_query('DELETE FROM `pm_msg` WHERE `ank` = "1" and `user` = "2" ');
//mysql_query('DELETE FROM `user_avatars` WHERE `user` >= "83176" ');

}







$Ignore = mysql_fetch_assoc(mysql_query('SELECT * FROM `Ignore` WHERE `user` = "'.$user['id'].'"'));
$ban = mysql_fetch_assoc(mysql_query('SELECT * FROM `ban` WHERE `user` = "'.$user['id'].'"'));
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// игнор
if($Ignore and $Ignore['time_end'] < time()){
mysql_query("UPDATE `users` SET `colors` = '' WHERE `id` = '".$Ignore['user']."' limit 1");
mysql_query('DELETE FROM `Ignore` WHERE `id` = '.$Ignore['id'].' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Бан
if($ban and $ban['time_end'] < time()){
mysql_query("UPDATE `users` SET `colors` = '' WHERE `id` = '".$ban['user']."' limit 1");
mysql_query('DELETE FROM `ban` WHERE `id` = '.$ban['id'].' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_SERVER['PHP_SELF'] != '/ban.php') {
if($ban['time_end'] > time()){
header('Location: '.$HOME.'ban.php');
}
}


$mission_chest = mysql_fetch_assoc(mysql_query('SELECT * FROM `mission_chest` WHERE `user` = "'.$user['id'].'"'));
if(!$mission_chest){
mysql_query("INSERT INTO `mission_chest` SET `user` = '".$user['id']."' ");
}
if($mission_chest['rand_rock'] == 0){
$rand_rock = rand(1,7);
mysql_query("UPDATE `mission_chest` SET `rand_rock` = '".$rand_rock."' WHERE `id` = '".$mission_chest['id']."' ");
}





$id = abs(intval($_GET['id']));
$biznes = mysql_fetch_assoc(mysql_query('SELECT * FROM `biznes` WHERE `id` = "'.($user['biznes']+1).'"'));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."'"));
$Invitations = mysql_fetch_assoc(mysql_query('SELECT * FROM `Invitations` WHERE `ank_user` = "'.$ank['id'].'"'));
$Invitations_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `Invitations_soyz` WHERE `ank_user` = "'.$ank['id'].'"'));
$garbage_time_ = mysql_fetch_assoc(mysql_query('SELECT * FROM `garbage_time` WHERE `user` = "'.$user['id'].'" '));
$musor_time = mysql_fetch_assoc(mysql_query('SELECT * FROM `musor_time` WHERE `user` = "'.$user['id'].'"'));
$musor_time_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `musor_time_soyz` WHERE `user` = "'.$user['id'].'"'));
$application = mysql_fetch_assoc(mysql_query('SELECT * FROM `application` WHERE `user` = "'.$user['id'].'"'));
$application_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `application_soyz` WHERE `user` = "'.$user['id'].'"'));
$corp = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$user['corp']."'"));
$soyz = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$user['soyz']."'"));
$ankcorp = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$ank['corp']."'"));
$anksoyz = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$ank['soyz']."'"));
$promotions = mysql_fetch_assoc(mysql_query("SELECT * FROM `promotions` WHERE `id` = '1' "));
$premium = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium` WHERE `user` = '".$user['id']."' "));
$premium_musor = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium_musor` WHERE `user` = '".$user['id']."' "));
$safe = mysql_fetch_assoc(mysql_query("SELECT * FROM `safe` WHERE `user` = '".$user['id']."' "));
$expedition_user = mysql_fetch_assoc(mysql_query("SELECT * FROM `expedition_user` WHERE `user` = '".$user['id']."' or `pom_1`  = '".$user['id']."'  or `pom_2`  = '".$user['id']."'  or `pom_3`  = '".$user['id']."'  or `pom_4`  = '".$user['id']."'  or `pom_5`  = '".$user['id']."'  "));
$expedition_inv = mysql_fetch_assoc(mysql_query('SELECT * FROM `expedition_inv` WHERE `user` = "'.$user['id'].'"'));
 

 
 

global $VIP_1, $VIP_2, $VIP_3, $VIP_4;

// Запрос для получения данных из таблицы `VIP`
$query = "SELECT * FROM `VIP` WHERE `user` = '".$user['id']."' AND `VIP` IN (1, 2, 3, 4)";
$result = mysql_query($query);

// Проверяем успешность запроса
if ($result) {
    // Обрабатываем результат
    while ($row = mysql_fetch_assoc($result)) {
        // Динамически присваиваем значения глобальным переменным
        ${'VIP_' . $row['VIP']} = $row;
    }

    // Освобождаем результат
    mysql_free_result($result);
} else {
    echo "Ошибка выполнения запроса: ".mysql_error();
}


global $mission_user_1, $mission_user_2, $mission_user_3, $mission_user_4, $mission_user_5,
       $mission_user_6, $mission_user_7, $mission_user_8, $mission_user_9, $mission_user_10,
       $mission_user_11, $mission_user_12, $mission_user_13, $mission_user_14, $mission_user_15,
       $mission_user_16, $mission_user_17, $mission_user_18, $mission_user_19, $mission_user_20,
       $mission_user_21, $mission_user_22, $mission_user_23, $mission_user_24, $mission_user_25,
       $mission_user_26, $mission_user_27, $mission_user_28, $mission_user_29, $mission_user_30,
       $mission_user_31, $mission_user_32, $mission_user_33, $mission_user_34, $mission_user_35;

// Запрос для получения данных из таблицы `mission_user`
$query = "SELECT * FROM `mission_user` WHERE `user` = '".$user['id']."' AND `number` IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35)";
$result = mysql_query($query);

// Проверяем успешность запроса
if ($result) {
    // Обрабатываем результат
    while ($row = mysql_fetch_assoc($result)) {
        // Динамически присваиваем значения глобальным переменным
        ${'mission_user_' . $row['number']} = $row;
    }

    // Освобождаем результат
    mysql_free_result($result);
} else {
    echo "Ошибка выполнения запроса: ".mysql_error();
}




global $Achievements_user_1, $Achievements_user_2, $Achievements_user_3, $Achievements_user_4, $Achievements_user_5,
       $Achievements_user_6, $Achievements_user_7, $Achievements_user_8, $Achievements_user_9, $Achievements_user_10,
       $Achievements_user_11, $Achievements_user_12, $Achievements_user_13, $Achievements_user_14, $Achievements_user_15,
       $Achievements_user_16, $Achievements_user_17, $Achievements_user_18, $Achievements_user_19, $Achievements_user_20,
       $Achievements_user_21, $Achievements_user_22, $Achievements_user_23, $Achievements_user_24, $Achievements_user_25,
       $Achievements_user_26, $Achievements_user_27, $Achievements_user_28, $Achievements_user_29, $Achievements_user_30,
       $Achievements_user_31, $Achievements_user_32, $Achievements_user_33, $Achievements_user_34;

// Запрос для получения данных из таблицы `Achievements_user`
$query = "SELECT * FROM `Achievements_user` WHERE `user` = '".$user['id']."' AND `number` IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34)";
$result = mysql_query($query);

// Проверяем успешность запроса
if ($result) {
    // Обрабатываем результат
    while ($row = mysql_fetch_assoc($result)) {
        // Динамически присваиваем значения глобальным переменным
        ${'Achievements_user_' . $row['number']} = $row;
    }

    // Освобождаем результат
    mysql_free_result($result);
} else {
    echo "Ошибка выполнения запроса: ".mysql_error();
}




$dfdfds = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements` WHERE `id` "),0);
$dsdsd = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `done` = '1' "),0);
$ank_dsdsd = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '".$ank['id']."' and `done` = '1' "),0);
$bbbbbonnn = 100*($dsdsd/4);
$bbbbbonnnank = 100*($ank_dsdsd/4);
$bon_achivements = $dsdsd*$bbbbbonnn;
$ank_bon_achivements = $ank_dsdsd*$bbbbbonnnank;



$testangel = mysql_query('SELECT * FROM `users`WHERE `premium` = "0" ORDER BY  DESC LIMIT 1  ');
$testangel = mysql_fetch_assoc($testangel); // бот который выбран у меня как цель

$us_cp_prem = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `corp` = '".$user['corp']."' and `premium` > '0' "),0);
if($user['prestig_mnogit'] == 0){
$prestig_mnogit = 1;
}else{
$prestig_mnogit = $user['prestig_mnogit'];
}
$ass_adm = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass_adm` "),0);
$kol_us_chests = mysql_result(mysql_query("SELECT COUNT(*) FROM `chests` WHERE `user` = '".$user['id']."'"),0);
if($garbage_time_['time'] < time() 
or $user['mine_time_1'] < time()
or $user['bilet'] < 10
or $user['prestig_time'] < time() 
or $user['time_boy'] < time()
or $expedition_user['time'] < time() and $user['time_expedition'] < time()
or $kol_us_chests > 0
or $expedition_user['level_'] == 1 and $expedition_user['time'] < time()
or $expedition_user['level_'] == 2 and $expedition_user['time'] < time()
or $expedition_user['level_'] == 3 and $expedition_user['time'] < time()
or !$VIP_1 or !$VIP_2 or !$VIP_3 or !$VIP_4
){
$notifikations = '<font color=red size=3>(+)</font>';
}

$ass_adm = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass_adm` "),0);
if($ass_adm > $user['ass_adm']){
$admchat = '<font color=red>(+)</font>';
}

/* 
if($user['time_boy'] < time() and $user['time_boy'] != 0){
mysql_query("UPDATE `users` SET `time_boy` = '0', `mnogit_boy` = '0' WHERE `id` = '".$user['id']."' LIMIT 1");
}
 */




if($user['gragdanstvo'] == 1){$mnogitel = 1;}
if($user['gragdanstvo'] == 2){$mnogitel = 2;}
if($user['gragdanstvo'] == 3){$mnogitel = 8;}
if($user['gragdanstvo'] == 4){$mnogitel = 80;}
if($user['gragdanstvo'] == 5){$mnogitel = 160;}
if($user['gragdanstvo'] == 6){$mnogitel = 320;}
if($user['gragdanstvo'] == 7){$mnogitel = 640;}
if($user['gragdanstvo'] == 8){$mnogitel = 1280;}
if($user['gragdanstvo'] == 9){$mnogitel = 2560;}
if($user['gragdanstvo'] == 10){$mnogitel = 5120;}
if($user['gragdanstvo'] == 11){$mnogitel = 10240;}
if($user['gragdanstvo'] == 12){$mnogitel = 20480;}
if($user['gragdanstvo'] == 13){$mnogitel = 40960;}
if($user['gragdanstvo'] == 14){$mnogitel = 81920;}
if($user['gragdanstvo'] == 15){$mnogitel = 163840;}
if($user['gragdanstvo'] == 16){$mnogitel = 327680;}
if($user['gragdanstvo'] == 17){$mnogitel = 655360;}
if($user['gragdanstvo'] == 18){$mnogitel = 1310720;}
if($user['gragdanstvo'] == 19){$mnogitel = 2621440;}
if($user['gragdanstvo'] == 20){$mnogitel = 5242880;}
if($user['gragdanstvo'] == 21){$mnogitel = 10485760;}
if($user['gragdanstvo'] == 22){$mnogitel = 20971520;}
if($user['gragdanstvo'] == 23){$mnogitel = 41943040;}
if($user['gragdanstvo'] == 24){$mnogitel = 83886080;}

if($user['prestig_mnogit'] == 0){$prestig_mnogit = 1;}else{$prestig_mnogit = $user['prestig_mnogit'] ;}
if($user['mnogit_boy'] > 0){$mnogit_b = $user['mnogit_boy'];}else{$mnogit_b = 1;}
$dohod_mnogit = $mnogit_b;
$dohod_m = ($prestig_mnogit*$mnogit_b*$mnogitel*$user['dohod_x2_']);
//
if($user['time_boy'] < time() and $user['boy'] != 0) { // снимаем активированные множители
mysql_query("UPDATE `users` SET `boy` = '".($user['boy'] = 0 )."', `time_boy` = '".($user['time_boy'] = 0 )."', `dohod_mnogit` = '".($user['dohod_mnogit'] = $dohod_m )."', `mnogit_boy` = '".($user['mnogit_boy'] = 0)."' WHERE `id` = '".$user['id']."' ");
}
if($user['dohod_mnogit'] != $dohod_m ){
mysql_query("UPDATE `users` SET `dohod_mnogit` = '".($user['dohod_mnogit'] = $dohod_m)."' WHERE `id` = '".$user['id']."' ");
}

if($user['dohod_mnogit']<=0){
mysql_query("UPDATE `users` SET `dohod_mnogit` = '1' WHERE `id` = '".$user['id']."' ");
}


$bot = mysql_fetch_assoc(mysql_query("SELECT * FROM `bot` WHERE `user` = '".$user['id']."' "));
if($bot['time'] < time() and $bot['time'] > 0){
mysql_query('DELETE FROM `bot` WHERE `user` = "'.$user['id'].'" ');
}




 // убераем призовые места в кп и союз
if($corp['mesta_turnir_time'] <= time() and $corp['mesta_turnir'] > 0 ){
mysql_query("UPDATE `corp` SET `mesta` = '".($corp['mesta']-$corp['mesta_turnir'])."', `mesta_turnir_time` = '0', `mesta_turnir` = '0' WHERE `id` = '".$corp['id']."' LIMIT 1");
}
if($soyz['mesta_turnir_time'] <= time() and $soyz['mesta_turnir'] > 0 ){
mysql_query("UPDATE `soyz` SET `mesta` = '".($soyz['mesta']-$soyz['mesta_turnir'])."', `mesta_turnir_time` = '0', `mesta_turnir` = '0' WHERE `id` = '".$soyz['id']."' LIMIT 1");
}




$pve_user_koll = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' "),0);
$pve_bot_koll = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' "),0);
if($pve_user_koll <= 0){
$pve_user_koll = 0;
}
if($pve_bot_koll <= 0){
$pve_bot_koll = 0;
}

$pve_user_koll1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `id` "),0);
$pve_bot_koll1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `id` "),0);


$where_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `id` "),0);
$where_bot = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `id` "),0);

$bot_vigilo = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' "),0);
$user_vigilo = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' "),0);


// Определяем глобальные переменные
global $pve0, $pve1, $pve2, $pve3, $pve4, $pve5, $pve6, $pve7, $pve8;

// Запрос для получения данных из таблицы `pve`
$query = "SELECT * FROM `pve` WHERE `act` IN (0, 1, 2, 3, 4, 5, 6, 7, 8)";
$result = mysql_query($query);

// Проверяем успешность запроса
if ($result) {
    // Обрабатываем результат
    while ($row = mysql_fetch_assoc($result)) {
        // Динамически присваиваем значения глобальным переменным
        ${'pve' . $row['act']} = $row;
    }
    // Освобождаем результат
    mysql_free_result($result);
} else {
    echo "Ошибка выполнения запроса: ".mysql_error();
}




///////////////////////////////////////////////////////     ферма     ///////////////////////////////////////////////////////
$garden_plant_user_active = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user_active` WHERE `user` = '".$user['id']."' "));
$p_g_u = mysql_result(mysql_query("SELECT SUM(angel_proc) FROM garden_user WHERE `user`  = '".$user['id']."' ;"), 0); // сумма процента к ангелам


$coll_garden_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_user` WHERE `user`  = '".$user['id']."' "),0);
$coll_garden_plant_user = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user`  = '".$user['id']."' "),0);
if($coll_garden_plant_user >= 1){
$max_coll_en = (100+($coll_garden_plant_user * 20));
}
if($user['en_max'] != $max_coll_en){
mysql_query("UPDATE `users` SET `en_max` = '".$max_coll_en."' WHERE `id` = '".$user['id']."' limit 1");
}
if($user['en'] > $user['en_max']){
mysql_query("UPDATE `users` SET `en` = '".$user['en_max']."' WHERE `id` = '".$user['id']."' limit 1");
}
if($user['en'] < 0){
mysql_query("UPDATE `users` SET `en` = '0' WHERE `id` = '".$user['id']."' limit 1");
}
if($user['en'] < $user['en_max']){

if(ceil(time()-$user['en_time']) >= 240 && ceil(time()-$user['en_time']) < 480){
if($user['en'] < $user['en_max'] and $user['en_time'] <= time()){
mysql_query("UPDATE `users` SET `en_time` = '".(time()+240)."', `en` = '".($user['en']+1)."' WHERE `id` = '".$user['id']."' limit 1");
}
}else{
$en_time = ceil((time()-$user['en_time'])/240);
if($user['en'] < $user['en_max'] and $user['en_time'] <= time()){
mysql_query("UPDATE `users` SET `en_time` = '".(time()+240)."', `en` = '".($user['en']+$en_time)."' WHERE `id` = '".$user['id']."' limit 1");
}
}
}



$summ_procccd = "SELECT * FROM `garden_user` WHERE `user` = ".$user['id']." ORDER BY `images` desc "; 
$summ_proccc = mysql_fetch_assoc(mysql_query($summ_procccd));

$garden_plant_user = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_plant_user` WHERE `user`  = '".$user['id']."' ")); // грядки игрока
$garden_user = mysql_fetch_assoc(mysql_query("SELECT * FROM `garden_user` WHERE `user`  = '".$user['id']."' ")); // растения игрока
if(!$garden_plant_user){ // создаем первую грядку игроку
mysql_query("INSERT INTO `garden_plant_user` SET `user` = '".$user['id']."' ");
}
if(!$garden_user){ // создаем первое растение игроку
mysql_query("INSERT INTO `garden_user` SET  `user` = '".$user['id']."',  `name` = 'Укроп',  `harvest` = '2',  `time` = '60',  `angel_proc` = '5',  `cost` = '10',  `images` = '1' ");
}


if($user['rubin'] < $user['management_cost']){
mysql_query("UPDATE `users` SET `management` = '0' WHERE `id` = '".$user['id']."' limit 1");
}
///////////////////////////////////////////////////////     ферма     ///////////////////////////////////////////////////////







if($user['money'] <= 0){
mysql_query("UPDATE `users` SET `money` = '2' WHERE `id` = '".$user['id']."' LIMIT 1");
}

if($user['mine_time_1'] >= (time()+86400) ){
if($user['mine'] <= 1 ){$rand_time = 14400;}else{$rand_time = 14400- ($user['mine']*100);}
mysql_query("UPDATE `users` SET `mine_time_1` = '".($user['mine_time_1']= (time()+$rand_time) )."', `mine_time` = '".($user['mine_time']=0)."', `mine_vip` = '0'  WHERE `id` = '".$user['id']."' LIMIT 1");
if($mission_user_1['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog_` = '".($mission_user_1['prog_']+1)."' WHERE `id` = '".$mission_user_1['id']."' ");
}
if($Achievements_user_1['prog'] < $Achievements_user_1['prog_max']) {
mysql_query("UPDATE `Achievements_user` SET `prog` = '".($Achievements_user_1['prog']+1)."' WHERE `id` = '".$Achievements_user_1['id']."' ");
}
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



function bc_calc($a, $b, $operation, $scale = 10) {
    $a = toBC($a);
    $b = toBC($b);
    switch ($operation) {
        case 'mul': return bcmul($a, $b, $scale);
        case 'div': return bcdiv($a, $b, $scale);
        case 'add': return bcadd($a, $b, $scale);
        case 'sub': return bcsub($a, $b, $scale);
        default: return '0';
    }
}

/* 
echo '<div class="container">';
$q['cena'] = 20;
echo "Before toBC: "; var_dump($q['cena']);
echo "After toBC: "; var_dump(toBC($q['cena']));

echo '</div>'; */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($user['angel'] > 0){
    if ($ank['corp'] > 0 && $ank['soyz'] > 0) {
        $base = bcmul(toBC($ank['dohod']), bcdiv(toBC($anksoyz['musor']), '100', 10), 10);
        $multiplied = bcmul($base, toBC($ank['dohod_mnogit']), 10);
        $with_angel = bcmul($multiplied, toBC($ankcorp['angel']), 10);
        $ank_dohod_user = bcmul($with_angel, toBC($ank['pumping']), 10);
    } else {
        $base = bcmul(toBC($ank['dohod']), bcdiv(toBC($ank['musor_proc']), '100', 10), 10);
        $multiplied = bcmul($base, toBC($ank['dohod_mnogit']), 10);
        $with_angel = bcmul($multiplied, toBC($ank['angel']), 10);
        $ank_dohod_user = bcmul($with_angel, toBC($ank['pumping']), 10);
    }
} else {
    if ($ank['corp'] > 0 && $ank['soyz'] > 0) {
        $base = bcmul(toBC($ank['dohod']), bcdiv(toBC($anksoyz['musor']), '100', 10), 10);
        $multiplied = bcmul($base, toBC($ank['dohod_mnogit']), 10);
        $with_angel = bcmul($multiplied, toBC($ankcorp['angel']), 10);
        $ank_dohod_user = bcmul($with_angel, toBC($ank['pumping']), 10);
    } else {
        $base = bcmul(toBC($ank['dohod']), bcdiv(toBC($ank['musor_proc']), '100', 10), 10);
        $multiplied = bcmul($base, toBC($ank['dohod_mnogit']), 10);
        $ank_dohod_user = bcmul($multiplied, toBC($ank['pumping']), 10);
    }
}





$ank_VIP_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `VIP` WHERE `user`  = '".$ank['id']."' and `VIP`  = '2' "));
if (bccomp(toBC($ankcorp['building']), '0') === 0) {
    if ($ank_VIP_2['on'] == 1) {
        $bonus = bcdiv(bcmul(toBC($ank_dohod_user), toBC(bcadd('25', $ank_bon_achivements))),'100',10);
        $ank_dohod = bcadd(toBC($ank_dohod_user), $bonus, 10);
    } else {
        $bonus = bcdiv(bcmul(toBC($ank_dohod_user), toBC(bcadd('1', $ank_bon_achivements))),'100',10);
        $ank_dohod = bcadd(toBC($ank_dohod_user), $bonus, 10);
    }
} else {
    if ($ank_VIP_2['on'] >= 1) {
        $total_bonus = bcadd(bcadd('25', $ank_bon_achivements), $ankcorp['building']);
        $bonus = bcdiv(bcmul(toBC($ank_dohod_user), toBC($total_bonus)), '100', 10);
        $ank_dohod = bcadd(toBC($ank_dohod_user), $bonus, 10);
    } else {
        $total_bonus = bcadd($ankcorp['building'], $ank_bon_achivements);
        $bonus = bcdiv(bcmul(toBC($ank_dohod_user), toBC($total_bonus)), '100', 10);
        $ank_dohod = bcadd(toBC($ank_dohod_user), $bonus, 10);
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($user['angel'] > 0){
    if ($user['corp'] > 0 && $user['soyz'] > 0) {
        $dohod_user = bcmul(bcmul(bcmul(bcmul(toBC($user['dohod']), bcdiv(toBC($soyz['musor']), '100', 10)), toBC($user['dohod_mnogit'])), toBC($corp['angel'])), toBC($user['pumping']));
    } else {
        $dohod_user = bcmul(bcmul(bcmul(bcmul(toBC($user['dohod']), bcdiv(toBC($user['musor_proc']), '100', 10)), toBC($user['dohod_mnogit'])), toBC($user['angel'])), toBC($user['pumping']));
    }
} else {
    if ($user['corp'] > 0 && $user['soyz'] > 0) {
        $bonus = bcadd(toBC($soyz['musor']), toBC($user['musor_proc']));
        $dohod_user = bcmul(bcmul(bcmul(bcmul(toBC($user['dohod']), bcdiv($bonus, '100', 10)), toBC($user['dohod_mnogit'])), toBC($corp['angel'])), toBC($user['pumping']));
    } else {
        $dohod_user = bcmul(bcmul(bcmul(toBC($user['dohod']), bcdiv(toBC($user['musor_proc']), '100', 10)), toBC($user['dohod_mnogit'])), toBC($user['pumping']));
    }
}





if (bccomp(toBC($corp['building']), '0') == 0) {
    if ($VIP_2['on'] >= 1) {
        $bonus = bcadd('25', toBC($bon_achivements));
    } else {
        $bonus = bcadd('1', toBC($bon_achivements));
    }
} else {
    if ($VIP_2['on'] >= 1) {
        $bonus = bcadd(bcadd('25', toBC($bon_achivements)), toBC($corp['building']));
    } else {
        $bonus = bcadd(toBC($corp['building']), toBC($bon_achivements));
    }
}
$dohod = bcadd(toBC($dohod_user), bcdiv(bcmul(toBC($dohod_user), $bonus), '100', 10));

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* $bonus = bc_calc(bc_calc($dohod_user, $bonus_percent, 'mul'), '100', 'div');
$dohod = bc_calc($dohod_user, $bonus, 'add');
  */




















/* 

$initialBalance = toBC($user['zarabotanie_angel']); // Начальный баланс

$game_day = ($sql['game_day']);
// Делим на 1e9
$qqq_base = bcdiv($dohod, '1000000000', 0);

// Шаг 1: вычисление приближённого log10 большого числа
function bc_log10_manual($num) {
    $len = strlen($num);
    $first_digits = substr($num, 0, 10);
    $mantissa = (float)('0.' . $first_digits);
    $log10_est = log10($mantissa) + $len;
    return $log10_est;
}
// Шаг 2: sqrt через log10
function bc_sqrt_big_manual($num) {
    $log10 = bc_log10_manual($num);
    $sqrt_log10 = $log10 / 2;
    $sqrt_val = bcpow('10', $sqrt_log10, 20); // точность 20 знаков
    return $sqrt_val;
}
// Шаг 3: расчет
$qqq_sqrt = bc_sqrt_big_manual($qqq_base);
$qqq = ($qqq_sqrt);
// Квадрат дня
$game_day2 = bcmul($game_day, $game_day);
// Финальный расчёт
$initialEarningRate = bcdiv(bcmul($qqq, '100'), $game_day2, 20);




$timeSinceReset = time() - ($user['time_zbros']/10000000); // Время, прошедшее с момента обнуления баланса

$timeIntervals = [
    ['interval' => 'Сейчас', 'rateDecrease' => 0],
    ['interval' => 'Через (1 мин.)', 'rateDecrease' => 0],
    ['interval' => 'Через (5 мин.)', 'rateDecrease' => 0],
    ['interval' => 'Через (10 мин.)', 'rateDecrease' => 0],
    ['interval' => 'Через (30 мин.)', 'rateDecrease' => 0],
    ['interval' => 'Через (1 час)', 'rateDecrease' => 0],
    ['interval' => 'Через (2 часа)', 'rateDecrease' => 0],
    ['interval' => 'Через (6 часов)', 'rateDecrease' => 0],
    ['interval' => 'Через (12 часов)', 'rateDecrease' => 0],
    ['interval' => 'Через (24 часа)', 'rateDecrease' => 0],
    ['interval' => 'Через (48 часов)', 'rateDecrease' => 0]
];


$intervals = array_column($timeIntervals, 'interval');
$rateDecreases = array_column($timeIntervals, 'rateDecrease');

$results = calculateFundsByTime($initialBalance, $initialEarningRate, $intervals, $rateDecreases, $timeSinceReset);

$updatedEarningRate = calculateEarningRate($initialEarningRate, $timeSinceReset, end($rateDecreases));


function getElapsedTime($interval) {
    switch ($interval) {
        case 'Сейчас':
            return 0; // Прошло 0 секунд
        case 'Через (1 мин.)':
            return 60; // Прошла 1 минута (60 секунд)
        case 'Через (5 мин.)':
            return 5 * 60; // Прошло 5 минут (300 секунд)
        case 'Через (10 мин.)':
            return 10 * 60; // Прошло 10 минут (600 секунд)
        case 'Через (30 мин.)':
            return 30 * 60; // Прошло 30 минут (1800 секунд)
        case 'Через (1 час)':
            return 60 * 60; // Прошел 1 час (3600 секунд)
        case 'Через (2 часа)':
            return 2 * 60 * 60; // Прошло 2 часа (7200 секунд)
        case 'Через (6 часов)':
            return 6 * 60 * 60; // Прошло 6 часов (21600 секунд)
        case 'Через (12 часов)':
            return 12 * 60 * 60; // Прошло 12 часов (43200 секунд)
        case 'Через (24 часа)':
            return 24 * 60 * 60; // Прошло 24 часа (86400 секунд)
        case 'Через (48 часов)':
            return 48 * 60 * 60; // Прошло 48 часов (172800 секунд)
        default:
            return 0;
    }
}

function calculateFundsByTime($initialBalance, $initialEarningRate, $intervals, $rateDecreases, $timeSinceReset) {
    $result = [];
    $earningRate = $initialEarningRate;
    $balance = $initialBalance;

    foreach ($intervals as $index => $interval) {
        $elapsedTime = getElapsedTime($interval);
        $earnedAmount = $earningRate * $elapsedTime;
        $balance += $earnedAmount;
        $result[$interval] = $balance;
        $earningRate = calculateEarningRate($earningRate, $elapsedTime, $rateDecreases[$index]);
    }

    $result['updatedEarningRate'] = $earningRate; // Сохранение обновленного значения прибыли в секунду

    return $result;
}

function calculateEarningRate($initialEarningRate, $timeElapsed, $rateDecrease) {
    global $initialEarningRate; // Объявление глобальной переменной
    $earningRate = $initialEarningRate;

    if ($timeElapsed >= $rateDecrease) {
        $earningRate *= (1 - $rateDecrease);
    }

    return $earningRate;
}

 */
/* echo '<div class="overlay">';
echo ''.n_f($initialEarningRate).' ';
echo '</div>';

 */


/* 

if (bccomp((string)($user['last_update'] +4), (string)time()) < 0) {
$scale = 20;
// Финальный расчёт
$i1 = $initialEarningRate;


    // 5. Визит и обновление времени
    if ($user['offline'] == 1) {
        $viz = $user['viz'];
        $last_update = $user['last_update'];
    } else {
        $viz = time();
        $last_update = time();
    }

    // 6. Промо-акция и VIP
    if ($promotions['promotion_10'] == 1) {
        if ($VIP_1['on'] == 1) {
            $bonus25 = bcdiv(bcmul($i1, '25', $scale), '100', $scale);
            $temp_i = bcadd($i1, $bonus25, $scale);
            $qqqqqq = bcadd(bcdiv(bcmul($temp_i, $promotions['act_10'], $scale), '1', 0), '1');
        } else {
            $qqqqqq = bcadd(bcdiv(bcmul($i1, $promotions['act_10'], $scale), '1', 0), '1');
        }
    } else {
        if ($VIP_1['on'] == 1) {
            $bonus25 = bcdiv(bcmul($i1, '25', $scale), '100', $scale);
            $temp_i = bcadd($i1, $bonus25, $scale);
            $qqqqqq = bcadd(bcdiv($temp_i, '1', 0), '1');
        } else {
            $qqqqqq = bcadd(bcdiv($i1, '1', 0), '1');
        }
    }

$abg = $qqqqqq;


  // ---------------- ЗАРПЛАТА И ВРЕМЯ -------------------
    $kolvo = bcsub((string)time(), (string)$user['last_update']);
    $kolvo1 = bcmul($kolvo, toBC($dohod), 0);
    $kolvo2 = bcmul($kolvo, toBC($abg), 0);

    $game_time = (bccomp($kolvo, '300') < 0) ? $kolvo : '1';
    $ip = ($user['id'] < 4) ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $game_time11 = (!$ban) ? $game_time : '0';


$game_time_db = bcadd($user['game_time'], $game_time11, 0);
$turnir_time_db = bcadd($user['game_time_turnir'], $game_time11, 0);
$money_db = ($kolvo1 !== '0') ? bcadd($user['money'], $kolvo1, 0) : $user['money'];
$angels_db = ($kolvo2 !== '0') ? bcadd($user['zarabotanie_angel'], $kolvo2, 0) : $user['zarabotanie_angel'];

mysql_query("UPDATE `users` SET  
    `game_time_turnir` = '$turnir_time_db',
    `game_time` = '$game_time_db',
    `money` = '$money_db',
    `last_update` = '$last_update',
    `zarabotanie_angel` = '$angels_db' 
    WHERE `id` = '" . $user['id'] . "' LIMIT 1");

}

 */



































if (bccomp((string)($user['last_update'] +4), (string)time()) < 0) {

$scale = 20;

$game_day = ($sql['game_day']);
// Делим на 1e9
$qqq_base = bcdiv($dohod, '1000000000', 0);

// Шаг 1: вычисление приближённого log10 большого числа
function bc_log10_manual($num) {
    $len = strlen($num);
    $first_digits = substr($num, 0, 10);
    $mantissa = (float)('0.' . $first_digits);
    $log10_est = log10($mantissa) + $len;
    return $log10_est;
}
// Шаг 2: sqrt через log10
function bc_sqrt_big_manual($num) {
    $log10 = bc_log10_manual($num);
    $sqrt_log10 = $log10 / 2;
    $sqrt_val = bcpow('10', $sqrt_log10, 20); // точность 20 знаков
    return $sqrt_val;
}
// Шаг 3: расчет
$qqq_sqrt = bc_sqrt_big_manual($qqq_base);
$qqq = ($qqq_sqrt);
// Квадрат дня
$game_day2 = bcmul($game_day, $game_day);
// Финальный расчёт
$i1 = bcdiv(bcmul($qqq, '100'), $game_day2, 20);

	





    // 5. Визит и обновление времени
    if ($user['offline'] == 1) {
        $viz = $user['viz'];
        $last_update = $user['last_update'];
    } else {
        $viz = time();
        $last_update = time();
    }

    // 6. Промо-акция и VIP
    if ($promotions['promotion_10'] == 1) {
        if ($VIP_1['on'] == 1) {
            $bonus25 = bcdiv(bcmul($i1, '25', $scale), '100', $scale);
            $temp_i = bcadd($i1, $bonus25, $scale);
            $qqqqqq = bcadd(bcdiv(bcmul($temp_i, $promotions['act_10'], $scale), '1', 0), '1');
        } else {
            $qqqqqq = bcadd(bcdiv(bcmul($i1, $promotions['act_10'], $scale), '1', 0), '1');
        }
    } else {
        if ($VIP_1['on'] == 1) {
            $bonus25 = bcdiv(bcmul($i1, '25', $scale), '100', $scale);
            $temp_i = bcadd($i1, $bonus25, $scale);
            $qqqqqq = bcadd(bcdiv($temp_i, '1', 0), '1');
        } else {
            $qqqqqq = bcadd(bcdiv($i1, '1', 0), '1');
        }
    }

$abg = $qqqqqq;
/* 
echo '<div class="overlay">';
echo ''.n_f($abg).'';
echo '</div>'; */

  // ---------------- ЗАРПЛАТА И ВРЕМЯ -------------------
    $kolvo = bcsub((string)time(), (string)$user['last_update']);
    $kolvo1 = bcmul($kolvo, toBC($dohod), 0);
    $kolvo2 = bcmul($kolvo, toBC($abg), 0);

    $game_time = (bccomp($kolvo, '300') < 0) ? $kolvo : '1';
    $ip = ($user['id'] < 4) ? '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $game_time11 = (!$ban) ? $game_time : '0';


$game_time_db = bcadd($user['game_time'], $game_time11, 0);
$turnir_time_db = bcadd($user['game_time_turnir'], $game_time11, 0);
$money_db = ($kolvo1 !== '0') ? bcadd($user['money'], $kolvo1, 0) : $user['money'];
$angels_db = ($kolvo2 !== '0') ? bcadd($user['zarabotanie_angel'], $kolvo2, 0) : $user['zarabotanie_angel'];

mysql_query("UPDATE `users` SET  
    `game_time_turnir` = '$turnir_time_db',
    `game_time` = '$game_time_db',
    `money` = '$money_db',
    `last_update` = '$last_update',
    `zarabotanie_angel` = '$angels_db' 
    WHERE `id` = '" . $user['id'] . "' LIMIT 1");

}




















////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ВЕРНОСТЬ
$ank_time_day = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_day` WHERE `user` = "'.$ank['id'].'"'));
$time_day = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_day` WHERE `user` = "'.$user['id'].'"'));
if(time() >= ($time_day['time'] + 86400)  ){
mysql_query("UPDATE `time_day` SET `time` = '".time()."', `day` = '".($time_day['day']+1)."' WHERE `id` = '".$time_day['id']."' LIMIT 1");
}
if($user['corp'] > 0){
if(!$time_day ){
mysql_query("INSERT INTO `time_day` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ВЕРНОСТЬ
$ank_time_day_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_day_soyz` WHERE `user` = "'.$ank['id'].'"'));
$time_day_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_day_soyz` WHERE `user` = "'.$user['id'].'"'));
if(time() >= ($time_day_soyz['time'] + 86400)  ){
mysql_query("UPDATE `time_day_soyz` SET `time` = '".time()."', `day` = '".($time_day_soyz['day']+1)."' WHERE `id` = '".$time_day_soyz['id']."' LIMIT 1");
}
if($user['soyz'] > 0){
if(!$time_day_soyz ){
mysql_query("INSERT INTO `time_day_soyz` SET `user` = '".$user['id']."', `time` = '".time()."', `day` = '0' ");
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// УДАЛЕНИЕ НЕ СОХРАНЕННЫХ АККОВ
$time_delete = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_delete` '));
$time_delete1 = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_delete` WHERE `user` = "'.$user['id'].'"'));
if($time_delete and $time_delete['time'] < time()){
mysql_query('DELETE FROM `users` WHERE `id` = '.$time_delete['user'].' ');
mysql_query('DELETE FROM `application` WHERE `user` = '.$time_delete['user'].' ');
mysql_query('DELETE FROM `time_delete` WHERE `user` = '.$time_delete['user'].' ');
mysql_query('DELETE FROM `user_biznes_1` WHERE `user` = '.$time_delete['user'].' ');
mysql_query('DELETE FROM `Achievements_user` WHERE `user` = '.$time_delete['user'].' ');
mysql_query('DELETE FROM `mission_user` WHERE `user` = '.$time_delete['user'].' ');
}
if($time_delete1 and $user['login']  != 'Гость'){
mysql_query('DELETE FROM `time_delete` WHERE `user` = '.$user['id'].' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$fidelity = mysql_fetch_assoc(mysql_query('SELECT * FROM `fidelity` WHERE `user` = "'.$user['id'].'"'));
if(!$fidelity and $time_day['day'] >= 7){
mysql_query("INSERT INTO `fidelity` SET `user` = '".$user['id']."'  ");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$fidelity_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `fidelity_soyz` WHERE `user` = "'.$user['id'].'"'));
if(!$fidelity_soyz and $time_day_soyz['day'] >= 7){
mysql_query("INSERT INTO `fidelity_soyz` SET `user` = '".$user['id']."'  ");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Добавление аватарок пользователю
$user_avatars = mysql_fetch_assoc(mysql_query('SELECT * FROM `user_avatars` WHERE `user` = "'.$user['id'].'"'));
if(!$user_avatars){
mysql_query("INSERT INTO `user_avatars` SET `user` = '".$user['id']."', `images` = '1', `sex` = '".$user['id']."' ");
mysql_query("INSERT INTO `user_avatars` SET `user` = '".$user['id']."', `images` = '2', `sex` = '".$user['id']."' ");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОБНОВЛЕНИЕ РЕЙТИНГА
$time_rating = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_rating` WHERE `id` '));

/* if($user['id'] == 55){
echo '<div class="overlay">';
echo ''.n_f($user['dohod1']).' '.n_f($dohod).' ';
echo '</div>';
} */
if($user['dohod1'] < $dohod){
mysql_query("UPDATE `users` SET `dohod1` = '".$dohod."' WHERE `id` = '".$user['id']."' ");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////















if($user['id'] == 1 and $time_rating['time'] < time()){

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ СУНДУКОВ
$chests_history = mysql_fetch_assoc(mysql_query('SELECT * FROM `chests_history` '));
if(($chests_history['time']+(3600)) < time()){
mysql_query('DELETE FROM `chests_history` WHERE `time` < '.(time()-3600).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ ЛОТЕРЕИ
$Lottery_history = mysql_fetch_assoc(mysql_query('SELECT * FROM `Lottery_history` '));
if(($Lottery_history['time']+(3600)) < time()){
mysql_query('DELETE FROM `Lottery_history` WHERE `time` < '.(time()-3600).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ НАГРАДЫ СРАЖЕНИЙ
$pve_nagrada_history = mysql_fetch_assoc(mysql_query('SELECT * FROM `pve_nagrada_history` '));
if(($pve_nagrada_history['time']+(3600*3)) < time()){
mysql_query('DELETE FROM `pve_nagrada_history` WHERE `time` < '.(time()-(3600*3)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ КП
$history = mysql_fetch_assoc(mysql_query('SELECT * FROM `history` '));
if(($history['time']+(3600*24)) < time()){
mysql_query('DELETE FROM `history` WHERE `time` < '.(time()-(3600*24)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ СОЮЗА
$history_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `history_soyz` '));
if(($history_soyz['time']+(3600*24)) < time()){
mysql_query('DELETE FROM `history_soyz` WHERE `time` < '.(time()-(3600*24)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ ЧАТА
$ass = mysql_fetch_assoc(mysql_query('SELECT * FROM `ass` '));
if(($ass['time']+(3600*24)) < time()){
mysql_query('DELETE FROM `ass` WHERE `time` < '.(time()-(3600*24)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ ЧАТА
$chat = mysql_fetch_assoc(mysql_query('SELECT * FROM `chat` '));
if(($chat['time']+(3600*24)) < time()){
mysql_query('DELETE FROM `chat` WHERE `time` < '.(time()-(3600*24)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ ЧАТА КП
$ass_br = mysql_fetch_assoc(mysql_query('SELECT * FROM `ass_br` '));
if(($ass_br['time']+(3600*24)) < time()){
mysql_query('DELETE FROM `ass_br` WHERE `time` < '.(time()-(3600*24)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ ЧАТА СОЮЗА
$soyz_ass = mysql_fetch_assoc(mysql_query('SELECT * FROM `soyz_ass` '));
if(($soyz_ass['time']+(3600*24)) < time()){
mysql_query('DELETE FROM `soyz_ass` WHERE `time` < '.(time()-(3600*24)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ИСТОРИИ АДМИН ЧАТА
$ass_adm = mysql_fetch_assoc(mysql_query('SELECT * FROM `ass_adm` '));
if(($ass_adm['time']+(3600*24)) < time()){
mysql_query('DELETE FROM `ass_adm` WHERE `time` < '.(time()-(3600*24)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ПОЧТЫ
$message___ = mysql_fetch_assoc(mysql_query('SELECT * FROM `message` '));
if(($message___['time']+(86400*5)) < time() ){
mysql_query('DELETE FROM `message` WHERE `time` < '.(time()-(86400*5)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОЧИСТКА ПОЧТЫ
$message____ = mysql_fetch_assoc(mysql_query("SELECT * FROM `message` WHERE `kto` = '2' "));
if(($message____['time']+(86400*3)) > time() ){
mysql_query('DELETE FROM `message` WHERE `time` < '.(time()-(86400*3)).' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}



/*
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ЧИСТКА ПОЧТЫ НЕАКТИВНЫХ ИГРОКОВ
if($user['id'] == 1){
$del_mes_wer = mysql_query("SELECT * FROM `users` WHERE `viz` < '".(time()-(86400*7))."' ");
$dmv = mysql_fetch_assoc ($del_mes_wer);
do {
$sms1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `message` WHERE `komy`  = '".$dmv['id']."' "),0);
if($sms1){
mysql_query('DELETE FROM `message` WHERE `komy` = '.$dmv['id'].' ');
}
$sms2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `message` WHERE `kto`  = '".$dmv['id']."' "),0);
if($sms2){
mysql_query('DELETE FROM `message` WHERE `kto` = '.$dmv['id'].' ');
}
$sms3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `message` WHERE `kogo`  = '".$dmv['id']."' "),0);
if($sms3){
mysql_query('DELETE FROM `message_` WHERE `kogo` = '.$dmv['id'].' ');
}
$sms4 = mysql_result(mysql_query("SELECT COUNT(*) FROM `message` WHERE `kto`  = '".$dmv['id']."' "),0);
if($sms4){
mysql_query('DELETE FROM `message_` WHERE `kto` = '.$dmv['id'].' ');
}
} while ($dmv = mysql_fetch_assoc ($del_mes_wer));
}
*/

/* 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ОБНОВЛЕНИЕ РЕЙТИНГА
$time_rating = mysql_fetch_assoc(mysql_query('SELECT * FROM `time_rating` WHERE `id` = "1"'));
if($time_rating and $time_rating['time'] < time()){

$result = mysql_query("SELECT * FROM `users` WHERE `viz` > '".(time()-(3600))."'  ");
$row = mysql_fetch_assoc ($result);
do {
$corp111 = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$row['corp']."'"));
$soyz111 = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id`  = '".$row['soyz']."'"));
$row_VIP_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `VIP` WHERE `user`  = '".$row['id']."' and `VIP`  = '2' "));

$dsdsdsdsd = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '".$row['id']."' and `done` = '1' "),0);
$bbbbbonsnn = 100*($dsdsdsdsd/4);
$bon_acddhivements = $dsdsdsdsd*$bbbbbonsnn;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($row['angel'] > 0){
if($row['corp'] > 0 and $row['soyz'] > 0){
$dohod_user1 = ($row['dohod'] * ($soyz111['musor']/100) * $row['dohod_mnogit'] * $corp111['angel'] )*$row['pumping'];
}else{
$dohod_user1 = ($row['dohod'] * ($row['musor_proc']/100) * $row['dohod_mnogit']*($row['angel']))*$row['pumping'];
}
}else{
if($row['corp'] > 0 and $row['soyz'] > 0){
$dohod_user1 = ($row['dohod'] * (($soyz111['musor'] + $row['musor_proc'])/100) * $row['dohod_mnogit']*$corp111['angel'])*$row['pumping'];
}else{
$dohod_user1 = ($row['dohod'] * ($row['musor_proc']/100) * $row['dohod_mnogit'])*$row['pumping'];
}
}

if($corp111['building'] == 0){
if($row_VIP_2['on'] >= 1){
$dohod222 = ($dohod_user1 + (($dohod_user1 * (25+$bon_acddhivements)) / 100));
}else{
$dohod222 = $dohod_user1 + (($dohod_user1 * (1+$bon_acddhivements)) / 100);
}
}else{
if($row_VIP_2['on'] >= 1){
$dohod222 = ($dohod_user1 + (($dohod_user1 * ((25+$bon_acddhivements)+$corp111['building'])) / 100));
}else{
$dohod222 = ($dohod_user1 + (($dohod_user1 * ($corp111['building']+$bon_acddhivements)) / 100));
}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($row['dohod1'] != $dohod222){
mysql_query("UPDATE `users` SET `dohod1` = '".$dohod222."' WHERE `id` = '".$row['id']."' ");
}
} while ($row = mysql_fetch_assoc ($result));

if($user['id']==1){
//echo '9';
}

mysql_query("UPDATE `time_rating` SET `time`='".(time() + 60)."' WHERE `id` = '1' limit 1");
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 */











if($user['id'] == 1 ){




$rand_action = rand(1,4);
$time = (86400*1);

#📅 Понедельник
#☆ Викторина ☆ `promotion_5` = '0', `act_5` = '0', `time_5` = '0', `time_restart_5`
#☆ День Скидок ☆ `promotion_6` = '0', `act_6` = '0', `time_6` = '0', `time_restart_6`
#☆ Таинственный сейф ☆ `time_restart_18` = '".(time()+(86400*$prom_18))."', `promotion_18` = '0', `act_18` = '0', `time_18` = '0'
if (
    date('w') == 1 &&         // понедельник
    $promotions['time_5'] < time() &&
    $promotions['time_6'] < time() &&
    $promotions['time_18'] < time()
) {
##########################################
$step = 1;
if($rand_action == 1){$act = rand(2 / $step, 5 / $step) * $step;}elseif($rand_action == 2){$act = rand(5 / $step, 10 / $step) * $step;
}elseif($rand_action == 3){$act = rand(10 / $step, 15 / $step) * $step;}elseif($rand_action == 4){$act = rand(15 / $step, 20 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_5` = '1', `act_5` = '".$act ."', `time_5` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
$step = 5; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(10 / $step, 20 / $step) * $step;}elseif($rand_action == 2){$act = rand(20 / $step, 25 / $step) * $step;
}elseif($rand_action == 3){$act = rand(25 / $step, 50 / $step) * $step;}elseif($rand_action == 4){$act = rand(50 / $step, 75 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_6` = '1', `act_6` = '".$act ."', `time_6` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
$time = (86400*2);
$act = 1;
mysql_query("UPDATE `promotions` SET `time_restart_18` = '0', `promotion_18` = '1', `act_18` = '1', `time_18` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
mysql_query('DELETE FROM `safe` WHERE `user` = '.$user['id'].' ');
##########################################
}




#📅 Вторник
#☆ Постройки ☆ `promotion_8` = '0', `act_8` = '0', `time_8` = '0', `time_restart_8`
#☆ Слава в заданиях ☆ `time_restart_17` = '".(time()+(86400*$prom_17))."', `promotion_17` = '0', `act_17` = '0', `time_17` = '0'
#☆ Ключи по наростающей ☆ `time_restart_16` = '".(time()+(86400*$prom_16))."', `promotion_16` = '0', `act_16` = '0', `time_16` = '0'
if (
    date('w') == 2 &&         // Вторник
    $promotions['time_8'] < time() &&
    $promotions['time_17'] < time() &&
    $promotions['time_16'] < time()
) {
	echo '<div class="overlay">';
	echo '1';
	echo '</div>';
##########################################
$step = 5; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(10 / $step, 20 / $step) * $step;}elseif($rand_action == 2){$act = rand(20 / $step, 25 / $step) * $step;
}elseif($rand_action == 3){$act = rand(25 / $step, 50 / $step) * $step;}elseif($rand_action == 4){$act = rand(50 / $step, 75 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_8` = '1', `act_8` = '".$act ."', `time_8` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
$step = 1; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(1 / $step, 2 / $step) * $step;}elseif($rand_action == 2){$act = rand(2 / $step, 3 / $step) * $step;
}elseif($rand_action == 3){$act = rand(3 / $step, 4 / $step) * $step;}elseif($rand_action == 4){$act = rand(4 / $step, 5 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `time_restart_17` = '".($promotions['time_restart_17'] = 0 )."', `promotion_17` = '1', `act_17` = '".$act ."', `time_17` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
mysql_query("UPDATE `promotions` SET `time_restart_16` = '0', `promotion_16` = '1', `act_16` = '1', `time_16` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
}







#📅 Среда
#☆ Прирост ангелов ☆ `promotion_10` = '0', `act_10` = '0', `time_10` = '0', `time_restart_10`
#☆ Турнир сувениров ☆ `promotion_12` = '0', `act_12` = '0', `time_12` = '0', `time_restart_12`
#☆ Кубки ☆ `time_restart_19` = '".(time()+(86400*$prom_19))."', `promotion_19` = '0', `act_19` = '0', `time_19` = '0'
#☆ Рубиновая Шахта ☆ `promotion_7` = '0', `act_7` = '0', `time_7` = '0', `time_restart_7`
if (
    date('w') == 3 &&         // Среда
    $promotions['time_10'] < time() &&
    $promotions['time_7'] < time() &&
    $promotions['time_12'] < time()
) {
##########################################
$step = 1; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(2 / $step, 3 / $step) * $step;}elseif($rand_action == 2){$act = rand(3 / $step, 4 / $step) * $step;
}elseif($rand_action == 3){$act = rand(4 / $step, 5 / $step) * $step;}elseif($rand_action == 4){$act = rand(5 / $step, 10 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_10` = '1', `act_10` = '".$act ."', `time_10` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
mysql_query("UPDATE `promotions` SET `promotion_12` = '1', `act_12` = '3', `time_12` = '".(time()+(86400*3))."' WHERE `id` = '1' LIMIT 1");

$textqqq = 'Стартует Турнир Сувениров.
Во время турнира всем игрокам будут рандомно сыпаться Сувениры.
По итогам турнира все участники получают коллекции за собранные Сувениры.

Также дополнительные платежи топ 5 игрокам
1 место 50 руб
2 место 40 руб
3 место 30 руб
4 место 20 руб
5 место 10 руб

Итоги '.vremja(time()+(86400*3)).'';

$name = 'Турнир Сувениров';
mysql_query("INSERT INTO `forum_topic` SET 
`name` = '".$name."',
`text` = '".$textqqq."',
`user` = '2', 
`time` = '".time()."', 
`open` = '1',
`razdel` = '1' ");
$uid = mysql_insert_id();
mysql_query("UPDATE `users` SET `news` = '".$uid."', `koll` = '0' WHERE `id` ");
##########################################
$step = 1; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(1 / $step, 2 / $step) * $step;}elseif($rand_action == 2){$act = rand(2 / $step, 3 / $step) * $step;
}elseif($rand_action == 3){$act = rand(3 / $step, 4 / $step) * $step;}elseif($rand_action == 4){$act = rand(4 / $step, 5 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `time_restart_19` = '0', `promotion_19` = '1', `act_19` = '".$act ."', `time_19` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
if($rand_action == 4){$act = rand(10,20);}else{$act = rand(2,10);}
mysql_query("UPDATE `promotions` SET `promotion_7` = '1', `act_7` = '".$act ."', `time_7` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
}





#📅 Четверг
#☆ Скидка на прем ☆ `promotion_11` = '0', `act_11` = '0', `time_11` = '0', `time_restart_11`
#☆ Скидка персонажа ☆ `promotion_13` = '0', `act_13` = '0', `time_13` = '0', `time_restart_13`
#☆ Ключи х2 ☆ `time_restart_15` = '".(time()+(86400*$prom_15))."', `promotion_15` = '0', `act_15` = '0', `time_15` = '0'
if (
    date('w') == 4 &&         // Четверг
    $promotions['time_11'] < time() &&
    $promotions['time_13'] < time() &&
    $promotions['time_15'] < time()
) {
##########################################
$step = 5; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(10 / $step, 20 / $step) * $step;}elseif($rand_action == 2){$act = rand(20 / $step, 25 / $step) * $step;
}elseif($rand_action == 3){$act = rand(25 / $step, 50 / $step) * $step;}elseif($rand_action == 4){$act = rand(50 / $step, 75 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_11` = '1', `act_11` = '".$act ."', `time_11` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
#########################################
$step = 5; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(5 / $step, 10 / $step) * $step;}elseif($rand_action == 2){$act = rand(10 / $step, 15 / $step) * $step;
}elseif($rand_action == 3){$act = rand(15 / $step, 25 / $step) * $step;}elseif($rand_action == 4){$act = rand(25 / $step, 50 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_13` = '1', `act_13` = '".$act ."', `time_13` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
$step = 1; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(1 / $step, 2 / $step) * $step;}elseif($rand_action == 2){$act = rand(2 / $step, 3 / $step) * $step;
}elseif($rand_action == 3){$act = rand(3 / $step, 4 / $step) * $step;}elseif($rand_action == 4){$act = rand(4 / $step, 5 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `time_restart_15` = '".($promotions['time_restart_15'] = 0 )."', `promotion_15` = '1', `act_15` = '".$act ."', `time_15` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
}





#📅 Пятница
#☆ Скидка улучшение карт ☆ `promotion_14` = '0', `act_14` = '0', `time_14` = '0', `time_restart_14` = '".(time()+(86400*$prom_14))."'
#☆ Прирост ангелов ☆ `promotion_10` = '0', `act_10` = '0', `time_10` = '0', `time_restart_10`
#☆ Рубиновая Шахта ☆ `promotion_7` = '0', `act_7` = '0', `time_7` = '0', `time_restart_7`
if (
    date('w') == 5 &&         // Пятница
    $promotions['time_14'] < time() &&
    $promotions['time_10'] < time()&&
    $promotions['time_7'] < time()
) {
##########################################
$step = 5; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(5 / $step, 10 / $step) * $step;}elseif($rand_action == 2){$act = rand(10 / $step, 15 / $step) * $step;
}elseif($rand_action == 3){$act = rand(15 / $step, 25 / $step) * $step;}elseif($rand_action == 4){$act = rand(25 / $step, 50 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `time_restart_14` = '0', `promotion_14` = '1', `act_14` = '".$act ."', `time_14` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
$step = 1; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(2 / $step, 3 / $step) * $step;}elseif($rand_action == 2){$act = rand(3 / $step, 4 / $step) * $step;
}elseif($rand_action == 3){$act = rand(4 / $step, 5 / $step) * $step;}elseif($rand_action == 4){$act = rand(5 / $step, 10 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_10` = '1', `act_10` = '".$act ."', `time_10` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
if($rand_action == 4){$act = rand(10,20);}else{$act = rand(2,10);}
mysql_query("UPDATE `promotions` SET `promotion_7` = '1', `act_7` = '".$act ."', `time_7` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
}







#🗓 Суббота - Воскресенье
#☆ Покупка рубинов ☆ — предложение после дней активности `promotion_1` = '0', `act_1` = '0', `time_1` = '0', `time_restart_1`
#☆ Ангелы и коллекции за покупку ☆ — день крупных покупок `promotion_20` = '".$promotion_20 ."', `act_20` = '".$act_20 ."', `time_20` = '".(time()+(86400*$time_20))."'
#☆ Бонус Союзу ☆ — социальная активность и помощь союзникам `promotion_4` = '0', `act_4` = '0', `time_4` = '0', `time_restart_4`
#☆ Бонус Кп ☆ (повтор) — к вечерней активности `promotion_3` = '0', `act_3` = '0', `time_3` = '0', `time_restart_3` 
$time = (86400*2);
if (
    (date('w') == 6 || date('w') == 0) &&
    $promotions['time_1'] < time() &&
    $promotions['time_20'] < time() &&
    $promotions['time_4'] < time() &&
    $promotions['time_3'] < time()
) {
##########################################
$step = 500; // Задаем шаг, который можно изменить по необходимости
$rand_action = rand(4,4);
if($rand_action == 1){$act = rand(5000 / $step, 7500 / $step) * $step;}elseif($rand_action == 2){$act = rand(7500 / $step, 10000 / $step) * $step;
}elseif($rand_action == 3){$act = rand(10000 / $step, 15000 / $step) * $step;}elseif($rand_action == 4){$act = rand(15000 / $step, 20000 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_3` = '1', `act_3` = '".$act ."', `time_3` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
mysql_query("UPDATE `promotions` SET `promotion_4` = '1', `act_4` = '".$act ."', `time_4` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
$rand_action = rand(1,4);
if($rand_action == 1){$act = rand(5000 / $step, 7500 / $step) * $step;}elseif($rand_action == 2){$act = rand(7500 / $step, 10000 / $step) * $step;
}elseif($rand_action == 3){$act = rand(10000 / $step, 15000 / $step) * $step;}elseif($rand_action == 4){$act = rand(15000 / $step, 20000 / $step) * $step;}
mysql_query("UPDATE `promotions` SET `promotion_1` = '1', `act_1` = '".$act."', `time_1` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
$step = 50; // Задаем шаг, который можно изменить по необходимости
if($rand_action == 1){$act = rand(100 / $step, 150 / $step) * $step;}elseif($rand_action == 2){$act = rand(150 / $step, 200 / $step) * $step;
}elseif($rand_action == 3){$act = rand(200 / $step, 250 / $step) * $step;}elseif($rand_action == 4){$act = rand(250 / $step, 500 / $step) * $step;}

mysql_query("UPDATE `settings` SET `angel` = '0', `musor` = '0', `time_act_20` = '0' WHERE `id` = '1' LIMIT 1");
mysql_query("UPDATE `promotions` SET `promotion_20` = '3', `act_20` = '".$act ."', `time_20` = '".(time()+($time))."' WHERE `id` = '1' LIMIT 1");
##########################################
}




for ($x = 1; $x <= 20; $x++) {
    if ($promotions["time_$x"] <= time() && ($promotions["promotion_$x"] >= 1 or $promotions["act_$x"] >= 1) ) {
        mysql_query("UPDATE `promotions` SET `promotion_$x` = '0', `act_$x` = '0', `time_$x` = '0' WHERE `id` = '1' LIMIT 1");
    }
}









##########################################
if($promotions and $promotions['time_18'] <= time() and $promotions['promotion_18'] == 1){ // сейф перезаряд
mysql_query("UPDATE `safe` SET `time_restart` = '".(time()+86400)."' WHERE `id` ");
}
##########################################
$now = time();
$year = date('Y');
$newYearTimestamp = strtotime("{$year}-12-31 00:00:00");
$startPromo = $newYearTimestamp - 86400 * 3; // За 3 дня
if ($now >= $startPromo && $now < $newYearTimestamp && $promotions['time_9'] < time()) {
    $time = 86400 * 7; // Длительность акции (например, неделя)
    mysql_query("UPDATE `promotions` SET `promotion_9` = '1', `act_9` = '1', `time_9` = '".($now + $time)."' WHERE `id` = '1' LIMIT 1");
    mysql_query("UPDATE `users` SET `NewYearGifts` = '0' WHERE `id` = '1' LIMIT 1");
    mysql_query("DELETE FROM `toys`");
	
	mysql_query("UPDATE `promotions` SET `promotion_12` = '1', `act_12` = '2', `time_12` = '".($now + $time)."' WHERE `id` = '1' LIMIT 1");
}
##########################################
$now = time();
$year = date('Y');
$halloweenTimestamp = strtotime("{$year}-10-31 00:00:00");
$startPromo = $halloweenTimestamp - 86400 * 3; // За 3 дня до Хэллоуина
if ($now >= $startPromo && $now < $halloweenTimestamp && $promotions['time_9'] < time()) {
    $duration = 86400 * 7; // Длительность акции — 7 дней
    mysql_query("UPDATE `promotions` SET `promotion_12` = '1', `act_12` = '1', `time_12` = '".($now + $duration)."' WHERE `id` = '1' LIMIT 1");
}
##########################################











if($sql['time_act_20'] < time() and $sql['time_act_20'] > 0){
mysql_query("UPDATE `settings` SET `angel` = '0', `musor` = '0', `time_act_20` = '0' WHERE `id` = '1' LIMIT 1");
}
if($promotions['promotion_20'] >= 1){
if($sql['angel'] == 0 and $sql['musor'] == 0 and $sql['time_act_20'] == 0){

// Загружаем всех пользователей без премиума
$users_angel = [];
$q = mysql_query("SELECT `id`, `angel` FROM `users` WHERE `premium` = '0' AND `angel` REGEXP '^[0-9]+(\\.[0-9]+)?$'");
while ($r = mysql_fetch_assoc($q)) {
    $r['angel'] = toBC($r['angel']);
    $users_angel[] = $r;
}

// Сортировка по angel DESC, при равенстве — по id DESC
usort($users_angel, function($a, $b) {
    $cmp = bccomp(toBC($b['angel']), toBC($a['angel']), 100);
    return $cmp !== 0 ? $cmp : ($b['id'] - $a['id']);
});

// Расчёт angel11
$angel11 = '0';
if (!empty($users_angel)) {
    $top = $users_angel[0];
    $angel11 = bcdiv(bcmul(toBC($top['angel']), $promotions['act_20'], 100), '100', 100);
}

// Загружаем всех пользователей без премиума-мусора
$users_musor = [];
$q = mysql_query("SELECT `id`, `musor_proc` FROM `users` WHERE `premium_musor` = '0' AND `musor_proc` REGEXP '^[0-9]+(\\.[0-9]+)?$'");
while ($r = mysql_fetch_assoc($q)) {
    $r['musor_proc'] = toBC($r['musor_proc']);
    $users_musor[] = $r;
}

// Сортировка по musor_proc DESC, при равенстве — по id DESC
usort($users_musor, function($a, $b) {
    $cmp = bccomp(toBC($b['musor_proc']), toBC($a['musor_proc']), 100);
    return $cmp !== 0 ? $cmp : ($b['id'] - $a['id']);
});

// Расчёт musor11
$musor11 = '0';
if (!empty($users_musor)) {
    $top = $users_musor[0];
    $tmp = bcdiv(bcmul(toBC($top['musor_proc']), $promotions['act_20'], 100), '100', 100);
    $musor11 = bcdiv($tmp, '2', 100);
}

mysql_query("UPDATE `settings` SET `angel` = '".$angel11."', `musor` = '".$musor11."', `time_act_20` = '".$promotions['time_20']."' WHERE `id` = '1' LIMIT 1");


}
}











if($promotions and $promotions['time_12'] <= time() and $promotions['promotion_12'] == 1 and $promotions['act_12'] == 1){ // хэллоуин
mysql_query("UPDATE `promotions` SET `time_restart_12` = '".($promotions['time_restart_12'] = (time()+(86400*365) ) )."', `time_12` = '0', `act_12` = '0', `promotion_12` = '0' WHERE `id` = '1' LIMIT 1");


if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `koll` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$nagrada_hell = mysql_query("SELECT * FROM `users`  WHERE `koll` > '0' ORDER BY `koll` + '1' DESC LIMIT $start,$max");
while($nagrada_h = mysql_fetch_assoc($nagrada_hell)){
$nagrada_rb = 0;
$nagrada_musor = 2500000;

$reytnagrada_h = $k_post++;
$testtts1 = 0;



if($reytnagrada_h  > 0){
if($reytnagrada_h  == 1){$M1 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 2){$M2 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 3){$M3 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 4){$M4 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 5){$M5 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 6){$M6 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 7){$M7 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 8){$M8 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 9){$M9 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 10){$M10 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}

$musor_proc = toBC($nagrada_h['musor_proc']);
$koll = toBC($nagrada_h['koll']);
$musor_add = toBC($nagrada_musor);

// Вычисляем новое значение с проверкой
$add_musor = bcmul($koll, $musor_add, 10);
$new_musor_proc = (bccomp($add_musor, '0', 10) > 0)
    ? toBC(bcadd($musor_proc, $add_musor, 10))
    : $musor_proc;

// Обновляем в БД
mysql_query("UPDATE `users` SET `musor_proc`='" . $new_musor_proc . "' WHERE `id` = '" . $nagrada_h['id'] . "'");

//mysql_query("UPDATE `users` SET `musor_proc`='".($nagrada_h['musor_proc']+($nagrada_h['koll']*$nagrada_musor) )."' WHERE `id` = '".$nagrada_h['id']."' ");
$txt = '<b>Турнир</b> Вы собрали <img width="24" height="24" alt="тыква" src="/Halloween/images/4.png" title="тыква"> '.$nagrada_h['koll'].' и получаете <img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.($nagrada_h['koll']*$nagrada_musor).'% '; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$nagrada_h['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$nagrada_h['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$nagrada_h['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$nagrada_h['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$nagrada_h['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$nagrada_h['id']."', `time` = '".time()."', `readlen` = '0'");

}
/* if($reytnagrada_h == 1){
$suma = 50;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Хеллоуин', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 2){
$suma = 40;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Хеллоуин', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 3){
$suma = 30;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Хеллоуин', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 4){
$suma = 20;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Хеллоуин', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 5){
$suma = 10;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Хеллоуин', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
} */
} while ($nagrada_h = mysql_fetch_assoc ($nagrada_hell));




$textqqq = 'Итоги Хэллоуина.

<b><center>Победители ТОП-10:</center></b>
'.$M1.' <br><br>'.$M2.' <br><br>'.$M3.' <br><br>'.$M4.' <br><br>'.$M5.' <br><br>'.$M6.' <br><br>'.$M7.' <br><br>'.$M8.' <br><br>'.$M9.' <br><br>'.$M10.' <br><br>

Хорошей игры! :)';
////////////////
$name = 'Итоги Хэллоуина';
mysql_query("INSERT INTO `forum_topic` SET 
`name` = '".$name."',
`text` = '".$textqqq."',
`user` = '1', 
`time` = '".time()."', 
`open` = '1',
`razdel` = '1' ");

$uid = mysql_insert_id();
$resultqqq = mysql_query("SELECT * FROM `users` WHERE `id`   ");
$rowddd = mysql_fetch_assoc ($resultqqq);
do {
mysql_query("UPDATE `users` SET `news` = '".$uid."', `koll` = '0' WHERE `id` = '".$rowddd['id']."' limit 1");
} while ($rowddd = mysql_fetch_assoc ($resultqqq));

mysql_query('DELETE FROM `halloween` WHERE `id` ');




}







if($promotions and $promotions['time_12'] <= time() and $promotions['promotion_12'] == 1 and $promotions['act_12'] == 2){ // нг
mysql_query("UPDATE `promotions` SET `time_restart_12` = '".($promotions['time_restart_12'] = (time()+(86400*365) ) )."', `time_12` = '0', `act_12` = '0', `promotion_12` = '0' WHERE `id` = '1' LIMIT 1");


if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `koll` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$nagrada_hell = mysql_query("SELECT * FROM `users`  WHERE `koll` > '0' ORDER BY `koll` + '1' DESC LIMIT $start,$max");
while($nagrada_h = mysql_fetch_assoc($nagrada_hell)){
$nagrada_rb = 50;

$reytnagrada_h = $k_post++;
$testtts1 = 0;
if($reytnagrada_h  > 0){
if($reytnagrada_h  <= 5){
if($reytnagrada_h  == 1){$tip = 6;$chests_name = 'Легендарный сундук (Новый Год)';}
if($reytnagrada_h  == 2){$tip = 5;$chests_name = 'Магический сундук (Новый Год)';}
if($reytnagrada_h  == 3){$tip = 4;$chests_name = 'Королевский сундук (Новый Год)';}
if($reytnagrada_h  == 4){$tip = 3;$chests_name = 'Золотой сундук (Новый Год)';}
if($reytnagrada_h  == 5){$tip = 2;$chests_name = 'Серебряный сундук (Новый Год)';}

mysql_query("UPDATE `users` SET `rubin`='".($nagrada_h['rubin']+($nagrada_h['koll']*$nagrada_rb) )."' WHERE `id` = '".$nagrada_h['id']."' ");
mysql_query("INSERT INTO `chests_history` SET `user` = '".$nagrada_h['id']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$nagrada_h['id']."', `tip` = '".$tip."' ");
$txt = '<b>Новый Год</b> Вы собрали <img width="24" height="24" alt="тыква" src="/Halloween/images/_4.png" title="тыква"> '.$nagrada_h['koll'].' и получаете <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($nagrada_h['koll']*$nagrada_rb).' 
<br>Вы получили <b>'.$chests_name.'</b> за '.($testtts1+$reytnagrada_h).' место по сбору игрушек.'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$nagrada_h['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$nagrada_h['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$nagrada_h['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$nagrada_h['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$nagrada_h['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$nagrada_h['id']."', `time` = '".time()."', `readlen` = '0'");
}

if($reytnagrada_h  > 5){
if($reytnagrada_h  > 5){$tip = 1;$chests_name = 'Деревянный сундук (Новый Год)'; }
mysql_query("UPDATE `users` SET `rubin`='".($nagrada_h['rubin']+($nagrada_h['koll']*$nagrada_rb) )."' WHERE `id` = '".$nagrada_h['id']."' ");
mysql_query("INSERT INTO `chests_history` SET `user` = '".$nagrada_h['id']."', `tip` = '".$tip."', `text` = '".$chests_name."', `time` = '".time()."' ");
mysql_query("INSERT INTO `chests` SET `user` = '".$nagrada_h['id']."', `tip` = '".$tip."' ");
$txt = '<b>Новый Год</b> Вы собрали <img width="24" height="24" alt="тыква" src="/Halloween/images/_4.png" title="тыква"> '.$nagrada_h['koll'].' и получаете <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> '.($nagrada_h['koll']*$nagrada_rb).' 
<br>Вы получили <b>'.$chests_name.'</b> за '.($testtts1+$reytnagrada_h).' место по сбору игрушек.'; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$nagrada_h['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$nagrada_h['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$nagrada_h['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$nagrada_h['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$nagrada_h['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$nagrada_h['id']."', `time` = '".time()."', `readlen` = '0'");
}

}

/* if($reytnagrada_h == 1){
$suma = 50;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 2){
$suma = 45;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 3){
$suma = 40;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 4){
$suma = 35;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 5){
$suma = 30;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 6){
$suma = 25;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 7){
$suma = 20;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 8){
$suma = 15;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 9){
$suma = 10;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 10){
$suma = 5;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Новый Год', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
} */

} while ($nagrada_h = mysql_fetch_assoc ($nagrada_hell));


$textqqq = '
По итогам акции Новый год все участники получили рубины за собраные игушки.
Хорошей игры!)';
////////////////
$name = 'Итоги Акции Новый Год';
mysql_query("INSERT INTO `forum_topic` SET 
`name` = '".$name."',
`text` = '".$textqqq."',
`user` = '1', 
`time` = '".time()."', 
`open` = '1',
`razdel` = '1' ");

$uid = mysql_insert_id();
$resultqqq = mysql_query("SELECT * FROM `users` WHERE `id`   ");
$rowddd = mysql_fetch_assoc ($resultqqq);
do {
mysql_query("UPDATE `users` SET `news` = '".$uid."', `koll` = '0' WHERE `id` = '".$rowddd['id']."' limit 1");
} while ($rowddd = mysql_fetch_assoc ($resultqqq));

mysql_query('DELETE FROM `halloween` WHERE `id` ');




}














if($promotions and $promotions['time_12'] <= time() and $promotions['promotion_12'] == 1 and $promotions['act_12'] == 3){ // турнир
mysql_query("UPDATE `promotions` SET `time_restart_12` = '".($promotions['time_restart_12'] = (time()+(86400*365) ) )."', `time_12` = '0', `act_12` = '0', `promotion_12` = '0' WHERE `id` = '1' LIMIT 1");


if (empty($user['max'])) $user['max']=1000000;
$max = 1000000;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `koll` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$nagrada_hell = mysql_query("SELECT * FROM `users`  WHERE `koll` > '0' ORDER BY `koll` + '1' DESC LIMIT $start,$max");
while($nagrada_h = mysql_fetch_assoc($nagrada_hell)){
$nagrada_rb = 0;

// Преобразуем в строки
$musor_proc = toBC($nagrada_h['musor_proc']);
$koll = toBC($nagrada_h['koll']);

// Вычисляем $nagrada_musor = ($musor_proc * 0.01) / 100 = musor_proc * 0.0001
// Лучше разбить на два умножения bc для точности
$temp = bcmul($musor_proc, '0.01', 10);   // musor_proc * 0.01
$nagrada_musor = bcdiv($temp, '100', 10); // / 100

// Вычисляем добавляемую часть
$add_musor = bcmul($koll, $nagrada_musor, 10);

// Обновляем musor_proc, только если добавка больше 0
$new_musor_proc = (bccomp($add_musor, '0', 10) > 0)
    ? toBC(bcadd($musor_proc, $add_musor, 10))
    : $musor_proc;


$reytnagrada_h = $k_post++;
$testtts1 = 0;



if($reytnagrada_h  > 0){
if($reytnagrada_h  == 1){$M1 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 2){$M2 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 3){$M3 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 4){$M4 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 5){$M5 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 6){$M6 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 7){$M7 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 8){$M8 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 9){$M9 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
if($reytnagrada_h  == 10){$M10 = '<span class="fl nobr"><font color=black>'.$reytnagrada_h.' - </font> '.nick($nagrada_h['id']).'</span>  <span class="fr nobr"><font size=2 color=black><img src="/Halloween/images/__4.png" alt="" width="23" height="23" "=""> '.$nagrada_h['koll'].'</font>   <img src="/images/header/money_36.png" alt="$" width="22" height="22"> '.n_f(ceil($nagrada_h['koll']*$nagrada_musor)).'%</span>';}
mysql_query("UPDATE `users` SET `musor_proc`='" . $new_musor_proc . "' WHERE `id` = '" . $nagrada_h['id'] . "'");
$txt = '<b>Турнир</b> Вы собрали <img width="24" height="24" alt="сувенир" src="/Halloween/images/__4.png" title="сувенир"> '.$nagrada_h['koll'].' и получаете <img width="24" height="24" alt="мусор" src="/images/header/money_36.png" title="мусор"> '.n_f($nagrada_h['koll']*$nagrada_musor).'% '; 
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$nagrada_h['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$nagrada_h['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$nagrada_h['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$nagrada_h['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$nagrada_h['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$txt."', `kto` = '2', `komy` = '".$nagrada_h['id']."', `time` = '".time()."', `readlen` = '0'");


if($reytnagrada_h == 1){
$suma = 50;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Турнир сувениров', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 2){
$suma = 40;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Турнир сувениров', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 3){
$suma = 30;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Турнир сувениров', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 4){
$suma = 20;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Турнир сувениров', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}
if($reytnagrada_h == 5){
$suma = 10;$bon_rub = $suma;$gold = $suma / 0.01;$bon2 = (($gold * $bon_rub) / 100);if($promotions['promotion_1'] == 1){$rubin = (($gold * $promotions['act_1']) / 100)+$bon2+$gold;}else{$rubin = ($gold+$bon2);}
mysql_query("INSERT INTO `plategi` SET `ank` = '1', `rubin` = '".$rubin."', `suma` = '".$suma."', `time_oplata` = 'Сейчас', `sposob` = 'Турнир сувениров', `valuta` = '1', `time` = '".time()."', `user` = '".$nagrada_h['id']."' ");
}


}

} while ($nagrada_h = mysql_fetch_assoc ($nagrada_hell));




$textqqq = 'Итога Турнира Сувениров.

<b><center>Победители ТОП-10:</center></b>
'.$M1.' <br><br>'.$M2.' <br><br>'.$M3.' <br><br>'.$M4.' <br><br>'.$M5.' <br><br>'.$M6.' <br><br>'.$M7.' <br><br>'.$M8.' <br><br>'.$M9.' <br><br>'.$M10.' <br><br>

Хорошей игры! :)';
////////////////
$name = 'Итоги Турнира Сувениров';
mysql_query("INSERT INTO `forum_topic` SET 
`name` = '".$name."',
`text` = '".$textqqq."',
`user` = '2', 
`time` = '".time()."', 
`open` = '1',
`razdel` = '1' ");

$uid = mysql_insert_id();
$resultqqq = mysql_query("SELECT * FROM `users` WHERE `id`   ");
$rowddd = mysql_fetch_assoc ($resultqqq);
do {
mysql_query("UPDATE `users` SET `news` = '".$uid."', `koll` = '0' WHERE `id` = '".$rowddd['id']."' limit 1");
} while ($rowddd = mysql_fetch_assoc ($resultqqq));

mysql_query('DELETE FROM `halloween` WHERE `id` ');




}










}















// Определение массива для различных уровней VIP
$VIP_levels = [1, 2, 3, 4];

foreach ($VIP_levels as $level) {
    // Получаем данные о текущем уровне VIP
    $VIP_data = mysql_fetch_assoc(mysql_query("SELECT * FROM `VIP` WHERE `time` < '".time()."' AND `VIP` = '$level' LIMIT 1"));

    if ($VIP_data && $VIP_data['time'] < time()) {
        if ($level <= 3) {
            // Для уровней 1-3: если время истекло и флаг 'on' равен 1, удаляем запись
            if ($VIP_data['on'] == 1) {
                mysql_query("DELETE FROM `VIP` WHERE `id` = '" . $VIP_data['id'] . "' ");
            }
        } elseif ($level == 4) {
            // Для уровня 4: особая логика обработки
            if ($VIP_data['on'] == 1) {
                // Если флаг 'on' равен 1, обновляем статус и время перезапуска
                mysql_query("UPDATE `VIP` SET `on` = '0', `time_restart` = '" . (time() + (86400 / 2)) . "' WHERE `id` = '" . $VIP_data['id'] . "' ");
            } elseif ($VIP_data['on'] == 0 && $VIP_data['time_restart'] > 0 && $VIP_data['time_restart'] < time()) {
                // Если флаг 'on' равен 0 и время перезапуска истекло, удаляем запись
                mysql_query("DELETE FROM `VIP` WHERE `id` = '" . $VIP_data['id'] . "' ");
            }
        }
    }
}





$inv = mysql_fetch_assoc(mysql_query("SELECT * FROM `ref` WHERE `id_us` = '".$user['id']."'")); // айди кого пригласили
$us_bon = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$inv['nak']."'")); // переменная кого пригласили
$ank_bon = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$inv['id_us']."'")); // переменная кого пригласили
if($ank_bon['game_time'] >= 7200 and $inv['bon'] == 0){
mysql_query("UPDATE `users` SET `ref_turnir` = '".($us_bon['ref_turnir']+1)."', `rubin` = '".($us_bon['rubin']+1000)."'  WHERE `id` = '".$us_bon['id']."'");

$text = 'Здравствуйте! Вы получили Бонус 1000 рубинов за активного реферала';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us_bon['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us_bon['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$us_bon['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us_bon['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us_bon['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$us_bon['id']."', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `ref` SET `bon` = '1' WHERE `id_us` = '".$user['id']."' ");
}



if($user['time_perevod'] == 0 and $user['limit_perevod'] >= 50000) {
mysql_query("UPDATE `users` SET `time_perevod` = '".($user['time_perevod']=(time()+86400))."' WHERE `id` = '".$user['id']."' ");
}
if($user['time_perevod'] < time() && $user['time_perevod'] > 0) {
mysql_query("UPDATE `users` SET `limit_perevod` = '0', `time_perevod` = '0' WHERE `id` = '".$user['id']."' ");
}






function calculateDohodMnogit($level) {
    // Возвращаем 2^level как строку с помощью bcpow
    // $level должен быть числом или строкой — можно использовать toBC для гарантии
    return bcpow('2', toBC($level), 0);
}

$level = toBC($user['gragdanstvo']);
$mnogitel = calculateDohodMnogit($level);

// Преобразуем prestig_mnogit
$prestig_mnogit = (bccomp(toBC($user['prestig_mnogit']), '0', 10) > 0) 
    ? toBC($user['prestig_mnogit']) 
    : '0';

// Преобразуем mnogit_boy
$mnogit_b = (bccomp(toBC($user['mnogit_boy']), '0', 10) > 0) 
    ? toBC($user['mnogit_boy']) 
    : '1';

// Преобразуем dohod_x2_ в строку (чтобы избежать ошибок)
$dohod_x2 = toBC($user['dohod_x2_']);

// Вычисляем dohod_m = prestig_mnogit + mnogit_b * mnogitel * dohod_x2
$temp = bcmul($mnogit_b, $mnogitel, 10);
$temp = bcmul($temp, $dohod_x2, 10);
$dohod_m = bcadd($prestig_mnogit, $temp, 10);
$dohod_m = toBC($dohod_m);





if($user['proverka_time'] < time() && $user['proverka_time'] > 0){
$text = 'Игрок '.nick($user['id']).' не подтвердил, что он не бот.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
mysql_query("UPDATE `users` SET `proverka` = '0', `proverka_time` = '0' WHERE `id` = '".$user['id']."' limit 1");
}


if($sql['game_day_time'] < time() and $user['id'] == 1) { // подсчет дней игры
mysql_query("UPDATE `settings` SET `game_day_time` = '".($sql['game_day_time'] = (time()+86400) )."', `game_day` = '".($sql['game_day'] + 1000 )."' WHERE `id` = '1' LIMIT 1");
}
if($user['dostup_perevod'] == 1 and $user['lim_perevod'] <= 0){
mysql_query("UPDATE `users` SET `dostup_perevod` = '0' WHERE `id` = '".$user['id']."' LIMIT 1");
}
if($garbage_time_['time'] < time() ) {
mysql_query('DELETE FROM `garbage_time` WHERE `time` < '.(time()).' ');
}
if($user['pred_time'] < time() and $user['spec_pred'] != 0){
mysql_query("UPDATE `users` SET `spec_pred` = '0', `pred_time` = '0' WHERE `id` = '".$user['id']."' ");
}
$rand_spec = rand(1,3);
if($user['spec_pred'] == 0){
mysql_query("UPDATE `users` SET `spec_pred` = '".$rand_spec."', `pred_time` = '".(time()+7200)."' WHERE `id` = '".$user['id']."' ");
}
$fdfgvfgdfgdf = mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `time` = '0' "),0);
if($fdfgvfgdfgdf > 0 ){
mysql_query("UPDATE `corporate_card` SET `time` = '".(time()+(86400*5))."' WHERE `time` = '0' ");
}
$dfdfdgfdg = mysql_result(mysql_query("SELECT COUNT(*) FROM `corporate_card` WHERE `xxx` = '0' "),0);
if($dfdfdgfdg > 0 ){
mysql_query("UPDATE `corporate_card` SET `xxx` = '1' WHERE `xxx` = '0' ");
}



















$prem__ = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium` WHERE (`time_restart` < '".time()."' and `time_restart` > '0') or (`time` < '".time()."' and `time` > '0') "));
if ($prem__) {
    $prem = mysql_query("SELECT * FROM `premium` WHERE (`time_restart` < '".time()."' and `time_restart` > '0') or (`time` < '".time()."' and `time` > '0') ");
    $pr = mysql_fetch_assoc($prem);
    do {
        $us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pr['user']."'"));
        $corp_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id` = '".$us['corp']."'"));

        if ($pr['premium'] == 0 && $pr['premium_angel'] != 0 && ($pr['time_restart'] <= time() && $pr['time_restart'] > 0)) {
            mysql_query('DELETE FROM `premium` WHERE `id` = '.$pr['id']);
        } else {
            if ($pr['premium'] > 0 && $pr['premium_angel'] > 0 && ($pr['time'] <= time() && $pr['time'] > 0)) {
                mysql_query("UPDATE `premium` SET `time` = '0', `time_restart` = '".(time() + 43200)."', `premium` = '0' WHERE `id` = '".$pr['id']."'");

                $us_angel = toBC($us['angel']);
                $pr_premium_angel = toBC($pr['premium_angel']);
                $corp_angel = toBC($corp_['angel']);

                // Проверяем, что angel - premium_angel > 0, иначе оставляем angel без изменений
                $new_us_angel = (bccomp(bcsub($us_angel, $pr_premium_angel, 10), '0', 10) > 0)
                    ? bcsub($us_angel, $pr_premium_angel, 10)
                    : $us_angel;

                $new_corp_angel = (bccomp(bcsub($corp_angel, $pr_premium_angel, 10), '0', 10) > 0)
                    ? bcsub($corp_angel, $pr_premium_angel, 10)
                    : $corp_angel;

                mysql_query("UPDATE `users` SET `angel` = '$new_us_angel', `premium` = '0', `ass_br` = '".($us['ass_br'] + 1)."' WHERE `id` = '".$us['id']."'");
                mysql_query("UPDATE `corp` SET `angel` = '$new_corp_angel' WHERE `id` = '".$corp_['id']."'");

                $msg = '<b>Премиум</b> Действие премиума закончилось.';
                mysql_query("INSERT INTO `ass_br` SET `msg` = '".$msg."', `avtor` = '".$us['id']."', `clan_id` = '".$us['corp']."', `time` = '".time()."'");

                $text = '<b>Премиум</b> Действие премиума закончилось.';
                $con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' and `kto` = '2' LIMIT 1"), 0);
                if ($con == 0) {
                    mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
                    mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
                }
                mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$us['id']."' limit 1");
                mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$us['id']."' limit 1");
                mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");
            }
        }
    } while ($pr = mysql_fetch_assoc($prem));
}









$prem_m__ = mysql_fetch_assoc(mysql_query("SELECT * FROM `premium_musor` WHERE (`time_restart` < '".time()."' AND `time_restart` > 0) OR (`time` < '".time()."' AND `time` > 0) "));
if ($prem_m__) {
    $prem_m = mysql_query("SELECT * FROM `premium_musor` WHERE (`time_restart` < '".time()."' AND `time_restart` > 0) OR (`time` < '".time()."' AND `time` > 0) ");
    $pr_ = mysql_fetch_assoc($prem_m);
    do {
        $us = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pr_['user']."'"));
        $soyz_ = mysql_fetch_assoc(mysql_query("SELECT * FROM `soyz` WHERE `id` = '".$us['soyz']."'"));

        if ($pr_['premium_musor'] == 0 && $pr_['premium_musor_proc'] != 0 && ($pr_['time_restart'] <= time() && $pr_['time_restart'] > 0)) {
            mysql_query("DELETE FROM `premium_musor` WHERE `id` = '".$pr_['id']."'");
        } else {
            if ($pr_['premium_musor'] > 0 && $pr_['premium_musor_proc'] > 0 && ($pr_['time'] <= time() && $pr_['time'] > 0)) {
                mysql_query("UPDATE `premium_musor` SET `time` = '0', `time_restart` = '".(time() + 43200)."', `premium_musor` = '0' WHERE `id` = '".$pr_['id']."'");

                $us_musor_proc = toBC($us['musor_proc']);
                $pr_musor_proc = toBC($pr_['premium_musor_proc']);
                $soyz_musor = toBC($soyz_['musor']);

                // Проверяем, что musor_proc - premium_musor_proc > 0, иначе оставляем значение без изменений
                $new_us_musor_proc = (bccomp(bcsub($us_musor_proc, $pr_musor_proc, 10), '0', 10) > 0)
                    ? bcsub($us_musor_proc, $pr_musor_proc, 10)
                    : $us_musor_proc;

                $new_soyz_musor = (bccomp(bcsub($soyz_musor, $pr_musor_proc, 10), '0', 10) > 0)
                    ? bcsub($soyz_musor, $pr_musor_proc, 10)
                    : $soyz_musor;

                mysql_query("UPDATE `users` SET `musor_proc` = '$new_us_musor_proc', `premium_musor` = '0', `soyz_ass` = '".($us['soyz_ass'] + 1)."' WHERE `id` = '".$us['id']."'");
                mysql_query("UPDATE `soyz` SET `musor` = '$new_soyz_musor' WHERE `id` = '".$soyz_['id']."'");

                $msg = '<b>Премиум</b> Действие премиума коллекций закончилось.';
                mysql_query("INSERT INTO `soyz_ass` SET `msg` = '".$msg."', `avtor` = '".$us['id']."', `clan_id` = '".$us['soyz']."', `time` = '".time()."'");

                $con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$us['id']."' AND `kto` = '2' LIMIT 1"), 0);
                if ($con == 0) {
                    mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$us['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
                    mysql_query("INSERT INTO `message_c` SET `kto` = '".$us['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
                }
                mysql_query("UPDATE `message_c` SET `posl_time` = '".time()."' WHERE `kogo` = '2' AND `kto` = '".$us['id']."' LIMIT 1");
                mysql_query("UPDATE `message_c` SET `posl_time` = '".time()."' WHERE `kto` = '2' AND `kogo` = '".$us['id']."' LIMIT 1");
                mysql_query("INSERT INTO `message` SET `text` = '".$msg."', `kto` = '2', `komy` = '".$us['id']."', `time` = '".time()."', `readlen` = '0'");
            }
        }
    } while ($pr_ = mysql_fetch_assoc($prem_m));
}















$Improvements = mysql_fetch_assoc(mysql_query("SELECT * FROM `Improvements` WHERE `user` = '".$user['id']."'"));
if(!$Improvements) {
mysql_query("INSERT INTO `Improvements` SET `user` = '".$user['id']."' ");
}






if($pve1['time'] < time() and $pve1['time_pve'] == 0) {

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// очистка 
$testsccc = mysql_query("SELECT * FROM `pve_zayavki` WHERE `id` ");
$tsccct = mysql_fetch_assoc ($testsccc);
do {
$userser = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$tsccct['user']."' "));
if($userser['viz'] < (time()-60) ){
mysql_query('DELETE FROM `pve_zayavki` WHERE `user` = '.$userser['id'].' ');

$textccc = '<b>Сражения</b> Вы были удалены из битвы за неактивность. Чтобы принять участие в битвах необходимо быть онлайн во время битвы.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$userser['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$userser['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$userser['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$userser['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$userser['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$textccc."', `kto` = '2', `komy` = '".$userser['id']."', `time` = '".time()."', `readlen` = '0'");
}
if($user['id']==1){
//echo '3';
}
} while ($tsccct = mysql_fetch_assoc ($testsccc));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////



mysql_query("UPDATE `pve` SET `time`= '".(time()+(3600*8))."', `time_pve`= '".(time()+(300*2))."',
`top_1_uron`= '0',
`top_2_uron`= '0',
`top_3_uron`= '0',
`top_4_uron`= '0',
`top_5_uron`= '0',
`uron_1`= '0',
`uron_2`= '0',
`uron_3`= '0',
`uron_4`= '0',
`uron_5`= '0',
`top_1_kill`= '0',
`top_2_kill`= '0',
`top_3_kill`= '0',
`top_4_kill`= '0',
`top_5_kill`= '0',
`kill_1`= '0',
`kill_2`= '0',
`kill_3`= '0',
`kill_4`= '0',
`kill_5`= '0',
`time_pve_boy`= '0',
`user_vigilo`= '0',
`bot_vigilo`= '0',
`where_user`= '0',
`user`= '0',
`where_bot`= '0'
WHERE `id` = '".$pve1['id']."' ");
}






if($pve1['time_pve'] != 0) {
	
$pve_bot = mysql_query('SELECT * FROM `pve_bot` WHERE `kill` = "0" and (`act` = "'.$user['id'].'" or `act1` = "'.$user['id'].'" or `act2` = "'.$user['id'].'" or `act3` = "'.$user['id'].'" or `act4` = "'.$user['id'].'" or `act5` = "'.$user['id'].'") ');
$pve_bot = mysql_fetch_assoc($pve_bot); // бот который выбран у меня как цель

$pve_user = mysql_query('SELECT * FROM `pve_zayavki` WHERE `user` = "'.$user['id'].'" ');
$pve_user = mysql_fetch_assoc($pve_user); // я в заявках

//$pve_bot_attack = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$pve_user['act']."'")); // мой противник
$pve_bot_attack = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_bot` WHERE `id` = '".$pve_user['act']."'")); // мой противник



if($pve1['boy_vid'] == 1 and $pve1['time_pve'] != 0 ){




$count1212 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') "),0);
$m1212  = rand(0,$count1212); 
$query1212 = "SELECT * FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') Limit $m1212, 1"; 
$rand_id1212 = mysql_fetch_assoc(mysql_query($query1212));

$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `pve_bot` WHERE `kill` = '0' and (`act` = '0' or `act1` = '0' or `act2` = '0' or `act3` = '0' or `act4` = '0' or `act5` = '0') Limit $m, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query));


if($rand_id1212 == 0 or $count1212 == 1){
$rand_id = $rand_id1;
}else{
$rand_id = $rand_id1212;
}


$jgjghjg = mysql_query("SELECT * FROM `pve_bot` WHERE `kill` = '0' and `act` != '0' and `act1` != '0' and `act2` != '0' and `act3` != '0' and `act4` != '0' and `act5` != '0' ");
$dfds = mysql_fetch_assoc ($jgjghjg);
do {
if($dfds['act'] != 0 and $dfds['act1'] != 0 and $dfds['act2'] != 0 and $dfds['act3'] != 0 and $dfds['act4'] != 0 and $dfds['act5'] != 0 ){
mysql_query("UPDATE `pve_bot` SET `act` = '0', `act1` = '0', `act2` = '0', `act3` = '0', `act4` = '0', `act5` = '0' WHERE `id` = '".$dfds['id']."' ");
}
if($user['id']==1){
//echo '4';
}
} while ($dfds = mysql_fetch_assoc ($jgjghjg));

if($pve_user['act'] != 0 and $pve_bot['act'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act1'] != 0 and $pve_bot['act1'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act2'] != 0 and $pve_bot['act2'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act3'] != 0 and $pve_bot['act3'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act4'] != 0 and $pve_bot['act4'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}
elseif($pve_user['act5'] != 0 and $pve_bot['act5'] == 0 ){mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$pve_bot_attack['id']."' ");}

$ewqewewqe = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_bot` WHERE `kill` = '0' and (`act` = '".$user['id']."' or `act1` = '".$user['id']."' or `act2` = '".$user['id']."' or `act3` = '".$user['id']."' or `act4` = '".$user['id']."' or `act5` = '".$user['id']."') "),0);
if($ewqewewqe <= 0){
if(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}elseif(($pve_bot_attack['act'] == 0 or $pve_bot_attack['act'] != $user['id'] ) and ($pve_bot_attack['act1'] == 0 or $pve_bot_attack['act1'] != $user['id'] ) and ($pve_bot_attack['act2'] == 0 or $pve_bot_attack['act2'] != $user['id'] ) and ($pve_bot_attack['act3'] == 0 or $pve_bot_attack['act3'] != $user['id'] ) and ($pve_bot_attack['act4'] == 0 or $pve_bot_attack['act4'] != $user['id'] ) and ($pve_bot_attack['act5'] == 0 or $pve_bot_attack['act5'] != $user['id'] ) ){
mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."' WHERE `id` = '".$pve_bot_attack['id']."' ");
}
}

if($pve_user['act'] == 0 or $pve_bot_attack['kill'] == 1 ){ // если у меня нету противника (до пустим при старте сражения)
// присваеваем боту в поле act свой айди, что бы знать кто атакует бота, так же пишем через учловия, так как максимум могут бить 5 чел одного бота


if($pve_bot['act'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act1'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act1`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act2'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act2`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act3'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act3`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act4'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act4`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}elseif($pve_bot['act5'] == 0 ){
mysql_query("UPDATE `pve_bot` SET `act5`= '".$user['id']."', `time_manevr`= '".($pve_bot['time_manevr'] = (time()+60) )."', `time_attack`= '".($pve_bot['time_attack'] = (time()+10) )."' WHERE `id` = '".$rand_id['id']."' ");
}
mysql_query("UPDATE `pve_zayavki` SET `act`= '".$rand_id['id']."' WHERE `id` = '".$pve_user['id']."' ");
}



}else{




$count1212 = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `rank` = '".$pve_user['rank']."' and `user` != '".$pve_user['user']."' "),0);
$m1212  = rand(0,$count1212); 
$query1212 = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `rank` = '".$pve_user['rank']."' and `user` != '".$pve_user['user']."' Limit $m1212, 1"; 
$rand_id1212 = mysql_fetch_assoc(mysql_query($query1212));

$count = mysql_result(mysql_query("SELECT COUNT(*) FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' "),0);
$m  = rand(0,$count); 
$query = "SELECT * FROM `pve_zayavki` WHERE `kill` = '0' and `user` != '".$pve_user['user']."' Limit $m, 1"; 
$rand_id1 = mysql_fetch_assoc(mysql_query($query));


if($rand_id1212 == 0 or $count1212 == 1){
$rand_id = $rand_id1;
}else{
$rand_id = $rand_id1212;
}

if($pve_user['act'] <= 0){
mysql_query("UPDATE `pve_zayavki` SET `act` = '".$rand_id['user']."' WHERE `id` = '".$pve_user['id']."' ");
}



}



}



















$mission = mysql_fetch_assoc(mysql_query('SELECT * FROM `mission` WHERE `id` '));
$mission_user = mysql_fetch_assoc(mysql_query('SELECT * FROM `mission_user` WHERE `user` = "'.$user['id'].'"'));

$mission_user_time_coll = mysql_result(mysql_query("SELECT COUNT(*) FROM `mission_user` WHERE `user` = '".$user['id']."' and `time_restart` < ".(time())." and `time_restart` > '0' "),0);
$mission_user_time_coll_ = mysql_result(mysql_query("SELECT COUNT(*) FROM `mission_user` WHERE `user` = '".$user['id']."' "),0);
if(!$mission_user){

////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Миссии
$mission = mysql_query("SELECT * FROM `mission` WHERE `id` ");
$misss = mysql_fetch_assoc ($mission);
do {
mysql_query("INSERT INTO `mission_user` SET `prog_max` = '".$misss['prog']."', `number`  = '".$misss['id']."', `user`  = '".$user['id']."', `prog` = '".$misss['prog']."', `rubin` = '".$misss['rubin']."', `key` = '".$misss['key']."', `text` = '".$misss['text']."' ");
if($user['id']==1){
//echo '5';
}
} while ($misss = mysql_fetch_assoc ($mission));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
if($mission_user_time_coll_ > 34){
mysql_query('DELETE FROM `mission_user` WHERE `user` = "'.$user['id'].'" ');
}


if($mission_user_time_coll > 0){
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Миссии
$missionn = mysql_query("SELECT * FROM `mission_user` WHERE `user` = '".$user['id']."' and `time_restart` < ".(time())." and `time_restart` > '0' ");
$misssn = mysql_fetch_assoc ($missionn);
do {
if($misssn['number'] == 27){$rubbbb = 500;$keyyyy = 5;}else{$rubbbb = 50;$keyyyy = 1;}
mysql_query("UPDATE `mission_user` SET `level` = '1', `prog_` = '0', `time_restart` = '0', `rubin` = '".$rubbbb."' , `key` = '".$keyyyy."' WHERE `id` = '".$misssn['id']."' ");
if($user['id']==1){
//echo '6';
}
} while ($misssn = mysql_fetch_assoc ($missionn));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}




$biznessss = mysql_fetch_assoc(mysql_query('SELECT * FROM `user_biznes_1` WHERE `user` = "'.$user['id'].'"'));
if(!$biznessss){
mysql_query("INSERT INTO `user_biznes_1` SET `name` = 'Космопорт', `images` = '1', `dohod` = '1',`cena` = '1', `biznes_dohod` = '1', `user` = '".$user['id']."', `id_room` = '1' ");
mysql_query("UPDATE `users` SET `biznes` = '1' WHERE `id` = '".$user['id']."' ");

$fgfg = '<b>Бизнесы удалены.</b> Все Ваши бизнесы были удалены за отсутствие в игре более 7 дней. <br>
Не переживайте, Ваш доход на месте, просто скупите все бизнесы по новой.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '".$user['id']."' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '".$user['id']."', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '".$user['id']."', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='".$user['id']."' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='".$user['id']."' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$fgfg."', `kto` = '2', `komy` = '".$user['id']."', `time` = '".time()."', `readlen` = '0'");
}





$Achievements_user = mysql_fetch_assoc(mysql_query('SELECT * FROM `Achievements_user` WHERE `user` = "'.$user['id'].'"'));
$Achievements_user_coll = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '".$user['id']."' "),0);
$Achievements_user_coll_done_1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `Achievements_user` WHERE `user` = '".$user['id']."' and `done` = '1' "),0);

if($user['mine_vip'] == 0){
$rock_Diamonds_Achievements = ($Achievements_user_coll_done_1*2);
}else{
$rock_Diamonds_Achievements = 68;
}


if(!$Achievements_user){
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Миссии
$Ac_user = mysql_query("SELECT * FROM `Achievements` WHERE `id` ");
$a_uu = mysql_fetch_assoc ($Ac_user);
do {
mysql_query("INSERT INTO `Achievements_user` SET `number`  = '".$a_uu['id']."', `user`  = '".$user['id']."', `prog_max` = '".$a_uu['prog']."', `text` = '".$a_uu['text']."' ");
} while ($a_uu = mysql_fetch_assoc ($Ac_user));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}

if($Achievements_user_coll > 34){
mysql_query('DELETE FROM `Achievements_user` WHERE `user` = "'.$user['id'].'" ');
}











/*
######################################################################### Ш А Х Т Ы ###########################################################################
$coll_mines = mysql_result(mysql_query("SELECT COUNT(*) FROM `mines_user` WHERE `user` = '".$user['id']."' "),0);
if($coll_mines != 0){

if($user['mines_time_sbor'] < time()){
$erwer = mysql_query("SELECT * FROM `mines_user` WHERE `user` = '".$user['id']."' ");
$sadasd = mysql_fetch_assoc ($erwer);
do {

$kolvo11 = time() - $user['last_update'];    // сколько сек юзер пропустил
if($kolvo11 <= 60){
$mnogit111 = 1;
}else{
$mnogit111 = ($kolvo11/60) ;
}

$production_v_1min = floor(($sadasd['production']/60)*$mnogit111); // добыча в минуту с шахты игрока
mysql_query("UPDATE `mines_user` SET `production_new` = '".($sadasd['production_new']+$production_v_1min)."' WHERE `id` = '".$sadasd['id']."' ");
} while ($sadasd = mysql_fetch_assoc ($erwer));
mysql_query("UPDATE `users` SET `mines_time_sbor` = '".(time()+60)."' WHERE `id` = '".$user['id']."' ");
}


//echo '<span id="time_'.($user['mines_time_sbor']-time()).'000">'._time($user['mines_time_sbor']-time()).'</span>'; 
}
############################################################################# К О Н Е Ц ###########################################################################

*/



















////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Кач
$kach = mysql_fetch_assoc(mysql_query('SELECT * FROM `kach` WHERE `ank` = "'.$user['id'].'"'));
$ka = mysql_fetch_assoc(mysql_query('SELECT * FROM `kach` WHERE `time_kach` < "'.time().'" '));
if($ka['time_kach'] <= time() and $ka['time_kach'] > 0){
$corp2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `corp` WHERE `id`  = '".$ka['corp']."'"));
$user2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$ka['ank']."'"));

$diff_angel = bcsub(toBC($corp2['angel']), toBC($user2['angel']), 10);
if (bccomp($diff_angel, '0', 10) <= 0) {
    // Если разница <= 0, оставляем значение corp2['angel'] без изменений
    $new_angel = toBC($corp2['angel']);
} else {
    // Иначе берем рассчитанную разницу
    $new_angel = toBC($diff_angel);
}

// Если по rock нужно так же (замени, если нет необходимости)
$diff_rock = bcsub(toBC($corp2['rock']), toBC($user2['rock']), 10);
if (bccomp($diff_rock, '0', 10) <= 0) {
    $new_rock = toBC($corp2['rock']);
} else {
    $new_rock = toBC($diff_rock);
}

mysql_query("UPDATE `corp` SET `angel` = '$new_angel', `rock` = '$new_rock' WHERE `id` = '{$ka['corp']}' LIMIT 1");

mysql_query("UPDATE `users` SET `corp` = '0',  `corp_rang` = '0', `corp_rubin` = '0' WHERE `id` = '$ka[ank]'");
mysql_query('DELETE FROM `time_day` WHERE `user` = '.$ka['ank'].' ');
mysql_query('DELETE FROM `musor_time` WHERE `user` = '.$ka['ank'].' ');
mysql_query('DELETE FROM `kach` WHERE `ank` = '.$ka['ank'].' ');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Кач
$kach_soyz = mysql_fetch_assoc(mysql_query('SELECT * FROM `kach_soyz` WHERE `ank` = "'.$user['id'].'"'));
$kach_soyz_ = mysql_fetch_assoc(mysql_query('SELECT * FROM `kach_soyz` WHERE `time_kach` < "'.time().'" '));
if($kach_soyz_['time_kach'] <= time() and $kach_soyz_['time_kach'] > 0){
mysql_query("UPDATE `users` SET `soyz` = '0',  `soyz_rang` = '0', `soyz_rubin` = '0' WHERE `id` = '$kach_soyz_[ank]'");
mysql_query('DELETE FROM `time_day_soyz` WHERE `user` = '.$kach_soyz_['ank'].' ');
mysql_query('DELETE FROM `musor_time_soyz` WHERE `user` = '.$kach_soyz_['ank'].' ');
mysql_query('DELETE FROM `kach_soyz` WHERE `ank` = '.$kach_soyz_['ank'].' ');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Кач





$pve_vip = mysql_fetch_assoc(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$user['id'].'"'));
if($pve_vip['act'] <= 0){
mysql_query("UPDATE `users` SET `u` = '".($user['u']-$pve_vip['u'])."', `z` = '".($user['z']-$pve_vip['z'])."', `h` = '".($user['h']-$pve_vip['h'])."' WHERE `id` = '".$user['id']."' ");
mysql_query('DELETE FROM `pve_vip` WHERE `user` = '.$user['id'].' ');
}





$vip_mnogit = mysql_fetch_assoc(mysql_query("SELECT * FROM `vip_mnogit` WHERE `user` = '".$user['id']."' "));

if ($vip_mnogit['time'] < time()) {
    // Вычитаем mnozit_boy через BCMath
    $diff_mnogit_boy = bcsub(toBC($user['mnogit_boy']), toBC($vip_mnogit['mnogit_boy']), 10);

    // Если результат <= 0, оставляем 0, иначе - результат
    $new_mnogit_boy = (bccomp($diff_mnogit_boy, '0', 10) <= 0) ? '0' : toBC($diff_mnogit_boy);

    mysql_query("UPDATE `users` SET `mnogit_boy` = '$new_mnogit_boy' WHERE `id` = '".$user['id']."' ");
    mysql_query('DELETE FROM `vip_mnogit` WHERE `id` = "'.$vip_mnogit['id'].'" ');
}

if ($user['mnogit_boy'] > 0 && $vip_mnogit['mnogit_boy'] > 0 && $user['mnogit_boy'] < $vip_mnogit['mnogit_boy']) {
    // Складываем mnozit_boy через BCMath
    $sum_mnogit_boy = bcadd(toBC($user['mnogit_boy']), toBC($vip_mnogit['mnogit_boy']), 10);

    mysql_query("UPDATE `users` SET `mnogit_boy` = '$sum_mnogit_boy' WHERE `id` = '".$user['id']."' ");
}





/*


if($user['id']==1){
////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Миссии
$fgbgbb = mysql_query("SELECT * FROM `Improvements` WHERE `id` ");
$Improvements__ = mysql_fetch_assoc ($fgbgbb);
do {
$pve_vip__ = mysql_fetch_assoc(mysql_query('SELECT * FROM `pve_vip` WHERE `user` = "'.$Improvements__['user'].'"'));
$user__ = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$Improvements__['user']."'"));

################################################################################################# УЛУЧШЕНИЯ
if($Improvements__['u_imp_lvl'] == 10 and $Improvements__['u_imp'] != 136){
mysql_query("UPDATE `Improvements` SET `u_imp` = '136' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 10 and $Improvements__['z_imp'] != 136){
mysql_query("UPDATE `Improvements` SET `z_imp` = '136' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 10 and $Improvements__['h_imp'] != 136){
mysql_query("UPDATE `Improvements` SET `h_imp` = '136' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['u_imp_lvl'] == 20 and $Improvements__['u_imp'] != 571){
mysql_query("UPDATE `Improvements` SET `u_imp` = '571' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 20 and $Improvements__['z_imp'] != 571){
mysql_query("UPDATE `Improvements` SET `z_imp` = '571' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 20 and $Improvements__['h_imp'] != 571){
mysql_query("UPDATE `Improvements` SET `h_imp` = '571' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['u_imp_lvl'] == 30 and $Improvements__['u_imp'] != 1306){
mysql_query("UPDATE `Improvements` SET `u_imp` = '1306' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 30 and $Improvements__['z_imp'] != 1306){
mysql_query("UPDATE `Improvements` SET `z_imp` = '1306' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 30 and $Improvements__['h_imp'] != 1306){
mysql_query("UPDATE `Improvements` SET `h_imp` = '1306' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['u_imp_lvl'] == 40 and $Improvements__['u_imp'] != 2341){
mysql_query("UPDATE `Improvements` SET `u_imp` = '2341' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 40 and $Improvements__['z_imp'] != 2341){
mysql_query("UPDATE `Improvements` SET `z_imp` = '2341' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 40 and $Improvements__['h_imp'] != 2341){
mysql_query("UPDATE `Improvements` SET `h_imp` = '2341' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['u_imp_lvl'] == 50 and $Improvements__['u_imp'] != 3676){
mysql_query("UPDATE `Improvements` SET `u_imp` = '3676' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 50 and $Improvements__['z_imp'] != 3676){
mysql_query("UPDATE `Improvements` SET `z_imp` = '3676' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 50 and $Improvements__['h_imp'] != 3676){
mysql_query("UPDATE `Improvements` SET `h_imp` = '3676' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['u_imp_lvl'] == 60 and $Improvements__['u_imp'] != 5311){
mysql_query("UPDATE `Improvements` SET `u_imp` = '5311' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 60 and $Improvements__['z_imp'] != 5311){
mysql_query("UPDATE `Improvements` SET `z_imp` = '5311' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 60 and $Improvements__['h_imp'] != 5311){
mysql_query("UPDATE `Improvements` SET `h_imp` = '5311' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['u_imp_lvl'] == 70 and $Improvements__['u_imp'] != 5611){
mysql_query("UPDATE `Improvements` SET `u_imp` = '5611' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 70 and $Improvements__['z_imp'] != 5611){
mysql_query("UPDATE `Improvements` SET `z_imp` = '5611' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 70 and $Improvements__['h_imp'] != 5611){
mysql_query("UPDATE `Improvements` SET `h_imp` = '5611' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['u_imp_lvl'] == 80 and $Improvements__['u_imp'] != 7846){
mysql_query("UPDATE `Improvements` SET `u_imp` = '7846' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['z_imp_lvl'] == 80 and $Improvements__['z_imp'] != 7846){
mysql_query("UPDATE `Improvements` SET `z_imp` = '7846' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['h_imp_lvl'] == 80 and $Improvements__['h_imp'] != 7846){
mysql_query("UPDATE `Improvements` SET `h_imp` = '7846' WHERE `id` = '".$Improvements__['id']."' ");
}
#################################################################################################


################################################################################################# МОДИФИКАЦИЯ
if($Improvements__['mod'] == 10 and $Improvements__['mod_param'] != 136){
mysql_query("UPDATE `Improvements` SET `mod_param` = '136' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['mod'] == 20 and $Improvements__['mod_param'] != 571){
mysql_query("UPDATE `Improvements` SET `mod_param` = '571' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['mod'] == 30 and $Improvements__['mod_param'] != 1306){
mysql_query("UPDATE `Improvements` SET `mod_param` = '1306' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['mod'] == 40 and $Improvements__['mod_param'] != 2341){
mysql_query("UPDATE `Improvements` SET `mod_param` = '2341' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['mod'] == 50 and $Improvements__['mod_param'] != 3676){
mysql_query("UPDATE `Improvements` SET `mod_param` = '3676' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['mod'] == 60 and $Improvements__['mod_param'] != 5311){
mysql_query("UPDATE `Improvements` SET `mod_param` = '5311' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['mod'] == 70 and $Improvements__['mod_param'] != 5611){
mysql_query("UPDATE `Improvements` SET `mod_param` = '5611' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['mod'] == 80 and $Improvements__['mod_param'] != 7846){
mysql_query("UPDATE `Improvements` SET `mod_param` = '7846' WHERE `id` = '".$Improvements__['id']."' ");
}
#################################################################################################


################################################################################################# ТРЕНИРОВКА
if($Improvements__['trine_u'] == 10 and $Improvements__['trine_param_u'] != 136){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '136' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 10 and $Improvements__['trine_param_z'] != 136){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '136' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_h'] == 10 and $Improvements__['trine_param_h'] != 136){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '136' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['trine_u'] == 20 and $Improvements__['trine_param_u'] != 571){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '571' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 20 and $Improvements__['trine_param_z'] != 571){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '571' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_h'] == 20 and $Improvements__['trine_param_h'] != 571){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '571' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['trine_u'] == 30 and $Improvements__['trine_param_u'] != 1306){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '1306' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 30 and $Improvements__['trine_param_z'] != 1306){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '1306' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_h'] == 30 and $Improvements__['trine_param_h'] != 1306){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '1306' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['trine_u'] == 40 and $Improvements__['trine_param_u'] != 2341 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '2341 ' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 40 and $Improvements__['trine_param_z'] != 2341 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '2341 ' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_h'] == 40 and $Improvements__['trine_param_h'] != 2341 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '2341 ' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['trine_u'] == 50 and $Improvements__['trine_param_u'] != 3676 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '3676 ' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 50 and $Improvements__['trine_param_z'] != 3676 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '3676 ' WHERE `id` = '".$Improvements__['id']."' ");
} 
if($Improvements__['trine_h'] == 50 and $Improvements__['trine_param_h'] != 3676 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '3676 ' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['trine_u'] == 60 and $Improvements__['trine_param_u'] != 5311 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '5311 ' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 60 and $Improvements__['trine_param_z'] != 5311 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '5311 ' WHERE `id` = '".$Improvements__['id']."' ");
} 
if($Improvements__['trine_h'] == 60 and $Improvements__['trine_param_h'] != 5311 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '5311 ' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['trine_u'] == 70 and $Improvements__['trine_param_u'] != 5611 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '5611 ' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 70 and $Improvements__['trine_param_z'] != 5611 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '5611 ' WHERE `id` = '".$Improvements__['id']."' ");
} 
if($Improvements__['trine_h'] == 70 and $Improvements__['trine_param_h'] != 5611 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '5611 ' WHERE `id` = '".$Improvements__['id']."' ");
}

if($Improvements__['trine_u'] == 80 and $Improvements__['trine_param_u'] != 7846 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '7846 ' WHERE `id` = '".$Improvements__['id']."' ");
}
if($Improvements__['trine_z'] == 80 and $Improvements__['trine_param_z'] != 7846 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '7846 ' WHERE `id` = '".$Improvements__['id']."' ");
} 
if($Improvements__['trine_h'] == 80 and $Improvements__['trine_param_h'] != 7846 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '7846 ' WHERE `id` = '".$Improvements__['id']."' ");
} 
#################################################################################################

$sum_param_u = $Improvements__['u_imp']+$Improvements__['mod_param']+$Improvements__['trine_param_u'];
$sum_param_z = $Improvements__['z_imp']+$Improvements__['mod_param']+$Improvements__['trine_param_z'];
$sum_param_h = $Improvements__['h_imp']+$Improvements__['mod_param']+$Improvements__['trine_param_h'];


if($pve_vip__){
if($pve_vip__['act'] > 0 and $pve_vip__['u'] == 500){
if(($sum_param_u+600) != ($user__['u']) or ($sum_param_z+600) != ($user__['z']) or ($sum_param_h+600) != ($user__['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+600)."', `z` = '".($sum_param_z+600)."', `h` = '".($sum_param_h+600)."' WHERE `id` = '".$user__['id']."' ");
}
}
if($pve_vip__['act'] > 0 and $pve_vip__['u'] == 1000){
if(($sum_param_u+1100) != ($user__['u']) or ($sum_param_z+1100) != ($user__['z']) or ($sum_param_h+1100) != ($user__['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+1100)."', `z` = '".($sum_param_z+1100)."', `h` = '".($sum_param_h+1100)."' WHERE `id` = '".$user__['id']."' ");
}
}
if($pve_vip__['act'] > 0 and $pve_vip__['u'] == 2500){
if(($sum_param_u+2600) != ($user__['u']) or ($sum_param_z+2600) != ($user__['z']) or ($sum_param_h+2600) != ($user__['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+2600)."', `z` = '".($sum_param_z+2600)."', `h` = '".($sum_param_h+2600)."' WHERE `id` = '".$user__['id']."' ");
}
}
if($pve_vip__['act'] > 0 and $pve_vip__['u'] == 4000){
if(($sum_param_u+4100) != ($user__['u']) or ($sum_param_z+4100) != ($user__['z']) or ($sum_param_h+4100) != ($user__['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+4100)."', `z` = '".($sum_param_z+4100)."', `h` = '".($sum_param_h+4100)."' WHERE `id` = '".$user__['id']."' ");
}
}
if($pve_vip__['act'] > 0 and $pve_vip__['u'] == 8000){
if(($sum_param_u+8100) != ($user__['u']) or ($sum_param_z+8100) != ($user__['z']) or ($sum_param_h+8100) != ($user__['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+8100)."', `z` = '".($sum_param_z+8100)."', `h` = '".($sum_param_h+8100)."' WHERE `id` = '".$user__['id']."' ");
}
}
}else{
if(($sum_param_u+100) != ($user__['u']) or ($sum_param_z+100) != ($user__['z']) or ($sum_param_h+100) != ($user__['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+100)."', `z` = '".($sum_param_z+100)."', `h` = '".($sum_param_h+100)."' WHERE `id` = '".$user__['id']."' ");
}
}


} while ($Improvements__ = mysql_fetch_assoc ($fgbgbb));
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}

*/







################################################################################################# УЛУЧШЕНИЯ
if($Improvements['u_imp_lvl'] == 10 and $Improvements['u_imp'] != 136){
mysql_query("UPDATE `Improvements` SET `u_imp` = '136' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 10 and $Improvements['z_imp'] != 136){
mysql_query("UPDATE `Improvements` SET `z_imp` = '136' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 10 and $Improvements['h_imp'] != 136){
mysql_query("UPDATE `Improvements` SET `h_imp` = '136' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 20 and $Improvements['u_imp'] != 571){
mysql_query("UPDATE `Improvements` SET `u_imp` = '571' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 20 and $Improvements['z_imp'] != 571){
mysql_query("UPDATE `Improvements` SET `z_imp` = '571' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 20 and $Improvements['h_imp'] != 571){
mysql_query("UPDATE `Improvements` SET `h_imp` = '571' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 30 and $Improvements['u_imp'] != 1306){
mysql_query("UPDATE `Improvements` SET `u_imp` = '1306' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 30 and $Improvements['z_imp'] != 1306){
mysql_query("UPDATE `Improvements` SET `z_imp` = '1306' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 30 and $Improvements['h_imp'] != 1306){
mysql_query("UPDATE `Improvements` SET `h_imp` = '1306' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 40 and $Improvements['u_imp'] != 2341){
mysql_query("UPDATE `Improvements` SET `u_imp` = '2341' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 40 and $Improvements['z_imp'] != 2341){
mysql_query("UPDATE `Improvements` SET `z_imp` = '2341' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 40 and $Improvements['h_imp'] != 2341){
mysql_query("UPDATE `Improvements` SET `h_imp` = '2341' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 50 and $Improvements['u_imp'] != 3676){
mysql_query("UPDATE `Improvements` SET `u_imp` = '3676' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 50 and $Improvements['z_imp'] != 3676){
mysql_query("UPDATE `Improvements` SET `z_imp` = '3676' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 50 and $Improvements['h_imp'] != 3676){
mysql_query("UPDATE `Improvements` SET `h_imp` = '3676' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 60 and $Improvements['u_imp'] != 5311){
mysql_query("UPDATE `Improvements` SET `u_imp` = '5311' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 60 and $Improvements['z_imp'] != 5311){
mysql_query("UPDATE `Improvements` SET `z_imp` = '5311' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 60 and $Improvements['h_imp'] != 5311){
mysql_query("UPDATE `Improvements` SET `h_imp` = '5311' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 70 and $Improvements['u_imp'] != 5611){
mysql_query("UPDATE `Improvements` SET `u_imp` = '5611' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 70 and $Improvements['z_imp'] != 5611){
mysql_query("UPDATE `Improvements` SET `z_imp` = '5611' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 70 and $Improvements['h_imp'] != 5611){
mysql_query("UPDATE `Improvements` SET `h_imp` = '5611' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 80 and $Improvements['u_imp'] != 7846){
mysql_query("UPDATE `Improvements` SET `u_imp` = '7846' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 80 and $Improvements['z_imp'] != 7846){
mysql_query("UPDATE `Improvements` SET `z_imp` = '7846' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 80 and $Improvements['h_imp'] != 7846){
mysql_query("UPDATE `Improvements` SET `h_imp` = '7846' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 90 and $Improvements['u_imp'] != 10381){
mysql_query("UPDATE `Improvements` SET `u_imp` = '10381' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 90 and $Improvements['z_imp'] != 10381){
mysql_query("UPDATE `Improvements` SET `z_imp` = '10381' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 90 and $Improvements['h_imp'] != 10381){
mysql_query("UPDATE `Improvements` SET `h_imp` = '10381' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['u_imp_lvl'] == 100 and $Improvements['u_imp'] != 13216){
mysql_query("UPDATE `Improvements` SET `u_imp` = '13216' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['z_imp_lvl'] == 100 and $Improvements['z_imp'] != 13216){
mysql_query("UPDATE `Improvements` SET `z_imp` = '13216' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['h_imp_lvl'] == 100 and $Improvements['h_imp'] != 13216){
mysql_query("UPDATE `Improvements` SET `h_imp` = '13216' WHERE `id` = '".$Improvements['id']."' ");
}
#################################################################################################


################################################################################################# МОДИФИКАЦИЯ
if($Improvements['mod'] == 10 and $Improvements['mod_param'] != 136){
mysql_query("UPDATE `Improvements` SET `mod_param` = '136' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 20 and $Improvements['mod_param'] != 571){
mysql_query("UPDATE `Improvements` SET `mod_param` = '571' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 30 and $Improvements['mod_param'] != 1306){
mysql_query("UPDATE `Improvements` SET `mod_param` = '1306' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 40 and $Improvements['mod_param'] != 2341){
mysql_query("UPDATE `Improvements` SET `mod_param` = '2341' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 50 and $Improvements['mod_param'] != 3676){
mysql_query("UPDATE `Improvements` SET `mod_param` = '3676' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 60 and $Improvements['mod_param'] != 5311){
mysql_query("UPDATE `Improvements` SET `mod_param` = '5311' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 70 and $Improvements['mod_param'] != 5611){
mysql_query("UPDATE `Improvements` SET `mod_param` = '5611' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 80 and $Improvements['mod_param'] != 7846){
mysql_query("UPDATE `Improvements` SET `mod_param` = '7846' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 90 and $Improvements['mod_param'] != 10381){
mysql_query("UPDATE `Improvements` SET `mod_param` = '10381' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['mod'] == 100 and $Improvements['mod_param'] != 13216){
mysql_query("UPDATE `Improvements` SET `mod_param` = '13216' WHERE `id` = '".$Improvements['id']."' ");
}
#################################################################################################


################################################################################################# ТРЕНИРОВКА
if($Improvements['trine_u'] == 10 and $Improvements['trine_param_u'] != 136){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '136' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 10 and $Improvements['trine_param_z'] != 136){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '136' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_h'] == 10 and $Improvements['trine_param_h'] != 136){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '136' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 20 and $Improvements['trine_param_u'] != 571){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '571' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 20 and $Improvements['trine_param_z'] != 571){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '571' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_h'] == 20 and $Improvements['trine_param_h'] != 571){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '571' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 30 and $Improvements['trine_param_u'] != 1306){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '1306' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 30 and $Improvements['trine_param_z'] != 1306){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '1306' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_h'] == 30 and $Improvements['trine_param_h'] != 1306){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '1306' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 40 and $Improvements['trine_param_u'] != 2341 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '2341 ' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 40 and $Improvements['trine_param_z'] != 2341 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '2341 ' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_h'] == 40 and $Improvements['trine_param_h'] != 2341 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '2341 ' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 50 and $Improvements['trine_param_u'] != 3676 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '3676 ' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 50 and $Improvements['trine_param_z'] != 3676 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '3676 ' WHERE `id` = '".$Improvements['id']."' ");
} 
if($Improvements['trine_h'] == 50 and $Improvements['trine_param_h'] != 3676 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '3676 ' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 60 and $Improvements['trine_param_u'] != 5311 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '5311 ' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 60 and $Improvements['trine_param_z'] != 5311 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '5311 ' WHERE `id` = '".$Improvements['id']."' ");
} 
if($Improvements['trine_h'] == 60 and $Improvements['trine_param_h'] != 5311 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '5311 ' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 70 and $Improvements['trine_param_u'] != 5611 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '5611 ' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 70 and $Improvements['trine_param_z'] != 5611 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '5611 ' WHERE `id` = '".$Improvements['id']."' ");
} 
if($Improvements['trine_h'] == 70 and $Improvements['trine_param_h'] != 5611 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '5611 ' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 80 and $Improvements['trine_param_u'] != 7846 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '7846 ' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 80 and $Improvements['trine_param_z'] != 7846 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '7846 ' WHERE `id` = '".$Improvements['id']."' ");
} 
if($Improvements['trine_h'] == 80 and $Improvements['trine_param_h'] != 7846 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '7846 ' WHERE `id` = '".$Improvements['id']."' ");
} 
 
if($Improvements['trine_u'] == 90 and $Improvements['trine_param_u'] != 10381 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '10381' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 90 and $Improvements['trine_param_z'] != 10381 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '10381' WHERE `id` = '".$Improvements['id']."' ");
} 
if($Improvements['trine_h'] == 90 and $Improvements['trine_param_h'] != 10381 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '10381' WHERE `id` = '".$Improvements['id']."' ");
}

if($Improvements['trine_u'] == 100 and $Improvements['trine_param_u'] != 13216 ){
mysql_query("UPDATE `Improvements` SET `trine_param_u` = '13216' WHERE `id` = '".$Improvements['id']."' ");
}
if($Improvements['trine_z'] == 100 and $Improvements['trine_param_z'] != 13216 ){
mysql_query("UPDATE `Improvements` SET `trine_param_z` = '13216' WHERE `id` = '".$Improvements['id']."' ");
} 
if($Improvements['trine_h'] == 100 and $Improvements['trine_param_h'] != 13216 ){
mysql_query("UPDATE `Improvements` SET `trine_param_h` = '13216' WHERE `id` = '".$Improvements['id']."' ");
} 
#################################################################################################

$sum_param_u = $Improvements['u_imp']+$Improvements['mod_param']+$Improvements['trine_param_u'];
$sum_param_z = $Improvements['z_imp']+$Improvements['mod_param']+$Improvements['trine_param_z'];
$sum_param_h = $Improvements['h_imp']+$Improvements['mod_param']+$Improvements['trine_param_h'];


if($pve_vip){
if($pve_vip['act'] > 0 and $pve_vip['u'] == 500){
if(($sum_param_u+600) != ($user['u']) or ($sum_param_z+600) != ($user['z']) or ($sum_param_h+600) != ($user['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+600)."', `z` = '".($sum_param_z+600)."', `h` = '".($sum_param_h+600)."' WHERE `id` = '".$user['id']."' ");
}
}
if($pve_vip['act'] > 0 and $pve_vip['u'] == 1000){
if(($sum_param_u+1100) != ($user['u']) or ($sum_param_z+1100) != ($user['z']) or ($sum_param_h+1100) != ($user['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+1100)."', `z` = '".($sum_param_z+1100)."', `h` = '".($sum_param_h+1100)."' WHERE `id` = '".$user['id']."' ");
}
}
if($pve_vip['act'] > 0 and $pve_vip['u'] == 2500){
if(($sum_param_u+2600) != ($user['u']) or ($sum_param_z+2600) != ($user['z']) or ($sum_param_h+2600) != ($user['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+2600)."', `z` = '".($sum_param_z+2600)."', `h` = '".($sum_param_h+2600)."' WHERE `id` = '".$user['id']."' ");
}
}
if($pve_vip['act'] > 0 and $pve_vip['u'] == 4000){
if(($sum_param_u+4100) != ($user['u']) or ($sum_param_z+4100) != ($user['z']) or ($sum_param_h+4100) != ($user['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+4100)."', `z` = '".($sum_param_z+4100)."', `h` = '".($sum_param_h+4100)."' WHERE `id` = '".$user['id']."' ");
}
}
if($pve_vip['act'] > 0 and $pve_vip['u'] == 8000){
if(($sum_param_u+8100) != ($user['u']) or ($sum_param_z+8100) != ($user['z']) or ($sum_param_h+8100) != ($user['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+8100)."', `z` = '".($sum_param_z+8100)."', `h` = '".($sum_param_h+8100)."' WHERE `id` = '".$user['id']."' ");
}
}
}else{
if(($sum_param_u+100) != ($user['u']) or ($sum_param_z+100) != ($user['z']) or ($sum_param_h+100) != ($user['h']) ){
mysql_query("UPDATE `users` SET `u` = '".($sum_param_u+100)."', `z` = '".($sum_param_z+100)."', `h` = '".($sum_param_h+100)."' WHERE `id` = '".$user['id']."' ");
}
}







$cup_us = mysql_fetch_assoc(mysql_query('SELECT * FROM `cup` WHERE `user` = "'.$user['id'].'" '));
if(!$cup_us){
mysql_query("INSERT INTO `cup` SET `user` = '".$user['id']."', `level`  = '1', `cup`  = '0' ");
}

if($sql['time_mis_turnir'] < time() and $sql['time_mis_turnir'] > 0){
mysql_query("UPDATE `users` SET `gradient` = '0', `vip_nagrada` = '0', `vip_pay` = '0', `vip_vid` = '0' WHERE `id` ");


mysql_query("UPDATE `settings` SET `time_mis_turnir` = '".(time()+(86400*7))."' WHERE `id` = '".$sql['id']."' ");

$sdssdfds = mysql_result(mysql_query("SELECT COUNT(*) FROM `cup` WHERE `id` "),0);
if($sdssdfds > 0){
mysql_query('DELETE FROM `cup` WHERE `id` ');
}

}






if($promotions['promotion_18'] == 1){
if(!$safe){
mysql_query("INSERT INTO `safe` SET `user` = '".$user['id']."', `angel` = '0' ");
} 
}
if($safe['time_restart'] > 0 and $safe['time_restart'] < time()){
mysql_query('DELETE FROM `safe` WHERE `id` ');
}


?>