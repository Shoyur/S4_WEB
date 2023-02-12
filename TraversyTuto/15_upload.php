<?php

    if (isset($_POST['submit'])) {

        $possiblesExt = array('png', 'jpeg', 'jpg', 'bmp', 'gif');

        if (!empty($_FILES['upload']['name'])) {

            // faire qqchose

            // print_r($_FILES);
            // echo "<br>";

            $fichierNom = $_FILES['upload']['name'];
            $fichierGrandeur = $_FILES['upload']['size'];
            $fichierNomTemp = $_FILES['upload']['tmp_name'];
            $fichierDestination = "uploads/$fichierNom";

            $fichierExtension = explode('.', $fichierNom);
            $fichierExtension = end($fichierExtension);
            $fichierExtension = strtolower($fichierExtension);
            
            // echo "L'extension est : ".$fichierExtension;

            if (in_array($fichierExtension, $possiblesExt)) {
                if ($fichierGrandeur <= 1000000) {
                    move_uploaded_file($fichierNomTemp, $fichierDestination);
                    $message = "<p style='color: green'>Le fichier a été téléversé!</p>";
                }
                else {
                    $message = "<p style='color: red'>Le fichier est trop volumineux!</p>";
                }
            }
            else {
                $message = "<p style='color: red'>Type de fichier invalide!</p>";
            }

        }
        else {
            $message = "<p style='color: red'>Vous devez choisir un fichier!</p>";
        }
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
    <?php echo $message ?? null; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    Sélectionnez une image à téléverser:<br>
    <input type="file" name="upload" id=""><br>
    <input type="submit" value="Soumettre" name="submit">
    </form>
</body>
</html>
