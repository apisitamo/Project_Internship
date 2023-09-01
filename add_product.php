<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include 'include/langid.php';
// include('server.php');

if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "you must login first";
    header('location:login_admin.php');
    // session_destroy(); 
}

?>
<style>
    .containertop ,
    .containerbuttom{
        padding: 30px;

    }

    .product-card {
        
        display: flex;
        border: 1px solid #e0e0e0;
        margin-bottom: 20px;
    }

    .product-card img {
        max-width: 2000px;
        object-fit: cover;
    }

    .product-info {
        padding: 15px;
    }

    .content {
        width: 200px;
        height: 200px;
    }
</style>


<body>
    <section>
        <div class="containertop mt-5">
            <h2>เพิ่มสินค้า</h2>
            <form action="add_product_process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="img" class="form-label">รูปภาพ</label>
                    <input type="file" class="form-control" name="img" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อสินค้า</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">รายละเอียดไทย</label>
                    <textarea class="form-control" name="detail_th" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">รายละเอียดอังกฤษ</label>
                    <textarea class="form-control" name="detail_eng" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">จำนวน</label>
                    <input type="number" class="form-control" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">ราคา</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
            </form>
        </div>
    </section>
    <section>
        <div class="containerbuttom mt-5">
            <h2>สินค้าทั้งหมด</h2>
            <div class="row">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bsa";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if (isset($_GET['delete_id'])) {
                    $deleteId = $_GET['delete_id'];
                    $deleteQuery = "DELETE FROM add_product WHERE id = '$deleteId'";
                    if ($conn->query($deleteQuery) === TRUE) {
                        echo "<script>alert('ลบสินค้าเรียบร้อยแล้ว'); window.location.href = 'add_product.php';</script>";
                    } else {
                        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_product.php';</script>";
                    }
                }

                $sql = "SELECT * FROM add_product";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="content">';
                        echo '<div class="product-card">';
                        echo '<img src="' . $row['img'] . '" class="card-img-top" alt="Product Image">';
                        echo '<div class="product-info">';
                        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                        echo '<p class="card-text">' . $row['detail_th'] . '</p>';
                        echo '<p class="card-text">' . $row['detail_eng'] . '</p>';
                        echo '<p class="card-text">จำนวน: ' . $row['quantity'] . '</p>';
                        echo '<p class="card-text">ราคา: ' . $row['price'] . '</p>';
                        echo '</div>';
                        echo '<a href="add_product.php?delete_id=' . $row['id'] . '" class="btn btn-danger">&times;</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "ไม่พบสินค้าในระบบ";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>
</body>

</html>