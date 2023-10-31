<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<?php include 'include/head.php';


if ($langId == 1) {
    $course = "หลักสูตรที่เปิดสอน";
    $detail1 = "สปาเพื่อสุขภาพ";
    $detail2 = "สปาเพื่อความงาม";
    $detail3 = "สปาขั้นสูง";
    $allcourse = "หลักสูตรทั้งหมด";
    $click = "สนใจเรียนคอร์สออนไลน์คลิ๊ก!";
    $reviwe = "ความคิดเห็นจากผู้เรียน";
} else {
    $course = "COURSE";
    $detail1 = "Health Spa Course";
    $detail2 = "Beauty Spa Course";
    $detail3 = "Advanced Spa";
    $allcourse = "All courses";
    $click = "สนใจเรียนคอร์สออนไลน์คลิ๊ก!";
    $reviwe = "REVIEW";
}
?>

<body>
    <section class="link-click" data-aos="zoom-out-right" data-aos-duration="2000">
        <div class="wrap">
            <div class="head">
                <p>Click</p>
            </div>
            <a href="https://line.me/ti/p/~@108toots" class="first" target="_blank">
                <img src="assets/images/lineclick.png" alt="">
            </a>
            <a href="https://www.youtube.com/channel/UCYaxWe0tJ0N6WX6pMyqyAbA" target="_blank">
                <img src="assets/images/youtube.png" alt="">
            </a>
            <a href="https://th-th.facebook.com/BSABangkok/" target="_blank">
                <img src="assets/images/facebookk.png" alt="">
            </a>
        </div>
    </section>

    <section class="carousel" data-aos="fade-up" data-aos-duration="2000">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/banner-cover.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/banner-cover.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/banner-cover.png" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="video-index d-flex justify-content-center">
        <div class="position-relative overflow-hidden my-5 scroll-element js-scroll fade-in-bottom">
            <video width="100%" height="100%" loop autoplay muted controls id="vid">
                <source type="video/mp4" src="assets/video/videoindex.mp4">
                </source>
                <source type="video/ogg" src="assets/video/videoindex.ogg">
                </source>
            </video>
        </div>
    </section>

    <div class="promotion-new">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/images/promotionnew.png" class="d-block w-100 scroll-element js-scroll fade-in-bottom">
                </div>
                <div class="col-lg-6">
                    <div class="wrap position-relative">

                        <div class="position-absolute promotion-new-component1 scroll-element js-scroll slide-left">
                            <div class="position-relative">
                                <img class="promotion-new-img1" src="./assets/images/promotion-new-img1.svg" alt="">
                                <img class="promotion-new-imgback1" src="./assets/images/promotion-new-imgback1.svg" alt="">
                            </div>
                        </div>

                        <div class="position-absolute promotion-new-component2 scroll-element js-scroll slide-right">
                            <div class="position-relative">
                                <img class="promotion-new-img2" src="./assets/images/promotion-new-img2.svg" alt="">
                                <img class="promotion-new-imgback2" src="./assets/images/promotion-new-imgback2.svg" alt="">
                            </div>
                        </div>

                        <div class="position-absolute promotion-new-component3 scroll-element js-scroll slide-left">
                            <div class="position-relative">
                                <img class="promotion-new-img3" src="./assets/images/promotion-new-img3.svg" alt="">
                                <img class="promotion-new-imgback3" src="./assets/images/promotion-new-imgback3.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <section class="promotion">
        <div class="container">
            <div class="title-sec">
                <p>โปรโมชั่น</p>
                <div class="border-line-title"></div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <img src="assets/images/promo1.png" class="w-100">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <img src="assets/images/promo2.png" class="w-100">
                </div>
            </div>
    </section> -->

    <section class="course" data-aos="fade-right" data-aos-duration="2000">
        <div class="container">

            <div class="title-sec">
                <p><?= $course ?></p>
                <div class="border-line-title"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <a href="allcourse2.php">
                        <div class="card">
                            <img src="assets/images/allcourse-1.png" class="card-img-top" data-aos="flip-left" data-aos-duration="2000">
                            <div class="card-body">
                                <span class="title"><?= $detail1 ?></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <a href="allcourse3.php">
                        <div class="card">
                            <img src="assets/images/allcourse-6.png" class="card-img-top" data-aos="flip-up" data-aos-duration="2000">
                            <div class="card-body">
                                <span class="title"><?= $detail2 ?></span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <a href="allcourse4.php">
                        <div class="card">
                            <img src="assets/images/allcourse-9.png" class="card-img-top" data-aos="flip-right" data-aos-duration="2000">
                            <div class="card-body">
                                <span class="title"><?= $detail3 ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4  ">
                <div class="link">
                    <a href="allcourse.php" type="button" class="btn-all" data-aos="zoom-out-right" data-aos-duration="2000"><?= $allcourse ?></a>
                </div>
            </div>

        </div>
    </section>

    <section class="course-index" data-aos="fade-right" data-aos-duration="2000">
        <div class="wrap">
            <img src="assets/images/course-index1.png" class="card-img-top img-course col-6">
            <div class="link d-flex flex-column align-items-center">
                <span class="fs-1 text-online-course fw-bolder mt-2">Online Course</span>
                <div class="d-flex align-items-center justify-content-center w-100 mb-5">
                    <img width="5%" src="./assets/images/star-course-online.svg" alt="">
                    <span class="fs-2 mx-3 fw-bold">หลักสูตรการนวดด้วยน้ำมันหอมระเหย</span>
                    <img width="5%" src="./assets/images/star-course-online.svg" alt="">
                </div>
                <div class="d-flex align-items-center justify-content-evenly w-100 mb-3 col-6 row" data-aos="fade-up-right" data-aos-duration="2000">
                    <div class="d-flex flex-column align-items-center col-4">
                        <img width="60%" class="mb-2" src="./assets/images/online-course1.svg" alt="">
                        <span>เรียนจบแล้ว</span>
                        <span>สามารถกลับมาทบทวนซ้ำได้ฟรี</span>
                    </div>
                    <div class="d-flex flex-column align-items-center col-4">
                        <img width="50%" class="" src="./assets/images/online-course2.svg" alt="">
                        <span>เนื้อหาทั้งหมด 9 วิดีโอ</span>
                        <span>ความยาวรวมกัน 1 ชั่วโมง 8 นาที</span>
                    </div>
                    <div class="d-flex flex-column align-items-center col-4">
                        <img width="60%" class="mb-2" src="./assets/images/online-course3.svg" alt="">
                        <span>สอนการนวดด้วยน้ำมันหอมระเหย</span>
                        <span>อย่างถูกต้อง</span>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-evenly w-100 mb-3 row" data-aos="fade-up-left" data-aos-duration="2000">
                    <div class="d-flex flex-column align-items-center col-4">
                        <img width="50%" class="mb-2" src="./assets/images/online-course4.svg" alt="">
                        <span>นำเทคนิคการดูแลลูกค้าการเตรียม</span>
                        <span>งานและอุปกรณ์ไปใช้งานได้จริง</span>
                    </div>
                    <div class="d-flex flex-column align-items-center col-4">
                        <img width="50%" class="mb-2" src="./assets/images/online-course5.svg" alt="">
                        <span>สามารถมาสอบเพื่อรับใบ</span>
                        <span>ประกาศนียบัตรจากสถาบันได้</span>
                    </div>
                </div>
                <a href="https://www.skilllane.com/courses/oil-massage?fbclid=IwAR1fL82PP6TMEcUmHkNMKFNt9lmf1CWL5ts5gL5wZ7Sakclo69mAScMzx9E" type="button" class="btn-all" data-aos="zoom-out-right" data-aos-duration="2000"><?= $click ?></a>
            </div>
        </div>
    </section>

    <section class="video-link" data-aos="fade-right" data-aos-duration="2000">
        <div class="container">
            <div class="wrap">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3" data-aos="fade-right" data-aos-duration="2000">
                        <div class="card">
                            <div class="wrap-page">
                                <img src="assets/images/pic5.png" class="card-img-top" alt="...">
                                <div class="profile">
                                    <div class="profile-img">
                                        <img src="assets/images/logo-bsa-2.png" alt="" class="w-100">
                                    </div>
                                    <div class="profile-detail">
                                        <div class="name">สถาบันวิชาชีพสปา กรุงเทพ</div>
                                        <div class="like">10,000 Like</div>
                                    </div>
                                </div>
                                <a href="https://th-th.facebook.com/BSABangkok/" class="btn btn-gotopage"><i class="bi bi-facebook"></i>Go to page</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3" data-aos="fade-up" data-aos-duration="2000">
                        <!-- <video width="100%" height="100%" controls="">
                        <source src="https://www.youtube.com/embed/fXXPVdDDPM8">
                    </video> -->
                        <iframe width="100%" height="400px" src="https://www.youtube.com/embed/DWCG8oUaJDA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="comment" data-aos="fade-right" data-aos-duration="2000">
        <div class="container">

            <div class="title-sec">
                <p><?= $reviwe ?></p>
                <div class="border-line-title"></div>
            </div>

            <div class="few">
                <div class="wrap">
                    <div class="splide" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="card card-course" data-aos="flip-left" data-aos-duration="2000">
                                        <div class="img">
                                            <img src="assets/images/comment.png" class="card-img-top">
                                            <div class="boxcs">”</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                            </div>
                                            <p>โรงเรียนสะอาด บรรยากาศเป็นกันเอง โรงเรียนสอนดี เวลามีคำถาม สงสัย หรือแค่เราตามไม่ทัน ครูก็คอยมาสอนมาแนะนำตลอด คุณครูเอาใจใส่มากเลยค่ะ ถ้าใครอยากเรียนนวดเอาไปทำงานในไทย
                                                หรือต่างประเทศ แนะนำโรงเรียนนี้เลย สอนดีมากกกก</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="card card-course" data-aos="flip-right" data-aos-duration="2000">
                                        <div class="img">
                                            <img src="assets/images/comment3.png" class="card-img-top">
                                            <div class="boxcs">”</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <p>อาจารย์สอนดี เข้าใจง่ายมากครับ สถานที่เดินทางง่าย เดี๋ยวจะแนะนำเพื่อนมาครับ</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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

    const scrollElements = document.querySelectorAll(".js-scroll");

    const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;

        return (
            elementTop <=
            (window.innerHeight || document.documentElement.clientHeight) / dividend
        );
    };

    const elementOutofView = (el) => {
        const elementTop = el.getBoundingClientRect().top;

        return (
            elementTop > (window.innerHeight || document.documentElement.clientHeight)
        );
    };

    const displayScrollElement = (element) => {
        element.classList.add("scrolled");
    };

    const hideScrollElement = (element) => {
        element.classList.remove("scrolled");
    };

    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.25)) {
                displayScrollElement(el);
            } else if (elementOutofView(el)) {
                hideScrollElement(el)
            }
        })
    }

    window.addEventListener("scroll", () => {
        handleScrollAnimation();
    });
</script>

<script>
    document.getElementById('video')?.play();
</script>

<!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v15.0" nonce="hVkbERF9"></script> -->

<script>
    AOS.init();
</script>

</html>