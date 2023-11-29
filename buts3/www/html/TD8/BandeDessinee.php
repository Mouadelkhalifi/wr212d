<?php
class BandeDessinee extends Livre
{
    protected $listeDessinateur = [];

    public function __construct($titre, $nbPage, $auteurs)
    {
        parent::__construct($titre, $nbPage, $auteurs);
    }

    public function addDessinateur($dessinateur)
    {
        if ($dessinateur instanceof Dessinateur) {
            $this->listeDessinateur[] = $dessinateur;
        }
    }

    public function supprimerAuteur($auteur)
    {
        if ($auteur instanceof Auteur) {
            $this->auteurs = array_filter($this->auteurs, function ($a) use ($auteur) {
                return $a !== $auteur;
            });
        }
    }

    // Implémentation de la méthode afficheLivre
    public function afficheLivre()
    {
        $auteurs = array_map(function ($auteur) {
            return $auteur->sePresente();
        }, $this->auteurs);

        $dessinateurs = array_map(function ($dessinateur) {
            return $dessinateur->sePresente();
        }, $this->listeDessinateur);

        return 'Titre : ' . $this->getTitre() . '<br>' .
            'Nombre de pages : ' . $this->getNbPage() . '<br>' .
            'Auteurs : ' . implode(', ', $auteurs) . '<br>' .
            'Dessinateurs : ' . implode(', ', $dessinateurs);
    }
    public function getNbPage()
    {
        return $this->nbPage;
    }

    /**
     * @return array
     */
    public function addAuteur(): array
    {
        return $this->auteurs;
    }
}
