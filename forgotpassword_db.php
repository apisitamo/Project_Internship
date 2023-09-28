<?php
session_start();


// ตรวจสอบการส่งค่าแบบ POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่า username, email, รหัสผ่านใหม่ และยืนยันรหัสผ่านใหม่จากฟอร์ม
    $email = $_POST["email"];
    $uname = $_POST["username"];
    $password1 = $_POST["password_1"];
    $password2 = $_POST["password_2"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bsa"; //ชื่อโฟลเดอ ใน PHPmyadmin

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // เช็คการเชื่อมต่อฐานข้อมูล
    if ($conn->connect_error) {
        die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
    }

    // ตรวจสอบว่า username และ email ตรงกันในฐานข้อมูล
    $sql = "SELECT * FROM user WHERE username = '$uname' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // ตรวจสอบรหัสผ่านใหม่ว่าตรงกันหรือไม่
        if ($password1 == $password2) {
            // อัพเดทรหัสผ่านใหม่ในฐานข้อมูลโดยไม่ใช้การเข้ารหัส
            $updateSql = "UPDATE user SET password = '$password1' WHERE username = '$uname'";
            if ($conn->query($updateSql) === TRUE) {
                // รหัสผ่านถูกเปลี่ยนแล้ว
                echo "<script>alert('รหัสผ่านถูกเปลี่ยนแล้ว');window.location.href = 'login.php';</script>";
            } else {
                echo "เกิดข้อผิดพลาดในการอัพเดทรหัสผ่าน: " . $conn->error;
            }
        } else {
            // รหัสผ่านไม่ตรงกัน
            echo "<script>alert('รหัสผ่านไม่ตรงกัน');window.location.href = 'forgotpassword.php';</script>";
        }
    } else {
        // ไม่พบ username หรือ email ที่ตรงกันในฐานข้อมูล
        echo "<script>alert('ผู้ใช้หรืออีเมลไม่ถูกต้อง');window.location.href = 'forgotpassword.php';</script>";
    }


    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}
