<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link rel="stylesheet" href="client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="client/css/style.css">
    <script src="client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="client/js/global.js"></script>
</head>
<body class="bg-image"> 
    <!-- Barre navigation -->
        <?php require_once('serveur/includes/nav.inc.php') ?>
    <!-- Fin barre navigation -->
    <div class="container">
        <!-- Modal pour enregistrer membre -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enregistrer film</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formEnreg" action="serveur/film/enregistrer.php" method="POST" enctype="multipart/form-data" class="row g-3" onSubmit="return validerFormEnreg();">
                <div class="col-md-6">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" class="form-control is-valid" id="titre" name="titre" required>
                </div>
                <div class="col-md-6">
                    <label for="duree" class="form-label">Durée</label>
                    <input type="text" class="form-control is-valid" id="duree" name="duree" required>
                </div>
                <div class="col-md-6">
                    <label for="pochette" class="form-label">Pochette</label>
                    <input type="file" class="form-control is-valid" id="pochette" name="pochette">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- Fin du modal pour enregistrer membre -->
        <form id="formLister" action="serveur/film/lister.php" method="POST"></form>
        
</body>
</html>