<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

</head>

<style>
    td {
        background-color: white;
        border: 1px solid #fff;
        padding: 5px;
    }

    /* สีของวันที่ในฐานข้อมูล
    .booked {
        background-color: red;
        color: white;
    } */

    #calendar {
        width: 700px;
        height: 700px;
    }

    .left {
        display: flex;
        justify-content: center;
    }
</style>

<body>
    <div class="left">
        <div id="calendar"></div>
    </div>
    <script src="calendar.js"></script>
</body>

</html>