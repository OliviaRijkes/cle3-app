<?php

session_start();


//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require 'vendor/autoload.php';
//
//$mail = new PHPMailer(true);
//
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//
//
//    $name = $_POST['name'];
//    $email = $_POST['email'];
//    $complaint = $_POST['complaint'];
//
//
//    try {
//        // SMTP instellingen
//        $mail->isSMTP();
//        $mail->Host = 'smtp.gmail.com';
//        $mail->SMTPAuth = true;
//        $mail->Username = 'davenagesser12@gmail.com';
//        $mail->Password = 'goqf uitz ayoc qwqa';
//        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//        $mail->Port = 587;
//
//        // Afzender & ontvanger
//        $mail->setFrom('1105575@hr.nl', 'Bevestiging vraag/klacht');
//        $mail->addAddress($email);
//        $mail->addBCC('1105575@hr.nl');
//
//        // Inhoud
//        $mail->isHTML(true);
//        $mail->CharSet = 'UTF-8';
//        $mail->Encoding = 'base64';
//        $mail->Subject = 'Bevestiging vraag/klacht';
//        $mail->Body = "<h1> Beste {$name}, </h1>
//                       <p> Onlangs heeft u onze contactformulier ingevuld, hieronder staat uw commentaar ter bevestiging: </p>
//                      <p>{$complaint}</p> ";
//
////        $succesMessage = '';
//        $mail->send();
////        $succesMessage = 'Uw vraag/klacht is succesvol aangekomen. Er is een bevestigingsmail verzonden naar uw email!';
//
//    } catch (Exception $e) {
//        echo "Fout: {$mail->ErrorInfo}";
//    }
//}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/contact_bevestiging.css">

    <title>Document</title>
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
    <h1> Shoppi </h1>

    <h2><?php
        if (isset($_SESSION['success_message'])) {
            echo $_SESSION['success_message'];
        }
        ?></h2>
    <div class="image">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/047/269/661/small_2x/thumb-character-isolated-in-transparent-background-png.png"
             alt="blije emotie">
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