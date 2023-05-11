<div class="wrapper">
    <div class="form-box login">
        <h2>Connexion</h2>
        <form action="index.php?route=check_login" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                <input type="text" id="login" name="login" required>
                <label>Nom d'utilisateur</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" id="password" name="password" required>
                <label>Mot de passe</label>
            </div>
            <div class="remember">
                <label>
                    <input type="checkbox"> Se souvenir
                </label>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>