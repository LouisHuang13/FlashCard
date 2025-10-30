<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | Flashcards</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php require_once('includes/nav.php')?>
    <section id="searchPage">
        <form>
            <input type="search" name="searchBar" placeholder="Recherchez..." oninput="search(this.value)">
        </form>
        <div id="decksContainer">
            <hr>
        </div>
    </section>
    <script src="scripts/script.js"></script>
</body>
</html>