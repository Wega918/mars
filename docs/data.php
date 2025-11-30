<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Прогноз графика TRUMP/USDT</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


    <script>
        // Получаем текущее время в UTC
        var utcTime = new Date().toISOString();
        document.getElementById("utcTime").innerHTML = utcTime;
    </script>
	
	
<body>
<?php


/* сделай прогноз используя все самые передовые алгоритмы для прогнозирования графика на ближайшие 5 минут использя php 
выведи в таком стиле всех параметров и используй их при расчете прогноза

Прогноз курса TRUMP/USDT (следующие 5 минут)
Текущий курс: 16.965 USDT
Прогноз на следующие 5 минут:
Время	Прогноз	Курс
06:00:14	📈 Рост	16.946 USDT
06:01:14	📉 Падение	16.943 USDT
06:02:14	📉 Падение	16.965 USDT
06:03:14	📈 Рост	16.969 USDT
06:04:14	📉 Падение	16.961 USDT

Данные по свечам (в UTC):
Время	Открытие	Закрытие	Макс. цена	Мин. цена	Объем	Торговая стоимость
2025-02-20 06:05:00	16.92	16.894	16.921	16.892	2601.4	43968.6336
2025-02-20 06:04:00	16.938	16.92	16.938	16.915	2920.7	49454.7484
2025-02-20 06:03:00	16.917	16.938	16.938	16.896	4102.4	69393.7757
2025-02-20 06:02:00	16.929	16.917	16.942	16.887	12727.9	215112.9659
2025-02-20 06:01:00	16.913	16.929	16.932	16.913	4573.3	77407.0301

Текущая цена (lastPrice): 16.893
Индексная цена (indexPrice): 16.910
Маркировочная цена (markPrice): 16.897
Цена за 24 часа назад (prevPrice24h): 16.223
Процент изменения за 24 часа (price24hPcnt): 0.041299
Максимальная цена за 24 часа (highPrice24h): 17.420
Минимальная цена за 24 часа (lowPrice24h): 16.221
Цена за последний час (prevPrice1h): 17.062
Открытый интерес (openInterest): 6111031.6
Торговый объем за 24 часа (turnover24h): 321225082.7331
Объем торгов за 24 часа (volume24h): 18959615.3000
Ставка финансирования (fundingRate): 0.00005
Время следующего расчета ставки финансирования (nextFundingTime): 1740038400000
Размер лучшего предложения (ask1Size): 493.9
Цена лучшего предложения (ask1Price): 16.894
Цена лучшего спроса (bid1Price): 16.893
Размер лучшего спроса (bid1Size): 567.5
 */

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('UTC');

// Убедимся, что для всех операций PHP будет использовать UTF-8
mb_internal_encoding("UTF-8");







// Функция для отправки запросов
function sendRequest($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Ошибка cURL: " . curl_error($ch);
        curl_close($ch);
        return null;
    }
    curl_close($ch);
    return json_decode($response, true);
}

// Получение параметров из URL (если они переданы)
$forecastInterval = isset($_GET['interval']) ? $_GET['interval'] : 'minute'; // По умолчанию - минута
$forecastPeriod = isset($_GET['period']) ? (int)$_GET['period'] : 5; // По умолчанию - 5 шагов
$recordsPerPage = isset($_GET['records']) ? (int)$_GET['records'] : 10; // Количество записей на странице

// Параметры запроса
$symbol = 'TRUMPUSDT';
$category = 'linear';

// Адаптация параметров запроса в зависимости от выбранного интервала
switch ($forecastInterval) {
    case 'minute':
        $interval = '1'; // 1 минута
        $timeUnit = 'minute';
        $secondsPerInterval = 60;
        break;
    case 'hour':
        $interval = '60'; // 1 час
        $timeUnit = 'hour';
        $secondsPerInterval = 3600;
        break;
    case 'day':
        $interval = 'D'; // 1 день
        $timeUnit = 'day';
        $secondsPerInterval = 86400;
        break;
    default:
        $interval = '1'; // По умолчанию - минута
        $timeUnit = 'minute';
        $secondsPerInterval = 60;
}

// Устанавливаем ограничения для запроса
$minSmaPeriod = 9; // Минимальный период для SMA(9)
$limit = max($forecastPeriod + 1, $minSmaPeriod); // Берем максимум из ($forecastPeriod + 1) и 9
$endTime = time() * 1000; // Текущее время в миллисекундах
$startTime = $endTime - ($limit * $secondsPerInterval * 1000); // Начало периода

// Запрос к API для получения данных свечей
$urlKline = "https://api.bybit.com/v5/market/kline?category=$category&symbol=$symbol&interval=$interval&limit=$limit&start=$startTime&end=$endTime";
$klineData = sendRequest($urlKline);

// Запрос к API для получения параметров рынка
$urlTickers = "https://api.bybit.com/v5/market/tickers?category=linear&symbol=$symbol";
$tickerData = sendRequest($urlTickers);

// Проверка данных
if (!$klineData || !$tickerData || !isset($klineData['result']['list']) || !isset($tickerData['result']['list'])) {
    echo "Ошибка при получении данных от API.";
    exit;
}

// Обработка данных свечей
$candles = array_reverse($klineData['result']['list']);
$times = [];
$opens = [];
$closes = [];
$highs = [];
$lows = [];
$volumes = [];

foreach ($candles as $candle) {
    $times[] = date("Y-m-d H:i", $candle[0] / 1000); // Преобразуем время
    $opens[] = floatval($candle[1]);
    $highs[] = floatval($candle[2]);
    $lows[] = floatval($candle[3]);
    $closes[] = floatval($candle[4]);
    $volumes[] = floatval($candle[5]);
}

// Обработка параметров рынка
$ticker = $tickerData['result']['list'][0];
$currentPrice = floatval($ticker['lastPrice']);
$indexPrice = floatval($ticker['indexPrice']);
$markPrice = floatval($ticker['markPrice']);
$prevPrice24h = floatval($ticker['prevPrice24h']);
$price24hPcnt = floatval($ticker['price24hPcnt']);
$openInterest = floatval($ticker['openInterest']);
$volume24h = floatval($ticker['volume24h']);
$fundingRate = floatval($ticker['fundingRate']);

// Расчет технических индикаторов
function calculate_rsi($prices, $period = 14) {
    if (count($prices) < $period) return 0;
    $gains = $losses = 0;
    for ($i = 1; $i <= $period && $i < count($prices); $i++) {
        $change = $prices[$i] - $prices[$i - 1];
        if ($change > 0) {
            $gains += $change;
        } else {
            $losses -= $change;
        }
    }
    $average_gain = $gains / $period;
    $average_loss = $losses / $period;
    $rs = $average_loss == 0 ? 100 : $average_gain / $average_loss;
    return 100 - (100 / (1 + $rs));
}

function calculate_sma($data, $period) {
    return array_sum(array_slice($data, -$period)) / $period;
}

function calculate_atr($highs, $lows, $closes, $period = 14) {
    $tr = [];
    for ($i = 1; $i < count($highs); $i++) {
        $tr[] = max(
            $highs[$i] - $lows[$i],
            abs($highs[$i] - $closes[$i - 1]),
            abs($lows[$i] - $closes[$i - 1])
        );
    }
    return array_sum(array_slice($tr, -$period)) / $period;
}

// Вычисление индикаторов
$rsi = calculate_rsi($closes);
$sma = calculate_sma($closes, 9); // Используем SMA(9)
$atr = calculate_atr($highs, $lows, $closes);

// Анализ тренда
$trend = '';
if ($currentPrice > $sma) {
    $trend = 'Bullish';
} elseif ($currentPrice < $sma) {
    $trend = 'Bearish';
} else {
    $trend = 'Neutral';
}

// Генерация прогноза с учетом тренда и ATR
$forecast = [];
$forecastPrice = $currentPrice;

// Рассчитываем среднее изменение цены за единицу времени
$priceChanges = [];
for ($i = 1; $i < count($closes); $i++) {
    $priceChanges[] = ($closes[$i] - $closes[$i - 1]) / $closes[$i - 1];
}
$averagePriceChange = array_sum($priceChanges) / count($priceChanges);

// Определяем коэффициент тренда
$trendFactor = 0;
if ($currentPrice > $sma) {
    $trendFactor = 0.5 * $averagePriceChange; // Бычий тренд
} elseif ($currentPrice < $sma) {
    $trendFactor = -0.5 * $averagePriceChange; // Медвежий тренд
}

// Учитываем ATR для корректировки прогноза
$atrFactor = $atr / $currentPrice; // Относительная волатильность
for ($i = 1; $i <= $forecastPeriod; $i++) {
    // Расчет прогнозируемой цены с учетом тренда и ATR
    $predictedChange = $averagePriceChange + $trendFactor + $atrFactor;
    $forecastPrice *= (1 + $predictedChange);
    $forecast[] = round($forecastPrice, 2);
}

// Вывод формы для выбора параметров
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<title>Прогноз графика TRUMP/USDT</title>';
echo '</head>';
echo '<body>';
echo '<h1>Выбор параметров прогноза</h1>';
echo '<form method="GET">';
echo '<label for="interval">Интервал прогноза:</label>';
echo '<select name="interval" id="interval">';
echo '<option value="minute" ' . ($forecastInterval === 'minute' ? 'selected' : '') . '>Минута</option>';
echo '<option value="hour" ' . ($forecastInterval === 'hour' ? 'selected' : '') . '>Час</option>';
echo '<option value="day" ' . ($forecastInterval === 'day' ? 'selected' : '') . '>День</option>';
echo '</select>';
echo '<br><br>';
echo '<label for="period">Количество шагов:</label>';
echo '<input type="number" name="period" id="period" value="' . htmlspecialchars($forecastPeriod) . '" min="1" max="100">';
echo '<br><br>';
echo '<label for="records">Количество записей на странице:</label>';
echo '<input type="number" name="records" id="records" value="' . htmlspecialchars($recordsPerPage) . '" min="1" max="100">';
echo '<br><br>';
echo '<button type="submit">Сделать прогноз</button>';
echo '</form>';
echo '<hr>';

// Вывод прогноза
echo "<h1>Прогноз графика TRUMP/USDT</h1>";
echo "<p>Текущее время: " . gmdate("Y-m-d H:i:s") . " UTC</p>";
echo "<h2>Текущее состояние рынка</h2>";
echo "<ul>";
echo "<li><strong>Текущая цена:</strong> $currentPrice USDT</li>";
echo "<li><strong>Индексная цена:</strong> $indexPrice USDT</li>";
echo "<li><strong>Маркировочная цена:</strong> $markPrice USDT</li>";
echo "<li><strong>Открытый интерес:</strong> $openInterest USDT</li>";
echo "<li><strong>Объем торгов за 24 часа:</strong> $volume24h USDT</li>";
echo "<li><strong>Ставка финансирования:</strong> " . ($fundingRate * 100) . "%</li>";
echo "</ul>";
echo "<h2>Технический анализ</h2>";
echo "<ul>";
echo "<li><strong>RSI:</strong> $rsi</li>";
echo "<li><strong>SMA (9):</strong> $sma</li>";
echo "<li><strong>ATR:</strong> $atr</li>";
echo "<li><strong>Тренд:</strong> $trend</li>";
echo "</ul>";

// Пагинация
$totalRecords = count($forecast);
$totalPages = ceil($totalRecords / $recordsPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$startIndex = ($page - 1) * $recordsPerPage;
$endIndex = min($startIndex + $recordsPerPage, $totalRecords);

echo "<h2>Прогноз на следующие $forecastPeriod $forecastInterval</h2>";
echo "<table border='1'>";
echo "<tr><th>Время</th><th>Прогнозируемая цена</th><th>Тренд</th></tr>";
for ($i = $startIndex; $i < $endIndex; $i++) {
    $timeIncrement = "+" . ($i + 1) . " $timeUnit";
    $time = gmdate("Y-m-d H:i", strtotime($timeIncrement));
    $trendDirection = $forecast[$i] > $currentPrice ? "Рост" : "Падение";
    echo "<tr><td>$time</td><td>{$forecast[$i]} USDT</td><td>$trendDirection</td></tr>";
}
echo "</table>";

// Пагинация
echo "<div style='margin-top: 20px;'>";
if ($page > 1) {
    echo "<a href='?interval=$forecastInterval&period=$forecastPeriod&records=$recordsPerPage&page=" . ($page - 1) . "'>Назад</a> ";
}
if ($page < $totalPages) {
    echo "<a href='?interval=$forecastInterval&period=$forecastPeriod&records=$recordsPerPage&page=" . ($page + 1) . "'>Вперед</a>";
}
echo "</div>";

echo '</body>';
echo '</html>';









/*  // Функция для отправки запросов
function sendRequest($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// Указываем параметры запроса
$symbol = 'TRUMPUSDT'; // Символ
$interval = '1'; // Интервал свечей (например, 1 минута)
$category = 'linear'; // Категория (linear, inverse или spot)
$limit = 6; // Ограничение на количество данных (5 минут)

$endTime = time() * 1000; // Текущее время в миллисекундах
$startTime = $endTime - (61 * 5 * 1000); // 5 мин назад в миллисекундах

// Формируем URL для запроса
$url = "https://api.bybit.com/v5/market/kline?category=$category&symbol=$symbol&interval=$interval&limit=$limit&start=$startTime&end=$endTime";

// Получаем данные с API
$data = sendRequest($url);

// Проверка получения данных
if ($data && isset($data['result']['list'])) {
    // Выводим данные с пояснением
    echo "<h2>Данные по свечам (в UTC):</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Время</th><th>Открытие</th><th>Закрытие</th><th>Макс. цена</th><th>Мин. цена</th><th>Объем</th><th>Торговая стоимость</th></tr>";

    foreach ($data['result']['list'] as $candle) { // цикл свечей начинается с последней завершонной свечи
        // Время свечи
        $time = date("Y-m-d H:i:s", $candle[0] / 1000); // Преобразуем миллисекунды в дату

        // Открытие, закрытие, максимальная и минимальная цена
        $open = $candle[1];
        $close = $candle[4];
        $high = $candle[2];
        $low = $candle[3];

        // Объем и торговая стоимость
        $volume = $candle[5];
        $turnover = $candle[6];

        // Выводим данные
        echo "<tr>";
        echo "<td>$time</td>";
        echo "<td>$open</td>";
        echo "<td>$close</td>";
        echo "<td>$high</td>";
        echo "<td>$low</td>";
        echo "<td>$volume</td>";
        echo "<td>$turnover</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Ошибка получения данных.";
}








// Вычисляем временные метки
$endTime = time() * 1000; // Текущее время в миллисекундах
$startTime = $endTime - (60 * 5 * 1000); // 5 мин назад в миллисекундах

// Указываем URL API
$url = "https://api.bybit.com/v5/market/tickers?category=linear&symbol=TRUMPUSDT&start=$startTime&end=$endTime";

// Инициализируем cURL сессию
$ch = curl_init();

// Устанавливаем URL для запроса
curl_setopt($ch, CURLOPT_URL, $url);

// Устанавливаем, чтобы результат не выводился напрямую, а возвращался
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Выполняем запрос
$response = curl_exec($ch);

// Проверяем на ошибки
if (curl_errno($ch)) {
    echo 'Ошибка CURL: ' . curl_error($ch);
} else {
    // Преобразуем ответ в массив
    $data = json_decode($response, true);
    
    // Проверяем, что данные были получены
    if (isset($data['result']['list']) && isset($data['result']['list'][0])) {
        $result = $data['result']['list'][0];
        
        // Выводим нужные параметры
        echo "Текущая цена (lastPrice): " . $result['lastPrice'] . "\n<br>";
        echo "Индексная цена (indexPrice): " . $result['indexPrice'] . "\n<br>";
        echo "Маркировочная цена (markPrice): " . $result['markPrice'] . "\n<br>";
        echo "Цена за 24 часа назад (prevPrice24h): " . $result['prevPrice24h'] . "\n<br>";
        echo "Процент изменения за 24 часа (price24hPcnt): " . $result['price24hPcnt'] . "\n<br>";
        echo "Максимальная цена за 24 часа (highPrice24h): " . $result['highPrice24h'] . "\n<br>";
        echo "Минимальная цена за 24 часа (lowPrice24h): " . $result['lowPrice24h'] . "\n<br>";
        echo "Цена за последний час (prevPrice1h): " . $result['prevPrice1h'] . "\n<br>";
        echo "Открытый интерес (openInterest): " . $result['openInterest'] . "\n<br>";
        echo "Торговый объем за 24 часа (turnover24h): " . $result['turnover24h'] . "\n<br>";
        echo "Объем торгов за 24 часа (volume24h): " . $result['volume24h'] . "\n<br>";
        echo "Ставка финансирования (fundingRate): " . $result['fundingRate'] . "\n<br>";
        echo "Время следующего расчета ставки финансирования (nextFundingTime): " . $result['nextFundingTime'] . "\n<br>";
        echo "Размер лучшего предложения (ask1Size): " . $result['ask1Size'] . "\n<br>";
        echo "Цена лучшего предложения (ask1Price): " . $result['ask1Price'] . "\n<br>";
        echo "Цена лучшего спроса (bid1Price): " . $result['bid1Price'] . "\n<br>";
        echo "Размер лучшего спроса (bid1Size): " . $result['bid1Size'] . "\n<br>";
    } else {
        echo "Ошибка при получении данных или неправильный ответ от API.\n";
    }
}

// Закрываем cURL сессию
curl_close($ch);
 */









?>
</body>
</html>