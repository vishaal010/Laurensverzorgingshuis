<?php
session_start();
require 'db.inc.php';
$id = $_SESSION['userId'];

if (isset($_POST['delete_appointment'])){


    $query = "UPDATE users SET appointment_id = NULL WHERE id = $id";

    $result = mysqli_query($mysqli, $query);

    if($result)
    {

        header("Location:../table.php?delete=succes");
        exit;
    } else {
        echo 'Er ging wat mis met het toevoegen!';
        echo"<p>" . $query . "</p>";
        echo"<p>" . mysqli_error($mysqli) . "</p>";

    }

    }

