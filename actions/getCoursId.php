<?php
require("database.php");
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $getCours = $bdd->prepare("SELECT * FROM unicard_classes WHERE id = ?");
    $getCours->execute([$_POST["coursId"]]);

    $cours = $getCours->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["cours" => $cours]);
}
?>