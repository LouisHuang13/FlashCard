<?php
if(isset($_POST['submitCards'])){
        for ($i=1; $i <= $_POST['count']; $i++) { 
                
                $cardTitle = 'cardContent'.$i;
                $cardDesc = 'cardContent'.$i;
                $deckId = $_POST["selectDeck"];

                $checkIfCardExists = $bdd->prepare('SELECT * FROM unicard_cards WHERE id_deck = ? AND side1 = ? AND side2 = ?');
                $checkIfCardExists->execute(array($deckId, $_POST[$cardTitle], $_POST[$cardDesc]));

                if($checkIfCardExists->rowCount() > 0){
                        $updateCard = $bdd->prepare('UPDATE unicard_cards SET side1 = ?, side2 = ? WHERE id = ?');
                        $updateCard->execute(array($_POST[$cardTitle], $_POST[$cardDesc], $_POST['cardId']));
                }else{
                        $insertCard = $bdd->prepare('INSERT INTO unicard_cards(id_deck, side1, side2) VALUES(?, ?, ?)');
                        $insertCard->execute(array($deckId, $_POST[$cardTitle], $_POST[$cardDesc]));
                }

        }
}
?>