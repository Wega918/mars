<?php
session_start();


/* function filter($msg){
global $HOME;
$msg = trim($msg);
$si = mysql_query("SELECT * FROM `mat` ORDER BY `id` DESC");
while($smi = mysql_fetch_array($si)){
$msg = str_replace($smi['name'],' '.$smi['zamena'].' ',$msg);
}
return $msg;
}

function bb1($mes1){
$mes1 = preg_replace('#\[b\](.*?)\[/b\]#si', '<span style="font-weight: bold;"> \1 </span>', $mes1);
$mes1 = preg_replace("~(^|\s|-|:| |\()(http(s?)://|(www\.))((\S{25})(\S{5,})(\S{15})([^\<\s.,>)\];'\"!?]))~i", "\\1Реклама", $mes1);
$mes1 = preg_replace("~(^|\s|-|:|\(| |\xAB)(http(s?)://|(www\.))((\S+)([^\<\s.,>)\];'\"!?]))~i", "\\1Реклама", $mes1);
return $mes1; 
}

function smile($msg){
global $HOME;
$msg = trim($msg);
$s = mysql_query("SELECT * FROM `smile` ORDER BY `id` DESC");
while($smile = mysql_fetch_array($s)) {
$msg = str_replace($smile['name'],' <img src="'.$HOME.'/files/smile/'.$smile['icon'].'" alt="'.$smile['name'].'"/> ',$msg);
}
return $msg;
}

$mmm = filter(bb1(smile($post['msg']))); */



require_once ('../system/config.php');

// Создание подключения
$db = new mysqli($host, $username, $password, $database);

// Проверка соединения
if ($db->connect_error) {
    die('Ошибка подключения: ' . $db->connect_error);
}


function strong_($data, $db = null) {
    // Преобразование символов в HTML-сущности
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    
    // Если передано соединение с базой данных, экранируем строку для безопасности
    if ($db !== null && is_object($db) && get_class($db) === 'mysqli') {
        $data = $db->real_escape_string($data);
    }
    
    // Удаляем лишние пробелы
    return trim($data);
}




 
// Генерация CSRF-токена для PHP 5.6
if (empty($_SESSION['csrf_token'])) {
    // Использование openssl_random_pseudo_bytes в PHP 5.6
    $bytes = openssl_random_pseudo_bytes(32);
    $_SESSION['csrf_token'] = bin2hex($bytes);
}
echo '<center>
    <form action="" method="POST">
        <br>
        <textarea style="width: 95%;" name="msg" id="message"></textarea><br>';

echo '<a class="btni" style="height: 24px; width: 23px; padding: 0; box-shadow: inset 0px 1px 0px #; border: 1px solid #7dab2e; color: #FFFFFF; text-align: center; border-radius: 7px;" href="?">
    <img style="vertical-align: sub;" src="/images/refresh_white2.png" width="20"></a>';

echo '<input style="margin: 4px 0 0 4px; padding: 6px" class="mt4" type="submit" name="add" value="Отправить">';

echo '<span id="pokazat">
    <a onclick="document.getElementById(\'pokazat\').style.display=\'none\'; document.getElementById(\'skryt\').style.display=\'\'; return false;" class="btni" style="height: 24px; width: 23px; padding: 0; box-shadow: inset 0px 1px 0px #; border: 1px solid #7dab2e; color: #FFFFFF; text-align: inherit; border-radius: 7px;" href="#">
    <img style="vertical-align: sub;" src="/files/smile/smiles.png" width="20"></a>
</span>';

echo '<span id="skryt" style="display:none"> 
    <a onclick="document.getElementById(\'skryt\').style.display=\'none\'; document.getElementById(\'pokazat\').style.display=\'\'; return false;" class="btni" style="height: 24px; width: 23px; padding: 0; box-shadow: inset 0px 1px 0px #; border: 1px solid #7dab2e; color: #FFFFFF; text-align: inherit; border-radius: 7px;" href="#">
    <img style="vertical-align: sub;" src="/files/smile/smiles.png" width="20"></a>';

echo '<div class="fight center">';

// Пример запроса для смайлов
$sm = $db->query("SELECT * FROM `smile` WHERE `papka` = '1' ORDER BY `id` ASC");

if ($sm) {
    while ($s = $sm->fetch_assoc()) {
        echo '<a onclick="pasteSmile(\'' . $s['name'] . '\')"><img src="/files/smile/' . $s['icon'] . '" alt="' . $s['name'] . '" title="' . $s['name'] . '"></a>';
    }
} else {
    echo 'Ошибка при запросе смайлов: ' . $db->error;
}

echo '</div></span>';

// Передача CSRF-токена в форму
echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">
    </form>
</center>';


?>

<script>
function pasteSmile(smile) {
    var message = document.getElementById("message");
    message.value = message.value + smile;
    message.focus();
    message.selectionStart = message.value.length;
}
</script>
<?




if (isset($_POST['add'])) {
    // Проверка CSRF-токена
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Неверный CSRF-токен.');
    }

    // Получение пользователя
    $stmt = $db->prepare("SELECT * FROM `users` WHERE `id` = ?");
    $stmt->bind_param('i', $user['id']);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    // Проверки на игнор и бан
    $stmt = $db->prepare("SELECT * FROM `Ignore` WHERE `user` = ?");
    $stmt->bind_param('i', $user['id']);
    $stmt->execute();
    $ignore = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    $stmt = $db->prepare("SELECT * FROM `ban` WHERE `user` = ?");
    $stmt->bind_param('i', $user['id']);
    $stmt->execute();
    $ban = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if ($ignore || $ban) {
        $_SESSION['err'] = '<font color=white>Общение не доступно.</font>';
        header('Location: ?');
        exit();
    }

    if ($user['game_time'] < 3600) {
        $_SESSION['err'] = "<font color=white>Общение на сайте доступно после проведения 1 Часа в игре.</font>";
        header('Location: ?');
        exit();
    }

$msg = trim($_POST['msg']);// Очистка и защита сообщения
$msg = strong_($msg, $db); // Здесь используется функция strong_

// Проверка на пустоту
if (empty($msg)) {
    $_SESSION['err'] = '<font color=white>Вы не ввели сообщение!</font>';
    header('Location: ?');
    exit();
}
if(mb_strlen($msg) > 500 ){
$_SESSION['err'] = '<font color=white>Не более 500 символов!</font>';
header('Location: ?');
exit();
}

    // Проверка на повторение сообщения
    $msgEscaped = strong_($msg);
    $stmt = $db->prepare('SELECT COUNT(*) FROM ass WHERE avtor = ? AND msg = ? AND time > ?');
    $timeLimit = time() - 90;
    $stmt->bind_param('isi', $user['id'], $msgEscaped, $timeLimit);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['err'] = '<font color=white>Ваше сообщение повторяется!</font>';
        header('Location: ?');
        exit();
    }

    // Проверка на частоту сообщений
    $stmt = $db->prepare('SELECT time FROM ass WHERE avtor = ? ORDER BY time DESC LIMIT 1');
    $stmt->bind_param('i', $user['id']);
    $stmt->execute();
    $stmt->bind_result($lastTime);
    $stmt->fetch();
    $stmt->close();

    $stmt = $db->prepare('SELECT chat FROM antispam LIMIT 1');
    $stmt->execute();
    $stmt->bind_result($chatTimeout);
    $stmt->fetch();
    $stmt->close();

    if ((time() - $lastTime) < $chatTimeout) {
        $_SESSION['err'] = '<font color=white>Пишите не чаще чем раз в ' . $chatTimeout . ' секунд!</font>';
        header('Location: ?');
        exit();
    }

    // Проверка на ссылки
    if (preg_match("#(<a href=|\[url=|\[link=)?(ftp://|https?://|www)?([\s]?)([^-a-z0-9_@]+)([-a-z0-9/.\s]+\.[a-z]{2,6}[-a-z0-9_/.]*[html|php|cgi]*[\]>]?)+#is", $msg)) {
        $spa = 'Здравствуйте! Игрок ' . $user['login'] . ' попытался отправить (' . $msg . ') в чате.';
        $spam = strong_($spa);

        // Логирование спама
        $stmt = $db->prepare("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1");
        $stmt->execute();
        $stmt->bind_result($con);
        $stmt->fetch();
        $stmt->close();

        if ($con == 0) {
            $stmt = $db->prepare("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = ?, `posl_time` = ?");
            $stmt->bind_param('ii', time(), time());
            $stmt->execute();
            $stmt->close();
        }

        // Продолжение обработки для других пользователей...

        header('Location: ?');
        exit();
    }

    // Вставка сообщения в базу
    $stmt = $db->prepare('INSERT INTO ass (msg, avtor, time) VALUES (?, ?, ?)');
    $stmt->bind_param('sii', $msgEscaped, $user['id'], time());
    $stmt->execute();
    $stmt->close();

    $_SESSION['err'] = 'Сообщение успешно добавлено!';
    header('Location: ?');
    exit();
} 


$mmm = filter(bb1(smile($post['msg'])));


?>
