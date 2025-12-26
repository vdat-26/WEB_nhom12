<?php
include("../connect.php");
$id = $_GET['id'];

// Lấy ảnh bìa để xóa file
$row = $conn->query("SELECT anh_bia FROM Sach WHERE id=$id")->fetch_assoc();
if(!empty($row['anh_bia']) && file_exists("../uploads/" . $row['anh_bia'])){
    unlink("../uploads/" . $row['anh_bia']);
}

$conn->query("DELETE FROM Sach WHERE id=$id");
header("Location: ../quanlykho.php");
?>
