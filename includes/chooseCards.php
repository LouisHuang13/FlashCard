<?php
    require('actions/getMyCardsAction.php');
?>

<div id="chooseCards">
    <div>
        <?php while($myCards = $getMyCards->fetch()){
            ?>
                    <div class="deckCard" onclick="addToClass(<?=$myCards['id'];?>, '<?=$myCards['name'];?>')">
                        <?php 
                            $getCardCount = $bdd->prepare('SELECT id FROM unicard_cards WHERE id_deck = ?');
                            $getCardCount->execute(array($myCards['id']));

                            $cardCount = count($getCardCount->fetchAll());
                        ?>
                        <h3><?=$myCards['name']?></h3>
                        <p><?=$myCards['description']?></p>
                        <div>
                            <p><?=$myCards['author']?></p>
                            <p><?= $cardCount?> termes</p>
                        </div>
                    </div>
            <?php
            $deckCount--;
        }
        ?>
    </div>
</div>