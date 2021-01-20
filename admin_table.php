<?php
session_start();
require 'include/admin_session.inc.php';
require 'include/db.inc.php';
$id = $_SESSION['admin_id'];
$result = $mysqli->query("SELECT a.date, a.time, l.name, u.username, u.id, u.appointment_id FROM users AS u
                                LEFT JOIN appointment AS a ON a.id = u.appointment_id
                                LEFT JOIN location AS l ON l.id = a.location_id");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/table.css">
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
    <a href="include/loguit.inc.php" class="nav-link"><h2> Log uit </h2></a>



    <h1>Alle Afspraken</h1>

    <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th><span>Gebruikersnaam</span></th>
            <th><span>Vestiging</span></th>
            <th><span>Tijd</span></th>
            <th><span>Datum</span></th>
            <th><span>Afspraak Verwijderen</span></th>

        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>


                <td class="lalign"><?php echo $row['username']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td>
                    <?php
                    if (!empty($row['appointment_id'])) {
                    ?>
                    <a href="admin_appointment_delete.php?edit=<?php echo $row['id'] . "&appointment=" . $row['appointment_id'] ?>">
                        Verwijderen</a></td>


            </tr>
        <?php }} ?>
        </tbody>
    </table>
</div>
</body>
</html>