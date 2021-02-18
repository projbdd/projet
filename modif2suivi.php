<?php session_start(); ?>
<html>
	<!-- KLERVI LE GALL -->
	<head>
		<meta charset="utf-8" />	
		<title>Modifier une visite </title>
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
//pour chaque variable on regarde si c'est celle là qui est choisie avec un if (isset)
	
	// partie suivi
if(isset($_POST['VAL_typeconsult'])){	
$requete = $bdd -> prepare('update tab_suivi set Type_consult = :p_valeur where N_dossier = :p_numdoss and Date = :p_date'); // requete d'insertion
$requete -> execute(array(':p_valeur' => $_POST['VAL_typeconsult'], //récupération de la valeur du formulaire
						  ':p_numdoss'=> $_SESSION['numerodoss'], //numéro de patient
						  ':p_date'=> $_SESSION['jourvis'])); // date de visite
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_sign_fonc'])){	
$requete = $bdd -> prepare("update tab_suivi set Signes_Fonctionnels_details = :p_valeur where N_dossier = :p_numdoss and Date = :p_date");
$requete -> execute(array(':p_valeur' => $_POST['VAL_sign_fonc'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_BAVrap'])){	
$requete = $bdd -> prepare('update tab_suivi set BAVrapide = :p_valeur  where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_BAVrap'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_BAVlente'])){	
$requete = $bdd -> prepare('update tab_suivi set BAVlente = :p_valeur  where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_BAVlente'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Halos_noct'])){	
$requete = $bdd -> prepare('update tab_suivi set Halos_noct= :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Halos_noct'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Photophobie'])){	
$requete = $bdd -> prepare('update tab_suivi set Photophobie = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Photophobie'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Vision_ddblee'])){	
$requete = $bdd -> prepare('update tab_suivi set Vision_ddblee = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Vision_ddblee'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Rougeurs_ocul'])){	
$requete = $bdd -> prepare('update tab_suivi set Rougeurs_ocul = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Rougeurs_ocul'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_autre'])){	
$requete = $bdd -> prepare('update tab_suivi set autre = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_autre'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_autre_det'])){	
$requete = $bdd -> prepare('update tab_suivi set autre_det = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_autre_det'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Frottement_yeux'])){	
$requete = $bdd -> prepare('update tab_suivi set Frottement_yeux = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Frottement_yeux'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Port_lentille'])){	
$requete = $bdd -> prepare('update tab_suivi set Port_lentille = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Port_lentille'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Adaptation_lentille'])){	
$requete = $bdd -> prepare('update tab_suivi set Adaptation_lentille = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Adaptation_lentille'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Tolerance'])){	
$requete = $bdd -> prepare('update tab_suivi set Tolerance = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Tolerance'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Nb_hrL_jr'])){	 
$requete = $bdd -> prepare('update tab_suivi set Nb_hrL_jr = :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Nb_hrL_jr'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Nb_jrL_sem'])){	 
$requete = $bdd -> prepare('update tab_suivi set Nb_jrL_sem= :p_valeur where N_dossier = :p_numdoss and Date = :p_date');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Nb_jrL_sem'],
						  ':p_numdoss'=> $_SESSION['numerodoss'],
						  ':p_date'=> $_SESSION['jourvis']));
  echo "<h2> Modification effectuée! </h2> ";
}
	
	// partie patient, la différence est qu'on ne récupère pas la date et on insère dans une table différente mais le principe est le même

if(isset($_POST['VAL_nom'])){	 
$requete = $bdd -> prepare('update tab_patient set Nom= :p_valeur where Num_dossier = :p_numdoss'); 
$requete -> execute(array(':p_valeur' => $_POST['VAL_nom'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Prenom'])){	 
$requete = $bdd -> prepare('update tab_patient set Pren= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Prenom'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_adress'])){	 
$requete = $bdd -> prepare('update tab_patient set Adressage= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_adress'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_consu'])){	 
$requete = $bdd -> prepare('update tab_patient set Type_consul= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_consu'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Sexe'])){	 
$requete = $bdd -> prepare('update tab_patient set Sexe= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Sexe'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_ddnaiss'])){	 
$requete = $bdd -> prepare('update tab_patient set Date_nais= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_ddnaiss'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_csp'])){	 
$requete = $bdd -> prepare('update tab_patient set CSP= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_csp'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_anneedete'])){	 
$requete = $bdd -> prepare('update tab_patient set Annee_dec_KC= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_anneedete'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_latman'])){	 
$requete = $bdd -> prepare('update tab_patient set Lat_man= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_latman'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_tabacact'])){	 
$requete = $bdd -> prepare('update tab_patient set Tabagisme_actif= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_tabacact'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_nbcigjour'])){	 
$requete = $bdd -> prepare('update tab_patient set nb_cig_jr= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_nbcigjour'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Nb_annees'])){	 
$requete = $bdd -> prepare('update tab_patient set Nb_annees= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Nb_annees'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_tabacpass'])){	 
$requete = $bdd -> prepare('update tab_patient set Tabagisme_passif= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_tabacpass'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Situation_init_KC_OD'])){	 
$requete = $bdd -> prepare('update tab_patient set Situation_init_KC_OD= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Situation_init_KC_OD'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Situation_init_KC_OG'])){	 
$requete = $bdd -> prepare('update tab_patient set Situation_init_KC_OG= :p_valeur where Num_dossier = :p_numdoss');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Situation_init_KC_OG'],
						  ':p_numdoss'=> $_SESSION['numerodoss']));
  echo "<h2> Modification effectuée! </h2> ";
}

?>
<form method="POST" action="modif_suivi.php">
	<input id="bouton" type="submit" value="Modifier une autre valeur">
</form>

<form method="POST" action="patient2.php">
	<input id="bouton" type="submit" value="Choisir une autre date">
</form>

<form method="POST" action="mes_patients.php">
	<input id="bouton" type="submit" value="Choisir un autre patient">
</form>

</br>
</div>
</body>
</html>
