<!DOCTYPE html>
<html lang="en">

<?php
include 'include/headadmin.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

</head>

<style>

    #calendar {
        margin-top: 10px;
        width: 800px;
        height: 600px;
    }

    .top .left {
        display: flex;
        justify-content: center;
        /* margin-left: 50px; */
    }
    
</style>

<body>
    <div class="top">
        <div class="left">
            <div id="calendar"></div>
        </div>
    </div>
    <script src="calendar_admin.js"></script>
</body>

</html>