<?php session_start()?>

<html>
	<head>
		<meta charset="utf-8" />
		<title> Modifier les informations de l'utilisateur </title>
		<link rel="stylesheet" media="screen" href="feuille_style.css">
	</head>
<body>

<!-- Partie du haut -->
<div class="navbar">
    <a href="motpasse_corrigé.html">Déconnexion</a>
    <div class="dropdown">
  </div>
</div>

<!-- Reste de la page-->
<div class = "main">
	<?php 

		// Connexion à la base de données
		include("connexion_bd_projet.php");

		
		// On stocke l'information a modifier pour l'utiliser dans le fichier PHP correspondant au formulaire qui suit
		$_SESSION['info'] = htmlspecialchars($_POST['selec']); 
		$_SESSION['ID'] = htmlspecialchars($_POST['ID_to_update']);
		
		if ($_SESSION['info'] == 'Type') {

			// Pour avoir le message de confirmation
			$conf = "SELECT Nom, Prenom FROM tab_utilisateurs WHERE ID_user = '".$_SESSION['ID']."'";
			$affiche = $bdd -> query($conf);
			$message = $affiche -> fetch();
		
			if($message) {

				$_SESSION['nom'] = htmlspecialchars($message['Nom']); 
				$_SESSION['prenom'] = htmlspecialchars($message['Prenom']);

				while($message) {
					echo "</br> Modifier la fonction de ".$_SESSION['prenom']." ".$_SESSION['nom'].".</br></br>";
					$message = $affiche -> fetch();

					echo "<form method = 'POST' action = 'Update_user.php' >
							<fieldset>
								Ancienne fonction <select name = 'old'>
									<option> Med </option>
									<option> DM </option>
									</select></br></br>
								Nouvelle fonction <select name = 'new'>
								<option> Med </option>
								<option> DM </option>
								</select></br></br>
								<input type = 'submit' value = 'Confirmer'/></br>
							</fieldset>
						</form>";
					echo "<a href = 'EspaceDataM.php'>Retour</a>";
				}

			} else {
				echo "</br> Cet utilisateur n'est pas répertorié dans le serveur. </br>";
				echo "<a href = 'EspaceDataM.php'>Réessayer</a>";
			}

		} else {

			// Pour avoir le message de confirmation
			$conf = "SELECT Nom, Prenom FROM tab_utilisateurs WHERE ID_user = '".$_SESSION['ID']."'";
			$affiche = $bdd -> query($conf);
			$message = $affiche -> fetch();
			
			if($message) {

				$_SESSION['nom'] = htmlspecialchars($message['Nom']); 
				$_SESSION['prenom'] = htmlspecialchars($message['Prenom']);

				while($message) {
					echo "</br> Modifier le ".$_SESSION['info']." de ".$_SESSION['prenom']." ".$_SESSION['nom'].".</br></br>";
					$message = $affiche -> fetch();

					echo "<form method = 'POST' action = 'Update_user.php' >
							<fieldset>
								Ancien ".$_SESSION['info']." <input name = 'old'></br></br>
								Nouveau ".$_SESSION['info']." <input name = 'new'></br></br>
								Confirmer ".$_SESSION['info']." <input name = 'confirm'></br></br>
								<input type = 'submit' value = 'Confirmer'/></br>
							</fieldset>
						</form>";
					echo "<a href = 'EspaceDataM.php'>Retour</a>";
				}

			} else {
				echo "</br> Cet utilisateur n'est pas répertorié dans le serveur. </br>";
				echo "<a href = 'EspaceDataM.php'>Réessayer</a>";
			}	
		}
	?>
</div>

</body>
</html>