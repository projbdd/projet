<?php  session_start(); ?>

<!-- PAGE DE GRACE Z.
code similaire à mes_infos.php-->

<html>
	<head>
		<meta charset="utf-8" />
		<title> Informations collègue </title>
	<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>
<body>

<?php include("barr_navig.html");?>
    
<!-- Reste de la page-->
<div class = "main">

<?php

include("connexion_bd.php");
	


// Le bouton Valider a été activé
if (isset($_POST['BTN_MED'])) 
{	
	// Enregistrement du médecin choisi en variable session
	$_SESSION['autre'] = htmlspecialchars($_POST['autre_med']); 
	
	// Rester sur la page tant qu'un médecin n'est pas sélectionné
	if ($_SESSION['autre'] == "Sélectionner votre collègue")
	
	{
		header("Location: mes_collègues.php");	
	}
	
	// Si un médecin est sélectionné
	else {
	
		echo "<fieldset id = 'connec'><legend><h3> MON/MA COLLÈGUE </h3></legend>";
		
		//Sélectionner les informations du médecin autre que le médecin utilisateur
		$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs WHERE ID_prof = :ID_utilisateur');
		$req->execute(array(':ID_utilisateur' => $_SESSION['autre']));
	
		$ligne = $req -> fetch();
	
		$label = array("Nom", "Prénom", "Age", "Téléphone");
	
		if ($ligne)
		{
			echo "<table id = connec1 >";
			for ($i=0;$i<=3;$i++)
			{
				echo "<tr id = infoMed ><td><strong>".$label[$i]." : </strong> </td>  <td>".$ligne[$i+1]."</td></tr>";
			}
			echo "</table>";
		}
		
	
		$req->closeCursor() ;
		
		echo "</fieldset>";
	} 	

}

?>

<!--
<?php
//TEST
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
echo "<br /> TEST- ID_SELECTION :". $_SESSION['autre'];
?>
-->
	
</div>
	

<!-- Lien vers autres pages-->
<div  id = end_table>
<table>
<tr id = end_page>
<td><a href="mes_collègues.php"> Mes collègues</a></td>
<td> &nbsp;&nbsp; </td>
<td><a href="mes_infos.php"> Mes informations </a></td> 
</tr>
</table>
</div>

</body>
</html>
