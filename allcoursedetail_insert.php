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
$status = 'pending';

$sql = "INSERT INTO course_order (username, type, name, day, quantity, price, status)
        VALUES ('$username', '$type', '$name', '$day', '$quantity', '$price', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "successfully";
} else {
    echo "error: " . $conn->error;
}

$conn->close();
?>
