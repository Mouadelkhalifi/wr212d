<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seance 12 - Manipulation de base de données</title>
</head>
<body>
<h1>Manipulation de base de données et d'Artiste</h1>
<?php
include 'Humain.php';
include 'Artiste.php';
include 'ArtisteManager.php';
$am = new ArtisteManager('mariadb', 'demowp', '123456', 'demowp');
$artiste = new Artiste('Conan Doyle', 'Arthur', '01/01/1800', 'Auteur', 'doyle.jpg', 0);
$id = $am->addArtiste($artiste);
echo '<p>Artiste ajouté avec l\'id numéro '.$id.'</p>';
$artiste2 = $am->getById($id);
echo '<p>'.$artiste2->sePresente().'</p>';
?>
<h1>Affichage de tous les artistes</h1>
<?php
echo $am->afficheAll();
?>
</body>
</html>
