<?php
$title = 'Чат';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}

/* if ($user['id']!=1) {
    $_SESSION['err'] = '<font color=red>Техработы</font>';
    header('Location: /');
    exit();
}
 */

$ass = mysql_result(mysql_query("SELECT COUNT(*) FROM `ass` "),0);
mysql_query("UPDATE `users` SET `ass` = '".$ass."' WHERE `id` = '$user[id]' LIMIT 1");




$act = isset($_GET['act']) ? $_GET['act'] : null;
switch($act){
default: 



echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'viktorina/"><img src="/images/forum2.png" width="24" height="24"> Викторина</a>';

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">';
if($time_delete1){
echo 'Общение в Чате доступно только зарегистрированным пользователям!';
}else{

If($Ignore){
echo '<div><div class="tred small"><font size=3>Вы в игноре! Снятие: <span>'.vremja($Ignore['time_end']).'.</span></font></div></div>';
}else{






require_once ('../ass/get_ass.php');






}

}
echo '</span></li></ul></div>';


echo '<center><div class="minor mb4"><font color=black>Чат для поиска Корпорации и Союза находится внизу страницы.</font></div></center>';








?>
<a href="#vrag" onClick="document.getElementById('pokazat1').style.display='none';document.getElementById('skryt1').style.display='';return false;"><center><span style="color:black;"><u>Правила общения</u></span></a></center><hr>
<?
///###############################################################################################################################################









///###############################################################################################################################################
?>
<div id="pokazat1"></div>
<div id="skryt1" style="display:none">



<br>
<b class="tred">Запрещается:</b><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Размещать любую коммерческую рекламу, коммерческие предложения, агитационные материалы, распространять спам, сообщения-цепочки (сообщения, требующие их передачи одному или нескольким пользователям), схемы финансовых пирамид или призывы в них участвовать, любую другую навязчивую информацию;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Нецензурно выражаться или оскорблять других Пользователей Сайта или Администрацию Сайта, публично или приватно;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Совершать действия противоречащие общепринятым моральным нормам;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Злоупотреблять ЗАГЛАВНЫМИ буквами (также именуемое капсом), создавать сообщения, состоящие целиком из заглавных букв, создавать темы с названиями содержащими заглавные буквы не в начале слов;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Размещать одинаковые или однотипные сообщения в одном или нескольких разделах Сайта (топиках), размещать многократно повторяющиеся символы, фразы или смайлики;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Высказывание в чате и на форуме недовольства действиями участников форума и публичное обсуждение действий модераторов и администрации;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Использовать для общения языки, отличные от русского (государственного языка РФ), если другие пользователи могут не понять значения отдельных слов или всего сообщения;</font><br>
<br>
<span class="bold"><font color=black> <font size=3>•</font></font></span><font size=2> Обсуждение тех, или иных локаций (а также ошибок) в чатах игры.</font><br>
<div class="fr"><a href="/rules/"><span style="color:black;"><u>соглашение</u></span></a></div><br>



<br><a class="blck p5 forum"></a><a href="#vrag" onClick="document.getElementById('skryt1').style.display='none';document.getElementById('pokazat1').style.display='';return false;"><center><span style="color:black;">Закрыть</span></center></center></a><hr>

</div><?
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////






















if (empty($user['max'])) $user['max']=10;
$max = $user['max'];
$k_post = mysql_result(mysql_query("SELECT COUNT(*)  FROM `ass` ") ,0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$query = mysql_query("SELECT * FROM `ass` ORDER BY `time` DESC LIMIT $start, $max");
while($post = mysql_fetch_assoc($query)){

$avtor = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['avtor']."'"));
$komu = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['id_komu']."'"));

if($user['level'] >= 1 && ($user['id'] != $post['avtor'] or $user['level'] == 3)){
$del = '<a href="'.$HOME.'ass/delmsg'.$post['id'].'"><b><font color=indianred>x</font></b></a>';
}else{
$del = '';
}


$usr = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$post['avtor']."'"));

$msg = ($post['msg']); // Экранирование

if($usr['level'] >= 1){
$mmm = filter(bb(smile(nl2br($msg))));
}else{
$mmm = filter(bb1(smile(nl2br($msg))));
}





if($post['avtor'] == $user['id'] and $post['id_komu'] != 0){
$name = '<b>'.htmlspecialchars($komu['login']).', '.$mmm.'</b>';
}

if($post['avtor'] == $user['id'] and $post['id_komu'] == 0){
$name = ''.$mmm.'';
}

if($post['avtor'] != $user['id'] and $post['id_komu'] != $user['id']){
$name = ''.htmlspecialchars($komu['login']).', '.$mmm.'';
}

if($post['avtor'] != $user['id'] and $post['id_komu'] == $user['id']){
$name = '<font color=red>'.htmlspecialchars($komu['login']).', '.$mmm.'';
}

echo''.$del.' <span style="float: right;">  <font size=1 color=grey> '.time_last($post['time']).'</font></span> '.nick($post['avtor']).'';

if($user['id'] != $post['avtor']) {
echo' <a href="'.$HOME.'ass/otvet.php?id='.$post['id'].'"><img src="/images/reply.png" width="18" height="18"></a> ';
}

echo '<br>';

if($post['id_komu'] == $komu['id']){
echo ' '.$name.'</font>';
}else{
echo''.$mmm.'';
}

echo '<hr>';

}



$chat = mysql_result(mysql_query("SELECT COUNT(*) FROM `chat` "),0);
if($chat > $user['chat']){
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'chat/"><img src="/images/corp2.png" width="24" height="24"> Поиск Кп / Союза <font color=red>(+)</font></a>';
}else{
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'chat/"><img src="/images/corp2.png" width="24" height="24"> Поиск Кп / Союза</a>';
}


if($k_post < 1){
echo '<center>Пока пусто, будешь первым!</center>';
}
if ($k_page > 1) {
echo str(''.$HOME.'ass/?',$k_page,$page); // Вывод страниц
}
break;








case 'delmsg':
    $id = abs(intval($_GET['id']));
    // Получаем информацию о сообщении
    $gg = mysql_fetch_assoc(mysql_query("SELECT * FROM `ass` WHERE `id` = '".$id."'"));
    
    if (isset($gg['id'])) {
        // Проверка уровня пользователя
        if ($user['level'] == 3) {
            // Уровень 3 — удаление сообщения
            mysql_query("DELETE FROM `ass` WHERE `id` = '".$id."' LIMIT 1");
            $_SESSION['err'] = "Сообщение успешно удалено!";
        } elseif ($user['level'] == 1) {
            // Уровень 1 — изменение сообщения
            $msg_del = 'Сообщение удалено ' . nick($user['id']) . ' ';
            mysql_query("UPDATE `ass` SET `msg` = '".$msg_del."' WHERE `id` = '".$id."' LIMIT 1");
            $_SESSION['err'] = "Сообщение успешно удалено!";
        } else {
            $_SESSION['err'] = "У вас нет прав для выполнения этого действия!";
        }
        
        header('Location: '.$HOME.'ass/');
        exit();
    } else {
        $_SESSION['err'] = "Такого сообщения не существует!";
        header('Location: '.$HOME.'ass/');
        exit();
    }
    break;

}




echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'Administrations/"><img src="/images/corp2.png" width="24" height="24"> Помощь модератора</a>';







if($user['level'] == 3){
echo '<a class="btnl mt4" href="?Reset_chat/"><img src="/images/1.png" width="20" height="22"> Очистить чат</a>';


if(isset($_GET['Reset_chat/'])){
$_SESSION['err'] = 'Вы уверены, что хотите очистить ЧАТ ?
<div class="mt4"><a class="btni accept" href="?Reset_chat_/"><img src="/images/accept48.png" alt="" width="24" height="24"> Подтверждаю</a>
<a class="btni decline" href="?"><img src="/images/cross.png" alt="" width="24" height="24"> Отмена</a></div>';
header("Location: ?");
exit();
}


if(isset($_GET['Reset_chat_/'])){
if($user['level'] != 3){
header('Location: ?');
exit();
}
mysql_query("UPDATE `users` SET `ass` = '0' WHERE `id` ");
mysql_query('DELETE FROM `ass` WHERE `id` ');
$_SESSION['err'] = 'Чат очищен!';
header('Location: ?');
exit();
}

}







require_once ('../system/footer.php');
?>