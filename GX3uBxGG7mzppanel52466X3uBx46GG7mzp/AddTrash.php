<?php
$title = 'Создание мусора';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}








require_once ('../system/footer.php');
?>