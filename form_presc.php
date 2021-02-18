<?php session_start(); ?>

<!-- PAGE DE GRACE Z.-->

<html>
	<head>
		<meta charset="utf-8" />	
		<title> Ajouter une prescription </title>
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

// Requête qui récupèr le nom associée à chaque ID_lentille pour la liste déroulante
$req = $bdd -> prepare('SELECT * FROM tab_codage_nom_lentilles');
$req ->execute();

// Récupération des données de la première presc de la requête
$ligne = $req -> fetch();
?>


<form method="POST" action="ajout_presc.php">

	<fieldset id = "connec" ><legend><h3> Ajout d'une prescription </h3></legend>
	
		<?php echo " Numéro de dossier : ".$_SESSION['numerodoss']."</br></br>"; ?>
		
	<table id = connec1>		
		
		<tr><td><b> Date : </b></td><td><input name='datep' type="datetime-local" required></td></tr>
		
		<tr><td><b>Oeil : </b></td><td> <select name="oeil">
			<option value="1">Oeil droit</option>
			<option value="2">Oeil gauche </option>
		</select></td></tr>
		
		<!-- Elements de la liste = résultat de notre requête-->
		
		<tr><td><b> Nom de lentille : </b></td><td> 
		<select name="num_lentille">
        <?php
        while ($ligne)
        {	
        	foreach($ligne as $item)
        	{
            		echo "<option value=".$ligne['Id_lentille'].">".$ligne['Nom_lentille']."</option>";
            		$ligne = $req->fetch();
        	}
        }
        ?>
        </select></td></tr>
        
        <tr><td><b>Autre nom : </b></td><td> <input name="autrep" type="text" ></td></tr>
					
		<tr><td><b>Rayon de courbure : </b></td><td><input name="ro_val"  type = "number" step="0.01" required></td></tr>
		
		<tr><td><b>Diamètre : </b></td><td><input name="dia"  type = "number" step="0.01" required></td></tr>
		
		<tr><td><b>Puissance : </b></td><td><input name="puissance" type = "number" step="0.01" required></td></tr>
		
		<tr><td><b>Commentaire :</b></td><td> <textarea name="comment" rows="5" cols="20" ></textarea></td></tr>
		</table>

		<br/><br/></br><input type = "submit" value = "Ajouter cette prescription"/></br>
		
		
	</fieldset> 
</form>


</div>
</body>
</html>
