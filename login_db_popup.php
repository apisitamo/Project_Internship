<?php
session_start();
include('server.php');

$errors = array();

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username) && empty($password)) {
        array_push($errors, "Please fill input.");
    } elseif (empty($username)) {
        array_push($errors, "Username is required.");
    } elseif (empty($password)) {
        array_push($errors, "Password is required.");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            if ($password == $user['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in.";
                header("location: index.php");
                exit();
            } else {
                array_push($errors, "Invalid password.");
                $_SESSION['error'] = "Invalid username or password.";
                echo "<script>
                        alert('Invalid username or password. Please try again.');
                        window.location.href = 'login.php';
                      </script>";
                exit();
            }
        } else {
            array_push($errors, "User not found.");
            $_SESSION['error'] = "User not found. Please try again.";
            echo "<script>
                    alert('User not found. Please try again.');
                    window.location.href = 'login.php';
                  </script>";
            exit();
        }
    } else {
        $_SESSION['error'] = implode("\n", $errors);
        $errorMessages = implode("\\n", $errors);
        echo "<script>
                alert('$errorMessages');
                window.location.href = 'product.php';
              </script>";
        exit();
    }
}
?>
