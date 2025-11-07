<?php 
require("database.php");
$getAllCoursStart = $bdd->query('SELECT * FROM unicard_classes ORDER BY id DESC');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

    if(isset($_POST['search']) && !empty($_POST['search'])){
        $getAllClasses = $bdd->prepare('SELECT unicard_classes.id, unicard_classes.title, unicard_classes.description, unicard_users.username FROM unicard_classes INNER JOIN unicard_users ON unicard_classes.author = unicard_users.id WHERE title LIKE ?  ORDER BY id DESC');
        $getAllClasses->execute(array('%'.$_POST['search'].'%'));
    }else{
        $getAllClasses = $bdd->query('SELECT unicard_classes.id, unicard_classes.title, unicard_classes.description, unicard_users.username FROM unicard_classes INNER JOIN unicard_users ON unicard_classes.author = unicard_users.id ORDER BY id DESC');
    }
    
    $classes = $getAllClasses->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["classes" => $classes]);
}
?>
