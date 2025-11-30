<?php
require_once ('system/header.php');


echo '<body><table style="width:100%;" cellspacing="0" cellpadding="0">
<tbody><tr><td style="padding:0 1px 0 0;"></td><td style="width: 52px;">
</td></tr></tbody></table><div class="center"></div><div></div>
<div style="color: #2b577f;" class="big content">Не кликайте так быстро!</div>

<div>

<a class="btnl" href="/">Обновить</a></div></body>';

mysql_query("UPDATE `users` SET `time_click` = '".($user['time_click'] = time() )."' WHERE `id`='".$user['id']."' ");
require_once ('system/footer.php');
?> 