<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    if (empty($address)) {
        $_SESSION['save_error'] = "Please enter your address.";
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
            echo "Error : " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "The data cannot be saved because the user is not logged in or there is insufficient information.";
}
