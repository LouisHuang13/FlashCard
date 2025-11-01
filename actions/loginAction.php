<?php
if(isset($_POST['submit'])){
    //Vérification des champs
    if(!empty($_POST["username"]) && !empty($_POST["password"]))
    {
        //Données de user
        $user_username = htmlspecialchars($_POST['username']);
        $user_password = htmlspecialchars($_POST['password']);

        //Check si l'user existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM unicard_users WHERE username = ?');
        $checkIfUserExists->execute(array($user_username));

        $usersInfos = $checkIfUserExists->fetch();

        //Regarde le mot de passe dans le cas de la réussite
        if($checkIfUserExists->rowCount() > 0)
        {
            if(password_verify($user_password, $usersInfos['password']))
            {
                //auth user
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['username'] = $usersInfos['username'];
                echo '<div id="error"><p>Connexion réussie :)</p></div>';

            }else
            {
                echo '<div id="error"><p>Mot de passe incorrect</p></div>';
            }
        }else
        {
            $insertUser = $bdd->prepare('INSERT INTO unicard_users(username, password) VALUES(?, ?)');
            $insertUser->execute(array($user_username, password_hash($user_password, PASSWORD_DEFAULT)));

            $getUserInfos = $bdd->prepare('SELECT * FROM unicard_users WHERE username = ?');
            $getUserInfos->execute(array($user_username));

            $usersInfos = $getUserInfos->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['username'] = $usersInfos['username'];
            echo '<div id="error"><p>Compte crée avec succès :)</p></div>';
        }

    }
}
?>