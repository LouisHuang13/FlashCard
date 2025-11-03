<?php

    if(isset($_POST['eraseDeck'])){
        $eraseDeck = $bdd->prepare('DELETE FROM unicard_decks WHERE id = ?');
        $eraseDeck->execute(array($_POST['deckId']));

        header('Location: decks.php');
    }

?>