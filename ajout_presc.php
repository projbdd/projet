<?php session_start(); ?>

<!-- PAGE DE GRACE Z.-->

<html>
	<head>
		<meta charset="utf-8" />	
		<title>Ajouter une prescription </title>
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
// connexion  à la base de données
include("connexion_bd.php");

// Requête qui permet d'ajouter une prescription par oeil
$requete = $bdd -> prepare("INSERT INTO tab_contacto
VALUES (:l_numdoss, :l_date, :l_oeil, :l_idlentille , :l_autre,:l_ro,
:l_dia, :l_pui, :l_comment)");

$requete -> execute(array(':l_numdoss'  => $_SESSION['numerodoss'],
						':l_date' => $_POST['datep'], 
						':l_oeil' => $_POST['oeil'], 
						':l_idlentille' => $_POST['num_lentille'], 
						':l_autre' => $_POST['autrep'],
						':l_ro' => $_POST['ro_val'],
						':l_dia' => $_POST['dia'],
						':l_pui' => $_POST['puissance'],
						':l_comment' => $_POST['comment']));

// Indique que l'insertion a bien été effectuée
echo "<h3> La prescription du patient ".$_SESSION['numerodoss']." à bien été pris en compte !</h3> <br/>";

?>
	
<form method="POST" action="form_presc.php">
	<input id = "bouton" type="submit" value="Autre prescription"/> <br />  
</form>
	
	
<table id = end_table>
<tr id = end_page>
<td><a href="Prescriptions.php"> Retour aux les prescriptions</a> </br></td>
<td> &nbsp;&nbsp; </td>
<td><a href = 'mes_patients.php'>Retour à la sélection du patient</a> </br></td>
<td> &nbsp;&nbsp; </td>
<td> <a href = 'patient2.php'>Retour à la page du patient</a></br> </td>
</tr>
</table>



</div>
</body>
</html>


