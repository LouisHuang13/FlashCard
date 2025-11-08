<?php

    if(isset($_POST['delete']) && isset($_POST['deleteValue'])){
        $deleteCours = $bdd->prepare('DELETE FROM unicard_classes WHERE id = ?');
        $deleteCours->execute([$_POST['deleteValue']]);
    }
?>