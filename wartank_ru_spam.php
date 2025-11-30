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


/* echo "<script type='text/javascript'>
setTimeout(function(){
location.reload();
}, 5000);
</script>"; */
// Завершение сессии и очистка данных
if (isset($_GET['exit'])) {
    setcookie("message", "", time() - 3600, "/");
    setcookie("us", "", time() - 3600, "/");
    setcookie("page", "", time() - 3600, "/");
    setcookie("SESSID", "", time() - 3600, "/");
    header('Location: ?');
    exit;
}

if (isset($_COOKIE['SESSID']) && isset($_COOKIE['page'])) {
    $message = $_COOKIE['message'];
    $page = isset($_COOKIE['page']) ? (int)$_COOKIE['page'] : 1;
    $us = isset($_COOKIE['us']) ? (int)$_COOKIE['us'] : 1;


$mysqli = new mysqli('localhost', 'oksiv92_marsga', 'jeJeQLj8QkkF1', 'oksiv92_marsga');

// Проверка на ошибки подключения
if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}





// SQL-запрос для подсчета записей с done = 1
$query = "SELECT COUNT(*) AS total_done FROM users_wartank WHERE done = 1";
$result = $mysqli->query($query);

if ($result && $row = $result->fetch_assoc()) {
    // Вывод количества записей
    echo "Количество записей с done = 1: " . $row['total_done'];
	echo "<hr>";
} else {
    echo "Произошла ошибка при подсчете записей.";
}





// Количество записей на страницу
$recordsPerPage = 10;

// Рассчитываем смещение для LIMIT
$offset = ($page - 1) * $recordsPerPage;

// Формируем запрос с динамическим LIMIT
$query = "SELECT userId FROM users_wartank WHERE done = 0 LIMIT 25";//$offset, $recordsPerPage

// Выполнение запроса
$result = $mysqli->query($query);

// Проверка, есть ли результаты
if ($result->num_rows > 0) {
    // Цикл по всем строкам результата
    while ($row = $result->fetch_assoc()) {
        $userId = $row['userId'];

        // Выводим userId
        echo "userId: " . $userId . "<br>";

        // URL для запроса
        $url = "http://wartank.ru/dialog/{$userId}/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");
        $mailPage = curl_exec($ch);
        if (!$mailPage) {
           // echo "<p class='error'>Ошибка cURL при загрузке страницы: " . curl_error($ch) . "</p>";
            curl_close($ch);
            echo "</div>";
            continue;
        }
        curl_close($ch);

        // Далее обрабатывается страница
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($mailPage);
        libxml_clear_errors();

        // Подготовка данных для отправки
        $data = [
            'message' => '💥 Танки в бой! tank.mars-games.ru — жми и рубись! 🚀
👉 tank.mars-games.ru 🌍',
            'value:MessagePage.send' => 'Отправить',
        ];

        // Получение ID форм и отправка
        $forms = $doc->getElementsByTagName('form');
        $processedForms = []; // Для отслеживания обработанных форм

        foreach ($forms as $form) {
            $formId = $form->getAttribute('id');
            $formAction = $form->getAttribute('action');

            if (!$formId || !$formAction) {
                echo "<p class='error'>Форма не содержит необходимых атрибутов id или action</p>";
                continue;
            }

            // Избегаем повторной обработки одной и той же формы
            if (in_array($formId, $processedForms)) {
                continue;
            }
            $processedForms[] = $formId;

            // Вывод ID формы
            //echo "<p>ID формы: {$formId}</p>";

            // Извлечение части из action
            if (preg_match('/\?(.*?)\./', $formAction, $matches)) {
                $extractedAction = $matches[1];
               // echo "<p>Часть action: {$extractedAction}</p>";
            } else {
                echo "<p class='error'>Action не содержит нужного формата</p>";
                continue;
            }

            // URL для отправки
            $sendUrl = "http://wartank.ru/dialog/{$userId}/" . $formAction;

            // Отправка cURL
            $curl = curl_init($sendUrl);
            curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($curl, CURLOPT_REFERER, $url);
            curl_setopt($curl, CURLOPT_TIMEOUT, 600);
            curl_setopt($curl, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

            $sendResponse = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $curlError = curl_error($curl);
            curl_close($curl);

            // Логирование
           // echo "<p>Отправляем запрос на URL: {$sendUrl}</p>";
//echo "<p>HTTP-код ответа: {$httpCode}</p>";
            if ($curlError) {
                echo "<p class='error'>Ошибка cURL: {$curlError}</p>";
            } else {
               // echo "<p class='success'>Запрос успешно отправлен</p>";

                // Обновляем поле done на 1, чтобы не отправлять повторно
                $updateQuery = "UPDATE users_wartank SET done = 1 WHERE userId = ?";
                $stmt = $mysqli->prepare($updateQuery);
                $stmt->bind_param('i', $userId);
                $stmt->execute();
                $stmt->close();
              //  echo "<p>Запись для userId {$userId} обновлена: done = 1</p>";
            }
        }
    }

    // Автоматический редирект на следующую страницу
    $nextPage = $page + 1;
    // Устанавливаем заголовок для перенаправления
   // header("Location: ?page={$nextPage}");
    echo "<script type='text/javascript'>
setTimeout(function(){
location.reload();
}, 10);
</script>";


//exit; // Выход после редиректа, чтобы не продолжать выполнение текущего скрипта

} else {
    echo "Нет записей в таблице.";
}

// Закрытие соединения с базой данных
$mysqli->close();














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
