<?php
// Start the session
session_start();

// Check if 'alert' session is set and is true
if (isset($_SESSION['save_success']) && $_SESSION['save_success']) {
    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    // Clear the session flag
    $_SESSION['save_success'] = false;
}

// Check if 'save_error' session is set and show the error message
if (isset($_SESSION['save_error'])) {
    echo "<script>alert('" . $_SESSION['save_error'] . "');</script>";
    // Clear the error message
    unset($_SESSION['save_error']);
}
?>
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
                            <?php
                            // เชื่อมต่อฐานข้อมูล
                            $db = mysqli_connect($servername, $username, $password, $dbname);
                            // ดึงข้อมูล email จากฐานข้อมูล
                            $username = $_SESSION['username'];
                            $query = "SELECT email FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $email = $row['email'];
                            // แสดงผล email
                            echo '<input type="text" value="' . $email . '" disabled>';
                            ?>
                        <?php endif ?>
                    </div>
                    <form action="savefullname.php" method="post">
                        <div class="input-group">
                            <label for="fullname">ชื่อ-นามสกุล</label>
                            <input type="text" id="fullname" name="fullname" disabled>
                            <button type="submit">แก้ไข</button>
                            <button type="submit">บันทึก</button>
                        </div>
                    </form>
                    <form action="savephone.php" method="post">
                        <div class="input-group">
                            <label for="phone">เบอร์โทร</label>
                            <input type="text" id="phone" name="phone">
                            <button type="submit">บันทึก</button>
                        </div>
                    </form>
                </div>
                <div class="right-box">
                    <div class="input-group">
                        <label for="username">ที่อยู่</label>
                        <input type="text">
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
                    $query = "SELECT * FROM order ORDER BY id DESC";
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