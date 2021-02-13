<?php  session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> INFORMATIONS DE MES COLLEGES  </title>
	</head>
<body>


<?php

include("connexion_bd.php");

//le bouton Valider a été activé
if (isset($_POST['BTN_MED'])) 
{	
	$_SESSION['autre'] = htmlspecialchars($_POST['autre_med']); 
	$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs WHERE ID_prof = :ID_utilisateur');
	$req->execute(array(':ID_utilisateur' => $_SESSION['autre']));


	$ligne = $req->fetch();


	for($i=1;$i<5;$i++)
	{	
			echo "<td>".$ligne[$i]."<br /> </td>";
	}
	
	$req->closeCursor() ;

}


?>

<br/> <a href="mes_collègues.php"> Mes collègues </a>
<br/> <a href="accueil.html"> Page d'accueil </a>



<!--
<?php
//TEST
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
echo "<br /> TEST- ID_SELECTION :". $_SESSION['autre'];
?>
-->

</body>
</html>