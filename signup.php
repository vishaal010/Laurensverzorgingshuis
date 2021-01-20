<?php
session_start();
if (isset($_SESSION['userId'])){
    header("Location: table.php");
    exit;
}
else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registreren - Laurens</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
            <form action="include/signup.inc.php"  method="post" cclass="login100-form validate-form flex-sb flex-w">
                <?php require 'include/alert.inc.php'; ?>
                <span class="login100-form-title p-b-51">
						Registreren
					</span>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="text" name="username" placeholder="Gebruikersnaam">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="text" name="name" placeholder="Volledige naam">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="password" name="password" placeholder="Wachtwoord">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="password" name="password-repeat" placeholder="Wachtwoord-opnieuw">
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="email" name="email" placeholder="Emailadress">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="tel" name="tel" maxlength="10" placeholder="Telefoonnummer">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <button type="submit" name="registreren" class="login100-form-btn">
                        Account aanmaken
                    </button>
                    <br>
                    <a href="table.php" class="login100-form-btn"></i> Terug</a>

                </div>

            </form>
        </div>
    </div>
</div>


</body>
</html>
<?php } ?>