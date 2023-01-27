<?php
define("SERVEUR","localhost");
define("USAGER","root");
define("PASS","");
define("BD","umbdfilms");
$connexion = new mysqli(SERVEUR,USAGER,PASS,BD);
if($connexion->connect_errno) {
    echo "Probléme de connexion au serveur de bd";
    exit();
}
?>