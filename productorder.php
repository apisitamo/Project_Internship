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
    // header('location:adminlogin.php');
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
                </table>
            </div>
        </div>
    </section>

</body>
</html>