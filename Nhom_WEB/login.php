<?php
session_start();
include('connect.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Tìm user trong CSDL
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Nếu user tồn tại
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Kiểm tra mật khẩu bằng password_verify
        if (password_verify($password, $user['password'])) {
            $_SESSION["username"] = $username;
            header("Location: trangchu.php");
            exit;
        } else {
            $error = "Sai mật khẩu!";
        }
    } else {
        $error = "Tên đăng nhập không tồn tại!";
    }
}
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - Bán Sách</title>
    <style>
        form {
            width: 300px;
            margin: 100px auto;
            display: flex;
            flex-direction: column;
        }
        input, button {
            margin: 5px 0;
            padding: 10px;
        }
        .fail {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng nhập</button>
        <?php if (!empty($error)) echo "<p class='fail'>$error</p>"; ?>
    </form>

</body>
</html>
