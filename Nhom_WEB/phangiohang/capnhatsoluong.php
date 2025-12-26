<?php
session_start();
if(isset($_GET['index']) && isset($_GET['soluong'])){
    $index = (int)$_GET['index'];
    $soluong = (int)$_GET['soluong'];

    if(isset($_SESSION['giohang'][$index]) && $soluong > 0){
        $_SESSION['giohang'][$index]['soluong'] = $soluong;
        echo json_encode(['success'=>true]);
        exit;
    }
}
echo json_encode(['success'=>false]);
?>
