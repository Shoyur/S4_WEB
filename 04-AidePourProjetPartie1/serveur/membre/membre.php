<?php
    session_start();
    // Pas connecté
    if(!isset($_SESSION['courriel'])){
         header('Location: ../../index.php?msg=Vous+devez+vous+contacter!');
         exit;
    }
    $msg="";
    // if(isset($_GET['msg'])){
    //     $msg = $_GET['msg'];
    // }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link rel="stylesheet" href="../../client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../client/utilitaires/icons-1.8.1/bootstrap-icons.css">
    <link rel="stylesheet" href="../../client/css/style.css">
    <script src="../../client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="../../client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="../../client/js/global.js"></script>
</head>
<body  onLoad='initialiser("<?php echo $msg; ?>");'> 
    <!-- Barre navigation -->
        <nav class="navbar navbar-expand-lg bg-nav-perso">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Membre</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#enregModal" href="#">Mon profil</a>
                        </li> 
                    </ul>
                    
                </div>
                <ul class="navbar-nav ul2navbar">
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#enregModal" href="#"><i class="bi-cart"></i><span id="cp">(0)</span></a>
                        </li>
                        <li class="nav-item  ul2navbar">
                            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalConnexion" href="#">Déconnexion</a>
                        </li>
                    </ul>
            </div>
        </nav>
        
    <!-- Fin barre navigation -->
</body>
</html>