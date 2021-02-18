<!-- Page rédigée par Antoine -->

<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Ajouter un nouveau patient </title>
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
	
// Récupération d'un nouveau numéro de patient de manière automatique
$req = $bdd -> prepare('SELECT max(Num_dossier) as max FROM tab_patient');
$req -> execute();
$numero = $req -> fetch();
$_SESSION['nouveaunum'] = $numero['max']+0.00001;
?>


<!-- Formulaire pour créer le nouveau patient-->
<form method="POST" action="ajout_patient.php">

	<fieldset id = "connec" ><legend><h3>Ajout d'un nouveau patient</h3></legend>
	
		<!-- Affichage du numéro de patient que l'on a récupéré -->
		<?php echo "Le nouveau patient portera le numéro : ".$_SESSION['nouveaunum'].".</br></br>"; ?>
		
		
		<table id = connec1>	
			
		<tr><td><b> Date du début du suivi : </b></td><td><input name='datedeb' type="datetime-local" required></td></tr>
		
		<tr><td><b> Nom : </b></td><td><input name='nom' required></td></tr>
		
		<tr><td><b> Prénom : </b></td><td> <input name="pren" required></td></tr>
		
		<tr><td><b> Type d'adressage : </b></td><td> <select name="adress">
			<option value="0">Non adressé</option>
			<option value="1">Adressé par un généraliste</option>
			<option value="2">Adressé par un spécialiste</option>
		</select></td></tr>

		<tr><td><b> Type de consultation : </b></td><td> <select name="consu">
			<option value="0">Premier diagnostic</option>
			<option value="1">Premier avis</option>
			<option value="2">Second ou énième avis</option>
		</select></td></tr>
		
		<tr><td><b> Sexe : </b></td><td><select name="sexe">
			<option value="1">Masculin</option>
			<option value="2">Féminin</option>
		</select></td></tr>
		
		<tr><td><b> Date de naissance : </b></td><td> <input name='ddnaiss' type="datetime-local" required></td></tr>
		
		<tr><td><b> Catégorie socio-professionnelles : </b></td><td><select name="csp">
			<option value="1">Agriculteurs indépendants</option>
			<option value="2">Artisans </option>
			<option value="3">Cadres </option>
			<option value="4">Professions intermédiaires </option>
			<option value="5">Employés</option>
			<option value="6">Ouvriers  </option>
			<option value="7">Retraités</option>
			<option value="8">Autres</option>
		</select></td></tr>
		
		<tr><td><b> Ethnie : </b></td><td><select name="ethnie">
			<option value="1">Caucasien</option>
			<option value="2">Africain ou Afro-antillais</option>
			<option value="3">Asiatique ou Indien</option>
			<option value="4">Arabe</option>
			<option value="5">Autre</option>
		</select></td></tr>
		
		<tr><td><b> Commune ou pays de naissance : </b></td><td><input name="compays" required></td></tr>
		
		<tr><td><b> Année de la detection du keratocone : </b></td><td><input name="anneedete" type="number" min='0' value ="2010"></td></tr>
		
		<tr><td><b> Latéralité manuelle : </b></td><td><select name="lateralite">
			<option value="1">Droitier</option>
			<option value="2">Gaucher</option>
			<option value="3">Ambidextre</option>
		</select></td></tr>
		
		<tr><td><b>Tabagisme actif : </b></td><td><select name="tabacact">
			<option value="1">Oui</option>
			<option value="2">Non</option>
		</select></td></tr>
		
		<tr><td><b>Nombre de cigarette fumées par jour : </b></td><td><input name="nbcigjour" type ="number" min='0' value ="0"></td></tr>
		
		<tr><td><b> Nombre d'année à fumer : </b></td><td><input name="nbcigannee" type ="number" min='0' value ="0"></td></tr>
		
		<tr><td><b> Tabagisme passif : </b></td><td><select name="tabacpass">
			<option value="1">Oui</option>
			<option value="2">Non</option>
		</select></td></tr>
		
		<tr><td><b> Situation de l'oeil droit : </b></td><td><select name="KOD">
			<option value="1">Suspect</option>
			<option value="2">Frustre</option>
			<option value="3">Avérée</option>
		</select></td></tr>
		
		<tr><td><b> Situation de l'oeil gauche : </b></td><td><select name="KOG">
			<option value="1">Suspect</option>
			<option value="2">Frustre</option>
			<option value="3">Avérée</option>
		</select></td></tr>
		
		</table>	
			
		<!-- Bouton pour valider l'ajout du patient -->
		</br></br><input type = "submit" value = "Ajouter ce patient"/></br>

	</br><i>Note : Tous les champs doivent être renseignés pour que le patient soit correctement ajouté dans la base de données. </i><br/>

	</fieldset>
</form>

</div>
</body>
</html>
