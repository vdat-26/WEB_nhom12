<?php
include("../connect.php");
include("../header.php");
?>
<h2>Thêm thể loại</h2>
<form method="post" action="xulythemtheloai.php">
    Tên thể loại: <input type="text" name="ten_the_loai" required>
    <button type="submit" name="them_the_loai">Thêm</button>
</form>
<a href="../quanlykho.php">Quay lại</a>
