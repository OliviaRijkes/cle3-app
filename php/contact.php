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
        <a href="php/contact.php">Contactpagina</a>

    </div>
</nav>
<main>
    <div class="center-container">
        <section>
            <h1>Contactformulier</h1>
        </section>
        <form action="contact_email.php" method="POST">
            <label for="first-name">Naam:</label>
            <input type="text" id="first-name" name="name" required placeholder="voornaam"/>

            <label for="last-name">Achternaam:</label>
            <input type="text" id="last-name" name="lastname" required placeholder="achternaam"/>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="e-mail"/>

            <label for="question"> Jouw vraag </label>
            <textarea name="question" rows="2" cols="30">

</textarea>

            <button type="submit" name="submit-button">verstuur</button>

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



