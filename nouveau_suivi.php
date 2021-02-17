<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Nouveau suivi</title>
		<link rel="stylesheet" media="screen" href="feuille_style.css">
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
	
?>
 
<form method="POST" action="ajout_visite.php">
	<fieldset><legend><h3>Ajout d'une nouvelle visite</h3></legend>
		Type de consultation : <select name="typeconsult">
			<option value="1">Suivi</option>
			<option value="2">Contactologie</option>
			<option value="3">Chirurgie</option>
		</select></br>
		Date  : <input name='date' type="datetime-local"></br>
		Signes fonctionnels et détails : <input name='sign_fonc'></br>
		BAV Rapide : <select name="BAVrap">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></br>
		BAV Lente : <select name="BAVlente">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></br>
		Halo nocturnes : <select name="Halo">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></br>		
		Photophobie : <select name="Photophobie">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></br>		
		Vision DDBLEE : <select name="ddblee">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></br>		
		Rougeurs oculaires : <select name="rougeurs">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></br>
		Autres : <select name="autres">
			<option value="0"> Non </option>
			<option value="-1"> Oui </option>
		</select></br>
		Autres symptomes : <input name='autres_det'></br>
		Frottement occulaires : <select name="frott">
			<option value="0">Pas du tout</option>
			<option value="1">Un peu</option>
			<option value="2">Modérement </option>
			<option value="3">Beaucoup</option>
			<option value="4">Constament</option>
		</select></br>
		Port de lentilles : <select name="lentilles">
			<option value="1"> Oui </option>
			<option value="0"> Non </option>
		</select></br>
		Adaptation aux lentilles : <select name="adapt">
			<option value="1">Première adaptation </option>
			<option value="2"> Contrôle lentille adaptée CRNK </option>
			<option value="3">Contrôle lentille non adaptée CRNK</option>
		</select></br>
		Tolérance: <select name="tolerance">
			<option value="0"> Oui </option>
			<option value="1"> Non </option>
		</select></br>
		
		Nombre d'heure pendant lesquelles les lentilles sont portées par jour : <input name="nbhl" type="number"></br>
		Nombre de jours pendant lesquels les lentilles sont portées par semaine : <input name="nbjl" type="number"></br>
		Confirmez votre numéro d'identification médecin : <input name="idmed" type="number"></br>

		
		<input type = "submit" value = "Ajouter cette visite"/></br>
	</fieldset>
</form>


</div>

</body>
</html>
