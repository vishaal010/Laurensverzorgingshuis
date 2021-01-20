<?php
session_start();

require 'include/db.inc.php';
$appointmentid = $_GET['edit'];
$id = $_SESSION['userId'];
$result = $mysqli->query("SELECT a.date, a.time, l.name, u.appointment_id FROM users AS u
                                LEFT JOIN appointment AS a ON a.id = u.appointment_id
                                LEFT JOIN location AS l ON l.id = a.location_id
                                WHERE u.id = $id");

$row = $result->fetch_assoc();

 require 'include/header.inc.php';
?>


<!-- ABOUT -->
<section class="about full-screenform d-lg-flex justify-content-center align-items-center" id="about">
    <div class="container">
        <h1>Afspraak definitief verwijderen?</h1>
        <div class="row">
            <form action="include/delete_appointment.inc.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Vestiging</label>
                    <input class="form-control" disabled value="<?php echo $row['name']; ?>" name="name" type="text">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Datum</label>
                    <input class="form-control" disabled value="<?php echo $row['date']; ?>" name="date" type="text">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tijd</label>
                    <input class="form-control" disabled value="<?php echo $row['time']; ?>" name="time" type="text">
                </div>
                <div class="custom-btn-group mt-4">
                    <button type="submit" name="delete_appointment" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i>
                        Afspraak verwijderen
                    </button>
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

<?php
    require 'include/footer.inc.php';

?>