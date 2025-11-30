<?php
require_once ('system/function.php');
require_once ('system/header.php');

?><script language="JavaScript">
if (typeof jsInterface != 'undefined') {
jsInterface.set('code', '400');
jsInterface.process('error');
var div = document.body.children[0];
if (div != null) div.style.display = 'none';
}
</script><?








$text = 'Lorem ipsum google.com dolor http://www.google.com sit amet https://google.com/';
if(preg_match("/https:\/\/|http:\/\/|[0-9a-z_]+\.[a-z\/]{2,4}/i", $text)){
$text = preg_replace("/(https:\/\/|http:\/\/|[0-9a-z_]+\.[a-z\/]{2,4})/i", "<s>$1</s>", $text);
}
echo $text;


echo '<br>';






echo '<div class = "trnt-block"><div class = "wrap1"><div class = "wrap2"><div class = "wrap3"><div class = "wrap4"><div class = "wrap5"><div class = "wrap6"><div class = "wrap7"><div class = "wrap8"><div class = "wrap-content">';
echo '<center>Ошибка 400: синтаксическая ошибка.</center>';
echo '</div></div></div></div></div></div></div></div></div>';


echo '<div class = "trnt-block"><div class = "wrap1"><div class = "wrap2"><div class = "wrap3"><div class = "wrap4"><div class = "wrap5"><div class = "wrap6"><div class = "wrap7"><div class = "wrap8"><div class = "wrap-content">';
echo 'К сожалению, Запрос не может быть исполнен ввиду синтаксической ошибки.<br><br>
<font color = grey size=3>Наиболее частые причины, приводящие к данной ошибке, следующие:</font>

<li>Пренебрежение правил протокола передачи!;</li>
<li>Переход по ошибочной ссылке;</li>
<li>Неправильный ввод адреса.</li>';
echo '</div></div></div></div></div></div></div></div></div>';

require_once ('system/footer.php');
?> 