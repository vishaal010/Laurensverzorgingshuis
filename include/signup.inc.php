<?php

if (isset($_POST['registreren'])) {

    require_once 'db.inc.php';

    $username = htmlspecialchars ($_POST['username'], ENT_QUOTES);
    $name = htmlspecialchars ($_POST['name'], ENT_QUOTES);
    $password = $_POST['password'];
    $passwordrepeat = $_POST['password-repeat'];
    $email = htmlspecialchars ($_POST['email'], ENT_QUOTES);
    $tel = htmlspecialchars ($_POST['tel'], ENT_QUOTES);




    if (empty($username) || empty($name) ||  empty($password)  || empty($passwordrepeat) || empty($email) || empty($tel)) {
        header("Location: ../signup.php?error=emptyfields&uid=" . $username . "&name=" . $name);
        exit;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail=" . $email);
        exit;
    }
    else if ($password !== $passwordrepeat) {
        header("Location: ../signup.php?error=passwordcheck");
        exit;
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduser=" . $username);
        exit;
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: ../signup.php?error=invaliduser=" . $name);
        exit;
    }
   else if (!preg_match("^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$", $username, $name)) {
       header("Location: ../signup.php?error=telefoonnummer=" . $tel);
      exit;
    }
        else {

        // Pak de username met een placeholder
        $sql = "SELECT username FROM users WHERE username=? OR email =?";
        // Maak connectie met de database
        $stmt = mysqli_stmt_init($mysqli);
        // Check als de er connectie is
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit;
        } //
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken");
                exit;

            } else {

                $sql = "INSERT INTO users (username, password, name, email, tel) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($mysqli);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit;
                } else {


                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


                    mysqli_stmt_bind_param($stmt, "ssssi", $username, $hashedPwd, $name, $email, $tel);

                    mysqli_stmt_execute($stmt);

                    header("Location: ../inlog.php?signup=succes");
                    exit;


                }

            }
        }


    }
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);


} else {
    header("Location: ../signup.php");
    exit;

}

