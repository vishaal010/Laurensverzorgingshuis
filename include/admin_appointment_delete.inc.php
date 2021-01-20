<?php
session_start();
if (isset($_POST['delete_appointment'])) {
    require 'db.inc.php';
    $id = $_POST['id'];



    $query = "UPDATE users SET appointment_id = NULL WHERE id = $id";

    $result = mysqli_query($mysqli, $query);

    if ($result) {

        header("Location:../admin_table.php");
        exit;
    } else {
        echo 'Er ging wat mis met het toevoegen!';
        echo "<p>" . $query . "</p>";
        echo "<p>" . mysqli_error($mysqli) . "</p>";

    }

}

