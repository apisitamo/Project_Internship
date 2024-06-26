<?php
session_start();
include('server.php');

$sql = "SELECT * FROM booking WHERE status = 'pending' OR status = 'completed'; ";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $eventColor = "#FF5733";
        $eventBackgroundColor = "#FF5733";

        $data[] = array(
            'title' => $row['username'],
            'start' => $row['date'],
            'color' => $eventColor,
            'backgroundColor' => $eventBackgroundColor,
        );
    }
}

echo json_encode($data);

$conn->close();
