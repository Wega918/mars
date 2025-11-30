<?php
header('Content-Type: application/json');

// Настройки БД
$servername = "localhost";
$username = "oksiv92_marsga";
$password = "jeJeQLj8QkkF1";
$dbname = "oksiv92_marsga";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Читаем входящие данные
    $data = json_decode(file_get_contents('php://input'), true);
    $playerId = isset($data['playerId']) ? trim($data['playerId']) : null;
    $userId = isset($data['userId']) ? (int)$data['userId'] : null;
    $deviceId = isset($data['deviceId']) ? trim($data['deviceId']) : null;

    if (!$playerId || !$userId || !$deviceId) {
        echo json_encode(['status' => 'error', 'message' => 'Missing playerId, userId, or deviceId']);
        exit;
    }

    // Проверка UUID
    if (!preg_match('/^[0-9a-f\-]{36}$/i', $playerId)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid playerId format']);
        exit;
    }

    // Проверяем, есть ли уже запись
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users_onesignal WHERE php_user_id = :userId AND device_id = :deviceId");
    $stmt->execute(['userId' => $userId, 'deviceId' => $deviceId]);
    $exists = $stmt->fetchColumn();

    if ($exists) {
        echo json_encode(['status' => 'success', 'message' => 'Already saved for this device']);
    } else {
        $stmt = $conn->prepare("INSERT INTO users_onesignal (php_user_id, onesignal_user_id, device_id, created_at)
                                VALUES (:userId, :playerId, :deviceId, NOW())");
        $stmt->execute(['userId' => $userId, 'playerId' => $playerId, 'deviceId' => $deviceId]);

        echo json_encode(['status' => 'success', 'message' => 'Player ID saved']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: '.$e->getMessage()]);
}
