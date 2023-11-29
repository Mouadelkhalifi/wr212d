<?php
require 'Sport.php';
class SportEquipe extends Sport {
    protected $nbSportif;

    public function __construct($intitule, $individuel, $nbSportif) {
        parent::__construct($intitule, $individuel);
        $this->nbSportif = $nbSportif;
    }


    public function afficher() {
        echo "Le sport " . $this->intitule . " est un sport ";
        if ($this->individuel) {
            echo "individuel";
        } else {
            echo "d'équipe";
        }
        echo " et se pratique à " . $this->nbSportif . " sportifs.";
    }

    // Vous pouvez ajouter d'autres méthodes au besoin
}