<?php
session_start();
require 'include/admin_session.inc.php';
require 'include/db.inc.php';
$id = $_GET['edit'];
$result = $mysqli->query("SELECT * FROM users WHERE id = $id");
$row = $result->fetch_assoc()?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laurens - Reserveer</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/tooplate-style.css">


</head>
<body>

<!-- MENU -->
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/project/logo.png" height="50px" width="50px"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="inlog.php" class="nav-link">Log in</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-lg-auto">

            </ul>
        </div>
    </div>
</nav>

<!-- ABOUT -->
<section class="about full-screenform d-lg-flex justify-content-center align-items-center" id="about">
    <div class="container">
        <h1>Definifief dit account verwijderen</h1>
        <div class="row">
            <form action="include/delete.inc.php" method="post">

                <div class="custom-btn-group mt-4">
                    <button type="submit" name="delete_user" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i>
                        Ja
                    </button>
                </div>
            </form>

            <div class="custom-btn-group mt-4">
                <button type="submit" name="delete_appointment" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i>
                    Nee
                </button>
            </div>



            <div class="col-lg-5 col-md-12 col-12">
                <div class="about-image svg">
                    <img src="images/project/verpleeghuis.jpg" class="img-fluid image-home image-move" alt="svg image">
                </div>
            </div>


        </div>
    </div>
</section>


<!-- FOOTER -->
<footer class="footer py-5">
    <div class="container">
        <h2 class="c-copy--h2  u-margin--b0  u-white">Wat kunnen wij voor u betekenen?</h2>
    </div>
    </div>
</footer>

</body>
</html>
