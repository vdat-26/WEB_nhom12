

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

<div style="width:400px; margin:30px auto; border:1px solid #ccc; padding:20px;">
    <h2>Đăng ký tài khoản</h2>
    <form method="post">
        <label>Tên người dùng:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Đăng ký</button>
    </form>
</div>
