<?php 
require("database.php");
$getAllDecksStart = $bdd->query('SELECT * FROM unicard_decks ORDER BY id DESC');
$getAllDecksCount = $bdd->query('SELECT id FROM unicard_decks ORDER BY id DESC');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['search']) && !empty($_POST['search'])){
        $getAllDecks = $bdd->prepare('SELECT unicard_decks.*,  COUNT(unicard_cards.id) AS nbCards FROM unicard_decks LEFT JOIN unicard_cards ON unicard_cards.id_deck = unicard_decks.id WHERE unicard_decks.name LIKE ? GROUP BY unicard_decks.id ORDER BY unicard_decks.id DESC;');
        $getAllDecks->execute(array('%'.$_POST['search'].'%'));
    }else{
        $getAllDecks = $bdd->query('SELECT unicard_decks.*, COUNT(unicard_cards.id) AS nbCards FROM unicard_decks LEFT JOIN unicard_cards ON unicard_cards.id_deck = unicard_decks.id GROUP BY unicard_decks.id ORDER BY unicard_decks.id DESC');
    }
    
    $decks = $getAllDecks->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["decks" => $decks]);
    
}
?>
