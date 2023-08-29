<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include 'include/langid.php';
include('server.php');

if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "you must login first";
    header('location:adminlogin.php');
    // session_destroy(); 
}
?>
<style>
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
            <h2 style="text-align: center;"><?= $product_order ?></h2>
        </div>
        <div class="container">
            <div class="table_order">
                <table>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ผู้ใช้งาน</th>
                        <th>ชนิด</th>
                        <th>รายการ</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>สถานะ</th>
                    </tr>
                    <?php
                    $db = mysqli_connect($servername, $username, $password, $dbname);

                    $query = "SELECT * FROM product_order ORDER BY id DESC";
                    $result = mysqli_query($db, $query);

                    $i = 1; // กำหนดค่าเริ่มต้นของ i
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['username']; ?></td>
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

</body>

</html>