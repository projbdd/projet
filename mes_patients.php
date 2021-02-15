<?php  session_start(); ?>

<html>
<head>
<meta charset="utf-8" />
	<title> Mes patients </title>
	<link rel="stylesheet" media="screen" href="feuille_style.css">
</head>
<body>

<?php
//Barre de navigation 
include("barr_navig.html");
?>
    
<!-- Reste de la page-->
<div class = "main">

<?php

include("connexion_bd.php");


// Requete qui cherche toutes les informations des patients traités par le medecin utilisateur 
$req = $bdd -> prepare('SELECT tab_patient.* FROM tab_suivi 
INNER JOIN tab_patient ON tab_suivi.N_dossier = tab_patient.Num_dossier 
INNER JOIN tab_utilisateurs ON tab_suivi.ID_med= tab_utilisateurs.ID_prof
WHERE tab_utilisateurs.ID_prof = :ID_utilisateur
ORDER BY tab_patient.Num_dossier, tab_patient.Nom, tab_patient.Pren');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));

?>

<br/>
<form method="POST" action="patient2.php">
    <select id = "selectbox" name="numdoss">
        <option  selected="selected">Sélectionnez votre patient</option>
        <?php
        $ligne = $req->fetch();
        while ($ligne)
        {	
        	foreach($ligne as $item)
        	{
            	echo "<option value=".$ligne['Num_dossier'].">".$ligne['Num_dossier']." ".$ligne['Nom']." ".$ligne['Pren']."</option>";
            	$ligne = $req->fetch();
        	}
        }
        $req->closeCursor() ;
        
        ?>
    </select>
	<input  id = "bouton"  type = "submit" name = "BTN_PAT" value = "Valider"></td>
    </form>

<form method="POST" action="nouveau_patient.php">
    <table>
	<tr><td> <input id = "bouton" type = "submit" name = "BTN_MOD" value = "Ajouter un patient"></td></tr>
	</table> 
</form>



<!--
<?php
//TEST
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
?>
-->

</div>
</body>
</html>






