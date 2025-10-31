<?php

    if(isset($_POST['eraseDeck'])){
        $eraseDeckCards = $bdd->prepare('DELETE FROM unicard_cards WHERE id_deck = ?');
        $eraseDeckCards->execute(array($_POST['deckId']));

        $eraseDeck = $bdd->prepare('DELETE FROM unicard_decks WHERE id = ?');
        $eraseDeck->execute(array($_POST['deckId']));

        header('Location: flashcards.php');
    }

?>