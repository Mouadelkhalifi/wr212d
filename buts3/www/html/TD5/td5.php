<?php
require_once 'vehicule.php';

$vehicule1 = new Vehicule("Toyota", 150, 50000);
$vehicule1->parcourir(100);
echo $vehicule1->lire_caracteristiques() . "<br>";

$voiture1 = new Voiture("Ford", 200, 20000, "suv");
$voiture1->parcourir(50);
echo $voiture1->lire_caracteristiques() . "<br>";
echo "Type de la voiture: " . $voiture1->lire_type() . "<br>";

$voiture2 = new Voiture("Nissan", 180, 25000, "berline");
$voiture2->parcourir(70);
echo $voiture2->lire_caracteristiques() . "<br>";
echo "Type de la voiture: " . $voiture2->lire_type() . "<br>";

$bus1 = new Bus("Mercedes", 300, 100000, 50, 4);
$bus1->parcourir(500);
echo $bus1->lire_caracteristiques() . "<br>";

