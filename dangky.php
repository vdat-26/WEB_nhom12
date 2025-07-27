<?php
include('connect.php'); // file kết nối CSDL
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    // Kiểm tra trống
    if (empty($username) || empty($password) || empty($repassword)) {
        $error = "Vui lòng nhập đầy đủ thông tin!";
    } elseif ($password !== $repassword) {
        $error = "Mật khẩu không khớp!";
    } else {
        // Kiểm tra tên đăng nhập đã tồn tại chưa
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Tên đăng nhập đã tồn tại!";
        } else {
            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thêm vào database
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashedPassword);
            if ($stmt->execute()) {
                $success = "Đăng ký thành công! <a href='login.php'>Đăng nhập</a>";
            } else {
                $error = "Lỗi khi đăng ký!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
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
        .message {
            text-align: center;
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

    <form action="dangky.php" method="post">
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>
        <button type="submit">Đăng ký</button>
        <?php
        if (!empty($error)) echo "<p class='message'>$error</p>";
        if (!empty($success)) echo "<p class='message success'>$success</p>";
        ?>
    </form>

</body>
</html>
