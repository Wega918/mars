<?php
$title = 'Меню Пользователя';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: /');
exit();
}
$auto_bot_user = mysql_fetch_array(mysql_query('SELECT * FROM `auto_bot_user` WHERE `user` = "'.$user['id'].'"'));



// Стоимость активации бота для разных периодов
$costs = [
    '1' => 250000,
    '7' => 1750000,
    '14' => 3500000,
    '30' => 7500000
];

// Генерация HTML-кнопок для активации бота
function generateActivationButtons($costs) {
    $buttons = '';
    foreach ($costs as $days => $cost) {
        $buttons .= '<a class="btni" style="min-width:160px;margin:4px;" href="?activate=' . $days . '">';
        $buttons .= '<span>' . $days . 'д <img width="24" height="24" alt="рубины" src="/images/ruby.png" title="рубины"> <font color=red>' . n_f($cost) . '</font></span>';
        $buttons .= '</a>';
    }
    return '<center>' . $buttons . '</center>';
}

// Проверка активации через GET-параметр
if (isset($_GET['activated'])) {
    $_SESSION['ses'] = generateActivationButtons($costs);
    header("Location: ?");
    exit();
}

// Обработка активации бота
if (isset($_GET['activate'])) {
    $days = $_GET['activate'];

    // Проверяем, существует ли выбранный период
    if (!array_key_exists($days, $costs)) {
        $_SESSION['err'] = '<font color=red>Ошибка! Неверный период активации.</font>';
        header('Location: ?');
        exit();
    }

    $cost = $costs[$days];
    $timeToAdd = time() + ($days * 86400); // Время в секундах для выбранного периода

    // Проверяем, достаточно ли рубинов у пользователя
    if ($user['rubin'] < $cost) {
        $_SESSION['err'] = '<font color=red>Ошибка! Не хватает рубинов!</font>';
        header('Location: ?');
        exit();
    }

    // Проверяем, есть ли запись в таблице auto_bot_user
    $query = "SELECT * FROM auto_bot_user WHERE user = '" . $user['id'] . "'";
    $result = mysql_query($query);

    if (mysql_num_rows($result) > 0) {
        // Если запись существует, обновляем время
        mysql_query("UPDATE auto_bot_user SET time = '" . $timeToAdd . "' WHERE user = '" . $user['id'] . "' LIMIT 1");
    } else {
        // Если записи нет, создаём новую
        mysql_query("INSERT INTO auto_bot_user SET time = '" . $timeToAdd . "', user = '" . $user['id'] . "'");
    }

    // Снимаем рубины с пользователя
    mysql_query("UPDATE users SET rubin = rubin - " . $cost . " WHERE id = '" . $user['id'] . "' LIMIT 1");

    // Устанавливаем успешное сообщение
    $_SESSION['ok'] = 'Бот активирован на ' . $days . 'д';
    header('Location: ?');
    exit();
}





?>





<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ленивец 3000 - Активация бота 🦥</title>
    <style>
        /* Общие стили */
        body {
            font-family: 'Arial', sans-serif;
          
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #263238;
        }

        .bot-activation-container {
            text-align: center;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 450px;
        }

        .bot-title {
            font-size: 2.8rem;
            color: #00796b;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .bot-description {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .bot-image {
            width: 180px;
            margin-top: 20px;
            animation: float-animation 4s ease-in-out infinite;
        }

        @keyframes float-animation {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .bot-action-button {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 15px 35px;
            font-size: 1.2rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .bot-action-button:hover {
            background-color: #004d40;
            transform: scale(1.05);
        }

        .bot-footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #546e7a;
        }

        .bot-footer a {
            color: #00796b;
            text-decoration: none;
            font-weight: bold;
        }

        .bot-footer a:hover {
            text-decoration: underline;
        }

        .bot-emoji {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Главный контейнер -->
    <div class="bot-activation-container">
        <!-- Заголовок -->
        <h1 class="bot-title">Ленивец 3000 </h1>
<img width="50%" src="/auto_bot/auto_bot.png" style="border-radius: 10px;">


<?  
if(!$auto_bot_user){
echo '<br><p class="bot-description">Нажмите кнопку ниже, чтобы активировать бота и начать автоматизацию задач!</p>';
echo '<a class="bot-action-button"a href="?activated">Активировать бота</a>';
}else{
echo '<br><br>Активен еще <img src="/images/clock.png" alt="через" width="30" height="30"> <span id="time_' . ($auto_bot_user['time'] - time()) . '000">' . _time($auto_bot_user['time'] - time()) . '</span>';
}
?>
        <!-- Подвал -->
        <div class="bot-footer">
            Разработано с ❤️ <a href="/igrok_1/">Ленивым программистом</a>
        </div>
    </div>

    <!-- JavaScript для обработки активации -->
    <script>
        function activateBot() {
            alert("Ленивец 3000 активирован! 🎉\nБот начинает работу...");
            // Здесь можно добавить логику для запуска бота
        }
    </script>
</body>
</html>








<div id="skryt" style="display:none"> 
  <a class="btnl mt4" href="#" onClick="document.getElementById('skryt').style.display='none';document.getElementById('pokazat').style.display='';return false;">
    <img width="24" height="24" src="/images/arrow_up2.png"> подробнее
  </a>

  <p>
    <div class='fight center'>
      <div class="content">

<div class="rules-container">
    <section class="rule-section">
        <h2>Что делает бот? 🤖</h2>
        <p>Активировав бота, вы автоматизируете в игре следующие действия:</p>
        <ul>
            <li>Поход в шахту ⛏️</li>
            <li>Покупка билетов лотереи 🎟️</li>
            <li>Сбор мусора (личный, КП и союз) 🗑️</li>
            <li>Выполнение заданий (не всех) 📋</li>
            <li>Поход в экспедицию 🚀</li>
            <li>Участие в сражениях ⚔️</li>
            <li>Сбор урожая 🌾</li>
            <li>Получение наград за верность (КП и союз) 🏆</li>
        </ul>
        <p>Бот поможет вам сэкономить время и сосредоточиться на самом важном!</p>
    </section>

   
    </div>


 </div>
    </div>
  </p>
</div>

<div id="pokazat"> 
  <a class="btnl mt4" href="#" onClick="document.getElementById('pokazat').style.display='none';document.getElementById('skryt').style.display='';return false;">
    <img width="24" height="24" src="/images/arrow_down2.png"> подробнее
  </a>
</div>


<?
require_once ('../system/footer.php');
?>