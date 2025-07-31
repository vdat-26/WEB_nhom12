<?php
session_start();
session_destroy(); // Xóa toàn bộ session
header("Location: /WEB_nhom12/Nhom_WEB/dangky_dangnhap/dangnhap.php");
exit();
