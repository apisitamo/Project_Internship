<?php
include('server.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rowId = $_POST['rowId'];
    $noteValue = $_POST['noteValue'];

    $db = mysqli_connect($servername, $username, $password, $dbname);
    $noteValue = mysqli_real_escape_string($db, $noteValue);
    $query = "UPDATE course_order SET note='$noteValue' WHERE id='$rowId'";
    mysqli_query($db, $query);
    mysqli_close($db);

    echo 'Note updated successfully';
}
?>