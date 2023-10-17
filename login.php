<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');

if ($langId == 1) {
    $login = "เข้าสู่ระบบ";
    $username = "ชื่อผู้ใช้";
    $password = "รหัสผ่าน";
    $remem = " จดจำฉันไว้";
    $member = "มีบัญชีแล้วหรือยัง? ";
    $signup = "ลงทะเบียน";
    $forgot = "ลืมรหัสผ่าน?";
} else {
    $login = "Login";
    $username = "Username";
    $password = "Password";
    $remem = " Remember me";
    $member = "Doesn't have member? ";
    $signup = "Sign up";
    $forgot = "Forgot password?";
}

?>

<style>
    .page-login img {
        width: 100%;
        height: 300px;
    }

    .page-login .wrap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page-login .wrap p {
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

    .wrapper,
    .underline-forgot,
    .forgot-pw,
    .btn {
        width: 420px;
        text-align: center;
        margin-top: 15px;
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

    .wrapper .btn2 {
        width: 65%;
        height: 45px;
        background-color: #C4A484;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        margin-top: 15px;
    }

    .wrapper .btn {
        width: 65%;
        height: 45px;
        background-color: #6ACC6D;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    }

    .wrapper .forgot-pw {
        color: #905537;
    }

    .wrapper .underline-forgot {
        border-bottom: 0.5px solid #905537;
    }

    .btn:hover {
        background-color: #008000;
    }

    .btn2:hover {
        background-color: #945834;
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

    .error {
        width: 95%;
        margin: 0 auto;
        padding: 10px;
        border: 5px solid #945834;
        color: red;
        background: #FFF6E7;
        border-radius: 60px;
        text-align: center;
    }

</style>

<body>
    <section class="page-login">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $login ?></p>
        </div>
        <div class="header-mid">
            <div class="wrapper">
                <?php include('errors.php'); ?>
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3 style="font-size: 25px;font-weight: bold;">
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
                <form action="login_db.php" method="post">
                    <div class="left-inner-addon input-box">
                        <i class="bi bi-person-fill"></i>
                        <label for="username"><?= $username ?></label>
                        <input type="text" name="username" placeholder="<?= $username ?>">
                    </div>
                    <div class="left-inner-addon input-box">
                        <i class="bi bi-lock-fill"></i>
                        <label for="password"><?= $password ?></label>
                        <input type="password" id="passwordInput" name="password" placeholder="<?= $password ?>">
                        <span toggle="#passwordInput" class="fa fa-fw fa-eye-slash field-icon toggle-password" style="cursor: pointer;"></span>
                    </div>
                    <button type="submit" name="login_user" class="btn"><?= $login ?></button>
                </form>
                <div class="forgot-pw">
                    <a href="forgotpassword.php"><?= $forgot ?></a>
                </div>
                <div class="underline-forgot"></div>
                <button type="button" onclick="location.href='register.php'" class="btn2"><?= $signup ?></button>
            </div>
        </div>
    </section>


    <?php include 'include/footer.php'; ?>

</body>

<script>
    AOS.init();
</script>

<script>
    const passwordInput = document.getElementById('passwordInput');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function(e) {
        e.preventDefault(); // ยกเลิกการส่งฟอร์มโดยอัตโนมัติ

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
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