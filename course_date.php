<?php
session_start();
include('server.php');

$sql = "SELECT date FROM booking";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $eventColor = "#FF5733"; // สีของแต่ละเหตุการณ์
        $eventBackgroundColor = "#FF5733"; // สีพื้นหลังของแต่ละเหตุการณ์

        $data[] = array(
            'title' => 'Seleted',
            'start' => $row['date'],
            'color' => $eventColor, // กำหนดสีของแต่ละเหตุการณ์
            'backgroundColor' => $eventBackgroundColor, // กำหนดสีพื้นหลังของแต่ละเหตุการณ์
        );
    }
}
echo json_encode($data);

$conn->close();
