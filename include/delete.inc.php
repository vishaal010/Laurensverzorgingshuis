<?php
session_start();
require 'db.inc.php';
$id = $_SESSION['userId'];

if(isset($_POST['delete_user'])){

$stmt = $mysqli->prepare('DELETE FROM users WHERE id = ?');

$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    header('Location: ../index.php?delete=succes');
} else {
    echo 'er is iets misgegaan met verwijderen';
}
}