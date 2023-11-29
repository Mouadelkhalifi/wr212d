<?php

class Livre extends Ouvrage implements LouerInterface {
    protected $auteurs = [];
    protected $nbPages;
    protected $genreLivre;

    public function __construct($titre, $date, $auteurs, $nbPages, $genreLivre) {
        parent::__construct($titre, $date, "Livre");
        $this->auteurs = $auteurs;
        $this->nbPages = $nbPages;
        $this->genreLivre = $genreLivre;
    }

    public function calculerCoutLocation($duree) {
        $baseCost = 0.01 * $this->nbPages;

        if ($duree <= 15) {
            return $baseCost;
        } elseif ($duree <= 30) {
            return $baseCost * 1.10; // 10% markup
        } else {
            return $baseCost * 1.20; // 20% markup
        }

        if ($this->nbPages >= 500) {
            return $baseCost * 0.88; // 12% discount
        }
    }

    public function louer(int $duree): float {
        $cout = $this->calculerCoutLocation($duree);
        self::$gainTotalLocation += $cout;
        return $cout;
    }

    public function addAuteur($auteur) {
        $this->auteurs[] = $auteur;
    }
}
