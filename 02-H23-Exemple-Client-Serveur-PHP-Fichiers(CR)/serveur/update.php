 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple</title>
    <link rel="stylesheet" href="../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../client/css/style.css">
    <script src="../client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="../client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <script src="../client/js/global.js"></script>
</head>
<body>
    <h2>MODIFICATION D'UN FILM</h2> 
        <?php
            $trouve = false;
            $titre = $_POST['titre'];
            $fichier = file("donnees/films.txt"); // pour copier le contenu
            $nouveauFicher = fopen("donnees/films.txt", "w"); // ouvrir encore, mais w remet à zéro, donc ça va écraser
            foreach ($fichier as $ligne) {
                $tab = explode(";", $ligne);
                echo "console.log(".$tab[0].")";
                if (!strcasecmp($tab[0], $titre)) { // si on ne trouve pas, alors la réécrire
                    fputs($nouveauFicher, $ligne); //place $ligne dans le nouveau fichier
                }
                else {
                    $trouve = true; // on a trouvé, donc on met à jour
                    fputs($nouveauFicher, $titre . ";" . $_POST['res'] . ";" . $_POST['duree']);
                }
            }
            fclose($nouveauFicher);
            if ($trouve) { echo "Film ".$titre." modifié avec succès."; }
            else { echo "Film ".$titre." est introuvable."; }
            // on peut aussi avec file_put_content, etc.

        ?>
    <br>
    <a href="../index.html">Retour à la page d'accueil</a> 
</body>
</html>