<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');

if ($langId == 1) {
    $register = "ลงทะเบียนผู้ใช้";
    $email = "อีเมลล์";
    $username = "ชื่อผู้ใช้";
    $password = "รหัสผ่าน";
    $confirm = "ยืนยันรหัสผ่าน";
    $submit = "ส่ง";
    // $alredy = "มีบัญชีแล้วแล้ว ? ";
    $signin = "เข้าสู่ระบบ";
} else {
    $register = "Register";
    $email = "Email";
    $username = "Username";
    $password = "Password";
    $confirm = "Confirm Password";
    $submit = "Submit";
    // $alredy = "ALREADY MEMBER ?";
    $signin = "Sign In";
}
?>

<style>
    .banner-page-regis img {
        width: 100%;
        height: 300px;
    }

    .banner-page-regis .wrap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .banner-page-regis .wrap p {
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
        text-align: center;
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
        right: 20px;
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

    .wrapper .btn {
        width: 65%;
        height: 45px;
        background-color: #6ACC6D;
        color: #fff;
        padding: 10px 10px;
        border: none;
        cursor: pointer;
        outline: none;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .1);
        margin-top: 10px;
        margin-left: 75px;
    }

    .btn:hover {
        background-color: #008000;
    }

    .header-mid .signin a:link,
    .a:visited {
        width: 65%;
        height: 45px;
        background-color: #C19A6B;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border-radius: 40px;
        margin-top: -20px;
        color: #fff;
    }

    .signin a:hover {
        background-color: #905537;
        color: #fff !important;
    }

    .iconeye1 img{
        width: 25px;
        height: 25px;
    }
    .iconeye2 img{
        width: 25px;
        height: 25px;
    }
</style>

<body>
    <section class="banner-page-regis">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $register ?></p>
        </div>
        <div class="header-mid">
            <div class="wrapper">
                <form action="register_db.php" method="post">
                    <div class="input-box">
                        <i class="bi bi-person-fill"></i>
                        <label for="username"><?= $username ?></label>
                        <input type="text" name="username" placeholder="<?= $username ?>">
                    </div>
                    <div class="input-box">
                        <i class="bi bi-envelope-fill"></i>
                        <label for="email"><?= $email ?></label>
                        <input type="email" name="email" placeholder="<?= $email ?>">
                    </div>
                    <div class="input-box">
                        <i class="bi bi-lock-fill"></i>
                        <label for="password_1"><?= $password ?></label>
                        <input type="password" id="passwordInput1" name="password_1" placeholder="<?= $password ?>">
                        <button class="iconeye1" id="togglePassword1">
                            <img src="assets/images/showpass.png" alt="">
                        </button>
                    </div>
                    <div class="input-box">
                        <i class="bi bi-shield-lock-fill"></i>
                        <label for="password_2"><?= $confirm ?></label>
                        <input type="password" id="passwordInput2" name="password_2" placeholder="<?= $confirm ?>">
                        <button class="iconeye2" id="togglePassword2">
                            <img src="assets/images/showpass.png" alt="">
                        </button>
                    </div>
                    <div class="input-box">
                        <button type="submit" name="reg_user" class="btn"><?= $submit ?></button>
                    </div>
                </form>
                <div class="signin">
                    <a href="login.php"><?= $signin ?></a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'include/footer.php'; ?>

</body>

<script>
    AOS.init();
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

</html>