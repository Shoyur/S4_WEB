<?php

   require_once('../bdconfig/connexion.inc.php');

   $reponse = array();

   function create(){
        global $connexion, $reponse;
        $code = $_POST['code'];
        $depart = $_POST['depart'];
        $destination = $_POST['destination'];
        $transporteur = $_POST['transporteur'];
        try {
            $requette = "INSERT INTO voyages VALUES(?, ?, ?, ?)";
            $stmt = $connexion->prepare($requette);
            $stmt->execute([$code, $depart, $destination, $transporteur]);
            $voyageInsere = array(
                "code" => $code,
                "depart" => $depart,
                "destination" => $destination,
                "transporteur"=> $transporteur
            );
            $reponse['OK'] = true;
            $reponse['message'] = "Le voyage pour ".$destination." a été enregistré.";
            $reponse['filmInsere'] = $voyageInsere;
        } 
        catch(Exception $e) {
            $reponse['OK'] = false;
            $reponse['message'] = "Problème à enregistrer le voyage...";
        }
        finally { unset($connexion); }
   }

   function read($depMtl){
        global $connexion, $reponse;
        $reponse['listeVoyages'] = array();
        try {
            if (!$depMtl) { $requette = "SELECT * FROM voyages"; }
            else { $requette = "SELECT * FROM voyages WHERE depart=Montreal"; }
            $stmt = $connexion->prepare($requette);
            $stmt->execute();
            $reponse['OK'] = true;
            while($ligne=$stmt->fetch(PDO::FETCH_OBJ)) {
                $reponse['listeVoyages'][] = $ligne;
            }
        }
        catch(Exception $e) {
            $reponse['OK'] = false;
            $reponse['message'] = "Probleme à lister les voyages...";
        }
        finally { unset($connexion); }
   }

   function delete(){
        global $connexion, $reponse;
        $code = $_POST['codeD'];
        try {
            $requette = "DELETE FROM voyages WHERE code=?";
            $stmt = $connexion->prepare($requette);
            $stmt->execute([$code]);
            $reponse['OK'] = true;
            $reponse['message'] = "Le ou les voyages du client #".$code." a/ont été enlevé(s).";
        }
        catch(Exception $e) {
            $reponse['OK'] = false;
            $reponse['message'] = "Probleme à supprimer un ou des voyages...";
        }
        finally { unset($connexion); }
   }

   $action = $_POST['action'];
   switch($action){
    case 'enregistrer': create(); break;
    case 'lister': read(false); break;
    case 'listerDepMtl': read(true); break;
    case 'enlever': delete(); break;
   }
    header("Content-Type: application/json");
    echo json_encode($reponse);
    exit();
?>