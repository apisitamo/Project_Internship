<?php
    session_start();
    include('server.php');

    $errors=array();

    if(isset($_POST['login_admin'])){
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $employee_code=mysqli_real_escape_string($conn,$_POST['employee_code']);

        if(empty($username)){
            array_push($errors,"username is required");
        }
        if(empty($password)){
            array_push($errors,"password is required");
        }
        if(empty($password)){
            array_push($errors,"employee code is required");
        }

    
        if(count($errors)==0){
            $password=($password);
            $query=" SELECT * FROM admin WHERE admin = '$username' AND password = '$password' AND employee_code = '$employee_code' ";
            $result=mysqli_query($conn, $query);

            if(mysqli_num_rows($result)==1){
                $_SESSION['username']= $username;
                $_SESSION['success']="you are now login";
                header("location: admin.php");
            }
            else{
                array_push($errors,"worng data");
                $_SESSION['error']="try again";
                header("location: adminlogin.php");
            }


        }else {
            // Notify the user to fill in both fields
            $_SESSION['error'] = "Please fill input";
            header("location: adminlogin.php");
        }


    }

?>