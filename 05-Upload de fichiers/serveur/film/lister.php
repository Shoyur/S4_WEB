<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link rel="stylesheet" href="../../client/utilitaires/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../client/css/style.css">
    <script src="../../client/utilitaires/jquery-3.6.0.min.js"></script>
    <script src="../../client/utilitaires/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script>
    <script src="../../client/js/global.js"></script>
</head>
<body> 
    <?php
        require_once('../includes/nav.inc.php');
        require_once('../bdconfig/connexion.inc.php');

        function creerCard($ligne){
            $uneCard = <<<CARD
                <div class="card card-style" style="width: 18rem;">
                    <img src="../pochettes/$ligne->pochette" class="card-img-top img-style" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">$ligne->titre</h5>
                        <p class="card-text">$ligne->duree</p>
                    </div>
                </div>
            CARD;
            return $uneCard;
        }

        $requette = "SELECT * FROM films";
        $stmt = $connexion->prepare($requette);
        $stmt->execute();
        $contenuCards = "<div class='container'><div class='row'>";
        while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
            $contenuCards .= creerCard($ligne);
        }
        unset($connexion); //Detruire la connexion
        $contenuCards .= "</div></div>";
        echo $contenuCards;
        		
    ?>
    <?php 
        require_once('../includes/formEnreg.inc.php');
        afficherFormEnreg('enregistrer.php');
    ?>
    <form id="formLister" action="lister.php" method="POST"></form>
</body>
</html>