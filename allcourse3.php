<!DOCTYPE html>
<html lang="en">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<?php include 'include/head.php';
include('server.php');


if ($langId == 1) {
    $course = "หลักสูตร";
    $nav1 = "ทั้งหมด";
    $nav2 = "สปาเพื่อสุขภาพ";
    $nav3 = "สปาเพื่อความงาม";
    $nav4 = "สปาขั้นสูง";
    $days = 'วัน';
    $prices = 'ราคา';
    $baht = 'บาท';
    $duration = 'ระยะเวลา :';
} else {
    $course = "COURSE";
    $nav1 = "All";
    $nav2 = "Health Spa Course";
    $nav3 = "Beauty Spa Course";
    $nav4 = "Advanced Spa";
    $days = 'Days';
    $prices = 'Price';
    $baht = 'Baht';
    $duration = 'Duration :';
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
                        <a class="nav-link " aria-current="page" href="allcourse.php"><?= $nav1 ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allcourse2.php"><?= $nav2 ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="allcourse3.php"><?= $nav3 ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="allcourse4.php"> <?= $nav4 ?></a>
                    </li>
                </ul>

                <div class="course-content">
                    <div class="row">

                        <?php
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = "SELECT * FROM `add_course` WHERE `type`= 'Beauty Spa Course' ORDER BY id DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="flip-right" data-aos-duration="2000">
                                    <a href="allcoursedetail.php?course_id=<?php echo $row['id']; ?>">
                                        <div class="card">
                                            <img src="<?php echo $row['img']; ?>" class="card-img-top">
                                            <div class="card-body">
                                                <?php if ($langId == 1) { ?>
                                                    <span class="title">
                                                        <?php echo $row['name_th']; ?>
                                                    </span>
                                                <?php } else { ?>
                                                    <span class="title">
                                                        <?php echo $row['name_eng']; ?>
                                                    </span>
                                                <?php } ?>
                                                <div class="price">
                                                    <span><i class="fa-regular fa-money-bill"></i> <?= $prices ?> <?php echo $row['price']; ?> <?= $baht ?> </span>
                                                    <span><i class="fa-regular fa-clock"></i> <?= $duration ?> <?php echo $row['day']; ?> <?= $days ?> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
                        } else {
                            echo "ไม่พบหลักสูตรในระบบ";
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