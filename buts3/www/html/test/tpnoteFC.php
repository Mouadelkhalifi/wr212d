<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WR1313D - TP Noté 1 - Groupe Alternant</title>
</head>

<body>
<h1>Gestion d'une bibliothèque</h1>

<?php
spl_autoload_register(function ($class_name) {
    require $class_name . '.php';
});
?>
<h2>Création des ouvrages</h2>
<?php
$livre1 = new Livre('Une étude en rouge', new DateTime('1887-11-01'), [], 240, 'Policier');
$livre1->addAuteur('Arthur Conan Doyle');
$livre2 = new Livre('Le manuscrit inachevé', new DateTime('2018-04-11'),[], 624, 'Thriller');
$livre2->addAuteur('Franck Thilliez');
$bd1 = new BandeDessinee('La Fortune des Winczlav', new DateTime('2021-03-28'), 56);
$bd1->addAuteur('Jean Van Hamme');
$bd1->addDessinateur('Philippe Berthet');
$bd1->addDessinateur('Dominique David');
?>
<h2>Affichage des ouvrages</h2>
<?php
echo $livre1->afficher();
echo $livre2->afficher();
echo $bd1->afficher();
?>
<h2>Location des ouvrages</h2>
<?php
$cout = $livre1->louer(12);
echo '<p>Le livre ' . $livre1->getTitreOuvrage() . ' a été loué pour 12 jours au prix de ' . $cout . ' euros.</p>';
$cout = $livre1->louer(20);
echo '<p>Le livre ' . $livre1->getTitreOuvrage() . ' a été loué pour 20 jours au prix de ' . $cout . ' euros.</p>';
$cout = $livre2->louer(19);
echo '<p>Le livre ' . $livre2->getTitreOuvrage() . ' a été loué pour 19 jours au prix de ' . $cout . ' euros.</p>';

$cout = $livre2->louer(32);
echo '<p>Le livre ' . $livre2->getTitreOuvrage() . ' a été loué pour 32 jours au prix de ' . $cout . ' euros.</p>';

$cout = $bd1->louer(10);
echo '<p>Le livre ' . $bd1->getTitreOuvrage() . ' a été loué pour 10 jours au prix de ' . $cout . ' euros.</p>';
$cout = $bd1->louer(20);
echo '<p>Le livre ' . $bd1->getTitreOuvrage() . ' a été loué pour 20 jours au prix de ' . $cout . ' euros.</p>';
?>
<h2>Gain de la location</h2>

Cette collection à rapportée <?php echo Ouvrage::$gainTotalLocation; ?> euros.

</body>
</html>