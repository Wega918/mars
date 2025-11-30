<?php
ob_start();
session_start();
error_reporting(E_ALL);

// Начало вывода
echo "<!DOCTYPE html>";
echo "<html lang='ru'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Обработка запросов</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; line-height: 1.6; background-color: #f9f9f9; color: #333; padding: 20px; }";
echo ".log { background: #fff; border: 1px solid #ddd; margin-bottom: 10px; padding: 10px; border-radius: 5px; }";
echo ".error { color: red; }";
echo ".success { color: green; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1>Результаты обработки</h1>";

// Инициализация multi-curl
$multiCurl = [];
$mh = curl_multi_init();
$results = [];

for ($userId = 34951676; $userId < 34951778; $userId++) {
    echo "<div class='log'>";
    echo "<h2>Пользователь ID: {$userId}</h2>";

    // Проверка существования страницы пользователя
    $url = "http://wartank.ru/dialog/{$userId}/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true); // Проверяем только заголовки
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID=D279F13743503FFC799F973F30714118");
    
    // Добавление в очередь multi-curl
    curl_multi_add_handle($mh, $ch);
    $multiCurl[$userId] = $ch;
}

$running = null;
do {
    curl_multi_exec($mh, $running);
} while ($running);

// Обработка результатов запросов
foreach ($multiCurl as $userId => $ch) {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_multi_remove_handle($mh, $ch);
    
    if ($httpCode == 404) {
        echo "<p class='error'>Пользователь не существует (HTTP 404).</p>";
        echo "</div>";
        continue;
    } elseif ($httpCode >= 400) {
        echo "<p class='error'>Ошибка при проверке страницы (HTTP {$httpCode}).</p>";
        echo "</div>";
        continue;
    }

    // Загружаем HTML-страницу
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID=D279F13743503FFC799F973F30714118");
    $mailPage = curl_exec($ch);
    if (!$mailPage) {
        echo "<p class='error'>Ошибка cURL при загрузке страницы: " . curl_error($ch) . "</p>";
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

    // Поиск изображений с параметром off
    $images = $doc->getElementsByTagName('img');
    $status = null; // По умолчанию статус неизвестен

    $isOffline = false; // Флаг, чтобы определить оффлайн ли пользователь

    foreach ($images as $img) {
        $src = $img->getAttribute('src');
        // Проверяем наличие _off в имени файла изображения
        if (strpos($src, '_off') !== false) {
            $isOffline = true;  // Если _off есть, то пользователь оффлайн
            break;
        }
    }

    if ($isOffline) {
        echo "<p class='error'>Пользователь недоступен (status: off).</p>";
    } else {
        echo "<p class='success'>Пользователь доступен (status: online). Отправляем сообщение...</p>";






        // Подготовка данных для отправки
        $data = [
            'message' => 'Привет',
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
            echo "<p>ID формы: {$formId}</p>";

            // Извлечение части из action
            if (preg_match('/\?(.*?)\./', $formAction, $matches)) {
                $extractedAction = $matches[1];
                echo "<p>Часть action: {$extractedAction}</p>";
            } else {
                echo "<p class='error'>Action не содержит нужного формата</p>";
                continue;
            }

            // URL для отправки
            $sendUrl = "http://wartank.ru/dialog/{$userId}/" . $formAction;

            // Подготовка cURL для отправки
            $curl = curl_init($sendUrl);
            curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($curl, CURLOPT_REFERER, $url);
            curl_setopt($curl, CURLOPT_TIMEOUT, 600);
            curl_setopt($curl, CURLOPT_COOKIE, "JSESSIONID=D279F13743503FFC799F973F30714118");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

            // Добавление в multi-curl для параллельной обработки
            curl_multi_add_handle($mh, $curl);
        }
    }

    echo "</div>";
}

// Завершаем обработку multi-curl
$running = null;
do {
    curl_multi_exec($mh, $running);
} while ($running);

// Закрытие multi-curl
curl_multi_close($mh);

echo "</body>";
echo "</html>";
exit();
?>
