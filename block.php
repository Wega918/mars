<?
session_start();  // убедись, что сессии работают
ob_start(); // желательно для кросс-браузерности, особенно с JS

$HOME = 'https://mars-games.ru/';


?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="height: 100%; width: 100%; ">
<head> <meta charset="UTF-8">
<meta name="viewport" content="minimum-scale=1.0, width=device-width, maximum-scale=1.0">
<meta property="og:type" content="website">
<meta property="og:site_name" content="mars">
<meta property="og:title" content="<?=$NameGame?>">
<meta property="og:description" content="Построй свою бизнес империю! Освой фермерский бизнес на Марсе.">
<meta property="og:url" content="<?=$HOME?>">
<meta property="og:locale" content="ru_RU">
<meta property="og:image" content="<?=$HOME?>images/index/start_logo.jpg">
<meta property="og:image:width" content="2560">
<meta property="og:image:height" content="1024">
<meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="/favicon.ico?v2322"><meta name="yandex-verification" content="e60c55b324d17742">
<meta name="keywords" content="big, bigmars, mars, marsgame, mars-game, game, games, mars game, онлайн игра Марс, онлайн, игра, Марс, бесплатно, экономическая, клон, ga, mars ga, браузерная, онлайн игра, marsfree, upiter-game, космос, прокачивать, юпитер, рейб">
<meta name="description" content="После ошеломляющей новости о находке воды на Марсе сотни космических кораблей с переселенцами ринулись к Красной планете. Не упусти этот шанс! Отправляйся на Марс, стань первым среди равных и построй свою межпланетную бизнес-империю!">
<link rel="stylesheet" type="text/css" href="/diz.css">
<link rel="stylesheet" type="text/css" href="/diz_new.css">

<title><?=$NameGame?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><?php
?>
<script type="text/javascript">
var secS ='с';
var secM ='сек';
var minS ='м :';
var minM ='мин';
var hourS ='ч :';
var hourM ='час';
var dayS ='д :';
var dayM ='дн';
var detailOut = false;
var readyLink = '0'+(detailOut?secS:' ' + secM); 
</script>


    <div class="container">
        <div class="logo">
            <img src="/logo.jpg" alt="Логотип игры" class="game-logo">
        </div>

</head>


    <style>
        /* Стиль для блока подтверждения */
        #confirmationBox {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: rgba(0, 0, 0); /* Сделаем фон непрозрачным */
            color: white;
            border-radius: 8px;
            text-align: center;
            z-index: 9999;
            display: none; /* Скрываем блок по умолчанию */
            pointer-events: auto; /* Убедимся, что окно активно */
        }

        /* Блокировка взаимодействия с сайтом */
        body.blocked {
            pointer-events: none; /* Блокируем все клики на странице */
            opacity: 0.7; /* Делаем сайт полупрозрачным */
        }

        /* Не применяем полупрозрачность к окну подтверждения */
        #confirmationBox {
            opacity: 1; /* Убираем полупрозрачность */
        }

        /* Заблокированные элементы страницы */
        body.blocked > * {
            pointer-events: none; /* Блокируем все элементы страницы, кроме окна подтверждения */
        }
    </style>
</head>








<?




/* 

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
        //console.log('[ping] отправлен');
    }


    function saveClick(x, y) {
        clickHistory.push({ x, y });
        if (clickHistory.length > maxHistory) {
            clickHistory.shift();
        }
        saveClickHistory(); 
    }


    function isSameClick(x, y) {
        return clickHistory.some(click => Math.abs(click.x - x) < 5 && Math.abs(click.y - y) < 5); // Погрешность для точных кликов
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

 */





/* 


if (isset($_GET['js_ping'])) {
    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $HOME) !== false) {
        $_SESSION['js_alive'] = time();  // Обновляем время последней активности
        
    } else {
        http_response_code(403); // Отклоняем запрос с чужого сайта
        echo 'Forbidden';
    }
    exit; // <-- ВАЖНО: Останавливаем выполнение дальше
}









if (
    isset($_SESSION['js_alive']) &&
    time() - $_SESSION['js_alive'] < 10
) {
    echo '<script>location.href = "' . $_SESSION['return_to'] . '";</script>';
    exit;




} else {
	
    // Если активность не была обновлена, показываем сообщение и кнопку подтверждения
    echo '
    <div id="confirmationBox">
        Подтвердите, что вы не бот. <br>
        <button id="confirmActivityBtn">Я не робот</button>
    </div>';

    // Блокируем взаимодействие с сайтом
    echo '
    <script>
    document.getElementById("confirmationBox").style.display = "block"; // Показываем блок подтверждения
    document.body.classList.add("blocked"); // Блокируем страницу

    // Разрешаем взаимодействие только с окном подтверждения
    document.getElementById("confirmationBox").style.pointerEvents = "auto";




    // Обработчик для кнопки подтверждения активности
    document.getElementById("confirmActivityBtn").addEventListener("click", function() {
       
		 location.reload();
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "?js_ping=1", true);  // Отправляем запрос для обновления активности
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log("Ответ от сервера получен:", xhr.responseText);  // Для отладки
                    location.reload();  // Перезагружаем страницу сразу после успешного ответа
                } else {
                    console.log("Ошибка при запросе:", xhr.status, xhr.statusText);  // Для отладки
                }
            }
        };
        xhr.send();
    });








    </script>'; 
} */


/* 

session_start();

// URL текущей страницы
$current_url = (isset($_SESSION['blocked_from']) ? $_SESSION['blocked_from'] : $_SERVER['REQUEST_URI']);

// Проверяем, установлена ли блокировка
$remaining = 0;
if (isset($_SESSION['bot_block_until'])) {
    $remaining = $_SESSION['bot_block_until'] - time();
    if ($remaining < 0) {
        // Снимаем блокировку, если время вышло
        unset($_SESSION['bot_block_until']);
        unset($_SESSION['err']);
        header('Location: ' . $current_url);
        exit();
    }
}

// Сообщение об ошибки
$err = isset($_SESSION['err']) ? $_SESSION['err'] : '⚠ Вы заблокированы антиботом.';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Антибот защита</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1b1b1b;
            color: #fff;
            text-align: center;
            padding-top: 100px;
        }
        .block-box {
            display: inline-block;
            background: #2c2c2c;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.7);
            max-width: 400px;
            z-index: 9999;
        }
        .timer {
            font-size: 20px;
            font-weight: bold;
            margin: 15px 0;
            color: #ff6b6b;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
        .btn:hover {
            background: #ff4a4a;
        }
    </style>
    <script>
        var remaining = <?php echo (int)$remaining; ?>;
        var redirectUrl = "<?php echo addslashes($current_url); ?>";
        function updateTimer() {
            if (remaining <= 0) {
                location.href = redirectUrl;
                return;
            }
            var minutes = Math.floor(remaining / 60);
            var seconds = remaining % 60;
            document.getElementById('timer').textContent =
                (minutes > 0 ? minutes + " мин " : "") + seconds + " сек";
            remaining--;
            setTimeout(updateTimer, 1000);
        }
        window.onload = updateTimer;
    </script>
</head>
<body>
    <div class="block-box">
        <h2><?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?></h2>
        <?php if ($remaining > 0): ?>
            <div>Ожидайте снятия блокировки:</div>
            <div id="timer" class="timer"></div>
        <?php endif; ?>
        <a class="btn" href="<?php echo htmlspecialchars($current_url, ENT_QUOTES, 'UTF-8'); ?>">Вернуться</a>
    </div>
</body>
</html>
<? */











session_start();

// Страница, с которой заблокировали пользователя
$redirect_url = isset($_SESSION['blocked_from']) ? $_SESSION['blocked_from'] : '/';

// Если нажали кнопку "Я не бот"
if (isset($_POST['confirm_human'])) {
    unset($_SESSION['bot_block_until']);
    unset($_SESSION['err']);
    unset($_SESSION['blocked_from']);
    header('Location: ' . $redirect_url);
    exit();
}

// Сообщение об ошибке
$err = isset($_SESSION['err']) ? $_SESSION['err'] : '⚠ Вы заблокированы антиботом.';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Антибот защита</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1b1b1b;
            color: #fff;
            text-align: center;
            padding-top: 100px;
        }
        .block-box {
            display: inline-block;
            background: #2c2c2c;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.7);
            max-width: 400px;
            z-index: 9999;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            background: #ff6b6b;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
        .btn:hover {
            background: #ff4a4a;
        }
    </style>
</head>
<body>
    <div class="block-box">
        <h2><?php echo htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?></h2>
        <form method="post">
            <button type="submit" name="confirm_human" class="btn">Я не бот</button>
        </form>
    </div>
</body>
</html>


