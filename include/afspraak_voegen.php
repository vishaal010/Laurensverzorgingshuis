<?php
session_start()
;if (isset($_POST['afspraak'])) {

    require_once 'db.inc.php';
    $username  = $_SESSION['userUid'];
    $userid = $_SESSION['userId'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $time = $_POST['time'];



    if (empty($location) || empty($date) || empty($time)) {
        header("Location: ../php/signup.php?error=emptyfields&location=" . $location . "&date=" . $date);
        exit;
    } else {


        $sql = "INSERT INTO appointment (location_id, date, time) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'error preparing statement: ' . $mysqli->error;
            exit;
        } else {


            mysqli_stmt_bind_param($stmt, "iss", $location, $date, $time);

            mysqli_stmt_execute($stmt);


            $result = $mysqli->query(" SELECT * FROM appointment ORDER BY ID DESC LIMIT 1");
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    $$key = $value;

                    $query = "UPDATE  users SET
				appointment_id = '$id'
				WHERE id = $userid";

                    $result = mysqli_query($mysqli, $query);


                }


                if($result)

                {
                    $result = $mysqli->query("SELECT a.date, a.time, l.name, u.email FROM users AS u
                                LEFT JOIN appointment AS a ON a.id = u.appointment_id
                                LEFT JOIN location AS l ON l.id = a.location_id
                                WHERE u.id = $userid");


                    while ($row = $result->fetch_assoc()) {
                        foreach ($row as $key => $value) {
                            $$key = $value;
                        }


                    require '../mail/PHPMailerAutoload.php';
                    $mail = new PHPMailer();



                            try {
                        //Server settings
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged

                        $mail->Username   = 'laurenstest010@gmail.com';                     // SMTP username
                        $mail->Password   = 'Laurenstest123@';                               // SMTP password

                        //Recipients
                        $mail->setFrom('Laurenstest123@gmail.com', 'Mailer');
                        $mail->addAddress($email, 'Laurens');     // Add a recipient
                        $mail->addReplyTo('Laurenstest123@gmail.com', 'Information');


                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Afspraak bevestigen';
                        $mail->Body    = 'Hallo,' . $username . '<br> U heeft een afspraak staan op:<br> <b>' . 'Datum: ' . $date. '</b><br> <b>'.  'Tijd: ' . $time . '</b><br> <b>' . 'Locatienaam: ' . $name .  ' </b><br>Tot dan!';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                        header("Location: ../table.php?afspraak=succes");
                        exit();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

                    exit;
                } }  else {
                    echo 'Er ging wat mis met het toevoegen!';
                    echo"<p>" . $query . "</p>";
                    echo"<p>" . mysqli_error($mysqli) . "</p>";

                }

            }

            }

        }
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);



}

    else {
    header("Location: ../signup.php");
    exit;

}

