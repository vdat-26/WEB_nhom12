<?php
include("../connect.php");

if(isset($_POST['sua_the_loai'])){
    $id = $_POST['id'];
    $ten = $_POST['ten_the_loai'];
    $sql = "UPDATE TheLoai SET ten_the_loai='$ten' WHERE id=$id";
    if($conn->query($sql)){
        header("Location: ../quanlykho.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
