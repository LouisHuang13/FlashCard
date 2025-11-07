<?php
if(isset($_POST['submitCours'])){
        
        $cours_title = htmlspecialchars($_POST['title']);
        $cours_description = htmlspecialchars($_POST['description']);

        //Check si le deck existe
        $checkIfCoursExists = $bdd->prepare('SELECT * FROM unicard_classes WHERE title = ? AND description = ?');
        $checkIfCoursExists->execute(array($cours_title, $cours_description));

        $coursInfos = $checkIfCoursExists->fetch();

        if($checkIfCoursExists->rowCount() > 0){

        }else{
            $insertCours = $bdd->prepare('INSERT INTO unicard_classes(title, description, text, author) VALUES(?, ?, ?, ?)');
            $insertCours->execute(array($cours_title, $cours_description, "",$_SESSION['id'])); 
        }

}
?>