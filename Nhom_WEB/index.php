<?php
include("connect.php");
include("header.php");

// Lấy dữ liệu tìm kiếm từ header
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$id_the_loai = isset($_GET['id_the_loai']) ? $_GET['id_the_loai'] : '';

// Lấy danh sách sách dựa trên tìm kiếm
$sql = "SELECT Sach.*, TheLoai.ten_the_loai 
        FROM Sach 
        JOIN TheLoai ON Sach.id_the_loai = TheLoai.id
        WHERE Sach.ten_sach LIKE '%$keyword%'";

if(!empty($id_the_loai)){
    $sql .= " AND Sach.id_the_loai = $id_the_loai";
}
$result = $conn->query($sql);
if(!$result) die("Lỗi SQL: ".$conn->error);
?>

<h2>Danh sách sách</h2>
<?php if($result->num_rows == 0){ ?>
    <p>Không có sách nào phù hợp.</p>
<?php } else { ?>
<table border="1" cellpadding="5">
<tr>
    <th>ID</th><th>Ảnh bìa</th><th>Tên sách</th><th>Thể loại</th><th>Số lượng</th><th>Giá</th><th>Mô tả</th>
</tr>
<?php while($row = $result->fetch_assoc()){ ?>
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
</tr>
<?php } ?>
</table>
<?php } ?>
