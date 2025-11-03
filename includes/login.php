<section id="login">
    <button onclick="openLoginMenu(false)">x</button>
    <div>
        <h2>Se connecter</h2>
        <form method="POST">
            <div>
                <label for="username">Identifiant</label>
                <input type="text" name="username">
            </div>
            <div>
                <label for="mail">Mot de passe</label>
                <input type="password" name="password">
            </div>

            <input type="submit" name="submit">
        </form>
        <p>*si le compte n'existe pas ça va le créer automatiquement, donc mémorisez vos identifiants, les comptes sont différenciés par les identifiants</p>
    </div>
</section>