<?php session_start(); ?>

<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
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

// Stocker le numéro de dossier dans une variable session seulement si sélectionné à partir du formulaire mes_patients.php
if (isset($_POST['BTN_PAT'])) // le bouton Valider de mes_patients.php
{

	$_SESSION['numerodoss']= $_POST['numdoss'];
	
}

// Reste sur la page tant qu'aucun patient n'est sélectionné	
if ($_SESSION['numerodoss'] == "Sélectionnez votre patient")
	
	{
		header("Location: mes_patients.php");	
	}
	

// Ne rien faire si $_SESSION['numerodoss'] est déja renseigné 


echo "<br/> Le patient sélectionné est le patient numéro <strong>".$_SESSION['numerodoss']."</strong>. </br>";
$requete = $bdd ->prepare('select Date from tab_suivi where N_dossier= :p_numdossier');
$requete -> execute(array(':p_numdossier' => $_SESSION['numerodoss']));
?>
</br>
<form method="POST" action="ATCD.php">
	<input id = "bouton" type="submit" value="Voir les antécédents du patient">
</form>
</br>
<form method="POST" action="prescriptions.php">
	<input id = "bouton" type="submit" value="Voir les préscriptions du patient">
</form>
</br>
<form method="POST" action="nouveau_suivi.php">
	<input id = "bouton" type="submit" value="Ajouter une nouvelle fiche de suivi à ce patient">
</form>
</br>
<form method="POST" action="suprimer_patient.php">
	<input id = "bouton" type="submit" value="Supprimer ce patient">
</form>
</br>

<form method="POST" action="action_visite.php">
    <select id = "selectbox" name="jourvis">
        <option selected="selected">Date de la visite</option>
        <?php
        $jour = $requete->fetch();
        while ($jour)
        	{	
        		foreach($jour as $item)
        			{
            			echo "<option value=".$jour['Date'].">".$jour['Date']."</option>";
            			$jour = $requete->fetch();
        			}
        	}
			
        ?>
	<option selected="selected">Visite initiale</option>
    </select>
	
	<input id = "bouton" type="submit" value="Ok">
	
</form>


	
<?php

?>

</div>

</body>
</html>
