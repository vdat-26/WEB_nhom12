<?php
include("../connect.php");

if(isset($_POST['them_sach'])){
    $ten_sach = $_POST['ten_sach'];
    $id_the_loai = $_POST['id_the_loai'];
    $so_luong = $_POST['so_luong'];
    $gia = $_POST['gia'];
    $mo_ta = $_POST['mo_ta'];

    // --- Xử lý upload ảnh bìa ---
    $tenfile = "";
    if(isset($_FILES['anh_bia']) && $_FILES['anh_bia']['error'] == 0){
        $tenfile = time() . "_" . basename($_FILES['anh_bia']['name']);
        move_uploaded_file($_FILES['anh_bia']['tmp_name'], "../uploads/" . $tenfile);
    }

    // --- Lưu vào DB ---
    $sql = "INSERT INTO Sach(ten_sach, id_the_loai, so_luong, gia, mo_ta, anh_bia) 
            VALUES('$ten_sach', '$id_the_loai', '$so_luong', '$gia', '$mo_ta', '$tenfile')";
    if($conn->query($sql)){
        header("Location: ../quanlykho.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
