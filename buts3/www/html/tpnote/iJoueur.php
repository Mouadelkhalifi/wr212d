<?php

interface iJoueur
{
    public function sePresente();
    public function afficherJoueurs();
    public function getNom();
    public function setNom($nom);
    public function modifierPosteJoueur($nom,$poste) ;

    }