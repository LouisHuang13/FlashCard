<?php
if(isset($_POST['submit'])){
    
        header('Location: index.php');
        $deck_title = htmlspecialchars($_POST['title']);
        $deck_description = htmlspecialchars($_POST['description']);

        //Check si le deck existe
        $checkIfDeckExists = $bdd->prepare('SELECT * FROM unicard_decks WHERE name = ? AND description = ?');
        $checkIfDeckExists->execute(array($deck_title, $deck_desc));

        $deckInfos = $checkIfDeckExists->fetch();

        if($checkIfDeckExists->rowCount() > 0){

        }else{
            $insertDeck = $bdd->prepare('INSERT INTO unicard_decks(name, description, author) VALUES(?, ?, ?)');
            $insertDeck->execute(array($deck_title, $deck_description, $_SESSION['username']));
        }
}
?>