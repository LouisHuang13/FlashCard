<?php require('actions/database.php');?>

<nav>
    <div>
        <a href="index.php"><img src="images/logo.png" alt=""></a>
        <a href="decks.php" class="hoverLink">Les Decks</a>
    </div>
    <div>
        <a href="createFlashCard.php" class="hoverLink">+ Créer et modifier</a>
        <?php
            if(isset($_SESSION['auth'])){
        ?>
            <?php 
                if(isset($_GET['id'])){
            ?>
            <img src="images/tutorial.png" alt="" onclick="showTuto()">
                <div id="tutorial">
                    <p>Pour pouvoir utiliser les flashcards, il suffit d'utiliser les fleches directionnelles ("< ; >")</p>
                </div>
                <form method="POST">
                    <button id="favoriteButton" name="favorite"><img src="<?=$src?>" alt=""></button>
                    <input type="hidden" name="deckId" value="<?=$_GET['id']?>">
                </form>
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
