<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');

if ($langId == 1) {
    $admin_id = "ไอดีแอดมิน";
    $username = "ชื่อผู้ใช้";
    $password = "รหัสผ่าน";
    $employee_code = "รหัสพนักงาน";
} else {
    $admin = "Admin";
    $username = "Username";
    $password = "Password";
    $employee_code = "Employee Code";
}

?>

<style>
    .page-admin img {
    width: 100%;
    height: 300px;
    }

    .page-admin .wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .page-admin .wrap p {
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
        background:transparent;
        border: none;
        outline: none;
        border:2px solid #905537;
        border-radius: 40px;
    }

    .input-group input::placeholder {
        color: #000;
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
        margin-top: 10px;
        margin-left: 70px;
    }

    .btn:hover {
        background-color: #008000;
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

</style>


<body>
    <section class="page-admin">
        <div class="wrap">
            <img src="assets/images/banner-page.png" alt="">
            <p><?= $admin ?></p>
        </div>
        <div class="header-mid">
            <div class="wrapper">
            <form action="login_admin_db.php" method="post">
                <div class="left-inner-addon input-box">
                <i class="bi bi-person-workspace"></i>
                    <label for="admin"><?= $admin ?></label>
                    <input type="text" name="admin" placeholder="<?= $admin_id ?>">
                </div>
                <div class="left-inner-addon input-box">
                <i class="bi bi-lock-fill"></i>
                    <label for="password"><?= $password ?></label>
                    <input type="password" name="password" id="passwordInput" placeholder="<?= $password ?>">
                    <span toggle="#passwordInput" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="left-inner-addon input-box">
                <i class="bi bi-person-badge"></i>
                    <label for="employee_code"><?= $employee_code ?></label>
                    <input type="password" name="employee_code" placeholder="<?= $employee_code ?>">
                </div>
                <div class="input-box">
                    <button type="submit" name="login_admin" class="btn"><?= $login ?></button>
                </div>
            </form>
        </div>
            </div>
    </section>




</body>

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