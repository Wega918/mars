<?php
$title = 'Новый бизнес';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}


$posledniy_biznes = mysql_result(mysql_query("SELECT COUNT(*) FROM `biznes` WHERE `id` "),0);
$biznes = mysql_fetch_array(mysql_query('SELECT * FROM `biznes` WHERE `id` = "'.mysql_real_escape_string($posledniy_biznes).'"'));


$dohod_ = toBC($biznes['dohod']);
$cena_ = toBC($biznes['cena']);

$dohod = bcmul($dohod_, 2);
$cena = bcmul($cena_, 10);

echo '
'.n_f($posledniy_biznes).'<br>
'.n_f($biznes['cena']).'<br>
'.n_f($cena_).'<br>
'.n_f($cena).'<br>
';




$chanse = rand(1,52);


if($chanse==1){
$name = 'Космопорт';
}
if($chanse==2){
$name = 'Полицейский участок';
}
if($chanse==3){
$name = 'Отель';
}
if($chanse==4){
$name = 'Склад';
}
if($chanse==5){
$name = 'Продуктовый склад';
}
if($chanse==6){
$name = 'Серверная';
}
if($chanse==7){
$name = 'Пункт управления';
}
if($chanse==8){
$name = 'Съемочный павильон';
}
if($chanse==9){
$name = 'Медпункт';
}
if($chanse==10){
$name = 'Ядерный реактор';
}
if($chanse==11){
$name = 'Морозильный отсек';
}
if($chanse==12){
$name = 'Фитотрон';
}
if($chanse==13){
$name = 'Обсерватория';
}
if($chanse==14){
$name = 'Комната отдыха';
}
if($chanse==15){
$name = 'Овощная лавка';
}
if($chanse==16){
$name = 'Отель';
}
if($chanse==17){
$name = 'Хостел';
}
if($chanse==18){
$name = 'Охотничий домик';
}
if($chanse==19){
$name = 'Чил-аут';
}
if($chanse==20){
$name = 'Музей древностей';
}
if($chanse==21){
$name = 'Эрмитаж';
}
if($chanse==22){
$name = 'Пекарня';
}
if($chanse==23){
$name = 'Кафе-гриль';
}
if($chanse==24){
$name = 'Сырная лавка';
}
if($chanse==25){
$name = 'Оружейная';
}
if($chanse==26){
$name = 'Бистро';
}
if($chanse==27){
$name = 'Магазин мороженого';
}
if($chanse==28){
$name = 'Пиццерия';
}
if($chanse==29){
$name = 'Спа-салон';
}
if($chanse==30){
$name = 'Музыкальная студия';
}
if($chanse==31){
$name = 'Магазин игрушек';
}
if($chanse==32){
$name = 'Магазин электроники';
}
if($chanse==33){
$name = 'Рыбный магазин';
}
if($chanse==34){
$name = 'Суши-бар';
}
if($chanse==35){
$name = 'Закусочная';
}
if($chanse==36){
$name = 'Китайский ресторан';
}
if($chanse==37){
$name = 'Коктейль-бар';
}
if($chanse==38){
$name = 'Молочный магазин';
}
if($chanse==39){
$name = 'Обувной салон';
}
if($chanse==40){
$name = 'Зоомагазин';
}
if($chanse==41){
$name = 'Музыкальный магазин';
}
if($chanse==42){
$name = 'Планетарий';
}
if($chanse==43){
$name = 'Игровой клуб';
}
if($chanse==44){
$name = 'Боулинг';
}
if($chanse==45){
$name = 'Тир';
}
if($chanse==46){
$name = 'Зал заседаний';
}
if($chanse==47){
$name = 'Магазин приборов';
}
if($chanse==48){
$name = 'Полиция';
}
if($chanse==49){
$name = 'Турагенство';
}
if($chanse==50){
$name = 'Салон оптики';
}
if($chanse==51){
$name = 'Школа бизнеса';
}
if($chanse==52){
$name = 'Детективное бюро';
}



















$images = $chanse;


echo '<body><div class="center"></div><div></div><div id="id33f"><a class="btnl" style="margin-top:2px;" href="?new_room/">Новый Бизнес</a>'; // кнопка




if(isset($_GET['new_room/'])){
If($user['level'] < 3){
header('Location: /');
exit();
}
mysql_query("INSERT INTO `biznes` SET 
`name` = '".mysql_real_escape_string($name)."', 
`images` = '".mysql_real_escape_string($images)."', 
`dohod` = '".mysql_real_escape_string($dohod)."', 
`cena` = '".mysql_real_escape_string($cena)."' ");

header('Location: ?');
$_SESSION['err'] = ''.$biznes['name'].' успешно создан!';
exit();
}











echo '<div class="content small minor">Всего бизнесов: '.$posledniy_biznes.'</div>';
	
echo'<div class="bordered" style="margin-top: 4px; position: relative;">
<div class="small tbrown" style="position:absolute; top: 0; right: 0">
<img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($biznes['dohod']*2).'</span> в сек
<span style="padding: 2px 4px; color: #ffffff; width: 45px; display: inline-block; background-color: #2b577f;" class="center" id="id3197">1</span>
</div><div style="display: inline;" class="fl">
<a class="left" style="display: inline-block;" href="?">
<img src="/images/biznes/room_'.$biznes['images'].'.jpg" alt="Войти" width="64" height="64">
</a><div class="left" style="display: inline-block; vertical-align: bottom; padding: 4px 0 0 4px;">
<div class="show350 tdbrown"><span>'.$biznes['name'].'</span></div>
<div>';








echo'<a class="btni" style="margin-top: 4px; width: 130px;" id="id3198">Вложить <img src="/images/header/money_36.png" alt="$" width="16" height="16"> <span>'.n_f($biznes['cena']).'</span></a>';
echo'<a class="btni" style="margin: 4px 0 0 4px; padding: 3px 5px;" id="id3199" >x10 </a>';
echo'<a class="btni" style="margin: 4px 0 0 4px; padding: 3px 5px;" id="id3199" >x100</a>';











echo'</div></div></div><div class="cb"></div></div>';






echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';

require_once ('../system/footer.php');
?>