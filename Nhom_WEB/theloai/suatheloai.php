<?php
include("../connect.php");
include("../header.php");

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM TheLoai WHERE id=$id")->fetch_assoc();
?>
<h2>Sửa thể loại</h2>
<form method="post" action="xulysuatheloai.php">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    Tên thể loại: <input type="text" name="ten_the_loai" value="<?=$row['ten_the_loai']?>" required>
    <button type="submit" name="sua_the_loai">Cập nhật</button>
</form>
<a href="../quanlykho.php">Quay lại</a>
