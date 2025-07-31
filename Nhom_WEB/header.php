<div style="background:#333;padding:10px; display:flex; align-items:center; gap:20px; color:white;">
    <!-- Logo hoặc tên website -->
    <a href="/WEB_nhom12/Nhom_WEB/index.php" style="color:white;font-weight:bold;">Trang chủ</a>
    <a href="/WEB_nhom12/Nhom_WEB/quanlykho.php" style="color:white;">Quản lý kho sách</a>

    <!-- Form tìm kiếm chung -->
    <form method="get" action="/WEB_nhom12/Nhom_WEB/index.php" style="margin:0; display:flex; gap:5px;">
        <input type="text" name="keyword" placeholder="Tìm sách..." style="padding:5px;">
        <select name="id_the_loai" style="padding:5px;">
            <option value="">-- Tất cả --</option>
            <?php 
            include_once("connect.php");
            $resultTL = $conn->query("SELECT * FROM TheLoai");
            while($tl = $resultTL->fetch_assoc()){
                echo "<option value='{$tl['id']}'>{$tl['ten_the_loai']}</option>";
            }
            ?>
        </select>
        <button type="submit">Tìm</button>
    </form>

    <!-- Các nút khác -->
    <div style="margin-left:auto;">
        <a href="/WEB_nhom12/Nhom_WEB/user/dangky.php" style="color:white;">Đăng ký</a> |
        <a href="/WEB_nhom12/Nhom_WEB/user/dangnhap.php" style="color:white;">Đăng nhập</a> |
        <a href="/WEB_nhom12/Nhom_WEB/giohang.php" style="color:white;">Giỏ hàng</a>
    </div>
</div>
<hr>
