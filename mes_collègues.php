<?php  session_start(); ?>

<!-- PAGE DE GRACE Z.-->

<html>
<head>
		<meta charset="utf-8" />
		<title> Mes collègues  </title>
	<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>
<body>

<?php include("barr_navig.html"); ?>

<!-- Reste de la page-->
<div class = "main">
<?php
include("connexion_bd.php");


// Requête qui ressort les utilisateurs médecins autres que le médecin connecté (et ceux qui ont n'ont plus accès au réseau)
$req = $bdd -> prepare('SELECT * FROM tab_utilisateurs  
WHERE NOT ID_prof = :ID_utilisateur
	AND TYPE ="Med"');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));
?>

<!-- Affichage des médecin sous forme d'une liste déroulante -->
<br/>
<form method="POST" action="infos_coll.php">
    <select id="selectbox" name="autre_med">
        <option selected="selected"> Sélectionner votre collègue </option>
        <?php
        $ligne = $req->fetch();
        while ($ligne) {	
        	foreach($ligne as $item)
        	{
            	echo "<option value=".$ligne['ID_prof'].">".$ligne['Nom']." ".$ligne['Prenom']."</option>";
            	$ligne = $req->fetch();
        	}
        }
        $req->closeCursor() ;
        
        ?>
    </select>
	<input id = "bouton" type = "submit" name = "BTN_MED" value = "Valider">

<!--
<?php
//TEST de variable session
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
?>
-->

</body>
</html>
