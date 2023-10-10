<?php
session_start();
include('server.php');

// คำสั่ง SQL เพื่อดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT date FROM booking";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'title' => 'ไม่ว่าง', // ชื่อเหตุการณ์ (สามารถเปลี่ยนเป็นอะไรก็ได้)
            'start' => $row['date'], // วันที่
            'isBooked' => true, // เพิ่มคุณสมบัติ isBooked
        );
    }
}

// ส่งข้อมูลในรูปแบบ JSON
echo json_encode($data);

$conn->close();
?>
