<?php

// pour être certain que personne ne peut faire passer
// du javascript ou une exécution par le post
// ->


if (isset($_POST['add'])) {
    $n1 = filter_input(INPUT_POST, 'n1', FILTER_SANITIZE_SPECIAL_CHARS);
    $n2 = htmlspecialchars($_POST['n2']);
    echo "[ " . $n1 . " + " . $n2 . " = " . $n1 + $n2 . " ]<br><br>";


}


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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div>
            <label for="n1">Nombre #1 : </label>
            <input type="text" name="n1" id="">
        </div>
        <div>
            <label for="n2">Nombre #2 : </label>
            <input type="text" name="n2" id="">
        </div>
        <input type="submit" value="Additionner" name="add">
    </form>
</body>
</html>
