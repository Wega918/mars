<?php
//if($user['id'] < 4){
//#############################################################################################################################


$q = mysql_fetch_assoc(mysql_query("SELECT * FROM `biznes` WHERE `id`  = '".($user['biznes'] +1)."'"));





echo '<br>';


 echo '
<style>
    .logoBiz {
        position: relative; /* Относительное позиционирование для родителя */
        width: 85%;
        height: 15%;
    }

    .game-logoBiz {
        width: 97%;
        height: 100%;
        object-fit: cover; /* Заполняет контейнер, сохраняя пропорции */
        border-radius: 1px;
    }

    .overlay-image {
        position: absolute; /* Абсолютное позиционирование относительно .logoBiz */
        top: -5px; /* Немного выше основной картинки */
        left: 50%;
        transform: translateX(-50%); /* Центровка изображения по горизонтали */
        width: 100%; /* Устанавливаем размер второго изображения */
        height: auto; /* Сохраняем пропорции */
        z-index: 10; /* Ставим его выше основного логотипа */
    }
    .additional-overlay {
        position: absolute;
        top: 58%;
        left: 29%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: auto;
        z-index: 15;
    }

    .additional-overlay-two {
        position: absolute;
        top: 57%;
        left: 29%;
        transform: translate(-50%, -50%);
        width: 47%;
        height: 67%;
        border-radius: 0px;
        border-top-left-radius: 14px;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 30px;
        border-bottom-left-radius: 30px;
        object-fit: cover;
        z-index: 5;
    }

    .additional-overlay-three {
        position: absolute;
        top: 40%;
        left: 77%;
        transform: translate(-50%, -50%);
        width: 25%;
        height: auto;
        z-index: 10;
    }

    /* Стиль для текста и изображения */
    .text-overlay {
		position: absolute;
        display: inline-flex; /* Включаем inline-flex для горизонтального размещения */
		
		top: 47%; /* Центрируем по вертикали */
        left: 41%; /* Центрируем по горизонтали */
        transform: translate(-50%, -50%);
        
		align-items: center; /* Центрируем изображение и текст по вертикали */
        color: #343434;
        font-size: 100%; /* Размер текста */
        font-weight: bold;
        z-index: 20; /* Текст выше изображения */
    }
	
    .text-overlay img {
        margin-right: 2px; /* Отступ между картинкой и текстом */
        width: 30%; /* Устанавливаем фиксированную ширину для изображения */
    }




.additional-overlay-one {
    position: absolute;
    top: 31%;
    left: 28%;
    transform: translate(-50%, -50%);
    width: 20%;
    height: auto;
    z-index: 21;
}

.text-overlay-one {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #252525;
    font-size: 100%;
    font-weight: bold;
    z-index: 20;
    display: inline-flex; /* Ставим inline-flex для расположения в одну строку */
    align-items: center; /* Центрируем по вертикали */
}

.text-overlay-one span {
    margin-left: 5px; /* Добавляем отступ между текстом и уровнем */
}







.link-container {
    position: absolute;
    top: 88%;
    left: 78%;
    transform: translate(-50%, -50%);
    width: 45%;
    height: 45%;
    display: flex;
    gap: 5px;
}

    .link {
    width: 40%;
    height: 50%;
        background-color: #007bff;
        border-radius: 5px;
        display: flex; /* Используем flex для центрирования */
        justify-content: center; /* Центрируем текст по горизонтали */
        align-items: center; /* Центрируем текст по вертикали */
        text-decoration: none;
        color: white; /* Цвет текста */
        font-weight: bold;
        font-size: 14px;
    }
	
	
	
.link_of {
    width: 40%;
    height: 50%;
    background-color: #b5b5b5;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    color: white;
    font-weight: bold;
    font-size: 14px;
}

    .number-overlay {
        position: absolute; /* Абсолютное позиционирование относительно .overlay-image */
        top: 6%; /* Центрирование по вертикали */
        left: 0%; /* Расположим элемент на левой части .overlay-image */
        transform: translateY(-50%); /* Центровка по вертикали */
        width: 13%; /* Ширина блока с номером */
        height: 30%; /* Высота блока с номером */
        background-image: url("/images/newDiz/55.png"); /* Используем изображение как фон */
        background-size: cover; /* Заполняет блок изображением */
        background-position: center; /* Центрируем изображение */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 20; /* Элемент будет над другими */
        font-size: 18px; /* Размер текста */
        font-weight: bold;
        color: #000000ad; /* Цвет текста */
    }

    .business-name {
        position: absolute; /* Абсолютное позиционирование для названия бизнеса */
        top: 7%; /* Центрирование по вертикали */
        left: 15%; /* Расположим его рядом с номером */
        transform: translateY(-50%); /* Центровка по вертикали */
        font-size: 18px; /* Размер текста */
        font-weight: bold; /* Жирный шрифт */
        color: #000; /* Цвет текста */
        z-index: 20; /* Элемент будет над другими */
    }
	
	    .business-dohod {
        position: absolute; /* Абсолютное позиционирование для названия бизнеса */
        top: 7%; /* Центрирование по вертикали */
        left: 70%; /* Расположим его рядом с номером */
        transform: translateY(-50%); /* Центровка по вертикали */
        font-size: 18px; /* Размер текста */
        font-weight: bold; /* Жирный шрифт */
        color: #000; /* Цвет текста */
        z-index: 20; /* Элемент будет над другими */
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	    .overlay-image-head {
        position: absolute; /* Абсолютное позиционирование относительно .logoBiz */
        top: -50px; /* Немного выше основной картинки */
        left: 50%;
        transform: translateX(-50%); /* Центровка изображения по горизонтали */
        width: 100%; /* Устанавливаем размер второго изображения */
        height: auto; /* Сохраняем пропорции */
        z-index: 10; /* Ставим его выше основного логотипа */
    }
    .additional-overlay-head {
        position: absolute;
        top: 60%;
        left: 28%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: auto;
        z-index: 15;
    }
	
	    .additional-overlay-head1 {
        position: absolute;
        top: 60%;
        left: 72%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: auto;
        z-index: 15;
    }
	
	
	
	
	.gradient-button {
    background: linear-gradient(0deg, #2b577feb, #239ad7e3);
    border: 2px solid #fcbd04;
    border-radius: 15px;
    padding: 10px 10px;
	padding-left: 3px;
    padding-right: 3px;
    color: white;
    font-size: 70%;
    font-weight: bold;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
	        width: 80%;
}

.gradient-button1 {
    background: linear-gradient(0deg, #2b577feb, #239ad7e3);
    border: 2px solid #fcbd04;
    border-radius: 15px;
    padding: 10px 10px;
	padding-left: 3px;
    padding-right: 3px;
    color: white;
    font-size: 70%;
    font-weight: bold;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
	        width: 80%;
}

    .gradient-button img {
        margin-right: 2px; /* Отступ между картинкой и текстом */
        #width: 30%; /* Устанавливаем фиксированную ширину для изображения */
    }
	
	

.gradient-button:hover {
    background: linear-gradient(45deg, #218838, #1e7e34); /* Более тёмный градиент при наведении */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15), 0 4px 6px rgba(0, 0, 0, 0.1); /* Усиление теней */
    #border-color: #19692c; /* Меняем цвет рамки при наведении */
	background: linear-gradient(0deg, #2b577f, #239ad7);
}

</style>';







echo '<center>
    <div class="logoBiz" style="--third-image-top: 57%; --third-image-left: 80%; --link-top: 70%; --link-left: 80%; margin-top: 30px;">
        <img src="/images/newDiz/1_grey.png" alt="Логотип бизнеса" class="game-logoBiz">
        <img src="/images/newDiz/4_orange.png" alt="Overlay Icon" class="overlay-image-head">
        
		<div class="additional-overlay-head">
            <a href="?new_room" class="gradient-button"><font size=2%>Бизнес <img src="/images/header/money_36.png" alt="$" width="16" height="16"><font color=#fcbd04>'.n_f($q['cena']).'</font></font></a>
        </div>
		
		 <div class="additional-overlay-head1">
            <a href="?AutoBuy" class="gradient-button1"><font size=2%>Автопрокачка</font></a>
        </div>
		
    </div>
</center>';










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

if($user['money'] < $q['cena']){
//echo '<span class="btnl" style="margin-top:2px;" id="id35e">Новый бизнес <img src="/images/header/money_36.png" alt="$" width="16" height="16"><span>'.n_f($q['cena']).'</span></span>';
}else{
/* if($user['biznes'] < 315){
echo '<a class="btnl_red" style="margin-top:2px;" id="id1a" href="?new_room">Новый бизнес <img src="/images/header/money_36.png" alt="$" width="16" height="16"><span>'.n_f($q['cena']).'</span></a>';
} */
}
}
//#######################################################################################################################################################

























//echo '<div class="wrapper"><main data-role="contentBlock" class="main"><section class="page>';
if ($user['auto_set'] == 0) {
    $typ_biz = 'DESC';
} else {
    $typ_biz = 'ASC';
}

if (empty($user['max'])) $user['max'] = 10;
$max = 5;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `user_biznes_1` WHERE `user` = '".$user['id']."'"), 0);
$k_page = k_page($k_post, $max);
$page = page($k_page);
$start = $max * $page - $max;
$users = mysql_query("SELECT * FROM `user_biznes_1` WHERE `user` = '".$user['id']."' ORDER BY `id` $typ_biz LIMIT $start, $max");

// Определяем начальный номер в зависимости от типа сортировки
if ($typ_biz === 'ASC') {
    $number = $start + 1; // Нумерация от 1 до max
} else {
    $number = $k_post - $start; // Нумерация от k_post до k_post - max + 1
}

while ($q = mysql_fetch_assoc($users)) {
$q['biznes_dohod'] = toBC($q['biznes_dohod']);
echo '
<center>
    <div class="logoBiz" style="--third-image-top: 57%; --third-image-left: 80%; --link-top: 70%; --link-left: 80%;">
        <img src="/images/newDiz/1_orange.png" alt="Логотип бизнеса" class="game-logoBiz">
        <img src="/images/newDiz/7.png" alt="Overlay Icon" class="overlay-image">

        <!-- Новое наложенное изображение -->
        <img src="/images/newDiz/3_orange.png" alt="Additional Overlay" class="additional-overlay">
        
<div class="additional-overlay-one">
    <img src="/images/newDiz/9.png" alt="Third Additional Overlay">
    <div class="text-overlay-one">
        <font size=2%>'.ceil($q['raz_kach']).'<span>ур</font></span>
    </div>
</div>
		
  
        <!-- Второе наложенное изображение -->
        <img src="/images/biznes/room_'.$q['images'].'.jpg" alt="Second Additional Overlay" class="additional-overlay-two">
        
        <!-- Третье наложенное изображение с текстом -->
        <div class="additional-overlay-three">
            <img src="/images/newDiz/8.png" alt="Third Additional Overlay">
            <div class="text-overlay"><img src="/images/header/money_36.png" alt="$"><font size=2%>'.n_f($q['biznes_dohod']).'</font></div>
        </div>';
		

echo '<div class="link-container">';

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
echo '<span class="link_of"><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span><font size=2%>'.n_f($userMoney1).'</font></span></span>';
} else {
    // Если денег недостаточно для выполнения операции
    if (bccomp($user['money'], $userMoney1) < 0) {
echo '<span class="link_of"><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span><font size=2%>'.n_f($userMoney1).'</font></span></span>';
} else {
echo '<a class="link" href="/x1/'.$q['id'].'/'.$page.'/"><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span><font size=2%>'.n_f($userMoney1).'</font></span></a>';
}
}



if (bccomp($q['raz_kach'], $sql['max_lvl_biz']) >= 0) {
    echo '<span class="link_of"><font size=2%>MAX</font></span>';
} else {
    if (bccomp($q['raz_kach'], '50') >= 0) {
        $mon = bcdiv(bcmul($q['raz_kach'], $q['raz_kach']), '2', 0); // raz_kach^2 / 2
        $userMoney4 = bcadd(bcmul($q['cena'], $q['raz_kach']), $mon);
    } else {
        $userMoney4 = bcmul($q['cena'], $q['raz_kach']);
    }

    if (bccomp($user['money'], $userMoney4) < 0) {
        echo '<span class="link_of"><font size=2%>MAX</font></span>';
    } else {
        echo '<a class="link" href="/MAX/' . $q['id'] . '/' . $page . '/"><font size=2%>MAX</font></a>';
    }
}

echo '</div>';


echo '<div class="number-overlay"><font size=3%>'.$number.'</font></div>
<div class="business-name"><font size=2%>'.$q['name'].'</font></div>

</div>
</center>';



    // Увеличиваем номер для следующего элемента в зависимости от сортировки
    if ($typ_biz === 'ASC') {
        $number++; // Увеличиваем на 1 для ASC
    } else {
        $number--; // Уменьшаем на 1 для DESC
    }




















/* echo '<div style="margin-top:2px;">
<div style="float:left;">
<a style="display:inline-block;"><img src="/images/biznes/room_'.$q['images'].'.jpg"  alt="Бизнес" title="'.$q['name'].'" width="32" height="32"></a>';


//#######################################################################################################################################################

if($q['raz_kach'] >= 50){
$mon = round(($q['raz_kach'] * $q['raz_kach']) / 2);
$userMoney1 = ($q['cena'] * $q['raz_kach']) + $mon ;
}else{
$userMoney1 = ($q['cena'] * $q['raz_kach']) ;
}


if($q['raz_kach'] >= $sql['max_lvl_biz']){
echo '<span class="btni" style="padding: 1px 4px;display:inline-block;width:70px;margin-left:2px; border-radius: 8px;" id="id364"><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($userMoney1).'</span></span>';
}else{
if($user['money'] <  $userMoney1  ){
echo '<span class="btni" style="padding: 1px 4px;display:inline-block;width:70px;margin-left:2px; border-radius: 8px;" id="id364"><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($userMoney1).'</span></span>';
}else{
echo '<a class="btni" href="'.$HOME.'x1/'.$q['id'].'/'.$page.'/" style="padding: 1px 4px;display:inline-block;width:70px;margin-left:2px; border-radius: 8px;" id="id3ac"><img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($userMoney1).'</span></a>';
}
}
//#######################################################################################################################################################


//#######################################################################################################################################################
if($q['raz_kach'] >= $sql['max_lvl_biz']){
echo '<span class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;">MAX</span>';
}else{
if($q['raz_kach'] >= 50){
$mon = round(($q['raz_kach'] * $q['raz_kach']) / 2);
$userMoney4 = ($q['cena'] * $q['raz_kach']) + $mon ;
}else{
$userMoney4 = ($q['cena'] * $q['raz_kach']);
}
if($user['money'] < $userMoney4){
echo '<span class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;">MAX</span>';
}else{
echo '<a class="btni" style="padding: 1px 4px;margin-left:2px;display:inline-block; border-radius: 8px;" href="'.$HOME.'MAX/'.$q['id'].'/'.$page.'/">MAX</a>';
}

}
//#######################################################################################################################################################






echo '</div><div style="float:right;" class="small"><img src="/images/header/money_36.png" alt="$" width="20" height="20"><span>'.n_f($q['biznes_dohod']).'</span> ';

echo '<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f; border-radius: 8px;" class="center" id="id3a5">'.round($q['raz_kach']).'</span>';

echo '</div><div class="cb"></div></div>';
 */
}




//echo '</div></section></main>';
echo '<div class="mt4" style="height: 1px;"></div>';

if ($k_page > 1) {
echo str(''.$HOME.'?',$k_page,$page); // Вывод страниц
} 
?> 