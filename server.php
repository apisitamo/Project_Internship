<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bsa"; //ชื่อโฟลเดอ ใน PHPmyadmin

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}