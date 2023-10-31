<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <?php
    include 'include/headadmin.php';
    include 'include/langid.php';
    include('server.php');

    if ($langId == 1) {
    } else {
    }
    ?>

    <?php
    if (isset($_GET['fix_id'])) {
        $fix_id = $_GET['fix_id'];
        $sql = "SELECT * FROM `add_product` WHERE id = $fix_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name_th = $row['name_th'];
                $name_eng = $row['name_eng'];
                $img = $row['img'];
                $type = $row['type'];
                $detail_th = $row['detail_th'];
                $detail_eng = $row['detail_eng'];
                $price = $row['price'];
            }
        } else {
            echo "Product not found in database";
        }

        $conn->close();
    } else {
        echo "The specified product code was not found";
    }
    ?>

</head>

<style>
    .form-control,
    .form-control-option {
        background: #F7F7F7;
    }

    .mt-5 {
        margin-top: 1rem !important;
    }

    .form-control-option {
        margin-left: 5px;
        width: 20%;
    }

    .addcourse1 .containertop {
        padding: 30px;
        background-color: #CDE2F1;
        border-radius: 20px;
    }

    .addcourse1 {
        padding: 0px 70px;
    }

    .addcourse1 .containertop {
        text-align: center;
        margin-bottom: 45px;
    }


    .addcourse1 .containertop .mb-3:not(:nth-child(3)) {
        text-align: left;
    }

    .addcourse1 .containertop .mb-3:nth-child(3) {
        margin-bottom: 0px !important;
        margin-top: 25px;
    }

    .addcourse1 .containertop .btn-primary {
        padding: 6px 20px;
    }

    .containerbuttom h2 {
        text-align: start;
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
        top: 1px;
        right: 17px;
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
        margin-top: 20px;
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

    .Fixicon {
        border: none;
        background: gray;
        border-radius: 200px;
        width: 37px;
        height: 38px;
        position: absolute;
        left: 40%;
        top: 1.35%;
    }

    .Fixicon img {
        width: 16px;
        height: 16px;
        margin-top: 9px;
    }

    .Fixicon:hover {
        transform: scale(1.3);
        transition: 0.5s ease;
    }

    .bu-back {
        margin-left: 1%;
        margin-top: 1%;
    }

    .bu-back button {
        padding: 7px 10px;
        border: none;
        background: #d17742;
        border-radius: 10px;
        border-bottom-style: revert;
    }

    .bu-back button:hover {
        background: #945834;
        color: white;
        transition: 0.4s;
        border-bottom-style: revert;
    }
</style>

<style>
    .sizeimg {
        width: 380px;
        height: 270px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: auto;
        border: 1.2px solid #D0D0D0;
    }

    .sizeimg img {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .addcourse1 #removeImageButton {
        position: absolute;
        top: 0%;
        left: 64.4%;
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }
</style>

<body>
    <div class="bu-back">
        <button id="backButton">
            <i class="bi bi-caret-left-fill"></i>
            <?= $back ?>
        </button>
    </div>
    <div class="click-overlay" id="click-overlay1"></div>
    <section class="addcourse1">
        <div class="containertop mt-5">
            <h2>
                <?= $fixproduct ?>
            </h2>
            <div class="mb-3" style="position: relative;">
                <div class="sizeimg">
                    <img id="previewImage" src="<?php echo $img; ?>" alt="product Image">
                </div>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">
                    <?= $types ?>
                </label>
                <select class="form-control-option" name="type">
                    <option value="null"></option>
                    <option value="Body Scrub" <?php if ($type == "Body Scrub")
                        echo "selected"; ?>>Body Scrub</option>
                    <option value="Body Mask" <?php if ($type == "Body Mask")
                        echo "selected"; ?>>Body Mask</option>
                    <option value="Body Massage Oil" <?php if ($type == "Body Massage Oil")
                        echo "selected"; ?>>Body Massage Oil
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">
                    <?= $THname ?>
                </label>
                <input type="text" class="form-control" name="name_th" value="<?php echo $name_th ?>" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">
                    <?= $ENGname ?>
                </label>
                <input type="text" class="form-control" name="name_eng" value="<?php echo $name_eng ?>" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">
                    <?= $THdetail ?>
                </label>
                <textarea class="form-control" name="detail_th" required><?php echo $detail_th ?></textarea>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">
                    <?= $ENGdetail ?>
                </label>
                <textarea class="form-control" name="detail_eng" required><?php echo $detail_eng ?></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">
                    <?= $pricesb ?>
                </label>
                <input type="number" class="form-control" name="price" value="<?php echo $price ?>" required>
            </div>
            <button type="submit" class="additem btn btn-success" id="saveButton">
                <?= $save ?>
            </button>
        </div>

    </section>

</body>

<script>
    AOS.init();
</script>

<script>
    document.getElementById('backButton').addEventListener('click', function () {
        window.history.back();
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $("#saveButton").click(function () {
            var type = $("select[name='type']").val();
            var name_th = $("input[name='name_th']").val();
            var name_eng = $("input[name='name_eng']").val();
            var detail_th = $("textarea[name='detail_th']").val();
            var detail_eng = $("textarea[name='detail_eng']").val();
            var price = $("input[name='price']").val();

            // ตรวจสอบเงื่อนไข
            if (type == "null") {
                alert("Please select type");
                return;
            }

            $.ajax({
                type: "POST",
                url: "add_product_fix_process.php",
                data: {
                    fix_id: <?php echo $fix_id ?>,
                    type: type,
                    name_th: name_th,
                    name_eng: name_eng,
                    detail_th: detail_th,
                    detail_eng: detail_eng,
                    price: price

                },
                success: function (response) {
                    // alert(response);
                    window.history.back();
                    console.log(response);
                }
            });
        });
    });
</script>



</html>