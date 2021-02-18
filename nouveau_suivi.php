<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Nouveau suivi</title>
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
	
?>
 
<form method="POST" action="ajout_visite.php">

	<fieldset id = "connec" ><legend><h3> Ajout d'une nouvelle visite </h3></legend>
	
		<?php echo " Numéro de dossier : ".$_SESSION['numerodoss']."</br></br>"; ?>
		
		<table id = connec1>	
			
		<tr><td><b> Type de consultation : </b></td><td><select name="typeconsult" >
			<option value="1">Suivi</option>
			<option value="2">Contactologie</option>
			<option value="3">Chirurgie</option>
		</select></td></tr>
		
		<tr><td><b> Date  :  </b></td><td><input name='date' type="datetime-local" value ="2021-01-01T00:00"></td></tr>
		
		<tr><td><b>Signes fonctionnels et détails : </b></td><td><input name='sign_fonc' required></td></tr>
		
		<tr><td><b>BAV Rapide : </b></td><td><select name="BAVrap" >
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></td></tr>
		
		<tr><td><b>BAV Lente : </b></td><td><select name="BAVlente">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></td></tr>
		
		
		<tr><td><b>Halo nocturnes : </b></td><td><select name="Halo">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></td></tr>
			
		<tr><td><b>Photophobie : </b></td><td><select name="Photophobie">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></td></tr>	
		
		<tr><td><b>Vision dédoublée : </b></td><td><select name="ddblee">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></td></tr>	
		
		<tr><td><b>Rougeurs oculaires : </b></td><td><select name="rougeurs">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></td></tr>
		
		<tr><td><b>Autres : </b></td><td><select name="autres">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></td></tr>
		
		<tr><td><b>Autres symptomes : </b></td><td><input name='autres_det'required></td></tr>
		
		<tr><td><b>Frottement occulaires : </b></td><td><select name="frott" >
			<option value="0">Pas du tout</option>
			<option value="1">Un peu</option>
			<option value="2">Modérement </option>
			<option value="3">Beaucoup</option>
			<option value="4">Constament</option>
		</select></td></tr>
		
		<tr><td><b>Port de lentilles : </b></td><td><select name="lentilles" >
			<option value="1"> Oui </option>
			<option value="0"> Non </option>
		</select></td></tr>
		
		<tr><td><b>Adaptation aux lentilles : </b></td><td><select name="adapt" >
			<option value="1">Première adaptation </option>
			<option value="2"> Contrôle lentille adaptée CRNK </option>
			<option value="3">Contrôle lentille non adaptée CRNK</option>
		</select></td></tr>
		
		<tr><td><b>Tolérance: </b></td><td><select name="tolerance">
			<option value="0"> Oui </option>
			<option value="1"> Non </option>
		</select></td></tr>
		
		<tr><td><b>Nombre d'heure pendant lesquelles  </br> les lentilles sont portées par jour : </b></td><td><input name="nbhl" type="number" min="0" max="24" value ="0" ></td></tr>
		<tr><td><b>Nombre de jours pendant lesquels  </br> les lentilles sont portées par semaine : </b></td><td><input name="nbjl" type="number" min="0" max="7" value ="0" ></td></tr>
		
		</table>
		
		<br/><br/></br><input type = "submit" value = "Ajouter cette visite"/></br>

		</br><i>Note : Tous les champs doivent être renseignés pour que la visite soit correctement ajoutée dans la base de données. </i><br/>

	</fieldset>
</form>


</div>

</body>
</html>
