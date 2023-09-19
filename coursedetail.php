<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <?php
    include 'include/head.php';
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
    } else {
        $detail = 'Detail :';
        $duration = 'Duration :';
        $certificate = 'Certificate :';
        $other = 'Interested in applying or asking for more information.';
        $hours = 'Hours';
        $days = 'Days';
        $prices = 'Price';
        $baht = 'Baht';
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
            echo "ไม่พบข้อมูลหลักสูตร";
        }

        $conn->close();
    } else {
        echo "ไม่พบรหัสหลักสูตรที่ระบุ";
    }
    ?>


</head>

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
                        </div>
                        <button class="open-popup"
                            href="coursedetail.php?course_id=<?php echo $row['id']; ?>&type=<?php echo $row['type']; ?>">
                            <p class="price" data-aos="fade-up" data-aos-duration="2000">
                                <?= $prices ?>
                                <?php echo $price ?>
                                <?= $baht ?>
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
                        <div class="item call" data-aos="fade-up" data-aos-duration="2000"><i
                                class="fa-regular fa-phone"></i><span>086-322-1922</span></div>
                        <a href="https://line.me/ti/p/~@108toots">
                            <div class="item line" data-aos="fade-up" data-aos-duration="2000"><img class="line-img"
                                    src="assets/images/line.png" alt=""><span>@bsathailand</span></div>
                        </a>
                        <a href="https://th-th.facebook.com/BSABangkok/">
                            <div class="item facebook" data-aos="fade-up" data-aos-duration="2000"><i
                                    class="bi bi-facebook"></i><span>Bangkok Spa Academy</span></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'include/footer.php'; ?>

    <script>
        AOS.init();
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".open-popup").click(function () {
                var type = "<?php echo $type ?>";
                var name = "<?php echo $name_th ?>";
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
                    success: function (response) {
                        alert(response);
                    }
                });
            });
        });
    </script>

</body>

</html>