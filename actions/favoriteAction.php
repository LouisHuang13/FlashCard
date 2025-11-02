<?php
        $checkIfFavoriteExists = $bdd->prepare('SELECT id FROM unicard_favorites WHERE id_deck = ? AND id_user = ?');
        $checkIfFavoriteExists->execute(array($_GET['id'], $_SESSION['id']));

        $favoriteInfos = $checkIfFavoriteExists->fetch();

        if($checkIfFavoriteExists->rowCount() > 0){
            $src = 'images/unfavorite.png';
        }else{
            $src = 'images/favorite.png';
        }
        
if(isset($_POST['favorite'])){
        
        $deckId = $_POST['deckId'];
        $userId = $_SESSION['id'];

        //Check si le deck existe
        $checkIfFavoriteExists = $bdd->prepare('SELECT id FROM unicard_favorites WHERE id_deck = ? AND id_user = ?');
        $checkIfFavoriteExists->execute(array($deckId, $userId));

        $favoriteInfos = $checkIfFavoriteExists->fetch();

        if($checkIfFavoriteExists->rowCount() > 0){
            $deleteFavorite = $bdd->prepare('DELETE FROM unicard_favorites WHERE id_deck = ? AND id_user = ?');
            $deleteFavorite->execute(array($deckId, $userId));

            $src = 'images/favorite.png';
        }else{
            $insertFavorite = $bdd->prepare('INSERT INTO unicard_favorites(id_deck, id_user) VALUES(?, ?)');
            $insertFavorite->execute(array($deckId, $userId));

            $src = 'images/unfavorite.png';
        }

}
?>