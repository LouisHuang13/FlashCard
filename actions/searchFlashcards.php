<?php 
require("database.php");
$getAllDecksStart = $bdd->query('SELECT * FROM unicard_decks ORDER BY id DESC');
$getAllDecksCount = $bdd->query('SELECT id FROM unicard_decks ORDER BY id DESC');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if(isset($_POST['search']) && !empty($_POST['search'])){
        $getAllDecks = $bdd->prepare('SELECT * FROM unicard_decks WHERE name LIKE ? ORDER BY id DESC');
        $getAllDecks->execute(array('%'.$_POST['search'].'%'));
    }else{
        $getAllDecks = $bdd->query('SELECT * FROM unicard_decks ORDER BY id DESC');
    }
    
    $decks = $getAllDecks->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["decks" => $decks]);
}
?>
