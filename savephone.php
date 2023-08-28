<?php
// Start the session
session_start();

// Check if 'username' is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Get the submitted data from the form
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    // Validate and sanitize the data if needed
    if (empty($phone)) {
        $_SESSION['save_error'] = "กรุณากรอกเบอร์โทร";
        header("Location: user.php");
        exit();
    }

    // Database connection
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "bsa";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        // Update phone in the 'user' table
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
