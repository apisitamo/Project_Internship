<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bsa"; //ชื่อโฟลเดอ ใน PHPmyadmin

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}

$sql = "SELECT email FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row["email"];
        // // ทำสิ่งที่คุณต้องการกับข้อมูล email ตรงนี้
        // echo "Email: " . $email . "<br>";
    }
} else {

}
