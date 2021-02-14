<?php  session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> INFORMATIONS DE MES COLLEGES  </title>
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

//le bouton Valider a été activé
if (isset($_POST['BTN_MED'])) 
{	
	$_SESSION['autre'] = htmlspecialchars($_POST['autre_med']); 
	$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs WHERE ID_prof = :ID_utilisateur');
	$req->execute(array(':ID_utilisateur' => $_SESSION['autre']));
	
	$ligne = $req -> fetch();
	
	$label = array("Nom", "Prénom", "Age", "Téléphone");
	
	if ($ligne)
	{
		echo "<table>";
		for ($i=0;$i<=3;$i++)
		{
			echo "<tr><td><strong>".$label[$i]." : </strong> </td>  <td>".$ligne[$i+1]."</td></tr>";

		}
		echo "</table>";
	}

	
	$req->closeCursor() ;

}

?>


<br/> <a href="mes_collègues.php"> Mes collègues </a>
<br/> <a href="accueil.php"> Page d'accueil </a>



<!--
<?php
//TEST
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
echo "<br /> TEST- ID_SELECTION :". $_SESSION['autre'];
?>
-->
	
</div>

</body>
</html>
