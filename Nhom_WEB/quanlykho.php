<?php
include("connect.php");
include("header.php");

// --- Lấy dữ liệu tìm kiếm ---
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$id_the_loai = isset($_GET['id_the_loai']) ? $_GET['id_the_loai'] : '';

// --- SQL danh sách sách ---
$sqlSach = "SELECT Sach.*, TheLoai.ten_the_loai 
            FROM Sach 
            JOIN TheLoai ON Sach.id_the_loai = TheLoai.id 
            WHERE Sach.ten_sach LIKE '%$keyword%'";

if(!empty($id_the_loai)){
    $sqlSach .= " AND Sach.id_the_loai = $id_the_loai";
}

$resultSach = $conn->query($sqlSach);
if(!$resultSach) die("Lỗi SQL Sách: " . $conn->error);

// --- Lấy danh sách thể loại ---
$sqlTheLoai = "SELECT * FROM TheLoai";
$resultTheLoai = $conn->query($sqlTheLoai);
if(!$resultTheLoai) die("Lỗi SQL Thể loại: " . $conn->error);
?>

<h2>Quản lý kho sách</h2>

<!-- Form tìm kiếm -->
<form method="get" action="">
    Tìm kiếm sách: 
    <input type="text" name="keyword" value="<?=$keyword?>">

    Thể loại:
    <select name="id_the_loai">
        <option value="">-- Tất cả --</option>
        <?php 
        $resultTL = $conn->query("SELECT * FROM TheLoai");
        while($tl = $resultTL->fetch_assoc()){ 
            $selected = ($id_the_loai==$tl['id'])?'selected':'';
            echo "<option value='{$tl['id']}' $selected>{$tl['ten_the_loai']}</option>";
        } 
        ?>
    </select>

    <button type="submit">Tìm</button>
</form>

<a href="sach/themsach.php">Thêm sách</a>
<hr>

<!-- Danh sách sách -->
<h3>Danh sách sách</h3>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th><th>Ảnh bìa</th><th>Tên sách</th><th>Thể loại</th>
    <th>Số lượng</th><th>Giá</th><th>Mô tả</th><th>Hành động</th>
</tr>
<?php while($row = $resultSach->fetch_assoc()){ ?>
<tr>
    <td><?=$row['id']?></td>
    <td>
        <?php if(!empty($row['anh_bia'])) { ?>
            <img src="uploads/<?=$row['anh_bia']?>" width="60">
        <?php } else { echo "Chưa có ảnh"; } ?>
    </td>
    <td><?=$row['ten_sach']?></td>
    <td><?=$row['ten_the_loai']?></td>
    <td><?=$row['so_luong']?></td>
    <td><?=$row['gia']?></td>
    <td><?=$row['mo_ta']?></td>
    <td>
        <a href="sach/suasach.php?id=<?=$row['id']?>">Sửa</a> |
        <a href="sach/xoasach.php?id=<?=$row['id']?>" onclick="return confirm('Xóa sách này?')">Xóa</a>
    </td>
</tr>
<?php } ?>
</table>

<hr>

<!-- Danh sách thể loại -->
<h3>Danh sách thể loại</h3>
<a href="theloai/themtheloai.php">Thêm thể loại</a>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Tên thể loại</th><th>Hành động</th></tr>
<?php while($row = $resultTheLoai->fetch_assoc()){ ?>
<tr>
    <td><?=$row['id']?></td>
    <td><?=$row['ten_the_loai']?></td>
    <td>
        <a href="theloai/suatheloai.php?id=<?=$row['id']?>">Sửa</a> |
        <a href="theloai/xoatheloai.php?id=<?=$row['id']?>" onclick="return confirm('Xóa thể loại này?')">Xóa</a>
    </td>
</tr>
<?php } ?>
</table>
