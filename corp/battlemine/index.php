<?php
$title = 'Корпоративная Шахта';
//-----Подключаем функции-----//
require_once ('../../system/function.php');
//-----Подключаем вверх-----//
require_once ('../../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}
/* if($user['id']!=1) {
$_SESSION['err'] = 'Техработы';
header('Location: ?');
exit();
} */
?>
<link rel="preconnect" href="https://mars-games.ru/">
<?


$battlemine = mysql_fetch_assoc(mysql_query("SELECT * FROM `battlemine` WHERE `corp`  = '".$user['corp']."' "));
$battlemine_user = mysql_fetch_assoc(mysql_query("SELECT * FROM `battlemine_user` WHERE `user`  = '".$user['id']."' and `battle_id`  = '".$battlemine['id']."' "));
$battlemine_user_coll = mysql_result(mysql_query("SELECT COUNT(*) FROM `battlemine_user` WHERE `battle_id`  = '".$battlemine['id']."' "),0);







/* 

 // Параметры антибота

$bot_threshold = 10;
$interval_tolerance = 20; // погрешность между кликами 
$block_seconds = 60;       

// Указываем абсолютный путь
$log_file = __DIR__ . '/bot_log.txt';


 // Функция записи лога с авто-созданием файла

function log_bot_event($log_file, $ivs) {
    $line = date('Y-m-d H:i:s') .
        " | USER: " . (isset($user['id']) ? $user['id'] : '-') .
		" | IP: " . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '-') .
        " | UA: " . (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '-') .
        " | Intervals: [" . implode(',', $ivs) . "]\n";

    // Пробуем создать файл, если его нет
    if (!file_exists($log_file)) {
        $created = @touch($log_file);
        if (!$created) {
            error_log("⚠ Не удалось создать файл лога: $log_file");
            return;
        }
        @chmod($log_file, 0666); // чтобы PHP мог писать
    }

    // Запись лога
    if (@file_put_contents($log_file, $line, FILE_APPEND | LOCK_EX) === false) {
        error_log("⚠ Не удалось записать в лог: $log_file");
    }
}


 // Текущее время

$now = (int) round(microtime(true) * 1000);


 // Блокировка, если уже установлена

if (isset($_SESSION['bot_block_until']) && $_SESSION['bot_block_until'] > time()) {
    $_SESSION['err'] = '⚠ Вы временно заблокированы антиботом. Подождите ' . ($_SESSION['bot_block_until'] - time()) . ' сек.';
    header('Location: /block.php');
    exit();
} elseif (isset($_SESSION['bot_block_until']) && $_SESSION['bot_block_until'] <= time()) {
    unset($_SESSION['bot_block_until']);
}


 // Инициализация

if (!isset($_SESSION['last_action_time'])) {
    $_SESSION['last_action_time'] = $now;
    $_SESSION['action_intervals'] = array();
    return;
}


//  Вычисляем интервал и сдвигаем окно

$interval = $now - (int) $_SESSION['last_action_time'];
$_SESSION['last_action_time'] = $now;

if (!isset($_SESSION['action_intervals']) or !is_array($_SESSION['action_intervals'])) {
    $_SESSION['action_intervals'] = array();
}

$_SESSION['action_intervals'][] = (int)$interval;

if (count($_SESSION['action_intervals']) > $bot_threshold) {
    array_shift($_SESSION['action_intervals']);
}


 // Анализируем только если есть 10 интервалов

if (count($_SESSION['action_intervals']) === $bot_threshold) {
    $ivs = $_SESSION['action_intervals'];
    $avg = array_sum($ivs) / $bot_threshold;
    $min = min($ivs);
    $max = max($ivs);
    $max_dev = 0;
    foreach ($ivs as $v) {
        $dev = abs($v - $avg);
        if ($dev > $max_dev) $max_dev = $dev;
    }
    if ((($max - $min) <= $interval_tolerance) or ($max_dev <= $interval_tolerance)) {
        log_bot_event($log_file, $ivs);

        $_SESSION['bot_block_until'] = time() + $block_seconds;
        $_SESSION['action_intervals'] = array();

        $_SESSION['err'] = '⚠ Подозрение на бота — вы заблокированы на 60 секунд!';
        header('Location: /block.php');
        exit();
    }

}

$_SESSION['last_valid_action'] = $now;
 */












if($battlemine['time']<time() or ($battlemine['time']>time() and $battlemine_user['mine_bot']<=0)){
if (!isset($_SESSION['blocked_from'])) {
    // Сохраняем страницу, на которой юзер был заблокирован
    $_SESSION['blocked_from'] = $_SERVER['REQUEST_URI'];
}
    // Параметры антибота
    $bot_threshold = 10;
    $interval_tolerance = 300; // мс
    $block_seconds = 3600;

    // Лог
    $log_file = __DIR__ . '/bot_log.txt';

    function log_bot_event($log_file, $ivs) {
        global $user;
        $line = date('Y-m-d H:i:s') .
            " | USER: " . (isset($user['id']) ? $user['id'] : '-') .
            " | IP: " . (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '-') .
            " | UA: " . (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '-') .
            " | Intervals: [" . implode(',', $ivs) . "]\n";

        if (!file_exists($log_file)) {
            $created = @touch($log_file);
            if (!$created) { error_log("⚠ Не удалось создать файл лога: $log_file"); return; }
            @chmod($log_file, 0666);
        }
        @file_put_contents($log_file, $line, FILE_APPEND | LOCK_EX);
    }

    $now = (int) round(microtime(true) * 1000);

    // Проверка блокировки
    if (isset($_SESSION['bot_block_until']) && $_SESSION['bot_block_until'] > time()) {
        //$_SESSION['err'] = '⚠ Вы временно заблокированы антиботом. Подождите ' . ($_SESSION['bot_block_until'] - time()) . ' сек.';


                    header('Location: /block.php');
                    exit();
    } elseif (isset($_SESSION['bot_block_until']) && $_SESSION['bot_block_until'] <= time()) {
        unset($_SESSION['bot_block_until']);
    }

    // Инициализация
    if (!isset($_SESSION['last_action_time'])) {
        $_SESSION['last_action_time'] = $now;
        $_SESSION['action_intervals'] = array();
    } else {
        $interval = $now - (int) $_SESSION['last_action_time'];
        $_SESSION['last_action_time'] = $now;

        if (!isset($_SESSION['action_intervals']) || !is_array($_SESSION['action_intervals'])) {
            $_SESSION['action_intervals'] = array();
        }

        $_SESSION['action_intervals'][] = (int)$interval;
        if (count($_SESSION['action_intervals']) > $bot_threshold) {
            array_shift($_SESSION['action_intervals']);
        }

        if (count($_SESSION['action_intervals']) === $bot_threshold) {
            $ivs = $_SESSION['action_intervals'];
            $avg = array_sum($ivs)/$bot_threshold;
            $min = min($ivs);
            $max = max($ivs);

            $max_dev = 0;
            foreach ($ivs as $v) {
                $dev = abs($v - $avg);
                if ($dev > $max_dev) { $max_dev = $dev; }
            }

            if (($max - $min) <= $interval_tolerance) {
                if ($max_dev <= $interval_tolerance) {
                    log_bot_event($log_file, $ivs);
                    $_SESSION['bot_block_until'] = time() + $block_seconds;
                    $_SESSION['action_intervals'] = array();
                    //$_SESSION['err'] = '⚠ Подозрение на бота — вы заблокированы на '.$block_seconds.' сек!';


header('Location: /block.php');
exit();
                }
            }
        }
    }

    $_SESSION['last_valid_action'] = $now;
}





/* 

// Генерируем токен
if (!isset($_SESSION['pin_token'])) {
    $pin_bytes = openssl_random_pseudo_bytes(8);
    $pin_token = bin2hex($pin_bytes);
    $_SESSION['pin_token'] = $pin_token;
} else {
    $pin_token = $_SESSION['pin_token'];
}


if($battlemine['time']<time() or ($battlemine['time']>time() and $battlemine_user['mine_bot']<=0)){
if($_SERVER['PHP_SELF'] == '/corp/battlemine/index.php'){
if (!isset($_SESSION['in_game_since']) || (time() - $_SESSION['in_game_since']) > 10) {
    $_SESSION['in_game_since'] = time(); // Обновляем время последней активности
    $_SESSION['check_bot'] = true; // Разрешаем проверку на бота только после обновления времени
}
// Проверка на бота и обновление времени активности
if ($_SESSION['check_bot'] && time() - $_SESSION['in_game_since'] >= 10) {
    // Проверка на пинг
    if (isset($_GET['js_ping'])) {
		
    $pin_get = (string)$_GET['js_ping'];
    $pin_sess = isset($_SESSION['pin_token']) ? (string)$_SESSION['pin_token'] : '';

    if ($pin_get !== $pin_sess) {
		$_SESSION['battlemine'] = '<div style="color:red">⚠ Не бейте так быстро!</div>';
        header('Location: /block.php');
        exit;
    }

    // Генерация нового токена после успешного удара
    $bytes = openssl_random_pseudo_bytes(8);
    $_SESSION['udar_token'] = bin2hex($bytes);


        // Проверяем, что реферер — это ваш сайт
        if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $HOME) !== false) {
            $_SESSION['js_alive'] = time();  // Обновляем время последней активности
            $_SESSION['check_bot'] = false; // Запрещаем дальнейшую проверку на бота, если пинг отправлен
            // Запрещаем блокировку, если пинг был отправлен
        } else {
            // Запрос с другого сайта, возможно бот
            http_response_code(403); // Отклоняем запрос
            echo 'Forbidden';
            return;
        }
    }

    // Проверка активности пользователя
    if (
        isset($_SESSION['js_alive']) &&
        time() - $_SESSION['js_alive'] <= 20
    ) {
        $isUserActive = true;
    } else {
        $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
        header('Location: /block.php'); // Перенаправление на блокировку, если нет активности
        exit;
    }
} 

?>
<head>
   <meta charset="UTF-8">
   <style>
     
       #confirmationBox {
           position: fixed;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           padding: 20px;
           background-color: rgba(0, 0, 0);
           color: white;
           border-radius: 8px;
           text-align: center;
           z-index: 9999;
           display: none; 
           pointer-events: auto; 
       }

     
       body.blocked {
           pointer-events: none; 
           opacity: 0.7;
       }


       #confirmationBox {
           opacity: 1; 
       }

      
       body.blocked > * {
           pointer-events: none;
       }
   </style>
</head>

<script>
(function() {
    const maxHistory = 10;  
    let clickHistory = [];
    let isReloading = false;  

    function loadClickHistory() {
        const history = localStorage.getItem('clickHistory');
        if (history) {
            clickHistory = JSON.parse(history);
        }
    }

    function saveClickHistory() {
        localStorage.setItem('clickHistory', JSON.stringify(clickHistory));
    }

    function sendPing() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "?js_ping=<?=$token?>", true);
        xhr.send();
        console.log('[ping] отправлен');
    }

    function saveClick(x, y) {
        clickHistory.push({ x, y });
        if (clickHistory.length > maxHistory) {
            clickHistory.shift();
        }
        saveClickHistory(); 
    }

    function isSameClick(x, y) {
        return clickHistory.some(click => Math.abs(click.x - x) < 3 && Math.abs(click.y - y) < 3); // Погрешность для точных кликов
    }

    window.addEventListener('beforeunload', () => {
        isReloading = true;
    });

    loadClickHistory();

    const activityEvents = ['mousemove', 'mousedown', 'keydown', 'scroll', 'touchstart'];

    activityEvents.forEach(evt => {
        window.addEventListener(evt, (event) => {
            let currentX = -1, currentY = -1;

            if (event.type === 'mousemove') {
                currentX = event.clientX;
                currentY = event.clientY;
            } else if (event.type === 'mousedown' || event.type === 'touchstart') {
                currentX = event.clientX || event.changedTouches[0].clientX;
                currentY = event.clientY || event.changedTouches[0].clientY;
            }

            if (currentX !== -1 && currentY !== -1) {
                if (!isSameClick(currentX, currentY) && !isReloading) { 
                    sendPing();  
                    saveClick(currentX, currentY);  
                }
            }
        });
    });

    setInterval(() => {
        if (!document.hidden && !isReloading) {
            sendPing();
        }
    }, 10000);
})();
</script>
<? 
}
} */











// Генерируем токен
if (!isset($_SESSION['udar_token'])) {
    $bytes = openssl_random_pseudo_bytes(8);
    $token = bin2hex($bytes);
    $_SESSION['udar_token'] = $token;
} else {
    $token = $_SESSION['udar_token'];
}

if($battlemine['time']>time() and $battlemine_user['mine_bot']>=1){
?>
<script>
    // Задержка перед переходом (в миллисекундах)
    var delay = 400; // 0.4 сек, можно больше

    // Подставляем PHP-переменную в JS
    var url = '/battlemine/?udar=<?=$token?>';

    // Функция для перехода по указанному URL через определенное время
    function redirectToUrl() {
        window.location.href = url;
    }

    // Устанавливаем задержку перед переходом
    setTimeout(redirectToUrl, delay);

    /* Если хочешь показывать сообщение игроку:
    document.write('Через ' + (delay / 1000) + ' секунд(ы) будет выполнен удар.<br> Пожалуйста, подождите...');
    */
</script>
<?
}




/*
if($battlemine['time_restart'] > time()){
header('Location: '.$HOME.'corp/'.$user['corp'].'/');
exit();
}
*/

/*
if($battlemine and $battlemine_user_coll <= 0 and $battlemine['time_start'] == 0 and $battlemine['time_restart'] == 0 and $battlemine['time'] < time() ){
$text = ' <font color=#b13131>'.$title.'</font> - <font size=2 color=black>получено:</font> <font color=indianred><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($battlemine['rubin']).' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($battlemine['angel']).'</font>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");
mysql_query('DELETE FROM `battlemine_user` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine_log` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine` WHERE `corp` = '.$user['corp'].' ');
mysql_query("INSERT INTO `battlemine` SET `corp` = '".$user['corp']."', `time_restart` = '".(time()+7200)."' ");
if($mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog` = '".($mission_user_18['prog']+1)."' WHERE `id` = '".$mission_user_18['id']."' ");
}
}
*/

if($battlemine['hp_'] <= 0 and $battlemine['time'] > time()){
mysql_query("UPDATE `battlemine` SET `time` = '5555555' WHERE `id` = '".$battlemine['id']."' limit 1");
}

if($battlemine['time'] < time() and $battlemine['time'] > 0){

$text = ' <font color=#b13131>'.$title.'</font> - <font size=2 color=black>получено:</font> <font color=indianred><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($battlemine['rubin']).' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($battlemine['angel']).'</font>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");

$us_where = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = ".$battlemine['id']." ORDER BY `id` DESC LIMIT 100");
while($us_w = mysql_fetch_assoc($us_where)){
$nagrada_user_9 = mysql_fetch_array(mysql_query('SELECT * FROM `nagrada_user` WHERE `user` = "'.$us_w['user'].'" and `number` = "9" '));
mysql_query("UPDATE `nagrada_user` SET `prog_` = '".($nagrada_user_9['prog_']+1)."' WHERE `id` = '".$nagrada_user_9['id']."' ");
}

mysql_query('DELETE FROM `battlemine_user` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine_log` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine` WHERE `corp` = '.$user['corp'].' ');
mysql_query("INSERT INTO `battlemine` SET `corp` = '".$user['corp']."', `time_restart` = '".(time()+7200)."' ");


}



$time_now = time();




// Проверяем, если шахта скоро откроется
if ($battlemine['time_start'] >= $time_now) {
    // Записываем оставшееся время в сессию
    $_SESSION['time_start'] = ($battlemine['time_start'] - $time_now);
} elseif (isset($_SESSION['time_start']) && $_SESSION['time_start'] > 0 && $_SESSION['time_start'] <= time()) {
    // Если время истекло, выводим сообщение
    echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color=grey size="3">Начало работ...</font></span></li></ul></div>';
    // Сбрасываем оставшееся время в сессии
    $_SESSION['time_start'] = 0;
} elseif (isset($_SESSION['time_start']) && $_SESSION['time_start'] > 0) {
    // Если время ещё не истекло, показываем оставшееся время
    echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelINFO"><span class="feedbackPanelINFO"><font color=grey size="3">До начала работ осталось: ' . _time($_SESSION['time_start']) . '</font></span></li></ul></div>';
}

if ($battlemine['time_start'] >= $time_now) {
// Автоматически обновляем страницу через оставшееся время
?>
<script>
    setTimeout(function() {
        window.location.href = "/battlemine/";
    }, <?php echo $_SESSION['time_start'] * 1000; ?>); // Умножаем на 1000 для миллисекунд
</script>
<?php
}












if($battlemine['time_restart'] < time() and $battlemine['time_restart'] > 0){
mysql_query('DELETE FROM `battlemine_user` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine_log` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine` WHERE `corp` = '.$user['corp'].' ');
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color=grey size="3">Обновление...</font></span></li></ul></div>';
?>
<script>
    setTimeout(function() {
        window.location.href = "/battlemine/";
    }, 100); // 1000 миллисекунд = 1 секунд
</script>
<?
}



if($battlemine['time_start'] < time() and $battlemine['time_start'] > 0){
$hp = 500000+($corp['battlemine']*500000);
mysql_query("UPDATE `battlemine` SET `time_start` = '0', `time_restart` = '0', `time` = '".(time()+1800)."', `hp` = '".$hp."' , `hp_` = '".$hp."' WHERE `id` = '".$battlemine['id']."' limit 1");
//echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color=grey size="3">Начало работ...</font></span></li></ul></div>';
?>
<script>
    setTimeout(function() {
        window.location.href = "/battlemine/";
    }, 100); // 1000 миллисекунд = 1 секунд
</script>
<?
}


























if($battlemine['time'] < time()){ ########################################################### если шахта не открыта

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color=#b13131 size="4">'.$title.'</font></span></li></ul></div>';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<span class="center"><img src="/corp/battlemine/images/mine.png" width="150"></span>
<hr>';


if ($battlemine['time_restart'] <= $time_now && $battlemine['time'] <= $time_now && $battlemine['time_start'] <= $time_now) { // можно запустить (только corp_rang 1 и 2)
        if (!$battlemine and $user['corp_rang'] <= 2) {
            echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Открыть набор игроков</span></span></a></center>';
        }elseif (!$battlemine and $user['corp_rang'] > 2) {
			echo '<span class="btni" style="min-width:160px;margin:4px;">Открыть набор игроков</span>';
            echo '<center><font size=2>Открыть шахту могут только Владелец или Заместитель.</font></center>';
        }
}elseif ($battlemine['time_restart'] <= $time_now && $battlemine['time'] <= $time_now && $battlemine['time_start'] >= $time_now) { // можно пресоеденится (все желающие)
            echo '<center><font size=2>Набор открыт, присоединиться могут все участники.</font></center>';
            if (!$battlemine_user) {
			echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Присоединиться</span></span></a></center>';
            }
			echo '<center><font color=black size=2>работы начнутся через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_' . ($battlemine['time_start'] - $time_now) . '000">' . _time($battlemine['time_start'] - $time_now) . '</span></font>';
            echo '<br><font size=2>Присоединилось:</font> <font color=black size=3>['.$battlemine_user_coll.']</font> <font size=2>чел.</font></center>';
            $usersss = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = '".$battlemine['id']."'  ORDER BY `id` asc LIMIT 15");
            while($c = mysql_fetch_assoc($usersss)){
				if($c['mine_bot']==1){				$kirka = '<img width="5%" alt="кирка" src="/mine/kirka1.png" title="кирка">';				}
                echo '<div style="text-align: center;margin-top:4px;">';
                echo '<span><span class="nobr">'.nick($c['user']).' '.$kirka.'</span></span>';
                echo '<div class="cb"></div></div>';
            }
}elseif ($battlemine['time_restart'] >= $time_now && $battlemine['time'] <= $time_now && $battlemine['time_start'] <= $time_now) { // можно пресоеденится (все желающие)
            echo '<center><font color=black size=2>шахта станет доступна через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_' . ($battlemine['time_restart'] - $time_now) . '000">' . _time($battlemine['time_restart'] - $time_now) . '</span></font></center>';
}

// Выводим информацию о добыче, если работы завершены
if ($battlemine && $battlemine['time'] < $time_now && $battlemine['time'] > 0) {
    echo '<center><font size=2 color="black">Всего добыто мне: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +' . n_f($battlemine_user['rubin']) . ' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +' . n_f($battlemine_user['musor']) . '% <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+' . n_f($battlemine_user['angel']) . '<hr>';
    echo 'Всего добыто Корпорации: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +' . n_f($battlemine['rubin']) . ' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+' . n_f($battlemine['angel']) . '</font></center>';
    
    if ($battlemine_user) {
        echo '<hr><a class="btni" style="min-width:160px;margin:4px;" href="?exit"><span><span>Завершить работы в шахте</span></span></a>';
    }
} 






/* 
// Проверка основных условий
if ($battlemine['time_restart'] <= $time_now && $battlemine['time'] <= $time_now) {
    
    // Если пользователь - владелец или заместитель и шахта не открыта, разрешаем открыть набор игроков
    if ($user['corp_rang'] == 1 || $user['corp_rang'] == 2) {
        if (!$battlemine || $battlemine['time_start'] <= 0) {
            echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Открыть набор игроков</span></span></a></center>';
        } elseif ($battlemine['time_start'] > $time_now) {
            echo '<center><font size=2>Набор открыт, присоединиться могут все участники.</font></center>';
        }
    }

    // Если шахта открыта, присоединиться могут все желающие
    if ($battlemine['time_start'] > $time_now && !$battlemine_user) {
        echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Присоединиться</span></span></a></center>';
    }
} else {
    // Если шахта закрыта на перерыв
    if ($battlemine['time_restart'] > $time_now) {
        echo '<center><font color=black size=2>шахта станет доступна через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_' . ($battlemine['time_restart'] - $time_now) . '000">' . _time($battlemine['time_restart'] - $time_now) . '</span></font></center>';
    }

    // Если шахта скоро откроется и пользователь не владелец или заместитель, выводим сообщение
    if ($battlemine['time_start'] > $time_now) {
        echo '<center><font color=black size=2>работы начнутся через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_' . ($battlemine['time_start'] - $time_now) . '000">' . _time($battlemine['time_start'] - $time_now) . '</span></font>';
            echo '<br><font size=2>Присоединилось:</font> <font color=black size=3>['.$battlemine_user_coll.']</font> <font size=2>чел.</font></center>';
            $usersss = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = '".$battlemine['id']."'  ORDER BY `id` asc LIMIT 15");
            while($c = mysql_fetch_assoc($usersss)){
                echo '<div style="text-align: center;margin-top:4px;">';
                echo '<span><span class="nobr">'.nick($c['user']).'</span></span>';
                echo '<div class="cb"></div></div>';
            }
	}else{
        if ($user['corp_rang'] > 2) {
            echo '<br><font size=2>Открыть шахту могут только Владелец или Заместитель.</font></center>';
        }
    }
}

// Выводим информацию о добыче, если работы завершены
if ($battlemine && $battlemine['time'] < $time_now && $battlemine['time'] > 0) {
    echo '<center><font size=2 color="black">Всего добыто мне: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +' . n_f($battlemine_user['rubin']) . ' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +' . n_f($battlemine_user['musor']) . '% <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+' . n_f($battlemine_user['angel']) . '<hr>';
    echo 'Всего добыто Корпорации: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +' . n_f($battlemine['rubin']) . ' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+' . n_f($battlemine['angel']) . '</font></center>';
    
    if ($battlemine_user) {
        echo '<hr><a class="btni" style="min-width:160px;margin:4px;" href="?exit"><span><span>Завершить работы в шахте</span></span></a>';
    }
} */




/* 
$time_now = time();

// Проверяем общие условия перед выполнением основного кода
if($battlemine['time_start'] <= $time_now && $battlemine['time_restart'] <= $time_now && $battlemine['time'] <= $time_now) {

    if ($user['corp_rang'] < 3) {
        if (!$battlemine) {
            echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Открыть набор игроков</span></span></a></center>';
        } 
    } elseif ($user['corp_rang'] >= 2 && !$battlemine_user) {
        echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Присоединиться</span></span></a></center>';
    }

} else {
    if ($battlemine['time_restart'] > $time_now) {
        echo '<center><font color=black size=2>шахта станет доступна через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_' . ($battlemine['time_restart'] - $time_now) . '000">' . _time($battlemine['time_restart'] - $time_now) . '</span></font></center>';
    }
    
    if ($battlemine['time_start'] > $time_now) {
		if ($user['corp_rang'] > 0 && !$battlemine_user) {
        echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Присоединиться</span></span></a></center>';
        }
	    echo '<center><font color=black size=2>работы начнутся через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_' . ($battlemine['time_start'] - $time_now) . '000">' . _time($battlemine['time_start'] - $time_now) . '</span></font>';
        echo '<br><font size=2>Присоединилось:</font> <font color=black size=3>['.$battlemine_user_coll.']</font> <font size=2>чел.</font></center>';
     $usersss = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = '".$battlemine['id']."'  ORDER BY `id` asc LIMIT 15");
     while($c = mysql_fetch_assoc($usersss)){
     echo '<div style="text-align: center;margin-top:4px;">';echo '<span><span class="nobr">'.nick($c['user']).'</span></span> ';echo '<div class="cb"></div></div>';
     }
}
}

// Выводим информацию о добыче, если работы завершены
if($battlemine && $battlemine['time'] < $time_now && $battlemine['time'] > 0) {
    echo '<center><font size=2 color="black">Всего добыто мне: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +' . n_f($battlemine_user['rubin']) . ' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +' . n_f($battlemine_user['musor']) . '% <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+' . n_f($battlemine_user['angel']) . '<hr>';
    echo 'Всего добыто Корпорации: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +' . n_f($battlemine['rubin']) . ' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+' . n_f($battlemine['angel']) . '</font></center>';
    
    if($battlemine_user){
        echo '<hr><a class="btni" style="min-width:160px;margin:4px;" href="?exit"><span><span>Завершить работы в шахте</span></span></a>';
    }
}
 */




/* if($user['corp_rang'] < 3 and $battlemine['time_start'] ==0 and $battlemine['time_restart'] < time() and ($battlemine['time'] == 0 or !$battlemine) ){ // открыть набор если ранг позволяет, если набор закрыт, если перерыва нету, если поход закрыт
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Открыть набор игроков</span></span></a></center>';
}

if(!$battlemine_user and $user['corp_rang'] > 2 and $battlemine['time_start'] > time() and $battlemine['time_restart'] < time() and $battlemine['time'] < time()){ // Присоединиться если заявки еще нет, если набор открыт, если перерыва нету, если поход закрыт
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Присоединиться</span></span></a></center>';
}

if($user['corp_rang'] < 3 and $battlemine['time_start'] > time() and $battlemine['time_restart'] < time() and $battlemine['time'] < time()){ // начинаем работы если ранг позволяет, если набор открыт и таймер еще не истек, если перерыва нету, если поход закрыт
if($battlemine_user){
//echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Начать работы</span></span></a></center>';
}else{
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Присоединиться</span></span></a></center>';
}

echo '<center><font color=black size=2>работы начнутся автоматически через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_'.($battlemine['time_start']-time()).'000">'._time($battlemine['time_start']-time()).'</span></font></center>';
echo '<center><font size=2>Присоединилось:</font> <font color=black size=3>['.$battlemine_user_coll.']</font> <font size=2>чел.</font></center>';
$usersss = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = '".$battlemine['id']."'  ORDER BY `id` asc LIMIT 15");
while($c = mysql_fetch_assoc($usersss)){
echo '<div style="text-align: center;margin-top:4px;">';echo '<span><span class="nobr">'.nick($c['user']).'</span></span> ';echo '<div class="cb"></div></div>';
}
}

if($battlemine['time_restart'] > time()){
echo '<center><font color=black size=2>шахта станет доступна через:: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_'.($battlemine['time_restart']-time()).'000">'._time($battlemine['time_restart']-time()).'</span></font></center>';
}
if(!$battlemine_user and $user['corp_rang'] > 2 and $battlemine['time_start'] < time() and $battlemine['time_restart'] < time() and $battlemine['time'] < time()){ // Присоединиться если заявки еще нет, если набор открыт, если перерыва нету, если поход закрыт
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?start"><span><span>Набор закрыт</span></span></a>
<br> <font size=2>набор может открывать <b>Владелец</b> и <b>Заместитель</b></font>
</center>';
}
if($battlemine_user and $user['corp_rang'] > 2 and $battlemine['time_start'] > time() and $battlemine['time_restart'] < time() and $battlemine['time'] < time()){ // Присоединиться если заявки еще нет, если набор открыт, если перерыва нету, если поход закрыт
echo '<center><font color=black size=2>работы начнутся автоматически через: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_'.($battlemine['time_start']-time()).'000">'._time($battlemine['time_start']-time()).'</span></font>
<br> <font size=2>также работы может начать <b>Владелец</b> и <b>Заместитель</b></font></center>';
echo '<hr><center><font size=2>Присоединилось:</font> <font color=black size=3>['.$battlemine_user_coll.']</font> <font size=2>чел.</font></center>';
$usersss = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = '".$battlemine['id']."'  ORDER BY `id` asc LIMIT 15");
while($c = mysql_fetch_assoc($usersss)){
echo '<div style="text-align: center;margin-top:4px;">';echo '<span><span class="nobr">'.nick($c['user']).'</span></span> ';echo '<div class="cb"></div></div>';
}
}
if($battlemine and $battlemine['time'] >= 0 and ($battlemine['time'] < time() and $battlemine['time'] > 0) ){
echo '<center><font size=2 color="black">Всего добыто мне: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($battlemine_user['rubin']).' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f($battlemine_user['musor']).'% <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($battlemine_user['angel']).'<hr>
Всего добыто Корпорации: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($battlemine['rubin']).' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($battlemine['angel']).'
</font>';
if($battlemine_user and $battlemine and $battlemine['time'] >= 0 and $battlemine['time'] < time()){
echo '<hr><a class="btni" style="min-width:160px;margin:4px;" href="?exit"><span><span>Завершить работы в шахте</span></span></a>';
}
echo '</center>';
} */



if(!$battlemine_user){
echo '<hr>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> Корпоративная Шахта</font> - локация для сбора ресурсов игрокам и Корпорации.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> </font>Работы в Шахте могут вести все игроки Корпорации одновременно.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> </font>Запускать работы может <b>владелец</b> и <b>заместитель</b> Корпорации.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> </font>Перерыв между походами 2 часа.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> </font>Во время работ можно найти <b>Рубины</b>, <b>Коллекции</b> и <b>Корпоративные Ангелы</b>.</font></div>';
}
echo '</span></li></ul></div>';









echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div class="wrap-content"><center>
<img width="15%" alt="кирка" src="/mine/kirka1.png" title="кирка">
<br>_________________________<br>
<center>Стоимость: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 100k</center>
<div class="mt4"></div>
VIP автокирка активируется за рубины только для следующего похода в корпоративную шахту.
<hr>';

//if($user['mine_bot_time'] > time()) {
    if($battlemine_user['mine_bot'] == 1) {
        echo '<font color="grey">Действие автокирки <font color="green"><b>Активно</b></font>.</font><br>';
    } else {
        echo '<font color="grey">Действие автокирки <b>не активно</b>.</font><br>';
        echo '<a class="btni mt4" style="min-width:160px;margin:4px;" href="?autokirka_get"><span>Активировать <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 100k</span></a>';
    }
/* } else {
    echo '<font color="grey">Действие автокирки <b>не активно</b>.</font><br>';
    echo '<a class="btni mt4" style="min-width:160px;margin:4px;" href="/autokirka/?autokirka_get"><span>Получить бесплатно</span></a>';
} */

echo '</center></div></span></li></ul></div>';


if(isset($_GET['autokirka_get'])){
if($battlemine['time_start']<time() ){$_SESSION['err'] = '<font color=red>Создайте новый поход в шахту или присоединяйтесь к уже существующему.</font>';header('Location: ?');exit();}
if(!$battlemine_user){$_SESSION['err'] = '<font color=red>Создайте новый поход в шахту или присоединяйтесь к уже существующему.</font>';header('Location: ?');exit();}
if($battlemine_user['mine_bot']>=1){header('Location: ?');exit();}
if($user['rubin']<100000){$_SESSION['err'] = '<font color=red>Не хватает рубинов.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = `rubin` - '100000' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `battlemine_user` SET `mine_bot` = '1' WHERE `id` = '".$battlemine_user['id']."' ");
header('Location: ?');
exit();
}





/* if($user['id'] == 1){

$air = mysql_query("SELECT * FROM `biznes` WHERE `id` ORDER BY `id` ASC LIMIT 300");
while($ar = mysql_fetch_assoc($air)){
$cost = (($ar['id']+1)*500);
//echo ''.$ar['id'].' уровень = '.$cost.' рубинов<hr>';
echo ''.$cost.'+';
}



$air = mysql_query("SELECT * FROM `biznes` WHERE `id` ORDER BY `id` ASC LIMIT 50");
while($ar = mysql_fetch_assoc($air)){
$cost = (($ar['id']+1)*100000*($ar['id']+1));
//echo ''.$ar['id'].' уровень = '.$cost.' рубинов<hr>';
echo ''.$cost.'+';
}

} */






if(!$battlemine_user){
$cost_up_us = (($user['battlemine']+1)*500);
$cost_up_cp = (($corp['battlemine']+1)*100000*($corp['battlemine']+1));


echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;">';

echo'<div class="menu-left">
<a class="fl"><img src="/corp/battlemine/images/up.png" width="18" height="18"><font size="2" color="white">'.$user['battlemine'].'</font></a>
<a class="center"><font color="#b13131" size="2" color="white">Доход</font></a>
<a class="fr"><font size="2" color="white"> +'.$user['battlemine'].'%</font></a><br><br>
<img src="/corp/battlemine/images/news.png" width="30%">
<hr>';
echo '<a href="?up_us"> <font size="2">Улучшить за <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost_up_us).'</font></a><hr>';
echo '<font color="black" size="1"><tt>Повышает мою прибыль с Шахты на '.$user['battlemine'].'%</tt></font></div></td><td style="vertical-align:top;width:50%;">';



echo '<div class="menu-left">
<a class="fl"><img src="/corp/battlemine/images/up.png" width="18" height="18"><font size="2" color="white">'.$corp['battlemine'].'</font></a>
<a class="center"><font color="#b13131" size="2" color="white">Здоровье</font></a>
<a class="fr"><font size="2" color="white"> +'.n_f($corp['battlemine']*500000).' </font></a><br><br>
<img src="/corp/battlemine/images/news.png" width="30%"><hr>';
echo '<a href="?up_cp"> <font size="2">Улучшить за <img src="/images/ruby.png" width="18" height="18"> '.n_f($cost_up_cp).'</font></a><hr>';
echo '<font color="black" size="1"><tt>Повышает максимальное кол-во жизни Шахты</tt></font></div>';


echo '</td></tr></tbody></table>';


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> Доход</font> - каждое улучшение повышает прибыль на 1%.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> </font>  улучшается за рубины с личного баланса.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> Здоровье</font> - каждое улучшение прибавляет 500k жизни Шахты.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> </font>  улучшается за рубины с фонда Корпорации.</font></div>
<div class="left"><font size="2"><font color="black"> <font size="3">•</font> </font>  улучшать может только Владелец и Заместитель.</font></div>';
echo '</span></li></ul></div>';






if(isset($_GET['up_us'])){
if($user['rubin'] < $cost_up_us){$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов.</font>';header('Location: ?');exit();}
if($user['battlemine'] >= 1000){$_SESSION['err'] = '<font color=red>Ошибка! Максимальный уровень.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `battlemine` = '".($user['battlemine']+1)."', `rubin` = '".($user['rubin']-$cost_up_us)."' WHERE `id` = '".$user['id']."' limit 1");
header('Location: ?');
exit();
}


if(isset($_GET['up_cp'])){
if($user['corp_rang'] > 2){header('Location: ?');exit();}
if($corp['rubin'] < $cost_up_cp){$_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов.</font>';header('Location: ?');exit();}
if($corp['battlemine'] >= 100){$_SESSION['err'] = '<font color=red>Ошибка! Максимальный уровень.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `corp` SET `battlemine` = '".($corp['battlemine']+1)."', `rubin` = '".($corp['rubin']-$cost_up_cp)."' WHERE `id` = '".$corp['id']."' limit 1");
header('Location: ?');
exit();
}

}






#######################################################################################################################################################################################
if(isset($_GET['exit'])){
if($battlemine['time_start'] > time()){header('Location: ?');exit();}
if($battlemine['time_restart'] > time()){header('Location: ?');exit();}
if($battlemine['time'] > time()){header('Location: ?');exit();}
if(!$battlemine){header('Location: ?');exit();}

if($user['corp_rang'] < 3){
$text = ' <font color=#b13131>'.$title.'</font> - <font size=2 color=black>получено:</font> <font color=indianred><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($battlemine['rubin']).' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($battlemine['angel']).'</font>';
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text', `time` = '".time()."'");

$us_where = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = ".$battlemine['id']." ORDER BY `id` DESC LIMIT 100");
while($us_w = mysql_fetch_assoc($us_where)){
$nagrada_user_9 = mysql_fetch_array(mysql_query('SELECT * FROM `nagrada_user` WHERE `user` = "'.$us_w['user'].'" and `number` = "9" '));
mysql_query("UPDATE `nagrada_user` SET `prog_` = '".($nagrada_user_9['prog_']+1)."' WHERE `id` = '".$nagrada_user_9['id']."' ");
}
mysql_query('DELETE FROM `battlemine_user` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine_log` WHERE `battle_id` = '.$battlemine['id'].' ');
mysql_query('DELETE FROM `battlemine` WHERE `corp` = '.$user['corp'].' ');
mysql_query("INSERT INTO `battlemine` SET `corp` = '".$user['corp']."', `time_restart` = '".(time()+7200)."' ");
}else{
mysql_query('DELETE FROM `battlemine_user` WHERE `user` = '.$user['id'].' ');
$nagrada_user_9 = mysql_fetch_array(mysql_query('SELECT * FROM `nagrada_user` WHERE `user` = "'.$user['id'].'" and `number` = "9" '));
mysql_query("UPDATE `nagrada_user` SET `prog_` = '".($nagrada_user_9['prog_']+1)."' WHERE `id` = '".$nagrada_user_9['id']."' ");
}



if($mission_user_18['time_restart'] == 0) {
mysql_query("UPDATE `mission_user` SET `prog` = '".($mission_user_18['prog']+1)."' WHERE `id` = '".$mission_user_18['id']."' ");
}
header('Location: ?');
exit();
}

















if(isset($_GET['start'])) {

    // Проверка на условия для открытия набора
    if($user['corp_rang'] < 3 && $battlemine['time_start'] < time() && $battlemine['time_restart'] < time() && $battlemine['time'] < time()) {
        if($battlemine['time_start'] > time() || $battlemine['time_restart'] > time() || $battlemine['time'] > time() || $user['corp_rang'] > 2) {
            header('Location: ?');
            exit();
        }
        if(!$battlemine_user) {
            $hp = 500000 + ($corp['battlemine'] * 500000);
            mysql_query("INSERT INTO `battlemine` SET `corp` = '".$user['corp']."', `time_start` = '".(time()+300)."', `hp` = '".$hp."', `hp_` = '".$hp."'");
            $uid = mysql_insert_id();
            mysql_query("INSERT INTO `battlemine_user` SET `user` = '".$user['id']."', `battle_id` = '".$uid."'");
            
            $text1 = 'Игрок '.nick($user['id']).' открыл набор в шахту. <br>Начало в <img src="/images/clock.png" alt="через" width="24" height="24"> '.vremja(time()+300).'</font><hr><a href="/battlemine/">Шахта<a><div class="cb"></div>';
            mysql_query("UPDATE `corp` SET `ad` = '".$text1."', `ad_user` = '2', `ad_time` = '".time()."' WHERE `id` = '".$user['corp']."' LIMIT 1");
            mysql_query("UPDATE `users` SET  `ad` = '1' WHERE `corp` = '".$corp['id']."'");
            mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text1', `time` = '".time()."'");
        }
    }

/*     // Проверка на условия для начала работы
    if($user['corp_rang'] < 3 && $battlemine['time_start'] > time() && $battlemine['time_restart'] < time() && $battlemine['time'] < time()) {
        if($battlemine['time_start'] < time() || $battlemine['time_restart'] > time() || $battlemine['time'] > time() || $user['corp_rang'] > 2) {
            header('Location: ?');
            exit();
        }
        if(!$battlemine_user) {
            mysql_query("INSERT INTO `battlemine_user` SET `user` = '".$user['id']."', `battle_id` = '".$battlemine['id']."'");
        } else {
            mysql_query("UPDATE `battlemine` SET `time_start` = '0', `time_restart` = '0', `time` = '".(time()+1800)."' WHERE `id` = '".$battlemine['id']."' LIMIT 1");
        }
    } */

    // Проверка на присоединение к набору
    if($user['corp_rang'] >= 0 && $battlemine['time_start'] > time() && $battlemine['time_restart'] < time() && $battlemine['time'] < time()) {
        if($battlemine['time_start'] < time() || $battlemine['time_restart'] > time() || $battlemine['time'] > time() || $battlemine_user) {
            header('Location: ?');
            exit();
        }
        mysql_query("INSERT INTO `battlemine_user` SET `user` = '".$user['id']."', `battle_id` = '".$battlemine['id']."'");
    }

    header('Location: ?');
    exit();
}








/* 

if(isset($_GET['start'])){

if($user['corp_rang'] < 3 and $battlemine['time_start'] < time() and $battlemine['time_restart'] < time() and $battlemine['time'] < time()){ // открыть набор если ранг позволяет, если набор закрыт, если перерыва нету, если поход закрыт
if($battlemine['time_start'] > time()){header('Location: ?');exit();}
if($battlemine['time_restart'] > time()){header('Location: ?');exit();}
if($battlemine['time'] > time()){header('Location: ?');exit();}
if($battlemine){header('Location: ?');exit();}
if($user['corp_rang'] > 2 ){header('Location: ?');exit();}
$hp = 500000+($corp['battlemine']*500000);
mysql_query("INSERT INTO `battlemine` SET `corp` = '".$user['corp']."', `time_start` = '".(time()+300)."' , `hp` = '".$hp."' , `hp_` = '".$hp."' ");
$uid = mysql_insert_id();
mysql_query("INSERT INTO `battlemine_user` SET `user` = '".$user['id']."', `battle_id` = '".$uid."' ");

$text1 = 'Игрок '.nick($user['id']).' открыл набор в шахту. 
<br>Начало в <img src="/images/clock.png" alt="через" width="24" height="24"> '.vremja(time()+300).'</font>
<hr><a href="/battlemine/">Шахта<a>
<div class="cb"></div>';
mysql_query("UPDATE `corp` SET `ad` = '".$text1."', `ad_user` = '2', `ad_time` = '".time()."' WHERE `id` = '".$user['corp']."' limit 1");
mysql_query("UPDATE `users` SET  `ad` = '1' WHERE `corp` = '$corp[id]'");
mysql_query("INSERT INTO `history` SET `corp` = '".$user['corp']."', `text` = '$text1', `time` = '".time()."'");


}

if($user['corp_rang'] < 3 and $battlemine['time_start'] > time() and $battlemine['time_restart'] < time() and $battlemine['time'] < time()){ // начинаем работы если ранг позволяет, если набор открыт и таймер еще не истек, если перерыва нету, если поход закрыт
if($battlemine['time_start'] < time()){header('Location: ?');exit();}
if($battlemine['time_restart'] > time()){header('Location: ?');exit();}
if($battlemine['time'] > time()){header('Location: ?');exit();}
if($user['corp_rang'] > 2 ){header('Location: ?');exit();}
if($battlemine_user){
mysql_query("UPDATE `battlemine` SET `time_start` = '0', `time_restart` = '0', `time` = '".(time()+1800)."' WHERE `id` = '".$battlemine['id']."' limit 1");
}else{
mysql_query("INSERT INTO `battlemine_user` SET `user` = '".$user['id']."', `battle_id` = '".$battlemine['id']."' ");
}
}

if($user['corp_rang'] >= 0 and $battlemine['time_start'] > time() and $battlemine['time_restart'] < time() and $battlemine['time'] < time()){ // (набор открыт присоединениею...)        открыть набор если ранг позволяет, если набор закрыт, если перерыва нету, если поход закрыт
if($battlemine['time_start'] < time()){header('Location: ?');exit();}
if($battlemine['time_restart'] > time()){header('Location: ?');exit();}
if($battlemine['time'] > time()){header('Location: ?');exit();}
if($battlemine_user){header('Location: ?');exit();}
if($user['corp_rang'] < 2 ){header('Location: ?');exit();}
mysql_query("INSERT INTO `battlemine_user` SET `user` = '".$user['id']."', `battle_id` = '".$battlemine['id']."' ");
}else{
/$_SESSION['err'] = '<font color=red>Ошибка</font>
'.$user['corp_rang'].'<br>
'.$battlemine['time_start'].'<br>
'.$battlemine['time_restart'].'<br>
'.$battlemine['time'].'<br>
';header('Location: ?');exit();
}

header('Location: ?');
exit();
} */
#######################################################################################################################################################################################
}


































if($battlemine['time'] > time() and $battlemine_user){ ########################################################################################## если шахта открыта и я участвую
$progress_ = round((($battlemine['hp_']*100)/$battlemine['hp']));
if($progress_ > 100) {$progress_ = 100;}



echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color=#b13131 size="4">'.$title.'
<hr><font color=black size=2>До завершения работ осталось: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_'.($battlemine['time']-time()).'000">'._time($battlemine['time']-time()).'</span></font>
</font></span></li></ul></div>';


echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<span class="center"><img src="/corp/battlemine/images/news.png" width="125"></span>
<div style="border:1px solid #d67600;border-radius:4px;margin:4px 8px;"><div class="expline" style="width:'.$progress_.'%;"></div></div>
<div class="cb"></div>
<center> <font color=black size=3>[</font> <font color=grey size=2>'.$progress_.'%</font> <font color=black size=3>/ 100]</font> </center>
<hr>';
if (isset($_SESSION['battlemine'])){
?><center><?=$_SESSION['battlemine']?></center><hr><?php
unset($_SESSION['battlemine']);}
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?udar='.$token.'">
  <span><span>Бить Киркой</span></span>
</a></center>
<hr>

<div><div style="margin-top: 4px;">
<span class="fl nobr"><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"><font size=2 color=red>'.n_f($battlemine_user['rubin']).'</font><font size=2 color=black>/</font><img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"><font size=2 color=red>'.n_f($battlemine_user['musor']).'%</font><font size=2 color=black>/</font><img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы"><font size=2 color=red>'.n_f($battlemine_user['angel']).'</font></span>
<span class="fr nobr"><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"><font size=2 color=red>'.n_f($battlemine['rubin']).'</font><font size=2 color=black>/</font><img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы"><font size=2 color=red>'.n_f($battlemine['angel']).'</font></span>
<div class="cb"></div></div></div>

</span></li></ul></div>';




if($user['id']==1){
/* $musor_11 = rand(50000,100000);
$musor__ = (($user['musor_proc']*1/100)/$musor_11);
$musor = ceil($musor__+($musor__*$user['battlemine']/100));
echo ''.n_f($musor).'<hr>';



$angel_11 = rand(50000,100000);
$angel__ = (($user['angel']*1/100)/$angel_11);
$angel = ceil($angel__+($angel__*$user['battlemine']/100)); */
/* 
$angel_11 = rand(1,10);
$angel__ = (($user['angel']*1/100)/$angel_11);
$angel = ceil($angel__+($angel__*$user['battlemine']/100)); 




echo ''.n_f(($user['angel']*1/100)/2).'  '.n_f($user['angel']*1/100).'   '.n_f($angel).'<hr>'; */
} 







/* #######################################################################################################################################################################################
if(isset($_GET['udar'])){
$_SESSION['battlemine'] = '<b>Ничего не найдено</b>';
header('Location: ?');
exit();
}
#######################################################################################################################################################################################
 */





#######################################################################################################################################################################################
if(isset($_GET['udar'])){
if (mt_rand(0, 100) >= 75){
$rubin_ = rand(0,100);
$rubin = ceil($rubin_+($rubin_*$user['battlemine']/100));
}else{
$rubin = 0;
}
if($battlemine['time']<time() or ($battlemine['time']>time() and $battlemine_user['mine_bot']<=0)){
   $udar_get = (string)$_GET['udar'];
    $udar_sess = isset($_SESSION['udar_token']) ? (string)$_SESSION['udar_token'] : '';

    if ($udar_get !== $udar_sess) {
		$_SESSION['battlemine'] = '<div style="color:red">⚠ Не бейте так быстро!</div>';
        header('Location: ?');
        exit;
    }

    // Генерация нового токена после успешного удара
    $bytes = openssl_random_pseudo_bytes(8);
    $_SESSION['udar_token'] = bin2hex($bytes);
}

function bcceil($number) {
    $intPart = bcadd($number, '0', 0); // floor
    if (bccomp($number, $intPart, 10) == 1) {
        return (int)$intPart + 1;
    }
    return (int)$intPart;
}




/* 


if (mt_rand(1, 100) >= 80){
$musor_11 = rand(1,10);
$musor__ = (($user['musor_proc']*0.05/100)/$musor_11);
$musor = ceil($musor__+($musor__*$user['battlemine']/100)); 
}else{
$musor = 0;
}

if (mt_rand(1, 100) >= 80){
$angel_11 = rand(1,10);
$angel__ = (($user['angel']*0.05/100)/$angel_11);
$angel = ceil($angel__+($angel__*$user['battlemine']/100)); 
}else{
$angel = 0;
}
 */




if (mt_rand(1, 100) >= 80) {
    $musor_11 = mt_rand(1, 10); // рандом делителя
    
    $musor_proc = toBC($user['musor_proc']);
    $musor_11_bc = toBC($musor_11);

    // (musor_proc * 0.05 / 100) / musor_11
    $part = bcdiv(bcmul($musor_proc, '0.0005', 10), $musor_11_bc, 10);

    // part + (part * battlemine / 100)
    $bonus = bcmul($part, bcdiv($user['battlemine'], '100', 10), 10);
    $musor_sum = bcadd($part, $bonus, 10);

    // Округление вверх
    $musor = ($musor_sum);
} else {
    $musor = 0;
}



if (mt_rand(1, 100) >= 80) {
    $angel_11 = mt_rand(1, 10); // рандом делителя
    
    $angel = toBC($user['angel']);
    $angel_11_bc = toBC($angel_11);

    // (musor_proc * 0.05 / 100) / musor_11
    $part = bcdiv(bcmul($angel, '0.0005', 10), $angel_11_bc, 10);

    // part + (part * battlemine / 100)
    $bonus = bcmul($part, bcdiv($user['battlemine'], '100', 10), 10);
    $angel_sum = bcadd($part, $bonus, 10);

    // Округление вверх
    $angel = ($angel_sum);
} else {
    $angel = 0;
}



$hp_ = rand(2000,3000);

if($hp_ >= $battlemine['hp_'] and $battlemine['time'] > time()){
mysql_query("UPDATE `battlemine` SET `time` = '5555555' WHERE `id` = '".$battlemine['id']."' limit 1");
}


if($battlemine_user['time_udar'] <= time()){


if($rubin > 0 and $musor <= 0 and $angel <= 0){
$text = ' '.nick($user['id']).' - <font size=2 color=black>получено:</font> <font color=indianred><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">+'.n_f($rubin).'</font>';
mysql_query("INSERT INTO `battlemine_log` SET `battle_id` = '".$battlemine['id']."', `text` = '$text', `time` = '".time()."'");
mysql_query("UPDATE `battlemine` SET `rubin` = '".($battlemine['rubin']+$rubin)."', `hp_` = '".($battlemine['hp_']-$hp_)."' WHERE `id` = '".$battlemine['id']."' limit 1");
mysql_query("UPDATE `battlemine_user` SET `rubin` = '".($battlemine_user['rubin']+$rubin)."' WHERE `id` = '".$battlemine_user['id']."' limit 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."' WHERE `id` = '".$user['id']."' limit 1");
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']+$rubin)."' WHERE `id` = '".$corp['id']."' limit 1");
$_SESSION['battlemine'] = 'Найдено: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($rubin).'';
}



elseif($musor > 0 and $rubin <= 0 and $angel <= 0){
$text = ' '.nick($user['id']).' - <font size=2 color=black>получено:</font> <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор">+'.n_f($musor).'%';
mysql_query("INSERT INTO `battlemine_log` SET `battle_id` = '".$battlemine['id']."', `text` = '$text', `time` = '".time()."'");
$new_musor_battlemine = bcadd(toBC($battlemine['musor']), toBC($musor));
$new_hp_battlemine = bcsub(toBC($battlemine['hp_']), toBC($hp_));
$new_musor_battlemine_user = bcadd(toBC($battlemine_user['musor']), toBC($musor));
$new_musor_user = bcadd(toBC($user['musor_proc']), toBC($musor));
mysql_query("UPDATE `battlemine` SET `musor` = '$new_musor_battlemine', `hp_` = '$new_hp_battlemine' WHERE `id` = '".$battlemine['id']."' LIMIT 1");
mysql_query("UPDATE `battlemine_user` SET `musor` = '$new_musor_battlemine_user' WHERE `id` = '".$battlemine_user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `musor_proc` = '$new_musor_user' WHERE `id` = '".$user['id']."' LIMIT 1");
$_SESSION['battlemine'] = 'Найдено: <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f($musor).'%';
}


elseif($angel > 0 and $musor <= 0 and $rubin <= 0){
$text = ' '.nick($user['id']).' - <font size=2 color=black>получено:</font> <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($angel).'';
mysql_query("INSERT INTO `battlemine_log` SET `battle_id` = '".$battlemine['id']."', `text` = '$text', `time` = '".time()."'");
$new_angel_battlemine_user = bcadd(toBC($battlemine_user['angel']), toBC($angel));
$new_angel_battlemine = bcadd(toBC($battlemine['angel']), toBC($angel));
$new_angel_user = bcadd(toBC($user['angel']), toBC($angel));
$new_angel_corp = bcadd(toBC($corp['angel']), toBC($angel));
mysql_query("UPDATE `battlemine` SET `angel` = '$new_angel_battlemine_user', `hp_` = '".($battlemine['hp_']-$hp_)."' WHERE `id` = '".$battlemine['id']."' limit 1");
mysql_query("UPDATE `battlemine_user` SET `angel` = '$new_angel_battlemine_user' WHERE `id` = '".$battlemine_user['id']."' LIMIT 1");
mysql_query("UPDATE `users` SET `angel` = '$new_angel_user' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `corp` SET `angel` = '$new_angel_corp' WHERE `id` = '".$corp['id']."' LIMIT 1");
$_SESSION['battlemine'] = 'Найдено: <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы"> +'.n_f($angel).'';
}


elseif($rubin > 0 and $musor > 0){
$text = ' '.nick($user['id']).' - <font size=2 color=black>получено:</font> <font color=indianred><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">+'.n_f($rubin).'</font> <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор">+'.n_f($musor).'%';

// Экранируем строку для запроса
$text_safe = mysql_real_escape_string($text);

mysql_query("INSERT INTO `battlemine_log` SET `battle_id` = '".intval($battlemine['id'])."', `text` = '$text_safe', `time` = '".time()."'");

// Для сложения используй bcadd или явно кастуй к float/double
$new_musor_proc = bcadd(toBC($user['musor_proc']), toBC($musor));
$new_rubin_user = bcadd(toBC($user['rubin']), toBC($rubin));
$new_rubin_corp = bcadd(toBC($corp['rubin']), toBC($rubin));
$new_musor_battlemine_user = bcadd(toBC($battlemine_user['musor']), toBC($musor));
$new_musor_battlemine = bcadd(toBC($battlemine['musor']), toBC($musor));

mysql_query("UPDATE `battlemine_user` SET `rubin` = '".floatval($battlemine_user['rubin'] + $rubin)."', `musor` = '$new_musor_battlemine_user' WHERE `id` = '".intval($battlemine_user['id'])."' LIMIT 1");
mysql_query("UPDATE `battlemine` SET `rubin` = '".floatval($battlemine['rubin'] + $rubin)."', `musor` = '$new_musor_battlemine', `hp_` = '".floatval($battlemine['hp_'] - $hp_)."' WHERE `id` = '".intval($battlemine['id'])."' LIMIT 1");
mysql_query("UPDATE `users` SET `musor_proc` = '$new_musor_proc', `rubin` = '$new_rubin_user' WHERE `id` = '".intval($user['id'])."' LIMIT 1");
mysql_query("UPDATE `corp` SET `rubin` = '$new_rubin_corp' WHERE `id` = '".intval($corp['id'])."' LIMIT 1");
$_SESSION['battlemine'] = 'Найдено: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($rubin).' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f($musor).'%';
}


elseif($rubin > 0 and $angel > 0){
$text = ' '.nick($user['id']).' - <font size=2 color=black>получено:</font> <font color=indianred><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины">+'.n_f($rubin).'</font> <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($angel).'';
mysql_query("INSERT INTO `battlemine_log` SET `battle_id` = '".$battlemine['id']."', `text` = '$text', `time` = '".time()."'");

$new_angel_battlemine_user = bcadd(toBC($battlemine_user['angel']), toBC($angel));
$new_angel_battlemine = bcadd(toBC($battlemine['angel']), toBC($angel));
$new_angel_user = bcadd(toBC($user['angel']), toBC($angel));
$new_angel_corp = bcadd(toBC($corp['angel']), toBC($angel));
mysql_query("UPDATE `battlemine_user` SET `rubin` = '".($battlemine_user['rubin']+$rubin)."', `angel` = '$new_angel_battlemine_user' WHERE `id` = '".$battlemine_user['id']."' limit 1");
mysql_query("UPDATE `battlemine` SET `rubin` = '".($battlemine['rubin']+$rubin)."', `angel` = '$new_angel_battlemine', `hp_` = '".($battlemine['hp_']-$hp_)."' WHERE `id` = '".$battlemine['id']."' limit 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."', `angel` = '$new_angel_user' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']+$rubin)."', `angel` = '$new_angel_corp' WHERE `id` = '".$corp['id']."' LIMIT 1");
$_SESSION['battlemine'] = 'Найдено: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($rubin).' <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы"> +'.n_f($angel).'';
}







elseif($angel > 0 and $musor > 0){
$text = ' '.nick($user['id']).' - <font size=2 color=black>получено:</font> <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($angel).' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор">+'.n_f($musor).'%';
mysql_query("INSERT INTO `battlemine_log` SET `battle_id` = '".$battlemine['id']."', `text` = '$text', `time` = '".time()."'");
$new_angel_battlemine_user = bcadd(toBC($battlemine_user['angel']), toBC($angel));
$new_angel_battlemine = bcadd(toBC($battlemine['angel']), toBC($angel));
$new_musor_battlemine_user = bcadd(toBC($battlemine_user['musor']), toBC($musor));
$new_musor_battlemine = bcadd(toBC($battlemine['musor']), toBC($musor));
$new_angel_user = bcadd(toBC($user['angel']), toBC($angel));
$new_musor_user = bcadd(toBC($user['musor_proc']), toBC($musor));
$new_angel_corp = bcadd(toBC($corp['angel']), toBC($angel));
mysql_query("UPDATE `battlemine_user` SET `musor` = '$new_musor_battlemine_user', `angel` = '$new_angel_battlemine_user' WHERE `id` = '".$battlemine_user['id']."' limit 1");
mysql_query("UPDATE `battlemine` SET `musor` = '$new_musor_battlemine', `angel` = '$new_angel_battlemine', `hp_` = '".($battlemine['hp_']-$hp_)."' WHERE `id` = '".$battlemine['id']."' limit 1");
mysql_query("UPDATE `users` SET `musor_proc` = '$new_musor_user', `angel` = '$new_angel_user' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `corp` SET `angel` = '$new_angel_corp' WHERE `id` = '".$corp['id']."' LIMIT 1");
$_SESSION['battlemine'] = 'Найдено: <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы"> +'.n_f($angel).' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f($musor).'%';
}








elseif($rubin > 0 and $musor > 0 and $angel > 0){
$text = ' '.nick($user['id']).' - <font size=2 color=black>получено:</font> <font color=indianred><img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($battlemine['rubin']).' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f($battlemine['musor']).'% <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы">+'.n_f($battlemine['angel']).'</font>';
mysql_query("INSERT INTO `battlemine_log` SET `battle_id` = '".$battlemine['id']."', `text` = '$text', `time` = '".time()."'");
$new_angel_battlemine_user = bcadd(toBC($battlemine_user['angel']), toBC($angel));
$new_angel_battlemine = bcadd(toBC($battlemine['angel']), toBC($angel));
$new_musor_battlemine_user = bcadd(toBC($battlemine_user['musor']), toBC($musor));
$new_musor_battlemine = bcadd(toBC($battlemine['musor']), toBC($musor));
$new_angel_user = bcadd(toBC($user['angel']), toBC($angel));
$new_musor_user = bcadd(toBC($user['musor_proc']), toBC($musor));
$new_angel_corp = bcadd(toBC($corp['angel']), toBC($angel));
mysql_query("UPDATE `battlemine_user` SET `rubin` = '".($battlemine_user['rubin']+$rubin)."',`musor` = '$new_musor_battlemine_user', `angel` = '$new_angel_battlemine_user' WHERE `id` = '".$battlemine_user['id']."' limit 1");
mysql_query("UPDATE `battlemine` SET `rubin` = '".($battlemine['rubin']+$rubin)."', `musor` = '$new_musor_battlemine', `angel` = '$new_angel_battlemine', `hp_` = '".($battlemine['hp_']-$hp_)."' WHERE `id` = '".$battlemine['id']."' limit 1");
mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+$rubin)."', `musor_proc` = '$new_musor_user', `angel` = '$new_angel_user' WHERE `id` = '".$user['id']."' LIMIT 1");
mysql_query("UPDATE `corp` SET `rubin` = '".($corp['rubin']+$rubin)."', `angel` = '$new_angel_corp' WHERE `id` = '".$corp['id']."' LIMIT 1");
$_SESSION['battlemine'] = 'Найдено: <img width="20" height="20" alt="рубины" src="/images/ruby.png" title="рубины"> +'.n_f($rubin).' <img width="20" height="20" alt="Мусор" src="/images/header/money_36.png" title="Мусор"> +'.n_f($musor).'% <img width="20" height="20" alt="Ангелы" src="/images/angel48.png" title="Ангелы"> +'.n_f($angel).'';
}

else{
mysql_query("UPDATE `battlemine` SET `hp_` = '".($battlemine['hp_']-$hp_)."' WHERE `id` = '".$battlemine['id']."' limit 1");
$_SESSION['battlemine'] = '<b>Ничего не найдено</b>';
}
}else{
$_SESSION['battlemine'] = '<b>Не бейте так быстро!</b>';
}
mysql_query("UPDATE `battlemine_user` SET `time_udar` = '".(time()+1)."' WHERE `id` = '".$battlemine_user['id']."' limit 1");
mysql_query("UPDATE `battlemine` SET `hp_` = '".($battlemine['hp_']-$hp_)."' WHERE `id` = '".$battlemine['id']."' limit 1");
header('Location: ?');
exit();
}
#######################################################################################################################################################################################



$battlemine_log = mysql_query("SELECT * FROM `battlemine_log` WHERE `battle_id` = '".$battlemine['id']."' ORDER BY `id` DESC LIMIT 10");

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
История работ:<hr>';
while($battlemine_l = mysql_fetch_assoc($battlemine_log)){
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><font size=2>'.$battlemine_l['text'].'</font></span>
<span class="fr nobr"><font color=black size=1>'.time_last($battlemine_l['time']).'</font></span>
<div class="cb"></div></div></div>';
}

echo '</span></li></ul></div>';

            echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
			
		<font size=2>Присоединилось:</font> <font color=black size=3>['.$battlemine_user_coll.']</font> <font size=2>чел.</font></center>';
            $usersss = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = '".$battlemine['id']."'  ORDER BY `id` asc LIMIT 15");
            while($c = mysql_fetch_assoc($usersss)){
                echo '<div style="text-align: center;margin-top:4px;">';
                echo '<span><span class="nobr">'.nick($c['user']).'</span></span>';
                echo '<div class="cb"></div></div>';
            }
			echo '</span></li></ul></div>';
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			


if($user['mine_bot_time'] > time()) {
    if($battlemine_user['mine_bot'] == 1) {
        //echo '<font color="grey">Действие автокирки <font color="green"><b>Активно</b></font>.</font><br>';
    } else {
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
echo '<div class="wrap-content"><center>
<img width="15%" alt="кирка" src="/mine/kirka1.png" title="кирка">
<br>_________________________<br>
<center>Стоимость: <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 100k</center>
<div class="mt4"></div>
VIP автокирка активируется за рубины только для следующего похода в корпоративную шахту.
<hr>';
echo '<font color="grey">Действие автокирки <b>не активно</b>.</font><br>';
echo '<a class="btni mt4" style="min-width:160px;margin:4px;" href="?autokirka_get"><span>Активировать <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> 100k</span></a>';
echo '</center></div></span></li></ul></div>';	
}
} else {
    //echo '<font color="grey">Действие автокирки <b>не активно</b>.</font><br>';
    //echo '<a class="btni mt4" style="min-width:160px;margin:4px;" href="/autokirka/?autokirka_get"><span>Получить бесплатно</span></a>';
}




if(isset($_GET['autokirka_get'])){
//if($battlemine['time_start']<time() ){$_SESSION['err'] = '<font color=red>Создайте новый поход в шахту или присоединяйтесь к уже существующему.</font>';header('Location: ?');exit();}
//if(!$battlemine_user){$_SESSION['err'] = '<font color=red>Создайте новый поход в шахту или присоединяйтесь к уже существующему.</font>';header('Location: ?');exit();}
if($battlemine_user['mine_bot']>=1){header('Location: ?');exit();}
if($user['rubin']<100000){$_SESSION['err'] = '<font color=red>Не хватает рубинов.</font>';header('Location: ?');exit();}
mysql_query("UPDATE `users` SET `rubin` = `rubin` - '100000' WHERE `id` = '".$user['id']."' ");
mysql_query("UPDATE `battlemine_user` SET `mine_bot` = '1' WHERE `id` = '".$battlemine_user['id']."' ");
header('Location: ?');
exit();
}



}


















if($battlemine['time'] > time() and !$battlemine_user){ ########################################################################################## если шахта открыта и я не участвую

if (empty($user['max'])) $user['max']=10;
$max = 15;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `battlemine_log` WHERE `battle_id` = '".$battlemine['id']."' "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$battlemine_log = mysql_query("SELECT * FROM `battlemine_log` WHERE `battle_id` = '".$battlemine['id']."' ORDER BY `id` DESC LIMIT $start,$max");
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><font color=#b13131 size="4">'.$title.'
<hr><font color=black size=2>До завершения работ осталось: <img src="/images/clock.png" alt="через" width="24" height="24"> <span id="time_'.($battlemine['time']-time()).'000">'._time($battlemine['time']-time()).'</span></font>
</font></span></li></ul></div>';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
История работ:<hr>';
while($battlemine_l = mysql_fetch_assoc($battlemine_log)){
echo '<div><div style="margin-top: 4px;">
<span class="fl nobr"><font size=2>'.$battlemine_l['text'].'</font></span>
<span class="fr nobr"><font color=black size=1>'.time_last($battlemine_l['time']).'</font></span>
<div class="cb"></div></div></div>';
}

echo '</span></li></ul></div>';
            echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
			
		<font size=2>Присоединилось:</font> <font color=black size=3>['.$battlemine_user_coll.']</font> <font size=2>чел.</font></center>';
            $usersss = mysql_query("SELECT * FROM `battlemine_user` WHERE `battle_id` = '".$battlemine['id']."'  ORDER BY `id` asc LIMIT 15");
            while($c = mysql_fetch_assoc($usersss)){
                echo '<div style="text-align: center;margin-top:4px;">';
                echo '<span><span class="nobr">'.nick($c['user']).'</span></span>';
                echo '<div class="cb"></div></div>';
            }
			echo '</span></li></ul></div>';
}



































require_once ('../../system/footer.php');
?>