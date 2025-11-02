<?php
    require('actions/database.php');
    require('actions/getAllCardsAction.php');
    require('actions/deleteDeckAction.php');
    require('actions/favoriteAction.php');
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
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <section id="settings">
        <?php 
            $checkUser = $bdd->prepare('SELECT author FROM unicard_decks WHERE id = ?');
            $checkUser->execute(array($_GET['id']));
            $checkUser = $checkUser->fetch();
            if($checkUser[0] === $_SESSION['username']){
        ?>
        <form method="POST">
            <input type="hidden" name="deckId" value="<?=$_GET['id']?>">
            <input type="submit" name="eraseDeck" value="Supprimer le deck">
        </form>
        <?php
        }
        ?>
    </section>
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