<?php

   require_once('../includes/connexion.inc.php');

   $reponse = array();

   function create(){
        global $connexion, $reponse;
        $numFilm = $_POST['numFilm'];
        $titre = $_POST['titre'];
        $classement = $_POST['classement'];
        $categorie = $_POST['categorie'];
        $image = $_POST['fichier'];
        try {
            $requette = "INSERT INTO films VALUES(?, ?, ?, ?, ?)";
            $stmt = $connexion->prepare($requette);
            $stmt->execute([$numFilm, $titre, $classement, $categorie, $image]);
            $filmInsere = array(
                "numFilm" => $numFilm,
                "titre" => $titre,
                "classement" => $classement,
                "categorie"=> $categorie,
                "image"=> $image
            );
            $reponse['OK'] = true;
            $reponse['message'] = "Le film pour ".$titre." a été enregistré.";
            $reponse['filmInsere'] = $filmInsere;
        } 
        catch(Exception $e) {
            $reponse['OK'] = false;
            $reponse['message'] = "Problème à enregistrer le film...";
        }
        finally { unset($connexion); }
   }

   function read() {
        global $connexion, $reponse;
        $reponse['listeFilms'] = array();
        try {
            $requette = "SELECT * FROM films";
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)) {
                $reponse['listeFilms'][] = $ligne;
            }
        }
        catch(Exception $e) {
            $reponse['OK'] = false;
            $reponse['message'] = "Probleme à lister les films...";
        }
        finally { unset($connexion); }
   }

   function update(){

	}

   function delete(){
        global $connexion, $reponse;
        $numFilmD = $_POST['numFilmD'];
        try {
            $requette = "DELETE FROM films WHERE numFilm=?";
            $stmt = $connexion->prepare($requette);
            $stmt->execute([$numFilmD]);
			$reponse['numFilmD'] = $numFilmD;
            $reponse['OK'] = true;
            $reponse['message'] = "Le film #".$numFilmD." a été enlevé.";
        }
        catch(Exception $e) {
            $reponse['OK'] = false;
            $reponse['message'] = "Probleme à supprimer le film...";
        }
        finally { unset($connexion); }
   }

   $action = $_POST['action'];
   switch($action){
    case 'enregistrer': create(); break;
    case 'lister': read(); break;
    case 'update': update(); break;
    case 'enlever': delete(); break;
   }
    header("Content-Type: application/json");
    echo json_encode($reponse);
    exit();
?>