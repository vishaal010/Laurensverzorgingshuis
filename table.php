<?php
session_start();
require 'include/session.inc.php';
require 'include/db.inc.php';
$id = $_SESSION['userId'];
$result = $mysqli->query("SELECT a.date, a.time, l.name FROM users AS u
                                LEFT JOIN appointment AS a ON a.id = u.appointment_id
                                LEFT JOIN location AS l ON l.id = a.location_id
                                WHERE u.id = $id");
$row = $result->fetch_assoc();
$result2 = $mysqli->query("SELECT * FROM users WHERE id = $id");
$row2 = $result2->fetch_assoc()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/table.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/project/logo.png" height="50px" width="50px"></a>
        </div>
    </div>
</nav>
<div id="wrapper">
    <a href="form.php?id=<?php echo $id;?>"><h2> Afspraak maken </h2></a>
    <a href="account_info.php?id=<?php echo $id;?>"><h2> Account bekijken </h2></a>
    <a href="account_edit.php?id=<?php echo $id;?>"><h2> Account bewerken </h2></a>
    <a href="account_delete.php?id=<?php echo $id;?>"><h2> Account verwijderen </h2></a>
    <a href="include/loguit.inc.php" class="nav-link"><h2> Log uit </h2></a>




    <h1>Afspraak</h1>
    <?php require 'include/alert.inc.php'; ?>
    <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th><span>Vestiging</span></th>
            <th><span>Tijd</span></th>
            <th><span>Datum</span></th>
            <th><span>Afspraak Verwijderen</span></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="lalign"><?php echo $row['name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <?php
            if (!empty($row2['appointment_id'])) {
            ?>
            <td><a href="delete_appointment.php?edit=<?php echo $row2['appointment_id'];?>"> Verwijderen</a></td>
            <?php } ?>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>