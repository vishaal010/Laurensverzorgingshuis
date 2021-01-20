<?php
if (isset($_SESSION['userId'])) {

    $mail = $_SESSION['mail'];

}
	if(isset($_GET['error']))
	{
		// error melding wanneer de velden niet allemaal zijn ingevuld
		if($_GET['error'] == "emptyfields")
		{
			echo '<script>swal ( "Oops", "Niet alle velden zijn ingevuld!", "error" )</script>';
		}
		// error melding wanneer de email-adres en de gebruikensnaam fout zijn
		else if ($_GET['error'] == "wrongpwd")
		{
			echo '<script>swal ( "Oops", "Wachtwoord klopt niet!", "error" )</script>';
		}
		else if ($_GET['error'] == "eerstinlog")
		{
			echo '<script>swal ( "Oops", "U moet eerst inloggen", "error" )</script>';
		}
		// error melding wanneer de email-adres fout is
		else if ($_GET['error'] == "nouser")
		{
			echo '<script>swal ( "Oops", "Gebruikersnaam/Wachtwoord klopt niet!", "error" )</script>';
        }	
        
        else if ($_GET['error'] == "passwordcheck")
		{
			echo '<script>swal ( "Oops", "Wachtwoord komt niet overeen!", "error" )</script>';
		}

        else if ($_GET['error'] == "invaliduser")
        {
            echo '<script>swal ( "Oops", "Het is leeg!", "error" )</script>';
        }

        else if ($_GET['error'] == "usertaken")
        {
            echo '<script>swal ( "Oops", "Gebruikersnaam bestaat al!", "error" )</script>';
        }
        else if ($_GET['error'] == "invalidemail")
        {
            echo '<script>swal ( "Oops", "Email is ongeldig!", "error" )</script>';
        }




    }

    if(isset($_GET['login'])) {

        if ($_GET['login'] == "succes") {
            echo '<script>swal ( "Yeah	", "Uw Bent ingelogd", "success" )</script>';
        }

    }
    if(isset($_GET['edit'])) {

    if ($_GET['edit'] == "succes") {
        echo '<script>swal ( "Yeah	", "U account is bewerkt", "success" )</script>';
    }

}

    if(isset($_GET['delete'])) {

    if ($_GET['delete'] == "succes") {
        echo '<script>swal ( "Yeah	", "Afspraak is verwijderd", "success" )</script>';
    }

}

    if(isset($_GET['logout'])) {

    if ($_GET['logout'] == "succes") {
        echo '<script>swal ( "Tot ziens	", "Uw bent succesvol uitgelogd", "success" )</script>';
    }

}
    if(isset($_GET['afspraak'])) {

    if ($_GET['afspraak'] == "succes") {
        echo "<script type='text/javascript'>
        var mail = ' echo $mail; ?>';
        
         swal({
         icon: 'success',
        title: 'Afspraak voltooid',
        text: 'Er is een mail gestuurd naar ' + '$mail' + ' met de gegevens van de afspraak.'             })
    </script>";
    }
}

    if(isset($_GET['signup'])) {

    if ($_GET['signup'] == "succes") {
        echo '<script>swal ( "Account aangemaakt!	", "U kunt nu met u account inloggen", "success" )</script>';
    }

}

?>