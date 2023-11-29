<?php
class Artiste extends Humain{
    protected $specialite;
    protected $photo;

    public function __construct($nom, $prenom, $datedenaissance, $specialite, $photo){
        parent::__construct($nom, $prenom, $datedenaissance);
        $this->specialite = $specialite;
        $this->photo = $photo;
    }
    public function sePresente()
    {
        return "Je suis {$this->prenom} {$this->nom}, un artiste spécialisé en {$this->specialite}.";
    }
    public function getSpecialite(){
        return $this->specialite;
    }
    public function getPhoto(){
        return $this->photo;
    }
}
