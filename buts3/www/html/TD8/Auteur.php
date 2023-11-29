<?php

class Auteur extends Artiste
{
    function __construct($nom, $prenom, $datedenaissance, $photo)
    {
        parent::__construct($nom, $prenom,$datedenaissance,'écrire', $photo);
    }
}
