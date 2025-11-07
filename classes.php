<?php
    require('actions/searchCours.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | Cours</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <?php require_once('includes/favorites.php')?>
    <section id="searchPage">
        <form>
            <input type="search" name="searchBar" placeholder="Recherchez..." oninput="searchCours(this.value)">
        </form>
        <div id="decksContainer">
            <?php while($coursStart = $getAllCoursStart->fetch()){
            ?>
                <a href='class.php?idCours=<?=$coursStart['id']?>'>
                    <div class="deckCard">
                        <h3><?=$coursStart['title']?></h3>
                        <p><?=$coursStart['description']?></p>
                        <div>
                            <?php
                                $getUs = $bdd->prepare('SELECT * FROM unicard_users WHERE id = ?');
                                $getUs->execute([$coursStart['author']]);
                                $getUs = $getUs->fetch();
                            ?>
                            <p>
                                <?=$getUs['username'];?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php
            $deckCount--;
            }
            ?>
        </div>
    </section>
    <script src="scripts/script.js"></script>
</body>
</html>