<?php
session_start();
include("kiemtradangnhap.php");
include("../connect.php");
include("../header.php");

// Nếu chưa có giỏ hàng thì khởi tạo rỗng
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

// Tính tổng tiền ban đầu
$tongtien = 0;
foreach ($_SESSION['giohang'] as $item) {
    $tongtien += $item['gia'] * $item['soluong'];
}
?>
<?php if (isset($_SESSION['loi_thanhtoan'])): ?>
    <div style="background:#f8d7da;color:#721c24;padding:10px;margin:10px 0;border-radius:5px;">
        <?php 
            foreach ($_SESSION['loi_thanhtoan'] as $loi) {
                echo "<p>$loi</p>";
            }
            unset($_SESSION['loi_thanhtoan']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['thongbao_thanhtoan'])): ?>
    <div style="background:#d4edda;color:#155724;padding:10px;margin:10px 0;border-radius:5px;">
        <p><?= $_SESSION['thongbao_thanhtoan'] ?></p>
    </div>
    <?php unset($_SESSION['thongbao_thanhtoan']); ?>
<?php endif; ?>


<div class="cart-container">
    <h1>Giỏ Hàng</h1>
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($_SESSION['giohang'])) { 
                foreach ($_SESSION['giohang'] as $index => $item) { ?>
                <tr>
                    <td><?= $item['ten_sach'] ?></td>
                    <td><img src="../uploads/<?= $item['anh_bia'] ?>" alt="" width="60"></td>
                    <!-- Giá gốc lưu vào data-gia -->
                    <td class="gia" data-gia="<?= $item['gia'] ?>">
                        <?= number_format($item['gia'], 0, ',', '.') ?>₫
                    </td>
                    <td>
                       <input type="number" value="<?= $item['soluong'] ?>" min="1" 
                         class="soluong" data-index="<?= $index ?>">
                    </td>
                    <!-- Thành tiền từng sản phẩm -->
                    <td class="thanhtien">
                        <?= number_format($item['gia'] * $item['soluong'], 0, ',', '.') ?>₫
                    </td>
                    <td>
                        <a href="xoagio.php?index=<?= $index ?>" class="btn-delete">Xóa</a>
                    </td>
                </tr>
            <?php } } else { ?>
                <tr>
                    <td colspan="6">Giỏ hàng của bạn đang trống</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p><strong>Tổng: <span id="tong-tien"><?= number_format($tongtien, 0, ',', '.') ?>₫</span></strong></p>
    <br>
    <div class="cart-footer">
        <textarea class="cart-note" rows="3" placeholder="Chú thích..."></textarea>
       <div class="cart-buttons">
    <a href="../index.php" class="btn-continue">Tiếp tục mua sắm</a>
    <a href="thanhtoan.php" class="btn-checkout">Thanh toán</a>
</div>

        
    </div>
</div>

<!-- Script tính lại tiền khi thay đổi số lượng -->
<script>
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.soluong').forEach(input => {
        input.addEventListener('change', function(){
            const index = this.dataset.index;
            const soluong = parseInt(this.value);

            // Gửi request đến capnhatsoluong.php để cập nhật session
            fetch(`capnhatsoluong.php?index=${index}&soluong=${soluong}`)
                .then(res => res.json())
                .then(data => {
                    if(data.success){
                        // Cập nhật thành tiền dòng hiện tại
                        const row = input.closest('tr');
                        const gia = parseInt(row.querySelector('.gia').dataset.gia);
                        const thanhTien = gia * soluong;
                        row.querySelector('.thanhtien').innerText = thanhTien.toLocaleString('vi-VN') + '₫';

                        // Tính lại tổng
                        let tong = 0;
                        document.querySelectorAll('.thanhtien').forEach(td => {
                            tong += parseInt(td.innerText.replace(/[₫,.]/g, ''));
                        });
                        document.getElementById('tong-tien').innerText = tong.toLocaleString('vi-VN') + '₫';
                    } else {
                        alert("Cập nhật thất bại!");
                    }
                });
        });
    });
});
</script>
