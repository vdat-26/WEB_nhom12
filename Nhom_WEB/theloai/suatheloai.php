<?php
include("../connect.php");
include("../header.php");

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM TheLoai WHERE id=$id")->fetch_assoc();
?>
<h2>Sửa thể loại</h2>

<style>
    h2 {
        text-align: center;
        color: #333;
        font-family: Arial, sans-serif;
    }
.sua-tl-form {
    width: 320px;
    padding: 20px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    margin: 20px auto;
}

.sua-tl-form input[type="text"] {
    width: 100%;
    padding: 6px 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 10px 0;
    font-size: 14px;
    box-sizing: border-box;
}

.sua-tl-form button {
    width: 100%;
    padding: 8px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s ease;
}
.sua-tl-form button:hover {
    background: #0056b3;
}

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

<form method="post" action="xulysuatheloai.php" class="sua-tl-form">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <label for="ten_the_loai">Tên thể loại:</label>
    <input type="text" id="ten_the_loai" name="ten_the_loai" value="<?=$row['ten_the_loai']?>" required>
    <button type="submit" name="sua_the_loai">Cập nhật</button>
</form>

<a href="../quanlykho.php" class="back-link">Quay lại</a>
