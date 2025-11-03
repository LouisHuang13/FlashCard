<?php require('actions/getFavoriteAction.php');?>
<?php if($_SESSION){
    ?>
    <div id="favoriteList">
        <p onclick='openFavorites(false)'>X</p>
        <h4>Vos favoris</h4>
        <?php
        if(count($getAllFavoritesId) > 0){

            for ($i=0; $i < (count($getAllFavoritesId)); $i++) { 
                $getDecksInfos = $bdd->prepare('SELECT * FROM unicard_decks WHERE id = ?');
                $getDecksInfos->execute(array($getAllFavoritesId[$i]['id_deck']));

                $deckInfos = $getDecksInfos->fetch();

                $getCardCount = $bdd->prepare('SELECT id FROM unicard_cards WHERE id_deck = ?');
                $getCardCount->execute(array($getAllFavoritesId[$i]['id_deck']));

                $cardCount = count($getCardCount->fetchAll());
                ?>
                <a href="deck.php?id=<?=$deckInfos['id']?>">
                <div class="deckCard">
                    <h3><?=$deckInfos['name']?></h3>
                    <p><?=$deckInfos['description']?></p>
                    <div>
                        <p><?=$deckInfos['author']?></p>
                        <p><?= $cardCount?> termes</p>
                    </div>
                </div>
                </a>
                <?php
            }
        }
        ?>
    </div>
    <?php
    }
?>