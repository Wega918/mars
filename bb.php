<?php
$title = 'BB коды';
require_once ('system/function.php');
require_once ('system/header.php');
if(!$user['id']) {
header('Location: '.$HOME.'');
exit();
}


?>
<script>new Clipboard('.btn-clipboard');</script>
<script src="clipboard.min.js"></script><script>new Clipboard('pre+button');</script>  
<script src="<?=$HOME?>js/clipboard.min.js"></script>
<?





echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">Цвета шрифта</span></li></ul></div>';

echo '<div class="bordered mt4" style="padding: 15 10px 10px 20;">';
if (empty($user['max'])) $user['max']=10;
$max = 200;
$k_post = mysql_result(mysql_query("SELECT COUNT(*) FROM `biznes` WHERE `id` "),0);
$k_page = k_page($k_post,$max);
$page = page($k_page);
$start = $max*$page-$max;
$k_post = $start+1;
$q = mysql_query("SELECT * FROM `biznes` WHERE `id` LIMIT $start,$max");
while($post = mysql_fetch_assoc($q)){



if($post['id'] == 1){$color = '40E0D0';}
if($post['id'] == 2){$color = 'B22222';}
if($post['id'] == 3){$color = 'FA8072';}
if($post['id'] == 4){$color = 'D2691E';}
if($post['id'] == 5){$color = 'F4A460';}
if($post['id'] == 6){$color = 'FF8C00';}
if($post['id'] == 7){$color = 'B8860B';}
if($post['id'] == 8){$color = 'DAA520';}
if($post['id'] == 9){$color = '808000';}
if($post['id'] == 10){$color = '7FFF00';}
if($post['id'] == 11){$color = '00FF00';}
if($post['id'] == 12){$color = '32CD32';}
if($post['id'] == 13){$color = '00FF7F';}
if($post['id'] == 14){$color = '00FA9A';}
if($post['id'] == 15){$color = '20B2AA';}
if($post['id'] == 16){$color = '48D1CC';}
if($post['id'] == 17){$color = '008080';}
if($post['id'] == 18){$color = '008B8B';}
if($post['id'] == 19){$color = '00CED1';}
if($post['id'] == 20){$color = '00FFFF';}
if($post['id'] == 21){$color = '00BFFF';}
if($post['id'] == 22){$color = '4169E1';}
if($post['id'] == 23){$color = '00008B';}
if($post['id'] == 24){$color = '0000CD';}
if($post['id'] == 25){$color = '8A2BE2';}
if($post['id'] == 26){$color = '9932CC';}
if($post['id'] == 27){$color = '9400D3';}
if($post['id'] == 28){$color = '8B008B';}
if($post['id'] == 29){$color = 'FF00FF';}
if($post['id'] == 30){$color = 'C71585';}
if($post['id'] == 31){$color = 'F81493';}
if($post['id'] == 32){$color = 'FF69B4';}
if($post['id'] == 33){$color = 'CD5C5C';}
if($post['id'] == 34){$color = 'BC8F8F';}
if($post['id'] == 35){$color = 'F08080';}
if($post['id'] == 36){$color = 'FFFAFA';}
if($post['id'] == 37){$color = 'FFE4E1';}
if($post['id'] == 38){$color = 'E9967A';}
if($post['id'] == 39){$color = 'FFA07A';}
if($post['id'] == 40){$color = 'A0522D';}
if($post['id'] == 41){$color = 'FFF5EE';}
if($post['id'] == 42){$color = '8B4513';}
if($post['id'] == 43){$color = 'FFDAB9';}
if($post['id'] == 44){$color = 'CD853F';}
if($post['id'] == 45){$color = 'FAF0E6';}
if($post['id'] == 46){$color = 'FFE4C4';}
if($post['id'] == 47){$color = 'DEB887';}
if($post['id'] == 48){$color = 'D2B48C';}
if($post['id'] == 49){$color = 'FAEBD7';}
if($post['id'] == 50){$color = 'FFDEAD';}
if($post['id'] == 51){$color = 'FFEBCD';}
if($post['id'] == 52){$color = 'FFEFD5';}
if($post['id'] == 53){$color = 'F5DEB3';}
if($post['id'] == 54){$color = 'FDF5E6';}
if($post['id'] == 55){$color = 'FFFAF0';}
if($post['id'] == 56){$color = 'FFF5DC';}
if($post['id'] == 57){$color = 'F0E68C';}
if($post['id'] == 58){$color = 'FFFACD';}
if($post['id'] == 59){$color = 'EEE8AA';}
if($post['id'] == 60){$color = 'B0B76B';}
if($post['id'] == 61){$color = 'F5F5DC';}
if($post['id'] == 62){$color = 'FAFAD2';}
if($post['id'] == 63){$color = 'FFFFE0';}
if($post['id'] == 64){$color = 'FFFFF0';}
if($post['id'] == 65){$color = '6BBE23';}
if($post['id'] == 66){$color = '228B22';}
if($post['id'] == 67){$color = '90EE90';}
if($post['id'] == 68){$color = '98FB98';}
if($post['id'] == 69){$color = 'F0FFF0';}
if($post['id'] == 70){$color = '2E8B57';}
if($post['id'] == 71){$color = 'F5FFFA';}
if($post['id'] == 72){$color = '3CB371';}
if($post['id'] == 73){$color = '66CDAA';}
if($post['id'] == 74){$color = '7FFFD4';}
if($post['id'] == 75){$color = '2F4F4F';}
if($post['id'] == 76){$color = 'AFEEEE';}
if($post['id'] == 77){$color = 'E0FFFF';}
if($post['id'] == 78){$color = 'B0E0E6';}
if($post['id'] == 79){$color = 'ADD8E6';}
if($post['id'] == 80){$color = '87CEEB';}
if($post['id'] == 81){$color = '87CEFA';}
if($post['id'] == 82){$color = '4682B4';}
if($post['id'] == 83){$color = 'B0C4DE';}
if($post['id'] == 84){$color = '6495ED';}
if($post['id'] == 85){$color = 'F6E6FA';}
if($post['id'] == 86){$color = 'F8F8FF';}
if($post['id'] == 87){$color = '191970';}
if($post['id'] == 88){$color = '6A5ACD';}
if($post['id'] == 89){$color = '7B68EE';}
if($post['id'] == 90){$color = '9370DB';}
if($post['id'] == 91){$color = '483D8B';}
if($post['id'] == 92){$color = '4B0082';}
if($post['id'] == 93){$color = 'DDA0DD';}
if($post['id'] == 94){$color = 'EE82EE';}
if($post['id'] == 95){$color = 'D8BFD8';}
if($post['id'] == 96){$color = 'DA70D6';}
if($post['id'] == 97){$color = 'FFF0F5';}
if($post['id'] == 98){$color = 'DB7093';}
if($post['id'] == 99){$color = 'FFC0CB';}
if($post['id'] == 100){$color = 'FFB6C1';}
if($post['id'] == 101){$color = '696969';}
if($post['id'] == 102){$color = 'A9A9A9';}
if($post['id'] == 103){$color = 'D3D3D3';}
if($post['id'] == 104){$color = 'DCDCDC';}
if($post['id'] == 105){$color = 'F5F5F5';}
if($post['id'] == 106){$color = '003300';}
if($post['id'] == 107){$color = '009933';}
if($post['id'] == 108){$color = '33CC33';}
if($post['id'] == 109){$color = '99FF99';}
if($post['id'] == 110){$color = '336600';}
if($post['id'] == 111){$color = '009900';}
if($post['id'] == 112){$color = '66FE33';}
if($post['id'] == 113){$color = '99FF66';}
if($post['id'] == 114){$color = 'CCFF99';}
if($post['id'] == 115){$color = '006600';}
if($post['id'] == 116){$color = '00CC00';}
if($post['id'] == 117){$color = '00FF00';}
if($post['id'] == 118){$color = '66FF99';}
if($post['id'] == 119){$color = '339933';}
if($post['id'] == 120){$color = '00CC66';}
if($post['id'] == 121){$color = '00FF99';}
if($post['id'] == 122){$color = '333300';}
if($post['id'] == 123){$color = '669900';}
if($post['id'] == 124){$color = '99FF33';}
if($post['id'] == 125){$color = 'CCFF66';}
if($post['id'] == 126){$color = '666633';}
if($post['id'] == 127){$color = '99CC00';}
if($post['id'] == 128){$color = 'CCFF33';}
if($post['id'] == 129){$color = 'FFFF66';}
if($post['id'] == 130){$color = '999966';}
if($post['id'] == 131){$color = 'CCCC00';}
if($post['id'] == 132){$color = 'FFFF00';}
if($post['id'] == 133){$color = 'FFCC00';}
if($post['id'] == 134){$color = '339966';}
if($post['id'] == 135){$color = '00CC99';}
if($post['id'] == 136){$color = '00FFCC';}
if($post['id'] == 137){$color = '00FFFF';}
if($post['id'] == 138){$color = '669999';}
if($post['id'] == 139){$color = '009999';}
if($post['id'] == 140){$color = '33CCCC';}
if($post['id'] == 141){$color = '00CCFF';}
if($post['id'] == 142){$color = '006666';}
if($post['id'] == 143){$color = '006699';}
if($post['id'] == 144){$color = '0099CC';}
if($post['id'] == 145){$color = '003333';}
if($post['id'] == 146){$color = '336699';}
if($post['id'] == 147){$color = '3366CC';}
if($post['id'] == 148){$color = '000066';}
if($post['id'] == 149){$color = '0000CC';}
if($post['id'] == 150){$color = '009999';}
if($post['id'] == 151){$color = '003399';}
if($post['id'] == 152){$color = '333399';}
if($post['id'] == 153){$color = '3333FE';}
if($post['id'] == 154){$color = '00FFFF';}
if($post['id'] == 155){$color = '0033CC';}
if($post['id'] == 156){$color = '0066CC';}
if($post['id'] == 157){$color = '3333CC';}
if($post['id'] == 158){$color = '3366FF';}
if($post['id'] == 159){$color = '0066FF';}
if($post['id'] == 160){$color = '0099FF';}
if($post['id'] == 161){$color = '6600CC';}
if($post['id'] == 162){$color = '6600FF';}
if($post['id'] == 163){$color = '5F9EA0';}
if($post['id'] == 164){$color = '6666FF';}
if($post['id'] == 165){$color = '6699FF';}
if($post['id'] == 166){$color = '3399FF';}
if($post['id'] == 167){$color = '33CCFF';}
if($post['id'] == 168){$color = '9900FF';}
if($post['id'] == 169){$color = '9933FF';}
if($post['id'] == 170){$color = '9966FF';}
if($post['id'] == 171){$color = '9999FF';}
if($post['id'] == 172){$color = '99FFCC';}
if($post['id'] == 173){$color = '66CCFF';}
if($post['id'] == 174){$color = '66FFFF';}
if($post['id'] == 175){$color = '66FFCC';}
if($post['id'] == 176){$color = '9900CC';}
if($post['id'] == 177){$color = 'CC00FF';}
if($post['id'] == 178){$color = 'CC33FF';}
if($post['id'] == 179){$color = 'CC66FF';}
if($post['id'] == 180){$color = 'CCFFFF';}
if($post['id'] == 181){$color = '99FFCC';}
if($post['id'] == 182){$color = '000000';}
if($post['id'] == 183){$color = '333333';}
if($post['id'] == 184){$color = '666666';}
if($post['id'] == 185){$color = '808080';}
if($post['id'] == 186){$color = '999999';}
if($post['id'] == 187){$color = 'C0C0C0';}
if($post['id'] == 188){$color = 'CCCCCC';}
if($post['id'] == 189){$color = 'FFFFFF';}
if($post['id'] == 190){$color = '660066';}
if($post['id'] == 191){$color = 'CC00CC';}
if($post['id'] == 192){$color = 'FF00FF';}
if($post['id'] == 193){$color = 'FF66FF';}
if($post['id'] == 194){$color = 'FF99FF';}
if($post['id'] == 195){$color = 'CCFFCC';}
if($post['id'] == 196){$color = '993399';}
if($post['id'] == 197){$color = 'CC0099';}
if($post['id'] == 198){$color = 'FF33CC';}
if($post['id'] == 199){$color = 'FF66CC';}
if($post['id'] == 200){$color = 'FF99CC';}
if($post['id'] == 201){$color = 'FFCCCC';}
if($post['id'] == 202){$color = 'FFFFCC';}
if($post['id'] == 203){$color = '990099';}
if($post['id'] == 204){$color = 'CC3399';}
if($post['id'] == 205){$color = 'FF3399';}
if($post['id'] == 206){$color = 'FF6699';}
if($post['id'] == 207){$color = 'FF9999';}
if($post['id'] == 208){$color = 'FFCC99';}
if($post['id'] == 209){$color = 'FFFF99';}
if($post['id'] == 210){$color = '993366';}
if($post['id'] == 211){$color = 'CC6699';}
if($post['id'] == 212){$color = 'FF0066';}
if($post['id'] == 213){$color = 'FF6666';}
if($post['id'] == 214){$color = 'FF9966';}
if($post['id'] == 215){$color = 'FFCC66';}
if($post['id'] == 216){$color = '660033';}

?>
<style>.btni<?=$post['id']?>, .pg, .subi {font-size: 0.8em;display: inline-block;line-height: 29px;}.btni<?=$post['id']?>, .pg {background-color: #<?=$color?>;}</style>
<a class="btni<?=$post['id']?>" style="padding: 0 15px 15px 0; margin:-4px;"></a> <font size=1> -- [<?=$color?>] ТЕКС [/<?=$color?>]</font><br>
<?
}

echo '</div>';




















?>
<script>new Clipboard('.btn-clipboard');</script>
<script src="clipboard.min.js"></script><script>new Clipboard('pre+button');</script>  
<script src="<?=$HOME?>js/clipboard.min.js"></script>
<?











echo '<div class="feedback"><ul class="feedbackPanel"><li class="feedbackPanelERROR"><span class="feedbackPanelERROR">'.$title.'</span></li></ul></div>
<div class="bordered mt4" style="padding: 0 4px 4px 0;"><center>';




echo '  
Цитировать <br /><textarea>[cit]Текст цитаты[/cit]</textarea> <br>
 <a href="'.$HOME.'">Ссылка</a><br /><textarea>[url=mars-games.ru/]Ссылка[/url]</textarea> <br>
<b>Жирный шрифт</b><br /><textarea>[b]Текст[/b]</textarea><br>
   <i>Курсив</i><br /><textarea>[i]Текст[/i]</textarea> <br>
   <u>Подчеркнутый</u><br /><textarea>[u]Текст[/u]</textarea><br>
   <s>Зачеркнутый</s><br /><textarea>[s]Текст[/s]</textarea> <br>
   <tt>Шрифт печатной машинки</tt><br /><textarea>[tt]Текст[/tt]</textarea> <br>
   <span style=" img">Фото</span><br /><textarea>[img]Ссылка на фото[/img]</textarea> <br>
   <span style=" img">Фото</span><br /><textarea>[img=50]Ссылка на фото c размером 50рх[/img]</textarea> <br>

Текст по центру<br /><textarea>[center]Текст[/center]</textarea> <br>
Отступ<br /><textarea>[br]Текст[/br]</textarea> <br>
Размер шрифта<br /><textarea>[size=5]Текст[/size]</textarea> <br>';
  
  
  echo '</center></div>';
echo '<a class="btnl" style="margin-top:2px;" href="'.$HOME.'forum/razdel/2/"><img src="/images/header/arrow_left_white2.png" width="12" height="12"> Вернуться</a>';

require_once ('system/footer.php');
?> 