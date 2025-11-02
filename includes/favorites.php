<?php require('actions/getFavoriteAction.php');?>
<div id="favoriteList">
    <?php
    if(count($getAllFavoritesId) > 0){
        for ($i=0; $i < (count($getAllFavoritesId) - 1); $i++) { 
            $getDecksInfos = $bdd->prepare('SELECT * FROM unicard_decks WHERE id = ?');
            $getDecksInfos->execute(array($getAllFavoritesId[$i]));

            $deckInfos = $getDecksInfos->fetch();
            ?>
            <div class="deckCard">
                <h3><?=$deckInfos['name']?></h3>
                <p><?=$deckInfos['description']?></p>
                <div>
                    <p><?=$deckInfos['author']?></p>   
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>