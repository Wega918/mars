<?php
$title = 'Сражения';
//-----Подключаем функции-----//
require_once ('../../system/function.php');
//-----Подключаем вверх-----//
require_once ('../../system/header.php');
//-----Если гость,то...----//
if(!$user['id']) {
header('Location: /');
exit();
}


##############################################################################################################################################################################################
echo '<table style="width:100%" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'world/pve/"><font color=#e6e3e3 size=4><tt>PVE</tt></font></a></td><td style="width:1%;"></td>
<td style="vertical-align:top;width:50%;"><a class="btnl mt4" href="'.$HOME.'pve"><font color=#e6e3e3 size=4><tt>Сражения</tt></font></a></td>
</tr></tbody></table>';


echo '<div class="bordered" style="margin-top: 4px; position: relative;"><center><b>PVP - СРАЖЕНИЯ</b><hr>
<font size=4><tt>Локация в разработке.</tt></font>
<br></center></div>';


echo '<center><a class="btnl mt4" href="?">Обновить</a>';

echo '</span></li></ul></div>';
##############################################################################################################################################################################################









require_once ('../../system/footer.php');
?>