<?php
$title = 'Настройки сайта';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 3) {
header('Location: '.$HOME.'');
exit();
}
echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';








if(isset($_REQUEST['ok'])){
if($user['level'] != 3) {
header('Location: '.$HOME.'');
exit();
}
$key = strong($_POST['key']);
$des = strong($_POST['des']);
$cop = strong($_POST['cop']);
$max_lvl_biz = strong($_POST['max_lvl_biz']);
$s_online = strong($_POST['s_online']);

mysql_query("UPDATE `settings` SET 
`key` = '".mysql_real_escape_string($key)."',
`des` = '".mysql_real_escape_string($des)."', 
`cop` = '".mysql_real_escape_string($cop)."', 
`s_online` = '".mysql_real_escape_string($s_online)."', 
`max_lvl_biz` = '".mysql_real_escape_string($max_lvl_biz)."'
WHERE `id` = '1'");
$_SESSION['err'] = 'Настройки успешно изменены!';
header ('Location: ?');
exit();
}



echo '<form action="" method="POST">

Keywords:<br />
<input type="text" style="width: 95%;" name="key" value="'.$sql['key'].'"/> <br />

Description:<br />
<input type="text" style="width: 95%;" name="des" value="'.$sql['des'].'"/> <br />

Копирайт:<br />
<input type="text" style="width: 95%;" name="cop" value="'.$sql['cop'].'"/> <br />

Максимальный уровень прокачки бизнесов:<br />
<input type="text" style="width: 95%;" name="max_lvl_biz" value="'.$sql['max_lvl_biz'].'"/> <br />

Время онлайна:<br />
<input type="text" style="width: 95%;" name="s_online" value="'.$sql['s_online'].'"/> <br />


<input class="mt4" type="submit" name="ok" value="Установить">

</form>';








echo '</center></div>';

echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';
require_once ('../system/footer.php');
?>