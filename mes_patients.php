<?php  session_start(); 


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<title> MES PATIENTS </title>
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

// Cela nous permet de ré-initialiser le numéro de dossier gardé en session 
unset($_SESSION["numerodoss"]);
unset($_SESSION['jourvis']);

// Requete qui cherche toutes les informations des patients traités par le medecin utilisateur 
$req = $bdd -> prepare('SELECT tab_patient.* FROM tab_suivi 
INNER JOIN tab_patient ON tab_suivi.N_dossier = tab_patient.Num_dossier 
INNER JOIN tab_utilisateurs ON tab_suivi.ID_med= tab_utilisateurs.ID_prof
WHERE tab_utilisateurs.ID_prof = :ID_utilisateur
ORDER BY tab_patient.Num_dossier, tab_patient.Nom, tab_patient.Pren');
$req->execute(array(':ID_utilisateur' => $_SESSION['ID_utilisateur']));

?>

<form method="POST" action="patient2.php">
    <select name="numdoss">
        <option selected="selected">Sélectionnez votre patient</option>
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
    <table>
	<tr><td> <input type = "submit" name = "BTN_PAT" value = "VALIDER"></td></tr>
	</table> 
    </form>

<form method="POST" action="nouveau_patient.php">
    <table>
	<tr><td> <input type = "submit" name = "BTN_MOD" value = "AJOUT D'UN PATIENT"></td></tr>
	</table> 
</form>

<br/> <a href="accueil.php"> Page d'accueil </a>

<!--
<?php
//TEST
echo "<br /> TEST- ID_UTILISATEUR :". $_SESSION['ID_utilisateur'];
?>
-->

</div>
</body>
</html>



