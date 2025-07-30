<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- NỘI DUNG TRANG LIÊN HỆ -->
    <div class="main">
        <h1>Liên hệ với chúng tôi</h1>
        <p style="text-align:center; max-width: 700px; margin: 0 auto;">
            Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ, vui lòng liên hệ với chúng tôi qua thông tin bên dưới hoặc điền vào biểu mẫu.
        </p>

        <div style="display: flex; justify-content: center; margin-top: 30px; gap: 50px; flex-wrap: wrap;">
            <!-- Thông tin liên hệ -->
            <div style="flex: 1; min-width: 250px;">
                <h3>Thông tin liên hệ</h3>
                <p><strong>Địa chỉ:</strong>59 Sông Nhuệ, Bắc Từ Liêm, TP.Hà Nội </p>
                <p><strong>Email:</strong> lienhe@vandatbooks.vn</p>
                <p><strong>Điện thoại:</strong> 0977 530 171</p>
                <p><strong>Giờ làm việc:</strong> 8:00 - 17:00 (T2 - T6)</p>
            </div>

            <!-- Biểu mẫu liên hệ -->
            <div style="flex: 1; min-width: 300px;">
                <h3>Gửi tin nhắn</h3>
                <form action="#" method="post">
                    <input type="text" name="name" placeholder="Họ và tên" required style="width:90%; padding:8px; margin-bottom:10px;">
                    <input type="email" name="email" placeholder="Email" required style="width:90%; padding:8px; margin-bottom:10px;">
                    <textarea name="message" rows="5" placeholder="Nội dung..." required style="width:90%; padding:8px;"></textarea>
                    <button type="submit" style="margin-top:10px; padding:10px 20px; background-color:#7ecc00; border:none; color:white;">Gửi</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>