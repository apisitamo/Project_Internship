<?php
include('server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rowId = $_POST['rowId'];

    $db = mysqli_connect($servername, $username, $password, $dbname);
    $query = "DELETE FROM product_order WHERE id='$rowId'";
    if (mysqli_query($db, $query)) {
        echo 'ลบข้อมูลเรียบร้อยแล้ว';
    } else {
        echo 'เกิดข้อผิดพลาดในการลบข้อมูล: ' . mysqli_error($db);
    }
    mysqli_close($db);
}
?>