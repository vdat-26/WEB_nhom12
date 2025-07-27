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
                    <li><a href="trangchu.html"><i class="fas fa-home"></i> Trang Chủ</a></li>
                    <li><a href="sach.php"><i class="fas fa-book"></i> Tất Cả Sách</a></li>

                    <li class="has-submenu">
                        <a href="#"><i class="fas fa-th-list"></i> Thể Loại</a>
                        <ul class="submenu">
                        <li><a href="#">Tiểu Thuyết</a></li>
                        <li><a href="#">Khoa Học</a></li>
                        </ul>
                    </li>

                    <li><a href="lienhe.php"><i class="fas fa-envelope"></i> Liên Hệ</a></li>
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


        <!-- Phần main -->
        <div class="main">
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
                    <div class="book">
                        <img class="img-book"
                            src="https://simg.zalopay.com.vn/zlp-website/assets/sach_hay_nhat_nen_doc_hanh_trinh_ve_phuong_dong_b9d61fdb08.jpg"
                            alt="Hành trình về phương đông">
                        <div class="book-title">Hành trình về phương đông</div>
                        <div class="book-tacgia">Tác giả: Baird T. Spalding</div>
                        <div class="book-price">Giá: $20</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-1.jpg"
                            alt="Đắc nhân tâm">
                        <div class="book-title">Đắc nhân tâm</div>
                        <div class="book-tacgia">Tác giả: Dale Carnegie</div>
                        <div class="book-price">Giá: $18</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-2.jpg"
                            alt="Nhà giả kim">
                        <div class="book-title">Nhà giả kim</div>
                        <div class="book-tacgia">Tác giả: Paulo Coelho</div>
                        <div class="book-price">Giá: $17</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-3.jpg"
                            alt="Đời thay đổi khi chúng ta thay đổi">
                        <div class="book-title">Đời thay đổi khi chúng ta thay đổi</div>
                        <div class="book-tacgia">Tác giả: Andrew Matthews</div>
                        <div class="book-price">Giá: $12</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-4.jpg"
                            alt="Những tấm lòng cao cả">
                        <div class="book-title">Những tấm lòng cao cả</div>
                        <div class="book-tacgia">Tác giả: Edmondo De Amicis</div>
                        <div class="book-price">Giá: $23</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-5(1).jpg"
                            alt="Bố già">
                        <div class="book-title">Bố già</div>
                        <div class="book-tacgia">Tác giả: Mario Puzo</div>
                        <div class="book-price">Giá: $21</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-7.jpg"
                            alt="Đọc vị bất kỳ ai">
                        <div class="book-title">Đọc vị bất kỳ ai</div>
                        <div class="book-tacgia">Tác giả: David J.Lieberman</div>
                        <div class="book-price">Giá: $29</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-8.jpg"
                            alt="Cà phê cùng Tony">
                        <div class="book-title">Cà phê cùng Tony</div>
                        <div class="book-tacgia">Tác giả: Tony</div>
                        <div class="book-price">Giá: $25</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-9.jpg"
                            alt="Mặc kệ thiên hạ, sống như người Nhật">
                        <div class="book-title">Mặc kệ thiên hạ, sống như người Nhật</div>
                        <div class="book-tacgia">Tác giả: Mari Tamagawa</div>
                        <div class="book-price">Giá: $16</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-11.jpg"
                            alt="Những cô gái nhỏ">
                        <div class="book-title">Những cô gái nhỏ</div>
                        <div class="book-tacgia">Tác giả: Louisa May Alcott</div>
                        <div class="book-price">Giá: $11</div>
                    </div>

                    <div class="book">
                        <img class="img-book"
                            src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-12.jpg"
                            alt="Người bán hàng vĩ đại nhất thế giới">
                        <div class="book-title">Người bán hàng vĩ đại nhất thế giới</div>
                        <div class="book-tacgia">Tác giả: Og Mandino</div>
                        <div class="book-price">Giá: $32</div>
                    </div>
                </div>             
            </div> <!-- đóng main-right -->
        </div> <!-- đóng main -->

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
