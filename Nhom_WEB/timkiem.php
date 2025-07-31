<?php
include("kiemtradangnhap.php");
include("connect.php");
include("header.php");

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$theloai = isset($_GET['theloai']) ? $_GET['theloai'] : '';

$sql = "SELECT Sach.*, TheLoai.ten_the_loai 
        FROM Sach 
        JOIN TheLoai ON Sach.id_the_loai = TheLoai.id 
        WHERE Sach.ten_sach LIKE '%$keyword%'";
if(!empty($theloai)) $sql .= " AND TheLoai.id = '".intval($theloai)."'";

$result = $conn->query($sql);
?>
<div class="main">
    <div class="banner">
        <img src="slider_1.png" alt="Ảnh 1">
        <img src="slider_2.png" alt="Ảnh 2">
        <img src="slider_3.png" alt="Ảnh 3">
        <img src="slider_4.png" alt="Ảnh 4">
    </div>

    <h1>Kết quả tìm kiếm</h1>
    <div class="book-list">
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){ ?>
                <div class="book" data-id="<?=$row['id']?>">
                    <img class="img-book" src="uploads/<?=$row['anh_bia']?>" alt="<?=$row['ten_sach']?>">
                    <div class="book-title"><?=$row['ten_sach']?></div>
                    <div class="book-price">Giá: <?=$row['gia']?>đ</div>
                    <div class="book-actions">
                        <button class="btn-info">Thông tin</button>
                        <button class="btn-add" data-id="<?=$row['id']?>">Thêm vào giỏ</button>

                    </div>
                </div>
        <?php } } else { echo "<p>Không tìm thấy sách phù hợp.</p>"; } ?>
    </div>
</div>
<div class="footer">Footer</div>

<!-- Popup hiển thị thông tin -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span id="close-popup">&times;</span>
        <img id="popu
