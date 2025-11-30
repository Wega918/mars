<?php

?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="preload" href="/diz.css" as="style">
  <link rel="preload" href="/diz_new.css" as="style">
  <link rel="preconnect" href="https://mars-games.ru" crossorigin>


  <title>Марсианские Бизнесмены — браузерная онлайн игра про бизнес на Марсе</title>
  <meta name="description" content="Открой бизнес на Марсе и зарабатывай! Развивай фермы, шахты и предприятия в онлайн-игре с доходом в секунду. Построй империю среди звезд прямо в браузере.">
  <meta name="keywords" content="игра Марс, бизнес на Марсе, онлайн стратегия, браузерная игра, экономическая игра, доход в секунду, ферма на Марсе, idle игра, Марсианские Бизнесмены">


  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">


  <link rel="stylesheet" href="/diz.css" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="/diz_new.css" media="print" onload="this.media='all'">


  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Mars-Games.ru">
  <meta property="og:title" content="Марсианские Бизнесмены — игра про бизнес на Марсе">
  <meta property="og:description" content="Браузерная онлайн-игра: строй фермы и бизнес-империю на Марсе. Играй бесплатно и зарабатывай космический доход!">
  <meta property="og:url" content="https://mars-games.ru/">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:image" content="https://mars-games.ru/images/index/start_logo.jpg">
  <meta property="og:image:width" content="2560">
  <meta property="og:image:height" content="1024">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:alt" content="Марсианские Бизнесмены — игра про бизнес на Марсе">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Марсианские Бизнесмены — бизнес-империя на Марсе">
  <meta name="twitter:description" content="Построй свою бизнес-империю на Марсе — фермы, заводы и доход в секунду. Бесплатная браузерная онлайн-игра.">
  <meta name="twitter:image" content="https://mars-games.ru/images/index/start_logo.jpg">

<script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js" defer></script>
<script src="https://files.bpcontent.cloud/2025/07/30/11/20250730110639-B31F5ZLR.js" defer></script>

  <script>
    window.__locale = {
      secS: 'с',
      secM: 'сек',
      minS: 'м :',
      minM: 'мин',
      hourS: 'ч :',
      hourM: 'час',
      dayS: 'д :',
      dayM: 'дн',
      detailOut: false,
      readyLink: '0' + (detailOut ? 'с' : ' сек')
    };
  </script>




<?php if ($user): ?>
<script>
const PHP_USER_ID = <?= (int)$user['id'] ?>;
</script>
<?php endif; ?>

<script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
<script>
window.OneSignalDeferred = window.OneSignalDeferred || [];
OneSignalDeferred.push(async function (OneSignal) {
  try {
    // === 1. Инициализация ===
    await OneSignal.init({
      appId: "58cf71cb-ae3e-44fe-ac4d-9e5bffd3713c",
      notifyButton: { enable: true }
    });

    // === 2. Проверяем поддержку пушей ===
    if (!(await OneSignal.Notifications.isPushSupported())) {
      console.warn("Push notifications not supported on this device");
      return;
    }

    // === 3. Проверяем подписку ===
    const subscription = OneSignal.User.PushSubscription;

    if (!subscription.optedIn) {
      console.log("Пользователь ещё не подписан, выполняю opt-in...");
      await OneSignal.User.PushSubscription.optIn(); // создаёт подписку и playerId
    }

    // === 4. Ждём появления playerId ===
    let playerId = null;
    for (let i = 0; i < 10; i++) {
      playerId = OneSignal.User.PushSubscription.id;
      if (playerId) break;
      console.log("Жду playerId...");
      await new Promise(r => setTimeout(r, 500));
    }

    if (!playerId) {
      console.error("Не удалось получить playerId после opt-in");
      return;
    }

    console.log("Player ID:", playerId, "Token:", subscription.token);

    // === 5. Отправляем на сервер ===
    if (typeof PHP_USER_ID !== "undefined") {
      try {
        const response = await fetch('/save-user-id.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            playerId: playerId,
            userId: PHP_USER_ID,
            deviceId: navigator.userAgent
          })
        });
        console.log("Server response:", await response.json());
      } catch (err) {
        console.error("Ошибка при отправке playerId:", err);
      }
    }

    // === 6. Слушатели ===
    OneSignal.User.PushSubscription.addEventListener('change', e => {
      console.log("Subscription changed:", e);
    });

  } catch (err) {
    console.error("OneSignal init error:", err);
  }
});
</script>

</head>







<div class="container">
<div class="logo">
<img src="/logo.jpg" alt="Логотип игры" class="game-logo">
</div>



<style>
   .transparent50 {
    filter: alpha(Opacity=50);
    opacity: 0.5; 
   }
</style>
<?php










$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `id` = '1'"));
$t = microtime(1);

if(!$user['id']) {

if (isset($_SESSION['err'])){
?><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR"><?=$_SESSION['err']?></span></li></ul></div><?php
unset($_SESSION['err']);}
}else{


?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Добро пожаловать</title>
  <style>
    :root {
      --accent: #00e0ff;
      --gold: #ffd700;
      --bg-dark: #0f172a;
      --font-main: 'Orbitron', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: var(--font-main);
    }

    /* Оверлей затемнения */
    #welcome-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.6);
      z-index: 9998;
    }

    .welcome-message {
      max-width: 460px;
      width: 90%;
      background: #ffffff;
      border: 1px solid #ffce00;
      padding: 20px 20px 20px 20px;
      border-radius: 16px;
      box-shadow: 0 0 10px #ff9800;
      animation: fadeIn 0.6s ease;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 9999;
      color: #000;
    }

    .welcome-message a {
      color: #ff0000;
      text-decoration: underline;
      cursor: pointer;
    }

    .welcome-close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 20px;
      font-weight: bold;
      color: #000;
      cursor: pointer;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translate(-50%, -60%); }
      to { opacity: 1; transform: translate(-50%, -50%); }
    }
  </style>
</head>
<body>

<!-- Оверлей -->
<div id="welcome-overlay" style="display: none;"></div>

<!-- Окно приветствия -->
<div id="welcome" class="welcome-message" style="display: none;">
  <div class="welcome-close" id="welcome-close">&times;</div>
  👋 Добро пожаловать в <strong>Марсианские Бизнесмены</strong>!<br>
  Построй свой путь к космическому богатству 💰🚀<br><br>
  ℹ️ Прежде чем начать — загляни в раздел 
  <a href="/help/" id="welcome-help-link">Справка</a>, чтобы узнать, как всё работает.<br><br>
  Удачи, Коммандер! 🌌
</div>

<script>
  const welcomeEl = document.getElementById('welcome');
  const overlayEl = document.getElementById('welcome-overlay');
  const closeEl = document.getElementById('welcome-close');
  const helpLink = document.getElementById('welcome-help-link');

  // Показываем, если пользователь еще не отключал
  if (!localStorage.getItem('welcomeDismissed')) {
    welcomeEl.style.display = 'block';
    overlayEl.style.display = 'block';
  }

  function dismissWelcome() {
    localStorage.setItem('welcomeDismissed', '1');
    welcomeEl.style.display = 'none';
    overlayEl.style.display = 'none';
  }

  closeEl.addEventListener('click', dismissWelcome);
  helpLink.addEventListener('click', dismissWelcome);
</script>

</body>
</html>
<?





















require_once ('taimers.php');
require_once ('level_user.php');



$minDelay = 1000; // Минимальная задержка появления в миллисекундах (1 секунда)
$maxDelay = 1000; // Максимальная задержка появления в миллисекундах (1 секунда)
if($promotions['time_21'] >time()){
if($user['gorshok'] <time() and $_SERVER['PHP_SELF'] != '/bonus.php'){
?>
<!DOCTYPE html>
<html>
<head>
    <style>
.falling-image {
    position: absolute;
    top: -100px;
    left: -100px;
    transition: top 4s, left 4s, opacity 1s; /* Увеличение времени задержки для top и left до 4 секунд */
    z-index: 9999;
}

    </style>
</head>
<body>
    <a href="/bonus/" target="">
        <img class="falling-image" src="/images/rocket.png" width="90" height="60" alt="Falling Image">
    </a>

    <script>
        // Функция для генерации случайного числа в заданном диапазоне
        function getRandom(min, max) {
            return Math.random() * (max - min) + min;
        }

        // Функция для задержки появления и скрытия изображения после указанного времени
        function delayAppearance(minDelay, maxDelay) {
            var delay = getRandom(minDelay, maxDelay);

            setTimeout(function() {
                var image = document.querySelector('.falling-image');

                // Вычисляем случайные начальные позиции для изображения
                var screenWidth = window.innerWidth;
                var screenHeight = window.innerHeight;
                var randomX = Math.floor(Math.random() * (screenWidth - 200));
                var randomY = Math.floor(Math.random() * (screenHeight - 200));
                var randomSide = Math.floor(Math.random() * 8); // 0 до 7 для различных направлений

                switch (randomSide) {
                    case 0: // Верхний левый угол
                        image.style.top = '-100px';
                        image.style.left = randomX + 'px';
                        break;
                    case 1: // Верх
                        image.style.top = '-100px';
                        image.style.left = randomX + 'px';
                        break;
                    case 2: // Верхний правый угол
                        image.style.top = '-100px';
                        image.style.left = (randomX + screenWidth) + 'px';
                        break;
                    case 3: // Право
                        image.style.top = randomY + 'px';
                        image.style.left = (screenWidth + 100) + 'px';
                        break;
                    case 4: // Нижний правый угол
                        image.style.top = (randomY + screenHeight) + 'px';
                        image.style.left = (randomX + screenWidth) + 'px';
                        break;
                    case 5: // Низ
                        image.style.top = (screenHeight + 100) + 'px';
                        image.style.left = randomX + 'px';
                        break;
                    case 6: // Нижний левый угол
                        image.style.top = (randomY + screenHeight) + 'px';
                        image.style.left = randomX + 'px';
                        break;
                    case 7: // Лево
                        image.style.top = randomY + 'px';
                        image.style.left = '-100px';
                        break;
                }

                // Плавное появление изображения
                image.style.opacity = '1';

                setTimeout(function() {
                    moveImage();
                }, 1000);

                setTimeout(function() {
                    // Перемещение изображения за пределы экрана после задержки
                    var randomDirection = Math.floor(Math.random() * 4); // 0 до 3 для различных направлений
                    switch (randomDirection) {
                        case 0: // Верх
                            image.style.top = '-100px';
                            break;
                        case 1: // Право
                            image.style.left = (screenWidth + 100) + 'px';
                            break;
                        case 2: // Низ
                            image.style.top = (screenHeight + 100) + 'px';
                            break;
                        case 3: // Лево
                            image.style.left = '-100px';
                            break;
                    }
                    image.style.opacity = '0'; // Плавное исчезновение изображения
                }, 10000); // 10 секунд
            }, delay);
        }

        // Функция для перемещения изображения в случайное положение
        function moveImage() {
            var image = document.querySelector('.falling-image');
            var screenWidth = window.innerWidth;
            var screenHeight = window.innerHeight;
            var randomX = Math.floor(Math.random() * (screenWidth - 200));
            var randomY = Math.floor(Math.random() * (screenHeight - 200));

            image.style.left = randomX + 'px';
            image.style.top = randomY + 'px';
        }

        // Получаем значения из PHP и передаем их в JavaScript
        var minDelay = <?php echo $minDelay; ?>;
        var maxDelay = <?php echo $maxDelay; ?>;

        // Запуск анимации после загрузки страницы
        window.addEventListener('load', function() {
            delayAppearance(minDelay, maxDelay);
        });

        // Пересчитываем положение изображения при изменении размеров окна
        window.addEventListener('resize', function() {
            moveImage();
        });
    </script>
</body>
</html>
<?

}
}






















if($user['proverka'] == 1){
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
Подтвердите, что Вы не бот!
<div class="mt4"><a class="btni accept" href="?ok'.$user['proverka_time'].'"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?no'.$user['proverka_time'].'"><img src="/images/cross.png" alt="" width="24" height="24"> Не подтверждаю</a></div>
<hr>
<font color=black size=2>Подтвердите, пожалуйста, что вы не бот! В противном случае Ваш аккаунт может быть заблокирован.</font>
<br>
<font color=red size=2><span id="time_'.($user['proverka_time']-time()).'000">'._time($user['proverka_time']-time()).'</span></font>
</span></li></ul></div>';

if(isset($_GET['ok'.$user['proverka_time'].''])){
$text = 'Игрок '.nick($user['id']).' подтвердил, что он не бот за '.(60-($user['proverka_time']-time())).' сек.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");

mysql_query("UPDATE `users` SET `proverka` = '0', `proverka_time` = '0' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> Успешно!';
header('Location: ?');
exit();
}

if(isset($_GET['no'.$user['proverka_time'].''])){
$text = 'Игрок '.nick($user['id']).' отменил подтверждение, что он не бот за '.(60-($user['proverka_time']-time())).' сек.';
$con = mysql_result(mysql_query("SELECT COUNT(id) FROM `message_c` WHERE `kogo` = '1' and `kto` = '2' LIMIT 1"),0);
if($con == 0) {
mysql_query("INSERT INTO `message_c` SET `kto` = '2', `kogo` = '1', `time` = '".time()."', `posl_time` = '".time()."'");
mysql_query("INSERT INTO `message_c` SET `kto` = '1', `kogo` = '2', `time` = '".time()."', `posl_time` = '".time()."'");
}
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kogo` = '2' and `kto`='1' limit 1");
mysql_query("UPDATE `message_c` SET `posl_time`='".time()."' WHERE `kto` = '2' and `kogo`='1' limit 1");
mysql_query("INSERT INTO `message` SET `text` = '".$text."', `kto` = '2', `komy` = '1', `time` = '".time()."', `readlen` = '0'");
mysql_query("UPDATE `users` SET `proverka` = '0', `proverka_time` = '0' WHERE `id` = '".$user['id']."' limit 1");
$_SESSION['err'] = '<img src="/images/accept48.png" alt="" width="24" height="24"> Успешно!';
header('Location: ?');
exit();
}


}




?>
<script>


window.addEventListener('scroll', function () {
    const bar = document.querySelector('.status-bar');
    if (window.scrollY > 50) {
        bar.classList.add('fixed-status-bar');
    } else {
        bar.classList.remove('fixed-status-bar');
    }
});


</script>
<?




if($user['money'] < 0) {
    $balance = '0';
} else {
    $balance = ''.n_f($user['money']).'';
}
if($user['money'] == 1) {
    $doh = '1';
} else {
    $doh = ''.n_f($dohod).'';
}

echo '<div class="status-bar-placeholder"></div>
<div class="status-bar-container">
<div class="status-bar">
    <div class="status-item coins">
        <img src="/images/header/money_36.png" alt="Баланс" class="icon-left">
        <span class="balance-left"><font size=2%>'.$balance.'</font></span>
    </div>

    <div class="home-icon">
        <a href="/"><img src="/images/home.png" class="home-img"></a>
    </div>

    <div class="status-item bucks" style="padding-left: 1px;">
        <span class="balance-right"><font size=2%>'.$doh.' в сек</font></span>
        <img src="/images/header/money_36.png" alt="Доход" class="icon-right">
    </div>
</div>
</div>';












/* if ($_SERVER['PHP_SELF'] != '/user/menu.php' ) {
if ($_SERVER['PHP_SELF'] != '/ass/index.php' ) {
if ($_SERVER['PHP_SELF'] != '/user/mes.php' ) {
if ($_SERVER['PHP_SELF'] != '/word/pve_boy.php' ) {
if ($_SERVER['PHP_SELF'] != '/word/pve_log.php' ) {
if ($_SERVER['PHP_SELF'] != '/world/pve/buy.php' ) {
if ($_SERVER['PHP_SELF'] != '/world/pve_boy.php' ) {
if ($_SERVER['PHP_SELF'] != '/forum/topic.php' ) {	
if ($_SERVER['PHP_SELF'] != '/ass/otvet.php' ) { */	
echo '<div class="overlay">';
require_once ('Notification.php');

// Собираем все уведомления в массив
$notifications = [];

// Проверяем каждую сессию на наличие уведомлений
if (isset($_SESSION['ses'])) {
    $notifications[] = $_SESSION['ses'];
    unset($_SESSION['ses']);
}

if (isset($_SESSION['err'])) {
    $notifications[] = '<div class="description_ses_err"><div class="icon"><img width="24" height="24" alt="true" src="/images/cross.png" title="true"></div>' . $_SESSION['err'] . '</div>';
    unset($_SESSION['err']);
}

if (isset($_SESSION['ok'])) {
    $notifications[] = '<div class="description_ses_ok"><div class="icon"><img width="24" height="24" alt="true" src="/images/accept48.png" title="true"></div>' . $_SESSION['ok'] . '</div>';
    unset($_SESSION['ok']);
}

if (isset($_SESSION['bonus'])) {
    $notifications[] = '<div class="description_ses_bonus"><div class="icon"><img width="24" height="24" alt="true" src="/images/cross.png" title="true"></div>' . $_SESSION['bonus'] . '</div>';
    unset($_SESSION['bonus']);
}

if (isset($_SESSION['halloween_bon'])) {
    $notifications[] = '<div class="description_ses_bonus">' . $_SESSION['halloween_bon'] . '</div>';
    unset($_SESSION['halloween_bon']);
}

if (isset($_SESSION['chest'])) {
    $notifications[] = '<div class="description_ses_chest"><div class="icon"><img width="24" height="24" alt="true" src="/images/cross.png" title="true"></div>' . $_SESSION['chest'] . '</div>';
    unset($_SESSION['chest']);
}


// Конвертируем массив уведомлений в JSON для передачи в JavaScript
$notificationsJSON = json_encode($notifications);
?>
<script type="text/javascript" defer>
    // Из PHP передаем массив уведомлений в JavaScript
    var notifications = <?php echo $notificationsJSON; ?>;

    (function() {
        var tryAppend = function() {
            var overlay = document.querySelector('.overlay');
            if (!overlay) {
                // Если элемент ещё не отрендерен — повторить попытку через 10 мс
                return setTimeout(tryAppend, 10);
            }

            if (notifications && notifications.length > 0) {
                notifications.forEach(function(notification) {
                    var notificationElement = document.createElement("div");
                    notificationElement.innerHTML = notification;
                    overlay.appendChild(notificationElement);
                });
                //console.log("Уведомления обработаны:", notifications);
            } else {
                //console.log("Нет уведомлений или они пустые.");
            }
        };

        tryAppend();
    })();
</script>


<?
echo '</div>';



echo '<div class="overlay">';


if($user['vid']==0 and  $_SERVER['PHP_SELF'] != '/index.php' ){
echo '<div class="overlay_color">';
}elseif($user['vid']==1){
echo '<div class="overlay_color">';
}elseif($user['vid']==2){
echo '<div class="overlay_color">';
}

/* if ($_SERVER['PHP_SELF'] != '/index.php' && $_SERVER['PHP_SELF'] != '/rating/index1.php') {
echo '<div class="overlay_color">';
}else{
//echo '<div class="overlay">';
}
 */






//if($user['id'] == 1){
//echo ''.$_SERVER['PHP_SELF'].'';
//}

/* }
}
}
}
}
}
}
}
} */



}
?>