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
    

    <h1>Kết quả tìm kiếm</h1>
    <div class="book-list">
        <?php if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){ ?>
                <div class="book" data-id="<?=$row['id']?>">
                    <img class="img-book" src="uploads/<?=$row['anh_bia']?>" alt="<?=$row['ten_sach']?>">
                    <div class="book-title"><?=$row['ten_sach']?></div>
                    <div class="book-price">Giá: <?=$row['gia']?>đ</div>
                    <div class="book-actions">
    <button class="btn-info" 
            data-id="<?=$row['id']?>" 
            data-name="<?=$row['ten_sach']?>" 
            data-price="<?=$row['gia']?>" 
            data-desc="<?=$row['mo_ta']?>" 
            data-img="uploads/<?=$row['anh_bia']?>">Thông tin</button>
    <form action="phangiohang/themvaogio.php" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="hidden" name="soluong" value="1">
        <button type="submit" class="btn-add">Thêm vào giỏ</button>
    </form>
</div>

                </div>
        <?php } } else { echo "<p>Không tìm thấy sách phù hợp.</p>"; } ?>
    </div>
</div>
<!-- Popup hiển thị thông tin -->
<div id="popup" class="popup">
    <div class="popup-content">
        <span id="close-popup">&times;</span>
        <img id="popup-img" src="" alt="">
        <h2 id="popup-title"></h2>
        <p id="popup-desc"></p>
        <p id="popup-price"></p>
    </div>
</div>

<script src="popup.js"></script>