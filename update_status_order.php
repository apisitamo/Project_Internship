<?php
session_start();
include('server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rowId = $_POST['rowId'];
    $newStatus = $_POST['newStatus'];

    // คำสั่ง SQL สำหรับอัพเดตสถานะในฐานข้อมูล
    $updateQuery = "UPDATE product_order SET status = '$newStatus' WHERE id = $rowId";

    if (mysqli_query($db, $updateQuery)) {
        http_response_code(200);
        echo 'อัพเดตสถานะสำเร็จ';
    } else {
        http_response_code(500);
        echo 'เกิดข้อผิดพลาดในการอัพเดตสถานะ: ' . mysqli_error($db);
    }
}
