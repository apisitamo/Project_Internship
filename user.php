<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include 'include/langid.php';
include('server.php');
// session_start();

if (isset($_SESSION['save_success']) && $_SESSION['save_success']) {
    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    $_SESSION['save_success'] = false;
}
if (isset($_SESSION['save_error'])) {
    echo "<script>alert('" . $_SESSION['save_error'] . "');</script>";
    unset($_SESSION['save_error']);
}
?>

<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "you must login first";
    header('location:login.php');
    session_destroy();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:index.php');
}
?>

<style>
    .user1 {
        margin-top: 30px;
        margin-bottom: 70px;
    }

    .user1 .container {
        display: flex;
        flex-direction: column;
    }

    .user1 #user-con {
        max-width: 1450px;
    }

    .user1 .container-top {
        display: flex;
        flex-direction: row;
        flex: 1;

    }

    .user1 .homecontent {
        margin-bottom: 15px;
        padding-left: 50px;
    }

    .user1 .homecontent:nth-child(1) input {
        padding-right: 50px;
        margin-right: 25px;
        margin-left: 0px;
        background: #e0e0e0;
        padding-left: 5px;
    }

    .user1 .homecontent:nth-child(2) input {
        padding-right: 50px;
        margin-right: 17px;
        margin-left: 0px;
        background: #e0e0e0;
        padding-left: 5px;
    }

    .user1 input {
        border-radius: 10px;
        padding: 4px;
    }

    .user1 .left-box,
    .user1 .right-box {
        flex: 1;
        padding: 25px;
        box-sizing: border-box;
        padding-bottom: 20px;
    }

    .user1 .left-box {
        background-color: #f2f2f2;
        text-align: center;
        padding-right: 30px;
        border-radius: 15px 0px 0px 15px;
    }

    .user1 .left-box form {
        padding-left: 150px;
    }

    .user1 .left-box .save-phone {
        padding-left: 175px;
    }

    .user1 .right-box {
        background-color: #f2f2f2;
        padding-left: 30px;
        border-radius: 0px 15px 15px 0px;
    }

    .user1 .bottom-box {
        flex: 1;
        padding: 20px;
        box-sizing: border-box;
    }

    .user1 table {
        border-collapse: collapse;
        width: 102%;
        margin-left: -15px;
        border: 1px solid #ccc;
    }

    .user1 th,
    .user1 td {
        border: 3px solid #000;
        padding: 8px;
        text-align: center;
        border-top: 2px solid #000;
    }

    .user1 th {
        background-color: #ffc387;
    }

    .user1 td {
        background: #fffec4;
    }

    .user1 .input-group {
        column-gap: 4px;
        margin-bottom: 15px;
    }

    .user1 button {
        padding: 4px;
        padding-left: 10px;
        padding-right: 10px;
        border: none;
    }

    .user1 .input-group #fullname {
        padding-right: 50px;
        border-radius: 10px;
        background: white;
        padding-left: 5px;
    }

    .user1 .input-group #phone {
        padding-right: 50px;
        border-radius: 10px;
        margin-left: 0px;
        background: white;
        padding-left: 5px;
    }

    .user1 .input-group #address {
        width: 85%;
        height: 120px;
        padding: 5px;
        border-radius: 10px;
        background: white;
    }









    #editfullname {
        border-radius: 10px;
        background: burlywood;
    }

    #canclefullname {
        border-radius: 10px;
        display: none;
        background: red;
    }

    #submitfullname {
        border-radius: 10px;
        display: none;
        background: green;
    }



    .user1 .input-group #editphone {
        border-radius: 10px;
        background: burlywood;
    }

    .user1 #submitphone {
        border-radius: 10px;
        display: none;
        background: green;
    }

    .user1 #canclephone {
        border-radius: 10px;
        display: none;
        background: red;
    }



    .user1 .button-address #editaddress {
        border-radius: 10px;
        background: burlywood;
    }

    .user1 #submitaddress {
        border-radius: 10px;
        display: none;
        background: green;
    }

    .user1 #cancleaddress {
        border-radius: 10px;
        display: none;
        background: red;
    }

    .user1 #addressuser {
        margin-bottom: 20px;
    }

    .user1 .button-address {
        padding-left: 40px;
    }
</style>

<body>
    <section class="user1">
        <div class="homeheader">
        </div>
        <div class="container" id="user-con">
            <div class="container-top">
                <div class="left-box">
                    <div class="homecontent">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <label for="username"><?= $usernames ?></label><label> : </label>
                            <input type="text" value="<?php echo $_SESSION['username'] ?>" disabled>
                        <?php endif ?>
                    </div>
                    <div class="homecontent">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <label for="username"><?= $email ?></label><label> : </label>
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
                    <form action="save_fullname.php" method="post">
                        <div class="input-group">
                            <label for="fullname"><?= $fullname?></label><label> : </label>
                            <?php
                            $query = "SELECT fullname FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $fullname = $row['fullname'];
                            ?>
                            <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" <?php if (isset($_SESSION['edit_fullname']))
                                                                                                                    echo '';
                                                                                                                else
                                                                                                                    echo 'disabled'; ?>>
                            <button type="button" id="editfullname" onclick="enableFullname()">แก้ไข</button>
                            <button type="submit" id="submitfullname" <?php if (!isset($_SESSION['edit_fullname'])); ?>>บันทึก</button>
                            <button type="button" id="canclefullname" onclick="cancleFullname()">ยกเลิก</button>
                        </div>
                    </form>
                    <form action="save_phone.php" class="save-phone" method="post">
                        <div class="input-group">
                            <label for="phone"><?= $tell?></label><label> : </label>
                            <?php
                            $query = "SELECT phone FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $phone = $row['phone'];
                            ?>
                            <input type="text" id="phone" name="phone" pattern="[0-9]+" value="<?php echo $phone; ?>" <?php if (isset($_SESSION['edit_phone']))
                                                                                                                            echo '';
                                                                                                                        else
                                                                                                                            echo 'disabled'; ?>>
                            <button type="button" id="editphone" onclick="enablePhone()">แก้ไข</button>
                            <button type="submit" id="submitphone" <?php if (!isset($_SESSION['edit_phone'])); ?>>บันทึก</button>
                            <button type="button" id="canclephone" onclick="canclePhone()">ยกเลิก</button>
                        </div>
                    </form>
                </div>
                <div class="right-box">
                    <form action="save_address.php" method="post">
                        <div class="input-group" id="addressuser">
                            <label for="address"><?= $home?></label><label> : </label>
                            <?php
                            $query = "SELECT address FROM user WHERE username='$username'";
                            $result = mysqli_query($db, $query);
                            $row = mysqli_fetch_assoc($result);
                            $address = $row['address'];
                            ?>
                            <textarea id="address" name="address" <?php if (isset($_SESSION['edit_address']))
                                                                        echo '';
                                                                    else
                                                                        echo 'disabled'; ?>><?php echo $address; ?></textarea>
                        </div>
                        <div class="button-address">
                            <button type="button" id="editaddress" onclick="enableAddress()">แก้ไข</button>
                            <button type="submit" id="submitaddress" <?php if (!isset($_SESSION['edit_address'])); ?>>บันทึก</button>
                            <button type="button" id="cancleaddress" onclick="cancleAddress()">ยกเลิก</button>
                        </div>
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
                        <th>เวลา</th>
                        <th>สถานะ</th>
                        <th>หมายเหตุ</th>
                    </tr>
                    <?php
                    $username = $_SESSION['username'];

                    // Query สำหรับดึงข้อมูลจากตาราง "product_order"
                    $query_product_order = "SELECT * FROM product_order WHERE username='$username' ORDER BY id DESC";
                    $result_product_order = mysqli_query($db, $query_product_order);

                    $i = 1;
                    while ($row_product_order = mysqli_fetch_assoc($result_product_order)) :
                    ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $row_product_order['type']; ?>
                            </td>
                            <td>
                                <?php echo $row_product_order['name']; ?>
                            </td>
                            <td>
                                <?php echo $row_product_order['quantity']; ?>
                            </td>
                            <td>
                                <?php echo $row_product_order['price']; ?>
                            </td>
                            <td>
                                <?php echo date('d/m/y H:i', strtotime($row_product_order['order_time'])); ?>
                            </td>

                            <td style="background-color:
                    <?php
                        if ($row_product_order['status'] == 'ปฏิเสธ') {
                            echo 'red';
                        } elseif ($row_product_order['status'] == 'สำเร็จ') {
                            echo 'green';
                        } else {
                            echo 'yellow';
                        }
                    ?>;
                ">
                                <?php echo $row_product_order['status']; ?>
                            </td>
                            <td>
                                <?php echo $row_product_order['note']; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                    <?php
                    // Query สำหรับดึงข้อมูลจากตาราง "course_order"
                    $query_course_order = "SELECT * FROM course_order WHERE username='$username' ORDER BY id DESC";
                    $result_course_order = mysqli_query($db, $query_course_order);

                    while ($row_course_order = mysqli_fetch_assoc($result_course_order)) :
                    ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $row_course_order['type']; ?>
                            </td>
                            <td>
                                <?php echo $row_course_order['name']; ?>
                            </td>
                            <td>
                                <?php echo $row_course_order['quantity']; ?>
                            </td>
                            <td>
                                <?php echo $row_course_order['price']; ?>
                            </td>
                            <td>
                                <?php echo date('d/m/y H:i', strtotime($row_course_order['order_time'])); ?>
                            </td>
                            <td style="background-color:
                    <?php
                        if ($row_course_order['status'] == 'ปฏิเสธ') {
                            echo 'red';
                        } elseif ($row_course_order['status'] == 'สำเร็จ') {
                            echo 'green';
                        } else {
                            echo 'yellow';
                        }
                    ?>;
                ">
                                <?php echo $row_course_order['status']; ?>
                            </td>
                            <td>
                                <?php echo $row_course_order['note']; ?>
                            </td>
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
        document.getElementById('editfullname').style.display = 'none';
        document.getElementById('submitfullname').style.display = 'block';
        document.getElementById('canclefullname').style.display = 'block';
        console.log("enableFullname");
        <?php $_SESSION['edit_fullname'] = true; ?>
    }

    function cancleFullname() {
        console.log("canclefullname");
        window.location.reload();
        <?php unset($_SESSION['edit_fullname']); ?>
    }

    function enablePhone() {
        document.getElementById('phone').removeAttribute('disabled');
        document.getElementById('editphone').style.display = 'none';
        document.getElementById('submitphone').style.display = 'block';
        document.getElementById('canclephone').style.display = 'block';
        <?php $_SESSION['edit_phone'] = true; ?>
    }

    function canclePhone() {
        console.log("canclephone");
        window.location.reload();
        <?php unset($_SESSION['edit_phone']); ?>
    }

    function enableAddress() {
        document.getElementById('address').removeAttribute('disabled');
        document.getElementById('editaddress').style.display = 'none';
        document.getElementById('submitaddress').style.display = 'inline';
        document.getElementById('cancleaddress').style.display = 'inline';
        <?php $_SESSION['edit_address'] = true; ?>
    }

    function cancleAddress() {
        console.log("cancleaddress");
        window.location.reload();
        <?php unset($_SESSION['edit_address']); ?>
    }
</script>

</html>