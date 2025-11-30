<?php
$title = 'Список заблокированых';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 2) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';



if (empty($user['max'])) $user['max']=10;
$max = 100;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `ban`"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$ban = mysql_query("SELECT * FROM `ban` ORDER BY `time` DESC LIMIT $start,$max");
while($b = mysql_fetch_assoc($ban)){
echo ''.nick($b['user']).' =(забанил)=> '.nick($b['kto']).'
<br />(Дата бана: '.vremja($b['time']).')
<br />(Причина: '.$b['prich'].')
<br />[<a href="'.$HOME.'/Ban/'.$b['user'].'/">разбанить</a>]<br>
<b>Дата освобождения: '.date('d.m.Y в H:i',$b['time_end']).'</b><hr>';
}

if($k_post < 1){
echo '<div class="player"><center><b>Бан лист пуст!</b></center></div>';
}

if ($k_page > 1) {
echo str(''.$HOME.'SetingBan/',$k_page,$page); // Вывод страниц
}




echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');
?>