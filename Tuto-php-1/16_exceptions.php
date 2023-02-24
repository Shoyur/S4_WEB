<?php

    // Try, catch, finally
    function inverser($x) {
        if (!$x) {
            throw new Exception("Division par zéro!");
        }
        return 1/$x;
    }
    
    // echo inverser(10); // ok, donne 0.1
    // echo inverser(0); // donne une Uncaught Exception avec notre message d'erreur

    try { // TENTATIVE
        $n = 10;
        echo "Inverser $n donne: ".inverser($n)."<br>";
        $n = 0;
        echo "Inverser $n donne: ".inverser($n)."<br>";
    }
    catch (Exception $e) { // S'IL Y A UNE ERREUR
        echo "Erreur reçue: ".$e->getMessage()."<br>";
    }
    finally { // SERA TOUJOURS EXÉCUTÉ
        echo "La fin du try, donc le finally<br>";
    }
    echo "Ensuite...<br>"



?>


