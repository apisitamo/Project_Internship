<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <?php
    include 'include/head.php';
    include 'include/langid.php';
    include('server.php');

    if ($langId == 1) {
        $types = 'ชนิด :';
        $detail = 'รายละเอียด :';
        $other = 'สนใจสมัครหรือสอบถามข้อมูลเพิ่มเติม';
        $prices = 'ราคา';
        $price1 = "ราคาส่ง :";
        $price2 = "บาท/กก.";
        $closeorder = "ปิดรายการ";
    } else {
        $types = 'Type :';
        $detail = 'Detail :';
        $other = 'Interested in applying or asking for more information.';
        $prices = 'Price';
        $price1 = "ราคาส่ง :";
        $price2 = "Baht / Kg.";
        $closeorder = "Close";
    }
    ?>

    <?php
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $sql = "SELECT * FROM `add_product` WHERE id = $product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $img = $row['img'];
                $type = $row['type'];
                $name_th = $row['name_th'];
                $name_eng = $row['name_eng'];
                $detail_th = $row['detail_th'];
                $detail_eng = $row['detail_eng'];
                $price = $row['price'];
            }
        } else {
            echo "Product not found in database";
        }

        $conn->close();
    } else {
        echo "The specified product code was not found.";
    }
    ?>


</head>

<style>
    .popup {
        display: none;
        z-index: 1000;
        width: 900px;
        height: 600px;
        /* background-color: #fff; */
        padding: 20px;
        border-radius: 5px;
        /* max-width: 80%;*/
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        justify-content: center;
        /* background-image: url("assets\images\Frame 7961.png");*/
        background: #FFFAF5;
        border-radius: 10px;
        background-image: url(assets/images/banner-page.png);
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
        right: 20px;
        cursor: pointer;
        font-size: 50px;
    }

    .open-popup {
        border: none;
        padding: 0;
        background-color: transparent;
    }

    /*.header {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 10vh;
        width: 100vh;
        margin: 1;
    }*/

    /* .header-right {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 51vh;
        margin: 0;
        background-color: #FFFFFFB9;
    }*/


    /*css ส่วนเข้าสู่ระบบ */
    .course-product .titlebox {
        color: #945834;
        margin-top: -75px;
    }

    .course-product .content {
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: space-between;
    }

    .course-product h1 {
        text-align: center;
        padding-top: 15px;
        padding-bottom: 55px;
        margin-top: 1rem;
        font-weight: bold;
    }

    .course-product .input-group {
        margin-bottom: 10px;
        display: flex;
        flex-direction: column;
        text-align: initial;
    }

    .course-product .input-group input {
        padding: 8px;
        border-radius: 10px;
        border-top-left-radius: 10px !important;
        border-bottom-left-radius: 10px !important;
        border-color: #AFAFAF;
    }

    .course-product .col-lg-6 {
        text-align: center;
    }

    .course-product .box {
        padding-bottom: 40px;
        padding-left: 10px;
        padding-right: 10px;
        color: #A97C53;
    }

    .course-product .pop1 .input-group:nth-child(3) {
        margin-top: 20px;
    }

    .course-product .pop1 p {
        font-size: 15px;
    }

    .course-product .pop1 p a {
        color: #0a58ca !important;
    }

    .course-product .btn {
        background-color: #945834;
        color: white;
        padding: 10px 10px;
        border: none;
        cursor: pointer;
        border-radius: 10px;
    }

    .course-product .btn:hover {
        background-color: #4E240A;
    }

    .course-product .bottom-left,
    .course-product .bottom-right {
        flex: 1;
        padding: 0px;
        box-sizing: border-box;
    }

    .popup .popup-content .container {
        width: auto;
        display: inherit;
        position: relative;
        text-align: center;

    }

    .homecontent {
        margin-top: 150px
    }

    .popup .container p {
        font-size: 35px;
        color: #A97C53;
    }

    .popup button {
        border-radius: 25px;
        font-size: 18px;
        border: none;
        margin-top: 10px;
        padding: 15px 50px;
        display: inline-block;
        color: white !important;
    }

    .button-success {
        background-color: #5CE600;
        border-radius: 25px;
        border: none;
        margin-top: 10px;
        padding: 15px 50px 0px;
        display: inline-block;
    }
    
    #button-success1:hover {
        background-color: #009900;
        transition: 0.5s;
    }

    .button-success p {
        font-size: 18px !important;
    }

    .button-close {
        background-color: #FF3333;
        margin-left: 100px;
    }

    #button-close1:hover {
        background-color: #CC0000;
        transition: 0.5s;
    }

    .button-success-2 {
        background-color: #5CE600;
    }

    #button-success2:hover {
        background-color: #009900;
        transition: 0.5s;
    }

    .button-close-2 {
        background-color: #FF3333;
        margin-left: 110px;
    }

    #button-close2:hover {
        background-color: #CC0000;
        transition: 0.5s;
    }
    
    #button-success3 p{
        color: white !important;
    }

    #button-success3:hover{
        background-color: #009900;
        transition: 0.5s;
    }

    .product .card {
        width: 410px;
    }

    .course-detail .item:nth-child(2) .detail {
        padding-left: 10% !important;
    }

    .course-detail .item:nth-child(3) .detail {
        padding-left: 7% !important;
    }

    .banner-page .wrap a {
        position: absolute;
        top: 10%;
        left: 3%;
    }

    .course-detail {
        margin: 1rem 0 3rem 0 !important;
    }

    .course-detail .bu-back {
        margin-left: 1%;
        margin-top: 1%;
    }

    .course-detail .bu-back button {
        padding: 7px 10px;
        border: none;
        background: #d17742;
        border-radius: 10px;
        border-bottom-style: revert;
    }

    .course-detail .bu-back button:hover {
        background: #945834;
        color: white;
        transition: 0.4s;
        border-bottom-style: revert;
    }

    .course-detail .col-lg-6 .wrap .item:nth-child(3) img {
        width: 25%;
    }

    .course-detail .col-lg-6 .wrap .item:nth-child(3) .title {
        width: 13%;
    }

    .course-detail .col-lg-6 .input-quantity {
        text-align: -webkit-right;
    }

    .course-detail .col-lg-6 .error {
        text-align: center;
        color: red;
    }

    #popup1 #box1 .step .num {
        position: absolute;
        width: 40% !important;
        left: -40%;
        top: -20%;
    }

    #popup1 #box1 .step .step0 {
        position: relative;
    }

    #popup1 #box1 .step .step0 img {
        width: 165px;
    }

    #popup1 #box1 .text01,
    #popup1 #box1 .step {
        display: flex;
        justify-content: space-around;
    }

    #popup1 #box1 .text01 p {
        font-size: 18px;
        margin-top: 10px;
        margin: 10px 15px 0px 55px;
    }

    #popup1 #box1 .bt1 {
        display: flex;
        justify-content: center;
        margin-top: 4%;
    }

    #popup1 #box1 .bt1 #button-close1 {
        margin-left: 80px !important;
    }

    #popup1 #box1 .title-box1 {
        text-align: center;
        margin-bottom: 70px;
        margin-top: -100px;
    }
</style>

<body>

    <section class="banner-page" data-aos="flip-down" data-aos-duration="2000">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <?php if ($langId == 1) { ?>
                <p>
                    <?php echo $name_th ?>
                </p>
            <?php } else { ?>
                <p>
                    <?php echo $name_eng ?>
                </p>
            <?php } ?>
            <!-- <a href="product.php">
                <button>
                    <?= $back ?>
                </button>
            </a> -->
        </div>
    </section>

    <section class="course-detail">
        <div class="bu-back" data-aos="fade-up" data-aos-duration="2000">
            <button id="backButton">
                <i class="bi bi-caret-left-fill"></i>
                <?= $back ?>
            </button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="2000">
                    <img src="<?php echo $img ?>" alt="" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        <div class="wrap">
                            <div class="item">
                                <div class="title" style="width:40%;" data-aos="zoom-in" data-aos-duration="2000">
                                    <img src="assets/images/icon-chat.png">
                                    <span>
                                        <?= $detail ?>
                                    </span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <?php if ($langId == 1) { ?>
                                        <span>
                                            <?php echo $detail_th ?>
                                        </span>
                                    <?php } else { ?>
                                        <span>
                                            <?php echo $detail_eng ?>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title" data-aos="zoom-in" data-aos-duration="2000">
                                    <img src="assets/images/icon-chat.png">
                                    <span>
                                        <?= $types ?>
                                    </span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <span>
                                        <?php echo $type ?>
                                    </span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title" data-aos="zoom-in" data-aos-duration="2000">
                                    <img src="assets/images/price.png">
                                    <span>
                                        <?= $prices ?> :
                                    </span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <span>
                                        <?php echo $price ?>
                                        <?= $price2 ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['username'])) : ?>
                            <div class="input-quantity" data-aos="zoom-in" data-aos-duration="2000">
                                <span>
                                    <?= $quantityy ?>
                                </span>
                                <input style="width:70px; background-color:#F5EBEB;" type="number" class="form-control" name="quantity" id="quantityInput" oninput="calculateTotal()" required placeholder="0">
                                <span>
                                    <?= $Kg ?>
                                </span>
                            </div>
                            <button class="open-popup">
                                <p class="price" data-aos="fade-up" data-aos-duration="2000">
                                    <!-- <?= $prices ?>
                                <?php echo $price ?>
                                <?= $price2 ?> -->
                                    <?= $ordernow ?>
                                </p>
                            </button>
                            <div class="error" style="display: none;">
                                <?= $pinput ?>
                            </div>
                        <?php else : ?>
                            <button class="open-popup-out">
                                <p class="price" data-aos="fade-up" data-aos-duration="2000">
                                    <!-- <?= $prices ?>
                                <?php echo $price ?>
                                <?= $price2 ?> -->
                                    <?= $ordernow ?>
                                </p>
                            </button>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="regiscourse">
        <div class="wrap">
            <span class="title" data-aos="fade-up" data-aos-duration="2000">
                <?= $other ?>
            </span>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="2000">
                    <img src="assets/images/contact-qr.png" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="wrap-contact">
                        <div class="item call" data-aos="fade-up" data-aos-duration="2000"><i class="fa-regular fa-phone"></i><span>086-322-1922</span></div>
                        <a href="https://line.me/ti/p/~@108toots">
                            <div class="item line" data-aos="fade-up" data-aos-duration="2000"><img class="line-img" src="assets/images/line.png" alt=""><span>@bsathailand</span></div>
                        </a>
                        <a href="https://th-th.facebook.com/BSABangkok/">
                            <div class="item facebook" data-aos="fade-up" data-aos-duration="2000"><i class="bi bi-facebook"></i><span>Bangkok Spa Academy</span></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'include/footer.php'; ?>

    <section class="course-product">
        <div class="click-overlay" id="click-overlay1"></div>

        <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา ขั้่น 1-->

        <div class="popup" id="popup1">
            <div class="popup-content">
                <span class="close-popup" id="close-popup1">&times;</span>
                <div class="homecontent">
                    <?php if (isset($_SESSION['username'])) : ?>
                        <div class="box" id="box1">
                            <div class="container">
                                <div class="row">
                                    <p class="title-box1">
                                        <?= $howto2 ?>
                                    </p>
                                    <div class="step">
                                        <div class="step0">
                                            <img src="assets/images/step1.png">
                                            <img class="num" src="assets/images/num1.png">
                                        </div>
                                        <div class="step0">
                                            <img src="assets/images/step5.png">
                                            <img class="num" src="assets/images/num2.png">
                                        </div>
                                        <!-- <div class="step0">
                                            <img src="assets/images/step4.png">
                                            <img class="num" src="assets/images/num3.png">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="text01">
                                    <p style="color:black;"><?= $QR ?></p>
                                    <p style="color:black;"><?= $verify ?>
                                        <br><?= $deliver ?>
                                    </p>
                                    <!-- <p style="color:black;"></p> -->
                                </div>
                            </div>
                            <div class="bt1">
                                <button class="button-success" id="button-success1">
                                    <?= $next ?>
                                </button>
                                <button class="button-close" id="button-close1">
                                    <?= $cancle ?>
                                </button>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="box">
                            <div class="container">
                                <div class="row">
                                    <div class="titlebox">
                                        <h1>
                                            <?= $pleasesignin ?>
                                        </h1>
                                    </div>
                                    <div class="col-lg-6 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="2000">
                                        <img src="assets/images/BSA.png" alt="" class="BSAlogo">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="content">
                                            <form action="login_db_popup.php" method="post" class="pop1">
                                                <div class="input-group">
                                                    <label for="username">
                                                        <?= $usernames ?>
                                                    </label>
                                                    <input type="text" name="username">
                                                </div>
                                                <div class="input-group">
                                                    <label for="password">
                                                        <?= $passwords ?>
                                                    </label>
                                                    <input type="password" name="password">
                                                </div>
                                                <div class="input-group">
                                                    <button type="submit" name="login_user" class="btn">
                                                        <?= $signin ?>
                                                    </button>
                                                </div>
                                                <div>
                                                    <a href="register.php">
                                                        <?= $register ?>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา ขั้่น 2-->

        <div class="popup" id="popup2">
            <div class="popup-content">
                <span class="close-popup" id="close-popup2">&times;</span>
                <?php
                if (isset($_SESSION['username'])) {
                    $usernameToCheck = $_SESSION['username'];

                    include('server.php');

                    $sql = "SELECT fullname, phone, address FROM user WHERE username = '$usernameToCheck'";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 1) {

                        $row = $result->fetch_assoc();
                        $fullname = $row['fullname'];
                        $phone = $row['phone'];
                        $address = $row['address'];

                        if ($fullname && $phone && $address) { ?>
                            <div class="container">
                                <?php if ($langId == 1) { ?>
                                    <p style="text-align: center;">
                                        <?php echo $name_th ?>
                                    </p>
                                <?php } else { ?>
                                    <p style="text-align: center;">
                                        <?php echo $name_eng ?>
                                    </p>
                                <?php } ?>
                                <img style="width:300px;" src="assets/images/qrcode.png" alt="" class="w-65">
                                <p id="totalPrice" style="text-align: center;font-size: 30px;">
                                    <?= $prices ?>
                                    <?php echo $price ?>
                                    <?= $price2 ?>
                                </p>
                                <input type="file" class="form-control" name="img" style="margin-bottom:2px " required>
                                <button class="button-success-2" id="button-success2">
                                    <?= $confirm ?>
                                </button>
                                <button class="button-close-2" id="button-close2">
                                    <?= $back ?>
                                </button>
                                <h5 class="alert" style="color:red; font-size:15px; display:none;">
                                    <?= $slip ?>
                                </h5>
                            </div>
            </div>
        <?php
                        } else { ?>
            <div class="homecontent">
                <div class="container">
                    <div class="row">
                        <p style="text-align: center;">
                            <?= $fillinformation ?>
                        </p>
                    </div>
                    <a href="user.php" class="button-success" id="button-success3">
                        <p>
                            <?= $fillin ?>
                        </p>
                    </a>
                </div>
            </div>
<?php }
                    } else {
                        // ไม่พบข้อมูลของ username นี้
                        echo "No information found for this username.";
                    }

                    $conn->close();
                } else {
                    // ถ้าไม่มีค่า $_SESSION['username'] ให้ทำอะไรตามที่คุณต้องการ
                    echo "There is no username information in the session.";
                }
?>
        </div>

        <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา ขั้่น 3-->

        <div class="popup" id="popup3">
            <div class="popup-content">
                <span class="close-popup" id="close-popup3">&times;</span>
                <div class="container"style="width: 750px;">
                    <p style="text-align: center;">
                        <?= $thx ?>
                    </p>
                    <img src="assets/images/image 9.svg" alt="" class="w-70">
                    <p style="text-align: center;font-size: 25px;">
                        <?= $wait ?>
                    </p>
                    <a href="history.php" class="button-success" id="button-success3">
                        <p>
                            <?= $history ?>
                        </p>
                    </a>
                    <!-- <button class="button-close" id="button-close3">
                        <?= $close ?>
                    </button> -->
                </div>
            </div>
        </div>
    </section>

</body>

<script>
    const openpopup = document.querySelectorAll('.open-popup');
    const openpopupout = document.querySelectorAll('.open-popup-out');
    const inputQuantity = document.querySelector('.input-quantity input');

    const popup1 = document.querySelector('#popup1');
    const closefirstpopup = document.querySelector('#close-popup1');
    const buttonclosefirst = document.querySelector('#button-close1');
    const buttonsuccessfirst = document.querySelectorAll('#button-success1');

    const popup2 = document.querySelector('#popup2');
    const closesecondpopup = document.querySelector('#close-popup2');
    const buttonclosesecond = document.querySelector('#button-close2');
    const buttonsuccesssecond = document.querySelectorAll('#button-success2');

    const popup3 = document.querySelector('#popup3');
    const closethirdpopup = document.querySelector('#close-popup3');
    const buttonclosethird = document.querySelector('#button-close3');

    const clickOverlay1 = document.querySelector('#click-overlay1');

    const fileInput = document.querySelector('input[name="img"]');
    const alertMessage = document.querySelector('.alert');

    openpopup.forEach(button => {
        button.addEventListener('click', () => {
            if (inputQuantity.value.trim() <= '0') {
                document.querySelector('.error').style.display = 'block';
            } else {
                console.log("Open first popup");
                popup1.style.display = 'flex';
                clickOverlay1.style.display = 'block';
            }
        });
    });

    clickOverlay1.addEventListener('click', () => {
        console.log("Clicked on overlay");
        popup1.style.display = 'none';
        popup2.style.display = 'none';
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });

    openpopupout.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Open first popup");
            popup1.style.display = 'block';
            clickOverlay1.style.display = 'block';
        });
    });

    closefirstpopup.addEventListener('click', () => {
        console.log("X first popup ");
        popup1.style.display = 'none';
        clickOverlay1.style.display = 'none';
        // location.reload();
    });
    buttonclosefirst.addEventListener('click', () => {
        console.log("close BTN first POPUP");
        popup1.style.display = 'none';
        clickOverlay1.style.display = 'none';
        // location.reload();
    });
    buttonsuccessfirst.forEach(button => {
        button.addEventListener('click', () => {
            console.log("success BTN to Open second popup");
            popup1.style.display = 'none'; // ปิด popup แรก
            popup2.style.display = 'flex';
            clickOverlay1.style.display = 'block';
        });
    });


    closesecondpopup.addEventListener('click', () => {
        console.log("X second popup");
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
        // location.reload();
    });
    buttonclosesecond.addEventListener('click', () => {
        console.log("back BTN second POPUP");
        popup2.style.display = 'none';
        popup1.style.display = 'block';
        clickOverlay1.style.display = 'flex';
    });
    buttonsuccesssecond.forEach(button => {
        button.addEventListener('click', () => {
            console.log("success BTN to Open second popup");
            if (fileInput.files.length === 0) {
                alertMessage.style.display = 'block';
            } else {
                popup2.style.display = 'none'; // ปิด popup สอง
                popup3.style.display = 'block';
                clickOverlay1.style.display = 'block';
            }
        });
    });


    closethirdpopup.addEventListener('click', () => {
        console.log("X third popup ");
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
        location.reload();
    });
    // buttonclosethird.addEventListener('click', () => {
    //     console.log("close BTN third POPUP");
    //     popup3.style.display = 'none';
    //     clickOverlay1.style.display = 'none';
    //     location.reload();
    // });
</script>

<script>
    AOS.init();
</script>

<script>
    document.getElementById('backButton').addEventListener('click', function() {
        window.history.back();
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".button-success-2").click(function() {
            var type = "<?php echo $type ?>";
            var name = "<?php echo $name_eng ?>";
            var quantity = $("input[name='quantity']").val();
            var price = <?php echo $price ?> * quantity;
            var imageInput = $("input[name='img']")[0];

            if (imageInput.files.length === 0) {
                // Display an alert or handle the case where no file is selected
                return;
            }
            var imageFile = imageInput.files[0];

            var formData = new FormData();
            formData.append("name", name);
            formData.append("type", type);
            formData.append("quantity", quantity);
            formData.append("price", price);
            formData.append("img", imageFile);
            $.ajax({
                type: "POST",
                url: "productdetail_insert.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // alert(response);
                }
            });
        });
    });
</script>

<script>
    var quantityInput = document.getElementById("quantityInput");

    quantityInput.addEventListener("change", function() {
        var inputValue = parseFloat(quantityInput.value);
        if (inputValue < 0) {
            quantityInput.value = 0;
        }
    });
</script>

<script>
    function calculateTotal() {
        var price = <?php echo $price; ?>;
        var quantity = document.getElementById("quantityInput").value;
        var total = price * quantity;

        document.getElementById("totalPrice").innerHTML = "<?= $totalprice ?> : " + total + " <?= $baht ?>";
    }
</script>

</html>