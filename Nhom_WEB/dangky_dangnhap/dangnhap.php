<?php
session_start();
include("../connect.php");
include("../header.php");

$thongbao = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM User WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'role' => $user['role']
            ];
            header("Location: ../index.php");
            exit();
        } else {
            $thongbao = "Mật khẩu không đúng!";
        }
    } else {
        $thongbao = "Email không tồn tại!";
    }
}
?>

<div style="width:400px; margin:30px auto; border:1px solid #ccc; padding:20px;">
    <h2>Đăng nhập</h2>
    <?php if (!empty($thongbao)): ?>
        <p style="color:red;"><?= $thongbao ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Mật khẩu:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Đăng nhập</button>
    </form>
    <p>Chưa có tài khoản? <a href="dangky.php">Đăng ký</a></p>
</div>
