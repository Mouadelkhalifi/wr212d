<?php

// vehicule.php

abstract class VehiculeAMoteur
{
    protected $typeMoteur;
    protected $nbPassagers;
    public static $nbVehicules = 0;

    public function __construct($typeMoteur, $nbPassagers)
    {
        $this->verificationType($typeMoteur);
        $this->verificationNbPassagers($nbPassagers);
        $this->typeMoteur = $typeMoteur;
        $this->nbPassagers = $nbPassagers;
        self::$nbVehicules++;
    }

    protected function verificationType($type)
    {
        if ($type !== 'T' && $type !== 'E') {
            die("Erreur : Type de moteur incorrect.");
        }
    }

    protected function verificationNbPassagers($nombre)
    {
        if (!is_int($nombre)) {
            die("Erreur : Le nombre de passagers doit être un entier.");
        }
    }
}

class Voiture extends VehiculeAMoteur
{
    private $marque;
    private $puissance;

    public function __construct($typeMoteur, $nbPassagers, $marque, $puissance)
    {
        parent::__construct($typeMoteur, $nbPassagers);
        $this->marque = $marque;
        $this->puissance = $puissance;
    }

    public function lireCaracteristiques()
    {
        return "Type de moteur : {$this->typeMoteur}, Nombre de passagers : {$this->nbPassagers}, Marque : {$this->marque}, Puissance : {$this->puissance} chevaux.";
    }
}

final class VoitureDeSport extends Voiture
{
    private $nbSecVers100kmh;

    public function __construct($typeMoteur, $nbPassagers, $marque, $puissance, $nbSecVers100kmh)
    {
        parent::__construct($typeMoteur, $nbPassagers, $marque, $puissance);
        $this->nbSecVers100kmh = $nbSecVers100kmh;
    }

    public function lireCaracteristiques()
    {
        return parent::lireCaracteristiques() . ", Temps de 0 à 100 km/h : {$this->nbSecVers100kmh} secondes.";
    }
}

class VoitureTourisme extends Voiture
{
    private $consommation;
    private $kilometrage = 0;

    public function __construct($typeMoteur, $nbPassagers, $marque, $puissance, $consommation)
    {
        parent::__construct($typeMoteur, $nbPassagers, $marque, $puissance);
        $this->consommation = $consommation;
    }

    public function lireCaracteristiques()
    {
        return parent::lireCaracteristiques() . ", Consommation : {$this->consommation} litres pour 100 km, Kilométrage : {$this->kilometrage} km.";
    }

    public function utiliser($distance)
    {
        $this->kilometrage += $distance;
    }
}

class Camion extends VehiculeAMoteur
{
    private $tonnage;
    private $nbEssieux;

    public function __construct($typeMoteur, $nbPassagers, $tonnage, $nbEssieux)
    {
        parent::__construct($typeMoteur, $nbPassagers);
        $this->tonnage = $tonnage;
        $this->nbEssieux = $nbEssieux;
    }

    public function lireCaracteristiques()
    {
        return "Type de moteur : {$this->typeMoteur}, Nombre de passagers : {$this->nbPassagers}, Tonnage : {$this->tonnage} tonnes, Nombre d'essieux : {$this->nbEssieux}.";
    }
}

?>