<?php session_start(); ?>
<html>
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

if(isset($_POST['VAL_typeconsult'])){	
$requete = $bdd -> prepare('update tab_suivi set Type_consult = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_typeconsult']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_sign_fonc'])){	
$requete = $bdd -> prepare("update tab_suivi set Signes_Fonctionnels_details = :p_valeur");
$requete -> execute(array(':p_valeur' => $_POST['VAL_sign_fonc']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_BAVrap'])){	
$requete = $bdd -> prepare('update tab_suivi set BAVrapide = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_BAVrap']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_BAVlente'])){	
$requete = $bdd -> prepare('update tab_suivi set BAVlente = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_BAVlente']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Halos_noct'])){	
$requete = $bdd -> prepare('update tab_suivi set Halos_noct= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Halos_noct']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Photophobie'])){	
$requete = $bdd -> prepare('update tab_suivi set Photophobie = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Photophobie']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Vision_ddblee'])){	
$requete = $bdd -> prepare('update tab_suivi set Vision_ddblee = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Vision_ddblee']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Rougeurs_ocul'])){	
$requete = $bdd -> prepare('update tab_suivi set Rougeurs_ocul = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Rougeurs_ocul']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_autre'])){	
$requete = $bdd -> prepare('update tab_suivi set autre = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_autre']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_autre_det'])){	
$requete = $bdd -> prepare('update tab_suivi set autre_det = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_autre_det']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Frottement_yeux'])){	
$requete = $bdd -> prepare('update tab_suivi set Frottement_yeux = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Frottement_yeux']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Port_lentille'])){	
$requete = $bdd -> prepare('update tab_suivi set Port_lentille = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Port_lentille']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Adaptation_lentille'])){	
$requete = $bdd -> prepare('update tab_suivi set Adaptation_lentille = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Adaptation_lentille']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Tolerance'])){	
$requete = $bdd -> prepare('update tab_suivi set Tolerance = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Tolerance']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Nb_hrL_jr'])){	 
$requete = $bdd -> prepare('update tab_suivi set Nb_hrL_jr = :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Nb_hrL_jr']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Nb_jrL_sem'])){	 
$requete = $bdd -> prepare('update tab_suivi set Nb_jrL_sem= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Nb_jrL_sem']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_nom'])){	 
$requete = $bdd -> prepare('update tab_patient set Nom= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_nom']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Prenom'])){	 
$requete = $bdd -> prepare('update tab_patient set Pren= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Prenom']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_adress'])){	 
$requete = $bdd -> prepare('update tab_patient set Adressage= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_adress']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_consu'])){	 
$requete = $bdd -> prepare('update tab_patient set Type_consul= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_consu']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Sexe'])){	 
$requete = $bdd -> prepare('update tab_patient set Sexe= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Sexe']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_ddnaiss'])){	 
$requete = $bdd -> prepare('update tab_patient set Date_nais= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_ddnaiss']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_csp'])){	 
$requete = $bdd -> prepare('update tab_patient set CSP= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_csp']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_anneedete'])){	 
$requete = $bdd -> prepare('update tab_patient set Annee_dec_KC= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_anneedete']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_latman'])){	 
$requete = $bdd -> prepare('update tab_patient set Lat_man= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_latman']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_tabacact'])){	 
$requete = $bdd -> prepare('update tab_patient set Tabagisme_actif= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_tabacact']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_nbcigjour'])){	 
$requete = $bdd -> prepare('update tab_patient set nb_cig_jr= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_nbcigjour']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Nb_annees'])){	 
$requete = $bdd -> prepare('update tab_patient set Nb_annees= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Nb_annees']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_tabacpass'])){	 
$requete = $bdd -> prepare('update tab_patient set Tabagisme_passif= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_tabacpass']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Situation_init_KC_OD'])){	 
$requete = $bdd -> prepare('update tab_patient set Situation_init_KC_OD= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Situation_init_KC_OD']));
  echo "<h2> Modification effectuée! </h2> ";
}

if(isset($_POST['VAL_Situation_init_KC_OG'])){	 
$requete = $bdd -> prepare('update tab_patient set Situation_init_KC_OG= :p_valeur');
$requete -> execute(array(':p_valeur' => $_POST['VAL_Situation_init_KC_OG']));
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