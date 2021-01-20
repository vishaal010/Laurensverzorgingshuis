<?php
session_start();
require 'db.inc.php';
if (isset($_POST['edit'])){

    $id = $_SESSION['userId'];
    $name = htmlspecialchars ($_POST['name'], ENT_QUOTES);
    $email = htmlspecialchars ($_POST['email'], ENT_QUOTES);
    $tel = htmlspecialchars ($_POST['tel'], ENT_QUOTES);

    if (empty($name) ||    empty($email) || empty($tel)) {
        header("Location: ../php/signup.php?error=emptyfields&uid=" . $username . "&name=" . $name);
        exit;
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        header("Location: ../php/signup.php?error=invaliduser=" . $username);
        exit;
    }

    else
    {
        $stmt = $mysqli->prepare('UPDATE users SET name = ? , email = ? , tel = ? WHERE id = ?');

        $stmt->bind_param('ssii', $name, $email, $tel, $id);

        if ($stmt->execute()) {

            header('Location: ../table.php?edit=succes');
        } else {
            echo 'er is iets misgegaan met editen' ;
        }
    }
}
