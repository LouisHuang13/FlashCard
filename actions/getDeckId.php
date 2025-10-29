<?php
require("database.php");
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $getCards = $bdd->prepare("SELECT * FROM unicard_cards WHERE id_deck = ?");
    $getCards->execute([$_POST["deckId"]]);

    $cards = $getCards->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cards);
}
?>