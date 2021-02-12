<?php session_start(); ?>

<html>
	<head>
		<meta charset="utf-8" />	
		<title>EXEMPLE DE SQL</title>
</head>
<body>
<?php

 
// connexion  à la base de données
include("connexion_bd.php");



if (isset($_POST['BTN_OK'])) // le bouton Accès site a été activé
	{
		$req = $bdd->prepare('select Mdp, Type  from tab_utilisateurs where ID_user= :p_user');
		// définition de la requête - les paramètres sont identifiés ; on n'a pas besoin de gérer les guillemets -
		// exécution de la requête - les valeurs des paramètres sont données dans un tableau
		$req->execute(array(':p_user' => $_POST['utilisateur']));

		// Récupération des données de la première ligne de la requête
		$ligne = $req->fetch();

		if ($ligne)  // permet de tester si l'utilisateur a bien été trouvé
			{
				if ($ligne['Mdp']==$_POST['motpasse']) 
					{   //echo "BRAVO ",htmlspecialchars($_POST['utilisateur'])," ! <br /> \n";
						//echo "<a href='xxx.html'> Accéder au site </a> ";
						if ($ligne["Type"]=="Med"){
							echo "BRAVO doc ",htmlspecialchars($_POST['utilisateur'])," ! <br /> \n";
						    echo "<a href='xxx.html'> Accéder au site </a> ";
							
						}
						else{
							echo "BRAVO DM ",htmlspecialchars($_POST['utilisateur'])," ! <br /> \n";
						    echo "<a href='xxx.html'> Accéder au site </a> ";
							
							
						}
		
		// pour faire une redirection utiliser la foncion header - attention cette fonction est à utiliser avant tout code html (donc avant <html>)
				} else { echo "Ce n'est pas le bon mot de passe <br /> ";
						 echo "Attention ",htmlspecialchars($_POST['utilisateur'])," ! <br /> \n";
						echo "<a href='motpasse_corrigé.html'> Nouvel Essai </a> "; // Permet de retourner sur la saisie du mot de passe
						}
			} else  { echo "Utilisateur inconnu <br /> ";
					  echo "<a href='motpasse_corrigé.html'> Nouvel Essai </a> "; // Permet de retourner sur la saisie du mot de passe
					};

		$req->closeCursor() ;
	} 
else if (isset($_POST['BTN_DEL']))  // le bouton suppression de l'utilisateur est activé
	{ // définition de la requête - les paramètres sont identifiés ; on n'a pas besoin de gérer les guillemets -
		$req = $bdd->prepare('delete from tab_utilisateur where user= :p_user');
		// exécution de la requête
		$req->execute(array(':p_user' => $_POST['utilisateur']));
		if ($req) 	{	echo "L'utilisateur ".htmlspecialchars($_POST['utilisateur'])." a bien été supprimé.";
						echo "<a href='motpasse.html'> Retour </a> ";
					}
	}
else if (isset($_POST['BTN_AJ']))  // le bouton suppression de l'utilisateur est activé
	{ // définition de la requête - les paramètres sont identifiés ; on n'a pas besoin de gérer les guillemets -
		$req = $bdd->prepare('insert into tab_utilisateur values (:p_user , :p_mdp)');
		// exécution de la requête
		$req->execute(array(':p_user' => $_POST['utilisateur'] , 
							':p_mdp' => $_POST['motpasse']));
		if ($req) 	{	echo "L'utilisateur ".htmlspecialchars($_POST['utilisateur'])." a bien été ajouté.";
						echo "<a href='motpasse.html'> Retour </a> ";
					}
	}					

?>
</body>
</html>