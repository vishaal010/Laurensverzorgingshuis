<?php


if (isset($_POST['login'])) {

    require 'db.inc.php';

    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        header("Location: ../php/login.php?error=emptyfields");
        exit;
    } else {
        $sql = "SELECT * FROM admin WHERE username=?";
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/login.php?error=sqlerror");
            exit;
        } else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    header("Location: ../php/login.php?error=wrongpwd");
                    exit;

                } else if ($pwdCheck == true) {
                    session_start();

                    $_SESSION['admin_id'] = $row['id'];
                    $_SESSION['name'] = $row['username'];

                    header("Location: ../admin_table.php");
                    exit;

                } else {
                    header("Location: ../php/login.php?error=nouser");
                    exit;
                }
            } else {
                header("Location: ../php/login.php?error=nouser");
                exit;
            }

        }


    }

}

