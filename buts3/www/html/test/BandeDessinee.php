<?php

class BandeDessinee extends Ouvrage implements LouerInterface {
    protected $auteurs = [];
    protected $dessinateurs = [];
    protected $nbPlanches;

    public function __construct($titre, $date, $nbPlanches) {
        parent::__construct($titre, $date, "BD");
        $this->nbPlanches = $nbPlanches;
    }

    public function calculerCoutLocation($duree) {
        $baseCost = 0.025 * $this->nbPlanches;

        if ($duree <= 15) {
            return $baseCost;
        } elseif ($duree <= 30) {
            return $baseCost * 1.10; // 10% markup
        } else {
            return $baseCost * 1.20; // 20% markup
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

    public function addDessinateur($dessinateur) {
        $this->dessinateurs[] = $dessinateur;
    }
}
