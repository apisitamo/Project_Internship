<?php

session_start();
include('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_SESSION['username'];
    $dates = $_POST["dates"];
    $name = $_POST['name'];


    // วนลูปเพื่อแทรกข้อมูลลงในตาราง booking
    foreach ($dates as $date) {
        $sql = "INSERT INTO booking (username,date,course_name) VALUES ('$username','$date','$name')"; // เปลี่ยน date_column เป็นชื่อคอลัมน์ที่ต้องการแทรก
        if ($conn->query($sql) !== TRUE) {
            echo "เกิดข้อผิดพลาดในการแทรกข้อมูล: " . $conn->error;
        }
    }

    $conn->close();
}
