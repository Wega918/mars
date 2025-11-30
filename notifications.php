<?php
// === НАСТРОЙКИ ===
$appId = '58cf71cb-ae3e-44fe-ac4d-9e5bffd3713c';
$restApiKey = 'os_v2_app_ldhxds5ohzcp5lcntzn77u3rhq52stfxjftu5qfy6qategvkicwiohkuucpyf4cyx36avji3wxstofmgtttxoju76rfk22we5w4xqai';
$phpUserId = 1; // ID пользователя

// === ПОЛУЧЕНИЕ PLAYER ID ===
$playerId = null;
try {
    $conn = new PDO("mysql:host=localhost;dbname=oksiv92_marsga;charset=utf8", "oksiv92_marsga", "jeJeQLj8QkkF1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT onesignal_user_id FROM users_onesignal WHERE php_user_id = :phpUserId LIMIT 1");
    $stmt->execute(['phpUserId' => $phpUserId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && !empty($result['onesignal_user_id'])) {
        $playerId = $result['onesignal_user_id'];
    }
} catch (PDOException $e) {
    die('Ошибка БД: ' . $e->getMessage());
}

// === ОТПРАВКА УВЕДОМЛЕНИЯ ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payload = [
        'app_id' => $appId,
        'include_player_ids' => [$playerId],
        'headings' => ['en' => $_POST['title']],
        'contents' => ['en' => $_POST['message']],
    ];

    if (!empty($_POST['url'])) $payload['url'] = $_POST['url'];
    if (!empty($_POST['icon'])) $payload['chrome_web_icon'] = $_POST['icon'];
    if (!empty($_POST['image'])) $payload['big_picture'] = $_POST['image'];
    if (!empty($_POST['bg_color'])) $payload['android_accent_color'] = str_replace('#','',$_POST['bg_color']);

    if (!empty($_POST['button_text']) && !empty($_POST['button_url'])) {
        $payload['web_buttons'] = [[
            'id' => 'btn1',
            'text' => $_POST['button_text'],
            'url' => $_POST['button_url']
        ]];
    }

    $ch = curl_init('https://onesignal.com/api/v1/notifications');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ' . $restApiKey
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "<pre>HTTP CODE: {$httpCode}\nREQUEST:\n" . json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\nRESPONSE:\n{$response}</pre>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>OneSignal Preview</title>
<style>
    body { font-family: Arial, sans-serif; background: #f5f6f8; display: flex; justify-content: center; padding: 40px; }
    .container { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 520px; }
    h2 { text-align: center; margin-bottom: 20px; }
    label { font-weight: bold; display: block; margin-top: 10px; }
    input, textarea { width: 100%; padding: 8px; margin-top: 4px; border-radius: 6px; border: 1px solid #ccc; }
    textarea { resize: vertical; height: 70px; }
    .preview { border: 1px solid #ddd; padding: 10px; border-radius: 8px; background: #fff; margin-top: 15px; }
    .preview-header { display: flex; align-items: center; gap: 10px; }
    .preview-icon { width: 40px; height: 40px; border-radius: 50%; background: #ccc; background-size: cover; }
    .preview-title { font-weight: bold; }
    .preview-msg { margin: 5px 0; }
    .preview-img { width: 100%; max-height: 180px; object-fit: cover; margin-top: 8px; border-radius: 6px; display: none; }
    .preview-btn { margin-top: 10px; background: #007bff; color: white; padding: 6px 12px; border-radius: 4px; display: none; }
    .btn { margin-top: 15px; display: block; width: 100%; background: #007bff; color: white; padding: 10px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; }
    .btn:hover { background: #0056b3; }
</style>
</head>
<body>
<div class="container">
    <h2>Настройка уведомления</h2>

    <?php if (!$playerId): ?>
        <p style="color:red;">❌ Player ID не найден. Подпишись на уведомления!</p>
    <?php endif; ?>

    <form method="post" oninput="updatePreview()">
        <label>Заголовок</label>
        <input type="text" name="title" id="title" placeholder="Заголовок">

        <label>Сообщение</label>
        <textarea name="message" id="message" placeholder="Текст уведомления"></textarea>

        <label>URL при клике</label>
        <input type="text" name="url" id="url" placeholder="https://example.com">

        <label>URL иконки</label>
        <input type="text" name="icon" id="icon" placeholder="https://example.com/icon.png">

        <label>Большое изображение</label>
        <input type="text" name="image" id="image" placeholder="https://example.com/big.png">

        <label>Цвет фона</label>
        <input type="color" name="bg_color" id="bg_color" value="#007bff">

        <label>Текст кнопки</label>
        <input type="text" name="button_text" id="button_text" placeholder="Например: Открыть">

        <label>URL кнопки</label>
        <input type="text" name="button_url" id="button_url" placeholder="https://example.com/page">

        <div class="preview" id="preview">
            <div class="preview-header">
                <div class="preview-icon" id="preview-icon"></div>
                <div>
                    <div class="preview-title" id="preview-title">Заголовок</div>
                    <div class="preview-msg" id="preview-msg">Текст уведомления</div>
                </div>
            </div>
            <img class="preview-img" id="preview-img">
            <div class="preview-btn" id="preview-btn">Кнопка</div>
        </div>

        <button type="submit" class="btn">Отправить уведомление</button>
    </form>
</div>

<script>
function updatePreview() {
    document.getElementById('preview-title').innerText = document.getElementById('title').value || "Заголовок";
    document.getElementById('preview-msg').innerText = document.getElementById('message').value || "Текст уведомления";

    const icon = document.getElementById('icon').value;
    document.getElementById('preview-icon').style.backgroundImage = icon ? `url('${icon}')` : '';

    const img = document.getElementById('preview-img');
    img.src = document.getElementById('image').value;
    img.style.display = img.src ? 'block' : 'none';

    const btn = document.getElementById('preview-btn');
    const btnText = document.getElementById('button_text').value;
    if (btnText) {
        btn.innerText = btnText;
        btn.style.display = 'inline-block';
    } else {
        btn.style.display = 'none';
    }

    const bgColor = document.getElementById('bg_color').value;
    btn.style.background = bgColor;
}
</script>
</body>
</html>
