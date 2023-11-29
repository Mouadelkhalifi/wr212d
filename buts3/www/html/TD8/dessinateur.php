<?php
class dessinateur extends Artiste
{
    public function __construct($nom, $prenom, $dateNaissance, $image)
    {
        parent::__construct($nom, $prenom, $dateNaissance, 'dessiner', $image);
    }
}
