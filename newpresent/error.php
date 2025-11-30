<?php
include '../system/config.php';
include '../system/function.php';
include '../system/header.php';  

      
if(!isset($user)){
echo "Только для зарегестрированых";
}else{
header('Location: '.$HOME.'newpresent/');
$_SESSION['err'] = 'При оплате произошла ошибка! Попробуйте пожалуйста еще раз!';
exit();
}
include '../system/footer.php';
?>