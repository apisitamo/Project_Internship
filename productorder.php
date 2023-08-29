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

$db = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM product_order ORDER BY id DESC";
$result = mysqli_query($db, $query);
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
            <div class="filter-buttons">
                <button data-status="All">ทั้งหมด</button>
                <button data-status="รอตรวจสอบ">รอตรวจสอบ</button>
                <button data-status="สำเร็จ">สำเร็จ</button>
                <button data-status="ปฏิเสธ">ปฏิเสธ</button>
            </div>
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
                    $i = 1; // กำหนดค่าเริ่มต้นของ i
                    while ($row = mysqli_fetch_assoc($result)) :
                    ?>
                        <tr data-status="<?php echo $row['status']; ?>">
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

<script>
    const filterButtons = document.querySelectorAll('.filter-buttons button');
    const tableRows = document.querySelectorAll('.table_order table tr');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const status = this.getAttribute('data-status');

            tableRows.forEach(row => {
                const rowStatus = row.getAttribute('data-status');

                if (status === 'All' || rowStatus === status) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

</html>