<?php
session_start();
include('server.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dates = $_POST["dates"];

    // ตรวจสอบว่ามีวันที่ซ้ำกันในฐานข้อมูล
    foreach ($dates as $date) {
        $sql = "SELECT COUNT(*) as count FROM booking WHERE date = '$date'"; // เปลี่ยน date_column เป็นชื่อคอลัมน์ที่ต้องการตรวจสอบ
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["count"] > 0) {
                echo "duplicate";
                $conn->close();
                return;
            }
        }
    }

    $conn->close();
    echo "not_duplicate";
}
?>
