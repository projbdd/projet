<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Ajouter un nouveau patient </title>
</head>
<body>
<?php
// connexion  à la base de données
include("connexion_bd.php");


// AJOUT D'UN MEDECIN

$requete = $bdd -> prepare('insert into tab_patients values(:p_num_dossier, :p_date_debut_suivi, :p_nom, :p_pren, :p_adressage, :p_typ_consul, :p_sexe, :p_date_nais, :p_csp, :p_ethnie, :p_com_ou_pays_nais, :p_anne_dec_kc, :p_lat_man, :p_tabagisme_actif, :p_nb_cig_jr, :p_nb_annees, :p_tabagisme_passif, :p_situ_od, :p_situ_og)');

$requete -> execute(array(':p_num_dossier' => $_POST['numdo'], 
							':p_date_debut_suivi' => $_POST['datedeb'], 
							':p_nom' => $_POST['nom'], 
							':p_pren' => $_POST['pren'], 
							':p_adressage' => $_POST['adress'], 
							':p_typ_consul' => $_POST['consu'], 
							':p_sexe' => $_POST['sexe'], 
							':p_date_nais' => $_POST['ddnaiss'],
							':p_csp' => $_POST['csp'], 
							':p_ethnie' => $_POST['ethnie'], 
							':p_com_ou_pays_nais' => $_POST['compays'], 
							':p_anne_dec_kc' => $_POST['anneedete'], 
							':p_lat_man' => $_POST['lateralite'], 
							':p_tabagisme_actif' => $_POST['tabacact'], 
							':p_nb_cig_jr' => $_POST['nbcigjour'], 
							':p_nb_annees' => $_POST['nbcigannee'], 
							':p_tabagisme_passif' => $_POST['tabacpass'], 
							':p_situ_od' => $_POST['KOD'], 
							':p_situ_og' => $_POST['KOG']));

if ($requete != null){
	echo "</br> Le patient avec le numéro de dossier ".htmlspecialchars($_POST['numdo'])." à été ajouté avec succès ! </br>";
	echo " Pour finaliser sa création, veuillez remplir une fiche de suivi :</br></br>";
	?>
	<form method="POST" action="nouveau_suivi.php">
		<input type="submit" value="Première fiche de suivi"/> <br />  
	</form>
	<?php
}

?>

</body>
</html>