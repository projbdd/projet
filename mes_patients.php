<?php  session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> MES PATIENTS </title>
	</head>
<body>



<?php

include("connexion_bd.php");

// Requete qui cherche toutes les informations des patients traités par le medecin utilisateur 
$req = $bdd -> prepare('SELECT tab_patient.* FROM tab_suivi 
INNER JOIN tab_patient ON tab_suivi.N_dossier = tab_patient.Num_dossier 
INNER JOIN tab_utilisateurs ON tab_suivi.ID_med= tab_utilisateurs.ID_prof
WHERE tab_utilisateurs.ID_prof = :ID_utilisateur');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));

?>

<form method="POST" action="mes_choix.php">
    <select name="numdoss">
        <option selected="selected">Sélectionnez votre patient</option>
        <?php
        $ligne = $req->fetch();
        while ($ligne)
        	{	
        		foreach($ligne as $item)
        			{
            			echo "<option value=".$ligne['Num_dossier'].">".$ligne['Nom']." ".$ligne['Pren']." ".$ligne['Date_nais']."</option>";
            			$ligne = $req->fetch();
        			}
        	}
        $req->closeCursor() ;
        
        ?>
    </select>
    <table>
	<tr><td> <input type = "submit" name = "BTN_PAT" value = "VALIDER"></td></tr>
    <tr><td> <input type = "submit" name = "BTN_AJT" value = "AJOUT D'UN NOUVEU PATIENT"></td></tr>
	</table> 
    
</form>


</body>
</html>

