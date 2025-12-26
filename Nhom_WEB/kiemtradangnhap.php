<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /WEB_nhom12/Nhom_WEB/dangky_dangnhap/dangnhap.php");
    exit();
}
