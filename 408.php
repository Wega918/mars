<?php
require_once ('system/function.php');
require_once ('system/header.php');

?><script language="JavaScript">
if (typeof jsInterface != 'undefined') {
jsInterface.set('code', '408');
jsInterface.process('error');
var div = document.body.children[0];
if (div != null) div.style.display = 'none';
}
</script><?

echo '<div class = "trnt-block"><div class = "wrap1"><div class = "wrap2"><div class = "wrap3"><div class = "wrap4"><div class = "wrap5"><div class = "wrap6"><div class = "wrap7"><div class = "wrap8"><div class = "wrap-content">';
echo '<center>Ошибка 408: Время ожидания сервером передачи от клиента истекло.</center>';
echo '</div></div></div></div></div></div></div></div></div>';




echo '<div class = "trnt-block"><div class = "wrap1"><div class = "wrap2"><div class = "wrap3"><div class = "wrap4"><div class = "wrap5"><div class = "wrap6"><div class = "wrap7"><div class = "wrap8"><div class = "wrap-content">';
echo 'К сожалению, Время ожидания сервером передачи от клиента истекло.<br><br>
<font color = grey size=3>Наиболее частые причины, приводящие к данной ошибке, следующие:</font>
<li>Прерывистое подключение к интернету;</li>
<li>Переход по ошибочной ссылке;</li>
<li>Неправильный ввод адреса.</li>';
echo '</div></div></div></div></div></div></div></div></div>';

require_once ('system/footer.php');
?> 