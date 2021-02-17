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

// permet de vérifier que le médecin veut réellement supprimer le patient
echo "<h2>Voulez-vous vraiment supprimer le patient numéro ".$_SESSION['numerodoss']." ? </h2></br>";
?>
</br>
<form method="POST" action="suprimer_patient2.php">
	<input id = "bouton"  type="submit" value="OUI">
</form>
</br>
</br>
<form method="POST" action="patient2.php">
	<input id = "bouton" type="submit" value="NON">
</form>
</br>
</div>
</body>
</html>
