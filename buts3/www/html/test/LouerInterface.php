<?php
// LouerInterface.php
interface LouerInterface {
public function louer(int $duree): float;
public function calculerCoutLocation($duree);
public function addAuteur($auteur);
}

// Other PHP files that use the LouerInterface should include or require it:
// require "LouerInterface.php";
