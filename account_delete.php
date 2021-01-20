<?php
session_start();
require 'include/session.inc.php';
require 'include/db.inc.php';

include 'include/header.inc.php';

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM users WHERE id = $id");
$row = $result->fetch_assoc()?>


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
                <a href="table.php" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Nee</a>

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
<?php include 'include/footer.inc.php'; ?>

