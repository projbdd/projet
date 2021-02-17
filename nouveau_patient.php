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
include("connexion_bd.php");
$req = $bdd -> prepare('SELECT max(Num_dossier)+1 as max FROM tab_patient');
$req -> execute();
$numero = $req -> fetch();
$_SESSION['nouveaunum'] = $numero['max'];
?>

<form method="POST" action="ajout_patient.php">
	<fieldset><legend><h3>Ajout d'un nouveau patient</h3></legend>
		<?php echo "Le nouveau patient portera le numéro : ".$_SESSION['nouveaunum'].".</br></br>"; ?>
		Date du début du suivi : <input name='datedeb' type="datetime-local"></br>
		Nom : <input name='nom'></br>
		Prénom : <input name="pren"></br>
		Type d'adressage : <select name="adress">
			<option value="0">Non adressé</option>
			<option value="1">Adressé par un généraliste</option>
			<option value="2">Adressé par un spécialiste</option>
		</select></br>
		Type de consultation : <select name="consu">
			<option value="0">Premier diagnostic</option>
			<option value="1">Premier avis</option>
			<option value="2">Second ou énième avis</option>
		</select></br>
		Sexe : <select name="sexe">
			<option value="1">Masculin</option>
			<option value="2">Féminin</option>
		</select></br>
		Date de naissance : <input name='ddnaiss' type="datetime-local"></br>
		Catégorie socio-professionnelles : <select name="csp">
			<option value="1">Agriculteurs indépendants</option>
			<option value="2">Artisans, commerçants et chefs d'entreprise</option>
			<option value="3">Cadres, professions libérales, professeurs, professions scientifiques et artistiques </option>
			<option value="4">Professions intermédiaires de l'enseignement, de la santé et de la fonction publique, professions intermédiaires administratives et commerciales des entreprises, techniciens, contremaîtres, agents de maîtrise</option>
			<option value="5">Employés</option>
			<option value="6">Ouvriers qualifiés, non qualifiés et agricoles </option>
			<option value="7">Retraités</option>
		</select></br>
		Ethnie : <select name="ethnie">
			<option value="1">Caucasien</option>
			<option value="2">Africain ou Afro-antillais</option>
			<option value="3">Asiatique ou Indien</option>
			<option value="4">Arabe</option>
			<option value="5">Autre</option>
		</select></br>
		Commune ou pays de naissance : <input name="compays"></br>
		Année de la detection du keratocone : <input name="anneedete" type="number"></br>
		Latéralité manuelle : <select name="lateralite">
			<option value="1">Droitier</option>
			<option value="2">Gaucher</option>
			<option value="3">Ambidextre</option>
		</select></br>
		Tabagisme actif : <select name="tabacact">
			<option value="1">Oui</option>
			<option value="2">Non</option>
		</select></br>
		Nombre de cigarette fumées par jour : <input name="nbcigjour" type ="number"></br>
		Nombre d'année à fumer : <input name="nbcigannee" type ="number"></br>
		Tabagisme passif : <select name="tabacpass">
			<option value="1">Oui</option>
			<option value="2">Non</option>
		</select></br>
		Situation de l'oeil droit : <select name="KOD">
			<option value="1">Suspect</option>
			<option value="2">Frustre</option>
			<option value="3">Avérée</option>
		</select></br>
		Situation de l'oeil gauche : <select name="KOG">
			<option value="1">Suspect</option>
			<option value="2">Frustre</option>
			<option value="3">Avérée</option>
		</select></br></br>
		<input type = "submit" value = "Ajouter ce patient"/></br>
	</fieldset>
</form>

</div>
</body>
</html>
