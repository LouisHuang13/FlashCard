<?php require('actions/database.php');?>

<nav>
    <div>
        <a href="index.php"><img src="images/logo.png" alt=""></a>
        <a href="flashcards.php" class="hoverLink">Les Flashcards</a>
    </div>
    <div>
        <a href="createFlashCard.php" class="hoverLink">+ Créer et modifier</a>
        <?php
            if(isset($_SESSION['auth'])){
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