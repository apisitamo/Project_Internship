<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
    echo "คุณไม่ได้ล็อกอิน";
    exit;
}

$username = $_SESSION['username'];
$type = $_POST['type'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$status = 'รอตรวจสอบ';

$sql = "INSERT INTO product_order (username, type, name,  quantity, price, status)
        VALUES ('$username', '$type', '$name',  '$quantity', '$price', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "successfully";
} else {
    echo "ผิดพลาด: " . $conn->error;
}

$conn->close();
?>
