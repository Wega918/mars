<?php
if($cup_us['level'] == 1){ $cupp = 10;}
elseif($cup_us['level'] == 2){ $cupp = 10;}
elseif($cup_us['level'] == 3){ $cupp = 15;}
elseif($cup_us['level'] == 4){ $cupp = 15;}
elseif($cup_us['level'] == 5){ $cupp = 20;}
elseif($cup_us['level'] == 6){ $cupp = 20;}
elseif($cup_us['level'] == 7){ $cupp = 25;}
elseif($cup_us['level'] == 8){ $cupp = 25;}
elseif($cup_us['level'] == 9){ $cupp = 30;}
elseif($cup_us['level'] == 10){ $cupp = 30;}
elseif($cup_us['level'] == 11){ $cupp = 35;}
elseif($cup_us['level'] == 12){ $cupp = 35;}
elseif($cup_us['level'] == 13){ $cupp = 40;}
elseif($cup_us['level'] == 14){ $cupp = 40;}
elseif($cup_us['level'] == 15){ $cupp = 45;}
elseif($cup_us['level'] == 16){ $cupp = 45;}
elseif($cup_us['level'] == 17){ $cupp = 50;}
elseif($cup_us['level'] == 18){ $cupp = 50;}
elseif($cup_us['level'] == 19){ $cupp = 55;}
elseif($cup_us['level'] == 20){ $cupp = 55;}
elseif($cup_us['level'] == 21){ $cupp = 60;}
elseif($cup_us['level'] == 22){ $cupp = 65;}
elseif($cup_us['level'] == 23){ $cupp = 70;}
elseif($cup_us['level'] == 24){ $cupp = 75;}
elseif($cup_us['level'] == 25){ $cupp = 80;}


if($user['vip_pay'] == 1 ){
$cup = ceil($cupp/2);
}else{
$cup = $cupp;
}

$cup_progress = round(100/($cup/$cup_us['cup']));
if($cup_progress > 100) {$cup_progress = 100;}
?>