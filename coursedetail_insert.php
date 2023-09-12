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
$day = $_POST['day'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$status = 'รอตรวจสอบ';

$sql = "INSERT INTO course_order (username, type, name, day, quantity, price, status)
        VALUES ('$username', '$type', '$name', '$day', '$quantity', '$price', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "เพิ่มรายการสำเร็จ";
} else {
    echo "ผิดพลาด: " . $conn->error;
}

$conn->close();
?>
