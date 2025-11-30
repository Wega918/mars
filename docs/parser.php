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







<form method="GET" action="">
    <label for="time_unit">Выберите единицу времени:</label>
    <select name="time_unit" id="time_unit">
        <option value="minute">Минута</option>
        <option value="hour">Час</option>
        <option value="day">День</option>
        <option value="month">Месяц</option>
    </select><br><br>
    <label for="interval">Выберите интервал:</label>
    <select name="interval" id="interval">
        <option value="1">1m</option>
        <option value="5">5m</option>
        <option value="15">15m</option>
        <option value="30">30m</option>
        <option value="60">1h</option>
        <option value="120">2h</option>
        <option value="240">4h</option>
        <option value="360">6h</option>
        <option value="720">12h</option>
        <option value="D">1d</option>
    </select><br><br>
    <label for="duration">Длительность интервала:</label>
    <input type="number" name="duration" id="duration" value="1"><br><br>

    <!-- Добавляем параметры для прогнозирования -->
    <label for="forecast_unit">Выберите единицу времени для прогноза:</label>
    <select name="forecast_unit" id="forecast_unit">
        <option value="minute">Минута</option>
        <option value="hour">Час</option>
        <option value="day">День</option>
        <option value="month">Месяц</option>
    </select><br><br>
    <label for="forecast_duration">Длительность прогноза:</label>
    <input type="number" name="forecast_duration" id="forecast_duration" value="10"><br><br>

    <input type="submit" value="Применить">
</form>

<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('UTC');
mb_internal_encoding("UTF-8");

$time_unit = isset($_GET['time_unit']) ? $_GET['time_unit'] : 'minute';
$interval = isset($_GET['interval']) ? $_GET['interval'] : '60';
$duration = isset($_GET['duration']) ? $_GET['duration'] : 1;

// Параметры для прогнозирования
$forecast_unit = isset($_GET['forecast_unit']) ? $_GET['forecast_unit'] : 'minute';
$forecast_duration = isset($_GET['forecast_duration']) ? $_GET['forecast_duration'] : 10;

// Вычисляем количество свечей
$limit = 0;
switch ($time_unit) {
    case 'minute':
        $limit = $duration;
        break;
    case 'hour':
        $limit = $duration * (60 / (int)$interval);
        break;
    case 'day':
        $limit = $duration * (24 * 60 / (int)$interval);
        break;
    case 'month':
        $limit = $duration * (30 * 24 * 60 / (int)$interval);
        break;
}

if ($limit < 1) {
    $limit = 1;
}

// Определяем стандартные периоды для индикаторов
switch ($time_unit) {
    case 'minute':
        $sma_period = $limit;
        $ema_period = 20;
        $rsi_period = 14;
        $macd_shortPeriod = 12;
        $macd_longPeriod = 26;
        $macd_signalPeriod = 9;
        $bollinger_period = 20;
        break;
    case 'hour':
        $sma_period = 20;
        $ema_period = 14;
        $rsi_period = 7;
        $macd_shortPeriod = 12;
        $macd_longPeriod = 26;
        $macd_signalPeriod = 9;
        $bollinger_period = 20;
        break;
    case 'day':
        $sma_period = 50;
        $ema_period = 30;
        $rsi_period = 14;
        $macd_shortPeriod = 12;
        $macd_longPeriod = 26;
        $macd_signalPeriod = 9;
        $bollinger_period = 20;
        break;
    case 'month':
        $sma_period = 200;
        $ema_period = 100;
        $rsi_period = 14;
        $macd_shortPeriod = 12;
        $macd_longPeriod = 26;
        $macd_signalPeriod = 9;
        $bollinger_period = 20;
        break;
    default:
        $sma_period = 50;
        $ema_period = 20;
        $rsi_period = 14;
        $macd_shortPeriod = 12;
        $macd_longPeriod = 26;
        $macd_signalPeriod = 9;
        $bollinger_period = 20;
        break;
}

$symbol = "TRUMPUSDT";
$category = "linear";
$url = "https://api.bybit.com/v5/market/kline?category=$category&symbol=$symbol&interval=$interval&limit=$limit";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

if (isset($data['result']['list'])) {
    $closingPrices = [];
    echo "<h2>Данные по свечам (в UTC):</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Время</th><th>Открытие</th><th>Закрытие</th><th>Макс. цена</th><th>Мин. цена</th><th>Объем</th><th>Торговая стоимость</th></tr>";
    foreach ($data['result']['list'] as $candle) {
        $time = date("Y-m-d H:i:s", $candle[0] / 1000);
        $open = $candle[1];
        $close = $candle[4];
        $high = $candle[2];
        $low = $candle[3];
        $volume = $candle[5];
        $turnover = $candle[6];

        $closingPrices[] = $close;
        echo "<tr><td>$time</td><td>$open</td><td>$close</td><td>$high</td><td>$low</td><td>$volume</td><td>$turnover</td></tr>";
    }
    echo "</table>";

    // Функции для расчета индикаторов
    function calculateSMA($data, $period) {
        $sma = [];
        for ($i = $period - 1; $i < count($data); $i++) {
            $sma[] = array_sum(array_slice($data, $i - $period + 1, $period)) / $period;
        }
        return $sma;
    }

    function calculateEMA($data, $period) {
        $ema = [];
        $multiplier = 2 / ($period + 1);
        $ema[0] = array_sum(array_slice($data, 0, $period)) / $period;
        for ($i = $period; $i < count($data); $i++) {
            $ema[] = ($data[$i] - $ema[count($ema) - 1]) * $multiplier + $ema[count($ema) - 1];
        }
        return $ema;
    }

    function calculateRSI($data, $period = 14) {
        $gains = $losses = [];
        for ($i = 1; $i < count($data); $i++) {
            $change = $data[$i] - $data[$i - 1];
            $gains[] = $change > 0 ? $change : 0;
            $losses[] = $change < 0 ? abs($change) : 0;
        }
        $avgGain = array_sum(array_slice($gains, 0, $period)) / $period;
        $avgLoss = array_sum(array_slice($losses, 0, $period)) / $period;
        $rsi = [];
        for ($i = $period; $i < count($gains); $i++) {
            $avgGain = ($avgGain * ($period - 1) + $gains[$i]) / $period;
            $avgLoss = ($avgLoss * ($period - 1) + $losses[$i]) / $period;
            $rs = $avgLoss == 0 ? 100 : ($avgGain / $avgLoss);
            $rsi[] = 100 - (100 / (1 + $rs));
        }
        return $rsi;
    }

    function calculateMACD($data, $shortPeriod, $longPeriod, $signalPeriod) {
        $shortEMA = calculateEMA($data, $shortPeriod);
        $longEMA = calculateEMA($data, $longPeriod);
        $macd = [];
        for ($i = 0; $i < count($shortEMA); $i++) {
            $macd[] = $shortEMA[$i] - $longEMA[$i];
        }
        $signal = calculateEMA($macd, $signalPeriod);
        return ['macd' => $macd, 'signal' => $signal];
    }

    function calculateBollingerBands($data, $period, $numDevs = 2) {
        $sma = calculateSMA($data, $period);
        $upper = [];
        $lower = [];
        for ($i = 0; $i < count($sma); $i++) {
            $deviation = standardDeviation(array_slice($data, $i, $period));
            $upper[] = $sma[$i] + ($numDevs * $deviation);
            $lower[] = $sma[$i] - ($numDevs * $deviation);
        }
        return ['upper' => $upper, 'lower' => $lower];
    }

    function standardDeviation($data) {
        $mean = array_sum($data) / count($data);
        $variance = array_sum(array_map(function($x) use ($mean) { return pow($x - $mean, 2); }, $data)) / count($data);
        return sqrt($variance);
    }

    // Вычисляем индикаторы
    $sma = calculateSMA($closingPrices, $sma_period);
    $ema = calculateEMA($closingPrices, $ema_period);
    $rsi = calculateRSI($closingPrices, $rsi_period);
    $macd = calculateMACD($closingPrices, $macd_shortPeriod, $macd_longPeriod, $macd_signalPeriod);
    $bollinger = calculateBollingerBands($closingPrices, $bollinger_period);

    // Выводим последние значения индикаторов
    echo "<h3>Последние значения индикаторов:</h3>";
    echo "<p>SMA ($sma_period): " . end($sma) . "</p>";
    echo "<p>EMA ($ema_period): " . end($ema) . "</p>";
    echo "<p>RSI ($rsi_period): " . end($rsi) . "</p>";
    echo "<p>MACD ($macd_shortPeriod, $macd_longPeriod, $macd_signalPeriod) - MACD: " . end($macd['macd']) . " Signal: " . end($macd['signal']) . "</p>";
    echo "<p>Bollinger Bands ($bollinger_period) - Upper: " . end($bollinger['upper']) . " Lower: " . end($bollinger['lower']) . "</p>";

    // Прогнозирование
    function forecast($prices, $forecast_steps, $sma, $ema, $bollinger_upper, $bollinger_lower) {
        $last_price = end($prices);
        $price_change = ($prices[count($prices) - 1] - $prices[0]) / count($prices);
        $forecast = [];
        for ($i = 1; $i <= $forecast_steps; $i++) {
            $forecast[] = max(
                min($last_price + $price_change * $i, end($bollinger_upper)), // Не превышаем верхнюю полосу Боллинджера
                end($bollinger_lower)                                        // Не опускаемся ниже нижней полосы
            );
        }
        return $forecast;
    }

    $forecast_steps = 0;
    switch ($forecast_unit) {
        case 'minute':
            $forecast_steps = $forecast_duration;
            break;
        case 'hour':
            $forecast_steps = $forecast_duration * 60 / (int)$interval;
            break;
        case 'day':
            $forecast_steps = $forecast_duration * 24 * 60 / (int)$interval;
            break;
        case 'month':
            $forecast_steps = $forecast_duration * 30 * 24 * 60 / (int)$interval;
            break;
    }

    $forecast_prices = forecast($closingPrices, $forecast_steps, $sma, $ema, $bollinger['upper'], $bollinger['lower']);

    echo "<h2>Прогноз курса на следующие $forecast_duration $forecast_unit:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Период</th><th>Прогнозируемая цена</th></tr>";
    for ($i = 1; $i <= $forecast_steps; $i++) {
        $period = ($forecast_unit === 'minute') ? "$i минут" : "$i $forecast_unit";
        echo "<tr><td>$period</td><td>" . $forecast_prices[$i - 1] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Ошибка получения данных.";
}







/* SMA 

EMA 

RSI 

MACD Signal:

Bollinger Bands  Upper Lower  */
?>