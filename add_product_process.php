<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bsa"; //ชื่อโฟลเดอ ใน PHPmyadmin

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

    $name = $_POST['name'];
    $detail_th = $_POST['detail_th'];
    $detail_eng = $_POST['detail_eng'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    $imgName = $_FILES['img']['name'];
    $imgTemp = $_FILES['img']['tmp_name'];
    $imgPath = "assets/add_product/" . $imgName;
    move_uploaded_file($imgTemp, $imgPath);
    
    $sql = "INSERT INTO add_product (img, name, detail_th, detail_eng, quantity, price) VALUES ('$imgPath', '$name', '$detail_th', '$detail_eng', $quantity, $price)";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('สินค้าถูกเพิ่มเรียบร้อยแล้ว'); window.location.href = 'add_product.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_product.php';</script>";
    }
    

$conn->close();