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
    echo "<script>alert('Data saved successfully.');</script>";
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

<?php

$db = mysqli_connect($servername, $username, $password, $dbname);

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 10;

$offset = ($page - 1) * $limit;

// คำนวณจำนวนสินค้าทั้งหมด
$totalProductsQuery = "SELECT COUNT(*) AS total FROM product_order";
$totalProductsResult = mysqli_query($db, $totalProductsQuery);

if ($totalProductsResult) {
    $totalProductsRow = mysqli_fetch_assoc($totalProductsResult);
    $totalProducts = $totalProductsRow['total'];
} else {
    $totalProducts = 0;
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
        padding-right: 145px;
    }

    .user1 .homecontent:nth-child(1) input {
        padding-right: 50px;
        /* margin-right: 25px;*/
        margin-left: 0px;
        background: #e0e0e0;
        padding-left: 5px;
    }

    .user1 .homecontent:nth-child(2) input {
        padding-right: 50px;
        /* margin-right: 17px;*/
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
        padding-bottom: 15px;
    }

    .user1 .left-box {
        background-color: #f2f2f2;
        text-align: end;
        padding-right: 30px;
        border-radius: 15px 0px 0px 15px;
        padding-top: 29px;
    }

    .user1 .left-box .input-group {
        display: block;
    }

    .user1 .left-box form {
        padding-right: 87px;
    }

    .user1 .right-box {
        background-color: #f2f2f2;
        padding-left: 30px;
        border-radius: 0px 15px 15px 0px;
        text-align: left;
    }

    .user1 .right-box form {
        padding-right: 50px;
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
        width: 100%;
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
        margin-bottom: 10px;
    }

    /* .user1 .button-address {
        padding-left: 40px;
    }*/
</style>

<style>
    .pagination {
        display: block;
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .pagination a {
        margin-left: 5px;
        margin-right: 5px;
        background: #e5e5e5;
        padding: 9px 19px;
        border-radius: 40px;
        font-size: 19px;
    }

    .pagination a:hover {
        background-color: #094195;
        color: white !important;
        transition: 0.4s;
    }

    .pagination .pagination-link.active {
        background-color: #094195;
        color: white !important;
    }
</style>

<body>
    <section class="user1">
        <div class="homeheader">
        </div>
        <div class="container" id="user-con">
            <div class="bottom-box">
                <table>
                    <tr>
                        <th>
                            <?= $order ?>
                        </th>
                        <th>
                            <?= $types2 ?>
                        </th>
                        <th>
                            <?= $types ?>
                        </th>
                        <th>
                            <?= $lists ?>
                        </th>
                        <th>
                            <?= $quantityy ?>
                        </th>
                        <th>
                            <?= $prices ?>
                        </th>
                        <th>
                            <?= $timess ?>
                        </th>
                        <th>
                            <?= $statuss ?>
                        </th>
                        <th>
                            <?= $notess ?>
                        </th>
                    </tr>
                    <?php
                    $username = $_SESSION['username'];

                    // Query สำหรับดึงข้อมูลจากตาราง "product_order" และ "course_order" และรวมผลลัพธ์
                    $query = "SELECT 'Product' AS typee,type, id, name, quantity, price, order_time, status, note
                    FROM product_order WHERE username='$username'
                    UNION ALL
                    SELECT 'Course' AS typee,type, id, name, quantity, price, order_time, status, note
                    FROM course_order WHERE username='$username'
                    ORDER BY order_time DESC
                    LIMIT $limit OFFSET $offset";

                    $result = mysqli_query($db, $query);

                    $i = 1 + $offset;
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $row['typee']; ?>
                            </td>
                            <td>
                                <?php echo $row['type']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['quantity']; ?>
                            </td>
                            <td>
                                <?php echo $row['price']; ?>
                            </td>
                            <td>
                                <?php echo date('d/m/y H:i', strtotime($row['order_time'])); ?>
                            </td>
                            <td style="background-color:
                        <?php
                        if ($row['status'] == 'rejected') {
                            echo 'red';
                        } elseif ($row['status'] == 'completed') {
                            echo 'green';
                        } else {
                            echo 'yellow';
                        }
                        ?>;
                        ">
                                <?php echo $row['status']; ?>
                            </td>
                            <td>
                                <?php echo $row['note']; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
        <div class="pagination">
            <?php
            $totalPages = ceil($totalProducts / $limit); // คำนวณจำนวนหน้าทั้งหมด
            $prevPage = ($page > 1) ? $page - 1 : 1;
            $nextPage = ($page < $totalPages) ? $page + 1 : $totalPages;

            // echo "<a href='history.php?page=1' class='pagination-link'>First</a>"; // ลิงก์ไปหน้าแรก

            if ($page > 1) {
                echo "<a href='history.php?page=$prevPage' class='pagination-link'><</a>"; // ลิงก์หน้าก่อนหน้า
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $page) ? 'active' : '';
                echo "<a href='history.php?page=$i' class='pagination-link $activeClass'>$i</a>";
            }

            if ($page < $totalPages) {
                echo "<a href='history.php?page=$nextPage' class='pagination-link'>></a>"; // ลิงก์หน้าถัดไป
            }

            // echo "<a href='history.php?page=$totalPages' class='pagination-link'>Last</a>"; // ลิงก์ไปหน้าสุดท้าย
            ?>
        </div>
    </section>

    <?php include 'include/footer.php'; ?>

</body>

<script>
    AOS.init();
</script>


</html>