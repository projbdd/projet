<?php session_start(); ?>

<html>
	<head>
		<meta charset="utf-8" />	
		<title>MES CHOIX</title>
</head>
<body>

<?php 

include("connexion_bd.php");

//le bouton Valider a été activé
if (isset($_POST['BTN_PAT'])) 
	{	
		echo "Vous avez selectionner le patient : "." ".$_POST['numdoss']."<br />";
		echo "<a href='patient2.php'> Accéder aux informations du patient </a>";
		$_SESSION['numerodoss'] = htmlspecialchars($_POST['numdoss']); 
		echo "<br/> <a href='accueil.html'> Page d'accueil </a>";
	} 
// le bouton Ajout d'un patient est activé
else if (isset($_POST['BTN_AJT']))  
	{	
		echo "<a href='xxxxx.html'> Ajouter un patient </a> ";
	}
//  suppression / modif des données des patients ????

?>

</body>
</html>

