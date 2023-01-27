<<?php 
    //Établir connexion à la BD
    require_once("../includes/bdconfig.inc.php");
    $msg="Membre+bien+enregistré.";
    //Recupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $courriel = $_POST['courriel'];
    $sexe = $_POST['sexe'];
    $daten = $_POST['daten'];
    $pass = $_POST['pass'];

    $dossier="photos/";
	$photo="avatar.jpg";
	if($_FILES['photo']['tmp_name']!==""){
		$nomPhoto=sha1($nom.time());
		//Upload de la photo
		$tmp = $_FILES['photo']['tmp_name'];
		$fichier= $_FILES['photo']['name'];
		$extension=strrchr($fichier,'.');
		@move_uploaded_file($tmp,$dossier.$nomPhoto.$extension);
		// Enlever le fichier temporaire chargé
		@unlink($tmp); //effacer le fichier temporaire
		$photo=$nomPhoto.$extension;
	}
	try{
		$requete = "INSERT INTO membres VAlUES (0,?,?,?,?,?,?)";
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("ssssss", $prenom,$nom,$courriel,$sexe,$daten,$photo);
        $stmt->execute();
        $idm = $connexion->insert_id;

        $requete = "INSERT INTO connexion VAlUES (?,?,?,'M','A')";
        $stmt = $connexion->prepare($requete);
        $stmt->bind_param("iss", $idm,$courriel,$pass);
        $stmt->execute();
	} catch(Exception $e){
		//Retourner le message voulu
        $msg="Problème+pour+enregistrer+le+membre.";
	}finally {
		mysqli_close($connexion);
        header('Location:../../index.php?msg=Membre+bien+enregistré');
        exit;
        //echo "<h3>Membre bien enregistré.<h3>";
    }
?>
<!-- <br/><br/>
<a href="../../index.php">Retour à la page d'accueil</a> -->
