<!-- on peut se connecter à la BD avec soit -->
<!-- mysqli (seulement pour MySQL) ou pdo (fonctionne pour environ 12 BD, vraiment mieux) -->

<?php

    define("DB_HOST", "localhost");
    define("DB_USER", "Brad");
    define("DB_PASS", "123456");
    define("DB_NAME", "php_dev");

    // Créer une connexion :
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Vérifier une connexion :
    if ($conn->connect_error) {
        die("Connexion échouée: $conn->connect_error");
    }
    // echo "CONNECTÉ";

?>