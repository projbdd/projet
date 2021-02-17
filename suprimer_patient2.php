<!-- Page rédigée par Antoine -->  

<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title> Supprimer patient </title>
		<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>
<body>

<?php
//Barre de navigation 
include("barr_navig.html");
?>

<!-- Reste de la page-->
<div class = "main">

<?php 
// connexion à la base de données
include("connexion_bd.php");

// requete pour changer l'identifiant du médecin de tous les suivis du patient pour le rendr einvisible à l'affichage
$requete1 = $bdd -> prepare('UPDATE tab_suivi SET ID_med="999" WHERE N_dossier=:p_dossdoss;');
$requete1 -> execute(array(':p_dossdoss' => $_SESSION['numerodoss']));

$requete2 = $bdd -> prepare('SELECT ID_med FROM tab_suivi WHERE N_dossier=:p_dossdoss;');
$requete2 -> execute(array(':p_dossdoss' => $_SESSION['numerodoss']));
$ligne = $requete2->fetch();

{echo "<br/><h2>Le patient ".$_SESSION['numerodoss']." a été supprimée. </h2></br>";}

?>
	
</br>
<form method="POST" action="mes_patients.php">
	<input id="bouton" type="submit" value="Chercher un autre patient">
</form>
</br>

</div>
</body>
</html>

