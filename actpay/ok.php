<?php
include '../system/config.php';
include '../system/function.php';
include '../system/header.php';  
if(!isset($user)){
echo "Только для зарегестрированых";
}else{


$ang___ = mysql_query("SELECT * FROM `users` WHERE `premium` = '0' ORDER BY `angel` + `id` DESC LIMIT 1");
while($ang__ = mysql_fetch_assoc($ang___)){
$angell_ = ($ang__['angel']/4);
}

header('Location: '.$HOME.'');
$_SESSION['err'] = '<font color=green><b>Платеж выполнен!</b> <br> Получено <img src="/images/angel48.png" alt="$" width="25" height="25"> бизнес-ангелов <font color="black">'.n_f($angell_).'</font> </font>';
exit();
}
include '../system/footer.php';
?>