<?php
include '../system/config.php';
include '../system/function.php';
include '../system/header.php';  
if(!isset($user)){
echo "Только для зарегестрированых";
}else{
header('Location: '.$HOME.'');
$_SESSION['err'] = '<font color=green><b>Платеж выполнен!</b> <br> ViP награда будет активна еще: <img src="/images/clock.png" alt="через" width="24" height="24"> 
<font size=2 color=black><span id="time_'.($sql['time_mis_turnir']-time()).'000">'._time($sql['time_mis_turnir']-time()).'</span></font></font>';
exit();
}
include '../system/footer.php';
?>