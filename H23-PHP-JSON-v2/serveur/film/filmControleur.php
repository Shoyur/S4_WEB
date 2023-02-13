<?php
   require_once('../bdconfig/connexion.inc.php');
   $reponse = array();

   function enregistrer(){
        global $connexion, $reponse;
        $titre = $_POST['titre'];
        $duree = $_POST['duree'];
        $repPochettes = "../pochettes/";

        $nouveauNom = "avatar.png";
        try{
            // Si un fichier a été uploadé
            if($_FILES['pochette']['tmp_name'] != ""){
                $tmpFic = $_FILES['pochette']['tmp_name'];
                $nomOriginal = $_FILES['pochette']['name'];
                $extension = strrchr($nomOriginal,'.');
                $nouveauNom = sha1($titre.time()).$extension;
                @move_uploaded_file($tmpFic, $repPochettes.$nouveauNom);
            }
            $requette = "INSERT INTO films  VALUES(0, ?, ?, ?)";
            $stmt = $connexion->prepare($requette);
            $stmt->execute([$titre, $duree, $nouveauNom]);
            $dernierId =  $connexion->lastInsertId();
            $filmInsere=array(
                "id" => $dernierId,
                "titre" => $titre,
                "duree" => $duree,
                "pochette"=> $nouveauNom
            );
            $reponse['OK'] = true;
            $reponse['message'] = "Film ".$titre." a ete enregistre";
            $reponse['filmInsere'] = $filmInsere;
        } catch(Exception $e){
            $reponse['OK'] = false;
            $reponse['message'] = "Probleme pour enregistrer le film!";
        }finally{
            unset($connexion); //Detruire la connexion	
        }
   }

   function lister(){
        global $connexion, $reponse;
       $reponse['listeFilms'] = array();
        try{
            $requette = "SELECT * FROM films";
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
                $reponse['listeFilms'][] = $ligne;
            }
        }catch(Exception $e){
            $reponse['OK'] = false;
            $reponse['message'] = "Probleme pour lister!";
        }finally{
             unset($connexion); //Detruire la connexion	
        }
   }

   function enlever(){
        global $connexion, $reponse;
        $num = $_POST['num'];
        try{
            $requette = "DELETE FROM films WHERE id=?";
            $stmt = $connexion->prepare($requette);
            $stmt->execute([$num]);
            $reponse['OK'] = true;
            $reponse['message'] = "Film ".$num." a ete enleve";
        }catch(Exception $e){
            $reponse['OK'] = false;
            $reponse['message'] = "Probleme pour lister!";
        }finally{
             unset($connexion); //Detruire la connexion	
        }
   }

   // Contrôleur
   $action = $_POST['action'];
   switch($action){
    case 'enregistrer' :
        enregistrer();
    break;
    case 'lister' :
        lister();
    break;
    case 'enlever' :
        enlever();
    break;
   }
    header("Content-Type: application/json");
    echo json_encode($reponse);
    exit();
?>