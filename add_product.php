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
    .containertop,
    .containerbuttom {
        padding: 30px;

    }

    .card {
        display: flex;
        border: 1px solid #e0e0e0;
        margin-bottom: 20px;
        width: 30% !important;
        align-items: center;
        text-align: center;
        margin: 10px;
    }

    .w-100 {
        width: 30% !important;
        align-items: center;
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
                    <label for="name" class="form-label">ชื่อสินค้าไทย</label>
                    <input type="text" class="form-control" name="name_th" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อสินค้าอังกฤษ</label>
                    <input type="text" class="form-control" name="name_eng" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">ประเภท</label>
                    <select class="form-control-option" name="type">
                        <option value="Body Scrub">Body Scrub</option>
                        <option value="Body Mask">Body Mask</option>
                        <option value="Body Massage Oil">Body Massage Oil</option>
                    </select>
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

                $sql = "SELECT * FROM add_product ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="card">
                            <a href="add_product.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">&times;</a>
                            <img src="<?php echo $row['img']; ?>" class="w-100" alt="Product Image">
                            <div class="product-body">
                                <h5 class="card-title"><?php echo $row['name_th']; ?></h5>
                                <h5 class="card-title"><?php echo $row['name_eng']; ?></h5>
                                <p class="card-text">ประเภท: <?php echo $row['type']; ?></p>
                                <p class="card-text"><?php echo $row['detail_th']; ?></p>
                                <p class="card-text"><?php echo $row['detail_eng']; ?></p>
                                <div class="product-fotter">
                                    <p class="card-text">ราคา: <?php echo $row['price']; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
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