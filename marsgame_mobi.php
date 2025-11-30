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
    header('Location: ?');
    exit;
}

if (isset($_COOKIE['SESSID']) && isset($_COOKIE['message'])) {
    $message = $_COOKIE['message'];
    $page = isset($_COOKIE['page']) ? (int)$_COOKIE['page'] : 1;
    $us = isset($_COOKIE['us']) ? (int)$_COOKIE['us'] : 1;

    // Начальный URL для загрузки
    $url = "http://marsgame.mobi/rating/1?page={$page}";

    // Инициализация cURL сессии
    $curl = curl_init($url);

    // Настройки cURL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Следовать за редиректами

    // Выполнение запроса
    $response = curl_exec($curl);

    // Получаем код HTTP-ответа
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Проверка на ошибки cURL
    if (curl_errno($curl)) {
        echo "Ошибка cURL: " . curl_error($curl) . "<br>";
        curl_close($curl);
        exit;
    }

    // Проверка успешности запроса (например, 200 OK)
    if ($httpCode != 200) {
        echo "Ошибка при загрузке страницы. HTTP Код: {$httpCode}<br>";
        echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
        curl_close($curl);
        exit;
    }

    // Закрытие cURL сессии
    curl_close($curl);

    // Парсинг HTML с помощью DOMDocument
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($response);
    libxml_clear_errors();
    $links = $doc->getElementsByTagName('a');

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
    } else {
        // Проверка, что нужный пользователь найден
        if (!isset($userIds[$us - 1])) {
            // Увеличиваем номер страницы и сбрасываем номер пользователя
            setcookie('page', $page + 1, time() + (60 * 60 * 24), '/');
            setcookie('us', 1, time() + (60 * 60 * 24), '/');
        } else {
            // Пользователь найден
            $currentUser = $userIds[$us - 1];
            echo "Пользователь найден: {$currentUser} (страница {$page}, номер {$us}).<br>";
            echo "Список пользователей: " . implode(', ', $userIds) . "<hr>";

            // Загружаем страницу диалога с текущим пользователем
            $url = "http://marsgame.mobi/dialog/{$currentUser}";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $response = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if (curl_errno($curl)) {
                echo "Ошибка cURL: " . curl_error($curl) . "<br>";
                curl_close($curl);
                exit;
            }

            if ($httpCode != 200) {
                echo "Ошибка при загрузке страницы. HTTP Код: {$httpCode}<br>";
                echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
                curl_close($curl);
                exit;
            }

            curl_close($curl);












// Парсинг HTML с помощью DOMDocument
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($response);
libxml_clear_errors();

// Извлекаем все формы и поля input
$forms = $doc->getElementsByTagName('form');
$inputs = $doc->getElementsByTagName('input');
$textareas = $doc->getElementsByTagName('textarea');

// Обработка форм
foreach ($forms as $form) {
    // Извлекаем action и id формы
    $formAction = $form->getAttribute('action');
    $formId = $form->getAttribute('id');
    foreach ($inputs as $input) {
        // Проверяем, что input внутри текущей формы (чтобы избежать вывода данных других форм)
        if ($form->isSameNode($input->parentNode)) {
            $inputName = $input->getAttribute('name');
            $inputId = $input->getAttribute('id');
        }
    }

    foreach ($textareas as $textarea) {
        // Проверяем, что textarea внутри текущей формы
        if ($form->isSameNode($textarea->parentNode)) {
            $textareaName = $textarea->getAttribute('name');
            $textareaId = $textarea->getAttribute('id');
        }
    }

}

session_start(); // обязательно в начале скрипта

// Если удалось извлечь все данные, отправляем POST-запрос
if ($formAction && $formId) {
    // Формируем URL для отправки запроса
    $pageUrl = 'http://marsgame.mobi/dialog/' . $formAction;

    // Получим текст из сессии
    $messageText = isset($_COOKIE['message']) ? $_COOKIE['message'] : '🚀 Привет! Загляни на mars-games.ru';

    // Подготовим данные для отправки
    $inputsData = [
        'text' => $messageText, // Текст из сессии
    ];

    // Инициализируем cURL для отправки POST-запроса
    $curl = curl_init($pageUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($inputsData));

    // Настроим cookie
    curl_setopt($curl, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");

    // Добавим заголовки
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'User-Agent: Mozilla/5.0',
        'Referer: http://marsgame.mobi/'
    ]);

    // Выполним запрос
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if(curl_errno($curl)) {
        echo "Ошибка cURL: " . curl_error($curl) . "<br>";
    }

    curl_close($curl);


if (strpos($response, 'Игрок принимает сообщения только от друзей.') !== false) {
    echo "⚠️ Игрок принимает сообщения только от друзей. Пропускаем.<br>";
    setcookie('us', $us + 1, time() + (60 * 60 * 24), '/');
    echo "<script>
        setTimeout(function() {
            location.reload();
        }, 1000);
    </script>";
    exit;
}else{
echo "✅ Сообщение отправлено.";
}

	
	
		?>
	<script type="text/javascript">
    var secondsLeft = 60; // столько же, сколько указано в setTimeout

    function updateTimer() {
        if (secondsLeft > 0) {
            document.getElementById("timer").textContent = secondsLeft + " сек до обновления...";
            secondsLeft--;
            setTimeout(updateTimer, 1000);
        }
    }

    document.write('<div id="timer" style="font-weight:bold; color:green; padding:10px;"></div>');
    updateTimer();
</script>
	<?
	
	
} else {
    echo "❌ Не удалось извлечь все необходимые данные.";
	    // Увеличиваем счетчик пользователя
    setcookie('us', $us + 1, time() + (60 * 60 * 24), '/');
    echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
    echo "<script type='text/javascript'>
        setTimeout(function(){
            location.reload();
        }, 1000);
    </script>";
}


















            // Увеличиваем счетчик пользователей
            setcookie('us', $us + 1, time() + (60 * 60 * 24), '/');
        }

        // Переход к следующему пользователю
        if ($us > count($userIds)) {
            setcookie('page', $page + 1, time() + (60 * 60 * 24), '/');
            setcookie('us', 1, time() + (60 * 60 * 24), '/');
            header('Location: ?');
            exit;
        }

        // Переход к следующему пользователю
        setcookie('us', $us + 1, time() + (60 * 60 * 24), '/');
        echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
        echo "<script type='text/javascript'>
            setTimeout(function(){
                location.reload();
            }, 60000);
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
    <input type="number" name="page" value="0" min="0" required/><br/>
    <input type="submit" value="Запустить" />
</form>

<?php 
}
?>
