<?php
class Joueur {
    private $nom;
    private $prenom;
    private $poste;

    public function __construct($nom, $prenom, $poste) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->poste = $poste;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function sePresente() {
        // Affichez les informations du joueur
    }

}

