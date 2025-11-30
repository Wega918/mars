<?php
$title = 'Восстановление пароля';
require_once ('../system/function.php');
require_once ('../system/header.php');
if($user['id']) {
header('Location: /');
exit();
}




//-----Если жмут submit(кнопку)-----//
if(isset($_REQUEST['true'])){
$login = strong($_POST['login']);
$email = strong($_POST['email']);
// Проверка на пустоту логина
if (empty($login)) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Поле "Логин" обязательно для ввода.</font>';
    exit();
}

// Проверка длины логина
if (mb_strlen($login) < 3 || mb_strlen($login) > 30) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Поле "Логин" должно содержать от 3 до 30 символов.</font>';
    exit();
}

// Проверка формата логина
if (!preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $login)) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Поле "Логин" должно содержать только Русские или Английские буквы, цифры.</font>';
    exit();
}

// Проверка на пустоту email
if (empty($email)) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Поле "Email" обязательно для ввода.</font>';
    exit();
}

// Проверка формата email
if (!preg_match('/[0-9a-z_\-]+@[0-9a-z_\-]+\.[a-z]{2,6}/i', $email)) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Поле "Email" заполнено не верно.</font>';
    exit();
}

// Проверка существования логина
$sqldb_login = mysql_fetch_array(mysql_query("SELECT `login` FROM `users` WHERE `login` = '".$login."' LIMIT 1"));
if (empty($sqldb_login)) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Пользователь с таким Логином не найден.</font>';
    exit();
}

// Проверка существования email
$sqldb_email = mysql_fetch_array(mysql_query("SELECT `email` FROM `users` WHERE `email` = '".$email."' LIMIT 1"));
if (empty($sqldb_email)) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Пользователь с таким Email-адресом не найден.</font>';
    exit();
}

// Проверка совпадения логина и email
$sqldb = mysql_fetch_array(mysql_query("SELECT `login`, `email` FROM `users` WHERE `login` = '".$login."' AND `email` = '".$email."' LIMIT 1"));
if (empty($sqldb)) {
    header('Location: ?');
    $_SESSION['err1'] = '<font color=#FFA500>Введенные данные не совпадают.</font>';
    exit();
}



function make_password($num_chars){
if ((is_numeric($num_chars)) && ($num_chars > 0) && (!is_null($num_chars))){
$password = ""; 
$accepted_chars="abcGdefghHiFXZBVNPERRGjklmnUopqGGFGrstHuvwKxyzl234567890"; 
if (necessary.srand(((int)((double)microtime()*100000000000003)))); 
for ($i= 0; $i < $num_chars; $i++){ 
$random_number = rand(0, (strlen($accepted_chars)-1)); $password .= $accepted_chars[$random_number]; 
} 
return $password; 
} 
} 
$dlina=8; //количество символов в пароле 
$rou = make_password($dlina); 


mysql_query("UPDATE `users` SET `passw` = '".$rou."', `pass` = '".md5(md5(md5($rou)))."' WHERE `login` = '".$login."'");


$msg = 'Здравствуйте, '.$login.'!

Ваши новые данные для авторизации на сайте:
-------------------------
Логин: '.$login.'
Пароль: '.$rou.'
-------------------------

С Уважением, MARS-GAMES.RU !
Служба поддержки: support@mars-games.ru

Время заявки: '.date("Y-m-d H:i:s").'
Устройство: '.strong($_SERVER['HTTP_USER_AGENT']).'
IP устройства: '.strong($_SERVER['REMOTE_ADDR']).' ';


    // Получаем данные из формы и предотвращаем XSS
    $to = filter_var($email, FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars('Восстановление пароля', ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');

    // Проверка email
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        die('Ошибка: некорректный email получателя');
    }


// Заголовки письма
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$headers .= "From: support@mars-games.ru\r\n";
$headers .= "Reply-To: support@mars-games.ru\r\n";
$headers .= "List-Unsubscribe: <mailto:support@mars-games.ru?subject=unsubscribe>\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . "\r\n";
$headers .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2800.1441\r\n";
$headers .= "X-Priority: 3\r\n";  // Низкий приоритет

mail($to, $subject, $message, $headers);

header('Location: ?');
$_SESSION['err1'] = '<font color="white">На указанный Email-адрес <b>'.$email.'</b> было выслано письмо с Вашими новыми регистрациоными данными. 
<br> <div class="mt4"></div>(<b><u>Проверяйте папку "Спам"!</u></b>)</font>';
exit();
}





?>


<body>
    <div class="container">
        <div class="logo">
            <img src="/logo.jpg" alt="Логотип игры" class="game-logo">
        </div>

<div class="overlay_start">
    <div class="title">Онлайн игра Марс</div>
</div>


        <div class="overlay">
<style>
.overlay {
 text-align: center; 
</style>

            <?php
            if (isset($_SESSION['err1'])) {
                echo '<div class="description">'.$_SESSION['err1'].'</div>';
                unset($_SESSION['err1']); // Удаляем сообщение после отображения
            }
            ?>
            <div class="description">
                <div class="auth-title">Восстановление пароля</div>
                <div class="buttons">
                    <form action="?true" method="POST" class="form">
                        <input type="text" name="login" class="input" placeholder="Логин" requi#FFA500>
                        <input type="email" name="email" class="input" placeholder="email" requi#FFA500>
                        <button type="submit" class="btn" name="submit">Восстановить</button>
                    </form>
                </div>
            </div>
        </div>
		
        <div class="overlay">
<a class="btnl mt4" href="/">Назад</a>
        </div>
		
    </div>
</body>
<?





require_once ('../system/footer.php');
?>