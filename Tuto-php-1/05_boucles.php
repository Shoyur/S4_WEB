
<?php

    $nouvelles[0] = "Wow!";

    // for, while, do while

    // for x=0 x<count(...) x++

    // foreach POUR LES ARRAYS !
    foreach($nouvelles as $nouvelle) {
        echo "FOREACH -> " . $nouvelle . "<br>";
    }

    // AVEC index :
    foreach($nouvelles as $wohh => $nouvelle) {
        echo $wohh + 1 . " -> ".$nouvelle . "<br>";
    }

    // avec key / value :
    $couleurs = [
        1 => "rouge",
        2 => "bleu",
        3 => "jaune",
        4 => "vert",
        5 => "blanc",
        6 => "noir"
    ];
    foreach($couleurs as $clé => $valeur) {
        echo "$clé = $valeur<br>";
    }




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
