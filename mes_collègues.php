<?php  session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> MES INFORMATIONS  </title>
	</head>
<body>


<?php

include("connexion_bd.php");


$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs  
WHERE NOT ID_prof = :ID_utilisateur
AND NOT ID_prof = 999');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));
?>

<form method="POST" action="infos_coll.php">
    <select name="autre_med">
        <option selected="selected"> Autre médecin </option>
        <?php
        $ligne = $req->fetch();
        while ($ligne)
        	{	
        		foreach($ligne as $item)
        			{
            			echo "<option value=".$ligne['ID_prof'].">".$ligne['Nom']." ".$ligne['Prenom']."</option>";
            			$ligne = $req->fetch();
        			}
        	}
        $req->closeCursor() ;
        
        ?>
    </select>
    <table>
	<tr><td> <input type = "submit" name = "BTN_MED" value = "VALIDER"></td></tr>
	</table> 



<br/> <a href="mes_infos.php"> Mes informations</a>
<br/> <a href="accueil.html"> Page d'accueil </a>

<!--
<?php
//TEST
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
?>
-->

</body>
</html>