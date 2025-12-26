<?php
include("kiemtradangnhap.php");
include("connect.php");
include("header.php");

// --- Phân trang ---
$limit = 10;  // số sách trên 1 trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page < 1) $page = 1;
$start = ($page - 1) * $limit;

// --- Lấy tổng số sách ---
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM Sach");
$totalRow = $totalResult->fetch_assoc();
$totalBooks = $totalRow['total'];
$totalPages = ceil($totalBooks / $limit);

// --- Truy vấn sách theo trang ---
$sql = "SELECT Sach.*, TheLoai.ten_the_loai 
        FROM Sach 
        JOIN TheLoai ON Sach.id_the_loai = TheLoai.id
        LIMIT $start, $limit";
$result = $conn->query($sql);
?>
<div class="main">
    <div class="banner">
        <img src="slider_1.png" alt="Ảnh 1">
        <img src="slider_2.png" alt="Ảnh 2">
        <img src="slider_3.png" alt="Ảnh 3">
        <img src="slider_4.png" alt="Ảnh 4">
    </div>

    <h1>Chào mừng bạn đến với thế giới tri thức</h1>
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

    <!-- Phân trang -->
    <div class="pagination">
        <?php if($page > 1): ?>
            <a href="?page=<?=($page-1)?>">&laquo; Trước</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?=$i?>" class="<?=($i==$page)?'active':''?>"><?=$i?></a>
        <?php endfor; ?>

        <?php if($page < $totalPages): ?>
            <a href="?page=<?=($page+1)?>">Sau &raquo;</a>
        <?php endif; ?>
    </div>
</div>

<!-- Footer mới -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-left">
            <h3>Cửa Hàng Bán Sách </h3>
            <p>Địa chỉ: 59 Sông Nhuệ, Bắc Từ Liêm, TP.Hà Nội</p>
            <p>Email: lienhe@vandatbooks.vn</p>
            <p>Hotline: 097 7530 171</p>
        </div>
        <div class="footer-right">
            <h4>Liên kết nhanh</h4>
            <ul>
                <li><a href="trangchu.php">Trang chủ</a></li>
                <li><a href="#">Tất Cả Sách</a></li>
                <li><a href="#">Thể Loại</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Cửa Hàng Bán Sách . All rights reserved.</p>
    </div>
</footer>

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
