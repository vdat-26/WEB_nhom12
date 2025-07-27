<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">   
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
                    <input type="text" name="query" placeholder="Tìm kiếm sách...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <a href="giohang.php" class="icon"><i class="fas fa-shopping-cart"></i></a>
                <a href="dangnhap.php" class="icon"><i class="fas fa-user"></i></a>
            </div>
        </div>


         <div class="container">
        <div class="header"></div>
        <div class="main">
            <div class="main-right">
                <div class="banner">
                    <img src="slider_1.png" class="fade" alt="Ảnh 1">
                    <img src="slider_2.png" class="fade" alt="Ảnh 2">
                    <img src="slider_3.png" class="fade" alt="Ảnh 3">
                    <img src="slider_4.png" class="fade" alt="Ảnh 4">
                </div>

                <h1>Top các cuốn sách nổi bật của cửa hàng</h1>

                <div class="book-list" id="bookList">
                
                    <div class="book"><img class="img-book" src="https://simg.zalopay.com.vn/zlp-website/assets/sach_hay_nhat_nen_doc_hanh_trinh_ve_phuong_dong_b9d61fdb08.jpg" alt=""><div class="book-title">Hành trình về phương đông</div><div class="book-tacgia">Tác giả: Baird T. Spalding</div><div class="book-price">Giá: $20</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-1.jpg" alt=""><div class="book-title">Đắc nhân tâm</div><div class="book-tacgia">Tác giả: Dale Carnegie</div><div class="book-price">Giá: $18</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-2.jpg" alt=""><div class="book-title">Nhà giả kim</div><div class="book-tacgia">Tác giả: Paulo Coelho</div><div class="book-price">Giá: $17</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-3.jpg" alt=""><div class="book-title">Đời thay đổi khi chúng ta thay đổi</div><div class="book-tacgia">Tác giả: Andrew Matthews</div><div class="book-price">Giá: $12</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-4.jpg" alt=""><div class="book-title">Những tấm lòng cao cả</div><div class="book-tacgia">Tác giả: Edmondo De Amicis</div><div class="book-price">Giá: $23</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-5(1).jpg" alt=""><div class="book-title">Bố già</div><div class="book-tacgia">Tác giả: Mario Puzo</div><div class="book-price">Giá: $21</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-7.jpg" alt=""><div class="book-title">Đọc vị bất kỳ ai</div><div class="book-tacgia">Tác giả: David J.Lieberman</div><div class="book-price">Giá: $29</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-8.jpg" alt=""><div class="book-title">Cà phê cùng Tony</div><div class="book-tacgia">Tác giả: Tony</div><div class="book-price">Giá: $25</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-9.jpg" alt=""><div class="book-title">Mặc kệ thiên hạ, sống như người Nhật</div><div class="book-tacgia">Tác giả: Mari Tamagawa</div><div class="book-price">Giá: $16</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-11.jpg" alt=""><div class="book-title">Những cô gái nhỏ</div><div class="book-tacgia">Tác giả: Louisa May Alcott</div><div class="book-price">Giá: $11</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-12.jpg" alt=""><div class="book-title">Người bán hàng vĩ đại nhất thế giới</div><div class="book-tacgia">Tác giả: Og Mandino</div><div class="book-price">Giá: $32</div></div>
                    <div class="book"><img class="img-book" src="https://images.careerviet.vn/content/images/sach-hay-careerbuilder-12.jpg" alt=""><div class="book-title">Sách thêm</div><div class="book-tacgia">Tác giả: A</div><div class="book-price">Giá: $30</div></div>
                </div>
                 <div class="phan-trang" id="phanTrang"></div>
                <div class="footer">Footer</div>
            </div>
        </div>
    </div>
<!-- Phân trang -->
    <script>
        const books = document.querySelectorAll('.book');
        const phanTrang = document.getElementById('phanTrang');
        const sachMoiTrang = 10;  // 10 quyển mỗi trang
        let trangHienTai = 1;

        function hienThiTrang(trang) {
            const batDau = (trang - 1) * sachMoiTrang;
            const ketThuc = batDau + sachMoiTrang;
            books.forEach((book, index) => {
                book.style.display = (index >= batDau && index < ketThuc) ? 'block' : 'none';
            });
        }

        function taoNutPhanTrang() {
            phanTrang.innerHTML = '';
            const tongTrang = Math.ceil(books.length / sachMoiTrang);
            for (let i = 1; i <= tongTrang; i++) {
                const nut = document.createElement('button');
                nut.innerText = i;
                nut.className = (i === trangHienTai) ? 'active' : '';
                nut.addEventListener('click', () => {
                    trangHienTai = i;
                    hienThiTrang(trangHienTai);
                    taoNutPhanTrang();
                });
                phanTrang.appendChild(nut);
            }
        }

        hienThiTrang(trangHienTai);
        taoNutPhanTrang();
    </script>
        <!-- <div class="main">
            <div class="main-left">
                2
            </div>
            <div class="main-right">
                3
            </div>
        </div>
        <div class="footer">
            4
        </div> -->

    </div>
</body>
</html>