<?php
ob_start();
session_start();
error_reporting(E_ALL);








/* 
$url = "http://wartank.ru/online/?997-2.ILinkListener-navigation-container-navigation-2-pageLink"; // Начальный URL для загрузки

echo '<hr>'.$url.'<hr>';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_COOKIE, "JSESSIONID=6EF7653DE15893EAEA88D96F1100B3BC");
$response = curl_exec($curl);
curl_close($curl);

if (!$response) {
    echo "Ошибка при загрузке страницы.<br>";
    echo '<a href="?exit" style="color: red; font-weight: bold;">Остановить рассылку</a><br>';
    exit;
}

// Создаем объект DOMDocument и загружаем в него HTML-страницу
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Чтобы подавить предупреждения парсера
$dom->loadHTML($response);
libxml_clear_errors();

// Ищем все теги <a> на странице
$links = $dom->getElementsByTagName('a');

// Массив для хранения ID пользователей
$userIds = [];
foreach ($links as $link) {
    $href = $link->getAttribute('href'); // Получаем атрибут href

    // Проверяем, содержит ли ссылка '/profile/'
    if (strpos($href, '/profile/') !== false) {
        // Извлекаем ID пользователя из href
        if (preg_match('#/profile/(\d+)#', $href, $matches)) {
            $userIds[] = $matches[1];  // Добавляем ID пользователя в массив
        }
    }
}

echo "Список пользователей: " . implode(', ', $userIds) . "<hr>";


 */








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



if($page==0){
$_SESSION['num1_'] = ($_SESSION['num1']);
}else{
$_SESSION['num1_'] = ($_SESSION['num1']++);
}


/* if($page==0){
$_SESSION['num1_'] = ($_SESSION['num1']+1);
}
if($page>0 and $_SESSION['num1']!=$_SESSION['num1_']){
$_SESSION['num1_'] = ($_SESSION['num1']+1);
}

if($page==0){
$_SESSION['num2_'] = 1;
}else{
$_SESSION['num2_']++;
}
 */
 
 
if($page==0){
$page1 = $page;
}else{
$page1 = ($_SESSION['num2']);
//$_SESSION['num1_'] = ($_SESSION['num1_']+1);
}

if($page<=3){
$page2 = $page;
}else{
$page2 = 3;
}

if($page==0){
$url = "http://wartank.ru/online/"; // Начальный URL для загрузки
}else{
$url = "http://wartank.ru/online/?{$_SESSION['num1_']}-{$page1}.ILinkListener-navigation-container-navigation-{$page2}-pageLink"; // Начальный URL для загрузки
}
echo '<hr>'.$url.'<hr>';

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
$_SESSION['num1'] = $num1;
$_SESSION['num2'] = $num2;
echo $num2;
//при переходе на вторую страницу не считывает 


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
			
			





/* // Используем for, чтобы итерироваться по массиву
//for ($i = 0; $i < count($userIds); $i++) {
//$userId = $userIds[$i]; // Получаем значение из массива по индексу
$userId = $currentUser;
   echo "<div class='log'>";
    echo "<h2>Пользователь ID: {$userId}</h2>";
    
    // Проверка существования страницы пользователя
   $url = "http://wartank.ru/dialog/{$userId}/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true); // Проверяем только заголовки
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

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
    curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID={$_COOKIE['SESSID']}");
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
            'message' => 'Привет, Командир!  Приглашаем тебя в увлекательный мир стратегии и тактики — "Танки онлайн"! 🎯 Собери свой мощный танковый парк, объединяйся в кланы с друзьями или действуй в одиночку — выбор за тобой. https://tank.mars-games.ru/',
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
            //$sendUrl = "http://wartank.ru/dialog/{$userId}/" . $formAction;

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
            echo "<p>Отправляем запрос на URL: {$sendUrl}</p>";
            echo "<p>HTTP-код ответа: {$httpCode}</p>";
            if ($curlError) {
                echo "<p class='error'>Ошибка cURL: {$curlError}</p>";
            } else {
                echo "<p class='success'>Запрос успешно отправлен</p>";
            }
        }
    }

    echo "</div>";
//}
 */


			
			
			

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
