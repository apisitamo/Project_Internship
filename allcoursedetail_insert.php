<?php
session_start();
include('server.php');

if (!isset($_SESSION['username'])) {
    echo "You are not logged in.";
    exit;
}

$username = $_SESSION['username'];
$type = $_POST['type'];
$name = $_POST['name'];
$day = $_POST['day'];
$quantity = '1';
$price = $_POST['price'];
$status = 'pending';

$imgName = $_FILES['img']['name'];
$imgTemp = $_FILES['img']['tmp_name'];
$imgPath = "assets/transfer_slip_course/" . $imgName;
move_uploaded_file($imgTemp, $imgPath);

$sql = "INSERT INTO course_order (username, type, name, day, quantity, price, status , transfer_slip)
        VALUES ('$username', '$type', '$name', '$day', '$quantity', '$price', '$status','$imgPath')";

if ($conn->query($sql) === TRUE) {
    echo "successfully";
} else {
    echo "error: " . $conn->error;
}

$conn->close();
?>
