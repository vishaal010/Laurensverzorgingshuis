<?php
session_start();
require 'db.inc.php';
$id = $_GET['edit'];

if(isset($_POST['delete_user'])){

    $stmt = $mysqli->prepare('DELETE FROM users WHERE id = ?');

    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header('Location: ../index.php?delete=succes');
    } else {
        echo 'er is iets misgegaan met verwijderen';
    }
}