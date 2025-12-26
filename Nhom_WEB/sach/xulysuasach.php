<?php
include("../connect.php");

if(isset($_POST['capnhat'])){
    $id = $_POST['id'];
    $ten_sach = $_POST['ten_sach'];
    $id_the_loai = $_POST['id_the_loai'];
    $so_luong = $_POST['so_luong'];
    $gia = $_POST['gia'];
    $mo_ta = $_POST['mo_ta'];

    // Lấy ảnh cũ để xoá nếu cập nhật mới
    $old = $conn->query("SELECT anh_bia FROM Sach WHERE id=$id")->fetch_assoc();
    $anh_bia = $old['anh_bia'];

    // Nếu có ảnh mới
    if(isset($_FILES['anh_bia']) && $_FILES['anh_bia']['error']==0){
        $tenFile = time() . "_" . basename($_FILES['anh_bia']['name']);
        $target = "../uploads/".$tenFile;

        if(move_uploaded_file($_FILES['anh_bia']['tmp_name'], $target)){
            // Xoá ảnh cũ nếu có
            if(!empty($anh_bia) && file_exists("../uploads/".$anh_bia)){
                unlink("../uploads/".$anh_bia);
            }
            $anh_bia = $tenFile;
        }
    }

    $sql = "UPDATE Sach SET 
                ten_sach='$ten_sach',
                id_the_loai=$id_the_loai,
                so_luong=$so_luong,
                gia=$gia,
                mo_ta='$mo_ta',
                anh_bia='$anh_bia'
            WHERE id=$id";

    if($conn->query($sql)){
        header("Location: ../quanlykho.php");
        exit;
    } else {
        echo "Lỗi: ".$conn->error;
    }
}
