
<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient </title>
</head>
<body>

<div class="navbar">
    <a href="motpasse_corrigé.html">Déconnexion</a>
    <div class="dropdown">
        <button class="dropbtn">Mon compte
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="mes_infos.php">Mes informations</a>
          <a href="mes_collègues.php">Mes collègues</a>
        </div>
    </div>
</div>

    
<!-- Reste de la page-->
<div class = "main">
	
<?php 
include("connexion_bd.php");

if ($_SESSION['jourvis'] == "Visite initiale") {
	$requete1 = $bdd->prepare('select * from tab_patient where Num_dossier= :p_numdossier');
	$requete1->execute(array(':p_numdossier' => $_SESSION['numerodoss']));
	$ligne = $requete1->fetch();
	
	echo "Numero de dossier : ", $ligne['Num_dossier'], " </br>";
	echo "Date du début de suivi : ", $ligne['Date_debut_suivi'], " </br>";
	echo "Nom : ", $ligne['Nom'], " </br>";
	echo "Prénom : ", $ligne['Pren'], " </br>";

	if ($ligne['Adressage'] != "") {
		$requeteadr = $bdd -> prepare('select Adressage from tab_codage_adressage where codage= :p_adress');
		$requeteadr -> execute(array(':p_adress' => $ligne['Adressage']));
		$adressa = $requeteadr->fetch();
		echo "Adressage : ", $adressa['Adressage'], " </br>";
	}
	else { echo "Adressage : inconnu </br>";
	}
	
	if ($ligne['Type_consult'] != "") {
		$requetetype = $bdd -> prepare('select Type_consultation from tab_codage_type_consultation where codage= :p_type_cons');
		$requetetype -> execute(array(':p_type_cons' => $ligne['Type_consult']));
		$typecon = $requetetype->fetch();
		echo "Type de consultation : ", $typecon['Type_consultation'], " </br>"; }
	else {echo "type de consultation : inconnu </br>";}


	if ($ligne['Sexe']=="1"){
		echo "Sexe : Masculin </br>";
	} else {
		if ($ligne['Sexe']=="2") {
			echo "Sexe : Fénimin </br>";
		} else { 
			echo "Sexe non renseigné </br>";
		}
	}

	echo "Date de naissance : ", $ligne['Date_nais'], " </br>";

	$requetecsp = $bdd -> prepare('select CSP from tab_codage_csp where code= :p_codecsp');
	$requetecsp -> execute(array(':p_codecsp' => $ligne['CSP']));
	$csp = $requetecsp->fetch();
	echo "Catégorie socio-professionnelle : ", $csp['CSP'], " </br>";

	$requeteeth = $bdd -> prepare('select Ethnie from tab_codage_ethnie where code_ethnie= :p_codeeth');
	$requeteeth -> execute(array(':p_codeeth' => $ligne['Ethnie']));
	$ethnie = $requeteeth->fetch();
	echo "Ethnie : ", $ethnie['Ethnie'], " </br>";

	echo "Commune ou pays de naissance : ", $ligne['Com_ou_Pays_nais'], " </br>";

	echo "Année de la découverte du.des kératocone.s : ", $ligne['Annee_dec_KC'], " </br>";

	$requetelat = $bdd -> prepare('select Lateralite from tab_codage_lateralite_manuelle where code_Latralite= :p_latlat');
	$requetelat -> execute(array(':p_latlat' => $ligne['Lat_man']));
	$lateral = $requetelat->fetch();
	echo "Latéralité manuelle  : ", $lateral['Leteralite'], " </br>";

	if ($ligne['Tabagisme_actif']=="1"){
		echo "Statut tabagique actif : Fumeur </br>";
		echo "Nombre de cigarettes journalières : ", $ligne['nb_cig_jr'], " </br>";
		echo "Nombre d'année à fumer : ", $ligne['Nb_annees'], " </br>";
		if ($ligne['Tabagisme_passif']=="1"){
			echo "Statut tabagique passif : Fumeur </br>";
		} else  {echo "Statut tabagique passif : Non fumeur </br>"; }
	} else {
		echo "Statut tabagisme actif : Non fumeur </br>";
		if ($ligne['Tabagisme_passif']=="1"){
			echo "Statut tabagique passif : Fumeur </br>";
		} else  {echo "Statut tabagique passif : Non fumeur </br>"; }
	}



	if ($ligne['Situation_init_KC_OD']=="1"){
		echo "Situation initiale du kératocone à l'oeil droit : KC suspect </br>";
	} else {
		if ($ligne['Situation_init_KC_OD']=="2"){
			echo "Situation initiale du kératocone à l'oeil droit : KC fruste </br>";
		} else {
				if ($ligne['Situation_init_KC_OD']=="3"){
				echo "Situation initiale du kératocone à l'oeil droit : KC avéré </br>";
			}
		} 
	}

	if ($ligne['Situation_init_KC_OG']=="1"){
		echo "Situation initiale du kératocone à l'oeil gauche : KC suspect </br>";
	} else {
			if ($ligne['Situation_init_KC_OG']=="2"){
			echo "Situation initiale du kératocone à l'oeil gauche : KC fruste </br>";
		} else {
				if ($ligne['Situation_init_KC_OG']=="3"){
				echo "Situation initiale du kératocone à l'oeil gauche : KC avéré </br>";
			}
		}
	}
	

}



else {
	$requete2 = $bdd->prepare('select * from tab_suivi where N_dossier= :p_numdossier AND Date= :p_datecons');
	$requete2->execute(array(':p_numdossier' => $_SESSION['numerodoss'], ':p_datecons' => $_POST['jourvis']));
	$ligne = $requete2->fetch();
	
	
	echo "Numero de dossier : ", $ligne['N_dossier'], " </br>";
	
	if ($ligne['Type_consult'] != "") {
		$requetetypec = $bdd -> prepare('select Type_CS from tab_codage_suivi where ID_CS_Suivi= :p_type_consu');
		$requetetypec -> execute(array(':p_type_consu' => $ligne['Type_consult']));
		$typecons = $requetetypec->fetch();
		echo "Type de consultation : ", $typecons['Type_CS'], " </br>";}
	else {echo "Type de consultation : inconnu </br>";}
	
	echo "Date de consultation : ", $ligne['Date']," </br>";
	
	if ($ligne['Signes_Fonctionnels_details'] != ""){
		echo "Signes fonctionnels détaillés : ", $ligne['Signes_Fonctionnels_details'], " </br>";
	}
	
	
	
	echo "Signes fonctionnels OPH : </br>";
	if ($ligne['BAVrapide']=="1") { echo "BAV rapide (< 1 an) </br>";}
	if ($ligne['BAVlente']=="1") { echo "BAV lente </br>";}
	if ($ligne['Halos_noct']=="1") { echo "Halos nocturnes </br>";}
	if ($ligne['Photophobie']=="1") { echo "Photophobie </br>";}
	if ($ligne['Vision_ddblee']=="1") { echo "Vision dédoublée </br>";}
	if ($ligne['Rougeurs_ocul']=="1") { echo "Rougeurs oculaires </br>";}
	if ($ligne['Autre']=="1") { echo "Autre : ", $ligne['Autre_det'], " </br>";}
	
	$requetefrot = $bdd -> prepare('select Frottement_oculaire from tab_codage_frottement_oculaire where Code_Frottement= :p_codefrot');
	$requetefrot -> execute(array(':p_codefrot' => $ligne['Frottement_yeux']));
	$frotyeux = $requetefrot->fetch();
	echo "Frottement des yeux : ", $frotyeux['Frottement_oculaire'], " </br>";
	
	if($ligne['Port_lentille']=="1"){
		echo "Port de lentilles : OUI </br>";
		echo "Nombre d'heures de port de lentilles par jour : ", $ligne['Nb_hrL_jr'], "</br>";
		echo "Nombre de jours de port de lentilles par semaines : ", $ligne['Nb_jrL_sem'], "</br>";
		if ($ligne['Tolerance']=="1") { echo "Bonne tolérance </br>"; }
		else { echo "Mauvaise tolérance </br>";}
		
		$requeteada = $bdd -> prepare('select Type_CS_Adaptation from tab_codage_adaptation where Code_CS_Adaptation= :p_codeada');
		$requeteada -> execute(array(':p_codeada' => $ligne['Adaptation_lentille']));
		$fadap = $requetada->fetch;
		echo "Frottement des yeux : ", $adap, " </br>";
	}	
	else { echo "Port de lentilles : NON </br>";}
	
}

echo "<a href='patient2.php'> Chercher une autre date </a> </br>";
echo "<a href='mes_patients.php'> Chercher une autre patient </a> ";

/* Antoine

VALEURS MANQUANTES A PRENDRE EN COMPTE MAIS SINON C4Est GOOD*/
?>

</div>
</body>
</html>
