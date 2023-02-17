<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Trans. - Examen 1</title>
    <link rel="apple-touch-icon" sizes="180x180" href="client/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="client/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="client/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="client/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="client/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="client/css/style.css">
    <script src="client/js/global.js"></script>
    <script src="client/voyage/requetes.js"></script>
    <script src="client/voyage/vues.js"></script>
</head>
<body onLoad="requeteVoyageServeur('lister');"> 


    <!-- Barre navigation -->
    <nav class="navbar navbar-expand-lg nav-bg-perso">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Voyages</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>|<br>|
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#enregModal" href="#">Enregistrer<br>(Question a)</a>
                    </li>|<br>|
                    <li class="nav-item">
                        <a class="nav-link"  href="javascript:creerVue('lister', listeVoyages);">Lister Tout<br>(Question b)</a>
                    </li>|<br>|
                    <li class="nav-item">
                        <a class="nav-link"  href="javascript:creerVue('listerDepMtl', listeVoyages);">Départs Montreal<br>(Question c)</a>
                    </li>|<br>|
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#enleverModal" href="#">Enlever<br>(Question d)</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- Fin barre navigation -->


<div class="container">
    <div id="contenu"></div>
    <!-- Modal pour enregistrer -->
    <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enregistrer un voyage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEnreg">
                    <div class="col-md-6">
                        <label for="code" class="form-label">Code</label>
                        <input type="number" class="form-control is-valid" id="code" name="code" required>
                    </div>
                    <div class="col-md-6">
                        <label for="depart" class="form-label">Départ</label>
                        <input type="text" class="form-control is-valid" id="depart" name="depart" required>
                    </div>
                    <div class="col-md-6">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" class="form-control is-valid" id="destination" name="destination" required>
                    </div>
                    <div class="col-md-6">
                        <label for="transporteur" class="form-label">Transporteur</label>
                        <input type="text" class="form-control is-valid" id="transporteur" name="transporteur" required>
                    </div>
                    <br/>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary" onClick="requeteVoyageServeur('enregistrer');">Enregistrer</button>
                    </div>
                    <span id="msg1" class="msg"></span>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>
    <!-- Fin du modal pour enregistrer -->


    <!-- Modal pour supprimer -->
    <div class="modal fade" id="enleverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enlever les voyages selon code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEnlever">
                        <div class="col-md-6">
                            <label for="codeD" class="form-label">Code: </label>
                            <select name="codeD" id="codeD">
                            </select>
                        </div>
                        <br/>
                        <div class="col-12">
                            <button type="button" class="btn btn-primary"
                                onClick="requeteVoyageServeur('enlever');">Go</button>
                        </div>
                        <span id="msg3" class="msg"></span>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Fin du modal pour supprimer -->


</body>
</html>