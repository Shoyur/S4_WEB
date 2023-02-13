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
        $titre = $_POST['titre'];
        $duree = $_POST['duree'];
        $repPochettes = "../pochettes/";

        $nouveauNom = "avatar.png";

        // Si un fichier a été uploadé
        if($_FILES['pochette']['tmp_name'] != ""){
            $tmpFic = $_FILES['pochette']['tmp_name'];
            $nomOriginal = $_FILES['pochette']['name'];
            $extension = strrchr($nomOriginal,'.');
            $nouveauNom = sha1($titre.time()).$extension;
            @move_uploaded_file($tmpFic, $repPochettes.$nouveauNom);
        }

        // Pas besoin de mettre le code dans une fonction
        // mais cela sert à expliquer l'utilisation des variables globales. 
        function executerRequette(){
            global $connexion, $titre, $duree, $nouveauNom;
            $requette = "INSERT INTO films  VALUES(0, ?, ?, ?)";
            $stmt = $connexion->prepare($requette);
            $stmt->execute([$titre, $duree, $nouveauNom]);
            unset($connexion); //Detruire la connexion		
        }
        executerRequette();
        echo "Film ".$titre." bien enregistre";
        header('Location:../../index.php?msg=Film+bien+enregistré');
        exit();
    ?>
</body>
</html>