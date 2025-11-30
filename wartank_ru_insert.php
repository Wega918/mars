<?php
ob_start();
session_start();
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<?


// Завершение сессии и очистка данных
if (isset($_GET['exit'])) {
    setcookie("message", "", time() - 3600, "/");
    setcookie("us", "", time() - 3600, "/");
    setcookie("page", "", time() - 3600, "/");
    setcookie("SESSID", "", time() - 3600, "/");
    $_SESSION['num1'] = 0;
    $_SESSION['num2'] = 0;
	    $_SESSION['num1_'] = 0;
    $_SESSION['num2_'] = 0;
    header('Location: ?');
    exit;
}

if (isset($_COOKIE['SESSID']) && isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    $page = isset($_COOKIE['page']) ? (int)$_COOKIE['page'] : 1;
    $us = isset($_COOKIE['us']) ? (int)$_COOKIE['us'] : 1;



// Инициализация сессии
session_start();

// Проверяем, если $page равно нулю
if ($page == 0) {
    // Устанавливаем num1_ равным num1, а num2_ равным 1
    $_SESSION['num1_'] = $_SESSION['num1'];
    $_SESSION['num2_'] = 1;
} else {
    // Если $page не равно нулю, фиксируем num1_ и увеличиваем num2_
    if (!isset($_SESSION['num1_'])) {
        // Если num1_ еще не задано, фиксируем его на текущем значении num1
        $_SESSION['num1_'] = $_SESSION['num1'];
    }
    
    // Увеличиваем num2_ на 1 при каждом действии
    $_SESSION['num2_'] = (($_SESSION['num2_']-1) + 1);
}

// Для отладки (вывод значений)
echo 'num1_: ' . $_SESSION['num1_'] . '<br>';
echo 'num2_: ' . $_SESSION['num2_'] . '<br>';

if($page<=2){
$page2 = $page;
}else{
$page2 = 3;
}


if($page2==0){
$page3=1;
}elseif($page2==1){
$page3=$page2;
}elseif($page2>=2){
$page3=$_SESSION['num2'];
}





if($page==0){
$url = "http://wartank.ru/online/"; // Начальный URL для загрузки
}else{
$url = "http://wartank.ru/online/?{$_SESSION['num1']}-{$page3}.ILinkListener-navigation-container-navigation-{$page2}-pageLink"; // Начальный URL для загрузки
}
echo '<hr>'.$url.'<hr>';
echo "<hr>{$_SESSION['num1']}<br>{$_SESSION['num2']}<hr>";
 
 
   $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");
    $response = curl_exec($curl);
    curl_close($curl);

    if (!$response) {
        echo "Ошибка при загрузке страницы.<br>";
        echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
        exit;
    }

    // Извлекаем параметры num1 и num2
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($response);
    libxml_clear_errors();
    $links = $doc->getElementsByTagName('a');
    $num1 = null;
    $num2 = null;

    // Извлекаем параметры num1 и num2
    foreach ($links as $link) {
        if ($link->getAttribute('class') == 'simple-but gray') {
            $href = $link->getAttribute('href');
            if (preg_match('#(\d+)-(\d+)#', $href, $matches)) {
                $num1 = $matches[1];
                $num2 = $matches[2]; 

                break;
            }
        }
    }
$_SESSION['num1'] = ($num1);
$_SESSION['num2'] = ($num2);

// Извлекаем ссылки для пользователей
$userIds = [];
foreach ($links as $link) {
$href = $link->getAttribute('href'); // Получаем атрибут href
if (strpos($href, '/profile/') !== false) {
// Извлекаем ID пользователя из href
if (preg_match('#/profile/(\d+)#', $href, $matches)) {
$userIds[] = $matches[1];  // Добавляем ID пользователя в массив
}
}
}
// Проверка, что пользователи найдены
if (empty($userIds)) {
echo "Не удалось найти пользователей на странице.<br>";
echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
echo "<script type='text/javascript'>
setTimeout(function(){
location.reload();
}, 1);
</script>";
} else {
// Проверка, что нужный пользователь найден
if (!isset($userIds[$us - 1])) {
echo "<hr>{$num1}<br>{$num2}<hr>";
echo "На странице {$page} не найден пользователь № {$us}.<br>";
echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
// Увеличиваем номер страницы и сбрасываем номер пользователя
setcookie('page', $page + 1, time() + (60 * 60 * 24), '/');
setcookie('us', 1, time() + (60 * 60 * 24), '/');
} else {
// Пользователь найден
$currentUser = $userIds[$us - 1];
echo "Пользователь найден: {$currentUser} (страница {$page}, номер {$us}).<br>";
echo "Список пользователей: " . implode(', ', $userIds) . "<hr>";
	





$mysqli = new mysqli('localhost', 'oksiv92_marsga', 'jeJeQLj8QkkF1', 'oksiv92_marsga');

// Проверка на ошибки подключения
if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}












// Создание таблицы, если она не существует
$sqlCreateTable = "
    CREATE TABLE IF NOT EXISTS users_wartank (
        id INT AUTO_INCREMENT PRIMARY KEY,
        userId INT NOT NULL,
        UNIQUE(userId)  -- Сделаем поле userId уникальным
    );
";
$mysqli->query($sqlCreateTable);

// Цикл по пользователям
for ($i = 0; $i < count($userIds); $i++) {
    $userId = $userIds[$i]; // Получаем значение из массива по индексу

    // Проверяем, существует ли уже запись с таким userId
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM users_wartank WHERE userId = ?");
    $stmt->bind_param("i", $userId); // Привязываем параметр userId (тип i для целого числа)
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // Если записи с таким userId нет, добавляем
    if ($count == 0) {
        // Подготовка и выполнение INSERT запроса
        $stmt = $mysqli->prepare("INSERT INTO users_wartank (userId) VALUES (?)");
        $stmt->bind_param("i", $userId); // Привязываем параметр userId
        $stmt->execute();
        echo "Запись для пользователя ID {$userId} успешно добавлена в базу данных.<br>";
        $stmt->close();
    } else {
        echo "Запись с пользователем ID {$userId} уже существует в базе данных.<br>";
    }
}

// Закрытие соединения с базой данных
$mysqli->close();







// Увеличиваем счетчик пользователей
setcookie('us', $us + 1, time() + (60 * 60 * 24), '/');
}	
if ($us > count($userIds)) {
// Увеличиваем номер страницы
setcookie('page', $page + 1, time() + (60 * 60 * 24), '/');
setcookie('us', 1, time() + (60 * 60 * 24), '/');
// Перезагружаем страницу
header('Location: ?');
exit;
}
// Переход к следующему пользователю
setcookie('us', $us + 1, time() + (60 * 60 * 24), '/');
echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
echo "<script type='text/javascript'>
setTimeout(function(){
location.reload();
}, 1);
</script>";
}
} else {
    // Форма ввода данных
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['SESSID'], $_POST['message'], $_POST['page'])) {
        setcookie('SESSID', $_POST['SESSID'], time() + (60 * 60 * 4), '/');
        setcookie('message', $_POST['message'], time() + (60 * 60 * 4), '/');
        setcookie('page', $_POST['page'], time() + (60 * 60 * 4), '/');
        setcookie('us', 1, time() + (60 * 60 * 4), '/');
        header('Location: ?');
        exit;
    }
?>

<form action="" method="post">
    <label>ТЕКСТ сообщения:</label><br/>
    <input type="text" name="message" required/><br/>
    <label>SESSID:</label><br/>
    <input type="text" name="SESSID" required/><br/>
    <label>Страница спама:</label><br/>
    <input type="number" name="page" value="1" min="0" required/><br/>
    <input type="submit" value="Запустить" />
</form>

<?php 
}
?>
