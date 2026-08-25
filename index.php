<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Key App</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 24px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .step-label {
            color: #0d9488;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .title {
            color: #0f172a;
            font-size: 22px;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .custom-select {
            width: 100%;
            padding: 14px 16px;
            font-size: 15px;
            color: #334155;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%2394A3B8%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 12px auto;
            cursor: pointer;
            transition: border-color 0.2s;
        }

        .custom-select:focus {
            border-color: #0f172a;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #0b1329;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            margin-top: 8px;
            transition: opacity 0.2s;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        .note-text {
            text-align: center;
            color: #64748b;
            font-size: 14px;
            margin-top: 14px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="step-label">Bước 1</div>
        <h2 class="title">Chọn phương thức nhận key</h2>

        <form action="check_key.php" method="GET">
            <!-- Ô Chọn ứng dụng -->
            <div class="form-group">
                <select name="app" class="custom-select" required>
                    <option value="" disabled selected hidden>Chọn ứng dụng</option>
                    <option value="fakelag">FakeLag</option>
                </select>
            </div>

            <!-- Ô Chọn phương thức -->
            <div class="form-group">
                <select name="method" class="custom-select" required>
                    <option value="" disabled selected hidden>Chọn phương thức</option>
                    <option value="menu">Menu</option>
                    <option value="proxy">Proxy</option>
                    <option value="modskin">ModSkin</option>
                </select>
            </div>

            <!-- Nút Get Key -->
            <button type="submit" class="btn-submit">Get Key</button>

            <!-- Ghi chú phía dưới nút Get Key -->
            <div class="note-text">Mặc định key 24h</div>
        </form>
    </div>

</body>
</html>
