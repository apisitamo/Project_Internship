<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');

if ($langId == 1) {
    $login = "เข้าสู่ระบบ";
    $username = "ชื่อผู้ใช้";
    $password = "รหัสผ่าน";
    $notyet = "มีบัญชีแล้วหรือยัง ? ";
    $signup = "ลงทะเบียน";
} else {
    $login = "LOGIN";
    $username = "USERNAME";
    $password = "PASSWORD";
    $notyet = "NOTYET MEMBER ?";
    $signup = "SIGN UP";
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
        padding: 10px 10px;
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
            <h2><?= $login ?></h2>
        </div>
        <div class="header-mid">
            <form action="login_db.php" method="post">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="error">
                        <h3>
                            <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
                <div class="input-group">
                    <label for="username"><?= $username ?></label>
                    <input type="text" name="username">
                </div>
                <div class="input-group">
                    <label for="password"><?= $password ?></label>
                    <input type="password" name="password">
                </div>
                <div class="input-group">
                    <button type="submit" name="login_user" class="btn"><?= $login ?></button>
                </div>
                <p><?= $notyet ?>
                    <a href="register.php" ><?= $signup ?></a>
                </p>
            </form>
        </div>
    </div>



    <?php include 'include/footer.php'; ?>
</body>
<script>
    AOS.init();
</script>

</html>