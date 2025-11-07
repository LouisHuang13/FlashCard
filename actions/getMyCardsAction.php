<?php 
require("database.php");

    $getMyCards = $bdd->prepare('SELECT * FROM unicard_decks WHERE author = ?');
    $getMyCards->execute([$_SESSION['username']]);
?>
