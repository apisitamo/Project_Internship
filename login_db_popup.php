<?php
    session_start();
    include('server.php');

    $errors=array();

    if(isset($_POST['login_user'])){
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);

        if(empty($username)){
            array_push($errors,"username is required");
        }
        if(empty($password)){
            array_push($errors,"password is required");
        }

    
        if(count($errors)==0){
            $password=($password);
            $query=" SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result=mysqli_query($conn, $query);

            if(mysqli_num_rows($result)==1){
                $_SESSION['username']= $username;
                $_SESSION['success']="you are now login";
                header("location: product.php");
            }
            else{
                array_push($errors,"worng data");
                $_SESSION['error']="try again";
                header("location: product.php");
            }


        }else {
            // Notify the user to fill in both fields
            $_SESSION['error'] = "Please fill input";
            header("location: product.php");
        }


    }

?>