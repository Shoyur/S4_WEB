
<?php

    // un commentaire

    /*
    plusieurs
    commentaires
    */

    echo "Test   "; // <- besoin de point-virgule (semi-colon) partout

    // echo - output strings ou int ou html etc.
    // on peut mettre plein de valeurs séparées par des virgules :
    echo 123, "Test", 10.5, "   ";

    // comme on le voit en LIVE, si pas de CR (carriage return) (<br>),
    // tout continu sur une même ligne

    // print fonctionne aussi masi pour une seule valeur :
    print "Ok   ";

    // echo un array ne fonctionne pas, erreur :
    $test = [1, 2, 3];
    echo "<br>";
    echo $test."<br>"; // = Warning:.....

    // mais on peut print_r
    echo "<br>";
    print_r($test);
    echo "<br>";
    print_r([4, 5, 6]);
    echo "<br>";

    // var_dump() retourne de l'info sur type, length, etc.
    echo "<br>";
    var_dump($test);
    echo "<br>";
    var_dump("Hello!");
    echo "<br>";

    // var_export() retourne détaillé
    echo "<br>";
    var_export($test);
    echo "<br>";
    var_export("Hello!");
    echo "<br>";

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
