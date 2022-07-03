<?php
// Login form processing is done on this page. 
if (isset($_POST['signup_submit'])) {

    require('shared/initialize.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];    

    if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        header("Location: signup.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup.php?error=invalidemailuser_name");
        exit();
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=invalidemail&username=".$username);
        exit();
    }

    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup.php?error=invaliduser_name&email=".$email);
        exit();
    }

    elseif ($password !== $passwordConfirm) {
        header("Location: signup.php?error=passwordcheck&username=".$username."&email=".$email);
        exit();
    }     
    
    else {
        $sql = "SELECT user_name FROM users WHERE user_name=?";
        $stmt = mysqli_stmt_init($db);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: signup.php?error=sqlerror");
            exit();

        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheckuser = mysqli_stmt_num_rows($stmt);
 

            if ($resultCheckuser > 0) {
                header("Location: signup.php?error=usertaken&email=".$email);
                exit();

            } else {

                    $sql = "INSERT INTO users (user_name, email, user_pwd) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($db);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: signup.php?error=sqlerror");
                        exit();
        
                } else {

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT); 

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: signup.php?signup=success");
                    exit();
                    }
                }
            


        }
    }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    } else {
        
        header("Location: signup.php");
        exit();
    }
?>