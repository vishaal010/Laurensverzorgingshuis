<?php
session_start();
?>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</head>
<body>

<!-- MENU -->
<?php require 'include/alert.inc.php'; ?>
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
                <?php
                if (!isset($_SESSION['userId']) || strlen ($_SESSION['userId']) == 0) { ?>
                    <li class="nav-item">
                        <a href="inlog.php" class="nav-link">Log in</a>
                    </li>
                <?php }
                elseif (isset($_SESSION['userId']) || strlen ($_SESSION['userId']) == 0) { ?>
                <li class="nav-item">
                    <a href="include/loguit.inc.php" class="nav-link">Log uit</a>
                </li>
               <?php } ?>



            </ul>

            <ul class="navbar-nav ml-lg-auto">

            </ul>
        </div>
    </div>
</nav>

<!-- ABOUT -->
<main class="about full-screen d-lg-flex justify-content-center align-items-center" id="about">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center">
                <div class="about-text">
                    <small class="small-text">Reserveren</small>

                    </h1>

                    <p>Duizenden ouderen in Rotterdam en omstreken vertrouwen dagelijks op de zorg van bijna 6.000 betrokken zorgprofessionals van Laurens. Uw vragen, wensen en mogelijkheden staan centraal in ons werk. Dat werk doen we niet alleen, maar samen met de mensen om u heen en andere zorgverleners zoals uw huisarts, specialist of behandelaar.</p>

                        <div class="custom-btn-group mt-4">
                           <a href="inlog.php" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Afspraak maken</a>
                        </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-12 col-12">
                <div class="about-image svg">
                    <img src="images/project/jarig.jpg" class="img-fluid image-home" alt="svg image">
                </div>
            </div>

        </div>
    </div>
</main>


<!-- FOOTER -->
<footer class="footer py-5">
    <div class="container">
        <h2 class="c-copy--h2  u-margin--b0  u-white">Wat kunnen wij voor u betekenen?</h2>
    </div>
    </div>
</footer>

</body>
</html>