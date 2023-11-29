<?php
abstract class Humain{
    protected $nom;
    protected $prenom;
    protected $datedenaissance;

    public function __construct($nom, $prenom, $datedenaissance){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->datedenaissance = $datedenaissance;
    }
    public function sepresente(){
        return 'Je suis ' . $this->prenom . ' ' . $this->nom . ' et je suis né le ' . $this->datedenaissance . '.';
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getDatenaissance(){
        return $this->datedenaissance;
    }

}
?>