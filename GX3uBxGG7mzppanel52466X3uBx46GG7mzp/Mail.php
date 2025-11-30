<?php
$title = 'Почта ';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}
$kol = mysql_result(mysql_query("SELECT COUNT(*) FROM `message` WHERE `id` "),0);

echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.': '.$kol.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';


if (empty($user['max'])) $user['max']=20;
$max = 200;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `message` WHERE `komy`!='".$user['id']."' and  `kto`!='1' and  `kto`!='2'"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$message = mysql_query("SELECT * FROM `message` WHERE `komy`!='1' and  `kto`!='1' and  `kto`!='2' and  `kto`!='2' ORDER BY `time`  DESC LIMIT $start, $max");
while($a = mysql_fetch_assoc($message)){
$kto = $a['kto'] ;
$komy = $a['komy'] ;

echo 'Кто '.nick($a['kto']).' <br>Kому  '.nick($a['komy']).' ('.vremja($a['time']).')
<br>'.$a['text'].'<br>
<a href="?delete_'.$a['id'].'/">Удалить</a>
<hr>';


if(isset($_GET['delete_'.$a['id'].'/'])){
mysql_query('DELETE FROM `message` WHERE `id` = '.$a['id'].' ');
header('Location: ?');
exit();
}


}





if ($k_page>1) echo str(''.$HOME.'Mail/?',$k_page,$page); // Вывод страниц



echo '</center></div>';

echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернуться</a>';

require_once ('../system/footer.php');
?>