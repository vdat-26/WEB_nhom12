<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .book-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
    padding: 20px;
}

.book-item {
    width: 200px;
    padding: 15px;
    background-color: #f5f5f5;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.book-item img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

.book-item h3 {
    font-size: 16px;
    margin: 10px 0 5px;
}

.book-item p {
    margin: 5px 0;
    font-size: 14px;
}

</style>
<body>
     
       <?php
    $sql = "SELECT * FROM sach";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<div class='book-list'>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='book-item'>";
            echo "<img src='" . $row['anh_bia'] . "' alt='Ảnh bìa'>";
            echo "<h3>" . $row['ten_sach'] . "</h3>";
            echo "<p>Tác giả: " . $row['tac_gia'] . "</p>";
            echo "<p>Giá: " . $row['gia'] . " USD</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>Không có sách nào.</p>";
    }
?>


</body>
</html>