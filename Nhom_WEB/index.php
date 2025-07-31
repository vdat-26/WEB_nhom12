<?php
include("kiemtradangnhap.php");
include("connect.php");
include("header.php");

$sql = "SELECT Sach.*, TheLoai.ten_the_loai 
        FROM Sach 
        JOIN TheLoai ON Sach.id_the_loai = TheLoai.id";
$result = $conn->query($sql);
?>
<div class="main">
    <div class="banner">
        <img src="slider_1.png" alt="Ảnh 1">
        <img src="slider_2.png" alt="Ảnh 2">
        <img src="slider_3.png" alt="Ảnh 3">
        <img src="slider_4.png" alt="Ảnh 4">
    </div>

    <h1>Top các cuốn sách nổi bật</h1>
    <div class="book-list">
        <?php while($row = $result->fetch_assoc()){ ?>
            <div class="book" data-id="<?=$row['id']?>">
                <img class="img-book" src="uploads/<?=$row['anh_bia']?>" alt="<?=$row['ten_sach']?>">
                <div class="book-title"><?=$row['ten_sach']?></div>
                <div class="book-price">Giá: <?=$row['gia']?>đ</div>
                <div class="book-actions">
                    <button class="btn-info">Thông tin</button>
                    <form action="phangiohang/themvaogio.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <input type="hidden" name="soluong" value="1">
                        <button type="submit" class="btn-add">Thêm vào giỏ</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer mới -->
<link rel="stylesheet" href="footer.css">
<div class="footer">
    <p>&copy; 2025 - Website Bán Sách Online | Liên hệ: support@example.com</p>
    <p>Theo dõi chúng tôi:
        <a href="#">Facebook</a> | 
        <a href="#">Instagram</a> | 
        <a href="#">Twitter</a>
    </p>
</div>

<!-- Popup hiển thị thông tin -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span id="close-popup">&times;</span>
        <img id="popup-img" src="" alt="">
        <h2 id="popup-title"></h2>
        <p id="popup-desc"></p>
        <p id="popup-price"></p>
        <button>Thêm vào giỏ</button>
    </div>
</div>

<script src="popup.js"></script>
