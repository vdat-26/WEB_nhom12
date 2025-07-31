<?php
session_start();
if (isset($_GET['index'])) {
    $index = intval($_GET['index']);
    if (isset($_SESSION['giohang'][$index])) {
        // Xoá phần tử theo index
        unset($_SESSION['giohang'][$index]);
        // Sắp xếp lại key của mảng để tránh bị rỗng index
        $_SESSION['giohang'] = array_values($_SESSION['giohang']);
    }
}
// Quay về giỏ hàng
header("Location: giohang.php");
exit;
