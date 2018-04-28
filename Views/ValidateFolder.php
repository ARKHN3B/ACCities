<? require_once(dirname(__DIR__) . "/Views/Common/Header.php") ?>

<body class="" style="height: 100vh">
<nav class="navbar navbar-light bg-dark">
    <a class="navbar-brand text-light d-flex align-items-center" href="javascript:history.back()">
        <i class="mdi mdi-arrow-back pr-3"></i> Tableau de bord
    </a>
</nav>

<form class="w-100">
    <h6 class="h6 float-right pr-3 pt-3">
        <small class="text-danger">
            <i>*Les champs précédés d'un astérisque sont obligatoires.</i>
        </small>
    </h6>
    <div class="w-100 pt-4 d-flex flex-column align-items-center">
        <div class="form-group w-25">
            <label for="visitDate">Date de la visite d'inspection<span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="visitDate" name="visitDate">
        </div>
        <div class="form-group w-25">
            <label for="dateDocumentIssue">Date d'émission du document<span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="dateDocumentIssue" name="dateDocumentIssue">
        </div>
        <div class="form-group w-25">
            <label for="currentRanking">Classement actuel<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="currentRanking" name="currentRanking">
        </div>
        <div class="form-group w-25">
            <label for="rankingRequest">Classement sollicité<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="rankingRequest" name="rankingRequest">
        </div>
        <div class="form-group w-25">
            <label for="numberRooms">Nombre total de chambres<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="numberRooms" name="numberRooms">
        </div>
        <div class="form-group w-25">
            <label for="numberFloors">Nombre d'étage(s)<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="numberFloors" name="numberFloors">
        </div>
        <div class="form-group w-25">
            <label for="numberBuildings">Nombre de bâtiment(s)<span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="numberBuildings" name="numberBuildings">
        </div>
    </div>
    <div class="w-100 d-flex flex-column align-items-center mt-4 pt-5">
        <button type="submit" class="w-25 btn btn-primary btn-lg btn-block mt-2">Valider</button>
        <button type="button" id="btn-backtodashboard" class="w-25 btn btn-danger btn-lg btn-block">Remettre à plus tard</button>
    </div>
</form>

<? require_once(dirname(__DIR__) . "/Views/Common/Scripts.php") ?>
</body>
</html>