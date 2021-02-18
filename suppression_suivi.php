<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Supression suivi</title>
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

include("connexion_bd.php");


//$_SESSION['numerodoss']=$_POST['numdoss'];
	$requete1 = $bdd->prepare('delete from tab_suivi where N_dossier= :p_numdossier AND Date= :p_datecons');//préparation de la commande de suppression ;
	$requete1->execute(array(':p_numdossier' => $_SESSION['numerodoss'], ':p_datecons' => $_SESSION['jourvis'])); // récupération de la bonne ligne;
	
	echo"<h2> Visite à la date ".$_SESSION['jourvis']." du patient ".$_SESSION['numerodoss']." supprimée","</h2></br>";
	
?>

</div>
<form method="POST" action="patient2.php">
	<input id="bouton" type="submit" value="Choisir une autre date">
</form>

<form method="POST" action="mes_patients.php">
	<input id="bouton" type="submit" value="Choisir un autre patient">
</form>
	
</body>
</html>
