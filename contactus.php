<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php include 'include/head.php';

if($langId == 1){
    $contact = "ติดต่อเรา";
    $contact1 = "124 ซอยลาดพร้าว 64 แยก 1 แขวงวังทองหลาง <br>เขตวังทองหลาง กรุงเทพมหานคร 10310";
    $contact3 = "ติดต่อสอบถาม";
}else{
    $contact ="Contact us";
    $contact1 = "124 Soi Ladprao 64 Lane 1, Wangtonglang, Wangtonglang, Bangkok 10310";
    $contact3 = "Contact us";
}
?>

<body>

    <section class="banner-page"data-aos="flip-down" data-aos-duration="2000">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $contact?></p>
        </div>
    </section>

    <section class="contact-us"data-aos="fade-up" data-aos-duration="2000">
        <div class="container">
            <div class="address">
                <img src="assets/images/map.png">
                <p class="mt-4 fs-5"><?= $contact1?></p>
            </div>
            <div class="contact">
                <div class="wrap">
                    <div class="title">
                        <p><?= $contact3?></p>
                    </div>
                    <div class="border-line-title"></div>
                </div>
                <div class="d-flex">
                    <div class="group">
                        <img src="assets/images/tele.png">
                        <span>086-322-1922</span>
                    </div>
                    <div class="group">
                        <img src="assets/images/mail.png">
                        <span>nadia13th@hotmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map"data-aos="fade-up" data-aos-duration="2000">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15499.275780627077!2d100.58405172794672!3d13.789785595164938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ddd2d450949%3A0xb87b0ecec2114141!2zQmFuZ2tvayBTcGEgQWNhZGVteSAtIOC4quC4luC4suC4muC4seC4meC4p-C4tOC4iuC4suC4iuC4teC4nuC4quC4m-C4suC4geC4o-C4uOC4h-C5gOC4l-C4ng!5e0!3m2!1sth!2sth!4v1667979062012!5m2!1sth!2sth" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>


    <?php include 'include/footer.php';?>
</body>
<script>
  AOS.init();
</script>
</html>