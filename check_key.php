<?php
header('Content-Type: application/json');

// Lấy tham số gửi từ giao diện index.php hoặc từ App
$app = isset($_GET['app']) ? trim($_GET['app']) : '';
$method = isset($_GET['method']) ? trim($_GET['method']) : '';
$user_key = isset($_GET['key']) ? trim($_GET['key']) : '';

// 1. Nếu bấm "Get Key" từ giao diện web (gửi app và method)
if (!empty($app) && !empty($method)) {
    if ($method === 'free') {
        // Chuyển hướng người dùng đến trang vượt link rút gọn (Ví dụ: Link4M)
        $link4m_url = "https://link4m.co/your_link_here"; 
        header("Location: " . $link4m_url);
        exit();
    } else {
        echo json_encode([
            "status" => "info",
            "message" => "Phương thức VIP vui lòng liên hệ Admin."
        ], JSON_UNESCAPED_UNICODE);
        exit();
    }
}

// 2. Nếu App gửi yêu cầu kiểm tra Key (gửi ?key=ABC...)
if (!empty($user_key)) {
    // Lấy cấu hình kết nối Database từ biến môi trường của Render
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_user = getenv('DB_USER') ?: 'root';
    $db_pass = getenv('DB_PASS') ?: '';
    $db_name = getenv('DB_NAME') ?: 'key_system';
    $db_port = getenv('DB_PORT') ?: '3306';

    $conn = @new mysqli($db_host, $db_user, $db_pass, $db_name, (int)$db_port);

    if ($conn->connect_error) {
        echo json_encode(["status" => "error", "message" => "Lỗi kết nối cơ sở dữ liệu"]);
        exit();
    }

    $stmt = $conn->prepare("SELECT status, expires_at FROM keys_table WHERE key_code = ?");
    $stmt->bind_param("s", $user_key);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $current_date = date('Y-m-d H:i:s');
        if ($row['status'] !== 'active') {
            echo json_encode(["status" => "error", "message" => "Key đã bị khóa"], JSON_UNESCAPED_UNICODE);
        } else if ($row['expires_at'] < $current_date) {
            echo json_encode(["status" => "error", "message" => "Key đã hết hạn"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode([
                "status" => "success",
                "message" => "Key hợp lệ",
                "expires_at" => $row['expires_at']
            ], JSON_UNESCAPED_UNICODE);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Key không tồn tại"], JSON_UNESCAPED_UNICODE);
    }

    $stmt->close();
    $conn->close();
    exit();
}

// Trường hợp không truyền tham số hợp lệ
echo json_encode(["status" => "error", "message" => "Yêu cầu không hợp lệ"], JSON_UNESCAPED_UNICODE);
