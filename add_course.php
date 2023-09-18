<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/headadmin.php';
include('server.php');

if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM add_course WHERE id = '$deleteId'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('ลบหลักสูตรเรียบร้อยแล้ว'); window.location.href = 'add_course.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "'); window.location.href = 'add_course.php';</script>";
    }
}

?>

<style>
    .addcourse1 .containertop,
    .addcourse2 .containerbuttom {
        padding: 30px;

    }

    .addcourse1 {
        padding: 0px 180px;
    }

    .addcourse1 .containertop {
        text-align: center;
    }

    .addcourse1 .containertop .mb-3:not(:nth-child(3)) {
        text-align: left;
    }

    .addcourse1 .containertop .mb-3:nth-child(3) {
        margin-bottom: 0px !important;
    }

    .addcourse2 .row {
        column-gap: 30px;
    }

    .addcourse2 .card {
        display: flex;
        border: 1px solid #e0e0e0;
        margin-bottom: 20px;
        width: 30% !important;
        align-items: center;
        text-align: center;
        padding: 10px;
    }

    .addcourse2 .course-body {
        width: 100%;
    }

    .addcourse2 .course-body .card-title {
        margin-bottom: 15px;
        color: #99762C;
        font-size: 18px;
        font-weight: bold;
    }

    .addcourse2 .course-body .card-title:nth-child(1) {
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .addcourse2 .course-body .card-text {
        margin-bottom: 30px;
        margin-top: 10px;
    }

    .addcourse2 .fa-sharp {
        margin-right: 6px;
        color: #71BD1F;
    }

    .addcourse2 .course-fotter {
        padding: 0.5rem 1rem;
    }

    .addcourse2 .course-fotter .card-text {
        background-color: rgba(0, 0, 0, .03);
        padding: 15px;
    }

    .addcourse2 .btn-danger {
        margin-right: -400px;
        margin-top: -5px;
    }

    .w-100 {
        width: 50% !important;
        align-items: center;
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

    .deleteitem {
        padding: 3px 10px;
        margin-top: 5px;
        border: none;
        background: red;
        margin-right: -85%;
        border-radius: 10px;
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
        background: #00e500;
        padding: 6px 25px;
    }

    .popup-add #popup1 #button-close1 {
        margin-left: 5px;
        background: red;
        padding: 6px 25px;
    }

    .popup-add #popup1 .popup-content .container {
        margin-top: 20px;
    }
</style>

<body>
    <div class="click-overlay" id="click-overlay1"></div>
    <section class="addcourse1">
        <div class="containertop mt-5">
            <h2>
                <?= $add_course ?>
            </h2>
            <div class="mb-3">
                <label for="img" class="form-label">
                    <?= $picture ?>
                </label>
                <input type="file" class="form-control" name="img" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">
                    <?= $types ?>
                </label>
                <select class="form-control-option" name="type">
                    <option value="Health Spa Course">Health Spa Course</option>
                    <option value="Beauty Spa Course">Beauty Spa Course</option>
                    <option value="Advanced Spa">Advanced Spa</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">
                    <?= $THname ?>
                </label>
                <input type="text" class="form-control" name="name_th" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">
                    <?= $ENGname ?>
                </label>
                <input type="text" class="form-control" name="name_eng" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">
                    <?= $THdetail ?>
                </label>
                <textarea class="form-control" name="detail_th" required></textarea>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">
                    <?= $ENGdetail ?>
                </label>
                <textarea class="form-control" name="detail_eng" required></textarea>
            </div>
            <div class="mb-3">
                <label for="day" class="form-label">
                    <?= $training ?>
                </label>
                <input type="number" class="form-control" name="day" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">
                    <?= $prices ?>
                </label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
                <label for="hour" class="form-label">
                    <?= $hours ?>
                </label>
                <input type="number" class="form-control" name="hour" required>
            </div>
            <button type="submit" class="additem btn btn-primary">
                <?= $add ?>
            </button>
        </div>
    </section>

    <section class="addcourse2">
        <div class="containerbuttom mt-5">
            <h2>
                <?= $allcourse ?>
            </h2>
            <div class="row">
                <?php
                $sql = "SELECT * FROM add_course ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="card">
                            <button class="deleteitem" data-course-id="<?php echo $row['id']; ?>">&times;</button>
                            <img src="<?php echo $row['img']; ?>" class="w-100" alt="course image">
                            <div class="course-body">
                                <p class="card-text">
                                    <?= $types ?> :
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
                                <div class="course-fotter">
                                    <p class="card-text">
                                        <?= $training ?> :
                                        <?php echo $row['day']; ?>
                                    </p>
                                </div>
                                <div class="course-fotter">
                                    <p class="card-text">
                                        <?= $prices ?> :
                                        <?php echo $row['price']; ?>
                                    </p>
                                </div>
                                <div class="course-fotter">
                                    <p class="card-text">
                                        <?= $hours ?> :
                                        <?php echo $row['hour']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "ไม่พบหลักสูตรในระบบ";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <section class="popup-add">

        <div class="popup" id="popup1">
            <div class="popup-content">
                <span class="close-popup" id="close-popup1">&times;</span>
                <div class="container">
                    <p style="text-align: center;"><?= $wantadd ?></p>
                    <button class="button-success-1" id="button-success1"><?= $conf ?></button>
                    <button class="button-close-1" id="button-close1"><?= $canc ?></button>
                </div>
            </div>
        </div>

        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close-popup" id="close-popup2">&times;</span>
                <div class="container">
                    <p style="text-align: center;"><?= $wantdel ?></p>
                    <button class="button-close-2" id="confirm-delete-button" href='add_course.php?delete_id=<?php echo $row['id']; ?>'><?= $condel ?></button>
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
            const deleteId = button.getAttribute('data-course-id');
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
            const deleteLink = `add_course.php?delete_id=${deleteId}`;
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
            var type = $("select[name='type']").val();
            var name_th = $("input[name='name_th']").val();
            var name_eng = $("input[name='name_eng']").val();
            var detail_th = $("textarea[name='detail_th']").val();
            var detail_eng = $("textarea[name='detail_eng']").val();
            var day = $("input[name='day']").val();
            var price = $("input[name='price']").val();
            var hour = $("input[name='hour']").val();

            if (imageFile && type && name_th && name_eng && detail_th && detail_eng && day && price && hour) {
                var formData = new FormData();
                formData.append("img", imageFile);
                formData.append("type", type);
                formData.append("name_th", name_th);
                formData.append("name_eng", name_eng);
                formData.append("detail_th", detail_th);
                formData.append("detail_eng", detail_eng);
                formData.append("day", day);
                formData.append("price", price);
                formData.append("hour", hour);

                $.ajax({
                    type: "POST",
                    url: "add_course_process.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        location.reload();
                        alert("เพิ่มหลักสูตรสำเร็จ");
                    },
                    error: function() {
                        alert("เกิดข้อผิดพลาดในการเพิ่มหลักสูตร");
                    }
                });
            } else {
                alert("กรุณากรอกข้อมูลให้ครบทุกช่องก่อนเพิ่มหลักสูตร");
            }
        });
    });
</script>

</html>