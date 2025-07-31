<?php
include("../connect.php");   // file kết nối database
include("../header.php");    // header

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mã hóa mật khẩu
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Thêm dữ liệu vào bảng User
    $sql = "INSERT INTO User (username, email, password, role) VALUES ('$username', '$email', '$password_hash', 'user')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Đăng ký thành công! </p>";
    } else {
        echo "<p style='color:red;'>Lỗi: " . $conn->error . "</p>";
    }
}
?>

<h2 class="dangky-title">Đăng ký tài khoản</h2>

<style>
/* ===== Style tiêu đề ===== */
.dangky-title {
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 22px;
    margin: 20px 0;
    color: #333;
}

/* ===== Style form ===== */
form.dangky-form {
    width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    background-color: #fff;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

form.dangky-form label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

form.dangky-form input[type="text"],
form.dangky-form input[type="email"],
form.dangky-form input[type="password"] {
    width: 100%;
    padding: 6px 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

form.dangky-form button {
    width: 100%;
    padding: 8px 14px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
form.dangky-form button:hover {
    background-color: #0056b3;
}
</style>

<form method="post" class="dangky-form">
    <label>Tên người dùng:</label>
    <input type="text" name="username" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Mật khẩu:</label>
    <input type="password" name="password" required>

    <button type="submit">Đăng ký</button>
</form>
