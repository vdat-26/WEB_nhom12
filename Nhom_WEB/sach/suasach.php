<?php
include("../connect.php");
include("../header.php");

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM Sach WHERE id=$id")->fetch_assoc();

// Lấy danh sách thể loại
$resultTheLoai = $conn->query("SELECT * FROM TheLoai");
?>
<h2>Sửa sách</h2>
<form method="post" action="xulysuasach.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$row['id']?>">

    Tên sách: <input type="text" name="ten_sach" value="<?=$row['ten_sach']?>" required><br><br>

    Thể loại:
    <select name="id_the_loai">
        <?php while($tl = $resultTheLoai->fetch_assoc()){ ?>
            <option value="<?=$tl['id']?>" <?=($tl['id']==$row['id_the_loai'])?'selected':''?>>
                <?=$tl['ten_the_loai']?>
            </option>
        <?php } ?>
    </select><br><br>

    Số lượng: <input type="number" name="so_luong" value="<?=$row['so_luong']?>" required><br><br>
    Giá: <input type="number" name="gia" value="<?=$row['gia']?>" required><br><br>
    Mô tả: <textarea name="mo_ta"><?=$row['mo_ta']?></textarea><br><br>

    Ảnh bìa hiện tại:<br>
    <?php if(!empty($row['anh_bia'])) { ?>
        <img src="../uploads/<?=$row['anh_bia']?>" width="100"><br>
    <?php } else { echo "Chưa có ảnh"; } ?>
    <br>
    Chọn ảnh mới (nếu muốn đổi): 
    <input type="file" name="anh_bia"><br><br>

    <button type="submit" name="capnhat">Cập nhật</button>
</form>
<a href="../quanlykho.php">Quay lại</a>
