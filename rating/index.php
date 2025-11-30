<?php
$title = 'Рейтинг по доходу';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}

echo '<a class="btnl mt4" href="'.$HOME.'rating/10/"><img width="24" alt="" height="24" src="/images/header/money_36.png"> По <span>доходу</span></a>';
echo '<a class="btnl mt4" href="'.$HOME.'rating/1/"><img width="24" alt="" height="24" src="/images/header/money_36.png"> По <span>самому прибыльному бизнесу</span></a>';
echo '<a class="btnl mt4" href="'.$HOME.'rating/2/"><img width="24" alt="" height="24" src="/images/header/money_36.png"> По <span>коллекциям</span></a>';
echo '<a class="btnl mt4" href="'.$HOME.'rating/3/"><img width="24" alt="" height="24" src="/images/angel48.png"> По <span>бизнес-ангелам</span></a>';
echo '<a class="btnl mt4" href="'.$HOME.'rating/4/"><img src="/images/corp2.png" width="24" height="24"> Рейтинг Корпораций</a>';
echo '<a class="btnl mt4" href="'.$HOME.'rating/5/"><img src="/images/soyz2.png" width="24" height="24"> Рейтинг Союзов</a>';
echo '<a class="btnl mt4" href="'.$HOME.'rating/6/"><img src="/images/clock.png" alt="$" width="24" height="24"> Рейтинг активности</a>';

if($promotions['promotion_12'] == 1){
if($promotions['act_12'] == 1){$trtr = 'тыкв';$dsds = '';}
if($promotions['act_12'] == 2){$trtr = 'игрушек';$dsds = '_';}
if($promotions['act_12'] == 3){$trtr = 'сувениров';$dsds = '__';}
echo '<a class="btnl mt4" href="'.$HOME.'rating/7/"><img src="/Halloween/images/'.$dsds.'4.png" width="25" height="30"> Рейтинг '.$trtr.'</a>';
}
echo '<a class="btnl mt4" href="'.$HOME.'rating/8/"><img src="/world/images/u.png" width="22" height="22"> Рейтинг параметров</a>';
echo '<a class="btnl mt4" href="'.$HOME.'rating/9/"><img width="24" alt="" height="24" src="/images/garden/leaf.png"> Рейтинг листочков фермы</a>';

echo '</body>';


require_once ('../system/footer.php');
?>