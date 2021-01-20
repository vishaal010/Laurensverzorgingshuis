<?php


if (isset($_POST['submit'])) {

    require 'db.inc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)) {
        header("Location: ../inlog.php?error=emptyfields");
        exit;
    }
    else {
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($mysqli);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../inlog.php?error=sqlerror");
            exit;
        }

        else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    header("Location: ../inlog.php?error=wrongpwd");
                    exit;

                }
                else if($pwdCheck == true){
                    session_start();

                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userUid'] = $row['username'];
                    $_SESSION['mail'] = $row['email'];

                    header("Location: ../table.php?login=succes");
                    exit;

                }
                else {
                    header("Location: .../inlog.php?error=nouser");
                    exit;
                }
            }
            else {
                header("Location: ../inlog.php?error=nouser");
                exit;
            }

        }


    }

}

