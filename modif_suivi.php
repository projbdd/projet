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
// connexion  à la base de données
include("connexion_bd.php");
 
 


if ($_SESSION['jourvis'] == "Visite initiale") {
	
echo"<h2> Voici les informations de la visite initiale du patient ".$_SESSION['numerodoss']."</h2></br>";
	
	$requete1 = $bdd->prepare('select * from tab_patient where Num_dossier= :p_numdossier');
	$requete1->execute(array(':p_numdossier' => $_SESSION['numerodoss']));
	$ligne = $requete1->fetch();
	
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
	
	
echo"<h2> Quelles sont les informations à modifier?</h2></br>";
echo "<form method='POST' action=''>	
		<select id='selectbox' name='variable'>
        <option selected='selected'> Sélectionner la variable </option>
        	<option value='Nom'> Nom</option>
			<option value='Pren'> Prénom  </option>
			<option value='Adressage'>Adressage</option>
			<option value='Typ_consul'>Type de consultation </option>
			<option value='Sexe'>Sexe </option>
			<option value='Date_naiss'>Date de naissance </option>
			<option value='CSP'> CSP </option>
			<option value='Annee_dec_KC'>Année de découverte du kératocone</option>
			<option value='Lat_man'>Latéralité manuelle</option>
			<option value='Tabagisme_actif'>Tabagisme actif ?</option>
			<option value='nb_cig_jr'>Nombre de cigarettes par jour</option>
			<option value='Nb_annees'>Nombre d'années de tabagisme actif</option>
			<option value='Tabagisme_passif'>Tabagisme passif</option>
			<option value='Situation_init_KC_OD'>Situation initial oeil droit </option>
			<option value='Situation_init_KC_OG'> Situation initial oeil gauche </option>
    </select>
			<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 

	</form>  </br> ";
	
if(isset($_POST['variable'])){	

if ($_POST['variable']== 'Nom'){	
	echo"<form method='POST' action='modif2suivi.php'>
			Nouvelle valeur - Nom : <input name='VAL_nom'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Pren'){	
	echo"<form method='POST' action='modif2suivi.php'>
			Nouvelle valeur - Prenom : <input name='VAL_Prenom'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Adressage'){	
	echo"<form method='POST' action='modif2suivi.php'>
			Nouvelle valeur - Type d'adressage : <select name='VAL_adress'>
			<option value='0'>Non adressé</option>
			<option value='1'>Adressé par un généraliste</option>
			<option value='2'>Adressé par un spécialiste</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Typ_consul'){	
	echo"<form method='POST' action='modif2suivi.php'>
			Nouvelle valeur - Type de consultation : <select name='VAL_consu'>
			<option value='0'>Premier diagnostic</option>
			<option value='1'>Premier avis</option>
			<option value='2'>Second ou énième avis</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Sexe'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Sexe : <select name='VAL_sexe'>
			<option value='1'>Masculin</option>
			<option value='2'>Féminin</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }		

if ($_POST['variable']== 'Date_naiss'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Date de naissance : <input name='VAL_ddnaiss' type='datetime-local'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }	
	
if ($_POST['variable']== 'CSP'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Catégorie socio-professionnelle : <select name='VAL_csp'>
			<option value='1'>Agriculteurs indépendants</option>
			<option value='2'>Artisans, commerçants et chefs d'entreprise</option>
			<option value='3'>Cadres, professions libérales, professeurs, professions scientifiques et artistiques </option>
			<option value='4'>Professions intermédiaires de l'enseignement, de la santé et de la fonction publique, professions intermédiaires administratives et commerciales des entreprises, techniciens, contremaîtres, agents de maîtrise</option>
			<option value='5'>Employés</option>
			<option value='6'>Ouvriers qualifiés, non qualifiés et agricoles </option>
			<option value='7'>Retraités</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }			

if ($_POST['variable']== 'Annee_dec_KC'){	
	echo"<form method='POST' action='modif2suivi.php'>
			Nouvelle valeur - Année de la detection du keratocone : <input name='VAL_anneedete' type='number'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }	

if ($_POST['variable']== 'Lat_man'){	
	echo"<form method='POST' action='modif2suivi.php'>
			Nouvelle valeur - Latéralité manuelle : <select name='VAL_latman'>
			<option value='1'>Droitier</option>
			<option value='2'>Gaucher</option>
			<option value='3'>Ambidextre</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }


if ($_POST['variable']== 'Tabagisme_actif'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Tabagisme actif : <select name='VAL_tabacact'>
			<option value='1'>Oui</option>
			<option value='2'>Non</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'nb_cig_jr'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Nombre de cigarette fumées par jour : <input name='VAL_nbcigjour' type ='number'
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Nb_annees'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Nombre d'année à fumer : <input name='VAL_Nb_annees' type ='number'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Tabagisme_passif'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur	- Tabagisme passif : <select name='VAL_tabacpass'>
			<option value='1'>Oui</option>
			<option value='2'>Non</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Situation_init_KC_OD'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur	- Situation de l'oeil droit : <select name='VAL_Situation_init_KC_OD'>
			<option value='1'>Suspect</option>
			<option value='2'>Frustre</option>
			<option value='3'>Avérée</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Situation_init_KC_OG'){	
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur	- Situation de l'oeil droit : <select name='VAL_Situation_init_KC_OG'>
			<option value='1'>Suspect</option>
			<option value='2'>Frustre</option>
			<option value='3'>Avérée</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

}
}

else {
	
echo"<h2> Voici les informations de la visite à la date ".$_SESSION['jourvis']." du patient ".$_SESSION['numerodoss']."</h2></br>";
	
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
	
	if($ligne['Port_lentille']=="1"){
		echo "Port de lentilles : OUI </br>";
		if(isset($ligne['Nb_hrL_jr'])){
		echo "Nombre d'heures de port de lentilles par jour : ", $ligne['Nb_hrL_jr'], "</br>";}
		if(isset($ligne['Nb_jrL_sem'])){
		echo "Nombre de jours de port de lentilles par semaines : ", $ligne['Nb_jrL_sem'], "</br>";}
		if(isset($ligne['Tolerance'])){
		if ($ligne['Tolerance']=="1") { echo "Bonne tolérance </br>"; }
		else { echo "Mauvaise tolérance </br>";}}
		if(isset($ligne['Adaptation_lentille'])){
		if ($ligne['Adaptation_lentille'] == 1){
		echo "Première adaptation  </br>"; }
		elseif ($ligne['Adaptation_lentille'] == 2){
		echo "Contrôle lentille adaptée CRNK</br>"; }
		else {"Contrôle lentille non adaptée CRNK</br>";}
		
		}
	}	
	else { echo "Port de lentilles : NON </br>";}
	
	
	
echo"<h2> Quelles sont les informations à modifier?</h2></br>";
echo "<form method='POST' action='modif_suivi.php'>	
		<select id='selectbox' name='variable'>
        <option selected='selected'> Sélectionner la variable </option>
        	<option value='Type_consult'>Type de consultation</option>
			<option value='Signes_Fonctionnels_details'>Détail des signes fonctionnels </option>
			<option value='BAVrapide'>BAV rapide</option>
			<option value='BAVlente'>BAV lente</option>
			<option value='Halos_noct'>Halos nocturnes</option>
			<option value='Photophobie'>Photophobie</option>
			<option value='Vision_ddblee'>Vision ddblee </option>
			<option value='Rougeurs_ocul'>Rougeurs occulaires</option>
			<option value='Autre'>Autres symptomes</option>
			<option value='Autre_det'>Quels autres symptomes?</option>
			<option value='Frottement_yeux'>Frottement des yeux </option>
			<option value='Port_lentille'>Port de lentilles </option>
			<option value='Adaptation_lentille'>Adaptation aux lentilles </option>
			<option value='Tolerance'>Tolerance des lentilles </option>
			<option value='Nb_hrL_jr'>Nombre d'heures pendant lesquelles les lentilles sont portées par jour </option>
			<option value='Nb_jrL_sem'>Nombre de jours pendant lesquelles les lentilles sont portées par semaine</option>
    </select>
			<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
	</form> </br>";
if(isset($_POST['variable'])){	

if ($_POST['variable']== 'Type_consult'){	
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - Type de consultation : <select name='VAL_typeconsult'>
			<option value='1'>Suivi</option>
			<option value='2'>Contactologie</option>
			<option value='3'>Chirurgie</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; }

if ($_POST['variable']== 'Signes_Fonctionnels_details'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Signes fonctionnels et détails : <input name='VAL_sign_fonc'>

		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
		</form>";
}

if ($_POST['variable']== 'BAVrapide'){
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - BAV Rapide : <select name='VAL_BAVrap'>
			<option value='0'> Non </option>
			<option value='-1'> Oui </option>
		</select>
	<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
	</form>";
}

if ($_POST['variable']== 'BAVlente'){
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - BAV Lente : <select name='VAL_BAVlente'>
			<option value='0'> Non </option>
			<option value='-1'> Oui </option>
		</select>
	<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>"; } 


if ($_POST['variable']== 'Halos_noct'){
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - Halos nocturnes : <select name='VAL_Halos_noct'>
			<option value='0'> Non </option>
			<option value='-1'> Oui </option>
		</select>
	<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> </form>
";}


if ($_POST['variable']== 'Photophobie'){
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - Photophobie : <select name='VAL_Photophobie'>
			<option value='0'> Non </option>
			<option value='-1'> Oui </option>
		</select>
	<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}

if ($_POST['variable']== 'Vision_ddblee'){
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - Vision_ddblee : <select name='VAL_Vision_ddblee'>
			<option value='0'> Non </option>
			<option value='-1'> Oui </option>
		</select>
	<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}
			
	
if ($_POST['variable']== 'Rougeurs_ocul'){
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - Rougeurs occulaires : <select name='VAL_Rougeurs_ocul'>
			<option value='0'> Non </option>
			<option value='-1'> Oui </option>
		</select>
	<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}

if ($_POST['variable']== 'autre'){
	echo"<form method='POST' action='modif2suivi.php'>
	Nouvelle valeur - Autre : <select name='VAL_autre'>
			<option value='0'> Non </option>
			<option value='-1'> Oui </option>
		</select>
	<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> </form>
";}

if ($_POST['variable']== 'autre_det'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Autres symptomes : <input name='VAL_autre_det'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}

if ($_POST['variable']== 'Frottement_yeux'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Frottement occulaires : <select name='VAL_Frottement_yeux'>
			<option value='0'>Pas du tout</option>
			<option value='1'>Un peu</option>
			<option value='2'>Modérement </option>
			<option value='3'>Beaucoup</option>
			<option value='4'>Constament</option>
		</select>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}

if ($_POST['variable']== 'Port_lentille'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Port de lentilles : <select name='VAL_Port_lentille'>
			<option value='1'>Oui</option>
			<option value='0'>Non</option>
		</select>	
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}

if ($_POST['variable']== 'Adaptation_lentille'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur -  Adaptation aux lentilles : <select name='VAL_Adaptation_lentille'>
			<option value='1'>Première adaptation </option>
			<option value='2'> Contrôle lentille adaptée CRNK </option>
			<option value='3'>Contrôle lentille non adaptée CRNK</option>
		</select>	
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}

if ($_POST['variable']== 'Tolerance'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Tolerance : <select name='VAL_Tolerance'>
			<option value='0'>Oui </option>
			<option value='1'> Non </option>
		</select>	
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}


if ($_POST['variable']== 'Nb_hrL_jr'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Nombre d'heure pendant lesquelles les lentilles sont portées par jour : <input name='VAL_Nb_hrL_jr' type='number'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}


if ($_POST['variable']== 'Nb_jrL_sem'){
	echo"<form method='POST' action='modif2suivi.php'>
		Nouvelle valeur - Nombre de jours pendant lesquels les lentilles sont portées par semaine : <input name='VAL_Nb_jrL_sem' type='number'>
		<input id = 'bouton' type = 'submit' name = 'BTN_MED' value = 'Valider'> 
</form>";}

}		




}

?>
	 
</div>
</body>
</html>
