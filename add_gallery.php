<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include 'include/langid.php';
include('server.php');



if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM add_gallery WHERE id = '$deleteId'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('ลบรูปภาพเรียบร้อยแล้ว'); window.location.href = 'add_gallery.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_gallery.php';</script>";
    }
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

    .add-gallery .add-img .form-label {
        float: left;
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

    .deleteitem {
        padding: 3px 10px;
        margin-top: 5px;
        border: none;
        background: red;
        margin-right: -85%;
        border-radius: 10px;
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
        top: -10px;
        right: 15px;
        cursor: pointer;
        font-size: 50px;
    }

    .popup-add button {
        padding: 6px;
        border-radius: 10px;
        border: none;
    }

    .popup-add #popup2 {
        width: 30%;
        height: 20%;
    }

    .popup-add #popup2 #confirm-delete-button {
        margin-right: 5px;
        background: #00e500;
    }

    .popup-add #popup2 #button-close2 {
        margin-left: 5px;
        background: red;
        padding: 6px 25px;
    }

    .popup-add #popup2 .popup-content .container {
        margin-top: 20px;
    }

    .popup-add #popup1 {
        width: 30%;
        height: 20%;
    }

    .popup-add #popup1 #button-success1 {
        margin-right: 5px;
        background: #00e500 !important;
        padding: 6px 25px;
    }

    .popup-add #popup1 #button-close1 {
        margin-left: 5px;
        background: red !important;
        padding: 6px 25px;
    }

    .popup-add #popup1 .popup-content .container {
        margin-top: 20px;
    }
</style>


<body>
    <section class="add-gallery">
        <div class="click-overlay" id="click-overlay1"></div>
        <section class="add-img">
            <div class="containertop mt-5">
                <h2><?= $add_gallery ?></h2>
                <div class="mb-3">
                    <label for="img" class="form-label"><?= $picture ?></label>
                    <input type="file" class="form-control" name="img" required>
                </div>
                <button type="submit" class="additem btn btn-primary"><?= $add ?></button>
            </div>
        </section>

        <section class="show-gallery">
            <div class="containerbuttom mt-5">
                <h2><?= $allgallery ?></h2>
                <div class="row">

                    <?php
                    $sql = "SELECT * FROM add_gallery ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-lg-3">
                                <div class="card">
                                    <button class="deleteitem" data-gallery-id="<?php echo $row['id']; ?>">&times;</button>
                                    <img src="<?php echo $row['img']; ?>" class="w-100" alt="gallery Image">
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

    <section class="popup-add">

        <div class="popup" id="popup1">
            <div class="popup-content">
                <span class="close-popup" id="close-popup1">&times;</span>
                <div class="container">
                    <p style="text-align: center;"><?= $wantadd ?></p>
                    <button class="button-success-1" id="button-success1"><?= $confirm ?></button>
                    <button class="button-close-1" id="button-close1"><?= $cancle ?></button>
                </div>
            </div>
        </div>

        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close-popup" id="close-popup2">&times;</span>
                <div class="container">
                    <p style="text-align: center;"><?= $wantdel ?></p>
                    <button class="button-close-2" id="confirm-delete-button" href='add_gallery.php?delete_id=<?php echo $row['id']; ?>'><?= $condel ?></button>
                    <button class="button-close-2" id="button-close2"><?= $cancle ?></button>
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
            const deleteId = button.getAttribute('data-gallery-id');
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
            const deleteLink = `add_gallery.php?delete_id=${deleteId}`;
            window.location.href = deleteLink;
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".button-success-1").click(function() {
            var imageInput = $("input[name='img']")[0];
            var imageFile = imageInput.files[0];

            if (imageFile) {
                var formData = new FormData();
                formData.append("img", imageFile);

                $.ajax({
                    type: "POST",
                    url: "add_gallery_process.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        location.reload();
                        alert("รูปภาพถูกอัปโหลดสำเร็จ");
                    },
                    error: function() {
                        alert("เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ");
                    }
                });
            } else {
                alert("กรุณาเลือกรูปภาพก่อนกดปุ่ม Submit");
            }
        });
    });
</script>


</html>