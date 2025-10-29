<?php
if(isset($_POST['submit'])){
    //Vérification des champs
    if(!empty($_POST["mail"]) && !empty($_POST["password"]))
    {
        //Données de user
        $user_mail = htmlspecialchars($_POST['mail']);
        $user_username = htmlspecialchars($_POST['username']);
        $user_password = htmlspecialchars($_POST['password']);

        //Check si l'user existe
        $checkIfUserExists = $bdd->prepare('SELECT * FROM unicard_users WHERE mail = ?');
        $checkIfUserExists->execute(array($user_mail));

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
                $_SESSION['mail'] = $usersInfos['mail'];

            }else
            {
            }
        }else
        {
            $insertUser = $bdd->prepare('INSERT INTO unicard_users(username, mail, password) VALUES(?, ?, ?)');
            $insertUser->execute(array($user_username, $user_mail, password_hash($user_password, PASSWORD_DEFAULT)));

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['username'] = $usersInfos['username'];
            $_SESSION['mail'] = $usersInfos['mail'];
        }

    }
}
?>