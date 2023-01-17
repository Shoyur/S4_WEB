<?php


if (isset($_POST['add'])) {
    echo $_POST['n1'] . " + " . $_POST['n2'] . " = " . $_POST['n1'] + $_POST['n2'] . "<br><br>";


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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
