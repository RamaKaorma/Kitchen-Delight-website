<?php

if (isset($_POST['signin_submit'])) {

    require('shared/initialize.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: signin.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name=? OR email=?;";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: signin.php?error=sqlerror");
            exit();

        } else {

            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['user_pwd']);
                
                if ($pwdCheck == false) {
                    header("Location: signin.php?error=wrongpwd");
                    exit();

                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['user_id'];
                    $_SESSION['userUid'] = $row['user_name'];

                    header("Location: signin.php?login=success");
                    exit();

                } else {
                    header("Location: signin.php?error=unknown");
                    exit();
                }
            } 

            else {
                header("Location: signin.php?error=nouser");
                exit();
            }
        }

    }
}

else {
    header("Location: signin.php");
    exit();
}

?>