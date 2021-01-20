<?php
session_start();
require 'include/db.inc.php';
require 'include/session.inc.php';

include 'include/header.inc.php';
$result = $mysqli->query("SELECT * FROM location ORDER by NAME ");
?>

<!-- ABOUT -->
<section class="about full-screenform d-lg-flex justify-content-center align-items-center" id="about">
    <div class="container">
        <h1>Maak hier je afspraak</h1>
        <div class="row">
            <form action="include/afspraak_voegen.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Vestiging</label>
                    <select name="location" class="form-control" id="exampleFormControlSelect1">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Datum</label>
                    <input class="form-control" name="date" type="date" min="<?php echo date("Y-m-d");?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tijd</label>
                    <select name="time" class="form-control" id="exampleFormControlSelect1">
                        <option value="08:00">08:00</option>
                        <option value="08:30">08:30</option>
                        <option value="09:00">09:00</option>
                        <option value="09:30">09:30</option>
                        <option value="10:00">10:00</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="11:30">11:30</option>
                        <option value="12:00">12:00</option>
                        <option value="12:30">12:30</option>
                        <option value="13:00">13:00</option>
                        <option value="13:30">13:30</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                        <option value="16:30">16:30</option>
                    </select>
                </div>
                <div class="custom-btn-group mt-4">
                    <button type="submit" name="afspraak" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i>
                        Afspraak maken
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
<?php require 'include/footer.inc.php';
