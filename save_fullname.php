<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';

    if (empty($fullname)) {
        $_SESSION['save_error'] = "Please enter your fullname.";
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
        $UPDATE = "UPDATE user SET fullname = ? WHERE username = ?";
        $stmt = $conn->prepare($UPDATE);
        $stmt->bind_param("ss", $fullname, $username);

        if ($stmt->execute()) {
            $_SESSION['save_success'] = true;
            header("Location: user.php");
            exit();
        } else {
            echo "Erro : " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "The data cannot be saved because the user is not logged in or there is insufficient information.";
}
