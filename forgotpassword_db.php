<?php
session_start();
include('server.php');

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $uname = $_POST["username"];
    $password1 = $_POST["password_1"];
    $password2 = $_POST["password_2"];

    if (empty($uname) && empty($password2) && empty($email) && empty($password1)) {
        array_push($errors, "Please fill input.");
    } elseif ($password1 === '' && $password2 === '') {
        array_push($errors, "Please input password and confirmpassword");
    } elseif (empty($uname)) {
        array_push($errors, "Username is required");
    } elseif (empty($email)) {
        array_push($errors, "Email is required");
    } elseif (empty($password1)) {
        array_push($errors, "Password is required");
    } elseif (empty($password2)) {
        array_push($errors, "Confirm Password is required");
    } elseif ($password1 != $password2) {
        array_push($errors, "Passwords do not match");
    }



    $sql = "SELECT * FROM user WHERE username = '$uname' AND email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        if ($password1 == $password2) {
            if ($password1 != '' && $password2 != '') {
                $updateSql = "UPDATE user SET password = '$password1' WHERE username = '$uname'";
                if ($conn->query($updateSql) === TRUE) {
                    echo "<script>alert('The password has been changed.');window.location.href = 'login.php';</script>";
                } else {
                    echo "There was an error updating your password.
                : " . $conn->error;
                }
            } else {
                $_SESSION['error'] = implode("\n", $errors);
                $errorMessages = implode("\\n", $errors);
                echo "<script>window.location.href = 'forgotpassword.php';</script>";
            }
        } else {
            $_SESSION['error'] = implode("\n", $errors);
            $errorMessages = implode("\\n", $errors);
            echo "<script>window.location.href = 'forgotpassword.php';</script>";
        }
    } else {
        $_SESSION['error'] = implode("\n", $errors);
        $errorMessages = implode("\\n", $errors);
        echo "<script>window.location.href = 'forgotpassword.php';</script>";
    }
    $conn->close();
}
