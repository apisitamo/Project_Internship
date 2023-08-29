<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "you must login first";
    header('location:login.php');
    session_destroy();
}

if (isset($_SESSION['save_success']) && $_SESSION['save_success']) {
    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    $_SESSION['save_success'] = false;
}
if (isset($_SESSION['save_error'])) {
    echo "<script>alert('" . $_SESSION['save_error'] . "');</script>";
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
        height: 250px;
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
        /* height: 100px; */
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
                            $db = mysqli_connect($servername, $username, $password, $dbname);
                            $username = $_SESSION['username'];
                            $query = "SELECT email FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $email = $row['email'];
                            echo '<input type="text" value="' . $email . '" disabled>';
                            ?>
                        <?php endif ?>
                    </div>
                    <form action="savefullname.php" method="post">
                        <div class="input-group">
                            <label for="fullname">ชื่อ-นามสกุล</label>
                            <input type="text" id="fullname" name="fullname">
                            <button type="button" disabled>แก้ไข</button>
                            <button type="submit">บันทึก</button>
                        </div>
                    </form>
                    <form action="savephone.php" method="post">
                        <div class="input-group">
                            <label for="phone">เบอร์โทร</label>
                            <input type="text" id="phone" name="phone">
                            <button type="button" disabled>แก้ไข</button>
                            <button type="submit">บันทึก</button>
                        </div>
                    </form>
                </div>
                <div class="right-box">
                    <form action="saveaddress.php" method="post">
                        <div class="input-group">
                            <label for="address">ที่อยู่</label>
                            <textarea id="address" name="address" style="width: 300px; height: 100px;"></textarea> <!-- ใช้ textarea แทน input และปรับความสูง -->
                        </div>
                        <button type="button" disabled>แก้ไข</button>
                        <button type="submit">บันทึก</button>
                    </form>
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
                    $username = $_SESSION['username'];
                    $query = "SELECT * FROM product_order WHERE username='$username'";
                    $result = mysqli_query($db, $query);

                    $i = 1; // กำหนดค่าเริ่มต้นของ i
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['item']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                    <?php endwhile; ?>
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