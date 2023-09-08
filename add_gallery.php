<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include('server.php');

$sql = "SELECT * FROM add_gallery ORDER BY id DESC";
$result = $conn->query($sql);

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM add_gallery WHERE id = '$deleteId'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('ลบสินค้าเรียบร้อยแล้ว'); window.location.href = 'add_gallery.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_gallery.php';</script>";
    }
}
?>

<?php
if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "you must login first";
    header('location:login_admin.php');
    // session_destroy(); 
}
?>

<style>
    .add-gallery .containertop,
    .add-gallery .containerbuttom {
        padding: 30px;

    }

    .add-gallery .add-img {
        text-align: center;
        padding: 0px 180px;
    }

    .add-gallery .show-gallery .card {
        display: flex;
        border: 1px solid #e0e0e0;
        margin-bottom: 20px;
        width: 100% !important;
        align-items: center;
        text-align: center;
        margin: 10px;
        margin-bottom: 15px
    }

    .add-gallery .show-gallery .card .btn-danger {
        margin-right: -312px;
    }

    .add-gallery .show-gallery .card img {
        padding: 10px;
    }
</style>


<body>
    <section class="add-gallery">
        <div class="click-overlay" id="click-overlay1"></div>
        <section class="add-img">
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

        <section class="show-gallery">
            <div class="containerbuttom mt-5">
                <h2>รูปภาพทั้งหมด</h2>
                <div class="row">

                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-3">
                                <div class="card">
                                    <a href="add_gallery.php?delete_id=<?php echo $row['id']; ?>"
                                        class="btn btn-danger">&times;</a>
                                    <img src="<?php echo $row['img']; ?>" class="w-100" alt="Product Image">
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
    </section>
</body>

</html>