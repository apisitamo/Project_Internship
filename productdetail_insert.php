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
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$status = 'pending';

$imgName = $_FILES['img']['name'];
$imgTemp = $_FILES['img']['tmp_name'];
$imgPath = "assets/transfer_slip_product/" . $imgName;
move_uploaded_file($imgTemp, $imgPath);

$sql = "INSERT INTO product_order (username, type, name,  quantity, price, status, transfer_slip)
        VALUES ('$username', '$type', '$name',  '$quantity', '$price', '$status','$imgPath')";

if ($conn->query($sql) === TRUE) {
    echo "successfully";
} else {
    echo "error: " . $conn->error;
}

$conn->close();
?>
