<?php
session_start();


if (!empty($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang'];
}

if (empty($_SESSION['lang']) || $_SESSION['lang'] == 1) {
    $_SESSION['lang'] = 1;
    $flag = 'thflag.png';
    $profile = 'profile.png';
    $langId = 1;
    $login = 'เข้าสู่ระบบ';
    $admin = 'แอดมินเท่านั้น';
    $logout = 'ออกจากระบบ';
    $add_product = 'เพิ่มผลิตภัณฑ์';
    $add_course = 'เพิ่มหลักสูตร';
    $add_gallery = 'เพิ่มแกลลอรี่';
    $product_order = 'คำสั่งซื้อผลิตภัณฑ์';
    $course_order = 'คำสั่งซื้อหลักสูตร';
    
} else {
    $_SESSION['lang'] = 2;
    $flag = 'enflag.png';
    $profile = 'profile.png';
    $langId = 2;
    $login = 'Login';
    $admin = 'For admin';
    $logout = 'Logout';
    $add_product = 'Add product';
    $add_course = 'Add course';
    $add_gallery = 'Add gallery';
    $product_order = 'Product Order';
    $course_order = 'Course Order';
    
}

// if (!isset($_SESSION['admin'])) {
//     echo "<script>alert('please login by admin id'); window.location.href = 'login_admin.php';</script>";
//     session_destroy();
// }
// บังคับ ล็อคอินด้วยแอดมินก่อน ถึงเข้า หน้าของแอดมินได้

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin']);
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="assets/images/BSA.png">

    <link rel="stylesheet" href="assets/style.css">

    <link rel="stylesheet" href="assets/bootstrap5.0.2/css/bootstrap.min.css">

    <link href="assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="assets/fontawesome/css/solid.css" rel="stylesheet">


    <link href="assets/splide-4/dist/css/splide.min.css" rel="stylesheet">

    <script src="assets/splide-4/dist/js/splide.min.js"></script>
    <script src="assets/bootstrap5.0.2/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="assets/bootstrap5.0.2/js/bootstrap.min.js"></script> -->

</head>

<section class="navbar-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="">
            <img src="assets/images/logo.png" alt="" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="add_course.php"><?= $add_course  ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="add_product.php"><?= $add_product ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="add_gallery.php"><?= $add_gallery ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="course_order.php"><?= $course_order ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="product_order.php"><?= $product_order ?></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/images/<?= $profile ?>" alt="" class='profile-icon'>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <?php if (isset($_SESSION['admin'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?logout='1'"><?= $logout ?></a>
                            </li>
                        <?php } else { ?>

                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/images/<?= $flag ?>" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" onclick="changeLng(1)">
                                <img src="assets/images/thflag.png" alt="">
                                <h10>TH</h10>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" onclick="changeLng(2)">
                                <img src="assets/images/enflag.png" alt="">
                                <h10>ENG</h10>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    function changeLng(id) {
        $.post("", {
                lang: id,
            },
            function(data, status) {
                location.reload();
            });
    }
</script>