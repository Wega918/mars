<?php
header("Content-Type: text/html; charset=utf-8");
header("X-Frame-Options: SAMEORIGIN");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
header("X-Robots-Tag: index, follow");
// CSP — разрешаем нужные внешние домены
//header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' https://static.cloudflareinsights.com https://katstat.ru https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; img-src 'self' data: https:;");

/* $localBlacklistFile = __DIR__ . '/blacklist.txt';
$updateInterval = 3600; // Обновление каждые 1 час

// Получение IP пользователя
$userIp = $_SERVER['REMOTE_ADDR'];

// Функция для обновления локального чёрного списка
function updateBlacklist($sources, $localFile) {
    $blacklist = [];
    foreach ($sources as $url) {
        $data = @file_get_contents($url);
        if ($data !== false) {
            $lines = explode("\n", $data);
            foreach ($lines as $line) {
                $line = trim($line);
                // Пропускаем комментарии или пустые строки
                if ($line && $line[0] !== '#') {
                    $blacklist[] = $line;
                }
            }
        }
    }
    // Сохраняем локально
    file_put_contents($localFile, implode("\n", array_unique($blacklist)));
}

// Проверяем, нужно ли обновить список
if (!file_exists($localBlacklistFile) || (time() - filemtime($localBlacklistFile)) > $updateInterval) {
    updateBlacklist($blacklistSources, $localBlacklistFile);
}

// Проверка IP в чёрном списке
if (file_exists($localBlacklistFile)) {
    $blacklist = file($localBlacklistFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (in_array($userIp, $blacklist)) {
        // Заблокируем доступ
        header('HTTP/1.0 403 Forbidden');
        exit();
    }
}

// Получаем IP-адрес клиента
$client_ip = $_SERVER['REMOTE_ADDR'];

// Проверяем, является ли IP-адрес IPv6
if (filter_var($client_ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    // Блокируем доступ, если это IPv6
    header('HTTP/1.1 403 Forbidden');
    //echo 'Access forbidden for IPv6 addresses.';
    exit;
}
 */
###############################
####### Подключаем БД #########
###############################
require_once ('config.php'); //Подключаем конфиг с параметрами
$mysql_connect = mysql_connect(dbhost, dbuser, dbpass) or die('Сайт временно не доступен! Возможно сервер был перегружен и был вынужден перезагрузится...');
mysql_query('SET NAMES `utf8mb4`', $mysql_connect);
mysql_select_db(dbname, $mysql_connect) or die('Нету подключения к БД');

//mysql_close($mysql_connect);


$NameGame = 'Марсианские Бизнесмены';
$HOME = 'https://mars-games.ru/';
//$HOME = 'http://marsgames.uu/';


##################
##### СЕССИИ #####
##################
ob_start();
session_start();





include_once ('AntiHack.class.php');














/* 
function antihack(&$var){
if(is_array($var)) array_walk($var, 'antihack');
else $var = htmlspecialchars(stripslashes($var), ENT_NOQUOTES, 'UTF-8');
}
foreach(array('_SERVER', '_GET', '_POST', '_COOKIE', '_REQUEST') as $v){ 
if(!empty(${$v})) array_walk(${$v}, 'antihack'); 
}
$lq = new AntiHack;
//if (isset($_GET))$_GET = $lq->filter_($_GET, 'get');
if (isset($_POST))$_POST = $lq->filter_($_POST, 'post');
if (isset($_FILES))$_FILES = $lq->filter_($_FILES, 'files');
if (isset($_SERVER))$_SERVER = $lq->filter_($_SERVER, 'server');
if (isset($_REQUEST))$_REQUEST = $lq->filter_($_REQUEST, 'request');
unset($lq);
 */
if (isset($_GET['_1118538408(0)']))die('Этот способ взлома больше не работает. (с) Кредитор');
date_default_timezone_set('Europe/moscow');





function filter($msg){
global $HOME;
$msg = trim($msg);
$si = mysql_query("SELECT * FROM `mat` ORDER BY `id` DESC");
while($smi = mysql_fetch_array($si)){
$msg = str_replace($smi['name'],' '.$smi['zamena'].' ',$msg);
}
return $msg;
}







function strip_data($data) {
    global $mysql_connect;  // используем глобальную переменную подключения

    // Шаг 1: Удаляем все теги HTML и PHP
    $data = strip_tags($data);
    
    // Шаг 2: Убираем запрещенные слова/символы
    $disallowed = array(
        'script', 'alert', 'xss', 'javascript', 'onerror', 'onload', 'onclick', 'onmouseover', 
        'onfocus', 'onblur', 'onsubmit', 'onchange', 'onkeydown', 'onkeyup', 'onkeypress', 
        'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseup', 'ondblclick',
        'eval', 'exec', 'expression', 'document', 'cookie', 'window', 'location', 'iframe', 
        'src=', 'data:text/html', 'data:application/javascript', 'vbscript:', 'livescript:',
        '&#039;', '&quot;', '<', '>', '&amp;', '&#60;', '&#62;', '&#34;', '&#39;', '&#38;', 
        '\u003C', '\u003E', '\u0022', '\u0027', '\u0026', '\u0028', '\u0029',
        'expression(', 'url(javascript:', 'url(vbscript:', 'url(data:', 'background:url',
        '\' OR \'1\'=\'1', '\'--', 'UNION SELECT', 'INSERT INTO', 'DROP TABLE', 'xp_cmdshell', 
        'information_schema', 'sleep(', 'benchmark(', ';--', 'or 1=1',
        '<!--', '-->',
        '<iframe', '<img', '<svg', '<audio', '<video', '<object', '<embed', '<style', 
        '<base', '<meta', '<link', '<body', '<form', '<input', '<textarea', '<select',
        '<button', '<option', '<table', '<tr', '<td', '<th',
        'data:', 'base64,', '<a href=', 'javascript:void(', 'javascript&colon;',
        '\x3C', '\x3E', '\x22', '\x27', '\x26'
    );
    foreach ($disallowed as $item) {
        $data = preg_replace('/' . preg_quote($item, '/') . '/i', '', $data);
    }

    // Шаг 3: Убираем нежелательные символы
    $data = str_replace(array('<', '>', '"', "'", '`', '&'), '', $data);

    // Шаг 4: Преобразуем оставшиеся специальные символы в HTML-сущности
    $data = htmlspecialchars($data, ENT_QUOTES, 'utf8mb4');

    // Шаг 5: Экранируем для SQL с помощью mysql_real_escape_string
    $data = mysql_real_escape_string($data, $mysql_connect);

    // Шаг 6: Замена множественных пробелов с сохранением переносов строк
    $lines = preg_split('/(\r\n|\n|\r)/', $data);
    $lines = array_map(function($line) {
        return preg_replace('/\s+/', ' ', $line);
    }, $lines);
    $data = implode(PHP_EOL, $lines);

    return $data;
}

function strong($msg) {
    $msg = strip_data($msg);
    return trim($msg);
}


function num($var){
return abs(intval($var));
}

function text($m){
global $db;
$m = htmlspecialchars($m);
$m = $db -> real_escape_string($m);
return $m;
}

foreach($_GET as $ad){
if(is_numeric($ad)){
$ad = abs(intval($ad));}
if(preg_match('/\include|asc|--|select|union|update|from|where|eval|glob|include|require|script|shell|BENCHMARK|CONCAT|INSERT\b/i', $ad)){
$time = time();
$timer = date("j M Y в H:i", $time);
$source = '
Запрос: '.htmlspecialchars($_SERVER['REQUEST_URI']).', IP хакера: '.$_SERVER['REMOTE_ADDR'].', Дополнительный IP: '.$_SERVER['HTTP_X_FORWARDED_FOR'].', Софт: '.$_SERVER['HTTP_USER_AGENT'].', Время: '.$timer.'';
$file = htmlspecialchars($_SERVER['DOCUMENT_ROOT']).'/data/log627.txt';
$Saved_File = fopen($file, 'a+');
fwrite($Saved_File, $source);
fclose($Saved_File);
header("Location: /");
exit();
}
$ad = htmlspecialchars(($ad));
}

foreach($_POST as $ad){
if(is_numeric($ad)){
$ad = abs(intval($ad));
}else{
$ad = htmlspecialchars(($ad));
}
}

foreach($_SESSION as $ad){
$ad = htmlspecialchars(($ad));
}

foreach($_COOKIE as $ad){
$ad = htmlspecialchars(($ad));
}

foreach($_GET as $key=>$value){
$_GET[$key]=(stripcslashes(htmlspecialchars($value)));
}

foreach($_GET as $key=>$value){
$_GET[$key]=(stripcslashes(htmlspecialchars($value)));
}

if (isset($_GET['isset']) && $_GET['isset'] == 403){
echo 'Доступ запрещен #1 (Asadal)';
exit();
} 
elseif (isset($_GET['isset']) && $_GET['isset'] == 404){
echo 'Ошибка #2 (Asadal)';
exit();
}

if (isset($_COOKIE['MAGIC_COOKIE'])) {
}elseif (isset($_GET['MAGIC_COOKIE']) || isset($_POST['MAGIC_COOKIE'])) {
echo 'Ошибка #3 (Asadal)';
exit();
}else{
}

function detect_browser(){
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$mobile = strpos($_SERVER['HTTP_USER_AGENT'],"Mobile");
$Silk = strpos($_SERVER['HTTP_USER_AGENT'],"Silk/");
$Kindle = strpos($_SERVER['HTTP_USER_AGENT'],"Kindle");
$operam = strpos($_SERVER['HTTP_USER_AGENT'],"Opera Mini");
$operai = strpos($_SERVER['HTTP_USER_AGENT'],"Opera Mini");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$wind = strpos($_SERVER['HTTP_USER_AGENT'],"windows");
$bsd1 = strpos($_SERVER['HTTP_USER_AGENT'],"bsd");
$lin = strpos($_SERVER['HTTP_USER_AGENT'],"linux");
$Nokia = strpos($_SERVER['HTTP_USER_AGENT'],"Nokia");
$unix = strpos($_SERVER['HTTP_USER_AGENT'],"unix");
$x11 = strpos($_SERVER['HTTP_USER_AGENT'],"x11");
$macos = strpos($_SERVER['HTTP_USER_AGENT'],"macos");
$macintosh = strpos($_SERVER['HTTP_USER_AGENT'],"macintosh");
$client = strpos($_SERVER['HTTP_USER_AGENT'],"client");
if ($iphone || $mobile || $Silk || $Kindle || $operam || $operai || $android || $palmpre || $ipod || $berry || $Nokia){
$browser = 'mobile';
} elseif($client) {
$browser = 'apk';
} else {
$browser = 'pc';
}
return $browser;
}
//echo ''.detect_browser().'';

function smile($msg){
global $HOME;
$msg = trim($msg);
$s = mysql_query("SELECT * FROM `smile` ORDER BY `id` DESC");
while($smile = mysql_fetch_array($s)) {
$msg = str_replace($smile['name'],' <img src="'.$HOME.'/files/smile/'.$smile['icon'].'" alt="'.$smile['name'].'"/> ',$msg);
}
return $msg;
}








if($_SERVER['PHP_SELF'] != '/corp/battlemine/index.php'){
if (!isset($_SESSION['blocked_from'])) {
    // Сохраняем страницу, на которой юзер был заблокирован
    $_SESSION['blocked_from'] = $_SERVER['REQUEST_URI'];
}
    // Параметры антибота
    $bot_threshold = 20;
    $interval_tolerance = 100; // мс
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
	
	
	
	
	
	


###############################
############ Куки #############
###############################
if (isset($_COOKIE['uslog']) and isset($_COOKIE['uspass'])) {
$uslog = strong($_COOKIE['uslog']);
$uspass = strong($_COOKIE['uspass']);
$dbs = mysql_query("SELECT * FROM `users` WHERE `login` = '".$uslog."' and `pass` = '".$uspass."' LIMIT 1");
$user = mysql_fetch_assoc($dbs);
if (isset($user['id'])) {
if ($user['login'] != $uslog or $user['pass'] != $uspass) {
setcookie('uslog', '', time() - 86400*365);
setcookie('uspass', '', time() - 86400*365);
}
}
if(!isset($user['id'])) header('Location: /');
$ban = mysql_fetch_array(mysql_query('SELECT * FROM `ban` WHERE `user` = "'.$user['id'].'"'));
if ($_SERVER['PHP_SELF'] != '/ban.php') {
if($ban){
header('Location: '.$HOME.'ban.php');
}
}

function getRealIp() {
    $ip = null;

    // 1. Если сайт за Cloudflare — доверяем только этому заголовку
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    // 2. Если нет Cloudflare, но есть X-Forwarded-For — берём первый IP из списка
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $forwarded = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($forwarded[0]);
    }
    // 3. Если ничего нет — берём REMOTE_ADDR
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    // Фильтруем, чтобы точно был корректный IP
    if (filter_var($ip, FILTER_VALIDATE_IP)) {
        return $ip;
    }

    // fallback — хоть какой-то адрес
    return $_SERVER['REMOTE_ADDR'];
}

$ip = getRealIp();

$users = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `login` = '".$uslog."' and `pass`='".$uspass."' LIMIT 1"));           
if($users['offline'] == 1){
}else{
if($user['viz'] < (time()-86400) and  $user['browser'] == 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36 Bot-User:Admin'){
mysql_query("UPDATE `users` SET `user` = '".$users['id']."',  `viz`='".time()."', `ip`='".$ip."', `browser`='".$_SERVER['HTTP_USER_AGENT']."', `gde`='".$_SERVER['REQUEST_URI']."' WHERE `id`='".$user['id']."' ");
}else{
mysql_query("UPDATE `users` SET `user` = '".$users['id']."',  `viz`='".time()."', `ip`='".$ip."', `browser`='".$_SERVER['HTTP_USER_AGENT']."', `gde`='".$_SERVER['REQUEST_URI']."' WHERE `id`='".$user['id']."' ");
}












/* if($_SERVER['PHP_SELF'] != '/corp/battlemine/index.php'){
// Устанавливаем таймер при первом заходе (только один раз за сессию)
if (!isset($_SESSION['in_game_since']) || (time() - $_SESSION['in_game_since']) > 10) {
    $_SESSION['in_game_since'] = time(); // Обновляем время последней активности
    $_SESSION['check_bot'] = true; // Разрешаем проверку на бота только после обновления времени
}


// Проверка на бота и обновление времени активности
if ($_SESSION['check_bot'] && time() - $_SESSION['in_game_since'] >= 10) {
    // Проверка на пинг
    if (isset($_GET['js_ping'])) {
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
       Стиль для блока подтверждения
       #confirmationBox {
           position: fixed;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           padding: 20px;
           background-color: rgba(0, 0, 0); Сделаем фон непрозрачным
           color: white;
           border-radius: 8px;
           text-align: center;
           z-index: 9999;
           display: none; Скрываем блок по умолчанию
           pointer-events: auto; Убедимся, что окно активно
       }

       Блокировка взаимодействия с сайтом
       body.blocked {
           pointer-events: none; Блокируем все клики на странице
           opacity: 0.7; Делаем сайт полупрозрачным
       }

       Не применяем полупрозрачность к окну подтверждения
       #confirmationBox {
           opacity: 1; Убираем полупрозрачность
       }

       Заблокированные элементы страницы
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
        xhr.open("GET", "?js_ping=1", true);
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
 */







}




/* if($user['id'] != 1){
header("Location: /teh.php");
exit();
} */
}






/* 
if($user['id'] == 418){

echo "REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR'] . "<br>";
if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    echo "CF_CONNECTING_IP: " . $_SERVER['HTTP_CF_CONNECTING_IP'] . "<br>";
}
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    echo "X_FORWARDED_FOR: " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br>";
}

}

REMOTE_ADDR: 185.225.33.139
CF_CONNECTING_IP: 51.158.202.126
X_FORWARDED_FOR: 51.158.202.126, 104.23.172.53

 */

###############################
########### BB Коды ###########
###############################
function bb($mes){
$mes = stripslashes($mes);
$mes = str_replace("\r\n","<br/>",$mes);
$mes = preg_replace('#\[cit\](.*?)\[/cit\]#si', '<div class="cit">\1</div>', $mes);
$mes = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;"> \1 </span>', $mes);
$mes = preg_replace('/\[url\s?=\s?([\'"]?)(?:http:\/\/)?(.*?)\1\](.*?)\[\/url\]/', ' <a href="http://$2"> $3 </a> ', $mes);
$mes = preg_replace("#\[img=(?:http:\/\/)?(.*?)(.gif|.png|.jpeg|.jpg)\]#",'<a href="http://\1\2"><img src="http://\1\2" alt="im" style="max-width: 120px; max-height: 80px;"/></a>', $mes);
$mes = preg_replace("#\[img\][\s]*([\S]+)[\s]*\[\/img\]#isU",'<img src="\\1" alt="" />',$mes);
$mes = preg_replace('#\[teal\](.*?)\[\/teal\]#si', '<span style="color: teal">\1</span>', $mes);
$mes = preg_replace('#\[blue\](.*?)\[\/blue\]#si', '<span style="color: blue">\1</span>', $mes);
$mes = preg_replace('#\[orange\](.*?)\[\/orange\]#si', '<span style="color: orange">\1</span>', $mes);
$mes = preg_replace('#\[purple\](.*?)\[\/purple\]#si', '<span style="color: purple">\1</span>', $mes);
$mes = preg_replace('#\[gold\](.*?)\[\/gold\]#si', '<span style="color: gold">\1</span>', $mes);
$mes = preg_replace('#\[yellow\](.*?)\[\/yellow\]#si', '<span style="color: yellow">\1</span>', $mes);
$mes = preg_replace('#\[magenta\](.*?)\[\/magenta\]#si', '<span style="color: magenta">\1</span>', $mes);
$mes = preg_replace('#\[navy\](.*?)\[\/navy\]#si', '<span style="color: navy">\1</span>', $mes);
$mes = preg_replace('#\[grey\](.*?)\[\/grey\]#si', '<span style="color: grey">\1</span>', $mes);
$mes = preg_replace('#\[white\](.*?)\[\/white\]#si', '<span style="color: white">\1</span>', $mes);
$mes = preg_replace('#\[black\](.*?)\[\/black\]#si', '<span style="color: black">\1</span>', $mes);
$mes = preg_replace('#\[LimeGreen\](.*?)\[\/LimeGreen\]#si', '<span style="color: LimeGreen">\1</span>', $mes);
$mes = preg_replace('#\[black\](.*?)\[\/black\]#si', '<span style="color:#000000;">\1</span>', $mes);
$mes = preg_replace('#\[i\](.*?)\[\/i\]#si', '<i>\1</i>', $mes);
$mes = preg_replace('#\[tt\](.*?)\[\/tt\]#si', '<tt>\1</tt>', $mes);
$mes = preg_replace('#\[u\](.*?)\[\/u\]#si', '<u>\1</u>', $mes);
$mes = preg_replace('#\[s\](.*?)\[\/s\]#si', '<s>\1</s>', $mes);
$mes = preg_replace('#\[red\](.*?)\[\/red\]#si', '<span style="color: red">\1</span>', $mes);
$mes = preg_replace('#\[red1\](.*?)\[\/red1\]#si', '<span style="color: indianred">\1</span>', $mes);
$mes = preg_replace('#\[green\](.*?)\[\/green\]#si', '<span style="color: green">\1</span>', $mes);
$mes = preg_replace('#\[green1\](.*?)\[\/green1\]#si', '<span style="color: lightgreen">\1</span>', $mes);
$mes = preg_replace('#\[lblue\](.*?)\[\/lblue\]#si', '<span style="color: lightblue">\1</span>', $mes);
$mes = preg_replace('#\[grey\](.*?)\[\/grey\]#si', '<span style="color: grey">\1</span>', $mes);
$mes = preg_replace('#\[center\](.*?)\[\/center\]#si', '<center>\1</center>', $mes);
$mes = preg_replace('#\[br\](.*?)\[\/br\]#si', '<br>\1</br>', $mes);
$mes = preg_replace("/\[img=(.+)\](.+)\[\/img\]/isU",'<img src="$2" style="width: $1%;" />',$mes);
$mes = preg_replace("/\[size=(.+)\](.+)\[\/size\]/isU",'<font size=$1>$2</font>',$mes);

$mes = preg_replace('#\[990099\](.*?)\[\/990099\]#si', '<span style="color: #990099">\1</span>', $mes);
$mes = preg_replace('#\[40E0D0\](.*?)\[\/40E0D0\]#si', '<span style="color: #40E0D0">\1</span>', $mes);
$mes = preg_replace('#\[B22222\](.*?)\[\/B22222\]#si', '<span style="color: #B22222">\1</span>', $mes);
$mes = preg_replace('#\[FA8072\](.*?)\[\/FA8072\]#si', '<span style="color: #FA8072">\1</span>', $mes);
$mes = preg_replace('#\[D2691E\](.*?)\[\/D2691E\]#si', '<span style="color: #D2691E">\1</span>', $mes);
$mes = preg_replace('#\[F4A460\](.*?)\[\/F4A460\]#si', '<span style="color: #F4A460">\1</span>', $mes);
$mes = preg_replace('#\[FF8C00\](.*?)\[\/FF8C00\]#si', '<span style="color: #FF8C00">\1</span>', $mes);
$mes = preg_replace('#\[B8860B\](.*?)\[\/B8860B\]#si', '<span style="color: #B8860B">\1</span>', $mes);
$mes = preg_replace('#\[DAA520\](.*?)\[\/DAA520\]#si', '<span style="color: #DAA520">\1</span>', $mes);
$mes = preg_replace('#\[808000\](.*?)\[\/808000\]#si', '<span style="color: #808000">\1</span>', $mes);
$mes = preg_replace('#\[9ACD32\](.*?)\[\/9ACD32\]#si', '<span style="color: #9ACD32">\1</span>', $mes);
$mes = preg_replace('#\[7FFF00\](.*?)\[\/7FFF00\]#si', '<span style="color: #7FFF00">\1</span>', $mes);
$mes = preg_replace('#\[00FF00\](.*?)\[\/00FF00\]#si', '<span style="color: #00FF00">\1</span>', $mes);
$mes = preg_replace('#\[32CD32\](.*?)\[\/32CD32\]#si', '<span style="color: #32CD32">\1</span>', $mes);
$mes = preg_replace('#\[00FF7F\](.*?)\[\/00FF7F\]#si', '<span style="color: #00FF7F">\1</span>', $mes);
$mes = preg_replace('#\[00FA9A\](.*?)\[\/00FA9A\]#si', '<span style="color: #00FA9A">\1</span>', $mes);
$mes = preg_replace('#\[40E0D0\](.*?)\[\/40E0D0\]#si', '<span style="color: #40E0D0">\1</span>', $mes);
$mes = preg_replace('#\[20B2AA\](.*?)\[\/20B2AA\]#si', '<span style="color: #20B2AA">\1</span>', $mes);
$mes = preg_replace('#\[48D1CC\](.*?)\[\/48D1CC\]#si', '<span style="color: #48D1CC">\1</span>', $mes);
$mes = preg_replace('#\[008080\](.*?)\[\/008080\]#si', '<span style="color: #008080">\1</span>', $mes);
$mes = preg_replace('#\[008B8B\](.*?)\[\/008B8B\]#si', '<span style="color: #008B8B">\1</span>', $mes);
$mes = preg_replace('#\[00CED1\](.*?)\[\/00CED1\]#si', '<span style="color: #00CED1">\1</span>', $mes);
$mes = preg_replace('#\[00FFFF\](.*?)\[\/00FFFF\]#si', '<span style="color: #00FFFF">\1</span>', $mes);
$mes = preg_replace('#\[00BFFF\](.*?)\[\/00BFFF\]#si', '<span style="color: #00BFFF">\1</span>', $mes);
$mes = preg_replace('#\[4169E1\](.*?)\[\/4169E1\]#si', '<span style="color: #4169E1">\1</span>', $mes);
$mes = preg_replace('#\[00008B\](.*?)\[\/00008B\]#si', '<span style="color: #00008B">\1</span>', $mes);
$mes = preg_replace('#\[0000CD\](.*?)\[\/0000CD\]#si', '<span style="color: #0000CD">\1</span>', $mes);
$mes = preg_replace('#\[8A2BE2\](.*?)\[\/8A2BE2\]#si', '<span style="color: #8A2BE2">\1</span>', $mes);
$mes = preg_replace('#\[9932CC\](.*?)\[\/9932CC\]#si', '<span style="color: #9932CC">\1</span>', $mes);
$mes = preg_replace('#\[9400D3\](.*?)\[\/9400D3\]#si', '<span style="color: #9400D3">\1</span>', $mes);
$mes = preg_replace('#\[8B008B\](.*?)\[\/8B008B\]#si', '<span style="color: #8B008B">\1</span>', $mes);
$mes = preg_replace('#\[FF00FF\](.*?)\[\/FF00FF\]#si', '<span style="color: #FF00FF">\1</span>', $mes);
$mes = preg_replace('#\[C71585\](.*?)\[\/C71585\]#si', '<span style="color: #C71585">\1</span>', $mes);
$mes = preg_replace('#\[F81493\](.*?)\[\/F81493\]#si', '<span style="color: #F81493">\1</span>', $mes);
$mes = preg_replace('#\[FF69B4\](.*?)\[\/FF69B4\]#si', '<span style="color: #FF69B4">\1</span>', $mes);
$mes = preg_replace('#\[CD5C5C\](.*?)\[\/CD5C5C\]#si', '<span style="color: #CD5C5C">\1</span>', $mes);
$mes = preg_replace('#\[BC8F8F\](.*?)\[\/BC8F8F\]#si', '<span style="color: #BC8F8F">\1</span>', $mes);
$mes = preg_replace('#\[F08080\](.*?)\[\/F08080\]#si', '<span style="color: #F08080">\1</span>', $mes);
$mes = preg_replace('#\[FFFAFA\](.*?)\[\/FFFAFA\]#si', '<span style="color: #FFFAFA">\1</span>', $mes);
$mes = preg_replace('#\[FFE4E1\](.*?)\[\/FFE4E1\]#si', '<span style="color: #FFE4E1">\1</span>', $mes);
$mes = preg_replace('#\[E9967A\](.*?)\[\/E9967A\]#si', '<span style="color: #E9967A">\1</span>', $mes);
$mes = preg_replace('#\[FFA07A\](.*?)\[\/FFA07A\]#si', '<span style="color: #FFA07A">\1</span>', $mes);
$mes = preg_replace('#\[A0522D\](.*?)\[\/A0522D\]#si', '<span style="color: #A0522D">\1</span>', $mes);
$mes = preg_replace('#\[FFF5EE\](.*?)\[\/FFF5EE\]#si', '<span style="color: #FFF5EE">\1</span>', $mes);
$mes = preg_replace('#\[8B4513\](.*?)\[\/8B4513\]#si', '<span style="color: #8B4513">\1</span>', $mes);
$mes = preg_replace('#\[FFDAB9\](.*?)\[\/FFDAB9\]#si', '<span style="color: #FFDAB9">\1</span>', $mes);
$mes = preg_replace('#\[CD853F\](.*?)\[\/CD853F\]#si', '<span style="color: #CD853F">\1</span>', $mes);
$mes = preg_replace('#\[FAF0E6\](.*?)\[\/FAF0E6\]#si', '<span style="color: #FAF0E6">\1</span>', $mes);
$mes = preg_replace('#\[FFE4C4\](.*?)\[\/FFE4C4\]#si', '<span style="color: #FFE4C4">\1</span>', $mes);
$mes = preg_replace('#\[DEB887\](.*?)\[\/DEB887\]#si', '<span style="color: #DEB887">\1</span>', $mes);
$mes = preg_replace('#\[D2B48C\](.*?)\[\/D2B48C\]#si', '<span style="color: #D2B48C">\1</span>', $mes);
$mes = preg_replace('#\[FAEBD7\](.*?)\[\/FAEBD7\]#si', '<span style="color: #FAEBD7">\1</span>', $mes);
$mes = preg_replace('#\[FFDEAD\](.*?)\[\/FFDEAD\]#si', '<span style="color: #FFDEAD">\1</span>', $mes);
$mes = preg_replace('#\[FFEBCD\](.*?)\[\/FFEBCD\]#si', '<span style="color: #FFEBCD">\1</span>', $mes);
$mes = preg_replace('#\[FFEFD5\](.*?)\[\/FFEFD5\]#si', '<span style="color: #FFEFD5">\1</span>', $mes);
$mes = preg_replace('#\[F5DEB3\](.*?)\[\/F5DEB3\]#si', '<span style="color: #F5DEB3">\1</span>', $mes);
$mes = preg_replace('#\[FDF5E6\](.*?)\[\/FDF5E6\]#si', '<span style="color: #FDF5E6">\1</span>', $mes);
$mes = preg_replace('#\[FFFAF0\](.*?)\[\/FFFAF0\]#si', '<span style="color: #FFFAF0">\1</span>', $mes);
$mes = preg_replace('#\[FFF5DC\](.*?)\[\/FFF5DC\]#si', '<span style="color: #FFF5DC">\1</span>', $mes);
$mes = preg_replace('#\[F0E68C\](.*?)\[\/F0E68C\]#si', '<span style="color: #F0E68C">\1</span>', $mes);
$mes = preg_replace('#\[FFFACD\](.*?)\[\/FFFACD\]#si', '<span style="color: #FFFACD">\1</span>', $mes);
$mes = preg_replace('#\[EEE8AA\](.*?)\[\/EEE8AA\]#si', '<span style="color: #EEE8AA">\1</span>', $mes);
$mes = preg_replace('#\[B0B76B\](.*?)\[\/B0B76B\]#si', '<span style="color: #B0B76B">\1</span>', $mes);
$mes = preg_replace('#\[F5F5DC\](.*?)\[\/F5F5DC\]#si', '<span style="color: #F5F5DC">\1</span>', $mes);
$mes = preg_replace('#\[FAFAD2\](.*?)\[\/FAFAD2\]#si', '<span style="color: #FAFAD2">\1</span>', $mes);
$mes = preg_replace('#\[FFFFE0\](.*?)\[\/FFFFE0\]#si', '<span style="color: #FFFFE0">\1</span>', $mes);
$mes = preg_replace('#\[FFFFF0\](.*?)\[\/FFFFF0\]#si', '<span style="color: #FFFFF0">\1</span>', $mes);
$mes = preg_replace('#\[6BBE23\](.*?)\[\/6BBE23\]#si', '<span style="color: #6BBE23">\1</span>', $mes);
$mes = preg_replace('#\[228B22\](.*?)\[\/228B22\]#si', '<span style="color: #228B22">\1</span>', $mes);
$mes = preg_replace('#\[90EE90\](.*?)\[\/90EE90\]#si', '<span style="color: #90EE90">\1</span>', $mes);
$mes = preg_replace('#\[98FB98\](.*?)\[\/98FB98\]#si', '<span style="color: #98FB98">\1</span>', $mes);
$mes = preg_replace('#\[F0FFF0\](.*?)\[\/F0FFF0\]#si', '<span style="color: #F0FFF0">\1</span>', $mes);
$mes = preg_replace('#\[2E8B57\](.*?)\[\/2E8B57\]#si', '<span style="color: #2E8B57">\1</span>', $mes);
$mes = preg_replace('#\[F5FFFA\](.*?)\[\/F5FFFA\]#si', '<span style="color: #F5FFFA">\1</span>', $mes);
$mes = preg_replace('#\[3CB371\](.*?)\[\/3CB371\]#si', '<span style="color: #3CB371">\1</span>', $mes);
$mes = preg_replace('#\[66CDAA\](.*?)\[\/66CDAA\]#si', '<span style="color: #66CDAA">\1</span>', $mes);
$mes = preg_replace('#\[7FFFD4\](.*?)\[\/7FFFD4\]#si', '<span style="color: #7FFFD4">\1</span>', $mes);
$mes = preg_replace('#\[2F4F4F\](.*?)\[\/2F4F4F\]#si', '<span style="color: #2F4F4F">\1</span>', $mes);
$mes = preg_replace('#\[AFEEEE\](.*?)\[\/AFEEEE\]#si', '<span style="color: #AFEEEE">\1</span>', $mes);
$mes = preg_replace('#\[E0FFFF\](.*?)\[\/E0FFFF\]#si', '<span style="color: #E0FFFF">\1</span>', $mes);
$mes = preg_replace('#\[5F9EA0\](.*?)\[\/5F9EA0\]#si', '<span style="color: #5F9EA0">\1</span>', $mes);
$mes = preg_replace('#\[B0E0E6\](.*?)\[\/B0E0E6\]#si', '<span style="color: #B0E0E6">\1</span>', $mes);
$mes = preg_replace('#\[ADD8E6\](.*?)\[\/ADD8E6\]#si', '<span style="color: #ADD8E6">\1</span>', $mes);
$mes = preg_replace('#\[87CEEB\](.*?)\[\/87CEEB\]#si', '<span style="color: #87CEEB">\1</span>', $mes);
$mes = preg_replace('#\[87CEFA\](.*?)\[\/87CEFA\]#si', '<span style="color: #87CEFA">\1</span>', $mes);
$mes = preg_replace('#\[4682B4\](.*?)\[\/4682B4\]#si', '<span style="color: #4682B4">\1</span>', $mes);
$mes = preg_replace('#\[B0C4DE\](.*?)\[\/B0C4DE\]#si', '<span style="color: #B0C4DE">\1</span>', $mes);
$mes = preg_replace('#\[6495ED\](.*?)\[\/6495ED\]#si', '<span style="color: #6495ED">\1</span>', $mes);
$mes = preg_replace('#\[F6E6FA\](.*?)\[\/F6E6FA\]#si', '<span style="color: #F6E6FA">\1</span>', $mes);
$mes = preg_replace('#\[F8F8FF\](.*?)\[\/F8F8FF\]#si', '<span style="color: #F8F8FF">\1</span>', $mes);
$mes = preg_replace('#\[191970\](.*?)\[\/191970\]#si', '<span style="color: #191970">\1</span>', $mes);
$mes = preg_replace('#\[6A5ACD\](.*?)\[\/6A5ACD\]#si', '<span style="color: #6A5ACD">\1</span>', $mes);
$mes = preg_replace('#\[7B68EE\](.*?)\[\/7B68EE\]#si', '<span style="color: #7B68EE">\1</span>', $mes);
$mes = preg_replace('#\[9370DB\](.*?)\[\/9370DB\]#si', '<span style="color: #9370DB">\1</span>', $mes);
$mes = preg_replace('#\[483D8B\](.*?)\[\/483D8B\]#si', '<span style="color: #483D8B">\1</span>', $mes);
$mes = preg_replace('#\[4B0082\](.*?)\[\/4B0082\]#si', '<span style="color: #4B0082">\1</span>', $mes);
$mes = preg_replace('#\[DDA0DD\](.*?)\[\/DDA0DD\]#si', '<span style="color: #DDA0DD">\1</span>', $mes);
$mes = preg_replace('#\[EE82EE\](.*?)\[\/EE82EE\]#si', '<span style="color: #EE82EE">\1</span>', $mes);
$mes = preg_replace('#\[D8BFD8\](.*?)\[\/D8BFD8\]#si', '<span style="color: #D8BFD8">\1</span>', $mes);
$mes = preg_replace('#\[DA70D6\](.*?)\[\/DA70D6\]#si', '<span style="color: #DA70D6">\1</span>', $mes);
$mes = preg_replace('#\[FFF0F5\](.*?)\[\/FFF0F5\]#si', '<span style="color: #FFF0F5">\1</span>', $mes);
$mes = preg_replace('#\[DB7093\](.*?)\[\/DB7093\]#si', '<span style="color: #DB7093">\1</span>', $mes);
$mes = preg_replace('#\[FFC0CB\](.*?)\[\/FFC0CB\]#si', '<span style="color: #FFC0CB">\1</span>', $mes);
$mes = preg_replace('#\[FFB6C1\](.*?)\[\/FFB6C1\]#si', '<span style="color: #FFB6C1">\1</span>', $mes);
$mes = preg_replace('#\[696969\](.*?)\[\/696969\]#si', '<span style="color: #696969">\1</span>', $mes);
$mes = preg_replace('#\[A9A9A9\](.*?)\[\/A9A9A9\]#si', '<span style="color: #A9A9A9">\1</span>', $mes);
$mes = preg_replace('#\[D3D3D3\](.*?)\[\/D3D3D3\]#si', '<span style="color: #D3D3D3">\1</span>', $mes);
$mes = preg_replace('#\[DCDCDC\](.*?)\[\/DCDCDC\]#si', '<span style="color: #DCDCDC">\1</span>', $mes);
$mes = preg_replace('#\[F5F5F5\](.*?)\[\/F5F5F5\]#si', '<span style="color: #F5F5F5">\1</span>', $mes);
$mes = preg_replace('#\[003300\](.*?)\[\/003300\]#si', '<span style="color: #003300">\1</span>', $mes);
$mes = preg_replace('#\[009933\](.*?)\[\/009933\]#si', '<span style="color: #009933">\1</span>', $mes);
$mes = preg_replace('#\[33CC33\](.*?)\[\/33CC33\]#si', '<span style="color: #33CC33">\1</span>', $mes);
$mes = preg_replace('#\[99FF99\](.*?)\[\/99FF99\]#si', '<span style="color: #99FF99">\1</span>', $mes);
$mes = preg_replace('#\[336600\](.*?)\[\/336600\]#si', '<span style="color: #336600">\1</span>', $mes);
$mes = preg_replace('#\[009900\](.*?)\[\/009900\]#si', '<span style="color: #009900">\1</span>', $mes);
$mes = preg_replace('#\[66FE33\](.*?)\[\/66FE33\]#si', '<span style="color: #66FE33">\1</span>', $mes);
$mes = preg_replace('#\[99FF66\](.*?)\[\/99FF66\]#si', '<span style="color: #99FF66">\1</span>', $mes);
$mes = preg_replace('#\[CCFF99\](.*?)\[\/CCFF99\]#si', '<span style="color: #CCFF99">\1</span>', $mes);
$mes = preg_replace('#\[006600\](.*?)\[\/006600\]#si', '<span style="color: #006600">\1</span>', $mes);
$mes = preg_replace('#\[00CC00\](.*?)\[\/00CC00\]#si', '<span style="color: #00CC00">\1</span>', $mes);
$mes = preg_replace('#\[00FF00\](.*?)\[\/00FF00\]#si', '<span style="color: #00FF00">\1</span>', $mes);
$mes = preg_replace('#\[66FF99\](.*?)\[\/66FF99\]#si', '<span style="color: 66FF99">\1</span>', $mes);
$mes = preg_replace('#\[339933\](.*?)\[\/339933\]#si', '<span style="color: ##339933">\1</span>', $mes);
$mes = preg_replace('#\[00CC66\](.*?)\[\/00CC66\]#si', '<span style="color: #00CC66">\1</span>', $mes);
$mes = preg_replace('#\[00FF99\](.*?)\[\/00FF99\]#si', '<span style="color: #00FF99">\1</span>', $mes);
$mes = preg_replace('#\[333300\](.*?)\[\/333300\]#si', '<span style="color: #333300">\1</span>', $mes);
$mes = preg_replace('#\[669900\](.*?)\[\/669900\]#si', '<span style="color: #669900">\1</span>', $mes);
$mes = preg_replace('#\[99FF33\](.*?)\[\/99FF33\]#si', '<span style="color: #99FF33">\1</span>', $mes);
$mes = preg_replace('#\[CCFF66\](.*?)\[\/CCFF66\]#si', '<span style="color: #CCFF66">\1</span>', $mes);
$mes = preg_replace('#\[666633\](.*?)\[\/666633\]#si', '<span style="color: #666633">\1</span>', $mes);
$mes = preg_replace('#\[99CC00\](.*?)\[\/99CC00\]#si', '<span style="color: #99CC00">\1</span>', $mes);
$mes = preg_replace('#\[CCFF33\](.*?)\[\/CCFF33\]#si', '<span style="color: #CCFF33">\1</span>', $mes);
$mes = preg_replace('#\[FFFF66\](.*?)\[\/FFFF66\]#si', '<span style="color: #FFFF66">\1</span>', $mes);
$mes = preg_replace('#\[999966\](.*?)\[\/999966\]#si', '<span style="color: #999966">\1</span>', $mes);
$mes = preg_replace('#\[CCCC00\](.*?)\[\/CCCC00\]#si', '<span style="color: #CCCC00">\1</span>', $mes);
$mes = preg_replace('#\[FFFF00\](.*?)\[\/FFFF00\]#si', '<span style="color: #FFFF00">\1</span>', $mes);
$mes = preg_replace('#\[FFCC00\](.*?)\[\/FFCC00\]#si', '<span style="color: #FFCC00">\1</span>', $mes);
$mes = preg_replace('#\[339966\](.*?)\[\/339966\]#si', '<span style="color: #339966">\1</span>', $mes);
$mes = preg_replace('#\[00CC99\](.*?)\[\/00CC99\]#si', '<span style="color: #00CC99">\1</span>', $mes);
$mes = preg_replace('#\[00FFCC\](.*?)\[\/00FFCC\]#si', '<span style="color: #00FFCC">\1</span>', $mes);
$mes = preg_replace('#\[00FFFF\](.*?)\[\/00FFFF\]#si', '<span style="color: #00FFFF">\1</span>', $mes);
$mes = preg_replace('#\[669999\](.*?)\[\/669999\]#si', '<span style="color: #669999">\1</span>', $mes);
$mes = preg_replace('#\[009999\](.*?)\[\/009999\]#si', '<span style="color: #009999">\1</span>', $mes);
$mes = preg_replace('#\[33CCCC\](.*?)\[\/33CCCC\]#si', '<span style="color: #33CCCC">\1</span>', $mes);
$mes = preg_replace('#\[00CCFF\](.*?)\[\/00CCFF\]#si', '<span style="color: #00CCFF">\1</span>', $mes);
$mes = preg_replace('#\[006666\](.*?)\[\/006666\]#si', '<span style="color: #006666">\1</span>', $mes);
$mes = preg_replace('#\[006699\](.*?)\[\/006699\]#si', '<span style="color: #006699">\1</span>', $mes);
$mes = preg_replace('#\[0099CC\](.*?)\[\/0099CC\]#si', '<span style="color: #0099CC">\1</span>', $mes);
$mes = preg_replace('#\[003333\](.*?)\[\/003333\]#si', '<span style="color: #003333">\1</span>', $mes);
$mes = preg_replace('#\[336699\](.*?)\[\/336699\]#si', '<span style="color: #336699">\1</span>', $mes);
$mes = preg_replace('#\[3366CC\](.*?)\[\/3366CC\]#si', '<span style="color: #3366CC">\1</span>', $mes);
$mes = preg_replace('#\[000066\](.*?)\[\/000066\]#si', '<span style="color: #000066">\1</span>', $mes);
$mes = preg_replace('#\[0000CC\](.*?)\[\/0000CC\]#si', '<span style="color: #0000CC">\1</span>', $mes);
$mes = preg_replace('#\[009999\](.*?)\[\/009999\]#si', '<span style="color: #009999">\1</span>', $mes);
$mes = preg_replace('#\[003399\](.*?)\[\/003399\]#si', '<span style="color: #003399">\1</span>', $mes);
$mes = preg_replace('#\[333399\](.*?)\[\/333399\]#si', '<span style="color: #333399">\1</span>', $mes);
$mes = preg_replace('#\[3333FE\](.*?)\[\/3333FE\]#si', '<span style="color: #3333FE">\1</span>', $mes);
$mes = preg_replace('#\[00FFFF\](.*?)\[\/00FFFF\]#si', '<span style="color: #00FFFF">\1</span>', $mes);
$mes = preg_replace('#\[0033CC\](.*?)\[\/0033CC\]#si', '<span style="color: #0033CC">\1</span>', $mes);
$mes = preg_replace('#\[0066CC\](.*?)\[\/0066CC\]#si', '<span style="color: #0066CC">\1</span>', $mes);
$mes = preg_replace('#\[3333CC\](.*?)\[\/3333CC\]#si', '<span style="color: #3333CC">\1</span>', $mes);
$mes = preg_replace('#\[3366FF\](.*?)\[\/3366FF\]#si', '<span style="color: #3366FF">\1</span>', $mes);
$mes = preg_replace('#\[0066FF\](.*?)\[\/0066FF\]#si', '<span style="color: #0066FF">\1</span>', $mes);
$mes = preg_replace('#\[0099FF\](.*?)\[\/0099FF\]#si', '<span style="color: #0099FF">\1</span>', $mes);
$mes = preg_replace('#\[6600CC\](.*?)\[\/6600CC\]#si', '<span style="color: #6600CC">\1</span>', $mes);
$mes = preg_replace('#\[6600FF\](.*?)\[\/6600FF\]#si', '<span style="color: #6600FF">\1</span>', $mes);
$mes = preg_replace('#\[6666FF\](.*?)\[\/6666FF\]#si', '<span style="color: #6666FF">\1</span>', $mes);
$mes = preg_replace('#\[6699FF\](.*?)\[\/6699FF\]#si', '<span style="color: #6699FF">\1</span>', $mes);
$mes = preg_replace('#\[3399FF\](.*?)\[\/3399FF\]#si', '<span style="color: #3399FF">\1</span>', $mes);
$mes = preg_replace('#\[33CCFF\](.*?)\[\/33CCFF\]#si', '<span style="color: #33CCFF">\1</span>', $mes);
$mes = preg_replace('#\[9900FF\](.*?)\[\/9900FF\]#si', '<span style="color: #9900FF">\1</span>', $mes);
$mes = preg_replace('#\[9933FF\](.*?)\[\/9933FF\]#si', '<span style="color: #9933FF">\1</span>', $mes);
$mes = preg_replace('#\[9966FF\](.*?)\[\/9966FF\]#si', '<span style="color: #9966FF">\1</span>', $mes);
$mes = preg_replace('#\[9999FF\](.*?)\[\/9999FF\]#si', '<span style="color: #9999FF">\1</span>', $mes);
$mes = preg_replace('#\[99FFCC\](.*?)\[\/99FFCC\]#si', '<span style="color: #99FFCC">\1</span>', $mes);
$mes = preg_replace('#\[66CCFF\](.*?)\[\/66CCFF\]#si', '<span style="color: #66CCFF">\1</span>', $mes);
$mes = preg_replace('#\[66FFFF\](.*?)\[\/66FFFF\]#si', '<span style="color: #66FFFF">\1</span>', $mes);
$mes = preg_replace('#\[66FFCC\](.*?)\[\/66FFCC\]#si', '<span style="color: #66FFCC">\1</span>', $mes);
$mes = preg_replace('#\[9900CC\](.*?)\[\/9900CC\]#si', '<span style="color: #9900CC">\1</span>', $mes);
$mes = preg_replace('#\[CC00FF\](.*?)\[\/CC00FF\]#si', '<span style="color: #CC00FF">\1</span>', $mes);
$mes = preg_replace('#\[CC33FF\](.*?)\[\/CC33FF\]#si', '<span style="color: #CC33FF">\1</span>', $mes);
$mes = preg_replace('#\[CC66FF\](.*?)\[\/CC66FF\]#si', '<span style="color: #CC66FF">\1</span>', $mes);
$mes = preg_replace('#\[CCFFFF\](.*?)\[\/CCFFFF\]#si', '<span style="color: #CCFFFF">\1</span>', $mes);
$mes = preg_replace('#\[99FFCC\](.*?)\[\/99FFCC\]#si', '<span style="color: #99FFCC">\1</span>', $mes);
$mes = preg_replace('#\[000000\](.*?)\[\/000000\]#si', '<span style="color: #000000">\1</span>', $mes);
$mes = preg_replace('#\[333333\](.*?)\[\/333333\]#si', '<span style="color: #333333">\1</span>', $mes);
$mes = preg_replace('#\[666666\](.*?)\[\/666666\]#si', '<span style="color: #666666">\1</span>', $mes);
$mes = preg_replace('#\[808080\](.*?)\[\/808080\]#si', '<span style="color: #808080">\1</span>', $mes);
$mes = preg_replace('#\[999999\](.*?)\[\/999999\]#si', '<span style="color: #999999">\1</span>', $mes);
$mes = preg_replace('#\[C0C0C0\](.*?)\[\/C0C0C0\]#si', '<span style="color: #C0C0C0">\1</span>', $mes);
$mes = preg_replace('#\[CCCCCC\](.*?)\[\/CCCCCC\]#si', '<span style="color: #CCCCCC">\1</span>', $mes);
$mes = preg_replace('#\[FFFFFF\](.*?)\[\/FFFFFF\]#si', '<span style="color: #FFFFFF">\1</span>', $mes);
$mes = preg_replace('#\[660066\](.*?)\[\/660066\]#si', '<span style="color: #660066">\1</span>', $mes);
$mes = preg_replace('#\[CC00CC\](.*?)\[\/CC00CC\]#si', '<span style="color: #CC00CC">\1</span>', $mes);
$mes = preg_replace('#\[FF00FF\](.*?)\[\/FF00FF\]#si', '<span style="color: #FF00FF">\1</span>', $mes);
$mes = preg_replace('#\[FF66FF\](.*?)\[\/FF66FF\]#si', '<span style="color: #FF66FF">\1</span>', $mes);
$mes = preg_replace('#\[FF99FF\](.*?)\[\/FF99FF\]#si', '<span style="color: #FF99FF">\1</span>', $mes);
$mes = preg_replace('#\[CCFFCC\](.*?)\[\/CCFFCC\]#si', '<span style="color: #CCFFCC">\1</span>', $mes);
$mes = preg_replace('#\[993399\](.*?)\[\/993399\]#si', '<span style="color: #993399">\1</span>', $mes);
$mes = preg_replace('#\[CC0099\](.*?)\[\/CC0099\]#si', '<span style="color: #CC0099">\1</span>', $mes);
$mes = preg_replace('#\[FF33CC\](.*?)\[\/FF33CC\]#si', '<span style="color: #FF33CC">\1</span>', $mes);
$mes = preg_replace('#\[FF66CC\](.*?)\[\/FF66CC\]#si', '<span style="color: #FF66CC">\1</span>', $mes);
$mes = preg_replace('#\[FF99CC\](.*?)\[\/FF99CC\]#si', '<span style="color: #FF99CC">\1</span>', $mes);
$mes = preg_replace('#\[FFCCCC\](.*?)\[\/FFCCCC\]#si', '<span style="color: #FFCCCC">\1</span>', $mes);
$mes = preg_replace('#\[FFFFCC\](.*?)\[\/FFFFCC\]#si', '<span style="color: #FFFFCC">\1</span>', $mes);
$mes = preg_replace('#\[990099\](.*?)\[\/990099\]#si', '<span style="color: #990099">\1</span>', $mes);
$mes = preg_replace('#\[CC3399\](.*?)\[\/CC3399\]#si', '<span style="color: #CC3399">\1</span>', $mes);
$mes = preg_replace('#\[FF3399\](.*?)\[\/FF3399\]#si', '<span style="color: #FF3399">\1</span>', $mes);
$mes = preg_replace('#\[FF6699\](.*?)\[\/FF6699\]#si', '<span style="color: #FF6699">\1</span>', $mes);
$mes = preg_replace('#\[FF9999\](.*?)\[\/FF9999\]#si', '<span style="color: #FF9999">\1</span>', $mes);
$mes = preg_replace('#\[FFCC99\](.*?)\[\/FFCC99\]#si', '<span style="color: #FFCC99">\1</span>', $mes);
$mes = preg_replace('#\[FFFF99\](.*?)\[\/FFFF99\]#si', '<span style="color: #FFFF99">\1</span>', $mes);
$mes = preg_replace('#\[993366\](.*?)\[\/993366\]#si', '<span style="color: #993366">\1</span>', $mes);
$mes = preg_replace('#\[CC6699\](.*?)\[\/CC6699\]#si', '<span style="color: #CC6699">\1</span>', $mes);
$mes = preg_replace('#\[FF0066\](.*?)\[\/FF0066\]#si', '<span style="color: #FF0066">\1</span>', $mes);
$mes = preg_replace('#\[FF6666\](.*?)\[\/FF6666\]#si', '<span style="color: #FF6666">\1</span>', $mes);
$mes = preg_replace('#\[FF9966\](.*?)\[\/FF9966\]#si', '<span style="color: #FF9966">\1</span>', $mes);
$mes = preg_replace('#\[FFCC66\](.*?)\[\/FFCC66\]#si', '<span style="color: #FFCC66">\1</span>', $mes);
$mes = preg_replace('#\[660033\](.*?)\[\/660033\]#si', '<span style="color: #660033">\1</span>', $mes);


//$mes = preg_replace("/\[img=([0-9]+)=([0-9]+)\](.+)\[\/img\]/isU",'<img src="$3" style="width: $1px; heigth: $2px;" />',$mes);
//$mes['/\[img=(.+)\](.+)\[\/img\]/isU'] = '<img src="$2" style="width: $1px;" />';
//$mes['/\[img=([0-9]+)=([0-9]+)\](.+)\[\/img\]/isU'] = '<img src="$3" style="width: $1px; heigth: $2px;" />';
$mes1 = preg_replace("~(^|\s|-|:| |\()(http(s?)://|(www\.))((\S{25})(\S{5,})(\S{15})([^\<\s.,>)\];'\"!?]))~i", "\\1<a href=\"http\\3://\\4\\5\">\\4\\6...\\8\\9</a>", $mes);
$mes1 = preg_replace("~(^|\s|-|:|\(| |\xAB)(http(s?)://|(www\.))((\S+)([^\<\s.,>)\];'\"!?]))~i", "\\1<a href=\"http\\3://\\4\\5\">\\4\\5</a>", $mes);
return $mes; 
}

function bb1($mes1){
$mes1 = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;"> \1 </span>', $mes1);
$mes1 = preg_replace("~(^|\s|-|:| |\()(http(s?)://|(www\.))((\S{25})(\S{5,})(\S{15})([^\<\s.,>)\];'\"!?]))~i", "\\1Реклама", $mes1);
$mes1 = preg_replace("~(^|\s|-|:|\(| |\xAB)(http(s?)://|(www\.))((\S+)([^\<\s.,>)\];'\"!?]))~i", "\\1Реклама", $mes1);
return $mes1; 
}






###############################
###############################
######### Функция ника ########
###############################
function nick($id){
$users = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$id."' LIMIT 1"));
$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1' "));

if($users['level'] == 1){
$md = '<b><font color=black>[M]</font></b>';
}else{
$md = '';
}

if($users['level'] == 2){
$adm = '<b><font color=#ad0000>[A]</font></b>';
}else{
$adm = '';
}

if($users['level'] == 3){
$glavadm = '<b><font color=red>[R]</font></b>';
}else{
$glavadm = '';
}

if($users['premium'] != 0){
$prem = '<img width="24" height="24" alt="" title="" src="/images/prem.png">';
}else{
$prem = '';
}
if($users['premium_musor'] != 0){
$prem_m = '<img width="24" height="24" alt="" title="" src="/images/prem_musor.png">';
}else{
$prem_m = '';
}




if($users['sex'] == 1){
if($users['viz'] > time()-$sql['s_online']){
$p = '<img width="24" height="24" alt="" title="" src="/images/avatars/1/on/'.$users['avatars'].'.png">';
}else{
$p = '<img width="24" height="24" alt="" title="" src="/images/avatars/1/off/'.$users['avatars'].'.png">';
}
}elseif($users['sex'] == 2){ 
if($users['viz'] > time()-$sql['s_online']){
$p = '<img width="24" height="24" alt="" title="" src="/images/avatars/2/on/'.$users['avatars'].'.png">';
}else{
$p = '<img width="24" height="24" alt="" title="" src="/images/avatars/2/off/'.$users['avatars'].'.png">';
}
}




if($users['colors'] != '' and $users['gradient'] != 0){
$gradient = '<font color='.$users['colors'].' style="background: url(/images/gradient/'.$users['gradient'].'.gif) repeat scroll 25% 50% transparent;">';
$gradient1 = '</font>';
}elseif($users['colors'] == '' and $users['gradient'] != 0){
$gradient = '<font style="background: url(/images/gradient/'.$users['gradient'].'.gif) repeat scroll 25% 50% transparent;">';
$gradient1 = '</font>';
}elseif($users['colors'] != '' and $users['gradient'] == 0){
$gradient = '<font color='.$users['colors'].'>';
$gradient1 = '</font>';
}elseif($users['colors'] == '' and $users['gradient'] == 0){
$gradient = '';
$gradient1 = '';
}


return (empty($users)?'[Удален]':'    <span class="nobr"><a class="avatar user" href="/igrok_'.$users['id'].'/"> <img width="20" height="20" alt="" title="" src="/mission/'.$users['mission_mnogitel'].'.png"> '.$prem_m.' '.$prem.' '.$p.' <span>'.$md.''.$adm.' '.$glavadm.' '.$gradient.''.$users['login'].''.$gradient1.'</span></a></span>');
}











###############################
########### Листинг ###########
###############################
function page($k_page=1) {
$page = 1;
$page = strong($page);
$k_page = strong($k_page);
if(isset($_GET['page'])) {
if ($_GET['page']=='top')
$page = strong(intval($k_page));
elseif(is_numeric($_GET['page'])) 
$page = strong(intval($_GET['page']));
}
if ($page<1)$page=1;
if ($page>$k_page)$page=$k_page;
return $page;
}

// Определяем кол-во страниц
function k_page($k_post = 0,$k_p_str = 10) {
if ($k_post != 0) {
$v_pages = ceil($k_post/$k_p_str);
return $v_pages;
}
else return 1;
}

function str($link='?',$k_page=1,$page=1){
echo '<div class="center" style="margin-top: 2px;">';
if ($page<1)$page=1;
$page = strong($page);
$k_page = strong($k_page);
if ($page>1){
echo '<a class="pg" href="'.$link.'page=1">&lt;&lt;</a><font color=red> </font>';
}else{ 
echo "<span class='pg'>&lt;&lt;</span><font color=red> </font>";
}
echo "";
if ($page<$k_page){
}else{
echo "";
}
if ($page != 1){
echo '<span><a class="btni pg" href="'.$link.'page=1"><span>1</span></a></span><font color=red> </font>';
}else{
echo '<span><span class="btni pg"><span>1</span></span></span><font color=red> </font>';
}
for ($ot=-3; $ot<=3; $ot++){
if ($page+$ot>1 && $page+$ot<$k_page){
if ($ot!=0){
echo '<span><a class="btni pg" href="'.$link.'page='.($page+$ot).'"><span>'.($page+$ot).'</span></a></span><font color=red> </font>';
}else{
echo '<span><span class="btni pg"><span>'.($page+$ot).'</span></span></span><font color=red> </font>';
}
}
}
if ($page!=$k_page){
echo '<a class="pg" href="'.$link.'page=top">&gt;&gt;</a><font color=red> </font>';
}elseif ($page == $k_page){
echo '<span class="pg">&gt;&gt;</span><font color=red> </font>';
}elseif ($k_page>1){
echo '<span class="simple-but gray" title="Go to page '.$k_page.'"><em><span><span>'.$k_page.'</span></span></em></span><font color=red> </font>';
}
echo '</div>';
}














###############################
############ Время ############
###############################
function vremja($time = NULL){
global $tim;
if($time == NULL)
$time = time();
if(isset($tim))
$time = $time + $tim['set_timesdvig']*60*60;
$timep = date("j M Y в H:i", $time);
$time_p[0] = date("j n Y", $time);
$time_p[1] = date("H:i", $time);
if($time_p[0] == date("j n Y"))
$timep = date("H:i:s", $time);
if(isset($tim))
{
if($time_p[0] == date("j n Y", time() + $tim['set_timesdvig']*60*60))
$timep = date("H:i:s", $time);
if($time_p[0] == date("j n Y", time()-60*60*(24-$tim['set_timesdvig'])))
$timep = "Вчера в $time_p[1]";
} else {
if ($time_p[0] == date("j n Y"))
$timep = date("H:i:s", $time);
if($time_p[0] == date("j n Y", time()-60*60*24))
$timep = "Вчера в $time_p[1]";
}
$timep = strtr($timep, array ("Jan" => "Янв","Feb" => "Фев","Mar" => "Марта","May" => "Мая","Apr" => "Апр","Jun" => "Июня","Jul" => "Июля","Aug" => "Авг","Sep" => "Сент","Oct" => "Окт","Nov" => "Ноября","Dec" => "Дек",));
return $timep;
}

function time_last1($time){
$sec = ($time-time());
if($sec < 60) $_time = $sec." ";
if($sec >= 60 && $sec < (60*60)) $_time = round($sec/60)." ";
if($sec >= (60*60) && $sec < ((60*60)*6))$_time = "Сегодня в ".date("H:i",$time);
if($sec >= ((60*60)*6) && $sec < ((60*60)*24)) $_time = round($sec/(60*60))." час. назад";
if($sec >= ((60*60)*24) && $sec < (((60*60)*24)*2)) $_time = "Вчера в ".date("H:i",$time);
return $_time;
}

function _time($i) {
$h  = floor(($i / 3600) - $d * 24); 
$m  = floor(($i - $h * 3600 - $d * 86400) / 60); 
$s  = $i - ($m * 60 + $h * 3600 + $d * 86400);
return ($h > 0 ? ($h < 10 ? '':'').$h.'ч:':'').($m > 0 ? ($m < 10 ? '':'').$m.'м:':'00:').($s > 0 ? ($s < 10 ? '0':'').$s.'с':'00');
}

function tls($tls){
$d=3600*24;
$day=floor($tls/$d);
$tls=$tls-($d*$day);
$hour=floor($tls/3600);
$tls=$tls-(3600*$hour);
$minute=floor($tls/60);
$tls=$tls-(60*$minute);
$second=floor($tls);
$tlss=(($hour*3600)+($minute*60))+$second; 
$dayt="".($day>0?"".$day." д. ":null)."";
$hourt="".($hour>0?"".$hour." ч. ":null)."";
$minutet="".($minute>0?"".$minute." м. ":null)."";
$secondt="".($second>0?"".$second." с. ":null)."";


if($day>0){
$minutet=NULL;
$secondt=NULL;
}
if($hour>0 && $day==0){
$secondt=NULL;
$dayt=NULL;
}
return "".$tlss."";
} /* Вывод оставшегося времени в секундах */

function times($time){
if(!$time)
$time = time(); 
$data = date('j.n.y', $time); 
if ($data == date('j.n.y')) 
$res = ''.date('G:i:s', $time); 
else{
$res = date('j.m.Y', $time); 
} 
return $res; 
}

function time_last($time){
$sec = time()-$time;
if($sec < 60) $_time = $sec." сек. назад";
if($sec >= 60 && $sec < (60*60)) $_time = round($sec/60)." мин. назад";
if($sec >= (60*60) && $sec < ((60*60)*12)) $_time = round($sec/(60*60))." ч. назад";
//if($sec >= ((60*60)*12) && $sec < ((60*60)*8))$_time = "Сегодня в ".date("H:i",$time);
if($sec >= ((60*60)*12) && $sec < ((60*60)*48)) $_time = "Вчера в ".date("H:i",$time);

if($sec >= (((60*60)*24)*2)){
$__time = date("d F Y в H:i", $time);
$__time = str_replace("January","января",$__time);
$__time = str_replace("February","февраля",$__time);
$__time = str_replace("March","марта",$__time);
$__time = str_replace("April","апреля",$__time);
$__time = str_replace("May","мая",$__time);
$__time = str_replace("June","июня",$__time);
$__time = str_replace("July","июля",$__time);
$__time = str_replace("August","августа",$__time);
$__time = str_replace("September","сентября",$__time);
$__time = str_replace("October","октября",$__time);
$__time = str_replace("November","ноября",$__time);
$__time = str_replace("December","декабря",$__time);
$_time = $__time;
}
return $_time;
}

function tl($tl){
	$d=3600*24;
	$day=floor($tl/$d);
	$tl=$tl-($d*$day);

	$hour=floor($tl/3600);
	$tl=$tl-(3600*$hour);

	$minute=floor($tl/60);
	$tl=$tl-(60*$minute);

	$second=floor($tl);

	$dayt="".($day>0?"".$day." д. ":null)."";
	$hourt="".($hour>0?"".$hour." ч. ":null)."";
	$minutet="".($minute>0?"".$minute." м. ":null)."";
	$secondt="".($second>0?"".$second." с. ":null)."";
	
	if($day>0){
		$minutet=NULL;
		$secondt=NULL;
	}
	if($hour>0 && $day==0){
		$secondt=NULL;
		$dayt=NULL;
	}
	
	return "$dayt$hourt$minutet$secondt";
} /* Вывод оставшегося времени */










include_once ('sqlinject.php');
include_once ('n_f.php');
?>