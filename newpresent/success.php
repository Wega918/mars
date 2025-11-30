<?php
include '../system/config.php';
include '../system/function.php';
include '../system/header.php';  
if(!isset($user)){
echo "Только для зарегестрированых";
}else{
header('Location: '.$HOME.'newpresent/');
$_SESSION['err'] = '<font color=green><b>Платеж выполнен!</b></font>';
exit();
}
include '../system/footer.php';
?>