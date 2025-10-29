<?php
if(isset($_POST['submit'])){
        //Check si le deck existe
        $checkIfDeckExists = $bdd->prepare('SELECT * FROM unicard_users WHERE mail = ?');
        $checkIfUserExists->execute(array($user_mail));

        $usersInfos = $checkIfUserExists->fetch();
}
?>