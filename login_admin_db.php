<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['login_admin'])) {
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $employee_code = mysqli_real_escape_string($conn, $_POST['employee_code']);

    if (empty($admin)) {
        array_push($errors, "admin is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($employee_code)) {
        array_push($errors, "Employee code is required");
    }

    if (count($errors) == 0) {
        $password = ($password);
        $query = "SELECT * FROM admin WHERE admin = '$admin' AND password = '$password' AND employee_code = '$employee_code' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['admin'] = $admin;
            $_SESSION['success'] = "You are now logged in";
            header("location: calendar_admin.php");
            exit();
        } else {
            array_push($errors, "Wrong data");
            $_SESSION['error'] = "Try again";

            echo "<script>
                    alert('Wrong data. Please try again.');
                    window.location.href = 'login_admin.php';
                  </script>";
            exit();
        }
    } else {
        $_SESSION['error'] = "Please fill input";

        echo "<script>
                alert('Please fill input.');
                window.location.href = 'login_admin.php';
              </script>";
        exit();
    }
}
?>
