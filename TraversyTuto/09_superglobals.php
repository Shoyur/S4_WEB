<?php

// variables toujours dispo dans tou sles scopes

// commencent tous par $_
// ex. $_SERVER
// echo var_dump($_SERVER);
// exemple :
echo $_SERVER["DOCUMENT_ROOT"]; // = le chemin de ce fichier
echo "<br>";
echo $_SERVER["HTTP_USER_AGENT"]; // = le client, moi = firefox etc.

// GET exemple
echo "<br>";
echo "<br>";
echo $_GET['nom'] . " " . $_GET['age'];
echo "<br>";
echo "<br>";



// MAIS tout apparait dans le URL, 
// alors si c'est autre chose que disons un search,
//  y aller avec un $_POST






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP tuto #?</title>
</head>
<body>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?nom=Joe&age=77">CLIC!11</a>
    <br>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?nom=Fatty&age=8">CLIC!22</a>
</body>
</html>
