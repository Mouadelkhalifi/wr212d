<?php
class Football extends SportEquipe implements FootballInterface
{
    private $nomEquipe;
    private $joueurs = array();

    public function __construct($nomEquipe)
    {
        parent::__construct("Football", false, 11);
        $this->nomEquipe = $nomEquipe;
    }

    public function afficher()
    {
        echo "L'équipe " . $this->nomEquipe . " joue au football avec " . $this->nbSportif . " joueurs.";
    }

    public function addJoueur($joueur)
    {
        $this->joueurs[] = $joueur;
    }

    public function supprimerJoueur($nom) {
        foreach ($this->joueurs as $key => $joueur) {
            if ($joueur->getNom() === $nom) {
                unset($this->joueurs[$key]); // Supprime le joueur du tableau
                $this->nbSportif--; // Diminue le nombre de sportifs
                echo "Le joueur " . $nom . " a été supprimé.<br>";
            }
        }
    }


    public function modifierPosteJoueur($nom, $poste)
    {
        foreach ($this->joueurs as $joueur) {
            if ($joueur->getNom() === $nom) {
                $joueur->setNom($poste);
            }

            // Vous pouvez ajouter d'autres méthodes au besoin
        }
    }
    public function getJoueurs()
    {
        return $this->joueurs;
    }
}


