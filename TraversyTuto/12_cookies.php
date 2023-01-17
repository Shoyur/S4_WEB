<?php

// cookies : gardent des infos DANS le browser

// créer un cookie :
setcookie("nom", "Jean", time() + 86400 * 30); // = 30 jours

// pour effacer, il faut reculer dans le temps
setcookie("nom", "", time());






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP tuto #?</title>
    <!-- pour exécuter le php d'en haut -->
    <?php $_SERVER["PHP_SELF"] ?> 
</head>
<body>
    <?php if (isset($_COOKIE["nom"])) { echo "Bonjour ".$_COOKIE["nom"]."!"; } ?>
</body>
</html>
