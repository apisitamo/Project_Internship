<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<?php include 'include/head.php';



if ($langId == 1) {
    $course = "หลักสูตร";
    $nav1 = "ทั้งหมด";
    $nav2 = "สปาเพื่อสุขภาพ";
    $nav3 = "สปาเพื่อความงาม";
    $nav4 = "สปาเพื่อความงาม";
    $course1 = "หลักสูตรนวดไทย";
    $course2 = "หลักสูตรนวดน้ำมันหอมระเหย";
    $course3 = "หลักสูตรนวดสวีดิช";
    $course4 = "หลักสูตรนวดเท้า";
    $course5 = "หลักสูตรนวดหน้า";
    $course6 = "หลักสูตรสปาผิวกาย";
    $course7 = "หลักสูตรนวดสลายไขมัน";
    $course8 = "หลักสูตรนวดหินร้อนบำบัด";
    $course9 = "หลักสูตรนวดศีรษะอินเดีย";
    $course10 = "หลักสูตรครอบแก้ว";
    $price1 = "ราคา 4,500 บาท";
    $price2 = "ราคา 2,500 บาท";
    $Duration2 = "ระยะเวลา 2 วัน";
    $Duration3 = "ระยะเวลา 3 วัน";
    $Duration4 = "ระยะเวลา 4 วัน";
    $Duration5 = "ระยะเวลา 5 วัน";
} else {
    $course = "COURSE";
    $nav1 = "All";
    $nav2 = "Health Spa Course";
    $nav3 = "Beauty Spa Course";
    $nav4 = "Advanced Spa";
    $course1 = "Thai massage course";
    $course2 = "Aromatherapy massage course";
    $course3 = "Swedish massage course";
    $course4 = "Foot massage course";
    $course5 = "Facial massage course";
    $course6 = "Body Spa course";
    $course7 = "Sliming & Cellulite massage course";
    $course8 = "Hot stone massage course";
    $course9 = "Indian head massage Course";
    $course10 = "Cupping Therapy Course";
    $price1 = "Price 4,500 Baht";
    $price2 = "Price 2,500 Baht";
    $Duration2 = "Duration 2 days";
    $Duration3 = "Duration 3 days";
    $Duration4 = "Duration 4 days";
    $Duration5 = "Duration 5 days";
}
?>

<body>

    <section class="banner-page"data-aos="flip-down" data-aos-duration="2000">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $course ?></p>
        </div>
    </section>

    <section class="all-course">
        <div class="container">
            <div class="course">

                <ul class="nav nav-page"data-aos="fade-right" data-aos-duration="2000">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="allcourse.php"><?= $nav1 ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allcourse2.php"><?= $nav2 ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allcourse3.php"><?= $nav3 ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allcourse4.php"> <?= $nav4 ?></a>
                    </li>
                </ul>

                <div class="course-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=1">
                                <div class="card">
                                    <img src="assets/images/allcourse13.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course1 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration5 ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=10">
                                <div class="card">
                                    <img src="assets/images/allcourse10.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course2 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration5 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=3">
                                <div class="card">
                                    <img src="assets/images/allcourse3.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course3 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration5 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=2">
                                <div class="card">
                                    <img src="assets/images/allcourse2.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course4 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration5 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=4">
                                <div class="card">
                                    <img src="assets/images/allcourse4.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course5 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration4 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=5">
                                <div class="card">
                                    <img src="assets/images/allcourse5.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course6 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price2 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration2 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=6">
                                <div class="card">
                                    <img src="assets/images/allcourse14.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course7 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price2 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration2 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=7">
                                <div class="card">
                                    <img src="assets/images/allcourse7.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course8 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration3 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=8">
                                <div class="card">
                                    <img src="assets/images/allcourse8.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course9 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration3 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4"data-aos="flip-right" data-aos-duration="2000">
                            <a href="coursedetail.php?id=9">
                                <div class="card">
                                    <img src="assets/images/allcourse15.png" class="card-img-top">
                                    <div class="card-body">
                                        <span class="title"><?= $course10 ?></span>
                                        <div class="price">
                                            <span><i class="fa-regular fa-money-bill"></i><?= $price1 ?></span>
                                            <span><i class="fa-regular fa-clock"></i><?= $Duration3 ?></< /span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php include 'include/footer.php'; ?>

</body>

<script>
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
</script>
<script>
  AOS.init();
</script>
</html>