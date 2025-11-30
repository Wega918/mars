<?php
$title = 'Помощь';
//-----Подключаем функции-----//
require_once ('../system/function.php');
//-----Подключаем вверх-----//
require_once ('../system/header.php');

?>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ffffff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #333333;
    }
    .tab-content {
      margin-top: 20px;
    }
    .emoji {
      font-size: 1.2em;
    }
    .btn-custom {
      margin: 5px;
    }
    .container, .container-md, .container-sm {
        max-width: 460px;
    }
	.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.2;
    color: var(--bs-heading-color);
	font-size: 1.5em;
}







.nav-tabs {
  display: flex;
  flex-wrap: wrap; /* позволяет переносить вкладки */
  justify-content: space-between; /* равномерно распределяет */
  gap: 5px;
  max-width: 100%;
}

.nav-tabs .nav-item {
  flex: 1 1 auto; /* вкладки растягиваются по ширине */
  min-width: 100px; /* минимальная ширина одной вкладки */
}

.nav-tabs .nav-link {
  text-align: center;
  font-size: 14px;
  padding: 8px 10px;
  width: 100%; /* чтобы кнопка заняла всю ширину родителя */
  box-sizing: border-box;
}


  </style>
  
  
  
  
</head>
<?


echo '<div style="color: #2b577f;" class="big content">Общая информация / Помощь</div>';



echo '<body>


<div class="center">
</div>

<div>
</div>

<div><img src="/images/index/start_logo.jpg" alt="" style="width:100%; border-radius: 8px;"></div>

<a class="btnl mt4" href="'.$HOME.'rules/"><img width="24" height="24" alt="" src="/images/arrow_down2.png"> Соглашение</a>






  <div class="container1" style="max-width: 460px; margin: 10px auto;">
    <h1 class="text-center">🌌 Марсианские Бизнесмены</h1>
    <p class="text-center">🚀 Увеличивайте пассивный доход,<br> развивая бизнесы на Марсе!</p>

    <!-- Навигационные вкладки -->
    <ul class="nav nav-tabs" id="gameTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">📖 Обзор</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="locations-tab" data-bs-toggle="tab" data-bs-target="#locations" type="button" role="tab">📍 Локации</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="vip-tab" data-bs-toggle="tab" data-bs-target="#vip" type="button" role="tab">👑 ViP-зона</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button" role="tab">⚙️ Возможности</button>
      </li>
    </ul>

    <!-- Содержимое вкладок -->
    <div class="tab-content" id="gameTabsContent">
      <!-- Обзор -->
      <div class="tab-pane fade show active" id="overview" role="tabpanel">
        <h3>🎯 Главная цель</h3>
        <p>Увеличить пассивный доход, развивая собственные бизнесы на Марсе. Доход в виде монет начисляется автоматически и продолжает накапливаться даже при отсутствии игрока в сети.</p>
        <p>Возвращаясь в игру, вы сможете инвестировать накопленные средства для дальнейшего роста.</p>

        <h3>🚀 Космический мусор</h3>
        <p>Достигнув определённого уровня дохода, вы получите возможность приобретать космический мусор, открывая доступ к уникальным коллекционным предметам и дополнительным бонусам.</p>

        <h3>🛂 Марсианское гражданство</h3>
        <p>Доступна опция получения марсианского гражданства, предоставляющая расширенные привилегии и ускоряющая игровой прогресс.</p>

        <h3>🎒 Обмены</h3>
        <p>В меню доступны обмены: вы можете конвертировать рубины в монеты или космический мусор, оптимизируя тем самым свою экономическую стратегию.</p>

        <h3>👼 Бизнес-ангелы</h3>
        <p>За сброс прогресса вы получаете бизнес-ангелов, каждый из которых увеличивает доход на 1%. При этом все коллекционные предметы сохраняются. Количество ангелов зависит от достигнутого дохода перед сбросом.</p>
      </div>

      <!-- Локации -->
      <div class="tab-pane fade" id="locations" role="tabpanel">
        <h3>📋 Доступные локации</h3>
        <ul>
          <li>🪓 <strong>Шахта</strong>: Добыча рубинов, камней и алмазов. Эффективность зависит от уровня шахты. Доступна активация временных усилений.</li>
          <li>🎟️ <strong>Лотерея</strong>: Регулярный розыгрыш рубинов между игроками. Возможны как выигрыши, так и неудачи, включая шанс сорвать джекпот.</li>
          <li>🔄 <strong>Шлюз</strong>: Поиск космического мусора, усиливающего пассивный доход. Доступен раз в 2 часа.</li>
          <li>🛸 <strong>Экспедиция</strong>: Отправка корабля в космос для получения случайных ресурсов и бонусов. Пригласите друга для ускорения экспедиции.</li>
          <li>⚔️ <strong>Сражения</strong>: Бои за контроль над одной из 8 планет, проходящие каждые 2 часа. Получайте ресурсы и развивайте персонажа.</li>
          <li>🌱 <strong>Грядки</strong>: Выращивание растений, увеличивающих бонус при сбросе бизнесов.</li>
          <li>🏦 <strong>Банк</strong>: Повышение дохода, улучшение карты, обмен ресурсов и приобретение карты сброса.</li>
        </ul>
      </div>

      <!-- ViP-зона -->
      <div class="tab-pane fade" id="vip" role="tabpanel">
        <h3>👑 ViP-зона</h3>
        <ul>
          <li>⚡ <strong>Множители дохода</strong>: Активируйте для увеличения прибыли.</li>
          <li>🎁 <strong>ViP-бонусы</strong>: Ускорение прироста ангелов, усиление космического мусора, бонусы на обмен и др.</li>
          <li>🚀 <strong>Премиальные ускорители</strong>: Временное увеличение параметров.</li>
          <li>🏆 <strong>Турнир недели</strong>: 7-дневное соревнование между игроками с выдачей кубков за выполнение задач.</li>
          <li>💎 <strong>ViP-награды</strong>: Расширенные возможности для владельцев гражданства, включая уникальные визуальные эффекты.</li>
        </ul>
      </div>

      <!-- Возможности -->
      <div class="tab-pane fade" id="features" role="tabpanel">
        <h3>🧩 Задания</h3>
        <p>Разнообразные квесты с ценными наградами за выполнение.</p>

        <h3>🌀 Престиж</h3>
        <p>Система пассивного повышения дохода за счёт приобретения престижных уровней.</p>

        <h3>🎁 Сундуки</h3>
        <p>Выдаются в разных локациях. Содержат:</p>
        <ul>
          <li>💎 Рубины</li>
          <li>🔑 Ключи</li>
          <li>🧬 Космический мусор</li>
          <li>📈 Множители дохода</li>
        </ul>

        <h3>🏅 Турниры</h3>
        <p>Проходят каждые 3 дня, предоставляя возможность получить ресурсы и эксклюзивные награды за активность и достижения.</p>

        <h3>🎰 Rubin of Fortune</h3>
        <p>Мини-игра с возможностью сделать ставку рубинами и попытаться увеличить их количество. Испытайте удачу!</p>

        <h3>🏢 Корпорация</h3>
        <p>Объединение игроков, суммирующих количество бизнес-ангелов. Результат — значительное увеличение общего дохода благодаря коллективным усилиям.</p>

        <h3>🤝 Союз</h3>
        <p>Аналогично корпорации, но объединение происходит по ресурсу космического мусора. Совместное использование даёт ощутимый прирост пассивного дохода.</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


















<div class="content">






<br>
<div class="content">Обозначения больших чисел</div>

<div class="bordered mt4"><div class="place">
<b>1k</b> = тысяча
</div></div>
<div class="bordered"><div class="place">
<b>1m</b> = миллион
</div></div>
<div class="bordered"><div class="place">
<b>1b</b> = миллиард
</div></div>
<div class="bordered"><div class="place">
<b>1t</b> = триллион
</div></div>
<div class="bordered"><div class="place">
<b>1q</b> = квадриллион
</div></div>
<div class="bordered"><div class="place">
<b>1u</b> = квинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1x</b> = секстиллион
</div></div>
<div class="bordered"><div class="place">
<b>1y</b> = септиллион
</div></div>
<div class="bordered"><div class="place">
<b>1h</b> = октиллион
</div></div>
<div class="bordered"><div class="place">
<b>1s</b> = нониллион
</div></div>
<div class="bordered"><div class="place">
<b>1d</b> = дециллион
</div></div>
<div class="bordered"><div class="place">
<b>1v</b> = ундециллион
</div></div>
<div class="bordered"><div class="place">
<b>1w</b> = додециллион
</div></div>
<div class="bordered"><div class="place">
<b>1r</b> = тредециллион
</div></div>
<div class="bordered"><div class="place">
<b>1g</b> = кваттуордециллион
</div></div>
<div class="bordered"><div class="place">
<b>1n</b> = квиндециллион
</div></div>
<div class="bordered"><div class="place">
<b>1c</b> = седециллион
</div></div>
<div class="bordered"><div class="place">
<b>1p</b> = септдециллион
</div></div>
<div class="bordered"><div class="place">
<b>1o</b> = октодециллион
</div></div>
<div class="bordered"><div class="place">
<b>1z</b> = новемдециллион
</div></div>
<div class="bordered"><div class="place">
<b>1vi</b> = вигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1un</b> = анвигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1du</b> = дуовигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1tr</b> = тревигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1qu</b> = кватторвигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1qi</b> = квинвигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1se</b> = сексвигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1sp</b> = септемвигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1oc</b> = октовигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1nv</b> = новемвигинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1tn</b> = тригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ut</b> = антригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1dt</b> = дуотригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1aa</b> = третригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ab</b> = кваттортригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ac</b> = квинтригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ad</b> = секстригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ae</b> = септемтригинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1af</b> = октотригинтиллион
</div></div>

<div class="bordered"><div class="place">
<b>1ah</b> = квадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1ai</b> = унквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1aj</b> = дуоквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1ak</b> = треквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1al</b> = кватторквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1am</b> = квинквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1an</b> = сексквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1ao</b> = септемквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1ap</b> = октоквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1aq</b> = новемквадрагинтиллон
</div></div>
<div class="bordered"><div class="place">
<b>1ar</b> = квинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1as</b> = унквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1at</b> = дуоквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1au</b> = треквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1av</b> = кватторквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1aw</b> = квинквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ax</b> = сексквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ay</b> = септемквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1az</b> = октоквинквагинтиллион	
</div></div>
<div class="bordered"><div class="place">
<b>1ba</b> =  новемквинквагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bb</b> =  сексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bc</b> =  унсексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bd</b> =  досексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1be</b> =  тресексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bf</b> =  кватросексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bg</b> =  квинсексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bh</b> =  секссексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bi</b> =  септсексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bj</b> =  октосексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bk</b> =  новемсексагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bl</b> =  септогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bm</b> =  унсептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bn</b> =  досептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ba</b> =  тресептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bo</b> =  кватросептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bp</b> =  квинсептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bq</b> =  секссептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1br</b> =  септосептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bs</b> =  октосептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bt</b> =  новемсептогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bu</b> =  октогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bv</b> =  уноктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bw</b> =  дооктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bx</b> =  треоктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1by</b> =  кватрооктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1bz</b> =  квиноктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ca</b> =  сексоктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cb</b> =  септоктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cd</b> =  октооктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ce</b> =  новемоктогинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cf</b> =  нонагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cg</b> =  уннонагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ch</b> =  дононагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ci</b> =  тренонагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cj</b> =  кватрононагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1ck</b> =  квиннонагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cl</b> =  секснонагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cm</b> =  септононагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cn</b>=  октононагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1co</b> =  новемнонагинтиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cp</b> =  сентиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cq</b> =  унсентиллион
</div></div>
<div class="bordered"><div class="place">
<b>1cr</b> =  Гугол
</div></div>


<div class="bordered"><div class="place"> <b>1cs</b> = ундуцентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1ct</b> = дуодуцентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1cu</b> = тредецентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1cv</b> = кваттордецентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1cw</b> = квиндецентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1cx</b> = сексдецентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1cy</b> = септендецентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1cz</b> = октодецентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1da</b> = новемдецентиллион </div></div>
 <div class="bordered"><div class="place"> <b>1db</b> = вигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1dc</b> = унвигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1dd</b> = дуовигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1de</b> = тревигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1df</b> = кватторвигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1dg</b> = квинвигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1dh</b> = сексвигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1di</b> = септенвигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1dj</b> = октовигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1dk</b> = новемвигинтиллион </div></div>
  <div class="bordered"><div class="place"> <b>1dl</b> = тригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dm</b> = септенвигинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1dn</b> = октовигинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1do</b> = новемвигинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1dp</b> = тригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dq</b> = унтригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dr</b> = дуотригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ds</b> = тстритригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dt</b> = кватуортригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1du</b> = квинтригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dv</b> = сектригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dw</b> = септентригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dx</b> = октотригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dy</b> = новемтригентиллион </div></div>
<div class="bordered"><div class="place"> <b>1dz</b> = квадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ea</b> = унквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1eb</b> = дуоквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ec</b> = треквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ed</b> = кватуорквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ee</b> = квинквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ef</b> = сексагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1eg</b> = септенквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1eh</b> = октоквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ei</b> = новемквадрагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1ej</b> = квинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1ek</b> = унквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1el</b> = дуоквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1em</b> = треквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1en</b> = кватуорквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1eo</b> = квинквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1ep</b> = сексквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1eq</b> = септенквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1er</b> = октоквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1es</b> = новемквинквагинтиллион </div></div>
<div class="bordered"><div class="place"> <b>1et</b> = сексагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1eu</b> = сексагентиллидион </div></div>
<div class="bordered"><div class="place"> <b>1ev</b> = сексагентилливион </div></div>
<div class="bordered"><div class="place"> <b>1ew</b> = сексагентилливион </div></div>
<div class="bordered"><div class="place"> <b>1ex</b> = сексагентилликсион </div></div>
<div class="bordered"><div class="place"> <b>1ey</b> = сексагентиллийон </div></div>
<div class="bordered"><div class="place"> <b>1ez</b> = сексагентиллизон </div></div>
<div class="bordered"><div class="place"> <b>1fa</b> = септагентиллион </div></div>
<div class="bordered"><div class="place"> <b>1fb</b> = септагентиллибиллион </div></div>
<div class="bordered"><div class="place"> <b>1fc</b> = септагентилликиллион </div></div>
<div class="bordered"><div class="place"> <b>1fd</b> = септагентиллидион </div></div>
<div class="bordered"><div class="place"> <b>1fe</b> = септагентиллипентион </div></div>
<div class="bordered"><div class="place"> <b>1ff</b> = септагентиллифентион </div></div>
<div class="bordered"><div class="place"> <b>1fg</b> = септагентиллигексион </div></div>
<div class="bordered"><div class="place"> <b>1fh</b> = септагентиллигептион </div></div>
<div class="bordered"><div class="place"> <b>1fi</b> = септагентиллиионион </div></div>
<div class="bordered"><div class="place"> <b>1fj</b> = септагентиллидион </div></div>
<div class="bordered"><div class="place"> <b>1fk</b> = септагентилликаттион </div></div>
<div class="bordered"><div class="place"> <b>1fl</b> = септагентиллиллеттион </div></div>
<div class="bordered"><div class="place"> <b>1fm</b> = септагентиллимиллион </div></div>
<div class="bordered"><div class="place"> <b>1fn</b> = септагентиллиниллион </div></div>
<div class="bordered"><div class="place"> <b>1fo</b> = септагентиллосиллион </div></div>
<div class="bordered"><div class="place"> <b>1fp</b> = септагентиллипентиллион </div></div>
<div class="bordered"><div class="place"> <b>1fq</b> = септагентиллквиллион </div></div>

<div class="bordered"><div class="place"> <b>1fr</b> = септагентиллирион </div></div>
<div class="bordered"><div class="place"> <b>1fs</b> = септагентиллиссион </div></div>
<div class="bordered"><div class="place"> <b>1ft</b> = септагентиллитрион </div></div>
<div class="bordered"><div class="place"> <b>1fu</b> = септагентиллюон </div></div>
<div class="bordered"><div class="place"> <b>1fv</b> = септагентиллвион </div></div>
<div class="bordered"><div class="place"> <b>1fw</b> = септагентиллвион </div></div>
<div class="bordered"><div class="place"> <b>1fx</b> = септагентиллксион </div></div>
<div class="bordered"><div class="place"> <b>1fy</b> = септагентиллийон </div></div>
<div class="bordered"><div class="place"> <b>1fz</b> = септагентиллзон </div></div>
<div class="bordered"><div class="place"> <b>1ga</b> = октогентиллион </div></div>
<div class="bordered"><div class="place"> <b>1gb</b> = октогентиллибиллион </div></div>
<div class="bordered"><div class="place"> <b>1gc</b> = октогентилликиллион </div></div>
<div class="bordered"><div class="place"> <b>1gd</b> = октогентиллидион </div></div>
<div class="bordered"><div class="place"> <b>1ge</b> = октогентиллипентион </div></div>
<div class="bordered"><div class="place"> <b>1gf</b> = октогентиллифентион </div></div>
<div class="bordered"><div class="place"> <b>1gg</b> = октогентиллигексион </div></div>
<div class="bordered"><div class="place"> <b>1gh</b> = октогентиллигептион </div></div>
<div class="bordered"><div class="place"> <b>1gi</b> = октогентиллиионион </div></div>
<div class="bordered"><div class="place"> <b>1gj</b> = октогентиллидион </div></div>
<div class="bordered"><div class="place"> <b>1gk</b> = октогентилликаттион </div></div>
<div class="bordered"><div class="place"> <b>1gl</b> = октогентиллиллеттион </div></div>
<div class="bordered"><div class="place"> <b>1gm</b> = октогентиллимиллион </div></div>
<div class="bordered"><div class="place"> <b>1gn</b> = октогентиллиниллион </div></div>
<div class="bordered"><div class="place"> <b>1go</b> = октогентиллосиллион </div></div>
<div class="bordered"><div class="place"> <b>1gp</b> = октогентиллипентиллион </div></div>
<div class="bordered"><div class="place"> <b>1gq</b> = октогентиллквиллион </div></div>
<div class="bordered"><div class="place"> <b>1gr</b> = октогентиллирион </div></div>
<div class="bordered"><div class="place"> <b>1gs</b> = октогентиллиссион </div></div>
<div class="bordered"><div class="place"> <b>1gt</b> = октогентиллитрион </div></div>
<div class="bordered"><div class="place"> <b>1gu</b> = октогентиллюон </div></div>
<div class="bordered"><div class="place"> <b>1gv</b> = октогентиллвион </div></div>
<div class="bordered"><div class="place"> <b>1gw</b> = октогентиллвион </div></div>
<div class="bordered"><div class="place"> <b>1gx</b> = октогентиллксион </div></div>
<div class="bordered"><div class="place"> <b>1gy</b> = октогентиллийон </div></div>
<div class="bordered"><div class="place"> <b>1gz</b> = октогентиллзон </div></div>
<div class="bordered"><div class="place"> <b>1ha</b> = нонагентилион </div></div>
<div class="bordered"><div class="place"> <b>1hb</b> = нонагентилибиллион </div></div>
<div class="bordered"><div class="place"> <b>1hc</b> = нонагентиликиллион </div></div>
<div class="bordered"><div class="place"> <b>1hd</b> = нонагентилидион </div></div>
<div class="bordered"><div class="place"> <b>1he</b> = нонагентилипентион </div></div>
<div class="bordered"><div class="place"> <b>1hf</b> = нонагентилифентион </div></div>
<div class="bordered"><div class="place"> <b>1hg</b> = нонагентилигексион </div></div>
<div class="bordered"><div class="place"> <b>1hh</b> = нонагентилигептион </div></div>
<div class="bordered"><div class="place"> <b>1hi</b> = нонагентилиионион </div></div>
<div class="bordered"><div class="place"> <b>1hj</b> = нонагентилиджон </div></div>
<div class="bordered"><div class="place"> <b>1hk</b> = нонагентиликаттион </div></div>
<div class="bordered"><div class="place"> <b>1hl</b> = нонагентилиллеттион </div></div>
<div class="bordered"><div class="place"> <b>1hm</b> = нонагентилимиллион </div></div>
<div class="bordered"><div class="place"> <b>1hn</b> = нонагентилиниллион </div></div>
<div class="bordered"><div class="place"> <b>1ho</b> = нонагентилилосиллион </div></div>
<div class="bordered"><div class="place"> <b>1hp</b> = нонагентилипентиллион </div></div>
<div class="bordered"><div class="place"> <b>1hq</b> = нонагентиликвиллион </div></div>
<div class="bordered"><div class="place"> <b>1hr</b> = нонагентилионрион </div></div>
<div class="bordered"><div class="place"> <b>1hs</b> = нонагентилионссион </div></div>
<div class="bordered"><div class="place"> <b>1ht</b> = нонагентилионтрион </div></div>
<div class="bordered"><div class="place"> <b>1hu</b> = нонагентилионюон </div></div>
<div class="bordered"><div class="place"> <b>1hv</b> = нонагентилионвион </div></div>
<div class="bordered"><div class="place"> <b>1hw</b> = нонагентилионвион </div></div>
<div class="bordered"><div class="place"> <b>1hx</b> = нонагентилионксион </div></div>
<div class="bordered"><div class="place"> <b>1hy</b> = нонагентилионйион </div></div>
<div class="bordered"><div class="place"> <b>1hz</b> = нонагентилионзон </div></div>
<div class="bordered"><div class="place"> <b>1ia</b> = центиллион </div></div>
<div class="bordered"><div class="place"> <b>1ib</b> = центиллибиллион </div></div>
<div class="bordered"><div class="place"> <b>1ic</b> = центилликиллион </div></div>
<div class="bordered"><div class="place"> <b>1id</b> = центиллиондион </div></div>
<div class="bordered"><div class="place"> <b>1ie</b> = центиллипентион </div></div>
<div class="bordered"><div class="place"> <b>1if</b> = центиллифентион </div></div>
<div class="bordered"><div class="place"> <b>1ig</b> = центиллигексион </div></div>
<div class="bordered"><div class="place"> <b>1ih</b> = центиллигептион </div></div>
<div class="bordered"><div class="place"> <b>1ii</b> = центиллионион </div></div>
<div class="bordered"><div class="place"> <b>1ij</b> = центиллионджон </div></div>
<div class="bordered"><div class="place"> <b>1ik</b> = центилликаттион </div></div>
<div class="bordered"><div class="place"> <b>1il</b> = центиллиллеттион </div></div>
<div class="bordered"><div class="place"> <b>1im</b> = центиллимиллион </div></div>
<div class="bordered"><div class="place"> <b>1in</b> = центиллиниллион </div></div>
<div class="bordered"><div class="place"> <b>1io</b> = центиллосиллион </div></div>
<div class="bordered"><div class="place"> <b>1ip</b> = центиллипентиллион </div></div>
<div class="bordered"><div class="place"> <b>1iq</b> = центиллквиллион </div></div>
<div class="bordered"><div class="place"> <b>1ir</b> = центиллионрион </div></div>
<div class="bordered"><div class="place"> <b>1is</b> = центиллионссион </div></div>
<div class="bordered"><div class="place"> <b>1it</b> = центиллионтрион </div></div>
<div class="bordered"><div class="place"> <b>1iu</b> = центиллионюон </div></div>
<div class="bordered"><div class="place"> <b>1iv</b> = центиллионвион </div></div>
<div class="bordered"><div class="place"> <b>1iw</b> = центиллионвион </div></div>
<div class="bordered"><div class="place"> <b>1ix</b> = центиллионксион </div></div>
<div class="bordered"><div class="place"> <b>1iy</b> = центиллионйион </div></div>
<div class="bordered"><div class="place"> <b>1iz</b> = центиллионзон </div></div>


<a class="btnl mt4" href="'.$HOME.'tikets/"><img width="24" height="24" alt="" src="/images/arrow_down2.png"> Задать вопрос техподдержке</a>

</div></body>';













require_once ('../system/footer.php');
?>