<?php
session_start();
include("../connect.php");  // kết nối CSDL

// Kiểm tra dữ liệu gửi từ form
if (isset($_POST['id']) && isset($_POST['soluong'])) {
    $id = intval($_POST['id']);
    $soluong = intval($_POST['soluong']);

    // Lấy thông tin sách từ CSDL
    $sql = "SELECT * FROM Sach WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sach = $result->fetch_assoc();

        // Tạo giỏ hàng nếu chưa tồn tại
        if (!isset($_SESSION['giohang'])) {
            $_SESSION['giohang'] = [];
        }

        // Kiểm tra xem sách đã có trong giỏ chưa
        $found = false;
        foreach ($_SESSION['giohang'] as &$item) {
            if ($item['id'] == $id) {
                $item['soluong'] += $soluong;
                $found = true;
                break;
            }
        }

        // Nếu chưa có thì thêm mới
        if (!$found) {
            $_SESSION['giohang'][] = [
                'id' => $sach['id'],
                'ten_sach' => $sach['ten_sach'],
                'gia' => $sach['gia'],
                'anh_bia' => $sach['anh_bia'],
                'soluong' => $soluong
            ];
        }
    }
}

// Chuyển hướng về giỏ hàng
header("Location: giohang.php");
exit();
?>
<!-- // Chuyển hướng về giỏ hàng
header("Location: giohang.php");
exit(); -->