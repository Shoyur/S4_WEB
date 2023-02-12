<?php

    // À date, on avait tout fait le php en procédural.

    // Maintenant, ça va être avec des classes
    // qui contiennent des propriétés et des méthodes


    class Usager {

        public $nom;        // est "public" donc on s'en sert à l'extérieur de la classe.
        private $courriel;  // private peut seulement être accédé DANS la classe
        protected $mdp;     // protected = dans la classe ET les classes qui héritent d'elle

        // Constructeur. Exécuté si on crée un instance de cet objet
        public function __construct() {     // on peut évidemment mettre des paramètres
            echo "Une instance a été créée.<br>";
            // et mettre des this->qqchose = $qqchose
        }

        // méthodes:
        // setter
        function setNom($nom) {
            $this->nom = $nom;
        }
        // getter
        function getNom() {
            return $this->nom;
        }

    }

    $usager1 = new Usager();
    $usager2 = new Usager();


    $usager1->nom = "Jean";
    // var_dump($usager1);
    echo "<br>";
    echo $usager1->nom;

    $usager2->setNom("Bobby");
    // $usager2->
    echo "<br>";
    echo $usager2->getNom();


?>


