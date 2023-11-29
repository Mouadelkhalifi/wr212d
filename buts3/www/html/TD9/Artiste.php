<?php
class Artiste extends Humain{
    protected $specialite;
    protected $image;

    public function __construct($nom, $prenom, $datedenaissance, $specialite, $image,$id){
        parent::__construct($nom, $prenom, $datedenaissance);
        $this->specialite = $specialite;
        $this->image = $image;
        $this->id = $id;
    }
    public function sePresente()
    {
        return "Je suis {$this->prenom} {$this->nom}, un artiste spécialisé en {$this->specialite}.";
    }
    public function getSpecialite(){
        return $this->specialite;
    }
    public function getImage(){
        return $this->image;
    }
    public function getId() {
        return $this->id;
    }

}
