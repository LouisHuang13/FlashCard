<?php
    require('actions/database.php');
    require('actions/loginAction.php');

    if($_SESSION['auth']){
        header('Location: decks.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <?php require_once('includes/login.php')?>
    <section id="mainSection">
        <h1>Une façon plus <strong>ludique</strong> d'apprendre</h1>
        <p>Maîtrisez tout ce que vous devez apprendre grâce aux flashcards interactives de Uni'Card</p>
        <button onclick="openLoginMenu(true)">S'inscrire gratuitement</button>
    </section>
    <script src="scripts/script.js"></script>
</body>
</html>