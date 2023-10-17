<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if (empty($username) && empty($password_2) && empty($email) && empty($password_1)) {
        array_push($errors, "Please fill input.");
    }
    elseif (empty($username)) {
        array_push($errors, "Username is required");
    }
    elseif (empty($email)) {
        array_push($errors, "Email is required");
    }
    elseif (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    elseif (empty($password_2)) {
        array_push($errors, "Confirm Password is required");
    }
    elseif ($password_1 != $password_2) {
        array_push($errors, "Passwords do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email'";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['username'] == $username) {
            array_push($errors, "Username already in use");
        }
        if ($result['email'] == $email) {
            array_push($errors, "Email already in use");
        }
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password_1')";
        mysqli_query($conn, $sql);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        echo "<script>
                alert('Successful registration');
                window.location.href = 'index.php';
              </script>";
        exit();
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
        $errorMessages = implode("\\n", $errors);
        echo "<script>
                window.location.href = 'register.php';
              </script>";
        exit();
    }
}
