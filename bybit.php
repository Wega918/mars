<?php
$url = "https://api.bybit.com/v2/public/tickers?symbol=TRUMPUSDT";
$data = json_decode(file_get_contents($url), true);

if ($data && isset($data['result'][0]['last_price'])) {
    $current_price = $data['result'][0]['last_price'];
    echo "Текущая цена: $current_price";
} else {
    echo "Ошибка получения данных";
}







?> 