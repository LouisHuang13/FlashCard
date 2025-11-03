<?php require('actions/database.php');?>

<nav>
    <div>
        <?php if($_SESSION){
            ?>
        <img src="images/burger.png" onclick="openFavorites(true)"/>
        <?php
        }
        ?>
        <a href="index.php"><img src="images/logo.png" alt=""></a>
        <a href="decks.php" class="hoverLink">Les Decks</a>
    </div>
    <div>
        <?php if($_SESSION){
        ?>
        <a href="createFlashCard.php" class="hoverLink">+ Créer</a>
        <?php
        }
        ?>
        <?php
            if(isset($_SESSION['auth'])){
        ?>
            <?php 
                if(isset($_GET['id'])){
            ?>
            <img src="images/tutorial.png" alt="" onclick="showTuto()">
                <div id="tutorial">
                    <p>Pour pouvoir utiliser les flashcards, il suffit d'utiliser les fleches directionnelles ("< ; >"). Lorsque le deck est fini une pression supplémentaire est nécessaire pour finir. 🤍</p>
                    <p>Pour pouvoir utiliser les flashcards, il suffit d'appuyer sur les boutons/compteurs 'Acquis' et 'En cours'. Lorsque le deck est fini une pression supplémentaire est nécessaire pour finir. 🤍</p>
                </div>
                <form method="POST">
                    <button id="favoriteButton" name="favorite"><img src="<?=$src?>" alt=""></button>
                    <input type="hidden" name="deckId" value="<?=$_GET['id']?>">
                </form>
                <?php 
                    $checkUser = $bdd->prepare('SELECT author FROM unicard_decks WHERE id = ?');
                    $checkUser->execute(array($_GET['id']));
                    $checkUser = $checkUser->fetch();
                    if($checkUser[0] === $_SESSION['username']){
                ?>
                    <form method="POST">
                        <input type="hidden" name="deckId" value="<?=$_GET['id']?>">
                        <button name="eraseDeck" id="eraseDeck"><img src="images/delete.png" alt=""></button>
                    </form>
            <?php
            }
            ?>
            <?php
            }
            ?>
            <a href="actions/logoutAction.php"><img src="images/disconnect.png" alt=""></a>
        <?php
        }
        else{
        ?>
            <button onclick="openLoginMenu(true)">Se Connecter</button>
        <?php  
        }
        ?>
    </div>
</nav>
