<?php
// Устанавливаем заголовок, чтобы браузер знал, что получает JSON-отчет.
header('Content-Type: application/json; charset=utf-8');

// --- 1. КОНФИГУРАЦИЯ ЗАПРОСОВ ---

// Список токенов, где ключ - это значение "topi", а значение - сам токен.
$token_map = [
    1 => 'Otv8fCgePX27ge%2B0fHjXXFs2Seg8eqRzPwIbPPmb5a0%3D', // topi: 1
    0 => 'z7zgLi1KoCX74znzL23l%2FiWYXKB8uJ0fI1Zp7kfnnCw%3D', // topi: 0
    2 => 'lYyOgQ7jWwsrJc49YIKv2OtKCWxuPEpjkVxlKloZ6iA%3D', // topi: 2
    3 => 'uRedrwQgwxgr36JMwFc%2FylzWoAwgZ9VbLSotYAkQrok%3D'  // topi: 3
];

// Базовый URL API
$base_url = 'https://appru.nebo.mobi:20101/tops/';

// Исходный Payload (topi будет меняться в цикле)
$payload_data = [
    "language" => "global",
    "pid" => 6953017, // ID игрока, критичный для авторизации
    "topi" => 0, // Это значение будет перезаписано в цикле для каждого токена
    "__v" => "3.54.7.1",
    "_b" => "om",
    "_p" => "html5-xs"
];

// Куки сессии для запроса ТОП-игроков (те, что были изначально)
$cookie_string = 
    'consent_idab1aa692-52a9-445e-9375-b99bc5e6cf2c=2026-12-13T04:39:24.950Z46✓Nonehttps://tower.game✓Medium; ' .
    'xl-cbe89fe7-5ebd-11ea-b687-42010aa80004-sso-session=TJAalzKaqQa6VdPTUmJENlFd6cmbQch7MzaHB5DQ9FMQ9XXDOSoTCJl8MekxX5Hf; ' .
    'xsollauid=415759432647966789';

// Базовые заголовки. Content-Length будет обновляться перед каждым запросом.
$headers = array(
    'Content-Type: application/json',
    'Content-Length: 0', // Будет обновлено
    'Cookie: ' . $cookie_string,
    'Accept: application/json',
    'User-Agent: Custom-PHP-Script'
);

// --- 2. ФУНКЦИЯ ДЛЯ ВЫПОЛНЕНИЯ ЗАПРОСА (без изменений) ---

/**
 * Выполняет POST-запрос и возвращает массив игроков или false в случае ошибки.
 * @param string $full_url Полный URL для запроса.
 * @param array $headers Заголовки HTTP.
 * @param string $payload Тело запроса JSON.
 * @return array|false Массив игроков или false.
 */
function fetch_player_data($full_url, $headers, $payload) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $full_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Обход SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    
    // Небольшой таймаут на случай проблем с сервером
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); 

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code !== 200 || $response === false) {
        return false;
    }

    $data = json_decode($response, true);
    
    if (json_last_error() === JSON_ERROR_NONE && isset($data['d']['top'])) {
        return $data['d']['top']; // Возвращаем массив игроков
    }

    return false;
}

// --- 3. АГРЕГАЦИЯ И АНАЛИЗ ДАННЫХ ---

$all_ids_by_token = []; 
$all_ids_raw = [];      
$unique_ids = [];       

foreach ($token_map as $topi_index => $token) {
    
    // 1. ДИНАМИЧЕСКОЕ ОБНОВЛЕНИЕ PAYLOAD
    $payload_data['topi'] = $topi_index;
    $payload = json_encode($payload_data);

    // 2. ДИНАМИЧЕСКОЕ ОБНОВЛЕНИЕ HEADERS
    $headers[1] = 'Content-Length: ' . strlen($payload);

    // 3. Выполняем запрос
    $full_url = $base_url . $token;
    $players = fetch_player_data($full_url, $headers, $payload);
    
    if ($players !== false) {
        $player_ids = [];
        foreach ($players as $player) {
            $id = $player['id'];
            $player_id_str = (string)$id;
            
            $player_ids[] = $player_id_str; 
            $all_ids_raw[] = $player_id_str; 
        }
        $all_ids_by_token[$token] = [
            'topi_used' => $topi_index,
            'count' => count($player_ids),
            'ids' => $player_ids, 
        ];
    } else {
        $all_ids_by_token[$token] = [
            'topi_used' => $topi_index,
            'error' => 'Failed to fetch data or invalid JSON response (HTTP code != 200)'
        ];
    }
}

// --- 4. Определение уникальности и дубликатов (финальная обработка) ---

$total_fetched_count = count($all_ids_raw);
// КЛЮЧЕВОЙ ШАГ: Оставляем только уникальные ID
$unique_ids = array_unique($all_ids_raw);
$unique_count = count($unique_ids);
$duplicate_count = $total_fetched_count - $unique_count;

// Список дублирующихся ID
$duplicate_ids_list = [];
if ($duplicate_count > 0) {
    $counts = array_count_values($all_ids_raw);
    foreach ($counts as $id => $count) {
        if ($count > 1) {
            $duplicate_ids_list[] = (string)$id;
        }
    }
}

// --- 5. ФОРМИРОВАНИЕ ИТОГОВОГО ОТЧЕТА ---

$report = [
    'analysis_summary' => [
        'total_fetched_users_raw' => $total_fetched_count,
        'unique_users_count' => $unique_count,
        'total_duplicates' => $duplicate_count,
        'duplicate_ids_list' => $duplicate_ids_list,
        'notes' => 'Финальный список "all_unique_ids" содержит ID, где каждый пользователь встречается только один раз.'
    ],
    'all_unique_ids' => array_values($unique_ids), // Окончательный список уникальных ID
    'data_by_token' => $all_ids_by_token,
];


// --- 6. ОТПРАВКА СООБЩЕНИЯ 1-МУ ЮНИКАЛЬНОМУ ПОЛЬЗОВАТЕЛЮ (ОБНОВЛЕНО) ---

if (!empty($unique_ids)) {

    $receiverId = $unique_ids[0]; // Первый ID

// !!! НОВОЕ ВРЕМЕННОЕ ЗНАЧЕНИЕ !!!
    $receiverId = "11322390"; 
    // Если вы хотите, чтобы это был тип integer для payload: $receiverId = 11322390;

    // --- НОВЫЕ КУКИ ДЛЯ ОТПРАВКИ СООБЩЕНИЯ (Исправление проблемы с 204) ---
    // Используем куки, которые приводят к успешному ответу 200 или 204.
    $new_msg_cookie_string = 
        'consent_id=ab1aa692-52a9-445e-9375-b99bc5e6cf2c; ' .
        'split_mode=0; ' .
        'xl-cbe89fe7-5ebd-11ea-b687-42010aa80004-sso-session=7DTQONOKGSiSRoDcNOCdmTJhW8D7zKUKaUKW9IVKFj39nkrTLpDPSzMbzrTRQGMQ; ' .
        'xsollauid=415759432647966789';


    // ДВА ТОКЕНА В URL
    $msg_url = "https://appru.nebo.mobi:20101/pm/add_message/54cc7ba1-847f-43cc-bfdf-0ac46a0a2fe8/p%2FYT4rpA4AkVvZkzEvsALGgL7%2FsMFWJSWBgYImEXnuo%3D";


    // Payload
    $msg_payload_data = [
        "receiverId" => (int)$receiverId,
        "message" => "🚀 Открылась новая игра!\n🎮 Заходи скорее 👉 https://colony.vipmars.online/ ",
        "__v" => "3.54.7.1",
        "_b" => "om",
        "_p" => "html5-xs"
    ];
    $msg_payload = json_encode($msg_payload_data);

    $msg_headers = [
        "Content-Type: application/json",
        "Content-Length: " . strlen($msg_payload),
        "Accept: application/json",
        "Cookie: " . $new_msg_cookie_string,  // <--- ИСПОЛЬЗУЕМ НОВЫЕ КУКИ
        "User-Agent: Mozilla/5.0"
    ];

    // CURL отправка
    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, $msg_url);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_POST, true);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $msg_payload);
    curl_setopt($ch2, CURLOPT_HTTPHEADER, $msg_headers);

    // SSL OFF
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);

    $msg_response = curl_exec($ch2);
    $msg_http = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
    curl_close($ch2);

    $msg_decoded = json_decode($msg_response, true);

    // Проверяем успех: либо 204 (No Content), либо 200 с телом "success"
    if ($msg_http == 204 || ($msg_http == 200 && isset($msg_decoded['m']) && $msg_decoded['m'] === 'success')) {

        // Помечаем ID как отправленный
        file_put_contents("sent_ids.txt", $receiverId . "\n", FILE_APPEND);

        $report['message_status'] = [
            "sent_to" => $receiverId,
            "status" => "success",
            "http_code" => $msg_http,
            // Для 204 сообщаем, что это успех без контента, для 200 - тело ответа.
            "response" => $msg_http == 204 ? "HTTP 204 No Content - Message sent using new cookies." : $msg_decoded
        ];
    } else {
        $report['message_status'] = [
            "sent_to" => $receiverId,
            "status" => "failed",
            "http_code" => $msg_http,
            "response_raw" => $msg_response,
            "note" => "Failed or unexpected response body. Check HTTP code and raw response."
        ];
    }
}


// --- 7. ВЫВОД ОТЧЕТА ---
// Вывод итогового JSON-отчета
echo json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

?>