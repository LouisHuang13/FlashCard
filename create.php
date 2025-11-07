<?php
    require('actions/database.php');
    require('actions/createDeckAction.php'); require('actions/createCoursAction.php');
    require('actions/createFlashCardAction.php'); 

    if($_SESSION['auth'] == false){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uni'Card | Création</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet"/>

</head>
<body>
    <?php require_once('includes/nav.php')?>
    <?php require_once('includes/favorites.php')?>
    <script src="scripts/script.js"></script>
    <div id="chooseCreate">
        <button onclick="switchCreate('decks')">Decks</button>
        <button onclick="switchCreate('cours')">Cours</button>
    </div>
    <section class="create">
        <div>
            <form method="POST">
                <h2>Créer un deck</h2>
                <label for="title">Titre du deck</label>
                <input type="text" name="title" required>

                <label for="description">Description</label>
                <textarea name="description"></textarea>

                <input type="submit" value="Créer le deck" name="submitDeck">
            </form>
        </div>
        <div>
            <form id="createDivForm" method="POST">
                <h2>Ajoute des cartes</h2>
                <select name="selectDeck" onchange="getDeck(this.value)">
                    <option value="">-</option>
                    <?php
                        $getAllDecks = $bdd->prepare('SELECT * FROM unicard_decks WHERE author = ?');
                        $getAllDecks->execute(array($_SESSION['username']));
                        
                        while($deck = $getAllDecks->fetch()){
                    ?>
                        <option value="<?=$deck['id'];?>"><?=$deck['name'];?></option>
                    <?php
                    }
                    ?>
                </select>
                
                <div id="cardList">
                </div>
                
                <input type="hidden" name="count" id="count" value="0">
                <button onclick="addCard(event)">+</button>
                <input type="submit" value="Enregistrer le deck" name="submitCards">
            </form>
        </div>
    </section>
    <section class="create">
        <div>
            <form method="POST">
                <h2>Créer un cours</h2>
                <label for="title">Titre du cours</label>
                <input type="text" name="title" required>

                <label for="description">Description</label>
                <textarea name="description"></textarea>

                <input type="submit" value="Créer le cours" name="submitCours">
            </form>
        </div>
        <div>
            <form id="createDivForm" method="POST">
                <select name="selectCours" onchange="getCours(this.value)">
                    <option value="">-</option>
                    <?php
                        $getAllCours = $bdd->prepare('SELECT * FROM unicard_classes WHERE author = ?');
                        $getAllCours->execute(array($_SESSION['id']));
                        
                        while($cours = $getAllCours->fetch()){
                    ?>
                        <option value="<?=$cours['id'];?>"><?=$cours['title'];?></option>
                    <?php
                    }
                    ?>
                </select>
                
                <div id="editClass">
                    <div id="editor"></div>
                </div>
                
                <button onclick="saveContent(event)">Enregistrer le cours</button>
            </form>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        const toolbarOptions = [
            ['bold', 'italic', 'underline'],        // toggled buttons
            ['blockquote', 'code-block'],
            ['link', 'formula'],
        
            //[{ 'header': 1 }, { 'header': 2 }, { 'header': 3 }],               // custom button values
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'header': [1, 2, 3, false] }],
        
            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'align': [] }],
        
            ['clean']                                         // remove formatting button
        ];
        
        const quill = new Quill('#editor', {
            modules: {
            toolbar: toolbarOptions
            },
            theme: 'snow'
        });
    </script>
</body>
</html>