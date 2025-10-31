<?php

try {
    if(session_status() != 2) session_start();
    $bdd = new PDO("mysql:host=localhost;dbname=unicard;charset=utf8", "root", "root");
    error_reporting(E_ALL);

}catch (PDOException $e) 
{
    try {
        if(session_status() != 2) session_start();
        $bdd = new PDO("mysql:host=localhost;dbname=db-huanglou;charset=utf8", "usr-huanglou", "V78YOh2xj=Pi");
    } catch (PDOException $e) {
        die('Une erreur a été trouvée : '. $e->getMessage());
    }    
}

?>