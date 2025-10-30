<?php
    require('actions/database.php');
    require('actions/createDeckAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | Création</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <script src="scripts/script.js"></script>
    <section id="create">
        <div>
            <form method="POST">
                <h2>Créer un deck</h2>
                <label for="title">Titre du deck</label>
                <input type="text" name="title" required>

                <label for="description">Description</label>
                <textarea name="description"></textarea>

                <input type="submit" value="Créer" name="submitDeck">
            </form>
        </div>
        <div>
            <form id="createDivForm" method="POST">
                <select name="selectDeck" onchange="getDeck(this.value)">
                    <?php
                        $getAllDecks = $bdd->prepare('SELECT * FROM unicard_decks WHERE author = ?');
                        $getAllDecks->execute(array($_SESSION['username']));
                        
                        while($deck = $getAllDecks->fetch()){
                    ?>
                        <option value="<?=$deck['id'];?>"><?=$deck['name'];?></option>
                    <?php
                    }
                    ?>
                </select>
                
                <div id="cards">
                    <div>
                        <label for="cardContent">Terme</label>
                        <input type="text" name="cardContent">
                        
                        <label for="cardContent">Définition</label>
                        <input type="text" name="cardDefinition">
                    </div>
                </div>

                <button onclick="addCard()">+</button>
                <input type="submit" value="Créer" name="submitCards">
            </form>
        </div>
    </section>
    
</body>
</html>