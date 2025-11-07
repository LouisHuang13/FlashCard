<?php
if(isset($_POST['submitCours'])){
        
        $cours_title = htmlspecialchars($_POST['title']);
        $cours_description = htmlspecialchars($_POST['description']);

        //Check si le deck existe
        $checkIfDeckExists = $bdd->prepare('SELECT * FROM unicard_classes WHERE title = ? AND description = ?');
        $checkIfDeckExists->execute(array($cours_title, $cours_description));

        $deckInfos = $checkIfDeckExists->fetch();

        if($checkIfDeckExists->rowCount() > 0){

        }else{
            $insertDeck = $bdd->prepare('INSERT INTO unicard_classes(title, description, text, author) VALUES(?, ?, ?, ?)');
            $insertDeck->execute(array($cours_title, $cours_description, "",$_SESSION['id'])); 
        }

}
?>