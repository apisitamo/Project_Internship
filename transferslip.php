<!DOCTYPE html>

<head>
    <?php
    include('server.php');
    ?>
    <?php
    if (isset($_GET['trans_id'])) {
        $trans_id = $_GET['trans_id'];
        $sql = "SELECT * FROM `course_order` WHERE id = $trans_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $transfer_slip = $row['transfer_slip'];
                $username = $row['username'];
                $order_time = $row['order_time'];
            }
        } else {
            echo "Product not found in database";
        }

        $conn->close();
    } else {
        echo "The specified product code was not found";
    }
    ?>
</head>

<style>
    .img-card {
        text-align: center;
    }
</style>

<body style="background-color:black;">
    <div class="img-card">
        <img style="height: 750px;" src="<?php echo $transfer_slip ?>">
    </div>
</body>

</html>