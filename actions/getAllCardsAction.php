<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $getAllCards = $bdd->prepare('SELECT * FROM unicard_cards WHERE id_deck = ?');
        $getAllCards->execute(array($_GET['id']));
    }else{
    }

?>