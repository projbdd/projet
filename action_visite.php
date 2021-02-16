<?php session_start(); ?>


<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
		<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>
<body>


<?php include("barr_navig.html"); ?>
    
<!-- Reste de la page-->
<div class = "main">
	
<?php 
// RECUPERATION DE LA DATE DE VISITE DE LA PAGE PRECEDENTE
$_SESSION['jourvis']= htmlspecialchars($_POST['jourvis']);

// AFFICHAGE DE LA VISITE SELECTIONNEE
if ($_SESSION['jourvis'] == "Visite initiale") {
  echo "<br/> Vous avez sélectionné la visite initiale du patient numéro <strong>".$_SESSION['numerodoss']."</strong>. <br/>";
} else {
  echo "<br/> Vous avez sélectionné la visite du <strong>".$_SESSION['jourvis']."</strong> du patient numéro <strong>".$_SESSION['numerodoss']."</strong>. <br/>";
}
  echo "<br/>Que voulez-vous faire ?<br/></br/>";

?>

<!-- CHOIX DE L'ACTION A FAIRE : VOIR/SUPPRIMER/MODIFIER UNE VISITE-->
<form method="POST" action="patient3.php">
	<input id = "bouton" type="submit" value="Voir les informations sur cette visite">
</form>
</br>
<form method="POST" action="modif_suivi.php">
	<input id= "bouton" type="submit" value="Modifier des informations sur cette visite">
</form>
</br>
<form method="POST" action="suppression_suivi.php">
	<input id = "bouton" type="submit" value="Supprimer cette visite">
</form>

</div>

</body>
</html>
