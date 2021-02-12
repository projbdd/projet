<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
</head>
<body>

<?php 
include("connexion_bd.php");
?>


<form method="POST" action="patient2.php">

<fieldset><legend><h4> Pour quel patient souhaitez-vous avoir des informations ? </h4></legend>
<table>
<tr> <td> Numéro de dossier : </td><td><INPUT NAME="numdoss" TYPE="text"/> </td></tr>
<tr><td> Prénom : </td><td><INPUT NAME="prenom" TYPE="text"/></td></tr>
<tr><td> Nom : </td><td><INPUT NAME="nom" TYPE="text"/></td></tr>
</table> 

<input type="submit" value="OK"/> <br /> 

</fieldset> <br /> 
</form>
</body>
</html>
