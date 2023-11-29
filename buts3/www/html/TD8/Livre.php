<?php
abstract class Livre{
    protected $titre;
    protected $nbPage;
    protected $auteurs=[];
    public function __construct($titre, $nbPage){
        $this->setTitre($titre);
        $this->nbPage = $nbPage;
    }
    public function setTitre($titre)
    {
        $this->titre = ucwords(strtolower($titre));
    }
    public function getTitre()
    {
        return $this->titre;
    }

    abstract public function afficheLivre();
}