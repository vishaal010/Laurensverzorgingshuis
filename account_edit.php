<?php
session_start();
require 'include/session.inc.php';
require 'include/db.inc.php';

include 'include/header.inc.php';

$id = $_SESSION['userId'];
$result = $mysqli->query("SELECT * FROM users WHERE id = $id");
$row = $result->fetch_assoc()?>

<!-- ABOUT -->
<section class="about full-screenform d-lg-flex justify-content-center align-items-center" id="about">
    <div class="container">
        <h1>Account gegevens</h1>
        <div class="row">
            <form action="include/account_edit.inc.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Naam</label>
                    <input class="form-control"  value="<?php echo $row['name']; ?>" name="name" type="text">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <input class="form-control"  value="<?php echo $row['email']; ?>" name="email" type="text">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Telefoonnummer</label>
                    <input class="form-control"  value="<?php echo $row['tel']; ?>" name="tel" type="text" max="10">
                </div>
                <div class="custom-btn-group mt-4">
                    <button type="submit" name="edit" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i>
                        Account wijzigen
                    </button>
                    <a href="table.php" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Terug</a>
                </div>
            </form>


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