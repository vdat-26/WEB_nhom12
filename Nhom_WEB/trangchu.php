
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB B</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="img/logo.png" alt="" >

            </div>
            <div class="manu">
                <nav class="nav">
                    <ul class="menu">
                    <li><a href="trangchu.php"><i class="fas fa-home"></i> Trang Chủ</a></li>
                    <li><a href="trangchu.php?page_layout=tatcasach"><i class="fas fa-book"></i> Tất Cả Sách</a></li>

                    <li class="has-submenu">
                        <a href="#"><i class="fas fa-th-list"></i> Thể Loại</a>
                        <ul class="submenu">
                        <li><a href="trangchu.php?page_layout=tieuthuyet">Tiểu Thuyết</a></li>
                        <li><a href="trangchu.php?page_layout=khoahoc">Khoa Học</a></li>
                        </ul>
                    </li>

                    <li><a href="trangchu.php?page_layout=lienhe"><i class="fas fa-envelope"></i> Liên Hệ</a></li>
                    </ul>
                </nav>
            </div>

            <div class="search-login">
                <form action="timkiem.php" method="GET" class="search-box">
                     <input type="text" id="searchInput" name="query" placeholder="Tìm kiếm sách..." onkeyup="searchBooks()">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="giohang.php" class="icon"><i class="fas fa-shopping-cart"></i></a>
                <a href="dangnhap.php" class="icon"><i class="fas fa-user"></i></a>
            </div>         
        </div>
<?php
    include('connect.php');
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'tatcasach':
                include('tatcasach.php');
                break;
            case 'tieuthuyet':
                include('tieuthuyet.php');
                break;
            case 'khoahoc':
                include('khoahoc.php');
                break;
            case 'lienhe':
                include('lienhe.php');
                break;
            default:
                echo "<h2>Trang không tồn tại!</h2>";
                break;
        }
    } else {
        // Trang chủ
?>

        <!-- Phần main -->
        <div class="main">
            <?php
            include 'connect.php'; // kết nối CSDL
            $sql = "SELECT * FROM sach ORDER BY id DESC LIMIT 10"; // lấy 10 sách mới nhất
            $result = $conn->query($sql);
            ?>
            <!-- Phần main phải -->
            <div class="main-right">
                <!-- Banner -->
                <div class="banner">
                    <img src="img/slider_1.png" class="fade" alt="Ảnh 1">
                    <img src="img/slider_2.png" class="fade" alt="Ảnh 2">
                    <img src="img/slider_3.png" class="fade" alt="Ảnh 3">
                    <img src="img/slider_4.png" class="fade" alt="Ảnh 4">
                </div>

                <!-- Sách đăng bán -->
                <div>
                    <h1>Top các cuốn sách nổi bật của cửa hàng</h1>
                </div>

                <div class="book-list">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="book">
                            <img class="img-book" src="<?= $row['anh_bia'] ?>" alt="<?= $row['ten_sach'] ?>">
                            <div class="book-title"><?= $row['ten_sach'] ?></div>
                            <div class="book-tacgia">Tác giả: <?= $row['tac_gia'] ?></div>
                            <div class="book-price">Giá: $<?= $row['gia'] ?></div>
                        </div>
                    <?php } ?>
                </div>             
            </div> <!-- đóng main-right -->
        </div> <!-- đóng main -->
<?php
    }
?>
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-left">
                    <h3>Cửa Hàng Bán Sách </h3>
                    <p>Địa chỉ: 59 Sông Nhuệ, Bắc Từ Liêm, TP.Hà Nội</p>
                    <p>Email: lienhe@vandatbooks.vn</p>
                    <p>Hotline: 097 7530 171</p>
                </div>
                <div class="footer-right">
                    <h4>Liên kết nhanh</h4>
                    <ul>
                    <li><a href="trangchu.php">Trang chủ</a></li>
                    <li><a href="#">Tất Cả Sách</a></li>
                    <li><a href="#">Thể Loại</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
                <div class="footer-bottom">
                <p>&copy; 2025 Cửa Hàng Bán Sách . All rights reserved.</p>
                </div>
        </footer>

    </div> <!-- đóng container -->
    <script src="script.js"></script>
     

</body>
</html>
