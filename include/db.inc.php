<?php
// database logingegevens
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'Reserveren';

// maak de database-verbinding
$mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);

// als de verbinding niet is gemaakt!
if (!$mysqli) {
    echo "FOUT: geen connectie naar database. <br>";
    echo "Errno : " . mysqli_connect_errno() . "<br/>";
    echo "Error : " . mysqli_connect_error() . "<br/>";
    exit;

}