<?php
session_start();
include('server.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $uname = $_POST["username"];
    $password1 = $_POST["password_1"];
    $password2 = $_POST["password_2"];

    if ($conn->connect_error) {
        die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM user WHERE username = '$uname' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        if ($password1 == $password2) {
            $updateSql = "UPDATE user SET password = '$password1' WHERE username = '$uname'";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('The password has been changed.');window.location.href = 'login.php';</script>";
            } else {
                echo "There was an error updating your password.
                : " . $conn->error;
            }
        } else {
            echo "<script>alert('Passwords don't match');window.location.href = 'forgotpassword.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid user or email');window.location.href = 'forgotpassword.php';</script>";
    }
    $conn->close();
}
