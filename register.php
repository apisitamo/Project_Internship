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
    $alredy = "มีบัญชีแล้วแล้ว ? ";
    $signin = "เข้าสู่ระบบ";
} else {
    $register = "REGISTER";
    $email = "EMAIL";
    $username = "USERNAME";
    $password = "PASSWORD";
    $confirm = "CONFIRM PASSWORD";
    $submit = "SUBMIT";
    $alredy = "ALREADY MEMBER ?";
    $signin = "SIGN IN";
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
        background-color: #6ACC6D;
        /* เปลี่ยนสีพื้นหลังปุ่ม */
        color: white;
        /* เปลี่ยนสีตัวอักษร */
        padding: 10px 30px;
        /* ปรับขนาดการเรียงกล่อง */
        border: none;
        /* ไม่แสดงเส้นขอบ */
        cursor: pointer;
        /* เปลี่ยนเคอร์เซอร์เป็นรูปแบบชี้ไป */
    }

    .btn:hover {
        background-color: #36863A;
        /* สีพื้นหลังเมื่อชี้เมาส์ไป */
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
                    <label for="username"><?= $username ?></label>
                    <input type="text" name="username">
                </div>
                <div class="input-group">
                    <label for="email"><?= $email ?></label>
                    <input type="email" name="email">
                </div>
                <div class="input-group">
                    <label for="password_1"><?= $password ?></label>
                    <input type="password" name="password_1">
                </div>
                <div class="input-group">
                    <label for="password_2"><?= $confirm ?></label>
                    <input type="password" name="password_2">
                </div>
                <div class="input-group">
                    <button type="submit" name="reg_user" class="btn"><?= $submit ?></button>
                </div>

                <p><?= $alredy ?><a href="login.php"><?= $signin ?></a></p>

            </form>
        </div>
    </div>


    <?php include 'include/footer.php'; ?>
</body>
<script>
    AOS.init();
</script>

</html>