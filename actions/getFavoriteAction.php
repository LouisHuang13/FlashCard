<?php

    $getAllFavoritesId = $bdd->prepare('SELECT id_deck FROM unicard_favorites WHERE id_user = ?');
    $getAllFavoritesId->execute(array($_SESSION['id']));
    $getAllFavoritesId = $getAllFavoritesId->fetch();

    for ($i=0; $i < count($getAllFavoritesId); $i++) { 
        
    }

?>