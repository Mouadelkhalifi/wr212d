<?php
// Classe Mère
class Animal  {
// Propriétés
public string $nom;
public int $age;
private array $regimeAlimentaire;
public int $agemax;
public string $etat;

// Constructeur
public function __construct($arg1, $arg2, $arg3) {
$this->nom = $arg1;
$this->age = $arg2;
$this->regimeAlimentaire = [];
$this->agemax = $arg3;
$this->etat = 'vivant';
}

public function lire_informations() {
return "Nom de l'animal : {$this->nom}, Age : {$this->age}, État : {$this->etat}<br>";
}

public function mange($aliment) {
if ($this->etat === 'vivant') {
$this->regimeAlimentaire[] = $aliment;
} else {
return "L'animal est mort et ne peut pas manger<br>";
}
}

public function vieillir($nbannees) {
if ($this->etat === 'vivant') {
$this->age += $nbannees;
if ($this->age > $this->agemax) {
$this->etat = 'mort';
}
} else {
return "L'animal est déjà mort.<br>";
}
}

public function lire_regime() {
return "Régime alimentaire de l'animal : " . implode(', ', $this->regimeAlimentaire) . "<br>";
}
}

// Classe Fille
class Chien extends Animal {
// Propriété de la classe Fille
private $nomFamilier;

// Constructeur
public function __construct($arg1, $arg2, $arg3, $arg4) {
// Appel du constructeur de la classe parent
parent::__construct($arg1, $arg2, $arg3);
$this->nomFamilier = $arg4;
}

public function seNomme() {
return $this->nomFamilier;
}

public function lire_informations() {
return "Nom de l'animal : {$this->nom}, Age : {$this->age}, État : {$this->etat}, Nom Familier : {$this->nomFamilier}<br>";
}
}