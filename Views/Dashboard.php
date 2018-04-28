<? require_once(dirname(__DIR__) . "/Views/Common/Header.php") ?>

<body class="" style="height: 100vh">
<nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand text-light" href="<?= $url ?>dashboard"><?= $website_title ?></a>
</nav>

<div class="d-flex justify-content-center">
    <div class="table-responsive mt-5 w-75">
        <table id="status-table" class="table table-sm table-hover table-striped table-borderless table-dark">
            <thead class="bg-primary">
            <tr class="text-center text-light">
                <th scope="col">N° Dossier</th>
                <th scope="col">Nom</th>
                <th scope="col">Date</th>
                <th scope="col">Informations complémentaires</th>
                <th scope="col">Caractéristiques de l'inspection</th>
                <th scope="col">Statut</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                <th scope="row">-</th>
                <td>La villa du soleil</td>
                <td>06/06/2018</td>
                <td>
                    <a href="">Voir</a>
                </td>
                <td>Non renseigné</td>
                <td class="bg-danger">
                    <i class="mdi mdi-clear text-light"></i>
                </td>
            </tr>
            <tr>
                <th scope="row">-</th>
                <td>Les champs bleutés</td>
                <td>06/03/2018</td>
                <td>
                    <a href="">Voir</a>
                </td>
                <td>
                    <a href="">Voir</a>
                </td>
                <td class="bg-success">
                    <i class="mdi mdi-done text-light"></i>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<button type="button" id="redirect-create-folder" class="btn btn-primary rounded-circle custom-fixed-top-right mr-5 mb-5 custom-rounded-button">
    <p class="custom-text-rounded-button">+</p>
</button>

<? require_once(dirname(__DIR__) . "/Views/Common/Scripts.php") ?>
</body>
</html>