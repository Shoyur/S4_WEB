<?php
session_start();
// echo session_start();

// print_r($_SESSION);

if (isset($_SESSION['username'])) {
    echo "<h1>Bienvenue " . $_SESSION['username'] . "</h1>";
    echo "<a href='/S4_WEB/TraversyTuto/extras/logout.php'>Déconnecter</a>";
}
else {
    echo "<h1>Bienvenue INCONNU !!!</h1>";
    echo "<a href='/S4_WEB/TraversyTuto/13_sessions.php'>Acceuil</a>";
}


?>
