<?php
    require_once("includes/donnees.inc.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple</title>
    <link rel="stylesheet" href="client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <script src="client/js/global.js"></script>
</head>
<body>
<?php
    function afficherTR() {
        global $tab;
        $lesTR = "";
        for ($i = 0; $i < count($tab); $i++) {
            if ($tab[$i] % 2 != 0) {
                $lesTR .= "<tr><td>".$tab[$i]."</td></tr>";
            }
        }
        return $lesTR;
    }
    $rep = <<<REPONSE
        <table class="table">
        <thead>
            <tr>
            <th>Nombres impairs</th>
            </tr>
        </thead>
        <tbody>
    REPONSE;
    $rep .= afficherTR();
    $rep .= "</tbody></table>";
    echo $rep;
?>
</body>
</html>