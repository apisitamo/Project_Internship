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
    $home = 'หน้าเเรก';
    $aboutus = 'เกี่ยวกับเรา';
    $allcourse = 'หลักสูตร';
    $product7 = 'ผลิตภัณฑ์สปา';
    $gallery = 'แกลเลอรี';
    $contactus = 'ติดต่อเรา';
    $login = 'เข้าสู่ระบบ';
    $logout = 'ออกจากระบบ';
    $register = 'สมัครสมาชิก';
    $user = 'ข้อมูลผู้ใช้งาน';
    $admin='แอดมินเท่านั้น';
} else {
    $_SESSION['lang'] = 2;
    $flag = 'enflag.png';
    $profile = 'profile.png';
    $langId = 2;
    $home = 'Home';
    $aboutus = 'About us';
    $allcourse = 'Course';
    $product7 = 'Product';
    $gallery = 'Gallery';
    $contactus = 'Contact us ';
    $login = 'Login';
    $logout = 'Logout';
    $register = 'Register';
    $user = 'User Detail';
    $admin='For Admin';
}

// if (!isset($_SESSION['username'])) {
//     $_SESSION['msg'] = "you must login first";
//     header('location:login.php');
//     session_destroy();
// }

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

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
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo.png" alt="" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php"><?= $home ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php"><?= $aboutus ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="allcourse.php"><?= $allcourse ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php"><?= $product7 ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="gallery.php"><?= $gallery ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php"><?= $contactus ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/images/<?= $profile ?>" alt="" class='profile-icon'>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="user.php"><?= $user ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?logout='1'"><?= $logout ?></a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><?= $login ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php"><?= $register ?></a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-admin" href="login_admin.php"><?= $admin ?></a>
                            </li>
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