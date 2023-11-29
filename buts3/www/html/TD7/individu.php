<?php


// Interface iHumain
interface iHumain
{
    public function travailler($nombreheures);

    public function reposer($nombrejours);

    public function sePresente();
}

// Classe Individu
abstract class Individu implements iHumain
{
    protected $nom;
    protected $prenom;
    protected $genre;
    protected $revenu = 0;
    protected $conges = 0;

    public function __construct($nom, $prenom, $genre)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->genre = $genre;
    }

    public function travailler($nombreheures)
    {
        $tauxHoraire = 9.5;
        $salaire = $tauxHoraire * $nombreheures;
        $this->revenu += $salaire;
        return $this->prenom . ' ' . $this->nom . ' a travaillé ' . $nombreheures . ' heures.';
    }

    public function reposer($nombrejours)
    {
        $this->conges += $nombrejours;
        return $this->prenom . ' ' . $this->nom . ' a pris ' . $nombrejours . ' jours de congés.';
    }

    public function sePresente()
    {
        return 'Je suis ' . $this->prenom . ' ' . $this->nom . ' et je suis un ' . $this->genre . '.';
    }

    public function RAZrevenu()
    {
        $this->revenu = 0;
    }

    public function RAZconges()
    {
        $this->conges = 0;
    }

    public function declareSalaire()
    {
        return 'Nom : ' . $this->nom . ', Prénom : ' . $this->prenom . ', Revenu : ' . $this->revenu . ' euros.';
    }

    public function getAge()
    {
        // Méthode à implémenter dans les classes filles
    }

    public function setAge($age)
    {
        // Méthode à implémenter dans les classes filles
    }
}

// Classe Etudiant
class Etudiant extends Individu
{
    protected $numetudiant;
    protected $age;
    protected $formation;
    protected $resultat;
    protected static $nbetudiants = 0;

    public function __construct($nom, $prenom, $genre, $numetudiant, $formation, $age)
    {
        parent::__construct($nom, $prenom, $genre);
        $this->numetudiant = $numetudiant;
        $this->formation = $formation;
        $this->age = $age;
        self::$nbetudiants++;
    }

    public function travailler($nombreheures)
    {
        $tauxHoraire = 9.5;
        if ($this->age < 18) {
            $tauxHoraire *= 0.8; // Réduction de 20% pour les moins de 18 ans
        }
        $salaire = $tauxHoraire * $nombreheures;
        $this->revenu += $salaire;
        return parent::travailler($nombreheures);
    }

    public function evaluer($noteExamen)
    {
        if ($noteExamen >= 10) {
            $this->resultat = 'reçu(e)';
        } else {
            $this->resultat = 'ajourné(e)';
        }
        return $this->prenom . ' ' . $this->nom . ' est ' . $this->resultat . ' à l\'examen.';
    }

    public static function getNombreIndividus()
    {
        return self::$nbetudiants;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }
}

// Classe Etudiant_mmi
class Etudiant_mmi extends Etudiant
{
    private $option;

    public function __construct($nom, $prenom, $genre, $numetudiant, $age, $option)
    {
        parent::__construct($nom, $prenom, $genre, $numetudiant, 'MMI', $age);
        $this->option = $option;
    }

    public function quelleOption()
    {
        return $this->prenom . ' ' . $this->nom . ' a choisi l\'option : ' . $this->option;
    }

    public function ChangerOption($option)
    {
        $this->option = $option;
        return $this->prenom . ' ' . $this->nom . ' a changé d\'option pour : ' . $option;
    }

    public function sePresente()
    {
        return parent::sePresente() . ' et je suis en MMI.';
    }
}

