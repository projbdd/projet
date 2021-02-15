<?php  session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Informations collègue </title>
	<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>
<body>

<?php include("barr_navig.html"); ?>
    
<!-- Reste de la page-->
<div class = "main">

<?php

include("connexion_bd.php");

//le bouton Valider a été activé
if (isset($_POST['BTN_MED'])) 
{	
	$_SESSION['autre'] = htmlspecialchars($_POST['autre_med']); 
	
	if ($_SESSION['autre'] == "Sélectionner votre collègue")
	
	{
		header("Location: mes_collègues.php");	
	}
	
	else {
	

	$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs WHERE ID_prof = :ID_utilisateur');
	$req->execute(array(':ID_utilisateur' => $_SESSION['autre']));
	
	$ligne = $req -> fetch();
	
	$label = array("Nom", "Prénom", "Age", "Téléphone");
	
	if ($ligne)
	{
		echo "<br/> <br/> <table id = infoMed >";
		for ($i=0;$i<=3;$i++)
		{
			echo "<tr><td><strong>".$label[$i]." : </strong> </td>  <td>".$ligne[$i+1]."</td></tr>";

		}
		echo "</table>";
	}

	
	$req->closeCursor() ;
	
	} //from else 
	

}

?>


<table id = end_table>
<tr id = end_page>
	<td><a href="mes_collègues.php"> Mes collègues</a></td>
	<td> &nbsp;&nbsp; </td>
	<td><a href="mes_infos.php"> Mes informations </a></td> 
</tr>
</table>


<!--
<?php
//TEST
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
echo "<br /> TEST- ID_SELECTION :". $_SESSION['autre'];
?>
-->
	
</div>

</body>
</html>
