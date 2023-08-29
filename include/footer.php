<?php
if($langId == 1){
    $address = "ที่อยู่";
    $address1 = "124 ซอยลาดพร้าว 64 แยก 1";
    $address2 = "แขวงวังทองหลาง เขตวังทองหลาง";
    $address3 = "กรุงเทพมหานคร 10310";
    $contact = "ติดต่อสอบถาม";
    $followus = "ติดตามเรา";

}else{
    $address = "ADDRESS";
    $address1 = "124 Soi Ladprao 64 Lane 1,";
    $address2 = "Wangtonglang, Wangtonglang,";
    $address3 = "Bangkok 10310";
    $contact = "CONTACT US";
    $followus = "STAY CONNECTED";

}
?>

<footer class="footer">
        <div class="container m-auto">
            <div class="row">
                <div class="logo-footer col-lg-3 col-md-6 col-sm-12 mb-3">
                    <div class="footer-center">
                        <img src="assets/images/logo-bsa.png">
                    </div>
                    <u class="footer-title-logo">
                        <p>สถาบันวิชาชีพสปา กรุงเทพ</p>
                    </u>
                    <i class="footer-detail-logo">
                        <p>“ภูมิปัญญาไทย มาตรฐานสากล”</p>
                    </i>
                </div>
                <div class="footer-address col-lg-3 col-md-6 col-sm-12 mb-3">
                    <div class="wrap">
                        <h4 class="footer-title"><?=$address?></h4>
                        <p class="footer-detail"><?=$address1?></p>
                        <p class="footer-detail"><?=$address2?></p>
                        <p class="footer-detail"><?=$address3?></p>
                    </div>
                </div>
                <div class="footer-service col-lg-3 col-md-6 col-sm-12 mb-3">
                    <div class="wrap">
                        <h4 class="footer-title"><?=$contact?></h4>
                        <p class="footer-detail"><span class="pre-detail"><i class="bi bi-telephone-fill"></i> </span> 086-322-1922 </p>
                        <p class="footer-detail"><span class="pre-detail"><i class="bi bi-envelope-fill"></i> </span><a href="mailto:nadia13th@hotmail.com?subject=หัวข้อเรื่อง"> nadia13th@hotmail.com</a></p>
                    </div>
                </div>
                <div class="footer-followus col-lg-3 col-md-6 col-sm-12 mb-3">
                    <div class="wrap">
                        <h4 class="footer-title"><?=$followus?></h4>
                        <div class="group-icon">
                            <a href="https://th-th.facebook.com/BSABangkok/" class="icon" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="https://line.me/ti/p/~@108toots" class="icon" target="_blank"><i class="bi bi-line"></i></a>
                            <a href="https://www.youtube.com/channel/UCYaxWe0tJ0N6WX6pMyqyAbA" class="icon" target="_blank"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>