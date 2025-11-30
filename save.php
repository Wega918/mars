<?php
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']){
    header('Location: /');
    exit();
}

if($user['login'] == 'Гость'){
    echo '<body><table style="width:100%;" cellspacing="0" cellpadding="0">
    <tbody><tr><td style="padding:0 1px 0 0;"></td><td style="width: 52px;">
    </td></tr></tbody></table><div class="center"></div><div></div>
    <div><img src="/images/index/start_logo.jpg" alt="" style="width:100%; border-radius: 8px;"></div><div></div></body><br>';

    echo '<div class="bordered mt4"><center>
    <form method="POST" action="">
    Ник: <br><input type="text" name="login" maxlength="16" style="width:95%;"/><br>
    Пароль: <br><input type="password" name="pass" maxlength="20" style="width:95%;"/><br>

    Пол<br><select style="width: 95%;" name="sex">
    <option selected="selected" value="1">Мужской</option>
    <option value="2">Женский</option>
    </select><br>

    E-Mail: <br><input type="text" name="email" maxlength="40" style="width:95%;"/><br>';

    echo '<div class="minor mt4">E-mail необходим для восстановления пароля. Если Вы не укажете, или укажете неверно, то восстановление пароля будет невозможно.</div><br>
    <input type="submit" name="reg" value="Зарегистрироваться"></form></div></center>';

    //-----Если жмут submit(кнопку)-----//
    if(isset($_REQUEST['reg'])){
        $login = strong($_POST['login']);
        $sex = strong($_POST['sex']);

        if(empty($login)){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Вы не ввели ник!</font>';
            exit();
        }

        // Проверка на дефис в логине
        if (strpos($login, '-') !== false) {
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Ник не может содержать дефис!</font>';
            exit();
        }

        if (!preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $login)){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Только русские или английские буквы, цифры!</font>';
            exit();
        }

        if(mb_strlen($login) > 16 or mb_strlen($login) < 3){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Введите ник от 4 до 16 символов!</font>';
            exit();
        }

        if(mysql_result(mysql_query("SELECT COUNT(*)  FROM `users` WHERE `login` = '".$login."'"), 0) == true){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Такой ник уже существует!</font>';
            exit();
        }

        $sql1 = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `login` = '".$login."'"); 
        if(mysql_result($sql1, 0) > 0){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Такой ник уже существует!</font>';
            exit();
        }

        $pass = strong($_POST['pass']);
        if(empty($pass)){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Вы не ввели свой пароль!</font>';
            exit();
        }

        if (!preg_match("#^([A-zА-я0-9\-\_\ ])+$#ui", $pass)){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Пароль должен содержать только русские или английские буквы, цифры!</font>';
            exit();
        }

        if(mb_strlen($pass) > 25 or mb_strlen($pass) < 5){
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = 'Введите пароль от 5 до 25 символов!</font>';
            exit();
        }

        $email = strong($_POST['email']);
        if (!preg_match('/[0-9a-z_\-]+@[0-9a-z_\-^\.]+\.[a-z]{2,6}/i', $email)) {
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Формат e-mail введён не верно!</font>';
            exit();
        }

        $sqlemail = mysql_query("SELECT COUNT(`id`) FROM `users` WHERE `email` = '".$email."'"); 
        if (mysql_result($sqlemail, 0) > 0) {
            header('Location: '.$HOME.'save/');
            $_SESSION['err'] = '<font color=red>Такой e-mail уже существует!</font>';
            exit();
        }

        mysql_query("UPDATE `users` SET `rubin` = '".($user['rubin']+1000)."', `login` = '".$login."', `pass` = '".md5(md5(md5($pass))).
        "', `sex` = '".$sex."', `email` = '".$email."' WHERE `id` = '$user[id]' LIMIT 1");

        mysql_query("UPDATE `users` SET `passw` = '".$pass."' WHERE `id` = '".$user['id']."' limit 1");
        $pass = md5(md5(md5($pass)));
        setcookie('uslog', $login, time()+86400*31, '/');
        setcookie('uspass', $pass, time()+86400*31, '/');
        header('Location: '.$HOME.'');
        $_SESSION['ok'] = 'Добро пожаловать на Марс!';
        exit();
    }
} else {
    header('Location: '.$HOME.'');
    $_SESSION['err'] = 'Ошибка';
    exit();
}
?> 