<? require_once(dirname(__DIR__) . "/Views/Common/Header.php") ?>

<body class="" style="height: 100vh">
<nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand text-light d-flex align-items-center" href="javascript:history.back()">
        <i class="mdi mdi-arrow-back pr-3"></i> Tableau de bord
    </a>
</nav>

<form class="w-100" method="post" action="<?= $url ?>createFolder" id="form-create-folder">
    <h6 class="h6 float-right pr-3 pt-3">
        <small class="text-danger">
            <i>*Les champs précédés d'un astérisque sont obligatoires.</i>
        </small>
    </h6>
    <div class="w-100 pl-5 pt-4 d-flex justify-content-between">
        <div class="w-50 mr-5 pr-4 border-right">
            <div class="form-group w-50">
                <label for="tradeName">Nom commercial de l'établissement<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="tradeName"
                       name="tradeName" placeholder="Exemple : Hôtel du flot" required>
            </div>
            <div class="form-group w-50">
                <label for="socialReason">Raison sociale de l'établissement<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="socialReason"
                       name="socialReason" placeholder="Exemple : SARL, EURL, SA..." required>
            </div>
            <div class="form-group w-50">
                <label for="responsibleName">Nom du responsable d’exploitation<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="responsibleName"
                       name="responsibleName" placeholder="Exemple : Jean-Michel Amoitier" required>
            </div>
            <div class="form-group w-75">
                <label for="firstAddress">Adresse 1 de l’établissement<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="firstAddress"
                       name="firstAddress" placeholder="Exemple : 17 rue du soleil" required>
            </div>
            <div class="form-group w-75">
                <label for="optionnalAddress">Adresse 2 de l’établissement</label>
                <input type="text" class="form-control" id="optionnalAddress" name="optionnalAddress">
            </div>
        </div>
        <div class="w-50 pr-5 mr-5">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="postalCode">Code Postal</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode"
                           required autocomplete="nope">
                    <small>
                        <i>Attention, cinq caractères sont requis pour ce champ !</i>
                    </small>
                </div>
                <div class="form-group col-md-6">
                    <label for="town">Commune</label>
                    <input type="text" class="form-control outline-none" id="town" readonly required>
                </div>
            </div>
            <div class="form-group w-50">
                <label for="siret">Numéro SIRET<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="siret" name="siret"
                       placeholder="Exemple : 362 521 879 00034">
            </div>
            <div class="form-group w-50">
                <label for="tel">Téléphone de l'établissement<span class="text-danger">*</span></label>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Exemple : 0468010203">
            </div>
            <div class="form-group w-75">
                <label for="email">Courriel de l'établissement<span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email"
                       name="email" placeholder="Exemple : commercial@lavilladusoleil.fr">
            </div>
            <div class="form-group w-75">
                <label for="websiteUrl">Site internet de l'établissement ou du réseau</label>
                <input type="text" class="form-control" id="websiteUrl"
                       name="websiteUrl" placeholder="Exemple : https://www.lavilladusoleil.fr/">
            </div>
        </div>
    </div>
    <div class="w-100 d-flex flex-column align-items-center mt-4 pt-5">
        <button type="submit" class="w-50 btn btn-primary btn-lg btn-block mt-2">Poursuivre</button>
        <button type="button" class="w-50 btn btn-secondary btn-lg btn-block form-reset">Réinitialiser le formulaire</button>
    </div>
</form>

<? require_once(dirname(__DIR__) . "/Views/Common/Scripts.php") ?>
</body>
</html>