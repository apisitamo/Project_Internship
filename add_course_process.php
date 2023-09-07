<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bsa"; //ชื่อโฟลเดอ ใน PHPmyadmin

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

$name_th = $_POST['name_th'];
$name_eng = $_POST['name_eng'];
$type = $_POST['type'];
$detail_th = $_POST['detail_th'];
$detail_eng = $_POST['detail_eng'];
$day = $_POST['day'];
$price = $_POST['price'];
$hour = $_POST['hour'];

$imgName = $_FILES['img']['name'];
$imgTemp = $_FILES['img']['tmp_name'];
$imgPath = "assets/add_course/" . $imgName;
move_uploaded_file($imgTemp, $imgPath);

$sql = "INSERT INTO add_course (img, name_th,name_eng,type , detail_th, detail_eng,day, price,hour) VALUES ('$imgPath', '$name_th', '$name_eng', '$type','$detail_th', '$detail_eng','$day' ,'$price','$hour')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('หลักสูตรถูกเพิ่มเรียบร้อยแล้ว'); window.location.href = 'add_course.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_course.php';</script>";
}


$conn->close();
