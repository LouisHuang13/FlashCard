<?php
    require('actions/searchCours.php');
    require('actions/getCoursInfo.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | Cours</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <?php require_once('includes/favorites.php')?>

    <?php while($InfoCours = $getInfoCours->fetch()){
        ?>
        <div id="infoCours">
            <h1><?= $InfoCours['title']?></h1>
            <p><?= $InfoCours['description']?></p>
            <div>
                <?= $InfoCours['text']?>
            </div>
        </div>
    <?php
    }
    ?>
    <script src="scripts/script.js"></script>
</body>
</html>