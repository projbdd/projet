<!-- Page rédigée par Antoine -->

<?php session_start(); ?>

<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient </title>
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
// connexion à la base de données
include("connexion_bd.php");

// affichage de la visite initiale
if ($_SESSION['jourvis'] == "Visite initiale") {
	
	echo"<h2> Visite initiale</h2></br>";
	// requête et execution pour rechercher toutes les infos de la visite
	$requete1 = $bdd->prepare('select * from tab_patient where Num_dossier= :p_numdossier');
	$requete1->execute(array(':p_numdossier' => $_SESSION['numerodoss']));
	$ligne = $requete1->fetch();
	
	// affichage des infos
	// les requêtes intermédiaires permettent de récupérer les libéllés en clair des variables codées
	// les condition 'if' permettent de regarder si les valeurs sont renseignées
	echo "Numero de dossier : ", $ligne['Num_dossier'], " </br>";
	
	if ($ligne['Date_debut_suivi'] != ""){
	echo "Date du début de suivi : ", $ligne['Date_debut_suivi'], " </br>"; }
	
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
	
	if ($ligne['Typ_consul'] != "") {
		$requetetype = $bdd -> prepare('select Type_consultation from tab_codage_type_consultation where codage= :p_type_cons');
		$requetetype -> execute(array(':p_type_cons' => $ligne['Typ_consul']));
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

	if ($ligne['Date_nais'] != "") {
		echo "Date de naissance : ", $ligne['Date_nais'], " </br>";}
	else {echo "Date de naissance : non renseigné </br>";}

	if ($ligne['CSP'] != "") {
		$requetecsp = $bdd -> prepare('select CSP from tab_codage_csp where code= :p_codecsp');
		$requetecsp -> execute(array(':p_codecsp' => $ligne['CSP']));
		$csp = $requetecsp->fetch();
		echo "Catégorie socio-professionnelle : ", $csp['CSP'], " </br>";}
	else { echo "Catégorie socio-professionnelle : non renseignée </br>"; }

	if ($ligne ['Ethnie'] != "") {
		$requeteeth = $bdd -> prepare('select Ethnie from tab_codage_ethnie where code_ethnie= :p_codeeth');
		$requeteeth -> execute(array(':p_codeeth' => $ligne['Ethnie']));
		$ethnie = $requeteeth->fetch();
		echo "Ethnie : ", $ethnie['Ethnie'], " </br>";}
	else {echo"Ethnie : non renseignée </br>";}
	
	if ($ligne['Com_ou_Pays_nais'] != "") {
		echo "Commune ou pays de naissance : ", $ligne['Com_ou_Pays_nais'], " </br>";}
	else { echo "Commune ou pays de naissance : non renseigné </br>";}

	if ($ligne['Annee_dec_KC'] != "") {
		echo "Année de la découverte du.des kératocone.s : ", $ligne['Annee_dec_KC'], " </br>";}
	else {"Année de la découverte du.des kératocones : non renseigné </br>";}

	if ($ligne['Lat_man'] != "") {
		$requetelat = $bdd -> prepare('select Lateralite from tab_codage_lateralite_manuelle where Code_Lateralite= :p_latlat');
		$requetelat -> execute(array(':p_latlat' => $ligne['Lat_man']));
		$lateral = $requetelat->fetch();
		echo "Latéralité manuelle  : ".$lateral['Lateralite']." </br>";}
	else {echo "Latéralité manuelle : non renseignée </br>";}

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
	
	// affichage des visites de suivi
else {
	// les requêtes intermédiaires permettent de récupérer les libéllés en clair des variables codées
	// les condition 'if' permettent de regarder si les valeurs sont renseignées
	
	echo"<h2> Visite à la date ".$_SESSION['jourvis']."</h2></br>";
	
	$requete2 = $bdd->prepare('select * from tab_suivi where N_dossier= :p_numdossier AND Date= :p_datecons');
	$requete2->execute(array(':p_numdossier' => $_SESSION['numerodoss'], ':p_datecons' => $_SESSION['jourvis']));
	$ligne = $requete2->fetch();
	
	echo "Numero de dossier : ", $ligne['N_dossier'],"</br>";
	
	if ($ligne['Type_consult'] != "") {
		$requetetypec = $bdd -> prepare('select Type_CS from tab_codage_suivi where ID_CS_Suivi= :p_type_consu');
		$requetetypec -> execute(array(':p_type_consu' => $ligne['Type_consult']));
		$typecons = $requetetypec->fetch();
		echo "Type de consultation : ", $typecons['Type_CS'], " </br>";}
	else {echo "Type de consultation : inconnu </br>";}
	
	if ($ligne['Signes_Fonctionnels_details'] != ""){
		echo "Signes fonctionnels détaillés : ", $ligne['Signes_Fonctionnels_details'], " </br>";}
	else{echo"Signes fonctionnels détaillés : non renseignés </br>";}
	
	if ($ligne['BAVrapide']=="-1") { echo "BAV rapide (< 1 an) </br>";}
	if ($ligne['BAVlente']=="-1") { echo "BAV lente </br>";}
	if ($ligne['Halos_noct']=="-1") { echo "Halos nocturnes </br>";}
	if ($ligne['Photophobie']=="-1") { echo "Photophobie </br>";}
	if ($ligne['Vision_ddblee']=="-1") { echo "Vision dédoublée </br>";}
	if ($ligne['Rougeurs_ocul']=="-1") { echo "Rougeurs oculaires </br>";}
	if ($ligne['Autre']=="-1") { echo "Autre : ", $ligne['Autre_det'], " </br>";}
	
	if ($ligne['Frottement_yeux'] !=""){
		$requetefrot = $bdd -> prepare('select Frottement_oculaire from tab_codage_frottement_oculaire where Code_Frottement= :p_codefrot');
		$requetefrot -> execute(array(':p_codefrot' => $ligne['Frottement_yeux']));
		$frotyeux = $requetefrot->fetch();
		echo "Frottement des yeux : ", $frotyeux['Frottement_oculaire'], " </br>";}
	else {echo "Frottement des yeux : non renseigné </br>";}
	
	// l'affichage des infos lentilles uniquement si il y a porte lentille=oui
	if($ligne['Port_lentille']=="1"){
		echo "Port de lentilles : OUI </br>";
		echo "Nombre d'heures de port de lentilles par jour : ", $ligne['Nb_hrL_jr'], "</br>";
		echo "Nombre de jours de port de lentilles par semaines : ", $ligne['Nb_jrL_sem'], "</br>";
		if ($ligne['Tolerance']=="1") { echo "Bonne tolérance </br>"; }
		else { echo "Mauvaise tolérance </br>";}
		
		$requeteada = $bdd -> prepare('select Type_CS_Adaptation from tab_codage_adaptation where Code_CS_Adaptation= :p_codeada');
		$requeteada -> execute(array(':p_codeada' => $ligne['Adaptation_lentille']));
		$fadap = $requetada->fetch();
		echo "Adaptation : ", $adap, " </br>";
	}	
	else { echo "Port de lentilles : NON </br>";}
	
}


?>
<!-- boutons pour retourner à la selection des patients ou des visites -->
</br></br>
<form method="POST" action="patient2.php">
	<input id = "bouton" type="submit" value="Chercher une autre date">
</form>
</br>
<form method="POST" action="mes_patients.php">
	<input id="bouton" type="submit" value="Chercher un autre patient">
</form>
</br>



</div>
</body>
</html>
