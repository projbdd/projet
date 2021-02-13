<?php  session_start();?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		<title> MES INFORMATIONS  </title>
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


<?php
include("connexion_bd.php");

$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs WHERE ID_prof = :ID_utilisateur AND NOT ID_prof = 999');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));


//Cherche index à partir de la 2e colonne, donc le 2e élement du array
$ligne = $req->fetch(); 

//Cherche index à partir du premier élement du array
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
?>


<table align="center">
<tr><br/> <a href="mes_patients.php"> Mes patients</a></tr>
<tr><br/> <a href="mes_collègues.php"> Mes collègues </a></tr>
<tr><br/> <a href="accueil.html"> Page d'accueil </a></tr>
</table>



<!--
<?php
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
?>
-->

</body>
</html>
