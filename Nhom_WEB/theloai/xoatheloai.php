<?php
include("../connect.php");

$id = $_GET['id'];
$conn->query("DELETE FROM TheLoai WHERE id=$id");
header("Location: ../quanlykho.php");
