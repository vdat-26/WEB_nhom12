<?php
include("../connect.php");
include("../header.php");
?>
<h2 class="them-tl-title">Thêm thể loại</h2>

<style>
/* Tiêu đề h2 riêng của trang thêm thể loại */
.them-tl-title {
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 22px;
    margin: 20px 0;
    color: #333;
}

/* Form thêm thể loại */
.them-tl-form {
    width: 320px;
    padding: 20px;
    margin: 0 auto;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

.them-tl-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.them-tl-form input[type="text"] {
    width: 100%;
    padding: 6px 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 14px;
    box-sizing: border-box;
}

.them-tl-form button {
    width: 100%;
    padding: 8px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.them-tl-form button:hover {
    background: #1e7e34;
}

/* Link quay lại */
.back-link {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #6c757d;
    text-decoration: none;
}
.back-link:hover {
    text-decoration: underline;
}
</style>

<form method="post" action="xulythemtheloai.php" class="them-tl-form">
    <label for="ten_the_loai">Tên thể loại:</label>
    <input type="text" id="ten_the_loai" name="ten_the_loai" required>
    <button type="submit" name="them_the_loai">Thêm</button>
</form>

<a href="../quanlykho.php" class="back-link">Quay lại</a>
