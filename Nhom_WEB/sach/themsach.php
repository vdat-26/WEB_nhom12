<?php
include("../connect.php");
?>

<h2>Thêm sách</h2>
<form method="post" action="xulythemsach.php" enctype="multipart/form-data">
    Tên sách: <input type="text" name="ten_sach" required><br>
    Thể loại:
    <select name="id_the_loai" required>
        <?php
        $result = $conn->query("SELECT * FROM TheLoai");
        while($row = $result->fetch_assoc()){
            echo "<option value='{$row['id']}'>{$row['ten_the_loai']}</option>";
        }
        ?>
    </select><br>
    Số lượng: <input type="number" name="so_luong" required><br>
    Giá: <input type="number" name="gia" required><br>
    Mô tả: <textarea name="mo_ta"></textarea><br>
    Ảnh bìa: <input type="file" name="anh_bia"><br>
    <button type="submit" name="them_sach">Thêm</button>
</form>
