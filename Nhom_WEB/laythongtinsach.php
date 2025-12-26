<?php
include("connect.php");
$id = intval($_GET['id']);
$sql = "SELECT * FROM Sach WHERE id = $id";
$result = $conn->query($sql);
echo json_encode($result->fetch_assoc());
?>
