<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    if (empty($phone)) {
        $_SESSION['save_error'] = "Please enter your phone number.";
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
            echo "Error : " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
} else {
    echo "The data cannot be saved because the user is not logged in or there is insufficient information.";
}
?>
