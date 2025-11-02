<?php require('actions/getFavoriteAction.php');?>
<div id="favoriteList">
    <p onclick='openFavorites(false)'>X</p>
    <?php
    if(count($getAllFavoritesId) > 0){

        for ($i=0; $i < (count($getAllFavoritesId)); $i++) { 
            $getDecksInfos = $bdd->prepare('SELECT * FROM unicard_decks WHERE id = ?');
            $getDecksInfos->execute(array($getAllFavoritesId[$i]['id_deck']));

            $deckInfos = $getDecksInfos->fetch();
            ?>
            <a href="deck.php?id=<?=$deckInfos['id']?>">
            <div class="deckCard">
                <h3><?=$deckInfos['name']?></h3>
                <p><?=$deckInfos['description']?></p>
                <div>
                    <p><?=$deckInfos['author']?></p>   
                </div>
            </div>
            </a>
            <?php
        }
    }
    ?>
</div>