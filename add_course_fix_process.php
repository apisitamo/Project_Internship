<?php
session_start();
include('server.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

$fix_id = $_POST['fix_id'];
$type = $_POST["type"];
$name_th = $_POST["name_th"];
$name_eng = $_POST["name_eng"];
$detail_th = $_POST["detail_th"];
$detail_eng = $_POST["detail_eng"];
$hour = $_POST["hour"];
$day = $_POST["day"];
$price = $_POST["price"];

$sql = "UPDATE `add_course` SET 
            type = '$type',
            name_th = '$name_th',
            name_eng = '$name_eng',
            detail_th = '$detail_th',
            detail_eng = '$detail_eng',
            hour = $hour,
            day = $day,
            price = $price
            WHERE id = $fix_id";

if ($conn->query($sql) === TRUE) {
    echo "อัปเดตข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . $conn->error;
}

// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();
