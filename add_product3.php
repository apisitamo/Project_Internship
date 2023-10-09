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
    $deleteQuery = "DELETE FROM add_product WHERE id = '$deleteId'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Successfully deleted'); window.location.href = 'add_product.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'add_product.php';</script>";
    }
}

$db = mysqli_connect($servername, $username, $password, $dbname);

?>

<?php
// คำนวณจำนวนสินค้าทั้งหมด
$totalproductQuery = "SELECT COUNT(*) AS total FROM add_product";
$totalproductResult = mysqli_query($db, $totalproductQuery);

if ($totalproductResult) {
    $totalproductRow = mysqli_fetch_assoc($totalproductResult);
    $totalproduct = $totalproductRow['total'];
} else {
    $totalproduct = 0;
}
// คำนวณจำนวนสินค้าที่มีสถานะเป็น 'BS'
$BSOrdersQuery = "SELECT COUNT(*) AS BMount FROM add_product WHERE type = 'Body Scrub'";
$BSOrdersResult = mysqli_query($db, $BSOrdersQuery);

if ($BSOrdersResult) {
    $BSOrdersRow = mysqli_fetch_assoc($BSOrdersResult);
    $BSOrdersCount = $BSOrdersRow['BMount'];
} else {
    $BSOrdersCount = 0;
}
// คำนวณจำนวนสินค้าที่มีสถานะเป็น 'BM'
$BMOrdersQuery = "SELECT COUNT(*) AS BMCount FROM add_product WHERE type = 'Body Mask'";
$BMOrdersResult = mysqli_query($db, $BMOrdersQuery);

if ($BMOrdersResult) {
    $BMOrdersRow = mysqli_fetch_assoc($BMOrdersResult);
    $BMOrdersCount = $BMOrdersRow['BMCount'];
} else {
    $BMOrdersCount = 0;
}
// คำนวณจำนวนสินค้าที่มีสถานะเป็น 'BMO'
$BMOOrdersQuery = "SELECT COUNT(*) AS BMOCount FROM add_product WHERE type = 'Body Massage Oil'";
$BMOOrdersResult = mysqli_query($db, $BMOOrdersQuery);

if ($BMOOrdersResult) {
    $BMOOrdersRow = mysqli_fetch_assoc($BMOOrdersResult);
    $BMOOrdersCount = $BMOOrdersRow['BMOCount'];
} else {
    $BMOOrdersCount = 0;
}
?>

<style>
    .form-control,
    .form-control-option {
        background: #fff;
    }

    .form-control-option {
        margin-left: 5px;
        width: 20%;
    }

    .addpro1 .containertop,
    .addpro2 .containerbuttom {
        padding: 30px;
        background-color: #FFF6E7;
        border-radius: 20px;
    }

    .addpro1 {
        padding: 0px 70px;
    }

    .addpro1 .containertop {
        text-align: center;
    }

    .addpro2 {
        padding: 20px 70px;
    }

    .addpro2 .row {
        column-gap: 26px;
    }

    .containerbuttom h2 {
        text-align: start;
    }

    .addpro2 .card {
        display: flex;
        /* border: 1px solid #e0e0e0;*/
        margin-bottom: 20px;
        width: 32% !important;
        align-items: center;
        text-align: center;
        padding: 10px;
        box-shadow: 0px 4px 4px rgb(111 51 27 / 25%);
        border-radius: 5px;
        background: #fffefb;
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
        margin-bottom: 30px;
        margin-top: 10px;
    }

    .addpro2 .product-body p:nth-child(5),
    .addpro2 .product-body p:nth-child(3) {
        overflow: hidden;
        height: 90px;
    }

    .addpro2 .fa-sharp {
        margin-right: 6px;
        color: #71BD1F;
    }

    .addpro2 .product-fotter {
        padding: 0.5rem 1rem;
        width: 100%;
    }

    .addpro2 .product-fotter .card-text {
        background-color: rgba(0, 0, 0, .03);
        padding: 15px;
    }

    .addpro2 .card .btn-danger {
        margin-right: -400px;
        margin-top: -5px;
    }

    .addpro2 .adc2 {
        display: flex;
        column-gap: 140px;
    }

    .addpro2 .filter-buttons {
        margin: 0px 0px 20px;
    }

    .addpro2 .filter-buttons a button {
        padding: 6px 20px;
        border-radius: 10px;
        border: none;
        margin-top: 5px;
    }

    .addpro2 .filter-buttons a button {
        background-color: #52adff;
    }

    .addpro2 .filter-buttons .menu-product button {
        background-color: #0d6efd;
    }

    .addpro2 .filter-buttons a button:hover {
        background-color: #0d6efd;
        transition: 0.4s;
    }

    .w-100 {
        width: 50% !important;
        align-items: center;
    }

    .addpro1 .containertop .mb-3:not(:nth-child(3)) {
        text-align: left;
    }

    .addpro1 .containertop .mb-3:nth-child(3) {
        margin-bottom: 0px !important;
        margin-top: 25px;
    }

    .addpro1 .containertop .btn-primary {
        padding: 6px 20px;
    }

    .popup {
        display: none;
        z-index: 1000;
        width: 800px;
        height: 400px;
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
        padding: 6px 10px;
        margin-top: 5px;
        border: none;
        background: red;
        border-radius: 20px;
        margin-bottom: 10px;
        font-size: 17px;
        margin-left: 10%;
    }

    .deleteitem:hover {
        transform: scale(1.3);
        transition: 0.5s ease;
    }

    .popup-add button {
        padding: 6px;
        border-radius: 10px;
        border: none;
    }

    .popup-add #popup2,
    .popup-add #popup1 {
        /* width: 30%;
        height: 20%;*/
        align-items: center;
        background-image: url(assets/images/banner-page.png);
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
        font-size: 20px;
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
        font-size: 20px;
    }

    .Fixicon {
        border: none;
        background: gray;
        border-radius: 200px;
        width: 37px;
        height: 38px;
        position: absolute;
        left: 40%;
        top: 2.35%;
    }

    .Fixicon img {
        width: 15px;
        height: 15px;
    }

    .Fixicon:hover {
        transform: scale(1.3);
        transition: 0.5s ease;
    }
</style>


<body>
    <div class="click-overlay" id="click-overlay1"></div>
    <section class="addpro1">
        <div class="containertop mt-5">
            <h2>
                <?= $add_product ?>
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
                    <option value="null"></option>
                    <option value="Body Scrub">Body Scrub</option>
                    <option value="Body Mask">Body Mask</option>
                    <option value="Body Massage Oil">Body Massage Oil</option>
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
                <label for="price" class="form-label">
                    <?= $price2 ?>
                </label>
                <input type="number" class="form-control" name="price" required>
            </div>
            <button type="submit" class="additem btn btn-primary">
                <?= $add ?>
            </button>

        </div>
    </section>

    <section class="addpro2">

        <div class="containerbuttom mt-5">
            <div class="adc2">
                <h2>
                    <?= $allproduct ?>
                </h2>
                <div class="filter-buttons">
                    <a href="add_product.php">
                        <button data-type="All">
                            <?= $all ?> (<span id="all-orders">
                                <?= $totalproduct ?>
                            </span>)
                        </button>
                    </a>
                    <a href="add_product2.php">
                        <button data-type="BS">
                            <?= $BS ?> (<span id="BS-orders">
                                <?= $BSOrdersCount ?>
                            </span>)
                        </button>
                    </a>
                    <a href="add_product3.php" class="menu-product">
                        <button data-type="BM">
                            <?= $BM ?> (<span id="BM-orders">
                                <?= $BMOrdersCount ?>
                            </span>)
                        </button>
                    </a>
                    <a href="add_product4.php">
                        <button data-type="BMO">
                            <?= $BMO ?> (<span id="BMO-orders">
                                <?= $BMOOrdersCount ?>
                            </span>)
                        </button>
                    </a>
                </div>
            </div>
            <div class="row">

                <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT * FROM add_product WHERE type = 'Body Mask' ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="card">
                            <button class="deleteitem" data-product-id="<?php echo $row['id']; ?>">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                            <button class="Fixicon" data-course-id="<?php echo $row['id']; ?>">
                                <img src="assets/images/fix.png" alt="">
                            </button>
                            <img src="<?php echo $row['img']; ?>" class="w-100" alt="Product Image">
                            <div class="product-body">
                                <p class="card-text">
                                    <?= $types ?> :
                                    <?php echo $row['type']; ?>
                                </p>
                                <h5 class="card-title">
                                    <?php echo $row['name_th']; ?>
                                </h5>
                                <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i>
                                    <?php echo $row['detail_th']; ?>
                                </p>
                                <h5 class="card-title">
                                    <?php echo $row['name_eng']; ?>
                                </h5>
                                <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i>
                                    <?php echo $row['detail_eng']; ?>
                                </p>
                            </div>
                            <div class="product-fotter">
                                <p class="card-text">
                                    <?= $prices ?> :
                                    <?php echo $row['price']; ?>
                                    <?= $baht ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "The product was not found in the database.";
                }
                $conn->close();
                ?>

            </div>
        </div>
    </section>

    <section class="popup-add">

        <!-- add product -->
        <div class="popup" id="popup1">
            <div class="popup-content">
                <span class="close-popup" id="close-popup1">&times;</span>
                <div class="container">
                    <p style="text-align: center;">
                        <?= $wantadd ?>
                    </p>
                    <button class="button-success-1" id="button-success1">
                        <?= $confirm ?>
                    </button>
                    <button class="button-close-1" id="button-close1">
                        <?= $cancle ?>
                    </button>
                </div>
            </div>
        </div>
        <!-- delete product -->
        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close-popup" id="close-popup2">&times;</span>
                <div class="container">
                    <p style="text-align: center;">
                        <?= $wantdel ?>
                    </p>
                    <button class="button-close-2" id="confirm-delete-button"
                        href='add_product.php?delete_id=<?php echo $row['id']; ?>'>
                        <?= $condel ?>
                    </button>
                    <button class="button-close-2" id="button-close2">
                        <?= $cancle ?>
                    </button>
                </div>
            </div>
        </div>
        <!-- fix product -->
        <div class="popup" id="popup3">
            <div class="popup-content">
                <span class="close-popup" id="close-popup3">&times;</span>
                <div class="container">




                    <button class="button-success-1" id="button-success3">
                        <?= $confirm ?>
                    </button>
                    <button class="button-close-1" id="button-close3">
                        <?= $cancle ?>
                    </button>
                </div>
            </div>
        </div>

    </section>

</body>

<script>
    const Additem = document.querySelectorAll('.additem');
    const Deleteitem = document.querySelectorAll('.deleteitem');
    const Fixicon = document.querySelectorAll('.Fixicon');
    const clickOverlay1 = document.querySelector('#click-overlay1');

    const popup1 = document.querySelector('#popup1');
    const closefirstpopup = document.querySelector('#close-popup1');
    const buttonclosefirst = document.querySelector('#button-close1');
    const buttonsuccessfirst = document.querySelectorAll('#button-success1');

    const popup2 = document.querySelector('#popup2');
    const closesecondpopup = document.querySelector('#close-popup2');
    const buttonclosesecond = document.querySelector('#button-close2');
    const confirmDeleteButton = document.querySelector('#confirm-delete-button');

    const popup3 = document.querySelector('#popup3');
    const closethirdpopup = document.querySelector('#close-popup3');
    const buttonclosethird = document.querySelector('#button-close3');
    const buttonsuccessthird = document.querySelectorAll('#button-success3');

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

    Fixicon.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Open additem popup");
            popup3.style.display = 'flex';
            clickOverlay1.style.display = 'block';
        });
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

    closethirdpopup.addEventListener('click', () => {
        console.log("X third popup ");
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    buttonclosethird.addEventListener('click', () => {
        console.log("close BTN third POPUP");
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
    buttonsuccessthird.forEach(button => {
        button.addEventListener('click', () => {
            console.log("success BTN to Open second popup");
            popup3.style.display = 'none';
            clickOverlay1.style.display = 'none';
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $(".button-success-1").click(function () {
            var imageInput = $("input[name='img']")[0];
            var imageFile = imageInput.files[0];
            var type = $("select[name='type']").val();
            var name_th = $("input[name='name_th']").val();
            var name_eng = $("input[name='name_eng']").val();
            var detail_th = $("textarea[name='detail_th']").val();
            var detail_eng = $("textarea[name='detail_eng']").val();
            var price = $("input[name='price']").val();

            if (imageFile && type !== "null" && name_th && name_eng && detail_th && detail_eng && price) {
                var formData = new FormData();
                formData.append("img", imageFile);
                formData.append("type", type);
                formData.append("name_th", name_th);
                formData.append("name_eng", name_eng);
                formData.append("detail_th", detail_th);
                formData.append("detail_eng", detail_eng);
                formData.append("price", price);

                $.ajax({
                    type: "POST",
                    url: "add_product_process.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        window.location.href = 'add_product.php';
                        alert("Successfully added products.");
                    },
                    error: function () {
                        alert("There was an error adding a product.");
                    }
                });
            } else {
                alert("Please add information before pressing the button.");
            }
        });
    });
</script>


</html>