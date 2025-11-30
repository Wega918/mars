<?php
$title = 'Поиск';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']){
header('Location: /');
exit();
}

echo '<div class="bordered mt4" style="padding: 0 4px 4px 0;">';

echo '<div class="content">
<form class="mt4" id="id28" method="post" action="?okey"><div style="width:0px;height:0px;position:absolute;left:-100px;top:-100px;overflow:hidden"><input type="hidden" name="id28_hf_0" id="id28_hf_0"></div>
<label>
Имя игрока 
<input type="text" style="width: 99%" value="" name="login" maxlength="16" minlength="2">
</label>
<input type="submit" value="Найти" class="mt4">
</form>
</div></div>';



if (isset($_REQUEST['okey'])){
$login = strong($_POST['login']);

if(empty($login) or mb_strlen($login) > 20) {
$_SESSION['err'] =  'Ошибка ввода, макс. 20 симв.';
header('Location: ?');
exit();
}

$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `login` like '%".$login."%'"),0);
if ($k_post==0){
$_SESSION['err'] =  'По вашему запросу ничего не найдено';
header('Location: ?');
exit();
}

$q = mysql_query("SELECT * FROM `users` WHERE `login` like '%".$login."%' ORDER BY id DESC");
while ($ank = mysql_fetch_array($q)){
header('Location: '.$HOME.'igrok_'.$ank['id'].'/');
}
}


require_once ('system/footer.php');
?> 