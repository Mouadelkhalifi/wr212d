<?php
class Roman extends Livre
{
    function __construct($titre, $nbPage, $auteurs)
    {
        parent::__construct($titre, $nbPage, $auteurs); // Convertir en tableau
    }

    function addAuteur($auteurRoman)
    {
        if ($auteurRoman instanceof Auteur) {
            $this->auteurs[] = $auteurRoman;
        }
    }

    function supprimerAuteur($auteurRoman)
    {
        if ($auteurRoman instanceof Auteur) {
            $this->auteurs = array_filter($this->auteurs, function ($auteur) use ($auteurRoman) {
                return $auteur !== $auteurRoman;
            });
        }
    }
    public function afficheLivre()
    {
        $auteurs = array_map(function ($auteur) {
            return $auteur->sePresente();
        }, $this->auteurs);

        return 'Titre : ' . $this->getTitre() . '<br>' .
            'Nombre de pages : ' . $this->nbPage . '<br>' . // Modifier NbPage en nbPage
            'Auteurs : ' . implode(', ', $auteurs);
    }



}
