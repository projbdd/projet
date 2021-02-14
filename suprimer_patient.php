 
<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8" />	
		<title>Informations patient </title>
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

echo "<h2>Voulez-vous vraiment supprimer le patient numéro ".$_SESSION['numerodoss']." ? </h2></br>";
?>
</br>
<form method="POST" action="suprimer_patient2.php">
	<input type="submit" value="OUI">
</form>
</br>
</br>
<form method="POST" action="patient2.php">
	<input type="submit" value="NON">
</form>
</br>
</div>
</body>
</html>