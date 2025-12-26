<?php
include("../connect.php");
include("../header.php");

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM Sach WHERE id=$id")->fetch_assoc();

// Lấy danh sách thể loại
$resultTheLoai = $conn->query("SELECT * FROM TheLoai");
?>
<h2 class="sua-sach-title">Sửa sách</h2>

<style>
/* Tiêu đề h2 riêng */
.sua-sach-title {
    text-align: center;
    font-family: Arial, sans-serif;
    font-size: 22px;
    margin: 20px 0;
    color: #333;
}

/* Form sửa sách */
form.sua-sach-form {
    width: 420px;
    padding: 20px;
    margin: 0 auto 20px auto;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: #fff;
    font-family: Arial, sans-serif;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

form.sua-sach-form label {
    font-weight: bold;
    margin-top: 10px;
    display: inline-block;
}

form.sua-sach-form input[type="text"],
form.sua-sach-form input[type="number"],
form.sua-sach-form textarea,
form.sua-sach-form select {
    width: 100%;
    padding: 6px 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

form.sua-sach-form textarea {
    height: 80px;
    resize: vertical;
}

form.sua-sach-form input[type="file"] {
    margin-top: 5px;
    margin-bottom: 15px;
}

form.sua-sach-form img {
    border-radius: 4px;
    margin-bottom: 10px;
}

form.sua-sach-form button {
    width: 100%;
    padding: 8px 14px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
form.sua-sach-form button:hover {
    background-color: #0056b3;
}

/* Link quay lại */
a.back-link {
    display: block;
    text-align: center;
    margin-top: 10px;
    color: #6c757d;
    text-decoration: none;
    font-size: 14px;
}
a.back-link:hover {
    text-decoration: underline;
}
</style>

<form method="post" action="xulysuasach.php" enctype="multipart/form-data" class="sua-sach-form">
    <input type="hidden" name="id" value="<?=$row['id']?>">

    <label for="ten_sach">Tên sách:</label>
    <input type="text" id="ten_sach" name="ten_sach" value="<?=$row['ten_sach']?>" required>

    <label for="id_the_loai">Thể loại:</label>
    <select id="id_the_loai" name="id_the_loai">
        <?php while($tl = $resultTheLoai->fetch_assoc()){ ?>
            <option value="<?=$tl['id']?>" <?=($tl['id']==$row['id_the_loai'])?'selected':''?>>
                <?=$tl['ten_the_loai']?>
            </option>
        <?php } ?>
    </select>

    <label for="so_luong">Số lượng:</label>
    <input type="number" id="so_luong" name="so_luong" value="<?=$row['so_luong']?>" required>

    <label for="gia">Giá:</label>
    <input type="number" id="gia" name="gia" value="<?=$row['gia']?>" required>

    <label for="mo_ta">Mô tả:</label>
    <textarea id="mo_ta" name="mo_ta"><?=$row['mo_ta']?></textarea>

    <label>Ảnh bìa hiện tại:</label><br>
    <?php if(!empty($row['anh_bia'])) { ?>
        <img src="../uploads/<?=$row['anh_bia']?>" width="100"><br>
    <?php } else { echo "Chưa có ảnh"; } ?>

    <label for="anh_bia">Chọn ảnh mới (nếu muốn đổi):</label>
    <input type="file" id="anh_bia" name="anh_bia">

    <button type="submit" name="capnhat">Cập nhật</button>
</form>

<a href="../quanlykho.php" class="back-link">Quay lại</a>
