<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    if (empty($phone)) {
        $_SESSION['save_error'] = "กรุณากรอกเบอร์โทร";
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
        $UPDATE = "UPDATE user SET phone = ? WHERE username = ?";
        $stmt = $conn->prepare($UPDATE);
        $stmt->bind_param("ss", $phone, $username);

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
?>
