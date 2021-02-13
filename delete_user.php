<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Supprimer un utilisateur </title>
	</head>

<body>

<?php

// connexion  à la base de données
include("connexion_bd_projet.php");

// définition de la requête - les paramètres sont identifiés ; on n'a pas besoin de gérer les guillemets -
$req = $bdd->prepare('select Type tab_utilisateurs where ID_user = :p_user');

// exécution de la requête - les valeurs des paramètres sont données dans un tableau
$req->execute(array(':p_user' => $_POST['del_user'], ':p_type' => 'Supp'));

// Récupération des données de la première ligne de la requête
$ligne = $req->fetch();
echo " Here: ".$light[0];

if ($ligne[':p_user']) { // permet de tester si l'utilisateur a bien été trouvé
    if ($req) {	
        echo "L'utilisateur ".htmlspecialchars($_POST['del_user'])." n'a plus accès au serveur.";
        echo "<a href='EspaceDataM.html'> Retour </a> ";
    }
} else { 
    echo "Cet utilisateur n'est pas dans la base de données."; 
}
?>

</body>
</html>