<?php

// variables toujours dispo dans tou sles scopes

// commencent tous par $_
// ex. $_SERVER
// echo var_dump($_SERVER);
// exemple :
echo $_SERVER["DOCUMENT_ROOT"]; // = le chemin de ce fichier
echo "<br>";
echo $_SERVER["HTTP_USER_AGENT"]; // = le client, moi = firefox etc.







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
    <h1> <?php echo "TESTx"; ?> </h1>
</body>
</html>
