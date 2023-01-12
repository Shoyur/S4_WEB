
<?php

    $nouvelles = [];
    if (!empty($nouvelles)) {
        echo "La 1ère nouvelle est : " . $nouvelles[0];
        echo "<br>";
    }
    else {
        echo "Il n'y a pas de nouvelle...";
        echo "<br>";
    }



    date_default_timezone_set('EST');
    $t = date("H"); // "H" = l'heure, vérifier toutes les possibilités

    if ($t < 12) {
        echo "Bon matin!<br>";
    }
    elseif ($t < 17) {
        echo "Bon après-midi!<br>";
    }
    else {
        echo "Bonne soirée!<br>";
    }

    // ou sur une seule ligne (tertiaire?) :
    echo !empty($nouvelles) ? $nouvelles[0] . "<br>" : "Il n'y a pas de nouvelle...<br>";
    $nouvelles[0] = "Wow!";
    echo !empty($nouvelles) ? $nouvelles[0] . "<br>" : "Il n'y a pas de nouvelle...<br>";

    // Si trop de elseif -> switch case.




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> <?php echo "TESTx"; ?> </h1>
</body>
</html>
