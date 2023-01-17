<?php

// session : gardent de l'info dans des variables, pour plusieurs pages,
// mais au contraire des cookies, garde plutôt sur le serveur




if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST['password'];
    if ($username == "Jean" && $password == "password") {
        $_SESSION['username'] = $username;
        // print_r($_SESSION);
        header("Location: /S4_WEB/TraversyTuto/extras/config.php");
    }
    else {
        echo "Mauvais Login...";
    }
    // echo "[ " . $n1 . " + " . $n2 . " = " . $n1 + $n2 . " ]<br><br>";


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
            <label for="username">Nom d'usager : </label>
            <input type="text" name="username" id="">
        </div>
        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="">
        </div>
        <input type="submit" value="enregistrer" name="submit">
    </form>
</body>
</html>

