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

<h2 class="dangnhap-title">Đăng nhập</h2>

<style>
/* ===== Style tiêu đề ===== */
.dangnhap-title {
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 22px;
    margin: 20px 0;
    color: #333;
}

/* ===== Style form ===== */
form.dangnhap-form {
    width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    background-color: #fff;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

form.dangnhap-form label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

form.dangnhap-form input[type="email"],
form.dangnhap-form input[type="password"] {
    width: 100%;
    padding: 6px 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

form.dangnhap-form button {
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
form.dangnhap-form button:hover {
    background-color: #0056b3;
}

/* Link đăng ký */
form.dangnhap-form + p {
    text-align: center;
    font-family: Arial, sans-serif;
    margin-top: 10px;
}
form.dangnhap-form + p a {
    color: #007bff;
    text-decoration: none;
}
form.dangnhap-form + p a:hover {
    text-decoration: underline;
}
</style>

<?php if (!empty($thongbao)): ?>
    <p style="color:red; text-align:center;"><?= $thongbao ?></p>
<?php endif; ?>

<form method="post" class="dangnhap-form">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Mật khẩu:</label>
    <input type="password" name="password" required>

    <button type="submit">Đăng nhập</button>
</form>
<p>Chưa có tài khoản? <a href="dangky.php">Đăng ký</a></p>
