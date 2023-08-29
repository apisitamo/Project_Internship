<!DOCTYPE html>
<html lang="en">
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
                            <?php
                            $query = "SELECT fullname FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $fullname = $row['fullname'];
                            ?>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" <?php if (isset($_SESSION['edit_fullname'])) echo '';
                                                                                                                else echo 'disabled'; ?>>
                            <?php if (!isset($_SESSION['edit_fullname'])) : ?>
                                <button type="button" id="editButton" onclick="enableFullname()">แก้ไข</button>
                            <?php else : ?>
                                <button type="button" id="cancelButton" onclick="cancelEdit()">ยกเลิก</button>
                            <?php endif; ?>
                            <button type="submit" <?php if (!isset($_SESSION['edit_fullname'])); ?>>บันทึก</button>
                        </div>
                    </form>
                    <form action="savephone.php" method="post">
                        <div class="input-group">
                            <label for="phone">เบอร์โทร</label>
                            <?php
                            $query = "SELECT phone FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $phone = $row['phone'];
                            ?>
                            <input type="text" id="phone" name="phone" pattern="[0-9]+" value="<?php echo $phone; ?>" <?php if (isset($_SESSION['edit_phone'])) echo '';
                                                                                                        else echo 'disabled'; ?>>
                            <?php if (!isset($_SESSION['edit_phone'])) : ?>
                                <button type="button" id="editPhoneButton" onclick="enablePhone()">แก้ไข</button>
                            <?php else : ?>
                                <button type="button" id="cancelPhoneButton" onclick="cancelPhoneEdit()">ยกเลิก</button>
                            <?php endif; ?>
                            <button type="submit" <?php if (!isset($_SESSION['edit_phone'])); ?>>บันทึก</button>
                        </div>
                    </form>
                </div>
                <div class="right-box">
                    <form action="saveaddress.php" method="post">
                        <div class="input-group">
                            <label for="address">ที่อยู่</label>
                            <?php
                            $query = "SELECT address FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $address = $row['address'];
                            ?>
                            <textarea id="address" name="address" style="width: 300px; height: 100px;" <?php if (isset($_SESSION['edit_address'])) echo '';
                                                                                                        else echo 'disabled'; ?>><?php echo $address; ?></textarea>
                        </div>
                        <?php if (!isset($_SESSION['edit_address'])) : ?>
                            <button type="button" id="editAddressButton" onclick="enableAddress()">แก้ไข</button>
                        <?php else : ?>
                            <button type="button" id="cancelAddressButton" onclick="cancelAddressEdit()">ยกเลิก</button>
                        <?php endif; ?>
                        <button type="submit" <?php if (!isset($_SESSION['edit_address'])); ?>>บันทึก</button>
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
<script>
    function enableFullname() {
        document.getElementById('fullname').removeAttribute('disabled');
        document.getElementById('editButton').style.display = 'none';
        <?php $_SESSION['edit_fullname'] = true; ?>
    }

    function cancelEdit() {
        document.getElementById('fullname').setAttribute('disabled', 'disabled');
        document.getElementById('cancelButton').style.display = 'none';
        document.getElementById('editButton').style.display = 'block';
        document.querySelector('form[action="savefullname.php"] button[type="submit"]').setAttribute('disabled', 'disabled');
        <?php unset($_SESSION['edit_fullname']); ?>
    }

    function enablePhone() {
        document.getElementById('phone').removeAttribute('disabled');
        document.getElementById('editPhoneButton').style.display = 'none';
        <?php $_SESSION['edit_phone'] = true; ?>
    }

    function cancelPhoneEdit() {
        document.getElementById('phone').setAttribute('disabled', 'disabled');
        document.getElementById('editPhoneButton').style.display = 'block';
        document.querySelector('form[action="savephone.php"] button[type="submit"]').setAttribute('disabled', 'disabled');
        <?php unset($_SESSION['edit_phone']); ?>
    }

    function enableAddress() {
        document.getElementById('address').removeAttribute('disabled');
        document.getElementById('editAddressButton').style.display = 'none';
        <?php $_SESSION['edit_address'] = true; ?>
    }

    function cancelAddressEdit() {
        document.getElementById('address').setAttribute('disabled', 'disabled');
        document.getElementById('editAddressButton').style.display = 'block';
        document.querySelector('form[action="saveaddress.php"] button[type="submit"]').setAttribute('disabled', 'disabled');
        <?php unset($_SESSION['edit_address']); ?>
    }
</script>


</html>