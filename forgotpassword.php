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
    $back = "ย้อนกลับ";
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
    $back = "Back";
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

    .input-box i {
        position: absolute;
        padding: 43.5px 15px;
        color: #905537;
        font-size: 20px;
        left: 0px;
    }

    .input-box input {
        padding-left: 35px;
        width: 100%;
        padding: 15px;
        margin-top: 5px;
        background: transparent;
        border: none;
        outline: none;
        border: 2px solid #905537;
        border-radius: 40px;
    }

    .input-group input::placeholder {
        color: #000;
    }

    .confirm-password {
        text-align: center;
    }

    .confirm-password button {
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
        color: #fff !important;
    }

    .bu-back {
        margin-left: 1%;
        margin-top: 1%;
    }

    .bu-back button {
        padding: 7px 10px;
        border: none;
        background: #ff0000cf;
        border-radius: 10px;
    }

    .bu-back button:hover {
        background: #BB0707;
        transition: 0.4s;
    }

    .field-icon {
        float: right;
        margin-left: 375px;
        margin-top: -35px;
        position: relative;

    }

    .left-inner-addon {
        position: relative;
    }

    .left-inner-addon input {
        padding-left: 50px !important; 
    }
    .wrapper .underline-forgotpw {
        border-bottom: 0.5px solid #905537;
    }
</style>

<body>
    <section class="page-forgot_pw">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $reset ?></p>
        </div>
        <div class="bu-back">
                <button id="backButton">
                    <?= $back ?>
                </button>
        </div>
        <div class="header-mid">
            <div class="wrapper">
                <form action="forgotpassword_db.php" method="post">
                    <div class="left-inner-addon input-box">
                        <i class="left-inner-addon bi bi-envelope-fill"></i>
                        <label for="email"><?= $mail ?></label>
                        <input type="text" name="email" placeholder="<?= $email ?>">
                    </div>
                    <div class="left-inner-addon input-box">
                        <i class="bi bi-person-fill"></i>
                        <label for="username"><?= $username ?></label>
                        <input type="text" name="username" placeholder="<?= $username ?>">
                    </div>
                    <div class="left-inner-addon input-box">
                        <i class="bi bi-lock-fill"></i>
                        <label for="password_1"><?= $newpassword ?></label>
                        <input type="password" id="passwordInput1" name="password_1" placeholder="<?= $password ?>">
                        <span toggle="#passwordInput1" class="fa fa-fw fa-eye field-icon toggle-password" style="cursor: pointer;"></span>
                    </div>
                    <div class="left-inner-addon input-box">
                        <i class="bi bi-shield-lock-fill"></i>
                        <label for="password_2"><?= $repassword ?></label>
                        <input type="password" id="passwordInput2" name="password_2" placeholder="<?= $password ?>">
                        <span toggle="#passwordInput2" class="fa fa-fw fa-eye field-icon toggle-password" style="cursor: pointer;"></span>
                    </div>
                    <div class="confirm-password">
                        <button type="submit" name="forgot_pw" class="btn"><?= $confirmpassword ?></button>
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

<script>
    document.getElementById('backButton').addEventListener('click', function() {
        window.location.href = 'login.php';
    });
</script>

<script>
    const passwordInput1 = document.getElementById('passwordInput1');
    const togglePassword1 = document.getElementById('togglePassword1');

    togglePassword1.addEventListener('click', function(e) {
        e.preventDefault(); // ยกเลิกการส่งฟอร์มโดยอัตโนมัติ

        if (passwordInput1.type === 'password') {
            passwordInput1.type = 'text';
        } else {
            passwordInput1.type = 'password';
        }
    });

    const passwordInput2 = document.getElementById('passwordInput2');
    const togglePassword2 = document.getElementById('togglePassword2');

    togglePassword2.addEventListener('click', function(e) {
        e.preventDefault(); // ยกเลิกการส่งฟอร์มโดยอัตโนมัติ

        if (passwordInput2.type === 'password') {
            passwordInput2.type = 'text';
        } else {
            passwordInput2.type = 'password';
        }
    });
</script>

<script>
    $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
    });
</script>

</html>