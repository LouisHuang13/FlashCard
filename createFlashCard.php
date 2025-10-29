<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | Création</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <section id="create">
        <div>
            <form>
                <label for="title">Titre du deck</label>
                <input type="text" name="title">

                <label for="description">Description</label>
                <textarea name="description"></textarea>
            </form>
        </div>
        <div>
            <form>
                <div>
                    <label for="cardContent">Terme</label>
                    <input type="text" name="cardContent">
                    
                    <label for="cardContent">Définition</label>
                    <input type="text" name="cardDefinition">

                    <input type="submit" value="Créer">
                </div>    
            </form>
        </div>
    </section>
</body>
</html>