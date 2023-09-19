<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');

if ($langId == 1) {
    $register = "ลงทะเบียน";
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
    .header {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 10vh;
        margin: 1;
        background-color: #DAB437B9;
    }

    .header-mid {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 51vh;
        margin: 0;
        background-color: #FFFFFFB9;
    }

    .input-group {
        margin-bottom: 10px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .input-group label {
        width: 100%;
    }

    .input-group input {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }

    .btn {
        background-color: #0066FF;
        color: white;
        padding: 10px 30px;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #1900FF;
    }
</style>

<body>
    <div>
        <div class="header">
            <h2><?= $register ?></h2>
        </div>
        <div class="header-mid">
            <form action="register_db.php" method="post">
                <div class="input-group">
                    <!-- <label for="username"><?= $username ?></label> -->
                    <input type="text" name="username" placeholder="<?= $username ?>">
                </div>
                <div class="input-group">
                    <!-- <label for="email"><?= $email ?></label> -->
                    <input type="email" name="email" placeholder="<?= $email ?>">
                </div>
                <div class="input-group">
                    <!-- <label for="password_1"><?= $password ?></label> -->
                    <input type="password" name="password_1" placeholder="<?= $password ?>">
                </div>
                <div class="input-group">
                    <!-- <label for="password_2"><?= $confirm ?></label> -->
                    <input type="password" name="password_2" placeholder="<?= $confirm ?>">
                </div>
                <div class="input-group">
                    <button type="submit" name="reg_user" class="btn"><?= $submit ?></button>
                </div>
                <div>
                    <a href="login.php"><?= $signin ?></a>
                </div>
            </form>
        </div>
    </div>

    <?php include 'include/footer.php'; ?>

</body>

<script>
    AOS.init();
</script>

</html>