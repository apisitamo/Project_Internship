<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include('server.php');

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM add_product WHERE id = '$deleteId'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('ลบสินค้าเรียบร้อยแล้ว'); window.location.href = 'add_product.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_product.php';</script>";
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
    .addpro1 .containertop,
    .addpro2 .containerbuttom {
        padding: 30px;

    }

    .addpro1 {
        padding: 0px 180px;
    }

    .addpro1 .containertop h2 {
        text-align: center;
    }

    .addpro2 .row {
        column-gap: 30px;
    }

    .addpro2 .card {
        display: flex;
        border: 1px solid #e0e0e0;
        margin-bottom: 20px;
        width: 30% !important;
        align-items: center;
        text-align: center;
        padding: 10px;
    }

    .addpro2 .product-body {
        width: 100%;
    }

    .addpro2 .product-body .card-title {
        margin-bottom: 15px;
        color: #99762C;
        font-size: 18px;
        font-weight: bold;
    }

    .addpro2 .product-body .card-title:nth-child(1) {
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .addpro2 .product-body .card-text {
        margin-bottom: 35px;
    }

    .addpro2 .fa-sharp {
        margin-right: 6px;
        color: #71BD1F;
    }

    .addpro2 .product-fotter {
        padding: 0.5rem 1rem;
    }

    .addpro2 .product-fotter .card-text {
        background-color: rgba(0, 0, 0, .03);
        padding: 15px;
    }

    .addpro2 .card .btn-danger {
        margin-right: -400px;
        margin-top: -5px;
    }

    .w-100 {
        width: 50% !important;
        align-items: center;
    }

    .addpro1 .containertop .mb-3:nth-child(2) {
        text-align: center;
        margin-bottom: 0px !important;
    }

    .popup {
        display: none;
        z-index: 1000;
        width: 900px;
        height: 600px;
        padding: 20px;
        border-radius: 5px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        justify-content: center;
        background: #FFFAF5;
        border-radius: 10px;
    }


    .click-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 900;
    }

    .close-popup {
        position: absolute;
        top: 5px;
        right: 15px;
        cursor: pointer;
        font-size: 50px;
    }
</style>


<body>
    <div class="click-overlay" id="click-overlay1"></div>
    <section class="addpro1">
        <div class="containertop mt-5">
            <h2>เพิ่มสินค้า</h2>
            <form action="add_product_process.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="img" class="form-label">รูปภาพ</label>
                    <input type="file" class="form-control" name="img" required>
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
                    <label for="name" class="form-label">ชื่อสินค้าไทย</label>
                    <input type="text" class="form-control" name="name_th" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">ชื่อสินค้าอังกฤษ</label>
                    <input type="text" class="form-control" name="name_eng" required>
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
                    <label for="price" class="form-label">ราคา/กิโลกรัม</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <button type="submit" class="additem btn btn-primary">เพิ่มสินค้า</button>
            </form>
        </div>
    </section>

    <section class="addpro2">

        <div class="containerbuttom mt-5">
            <h2>สินค้าทั้งหมด</h2>
            <div class="row">

                <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT * FROM add_product ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="card">
                            <button class="deleteitem" data-product-id="<?php echo $row['id']; ?>">&times;</button>
                            <img src="<?php echo $row['img']; ?>" class="w-100" alt="Product Image">
                            <div class="product-body">
                                <p class="card-text">ประเภท:
                                    <?php echo $row['type']; ?>
                                </p>
                                <h5 class="card-title">
                                    <?php echo $row['name_th']; ?>
                                </h5>
                                <h5 class="card-title">
                                    <?php echo $row['name_eng']; ?>
                                </h5>
                                <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i>
                                    <?php echo $row['detail_th']; ?>
                                </p>
                                <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i>
                                    <?php echo $row['detail_eng']; ?>
                                </p>
                                <div class="product-fotter">
                                    <p class="card-text">ราคา
                                        <?php echo $row['price']; ?>
                                    </p>
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

    <section>

        <div class="popup" id="popup1">
            <div class="popup-content">
                <span class="close-popup" id="close-popup1">&times;</span>
                <div class="container">
                    <p style="text-align: center;">คุณต้องการที่จะเพิ่มสินค้า</p>
                    <button class="button-success-1" id="button-success1">ยืนยัน</button>
                    <button class="button-close-1" id="button-close1">ยกเลิก</button>
                </div>
            </div>
        </div>

        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close-popup" id="close-popup2">&times;</span>
                <div class="container">
                    <p style="text-align: center;">คุณต้องการที่จะลบสินค้า</p>
                    <button class="button-close-2" id="confirm-delete-button" href='add_product.php?delete_id=<?php echo $row['id']; ?>'>ยืนยันการลบ</button>
                    <button class="button-close-2" id="button-close2">ยกเลิก</button>
                </div>
            </div>
        </div>

    </section>

</body>

<script>
    const Additem = document.querySelectorAll('.additem');
    const Deleteitem = document.querySelectorAll('.deleteitem');
    const clickOverlay1 = document.querySelector('#click-overlay1');

    const popup1 = document.querySelector('#popup1');
    const closefirstpopup = document.querySelector('#close-popup1');
    const buttonclosefirst = document.querySelector('#button-close1');
    const buttonsuccessfirst = document.querySelectorAll('#button-success1');

    const popup2 = document.querySelector('#popup2');
    const closesecondpopup = document.querySelector('#close-popup2');
    const buttonclosesecond = document.querySelector('#button-close2');
    const confirmDeleteButton = document.querySelector('#confirm-delete-button');

    Additem.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Open additem popup");
            popup1.style.display = 'flex';
            clickOverlay1.style.display = 'block';
        });
    });

    Deleteitem.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Open deleteitem popup");
            popup2.style.display = 'flex';
            clickOverlay1.style.display = 'block';
            const deleteId = button.getAttribute('data-product-id');
            confirmDeleteButton.setAttribute('data-delete-id', deleteId);
        });
    });

    clickOverlay1.addEventListener('click', () => {
        console.log("Clicked on overlay");
        popup1.style.display = 'none'; // ปิด popup1 ที่มี id="popup1"
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });

    closefirstpopup.addEventListener('click', () => {
        console.log("X first popup ");
        popup1.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    buttonclosefirst.addEventListener('click', () => {
        console.log("close BTN first POPUP");
        popup1.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    buttonsuccessfirst.forEach(button => {
        button.addEventListener('click', () => {
            console.log("success BTN to Open second popup");
            popup1.style.display = 'none';
            clickOverlay1.style.display = 'none';
        });
    });

    closesecondpopup.addEventListener('click', () => {
        console.log("X second popup ");
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    buttonclosesecond.addEventListener('click', () => {
        console.log("close BTN second POPUP");
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    confirmDeleteButton.addEventListener('click', () => {
        const deleteId = confirmDeleteButton.getAttribute('data-delete-id');
        if (deleteId) {
            const deleteLink = `add_product.php?delete_id=${deleteId}`;
            window.location.href = deleteLink;
        }
    });
</script>


</html>