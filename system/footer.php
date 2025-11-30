<?php

if(!$user['id']) {
/* ?>
<center><a href="https://aaio.so/" target="_blank">
	<img src="https://aaio.so/assets/svg/banners/mini/white-1.svg" title="Aaio - Сервис по приему онлайн платежей">
</a></center>
<? */
}else{

echo '</div>'; // закрывает беграунд страницы

/* $corp_top1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_topic` WHERE `corp` = '".$user['corp']."' "),0);
$corp_forum_fols1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `corp_forum_fols` WHERE `corp` = '".$user['corp']."' and `user` = '".$user['id']."' "),0);
$soyz_top1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_topic` WHERE `soyz` = '".$user['soyz']."' "),0);
$soyz_forum_fols1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `soyz_forum_fols` WHERE `soyz` = '".$user['soyz']."' and `user` = '".$user['id']."' "),0);
if($user['corp']!=0){if($ass_br > $user['ass_br'] or $corp_top1 > $corp_forum_fols1){$corp_ = '<img src="/images/save.gif" width="14" height="14">';}$corp = '/corp/'.$user['corp'].'/';}else{$corp = '/corp/corp_rating/';}
if($user['soyz']!=0){if($soyz_ass > $user['soyz_ass'] or $soyz_top1 > $soyz_forum_fols1){$soyz = '<img src="/images/save.gif" width="14" height="14">';}$soyz = '/soyz/'.$user['soyz'].'/';}else{$soyz = '/soyz/soyz_rating/';}
 */
 
 
 // Собираем все данные одним запросом
$query = "
    SELECT
        (SELECT COUNT(*) FROM `corp_forum_topic` WHERE `corp` = '{$user['corp']}') AS corp_topic_count,
        (SELECT COUNT(*) FROM `corp_forum_fols` WHERE `corp` = '{$user['corp']}' AND `user` = '{$user['id']}') AS corp_forum_fols_count,
        (SELECT COUNT(*) FROM `soyz_forum_topic` WHERE `soyz` = '{$user['soyz']}') AS soyz_topic_count,
        (SELECT COUNT(*) FROM `soyz_forum_fols` WHERE `soyz` = '{$user['soyz']}' AND `user` = '{$user['id']}') AS soyz_forum_fols_count
";
$result = mysql_query($query);

if ($result) {
    $data = mysql_fetch_assoc($result);

    $corp_top1 = $data['corp_topic_count'];
    $corp_forum_fols1 = $data['corp_forum_fols_count'];
    $soyz_top1 = $data['soyz_topic_count'];
    $soyz_forum_fols1 = $data['soyz_forum_fols_count'];

    // Проверяем условия для корпорации
    if ($user['corp'] != 0) {
        if ($ass_br > $user['ass_br'] || $corp_top1 > $corp_forum_fols1) {
            $corp_ = '<img src="/images/save.gif" width="14" height="14">';
        }
        $corp = '/corp/' . $user['corp'] . '/';
    } else {
        $corp = '/corp/corp_rating/';
    }

    // Проверяем условия для союза
    if ($user['soyz'] != 0) {
        if ($soyz_ass > $user['soyz_ass'] || $soyz_top1 > $soyz_forum_fols1) {
            $soyz = '<img src="/images/save.gif" width="14" height="14">';
        }
        $soyz = '/soyz/' . $user['soyz'] . '/';
    } else {
        $soyz = '/soyz/soyz_rating/';
    }
}







?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const mainFooter = document.getElementById('main-footer');
    const floatingFooter = document.getElementById('floating-footer');

    function toggleFloatingFooter() {
        const rect = mainFooter.getBoundingClientRect();
        const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

        if (isVisible) {
            floatingFooter.classList.remove('visible');
        } else {
            floatingFooter.classList.add('visible');
        }
    }

    toggleFloatingFooter();
    window.addEventListener('scroll', toggleFloatingFooter);
    window.addEventListener('resize', toggleFloatingFooter);
});
</script>




<?


?>
<div id="footer-placeholder"></div>

<!-- основной футер -->
<div class="footer-c" id="main-footer">
    <div class="footer-content">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td width="16.6%" align="center">
                        <a href="/rating/">
                            <div class="foot"><img src="/images/footer/rating.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Рейт</font></span>
                        </a>
                    </td>
                    <td width="16.6%" align="center">
                        <a href="<?=$corp?>">
                            <div class="foot"><img src="/images/footer/corp.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Корп</font> <?=$corp_?></span>
                        </a>
                    </td>
                    <td width="20%" align="center">
                        <a href="/igrok_<?=$user['id']?>/">
                            <div class="foot"><img src="/images/footer/profile.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Проф</font></span>
                        </a>
                    </td>
                    <td width="16.6%" align="center">
                        <a href="<?=$soyz?>">
                            <div class="foot"><img src="/images/footer/soyz.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Союз</font> <?=$soyz_?></span>
                        </a>
                    </td>
                    <td width="16.6%" align="center">
                        <a href="/menu/">
                            <div class="foot"><img src="/images/footer/menu.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Меню</font></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- фиксированный футер (появляется при скролле) -->
<div class="footer-c fixed-footer" id="floating-footer">
    <div class="footer-content">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td width="16.6%" align="center">
                        <a href="/rating/">
                            <div class="foot"><img src="/images/footer/rating.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Рейт</font></span>
                        </a>
                    </td>
                    <td width="16.6%" align="center">
                        <a href="<?=$corp?>">
                            <div class="foot"><img src="/images/footer/corp.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Корп</font> <?=$corp_?></span>
                        </a>
                    </td>
                    <td width="20%" align="center">
                        <a href="/igrok_<?=$user['id']?>/">
                            <div class="foot"><img src="/images/footer/profile.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Проф</font></span>
                        </a>
                    </td>
                    <td width="16.6%" align="center">
                        <a href="<?=$soyz?>">
                            <div class="foot"><img src="/images/footer/soyz.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Союз</font> <?=$soyz_?></span>
                        </a>
                    </td>
                    <td width="16.6%" align="center">
                        <a href="/menu/">
                            <div class="foot"><img src="/images/footer/menu.png"></div>
                            <span class="footer-content-text"><font color="#ababab">Меню</font></span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?




echo '</b></b><div class="overlay">';
echo '<div class="center" style="margin-top: 8px;">
<main data-role="contentBlock" class="main"><section class="page_foot">';

if($time_delete1){
Echo '<center><font color=red> Сохранитесь, или аккаунт удалится автоматически через <span id="time_'.($time_delete1['time']-time()).'000">'._time($time_delete1['time']-time()).'</span></center></font>';
echo '<a class="btnl mt4" href="'.$HOME.'save/"><img src="/images/accept48.png" width="24" height="24" alt=""> Сохранится</a>';
}
































if(!$time_delete1){





//if($user['id'] == 1){
//echo '<hr><a href="https://airbizz.ru/"><font color=red>Авиа бизнесмены - онлайн игра</font></a><hr>';
//}






/* 
 ?>
 <a href="/forum/topic/87/"><div style="
  background: linear-gradient(90deg, #0066ff, #00ccff);
  color: white;
  font-weight: bold;
  padding: 12px 20px;
  font-size: 100%;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
  margin: 15px auto;
  max-width: 90%;
  font-family: 'Segoe UI', sans-serif;
">
🎉 Конкурс – Участвуй и побеждай! 🏆
</div></a><?

 */



if($user['biznes'] >= 5){
if($user['set_3'] == 0){


$timer1 = 1735689600;

if(time() < $timer1) {
if($user['newpresent_time'] > time()){
echo '<hr><center><a href="'.$HOME.'newpresent_/"><font size=3 color=#4075cc><b>Новогодние <img src="/Pay/3.png" width="6%"> подарки</b></font></a></center><hr>'; 
}else{
echo '<hr><center><a href="'.$HOME.'newpresent_/"><font size=3 color=red><b>Новогодние <img src="/Pay/3.png" width="6%"> подарки</b></font></a></center><hr>'; 
}
}


if($user['spec_pred'] > 0){
echo '<center><a href="'.$HOME.'Pay/"><img src="/images/3.gif" width="24" height="24" alt=""> <font size=2 color=purple><b>Специальное предложение!</b></font> <img src="/images/3.gif" width="24" height="24" alt=""></a>
<font size=1 color=black>(<span id="time_'.($user['pred_time']-time()).'000">'._time($user['pred_time']-time()).'</span>)</font></center>'; 
}


if($promotions['promotion_20'] >= 1){
if($promotions['act_20'] == 1){
$img_20 = '<img src="/images/angel48.png" width="24" height="24" alt="">';
}elseif($promotions['act_20'] == 2){
$img_20 = '<img src="/images/header/money_36.png" width="24" height="24" alt="">';
}elseif($promotions['act_20'] == 3){
$img_20_ = '<img src="/images/angel48.png" width="24" height="24" alt=""><img src="/images/header/money_36.png" width="24" height="24" alt="">';
$img_20__ = '<img src="/images/header/money_36.png" width="24" height="24" alt=""><img src="/images/angel48.png" width="24" height="24" alt="">';
}
echo '<div class="mt4"></div><a href="'.$HOME.'aaio/index.php">'.$img_20.''.$img_20_.' <font color=#0058a9><b>Выгодная акция!</b></font> '.$img_20.''.$img_20__.' <font size=1 color=black><span id="time_'.($promotions['time_20']-time()).'000">'._time($promotions['time_20']-time()).'</span></font></a><br>';
}
if($promotions['promotion_9'] == 1){
echo '<a href="'.$HOME.'NewYearToys/"><img src="/Halloween/images/_1.png" width="23" height="25" alt=""> <font size=2 color=#0058a9><b>Новогодние игрушки</b></font> <img src="/Halloween/images/_1.png" width="23" height="25" alt=""></a>
<font size=1 color=black><span id="time_'.($promotions['time_9']-time()).'000">'._time($promotions['time_9']-time()).'</span></font><br>'; 
}
if($sql['time_mis_turnir'] > time()){
echo '<a href="'.$HOME.'cup/"><img src="/images/angel48.png" alt="$" width="24" height="24"> <font size=2 color=#0058a9><b>Турнир недели ангелов</b></font> <img src="/images/angel48.png" alt="$" width="24" height="24"></a>
<font size=1 color=black>(<span id="time_'.($sql['time_mis_turnir']-time()).'000">'._time($sql['time_mis_turnir']-time()).'</span>)</font><br>'; 
}
if($promotions['promotion_18'] == 1){
echo '<a href="'.$HOME.'bay/"><img src="/images/safe.png" alt="$" width="24" height="24"> <font size=2 color=#0058a9><b>Таинственный сейф</b></font> <img src="/images/safe.png" alt="$" width="24" height="24"></a>
<font size=1 color=black>(<span id="time_'.($promotions['time_18']-time()).'000">'._time($promotions['time_18']-time()).'</span>)</font><br>'; 
}elseif($safe['time_restart'] >= time()){
echo '<a href="'.$HOME.'bay/"><img src="/images/safe.png" alt="$" width="24" height="24"> <font size=2 color=#0058a9><b>Таинственный сейф</b></font> <img src="/images/safe.png" alt="$" width="24" height="24"></a>'; 
echo '<div class="minor center"><span><font color="black" size="2">Успейте забрать ангелы</font> <font color="black" size="2"><img src="/images/clock.png" alt="через" width="25" height="25"> <span id="time_'.($safe['time_restart']-time()).'000">'._time($safe['time_restart']-time()).'</span></font></span></div>';
}
if($promotions['promotion_19'] == 1){
echo '<a href="'.$HOME.'mission/"><img width="24" height="24" alt="" src="/images/cup.png" title=""> <font size=2 color=#0058a9><b>Акция больше Кубков</b></font> <img width="24" height="24" alt="" src="/images/cup.png" title=""></a>
<font size=1 color=black>(<span id="time_'.($promotions['time_19']-time()).'000">'._time($promotions['time_19']-time()).'</span>)</font><br>'; 
}

if($promotions['promotion_12'] == 1){
if($promotions['act_12'] == 1){
echo '<center><a href="'.$HOME.'Halloween/"><img width="24" height="24" alt="" src="/Halloween/images/5.png" title=""> <font size=2 color=#0058a9><b>Хэллоуин</b></font> <img width="24" height="24" alt="" src="/Halloween/images/5.png" title=""></a>
<font size=1 color=black>(<span id="time_'.($promotions['time_12']-time()).'000">'._time($promotions['time_12']-time()).'</span>)</font></center>'; 
}
if($promotions['act_12'] == 2){
echo '<center><a href="'.$HOME.'Halloween/"><img src="/images/elka_zhumik.gif" width="5%" alt=""> <font size=2 color=#0058a9><b>Новогодние игрушки</b></font> <img src="/images/elka_zhumik.gif" width="5%" alt=""></a>
<font size=1 color=black><span id="time_'.($promotions['time_12']-time()).'000">'._time($promotions['time_12']-time()).'</span></font></center>'; 
}
if($promotions['act_12'] == 3){
echo '<center><a href="'.$HOME.'Halloween/"><img src="/Halloween/images/__6.png" width="5%" alt=""> <font size=2 color=#0058a9><b>Турнир сувениров</b></font> <img src="/Halloween/images/__6.png" width="5%" alt=""></a>
<font size=1 color=black>(<span id="time_'.($promotions['time_12']-time()).'000">'._time($promotions['time_12']-time()).'</span>)</font></center>'; 
}
}








}




if($user['set_2'] == 0){
if($promotions['promotion_10'] == 1){echo '<img src="/images/angel48.png" width="24" height="24" alt=""> <font size=2 color=#0058a9><b>Ангелы: х'.n_f($promotions['act_10']).'</b></font> <img src="/images/angel48.png" width="24" height="24" alt=""> <font size=1 color=black><span id="time_'.($promotions['time_10']-time()).'000">'._time($promotions['time_10']-time()).'</span></font><br>'; }
if($promotions['promotion_15'] == 1){echo '<a href="'.$HOME.'mission/">
<img src="/mission/key.png" height="24" alt=""> <font size=2 color=#0058a9><b>Ключи х'.$promotions['act_15'].'</b></font> 
<img src="/mission/key.png" height="24" alt=""> </a> 
<font size=1 color=black><span id="time_'.($promotions['time_15']-time()).'000">'._time($promotions['time_15']-time()).'</span></font><br>'; }
if($promotions['promotion_16'] == 1){
echo ' <a href="'.$HOME.'mission/"><img src="/mission/key.png" height="24" alt=""> <font size=2 color=0058a9><b>Ключи по наростающей</b></font> <img src="/mission/key.png" height="24" alt=""></a> 
<font size=1 color=black><span id="time_'.($promotions['time_16']-time()).'000">'._time($promotions['time_16']-time()).'</span></font><br>'; 
}
if($promotions['promotion_17'] == 1){
echo ' <a href="'.$HOME.'mission/"><img src="/mines/glory.png" height="24" alt=""> <font size=2 color=0058a9><b>Бонус славы</b> </font> <img src="/mines/glory.png" height="24" alt=""></a> <font size=1 color=black><span id="time_'.($promotions['time_17']-time()).'000">'._time($promotions['time_17']-time()).'</span></font><br>';
}
if($promotions['promotion_14'] == 1){
echo ' <a href="'.$HOME.'card/"><img src="/images/card/1.png" height="24" alt="">  <font size=2 color=0058a9><b>Скидка на улучшение карт '.$promotions['act_14'].'%</b></font> <img src="/images/card/1.png" height="24" alt=""> </a> 
<font size=1 color=black><span id="time_'.($promotions['time_14']-time()).'000">'._time($promotions['time_14']-time()).'</span></font><br>'; 
}


if($promotions['promotion_13'] == 1){
echo ' <a href="'.$HOME.'user/'.$user['id'].'/"><img src="/world/images/h_.png" height="24" alt=""> <font size=2 color=0058a9><b>Скидка на прокачку персонажа '.$promotions['act_13'].'%</b></font> <img src="/world/images/h_.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_13']-time()).'000">'._time($promotions['time_13']-time()).'</span></font><br>'; 
}


if($promotions['promotion_11'] == 1){
echo ' <a href="'.$HOME.'VIP/"><img src="/images/prem_musor.png" height="24" alt=""> <font size=2 color=0058a9><b>Премиум: скидка -'.$promotions['act_11'].'%</b></font> <img src="/images/prem_musor.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_11']-time()).'000">'._time($promotions['time_11']-time()).'</span></font><br>'; 
}
if($promotions['promotion_1'] == 1){
echo ' <a href="'.$HOME.'Pay/"><img src="/images/ruby.png" height="24" alt=""> <font size=2 color=0058a9><b>Акция: +'.$promotions['act_1'].'% к покупке!</b></font> <img src="/images/ruby.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_1']-time()).'000">'._time($promotions['time_1']-time()).'</span></font><br>'; 
}
if($promotions['promotion_2'] == 1){
echo ' <a href="'.$HOME.'Pay/"><img src="/images/card/19.png" width="5%" alt=""> <font size=2 color=#0058a9><b>Акция: Карты в подарок ('.$promotions['act_2'].'шт.)</b></font> <img src="/images/card/19.png" width="5%" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_2']-time()).'000">'._time($promotions['time_2']-time()).'</span></font><br>'; 
}
if($promotions['promotion_3'] == 1){
echo ' <a href="'.$HOME.'Pay/"><img src="/images/ruby.png" height="24" alt=""> <font size=2 color=0058a9><b>Акция: Бонус Кп '.$promotions['act_3'].'%</b></font> <img src="/images/ruby.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_4']-time()).'000">'._time($promotions['time_3']-time()).'</span></font><br>'; 
}
if($promotions['promotion_4'] == 1){
echo ' <a href="'.$HOME.'Pay/"><img src="/images/ruby.png" height="24" alt=""> <font size=2 color=0058a9><b>Акция: Бонус Союзу '.$promotions['act_4'].'%</b></font> <img src="/images/ruby.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_4']-time()).'000">'._time($promotions['time_4']-time()).'</span></font><br>'; 
}
if($promotions['promotion_5'] == 1){
echo ' <a href="'.$HOME.'viktorina/"><img src="/mission/mission.png" height="24" alt=""> <font size=2 color=0058a9><b>Викторина Х-'.$promotions['act_5'].'</b></font> <img src="/mission/mission.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_5']-time()).'000">'._time($promotions['time_5']-time()).'</span></font><br>'; 
}
if($promotions['promotion_6'] == 1){
echo ' <a href="'.$HOME.'"><img src="/images/ruby.png" height="24" alt=""><font size=2 color=0058a9><b>Акция: День Скидок ('.$promotions['act_6'].'%)</b></font> <img src="/images/ruby.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_6']-time()).'000">'._time($promotions['time_6']-time()).'</span></font><br>'; 
}
if($promotions['promotion_7'] == 1){
echo ' <a href="'.$HOME.'mine/"><img src="/mine/images/20.png" height="24" alt=""> <font size=2 color=0058a9><b>Шахта Х-'.$promotions['act_7'].'</b></font> <img src="/mine/images/20.png" height="24" alt=""></a>  
<font size=1 color=black><span id="time_'.($promotions['time_7']-time()).'000">'._time($promotions['time_7']-time()).'</span></font><br> '; 
}
if($promotions['promotion_8'] == 1){
echo ' <a href="'.$HOME.'"><img src="/images/biznes/room_1.jpg" height="24" alt=""> <font size=2 color=0058a9><b>Постройки: скидка -'.$promotions['act_8'].'%</b></font> <img src="/images/biznes/room_1.jpg" height="24" alt=""></a> 
<font size=1 color=black><span id="time_'.($promotions['time_8']-time()).'000">'._time($promotions['time_8']-time()).'</span></font>'; 
}

}
}
}






















// Проверяем уровень пользователя и формируем условия для запросов
$razdelCondition = ($user['level'] == 0) ? "`razdel` != '4'" : "1=1";

// Один SQL-запрос для подсчёта всех значений
$query = "
    SELECT 
        (SELECT COUNT(*) FROM `forum_topic` WHERE $razdelCondition) AS forum_top,
        (SELECT COUNT(*) FROM `forum_fols` WHERE `user` = '{$user['id']}' AND $razdelCondition) AS forum_f
";
$result = mysql_query($query);

if ($result) {
    $data = mysql_fetch_assoc($result);

    $forum_top = $data['forum_top'];
    $forum_f = $data['forum_f'];

    // Определяем изображение
    $fols_forum = ($forum_top > $forum_f) ? '<img src="/images/save.gif" width="14" height="14">' : '';
}





// Выполняем один запрос для подсчёта значений
$query = "
    SELECT 
        (SELECT COUNT(*) FROM `ass`) AS ass_count,
        (SELECT COUNT(*) FROM `chat`) AS chat_count
";
$result = mysql_query($query);

if ($result) {
    $data = mysql_fetch_assoc($result);

    $ass = $data['ass_count'];
    $chat = $data['chat_count'];

    // Проверяем условия
    if ($ass > $user['ass'] || $chat > $user['chat']) {
        $fols_chat = '<img src="/images/save.gif" width="14" height="14">';
    }
}



/* 
$ass = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass` "),0);
$chat = mysql_result(mysql_query("SELECT COUNT(*) FROM `chat` "),0);
if($ass > $user['ass'] or $chat > $user['chat']){
$fols_chat = '<img src="/images/save.gif" width="14" height="14">';
} */

/* if($user['level'] == 0){
$forum_top = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_topic` WHERE `razdel` != '4' "),0);
$forum_f = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_fols` WHERE `user` = '".$user['id']."' and `razdel` != '4' "),0);
}else{
$forum_top = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_topic` WHERE `id` "),0);
$forum_f = mysql_result(mysql_query("SELECT COUNT(*) FROM `forum_fols` WHERE `user` = '".$user['id']."' "),0);
}
if($forum_top > $forum_f){
$fols_forum = '<img src="/images/save.gif" width="14" height="14">';
} */

$ONL =mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > '".(time()-$sql['s_online'])."'"),0);
$ONL_ =mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > '".(time()-900)."' and `browser` != 'bot' "),0);
$onl_n =mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > '".(time()-(3600*3))."'"),0);
$ONL__ =mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `viz` > '".(time()-60)."' and `browser` != 'bot' "),0);

if($user['id'] == 74 or $user['id'] == 1){
$onl_n = '('.$onl_n.')';
}else{
$onl_n = '';
}

if($user['id'] == 1){$txtt = '('.$ONL_.') ('.$ONL__.')';}else{$txtt = '';}
echo '<div class="center" style="padding-top: 12px;">

<a href="'.$HOME.'ass/"><font color=#2b577f size="3">Чат</font> '.$fols_chat.'</a> <font color=black size="3">|</font> <a href="'.$HOME.'forum/"><font color=#2b577f size="3">Форум</font> '.$fols_forum.'</a><br>


<a href="'.$HOME.'user/seting/"><u><font size=2>Настройки</font></a></u>
 | 
<a href="'.$HOME.'online/"><u><font color=#2b577f size=2>Онлайн</a>: '.$ONL.' '.$txtt.' '.$onl_n.'</font></u>
 | 
<a href="'.$HOME.'search/"><u><font size=2>Поиск</font></a></u>

</div>';
$today[1] = date("H:i:s"); 
echo '
<a href="'.$HOME.'help/"><font color=#2b577f size=2>Помощь</font></a> | 
<font color=#2b577f size=2>'.round(microtime(1) - $t, 3).' сек</font> | 
<font color=#2b577f size=2>'.$today[1].'</font>';

if($user['level'] >=1){
$kolvo = mysql_result(mysql_query("SELECT COUNT(*) FROM `tikets` WHERE `status` = '1' "),0);
if($kolvo > 0){
$color = 'red';
}else{
$color = '#2b577f';
}
}else{
$color = '#2b577f';
}

echo '<br><center><img src="https://air.mars-games.ru/favicon.ico" width="15" height="15" alt="https://air.mars-games.ru/"> <a href="https://air.mars-games.ru/" target="_blank"><font color=gold>Авиа бизнесмены</font></a></center>';
echo '<center><img src="https://tank.mars-games.ru/favicon.ico" width="15" height="15" alt="https://tank.mars-games.ru/"> <a href="https://tank.mars-games.ru/" target="_blank"><font color=gold>Мобильные Танки Онлайн</font></a></center>';


echo '<a href="'.$HOME.'tikets/"><u><font color='.$color.' size=2>Служба поддержки </font></u></a>';





if($user['id']==1){
?>
<center>
<script type="text/javascript" src="//mobtop.com/c/117062.js"></script><noscript><a href="//mobtop.com/in/117062"><img src="//mobtop.com/117062.gif" alt="MobTop - рейтинг мобильных сайтов"/></a>
</noscript><?
}else{
?>
<style>
.hidden-counter {
  position: absolute;
  width: 1px;
  height: 1px;
  overflow: hidden;
  opacity: 0;
  pointer-events: none;
}
</style>

<div class="hidden-counter">

  <script type="text/javascript" src="//mobtop.com/c/117062.js"></script>
  <noscript>
    <a href="//mobtop.com/in/117062">
      <img src="//mobtop.com/117062.gif" alt="MobTop - рейтинг мобильных сайтов" width="1" height="1">
    </a>
  </noscript>
</div>

<center>
<div class="hidden-counter">

  <script type="text/javascript" src="//mobtop.com/c/117062.js"></script>
  <noscript>
    <a href="//mobtop.com/in/117062">
      <img src="//mobtop.com/117062.gif" alt="MobTop - рейтинг мобильных сайтов" width="1" height="1">
    </a>
  </noscript>
</div>
</center>
<?
}


echo '</div>';
echo '</div>';
echo '</main>';
}
?>
</strong></body></div>




</div></div>
<?php ob_end_flush(); ?>