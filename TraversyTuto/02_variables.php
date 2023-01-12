
<?php

    // Tout existe :
    // string, int, float, bool, array, object (une classe), NULL, Resource
    // Les variables commencent par $
    // commencent par lettre ou _
    // peuvent contenir a-Z, 0-9, _
    // $name par égal à $NAME

    // constante :
    define("t", 400);
    echo t;
    echo "<br>";
    echo t + t;
    echo "<br>";
    define("y", "yo!");
    echo y;
    echo "<br>";
    echo t, y;
    echo "<br>";
    // echo t + y; // impossible d'additionner int + string.
    // echo "<br>";


    // Arrays :
    $nombres = [1, 2, 3];
    $fruits = ["pommes", "oranges"];
    print_r($nombres);
    echo "<br>";
    print_r($fruits);
    echo "<br>";
    $fruits2 = array("pommes", "oranges");
    print_r($fruits2);
    echo "<br>";
    echo $fruits[1];
    echo "<br>";

    // Tableau associatif :
    $couleurs = [
        1 => "rouge",
        2 => "bleu",
        3 => "jaune",
        4 => "vert",
        5 => "blanc",
        6 => "noir"
    ];
    echo $couleurs[3];
    echo "<br>";

    $contraires = [
        "rouge" => 1,
        "bleu" => 2,
        "jaune" => 3,
        "vert" => 4,
        "blanc" => 5,
        "noir" => 6,
        "mauve" => 7,
    ];
    echo $contraires["mauve"];
    echo "<br>";

    // et cela peut être 2D avec disons
    // echo $personnes[2]["courriel"];


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
