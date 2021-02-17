<?php  session_start();?>

<!-- PAGE DE GRACE Z.-->

<html>
<head>
		<meta charset="utf-8" />
		<title> Mes informations  </title>
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

//Sélectionne les informations des médecins  uniquement
$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs WHERE ID_prof = :ID_utilisateur AND NOT ID_prof = 999');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));


// Nom du médecin
//Cherche index à partir de la 2e colonne, donc le 2e élement du array
$ligne = $req->fetch(); 

// Libellé de l'informations
//Cherche index à partir du premier élement du array
$label = array("Nom", "Prénom", "Age", "Téléphone"); 


echo "<fieldset id = 'connec'><legend><h3> MES INFORMATIONS </h3></legend>";

if ($ligne)
{
	echo "<table id = connec1 >";
	//4 élements recherchés
	for ($i=0;$i<=3;$i++)
	{
		echo "<tr id = infoMed ><td><strong>".$label[$i]." : </strong> </td>  <td>".$ligne[$i+1]."</td></tr>";

	}
	echo "</table>";
}

$req->closeCursor() ;

echo "</fieldset>";
?>

<!-- Lien vers d'autres pages -->
<table id = end_table>
<tr id = end_page>
	<td><a href="mes_patients.php"> Mes patients</a></td>
	<td> &nbsp;&nbsp; </td>
	<td><a href="mes_collègues.php"> Mes collègues </a></td>
	</tr>
</table>


<!--
<?php
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
?>
-->

</div>
</body>
</html>
