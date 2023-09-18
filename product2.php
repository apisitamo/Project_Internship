<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include 'include/langid.php';
include('server.php');

if ($langId == 1) {
    $title = "ผลิตภัณฑ์สปา";
    $detailtitle = "“ออเร็นทิสต์” (Orientist) : ผลิตภัณฑ์สปาจากธรรมชาติซึ่งเป็นการนำสมุนไพรไทยมาผ่านกระบวนการวิจัย ด้วยโรงงานมาตรฐาน GMP และได้รับการรับรองจาก อย. รวมถึงได้รับการสนับสนุนด้านทุนวิจัยจาก สำนักงานคณะกรรมการวิจัยแห่งชาติ และ สำนักงานนวัตกรรมแห่งชาติ";
    $nav1 = "ทั้งหมด";
    $nav2 = "Body Scrub";
    $nav3 = "Body Mask";
    $nav4 = "Body Massage Oil";
    $price1 = "ราคาส่ง :";
    $price2 = "บาท/กก.";
} else {
    $title = "SPA Product";
    $detailtitle = "All Orientist  products, elaborately created and thoroughly researched, are filled with the essence of “Thai herbal extracts”, well-know for their properties of miraculous skin treatment.";
    $nav1 = "All";
    $nav2 = "Body Scrub";
    $nav3 = "Body Mask";
    $nav4 = "Body Massage Oil";
    $price1 = "ราคาส่ง :";
    $price2 = "บาท/กก.";
}



?>

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

    .course-product .BSAlogo {}

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
        font-size: 45px;
        color: #A97C53;
    }

    .popup button {
        border-radius: 25px;
        font-size: 18px;
        border: none;
        text-align: center;
        margin-top: 10px;
        padding: 15px 50px;
        display: inline-block;
    }

    .button-success {
        background-color: green;
    }

    .button-close {
        background-color: red;
        margin-left: 70px;
    }

    .button-success-2 {
        background-color: green;
    }

    .button-close-2 {
        background-color: red;
        margin-left: 110px;
    }

    .popup .container img {}

    .product .card {
        width: 410px;
        box-shadow: 0px 4px 4px rgb(111 51 27 / 25%);
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<body>

    <section class="banner-product" data-aos="flip-down" data-aos-duration="2000">
        <div class="wrap">
            <div class="fe">
                <p class="title">
                    <?= $title ?>
                </p>
                <img src="assets/images/bn-product.png" alt="">
                <p class="detail">
                    <?= $detailtitle ?>
                </p>
            </div>
        </div>
    </section>

    <section class="all-course">
        <div class="container">
            <div class="course">

                <ul class="nav nav-page" data-aos="fade-right" data-aos-duration="2000">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="product.php">
                            <?= $nav1 ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="product2.php">
                            <?= $nav2 ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product3.php">
                            <?= $nav3 ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product4.php">
                            <?= $nav4 ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="product">
        <div class="container">
            <div class="wrap">
                <div class="row">

                    <?php
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $sql = "SELECT * FROM `add_product` WHERE `type`= 'Body Scrub'ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-lg-4 mb-4" data-aos="flip-right" data-aos-duration="2000">
                                <a class="open-popup" href="productdetail.php?product_id=<?php echo $row['id']; ?>">
                                    <div class="card">
                                        <img src="<?php echo $row['img']; ?>" alt="" class="w-100">
                                        <div class="card-body">
                                            <?php if ($langId == 1) { ?>
                                                <h5 class="card-title">
                                                    <?php echo $row['name_th']; ?>
                                                </h5>
                                            <?php } else { ?>
                                                <h5 class="card-title">
                                                    <?php echo $row['name_eng']; ?>
                                                </h5>
                                            <?php } ?>
                                            <!-- <p class="mt-3 mb-0">Aroma Scents : Ylang Ylang Oil & Lavender Oil</p> -->
                                        </div>
                                        <div class="card-footer">
                                            <div class="wrap">
                                                <?php if ($langId == 1) { ?>
                                                    <div class="title">
                                                        <p class="ship">
                                                            <?= $price1 ?>
                                                        </p>
                                                    </div>
                                                    <div class="price">
                                                        <p class="price-product">
                                                            <?php echo $row['price']; ?>
                                                        </p>
                                                        <div class="rate">
                                                            <p>
                                                                <?= $price2 ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="title">
                                                        <p>Wholesale Price :</p>
                                                    </div>
                                                    <div class="price">
                                                        <p class="price-product">
                                                            <?php echo $row['price']; ?>
                                                        </p>
                                                        <div class="rate">
                                                            <p>THB/kg</p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
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
        </div>
        </div>
    </section>



    <?php include 'include/footer.php'; ?>

</body>



<script>
    AOS.init();
</script>

</html>