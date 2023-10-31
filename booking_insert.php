<?php

session_start();
include('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_SESSION['username'];
    $dates = $_POST["dates"];
    $name = $_POST['name'];
    $status = 'pending';

    foreach ($dates as $date) {
        $sql = "INSERT INTO booking (username,date,course_name,status) VALUES ('$username','$date','$name','$status')";
        if ($conn->query($sql) !== TRUE) {
            echo "เกิดข้อผิดพลาดในการแทรกข้อมูล: " . $conn->error;
        }
    }

    $conn->close();
}
