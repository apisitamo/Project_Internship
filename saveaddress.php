<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    if (empty($address)) {
        $_SESSION['save_error'] = "กรุณากรอกที่อยู่";
        header("Location: user.php");
        exit();
    }

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "bsa";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $UPDATE = "UPDATE user SET address = ? WHERE username = ?";
        $stmt = $conn->prepare($UPDATE);
        $stmt->bind_param("ss", $address, $username);

        if ($stmt->execute()) {
            $_SESSION['save_success'] = true;
            header("Location: user.php");
            exit();
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "ไม่สามารถบันทึกข้อมูลได้เนื่องจากผู้ใช้ไม่ได้ล็อคอินหรือข้อมูลไม่เพียงพอ";
}
