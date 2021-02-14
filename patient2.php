<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient</title>
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

// Stocker le numéro de dossier dans une variable session
$_SESSION['numerodoss']=$_POST['numdoss'];



echo "Le patient sélectionné est le patient numéro ".$_SESSION['numerodoss'].". </br>";
$requete = $bdd ->prepare('select Date from tab_suivi where N_dossier= :p_numdossier');
$requete -> execute(array(':p_numdossier' => $_SESSION['numerodoss']));
?>
</br>
<form method="POST" action="ATCD.php">
	<input type="submit" value="Voir les antécédents du patient">
</form>
</br>
<form method="POST" action="prescriptions.php">
	<input type="submit" value="Voir les préscriptions du patient">
</form>
</br>
<form method="POST" action="nouveau_suivi.php">
	<input type="submit" value="Ajouter une nouvelle fiche de suivi à ce patient">
</form>
</br>
<form method="POST" action="suprimer_patient.php">
	<input type="submit" value="Supprimer ce patient">
</form>
</br>

<form method="POST" action="action_visite.php">
    <select name="jourvis">
        <option selected="selected">Date de la visite</option>
        <?php
        $jour = $requete->fetch();
        while ($jour)
        	{	
        		foreach($jour as $item)
        			{
            			echo "<option value=".$jour['Date'].">".$jour['Date']."</option>";
            			$jour = $requete->fetch();
        			}
        	}
			
        ?>
	<option selected="selected">Visite initiale</option>
    </select>
	
	<input type="submit" value="Ok">
	
</form>


	
<?php

?>

</div>

</body>
</html>
