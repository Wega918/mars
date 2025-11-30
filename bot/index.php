<?php
//-----Создаем титл страницы-----//
$title = 'Онлайн Игра Марсиане';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');
//-----Выводим логотип----//
if(!$user['id']) {
header('Location: /');
exit();
}
if($user['id']!=1) {
header('Location: /');
exit();
}

?>
<style>
.header-2019 {
    height: 2.1875rem;
    line-height: 2.1875rem;
    font-size: 1.25rem;
    text-transform: uppercase;
    font-weight: bold;
    background: linear-gradient( 
90deg
 , rgb(0 0 0 / 0%), #676767, rgb(0 0 0 / 0%)) 50% 99% / 85% 5% no-repeat, linear-gradient( 
90deg
 , rgb(0 0 0 / 1%), rgb(0 0 0 / 30%), #3131317a, rgb(0 0 0 / 30%), rgb(0 0 0 / 1%));
}
</style>
<?
if(!$bot) {
mysql_query("INSERT INTO `bot` SET `user` = '".$user['id']."' ");
}


echo '<center>
<div class="header-2019 cntr"><font color=#e9e9e9>Роботы - помощники</font></div>

<a href="/bot/1/"><img src="/images/bots/image1.png" opacity="0" alt="Попрошайка" style="width:27%; margin:5px;border-radius: 8px;"></a>
<a href="/bot/2/"><img src="/images/bots/image2.png" alt="Веселый" style="width:30%; margin:5px;border-radius: 8px;"></a>
<a href="/bot/3/"><img src="/images/bots/image3.png" alt="Рембо" style="width:27%; margin:5px;border-radius: 8px;"></a>

<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">
<font size=2% color=green>Робот помощник - это разработка новой технологии по автоматическому сбору урожая с грядок. Каждый робот выполняет поставленную задачу даже в ваше отсутствие и имеет свою уникальную способность.</font>
</span></li></ul></div>



</center>';
echo '<a class="btnl" style="margin-top:2px;" href="/garden/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Мои грядки</a>';

//style="width:75%;border-radius: 20px;height: 50%;"

//mysql_query('DELETE FROM `users` WHERE `alliance` != "6" ');









require_once ('../system/footer.php');
?>