<?php
session_start();
include("../connect.php");

if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
    $_SESSION['loi_thanhtoan'] = ["Giỏ hàng của bạn đang trống!"];
    header("Location: giohang.php");
    exit();
}

$loi = [];
$conn->begin_transaction(); // Bắt đầu transaction để rollback khi lỗi

try {
    // Kiểm tra tồn kho
    foreach ($_SESSION['giohang'] as $item) {
        $id = (int)$item['id'];
        $soluong = (int)$item['soluong'];

        $sql = "SELECT so_luong FROM Sach WHERE id = $id FOR UPDATE";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['so_luong'] < $soluong) {
                $loi[] = "Sách '{$item['ten_sach']}' không đủ số lượng (còn {$row['so_luong']})";
            }
        } else {
            $loi[] = "Sách với ID {$id} không tồn tại!";
        }
    }

    if (!empty($loi)) {
        $conn->rollback();
        $_SESSION['loi_thanhtoan'] = $loi;
        header("Location: giohang.php");
        exit();
    }

    // Trừ kho
    foreach ($_SESSION['giohang'] as $item) {
        $id = (int)$item['id'];
        $soluong = (int)$item['soluong'];
        $sqlUpdate = "UPDATE Sach SET so_luong = so_luong - $soluong WHERE id = $id";
        if (!$conn->query($sqlUpdate)) {
            throw new Exception("Lỗi cập nhật số lượng sách ID $id");
        }
    }

    // Commit khi không có lỗi
    $conn->commit();

    // Xóa giỏ hàng và báo thành công
    unset($_SESSION['giohang']);
    $_SESSION['thongbao_thanhtoan'] = "Thanh toán thành công!";
} catch (Exception $e) {
    $conn->rollback();
    $_SESSION['loi_thanhtoan'] = ["Có lỗi xảy ra: " . $e->getMessage()];
}

header("Location: giohang.php");
exit();
?>
