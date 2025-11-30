<?php
echo '<div class="content">
<a class="fl"><img width="25" height="45" src="/images/index/left_grey.png"></a>
<a class="fr" href="'.$HOME.'Lottery/"><img width="25" height="45" src="/images/index/right_orange.png" alt="Лотерея" title="Лотерея"></a>
<div class="center"><a class="btnl" style="display: inline-block;min-width: 220px; background-color: #2b577f;" id="id28" href="'.$HOME.'menu/"><span>Меню '.$notifikations.'</span></a></div>
<div class="cb"></div><div style="margin-top: 4px;"></div></div>';





if ($user['zapret_1'] == 0){
if ($user['biznes'] >= 2){
echo '<center><a class="btni" style="min-width:160px;margin:4px;" href="?AutoBuy"><span><span>Автопрокачка</span></span></a>';
}
}


//#######################################################################################################################################################
$users = mysql_query("SELECT * FROM `biznes` where `id` = '".($user['biznes'] +1)."' ORDER BY `cena` DESC ");
while($q = mysql_fetch_assoc($users)){


if(isset($_GET['new_room'])){
if($q['id'] == ($user['biznes'] - 1)){
header('Location: ?');
exit();
} else {
// Преобразуем значения в строковый формат
$user_money = toBC($user['money']);
$q_cena = toBC($q['cena']);
$dohod = toBC($q['dohod']);
$user['dohod'] = toBC($user['dohod']);
// Проверка, хватает ли денег для покупки
if (bccomp($user_money, $q_cena, 10) < 0) { // Если денег меньше цены
    header('Location: ?');
    $_SESSION['err'] = '<font color=red>Ошибка! Не хватает монет!</font> <br>
        <a href="'.$HOME.'menu/">Купить</a>';
    exit();
}


// Преобразуем все значения в строки для работы с BCMath

// Добавляем новый бизнес пользователю
$insert_query = "INSERT INTO `user_biznes_1` 
    SET `name` = '".$q['name']."', 
        `images` = '".$q['images']."', 
        `dohod` = '".$dohod."', 
        `cena` = '".$q_cena."', 
        `biznes_dohod` = '".$dohod."', 
        `user` = '".$user['id']."', 
        `id_room` = '".($user['biznes'] + 1)."' ";
mysql_query($insert_query);

// Обновляем данные пользователя (снова используем BCMath для всех полей)
$new_dohod = bcadd($user['dohod'], $dohod);  // Новый доход (суммируем с текущим доходом)
$new_money = bcsub($user_money, $q_cena);    // Уменьшаем деньги (вычитаем цену)

// Выполняем обновление
$update_query = "UPDATE `users` SET 
    `dohod` = '".$new_dohod."', 
    `biznes` = '".($user['biznes'] + 1)."', 
    `money` = '".$new_money."'
    WHERE `id` = '".$user['id']."' LIMIT 1";
mysql_query($update_query);

            // Перенаправляем и уведомляем пользователя
            header('Location: ?');
            $_SESSION['err'] = $q['name'].' успешно куплен!';
            exit();
        }
}



if ($user['zapret_1'] == 1){
$zapret = '<center>';
}
if ($user['biznes'] < 2){
$zapret = '<center>';
}

if ($user['biznes'] <= 1){
$txt = '<font color=red>Купите новый бизнес!</font>';
}else{
$txt = 'Новый бизнес';
}

echo ''.$zapret.'<a class="btni" style="min-width:160px;margin:4px;" href="?new_room"><span><span>'.$txt.' <img src="/images/header/money_36.png" alt="$" width="16" height="16"><span> '.n_f($q['cena']).'</span></span></span></a>';
/* if ($user['biznes'] >=15){
echo '<a class="btni" style="min-width:160px;margin:4px;" href="?new_room1"><span><span>'.$txt.' <img src="/images/ruby.png" alt="$" width="16" height="16"><span> '.n_f($user['biznes']*20000).'</span></span></span></a></center>';
} */
echo '<center>';
}
//#######################################################################################################################################################




if (empty($user['max'])) $user['max']=10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `user_biznes_1` WHERE `user` = '".$user['id']."'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$users = mysql_query("SELECT * FROM `user_biznes_1` where `user` = '".$user['id']."' ORDER BY `id` DESC LIMIT $start, $max");
while($q = mysql_fetch_assoc($users)){
	
echo'<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="small tbrown" style="position:absolute; top: 0; right: 0">
 <span><font size=1>доход <img src="/images/header/money_36.png" alt="$" width="16" height="16"> '.n_f($q['biznes_dohod']).' в сек</font></span>
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">'.n_f($q['raz_kach']).' <font size=1>ур.</font></span>
</div><div style="display: inline;" class="fl">
<a class="left" style="display: inline-block;">
<img src="/images/biznes/room_'.$q['images'].'.jpg" alt="Войти" width="64" height="64">
</a><div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>'.$q['name'].'</span></div>
<div>';






//#######################################################################################################################################################
// Преобразуем переменные в строковое представление с помощью toBC
$q['cena'] = toBC($q['cena']);
$user['money'] = toBC($user['money']);

// Далее выполняем вычисления
if (bccomp($q['raz_kach'], '50') >= 0) { // Используем bccomp для сравнения с 50
    $mon = bcdiv(bcmul($q['raz_kach'], $q['raz_kach'], 0), '2', 0); // Умножаем raz_kach на raz_kach, затем делим на 2
    $userMoney1 = bcadd(bcmul($q['cena'], $q['raz_kach'], 0), $mon); // Суммируем cena * raz_kach и mon
} else {
    $userMoney1 = bcmul($q['cena'], $q['raz_kach'], 0); // Просто умножаем cena на raz_kach
}

// Проверяем, достигнут ли максимальный уровень
if (bccomp($q['raz_kach'], $sql['max_lvl_biz']) >= 0) {
echo '<span class="btni" style="margin-top: 4px; width: 130px;" id="id6578">Вложить <img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($userMoney1).'</span></span>';
} else {
    // Если денег недостаточно для выполнения операции
    if (bccomp($user['money'], $userMoney1) < 0) {
 echo '<span class="btni" style="margin-top: 4px; width: 130px;" id="id6578">Вложить <img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($userMoney1).'</span></span>';
} else {
echo'<a class="btni" href="'.$HOME.'x1/'.$q['id'].'/'.$page.'/" style="margin-top: 4px; width: 130px;" id="id3198">Вложить <img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($userMoney1).'</span></a>';
 }
}
//#######################################################################################################################################################







echo'</div></div></div><div class="cb"></div></div>';





}
if ($k_page > 1) {
echo str(''.$HOME.'?',$k_page,$page); // Вывод страниц
}

?> 