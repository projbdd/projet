<?php  session_start();?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> MES INFORMATIONS  </title>
	</head>
<body>


<?php

include("connexion_bd.php");


$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs WHERE ID_prof = :ID_utilisateur');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));


$ligne = $req->fetch();


for($i=1;$i<5;$i++)
{	
	echo "<td>".$ligne[$i]."<br /> </td>";
}

$req->closeCursor() ;



?>

<br/> <a href="mes_patients.php"> Mes patients</a>
<br/> <a href="mes_collègues.php"> Mes collègues </a>
<br/> <a href="accueil.html"> Page d'accueil </a>


<!--
<?php
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
?>
-->

</body>
</html>