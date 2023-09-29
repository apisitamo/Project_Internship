<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');

if ($langId == 1) {
    $username = "ชื่อผู้ใช้";
    $password = "รหัสผ่าน";
    $email = "อีเมลล์";
    $mail = "กรุณาระบุอีเมลของคุณ";
    $newpassword = "กรุณระบุรหัสผ่านอันใหม่";
    $repassword = "กรุณาระบุรหัสผ่านอันใหม่อีกครั้ง";
    $confirmpassword = "ยืนยันรหัสผ่านที่คุณตั้งใหม่";
    $forgot = "ลืมรหัสผ่าน?";
    $reset = "รีเซ็ตรหัสผ่าน";
    
} else {
    $username = "Username";
    $password = "Password";
    $email = "E-mail";
    $mail = "Please Input Your E-mail";
    $newpassword = "Please input your new password";
    $repassword = "Please input your new password again";
    $confirmpassword = "Confirm your new password";
    $forgot = "Forgot password?";
    $reset = "Reset password";
}

?>

<style>
    .page-forgot_pw img {
        width: 100%;
        height: 300px;
    }

    .page-forgot_pw .wrap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page-forgot_pw .wrap p {
        position: absolute;
        color: #945834;
        font-size: 46px;
        font-weight: bold;
        margin: 0;
    }

    .header-mid {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 75vh;
        margin: 0;
        background-color: #FFFFFFB9;
    }

    .wrapper {
        width: 420px;
    }

    .wrapper .input-box {
        width: 100%;
        height: 70px;
        background: #FFFFFFB9;
        margin: 30px 0;
        position: relative;
        font-size: 15px;
        color: #905537;
        font-weight: 700;

    }
    .input-box {
        margin-bottom: 10px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .input-box i{
        position: absolute;
        padding: 46.5px 15px;
        color:#905537;
        font-size: 20px;
        right: 20px;
    }

    .input-box input {
        padding-left: 35px;
        width: 100%;
        padding: 15px;
        margin-top: 5px;
        background:transparent;
        border: none;
        outline: none;
        border:2px solid #905537;
        border-radius: 40px;
    }

    .input-group input::placeholder {
        color: #000;
    }

    .confirm-password {
        text-align: center;
    }
    .confirm-password button{
        width: 65%;
        height: 45px;
        background-color: #6ACC6D;
        padding: 10px;
        color: #fff;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 40px;
        margin-top: 15px;
    }

    .confirm-password button:hover {
        background-color: #008000;
        color:#fff !important;
    }


</style>

<body>
    <section class="page-forgot_pw">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $reset ?></p>
        </div>
        <div class="header-mid">
            <div class="wrapper">
                <form action="forgotpassword_db.php" method="post">
                    <div class="input-box">
                        <i class="bi bi-envelope-fill"></i>
                        <label for="email"><?= $mail ?></label>
                        <input type="text" name="email" placeholder="<?= $email ?>">
                    </div>
                    <div class="input-box">
                    <i class="bi bi-person-fill"></i>
                        <label for="username"><?= $username ?></label>
                        <input type="text" name="username" placeholder="<?= $username ?>">
                    </div>
                    <div class="input-box">
                    <i class="bi bi-lock-fill"></i>
                        <label for="password_1"><?= $newpassword ?></label>
                        <input type="password" name="password_1" placeholder="<?= $password ?>">
                    </div>
                    <div class="input-box">
                    <i class="bi bi-shield-lock-fill"></i>
                        <label for="password_2"><?= $repassword ?></label>
                        <input type="password" name="password_2" placeholder="<?= $password ?>">
                    </div>
                    <div class="confirm-password">
                        <button type="submit" name="forgot_pw" class="btn" ><?= $confirmpassword ?></button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <?php include 'include/footer.php'; ?>

</body>

<script>
    AOS.init();
</script>

</html>