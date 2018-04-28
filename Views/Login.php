<? require_once(dirname(__DIR__) . "/Views/Common/Header.php") ?>

<body class="d-flex justify-content-center" style="height: 100vh">
<section class="w-25 h-100 d-flex align-items-center flex-column justify-content-center">
    <h1 class="text-center text-nowrap mb-5 font-weight-light h5">
        Connexion
        <small class="form-text text-muted font-weight-light">
            Veuillez-vous connecter
        </small>
    </h1>
    <? if ($error) echo "<p id=\"error-display-p\" class=\"mb-4 text-danger w-75 text-center\">$error</p>" ?>
    <form class="w-75" role="form" method="post" action="<?= $url ?>login">
        <div class="form-group">
            <label for="emailorusername">Nom d'utilisateur ou adresse mail</label>
            <input type="text" class="form-control" id="emailorusername" name="emailorusername"
                   aria-describedby="emailHelp" placeholder="Exemple ou exemple@gmail.fr" value="<?= $logger[0] ?>">
            <small id="emailHelp" class="form-text text-muted font-weight-light">Nous ne partageons pas votre adresse email.</small>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="Mot de passe" aria-describedby="passwdHelp" value="<?= $logger[1] ?>">
            <small id="psswdHelp" class="form-text text-muted float-right pt-3 pb-3">
                <a href="javascript:void()">Mot de passe oublié ?</a>
            </small>
        </div>
        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
    <div class="d-flex justify-content-between align-items-center w-75 mt-4 mb-4">
        <hr class="ml-0 mr-0 w-50">
        <p class="mt-0 mb-0 ml-3 mr-3 font-weight-light">or</p>
        <hr class="ml-0 mr-0 w-50">
    </div>
    <button type="button" class="btn btn-success w-75">S'inscrire</button>
</section>

<? require_once(dirname(__DIR__) . "/Views/Common/Scripts.php") ?>
</body>
</html>