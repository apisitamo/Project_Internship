<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include 'include/langid.php';
// include('server.php');


if ($langId == 1) {
    $title = "ผลิตภัณฑ์สปา";
    $detailtitle = "“ออเร็นทิสต์” (Orientist) : ผลิตภัณฑ์สปาจากธรรมชาติซึ่งเป็นการนำสมุนไพรไทยมาผ่านกระบวนการวิจัย ด้วยโรงงานมาตรฐาน GMP และได้รับการรับรองจาก อย. รวมถึงได้รับการสนับสนุนด้านทุนวิจัยจาก สำนักงานคณะกรรมการวิจัยแห่งชาติ และ สำนักงานนวัตกรรมแห่งชาติ";
    $product1 = "เกลือสูตร Orientist ผสานคุณค่าสมุนไพรขมิ้นผสมเมล็ดองุ่น มีคุณสมบัติในการทำให้ผิวขาวขึ้นอย่างเป็นธรรมชาติ ลดเลือนริ้วรอยทำให้ผิวดูกระจ่างใส";
    $product2 = "เกลือสูตร Orientist ผสานคุณค่าสารสกัดจากมะละกออุดมด้วยสาร AHA จากธรรมชาติรวมทั้งวิตามินและแร่ธาตุ ช่วยซ่อมแซมและบำรุงให้ผิวมีสุขภาพดี ขาวใส";
    $product3 = "โคลนสูตร Orientist อุดมด้วยวิตามิน E ช่วยทำความสะอาดผิวได้อย่างล้ำลึก พร้อมเติมความชุ่มชื่น ช่วยบำรุงผิวพรรณ ลดผิวหมองคล้ำ และเผยผิวดูกระจ่างใส";
    $product4 = "ผ่อนคลายกล้ามเนื้อและอารมณ์ ตามแบบฉบับไทยสัมผัสถึงแมกไม้นานาพรรณและไอหมอก บนเทือกเขาทางภาคเหนือ";
    $product5 = "ผ่อนคลายกล้ามเนื้อและอารมณ์ ตามแบบฉบับไทย รู้สึกถึงกลิ่นอาย ความเป็นไทยยุคโบราณ ท้องทุ่งเขียวขจีและเสน่ห์แห่งลุ่มน้ำเจ้าพระยา";
    $product6 = "ผ่อนคลายกล้ามเนื้อและอารมณ์ ตามแบบฉบับไทย สดชื่นด้วยกลิ่นไอทะเล และป่าดิบชื้นทางภาคใต้เสมือนล่องลอยไป ในท้องทะเลและหาดทรายขาว";
    $price1 = "ราคาส่ง :";
    $price2 = "บาท/กก.";
} else {
    $title = "SPA Product";
    $detailtitle = "All Orientist  products, elaborately created and thoroughly researched, are filled with the essence of “Thai herbal extracts”, well-know for their properties of miraculous skin treatment.";
    $product1 = "The properties of whitening anti-wrinkle and anti-bacteria for bright and healthy skin.";
    $product2 = "Thai fruit that is rich in vitamin. Thus it helps to restore smoothness and suppleness.";
    $product3 = "Body mask enrich with Vitamin E that can protect skin from outside pollution. It also has the properties of deep cleaning.";
    $product4 = "The Spirit of Lanna makes your feeling likely in the northern of Thailand, the place of mountain, flower fields and herb.";
    $product5 = "The Spirit of Ayothaya brings you to the embrace of such Central Thai attractions as ancient cities, Clear rivers and green field.";
    $product6 = "The Spirit of Srivichai is a unique style which will take you to the paradise of pure natural feeling of white sandy beaches and beautiful sea of southern Thailand.";
    $price1 = "";
    $price2 = "";
}
?>

<style>
    .popup {
        display: none;
        z-index: 1000;
        width: 900px;
        height: 600px;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        max-width: 80%;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* text-align: center; */
        justify-content: center;
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
        right: 20px;
        cursor: pointer;
        font-size: 40px;
    }

    .open-popup {
        border: none;
        padding: 0;
        /* ถ้าคุณต้องการลบการเพิ่มระยะห่างภายในปุ่ม */
        background-color: transparent;
        /* ถ้าคุณต้องการให้พื้นหลังเป็นโปร่งแสง */
    }

    .header {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 10vh;
        width: 100vh;
        margin: 1;
        background-color: #DAB437B9;
    }

    .header-right {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 51vh;
        margin: 0;
        background-color: #FFFFFFB9;
    }

    .input-group {
        margin-bottom: 10px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .input-group label {
        width: 100%;
    }

    .input-group input {
        width: 50%;
        padding: 5px;
        margin-top: 5px;
    }

    .btn {
        background-color: #6ACC6D;
        /* เปลี่ยนสีพื้นหลังปุ่ม */
        color: white;
        /* เปลี่ยนสีตัวอักษร */
        padding: 10px 10px;
        /* ปรับขนาดการเรียงกล่อง */
        border: none;
        /* ไม่แสดงเส้นขอบ */
        cursor: pointer;
        /* เปลี่ยนเคอร์เซอร์เป็นรูปแบบชี้ไป */
    }

    .btn:hover {
        background-color: #36863A;
        /* สีพื้นหลังเมื่อชี้เมาส์ไป */
    }
    .bottom-left,
    .bottom-right {
        flex: 1;
        padding: 0px;
        box-sizing: border-box;
    }

    .bottom-left {
        background-color: #E62525;
    }

    .bottom-right {
        background-color: #C3ED07;
    }
</style>

<body>

    <section class="banner-product" data-aos="flip-down" data-aos-duration="2000">
        <div class="wrap">
            <div class="fe">
                <p class="title"><?= $title ?></p>
                <img src="assets/images/bn-product.png" alt="">
                <p class="detail"><?= $detailtitle ?></p>
            </div>
        </div>
    </section>

    <section class="product">
        <div class="container">
            <div class="wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="nav nav-page" data-aos="fade-right" data-aos-duration="2000">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="product.php">Body Scrub</a>
                            </li>
                        </ul>
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-6 mb-4" data-aos="flip-right" data-aos-duration="2000">
                                    <button class="open-popup">
                                        <div class="card">
                                            <img src="assets/images/product1.png" alt="" class="w-100">
                                            <div class="card-body">
                                                <h5 class="card-title">Curcuma + Grape Seed Salt Scrub</h5>
                                                <h5 class="card-title">เกลือขมิ้นผสมเมล็ดองุ่น</h5>
                                                <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i> <?= $product1 ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wrap">
                                                    <div class="title">
                                                        <p>Wholesale Price :</p>
                                                        <p class="ship"><?= $price1 ?></p>
                                                    </div>
                                                    <div class="price">
                                                        <p class="price-product">800</p>
                                                        <div class="rate">
                                                            <p>THB/kg</p>
                                                            <p><?= $price2 ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>

                                <div class="col-lg-6 mb-4" data-aos="flip-down" data-aos-duration="2000">
                                    <button class="open-popup">
                                        <div class="card">
                                            <img src="assets/images/product2.png" alt="" class="w-100">
                                            <div class="card-body">
                                                <h5 class="card-title">Papaya Salt Scrub</h5>
                                                <h5 class="card-title">เกลือมะละกอ</h5>
                                                <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i><?= $product2 ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wrap">
                                                    <div class="title">
                                                        <p>Wholesale Price :</p>
                                                        <p class="ship"><?= $price1 ?></p>
                                                    </div>
                                                    <div class="price">
                                                        <p class="price-product">800</p>
                                                        <div class="rate">
                                                            <p>THB/kg</p>
                                                            <p><?= $price2 ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <ul class="nav nav-page" data-aos="fade-left" data-aos-duration="2000">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="product.php">Body Mask</a>
                            </li>
                        </ul>
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-12 mb-4" data-aos="flip-left" data-aos-duration="2000">
                                    <button class="open-popup" id="btn2">
                                        <div class="card">
                                            <img src="assets/images/product3.png" alt="" class="w-100">
                                            <div class="card-body">
                                                <h5 class="card-title">Volcano Clay Mask</h5>
                                                <h5 class="card-title">มาส์กโคลนภูเขาไฟ</h5>
                                                <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i><?= $product3 ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="wrap">
                                                    <div class="title">
                                                        <p>Wholesale Price :</p>
                                                        <p class="ship"><?= $price1 ?></p>
                                                    </div>
                                                    <div class="price">
                                                        <p class="price-product">950</p>
                                                        <div class="rate">
                                                            <p>THB/kg</p>
                                                            <p><?= $price2 ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product">
        <div class="container">
            <div class="wrap">
                <ul class="nav nav-page" data-aos="fade-right" data-aos-duration="2000">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="product.php">Body Massage Oil</a>
                    </li>
                </ul>
                <div class="row">

                    <div class="col-lg-4 mb-4" data-aos="flip-right" data-aos-duration="2000">
                        <button class="open-popup">
                            <div class="card">
                                <img src="assets/images/product4.png" alt="" class="w-100">
                                <div class="card-body">
                                    <h5 class="card-title">Spirit of Lanna</h5>
                                    <h5 class="card-title">มนต์เสน่ห์แห่งล้านนา</h5>
                                    <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i><?= $product4 ?></p>
                                    <p class="mt-3 mb-0">Aroma Scents : Ylang Ylang Oil & Lavender Oil</p>
                                </div>
                                <div class="card-footer">
                                    <div class="wrap">
                                        <div class="title">
                                            <p>Wholesale Price :</p>
                                            <p class="ship"><?= $price1 ?></p>
                                        </div>
                                        <div class="price">
                                            <p class="price-product">800</p>
                                            <div class="rate">
                                                <p>THB/kg</p>
                                                <p><?= $price2 ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>

                    <div class="col-lg-4 mb-4" data-aos="flip-down" data-aos-duration="2000">
                        <div class="card">
                            <button class="open-popup">
                                <img src="assets/images/product4.png" alt="" class="w-100">
                                <div class="card-body">
                                    <h5 class="card-title">Spirit of Ayothaya</h5>
                                    <h5 class="card-title">มนต์เสน่ห์แห่งอโยธยา</h5>
                                    <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i><?= $product5 ?></p>
                                    <p class="mt-3 mb-0">Aroma Scents : Eucalyptus Oil & Lavender Oil</p>

                                </div>
                                <div class="card-footer">
                                    <div class="wrap">
                                        <div class="title">
                                            <p>Wholesale Price :</p>
                                            <p class="ship"><?= $price1 ?></p>
                                        </div>
                                        <div class="price">
                                            <p class="price-product">800</p>
                                            <div class="rate">
                                                <p>THB/kg</p>
                                                <p><?= $price2 ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4" data-aos="flip-left" data-aos-duration="2000">
                        <div class="card">
                            <button class="open-popup">
                                <img src="assets/images/product4.png" alt="" class="w-100">
                                <div class="card-body">
                                    <h5 class="card-title">Spirit of Srivichai</h5>
                                    <h5 class="card-title">มนต์เสน่ห์แห่งศรีวิชัย</h5>
                                    <p class="card-text"><i class="fa-sharp fa-solid fa-circle-check"></i><?= $product6 ?></p>
                                    <p class="mt-3 mb-0">Aroma Scents : Peppermint Oil & Lemon Oil</p>
                                </div>
                                <div class="card-footer">
                                    <div class="wrap">
                                        <div class="title">
                                            <p>Wholesale Price :</p>
                                            <p class="ship"><?= $price1 ?></p>
                                        </div>
                                        <div class="price">
                                            <p class="price-product">800</p>
                                            <div class="rate">
                                                <p>THB/kg</p>
                                                <p><?= $price1 ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="click-overlay" id="click-overlay1"></div>

    <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา ขั้่น 1-->

    <div class="popup" id="popup1">
        <div class="popup-content">
            <span class="close-popup" id="close-popup1">&times;</span>
            <div class="homecontent">
                <?php if (isset($_SESSION['username'])) : ?>
                    <div>
                        <p style="text-align: center;"><?= $confirmorder ?></p>
                        <button class="button-success" id="button-success1" style="color: green;"><?= $confirm ?></button>
                        <button class="button-close" id="button-close1" style="color: red;"><?= $cancle ?></button>
                    </div>
                <?php else : ?>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                            <h3>
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </h3>
                        </div>
                    <?php endif ?>
                    <div class="box">
                        <div class="header">
                            <h2><?= $login ?></h2>
                        </div>
                        <div class="bottom">
                            <div class="bottom-left">
                                <img src="assets/images/logohead.png" alt="logo">
                            </div>
                            <div class="bottom-right">
                                <form action="login_db_popup.php" method="post">
                                    <div class="input-group">
                                        <label for="username"><?= $username ?></label>
                                        <input type="text" name="username">
                                    </div>
                                    <div class="input-group">
                                        <label for="password"><?= $password ?></label>
                                        <input type="password" name="password">
                                    </div>
                                    <div class="input-group">
                                        <button type="submit" name="login_user" class="btn"><?= $login ?></button>
                                    </div>
                                    <p><?= $notyet ?>
                                        <a href="register.php"><?= $signup ?></a>
                                    </p>
                                </form>
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
            <div>
                <p style="text-align: center;">second popup</p>
                <button class="button-success" id="button-success2" style="color: green;">ยืนยัน</button>
                <button class="button-close" id="button-close2" style="color: red;">ปิด</button>
            </div>
        </div>
    </div>


    <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา ขั้่น 3-->
    <div class="popup" id="popup3">
        <div class="popup-content">
            <span class="close-popup" id="close-popup3">&times;</span>
            <div>
                <p style="text-align: center;">third popup</p>
                <button class="button-success" id="button-success3" style="color: green;">ยืนยัน</button>
                <button class="button-close" id="button-close3" style="color: red;">ปิด</button>
            </div>
        </div>
    </div>



    <?php include 'include/footer.php'; ?>

</body>

<script>
    const openpopup = document.querySelectorAll('.open-popup');

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
    });
    buttonclosefirst.addEventListener('click', () => {
        console.log("close BTN first POPUP");
        popup1.style.display = 'none';
        clickOverlay1.style.display = 'none';
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
    });
    buttonclosesecond.addEventListener('click', () => {
        console.log("close BTN second POPUP");
        popup2.style.display = 'none';
        clickOverlay1.style.display = 'none';
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
    });
    buttonclosethird.addEventListener('click', () => {
        console.log("close BTN third POPUP");
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });






    clickOverlay1.addEventListener('click', () => {
        console.log("Clicked on overlay");
        popup1.style.display = 'none'; // ปิด popup1 ที่มี id="popup1"
        popup2.style.display = 'none';
        popup3.style.display = 'none';
        clickOverlay1.style.display = 'none';
    });
</script>

<!-- <script>
    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 2,
        perMove: 1,
        breakpoints: {
            640: {
                perPage: 1,
            },
        }
    });


    splide.mount();
</script> -->

<script>
    AOS.init();
</script>

</html>