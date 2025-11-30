<?php
$title = 'Замена мата';
require_once ('../system/function.php');
require_once ('../system/header.php');
if(!$user['id'] or $user['level'] < 1) {
header('Location: '.$HOME.'');
exit();
}




echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';









if(isset($_REQUEST['add'])){
If($user['level'] < 1){
header('Location: /');
exit();
}
$name = strong($_POST['name']);
$zamena = strong($_POST['zamena']);

if(empty($name)) {
$_SESSION['err']='<font color=red>Введите мат!</font>';
header ('Location: ?');
exit();
}

if(empty($name)) {
$_SESSION['err']='<font color=red>Введите замену мату!</font>';
header ('Location: ?');
exit();
}

mysql_query("INSERT INTO `mat` (`name`, `zamena`) VALUES ( '$name', '$zamena');");
header ('Location: ?');
exit();
}











echo '<form method="POST" action="">
<div>Мат:<br /><input type="text" name="name" maxlength="200" /></div>
<div>Замена:<br /><input type="text" name="zamena" maxlength="200" /></div>
<input class="mt4" type="submit" name="add" value="Добавить">
</form>';


echo '</center></div>';








echo '<br><div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">Добавленные маты:</span></li></ul></div><br>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';




$max = '1000';
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `mat`"),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;

$sites = mysql_query("SELECT * FROM `mat` ORDER BY `id` DESC LIMIT $start, $max");
while($s = mysql_fetch_assoc($sites)){
echo '</a>Мат: '.$s['name'].' => '.$s['zamena'].'</a><a href="?Delete_'.$s['id'].'/"> [уд]</a><hr>';

if(isset($_GET['Delete_'.$s['id'].'/'])){
mysql_query("DELETE FROM `mat` WHERE `id` = '".$s['id']."'");
header ('Location: ?');
exit();
}

}

if ($k_page>1) 
echo str(''.$HOME.'MatReplacement/?',$k_page,$page); // Вывод страниц

if($k_post == 0) echo '<center><b>Матов нет!</b></center>';











echo '</center></div>';
echo '<a class="btnl mt4" href="'.$HOME.'GX3uBxGG7mzppanel52466X3uBx46GG7mzp/"><img src="/images/header/arrow_left_white2.png" width="12" height="12" alt="" title=""> Вернутся</a>';



require_once ('../system/footer.php');
?>