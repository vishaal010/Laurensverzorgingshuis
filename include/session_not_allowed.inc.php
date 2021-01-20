<?php
if (isset($_SESSION['userId']) || strlen ($_SESSION['userId']) == 0) {
    header('Location: table.php');
}
