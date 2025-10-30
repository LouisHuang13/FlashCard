<?php
    require('actions/database.php');
    require('actions/getAllCardsAction.php');
    $count = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | </title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/deckStyle.css">
</head>
<body>
    <?php require_once('includes/nav.php')?>

    <section id="cards">
        <?php 
            while($card = $getAllCards->fetch()){
        ?>
        <div class="card" onclick="flipCard(<?=$count?>)">
            <div class="cardContent">
                <div>
                    <h1><?=$card['side1']?></h1>
                </div>
                <div>
                    <h1><?=$card['side2']?></h1>
                </div>
            </div>
        </div>
        <?php
            $count++;
            }
        ?>
    </section>
    <div id="counters">
        <div class="countersContainer"></div>
        <div class="countersContainer"></div>
        <div class="countersContainer"></div>
    </div>
    <div id="progressBar">
    </div>
    <input type="hidden" id="cardCounter" value="<?= $count?>">
    <script src="scripts/script.js"></script>
</body>
</html>