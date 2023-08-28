<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php';?>

<body>

    <section class="banner-page">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p>หลักสูตรนวดไทย</p>
        </div>
    </section>

    <section class="course-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/images/detail-course.png" alt="" class="w-100">
                </div>
                <div class="col-lg-6">
                    <div class="content">
                        <div class="wrap">
                            <div class="item">
                                <div class="title" style="width:90%;">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <span>รายละเอียด :</span>
                                </div>
                                <div class="detail">
                                    <span>หลักสูตรการนวดด้วยน้ำมันหอมระเหย เป็นการนวดโดยการใช้กลิ่นเข้ามาบำบัดในการนวด เพื่อต้องการให้ผู้ถูกนวดเกิดความสมดุลของร่างกาย จิตใจ และ อารมณ์โดยการนำเอาวิธีต่างๆของการนวดมาประยุกต์ใช้ร่วมกับกลิ่นหอมที่มีอยู่ในน้ำมันหอมระเหยและลักษณะของการนวดจะเป็นการนวดเบา ไม่เน้นรีดเส้นและนวดหนักเพื่อให้ผู้ถูกนวดได้รู้สึกผ่อนคลายอย่างแท้จริง</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title">
                                    <i class="far fa-clock"></i>
                                    <span>ระยะเวลา :</span>
                                </div>
                                <div class="detail">
                                    <span>150 ชั่วโมง ( 6 วัน )</span>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title">
                                    <i class="fas fa-certificate"></i>
                                    <span>ใบประกาศนียบัตร :</span>
                                </div>
                                <div class="detail">
                                    <span>ใบประกาศนวดน้ำมัน</span>
                                </div>
                            </div>
                        </div>
                        <p class="price">ราคา 4500 บาท</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="regiscourse">
        <div class="wrap">
            <span>สนใจสมัครหรือสอบถามข้อมูลเพิ่มเติม</span>
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/images/contact-qr.png" alt="">

                </div>
                <div class="col-lg-6">
                    <div class="item"><i class="bi bi-facebook"></i><span>Bangkok Spa Academy</span></div>
                    <div class="item"><i class="bi bi-facebook"></i><span>Bangkok Spa Academy</span></div>
                    <div class="item"><i class="bi bi-facebook"></i><span>Bangkok Spa Academy</span></div>
                </div>
            </div>
        </div>
    </section>


    <?php include 'include/footer.php';?>

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

</html>