<?php
require_once ('system/function.php');
require_once ('system/header.php');

?><script language="JavaScript">
if (typeof jsInterface != 'undefined') {
jsInterface.set('code', '414');
jsInterface.process('error');
var div = document.body.children[0];
if (div != null) div.style.display = 'none';
}
</script><?

echo '<div class = "trnt-block"><div class = "wrap1"><div class = "wrap2"><div class = "wrap3"><div class = "wrap4"><div class = "wrap5"><div class = "wrap6"><div class = "wrap7"><div class = "wrap8"><div class = "wrap-content">';
echo '<center>Ошибка 414: сервер не может обработать запрос из-за слишком длинного указанного URL.</center>';
echo '</div></div></div></div></div></div></div></div></div>';




echo '<div class = "trnt-block"><div class = "wrap1"><div class = "wrap2"><div class = "wrap3"><div class = "wrap4"><div class = "wrap5"><div class = "wrap6"><div class = "wrap7"><div class = "wrap8"><div class = "wrap-content">';
echo 'К сожалению, сервер не может обработать запрос из-за слишком длинного указанного URL.<br><br>
<font color = grey size=3>Наиболее частые причины, приводящие к данной ошибке, следующие:</font>

<li>Переход по ошибочной ссылке;</li>
<li>Неправильный ввод адреса.</li>';
echo '</div></div></div></div></div></div></div></div></div>';



 $baseurl="https://api.kuna.io/v3/kuna_codes/zHQ4h/check";
$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, $baseurl);
curl_setopt($ch1, CURLOPT_HEADER, false);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch1);
$response1 = json_decode($response, true);
curl_close($ch1);

echo '1 '.$response.'

<Br>';
 
 
require_once ('system/footer.php');
?> 