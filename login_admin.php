<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php
include 'include/head.php';
include('server.php');

if ($langId == 1) {
    $admin = "แอดมิน";
    $username = "ชื่อผู้ใช้";
    $password = "รหัสผ่าน";
    $employee_code = "รหัสพนักงาน";
} else {
    $admin = "Admin";
    $username = "USERNAME";
    $password = "PASSWORD";
    $employee_code = "Employee Code";
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
            <h2><?= $admin ?></h2>
        </div>
        <div class="header-mid">
            <form action="login_admin_db.php" method="post">
                <div class="input-group">
                    <label for="username"><?= $username ?></label>
                    <input type="text" name="username" placeholder="<?= $username ?>">
                </div>
                <div class="input-group">
                    <label for="password"><?= $password ?></label>
                    <input type="password" name="password" placeholder="<?= $password ?>">
                </div>
                <div class="input-group">
                    <label for="employee_code"><?= $employee_code ?></label>
                    <input type="password" name="employee_code" placeholder="<?= $employee_code ?>">
                </div>
                <div class="input-group">
                    <button type="submit" name="login_admin" class="btn"><?= $login ?></button>
                </div>
            </form>
        </div>
    </div>




</body>


</html>