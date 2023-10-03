<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link href="calendar.css" rel="stylesheet">
    <?php
    include 'include/head.php';
    include 'include/langid.php';
    include('server.php');

    if ($langId == 1) {
        $detail = 'รายละเอียด :';
        $duration = 'ระยะเวลา :';
        $certificate = 'ใบประกาศนียบัตร :';
        $other = 'สนใจสมัครหรือสอบถามข้อมูลเพิ่มเติม';
        $hours = 'ชั่วโมง';
        $days = 'วัน';
        $prices = 'ราคา';
        $baht = 'บาท';
        $closeorder = "ปิดรายการ";
    } else {
        $detail = 'Detail :';
        $duration = 'Duration :';
        $certificate = 'Certificate :';
        $other = 'Interested in applying or asking for more information.';
        $hours = 'Hours';
        $days = 'Days';
        $prices = 'Price';
        $baht = 'Baht';
        $closeorder = "Close";
    }
    ?>

    <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $sql = "SELECT * FROM `add_course` WHERE id = $course_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name_th = $row['name_th'];
                $name_eng = $row['name_eng'];
                $img = $row['img'];
                $type = $row['type'];
                $detail_th = $row['detail_th'];
                $detail_eng = $row['detail_eng'];
                $day = $row['day'];
                $hour = $row['hour'];
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
    #popup3 {
        width: 1400px;
        height: 600px;
    }

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
    }

    .button-success {
        background-color: green;
        border-radius: 25px;
        border: none;
        margin-top: 10px;
        padding: 15px 50px 0px;
        display: inline-block;
    }

    .button-success p {
        font-size: 18px !important;
        color: black !important;
    }

    .button-close {
        background-color: red;
        margin-left: 100px;
    }

    .button-success-2 {
        background-color: green;
    }

    .button-close-2 {
        background-color: red;
        margin-left: 110px;
    }

    .product .card {
        width: 410px;
    }

    .course-detail .item:nth-child(2) .detail {
        padding-left: 4% !important;
    }

    .course-detail .item:nth-child(3) .detail {
        padding-left: 13% !important;
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
        background: #ff0000cf;
        border-radius: 10px;
    }

    .course-detail .bu-back button:hover {
        background: #BB0707;
        transition: 0.4s;
    }

    .course-detail .col-lg-6 .wrap .item:nth-child(4) img {
        width: 25%;
    }

    .course-detail .col-lg-6 .wrap .item:nth-child(4) .title {
        width: 13%;
    }

    .course-detail .item:nth-child(4) .detail {
        padding-left: 14% !important;
    }

    .course-detail .col-lg-6 .input-quantity {
        text-align: -webkit-right;
    }

    .course-detail .col-lg-6 .error {
        text-align: center;
        color: red;
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
        </div>
    </section>

    <section class="course-detail">
        <div class="bu-back" data-aos="fade-up" data-aos-duration="2000">
            <button id="backButton">
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
                                <div class="title" style="width:110%;" data-aos="zoom-in" data-aos-duration="2000">
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
                                    <img src="assets/images/icon11.png">
                                    <span>
                                        <?= $certificate ?>
                                    </span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <!-- <span><?php echo $hour ?></span> -->
                                    <?php if ($langId == 1) { ?>
                                        <span>
                                            <?php echo $name_th ?> (
                                            <?php echo $hour ?>
                                            <?= $hours ?> )
                                        </span>
                                    <?php } else { ?>
                                        <span>
                                            <?php echo $name_eng ?> (
                                            <?php echo $hour ?>
                                            <?= $hours ?> )
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title" data-aos="zoom-in" data-aos-duration="2000">
                                    <img src="assets/images/icon-time.png">
                                    <span>
                                        <?= $duration ?>
                                    </span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <span>
                                        <?php echo $day ?>
                                        <?= $days ?>
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
                                        <?= $baht ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button class="open-popup">
                            <p class="price" data-aos="fade-up" data-aos-duration="2000">
                                <!-- <?= $prices ?>
                                <?php echo $price ?>
                                <?= $price2 ?> -->
                                <?= $ordernow ?>
                            </p>
                        </button>
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
                        <div class="box">
                            <div class="container">
                                <div class="row">
                                    <p style="text-align: center;">
                                        <?= $confirmorder ?>
                                    </p>
                                </div>
                                <button class="button-success" id="button-success1">
                                    <?= $confirm ?>
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
                                <img src="assets/images/QR.svg" alt="" class="w-65">
                                <p style="text-align: center;font-size: 30px;">
                                    <?php echo $price ?>
                                    <?= $baht ?>
                                </p>
                                <button class="button-success-2" id="button-success2">
                                    <?= $confirm ?>
                                </button>
                                <button class="button-close-2" id="button-close2">
                                    <?= $back ?>
                                </button>
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
                <?php        }
                    } else {
                        // ไม่พบข้อมูลของ username นี้
                        echo "ไม่พบข้อมูลของ username นี้";
                    }

                    $conn->close();
                } else {
                    // ถ้าไม่มีค่า $_SESSION['username'] ให้ทำอะไรตามที่คุณต้องการ
                    echo "ไม่มีข้อมูล username ใน session";
                }
                ?>


            </div>
        </div>

        <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา ขั้่น 3-->

        <div class="popup" id="popup3">
            <div class="popup-content">
                <div class="container">
                    <p class=""ssssss></p>
                        จำนวนวัน <?= $day ?>
                    </p>
                    <div class="left">
                    <div id="calendar"></div>

                    </div>
                    <div class="right">
                        <div>
                            <?php
                            for ($i = 1; $i <= $day; $i++) :
                            ?>
                                <input type="date">
                            <?php endfor ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา ขั้่น 4-->

        <!-- <div class="popup" id="popup3">
            <div class="popup-content">
                <span class="close-popup" id="close-popup3">&times;</span>
                <div class="container">
                    <p style="text-align: center;">
                        <?= $thx ?>
                    </p>
                    <img src="assets/images/image 9.svg" alt="" class="w-70">
                    <p style="text-align: center;font-size: 30px;">
                        <?= $wait ?>
                    </p>
                    <a href="history.php" class="button-success" id="button-success3">
                        <p>
                            <?= $history ?>
                        </p>
                    </a>
                    <button class="button-close" id="button-close3">
                        <?= $close ?>
                    </button>
                </div>
            </div>
        </div> -->

    </section>

    <script>
        AOS.init();
    </script>



</body>

<script>
    const openpopup = document.querySelectorAll('.open-popup');
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

    openpopup.forEach(button => {
        button.addEventListener('click', () => {
            console.log("Open first popup");
            popup1.style.display = 'flex';
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
        popup1.style.display = 'flex';
        clickOverlay1.style.display = 'flex';
    });
    buttonsuccesssecond.forEach(button => {
        button.addEventListener('click', () => {
            console.log("success BTN to Open second popup");
            popup2.style.display = 'none'; // ปิด popup สอง
            popup3.style.display = 'flex';
            clickOverlay1.style.display = 'block';
        });
    });


    closethirdpopup.addEventListener('click', () => {
        console.log("X third popup ");
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
        // location.reload();
    });
    buttonclosethird.addEventListener('click', () => {
        console.log("close BTN third POPUP");
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
        // location.reload();
    });
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
    var day = "<?php echo $day ?>";
    var quantity = 1;
    var price = "<?php echo $price ?>";

    $.ajax({
        type: "POST",
        url: "coursedetail_insert.php",
        data: {
            type: type,
            name: name,
            day: day,
            quantity: quantity,
            price: price
        },
        success: function(response) {
            // alert(response);
        }
    });
    });
    });
</script>

</html>