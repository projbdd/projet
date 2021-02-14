<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Supression suivi</title>
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


//$_SESSION['numerodoss']=$_POST['numdoss'];
	$requete1 = $bdd->prepare('delete from tab_suivi where N_dossier= :p_numdossier AND Date= :p_datecons');
	$requete1->execute(array(':p_numdossier' => $_SESSION['numerodoss'], ':p_datecons' => $_SESSION['jourvis']));
	
	echo"<h2> Visite à la date ".$_SESSION['jourvis']." du patient ".$_SESSION['numerodoss']." supprimée","</h2></br>";
	
?>

</div>

</body>
</html>