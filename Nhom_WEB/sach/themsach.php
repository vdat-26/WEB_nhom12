<?php
include("../connect.php");
?>

<h2 class="them-sach-title">Thêm sách</h2>

<style>
/* Tiêu đề h2 */
.them-sach-title {
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 22px;
    margin: 20px 0;
    color: #333;
}

/* Form thêm sách */
form.them-sach-form {
    width: 400px;
    padding: 20px;
    margin: 0 auto;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fff;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

form.them-sach-form label {
    font-weight: bold;
    margin-top: 10px;
    display: inline-block;
}

form.them-sach-form input[type="text"],
form.them-sach-form input[type="number"],
form.them-sach-form textarea,
form.them-sach-form select {
    width: 100%;
    padding: 6px 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

form.them-sach-form textarea {
    height: 80px;
    resize: vertical;
}

form.them-sach-form input[type="file"] {
    margin-top: 5px;
    margin-bottom: 15px;
}

form.them-sach-form button {
    width: 100%;
    padding: 8px 14px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form.them-sach-form button:hover {
    background-color: #1e7e34;
}
</style>

<form method="post" action="xulythemsach.php" enctype="multipart/form-data" class="them-sach-form">
    <label for="ten_sach">Tên sách:</label>
    <input type="text" id="ten_sach" name="ten_sach" required>

    <label for="id_the_loai">Thể loại:</label>
    <select id="id_the_loai" name="id_the_loai" required>
        <?php
        $result = $conn->query("SELECT * FROM TheLoai");
        while($row = $result->fetch_assoc()){
            echo "<option value='{$row['id']}'>{$row['ten_the_loai']}</option>";
        }
        ?>
    </select>

    <label for="so_luong">Số lượng:</label>
    <input type="number" id="so_luong" name="so_luong" required>

    <label for="gia">Giá:</label>
    <input type="number" id="gia" name="gia" required>

    <label for="mo_ta">Mô tả:</label>
    <textarea id="mo_ta" name="mo_ta"></textarea>

    <label for="anh_bia">Ảnh bìa:</label>
    <input type="file" id="anh_bia" name="anh_bia">

    <button type="submit" name="them_sach">Thêm</button>
</form>
