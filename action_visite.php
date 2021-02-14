<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
</head>
<body>

<?php 

$_SESSION['jourvis']= htmlspecialchars($_POST['jourvis']);

echo "Le patient sélectionné est le patient numéro ".$_SESSION['numerodoss']." et la visite est celle du".$_SESSION['jourvis'].". </br>";
echo "Que voulez-vous faire ?</br>";

?>


<form method="POST" action="patient3.php">
	<input type="submit" value="Voir les informations sur cette visite">
</form>
</br>
<form method="POST" action="modif_suivi.php">
	<input type="submit" value="Modifier des informations sur cette visite">
</form>
</br>
<form method="POST" action="suppression_suivi.php">
	<input type="submit" value="Supprimer cette visite">
</form>



</body>
</html>