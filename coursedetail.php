<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php include 'include/head.php'; ?>

<?php include 'alldetail.php';
if ($langId == 1) {
    $detail = 'รายละเอียด :';
    $duration = 'ระยะเวลา :';
    $certificate = 'ใบประกาศนียบัตร :';
    $other = 'สนใจสมัครหรือสอบถามข้อมูลเพิ่มเติม';
} else {
    $detail = 'Detail :';
    $duration = 'Duration :';
    $certificate = 'Certificate :';
    $other = 'Interested in applying or asking for more information.';
}
?>

<style>

</style>

<!DOCTYPE html>
<html lang="en">


<body>

    <section class="banner-page" data-aos="flip-down" data-aos-duration="2000">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $model['title'] ?></p>
        </div>
    </section>

    <section class="course-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="2000">
                    <img src="<?= $model['img'] ?>" alt="" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        <div class="wrap">
                            <div class="item">
                                <div class="title" style="width:110%;" data-aos="zoom-in" data-aos-duration="2000">
                                    <img src="assets/images/icon-chat.png">
                                    <span><?= $detail ?></span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <span><?= $model['detail'] ?></span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title" data-aos="zoom-in" data-aos-duration="2000">
                                    <img src="assets/images/icon-time.png">
                                    <span><?= $duration ?></span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <span><?= $model['date'] ?></span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title" data-aos="zoom-in" data-aos-duration="2000">
                                    <img src="assets/images/icon11.png">
                                    <span><?= $certificate ?></span>
                                </div>
                                <div class="detail" data-aos="zoom-in" data-aos-duration="2000">
                                    <span><?= $model['certificate'] ?></span>
                                </div>
                            </div>
                        </div>
                        <button class="open-popup-button">
                            <p class="price" data-aos="fade-up" data-aos-duration="2000"><?= $model['price'] ?></p>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="regiscourse">
        <div class="wrap">
            <span class="title" data-aos="fade-up" data-aos-duration="2000"><?= $other ?></span>
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

    <!-- เป็นส่วนของ popup ตอนเด้งขึ้นมา-->
  

    <?php include 'include/footer.php'; ?>

</body>


<script>
    AOS.init();
</script>

</html>