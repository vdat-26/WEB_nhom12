<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="/WEB_nhom12/Nhom_WEB/style.css">

<div class="header">
    <!-- Logo + link -->
    <div class="nav-left">
        <a href="/WEB_nhom12/Nhom_WEB/index.php" class="logo">Trang chủ</a>
        <a href="/WEB_nhom12/Nhom_WEB/quanlykho.php">Quản lý kho sách</a>
    </div>

    <!-- Form tìm kiếm -->
    <form action="/WEB_nhom12/Nhom_WEB/timkiem.php" method="get" class="search-form">
        <input type="text" name="keyword" placeholder="Tìm sách...">
        <select name="theloai">
            <option value="">Tất cả thể loại</option>
            <?php
            $sqlTL = "SELECT * FROM TheLoai";
            $resultTL = $conn->query($sqlTL);
            while($row = $resultTL->fetch_assoc()){
                echo "<option value='{$row['id']}'>{$row['ten_the_loai']}</option>";
            }
            ?>
        </select>
        <button type="submit">Tìm</button>
    </form>

    <!-- Tài khoản -->
    <div class="nav-right">
    <?php if(isset($_SESSION['user'])): ?>
        <span>Xin chào, <?= $_SESSION['user']['username'] ?></span>
        <a href="/WEB_nhom12/Nhom_WEB/dangky_dangnhap/dangxuat.php">Đăng xuất</a>
    <?php else: ?>
        <a href="/WEB_nhom12/Nhom_WEB/dangky_dangnhap/dangky.php">Đăng ký</a>
        <a href="/WEB_nhom12/Nhom_WEB/dangky_dangnhap/dangnhap.php">Đăng nhập</a>
    <?php endif; ?>
    <a href="/WEB_nhom12/Nhom_WEB/phangiohang/giohang.php">Giỏ hàng</a>
</div>


</div>
<hr>
