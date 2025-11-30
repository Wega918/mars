<?php
$title = 'Админ панель';
require_once ('../system/function.php');
require_once ('../system/header.php');

if(!$user['id'] or $user['id'] != 1) {
    header('Location: '.$HOME.'');
    exit();
}

// список id
$ids = "9,5,12,17,50,51,47,44,264,285,267,63,68,289,305,242,250,356,348,310,244,269,153,312,87,293,255,
328,188,206,187,261,246,254,241,249,263,275,316,253,278,257,254,261,318,241,290,263,295,275,251,299,314,
340,152,370,80,313,239,519,418";

// выборка
$q = mysql_query("SELECT `id`,`rubin`,`corp`,`soyz`,`browser` FROM `users` WHERE `id` IN ($ids) ORDER BY id ASC");

echo '<h2>Список выбранных игроков</h2>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr><th>#</th><th>Игрок</th><th>Рубины</th><th>Кп</th><th>Союз</th><th>Смс</th><th>КТО</th></tr>';

$i = 1; // счетчик

while ($row = mysql_fetch_assoc($q)) {
	if($row['rubin']<1000000){
	mysql_query("UPDATE `users` SET `rubin`='1000000' WHERE `browser`='bot' and `id`={$row['id']}");
	}
    $holl_mail = ''; // сброс
    $cp = '';        // сброс
    $soyz = '';      // сброс
    $bot = '';       // сброс

    $holl = mysql_result(mysql_query("SELECT COUNT(id) FROM `message` WHERE `komy` = '".$row['id']."' and `readlen` = '0'"),0);
    if($holl > 0){
        $holl_mail = '<font color=red>'.$holl.'</font>';
    }

    $k_post_cp = mysql_result(mysql_query("SELECT COUNT(*) FROM `Invitations` WHERE `ank_user` = '".$row['id']."'"),0);
    if($k_post_cp > 0){
        $cp = '<font color=red>'.$k_post_cp.'</font>';
    }

    $k_post_soyz = mysql_result(mysql_query("SELECT COUNT(*) FROM `Invitations_soyz` WHERE `ank_user` = '".$row['id']."'"),0);
    if($k_post_soyz > 0){
        $soyz = '<font color=red>'.$k_post_soyz.'</font>';
    }


if($row['browser']=='bot'){
    $bot = 'BOT';
} else {
$bot = '<a href="?change_ip='.$row['id'].'" style="color:red; font-weight:bold;">USER</a>';


}
if (isset($_GET['change_ip'])) {
    $userIdToChange = (int)$_GET['change_ip'];
    if ($userIdToChange === (int)$row['id']) {
        mysql_query("UPDATE `users` SET `browser`='bot' WHERE `id`={$userIdToChange}");
        $_SESSION['ok'] = 'Успешно!';
        header('Location: ?');
        exit();
    }
}
    echo '<tr>';
    echo '<td>'.$i.'</td>'; // вывод номера
    echo '<td>'.nick($row['id']).'</td>';
    echo '<td>'.n_f($row['rubin']).'</td>';
    echo '<td>'.$row['corp'].' '.$cp.'</td>';
    echo '<td>'.$row['soyz'].' '.$soyz.'</td>';
    echo '<td>'.$holl_mail.'</td>';
    echo '<td>'.$bot.'</td>';
    echo '</tr>';

    $i++; // увеличиваем счетчик
}
echo '</table>';

echo '<br><a class="btnl mt4" href="/GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>
