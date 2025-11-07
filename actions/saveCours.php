<?php 
require("database.php");
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $idCours = $_POST['idCours']; 
    $content = $_POST['content'];

    $addContent = $bdd->prepare('UPDATE unicard_classes SET text = ? WHERE id = ?');
    $addContent->execute(array($content, $idCours));

    echo json_encode('Contenu envoyé');
}

?>