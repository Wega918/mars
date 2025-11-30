<?php

// Выполняем запрос один раз
$query = "SELECT COUNT(*) FROM `message` WHERE `komy` = ".$user['id']." AND `readlen` = 0";
$result = mysql_query($query);

// Проверяем, если запрос успешен
if ($result) {
    $pm_col_st_0 = mysql_result($result, 0); // Получаем значение
    mysql_free_result($result); // Освобождаем память после выполнения запроса
    // Если есть непрочитанные сообщения, выводим их
    if ($pm_col_st_0 > 0) {
        echo '<a href="'.$HOME.'mes/">
                <div class="description_mes">
                    <div class="icon">
                        <img width="24" height="24" alt="true" src="/images/mail.gif" title="true">
                    </div>
                    <font color="#ddd" size="2">Новое сообщение!</font>
                    <font color="red" size="2">+' . $pm_col_st_0 . '</font>
                </div>
              </a>';
    }
}



if($user['biznes'] >= 10){
if($user['news'] > 0){
	        echo '<a href="?wiew/">
                <div class="description_mes">
                    <div class="icon">
                        <img width="24" height="24" alt="true" src="/images/news.png" title="true">
                    </div>
                    <font color="#ddd" size="2">Свежие новости!</font>
                </div>
              </a>';
if(isset($_GET['wiew/'])){
mysql_query("UPDATE `users` SET  `news` = '0' WHERE `id` = '$user[id]'");
header('Location: '.$HOME.'forum/topic/'.$user['news'].'/');
exit();
}
}
}



/* 


$pm_col_st_0 = mysql_result(mysql_query('SELECT COUNT(*) FROM `message` WHERE `komy` = '.$user['id'].' and `readlen` = 0 '),0);
if($pm_col_st_0 > 0) {
echo '<a href="'.$HOME.'mes/"><div class="description_mes"><div class="icon"><img width="24" height="24" alt="true" src="/images/mail.gif" title="true"></div>
<font color=#ddd size=2>Новое сообщение!</font> <font color=red size=2>+'.$pm_col_st_0.'</font>
</span></li></ul></div></a>';
} */


if ($user['set_1'] == 0){
if($cup_us['level'] < 25){
if (isset($cup_us) && is_array($cup_us) && $cup_us['cup'] >= $cup) {
    echo '<a href="'.$HOME.'cup/"><div class="description_ses_ok"><div class="icon"><img width="24" height="24" alt="true" src="/images/true.png" title="true"></div>
    <font color=#ddd size=2><b> Уровень повышен!</b></font> 
    </span></li></ul></div></a>';
}

}







if (
    (isset($mission_user_1) && is_array($mission_user_1) && $mission_user_1['prog_'] >= $mission_user_1['prog'] && $mission_user_1['time_restart'] == 0) ||
    (isset($mission_user_2) && is_array($mission_user_2) && $mission_user_2['prog_'] >= $mission_user_2['prog'] && $mission_user_2['time_restart'] == 0) ||
    (isset($mission_user_3) && is_array($mission_user_3) && $mission_user_3['prog_'] >= $mission_user_3['prog'] && $mission_user_3['time_restart'] == 0) ||
    (isset($mission_user_4) && is_array($mission_user_4) && $mission_user_4['prog_'] >= $mission_user_4['prog'] && $mission_user_4['time_restart'] == 0) ||
    (isset($mission_user_6) && is_array($mission_user_6) && $mission_user_6['prog_'] >= $mission_user_6['prog'] && $mission_user_6['time_restart'] == 0) ||
    (isset($mission_user_7) && is_array($mission_user_7) && $mission_user_7['prog_'] >= $mission_user_7['prog'] && $mission_user_7['time_restart'] == 0) ||
    (isset($mission_user_8) && is_array($mission_user_8) && $mission_user_8['prog_'] >= $mission_user_8['prog'] && $mission_user_8['time_restart'] == 0) ||
    (isset($mission_user_9) && is_array($mission_user_9) && $mission_user_9['prog_'] >= $mission_user_9['prog'] && $mission_user_9['time_restart'] == 0) ||
    (isset($mission_user_10) && is_array($mission_user_10) && $mission_user_10['prog_'] >= $mission_user_10['prog'] && $mission_user_10['time_restart'] == 0) ||
    (isset($mission_user_11) && is_array($mission_user_11) && $mission_user_11['prog_'] >= $mission_user_11['prog'] && $mission_user_11['time_restart'] == 0) ||
    (isset($mission_user_12) && is_array($mission_user_12) && $mission_user_12['prog_'] >= $mission_user_12['prog'] && $mission_user_12['time_restart'] == 0) ||
    (isset($mission_user_13) && is_array($mission_user_13) && $mission_user_13['prog_'] >= $mission_user_13['prog'] && $mission_user_13['time_restart'] == 0) ||
    (isset($mission_user_14) && is_array($mission_user_14) && $mission_user_14['prog_'] >= $mission_user_14['prog'] && $mission_user_14['time_restart'] == 0) ||
    (isset($mission_user_15) && is_array($mission_user_15) && $mission_user_15['prog_'] >= $mission_user_15['prog'] && $mission_user_15['time_restart'] == 0) ||
    (isset($mission_user_16) && is_array($mission_user_16) && $mission_user_16['prog_'] >= $mission_user_16['prog'] && $mission_user_16['time_restart'] == 0) ||
    (isset($mission_user_17) && is_array($mission_user_17) && $mission_user_17['prog_'] >= $mission_user_17['prog'] && $mission_user_17['time_restart'] == 0) ||
    (isset($mission_user_18) && is_array($mission_user_18) && $mission_user_18['prog_'] >= $mission_user_18['prog'] && $mission_user_18['time_restart'] == 0) ||
    (isset($mission_user_19) && is_array($mission_user_19) && $mission_user_19['prog_'] >= $mission_user_19['prog'] && $mission_user_19['time_restart'] == 0) ||
    (isset($mission_user_20) && is_array($mission_user_20) && $mission_user_20['prog_'] >= $mission_user_20['prog'] && $mission_user_20['time_restart'] == 0) ||
    (isset($mission_user_21) && is_array($mission_user_21) && $mission_user_21['prog_'] >= $mission_user_21['prog'] && $mission_user_21['time_restart'] == 0) ||
    (isset($mission_user_22) && is_array($mission_user_22) && $mission_user_22['prog_'] >= $mission_user_22['prog'] && $mission_user_22['time_restart'] == 0) ||
    (isset($mission_user_23) && is_array($mission_user_23) && $mission_user_23['prog_'] >= $mission_user_23['prog'] && $mission_user_23['time_restart'] == 0) ||
    (isset($mission_user_24) && is_array($mission_user_24) && $mission_user_24['prog_'] >= $mission_user_24['prog'] && $mission_user_24['time_restart'] == 0) ||
    (isset($mission_user_25) && is_array($mission_user_25) && $mission_user_25['prog_'] >= $mission_user_25['prog'] && $mission_user_25['time_restart'] == 0) ||
    (isset($mission_user_26) && is_array($mission_user_26) && $mission_user_26['prog_'] >= $mission_user_26['prog'] && $mission_user_26['time_restart'] == 0) ||
    (isset($mission_user_27) && is_array($mission_user_27) && $mission_user_27['prog_'] >= $mission_user_27['prog'] && $mission_user_27['time_restart'] == 0) ||
    (isset($mission_user_28) && is_array($mission_user_28) && $mission_user_28['prog_'] >= $mission_user_28['prog'] && $mission_user_28['time_restart'] == 0) ||
    (isset($mission_user_29) && is_array($mission_user_29) && $mission_user_29['prog_'] >= $mission_user_29['prog'] && $mission_user_29['time_restart'] == 0) ||
    (isset($mission_user_30) && is_array($mission_user_30) && $mission_user_30['prog_'] >= $mission_user_30['prog'] && $mission_user_30['time_restart'] == 0) ||
    (isset($mission_user_31) && is_array($mission_user_31) && $mission_user_31['prog_'] >= $mission_user_31['prog'] && $mission_user_31['time_restart'] == 0) ||
    (isset($mission_user_32) && is_array($mission_user_32) && $mission_user_32['prog_'] >= $mission_user_32['prog'] && $mission_user_32['time_restart'] == 0) ||
    (isset($mission_user_33) && is_array($mission_user_33) && $mission_user_33['prog_'] >= $mission_user_33['prog'] && $mission_user_33['time_restart'] == 0) ||
    (isset($mission_user_34) && is_array($mission_user_34) && $mission_user_34['prog_'] >= $mission_user_34['prog'] && $mission_user_34['time_restart'] == 0) ||
    (isset($mission_user_35) && is_array($mission_user_35) && $mission_user_35['prog_'] >= $mission_user_35['prog'] && $mission_user_35['time_restart'] == 0)
) {
    echo '<a href="'.$HOME.'mission/"><div class="description_ses_ok"><div class="icon"><img width="24" height="24" alt="true" src="/images/true.png" title="true"></div>
    <font color=#ddd size=2><b> Задание выполнено!</b></font> 
    </span></li></ul></div></a>';
}



//if ($_SERVER['PHP_SELF'] != '/garden/index.php') {
$kolll = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' "),0);
if($user['en'] >= $kolll){
if (empty($user['max'])) $user['max']=10;
$max = 1;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$knoppkadds = mysql_query("SELECT * FROM `garden_plant_user` WHERE `user` = '".$user['id']."' and `time` < '".(time())."' and `time` > '0' ORDER BY `id` desc LIMIT $start,$max");
while($dsdffc = mysql_fetch_assoc($knoppkadds)){
$nomer = $k_post++;
if($nomer==1){
echo '<a href="'.$HOME.'garden/"><div class="description_ses_ok"><div class="icon"><img width="24" height="24" alt="true" src="/images/true.png" title="true"></div>
<font color=#ddd size=2><b>Грядки!</b> Соберите урожай!</font> 
</span></li></ul></div></a>';
}else{
}
}
}
//}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//if ($_SERVER['PHP_SELF'] != '/expedition/index.php' and $_SERVER['PHP_SELF'] != '/expedition/expeditions.php' and $_SERVER['PHP_SELF'] != '/expedition/sav.php') {
//if($user['id'] == 1){
if($expedition_user['user'] == $user['id'] and $expedition_user['time'] < time()){
echo '<a href="'.$HOME.'expedition/"><div class="description_ses_ok"><div class="icon"><img width="24" height="24" alt="true" src="/images/true.png" title="true"></div>
<font color=#ddd size=2><b>Экспедиция!</b> Завершите Экспедицию!</font> 
</span></li></ul></div></a>';
}
//}
//}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($pve1['boy_vid'] == 1 ) {


$pve_zayavki = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_zayavki` WHERE `user` = '".$user['id']."'"));
if($pve1['time'] <= (time()+600) ) {
if(!$pve_zayavki){
echo '<a href="'.$HOME.'pve/"><div class="description_pve"><div class="icon"><img width="24" height="24" alt="true" src="/world/images/pve/'.$pve1['id'].''.$pve1['id'].'.png" title="true"></div>
<font color=#ddd size=2><b>Сражения!</b> Подайте заявку!</font> 
</span></li></ul></div></a>';
}
}

if($pve1['time'] <= (time()+600) ) {
echo '<a href="'.$HOME.'pve/"><div class="description_pve"><div class="icon"><img width="24" height="24" alt="true" src="/world/images/pve/'.$pve1['id'].''.$pve1['id'].'.png" title="true"></div>
<font color=#ddd size=2>Скоро '.$pve1['name'].'!</font> <font color=black size=2>'._time($pve1['time']-time()).'</font>
</span></li></ul></div></a>';
}

}else{


$pve_zayavki = mysql_fetch_assoc(mysql_query("SELECT * FROM `pve_zayavki` WHERE `user` = '".$user['id']."'"));
if($pve1['time'] <= (time()+7200) ) {
if(!$pve_zayavki){
echo '<a href="'.$HOME.'pve/"><div class="description_pve"><div class="icon"><img width="24" height="24" alt="true" src="/world/images/pve/'.$pve1['id'].''.$pve1['id'].'.png" title="true"></div>
<font color=#ddd size=2><b>Сражения!</b> Подайте заявку!</font> 
</span></li></ul></div></a>';
}
}

if($pve1['time'] <= (time()+600) ) {
echo '<a href="'.$HOME.'pve/"><div class="description_pve"><div class="icon"><img width="24" height="24" alt="true" src="/world/images/pve/'.$pve1['id'].''.$pve1['id'].'.png" title="true"></div>
<font color=#ddd size=2>Скоро '.$pve1['name'].'!</font> <font color=black size=2>'._time($pve1['time']-time()).'</font>
</span></li></ul></div></a>';
}


}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($pve1['time_pve']  != 0){
echo '<a href="'.$HOME.'pve/"><div class="description_pve"><div class="icon"><img width="24" height="24" alt="true" src="/world/images/pve/'.$pve1['id'].''.$pve1['id'].'.png" title="true"></div>
<font color=#ddd size=2>Проходит '.$pve1['name'].'!</font> <font color=black size=2>'._time($pve1['time_pve']-time()).'</font>
</span></li></ul></div></a>';
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (
    (isset($Achievements_user_1) && is_array($Achievements_user_1) && $Achievements_user_1['prog'] >= $Achievements_user_1['prog_max'] && $Achievements_user_1['done'] == 0) ||
    (isset($Achievements_user_2) && is_array($Achievements_user_2) && $Achievements_user_2['prog'] >= $Achievements_user_2['prog_max'] && $Achievements_user_2['done'] == 0) ||
    (isset($Achievements_user_3) && is_array($Achievements_user_3) && $Achievements_user_3['prog'] >= $Achievements_user_3['prog_max'] && $Achievements_user_3['done'] == 0) ||
    (isset($Achievements_user_4) && is_array($Achievements_user_4) && $Achievements_user_4['prog'] >= $Achievements_user_4['prog_max'] && $Achievements_user_4['done'] == 0) ||
    (isset($Achievements_user_5) && is_array($Achievements_user_5) && $Achievements_user_5['prog'] >= $Achievements_user_5['prog_max'] && $Achievements_user_5['done'] == 0) ||
    (isset($Achievements_user_6) && is_array($Achievements_user_6) && $Achievements_user_6['prog'] >= $Achievements_user_6['prog_max'] && $Achievements_user_6['done'] == 0) ||
    (isset($Achievements_user_7) && is_array($Achievements_user_7) && $Achievements_user_7['prog'] >= $Achievements_user_7['prog_max'] && $Achievements_user_7['done'] == 0) ||
    (isset($Achievements_user_9) && is_array($Achievements_user_9) && $Achievements_user_9['prog'] >= $Achievements_user_9['prog_max'] && $Achievements_user_9['done'] == 0) ||
    (isset($Achievements_user_10) && is_array($Achievements_user_10) && $Achievements_user_10['prog'] >= $Achievements_user_10['prog_max'] && $Achievements_user_10['done'] == 0) ||
    (isset($Achievements_user_11) && is_array($Achievements_user_11) && $Achievements_user_11['prog'] >= $Achievements_user_11['prog_max'] && $Achievements_user_11['done'] == 0) ||
    (isset($Achievements_user_12) && is_array($Achievements_user_12) && $Achievements_user_12['prog'] >= $Achievements_user_12['prog_max'] && $Achievements_user_12['done'] == 0) ||
    (isset($Achievements_user_13) && is_array($Achievements_user_13) && $Achievements_user_13['prog'] >= $Achievements_user_13['prog_max'] && $Achievements_user_13['done'] == 0) ||
    (isset($Achievements_user_14) && is_array($Achievements_user_14) && $Achievements_user_14['prog'] >= $Achievements_user_14['prog_max'] && $Achievements_user_14['done'] == 0) ||
    (isset($Achievements_user_15) && is_array($Achievements_user_15) && $Achievements_user_15['prog'] >= $Achievements_user_15['prog_max'] && $Achievements_user_15['done'] == 0) ||
    (isset($Achievements_user_16) && is_array($Achievements_user_16) && $Achievements_user_16['prog'] >= $Achievements_user_16['prog_max'] && $Achievements_user_16['done'] == 0) ||
    (isset($Achievements_user_17) && is_array($Achievements_user_17) && $Achievements_user_17['prog'] >= $Achievements_user_17['prog_max'] && $Achievements_user_17['done'] == 0) ||
    (isset($Achievements_user_18) && is_array($Achievements_user_18) && $Achievements_user_18['prog'] >= $Achievements_user_18['prog_max'] && $Achievements_user_18['done'] == 0) ||
    (isset($Achievements_user_19) && is_array($Achievements_user_19) && $Achievements_user_19['prog'] >= $Achievements_user_19['prog_max'] && $Achievements_user_19['done'] == 0) ||
    (isset($Achievements_user_20) && is_array($Achievements_user_20) && $Achievements_user_20['prog'] >= $Achievements_user_20['prog_max'] && $Achievements_user_20['done'] == 0) ||
    (isset($Achievements_user_21) && is_array($Achievements_user_21) && $Achievements_user_21['prog'] >= $Achievements_user_21['prog_max'] && $Achievements_user_21['done'] == 0) ||
    (isset($Achievements_user_22) && is_array($Achievements_user_22) && $Achievements_user_22['prog'] >= $Achievements_user_22['prog_max'] && $Achievements_user_22['done'] == 0) ||
    (isset($Achievements_user_23) && is_array($Achievements_user_23) && $Achievements_user_23['prog'] >= $Achievements_user_23['prog_max'] && $Achievements_user_23['done'] == 0) ||
    (isset($Achievements_user_24) && is_array($Achievements_user_24) && $Achievements_user_24['prog'] >= $Achievements_user_24['prog_max'] && $Achievements_user_24['done'] == 0) ||
    (isset($Achievements_user_25) && is_array($Achievements_user_25) && $Achievements_user_25['prog'] >= $Achievements_user_25['prog_max'] && $Achievements_user_25['done'] == 0) ||
    (isset($Achievements_user_27) && is_array($Achievements_user_27) && $Achievements_user_27['prog'] >= $Achievements_user_27['prog_max'] && $Achievements_user_27['done'] == 0) ||
    (isset($Achievements_user_28) && is_array($Achievements_user_28) && $Achievements_user_28['prog'] >= $Achievements_user_28['prog_max'] && $Achievements_user_28['done'] == 0) ||
    (isset($Achievements_user_30) && is_array($Achievements_user_30) && $Achievements_user_30['prog'] >= $Achievements_user_30['prog_max'] && $Achievements_user_30['done'] == 0) ||
    (isset($Achievements_user_31) && is_array($Achievements_user_31) && $Achievements_user_31['prog'] >= $Achievements_user_31['prog_max'] && $Achievements_user_31['done'] == 0) ||
    (isset($Achievements_user_32) && is_array($Achievements_user_32) && $Achievements_user_32['prog'] >= $Achievements_user_32['prog_max'] && $Achievements_user_32['done'] == 0) ||
    (isset($Achievements_user_33) && is_array($Achievements_user_33) && $Achievements_user_33['prog'] >= $Achievements_user_33['prog_max'] && $Achievements_user_33['done'] == 0) ||
    (isset($Achievements_user_34) && is_array($Achievements_user_34) && $Achievements_user_34['prog'] >= $Achievements_user_34['prog_max'] && $Achievements_user_34['done'] == 0)
) {
    echo '<a href="'.$HOME.'Achievements/"><div class="description_ses_ok"><div class="icon"><img width="24" height="24" alt="true" src="/images/true.png" title="true"></div>
    <font color=#ddd size=2><b>Достижение выполнено</b></font> 
    </span></li></ul></div></a>';
}







}



















// Выполняем один запрос для получения всех данных по пользователю
$result = mysql_query("SELECT * FROM `Collectible_items` WHERE `user` = '{$user['id']}'");
$collectibleItems = [];
while ($row = mysql_fetch_assoc($result)) {
    $collectibleItems[$row['collection']] = $row;
}

// Определяем переменные для каждой коллекции
$Collectible_items = isset($collectibleItems) ? $collectibleItems : []; // Все коллекции

$Collectible_items1 = isset($collectibleItems[1]) ? $collectibleItems[1] : null; // Коллекция 1
$Collectible_items2 = isset($collectibleItems[2]) ? $collectibleItems[2] : null; // Коллекция 2
$Collectible_items3 = isset($collectibleItems[3]) ? $collectibleItems[3] : null; // Коллекция 3
$Collectible_items4 = isset($collectibleItems[4]) ? $collectibleItems[4] : null; // Коллекция 4

// Функция для обработки коллекций
function processCollection($collectionId, $timeIncrement, $itemRange, $chance, $user, $mission_user_28, $Achievements_user_27, $HOME) {
    global $collectibleItems;

    $collection = isset($collectibleItems[$collectionId]) ? $collectibleItems[$collectionId] : null;

    // Проверка времени
    if ($collection && $collection['time'] >= time()) {
        return;
    }

    // Генерация случайного предмета
    if (mt_rand(1, 100) >= $chance) {
        $randItem = rand($itemRange[0], $itemRange[1]);
        $itemField = 'item_' . ($randItem - (($collectionId - 1) * 10));

        if (!$collection) {
            // Если коллекция не существует
            mysql_query("INSERT INTO `Collectible_items` SET `$itemField` = '1', `time` = '" . (time() + $timeIncrement) . "', `user` = '{$user['id']}', `collection` = '$collectionId'");
        } else {
            // Если коллекция существует
            $newCount = $collection[$itemField] + 1;
            mysql_query("UPDATE `Collectible_items` SET `$itemField` = '$newCount', `time` = '" . (time() + $timeIncrement) . "' WHERE `user` = '{$user['id']}' AND `collection` = '$collectionId' LIMIT 1");
        }

        // Обновляем прогресс миссий
        if ($mission_user_28['time_restart'] == 0) {
            mysql_query("UPDATE `mission_user` SET `prog_` = '" . ($mission_user_28['prog_'] + 1) . "' WHERE `id` = '{$mission_user_28['id']}'");
        }

        // Обновляем достижения
        if ($Achievements_user_27['prog'] < $Achievements_user_27['prog_max']) {
            mysql_query("UPDATE `Achievements_user` SET `prog` = '" . ($Achievements_user_27['prog'] + 1) . "' WHERE `id` = '{$Achievements_user_27['id']}'");
        }

        // Уведомление для пользователя
        if ($user['set_1'] == 0) {
            //header('Location: ?');
            $_SESSION['ses'] = '<a href="' . $HOME . 'igrok_' . $user['id'] . '/"><div class="description_ses_ok"><div class="icon"><img width="30" height="30" alt="Коллекционный предмет" src="/images/colections/1/' . $randItem . '.png" title="Коллекционный предмет"></div>
            <font color=#ddd size=2><b>Найден коллекционный предмет!</b></font></span></li></ul></div></a>';
            //exit();
        }
    }
}

// Обрабатываем коллекции
processCollection(1, 2000, [1, 8], 98, $user, $mission_user_28, $Achievements_user_27, $HOME);
processCollection(2, 4000, [11, 18], 99, $user, $mission_user_28, $Achievements_user_27, $HOME);
processCollection(3, 6000, [21, 28], 100, $user, $mission_user_28, $Achievements_user_27, $HOME);
processCollection(4, 8000, [31, 38], 100 / 6, $user, $mission_user_28, $Achievements_user_27, $HOME);




 



if($promotions['promotion_9'] == 1){
$rand = rand(1,3);

if ($rand == 1){
if ($user['time_toy'] <= time() ){
if (mt_rand(1, 100) >= 93){
$rand1 = rand(1,5);
mysql_query("INSERT INTO `toys` SET `user` = '".$user['id']."', `toy` = '".$rand1."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `time_toy` = '".($user['time_toy'] = (time()+15))."' WHERE `id` = '".$user['id']."' ");
if ($user['set_1'] == 0){
//header("Location: ?");
$_SESSION['ses'] = '<a href="' . $HOME . 'NewYearToys/"><div class="description_ses_ok"><div class="icon">
<img width="30" height="30" alt="Игрушка" src="/images/toys/'.$rand1.'.png" title="Игрушка"></div>
<font color=#ddd size=2><b>Найдена Новогодняя игрушка!</b></font></span></li></ul></div></a>';
//exit();
}
}
}
}

if ($rand == 2){
if ($user['time_toy'] <= time() ){
if (mt_rand(1, 100) >= 96){
$rand2 = rand(6,10);
mysql_query("INSERT INTO `toys` SET `user` = '".$user['id']."', `toy` = '".$rand2."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `time_toy` = '".($user['time_toy'] = (time()+30))."' WHERE `id` = '".$user['id']."' ");
if ($user['set_1'] == 0){
//header("Location: ?");
$_SESSION['ses'] = '<a href="' . $HOME . 'NewYearToys/"><div class="description_ses_ok"><div class="icon">
<img width="30" height="30" alt="Игрушка" src="/images/toys/'.$rand2.'.png" title="Игрушка"></div>
<font color=#ddd size=2><b>Найдена Новогодняя игрушка!</b></font></span></li></ul></div></a>';
//exit();
}
}
}
}

if ($rand == 3){
if ($user['time_toy'] <= time() ){
if (mt_rand(1, 100) >= 99){
$rand3 = rand(11,15);
mysql_query("INSERT INTO `toys` SET `user` = '".$user['id']."', `toy` = '".$rand3."', `time` = '".time()."' ");
mysql_query("UPDATE `users` SET `time_toy` = '".($user['time_toy'] = (time()+60))."' WHERE `id` = '".$user['id']."' ");
if ($user['set_1'] == 0){
//header("Location: ?");
$_SESSION['ses'] = '<a href="' . $HOME . 'NewYearToys/"><div class="description_ses_ok"><div class="icon">
<img width="30" height="30" alt="Игрушка" src="/images/toys/'.$rand3.'.png" title="Игрушка"></div>
<font color=#ddd size=2><b>Найдена Новогодняя игрушка!</b></font></span></li></ul></div></a>';
//exit();
}
}
}
}

}



















if($promotions['promotion_12'] == 1){
 global $halloween1, $halloween2, $halloween3, $halloween4, $halloween5, $halloween6;

$query = "SELECT * FROM `halloween` WHERE `user` = '".$user['id']."' AND `vid` IN (1, 2, 3, 4, 5, 6)";
$result = mysql_query($query);

if ($result) {
    while ($row = mysql_fetch_assoc($result)) {
        ${'halloween' . $row['vid']} = $row; // Динамически присваиваем переменные
    }

    mysql_free_result($result);
}



/* 
$halloween1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `halloween` WHERE `user` = '".$user['id']."' and `vid` = '1' "));
$halloween2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `halloween` WHERE `user` = '".$user['id']."' and `vid` = '2' "));
$halloween3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `halloween` WHERE `user` = '".$user['id']."' and `vid` = '3' "));
$halloween4 = mysql_fetch_assoc(mysql_query("SELECT * FROM `halloween` WHERE `user` = '".$user['id']."' and `vid` = '4' "));
$halloween5 = mysql_fetch_assoc(mysql_query("SELECT * FROM `halloween` WHERE `user` = '".$user['id']."' and `vid` = '5' "));
$halloween6 = mysql_fetch_assoc(mysql_query("SELECT * FROM `halloween` WHERE `user` = '".$user['id']."' and `vid` = '6' "));
 */
if($user['id'] == 1){
if($halloween1){
//echo ''.$halloween1['id'].'';
}
}

if($promotions['act_12'] == 1){
$txxxt = 'Найдена тыква';
$txxxt1 = '';
$razmer = 50;
$rand1 = 90;
$rand2 = 91;
$rand3 = 92;
$rand4 = 93;
$rand5 = 94;
$rand6 = 95;
}elseif($promotions['act_12'] == 2){
$txxxt = 'Найдена игрушка';
$txxxt1 = '_';
$razmer = 43;
$rand1 = 90;
$rand2 = 91;
$rand3 = 92;
$rand4 = 93;
$rand5 = 94;
$rand6 = 95;
}elseif($promotions['act_12'] == 3){
$txxxt = 'Найден сувенир';
$txxxt1 = '__';
$razmer = 43;
$rand1 = 90;
$rand2 = 91;
$rand3 = 92;
$rand4 = 93;
$rand5 = 94;
$rand6 = 95;
}

$fdgdg=rand(1,20);
$fgdfd=rand(20,50);

if($halloween1['time'] <= time() and $kolvo >= $fdgdg && $kolvo <= $fgdfd){
if (mt_rand(1, 100) >= 10){
if(!$halloween1){
mysql_query("INSERT INTO `halloween` SET `koll` = '1', `vid` = '1', `time` = '".(time()+30)."', `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
//if($user['time_8_8'] >= time()) {
//mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
//}
}else{
//if($user['time_8_8'] >= time()) {
//mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
//}
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween1['koll'] + 1)."', `time` = '".(time()+30)."' WHERE `user` = '".$user['id']."' and `vid` = '1' LIMIT 1");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}
if ($user['set_1'] == 0){
$_SESSION['halloween_bon'] = '<a href="'.$HOME.'Halloween/"><div class="icon"><img width="30" height="30" alt="'.$txxxt.'" src="/Halloween/images/'.$txxxt1.'1.png" title="'.$txxxt.'"></div>
    <font color=#ddd size=2><b>'.$txxxt.'</b></font> 
    </span></li></ul></a>';
}
}
}

if($halloween2['time'] <= time() and $kolvo >= $fdgdg && $kolvo <= $fgdfd ){
if (mt_rand(1, 100) >= $rand2){
if(!$halloween2){
mysql_query("INSERT INTO `halloween` SET `koll` = '1', `vid` = '2', `time` = '".(time()+60)."', `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
}else{
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween2['koll'] + 1)."', `time` = '".(time()+60)."' WHERE `user` = '".$user['id']."' and `vid` = '2' LIMIT 1");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}
if ($user['set_1'] == 0){
$_SESSION['halloween_bon'] = '<a href="'.$HOME.'Halloween/"><div class="icon"><img width="30" height="30" alt="'.$txxxt.'" src="/Halloween/images/'.$txxxt1.'2.png" title="'.$txxxt.'"></div>
    <font color=#ddd size=2><b>'.$txxxt.'</b></font></a>';
}
}
}

if($halloween3['time'] <= time() and $kolvo >= $fdgdg  && $kolvo <= $fgdfd ){
if (mt_rand(1, 100) >= $rand3){
if(!$halloween3){
mysql_query("INSERT INTO `halloween` SET `koll` = '1', `vid` = '3', `time` = '".(time()+80)."', `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
}else{
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween3['koll'] + 1)."', `time` = '".(time()+80)."' WHERE `user` = '".$user['id']."' and `vid` = '3' LIMIT 1");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}
if ($user['set_1'] == 0){
$_SESSION['halloween_bon'] = '<a href="'.$HOME.'Halloween/"><div class="icon"><img width="30" height="30" alt="'.$txxxt.'" src="/Halloween/images/'.$txxxt1.'3.png" title="'.$txxxt.'"></div>
    <font color=#ddd size=2><b>'.$txxxt.'</b></font></a>';
}
}
}

if($halloween4['time'] <= time() and $kolvo >= $fdgdg && $kolvo <= $fgdfd  ){
if (mt_rand(1, 100) >= $rand4){
if(!$halloween4){
mysql_query("INSERT INTO `halloween` SET `koll` = '1', `vid` = '4', `time` = '".(time()+100)."', `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
}else{
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween4['koll'] + 1)."', `time` = '".(time()+100)."' WHERE `user` = '".$user['id']."' and `vid` = '4' LIMIT 1");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}
if ($user['set_1'] == 0){
$_SESSION['halloween_bon'] = '<a href="'.$HOME.'Halloween/"><div class="icon"><img width="30" height="30" alt="'.$txxxt.'" src="/Halloween/images/'.$txxxt1.'4.png" title="'.$txxxt.'"></div>
    <font color=#ddd size=2><b>'.$txxxt.'</b></font></a>';
}
}
}

if($halloween5['time'] <= time() and $kolvo >= $fdgdg && $kolvo <= $fgdfd  ){
if (mt_rand(1, 100) >= $rand5){
if(!$halloween5){
mysql_query("INSERT INTO `halloween` SET `koll` = '1', `vid` = '5', `time` = '".(time()+120)."', `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
}else{
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween5['koll'] + 1)."', `time` = '".(time()+120)."' WHERE `user` = '".$user['id']."' and `vid` = '5' LIMIT 1");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}
if ($user['set_1'] == 0){
$_SESSION['halloween_bon'] = '<a href="'.$HOME.'Halloween/"><div class="icon"><img width="30" height="30" alt="'.$txxxt.'" src="/Halloween/images/'.$txxxt1.'5.png" title="'.$txxxt.'"></div>
    <font color=#ddd size=2><b>'.$txxxt.'</b></font></a>';
}
}
}

if($halloween6['time'] <= time() and $kolvo >= $fdgdg && $kolvo <= $fgdfd ){
if (mt_rand(1, 100) >= $rand6){
if(!$halloween6){
mysql_query("INSERT INTO `halloween` SET `koll` = '1', `vid` = '6', `time` = '".(time()+160)."', `user` = '".$user['id']."' ");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
}else{
if($user['time_8_8'] >= time()) {
mysql_query("UPDATE `users` SET `prog_8` = '".($user['prog_8']+1)."' WHERE `id` = '".$user['id']."' ");
}
mysql_query("UPDATE `halloween` SET `koll` = '".($halloween6['koll'] + 1)."', `time` = '".(time()+160)."' WHERE `user` = '".$user['id']."' and `vid` = '6' LIMIT 1");
mysql_query("UPDATE `users` SET `koll` = '".($user['koll'] + 1)."' WHERE `id` = '".$user['id']."' LIMIT 1");
}
if ($user['set_1'] == 0){
$_SESSION['halloween_bon'] = '<a href="'.$HOME.'Halloween/"><div class="icon"><img width="30" height="30" alt="'.$txxxt.'" src="/Halloween/images/'.$txxxt1.'6.png" title="'.$txxxt.'"></div>
    <font color=#ddd size=2><b>'.$txxxt.'</b></font></a>';
}
}
}



}















echo '</div>';

echo '<div class="overlay">';
//уведомления не отображаются пока я не добавлю в самый конец </div> но тогда искажается страница



//максимальная прокачка
?>
<style>
.business-card {
    border-radius: 8px;
    padding: 1px;
    #max-width: 260px;
    background: linear-gradient(135deg, #2b577fc7, #bbbbbbdb);
	
    text-align: center;
    color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}


.business-image img {
    width: 17%;
    object-fit: cover;
    border-radius: 50%;
    border: 2px solid #fff;
    margin-bottom: 10px;
}

.upgrade-level {
    font-size: 14px;
    opacity: 0; /* Начальное состояние: невидимый */
    transform: translateY(10px); /* Сдвинут вниз */
    transition: opacity 0.5s ease-out, transform 0.5s ease-out; /* Плавный переход */
}

body.loaded .upgrade-level {
    opacity: 1; /* Видимый после загрузки */
    transform: translateY(0); /* Возвращается на место */
}

@media screen and (max-width: 768px) {
    .upgrade-level {
        font-size: 14px;
    }
}
</style>


<script>
document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add('loaded');
});
</script>
<?






?>