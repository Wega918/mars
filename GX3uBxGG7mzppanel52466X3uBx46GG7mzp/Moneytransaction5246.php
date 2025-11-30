<?php
$title = 'Перевод средств';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}

$id = abs(intval($_GET['id']));
$ank = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($id)."'"));

if($ank == 0){
$_SESSION['err']='Такого пользователя не существует!';
header ('Location: /');
exit();
}
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
if($id == $user['id']){
$_SESSION['err']='Перевод самому себе запрещен!';
header ('Location: /');
exit();
}


echo '<a class="btnl mt4" href="'.$HOME.'MusorTransaction/'.$id.'/"><img src="/images/header/money_36.png" width="24" height="24" alt="" title=""> Перевод коллекций</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Transaction5246/'.$id.'/"><img src="/images/ruby.png" width="24" height="24" alt="" title=""> Перевод рубинов</a>';
echo '<a class="btnl mt4" href="'.$HOME.'Moneytransaction5246-/'.$id.'/"><img src="/images/angel48.png" width="24" height="24" alt="" title=""> Перевод ангелов</a>';
echo '<a class="btnl mt4" href="'.$HOME.'cardtransaction5246/'.$id.'/"><img src="/images/card/7.png" width="24" height="24" alt="" title=""> Перевод карт </a>';


echo '<br><a class="btnl mt4" href="'.$HOME.'igrok_'.$id.'/">Назад</a>';
require_once ('../system/footer.php');
?>