<?php session_start(); ?>

<html>
	<head>
		<meta charset="utf-8" />	
		<title>Accès au site </title>
</head>
<body>

<?php

 
// connexion  à la base de données
include("connexion_bd.php");


if (isset($_POST['BTN_OK'])) // le bouton Accès site a été activé
{
	$req = $bdd->prepare('select Mdp,ID_prof, Type from tab_utilisateurs where ID_user= :p_user');
	// définition de la requête - les paramètres sont identifiés ; on n'a pas besoin de gérer les guillemets -
	// exécution de la requête - les valeurs des paramètres sont données dans un tableau
	$req->execute(array(':p_user' => $_POST['utilisateur']));

	// Récupération des données de la première ligne de la requête
	$ligne = $req->fetch();

	if ($ligne)  // permet de tester si l'utilisateur a bien été trouvé
	{
		if ($ligne['Mdp']==$_POST['motpasse']) 
		{   
			if ($ligne["Type"]=="Med")
			{
				$_SESSION['ID_utilisateur'] = $ligne['ID_prof'];	
				// La fonction header() permet de renvoyer directement à la page d'accueil sans afficher de page intermédiaire 
				header("Location: accueil.php");						
			}
			
			else if ($ligne["Type"]=="NA") // Ce type d'utilisateur n'a pas accès au serveur
			{
				echo "<br/><h3>Vous n'avez plus accès au serveur.</h3>";
				echo "<a href = '1_CONNEXION.html'>Retour</a>";
			}
			
			else // Lien vers l'espace Data Manager
			{
				header("Location: EspaceDataM.php");
			}
		} 
			
		else 
		{ 
			echo "<br/><h3>Mot de passe incorrect.</h3>";
			echo "<a href = '1_CONNEXION.html'>Retour</a>";
		}
	} 
		
	else  
	{ 
		echo "<br/><h3>Utilisateur inconnu. </h3> ";
		echo "<a href = '1_CONNEXION.html'>Retour</a>";
	}

	$req->closeCursor() ;
		
} 

?>
</body>
</html>

