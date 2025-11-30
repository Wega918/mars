<?php
require_once ('../system/function.php');
require_once ('../system/header.php');

if ($user['id']) {
    header('Location: /');
    exit();
}

$mult = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `ip` = '".strong($_SERVER['REMOTE_ADDR'])."' "), 0);

// Cloudflare Turnstile секретный ключ (замени на свой)
$turnstile_secret = '0x4AAAAAABgrOxFOs-yAgOChyDd1VllSHcg';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cf-turnstile-response'])) {
    $token = $_POST['cf-turnstile-response'];
    $remote_ip = $_SERVER['REMOTE_ADDR'];

    $verify_response = file_get_contents('https://challenges.cloudflare.com/turnstile/v0/siteverify', false, stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query([
                'secret'   => $turnstile_secret,
                'response' => $token,
                'remoteip' => $remote_ip
            ])
        ]
    ]));

    $captcha_result = json_decode($verify_response, true);

    if (!isset($captcha_result['success']) || !$captcha_result['success']) {
        echo "<div class='overlay'><div class='description'><font color='red'>Ошибка капчи. Попробуйте снова.</font></div></div>";
        exit();
    } else {
        $_SESSION['otvet_user'] = 1; // Успешная капча
    }
}
?>
<body>
<center><div class="overlay"><div class="title">Онлайн игра Марс</div></div></center>

<?php
// Если капча не пройдена, показываем форму Turnstile
if (empty($_SESSION['otvet_user']) || $_SESSION['otvet_user'] != 1) {
?>
<div class="overlay">
    <div class="description" style="text-align: center;">
        <style>
            .auth-title {
                text-align: center;
                margin-bottom: 15px;
                font-weight: bold;
                font-size: 20px;
                color: white;
            }
            .start-btn {
                display: inline-block;
                padding: 10px 40px;
                font-size: 18px;
                font-family: 'Russo One', sans-serif;
                color: #fff;
                background: linear-gradient(45deg, #ff5722, #ff9800);
                border: none;
                border-radius: 50px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                cursor: pointer;
                transition: all 0.3s ease;
                margin-top: 15px;
            }
            .start-btn:hover {
                box-shadow: 0 0 20px #ff9800;
            }
            .cf-turnstile {
                margin: 0 auto;
                display: inline-block;
            }
        </style>
        <div class="auth-title">Подтвердите что вы не робот</div>
        <form method="POST">
            <div class="cf-turnstile" data-sitekey="0x4AAAAAABgrOz68iJtS7HNQ"></div><br>
            <button type="submit" class="start-btn">Подтвердить</button>
        </form>
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    </div>
</div>
<?
    exit(); // Прекращаем вывод дальше, пока капча не пройдена
}

// Если капча пройдена — создаём гостя

$sex = rand(1, 2);
$pass = rand(1000000000, 9000000000);
$viz = time() + 1800;
$login = 'Гость';

if ($mult >= 1) {
    mysql_query("INSERT INTO `users` SET `login` = 'Гость', `passw` = '$pass', `pass` = '" . md5(md5(md5($pass))) . "', `sex` = '$sex', `datareg` = '" . time() . "', `level` = '0', `viz` = '$viz', `last_update` = '" . time() . "', `rubin` = '1000', `money` = '1', `biznes` = '1'");
} else {
    mysql_query("INSERT INTO `users` SET `login` = 'Гость', `passw` = '$pass', `pass` = '" . md5(md5(md5($pass))) . "', `sex` = '$sex', `datareg` = '" . time() . "', `level` = '0', `viz` = '$viz', `last_update` = '" . time() . "', `rubin` = '100000', `money` = '1', `biznes` = '1'");
}

$uid = mysql_insert_id();

mysql_query("INSERT INTO `user_biznes_1` SET `name` = 'Космопорт', `images` = '1', `dohod` = '1', `cena` = '1', `biznes_dohod` = '1', `user` = '$uid', `id_room` = '1'");

if ($uid == 1) {
    mysql_query("UPDATE `users` SET `level` = '3' WHERE `id` = '1'");
}

mysql_query("INSERT INTO `time_delete` SET `user` = '$uid', `time` = '" . (time() + 7200) . "'");

$_SESSION['otvet_user'] = 0; // Сбросим, чтобы на следующий раз капча снова требовалась

?>

<style>
.start-btn {
    text-align: center;
    display: inline-block;
    padding: 5px 50px;
    font-size: 24px;
    font-family: 'Russo One', sans-serif;
    color: #fff;
    background: linear-gradient(45deg, #ff5722, #ff9800);
    text-decoration: none;
    border-radius: 50px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    transition: all 0.5s ease;
    position: relative;
    overflow: hidden;
}
</style>

<div class="overlay">
    <div class="description"><font color=white>
    🚀 Вы прибыли на Марс! Добро пожаловать!<br>
    Здесь каждый кирпич и каждый шаг — это вклад в будущее человечества.<br>
    🌌 Делайте великие дела и превращайте суровый мир в процветающий оазис!
    </font></div>
</div>
<br>
<div class="overlay">
    <a class="btnl mt4" href="/autolog.php?ulog=<?= $login ?>&upas=<?= $pass ?>">Далее</a>
</div>

</body>
