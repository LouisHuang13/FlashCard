<?php 
require("database.php");

    $getInfoCours = $bdd->prepare('SELECT * FROM unicard_classes WHERE id = ?');
    $getInfoCours->execute([$_GET['idCours']]);

?>
