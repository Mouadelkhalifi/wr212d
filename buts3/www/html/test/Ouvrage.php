<?php

class Ouvrage implements OuvrageInterface {
    protected $titreOuvrage;
    protected $datePublication;
    protected $genre;
    protected $couverture;
    public static $gainTotalLocation = 0;

    public function __construct($titre, $date, $genre) {
        $this->titreOuvrage = $titre;
        $this->datePublication = $date;
        $this->genre = $genre;
        $this->couverture = "https://placehold.co/200x300?text=" . urlencode($titre);
    }
    public function afficher(): string {
        $formattedDate = $this->datePublication->format('d/m/Y'); // Format the date as needed
        $useNbPages = true; // Utilisez true ou false pour choisir entre nbPages et nbPlanches en fonction de votre logique

        if ($useNbPages) {
            $nombreDePages = $this->nbPages;
        } else {
            $nombreDePages = $this->nbPlanches;
        }

        return "<img src='$this->couverture' alt='couverture' /><br><br>"
            . "<strong>$this->titreOuvrage</strong> <br><br>"
            . "Date de publication: $formattedDate<br><br>"
            . "Genre: $this->genre<br><br>"
            . "Nombre de pages: $nombreDePages<br><br>"
            . "Auteur(s): " . implode(', ', $this->auteurs) . "<br><br>";
    }





    public function getTitreOuvrage() {
        return $this->titreOuvrage;
    }
}
