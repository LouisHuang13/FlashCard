<?php
    require('actions/searchFlashcards.php');
    $deckCount = 0;
    while($countDeck = $getAllDecksCount->fetch()){
        $deckCount++;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | Flashcards</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <section id="searchPage">
        <form>
            <input type="search" name="searchBar" placeholder="Recherchez..." oninput="search(this.value)">
            <a href="">Mes Flashcards</a>
        </form>
        <div id="decksContainer">
            <hr>
            <?php while($decksStart = $getAllDecksStart->fetch()){
            ?>
                <a href='deck.php?id=<?= $deckCount?>'>
                    <div class="deckCard">
                        <?php 
                            $getCardCount = $bdd->prepare('SELECT id FROM unicard_cards WHERE id_deck = ?');
                            $getCardCount->execute(array($deckCount));

                            $cardCount = count($getCardCount->fetchAll());
                        ?>
                        <h3><?=$decksStart['name']?></h3>
                        <p><?=$decksStart['description']?></p>
                        <div>
                            <p><?=$decksStart['author']?></p>
                            <p><?= $cardCount?> termes</p>
                        </div>
                    </div>
                </a>
            <?php
            $deckCount--;
            }
            ?>
        </div>
    </section>
    <script src="scripts/script.js"></script>
</body>
</html>