<?php session_start(); ?>
<html>
<!------ Klervi LE GALL ------->
	
	<head>
		<meta charset="utf-8" />	
		<title>Ajouter une nouvelle visite </title>
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

$suivi = $bdd->prepare("SELECT max(ID_suivi)+1 as max FROM tab_suivi"); // Récupération de l'id de visite à attribuer 
$suivi ->execute();;
$rep = $suivi->fetch();
$_max= $rep['max'];

$numdoss=$_SESSION['numerodoss']; // récupération de l'id du patient


$requete = $bdd -> prepare('insert into tab_suivi values(:p_id_suivi, :p_type_consult, :p_numdoss, :p_date, :p_sign_fonc, :p_BAV_rap, :p_BAV_lente, :p_Halo, :p_Photophobie, :p_ddblee, :p_rougeurs, :p_autre, :p_autre_det, :p_frott, :p_lentilles, :p_adapt, :p_tolerance, :p_nbhl, :p_nbjl, :p_idmed )'); // préparation de l'insertion

$requete -> execute(array(':p_id_suivi' => $_max, 
							':p_type_consult' => $_POST['typeconsult'],
							':p_numdoss'=> $numdoss,
  						        ':p_date' => $_POST['date'],
							':p_sign_fonc' => $_POST['sign_fonc'], 
							':p_BAV_rap' => $_POST['BAVrap'], 
							':p_BAV_lente' => $_POST['BAVlente'], 
							':p_Halo' => $_POST['Halo'], 
							':p_Photophobie' => $_POST['Photophobie'], 
							':p_ddblee' => $_POST['ddblee'], 
							':p_rougeurs' => $_POST['BAVlente'], 
							':p_autre' => $_POST['autres'], 
							':p_autre_det' => $_POST['autres_det'], 
							':p_frott' => $_POST['frott'], 
							':p_lentilles' => $_POST['lentilles'], 
							':p_adapt' => $_POST['adapt'], 
							':p_tolerance' => $_POST['tolerance'], 
							':p_nbhl' => $_POST['nbhl'], 
							':p_nbjl' => $_POST['nbjl'], 
							':p_idmed' => $_SESSION['ID_utilisateur'])); //execution de la requête en récupérant les résultats du questionnaire


if ($requete != null){
	echo "</br><h3> La visite numéro " .$_max." du ".$_POST['date']." du patient numéro ".$numdoss." à été ajoutée avec succès ! </h3></br>"; // vérification 
}
?>


<table id = end_table>
<tr id = end_page>
<td> <a href = 'patient2.php'>Retour à la page du patient</a></br> </td>
<td> &nbsp;&nbsp; </td>
<td><a href = 'mes_patients.php'>Retour à la sélection du patient</a> </br></td>
</tr>
</table>

</form>
</div>
</body>
</html>
