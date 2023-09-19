<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bsa"; //ชื่อโฟลเดอ ใน PHPmyadmin

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

$imgName = $_FILES['img']['name'];
$imgTemp = $_FILES['img']['tmp_name'];
$imgPath = "assets/add_gallery/" . $imgName;
move_uploaded_file($imgTemp, $imgPath);

$sql = "INSERT INTO add_gallery (img) VALUES ('$imgPath')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('There was an error adding a gallery'); window.location.href = 'add_gallery.php';</script>";
} else {
    echo "<script>alert('Error : " . $conn->error . "'); window.location.href = 'add_gallery.php';</script>";
}


$conn->close();