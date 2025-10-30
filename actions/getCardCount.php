<?php
    require("database.php");
    $getCard = $bdd->prepare('SELECT id FROM unicard_cards WHERE id_deck = ?');
    $getCard->execute(array($_GET['id']));
    $getCard = count($getCard->fetch());

?>