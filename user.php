<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');
?>
<style>
    .container {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .container-top {
        display: flex;
        flex-direction: row;
        flex: 1;
    }

    .left-box,
    .right-box {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
    }

    .left-box {
        background-color: #f2f2f2;
    }

    .right-box {
        background-color: #e0e0e0;
    }

    .bottom-box {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
        background-color: #c0c0c0;
    }




    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ccc;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<body>
    <section>
        <div class="homeheader">
            <h2 style="text-align: center;">User detail</h2>
        </div>
        <div class="container">
            <div class="container-top">
                <div class="left-box">
                    <div class="homecontent">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <label for="username">ชื่อผู้ใช้</label>
                            <input type="text" value="<?php echo $_SESSION['username'] ?>" disabled>
                        <?php endif ?>
                    </div>
                    <div class="homecontent">
                    <?php if (isset($_SESSION['username'])) : ?>
                            <label for="username">อีเมล์</label>
                            <input type="text" value="<?php echo $email ?>" disabled>
                        <?php endif ?>
                    </div>
                    <div class="input-group">
                        <label for="username">เบอร์โทร</label>
                        <input tel="number" name="username">
                    </div>
                    <div class="input-group">
                        <label for="username">เบอร์โทร</label>
                        <input tel="number" name="username">
                    </div>
                </div>
                <div class="right-box">
                    <div class="input-group">
                        <label for="username">เบอร์โทร</label>
                        <input tel="number" name="username">
                    </div>
                </div>
            </div>
            <div class="bottom-box">
                <table>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชนิด</th>
                        <th>รายการ</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>สถานะ</th>
                    </tr>

                    <?php
                    $db = mysqli_connect($servername, $username, $password, $dbname);

                    // ดึงข้อมูลจากฐานข้อมูล
                    $query = "SELECT * FROM user ORDER BY id DESC";
                    $result = mysqli_query($db, $query);

                    $order = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $order . '</td>';
                        echo '<td>' . $row['type'] . '</td>';
                        echo '<td>' . $row['item'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td>' . $row['price'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '</tr>';

                        $order++;
                    }
                    ?>

                </table>
            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>
</body>
<script>
    AOS.init();
</script>

</html>