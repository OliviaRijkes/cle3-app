<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

/** @var mysqli $db */
require_once "includes/database.php";


if (isset ($_POST['submit'])) {

    $name = mysqli_escape_string($db, $_POST['name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $complaint = mysqli_escape_string($db, $_POST['complaint']);

    $errorMessage = [];

    if ($name === '') {
        $errorMessage ['name'] = "Je hebt geen naam ingevuld";
    } else {
        if (is_numeric($name)) {
            $errorMessage ['name'] = "Je naam mag geen getallen bevatten";
        }
    }

    if ($email === '') {
        $errorMessage ['email'] = "Je hebt geen email ingevuld";
    }

    if ($complaint === '') {
        $errorMessage ['complaint'] = "Je hebt niks ingevuld";
    }

    if (empty($errorMessage)) {

        $query = "INSERT INTO `user`  (`name`,`email`,`complaint`)
        VALUES ('$name', '$email','$complaint')";

        $results = mysqli_query($db, $query);

        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $complaint = $_POST['complaint'];


        try {
            // SMTP instellingen
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'davenagesser12@gmail.com';
            $mail->Password = 'goqf uitz ayoc qwqa';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Afzender & ontvanger
            $mail->setFrom('1105575@hr.nl', 'Bevestiging vraag/klacht');
            $mail->addAddress($email);
            $mail->addBCC('1105575@hr.nl');

            // Inhoud
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->Subject = 'Bevestiging vraag/klacht';
            $mail->Body = "<h1> Beste {$name}, </h1>
                       <p> Onlangs heeft u onze contactformulier ingevuld, hieronder staat uw commentaar ter bevestiging: </p>
                        <p> '{$complaint}'</p> 
                       <p> We nemen zo snel mogelijk contact met u op via de mail, bedankt voor u geduld!</p>";

//        $succesMessage = '';
            $mail->send();
//        $succesMessage = 'Uw vraag/klacht is succesvol aangekomen. Er is een bevestigingsmail verzonden naar uw email!';

        } catch (Exception $e) {
            echo "Fout: {$mail->ErrorInfo}";
        }

        $_SESSION['success_message'] = 'Uw vraag/klacht is succesvol aangekomen. Er is een bevestigingsmail verzonden naar uw email!';
        header('Location: contact_email.php');
        exit;
    }

}
mysqli_close($db);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Contactpagina</title>
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body>
<nav>
    <div class="navigation">
        <img src="images/logo.png"
             alt="Logo van Shoppi">
        <a href="index.html"> Home </a>
        <a href="info.html"> About Shoppi </a>
        <a href="contact.php">Contactpagina</a>

    </div>
</nav>
<main>
    <div class="center-container">
        <section>
            <h1>Contactformulier</h1>
        </section>
        <!--        <form action="contact_email.php" method="POST">-->
        <form action="" method="POST">
            <label for="first-name">Naam:</label>
            <input type="text" id="first-name" name="name" placeholder="naam"
                   value="<?= htmlentities($_POST['name'] ?? '') ?>"/>
            <p class="error">
                <?= htmlentities($errorMessage ['name'] ?? '') ?>
            </p>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="E-mail"
                   value="<?= htmlentities($_POST['email'] ?? '') ?>"/>
            <p class="error">
                <?= htmlentities($errorMessage ['email'] ?? '') ?>
            </p>

            <label for="question"> Jouw vraag </label>
            <textarea name="complaint" rows="2" cols="30"
                      placeholder="Typ hier uw bericht"><?= htmlentities($_POST['complaint'] ?? '') ?></textarea>
            <p class=" error">
                <?= htmlentities($errorMessage ['complaint'] ?? '') ?>
            </p>

            <button type="submit" name="submit">Verstuur</button>

        </form>
    </div>

</main>
<footer>
    <div class="footerColumnContainer">
        <p>Shoppi © 2026, All rights reserved.</p>
        <img src="images/logo.png"
             alt="Logo van Shoppi">
    </div>
    <div class="footerRowContainer">
        <a href="">Algemene voorwaarden</a>
        <a href="">Over Shoppi</a>
        <a href="">Privacybeleid</a>
        <a href="">Contact</a>
    </div>
</footer>
</body>
</html>


