<?php
    session_start();
    $msg="";
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
    }
?>
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
<body  onLoad='initialiser("<?php echo $msg; ?>"); chargerFilms();'> 
    <!-- Barre navigation -->
        <nav class="navbar navbar-expand-lg bg-nav-perso">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Films</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#enregModal" href="#">Devenir membre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalConnexion" href="#">Connexion</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        
    <!-- Fin barre navigation -->
    <div class="container">
        <!-- Modal pour enregistrer membre -->
        <div class="modal fade" id="enregModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrer membre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="formEnreg" action="serveur/membre/enregistrer.php" method="POST" enctype="multipart/form-data" class="row g-3" onSubmit="return validerFormEnreg();">
                        <div class="col-md-6">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control is-valid" id="prenom" name="prenom" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control is-valid" id="nom" name="nom" required>
                        </div>
                        <div class="col-md-12">
                            <label for="courriel" class="form-label">Courriel</label>
                            <input type="email" class="form-control is-valid" id="courriel" name="courriel" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pass" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control is-valid" pattern="[A-Za-z0-9_\$#\.]{5,10}$" id="pass" name="pass" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cpass" class="form-label">Confirmer mot de passe</label>
                            <input type="password" class="form-control is-valid" pattern="[A-Za-z0-9_\$#\.]{5,10}$" id="cpass" name="cpass" required>
                            <span id="msgPass"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="sexe" class="form-label">Sexe</label>
                            <select class="form-select" id="sexe" name="sexe" aria-describedby="validationServer04Feedback">
                                <option selected disabled value="">Choisir</option>
                                <option value="F">Féminin</option>
                                <option value="M">Masculin</option>
                                <option value="A">Autres</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="daten" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control is-valid" id="daten" name="daten">
                        </div>
                        <div class="col-md-12">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control is-valid" id="photo" name="photo">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin du modal pour enregistrer membre -->

        <div class="modal fade" id="modalConnexion" tabindex="-1" aria-labelledby="ModalConnexionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalConnexionLabel">Connexion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" id="formConnexion" action="serveur/connexion/connexion.php" method="POST">
                            <div class="col-md-4">
                                <label for="courriel" class="form-label">Courriel</label>
                                <input type="email" class="form-control" id="courrielc" name="courrielc" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="pass" class="form-label">Mot Passe</label>
                                <input type="password" class="form-control" pattern="[A-Za-z0-9_\$#\.]{5,10}$" id="passc" name="passc" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pour le Toast  -->
        <div class="toast posToast" role="status" aria-live="polite" aria-atomic="true" data-delay="5000">
        <div class="toast-header">
            <img src="client/images/message2.png" class="rounded mr-2">
            <strong class="mr-auto">Message</strong>
            <!-- <button type="button" class="close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <div id="textToast" class="toast-body">
        </div>
        <div id="contenu"></div>
    </div>
</body>
</html>