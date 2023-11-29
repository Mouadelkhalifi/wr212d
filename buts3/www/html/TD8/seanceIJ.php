<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fichier de test de la séance I-J</title>
</head>
<body>
<h1>Fichier de test de la séance I-J</h1>
<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
?>

<h2>Création de quelques auteurs</h2>
<?php
$artiste = new Artiste('Mozart', 'Wolfgang Amadeus', '27/01/1756', 'Compositeur', 'mozart.jpg');
echo $artiste->sePresente();
$auteur = new Auteur('Corbeyran', 'Eric', '14/12/1964', 'corbeyran.jpg');
$auteurRoman = new Auteur('Conan Doyle', 'Arthur', '22/05/1859', 'doyle.jpg');
echo '#################################';
echo $auteur->sePresente();
echo '#################################';
echo $auteurRoman->sePresente()
?>
<h2>Création de livres</h2>
<?php
$auteursRoman = [$auteurRoman];
$livre = new Roman('L\'étude en Rouge', 136, $auteurRoman);
echo '#################################';
echo $livre->afficheLivre();
$livre->supprimerAuteur($auteurRoman);
echo '#################################';
echo $livre->afficheLivre();

?>
<h2>Création d'une BD</h2>
<?php
$dessinateur = new dessinateur('toto', 'toto', '22/02/1987', 'Image.jpg');
$auteursRoman = [$auteurRoman];
$bd = new BandeDessinee('Lucky Luke : OK Corral', 48, $auteursRoman, $dessinateur);
echo '#################################';
echo $bd->afficheLivre();
$bd->supprimerAuteur($auteurRoman);
echo '#################################';
echo $bd->afficheLivre();
$auteurBd = new Auteur('', 'Morris', '01/12/1923', 'morris.jpg');
$bd->addAuteur($auteurBd);
echo $bd->afficheLivre();
?>
</body>
</html>
