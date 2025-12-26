<?php
include("../connect.php");

if(isset($_POST['them_the_loai'])){
    $ten = $_POST['ten_the_loai'];
    $sql = "INSERT INTO TheLoai(ten_the_loai) VALUES('$ten')";
    if($conn->query($sql)){
        header("Location: ../quanlykho.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
