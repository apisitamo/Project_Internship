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
</style>


<body>
    <div class="click-overlay" id="click-overlay1"></div>
    <section>
        <div class="containertop mt-5">
            <h2>เพิ่มรูปภาพ</h2>
            <form action="add_gallery_process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="img" class="form-label">รูปภาพ</label>
                    <input type="file" class="form-control" name="img" required>
                </div>
                <button type="submit" class="open-popup btn btn-primary">เพิ่มรูปภาพ</button>
            </form>
        </div>
    </section>

    <section>
        <div class="containerbuttom mt-5">
            <h2>รูปภาพทั้งหมด</h2>
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
                    $deleteQuery = "DELETE FROM add_gallery WHERE id = '$deleteId'";
                    if ($conn->query($deleteQuery) === TRUE) {
                        echo "<script>alert('ลบสินค้าเรียบร้อยแล้ว'); window.location.href = 'add_gallery.php';</script>";
                    } else {
                        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_gallery.php';</script>";
                    }
                }

                $sql = "SELECT * FROM add_gallery ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="card">
                            <a href="add_gallery.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">&times;</a>
                            <img src="<?php echo $row['img']; ?>" class="w-100" alt="Product Image">
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