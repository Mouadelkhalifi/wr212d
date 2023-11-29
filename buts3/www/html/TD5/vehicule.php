<?php
//creation class vehicule avec les propriétés "marques", "puissance" et "kilometrage" et la methode "affichage"
class Vehicule {
    // Propriétés
    public string $marque;
    public int $puissance;
    public int $kilometrage;

    // Constructeur
    public function __construct($marque, $puissance, $kilometrage) {
        $this->marque = $marque;
        $this->puissance = $puissance;
        $this->kilometrage = $kilometrage;
    }

    // Méthode pour afficher les caractéristiques du véhicule


    // Méthode pour augmenter le kilométrage
    public function parcourir($kilometres) {
        $this->kilometrage = $this->kilometrage + $kilometres;
        echo "<p> Nouveau kilometrage : ". $this->kilometrage ." km</p>";
    }
    public function lire_caracteristiques() {
        $message="la ". $this->marque." a ".$this->puissance.' chevaux et a '.$this->kilometrage." km";
            return $message;
    }
}

class Voiture extends Vehicule {
    private $type;

    public function __construct($marque, $puissance, $kilometrage, $type) {
        parent::__construct($marque, $puissance, $kilometrage);
        $this->setType($type);
    }

    public function setType($type) {
        $typesValides = ['berline', 'suv', '4x4', 'break'];

        if (in_array($type, $typesValides)) {
            $this->type = $type;
        } else {
            echo "Type de véhicule invalide. Les types valides sont : " . implode(', ', $typesValides);
        }
    }

    public function lire_type() {
        return $this->type;
    }

}
class Bus extends Vehicule
{
    private $nombrePlacesAssises;
    private $nombreEssieux;

    public function __construct($marque, $puissance, $kilometrage, $nombrePlacesAssises, $nombreEssieux)
    {
        parent::__construct($marque, $puissance, $kilometrage);
        $this->nombrePlacesAssises = $nombrePlacesAssises;
        $this->nombreEssieux = $nombreEssieux;
    }

    public function lire_caracteristiques()
    {
        return parent::lire_caracteristiques() . ", Places assises: {$this->nombrePlacesAssises}, Essieux: {$this->nombreEssieux}";
    }
}
    ?>
