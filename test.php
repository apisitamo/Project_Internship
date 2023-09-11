<?php

session_start();

require('./server.php');
// var_dump($conn);
echo $_SESSION['username'].'<br>';
$username = mysqli_escape_string($conn,$_SESSION['username']);
$username = "' or '1'='1";
try {
    $sql = "SELECT * FROM user where username = '$username' ";
    echo $sql;
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        print_r($row);
        // echo'1';
    }
} catch (Exception $e) {
    echo 'hello';
}
