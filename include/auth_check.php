<?php
if (!isset($_SESSION['admin'])) {
    $_SESSION['msg'] = "you must login first";
    session_destroy();
}
?>
<script>
    window.location.href = '/login_admin.php';
    alert('Please login by admin id');
</script>
<?php
// header('location:login.php');
?>