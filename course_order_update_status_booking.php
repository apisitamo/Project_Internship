<?php
include('server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rowId = $_POST['rowId'];
    $selectedStatus = $_POST['selectedStatus'];

    $db = mysqli_connect($servername, $username, $password, $dbname);
    $updateQuery = "UPDATE booking SET status='$selectedStatus' WHERE order_time ='$rowId'";

    if (mysqli_query($db, $updateQuery)) {
        echo 'Status updated successfully';
    } else {
        echo 'Error updating status: ' . mysqli_error($db);
    }

    mysqli_close($db);
}
